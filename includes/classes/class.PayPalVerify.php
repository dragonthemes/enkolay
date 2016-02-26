<?php
class PayPalVerify {

    public static function verify(){
        $data = json_encode($_POST);


        file_put_contents('/home/enkolayw/public_html/uploads/log.txt', $data);

        if($_POST['txn_id']){
           
			$myPost = $_POST;
			// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
			$req = 'cmd=_notify-validate';
			if(function_exists('get_magic_quotes_gpc')) {
			   $get_magic_quotes_exists = true;
			} 
			foreach ($myPost as $key => $value) {        
			   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
					$value = urlencode(stripslashes($value)); 
			   } else {
				   
				   
					$value = urlencode($value);
			   }
			   $req .= "&$key=$value";
			}
			 
			// Step 2: POST IPN data back to PayPal to validate
			$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: enkolayweb.com'));
			
			$res = curl_exec($ch);
			file_put_contents('/home/enkolayw/public_html/uploads/log2.txt', $res);
			
			curl_close($ch);
			
			return $res;

        }
        return false;
    }
}

?>
