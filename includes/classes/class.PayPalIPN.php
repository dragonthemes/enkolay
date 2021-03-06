<?php
/**
 * PayPalIPN
 *
 * @package 
 * @author 
 * @copyright 2011
 
 * @access public
 */
class PayPalIPN extends Common
	{
		private $paypal_post_arr = array(); 			//$_POST array vars
		private $paypal_post_vars_in_str; //the paypal post array vars as string
		private $paypal_response = ''; //paypals response for our posted vars
		private $paypal_receiver_emails = array(); //array of expected paypal receiver emails
		private $errno; //error no of transaction
		private $ip;	//User IP

		 /**
		  * PayPalIPN::__construct()
		  *
		  * @return void
		  * @access public
		  **/
		 /*public function __construct()
			{
			}*/

		/**
		 * PayPalIPN::setDBObject()
		 * Sets the Database Object
		 *
		 * @param object $dbObj Database object
		 * @return void The function does not return any value
		 * @access public
		 **/
		public function setDBObject($dbObj)
			{
				$this->dbObj = $dbObj;
			}

		/**
		 * PayPalIPN::setPayPalVars()
		 *
		 * @param $paypal_post_arr
		 * @return void
		 * @access public
		 **/
		public function setPayPalVars($paypal_post_arr)
			{
				//we can directly assign $this->paypal_post_arr = $paypal_post_arr;. But, it is safe to check undefined index...
				//sanitzie via another method
				$this->paypal_post_arr = $paypal_post_arr;
				//get the POST array in a string...
				$this->paypal_post_vars_in_str = '';
				foreach($paypal_post_arr as $key=>$value)
					{
						$value = urlencode(stripslashes($value));
						$this->paypal_post_vars_in_str .= '&'.$key.'='.$value;
					}
				//Commenting out; not necessary as the command variable is prepended before sending...
				//$this->paypal_post_vars_in_str = substr($this->paypal_post_vars_in_str, 1); //remove the first "&" from the string
			}

		/**
		 * PayPalIPN::setUserIP()
		 *
		 * @param $ip
		 * @return
		 * @access public
		 **/
		public function setUserIP($ip)
			{
				$this->ip = $ip;
			}

		/**
		 * PayPalIPN::setPayPalLogTableName()
		 *
		 * @param string $table_name
		 * @return void
		 * @access public
		 **/
		public function setPayPalLogTableName($table_name)
			{
				$this->table_name = $table_name;
			}

		/**
		 * PayPalIPN::setPayPalReceiverEmail()
		 * set expected receiver emails array
		 *
		 * @param string $email
		 * @return void
		 * @access public
		 **/
		public function setPayPalReceiverEmail($email)
			{
				//put it in array so that any number of emails can be set as receiver emails
				$this->paypal_receiver_emails[] = $email;
			}

		/**
		 * PayPalIPN::postResponse2PayPal()
		 * post back our response to paypal
		 *
		 * @return void
		 * @access public
		 **/
		public function postResponse2PayPal()
			{
				// post back to PayPal system to validate
				$this->paypal_post_vars_in_str =  'cmd=_notify-validate'.$this->paypal_post_vars_in_str;
				$header = 'POST /cgi-bin/webscr HTTP/1.0'."\r\n";
				$header .= 'Content-Type: application/x-www-form-urlencoded'."\r\n";
				$header .= 'Content-Length: ' . strlen($this->paypal_post_vars_in_str) . "\r\n\r\n";
				//suppress socket connection error by '@'...

				if($this->CFG['payment']['paypal']['test_mode'])
				{
					$url = $this->CFG['payment']['paypal']['test_url'];
				}
				else
					$url=$this->CFG['payment']['paypal']['url'];

				$parsed_url=parse_url($url);
				$host = $parsed_url['host'];
				$fp = @fsockopen ($host, 80, $errno, $errstr, 30);
				if (!$fp)  // ERROR
						$this->paypal_response = $errstr.'('.$errno.')';
					else
						{
							//just post it...
							fputs($fp, $header . $this->paypal_post_vars_in_str);
							while(!feof($fp))
								{
									$resp = fgets($fp, 1024);
									    if (strcmp($resp, 'VERIFIED') == 0)
												$this->paypal_response = 'VERIFIED';
											else if (strcmp($resp, 'INVALID') == 0)
												$this->paypal_response = 'INVALID';
								}
						}
			}

		/**
		 * PayPalIPN::sanitizePayPalVars()
		 * process paypal POST vars so as to avoid undefined index error
		 *
		 * @return void
		 * @access private
		 **/
		public function sanitizePayPalVars()
			{
				$expected_paypal_post_arr = array(
												'txn_id' 		=> '',
												'payer_email' 	=> '',
												'payment_date'	=> '',
												'payment_gross' => '',
												'payment_fee'	=> '',
												'payment_status'=> '',
												'invoice'       => '',
												'memo'			=> '',
												'receiver_email' => '',
												'mc_gross'      => '',
												'mc_currency'  => '',
												'UID'			=> 0,
												'product_id'    => ''
											);
				//@todo Check if $tmp_arr is really necessary. Can't we do it directly?
				$tmp_arr = array();
				foreach($expected_paypal_post_arr as $key=>$default_value)
					$tmp_arr[$key] = (isset($this->paypal_post_arr[$key])) ? htmlspecialchars(trim($this->paypal_post_arr[$key])) : $default_value;
				//UID is user-defined variable (on0 & os0 in the form)---used to process user_id
				//option_name1==UID & option_selection1==value
				//therefore...
				//fetch all available user-defined variables & values...
				for($i=1; isset($this->paypal_post_arr["option_name{$i}"]) && isset($this->paypal_post_arr["option_selection{$i}"]); ++$i)
						$tmp_arr[$this->paypal_post_arr["option_name{$i}"]] = htmlspecialchars(trim($this->paypal_post_arr["option_selection{$i}"]));
				//following line is to avoid undefined index error...
				$this->paypal_post_arr = $tmp_arr;



			}

		/**
		 * PayPalIPN::_isVerified()
		 * check whether paypal's response is 'VERIFIED' or not
		 *
		 * @return boolean
		 * @access private
		 **/
		private function _isVerified()
			{
				return(strcmp($this->paypal_response, 'VERIFIED')==0);
			}

		/**
		 * PayPalIPN::_isVaidPaymentStatus()
		 * get the payment status: 'Completed', 'Pending', 'Failed', 'Denied'
		 * test whether it is 'Completed'
		 *
		 * @return boolean
		 * @access private
		 **/
		private function _isVaidPaymentStatus()
			{
				//payment status can be : 'Completed', 'Pending', 'Failed', 'Denied'
				return(strcmp($this->paypal_post_arr['payment_status'], 'Completed')==0);
			}

		/**
		 * PayPalIPN::_isTransactionProcessed()
		 * Is txn_id is already processed?
		 *
		 * @return string $txn_id
		 * @access private
		 **/
		private function _isTransactionProcessed()
			{
				$txn_id = $this->paypal_post_arr['txn_id'];
				$sqlsel = 'SELECT COUNT(*) as count FROM '.
							$this->table_name.
							' WHERE txn_id=\''.$this->filterInput($txn_id).'\'';

				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$num_of_txn_id = $sqlres[0]['count'];
				return($num_of_txn_id!=0); //txn_id processed if num!=0
			}

		/**
		 * PayPalIPN::_isValidReceiverEmail()
		 * Is receiver_email is my paypal (expected) email?
		 *
		 * @return boolean
		 * @access private
		 **/
		private function _isValidReceiverEmail()
			{
				//is receiver_email is the expected receiver_emails (one who runs website)??
				return( in_array($this->paypal_post_arr['receiver_email'], $this->paypal_receiver_emails) );
			}

		/**
		 * PayPalIPN::getPayPalVar()
		 *
		 * @param $var_name index of PayPal post array
		 * @return void
		 * @access public
		 **/
		public function getPayPalVar($var_name)
			{
				return $this->paypal_post_arr[$var_name];
			}

		/**
		 * PayPalIPN::validateTransaction()
		 * validate transactions ie, to set error no. Must to call this function.
		 *
		 * @return void
		 * @access public
		 **/
		public function validateTransaction()
			{
				//set the error no...
				// check the payment_status is Completed
				// check that txn_id has not been previously processed
				// check that receiver_email is an email address in your PayPal account
				// process payment
				//This is to trap exact error type
				//Logic: bit field logic: 0-no error, ...
				//if all bits are set, then error in all conditions
				$this->errno = 0; //initialize to no error

				$cnt = 0;



				$this->errno  |=  $this->_isVerified() ? 0 : (1<<0);

				$this->errno  |=  $this->_isVaidPaymentStatus() ? 0 : (1<<1);

				$this->errno  |=  (!$this->_isTransactionProcessed()) ? 0 : (1<<2);

				$this->errno  |=  $this->_isValidReceiverEmail() ? 0 : (1<<3);

			}

			/**
		 * PayPalIPN::validateTransaction()
		 * validate transactions ie, to set error no. Must to call this function.
		 *
		 * @return void
		 * @access public
		 **/
		public function validateMemberShipTransaction()
			{
				//set the error no...
				// check the payment_status is Completed
				// check that txn_id has not been previously processed
				// check that receiver_email is an email address in your PayPal account
				// process payment
				//This is to trap exact error type
				//Logic: bit field logic: 0-no error, ...
				//if all bits are set, then error in all conditions
				$this->errno = 0; //initialize to no error

				$cnt = 0;
				
				//$this->errno  |=  $this->_isVerified() ? 0 : (1<<0);
				$this->errno  |=  $this->_isVaidPaymentStatus() ? 0 : (1<<1);
				$this->errno  |=  (!$this->_isTransactionProcessed()) ? 0 : (1<<2);
				
			}



		/**
		 * PayPalIPN::isTransactionOk()
		 * a single method to check all above conditions
		 *
		 * @return boolean
		 * @access public
		 **/
		public function isTransactionOk()
			{
				//$this->validateTransaction();
				return( !$this->errno );
			}

		/**
		 * PayPalIPN::paypalTransactions()
		 *
		 * @param integer $user_id
		 * @return void
		 * @access public
		 **/
		public function paypalTransactions($user_id,$domain_id)
			{
				//addslashes to every variable in the array....
				//kinda sanitization...
				$this->paypal_post_arr = array_map('addslashes', $this->paypal_post_arr);
				$sqlsel = 'INSERT INTO '.$this->table_name.' SET ' .
						'date_added=\''.time().'\', '.
						'ip=\''.$this->filterInput($this->ip).'\', ' .
						'user_id=\''.$this->filterInput($user_id).'\', ' .
                        'domain_id=\''.$this->filterInput($domain_id).'\', ' .
						'txn_id=\''.$this->filterInput($this->paypal_post_arr['txn_id']).'\', ' .
						'currency_type=\''.$this->filterInput($this->paypal_post_arr['mc_currency']).'\', ' .
						'payer_email=\''.$this->filterInput($this->paypal_post_arr['payer_email']).'\', ' .
						'payment_date=\''.time().'\', '.
						'payment_gross=\''.$this->filterInput($this->paypal_post_arr['payment_gross']).'\', ' .
						'payment_fee=\''.$this->filterInput($this->paypal_post_arr['payment_fee']).'\', ' .
						'payment_status=\''.$this->filterInput($this->paypal_post_arr['payment_status']).'\', ' .
                        'payment_types=\'paypal\', ' .
						'receiver_email=\''.$this->filterInput($this->paypal_post_arr['receiver_email']).'\', ' .
						'paypal_response=\''.$this->filterInput($this->paypal_response).'\', ' .
						'error_no=\''.$this->filterInput($this->errno).'\', ' .
						'memo=\''.$this->filterInput($this->paypal_post_arr['memo']).'\', ' .
						'paypal_post_vars=\''.$this->filterInput($this->paypal_post_vars_in_str).'\'';

				$sqlres =  $this->ExecuteQuery($sqlsel,'insert');
			}


		public function getTransactionId()
		{
			return $this->paypal_post_arr['txn_id'];
		}


	}
?>