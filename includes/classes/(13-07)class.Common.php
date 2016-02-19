<?php
class Common extends Site
{
    
	/** veni function starts for store
	*/
	
	
   /**
   * Common::getCategoriesForThisProduct()
   * #this for list categories in product page
   * @param mixed $product_id
   * @return void
   */
 	function getCategoriesForThisProduct($product_id)
		{
		    global $CFG,$objSmarty;
		    $sqlsel = "SELECT choice_id,option_id,product_id,option_input,price FROM ".$CFG['table']['product_choice']." WHERE product_id = '".$this->filterInput($product_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("product_choices", $sqlres);
	    }
   
   /**
   * Common::userAuthendication()
   * 
   * @return void
   */
    function userAuthendication()
	   {    
	     global $CFG;    
	     $user_id=$this->getNumvalues($CFG['table']['register']," user_id = '".$_SESSION['user_id']."' ");
          if($user_id=='0')
            {
                unset($_SESSION['user_id']);
            }
	     if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) ){
	    			
				if(USER_FRINDLY == 'Y'){
					$this->redirectUrl($CFG['site']['base_url']);
				}else{
					$this->redirectUrl($CFG['site']['base_url']."/index.php");
				}
			}
	   }
      #domain authendication funciton    
    function domainAuthendication()
        {
             global $CFG;   
             
             $domain_id = $this->getCountValue($CFG['table']['temp_domaindetails'],"domain_id = '".$_GET['domain_id']."' AND user_id = '".$_SESSION['user_id']."' AND payment_status = 'Yes' ");             
             if($domain_id == 0) {
                    if(USER_FRINDLY == 'Y'){
    					$this->redirectUrl($CFG['site']['base_url']."/userhome");
    				}else{
    					$this->redirectUrl($CFG['site']['base_url']."/userHome.php");
    				}
                 }
        }    
   /**
   * Common::getCategories()
   * for get categories to list in store page(front)
   * @param mixed $domain_id
   * @return void
   */
	function getCategories($domain_id)
		{
		 	global $CFG,$objSmarty;
			$sql_rent		=	"SELECT  store_cat_id,domain_id,cat_name FROM 
								".$CFG['table']['store_category']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			//print_r($res_rent);
		 	$objSmarty->assign('categories',$res_rent);
		}
   /**
   * Common::getCategoriesImages()
   * used to list images in category page in front
   * @param mixed $store_cat_id
   * @param mixed $domain_id
   * @return void
   */
   function getCategoriesImages($store_cat_id,$domain_id)
	   	{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT  store_cat_id,domain_id,store_cat_image FROM 
								".$CFG['table']['store_cat_images']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."' AND store_cat_id ='".$this->filterInput($store_cat_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			//print_r($res_rent);
		 	$objSmarty->assign('categoriesImages',$res_rent[0]['store_cat_image']);
		}
   /**
   * Common::getProductsImages()
   *
   * @param mixed $product_id
   * @param mixed $domain_id
   * @return void
   */
	function getProductsImages($product_id,$domain_id)
	   	{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT  product_id,domain_id,image_name FROM 
								".$CFG['table']['product_images']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."' AND product_id ='".$this->filterInput($product_id)."' order by sort_order asc";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			#echo "<pre>";print_r($res_rent);echo "</pre>";
		 	$objSmarty->assign('pro_images',$res_rent[0]['image_name']);
		 	$objSmarty->assign('pro_whole_images',$res_rent);
		}
	function getProductsImagesForFacebook($product_id,$domain_id)
	   	{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT  product_id,domain_id,image_name FROM 
								".$CFG['table']['product_images']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."' AND product_id ='".$this->filterInput($product_id)."' order by sort_order asc";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			
		 	$objSmarty->assign('prod_images',$res_rent);
		}
	function getProductsFromProdCat($domain_id,$store_cat_id)
		{
			global $CFG,$objSmarty;
            if(isset($domain_id) && isset($store_cat_id))
                {
                    $sql_rent		=	"SELECT  product_ids,domain_id,category_id FROM 
    								".$CFG['table']['product_cat']." 							
    								WHERE domain_id = '".$this->filterInput($domain_id)."' AND category_id ='".$this->filterInput($store_cat_id)."'";
        			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
        			
        			$product_ids= explode (',',$res_rent[0]['product_ids']);			
        		 	$objSmarty->assign('productBasedCat',$product_ids);
                }			
		}
	function getProdDetails($prod_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT product_id,domain_id,product_name,sale_price,description,price,offer_price,sku,weight  FROM ".$CFG['table']['store_product']. " WHERE product_id = '".$this->filterInput($prod_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			
			$objSmarty->assign("product_details", $sqlres);
			
		}
	function getProductImages($product_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT image_name  FROM ".$CFG['table']['product_images']. " WHERE product_id = '".$this->filterInput($product_id)."' LIMIT 0,2";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			
			$objSmarty->assign("product_images", $sqlres[0]['image_name']);			
		}
	function getProductsDetails($prod_id)
		{
			global $CFG,$objSmarty;
            if(isset($prod_id) && !empty($prod_id))
                {
                    $sqlsel = "SELECT product_id,domain_id,product_name,sale_price,description,price,offer_price,sku,weight  FROM ".$CFG['table']['store_product']. " WHERE product_id = '".$this->filterInput($prod_id)."'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');		
        			$objSmarty->assign("productViewPage", $sqlres);
                }		    
		}
   /**
   * Common::getProdOptions()
   *
   * @param mixed $product_id
   * @return void
   */
	function getProdOptions($product_id)
		{
		    global $CFG,$objSmarty;
		    $sqlsel = "SELECT option_id,product_id,option_title,domain_id,option_input,price FROM ".$CFG['table']['product_option']. " WHERE product_id = '".$this->filterInput($product_id)."' ORDER BY option_id ASC";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');            
			$objSmarty->assign("product_options", $sqlres);
			//return $sqlres;
		}
	function getProdChoices($option_id)
		{
		    global $CFG,$objSmarty;
		     $sqlsel = "SELECT choice_id,option_id,product_id,option_input,price FROM ".$CFG['table']['product_choice']. " WHERE option_id = '".$this->filterInput($option_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("option_input", $sqlres[0]['option_input']);
			$objSmarty->assign("price", $sqlres[0]['price']);
			$objSmarty->assign("product_choices", $sqlres);
			//return $sqlres;
		}
	function getCategoryNames($domain_id,$cat_id)
		{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT  cat_name FROM 
								".$CFG['table']['store_category']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."' AND store_cat_id = '".$this->filterInput($cat_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			//print_r($res_rent[0]['cat_name']);
		 	$objSmarty->assign('category_names',$res_rent[0]['cat_name']);
		}
	function getCategoryId($domain_id,$product_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  product_ids,domain_id,category_id FROM 
								".$CFG['table']['product_cat']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."' AND product_ids ='".$this->filterInput($product_id)."' ";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    return $res_rent[0]['category_id'];
		}
		
    function updateStoreOrderFooter()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET store_order_footer = '".$_POST['store_order_footer']."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }        	
		}
	function getFootercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  store_order_footer FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('store_order_footer',$res_rent[0]['store_order_footer']);
		    return $res_rent[0]['store_order_footer'];
		}
	function updateStoreOrderHeader()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {  
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET store_order_header = '".$_POST['store_order_header']."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function getHeadercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  store_order_header FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('store_order_header',$res_rent[0]['store_order_header']);
		    return $res_rent[0]['store_order_header'];
		}
	function updateShippedHeader()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET shipped_header = '".$this->filterInput($_POST['shipped_header'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function updateShippedFooter()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET shipped_footer = '".$this->filterInput($_POST['shipped_footer'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function getShippedHeadercontent($domain_id)
		{
			global $CFG,$objSmarty;
            if(isset($domain_id) && !empty($domain_id))
                {
        		    $sql_rent		=	"SELECT  shipped_header FROM 
        								".$CFG['table']['store_details']." 							
        								WHERE domain_id = '".$this->filterInput($domain_id)."'";
        			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
        		    $objSmarty->assign('shipped_header',$res_rent[0]['shipped_header']);
        		    return $res_rent[0]['shipped_header'];
                }
		}
	function getShippedFootercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  shipped_footer FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('shipped_footer',$res_rent[0]['shipped_footer']);
		    return $res_rent[0]['shipped_footer'];
		}
	function updateRefundHeader()
		{
			global $CFG,$objSmarty;
		     if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET refund_header = '".$this->filterInput($_POST['refund_header'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function updateRefundFooter()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET refund_footer = '".$this->filterInput($_POST['refund_footer'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function getRefundHeadercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  refund_header FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('refund_header',$res_rent[0]['refund_header']);
		    return $res_rent[0]['refund_header'];
		}
	function getRefundFootercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  refund_footer FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('refund_footer',$res_rent[0]['refund_footer']);
		    return $res_rent[0]['refund_footer'];
		}
	function updateCanceledHeader()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET canceled_header = '".$this->filterInput($_POST['canceled_header'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function updateCanceledFooter()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                { 
        			$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET canceled_footer = '".$this->filterInput($_POST['canceled_footer'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	function getCanceledHeadercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  canceled_header FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('canceled_header',$res_rent[0]['canceled_header']);
		    return $res_rent[0]['canceled_header'];
		}
	function getCanceledFootercontent($domain_id)
		{
			global $CFG,$objSmarty;
		    $sql_rent		=	"SELECT  canceled_footer FROM 
								".$CFG['table']['store_details']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
		    $objSmarty->assign('canceled_footer',$res_rent[0]['canceled_footer']);
		    return $res_rent[0]['canceled_footer'];
		}
	function getStoreInfoForMail()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id,currency,company_name,street,postal,country,state,email,phone_no,shipping_policy,return_policy FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres;
		}
	function getTaxPrice($order_id)
		{
			global $CFG,$objSmarty;
			
			$tax_val=$this->getValue('tax_val',$CFG['table']['order'],"order_id = '".$this->filterInput($order_id)."'");
			return $tax_val;
		}
	function getEmail($domain_id)
		{
			global $CFG,$objSmarty;
	 		$email=$this->getValue('email',$CFG['table']['store_details'],"domain_id = '".$this->filterInput($domain_id)."'");
			return $email;
		}
	function getAdminEmail($domain_id)
		{
			global $CFG,$objSmarty;
	 		$admin_email=$this->getValue('admin_email',$CFG['table']['sitesetting'],"domain_id = '".$this->filterInput($domain_id)."'");
			return $admin_email;
		}
	function getOrderId($prod_id)
		{
			global $CFG,$objSmarty;
			$this->filterInput;
			$order_id = $this->getValue('order_id',$CFG['table']['order_product'],"product_id = '".$this->filterInput($prod_id)."'");
			return $order_id;
		}
	
   /**
   * Common::sendMailForOrder()
   *  to send mail for store owner and users for order
   * @return void
   */
	function sendMailForOrder()
		{
			global $CFG,$objSmarty;
			$header_info  =$this->getHeadercontent($this->filterInput($_SESSION['domain_id']));
		 	$shipping_address = $this->filterInput($_SESSION['address']);
			$shipping_city= $this->filterInput($_SESSION['city']);
			$shipping_state=$this->filterInput($_SESSION['state']);
			$shipping_country=$this->filterInput($_SESSION['country']);
			$shipping_zip=$this->filterInput($_SESSION['zipcode']);
			$billing=$this->getStoreInfoForMail($this->filterInput($_SESSION['domain_id'])); 
			$billing_companyname=$this->filterInput($billing[0]['company_name']);
			$billing_street=$this->filterInput($billing[0]['street']);
			$billing_postal=$this->filterInput($billing[0]['postal']);
			$billing_country=$this->filterInput($billing[0]['country']);
			$billing_state=$this->filterInput($billing[0]['state']);
			$footer_info  =$this->getFootercontent($this->filterInput($_SESSION['domain_id']));
			$product_name=$this->getProductName($this->filterInput($_SESSION['product_id']));
			$order_id=$this->getOrderId($this->filterInput($_SESSION['product_id']));
			$sale_price=$this->filterInput($_SESSION['sale_price']);
			$shipping_price=$this->filterInput($_SESSION['ship_value']);
			$tax=$this->getTaxRate($this->filterInput($_SESSION['domain_id']));
			$to_email=$this->getEmail($this->filterInput($_SESSION['domain_id']));
			$from_email=$this->getAdminEmail($this->filterInput($_SESSION['domain_id']));
			$total=$this->filterInput($shipping_price)+$this->filterInput($tax);
		 	$from_name 			= $CFG['site']['site_main_domain'];
			$mailsubject  = $CFG['site']['sitename']." Order Confirmation Mail";
			$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOrderConfirmation.tpl");
	        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
	        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
	        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
	        $mail_content = str_replace('{HEADER}',$header_info,$mail_content);
	        $mail_content = str_replace('{FOOTER}',$footer_info,$mail_content);
	        $mail_content = str_replace('{ORDER_ID}',$order_id,$mail_content);
	        $mail_content = str_replace('{SHIPPING_ADDRESS}',$shipping_address,$mail_content);
	        $mail_content = str_replace('{SHIPPING_CITY}',$shipping_city,$mail_content);
	        $mail_content = str_replace('{SHIPPING_COUNTRY}',$shipping_country,$mail_content);
	        $mail_content = str_replace('{SHIPPING_STATE}',$shipping_state,$mail_content);
	        $mail_content = str_replace('{SHIPPING_ZIP}',$shipping_zip,$mail_content);
	        $mail_content = str_replace('{BILLING_COMPANY}',$billing_companyname,$mail_content);
	        $mail_content = str_replace('{BILLING_STREET}',$billing_street,$mail_content);
	        $mail_content = str_replace('{BILLING_POSTAL}',$billing_postal,$mail_content);
	        $mail_content = str_replace('{BILLING_COUNTRY}',$billing_country,$mail_content);
	        $mail_content = str_replace('{BILLING_STATE}',$billing_state,$mail_content);
	        $mail_content = str_replace('{PRODUCT_NAME}',$product_name,$mail_content);
	        $mail_content = str_replace('{SALE_PRICE}',$sale_price,$mail_content);
	        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
	        $mail_content = str_replace('{TAX}',$tax,$mail_content);
	        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
	        //echo $from_email;
			//echo '<br>';
			//echo $to_email;  
			//echo '<br>';
	        //echo $mail_content;die();
			//$ok=$this->sendMail('Webbxyz',$from_email,$to_email,$mailsubject,$mail_content);
			$ok=1;
		 	if($ok)
				{
				 	$reciever_email	=	$this->filterInput($from_email);
					$sender_email	=	$this->filterInput($to_email);
				 	$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOrderConfirmation.tpl");
			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
			        $mail_content = str_replace('{HEADER}',$header_info,$mail_content);
			        $mail_content = str_replace('{FOOTER}',$footer_info,$mail_content);
			        $mail_content = str_replace('{SHIPPING_ADDRESS}',$shipping_address,$mail_content);
			        $mail_content = str_replace('{SHIPPING_CITY}',$shipping_city,$mail_content);
			        $mail_content = str_replace('{SHIPPING_COUNTRY}',$shipping_country,$mail_content);
			        $mail_content = str_replace('{SHIPPING_STATE}',$shipping_state,$mail_content);
			        $mail_content = str_replace('{SHIPPING_ZIP}',$shipping_zip,$mail_content);
			        $mail_content = str_replace('{BILLING_COMPANY}',$billing_companyname,$mail_content);
			        $mail_content = str_replace('{BILLING_STREET}',$billing_street,$mail_content);
			        $mail_content = str_replace('{BILLING_POSTAL}',$billing_postal,$mail_content);
			        $mail_content = str_replace('{BILLING_COUNTRY}',$billing_country,$mail_content);
			        $mail_content = str_replace('{BILLING_STATE}',$billing_state,$mail_content);
			        $mail_content = str_replace('{PRODUCT_NAME}',$product_name,$mail_content);
			        $mail_content = str_replace('{SALE_PRICE}',$sale_price,$mail_content);
			        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
			        $mail_content = str_replace('{TAX}',$tax,$mail_content);
			        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
			        //echo $reciever_email;
					//echo '<br>';
					//echo $sender_email;  
					//echo '<br>';
					//echo $mail_content;die();
					$ok=$this->sendMail($to_name,$sender_email,$reciever_email,$mailsubject,$mail_body);
				}
			
	 					
		}
   /**
   * Common::searchCategoryListForStore()
   *
   * @return void
   */
   //used for search functionality in category
	function searchCategoryListForStore()
		{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT  store_cat_id,domain_id,cat_name,addeddate,status  FROM 
								".$CFG['table']['store_category']." 							
								WHERE cat_name LIKE '".$this->filterInput($_POST['search_cat'])."%' and domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			$objSmarty->assign('categorysearchdetails',$res_rent);
		}
	function changeIntoUnpublish()
		{
			global $CFG,$objSmarty;
            if( isset($_POST['product_id']) && $_POST['product_id'] != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['store_product']." SET publish = '0' WHERE product_id ='".$this->filterInput($_POST['product_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }	 		
		}
	function changeIntoPublish()
		{
			global $CFG,$objSmarty;
            if(isset($_POST['product_id']) && $_POST['product_id'] != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['store_product']." SET publish = '1' WHERE product_id ='".$this->filterInput($_POST['product_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }	 		
		}
 	
    function updateSortableForOptions($ord,$key)
	 	{
	 		global $CFG,$objSmarty;
				
			$UpQuery  = "UPDATE ".$CFG['table']['product_option']." SET sort_order = '".$this->filterInput($key)."' WHERE option_id ='".$this->filterInput($ord)."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			
		}
	function getProductsListForShowInProductListPage($prod_id)
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  publish  FROM 
									".$CFG['table']['store_product']." 							
									WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."' AND product_id='".$this->filterInput($prod_id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
				//print_r($res_rent[0]['publish']);
			 	$objSmarty->assign('proListPage',$res_rent[0]['publish']);
			}
	function getProdDetailsForFacebook($prod_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT product_id,domain_id,product_name,sale_price,description,price,offer_price,sku,weight  FROM ".$CFG['table']['store_product']. " WHERE product_id = '".$this->filterInput($prod_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('prod_face',$sqlres);
		 	//return $prod_face;
		}
	//for update images in product add pages
	function updateSortableForImage($ord,$key)
	 	{
	 		global $CFG,$objSmarty;
				
			$UpQuery  = "UPDATE ".$CFG['table']['product_images']." SET sort_order = '".$this->filterInput($key)."' WHERE img_id ='".$this->filterInput($ord)."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			
		}
  /**
   * Common::InsertCartTable()
   * for insert into cart table while add to cart
   * @return void
   */
	function InsertCartTable()
		{
			global $CFG,$objSmarty;
			$str=array();
			for($i=0;$i<=count(($_POST['option_name']));$i++)
				{
					$temp= strrev($_POST['option_name'][$i]);
					$temp=substr($temp,0,1);
				 	$str[]=$temp;
				}
			
			$choice_ids=implode(',',$str);
			$choice_ids = substr($choice_ids,0,-1);
			$choice_ids=str_replace(",","||",$choice_ids);
		 	$ship=strrev($_POST['shipval']);
		 	$ship=substr($ship,0,1);
		 	$ship_id=$ship;
		  	$sql_ins	=	"INSERT INTO ".$CFG['table']['cart']." SET
															 domain_id		=	'".$this->filterInput($_POST['domain_id'])."',
															 product_id		=   '".$this->filterInput($_POST['product_id'])."',
															 quantity		=	'".$this->filterInput($_POST['quantity'])."',
															 product_name   =	'".$this->filterInput($_POST['product_name'])."',
															 price          =   '".$this->filterInput($_POST['sale_price'])."',
															 session_id     =   '".session_id()."',
															 ip_address     =   '".$this->filterInput($_SERVER['REMOTE_ADDR'])."',
															 select_option  =   '".$this->filterInput($choice_ids)."',
															 addeddate       =NOW();
												";
			$res_ins	=	$this->ExecuteQuery($sql_ins,'insert'); 
		}
   /**
   * Common::selectCartDetails()
   * select cart details to show in cart pop up
   * @return void
   */
	function selectCartDetails($domainid)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT cart_id,product_id,domain_id,product_name,price,quantity,shiping_id,select_option  FROM ".$CFG['table']['cart']. " WHERE session_id = '".session_id()."' AND domain_id = '".$this->filterInput($domainid)."' ";
			$cartdetails =  $this->ExecuteQuery($sqlsel,'select');	
            
			foreach($cartdetails as $key=>$val)
    			{    				
    		  		$option_name  = '';
    				$option_div   = '';
    			    $option_price = 0;
                    $cartdetails[$key]['product_price'] = $cartdetails[$key]['quantity']*$cartdetails[$key]['price'];  
    			    $subtoal     += $cartdetails[$key]['quantity']*$cartdetails[$key]['price']; 
    			 }
		 	
            $shiping_price = $this->getValue("ship_price",$CFG['table']['ship_store'],"ship_id ='".$this->filterInput($cartdetails[0]['shiping_id'])."' ");
            if($shiping_price == '')
               $shiping_price = 0.00;               
            
            $tax = TAX_RATE_VALUE;
            $objSmarty->assign('tax',$tax);            
            $tax_value  = ($tax/100)*$subtoal;
            $objSmarty->assign('shiping_price',$shiping_price); 
            $objSmarty->assign('tax_value',$tax_value); 
            $objSmarty->assign('subtoal',$subtoal);
			$objSmarty->assign('grandsubtoal',$subtoal+$tax_value+$shiping_price);		
            
			$objSmarty->assign('cartdetails',$cartdetails);           
		}
   #................................................................................................
   #funtion for the cart authendation
   function cartAuthendication($domainid)
       {
       	 
            global $CFG;
            $cart_count = $this->getCountValue($CFG['table']['cart'],"domain_id = '".$this->filterInput($domainid)."' AND session_id = '".session_id()."' ");
            
            if($cart_count<=0)
            	{
            		//$this->redirectUrl($CFG['site']['base_url']."/sourceNew.php"); 
					$this->redirectToSubdomain('sourceNew.php','store');
				}
                
                
            
       }     
   #...............................................................................................
   /**
   * Common::selectnewCart()
   * used for list cart details in pop up(cart)
   * @return void
   */
	/*function selectnewCart()
		{
			global $CFG,$objSmarty;
		    //$sqlsel   = "SELECT cart_id,product_id,domain_id,product_name,sum(price) as price,sum(quantity) as quantity,ship_id,select_option  FROM ".$CFG['table']['cart']. " WHERE session_id = '".session_id()."' group by product_id ";
		    $sqlsel   = "SELECT cart_id,product_id,domain_id,product_name,price,quantity,select_option  FROM ".$CFG['table']['cart']. " WHERE session_id = '".session_id()."' ";
			$cart_det =  $this->ExecuteQuery($sqlsel,'select');
			if($cart_det[0]['quantity'] != '' && $cart_det[0]['price'] != ''){
			   $cart_det [0]['total'] = $cart_det[0]['quantity']*$cart_det[0]['price'];
			}
			#echo "<pre>";print_r($cart_det);echo "</pre>";
			//$_SESSION['cart_quan']=$cart_det[0]['cart_quan'];
			$objSmarty->assign('cart_det',$cart_det);
			//return $cart_det;
	 	}*/
   /**
   * Common::getTitle()
   * used to get option title to list in cart pop up
   * @param mixed $option_id
   * @param mixed $option_input
   * @return void
   */
	function getTitle($option_id,$option_input)
		{
			global $CFG,$objSmarty;
			$sqlsel_title    = "SELECT option_title,price FROM ".$CFG['table']['product_option']. " WHERE option_id = '".$this->filterInput($option_id)."' AND option_input = '".$this->filterInput($option_input)."' ";
			$sqlres_title    =  $this->ExecuteQuery($sqlsel,'select');
			$sres_title      = $sqlres_title;
			$objSmarty->assign('option_title',$sres_title);
		}
   /**
   * Common::getPrice()
   * get price for choice price in drop down of product view page
   * @param mixed $choice_id
   * @return void
   */
	function getPrice($choice_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT price  FROM ".$CFG['table']['product_choice']. " WHERE choice_id='".$this->filterInput($choice_id)."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('matchprice',$sqlres);
		}
	function getShip($domain_id)
		{
			global $CFG,$objSmarty;
		 	$sqlsel = "SELECT ship_name FROM ".$CFG['table']['ship_store']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('ship',$sqlres);
		}
	function deleteCartDet()
		{
			global $CFG,$objSmarty;
		 	$UpQuery  = "DELETE  FROM ".$CFG['table']['cart']." WHERE cart_id ='".$this->filterInput($_POST['cart_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
   /**
   * Common::getCartDetails()
   * used to list cart details in checkout page
   * @param mixed $domain_id
   * @return void
   */
	function getCartDetails($domain_id)
		{
			 global $CFG,$objSmarty;
		     $sqlsel = "SELECT cart_id,product_id,domain_id,product_name,price,quantity,ship_id,select_option  FROM ".$CFG['table']['cart']. " WHERE domain_id = '".$this->filterInput($domain_id)."' ";
			 $sqlres =  $this->ExecuteQuery($sqlsel,'select');
			 //print_r($sqlres);
		 	 $objSmarty->assign('cart',$sqlres);
		}
   /**
   * Common::toGetTotal()
   * to list total in cart pop 
   * @param mixed $amount
   * @return void
   */
	function toGetTotal($amount)
		{
			if($amount=="unset")
				{
					unset($_SESSION['total']);
				}
			else
				{
					$_SESSION['total']+=$amount;
				}
		}
   /**
   * Common::toGetSubTotal()
   * to get subtotal in checkout apge
   * @param mixed $amount
   * @return void
   */
	function toGetSubTotal($amount)
		{
			if($amount=="unset")
				{
					unset($_SESSION['sub_total']);
				}
			else
				{
					$_SESSION['sub_total']+=$amount;
				}
		}
	function updateQuantity()
		{
			global $CFG,$objSmarty;
	 		$UpQuery  = "UPDATE ".$CFG['table']['cart']." SET quantity = '".$this->filterInput($_POST['quan'])."' WHERE cart_id ='".$this->filterInput($_POST['cart_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
 
     #update teh shiping id    
    function updateShipingid()
        {
            global $CFG,$objSmarty;
	 		$UpQuery  = "UPDATE ".$CFG['table']['cart']." SET shiping_id = '".$this->filterInput($_POST['shipid'])."' WHERE session_id ='".session_id()."' AND domain_id = '".$this->filterInput($_POST['domain_id'])."' ";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        }    
 
    #......................................................................................       
       
	function getCartCount()
		{
			 global $CFG,$objSmarty;
		     $sqlsel = "SELECT count(quantity) as count_cart  FROM ".$CFG['table']['cart']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."' AND session_id = '".session_id()."' ";
			 $sqlres =  $this->ExecuteQuery($sqlsel,'select');
		 	 return $sqlres[0]['count_cart'];
		}
	function insertIntoOrderDetails($order_id)
		{
			global $CFG,$objSmarty;
			$sqlsel   = "SELECT cart_id,product_id,domain_id,product_name,price,quantity,select_option  FROM ".$CFG['table']['cart']. " WHERE session_id = '".session_id()."' AND domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$cart_det =  $this->ExecuteQuery($sqlsel,'select');
		 	foreach($cart_det as $key=>$val)
				{
				 
				  	$sqlsel      = " INSERT INTO ".$CFG['table']['order_details']. " SET order_id = '".$this->filterInput($order_id)."',
						                                                                 product_id = '".$this->filterInput($cart_det[$key]['product_id'])."',
																						 domain_id = '".$this->filterInput($cart_det[$key]['domain_id'])."',
																						 product_name='".$this->filterInput($cart_det[$key]['product_name'])."',
																						 price ='".$this->filterInput($cart_det[$key]['price'])."',
																						 quantity ='".$this->filterInput($cart_det[$key]['quantity'])."',
																						 addeddate = NOW();";
					$sqlres = mysql_query($sqlsel) or die($this->mysql_error($sqlres));
		 		}
 
		 	echo "success";	
  		}
		
   /**
   * Common::toGetTax()
   * to get total tax in checkout page
   * @param mixed $domain_id
   * @return
   */
	function toGetTax($domain_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT tax_rate FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres[0]['tax_rate'];
			//$objSmarty->assign('tax_value',$sqlres[0]['tax']);
		}
   /**
   * Common::toCalculateTaxValue()
   * to get total tax vlaue
   * @param mixed $subtotal
   * @param mixed $domain_id
   * @return void
   */
	function toCalculateTaxValue($subtotal,$domain_id)	
		{
			$tax=$this->toGetTax($this->filterInput($domain_id));
			global $CFG,$objSmarty;
			$tax_val=$subtotal*($tax/100);
			$_SESSION['tax_val']=$tax_val;
		}
   /**
   * Common::totalGrand()
   * to get grand total
   * @param mixed $domain_id
   * @return
   */
	function totalGrand($ship,$tax)
		{
			$total_grand_value=$ship+$tax;
			return $total_grand_value;
		}
   /**
   * Common::insertIntoOrderTable()
   * used to insert into order table
   * @return void
   */
	function insertIntoOrderTable($paypal_type)
		{
			global $CFG,$objSmarty;	
			$order_no  ="OD".rand(pow(10, 8-1), pow(10, 8)-1);
		    $InsQuery  = "INSERT INTO ".$CFG['table']['order']." SET    domain_id = '".$this->filterInput($_SESSION['domain_id'])."',
		    															order_no ='".$this->filterInput($order_no)."',
					                                                    sub_total = '".$this->filterInput($_SESSION['sub_tot'])."', 
																		ship_val = '".$this->filterInput($_SESSION['ship_val'])."' ,
																		grand_total = '".$this->filterInput($_SESSION['grand_tot'])."' ,
																		tax_val = '".$this->filterInput($_SESSION['tax_val'])."',
																		txn_id = '".$this->filterInput($_POST['txn_id'])."',
																		payment_status = '".$this->filterInput($_POST['payment_status'])."',
																		payment_type = '".$this->filterInput($paypal_type)."',
																		address = '".$this->filterInput($_SESSION['address'])."',
																		state = '".$this->filterInput($_SESSION['state'])."',
																		name = '".$this->filterInput($_SESSION['name'])."',
																		city = '".$this->filterInput($_SESSION['city'])."',
																		country = '".$this->filterInput($_SESSION['country'])."',
																		zip = '".$this->filterInput($_SESSION['zipcode'])."',
																		email = '".$this->filterInput($_SESSION['email'])."',
																		phone_no = '".$this->filterInput($_SESSION['phoneno'])."',
																		payer_email = '".$this->filterInput($_POST['payer_email'])."',
																		receiver_mail = '".$this->filterInput($_POST['receiver_email'])."',
																		order_status = 'Ordered',
																		addeddate = NOW();"; 
			$Result          = mysql_query($InsQuery) or die($this->mysql_error($InsResult));
  			$LastInsertedRow = mysql_insert_id();
			return $LastInsertedRow;
					
		}
	function updatePayEmailInStoreDetails()
		{
			global $CFG,$objSmarty;
		    if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET paypal_email = '".$this->filterInput($_POST['paypal_email'])."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			if($UpResult)
        				{
        					$objSmarty->assign('successmsg','Your Email update Successfully');
        				}
                }			
		}
   /** veni function ends for list  category in products page
   */
   #Registration
   /**
   * Common::addRegister()
   * This is the newfuntion for to add a user to the file
   * @return void
   */
   function addRegister()
   		{
	   	   	global $CFG,$objSmarty;
		   	$notadmin=1;
		   	
			if($_SERVER["REQUEST_METHOD"] == "POST")
				  {
				  		$username		=	$this->filterInput($_POST['username']);
					   	$email			=	$this->filterInput($_POST['email']);
					   	$password		=	$this->filterInput($_POST['password']);
					   	
					   	$num_customer = $this->getNumValues($CFG['table']['register'],"email = '".$email."' AND log_status ='2' ");
                        $username_exist = $this->getNumValues($CFG['table']['register'],"username = '".$username."' AND log_status ='2' ");
						if($num_customer > 0)
							{echo "Exist";}
                        elseif($username_exist >0)
                            {echo "UserExist";}       
						else
							{								
								$sql_ins	=	"INSERT INTO ".$CFG['table']['register']." SET
															 username		=	'".$username."',
															 email			=	'".$email."',
															 password		=	'".$password."',
															 addeddate		=	NOW();
												";
								$res_ins	=	$this->ExecuteQuery($sql_ins,'insert');  
								if($res_ins)
									{
										$_SESSION['user_id'] = $res_ins;
										$to_name			= 	$username;
										$to_email			= 	$email;					
										$from_email			= 	$this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id='1'");
									
										
										if($CFG['site']['userfriendly'] == 'Y'){
											$path =  $CFG['site']['base_url']."/onboarding.php/".base64_encode($res_ins);
										}else{
											$path =  $CFG['site']['base_url'].'/onboarding.php?user_id='.base64_encode($res_ins);
										}
										
										$url				=	$path;
										$mail_content		=	$url;
										$from_name 			= $CFG['site']['site_main_domain'];
										$mail_content      .=   "<br>UserName: ".$email;
										$mail_content      .=   "<br>Password: ".$password; 
										$mailsubject  = $CFG['site']['sitename']." Registration Details ";
										$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailRegistration.tpl");
								        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
								        $mail_content = str_replace('{STATUS}','Hi '.$username. ',',$mail_content);
								        $mail_content = str_replace('{INFO}','You have been successfully registered in our site,',$mail_content);
								        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
								        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
								        $mail_content = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_content);
								        $mail_content = str_replace('{USERNAME}',$username,$mail_content);
								        $mail_content = str_replace('{EMAIL}',$email,$mail_content);
								        $mail_content = str_replace('{PASSWORD}',$password,$mail_content);
								        $mail_content = str_replace('{INFO}','',$mail_content);
								        $mail_content = str_replace('{DETAILS}','Your Details Below',$mail_content);
								        $mail_content = str_replace('{ADMIN}','Admin',$mail_content);  
                                        $mail_content = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content);  
								        //echo $mail_content;die();
										$ok=$this->sendMail($CFG['site']['sitename'],$from_email,$to_email,$mailsubject,$mail_content);
										//$ok=1;
									 	if($ok)
											{
											 	$reciever_email	=	$from_email;
												$sender_email	=	$to_email;
											 	$mailsubject  = $CFG['site']['sitename']." Registration Details ";
												$mail_body = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailRegistration.tpl");
												$mail_body = str_replace('{STATUS}','Hi Admin,',$mail_body);
												$mail_body = str_replace('{DETAILS}','User Details Below',$mail_body);
												$mail_body = str_replace('{INFO}','User successfully registered with your site,',$mail_body);
										        $mail_body = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_body);
										        $mail_body = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_body);
										        $mail_body = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);
										        $mail_body = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_body);
										        $mail_body = str_replace('{USERNAME}',$username,$mail_body);
										        $mail_body = str_replace('{EMAIL}',$email,$mail_body);
										        $mail_body = str_replace('{PASSWORD}',$password,$mail_body);
										        $mail_body = str_replace('{ADMIN}','The '.$CFG['site']['site_main_domain'].' Team',$mail_body);
                                                $mail_body = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_body);   
		    									//echo $mail_body;die();
		    									$ok=$this->sendMail($to_name,$sender_email,$reciever_email,$mailsubject,$mail_body);
											}
										
										if($CFG['site']['userfriendly'] == 'Y'){
											echo $CFG['site']['base_url']."/onboarding.php";
										}else{
											echo $CFG['site']['base_url'].'/onboarding.php';
										}
													
									}
								exit();	
					}}
		}	
	
	#USER LOGIN
	#-------------------------------------------------------------------------------------------
	#check Authentic
	function user_authetic(){
		global $CFG;
				
		if( $_SESSION['user_id'] ) {			
			if($CFG['site']['userfriendly'] == 'Y'){
				#$this->redirectUrl($CFG['site']['base_url']."/myaccount");
				echo $CFG['site']['base_url']."/userhome";
			}else{						
				#$this->redirectUrl($CFG['site']['base_url'].'/myAccount.php');
				echo $CFG['site']['base_url'].'/userHome.php';
			}
		}
	}
	#check UnAuthentic
	function user_unauthetic(){
		global $CFG;
		$filename  = $this->get_file_name();				
		if(!$_SESSION['user_id']){	
			if($filename == 'myAccount.php'){
				$this->redirectUrl($CFG['site']['base_url'].'/index.php');
			}
			else{ 
					$this->redirectUrl($CFG['site']['base_url'].'/index.php');
				}
			}
		}
	
	#........................................................................................
	//User Logout
	function userLogout()
        {
    		global $CFG;			
    		session_destroy();
    		unset($_SESSION);		
    		#htaccess:
    		if($CFG['site']['userfriendly'] == 'Y'){
    			$this->redirectUrl($CFG['site']['base_url']);
    		}else{
    			$this->redirectUrl($CFG['site']['base_url']);
    		}		
    	}
	#........................................................................................
	//Admin Login
	function chkUserLogin(){
		global $CFG;
	
		$user_email	= $this->filterInput($_POST['user_email']);
		$Password	= $this->filterInput($_POST['user_password']);
		
		if($user_email)
			{
				$num_user 	= $this->getNumvalues($CFG['table']['register'],"(email='".$user_email."' OR username = '".$user_email."')AND password='".$Password."' AND log_status = '2' AND delete_status != 'deleted' ");
		 
				 $valid_user	= $this->getNumvalues($CFG['table']['register'],"(email='".$user_email."' OR username = '".$user_email."')AND password='".$Password."' AND log_status = '1' AND delete_status != 'deleted'");
				
				 $userId   = $this->getValue("user_id",$CFG['table']['register'],"(email='".$user_email."' OR username = '".$user_email."')AND password='".$Password."' LIMIT 1");
				 
				 $delStatus   = $this->getValue("delete_status",$CFG['table']['register'],"(email='".$user_email."' OR username = '".$user_email."') AND password='".$Password."' LIMIT 1");
				
				 $domain_id = $this->getValue("domain_id",$CFG['table']['domaindetails'],"user_id='".$userId."'");
			}		
		
		if($num_user == 1){
			$_SESSION['user_id'] = $userId;
			$_SESSION['domain_id'] = $domain_id;
			#Remember Me Cookie:
			if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'Yes')
			{
				setcookie("cookie_userEmail", stripslashes($_POST['user_email']), time()+3600*24*30);  /* expire in 30 days */
				setcookie("cookie_userName", stripslashes($_POST['username']), time()+3600*24*30);  /* expire in 30 days */
				setcookie("cookie_Password", stripslashes($_POST['user_password']), time()+3600*24*30);  /* expire in 30 days */				
			}
			else
			{
				setcookie("cookie_userEmail", '', time()-1000);
			    setcookie("cookie_userEmail", '', time()-1000, '/');
				setcookie("cookie_userName", '', time()-1000);
			    setcookie("cookie_userName", '', time()-1000, '/');
			    setcookie("cookie_Password", '', time()-1000);
			    setcookie("cookie_Password", '', time()-1000, '/');
			}	
			$this->user_authetic();		
		}
		elseif($valid_user == 1){
			echo "Pending";
			}
		elseif($delStatus == 'deleted'){
			$_SESSION['reset_user_id'] = $userId;
			echo "reset";
			}
		else{
			echo "Invalid_Login";
		}	
	}
	#............................................................................................................
	#USERSIDE CHANGE PWD
	function change_pwd_register()
        {  
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
                    global $CFG,$objSmarty;
            	  	$old_password = $this->filterInput($_POST["currentpass"]);
            	 	$new_password = $this->filterInput($_POST["newpass"]);
              		if($this->chkPassword($old_password,$_SESSION['user_id']))
            		 	{
            				$sql_regupdate	=	"UPDATE ".$CFG['table']['register']." SET password = '".$this->filterInput($_POST['confirm_newpass'])."'  WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
            				$res_regupdate	=	$this->ExecuteQuery($sql_regupdate,'update');
            				if($res_regupdate)
            					{
            						echo 'Your Password update Successfully';
            					}
            			}
            		else
            			{
            				echo "Invalid_Old_Pwd";			
            				exit();
            			}
                }    				 
    	} 
	#........................................................................................
	#ADMIN CHECK PWD
	function chkPassword($CurPwd, $userId){
		global $CFG;
		$AdminId   = $this->GetValue("user_id",$CFG['table']['register'],"password = '".$this->filterInput($CurPwd)."' AND user_id  = ".$this->filterInput($_SESSION['user_id'])." LIMIT 0,1");
		//echo $AdminId;die();
		if(!empty($AdminId))
		return true;
		else
		return false;
	}
	
	
	#-------------------------------------------------------------------------------------------------------------
  	#Forget Password
  	function forgetPass(){
		global $CFG,$objSmarty;
		
		$forgetemail	=	$this->filterInput($_POST['forgetemail']);
		
		$forgetpass		=	$this->getMultivalue('email,username,password,log_status',$CFG['table']['register'],"email = '".$forgetemail."'");
		$from_email		=	$this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id='1'");	
		
		if(count($forgetpass[0]['password']) > 0 && count($forgetpass[0]['password']) != 0){
			if($forgetpass[0]['log_status'] == '2'){
				$toemail    = $this->filterInput($_POST['forgetemail']);
				$password   = $this->filterInput($forgetpass[0]['password']);
				$username=$this->filterInput($forgetpass[0]['username']);
				$url				=	$_SERVER['HTTP_REFERER'].$_SERVER['QUERY_STRING'];
				$mail_content		=	$url." Your Password : ".$password;
				$mailsubject  		= 	$CFG['site']['sitename'].": Forgot Password Account information ";
			 	$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailForgetPassword.tpl");
		        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
		        $mail_content = str_replace('{STATUS}','',$mail_content);
		        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
		        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
		        $mail_content = str_replace('{URL}',$url,$mail_content);
		        $mail_content = str_replace('{YOURNAME}','Admin',$mail_content);
		        $mail_content = str_replace('{PASSWORD}',$password,$mail_content);
		        $mail_content = str_replace('{USERNAME}',$username,$mail_content);
		        $mail_content = str_replace('{EMAIL}',$toemail,$mail_content);
		        $mail_content = str_replace('{SITE_ADMIN_URL}',$CFG['site']['site_main_domain'],$mail_content); 
                $mail_content = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content);     
				//echo $mail_content;die();        
		        $ok = $this->sendMail($CFG['site']['sitename'],$from_email,$toemail,$mailsubject,$mail_content);
		        if($ok){
					 echo 'sendpass_success';
				}
			}else{
				echo 'activation_failed';
			}
		}else{
			echo 'no_email';
		}
   }
   
   //kathir Funtion 
  /**
   * Common::getDomainDetails()
   *
   * @return void
   */
   function getDomainDetails()
   	 {
   	    //echo __LINE__;die("test");
		global $CFG,$objSmarty;
		$sql_rent		=	"SELECT subdomainurl, theme_id, blog_id, store_id, domain_id, site_title, payment_status, validtodate, expire_grace_period FROM 
							".$CFG['table']['temp_domaindetails']." 							
							WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
		$res_rent		=	$this->ExecuteQuery($sql_rent,'select');        
        
        //print_r($res_rent);
        foreach($res_rent as $key=>$value)
            {
                
             $res_rent[$key]['original_remain_days'] = floor(($res_rent[$key]['validtodate']-time())/(60*60*24));
             $res_rent[$key]['grace_remain_days']    = floor(($res_rent[$key]['expire_grace_period']-time())/(60*60*24));
             if($res_rent[$key]['theme_id'])   
                {
                    $them_image=$this->getImagesForUserDetailsPage($res_rent[$key]['theme_id'],'site',$CFG['table']['thememanage']);
                    foreach($them_image as $key1=>$value1)
                        {
                             $res_rent[$key]['theme_image']=$them_image[$key1]['theme_image'];
                        }
                }
              if($res_rent[$key]['blog_id'])   
                {
                    $them_image=$this->getImagesForUserDetailsPage($res_rent[$key]['blog_id'],'blog',$CFG['table']['blogmanage']);
                    foreach($them_image as $key1=>$value1)
                        {
                             $res_rent[$key]['theme_image']=$them_image[$key1]['blog_image'];
                        }
                } 
               if($res_rent[$key]['store_id'])   
                {
                    $them_image=$this->getImagesForUserDetailsPage($res_rent[$key]['store_id'],'store',$CFG['table']['storemanage']);
                    foreach($them_image as $key1=>$value1)
                        {
                             $res_rent[$key]['theme_image']=$them_image[$key1]['store_image'];
                        }
                }                  
            }        
        #echo "<pre>"; print_r($res_rent); echo "<pre>";
        
		$objSmarty->assign('usersiteDetails',$res_rent);
	 }
   /**
    * Common::getThemeImagesForUserDetailsPage()
    *  to get image for userdetails page
    * @return void
    */
   function getImagesForUserDetailsPage($id,$type,$table)
        {
            global $CFG,$objSmarty;
            if($type=="site")
                {
                    $fields="theme_id,theme_image";
                    $cond="theme_id='".$id."'";
                }
            elseif($type=="blog")
                {
                    $fields="blog_id,blog_image";
                    $cond="blog_id='".$id."'";
                }
            else
                {
                    $fields="store_id,store_image";
                    $cond="store_id='".$id."'";
                }
    		$sql_rent		=	"SELECT ".$fields." FROM 
    							".$table." 							
    							WHERE ".$cond;
    		$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
            return $res_rent;
        }
     	 
  /**
   * Common::getPriceList()
   *
   * @return void
   */
	function getPriceList()
	  {
		global $CFG,$objSmarty;
		$sqlsel = "SELECT price_name,price_description,price FROM ".$CFG['table']['pricemanage']. " WHERE status = '1' order by price_id asc";
		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		$objSmarty->assign("priceval", $sqlres);
	  } 
	
  /**
   * Common::getThemeList()
   *
   * @return void
   */
	function getThemeList()
	  {
		global $CFG,$objSmarty;
		$sqlsel = "SELECT theme_id,theme_name,theme_description,theme_image,red_theme_image,green_theme_image,orange_theme_image,violet_theme_image,width,height,theme_thumb FROM ".$CFG['table']['thememanage']. " WHERE status = '1' AND deleted='no' order by theme_id asc";
		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        #echo "<pre>"; print_r($sqlres); echo "</pre>";exit;
        
		$objSmarty->assign("themeval", $sqlres);
	  }
	
  /**
   * Common::getBlogList()
   * This function is used to list the blog manangement in the page 
   * @return void
   */
	function getBlogList()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT blog_id,blog_name,blog_description,blog_image,red_blog_image,green_blog_image,orange_blog_image,violet_blog_image,width,height,blog_thumb FROM ".$CFG['table']['blogmanage']. " WHERE status = '1'  AND deleted='no' order by blog_id asc";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("blogval", $sqlres);
		}  
	
	function getStoreList()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT store_id,store_name,store_description,store_image,red_store_image,green_store_image,orange_store_image,violet_store_image,width,height,store_thumb FROM ".$CFG['table']['storemanage']. " WHERE status = '1' AND deleted='no' order by store_id asc";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("storeval", $sqlres);
		}  
	 
  /**
   * Common::accountListing()
   *
   * @return void
   */
	 function accountListing()
	 	{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT username,email,password FROM ".$CFG['table']['register']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("userdetails", $sqlres);
		} 
		
	/**
	 * Common::transactionListing()
	 * 
	 * @return void
	 */
	function transactionListing()
	 	{
			 global $CFG,$objSmarty;
			 //$sqlsel="SELECT pt.payment_fee,pt.payment_gross,pt.payment_date,pt.payment_types,DATEDIFF(re.subs_monthly_date,now()) as expire FROM ".$CFG['table']['paypal_transaction']." AS pt LEFT JOIN ".$CFG['table']['domaindetails']." AS re on re.user_id = pt.user_id where re.user_id='".$_SESSION['user_id']."' GROUP BY pt.id";
             $sqlsel="SELECT payment_fee,payment_gross,payment_date,payment_types,domain_id,DATEDIFF(subs_monthly_date,now()) as expire FROM ".$CFG['table']['paypal_transaction']."    where user_id='".$this->filterInput($_SESSION['user_id'])."' GROUP BY id";
             // $sqlsel="SELECT pt.payment_fee,pt.payment_gross,pt.payment_date,pt.payment_types,DATEDIFF(re.subs_monthly_date,now()) as expire FROM ".$CFG['table']['domaindetails']." AS re LEFT JOIN ".$CFG['table']['paypal_transaction']." as pt on re.pay_id = pt.id ";
             $sqlres =  $this->ExecuteQuery($sqlsel,'select');
			 $objSmarty->assign("transactiondetails", $sqlres);
		}  
        
		
  /**
   * Common::updatePassword()
   * This is the funtion is used to update the password
   * @return void
   */
	function updatePassword()
		{
			global $CFG,$objSmarty;
			$sql_regupdate	=	"UPDATE ".$CFG['table']['register']." SET password = '".$this->filterInput($_POST['confirm_newpass'])."'  WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			$res_regupdate	=	$this->ExecuteQuery($sql_regupdate,'update');
			if($res_regupdate){
			$objSmarty->assign('successmsg','Your Password update Successfully');
			}			
		}
	
  /**
   * Common::updateemail()
   * This funtion is used to update the email id of user
   * @return void
   */
	function updateemail()
		{
			global $CFG,$objSmarty;
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
                    $email_already =$this->getValue("email",$CFG['table']['register'],"email='".$this->filterInput($_POST['email'])."' AND user_id != '".$this->filterInput($_SESSION['user_id'])."'");
        		 	if($email_already)
        				{
        					echo "This Email already Exist try with another";
        					exit();	
        				}
        			else
        				{
        				 	$sql_regupdate	=	"UPDATE ".$CFG['table']['register']." SET email = '".$this->filterInput($_POST['email'])."' WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
        					$res_regupdate	=	$this->ExecuteQuery($sql_regupdate,'update');
        					if($res_regupdate){
        					echo 'Your Email update Successfully';
        					}
        				}
                }			
		}			
  /**
   * Common::updatefullname()
   * This funtion is used to update the fullname
   * @return void
   */
	function updatefullname()
		{
		     global $CFG,$objSmarty;
             if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
        			$user_already =$this->getValue("username",$CFG['table']['register'],"username='".$this->filterInput($_POST['fullname'])."' AND user_id != '".$this->filterInput($_SESSION['user_id'])."'");
        		 	if($user_already)
        				{
        					echo "This Fullname already Exist try with another";
        					exit();	
        				}
        			else
        				{
        				 	$sql_regupdate	=	"UPDATE ".$CFG['table']['register']." SET username = '".$this->filterInput($_POST['fullname'])."'  WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
                            $res	        =$this->ExecuteQuery($sql_regupdate,'update');
        					if($res){
        					echo 'Your fullname update Successfully';
        					}
        				}
               } 
		}
		
  /**
   * Common::getDetails()
   * This funtions is used to update 
   * @return void
   */
	function getDetails()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT username,email,password FROM ".$CFG['table']['register']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("userdetails", $sqlres);
		}
	
	//refer function 	
  /**
   * Common::insertReferDetails()
   *
   * @param mixed $value
   * @param mixed $mailsubject
   * @param mixed $mailcontent
   * @return void
   */
	function insertReferDetails($value,$mailsubject,$mailcontent)
		{
			global $CFG,$objSmarty;
			$sql_ins ="INSERT INTO ".$CFG['table']['referrals']." SET
						 domain_id		=	'".$this->filterInput($_SESSION['domain_id'])."',
						 user_id		=	'".$this->filterInput($_SESSION['user_id'])."',
						 referemail		=	'".$this->filterInput($value)."',
						 subject		=	'".$this->filterInput($mailsubject)."',
						 content		=	'".$this->filterInput($mailcontent)."',						 
						 addeddate		=	NOW();
							";
			$res_ins	=	$this->ExecuteQuery($sql_ins,'insert');
		}
	
  /**
   * Common::getRefereDetails()
   *
   * @return void
   */
	function getRefereDetails()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT a.referemail,a.addeddate,a.status FROM ".$CFG['table']['referrals']. " as a WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."' group by a.referemail";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("refererdetails", $sqlres);
		}
	//refer function ends
	//theme selectionfunctionlity
  /**
   * Common::ChkUserAlreadySelectedATheme()
   * This function is used to chek the user already select a theme or not 
   * @return
   */
	function ChkUserAlreadySelectedATheme()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT theme_id,theme_name FROM ".$CFG['table']['themeselection']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres;
		}
  /**
   * Common::InsertThemeSelection()
   * This function is used to insert a new theme
   * @return void
   */
	function InsertThemeSelection()
		{
			unset($_SESSION['themeOnuse']);
			unset($_SESSION['theme']);
			unset($_SESSION['blogonuse']);
			unset($_SESSION['blog']);
			global $CFG,$objSmarty;
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
                    $UpQuery  = "INSERT ".$CFG['table']['themeselection']." SET theme_id = '".$this->filterInput($_POST['theme_id'])."', theme_name =  '".$this->filterInput($_POST['theme_name'])."', theme_color = '".$this->filterInput($_POST['themecolor'])."', user_id ='".$this->filterInput($_SESSION['user_id'])."' ,selecteddate = NOW()";        
                    
        			$_SESSION['theme'] = 1; 
        			//$_SESSION['themeOnuse'] = 1; 
        			$_SESSION['popuponuse'] = 1; 
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    
                    $temp_insqry  = "INSERT ".$CFG['table']['temp_themeselection']." SET id ='".$this->filterInput($UpResult)."',  theme_id = '".$this->filterInput($_POST['theme_id'])."', theme_name =  '".$this->filterInput($_POST['theme_name'])."', theme_color = '".$this->filterInput($_POST['themecolor'])."', user_id ='".$this->filterInput($_SESSION['user_id'])."' ,selecteddate = NOW()";
                    $tem_insResult = mysql_query($temp_insqry) or die($this->mysql_error($UpQuery));
        			echo "sucess";
        			exit();
                }			
		}
	
  /**
   * Common::InsertBlogSelection()
   * This function is used to insert a selected theme
   * @return void
   */
	function InsertBlogSelection()
		{	
			unset($_SESSION['themeOnuse']);
			unset($_SESSION['theme']);
			unset($_SESSION['blogonuse']);
			unset($_SESSION['blog']);
			global $CFG,$objSmarty;
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
        			$UpQuery  = "INSERT ".$CFG['table']['blogselection']." SET blog_id = '".$this->filterInput($_POST['blog_id'])."', blog_name =  '".$this->filterInput($_POST['blog_name'])."', blog_color = '".$this->filterInput($_POST['blogcolor'])."' ,user_id ='".$this->filterInput($_SESSION['user_id'])."' ,selecteddate = NOW()";
        			$_SESSION['blog'] = 1;
        			//$_SESSION['blogonuse'] = 1;
        			$_SESSION['popuponuse'] = 1; 
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    
                    $temp_insqry  = "INSERT ".$CFG['table']['temp_blogselection']." SET id ='".$this->filterInput($UpResult)."',  blog_id = '".$this->filterInput($_POST['blog_id'])."', blog_name =  '".$this->filterInput($_POST['blog_name'])."', blog_color = '".$this->filterInput($_POST['blogcolor'])."', user_id ='".$this->filterInput($_SESSION['user_id'])."' ,selecteddate = NOW()";
                    $tem_insResult = mysql_query($temp_insqry) or die($this->mysql_error($UpQuery));
                    
        			echo "sucess";
        			exit();
                }
		}
	//insert the store selection
	function InsertStoreSelection()
		{	
			unset($_SESSION['themeOnuse']);
			unset($_SESSION['theme']);
			unset($_SESSION['blogonuse']);
			unset($_SESSION['blog']);
			global $CFG,$objSmarty;
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
        			$UpQuery  = "INSERT ".$CFG['table']['storeselection']." SET store_id = '".$this->filterInput($_POST['store_id'])."', store_name =  '".$this->filterInput($_POST['store_name'])."', store_color = '".$this->filterInput($_POST['storeColor'])."' ,user_id ='".$this->filterInput($_SESSION['user_id'])."' ,selecteddate = NOW()";
        			$_SESSION['store'] = 1;
        			//$_SESSION['blogonuse'] = 1;
        			$_SESSION['popuponuse'] = 1; 
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			echo "sucess";
        			exit();
                }
		}
	//update blog selection
	function updateBlogSelection()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['blogselection']." SET blog_id = '".$this->filterInput($_POST['blog_id'])."', blog_name =  '".$this->filterInput($_POST['blog_name'])."',selecteddate = NOW() WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			echo "updatesucess";
			exit();
		}		
  /**
   * Common::updateThemeSelection()
   * This function is used to update a new theme
   * @return void
   */
	function updateThemeSelection()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['themeselection']." SET theme_id = '".$this->filterInput($_POST['theme_id'])."', theme_name =  '".$this->filterInput($_POST['theme_name'])."',selecteddate = NOW() WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			echo "updatesucess";
			exit();
		}
	//delete account
  /**
   * Common::deleteAccountOfUser()
   * This function is used to delete the user account 
   * @return void
   */
	function deleteAccountOfUser()
		{
			global $CFG,$objSmarty;
            
             if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['register']." SET delete_status = 'deleted' WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['pages']." WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                       
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['temp_pages']." WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['domaindetails']." WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));                                        
                    
        			$UpQuery  = "DELETE  FROM ".$CFG['table']['temp_domaindetails']." WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['page_list']." WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['temp_pagelist']." WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));                                                                                echo "deletesucess";
        			
                }
                exit();				
		}		
  /**
   * Common::InsertSuggestion()
   * This function is used to insert a suggestion
   * @return void
   */
	function InsertSuggestion()
		{
			global $CFG,$objSmarty;
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
                    $UpQuery  = "INSERT ".$CFG['table']['suggesstion']." SET suggesstion_descrip = '".$this->filterInput($_POST['deleteopnion'])."',user_id ='".$this->filterInput($_SESSION['user_id'])."' ,addeddate = NOW()"; 
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }	
		}	
  /**
   * Common::ChkUserHaveDomain()
   * This function is used to check the user have doamin or not if not means open the popup
   * @return void
   */
	function ChkUserHaveDomain()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT domain_id FROM ".$CFG['table']['domaindetails']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres;
		}
	
  /**
   * Common::ChkDomainUrlIsAlreadyPresent()
   * This function is used to check the domain url is present or not 
   * @return
   */
	function ChkDomainUrlIsAlreadyPresent()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT subdomainurl FROM ".$CFG['table']['domaindetails']. " WHERE subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
            
            $sqlsel1 = "SELECT subdomainurl FROM ".$CFG['table']['temp_domaindetails']. " WHERE subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."'";
			$sqlres1 =  $this->ExecuteQuery($sqlsel1,'select');
            
            if($sqlres)return $sqlres;
            else if($sqlres1) return $sqlres1;
            else return $sqlres;
			
		}
	function ChkDomainUrlForSettings()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'])
                {
                    $sqlsel = "SELECT subdomainurl FROM ".$CFG['table']['domaindetails']. " WHERE subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."' AND domain_id != '".$this->filterInput($_POST['domain_id'])."'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			
                    
                     $sqlsel1 = "SELECT subdomainurl FROM ".$CFG['table']['temp_domaindetails']. " WHERE subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."' AND domain_id != '".$this->filterInput($_POST['domain_id'])."'";
        			$sqlres1 =  $this->ExecuteQuery($sqlsel1,'select');
        			
                    if($sqlres)return $sqlres;
                    else if($sqlres1) return $sqlres1;
                    else return $sqlres1;
                }		
		} 
		
  /**
   * Common::InsertdomainUrl()
   * This function is used to insert a domain url
   * @return
   */
	function InsertdomainUrl()
		{
			global $CFG,$objSmarty;	
			unset($_SESSION['popuponuse']);
            $conditon = '';
            $password = '';
           /* if(isset($_POST['type']) && !empty($_POST['type'])){
                $password = rand(pow(10, 8-1), pow(10, 8)-1);
                $conditon = ", sd_password = '".$password."' ";
            }  */ 
            $password = rand(pow(10, 8-1), pow(10, 8)-1);
            $conditon = ", sd_password = '".$password."' ";
            $validtotimestr = strtotime(date('d-m-Y'))+((86400*30)-60);            
                
			if($_SESSION['theme'] && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
				{
					unset($_SESSION['blogonuse']);
					unset($_SESSION['storeonuse']);
					unset($_SESSION['blog']);
					unset($_SESSION['store']);
				 	$_SESSION['themeOnuse'] = 1;                     
                    
			        $UpQuery = "INSERT ".$CFG['table']['domaindetails']." SET subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."',site_title = 'My Site', domain_type = '".$_POST['type']."', user_id ='".$this->filterInput($_SESSION['user_id'])."' ,theme_id ='".$this->filterInput($_POST['theme_id'])."',validfromdate = '".time()."', validtodate = '".$validtotimestr."', addeddate = NOW()$conditon"; 
                    $UpResult =	$this->ExecuteQuery($UpQuery,'insert');
                    $LastInsertedRow = mysql_insert_id();
                    
                    $temp_query = "INSERT ".$CFG['table']['temp_domaindetails']." SET domain_id = '".$this->filterInput($UpResult)."',subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."',site_title = 'My Site', domain_type = '".$_POST['type']."', user_id ='".$this->filterInput($_SESSION['user_id'])."' ,theme_id ='".$this->filterInput($_POST['theme_id'])."',validfromdate = '".time()."', validtodate = '".$validtotimestr."',addeddate = NOW()$conditon";
                    $tempResult =	$this->ExecuteQuery($temp_query,'insert');
                    
					$_SESSION['domain_id'] = $UpResult;
					$this->updateDomainIdInThemeSelection($_SESSION['domain_id']);
                    
					$page_id   = $this->InsertPageDetails($pagename='Home',$seo_title='home',$page_layout='short',$page_desc='home page',$meta_key='Home',$blog_comment='0',$store_comment='0',$setmain='Y');
					//$this->defaultpageList($UpResult,$page_id,$_POST['theme_id']);
                    $this->InsertPageDetails($pagename='About Us',$seo_title='about-us',$page_layout='tall',$page_desc='',$meta_key='',$blog_comment='0',$store_comment='0',$setmain='N');
					$this->InsertPageDetails($pagename='Contact us',$seo_title='contact-us',$page_layout='tall',$page_desc='',$meta_key='',$blog_comment='0',$store_comment='0',$setmain='N');
			
                    $this->sendMailForTheme($password);
					echo "insertsucess";
				}
			elseif($_SESSION['blog'] && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
				{
					unset($_SESSION['themeOnuse']);
					unset($_SESSION['storeonuse']);
					unset($_SESSION['theme']);
					unset($_SESSION['store']);
					
					$_SESSION['blogonuse'] = 1;
                    				      
				   $UpQuery = "INSERT ".$CFG['table']['domaindetails']." SET subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."',site_title = 'My Site', domain_type = 'SD',user_id ='".$this->filterInput($_SESSION['user_id'])."' ,blog_id ='".$this->filterInput($_POST['blog_id'])."', validfromdate = '".time()."', validtodate = '".$validtotimestr."', addeddate = NOW()$conditon"; 
				   $UpResult =	$this->ExecuteQuery($UpQuery,'insert');
                
                    $temp_query = "INSERT ".$CFG['table']['temp_domaindetails']." SET domain_id = '".$this->filterInput($UpResult)."',subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."',site_title = 'My Site', domain_type = 'SD' ,user_id ='".$this->filterInput($_SESSION['user_id'])."' ,blog_id ='".$this->filterInput($_POST['blog_id'])."', validfromdate = '".time()."', validtodate = '".$validtotimestr."', addeddate = NOW()$conditon";
                    $tempResult =	$this->ExecuteQuery($temp_query,'insert');
                    
					$_SESSION['domain_id'] = $UpResult;
					$this->updateDomainIdInBlogSelection($_SESSION['domain_id']);
					$this->InsertBlogSetting();
					$this->InsertPageDetails($pagename='Blog',$seo_title='blog',$page_layout='short',$page_desc='Blog',$meta_key='Blog',$blog_comment='1',$store_comment='0',$setmain='Y');
					$this->InsertPageDetails($pagename='About Us',$seo_title='about-us',$page_layout='tall',$page_desc='',$meta_key='',$blog_comment='0',$store_comment='0',$setmain='N');
					$this->InsertPageDetails($pagename='Contact us',$seo_title='contact-us',$page_layout='tall',$page_desc='',$meta_key='',$blog_comment='0',$store_comment='0',$setmain='N');
					$this->sendMailForBlog($password);
					echo "insertsucess";
				}		
		/*	elseif( $_SESSION['store'] && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
				{
					unset($_SESSION['themeOnuse']);
					unset($_SESSION['blogonuse']);
					unset($_SESSION['theme']);
					unset($_SESSION['blog']);
					
					$_SESSION['storeonuse'] = 1;
					$UpQuery = "INSERT ".$CFG['table']['domaindetails']." SET subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."',site_title = 'My Site', domain_type = '".$_POST['type']."', user_id ='".$this->filterInput($_SESSION['user_id'])."' ,store_id ='".$this->filterInput($_POST['store_id'])."',addeddate = NOW()$conditon"; 
					$UpResult =	$this->ExecuteQuery($UpQuery,'insert');
					$_SESSION['domain_id'] = $UpResult;
					$this->updateDomainIdInStoreSelection($_SESSION['domain_id'],$_POST['store_id']);
					$this->InsertPageDetails($pagename='Store',$seo_title='store',$page_layout='short',$page_desc='Blog',$meta_key='Blog',$blog_comment='0',$store_comment='1',$setmain='Y');
					$this->InsertPageDetails($pagename='About Us',$seo_title='about-us',$page_layout='tall',$page_desc='',$meta_key='',$blog_comment='0',$store_comment='0',$setmain='N');
					$this->InsertPageDetails($pagename='Contact us',$seo_title='contact-us',$page_layout='tall',$page_desc='',$meta_key='',$blog_comment='0',$store_comment='0',$setmain='N');
					$this->sendMailForStore();
					echo "insertsucess";
				}	*/	
			
		}
   /**
   * Common::sendMailForTheme()
   *
   * @return void
   */
	function sendMailForTheme($password)
		{
			global $CFG,$objSmarty;	
            if(isset($password) && !empty($password))
                 $PWD_CONDENT = '<tr>
				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Subdomain Password</b> : "'.$password.'"</td>
			</tr>';
            
			$mailsubject='Regarding Theme Creation';
			$name=$CFG['site']['sitename'];
			$username=$this->getUserName($this->filterInput($_SESSION['user_id']));
			$to_email= $this->getValue("email",$CFG['table']['register'],"username='".$this->filterInput($username)."'");
			$from_email= $this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id='1'");
			$subdomainurl = $this->getValue("subdomainurl",$CFG['table']['domaindetails'],"domain_id='".$this->filterInput($_SESSION['domain_id'])."'");
			$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailThemeCreation.tpl");
	        $mail_content = str_replace('{STATUS}','Hi,We are excited to let you invited to '.$CFG['site']['site_main_domain'],$mail_content);
	        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
	        $mail_content = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_content);
	        $mail_content = str_replace('{SINCERELY}','Sincerely,',$mail_content);
	        $mail_content = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' Team',$mail_content);
	        $mail_content = str_replace('{INFO}','Hi '.$username.',',$mail_content);
			$mail_content = str_replace('{INFO_LEFT}','Thank you for creating a website in our site, and your site link is',$mail_content);
            $mail_content = str_replace('{PWD_CONT}',$PWD_CONDENT,$mail_content);
			$mail_content = str_replace('{INFO_LINK}',$subdomainurl,$mail_content);
			$mail_content = str_replace('{INFO_RIGHT}','You must to be very proud! We are happy and excited for you.',$mail_content);
	        //echo $mail_content;
	        $ok=$this->sendMail($name,$from_email,$to_email,$mailsubject,$mail_content);
	        if($ok)
	        	{
					$username=$this->getUserName($_SESSION['user_id']);
					$from_email   = $this->getValue("email",$CFG['table']['register'],"username='".$this->filterInput($username)."'");
					$admin_email  = $this->getValue("admin_email",$CFG['table']['sitesetting'],"id='1'");
					$mail_body    = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailThemeCreation.tpl");
					$mail_body    = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);
					$mail_body    = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_body);
					$mail_body    = str_replace('{STATUS}','Hi,We are excited to let you inform to this,',$mail_body);
			        $mail_body    = str_replace('{INFO}','Hi admin,',$mail_body);
			        $mail_body    = str_replace('{INFO_LEFT}',$username.' has successfully created one new theme in your site',$mail_body);
                    $mail_body    = str_replace('{PWD_CONT}',$PWD_CONDENT,$mail_body);
					$mail_body    = str_replace('{INFO_LINK}','',$mail_body);
					$mail_body    = str_replace('{INFO_RIGHT}','',$mail_body);
			        $mail_body    = str_replace('{INFO_CONTENT}','',$mail_body);
			        $mail_body    = str_replace('{SINCERELY}','Sincerely,',$mail_body);
			        $mail_body    = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' Team',$mail_body);
                    $mail_body    = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_body);
                    
			        //echo $mail_body;die();
			        $ok=$this->sendMail($username,$from_email,$admin_email,$mailsubject,$mail_body);
				}
		}
   /**
   * Common::sendMailForBlog()
   *
   * @return void
   */
	function sendMailForBlog($password)
		{
			global $CFG,$objSmarty;	
            if(isset($password) && !empty($password))
                 $PWD_CONDENT = '<tr>
				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Subdomain Password</b> : "'.$password.'"</td>
			</tr>';
            
			$mailsubject='Regarding Blog Creation';
			$name=$CFG['site']['sitename'];
			$username=$this->getUserName($this->filterInput($_SESSION['user_id']));
			$to_email= $this->getValue("email",$CFG['table']['register'],"username='".$this->filterInput($username)."'");
			$from_email= $this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id = '1'");
			$subdomainurl = $this->getValue("subdomainurl",$CFG['table']['domaindetails'],"domain_id='".$this->filterInput($_SESSION['domain_id'])."'");
			$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailBlogCreation.tpl");
	        $mail_content = str_replace('{STATUS}','Hi,We are excited to let you invited to '.$CFG['site']['site_main_domain'],$mail_content);
	        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
	        $mail_content = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_content);
	        $mail_content = str_replace('{SINCERELY}','Sincerely,',$mail_content);
	        $mail_content = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' Team',$mail_content);
	        $mail_content = str_replace('{INFO}','Hi '.$username.',',$mail_content);
            $mail_content = str_replace('{INFO_LEFT}','Thank you for creating a website in our blog, and your blog link is',$mail_content);
			$mail_content = str_replace('{INFO_LINK}',$subdomainurl,$mail_content);
			$mail_content = str_replace('{INFO_RIGHT}','You must to be very proud! We are happy and excited for you.',$mail_content);
			//echo $mail_content; die();
	       $ok=$this->sendMail($name,$from_email,$to_email,$mailsubject,$mail_content);
	       $ok=1;
	        if($ok)
	        	{
					$username=$this->getUserName($this->filterInput($_SESSION['user_id']));
					$from_email= $this->getValue("email",$CFG['table']['register'],"username='".$this->filterInput($username)."'");
					$admin_email= $this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id = '1'");
				    $mail_body    = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailBlogCreation.tpl");
					$mail_body    = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);
					$mail_body    = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_body);
					$mail_body    = str_replace('{STATUS}','Hi,We are excited to let you inform to this,',$mail_body);
			        $mail_body    = str_replace('{INFO}','Hi admin,',$mail_body);
			        $mail_body    = str_replace('{INFO_LEFT}',$username.' has successfully created one new blog in your site',$mail_body);
					$mail_body    = str_replace('{INFO_LINK}','',$mail_body);
					$mail_body    = str_replace('{INFO_RIGHT}','',$mail_body);
			        $mail_body    = str_replace('{INFO_CONTENT}','',$mail_body);
			        $mail_body    = str_replace('{SINCERELY}','Sincerely,',$mail_body);
			        $mail_body    = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' Team',$mail_body);
			        $ok=$this->sendMail($username,$from_email,$admin_email,$mailsubject,$mail_body);
				}
		}
	function sendMailForStore()
		{
			global $CFG,$objSmarty;	
			$mailsubject='Regarding Store Creation';
			$name=$CFG['site']['sitename'];
			$username=$this->getUserName($this->filterInput($_SESSION['user_id']));
			$to_email= $this->getValue("email",$CFG['table']['register'],"username='".$this->filterInput($username)."'");
			$from_email= $this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id = '1'");
			$subdomainurl = $this->getValue("subdomainurl",$CFG['table']['domaindetails'],"domain_id='".$this->filterInput($_SESSION['domain_id'])."'");
			$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailStoreCreation.tpl");
	        $mail_content = str_replace('{STATUS}','Hi,We are excited to let you invited to '.$CFG['site']['site_main_domain'],$mail_content);
	        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
	        $mail_content = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_content);
	        $mail_content = str_replace('{SINCERELY}','Sincerely,',$mail_content);
	        $mail_content = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' Team',$mail_content);
	        $mail_content = str_replace('{INFO}','Hi '.$username.',',$mail_content);
            $mail_content = str_replace('{INFO_LEFT}','Thank you for creating a website in our Store, and your store link is',$mail_content);
			$mail_content = str_replace('{INFO_LINK}',$subdomainurl,$mail_content);
			$mail_content = str_replace('{INFO_RIGHT}','You must to be very proud! We are happy and excited for you.',$mail_content);
			//echo $mail_content; die();
	       $ok=$this->sendMail($name,$from_email,$to_email,$mailsubject,$mail_content);
	       $ok=1;
	        if($ok)
	        	{
					$username=$this->getUserName($this->filterInput($_SESSION['user_id']));
					$from_email= $this->getValue("email",$CFG['table']['register'],"username='".$this->filterInput($username)."'");
					$admin_email= $this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id = '1'");
				    $mail_body    = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailStoreCreation.tpl");
					$mail_body    = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);
					$mail_body    = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_body);
					$mail_body    = str_replace('{STATUS}','Hi,We are excited to let you inform to this,',$mail_body);
			        $mail_body    = str_replace('{INFO}','Hi admin,',$mail_body);
			        $mail_body    = str_replace('{INFO_LEFT}',$username.' has successfully created one new store in your site',$mail_body);
					$mail_body    = str_replace('{INFO_LINK}','',$mail_body);
					$mail_body    = str_replace('{INFO_RIGHT}','',$mail_body);
			        $mail_body    = str_replace('{INFO_CONTENT}','',$mail_body);
			        $mail_body    = str_replace('{SINCERELY}','Sincerely,',$mail_body);
			        $mail_body    = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' Team',$mail_body);
			        $ok=$this->sendMail($username,$from_email,$admin_email,$mailsubject,$mail_body);
				}
		}
	
  /**
   * Common::InsertBlogSetting()
   * This function is used to insert a blog settings
   * @return void
   */
	function InsertBlogSetting()
		{
			global $CFG,$objSmarty;
			$notify_email	= 	$this->getValue("email",$CFG['table']['register'],"user_id='".$this->filterInput($_SESSION['user_id'])."'");
			$UpQuery  = "INSERT ".$CFG['table']['blogsettings']." SET domain_id = '".$this->filterInput($_SESSION['domain_id'])."',user_id = '".$this->filterInput($_SESSION['user_id'])."', blog_id ='".$this->filterInput($_POST['blog_id'])."',notifyme_email='".$this->filterInput($notify_email)."' ,addeddate = NOW()"; 
			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
			return true;			
		}	
	
  /**
   * Common::InsertPageDetails()
   * This function is used to insert a page title
   * @return void
   */
	function InsertPageDetails($pagename,$seo_title,$page_layout,$page_desc,$meta_key,$blog_comments,$store_comment,$setmain)
		{
			global $CFG,$objSmarty;		
          	$UpQuery = "INSERT ".$CFG['table']['temp_pages']." SET domain_id = '".$this->filterInput($_SESSION['domain_id'])."',pagename ='".$this->filterInput($pagename)."' ,seo_title ='".$this->filterInput($seo_title)."',page_layout ='".$this->filterInput($page_layout)."',page_desc ='".$this->filterInput($page_desc)."',meta_key ='".$this->filterInput($meta_key)."',blog_comments= '".$this->filterInput($blog_comments)."',store_comment= '".$this->filterInput($store_comment)."',main_page='".$setmain."',publish_status='U' "; 
			$UpResult =	$this->ExecuteQuery($UpQuery,'insert');
			return $UpResult;
		}	
	
	
  /**
   * Common::updateDomainIdInThemeSelection()
   * This function is iused to update the thme selectiopn
   * @param mixed $domain_id
   * @return
   */
	function updateDomainIdInThemeSelection($domain_id)
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['themeselection']." SET domain_id = '".$this->filterInput($domain_id)."' WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."' AND domain_id='0'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
            
            $temp_upqury  = "UPDATE ".$CFG['table']['temp_themeselection']." SET domain_id = '".$this->filterInput($domain_id)."' WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."' AND domain_id='0'";
			$temp_upres = mysql_query($temp_upqury) or die($this->mysql_error($temp_upqury));
            
			return true;
		}
	
  /**
   * Common::updateDomainIdInBlogSelection()
   * This function is used to update the blog selection
   * @return
   */
	function updateDomainIdInBlogSelection($domain_id)
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['blogselection']." SET domain_id = '".$this->filterInput($domain_id)."' WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."' AND domain_id='0'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
            
            $UpQuery  = "UPDATE ".$CFG['table']['temp_blogselection']." SET domain_id = '".$this->filterInput($domain_id)."' WHERE user_id ='".$this->filterInput($_SESSION['user_id'])."' AND domain_id='0'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			return true;
		}	
	function updateDomainIdInStoreSelection($domain_id,$store_id)
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['storeselection']." SET domain_id = '".$this->filterInput($domain_id)."' WHERE store_id ='".$this->filterInput($store_id)."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			return true;
		}
  /**
   * Common::getCurrentDomainDetails()
   * its used to get the currrent domain details
   * @return void
   */
	function getCurrentDomainDetails()
		{
			global $CFG,$objSmarty;
			if(isset($_SESSION['user_id']) && isset($_SESSION['domain_id']))
                {
                    $sql_rent		=	" SELECT subdomainurl,footer_content,theme_id,site_title,'ssl',favicon_image,header_logo_config,header_title, ".
                                        " site_password,navigation,facebook_connected,site_description,metakeywords,footer_code,header_code,seo_optimize,".
                                        " payment_status, validtodate, expire_grace_period ".
                                        " FROM ".$CFG['table']['temp_domaindetails']." ".							
        								" WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."' ".
                                        " AND domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";                   
        			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
                    #print_r($res_rent);
        			$objSmarty->assign('settingpage',$res_rent);                
                }             
		}
	
  /**
   * Common::updateDomainDetails()
   * This function is used to update the domain details
   * @return
   */
	function updateDomainDetails($column,$value)
		{
			global $CFG,$objSmarty;		
            if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
                {
                    $publish_status='U';
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET $column = '".$this->filterInput($value)."',publish_status= '".$this->filterInput($publish_status)."' WHERE user_id= '".$this->filterInput($_SESSION['user_id'])."' AND domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
                	$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }            
		}
		
  /**
   * Common::DeleteSubDomain()
   * This function is used to delete the subdamin process
   * @return void
   */
	function DeleteSubDomain()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '')
                {
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['domaindetails']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['temp_domaindetails']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
                	$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }			
		}	
  /**
   * Common::DeleteSubDomainTheme()
   * This function is used to delete the theme selection in the subdomain process
   * @return void
   */
	function DeleteSubDomainTheme()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '')
                {
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['themeselection']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }			
		}
	
  /**
   * Common::CommonDeleteFunction()
   * This function is used to delete the domain id in table we can use this in common
   * @param mixed $table
   * @return
   */
	function CommonDeleteFunction($table)
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '')
                {
                    $UpQuery  = "DELETE  FROM ".$table." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
    			    return true;
                }			
		}	
	
  /**
   * Common::DeleteSubDomainBlog()
   * This function is used to delete the blog when we delete the site function 
   * @return
   */
	function DeleteSubDomainBlog()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '' )
                {
                    $UpQuery  = "DELETE  FROM ".$CFG['table']['blogselection']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true; 
                }			
		}	
	function DeleteSubDomainStore()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '' )
                {
        			$UpQuery  = "DELETE  FROM ".$CFG['table']['storeselection']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }
		}
	
  /**
   * Common::deleteBlogComment()
   * This function is used to update the delete record in the table
   * @return void
   */
	function deleteBlogComment($domain_id,$id)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $id != '')
                {
                    $status='delete';
        			//$UpQuery  = "DELETE  FROM ".$CFG['table']['commentdetails']." WHERE domain_id ='".$domain_id."' AND comment_id ='".$id."'";
        			$UpQuery  = "UPDATE ".$CFG['table']['commentdetails']." SET status = '".$status."' WHERE domain_id ='".$this->filterInput($domain_id)."' AND comment_id ='".$this->filterInput($id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
   /**
    * Common::spamBlogComment()
   *
   * @param mixed $domain_id
   * @param mixed $id
   * @return void
   */
	function spamBlogComment($domain_id,$id)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $id !='')
                {
                    $status='markspam';
        			$UpQuery  = "UPDATE ".$CFG['table']['commentdetails']." SET status = '".$this->filterInput($status)."' WHERE domain_id ='".$this->filterInput($domain_id)."' AND comment_id ='".$this->filterInput($id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}

   /**
   * Common::updateBlogComment()
   *
   * @param mixed $domain_id
   * @param mixed $id
   * @return void
   */
	function updateBlogComment($domain_id,$id)	
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $id != '')
                {
                    $status='approve';
        			$UpQuery  = "UPDATE ".$CFG['table']['commentdetails']." SET status = '".$this->filterInput($status)."' WHERE domain_id ='".$this->filterInput($domain_id)."' AND comment_id ='".$this->filterInput($id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }		
		}	
	
  /**
   * Common::ListTheUserSelectedTheme()
   * Its to select the theme and show it 
   * @return void
   */
	function ListTheUserSelectedTheme()
		{
			global $CFG,$objSmarty;
			#$sqlsel = "SELECT theme_id FROM ".$CFG['table']['themeselection']. " WHERE user_id = '".$_SESSION['user_id']."' AND domain_id = '0' ORDER BY id DESC";     
            $sqlsel = "SELECT theme_id FROM ".$CFG['table']['temp_themeselection']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."' AND domain_id = '0' ORDER BY id DESC"; 
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
            
			if($sqlres[0]['theme_id'])
				{
					$sqltheme = "SELECT theme_image,theme_id,theme_name FROM ".$CFG['table']['thememanage']. " WHERE theme_id = '".$this->filterInput($sqlres[0]['theme_id'])."'";
					$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
					$objSmarty->assign("themelist", $sqlthemeres);
				}
			else
				{
					return false;
				}	
		}
	
  /**
   * Common::ListTheUserSelectedBlog()
   * This is the function is used to list the selected blog by the users 
   * @return
   */
	function ListTheUserSelectedBlog()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT blog_id FROM ".$CFG['table']['blogselection']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."' AND domain_id = '0' ORDER BY id DESC";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			if($sqlres[0]['blog_id'])
				{
					$sqltheme = "SELECT blog_image,blog_id,blog_name FROM ".$CFG['table']['blogmanage']. " WHERE blog_id = '".$this->filterInput($sqlres[0]['blog_id'])."'";
					$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
					$objSmarty->assign("bloglist", $sqlthemeres);
				}
			else
				{
					return false;
				}	
		}
	
	function ListTheUserSelectedStore()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT store_id FROM ".$CFG['table']['storeselection']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."' AND domain_id = '0' ORDER BY id DESC";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			if($sqlres[0]['store_id'])
				{
					$sqltheme = "SELECT store_image,store_id,store_name FROM ".$CFG['table']['storemanage']. " WHERE store_id = '".$this->filterInput($sqlres[0]['store_id'])."'";
					$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
					$objSmarty->assign("storelist", $sqlthemeres);
				}
			else
				{
					return false;
				}	
		}
	
  /**
   * Common::updateTheSettingOfBlog()
   * This function is used to update the setting page 
   * @return
   */
	function updateTheSettingOfBlog()
		{
			global $CFG,$objSmarty;
			if($_POST['sharebutton'] == '')
				$_POST['sharebutton']=0;
			
			$UpQuery  = "UPDATE ".$CFG['table']['blogsettings']." SET comment_default  = '".$this->filterInput($_POST['commentdefault'])."',post_perpage = '".$this->filterInput($_POST['postperpage'])."',notifyme  = '".$this->filterInput($_POST['notifyme'])."',notifyme_email  = '".$this->filterInput($_POST['notifyme_email'])."',automaticallyclose= '".$this->filterInput($_POST['automaticallyclose'])."',comment_spamprotect= '".$this->filterInput($_POST['comment_spamprotect'])."',comment_spammoderation= '".$this->filterInput($_POST['comment_spammoderation'])."',sharebutton='".$this->filterInput($_POST['sharebutton'])."' WHERE  domain_id='".$this->filterInput($_POST['domain_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			return true;
		}
	
  /**
   * Common::ListBlogSettingDetails()
   * This function is used to list the setting details of the user
   * @return void
   */
	function ListBlogSettingDetails($domain_id)
		{
			global $CFG,$objSmarty;
			$sqltheme = "SELECT comment_default,post_perpage,notifyme,notifyme_email,automaticallyclose,comment_spamprotect,comment_spammoderation,sharebutton FROM ".$CFG['table']['blogsettings']. " WHERE  domain_id='".$this->filterInput($domain_id)."'";
			$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
			$objSmarty->assign("blogsetting_list", $sqlthemeres);
		}
	
  /**
   * Common::ListtheCommentDetails()
   * This function is used to list the comment details in the file 
   * @return void
   */
	function ListtheCommentDetails($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqltheme = "SELECT comment_id,domain_id,comments,commented_on,commented_by,status,pending,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']. " WHERE domain_id ='".$this->filterInput($domain_id)."' AND status !='delete' ";
        			$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
        			$objSmarty->assign("commentdetails", $sqlthemeres);
                }		
		}
   /**
   * Common::listonlyDeletedComments()
   *
   * @param mixed $domain_id
   * @return void
   */
	function listonlyDeletedComments($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqltheme = "SELECT comment_id,domain_id,comments,commented_on,commented_by,status,pending,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']. " WHERE domain_id ='".$this->filterInput($domain_id)."' AND status ='delete' ";
        			$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
        			$objSmarty->assign("commentdetails", $sqlthemeres);
                }			
		}
   /**
   * Common::listonlyRecentComments()
   *
   * @return void
   */
	function listonlyRecentComments($domain_id)
		{
			global $CFG,$objSmarty;
			$sqltheme = "SELECT comment_id,domain_id,comments,commented_on,commented_by,status,pending,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']. " WHERE domain_id ='".$this->filterInput($domain_id)."' AND date(addeddate)=date(now()) ";
			$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
			$objSmarty->assign("commentdetails", $sqlthemeres);
		}
   /**
   * Common::listonlySpamComments()
   *
   * @param mixed $domain_id
   * @return void
   */
	function listonlySpamComments($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqltheme = "SELECT comment_id,domain_id,comments,commented_on,commented_by,status,pending,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']. " WHERE domain_id ='".$this->filterInput($domain_id)."' AND status='markspam' ";
        			$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
        			$objSmarty->assign("commentdetails", $sqlthemeres);
                }			
		}
	function listonlyNotApproveComments($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqltheme = "SELECT comment_id,domain_id,comments,commented_on,commented_by,status,pending,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']. " WHERE domain_id ='".$this->filterInput($domain_id)."' AND status='not_approve' ";
        			$sqlthemeres =  $this->ExecuteQuery($sqltheme,'select');
        			$objSmarty->assign("commentdetails", $sqlthemeres);
                }			
		}	
	
  /**
   * Common::getParicularDomainDetails()
   * This function is used to get the particular domain details 
   * @param mixed $domain_id
   * @return void
   */
	function getParicularDomainDetails($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sql_rent		=	"SELECT subdomainurl,site_title,theme_id,blog_id,domain_id FROM 
        								".$CFG['table']['domaindetails']." 							
        								WHERE domain_id = '".$this->filterInput($domain_id)."'";
        			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
        			$objSmarty->assign('seperatedetails',$res_rent);
                }			
		}														
	
  /**
   * Common::chkIsEmailOrNot()
   * This function is used to check the email is valid
   * @param mixed $value
   * @return
   */
	function chkIsEmailOrNot($value)
		{
			//print_r($value);die();
		//	$is_ok = (preg_match("/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/i", $value));
			$is_ok = (preg_match("/^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/i", $value));
			//echo $is_ok;die();
			if (!$is_ok)
				return false;
			else
				return true;
		}
  /**
   * Common::chkIsValidURL()
   * This function is used to validte the given url is correct or not
   * @return void
   */
	function chkIsValidURL($value)
		{
			$is_ok = (preg_match("/^http.+\..+$/i", $value));
			if (!$is_ok)
				return false;
		}
	
  /**
   * Common::commonFunctionForSingleValue()
   * This function is used we can get a single value from the query
   * @param mixed $table
   * @param mixed $value
   * @param mixed $cond
   * @return
   */
	function commonFunctionForSingleValue($table,$value,$confor,$cond)
		{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT $value FROM 
								".$table." 							
								WHERE $confor = '".$this->filterInput($cond)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');	
            
            echo $sql_rent; exit;		
			return $res_rent[0]["$value"];
		}
	
  /**
   * Common::getDetailOfDomain()
   * Thsi function for separate domain url to list the domain details
   * @param mixed $domain_id
   * @return void
   */
	function getDetailOfDomain($domain_id)
		{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT subdomainurl,footer_content,domain_id,theme_id,blog_id,store_id,site_title,'ssl',favicon_image,site_password,navigation,facebook_connected,site_description,metakeywords,footer_code,header_code,author,archives,categories,seo_optimize,header_logo_config,heading_content,heading_description,site_title_font_style,nav_menu_font_style,main_headline_font_style,site_title_font_size,nav_menu_font_size,main_headline_font_size,site_title_line_size,nav_menu_line_size,main_headline_line_size,logo_width,logo_height,logo_left,logo_top,header_banner,header_slider FROM 
								".$CFG['table']['domaindetails']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');           
            
			if($res_rent[0]['theme_id'])
				{				  
					$objSmarty->assign('domain_details',$res_rent);
				}
			elseif($res_rent[0]['store_id'])
				{                   
                    $sel_qry = "SELECT st.tax_rate,st.currency, cur.currency_type, cur.currency_symbol, cur.currency_image ".
                                       " FROM ".$CFG['table']['store_details']." as st ".
                                       " LEFT JOIN ".$CFG['table']['currencymanage']." as cur ON st.currency = cur.currency_code ".
                                       " WHERE st.domain_id = '".$this->filterInput($domain_id)."'";
                    $res    = $this->ExecuteQuery($sel_qry,'select');
                    
                    if($res[0]['currency_type'] == 'I'){
                        $CFG['site']['currency_image']	= $CFG['site']['photo_sitelogo_url'].'/'.$res['0']['currency_image']; 
            			$currency   = '<img src="'.$CFG['site']['currency_image'].'" title="" alt="Currency" width="10" height="10"/>';
                        define("CURRENCY_SYMBOL",$currency);
            		}else{
            			$currency   = $res['0']['currency_symbol'];
                        define("CURRENCY_SYMBOL",$currency);
            		}	
                    $currency_rate = 1.00;
                    $objSmarty->assign("symbol", CURRENCY_SYMBOL);
                    $objSmarty->assign("rate", $currency_rate);
                    
					define("TAX_RATE_VALUE",$res[0]['tax_rate']);
                    $objSmarty->assign('TAX_RATE_VALUE',TAX_RATE_VALUE);
                    $objSmarty->assign('single_store_details',$res);
                    
					$objSmarty->assign('store_details',$res_rent);
					return $res_rent;
				}
			else
				{
					$objSmarty->assign('blog_details',$res_rent);
                    $objSmarty->assign('domain_details',$res_rent);
					return $res_rent;
				}	
			 
		}
	
  /**
   * Common::getPageDetailOfDomain()
   * This function is used to list the page details of the page
   * @param mixed $domain_id
   * @return void
   */
	function getPageDetailOfDomain($domain_id)
		{
		 	global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['pages']. " WHERE domain_id = ".$this->filterInput($domain_id)." and page_parent_id = '0' order by sort_order asc";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			//print_r($sqlres);die();			
			$objSmarty->assign("pages", $sqlres);
		}
     /**
   * Common::getCurrencySymbol($domain_id)
   * This function is used to get the currency symbol for sity
   * @param mixed $domain_id
   * @return void
   */     
   function getStoreBasicValue($domain_id)
       {
            global $CFG,$objSmarty;
            $sel_qry = "SELECT st.tax_rate,st.currency, cur.currency_type, cur.currency_symbol, cur.currency_image ".
                                   " FROM ".$CFG['table']['store_details']." as st ".
                                   " LEFT JOIN ".$CFG['table']['currencymanage']." as cur ON st.currency = cur.currency_code ".
                                   " WHERE st.domain_id = '".$this->filterInput($domain_id)."'";
            $res    = $this->ExecuteQuery($sel_qry,'select');
            
            if($res[0]['currency_type'] == 'I'){
                $CFG['site']['currency_image']	= $CFG['site']['photo_sitelogo_url'].'/'.$res['0']['currency_image']; 
    			$currency   = '<img src="'.$CFG['site']['currency_image'].'" title="" alt="Currency" width="10" height="10"/>';
                define("CURRENCY_SYMBOL",$currency);
    		}else{
    			$currency   = $res['0']['currency_symbol'];
                define("CURRENCY_SYMBOL",$currency);
    		}	
            $currency_rate = 1.00;
            $objSmarty->assign("symbol", CURRENCY_SYMBOL);
            $objSmarty->assign("rate", $currency_rate);        
       }    
   /**
   * Common::checkContactForm()
   * to get weather contact form is present to show error message in form entries
   * @param mixed $domain_id
   * @return void
   */
	function checkContactForm($domain_id)
		{
			 global $CFG,$objSmarty;
             if($domain_id)
                 {
                     $sqlsel = "SELECT max(contact_form) as contact FROM ".$CFG['table']['page_list']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
        			 $sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			 $objSmarty->assign("contactformpresent", $sqlres);
                 }			 
		}
	
  /**
   * Common::getBlogDetails()
   * This is the funciton is used to list the blog details of author,archives,cateogires
   * @return void
   */
	function getBlogDetails($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqlsel = "SELECT author,archives,categories,domain_id FROM ".$CFG['table']['temp_domaindetails']. " WHERE domain_id = ".$this->filterInput($domain_id)." ";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
        			$objSmarty->assign("blogsidelist", $sqlres);
                }			
		}
	
  /**
   * Common::CommonUpdateOfSingleValue()
   * This function is used to update the coommon single value in any table
   * @param mixed $table
   * @param mixed $value
   * @param mixed $condfor
   * @param mixed $cond
   * @return
   */
	function CommonUpdateOfSingleValue($table,$valuefor,$value,$condfor,$cond)
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$table." SET $valuefor = '".$value."',publish_status='U' WHERE $cond='". $condfor ."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			return true;
		}
		
  /**
   * Common::ListBlogCommentDetails()
   * This function is used to list the title and there comments
   * @return void
   */
	function ListBlogCommentDetails($domain_id,$post_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT title_id,comment_id,comments,commented_on,commented_by,status,domain_id,addeddate FROM ".$CFG['table']['commentdetails']. " WHERE domain_id = ".$this->filterInput($domain_id)." AND title_id =".$this->filterInput($post_id)."";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			$objSmarty->assign("titlecomment", $sqlres);
		}
	
  /**
   * Common::listAllTitle()
   * This function is used to list the title based on the domain id 
   * @return void
   */
	function listAllTitle($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqlsel = "SELECT post_id,domain_id,title,addeddate FROM ".$CFG['table']['temp_posttitle']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND drafts !='yes'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
        			$objSmarty->assign("titlelist", $sqlres);
                }
 		}
   /**
   * Common::listPost()
   * this is used to list all post in source file
   * @param mixed $domain_id
   * @return void
   */
	function listPost($domain_id)
		{
			global $CFG,$objSmarty;
		  	if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = $this->getPageCount($domain_id);	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
		 
		    $sql_sel = "SELECT post_id,domain_id,category,title,addeddate,seo_title FROM ".$CFG['table']['posttitle']. " WHERE domain_id = ".$this->filterInput($domain_id)."  AND drafts !='yes' AND status='1'";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = $CFG['site']['base_url']."/sourceNew.php"; 
			$fields="&limit=$limit";
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
	    	$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			#print_r($categoryList);die();
			$objSmarty->assign("listpost", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	function listPostDetBasedCat($domain_id,$cat_id)
		{
		  
			global $CFG,$objSmarty;
		  	if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = $this->getPageCount($domain_id);	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
		 	if($cat_id == 'all')
		 		{
					
					$sql_sel = "SELECT post_id,domain_id,title,addeddate FROM ".$CFG['table']['posttitle']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND drafts !='yes'";
		    		$total_pages = $this->ExecuteQuery($sql_sel,'norows');
				}
		    else
		    	{
					$sql_sel = "SELECT post_id,domain_id,title,addeddate FROM ".$CFG['table']['posttitle']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND FIND_IN_SET('".$cat_id."',category) AND drafts !='yes'";
					$total_pages = $this->ExecuteQuery($sql_sel,'norows');
				}
		    
			
			$targetpage = $CFG['site']['base_url']."/sourceNew.php"; 
			$fields="&limit=$limit";
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
	    	$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){

				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
		
			$objSmarty->assign("listpost", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	
  /**
   * Common::InsertTitle()
   * This function is used to insert a title in the file
   * @param mixed $domain_id
   * @param mixed $post
   * @return
   */
	function InsertTitle($domain_id,$post,$cat)
		{
		    global $CFG,$objSmarty;
            #posttitle table
            if($domain_id != '')
                {
                    if(empty($cat))            
                        $cond=", title = '".$post."', status='1'";            
                    
                    $UpQuery  = " INSERT ".$CFG['table']['posttitle']." SET domain_id = '".$this->filterInput($domain_id)."'$cond, addeddate = NOW()"; 
        			$last_insert_id	=	$this->ExecuteQuery($UpQuery,'insert');
                    
                    $seo_post=$this->seoUrl($post);             
                    #Temp post title table
        			$UpQuery  = " INSERT ".$CFG['table']['temp_posttitle']." SET post_id='".$this->filterInput($last_insert_id)."', domain_id = '".$this->filterInput($domain_id)."',category = '".$this->filterInput($cat)."', title = '".$this->filterInput($post)."',seo_title = '".$this->filterInput($seo_post)."',drafts ='no',addeddate = NOW()"; 
        			$last_insert_id	=	$this->ExecuteQuery($UpQuery,'insert');
        			return $last_insert_id;
                }   
		}
	
  /**
   * Common::InsertTitleWithDrafts()
   * This function is used to add a title with drafts
   * @param mixed $domain_id
   * @param mixed $post
   * @return
   */
	function InsertTitleWithDrafts($domain_id,$post)
		{
			global $CFG,$objSmarty;
            if($domain_id != '')
                {
                    $UpQuery  = "INSERT ".$CFG['table']['posttitle']." SET domain_id = '".$this->filterInput($domain_id)."',title = '".$this->filterInput($post)."',drafts ='yes',addeddate = NOW()"; 
        			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
        			return true;
                }			
		}					
  /**
   * Common::StoreTheMessageFromDetails()
   * This function is used to insert a message details in the form
   * @return void
   */
	function StoreTheMessageFromDetails($domain_id)
		{
			global $CFG,$objSmarty;
			$UpQuery  = "INSERT ".$CFG['table']['blogmessageform']." SET domain_id = '".$this->filterInput($domain_id)."',email = '".$this->filterInput($_POST['email'])."', firstname ='".$this->filterInput($_POST['firstname'])."' , lastname ='".$this->filterInput($_POST['lastname'])."' , comments ='".($_POST['comment'])."' ,addeddate = NOW()"; 
			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
			return true;
		}
	
	/**
   * Common::InsertAComment()
   * This function is used to insert a comment 
   * @return void
   */
	function InsertAComment()
		{
			global $CFG,$objSmarty;
			if($_POST['notifyme']==1)
				$notifyme = 1;
			else
				$notifyme = 0;	
			if($_POST['comment_default'] == 'RequireApproval')
				$status='not_approve';
			else
				$status='approve';
		 	$UpQuery  = "INSERT ".$CFG['table']['commentdetails']." SET domain_id = '".$this->filterInput($_POST['domain_id'])."', commented_by ='".$this->filterInput($_POST['name'])."',comments ='".$this->filterInput($_POST['comment_reply'])."',title_id='".$this->filterInput($_POST['post_id'])."',notifyme_email='".$this->filterInput($_POST['email'])."',notifyme='".$this->filterInput($notifyme)."',reply_id = '".$this->filterInput($_POST['comment_id'])."',commented_on ='".$this->filterInput($_POST['title'])."',commentor_ip ='".$this->filterInput($_SERVER['REMOTE_ADDR'])."',status='".$this->filterInput($status)."',addeddate = NOW()";
			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
			return true;
		}
	
  /**
   * Common::sendMailToCommentedUser()
   * This function is used to send the mail for the commented user
   * @return void
   */
	function sendMailToCommentedUser()
		{
			global $CFG,$objSmarty;
			$reciever_email = $this->getValue("notifyme_email",$CFG['table']['blogsettings'],"domain_id='".$this->filterInput($_POST['domain_id'])."'");
			$sender_email	=	$_POST['email'];
			$to_name = $_POST['name'];		
			$commentdetails = $_POST['comment_reply'];			
			$mailsubject  = $CFG['site']['sitename']." Comment Details";
			$mail_body = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailCommentDetails.tpl");
			$mail_body = str_replace('{NAME}',$_POST['name'],$mail_body);
			$mail_body = str_replace('{STATUS}','has just posted a comment on your blog post,',$mail_body);
	        $mail_body = str_replace('{TITLE}',$_POST['title'],$mail_body);	    
			$mail_body = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_body);
			$mail_body = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);
            $mail_body = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_body);   
	        $mail_body = str_replace('{COMMENTDETAILS}',$commentdetails,$mail_body);
	        //echo $mail_body;die();
			$ok = $this->sendMail($to_name,$sender_email,$reciever_email,$mailsubject,$mail_body);
		}
	
  /**
   * Common::sendMailToContactForm()
   * This function is used to send the email when an user submit the contact form
   * @return void
   */
	function sendMailToContactForm($domain_id)
		{
			global $CFG,$objSmarty;
			$adminname = $this->getValue("username",$CFG['table']['register'],"user_id='".$this->filterInput($_SESSION['user_id'])."'");
		 	$header_logo_config=$this->getHeaderLogoConfig($domain_id);
		 	$reciever_email = $_POST['mail_to'];			
			$sender_email	=	$_POST['email'];	
			$to_name = $_POST['firstname'].$_POST['lastname'];		
			$commentdetails = $_POST['comment_contact'];			
			$mailsubject  = $CFG['site']['sitename']." Contact Details";
		 	$mail_body = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailContact.tpl");
			$mail_body = str_replace('{FIRST_NAME}',$_POST['firstname'],$mail_body);
			$mail_body = str_replace('{LAST_NAME}',$_POST['lastname'],$mail_body);
			$mail_body = str_replace('{EMAIL}',$_POST['email'],$mail_body);		
			$mail_body = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_body);
			if($header_logo_config == '2')
				{
					//echo __LINE__;die();
					$logoimages=$this->getImageForShowMail($domain_id,'domainlogo');
					$logo=$CFG['site']['photo_domain_image_url'].'/'.$logoimages;
					$mail_body = str_replace('{SITE_LOGO}','<img width="200" height="90" src='.$logo.'  alt='.$logo.'>',$mail_body);
				}
			
			else if($header_logo_config == '1')
				{
					//echo __LINE__;die();
					$site_title=$this->getSiteNameForContactMail($domain_id);
					$logo=stripslashes($this->getSiteNameForContactMail($domain_id));
					$mail_body = str_replace('{SITE_LOGO}',$logo,$mail_body);
				}
			
			else
				{
					//echo __LINE__;die();
					$logo='Site Title';
					$mail_body = str_replace('{SITE_LOGO}',$logo,$mail_body);
				}
			$mail_body = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_body);		
	        $mail_body = str_replace('{COMMENTDETAILS}',$commentdetails,$mail_body);
	        $mail_body = str_replace('{ADMIN}',$_POST['firstname'],$mail_body);
	        //echo $mail_body;die();
			$ok = $this->sendMail($to_name,$sender_email,$reciever_email,$mailsubject,$mail_body);
		}		
	
  /**
   * Common::CommonContactInsertion()
   * This function is used to insert the contact details when an user submit the contact form in site or blog
   * @param mixed $domain_id
   * @return
   */
	function CommonContactInsertion($domain_id)
		{
			//echo __LINE__;
			global $CFG,$objSmarty;
            $more_fields;
            $curtime = time();
            $keylist=array('action','mail_to','firstname','lastname','commentor_ip','captcha','comment_contact','email','comments');
            foreach($_POST as $key=>$value)
            {
               if(!in_array($key,$keylist))
               {
                     if(is_array($value))
                     {
                        $more_fields.=",".$key.":".implode("#",$value);
                     }
                     else
                     {
                        $more_fields.=",".$key.":".$value;
                     }
                     
               }
               
            }
            if(!empty($_FILES)){
                
                foreach($_FILES as $key=>$value)
                {       // echo $_FILES[$key]['name'];                           
                        $more_files.=",".$key.":".$curtime.$value['name'];
                        $more_file_name.=",".$key.":".$value['name'];
                        move_uploaded_file($_FILES[$key]['tmp_name'],$CFG['site']['base_path']."/uploads/domain_files/".$curtime.$value['name']);
                               
                }
            }    
            $more_file_name=substr($more_file_name,1);
            $more_files=substr($more_files,1);
            $more_fields=substr($more_fields,1);
			$UpQuery  = "INSERT ".$CFG['table']['contact']." SET domain_id = '".$this->filterInput($domain_id)."',email = '".$this->filterInput($_POST['email'])."', firstname ='".$this->filterInput($_POST['firstname'])."' , lastname ='".$this->filterInput($_POST['lastname'])."' , comments ='".$this->filterInput($_POST['comment_contact'])."',extra_fields='".$more_fields."',files='".$more_files."',file_name='".$more_file_name."',commentor_ip ='".$this->filterInput($_SERVER['REMOTE_ADDR'])."',addeddate = NOW()";
			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
            $this->sendMailToContactForm($domain_id,$curtime);
			//return true;
		}
	
	 /**
   * Common::DeleteSelectedTitle()
   * This function is used to delete the selected title 
   * @param mixed $domain_id
   * @param mixed $title_id
   * @return
   */
	function DeleteSelectedTitle($domain_id,$title_id)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $title_id != '')
                {
                    $numcateval = $this->GetValue("category",$CFG['table']['temp_posttitle']," post_id ='".$this->filterInput($title_id)."' ");
        			$UpQuery  = "DELETE  FROM ".$CFG['table']['temp_posttitle']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."' AND post_id ='".$this->filterInput($title_id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    if(empty($numcateval))
                        {
                            $UpQuery  = "DELETE  FROM ".$CFG['table']['posttitle']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."' AND post_id ='".$this->filterInput($title_id)."' AND category='' ";
            			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        }
        			return true;
                }            
		}	
  /**
   * Common::getSocialMedialink()
   * This is the function is used to get the social media link
   * @return void
   */
	function getSocialMedialink($page_id,$domain_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT id,page_id,domain_id,fb, twitter,linkedin,mail,added_date FROM ".$CFG['table']['social_plugins']. " WHERE domain_id = ".$this->filterInput($domain_id)." AND page_id =".$this->filterInput($page_id)."";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			$objSmarty->assign("sociallink", $sqlres);
		}
	
  /**
   * Common::getDraftsDetails()
   * this function is used to list the drafts and their details 
   * @param mixed $domain_id
   * @return void
   */
	function getDraftsDetails($domain_id)
		{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqlsel = "SELECT post_id,domain_id,title,addeddate FROM ".$CFG['table']['temp_posttitle']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND drafts ='yes'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			$objSmarty->assign("drafts_list", $sqlres);
                }			
		}
	
  /**
   * Common::updateTitleAsDrafts()
   * This function is used to update the title as drafts 
   * @return void
   */
	function updateTitleAsDrafts($domain_id,$title,$title_id,$cat)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $title_id != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['posttitle']." SET title ='".$this->filterInput($title)."',drafts ='yes',category = '".$this->filterInput($cat)."',addeddate = NOW() WHERE post_id ='".$this->filterInput($title_id)."' AND domain_id ='".$this->filterInput($domain_id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }			
		}
   function update_Title($domain_id,$title,$title_id)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $title_id != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_posttitle']." SET title ='".$this->filterInput($title)."',addeddate = NOW() WHERE post_id ='".$this->filterInput($title_id)."' AND domain_id ='".$this->filterInput($domain_id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			return true;
                }			
		}     
	
  /**
   * Common::updateTitle()
   * This function is used to update the title without drafts
   * @param mixed $domain_id
   * @param mixed $title
   * @param mixed $title_id
   * @return void
   */
	function updateTitleWithoutDrafts($domain_id,$title,$title_id,$cat)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $title_id != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_posttitle']." SET title ='".$this->filterInput($title)."',drafts ='no', publish_status='U', category = '".$this->filterInput($cat)."',addeddate = NOW() WHERE post_id ='".$this->filterInput($title_id)."'  AND domain_id ='".$this->filterInput($domain_id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    if(empty($cat))
                        {
                            $UpQuery  = "UPDATE ".$CFG['table']['posttitle']." SET title ='".$title."', category = '".$this->filterInput($cat)."',addeddate = NOW() WHERE post_id ='".$this->filterInput($title_id)."'  AND domain_id ='".$this->filterInput($domain_id)."'";
            			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        }
        			return true;
                }			
		}						
   function UpdatePostDate($date)
   {
        global $CFG,$objSmarty;
        $domain_id      = $_POST['domain_id'];
        $title_id       = $_POST['title_id'];
        
            if($domain_id != '' && $title_id != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_posttitle']." SET addeddate ='".$date."' WHERE post_id ='".$this->filterInput($title_id)."'  AND domain_id ='".$this->filterInput($domain_id)."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));                    
        			return true;		
                }
   }             
   #Insert blank post					
   function InsertBlankPostTitle()
   {
        global $CFG,$objSmarty;
        $domain_id  = $_REQUEST['domain_id'];
        if($domain_id != '')
        {
            $UpQuery  = "INSERT INTO ".$CFG['table']['temp_posttitle']." SET  domain_id ='".$this->filterInput($domain_id)."',title='Untitled',drafts ='Yes',addeddate=now()";
        	$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
            return mysql_insert_id();
        }
   }  										
   //kathir ends	
   #-------------------------------------------------------------------------------
   #Add New Domain
  /* function addNewDomain()
   		{
	   	   	global $CFG,$objSmarty;
		   	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && $_POST['domain_id'] != '')
			  {
			  		$domainname		=	$this->filterInput($_POST['domainname']);
				   			
					$sql_ins	=	"INSERT INTO ".$CFG['table']['new_domain']." SET
												 domain_name		=	'".$this->filterInput($domainname)."',
												 user_id			=	'".$this->filterInput($_SESSION['user_id'])."',
												 domain_id          =   '".$this->filterInput($_POST['domain_id'])."',
												 addeddate		    =	NOW();
									";
					$res_ins	=	$this->ExecuteQuery($sql_ins,'insert');  
					if($res_ins)
						{
							$to_email			= 	$this->getValue("admin_email",$CFG['table']['sitesetting'],"id='1'");;						
							$from_name			= 	$this->getValue("username",$CFG['table']['register'],"user_id='".$this->filterInput($_SESSION['user_id'])."'");
							$from_email			= 	$this->getValue("email",$CFG['table']['register'],"user_id='".$this->filterInput($_SESSION['user_id'])."'");
							
							$mailsubject  = $CFG['site']['sitename']." New Domain Added";
							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailForAdminDomainAdded.tpl");
					        $mail_content = str_replace('{STATUS}','Hi Admin,',$mail_content);
					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
					        $mail_content = str_replace('{DOMAIN}',$domainname,$mail_content);
					        //echo $mail_content;die();
							
							$ok=$this->sendMail($from_name,$from_email,$to_email,$mailsubject,$mail_content);
							  //$ok = 1;     
							if($ok){
							     if(USER_FRINDLY == 'Y'){
                    					$this->redirectUrl($CFG['site']['base_url']."/domainPayment/".$_POST['domain_id']."/".$res_ins);
                    				}else{
                    					$this->redirectUrl($CFG['site']['base_url']."/domainPayment.php?domain_id=".$_POST['domain_id']."&newdomid=".$res_ins);
                    				}
							}								
                            else{echo "error";}
						}
					exit();	
				}				
		}*/
	#-----------------------------------------------------------
	#Domain Listing
	function myDomainList($domain_id)
	 	{
			global $CFG,$objSmarty;
			/*$sqlsel = "SELECT newdomainid, domain_name,domain_id,status,addeddate FROM ".$CFG['table']['new_domain']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			if($_GET['domain_id'])
				$sqlsel .= " AND domain_id ='".$this->filterInput($_GET['domain_id'])."'"; */
                
            $sel_query = " SELECT nd.newdomainid, nd.domain_name, nd.autoRenew, nd.expiryDate, nd.domain_id, nd.productid, nd.status, nd.addeddate ".
                         " FROM ".$CFG['table']['new_domain']." as nd ".
                         " LEFT JOIN  ".$CFG['table']['temp_domaindetails']." as dom ON dom.newdomain_productid = nd.productid".
                         " WHERE nd.user_id = '".$this->filterInput($_SESSION['user_id'])."' AND dom.domain_id = '".$domain_id."' " ;  
			$sqlres =  $this->ExecuteQuery($sel_query,'select');
            
            if(count($sqlres) > 0)            
			    $objSmarty->assign("domaindetails", $sqlres);
            else{
                $domainval = $this->getMultiValue("`subdomainurl`, `domain_type`",$CFG['table']['temp_domaindetails']," `domain_id` = '".$domain_id."'" );
                if($domainval[0]['subdomainurl'] != ''){                    
                    $domainval[0]['subdomainurl'] = str_replace('www.', '', $domainval[0]['subdomainurl']);
                    $domainval[0]['subdomainurl'] = str_replace('http://', '', $domainval[0]['subdomainurl']);
                }    
                $objSmarty->assign("domainval", $domainval);
            }    
                     
		} 
	
	#-----------------------------------------------------------
	#Domain Listing
	function mypointDomainList()
	 	{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT point_id, point_domain,domain_id,status,addeddate FROM ".$CFG['table']['point']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."'";
			if($_GET['domain_id'])
				$sqlsel .= " AND domain_id ='".$this->filterInput($_GET['domain_id'])."'";  
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("pointdomaindetails", $sqlres);
		} 
	#-----------------------------------------------------------
	#Sub Domain Listing
	function getSubdomainName($domain_id)
	 	{
			global $CFG;
            if($domain_id)
                {
                    $sqlsel = "SELECT subdomainurl,domain_type FROM ".$CFG['table']['temp_domaindetails']." WHERE domain_id = '".$this->filterInput($domain_id)."'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			return $sqlres;
                }			
		} 
			
	#-------------------------------------------------------------
	#Get User Name
	function getUserName($user_id)
	 	{
	 		global $CFG,$objSmarty;
			$username = $this->getValue("username",$CFG['table']['register'],"user_id='".$this->filterInput($user_id)."'");
			return $username;
		}
	
	#-----------------------------------------------------------------
    #Get Email
	function getSiteOwnerEmail($user_id)
	 	{
	 		global $CFG,$objSmarty;
			$email = $this->getValue("email",$CFG['table']['register'],"user_id='".$this->filterInput($user_id)."'");
			return $email;
		}
	
	#-----------------------------------------------------------------
	#Get Page List
	function pageList()
	 	{
			global $CFG,$objSmarty;
			
            if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id'] ))
                {
                    $sqlsel = "SELECT pagename,page_id FROM ".$CFG['table']['temp_pages']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."' and page_parent_id = '0' order by sort_order asc,page_id asc";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			$objSmarty->assign("pagelist", $sqlres);
        			return $sqlres[0]['page_id'];
                }            

		}  
	#-----------------------------------------------------------------
	#Get Page All List
    #for list all values in tabs field
	function pageFirstList($page_id)
	 	{
			global $CFG,$objSmarty;
            if(isset($page_id))
                {
                    $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pages']. " WHERE page_id = '".$this->filterInput($page_id)."'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
        			$objSmarty->assign("pagefirstlist", $sqlres);
                }			
		}
	#-----------------------------------------------------------------
	#Edit Page   
	function editPage()
		{
			global $CFG,$objSmarty;
            if($_POST['page_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pages']." SET pagename = '".$this->filterInput($_POST['page_name'])."',seo_title = '".$this->filterInput($_POST['page_title'])."',hide_navigation = '".$this->filterInput($_POST['hide_navigation'])."',page_layout = '".$this->filterInput($_POST['page_layout'])."',page_desc = '".$this->filterInput($_POST['page_desc'])."',meta_key = '".$this->filterInput($_POST['meta_key'])."',footer_code = '".$this->filterInput($_POST['footer_code'])."',header_code = '".$this->filterInput($_POST['header_code'])."' ,link_site = '".$this->filterInput($_POST['link_site'])."',link_status = '".$this->filterInput($_POST['link_status'])."' ,banner_status = '".$this->filterInput($_POST['banner_status'])."',publish_status='U' WHERE page_id ='".$this->filterInput($_POST['page_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pages']." SET publish_status='U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	#-----------------------------------------------------------------
	#copy Page   
	function copyPage()
		{
			global $CFG,$objSmarty;
            if(isset($_SESSION['domain_id']) && !emoty($_SESSION['domain_id']))
                {
                    $UpQuery  = "INSERT INTO  ".$CFG['table']['pages']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."', pagename = '".$this->filterInput($_POST['page_name'])."',seo_title = '".$this->filterInput($_POST['page_title'])."',hide_navigation = '".$this->filterInput($_POST['hide_navigation'])."',page_layout = '".$this->filterInput($_POST['page_layout'])."',page_desc = '".$this->filterInput($_POST['page_desc'])."',meta_key = '".$this->filterInput($_POST['meta_key'])."',footer_code = '".$this->filterInput($_POST['footer_code'])."',header_code = '".$this->filterInput($_POST['header_code'])."'";
        			$UpResult = $this->ExecuteQuery($UpQuery,'insert');
        			return $UpResult;
                }			
		}
	#-----------------------------------------------------------------
	#copy Page   
	function deletePage()
		{
			global $CFG,$objSmarty;
            if($_POST['page_id'] != '')
                {
                    $UpQuery  = "DELETE FROM ".$CFG['table']['temp_pages']." WHERE page_id= '".$this->filterInput($_POST['page_id'])."' AND main_page='N'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    $UpQuery  = " UPDATE ".$CFG['table']['temp_pages']." SET publish_status = 'U'  WHERE domain_id= '".$this->filterInput($_POST['domain_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
    #-----------------------------------------------------------------
	#Add Link   
	function addLink()
		{
			global $CFG,$objSmarty;
            if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
                     $UpQuery  = "INSERT INTO ".$CFG['table']['temp_pages']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."', pagename = 'link',seo_title = 'link',publish_status='U' ";
        			$res_qry = $this->ExecuteQuery($UpQuery,'insert');
        			return $res_qry;
                }			
		}
	#-----------------------------------------------------------------
	#Add Page   
	function addPage()
		{
			global $CFG,$objSmarty;
            if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                {
                    $UpQuery  = "INSERT INTO ".$CFG['table']['temp_pages']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."', pagename = 'untitled',seo_title = 'untitled' , publish_status='U'";
        			$res_qry = $this->ExecuteQuery($UpQuery,'insert');
        			return $res_qry;
                }			
		}
	#-----------------------------------------------------------------
	#Get Page All List For Build
	function getpageDetails($domain_id)
	 	{
			global $CFG,$objSmarty;
            if($domain_id)
                {
                    $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pages']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND hide_navigation = '0' and page_parent_id = '0' order by sort_order asc,page_id asc, blog_comments DESC";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			$objSmarty->assign("buildpagelist", $sqlres);
        			return $sqlres[0]['page_id'];
                }		    
		}
		
	#Update Social Plugins
	function updateSocialPlugin()
		{
			global $CFG,$objSmarty;
			
			$page_list_id	= 	$this->getValue("page_list_id",$CFG['table']['social_plugins'],"domain_id='".$this->filterInput($_POST['domain_id'])."' AND page_id ='".$_POST['page_id']."' AND page_list_id='".$this->filterInput($_POST['page_list_id'])."'");
			
            
            if($page_list_id)
				{
					$UpQuery  = "UPDATE ".$CFG['table']['social_plugins']." SET domain_id= '".$this->filterInput($_POST['domain_id'])."', page_id= '".$this->filterInput($_POST['page_id'])."',fb= '".$this->filterInput($_POST['fb'])."',twitter= '".$this->filterInput($_POST['tw'])."',linkedin= '".$this->filterInput($_POST['ln'])."',mail= '".$this->filterInput($_POST['mail'])."',added_date = now() WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
				}
			else
				{
				    if($_POST['domain_id'])
                        {
                            $UpQuery  = "INSERT INTO ".$CFG['table']['social_plugins']." SET domain_id= '".$this->filterInput($_POST['domain_id'])."', page_id= '".$this->filterInput($_POST['page_id'])."',page_list_id = '".$this->filterInput($_POST['page_list_id'])."', fb= '".$this->filterInput($_POST['fb'])."',twitter= '".$this->filterInput($_POST['tw'])."',linkedin= '".$this->filterInput($_POST['ln'])."',mail= '".$this->filterInput($_POST['mail'])."',added_date = now()";
        					$res_qry = $this->ExecuteQuery($UpQuery,'insert');
        					
                        }					
				}
            $Uptqury    = "UPDATE ".$CFG['table']['temp_pagelist']." SET social_plugin_alignment='".$_POST['socialalign']."',publish_status='U' WHERE pagelist ='".$this->filterInput($_POST['page_list_id'])."'";                 
                $this->ExecuteQuery($Uptqury,'update');     
                
			exit;			
		}
	#Get The social Plugin Details
	function getSocialDetails($page_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT fb,twitter,linkedin,mail FROM ".$CFG['table']['social_plugins']. " WHERE page_list_id = '".$this->filterInput($page_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("socialpagelist", $sqlres);
		}
	
	#Get The Title Details
	function gettitleDetails($domain_id,$page_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT fb,twitter,linkedin,mail FROM ".$CFG['table']['social_plugins']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND page_id = '".$this->filterInput($page_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("socialpagelist", $sqlres);
		}
	
	#Update Title Details
	function updateTitle()
		{
			global $CFG,$objSmarty;
			
			if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET text_title= '".$_POST['title']."',publish_status='U' WHERE pagelist ='".$_POST['page_list_id']."'";        			
                    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                            			
                }
                exit;            
		}
	#Get static pages to show front end
	function getStaticPages()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT content_name,content,content_seo FROM ".$CFG['table']['content']. " WHERE content_id is NOT NULL";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("staticpages", $sqlres);
		}
	#-------------------------------------------------------------------------------------
	#Static Contents
	function staticContents($url){
		global $CFG,$objSmarty;
		
		$sql_static		=	"SELECT content_name,content FROM ".$CFG['table']['content']." WHERE content_seo='".$this->filterInput($url)."' and content_id is NOT NULL ";
		$res_static		=	$this->ExecuteQuery($sql_static,'select');
		$objSmarty->assign('staticContent',$res_static);
	}
   
   function getLanguageNames()
	   	{
			global $CFG,$objSmarty;
		
			$sql_static		=	"SELECT lang_name,lang_code,lang_id FROM ".$CFG['table']['language']." WHERE lang_id is NOT NULL ";
			$res_static		=	$this->ExecuteQuery($sql_static,'select');
			$objSmarty->assign('language_names',$res_static);
		}
	
	#Get The social Plugin Details
	function getEmai($page_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT mail_to from ".$CFG['table']['temp_contact_form']. " WHERE page_list_id = '".$this->filterInput($page_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('mailid', $sqlres[0]['mail_to']);
		}
	#Update Title Details
	function updateMail()
		{
			global $CFG,$objSmarty;
			if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_contact_form']." SET mail_to= '".$this->filterInput($_POST['contactmail'])."',publish_status='U' WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
			exit;
		}
	#this function used for get theme images in index page	
	 function getThemeImages()
	   	{
			global $CFG,$objSmarty;
		
			$sql_static		=	"SELECT theme_id,theme_image FROM ".$CFG['table']['thememanage']." WHERE theme_id is NOT NULL ";
			$res_static		=	$this->ExecuteQuery($sql_static,'select');
			$objSmarty->assign('theme_images',$res_static);
		}
	function getBannerImages()
	   	{
			global $CFG,$objSmarty;
		
			$sql_static		=	"SELECT banner_id,banner_image FROM ".$CFG['table']['banner']." WHERE banner_id is NOT NULL ";
			$res_static		=	$this->ExecuteQuery($sql_static,'select');
			$objSmarty->assign('banner_images',$res_static);
		}
	#Update Common Page List
	function updateCommonPageList()
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "UPDATE ".$CFG['table']['pages']." SET ".$_GET['name']." = '1' WHERE page_id ='".$this->filterInput($_GET['pageid'])."' AND domain_id= '".$this->filterInput($_GET['domainid'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
		
	#Update Common Font Style List
	function updateCommonFontList()
		{
			global $CFG,$objSmarty;
			if($_GET['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['page_list']." SET ".$_GET['name']." = '".$this->filterInput($_GET['updval'])."' WHERE pagelist ='".$this->filterInput($_GET['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	#Update Common Font for contact form title
	function updateCommonFontContact()
		{
			global $CFG,$objSmarty;
			if($_GET['contact_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['contact_form']." SET ".$_GET['name']." = '".$this->filterInput($_GET['updval'])."' WHERE id ='".$this->filterInput($_GET['contact_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	
	#Update Common Remove Style List
	function updateCommonRemoveStyle()
		{
			global $CFG,$objSmarty;
			if($_GET['page_list_id'])
                {
                    $bold          = '_bold';
        			$italic        = '_italic';
        			$underline     = '_underline';
        			$strikethrough = '_strikethrough';
        			$textalign     = '_textalign';
        			$UpQuery  = "UPDATE ".$CFG['table']['page_list']." SET ".$_GET['name'].$bold." = '0',".$_GET['name'].$italic." = '0',".$_GET['name'].$underline." = '0',".$_GET['name'].$strikethrough." = '0',".$_GET['name'].$textalign." = '' WHERE pagelist ='".$this->filterInput($_GET['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	
	#Update Sortable Value
	function updateSortableValue($ord,$pageid,$domainid)
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "UPDATE ".$CFG['table']['temp_pages']." SET sort_order = '".$this->filterInput($ord)."',publish_status='U' WHERE page_id ='".$this->filterInput($pageid)."' AND domain_id= '".$this->filterInput($domainid)."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	#Update Theme
	function updateTheme()
		{
			global $CFG,$objSmarty;
			
			/*$UpQuery  = "UPDATE ".$CFG['table']['themeselection']." SET theme_id = '".$_POST['theme_id']."', theme_name = '".$_POST['theme_name']."', theme_color = '".$_POST['themecolor']."' WHERE domain_id= '".$_POST['domain_id']."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery)); */
            if($_POST['domain_id'])
                {                    
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_themeselection']." SET theme_id = '".$this->filterInput($_POST['theme_id'])."', theme_name = '".$this->filterInput($_POST['theme_name'])."', theme_color = '".$this->filterInput($_POST['themecolor'])."', change_status = 'U' WHERE domain_id= '".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
                
		 }
	
	#Update Domain Theme
	function updateDomainTheme()
		{
			global $CFG,$objSmarty;
			if($_POST['domain_id'])
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET theme_id = '".$this->filterInput($_POST['theme_id'])."', publish_status = 'U' WHERE domain_id= '".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
		
	#Update Blog Theme
	function updateBlog()
		{
			global $CFG,$objSmarty;
			
			/*$UpQuery  = "UPDATE ".$CFG['table']['blogselection']." SET blog_id = '".$_POST['blog_id']."', blog_name = '".$_POST['blog_name']."', blog_color = '".$_POST['blogcolor']."' WHERE domain_id= '".$_POST['domain_id']."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));  */
            if($_POST['domain_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_blogselection']." SET blog_id = '".$this->filterInput($_POST['blog_id'])."', blog_name = '".$this->filterInput($_POST['blog_name'])."', blog_color = '".$this->filterInput($_POST['blogcolor'])."',change_status = 'U' WHERE domain_id= '".($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery)); 
                 }    
		}
	
	#Update Store Theme
	function updateStore()
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "UPDATE ".$CFG['table']['storeselection']." SET store_id = '".$this->filterInput($_POST['storeid'])."', store_name = '".$this->filterInput($_POST['store_name'])."', store_color = '".$this->filterInput($_POST['storecolor'])."' WHERE domain_id= '".$this->filterInput($_POST['domain_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	
	#Update Domain Blog Theme
	function updateDomainBlog()
		{
			global $CFG,$objSmarty;
			if($_POST['domain_id'])
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET blog_id = '".$this->filterInput($_POST['blog_id'])."', publish_status = 'U' WHERE domain_id= '".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }    
            
		}
	#Update Domain Blog Theme
	function updateDomainStore()
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "UPDATE ".$CFG['table']['domaindetails']." SET store_id = '".$this->filterInput($_POST['storeid'])."' WHERE domain_id= '".$this->filterInput($_POST['domain_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	//----------------------------------------------------------------get followers---------------------------------------------------------------------
	function getFollowers($fans_id)
		{
			global $CFG,$objSmarty;
			$sql_qry = " SELECT fans_url FROM ".$CFG['table']['fans']." WHERE fans_id = '".$this->filterInput($fans_id)."'";
		  	$res_qry = $this->ExecuteQuery($sql_qry,'select');
		   	return $res_qry[0]['fans_url'];
		}
		
	/**
	* Common::getFontList()
	*
	* @return void
	*/
	function getFontList()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT font_id,font_name FROM ".$CFG['table']['font']. " WHERE status = '1' ORDER BY font_name ASC";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("fontlist", $sqlres);
		} 
	
	#Update Title Details
	function updateDesc()
		{
			global $CFG,$objSmarty;
			
			//$UpQuery  = "UPDATE ".$CFG['table']['page_list']." SET text_description= '".addslashes($_POST['title'])."' WHERE pagelist ='".$_POST['page_list_id']."'";
            if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET text_description= '".addslashes($_POST['title'])."',publish_status='U' WHERE pagelist ='".$_POST['page_list_id']."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }            
			exit;
		}
	#Update Title for contact form
	function updateTitleForContactForm()
		{
			global $CFG,$objSmarty;
			
			if($_POST['id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_contact_form']." SET title_head= '".addslashes($_POST['title'])."',publish_status='U' WHERE id ='".$this->filterInput($_POST['id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }            
			exit;
		}
	
	#Update Image Description
	function updateImageTitle()
		{
			global $CFG,$objSmarty;
			
			if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET image_text= '".$_POST['title']."',publish_status='U' WHERE pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }           
			exit;
		}
	
	#Mail Details For Contct form
	function insertMailDetailsForContact($userid,$pagelistid)
		{
			global $CFG,$objSmarty;
            if($userid != '' && $pagelistid != '' && $_GET['pageid'] != '' && $_GET['domainid'] != '')
                {
                    $email = $this->getValue('email',$CFG['table']['register'],'user_id="'.$this->filterInput($userid).'"');
        		    $UpQuery  = "INSERT ".$CFG['table']['temp_contact_form']." SET page_id = '".$this->filterInput($_GET['pageid'])."',page_list_id = '".$this->filterInput($pagelistid)."',domain_id = '".$this->filterInput($_GET['domainid'])."',mail_to ='".$this->filterInput($email)."',text1 = 'First Name' ,text2 = 'Last Name' ,text3 = 'E-mail',text4 = 'Comments',text5='Submit',added_date = NOW(),publish_status='U'"; 
        			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
        			return true;
                }		 	
		}
	
		#get Image Details
		function getImageBack($page_id,$status='single')
			{
				global $CFG,$objSmarty;
				
				$image = $this->getValue('image_name',$CFG['table']['domain_images'],'page_list_id = "'.$this->filterInput($page_id).'" and status ="'.$this->filterInput($status).'"');
				$objSmarty->assign('images',$image);
			}
        #get Image Details for show in single image drag(veni) in buildpagelist file
		function getImage($page_id)
			{
				global $CFG,$objSmarty;				
				$image = $this->getValue('image_name',$CFG['table']['temp_single_images'],"page_list_id = '".$this->filterInput($page_id)."'  AND delete_status='N'");				
                $objSmarty->assign('images',$image);
                             
			}
            
        #get image alignment
        function getImageAlign($page_id)
        {
            global $CFG,$objSmarty;				
			$alignment = $this->getValue('single_img_alignment',$CFG['table']['temp_pagelist'],'pagelist = "'.$this->filterInput($page_id).'"');				
            $objSmarty->assign('alignment',$alignment);
        }    
        #get Image Details for show in single image drag(veni) in sourcenew file
		function getImageInSubdomain($page_id)
			{
				global $CFG,$objSmarty;
				
				$image = $this->getValue('image_name',$CFG['table']['single_images'],'page_list_id = "'.$this->filterInput($page_id).'" AND image_name!=""');
                //print_r($image);die();
           		$objSmarty->assign('images',$image);
                $alignment = $this->getValue('single_img_alignment',$CFG['table']['page_list'],'pagelist = "'.$this->filterInput($page_id).'"');				
                $objSmarty->assign('imgalignment',$alignment);
                
                 
			}
            
        #get Image Details for show in single image plus text drag(veni) in buildpagelist file
		function getImageText($page_id)
			{
				global $CFG,$objSmarty;
			 	$image = $this->getValue('image_name',$CFG['table']['temp_imagetxt_images'],"page_list_id = '".$this->filterInput($page_id)."' AND delete_status='N'");
				$objSmarty->assign('images',$image);
			}
        #get Image Details for show in single image plus text drag(veni) in sourcenew file
		function getImageTextInSubdomain($page_id,$status)
			{
				global $CFG,$objSmarty;
			 	$image = $this->getValue('image_name',$CFG['table']['imagetxt_images'],'page_list_id = "'.$this->filterInput($page_id).'" AND status="'.$this->filterInput($status).'"  ORDER BY img_id DESC');
                //print_r($image);
				$objSmarty->assign('images',$image);
			}
		function getImageGoogleOld($page_id)
			{
				global $CFG,$objSmarty;
				
				$image = $this->getMultiValue('google_image_name,google_image_id,page_id,domain_id,page_list_id,google_name_thumb,google_url',$CFG['table']['google_images'],'page_list_id = "'.$this->filterInput($page_id).'"');
				$objSmarty->assign('images_google',$image);
			}
        function getImageGoogle($page_id)
			{
				global $CFG,$objSmarty;
				
				$image = $this->getMultiValue('google_image_name,google_image_id,page_id,domain_id,page_list_id,google_name_thumb,google_url',$CFG['table']['temp_google_images'],'page_list_id = "'.$this->filterInput($page_id).'" order by google_image_id asc');
				$objSmarty->assign('images_google',$image);
			}
       function getGoogleImage($domain_id,$page_id,$page_list_id)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT * FROM ".$CFG['table']['google_images']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND page_id = '".$this->filterInput($page_id)."' AND page_list_id = '".$this->filterInput($page_list_id)."' order by google_image_id asc ";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$objSmarty->assign("google_images", $sqlres);
			}
		function getImageForShowTop($domain_id,$status='domainlogo')
			{
				global $CFG,$objSmarty;
				$image = $this->getValue('temp_image_name',$CFG['table']['domain_images'],"domain_id = '".$this->filterInput($domain_id)."' and status ='".$this->filterInput($status)."'  AND delete_status='N'");
			 	$default_switch    = $this->getValue('default_switch',$CFG['table']['temp_domaindetails'],"domain_id = '".$this->filterInput($domain_id)."'");
                               
                $objSmarty->assign('default_switch',$default_switch);                 
                $objSmarty->assign('logoimages',$image);
				//return $image;
			}
        function getImageForShowTopInSubdomain($domain_id,$status='domainlogo')
			{
				global $CFG,$objSmarty;
             	$image = $this->getValue('image_name',$CFG['table']['domain_images'],'domain_id = "'.$this->filterInput($domain_id).'" and status ="'.$this->filterInput($status).'"  AND delete_status="N" ');
			 	$default_switch    = $this->getValue('default_switch',$CFG['table']['temp_domaindetails'],"domain_id = '".$this->filterInput($domain_id)."'");
                               
                $objSmarty->assign('default_switch',$default_switch);
                $objSmarty->assign('logo_sub_images',$image);
				//return $image;
			}
			function BackgroundForShowTop($domain_id)
			{
				global $CFG,$objSmarty;
				$background_color	 = $this->getMultiValue('background_color,background_color_off',$CFG['table']['temp_domaindetails'],"domain_id = '".$this->filterInput($domain_id)."' AND default_switch='N'");
			 	$objSmarty->assign('background_color',$background_color);                
				//return $image;
			}
        function BacksgroundForShowTopInsubdomain($domain_id)
			{
				global $CFG,$objSmarty;
				$background_color = $this->getMultiValue('background_color,background_color_off',$CFG['table']['domaindetails'],"domain_id = '".$this->filterInput($domain_id)."' AND default_switch='N'");
			 	$objSmarty->assign('background_color',$background_color);
				//return $image;
			}  
	/*	function getImageForBannerSlider($domain_id,$status='domainlogo')
			{
				global $CFG,$objSmarty;
				
				echo $image = $this->getMultiValue('image_name',$CFG['table']['domain_images'],'domain_id = "'.$domain_id.'" and status ="'.$status.'"');
				$objSmarty->assign('sliderimages',$image);
			} */
        //this function used to get value of images to list in banner slider
        function getImageForBannerSlider($domain_id,$status)
			{
				global $CFG,$objSmarty;
			    $image = $this->getMultiValue('image_name,banner_slider_id',$CFG['table']['banner_slider_images'],'domain_id = "'.$this->filterInput($domain_id).'" and status ="'.$this->filterInput($status).'" ORDER BY banner_slider_id DESC');
				$objSmarty->assign('sliderimages',$image);
			}
		#Delete Details from temp_pagelist table
		/**
		 * Common::deleteDetails()
         */         
    		function deleteDetails()
    			{
    				global $CFG,$objSmarty;
                    if($_POST['domain_id'] != '' && $_POST['page_list_id'] != '')
                        {
                            $UpQuery  = "DELETE FROM ".$CFG['table']['temp_pagelist']." WHERE pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
            				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                            $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
            				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        }			 	
    			}
		#Delete Image Details
		/**
		 * Common::deleteImageDetails()
		 * 
		 * @return
		 */
		function deleteImageDetails($status="single",$pagelist_id)
			{
				global $CFG,$objSmarty;
                if($_POST['domain_id'] != '' && $pagelist_id != '')
                    {
                        $tempAlreadyImage = $this->getValue("image_name",$CFG['table']['temp_single_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND status = '".$this->filterInput($status)."' AND page_list_id='".$this->filterInput($pagelist_id)."'");
        				
                        $imagesFolderImage = $this->getValue("image_name",$CFG['table']['single_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."'AND status = '".$this->filterInput($status)."' AND page_list_id='".$this->filterInput($pagelist_id)."'");
                         
                        if($tempAlreadyImage && $imagesFolderImage == '')
                        @unlink($CFG['site']['photo_domain_image_path'].'/'.$tempAlreadyImage);
        				$UpQuery  = "DELETE FROM ".$CFG['table']['temp_single_images']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."' AND status = '".$this->filterInput($status)."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                         //for update other fields
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_single_images']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        if($domain_type=="BLOG")
                        {
                            $this->singleImagePublishProcess($_REQUEST['domain_id']);
                        }                        
                    }                
			}
        #Delete Image Details
		/**
		 * Common::deleteImageDetailsImageTxt()
		 * 
		 * @return
		 */
		function deleteImageDetailsImageTxt($status,$pagelist_id)
			{
				global $CFG,$objSmarty;
                if($_POST['domain_id'] != '' && $pagelist_id != '')
                    {
        			    $tempAlreadyImage = $this->getValue("image_name",$CFG['table']['temp_imagetxt_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND status = '".$this->filterInput($status)."' AND page_list_id='".$this->filterInput($pagelist_id)."'");
        				
                        $imagesFolderImage = $this->getValue("image_name",$CFG['table']['imagetxt_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."'AND status = '".$this->filterInput($status)."' AND page_list_id='".$this->filterInput($pagelist_id)."'");
                         
                        if($tempAlreadyImage && $imagesFolderImage == '')
                        @unlink($CFG['site']['photo_domain_image_path'].'/'.$tempAlreadyImage);
                        $UpQuery  = "DELETE FROM ".$CFG['table']['temp_imagetxt_images']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."' AND status = '".$this->filterInput($status)."'";
                        $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        //for update other fields
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_imagetxt_images']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
                        $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        if($domain_type=="BLOG")
                        {
                            $this->imageTextPublishProcess($_REQUEST['domain_id']);
                        }                        
                     }   
			}
		
		#Delete Contact Form Details
		/**
		 * Common::deleteContactForm()
		 * 
		 * @return
		 */
		function deleteContactForm()
			{
				global $CFG,$objSmarty;
                if($_POST['page_list_id'] != '' && $_POST['domain_id'] != '')
                    {
                        $UpQuery  = "DELETE FROM ".$CFG['table']['temp_contact_form']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    }			    
			}
		
		#Delete Contact Form Details
		/**
		 * Common::deleteSocialPlugins()
		 * 
		 * @return
		 */
		function deleteSocialPlugins()
			{
				global $CFG,$objSmarty;
				if($_POST['page_list_id'] != '')
                    {
                        $UpQuery  = "DELETE FROM ".$CFG['table']['social_plugins']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
    				    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    }				
			}
		#this function used to get theme name  and show in source.php
		/**
		 * Common::getThemeName()
		 * 
		 * @return
		 */
		function getThemeName($domain_id)
		  {
			global $CFG,$objSmarty;
			$sqlsel = "SELECT theme_id,domain_id,theme_name,user_id,status,selecteddate FROM ".$CFG['table']['themeselection']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("themename", $sqlres);
		  }
		#this function used to get blog name  and show in source.php
		/**
		 * Common::getBlogName()
		 * 
		 * @return
		 */
		function getBlogName($domain_id)
		  {
			global $CFG,$objSmarty;
			$sqlsel = "SELECT blog_id,domain_id,blog_name,user_id,status,selecteddate FROM ".$CFG['table']['blogselection']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("blogname", $sqlres);
		  }
		#this function used to get store name  and show in source.php
		/**
		 * Common::getStoreName()
		 * 
		 * @return
		 */
		function getStoreName($domain_id)
		  {
			global $CFG,$objSmarty;
			$sqlsel = "SELECT store_id,domain_id,store_name,user_id,status,selecteddate FROM ".$CFG['table']['storeselection']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("storename", $sqlres);
		  }
		#function to get all Contact details in buildpagelist
		/**
		 * Common::getAllContactDetails()
		 * 
		 * @return
		 */
		function getAllContactDetails($page_id)
			{
				global $CFG,$objSmarty;
			 	$sqlsel = "SELECT * from ".$CFG['table']['temp_contact_form']. " WHERE page_list_id = '".$this->filterInput($page_id)."'";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
               // print_r($sqlres);die();
             	$objSmarty->assign('contactlist', $sqlres);	
			}
        #function to get all Contact details in subdomain
		/**
		 * Common::getAllContactDetailsInSubdomain()
		 * 
		 * @return
		 */
		function getAllContactDetailsInSubdomain($page_id)
			{
				global $CFG,$objSmarty;
			 	$sqlsel = "SELECT * from ".$CFG['table']['contact_form']. " WHERE page_list_id = '".$this->filterInput($page_id)."'";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
               // print_r($sqlres);die();
             	$objSmarty->assign('contactlist', $sqlres);	
			}
		#function to get all details via text
		/**
		 * Common::showContactFormDetails()
		 * 
		 * @return
		 */
		function showContactFormDetails()
			{
				global $CFG,$objSmarty;
				
				$contactpopuplist = array();
				$sqlsel = "SELECT page_list_id,text".$_POST['list'].",text".$_POST['list']."_spacing,text".$_POST['list']."_width,text".$_POST['list']."_required,text".$_POST['list']."_instruction from ".$CFG['table']['temp_contact_form']. " WHERE page_list_id = '".$this->filterInput($_POST['page_list_id'])."'";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$val = "text".$_POST['list'];
				$contactpopuplist[0] = $sqlres[0][$val];
				$contactpopuplist[1] = $sqlres[0][$val."_spacing"];
				$contactpopuplist[2] = $sqlres[0][$val."_width"];
				$contactpopuplist[3] = $sqlres[0][$val."_instruction"];
				$contactpopuplist[4] = $sqlres[0][$val."_required"];
				$contactpopuplist[5] = $sqlres[0]["page_list_id"];
				$objSmarty->assign('contactpopuplist', $contactpopuplist);
				$objSmarty->assign('labelval', $val);
				$objSmarty->assign('domainid', $_POST['domain_id']);
				$objSmarty->assign('pageid', $_POST['page_id']);	
			} 
		#Update contact Form Details
		/**
		 * Common::updatecontactFormDetails()
		 * 
		 * @return
		 */
		function updatecontactFormDetails()
			{
				global $CFG,$objSmarty;
				
				$val = $_POST['labelval'];
			   $UpQuery  = "UPDATE ".$CFG['table']['temp_contact_form']." SET ".$val." = '".$this->filterInput($_POST['fieldname'])."', ".$val."_spacing = '".$this->filterInput($_POST['spacing'])."',".$val."_width = '".$this->filterInput($_POST['width'])."',".$val."_required = '".$this->filterInput($_POST['required'])."',".$val."_instruction = '".$this->filterInput($_POST['instruction'])."',publish_status= 'U' WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
	
	  /**
	   * Common::getSiteName()
	   *
	   * @return void
	   */
	   	//this function used for get site name to show in build page
		/**
		 * Common::getSiteName()
		 * 
		 * @return
		 */
		function getSiteName()
			{			 
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT site_title,header_logo_config,domain_id,heading_content,heading_description,site_title_font_style,nav_menu_font_style,main_headline_font_style,site_title_font_size,nav_menu_font_size,main_headline_font_size,site_title_line_size,nav_menu_line_size,main_headline_line_size,logo_width,logo_height,logo_left,logo_top,header_banner,header_slider FROM 
									".$CFG['table']['temp_domaindetails']." 							
									WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');             
                $objSmarty->assign('site_title',$res_rent);
			}
		
	   /**
	   * Common::listFormDetailsDetails()
	   *
	   * @param mixed $domain_id
	   * @return void
	   */
	   	//this function used to list all form details when click more in my sites page
		/**
		 * Common::listFormDetailsDetails()
		 * 
		 * @return
		 */
		function listFormDetailsDetails($domain_id)
			{
				global $CFG,$objSmarty;
                if($domain_id)
                    {
                        $sql_rent		=	"SELECT * FROM 
        									".$CFG['table']['contact']." 							
        									WHERE domain_id = '".$this->filterInput($domain_id)."'";
        				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
        				$objSmarty->assign('formdetails',$res_rent);
                    }				
			}
		
	   /**
	   * Common::getContactDetails()
	   *
	   * @param mixed $id
	   * @return void
	   */
	   //this funciton used to show individual form when click form in form details
		/**
		 * Common::getContactDetails()
		 * 
		 * @return
		 */
		function getContactDetails($id)
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT * FROM 
									".$CFG['table']['contact']." 							
									WHERE id = '".$this->filterInput($id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
				$objSmarty->assign('formdetailsindi',$res_rent);
			}
	   /**
	   * Common::deleteContactDetails()
	   *
	   * @param mixed $id
	   * @return void
	   */
	   	//this function used to delete contact form details in form list page
		/**
		 * Common::deleteContactDetails()
		 * 
		 * @return
		 */
		function deleteContactDetails($id)
			{
				global $CFG,$objSmarty;
                if($id)
                    {
                        $sql_rent		=	"DELETE  FROM 
        									".$CFG['table']['contact']." 							
        									WHERE id = '".$this->filterInput($id)."'";
        				$UpResult = mysql_query($sql_rent) or die($this->mysql_error($sql_rent));
                    }
			}
		
		  /**
		   * Common::getPageNameForSource()
		   *
		   * @param mixed $domain_id
		   * @param mixed $page_id
		   * @return void
		   */
   		//this function for get page name to show in source new file page 
	/**
	 * Common::getPageNameForSource()
	 * 
	 * @return
	 */
	function getPageNameForSource($domain_id)
		{
			global $CFG,$objSmarty;
			$sql_rent		=	"SELECT * FROM 
								".$CFG['table']['pages']." 							
								WHERE domain_id = '".$this->filterInput($domain_id)."' AND hide_navigation = '0' and page_parent_id = '0' order by sort_order,page_id asc";
			$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			//print_r($res_rent);
			$objSmarty->assign('pagenames',$res_rent);
			return $sqlres[0]['pagename'];
		}
		
		//to show selected pages
   /**
   * Common::getpageDetailsForSelectedPage()
   *
   * @param mixed $pageurl
   * @param mixed $domain_id
   * @return
   */
   	//to show selected pages
	/**
	 * Common::getpageDetailsForSelectedPage()
	 * 
	 * @return
	 */
	function getpageDetailsForSelectedPage($pageurl,$domain_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['pages']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND seo_title= '".$this->filterInput($pageurl)."' AND hide_navigation = '0' order by sort_order asc";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			#echo "<pre>";print_r($sqlres);echo "</pre>";die();
			$objSmarty->assign("buildpagelist", $sqlres);
			return $sqlres[0]['page_id'];
		}
   /**
   * Common::getPost()
   * to get post details from source new file to new file
   * @param mixed $post_id
   * @return void
   */
   
	/**
	 * Common::getPost()
	 * 
	 * @return
	 */
	function getPost($post_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT post_id,domain_id,title,addeddate,seo_title FROM ".$CFG['table']['posttitle']. " WHERE post_id = '".$this->filterInput($post_id)."' AND drafts !='yes'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			$objSmarty->assign("getpost", $sqlres);
			//return $sqlres[0]['title'];
		}
   /**
   * Common::getComment()
   *
   * @param mixed $title_id
   * @return void
   */
	/**
	 * Common::getComment()
	 * 
	 * @return
	 */
	function getComment($title_id)
		{
			//echo $title_id;
			global $CFG,$objSmarty;
			if(!empty($title_id)){
    			$sqlsel = "SELECT * FROM ".$CFG['table']['commentdetails']. " WHERE title_id = '".$this->filterInput($title_id)."' AND status='approve' AND reply_id = '0'";
    			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
    		 	$objSmarty->assign("getcomments", $sqlres);
            } 
		}
	/**
	 * Common::getCommentForSource()
	 * 
	 * @return
	 */
	function getCommentForSource($title_id,$domain_id)
		{
			//echo $title_id;
			global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['commentdetails']. " WHERE title_id = '".$this->filterInput($title_id)."' AND status='approve' AND reply_id = '0'";
			$autoclose= $this->getValue("automaticallyclose",$CFG['table']['blogsettings'],"domain_id='".$this->filterInput($domain_id)."'");
			if($autoclose == 'After 30 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 30 DAY)";
			if($autoclose == 'After 60 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 60 DAY)";
			if($autoclose == 'After 90 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 90 DAY)";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		 	$objSmarty->assign("getcomments", $sqlres);
		}
	/**
	 * Common::getReply()
	 * 
	 * @return
	 */
	function getReply($comment_id,$doamin_id)
		{
			//echo $title_id;
			global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['commentdetails']. " WHERE reply_id = '".$this->filterInput($comment_id)."' AND status='approve'";
			$autoclose= $this->getValue("automaticallyclose",$CFG['table']['blogsettings'],"domain_id='".$this->filterInput($domain_id)."'");
			if($autoclose == 'After 30 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 30 DAY)";
			if($autoclose == 'After 60 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 60 DAY)";
			if($autoclose == 'After 90 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 90 DAY)";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		 	$objSmarty->assign("getreplies", $sqlres);
		}
	/**
	 * Common::getSecReply()
	 * 
	 * @return
	 */
	function getSecReply($comment_id,$doamin_id)
		{
			//echo $title_id;
			global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['commentdetails']. " WHERE reply_id = '".$this->filterInput($comment_id)."' AND status='approve'";
			$autoclose= $this->getValue("automaticallyclose",$CFG['table']['blogsettings'],"domain_id='".$this->filterInput($domain_id)."'");
			if($autoclose == 'After 30 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 30 DAY)";
			if($autoclose == 'After 60 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 60 DAY)";
			if($autoclose == 'After 90 days')
				$sqlsel.=" AND date(now()) <= DATE_ADD(date(addeddate),INTERVAL 90 DAY)";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		 	$objSmarty->assign("getsecreplies", $sqlres);
		}
   
   /**
   * Common::getCountComment()
   *
   * @param mixed $title_id
   * @return
   */
	/**
	 * Common::getCountComment()
	 * 
	 * @return
	 */
	function getCountComment($title_id)
		{
			//echo $title_id;die();
			global $CFG,$objSmarty;
			$sqlsel = "SELECT count(comment_id) as total_comment FROM ".$CFG['table']['commentdetails']. " WHERE title_id = '".$this->filterInput($title_id)."' AND domain_id = '".$_SESSION['domain_id']."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
            //print_r($sqlres);
			return $sqlres[0]['total_comment'];
		}
		
		//For New Page Functionality
		#Mail Details For Contct form
		/**
		 * Common::insertPageList()
		 * 
		 * @return
		 */
		function insertPageList()
			{
				global $CFG,$objSmarty;
                if($_GET['pageid'] != '' && $_GET['domainid'] != '')
                    {
                       $UpQuery  = "INSERT INTO ".$CFG['table']['temp_pagelist']." SET  page_id = '".$this->filterInput($_GET['pageid'])."',domain_id = '".$this->filterInput($_GET['domainid'])."',publish_status = 'U',".$_GET['name']." = '1'";
                        $UpResult1	=	$this->ExecuteQuery($UpQuery,'insert');
                        $LastInsertedRow = mysql_insert_id();
        				return $LastInsertedRow;
                    }			 	
			}
		
		/**
		 * Common::insertPageListForColumn()
		 * 
		 * @return
		 */
		function insertPageListForColumn()
			{
				global $CFG,$objSmarty;
                if($_GET['pageid'] != '' && $_GET['domainid'] != '')
                    {
                        $maxsortid  = $this->getValue("MAX(sort_order)",$CFG['table']['temp_pagelist'],"domain_id = '".$this->filterInput($_GET['domainid'])."' AND column_id = '".$this->filterInput($_GET['column_id'])."'");
                        $maxsortid++;                        
        		        $UpQuery  = "INSERT ".$CFG['table']['temp_pagelist']." SET  page_id = '".$this->filterInput($_GET['pageid'])."',domain_id = '".$this->filterInput($_GET['domainid'])."',publish_status = 'U',".$_GET['name']." = '1',column_id = '".$this->filterInput($_GET['column_id'])."',column_pagelist = '".$this->filterInput($_GET['columnpagelist'])."'"; 
                        $UpResult1	=	$this->ExecuteQuery($UpQuery,'insert');
                        $LastInsertedRowCol = mysql_insert_id();
        				return $LastInsertedRowCol;
                     }   
         	}
		
		//For New Page Functionality
		#Mail Details For Contct form
		/**
		 * Common::insertPageListForBlog()
		 * 
		 * @return
		 */
		function insertPageListForBlog()
			{
				global $CFG,$objSmarty;
				
                if($_GET['domainid'] != '' && $_GET['pageid'] != '')
                    {
                        $UpQuery  = "INSERT ".$CFG['table']['temp_pagelist']." SET	page_id = '".$this->filterInput($_GET['pageid'])."',domain_id = '".$this->filterInput($_GET['domainid'])."',".$_GET['name']." = '1', publish='U', post_title='".$this->filterInput($_GET['title_id'])."'"; 
        				$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
        				return $UpResult;
                    }				
			}
		
		/**
		 * Common::insertPageListForBlogColumn()
		 * 
		 * @return
		 */
		function insertPageListForBlogColumn()
			{
				global $CFG,$objSmarty;
				if($_GET['pageid'] != '' && $_GET['domainid'] != '')
                    {
                        $UpQuery  = "INSERT ".$CFG['table']['temp_pagelist']." SET page_id = '".$this->filterInput($_GET['pageid'])."',domain_id = '".$this->filterInput($_GET['domainid'])."',".$this->filterInput($_GET['name'])." = '1',post_title='".$this->filterInput($_GET['title_id'])."',column_id = '".$this->filterInput($_GET['column_id'])."',column_pagelist = '".$this->filterInput($_GET['colpageid'])."' ,publish_status = 'U'"; 
        				$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
        				return $UpResult;
                    }				
			}
	
		#-----------------------------------------------------------------
		#Get Page All draggable elements in buildpagelist 
		/**
		 * Common::pageListForList()
		 * 
		 * @return
		 */
		function pageListForList($page_id)
		 	{
				global $CFG,$objSmarty;
                if($page_id)
                    {
                        $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pagelist']. " WHERE page_id = '".$this->filterInput($page_id)."' and column_id = 0 order by sort_order asc,pagelist asc";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				$objSmarty->assign("pagefirstlist", $sqlres);
                    }				
			}
		#-----------------------------------------------------------------
		#Get Page All List for column in buildpagelist
		/**
		 * Common::getColumnPageList()
		 * 
		 * @return
		 */
		function getColumnPageList($column_id,$pagelistid)
		 	{
				global $CFG,$objSmarty;
		        $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pagelist']. " WHERE column_id = '".$this->filterInput($column_id)."' and page_id = '".$this->filterInput($_SESSION['page_id'])."' and domain_id = '".$this->filterInput($_SESSION['domain_id'])."' and column_pagelist = '".$this->filterInput($pagelistid)."' order by sort_order asc,pagelist asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			//	echo "<pre>";print_r($sqlres);echo "</pre>";//die();
				$objSmarty->assign("columnpagefirstlist", $sqlres);
			}
		#-----------------------------------------------------------------
		#Get Page All List for subdomain pages
		/**
		 * Common::getColumnPageListForSource()
		 * 
		 * @return
		 */
		function getColumnPageListForSource($column_id,$page_id,$domain_id,$pagelistid)
		 	{
				global $CFG,$objSmarty;
				$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE column_id = '".$this->filterInput($column_id)."' and page_id = '".$this->filterInput($page_id)."' and domain_id = '".$this->filterInput($domain_id)."' and column_pagelist = '".$this->filterInput($pagelistid)."' order by sort_order asc,pagelist asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				//echo "<pre>";print_r($sqlres);echo "</pre>";die();
				$objSmarty->assign("columnpagefirstlist", $sqlres);
			}
		#-----------------------------------------------------------------
		#Get Page All List
		/**
		 * Common::pageListForListBlog()
		 * 
		 * @return
		 */
		function pageListForListBlog($title_id)
		 	{
				global $CFG,$objSmarty;
                if($title_id)
                    {
                        $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pagelist']. " WHERE post_title = '".$this->filterInput($title_id)."' AND  column_id = '0'order by sort_order asc,pagelist asc";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				$objSmarty->assign("pagefirstlist", $sqlres);
                    }				
			}
		
		/**
		 * Common::pageFirstWithPublishForBlog()
		 * 
		 * @return
		 */
		function pageFirstWithPublishForBlog($title_id)
			{
				global $CFG,$objSmarty;
				$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE post_title = '".$this->filterInput($title_id)."'  AND publish='1' and column_id = 0 order by sort_order asc,pagelist asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				#echo "<pre>";print_r($sqlres);echo "</pre>";die();
				$objSmarty->assign("pagefirstlist", $sqlres);
			}
       //this function used to show drag elements in source new file
		/**
		 * Common::pageFirstWithPublish()
		 * 
		 * @return
		 */
		function pageFirstWithPublish($page_id)
			{
				global $CFG,$objSmarty;
                $sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE page_id = '".$this->filterInput($page_id)."'  AND publish='1' and column_id = 0 order by sort_order asc,pagelist asc";
                //$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE page_id = $page_id  AND publish='1' and column_id = 0 order by pagelist asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				#echo "<pre>";print_r($sqlres);echo "</pre>"; die();
				$objSmarty->assign("pagefirstlist", $sqlres);
			}
		
		#Update Sortable Value
		/**
		 * Common::updateSortableValueForOrder()
		 * 
		 * @return
		 */
		function updateSortableValueForOrder($ord,$key,$pageid,$domainid)
			{
				global $CFG,$objSmarty;
				
				$UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET sort_order = '".$this->filterInput($key)."',publish_status='U' WHERE page_id ='".$this->filterInput($pageid)."' AND domain_id= '".$this->filterInput($domainid)."' AND pagelist = '".$this->filterInput($ord)."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
   /**
   * Common::getNotifyMe()
   * to get notify me functin to send mail
   * @param mixed $domain_id
   * @return
   */
	/**
	 * Common::getNotifyMe()
	 * 
	 * @return
	 */
	function getNotifyMe()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT notifyme FROM ".$CFG['table']['blogsettings']. " WHERE domain_id = '".$this->filterInput($_POST['domain_id'])."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			//print_r($sqlres[0]['notifyme']);
			return $sqlres[0]['notifyme'];
		}
   /**
   * Common::getSharebutton()
   * to get share button to show in source page
   * @param mixed $domain_id
   * @return void
   */
	/**
	 * Common::getSharebutton()
	 * 
	 * @return
	 */
	function getSharebutton($domain_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['blogsettings']. " WHERE domain_id = '".$this->filterInput($domain_id)."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("blogsettings", $sqlres);
		}
	//Function to publish the page
	 //Function to publish the page
	/**
	 * Common::'updatePublishPage()
	 * 
	 * @return
	 */
	function updatePublishPage()
		{
			global $CFG;
			            
            #domain details value
            $domain_det_res = $this->getMultiValue("publish, theme_id, blog_id",$CFG['table']['domaindetails'],"domain_id ='".$this->filterInput($_POST['domain_id'])."'");  
             
            if(isset($domain_det_res) && $domain_det_res[0]['publish'] == 'N' )
                {                  
                     $UpQuery1  = "UPDATE ".$CFG['table']['domaindetails']." SET publish = 'Y' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
			         $UpResult1 = mysql_query($UpQuery1) or die($this->mysql_error($UpQuery1));                       
                     $domain_det_res[0]['publish'] = 'Y';   
                }       
           if(isset($domain_det_res) && $domain_det_res[0]['publish'] == 'Y')   
                {                   
                    #temp domain details value
                    $temp_domain_val    = $this->getTempDomainDetailsValue($_POST['domain_id'],$CFG['table']['temp_domaindetails']);
                    if(isset($temp_domain_val) && $temp_domain_val[0]['publish_status'] == 'U' )
                        {
                             $this->updateDomaindetailTemptoOrg($temp_domain_val);                           
                        }   
                    #--------------------------------------------------------------------------------------------------------                    
                    if(isset($domain_det_res[0]['theme_id']) && $domain_det_res[0]['theme_id'] != 0)
                        {
                            $temp_themesele_val = $this->getThemeSelectionValue($_POST['domain_id'],$CFG['table']['temp_themeselection']);   
                            if(isset($temp_themesele_val) && $temp_themesele_val[0]['change_status'] == 'U')
                                {                            
                                    $this->updateThemeselectionTemptoOrg($temp_themesele_val);
                                }          
                        }
                     #temp blog selection value   
                     if(isset($domain_det_res[0]['blog_id']) && $domain_det_res[0]['blog_id'] != 0)
                        {
                            $temp_blogsele_val = $this->getblogSelectionValue($_POST['domain_id'],$CFG['table']['temp_blogselection']);   
                            if(isset($temp_blogsele_val) && $temp_blogsele_val[0]['change_status'] == 'U')
                                {                            
                                    $this->updateBlogselectionTemptoOrg($temp_blogsele_val);
                                } 
                             #temp categories
                             #--------------------
                             $this->categoryPublishProcess($_POST['domain_id']);
                             #temp posttitles 
                             #--------------------  
                             $this->blogPostTitlePublishProcess($_POST['domain_id']); 

                        }     
                    #---------------------------------------------------------------------------------------------------------------           
                    #pages table
                    #--------------------
                    $this->pagePublishProcess($_POST['domain_id']); 
                    #---------------------------------------------------------------------------------------------------------------
                    #pagelist table
                    #---------------
                    $this->pageListPublishProcess($_POST['domain_id']);                                   
                    #--------------------------------------------------------------------------------------------------------------
                    #google_images table
                    #--------------------
                    $this->googleImagePublishProcess($_POST['domain_id']);                                                                   
                    #---------------------------------------------------------------------------------------------------------------  
                    #gallery_images table
                    #--------------------
                    $this->galleryImagePublishProcess($_POST['domain_id']);
                    #--------------------------------------------------------------------------------------------------------------- 
                    #slider_images table
                    #--------------------
                    $this->sliderImagePublishProcess($_POST['domain_id']);    
                    #---------------------------------------------------------------------------------------------------------------
                    #banner_slider_images table
                    #--------------------
                    $this->bannerSliderImagePublishProcess($_POST['domain_id']);        
                    #---------------------------------------------------------------------------------------------------------------  
                    #single_images table
                    #--------------------
                    $this->singleImagePublishProcess($_POST['domain_id']);                            
                    #--------------------------------------------------------------------------------------------------------------- 
                    #image+txt table
                    #--------------------
                    $this->imageTextPublishProcess($_POST['domain_id']);  
                    #---------------------------------------------------------------------------------------------------------------  
                    #File uploader
                    #--------------
                    $this->FilesPublishProcess($_POST['domain_id']);
                    #----------------------------------------------------------------------------------------------------------------
                    #Document uploader
                    #--------------
                    $this->DocumentPublishProcess($_POST['domain_id']);
                    #----------------------------------------------------------------------------------------------------------------
                    #contact form table
                    #--------------------
                    $this->contactFormPublishProcess($_POST['domain_id']);  
                    #---------------------------------------------------------------------------------------------------------------
                    #domain images table
                    #--------------------------------------------------------------------------------------------------------
                    $this->domainImagePublishProcess($_POST['domain_id']); 
                    #--------------------------------------------------------------------------------------------------------------- 
                    #Youtube publish process
                    #---------------------
                    $this->youtubePublishProcess($_POST['domain_id']);
                    #Contact form fields publish 
                    #---------------------------------------------------------------------------------------------------------------
                    $this->customFieldsPublish_contactform($_POST['domain_id']);
                    #---------------------------------------------------------------------------------------------------------------
               }           
		 }

     
    #................................................................................................................................
    /** google images table 
	*/
    #delete google images table if temp_google_iamges table is empty
    /**
     * Common::getGoogleImagesValue()
     * 
     * @return
     */
    function getGoogleImagesValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT google_image_id, domain_id,  page_id, page_list_id,google_image_name,google_url, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #...............................................................................................................................
    #google image publish process
    /**
     * Common::googleImagePublishProcess()
     * 
     * @return
     */
    function  googleImagePublishProcess($domain_id)
        {
            global $CFG;
            $temp_google_val    = $this->getGoogleImagesValue($domain_id,$CFG['table']['temp_google_images']);
            $main_google_val    = $this->getGoogleImagesValue($domain_id,$CFG['table']['google_images']);
            $temp_google_imgid = array();
            foreach($temp_google_val as $temp=>$value)
                {
                    $temp_google_imgid[] = $temp_google_val[$temp]['google_image_id'];
                }                                         
            $cur_main_google_id = array();
            foreach($main_google_val as $main=>$value)
                {
                    if( !in_array($main_google_val[$main]['google_image_id'],$temp_google_imgid) )
                        {
                            $deletimage_id.= $main_google_val[$main]['google_image_id'].","; 
                            @unlink($CFG['site']['photo_google_image_path'].'/'.$main_google_val[$main]['google_image_name']); 
                        }
                    else if(in_array($main_google_val[$main]['google_image_id'],$temp_google_imgid)) 
                        {
                            $cur_main_google_id[] = $main_google_val[$main]['google_image_id'];
                        }      
                }                      
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['google_images']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND google_image_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            $update_id = '';
              foreach($temp_google_val as $sub=>$value)
                {
                    if($temp_google_val[$sub]['publish_status'] == 'U')
                        {
                         if( !in_array($temp_google_val[$sub]['google_image_id'],$cur_main_google_id) )
                            { 
                                $upd_qry = " INSERT INTO ".$CFG['table']['google_images']." SET ".
                                           " google_image_id       = '".$this->filterInput($temp_google_val[$sub]['google_image_id'])."',  ".
                                           " page_id               = '".$this->filterInput($temp_google_val[$sub]['page_id'])."', ".
                                           " domain_id             = '".$this->filterInput($temp_google_val[$sub]['domain_id'])."',".
                                           " page_list_id          = '".$this->filterInput($temp_google_val[$sub]['page_list_id'])."', ".
                                           " google_image_name     = '".$this->filterInput($temp_google_val[$sub]['google_image_name'])."',".
                                           " google_url            = '".$this->filterInput($temp_google_val[$sub]['google_url'])."' ";
                                  
                                $res = $this->ExecuteQuery($upd_qry,'insert');
                                $update_id =  $temp_google_val[$sub]['google_image_id'].",";
                            }
                         else if(in_array($temp_google_val[$sub]['google_image_id'],$cur_main_google_id) && $temp_google_val[$sub]['publish_status'] == 'U')
                            {
                                   $upd_qry = " UPDATE ".$CFG['table']['google_images']." SET ".
                                               " page_id               = '".$this->filterInput($temp_google_val[$sub]['page_id'])."', ".
                                               " page_list_id          = '".$this->filterInput($temp_google_val[$sub]['page_list_id'])."', ".
                                               " google_image_name     = '".$this->filterInput($temp_google_val[$sub]['google_image_name'])."',".
                                               " google_url            = '".$this->filterInput($temp_google_val[$sub]['google_url'])."'
                                           WHERE google_image_id    = '".$this->filterInput($temp_google_val[$sub]['google_image_id'])."' AND  
                                                 domain_id             = '".$this->filterInput($temp_google_val[$sub]['domain_id'])."' ";
                                      
                                    $res = $this->ExecuteQuery($upd_qry,'update');
                                    $update_id =  $temp_google_val[$sub]['google_image_id'].",";
                            }  
                         }
                    
                            
                }     
                
            $update_id = substr($update_id,0,-1);            
            if($update_id != '')
                {
                   $this->getUpdate($CFG['table']['temp_google_images'],"publish_status = 'N'","google_image_id IN ('".$this->filterInput($update_id)."')");
                }
        }      

    #................................................................................................................................
    /** gallery images table 
	*/
    /**
     * Common::getGalleryImagesValue()
     * 
     * @return
     */
    function getGalleryImagesValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT gallery_id, domain_id,  page_id, page_list_id,  gallery_name,gallery_name_thumb, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #..........................................................................................................................   
    #gallery image publish process
    /**
     * Common::galleryImagePublishProcess()
     * 
     * @return
     */
    function galleryImagePublishProcess($domain_id)
        {
            global $CFG;
            $temp_gallery_val    = $this->getGalleryImagesValue($domain_id,$CFG['table']['temp_gallery_images']);
            $main_gallery_val    = $this->getGalleryImagesValue($domain_id,$CFG['table']['gallery_images']);
            
            $temp_gallery_imgid=array();
            foreach($temp_gallery_val as $temp=>$value)
                {
                    $temp_gallery_imgid[] = $temp_gallery_val[$temp]['gallery_id'];
                }            
                //print_r($temp_gallery_imgid);                          
            #unlink th images
            foreach($main_gallery_val as $main=>$value)
                {
                    if( is_array($temp_gallery_imgid) && !in_array($main_gallery_val[$main]['gallery_id'],$temp_gallery_imgid) )
                        {
                            $deletimage_id.= $main_gallery_val[$main]['gallery_id'].",";                                   
                            @unlink($CFG['site']['photo_domain_image_path'].'/'.$main_google_val[$main]['gallery_name']); 
                        }
                }           
                //echo $deletimage_id;die();         
            #delete the images    
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['gallery_images']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND gallery_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            #insert temp to main table
            foreach($temp_gallery_val as $sub=>$value)
                {
                    if($temp_gallery_val[$sub]['publish_status'] == 'U')
                        {
                           $upd_qry =  " INSERT INTO ".$CFG['table']['gallery_images']." SET ".
                                " gallery_id            = '".$this->filterInput($temp_gallery_val[$sub]['gallery_id'])."',  ".
                                " page_id               = '".$this->filterInput($temp_gallery_val[$sub]['page_id'])."', ".
                                " domain_id             = '".$this->filterInput($temp_gallery_val[$sub]['domain_id'])."',".
                                " page_list_id          = '".$this->filterInput($temp_gallery_val[$sub]['page_list_id'])."',".
                                " gallery_name          = '".$this->filterInput($temp_gallery_val[$sub]['gallery_name'])."' ,".
                                " gallery_name_thumb    = '".$this->filterInput($temp_gallery_val[$sub]['gallery_name_thumb'])."' ";
             
                            $res = $this->ExecuteQuery($upd_qry,'insert');
                            $this->getUpdate($CFG['table']['temp_gallery_images'],"publish_status = 'N'","gallery_id = '".$this->filterInput($temp_gallery_val[$sub]['gallery_id'])."'");
                        }  
                } 
        }
    #................................................................................................................................
    /** slider images table 
	*/
    /**
     * Common::getSliderImagesValue()
     * 
     * @return
     */
    function getSliderImagesValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT slider_id, domain_id,  page_id, page_list_id,slider_images,publish_status FROM ".$tablename." WHERE domain_id = '".$this->filterInput($domain_id)."' ";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #................................................................................................................................
    #slider publish process
    /**
     * Common::sliderImagePublishProcess()
     * 
     * @return
     */
    function sliderImagePublishProcess($domain_id)
        {
            global $CFG;
            $temp_slider_val    = $this->getSliderImagesValue($domain_id,$CFG['table']['temp_slider_images']);
            $main_slider_val    = $this->getSliderImagesValue($domain_id,$CFG['table']['slider_images']);
            $temp_slider_imgid=array();
            foreach($temp_slider_val as $temp=>$value)
                {
                    $temp_slider_imgid[] = $temp_slider_val[$temp]['slider_id'];
                }                                         
            
            foreach($main_slider_val as $main=>$value)
                {
                    if( is_array($temp_slider_imgid) && !in_array($main_slider_val[$main]['slider_id'],$temp_slider_imgid) )
                        {
                            $deletimage_id.= $main_slider_val[$main]['slider_id'].",";                                   
                            @unlink($CFG['site']['photo_domain_image_path'].'/'.$main_slider_val[$main]['slider_images']); 
                        }
                }    
                
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['slider_images']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND slider_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            
            foreach($temp_slider_val as $sub=>$value)
                {
                    if($temp_slider_val[$sub]['publish_status'] == 'U')
                        {
                             $upd_qry =  " INSERT INTO ".$CFG['table']['slider_images']." SET ".
                                " slider_id             = '".$this->filterInput($temp_slider_val[$sub]['slider_id'])."', ".
                                " page_id               = '".$this->filterInput($temp_slider_val[$sub]['page_id'])."', ".
                                " domain_id             = '".$this->filterInput($temp_slider_val[$sub]['domain_id'])."',".
                                " page_list_id          = '".$this->filterInput($temp_slider_val[$sub]['page_list_id'])."',".
                                " slider_images         = '".$this->filterInput($temp_slider_val[$sub]['slider_images'])."' ";
                          
                            $res = $this->ExecuteQuery($upd_qry,'insert');
                            $this->getUpdate($CFG['table']['temp_slider_images'],"publish_status = 'N'","slider_id = '".$this->filterInput($temp_slider_val[$sub]['slider_id'])."'");
                        } 
                }  
        }    
    #................................................................................................................................
    /** banner_slider images table 
	*/
    #delete banner slider images table if temp_banner_slider_iamges table is empty
     /**
      * Common::getBanSliderImagesValue()
      * 
      * @return
      */
     function getBanSliderImagesValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT banner_slider_id, domain_id,  page_id, image_name,status, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #................................................................................................................................
    #publish process for banner slider image
    /**
     * Common::bannerSliderImagePublishProcess()
     * 
     * @return
     */
    function bannerSliderImagePublishProcess($domain_id)
        {
            global $CFG;
            $temp_banslider_val    = $this->getBanSliderImagesValue($domain_id,$CFG['table']['temp_banner_slider_images']);
            $main_banslider_val    = $this->getBanSliderImagesValue($domain_id,$CFG['table']['banner_slider_images']);
            $temp_banslider_imgid=array();
            foreach($temp_banslider_val as $temp=>$value)
                {
                    $temp_banslider_imgid[] = $temp_banslider_val[$temp]['banner_slider_id'];
                }                                         
             foreach($main_banslider_val as $main=>$value)
                {
                    if( is_array($temp_banslider_imgid) && !in_array($main_banslider_val[$main]['banner_slider_id'],$temp_banslider_imgid) )
                        {
                            $deletimage_id.= $main_banslider_val[$main]['banner_slider_id'].",";                                   
                            @unlink($CFG['site']['photo_domain_image_path'].'/'.$main_banslider_val[$main]['image_name']); 
                        }
                }    
                
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['banner_slider_images']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND banner_slider_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            
            foreach($temp_banslider_val as $sub=>$value)
                {
                     if($temp_banslider_val[$sub]['publish_status'] == 'U')
                        {
                             $upd_qry =  " INSERT INTO ".$CFG['table']['banner_slider_images']." SET ".
                                " banner_slider_id      = '".$this->filterInput($temp_banslider_val[$sub]['banner_slider_id'])."',  ".
                                " page_id               = '".$this->filterInput($temp_banslider_val[$sub]['page_id'])."', ".
                                " domain_id             = '".$this->filterInput($temp_banslider_val[$sub]['domain_id'])."',".
                                " image_name            = '".$this->filterInput($temp_banslider_val[$sub]['image_name'])."',".
                                " status                = '".$this->filterInput($temp_banslider_val[$sub]['status'])."' ";
                          
                             $res = $this->ExecuteQuery($upd_qry,'insert');
                             $this->getUpdate($CFG['table']['temp_banner_slider_images'],"publish_status = 'N'","banner_slider_id = '".$this->filterInput($temp_banslider_val[$sub]['banner_slider_id'])."'");
                        } 
                }  
        } 
    #................................................................................................................................
    /** single images table 
	*/
    #delete single images table if temp_single_iamges table is empty
     #for get temmp_single_iamges table value
    /**
     * Common::getSingleImagesValue()
     * 
     * @return
     */
    function getSingleImagesValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT img_id, domain_id,  page_id,page_list_id, image_name,status,alignment, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #................................................................................................................................
    
    #single image publish process
    /**
     * Common::singleImagePublishProcess()
     * 
     * @return
     */
    function singleImagePublishProcess($domain_id)
        {
            global $CFG;
            $temp_singimg_val    = $this->getSingleImagesValue($domain_id,$CFG['table']['temp_single_images']);
            $main_singimg_val    = $this->getSingleImagesValue($domain_id,$CFG['table']['single_images']);
            $temp_singimg_imgid=array();
            foreach($temp_singimg_val as $temp=>$value)
                {
                    $temp_singimg_imgid[] = $temp_singimg_val[$temp]['img_id'];
                }                                         
            
            foreach($main_singimg_val as $main=>$value)
                {
                    if( is_array($temp_singimg_imgid) && !in_array($main_singimg_val[$main]['img_id'],$temp_singimg_imgid) )
                        {
                            $deletimage_id.= $main_singimg_val[$main]['img_id'].",";                                   
                            @unlink($CFG['site']['photo_domain_image_path'].'/'.$main_singimg_val[$main]['image_name']); 
                        }
                }    
                
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['single_images']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND img_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            
            foreach($temp_singimg_val as $sub=>$value)
                {
                    if($temp_singimg_val[$sub]['publish_status'] == 'U')
                        {
                             $upd_qry =  " INSERT INTO ".$CFG['table']['single_images']." SET ".
                                " img_id                = '".$this->filterInput($temp_singimg_val[$sub]['img_id'])."',  ".
                                " page_id               = '".$this->filterInput($temp_singimg_val[$sub]['page_id'])."', ".
                                " domain_id             = '".$this->filterInput($temp_singimg_val[$sub]['domain_id'])."',".
                                " page_list_id          = '".$this->filterInput($temp_singimg_val[$sub]['page_list_id'])."',".
                                " image_name            = '".$this->filterInput($temp_singimg_val[$sub]['image_name'])."',".
                                " alignment             = '".$this->filterInput($temp_singimg_val[$sub]['alignment'])."',".
                                " status                = '".$this->filterInput($temp_singimg_val[$sub]['status'])."' ";
                          
            $res = $this->ExecuteQuery($upd_qry,'insert');
            $this->getUpdate($CFG['table']['temp_single_images'],"publish_status = 'N'","img_id = '".$this->filterInput($temp_singimg_val[$sub]['img_id'])."'");
                        } 
                }  

        }
    #................................................................................................................................
    /** images+text table 
	*/
   #for get temmp_imagetxt_images table value
    /**
     * Common::getImageTxtValue()
     * 
     * @return
     */
    function getImageTxtValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT img_id, domain_id,  page_id, page_list_id, image_name, status, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #................................................................................................................................
    #image plus text publish process
    /**
     * Common::imageTextPublishProcess()
     * 
     * @return
     */
    function imageTextPublishProcess($domain_id)
        {
            global $CFG;
            $temp_imgtxt_val    = $this->getImageTxtValue($domain_id,$CFG['table']['temp_imagetxt_images']);
            $main_imgtxt_val    = $this->getImageTxtValue($domain_id,$CFG['table']['imagetxt_images']);
            
            $temp_imgtxt_id = array();
            foreach($temp_imgtxt_val as $temp=>$value)
                {
                    $temp_imgtxt_id[] = $temp_imgtxt_val[$temp]['img_id'];
                }                                         
            
            foreach($main_imgtxt_val as $main=>$value)
                {
                    if( is_array($temp_imgtxt_id) && !in_array($main_imgtxt_val[$main]['img_id'],$temp_imgtxt_id) )
                        {
                            $deletimage_id.= $main_imgtxt_val[$main]['img_id'].",";                                   
                            @unlink($CFG['site']['photo_domain_image_path'].'/'.$main_imgtxt_val[$main]['image_name']); 
                        }
                }                                    
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['imagetxt_images']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND img_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            $update_id = '';
            foreach($temp_imgtxt_val as $sub=>$value)
                {
                    if($temp_imgtxt_val[$sub]['publish_status'] == 'U')
                        {
                            $ins_qry =  " INSERT INTO ".$CFG['table']['imagetxt_images']." SET ".
                                        " img_id                = '".$this->filterInput($temp_imgtxt_val[$sub]['img_id'])."',  ".
                                        " page_id               = '".$this->filterInput($temp_imgtxt_val[$sub]['page_id'])."', ".
                                        " domain_id             = '".$this->filterInput($temp_imgtxt_val[$sub]['domain_id'])."',".
                                        " page_list_id          = '".$this->filterInput($temp_imgtxt_val[$sub]['page_list_id'])."',".
                                        " image_name            = '".$this->filterInput($temp_imgtxt_val[$sub]['image_name'])."',".
                                        " status                = '".$this->filterInput($temp_imgtxt_val[$sub]['status'])."' ";
                            $res = $this->ExecuteQuery($ins_qry,'insert');
                            $update_id =  $temp_imgtxt_val[$sub]['img_id'].",";
                        }      
                }     
                
            $update_id = substr($update_id,0,-1);            
            if($update_id != '')
                {
                   $this->getUpdate($CFG['table']['temp_imagetxt_images'],"publish_status = 'N'","img_id IN ('".$this->filterInput($update_id)."')");
                }
        }    
    #................................................................................................................................
    #Get files name
    function getFiles($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT file_id, domain_id,  page_id, page_list_id, file_name, original_name, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #Get name of the file
    function getFile_name($page_list_id)
        {
            global $CFG,$objSmarty;
            $qry_det = "SELECT file_id, original_name FROM ".$CFG['table']['files']." WHERE page_list_id='".$page_list_id."'";
            
            $res = $this->ExecuteQuery($qry_det,'select');
            $exts=(explode(".",$res[0]['original_name']));
            $extimg = $exts[count($exts)-1].'-icon.png';            
            if(file_exists($CFG['site']['image_path']."/".$extimg))
            {
                $objSmarty->assign("extimg",$CFG['site']['image_url']."/".$extimg);
            }
            else
            {
                $objSmarty->assign("extimg",$CFG['site']['image_url']."/download.png");
            }
            $objSmarty->assign("files",$res);
        }
    #Get name of the file
    function getFile_name_build($page_list_id)
        {
            global $CFG,$objSmarty;
            $qry_det = "SELECT file_id, original_name FROM ".$CFG['table']['temp_files']." WHERE page_list_id='".$page_list_id."'";
            
            $res = $this->ExecuteQuery($qry_det,'select');
            $exts=(explode(".",$res[0]['original_name']));
            $extimg = $exts[count($exts)-1].'-icon.png';
            
            if(file_exists($CFG['site']['image_path']."/".$extimg))
            {
                $objSmarty->assign("extimg",$CFG['site']['image_url']."/".$extimg);
            }
            else
            {
                $objSmarty->assign("extimg",$CFG['site']['image_url']."/download.png");
            }
            
            $objSmarty->assign("files",$res);
        }
      #delete domain files   
    function deleteFile()
			{
				global $CFG,$objSmarty;
                $pagelist_id    = $_POST['page_list_id'];
                if($_POST['domain_id'] != '' && $pagelist_id != '')
                    {
                        $tempAlreadyFile = $this->getValue("file_name",$CFG['table']['temp_files'],"domain_id ='".$this->filterInput($_POST['domain_id'])."'  AND page_list_id='".$this->filterInput($pagelist_id)."'");
        				
                        $fileFolderFile = $this->getValue("file_name",$CFG['table']['files'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND page_list_id='".$this->filterInput($pagelist_id)."'");
                         
                        if($tempAlreadyFile && $fileFolderFile == '')
                        @unlink($CFG['site']['domain_file_path'].'/'.$tempAlreadyFile);
                        
        				$UpQuery  = "DELETE FROM ".$CFG['table']['temp_files']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."' ";
                        
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                         //for update other fields
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_files']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        if($domain_type=="BLOG")
                        {
                            $this->imageTextPublishProcess($_REQUEST['domain_id']);
                        }
                    }                
			}             
    #File publish Process
    function FilesPublishProcess($domain_id)
    {
        global $CFG;
            $temp_file_val    = $this->getFiles($domain_id,$CFG['table']['temp_files']);
            $main_file_val    = $this->getFiles($domain_id,$CFG['table']['files']);
            
            $temp_imgtxt_id = array();
            foreach($temp_file_val as $temp=>$value)
                {
                    $temp_imgtxt_id[] = $temp_file_val[$temp]['file_id'];
                }                                         
            
            foreach($main_file_val as $main=>$value)
                {
                    if( is_array($temp_imgtxt_id) && !in_array($main_file_val[$main]['file_id'],$temp_imgtxt_id) )
                        {
                            $deletimage_id.= $main_file_val[$main]['file_id'].",";                                   
                            @unlink($CFG['site']['domain_file_path'].'/'.$main_file_val[$main]['file_name']); 
                        }
                }                                    
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['files']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND file_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            $update_id = '';
            foreach($temp_file_val as $sub=>$value)
                {
                    if($temp_file_val[$sub]['publish_status'] == 'U')
                        {
                            $ins_qry =  " INSERT INTO ".$CFG['table']['files']." SET ".
                                        " file_id                = '".$this->filterInput($temp_file_val[$sub]['file_id'])."',  ".
                                        " page_id               = '".$this->filterInput($temp_file_val[$sub]['page_id'])."', ".
                                        " domain_id             = '".$this->filterInput($temp_file_val[$sub]['domain_id'])."',".
                                        " page_list_id          = '".$this->filterInput($temp_file_val[$sub]['page_list_id'])."',".
                                        " file_name            = '".$this->filterInput($temp_file_val[$sub]['file_name'])."',".
                                        " original_name         = '".$this->filterInput($temp_file_val[$sub]['original_name'])."'";
                                        
                            $res = $this->ExecuteQuery($ins_qry,'insert');
                            $update_id =  $temp_file_val[$sub]['file_id'].",";
                        }      
                }     
                
            $update_id = substr($update_id,0,-1);            
            if($update_id != '')
                {
                   $this->getUpdate($CFG['table']['temp_files'],"publish_status = 'N'","file_id IN ('".$this->filterInput($update_id)."')");
                }
    }
    #Get name of the Document
    function getDoc_name($page_list_id)
        {
            global $CFG,$objSmarty;
            $qry_det = "SELECT doc_id, doc_name FROM ".$CFG['table']['docs']." WHERE page_list_id='".$page_list_id."'";
            
            $res = $this->ExecuteQuery($qry_det,'select');
            $objSmarty->assign("docs",$res);
        }
    function deleteDoc()
			{
				global $CFG,$objSmarty;
                $pagelist_id    = $_POST['page_list_id'];
                if($_POST['domain_id'] != '' && $pagelist_id != '')
                    {
                        $tempAlreadyFile = $this->getValue("doc_name",$CFG['table']['temp_docs'],"domain_id ='".$this->filterInput($_POST['domain_id'])."'  AND page_list_id='".$this->filterInput($pagelist_id)."'");
        				
                        $fileFolderFile = $this->getValue("doc_name",$CFG['table']['docs'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND page_list_id='".$this->filterInput($pagelist_id)."'");
                         
                        if($tempAlreadyFile && $fileFolderFile == '')
                        @unlink($CFG['site']['domain_docs_path'].'/'.$tempAlreadyFile);
                        echo $CFG['site']['domain_doc_path'].'/'.$tempAlreadyFile;
        				$UpQuery  = "DELETE FROM ".$CFG['table']['temp_docs']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."' ";
                        echo $UpQuery;
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                         //for update other fields
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_docs']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                        if($domain_type=="BLOG")
                        {
                            $this->imageTextPublishProcess($_REQUEST['domain_id']);
                        }
                    }                
			}          
    #Get name of the Document
    function getDoc_name_build($page_list_id)
        {
            global $CFG,$objSmarty;
            $qry_det = "SELECT doc_id, doc_name FROM ".$CFG['table']['temp_docs']." WHERE page_list_id='".$page_list_id."'";           
            $res = $this->ExecuteQuery($qry_det,'select');
            if(!empty($res))            
            $objSmarty->assign("docs",$res);
            
        }   
    #Get Document name
    function getDocs($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT doc_id, domain_id,  page_id, page_list_id, doc_name, publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
                    
     #File publish Process
    function DocumentPublishProcess($domain_id)
    {
        global $CFG;
            $temp_file_val    = $this->getDocs($domain_id,$CFG['table']['temp_docs']);
            $main_file_val    = $this->getDocs($domain_id,$CFG['table']['docs']);
            
            $temp_imgtxt_id = array();
            foreach($temp_file_val as $temp=>$value)
                {
                    $temp_imgtxt_id[] = $temp_file_val[$temp]['doc_id'];
                }                                         
            
            foreach($main_file_val as $main=>$value)
                {
                    if( is_array($temp_imgtxt_id) && !in_array($main_file_val[$main]['doc_id'],$temp_imgtxt_id) )
                        {
                            $deletimage_id.= $main_file_val[$main]['doc_id'].",";                                   
                            @unlink($CFG['site']['domain_docs_path'].'/'.$main_file_val[$main]['doc_name']); 
                        }
                }                                    
            if($deletimage_id != '')
                {
                    $deletimage_id = substr($deletimage_id,0,-1);
                    $sql_delete="DELETE FROM ".$CFG['table']['docs']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND doc_id IN (".$deletimage_id.") ";
                    $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
                }     
            $update_id = '';
            foreach($temp_file_val as $sub=>$value)
                {
                    
                    if($temp_file_val[$sub]['publish_status'] == 'U')
                        {
                            $ins_qry =  " INSERT INTO ".$CFG['table']['docs']." SET ".
                                        " doc_id                = '".$this->filterInput($temp_file_val[$sub]['doc_id'])."',  ".
                                        " page_id               = '".$this->filterInput($temp_file_val[$sub]['page_id'])."', ".
                                        " domain_id             = '".$this->filterInput($temp_file_val[$sub]['domain_id'])."',".
                                        " page_list_id          = '".$this->filterInput($temp_file_val[$sub]['page_list_id'])."',".
                                        " doc_name            = '".$this->filterInput($temp_file_val[$sub]['doc_name'])."'";
                                        
                                      
                            $res = $this->ExecuteQuery($ins_qry,'insert');
                            $update_id =  $temp_file_val[$sub]['doc_id'].",";
                        }      
                }     
                
            $update_id = substr($update_id,0,-1);            
            if($update_id != '')
                {
                   $this->getUpdate($CFG['table']['temp_docs'],"publish_status = 'N'","doc_id IN ('".$this->filterInput($update_id)."')");
                }
    }   
    /** contact form table 
	*/
    /**
     * Common::getContactFormValue()
     * 
     * @return
     */
    function getContactFormValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = " SELECT id,page_id,page_list_id,domain_id,title_head,text1,text2,text3,text4,text5,text1_spacing,text1_width,text1_required,text1_instruction,text2_spacing,text2_width,text2_required,text2_instruction,text3_spacing,text3_width,text3_required,text3_instruction,text4_spacing,text4_width,text4_required,text4_instruction,mail_to,buildContact_bold,buildContact_italic,buildContact_underline,buildContact_strikethrough,buildContact_textalign,buildContact_fontsize,buildContact_fontcolor,added_date,publish_status FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    
    #publish process for the contact form
    /**
     * Common::contactFormPublishProcess()
     * 
     * @return
     */
    function contactFormPublishProcess($domain_id)
    {            
        global $CFG;
        $temp_contform_val    = $this->getContactFormValue($domain_id,$CFG['table']['temp_contact_form']);
        $main_contform_val    = $this->getContactFormValue($domain_id,$CFG['table']['contact_form']);
        
        $temp_contform_id = array();
        foreach($temp_contform_val as $temp=>$value)
            {
                $temp_contform_id[] = $temp_contform_val[$temp]['id'];
            }  
        $cur_main_contform_id = array();    
        foreach($main_contform_val as $main=>$value)
            {
                if( !in_array($main_contform_val[$main]['id'],$temp_contform_id) )
                    {
                        $delet_id.= $main_contform_val[$main]['id'].","; 
                    }
               else if(in_array($main_contform_val[$main]['id'],$temp_contform_id)) 
                    {
                        $cur_main_contform_id[] = $main_contform_val[$main]['id'];
                    }       
            }     
            
        $delet_id = substr($delet_id,0,-1);    
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['contact_form']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND id IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }     
            
        $temp_upd_id = '';
        
        foreach($temp_contform_val as $sub=>$value)
            {
                if($temp_contform_val[$sub]['publish_status'] == 'U')
                    {
                       if( !in_array($temp_contform_val[$sub]['id'],$cur_main_contform_id) )
                        {
                          $ins_qry =  " INSERT INTO ".$CFG['table']['contact_form']." SET ".
                                        " id                    = '".$this->filterInput($temp_contform_val[$sub]['id'])."',  ".
                                        " page_id               = '".$this->filterInput($temp_contform_val[$sub]['page_id'])."', ".
                                        " page_list_id          = '".$this->filterInput($temp_contform_val[$sub]['page_list_id'])."', ".
                                        " domain_id             = '".$this->filterInput($temp_contform_val[$sub]['domain_id'])."',".
                                        " title_head            = '".$this->filterInput($temp_contform_val[$sub]['title_head'])."',".
                                        " text1                 = '".$this->filterInput($temp_contform_val[$sub]['text1'])."',".
                                        " text2                 = '".$this->filterInput($temp_contform_val[$sub]['text2'])."',".
                                        " text3                 = '".$this->filterInput($temp_contform_val[$sub]['text3'])."',".
                                        " text4                 = '".$this->filterInput($temp_contform_val[$sub]['text4'])."',".
                                        " text5                 = '".$this->filterInput($temp_contform_val[$sub]['text5'])."',".
                                        " text1_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text1_spacing'])."',".
                                        " text1_width 	        = '".$this->filterInput($temp_contform_val[$sub]['text1_width'])."',".
                                        " text1_required        = '".$this->filterInput($temp_contform_val[$sub]['text1_required'])."',".
                                        " text1_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text1_instruction'])."',".
                                        " text2_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text2_spacing'])."',".
                                        " text2_width           = '".$this->filterInput($temp_contform_val[$sub]['text2_width'])."',".
                                        " text2_required        = '".$this->filterInput($temp_contform_val[$sub]['text2_required'])."',".
                                        " text2_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text2_instruction'])."',".
                                        " text3_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text3_spacing'])."',".
                                        " text3_width           = '".$this->filterInput($temp_contform_val[$sub]['text3_width'])."',".
                                        " text3_required        = '".$this->filterInput($temp_contform_val[$sub]['text3_required'])."',".
                                        " text3_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text3_instruction'])."',".
                                        " text4_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text4_spacing'])."',".
                                        " text4_width           = '".$this->filterInput($temp_contform_val[$sub]['text4_width'])."',".
                                        " text4_required        = '".$this->filterInput($temp_contform_val[$sub]['text4_required'])."',".
                                        " text4_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text4_instruction'])."',".
                                        " mail_to               = '".$this->filterInput($temp_contform_val[$sub]['mail_to'])."',".
                                        " buildContact_bold     = '".$this->filterInput($temp_contform_val[$sub]['buildContact_bold'])."',".
                                        " buildContact_italic   = '".$this->filterInput($temp_contform_val[$sub]['buildContact_italic'])."',".
                                        " buildContact_underline= '".$this->filterInput($temp_contform_val[$sub]['buildContact_underline'])."',".
                                        " buildContact_strikethrough = '".$this->filterInput($temp_contform_val[$sub]['buildContact_strikethrough'])."',".
                                        " buildContact_textalign= '".$this->filterInput($temp_contform_val[$sub]['buildContact_textalign'])."',".
                                        " buildContact_fontsize = '".$this->filterInput($temp_contform_val[$sub]['buildContact_fontsize'])."',".
                                        " buildContact_fontcolor= '".$this->filterInput($temp_contform_val[$sub]['buildContact_fontcolor'])."',".
                                        " added_date            = '".$this->filterInput($temp_contform_val[$sub]['added_date'])."' ";                      
                            $res = $this->ExecuteQuery($ins_qry,'insert'); 
                            $temp_upd_id = $temp_contform_val[$sub]['id'].",";
                        }
                     else if(in_array($temp_contform_val[$sub]['id'],$cur_main_contform_id) && $temp_contform_val[$sub]['publish_status'] == 'U')   
                        {
                            $upd_qry =  " UPDATE ".$CFG['table']['contact_form']." SET ".
                                        " title_head            = '".$this->filterInput($temp_contform_val[$sub]['title_head'])."',".
                                        " text1                 = '".$this->filterInput($temp_contform_val[$sub]['text1'])."',".
                                        " text2                 = '".$this->filterInput($temp_contform_val[$sub]['text2'])."',".
                                        " text3                 = '".$this->filterInput($temp_contform_val[$sub]['text3'])."',".
                                        " text4                 = '".$this->filterInput($temp_contform_val[$sub]['text4'])."',".
                                        " text5                 = '".$this->filterInput($temp_contform_val[$sub]['text5'])."',".
                                        " text1_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text1_spacing'])."',".
                                        " text1_width 	        = '".$this->filterInput($temp_contform_val[$sub]['text1_width'])."',".
                                        " text1_required        = '".$this->filterInput($temp_contform_val[$sub]['text1_required'])."',".
                                        " text1_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text1_instruction'])."',".
                                        " text2_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text2_spacing'])."',".
                                        " text2_width           = '".$this->filterInput($temp_contform_val[$sub]['text2_width'])."',".
                                        " text2_required        = '".$this->filterInput($temp_contform_val[$sub]['text2_required'])."',".
                                        " text2_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text2_instruction'])."',".
                                        " text3_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text3_spacing'])."',".
                                        " text3_width           = '".$this->filterInput($temp_contform_val[$sub]['text3_width'])."',".
                                        " text3_required        = '".$this->filterInput($temp_contform_val[$sub]['text3_required'])."',".
                                        " text3_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text3_instruction'])."',".
                                        " text4_spacing         = '".$this->filterInput($temp_contform_val[$sub]['text4_spacing'])."',".
                                        " text4_width           = '".$this->filterInput($temp_contform_val[$sub]['text4_width'])."',".
                                        " text4_required        = '".$this->filterInput($temp_contform_val[$sub]['text4_required'])."',".
                                        " text4_instruction     = '".$this->filterInput($temp_contform_val[$sub]['text4_instruction'])."',".
                                        " mail_to               = '".$this->filterInput($temp_contform_val[$sub]['mail_to'])."',".
                                        " buildContact_bold     = '".$this->filterInput($temp_contform_val[$sub]['buildContact_bold'])."',".
                                        " buildContact_italic   = '".$this->filterInput($temp_contform_val[$sub]['buildContact_italic'])."',".
                                        " buildContact_underline= '".$this->filterInput($temp_contform_val[$sub]['buildContact_underline'])."',".
                                        " buildContact_strikethrough = '".$this->filterInput($temp_contform_val[$sub]['buildContact_strikethrough'])."',".
                                        " buildContact_textalign= '".$this->filterInput($temp_contform_val[$sub]['buildContact_textalign'])."',".
                                        " buildContact_fontsize = '".$this->filterInput($temp_contform_val[$sub]['buildContact_fontsize'])."',".
                                        " buildContact_fontcolor= '".$this->filterInput($temp_contform_val[$sub]['buildContact_fontcolor'])."',".
                                        " added_date            = '".$this->filterInput($temp_contform_val[$sub]['added_date'])."' ".
                              " WHERE    id                    = '".$this->filterInput($temp_contform_val[$sub]['id'])."' AND ".
                                        " page_id               = '".$this->filterInput($temp_contform_val[$sub]['page_id'])."'AND ".
                                        " page_list_id          = '".$this->filterInput($temp_contform_val[$sub]['page_list_id'])."' AND ".
                                        " domain_id             = '".$this->filterInput($temp_contform_val[$sub]['domain_id'])."' ";                      
                            $res = $this->ExecuteQuery($upd_qry,'insert'); 
                            
                            $temp_upd_id = $temp_contform_val[$sub]['id'].",";
                        }                                
                    } 
            }  
            
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_contact_form'],"publish_status = 'N'","id IN ('".$this->filterInput($temp_upd_id)."')");
                }
    }

    #................................................................................................................................
    
    
    #funciton to get the domain details valur
    /**
     * Common::getTempDomainDetailsValue()
     * 
     * @return
     */
    function getTempDomainDetailsValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT temp_id, domain_id,  theme_id, blog_id,  store_id , site_title, ssl_value, subdomainurl, favicon_image,".
                                  "	header_logo_config,	header_title, header_banner, header_slider, site_password, navigation, facebook_connected, ".
                                  " site_description, metakeywords,	footer_code, header_code, aboutus, author, archives, categories, seo_optimize, ".
                                  "	addeddate, heading_content,	heading_description, site_title_font_style, nav_menu_font_style, main_headline_font_style,". 	                                " site_title_font_size,	nav_menu_font_size, main_headline_font_size, site_title_line_size, nav_menu_line_size, ".
                                  "	main_headline_line_size, logo_height, logo_width, logo_left, logo_top, background_enable, footer_content, ".
                                  " subs_monthly_date, subscription_request, last_subscribed,publish_status FROM ".$tablename." ".
                                  " WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }
    #...................................................................................................................................    
    #update the temp domain details to original table
    /**
     * Common::updateDomaindetailTemptoOrg()
     * 
     * @return
     */
    function updateDomaindetailTemptoOrg($domain_det_res)
        {
            global $CFG;
            //print_r($domain_det_res);
              $update_qry = "UPDATE ".$CFG['table']['domaindetails']." SET ".
                          " theme_id   = '".$this->filterInput($domain_det_res[0]['theme_id'])."' , blog_id = '".$this->filterInput($domain_det_res[0]['blog_id'])."', ".
                          " store_id   = '".$this->filterInput($domain_det_res[0]['store_id'])."',".
                          " site_title = '".addslashes($domain_det_res[0]['site_title'])."',  subdomainurl = '".$this->filterInput($domain_det_res[0]['subdomainurl'])."',".
                          "	ssl_value        = '".$this->filterInput($domain_det_res[0]['ssl_value'])."',   favicon_image= '".$this->filterInput($domain_det_res[0]['favicon_image'])."', ".
                          "	header_logo_config = '".$this->filterInput($domain_det_res[0]['header_logo_config'])."',header_title = '".$this->filterInput($domain_det_res[0]['header_title'])."',".
                          " header_banner = '".$this->filterInput($domain_det_res[0]['header_banner'])."', header_slider = '".$this->filterInput($domain_det_res[0]['header_slider'])."', ".
                          " site_password = '".$this->filterInput($domain_det_res[0]['site_password'])."', navigation = '".$this->filterInput($domain_det_res[0]['navigation'])."',".
                          " facebook_connected='".$this->filterInput($domain_det_res[0]['facebook_connected'])."',site_description='".addslashes($domain_det_res[0]['site_description'])."',".
                          " metakeywords       = '".$this->filterInput($domain_det_res[0]['metakeywords'])."', footer_code = '".$this->filterInput($domain_det_res[0]['footer_code'])."',".
                          " header_code        = '".$this->filterInput($domain_det_res[0]['header_code'])."', aboutus = '".$this->filterInput($domain_det_res[0]['aboutus'])."',".
                          " author             = '".addslashes($domain_det_res[0]['author'])."', archives = '".addslashes($domain_det_res[0]['archives'])."', ".
                          " categories         = '".addslashes($domain_det_res[0]['categories'])."', seo_optimize = '".$this->filterInput($domain_det_res[0]['seo_optimize'])."', ".
                          "	addeddate = '".$this->filterInput($domain_det_res[0]['addeddate'])."', heading_content = '".$domain_det_res[0]['heading_content']."',".
                          "	heading_description='".$domain_det_res[0]['heading_description']."',site_title_font_style='".$this->filterInput($domain_det_res[0]['site_title_font_style'])."',".
                          " nav_menu_font_style='".$this->filterInput($domain_det_res[0]['nav_menu_font_style'])."',main_headline_font_style='".$this->filterInput($domain_det_res[0]['main_headline_font_style'])."',". 
                          " site_title_font_size = '".$this->filterInput($domain_det_res[0]['site_title_font_size'])."', nav_menu_font_size = '".$this->filterInput($domain_det_res[0]['nav_menu_font_size'])."',".
                          " main_headline_font_size='".$this->filterInput($domain_det_res[0]['main_headline_font_size'])."',site_title_line_size='".$this->filterInput($domain_det_res[0]['site_title_line_size'])."',".
                          " nav_menu_line_size = '".$this->filterInput($domain_det_res[0]['nav_menu_line_size'])."', main_headline_line_size = '".$this->filterInput($domain_det_res[0]['main_headline_line_size'])."',".
                          " logo_height = '".$this->filterInput($domain_det_res[0]['logo_height'])."', logo_width = '".$this->filterInput($domain_det_res[0]['logo_width'])."',".
                          " logo_left = '".$this->filterInput($domain_det_res[0]['logo_left'])."', logo_top = '".$this->filterInput($domain_det_res[0]['logo_top'])."', ".
                          " background_enable = '".$this->filterInput($domain_det_res[0]['background_enable'])."', footer_content = '".addslashes($domain_det_res[0]['footer_content'])."', ".
                          " subs_monthly_date ='".$this->filterInput($domain_det_res[0]['subs_monthly_date'])."' , subscription_request ='".$this->filterInput($domain_det_res[0]['subscription_request'])."',".
                          " last_subscribed = '".$this->filterInput($domain_det_res[0]['last_subscribed'])."' ".
                          " WHERE domain_id  ='".$this->filterInput($domain_det_res[0]['domain_id'])."'";
            $res =$this->ExecuteQuery($update_qry,'update');
            
            $this->getUpdate($CFG['table']['temp_domaindetails'],"publish_status = 'N'","domain_id = '".$this->filterInput($domain_det_res[0]['domain_id'])."'");   
            //echo __LINE__;die();       
        }        
    #................................................................................................................................
    #get the temp selection value
    /**
     * Common::getThemeSelectionValue()
     * 
     * @return
     */
    function getThemeSelectionValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT id, theme_id, theme_name, domain_id, theme_color, status, selecteddate,	change_status  FROM ".$tablename." ".
                                  " WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }    
    #get the blog selection value
    /**
     * Common::getblogSelectionValue()
     * 
     * @return
     */
    function getblogSelectionValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT id, blog_id,	blog_name, blog_color, domain_id, status, selecteddate, change_status   FROM ".$tablename." ".
                                  " WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }    
    #......................................................................................................................................
    #update the theme selection temp table to main table
    /**
     * Common::updateThemeselectionTemptoOrg()
     * 
     * @return
     */
    function updateThemeselectionTemptoOrg($temp_val)
        {
            global $CFG;
            $upd_qry = " UPDATE ".$CFG['table']['themeselection']." SET ".
                       " theme_id = '".$this->filterInput($temp_val[0]['theme_id'])."', theme_name = '".$this->filterInput($temp_val[0]['theme_name'])."',".
                       " theme_color = '".$this->filterInput($temp_val[0]['theme_color'])."', status = '".$this->filterInput($temp_val[0]['status'])."',".
                       " selecteddate = '".$this->filterInput($temp_val[0]['selecteddate'])."' ".
                       " WHERE domain_id = '".$this->filterInput($temp_val[0]['domain_id'])."'  ";
            $res = $this->ExecuteQuery($upd_qry,'update');                         
            
            $this->getUpdate($CFG['table']['temp_themeselection'],"change_status = 'N'","domain_id = '".$this->filterInput($temp_val[0]['domain_id'])."'");
        } 
    #............................................................................................................................
    #upldate the blog selection temp table to main table
    /**
     * Common::updateBlogselectionTemptoOrg()
     * 
     * @return
     */
    function updateBlogselectionTemptoOrg($temp_val)    
        {
            global $CFG;
            $upd_qry = " UPDATE ".$CFG['table']['blogselection']." SET ".
                       " blog_id = '".$this->filterInput($temp_val[0]['blog_id'])."', blog_name = '".$this->filterInput($temp_val[0]['blog_name'])."',".
                       " blog_color = '".$this->filterInput($temp_val[0]['blog_color'])."', status = '".$this->filterInput($temp_val[0]['status'])."',".
                       " selecteddate = '".$this->filterInput($temp_val[0]['selecteddate'])."'".
                       " WHERE domain_id = '".$this->filterInput($temp_val[0]['domain_id'])."'  ";
            $res = $this->ExecuteQuery($upd_qry,'update');     
            
            $this->getUpdate($CFG['table']['temp_blogselection'],"change_status = 'N'","domain_id = '".$this->filterInput($temp_val[0]['domain_id'])."'");
        }
    #................................................................................................................................  
    /** domain images table
     */
    /**
     * Common::getDomainImagesValue()
     * 
     * @return
     */
    function getDomainImagesValue($domain_id,$tablename)
        {
            global $CFG;
            $qry_det = "SELECT img_id,temp_image_name,image_name   FROM ".$tablename." ".
                                  " WHERE domain_id ='".$this->filterInput($domain_id)."'";
            $res = $this->ExecuteQuery($qry_det,'select');
            return $res;
        }  
   #domain images publish process
   /**
    * Common::domainImagePublishProcess()
    * 
    * @return
    */
   function domainImagePublishProcess($domain_id)
        {
            global $CFG;
            $temp_images_val = $this->getDomainImagesValue($domain_id,$CFG['table']['domain_images']);
            foreach($temp_images_val as $key=>$value)
                {
                    if($temp_images_val[$key]['temp_image_name']!= $temp_images_val[$key]['image_name'])
                        {   
                            @unlink($CFG['site']['photo_domain_image_path'].'/'.$this->filterInput($temp_images_val[$key]['image_name']));
                            $upd_qry = " UPDATE ".$CFG['table']['domain_images']." SET ".
                               " image_name       = '".$this->filterInput($temp_images_val[$key]['temp_image_name'])."'".
                               " WHERE img_id     = '".$this->filterInput($temp_images_val[$key]['img_id'])."'  ";
                            $res = $this->ExecuteQuery($upd_qry,'update'); 
                        } 
                }
        }
    #................................................................................................................................  
    /** pagelist table
    */
    #funciton to get the domain details valur
    /**
     * Common::getPageListValue()
     * 
     * @return
     */
    function getPageListValue($domain_id,$tablename)
    {
        global $CFG;
        $qry_det = "SELECT pagelist,domain_id,page_id,post_title,title_select,text_title,file,document,divider,description_select,text_description,social_plugins,social_plugin_alignment,gallery,gallery_column,gallery_spacing,gallery_border,map,map_lat,map_lon,map_addr,map_zoom,slider,google_adsense,google_ads,google_script_text,contact_form,image_select,image_multiple_select,image_text,youtube_video,fb_fan_box,fb_fanpage_text,buildtitle_bold,buildtitle_italic,buildtitle_underline,buildtitle_strikethrough,buildTitle_textalign,buildTitle_fontsize,buildTitle_fontcolor,buildPara_bold,imgtitle_bold,imgtitle_italic,imgtitle_underline,imgtitle_strikethrough,imgtitle_textalign,imgtitle_fontsize,imgtitle_fontcolor,buildPara_italic,buildPara_underline,buildPara_strikethrough,buildPara_textalign,buildPara_fontsize,buildPara_fontcolor,main_title_font_style,main_paragraph_font_style,main_imagetitle_font_style,main_title_line_size,main_paragraph_line_size,main_imagetitle_line_size,main_imagetitle_font_size,sort_order,publish,img_width,img_height,column_show,column_count,column_id,column_pagelist,td_col1,td_col2,td_col3,td_col4,td_col5,publish_status,single_img_alignment FROM ".$tablename." ".
                              " WHERE domain_id ='".$this->filterInput($domain_id)."'"; 
        $res = $this->ExecuteQuery($qry_det,'select');
        return $res;
    }
    #................................................................................................................................... 
 
#page list able publish process
/**
 * Common::pageListPublishProcess()
 * 
 * @return
 */
function pageListPublishProcess($domain_id)
    {
        global $CFG;
        $temp_pagelist_val    = $this->getPageListValue($domain_id,$CFG['table']['temp_pagelist']);
        $main_pagelist_val    = $this->getPageListValue($domain_id,$CFG['table']['page_list']);
        $temp_pagelist_id = array();
        foreach($temp_pagelist_val as $temp=>$value)
            {
                $temp_pagelist_id[] = $temp_pagelist_val[$temp]['pagelist'];
            }      
                                               
        $cur_main_pagelist_id = array();
        foreach($main_pagelist_val as $main=>$value)
            {
                if( !in_array($main_pagelist_val[$main]['pagelist'],$temp_pagelist_id) )
                    {
                        $delet_id.= $main_pagelist_val[$main]['pagelist'].","; 
                    }
                else if(in_array($main_pagelist_val[$main]['pagelist'],$temp_pagelist_id)) 
                    {
                        $cur_main_pagelist_id[] = $main_pagelist_val[$main]['pagelist'];
                    }      
            }    
            
        $delet_id = substr($delet_id,0,-1); 
      
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['page_list']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND pagelist IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }     
            
        $temp_upd_id = '';
          foreach($temp_pagelist_val as $sub=>$value)
            {
                if($temp_pagelist_val[$sub]['publish_status'] == 'U')
                    {
                       if( !in_array($temp_pagelist_val[$sub]['pagelist'],$cur_main_pagelist_id) )
                            {  
                              $update_qry = "INSERT INTO ".$CFG['table']['page_list']." SET  
                                             pagelist                     = '".$this->filterInput($temp_pagelist_val[$sub]['pagelist'])."',
                                             domain_id                    = '".$this->filterInput($temp_pagelist_val[$sub]['domain_id'])."',
                                             page_id                      = '".$this->filterInput($temp_pagelist_val[$sub]['page_id'])."',                                                               post_title                   = '".$this->filterInput($temp_pagelist_val[$sub]['post_title'])."', 
                                             title_select                 = '".$this->filterInput($temp_pagelist_val[$sub]['title_select'])."',                                                          text_title                   = '".$temp_pagelist_val[$sub]['text_title']."',
                                             divider                      = '".$this->filterInput($temp_pagelist_val[$sub]['divider'])."',                                                               description_select           = '".$this->filterInput($temp_pagelist_val[$sub]['description_select'])."',                                                    text_description                 = '".$this->My_addslashes_content($temp_pagelist_val[$sub]['text_description'])."',
                                             social_plugins               = '".$this->filterInput($temp_pagelist_val[$sub]['social_plugins'])."',
                                             social_plugin_alignment      = '".$this->filterInput($temp_pagelist_val[$sub]['social_plugin_alignment'])."',
                                             single_img_alignment         = '".$this->filterInput($temp_pagelist_val[$sub]['single_img_alignment'])."',  
                                             gallery                      = '".$this->filterInput($temp_pagelist_val[$sub]['gallery'])."',                                                               gallery_column               = '".$this->filterInput($temp_pagelist_val[$sub]['gallery_column'])."',  
                                             gallery_spacing              = '".$this->filterInput($temp_pagelist_val[$sub]['gallery_spacing'])."',                                                       gallery_border               = '".$this->filterInput($temp_pagelist_val[$sub]['gallery_border'])."', 
                                             map                          = '".$this->filterInput($temp_pagelist_val[$sub]['map'])."',
                                             map_lat                      = '".$this->filterInput($temp_pagelist_val[$sub]['map_lat'])."',
                                             map_lon                      = '".$this->filterInput($temp_pagelist_val[$sub]['map_lon'])."', 
                                             map_addr                     = '".$this->filterInput($temp_pagelist_val[$sub]['map_addr'])."', 
                                             map_zoom                     = '".$this->filterInput($temp_pagelist_val[$sub]['map_zoom'])."', 
                                             slider                       = '".$this->filterInput($temp_pagelist_val[$sub]['slider'])."',
                                             google_adsense               = '".$this->filterInput($temp_pagelist_val[$sub]['google_adsense'])."',                                                        google_ads                   = '".$this->filterInput($temp_pagelist_val[$sub]['google_ads'])."',  
                                             google_script_text           = '".$temp_pagelist_val[$sub]['google_script_text']."',                                                    contact_form                 = '".$this->filterInput($temp_pagelist_val[$sub]['contact_form'])."',  
                                             image_select                 = '".$this->filterInput($temp_pagelist_val[$sub]['image_select'])."',                                                          image_multiple_select        = '".$this->filterInput($temp_pagelist_val[$sub]['image_multiple_select'])."',
                                             image_text                   = '".addslashes($temp_pagelist_val[$sub]['image_text'])."',                                                            youtube_video                = '".$this->filterInput($temp_pagelist_val[$sub]['youtube_video'])."', 
                                             file                         = '".$this->filterInput($temp_pagelist_val[$sub]['file'])."',  
                                             document                     = '".$this->filterInput($temp_pagelist_val[$sub]['document'])."',  
                                             fb_fan_box                   = '".$this->filterInput($temp_pagelist_val[$sub]['fb_fan_box'])."',                                                            fb_fanpage_text              = '".$this->filterInput($temp_pagelist_val[$sub]['fb_fanpage_text'])."', 
                                             buildtitle_bold              = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_bold'])."',                                                       buildtitle_italic            = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_italic'])."',
                                             buildtitle_underline         = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_underline'])."',                                                  buildtitle_strikethrough     = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_strikethrough'])."',
                                             buildTitle_textalign 	      = '".$this->filterInput($temp_pagelist_val[$sub]['buildTitle_textalign'])."', 
                                             buildTitle_fontsize          = '".$this->filterInput($temp_pagelist_val[$sub]['buildTitle_fontsize'])."', 
                                             buildTitle_fontcolor 	      = '".$this->filterInput($temp_pagelist_val[$sub]['buildTitle_fontcolor'])."', 
                                             buildPara_bold               = '".$this->filterInput($temp_pagelist_val[$sub]['buildPara_bold'])."', 
                                             imgtitle_bold                = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_bold'])."', 
                                             imgtitle_italic              = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_italic'])."', 
                                             imgtitle_underline           = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_underline'])."',                                                    imgtitle_strikethrough       = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_strikethrough'])."', 
                                             imgtitle_textalign           = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_textalign'])."' ,                                                    imgtitle_fontsize                     ='".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_fontsize'])."', 
                                             imgtitle_fontcolor                     ='".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_fontcolor'])."', 
                                             buildPara_italic                       ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_italic'])."', 
                                             buildPara_underline                    ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_underline'])."', 
                                             buildPara_strikethrough 	            ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_strikethrough'])."', 
                                             buildPara_textalign                    ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_textalign'])."',                                          buildPara_fontsize                     ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_fontsize'])."', 
                                             buildPara_fontcolor                    ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_fontcolor'])."',                                          main_title_font_style                  ='".$this->filterInput($temp_pagelist_val[$sub]['main_title_font_style'])."', 
                                             main_paragraph_font_style            ='".$this->filterInput($temp_pagelist_val[$sub]['main_paragraph_font_style'])."',                                      main_imagetitle_font_style           ='".$this->filterInput($temp_pagelist_val[$sub]['main_imagetitle_font_style'])."',
                                             main_title_line_size                 ='".$this->filterInput($temp_pagelist_val[$sub]['main_title_line_size'])."',
                                             main_paragraph_line_size             ='".$this->filterInput($temp_pagelist_val[$sub]['main_paragraph_line_size'])."',
                                             main_imagetitle_line_size            ='".$this->filterInput($temp_pagelist_val[$sub]['main_imagetitle_line_size'])."',
                                             main_imagetitle_font_size            ='".$this->filterInput($temp_pagelist_val[$sub]['main_imagetitle_font_size'])."',
                                             sort_order                             ='".$this->filterInput($temp_pagelist_val[$sub]['sort_order'])."',
                                             publish                                ='1',
                                             img_width                              ='".$this->filterInput($temp_pagelist_val[$sub]['img_width'])."',
                                             img_height                             ='".$this->filterInput($temp_pagelist_val[$sub]['img_height'])."',
                                             column_show                            ='".$this->filterInput($temp_pagelist_val[$sub]['column_show'])."',
                                             column_count                           ='".$this->filterInput($temp_pagelist_val[$sub]['column_count'])."',
                                             column_id                              ='".$this->filterInput($temp_pagelist_val[$sub]['column_id'])."',
                                             column_pagelist                        ='".$this->filterInput($temp_pagelist_val[$sub]['column_pagelist'])."',
                                             td_col1                                ='".$this->filterInput($temp_pagelist_val[$sub]['td_col1'])."',
                                             td_col2                                ='".$this->filterInput($temp_pagelist_val[$sub]['td_col2'])."',
                                             td_col3 	                            ='".$this->filterInput($temp_pagelist_val[$sub]['td_col3'])."',
                                             td_col4 	                            ='".$this->filterInput($temp_pagelist_val[$sub]['td_col4'])."',
                                             td_col5 	                            ='".$this->filterInput($temp_pagelist_val[$sub]['td_col5'])."' "; 
                                $res =$this->ExecuteQuery($update_qry,'insert');  
                                
                                $temp_upd_id = $temp_pagelist_val[$sub]['pagelist'].",";      
                            }
                        else if(in_array($temp_pagelist_val[$sub]['pagelist'],$cur_main_pagelist_id) && $temp_pagelist_val[$sub]['publish_status'] == 'U')   
                            {
                       
                                $upd_qry = "UPDATE  ".$CFG['table']['page_list']." SET  
                                             page_id                      = '".$this->filterInput($temp_pagelist_val[$sub]['page_id'])."',                                                               post_title                   = '".$this->filterInput($temp_pagelist_val[$sub]['post_title'])."', 
                                             title_select                 = '".$this->filterInput($temp_pagelist_val[$sub]['title_select'])."',                                                          text_title                   = '".$temp_pagelist_val[$sub]['text_title']."',
                                             divider                      = '".$this->filterInput($temp_pagelist_val[$sub]['divider'])."',                                                               description_select           = '".$this->filterInput($temp_pagelist_val[$sub]['description_select'])."',                                                    text_description             = '".$this->My_addslashes_content($temp_pagelist_val[$sub]['text_description'])."',
                                             social_plugins               = '".$this->filterInput($temp_pagelist_val[$sub]['social_plugins'])."',
                                             social_plugin_alignment      = '".$this->filterInput($temp_pagelist_val[$sub]['social_plugin_alignment'])."',
                                             single_img_alignment         = '".$this->filterInput($temp_pagelist_val[$sub]['single_img_alignment'])."',
                                             gallery                      = '".$this->filterInput($temp_pagelist_val[$sub]['gallery'])."',                                                               gallery_column               = '".$this->filterInput($temp_pagelist_val[$sub]['gallery_column'])."',  
                                             gallery_spacing              = '".$this->filterInput($temp_pagelist_val[$sub]['gallery_spacing'])."',                                                       gallery_border               = '".$this->filterInput($temp_pagelist_val[$sub]['gallery_border'])."', 
                                             file                         = '".$this->filterInput($temp_pagelist_val[$sub]['file'])."',
                                             document                     = '".$this->filterInput($temp_pagelist_val[$sub]['document'])."', 
                                             map                          = '".$this->filterInput($temp_pagelist_val[$sub]['map'])."',
                                             map_lat                      = '".$this->filterInput($temp_pagelist_val[$sub]['map_lat'])."',
                                             map_lon                      = '".$this->filterInput($temp_pagelist_val[$sub]['map_lon'])."', 
                                             map_addr                     = '".$this->filterInput($temp_pagelist_val[$sub]['map_addr'])."', 
                                             map_zoom                     = '".$this->filterInput($temp_pagelist_val[$sub]['map_zoom'])."', 
                                             slider                       = '".$this->filterInput($temp_pagelist_val[$sub]['slider'])."',
                                             google_adsense               = '".$this->filterInput($temp_pagelist_val[$sub]['google_adsense'])."',                                                        google_ads                   = '".$this->filterInput($temp_pagelist_val[$sub]['google_ads'])."',  
                                             google_script_text           = '".$this->filterInput($temp_pagelist_val[$sub]['google_script_text'])."',                                                    contact_form                 = '".$this->filterInput($temp_pagelist_val[$sub]['contact_form'])."',  
                                             image_select                 = '".$this->filterInput($temp_pagelist_val[$sub]['image_select'])."',                                                          image_multiple_select        = '".$this->filterInput($temp_pagelist_val[$sub]['image_multiple_select'])."',
                                             image_text                   = '".addslashes($temp_pagelist_val[$sub]['image_text'])."',                                                            youtube_video                = '".$this->filterInput($temp_pagelist_val[$sub]['youtube_video'])."', 
                                             fb_fan_box                   = '".$this->filterInput($temp_pagelist_val[$sub]['fb_fan_box'])."',                                                            fb_fanpage_text              = '".$this->filterInput($temp_pagelist_val[$sub]['fb_fanpage_text'])."', 
                                             buildtitle_bold              = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_bold'])."',                                                       buildtitle_italic            = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_italic'])."',
                                             buildtitle_underline         = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_underline'])."',                                                  buildtitle_strikethrough     = '".$this->filterInput($temp_pagelist_val[$sub]['buildtitle_strikethrough'])."',
                                             buildTitle_textalign 	      = '".$this->filterInput($temp_pagelist_val[$sub]['buildTitle_textalign'])."', 
                                             buildTitle_fontsize          = '".$this->filterInput($temp_pagelist_val[$sub]['buildTitle_fontsize'])."', 
                                             buildTitle_fontcolor 	      = '".$this->filterInput($temp_pagelist_val[$sub]['buildTitle_fontcolor'])."', 
                                             buildPara_bold               = '".$this->filterInput($temp_pagelist_val[$sub]['buildPara_bold'])."', 
                                             imgtitle_bold                = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_bold'])."', 
                                             imgtitle_italic              = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_italic'])."', 
                                             imgtitle_underline           = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_underline'])."',                                                    imgtitle_strikethrough       = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_strikethrough'])."', 
                                             imgtitle_textalign           = '".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_textalign'])."' ,                                                    imgtitle_fontsize                     ='".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_fontsize'])."', 
                                             imgtitle_fontcolor                     ='".$this->filterInput($temp_pagelist_val[$sub]['imgtitle_fontcolor'])."', 
                                             buildPara_italic                       ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_italic'])."', 
                                             buildPara_underline                    ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_underline'])."', 
                                             buildPara_strikethrough 	            ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_strikethrough'])."', 
                                             buildPara_textalign                    ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_textalign'])."',                                          buildPara_fontsize                     ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_fontsize'])."', 
                                             buildPara_fontcolor                    ='".$this->filterInput($temp_pagelist_val[$sub]['buildPara_fontcolor'])."',                                          main_title_font_style                  ='".$this->filterInput($temp_pagelist_val[$sub]['main_title_font_style'])."', 
                                             main_paragraph_font_style            ='".$this->filterInput($temp_pagelist_val[$sub]['main_paragraph_font_style'])."',                                      main_imagetitle_font_style           ='".$this->filterInput($temp_pagelist_val[$sub]['main_imagetitle_font_style'])."',
                                             main_title_line_size                 ='".$this->filterInput($temp_pagelist_val[$sub]['main_title_line_size'])."',
                                             main_paragraph_line_size             ='".$this->filterInput($temp_pagelist_val[$sub]['main_paragraph_line_size'])."',
                                             main_imagetitle_line_size            ='".$this->filterInput($temp_pagelist_val[$sub]['main_imagetitle_line_size'])."',
                                             main_imagetitle_font_size            ='".$this->filterInput($temp_pagelist_val[$sub]['main_imagetitle_font_size'])."',
                                             sort_order                             ='".$this->filterInput($temp_pagelist_val[$sub]['sort_order'])."',
                                             publish                                ='1',
                                             img_width                              ='".$this->filterInput($temp_pagelist_val[$sub]['img_width'])."',
                                             img_height                             ='".$this->filterInput($temp_pagelist_val[$sub]['img_height'])."',
                                             column_show                            ='".$this->filterInput($temp_pagelist_val[$sub]['column_show'])."',
                                             column_count                           ='".$this->filterInput($temp_pagelist_val[$sub]['column_count'])."',
                                             column_pagelist                        ='".$this->filterInput($temp_pagelist_val[$sub]['column_pagelist'])."',
                                             td_col1                                ='".$this->filterInput($temp_pagelist_val[$sub]['td_col1'])."',
                                             td_col2                                ='".$this->filterInput($temp_pagelist_val[$sub]['td_col2'])."',
                                             td_col3 	                            ='".$this->filterInput($temp_pagelist_val[$sub]['td_col3'])."',
                                             td_col4 	                            ='".$this->filterInput($temp_pagelist_val[$sub]['td_col4'])."',
                                             td_col5 	                            ='".$this->filterInput($temp_pagelist_val[$sub]['td_col5'])."'
                                  WHERE      pagelist                     = '".$this->filterInput($temp_pagelist_val[$sub]['pagelist'])."'  AND
                                             domain_id                    = '".$this->filterInput($temp_pagelist_val[$sub]['domain_id'])."'      "; 
                                $res =$this->ExecuteQuery($upd_qry,'update');  
                                
                                $temp_upd_id = $temp_pagelist_val[$sub]['pagelist'].",";      
                            }
                    } 
            }  
            
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_pagelist'],"publish_status = 'N'","pagelist IN ('".$this->filterInput($temp_upd_id)."')");
                }
    } 

     
    #................................................................................................................................... 
	//Function to publish the page
	/**
	 * Common::updatePublishPageForBlog()
	 * 
	 * @return
	 */
	function updatePublishPageForBlog()
		{
			global $CFG,$objSmarty;
			if($_POST['title_id'] != '')
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['page_list']." SET publish = '1' WHERE post_title ='".$this->filterInput($_POST['title_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	//Function to getBlog Comment
	/**
	 * Common::getBlogComment()
	 * 
	 * @return
	 */
	function getBlogComment($page_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT blog_comments FROM ".$CFG['table']['temp_pages']. " WHERE page_id = '".$this->filterInput($page_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres[0]['blog_comments'];
		}
	
	//Function to getStore Comment
	/**
	 * Common::getStoreComment()
	 * 
	 * @return
	 */
	function getStoreComment($page_id)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT store_comment FROM ".$CFG['table']['temp_pages']. " WHERE page_id = '".$this->filterInput($page_id)."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			//print_r($sqlres[0]['store_comment']);
			return $sqlres[0]['store_comment'];
		}
	//function for update header logo config in domain details table
	/**
	 * Common::updateTitleforheaderlogo()
	 * 
	 * @return
	 */
	function updateTitleforheaderlogo()
		{
			global $CFG,$objSmarty;
			if(isset($_POST['domain_id']) && !empty($_POST['domain_id']))
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET header_logo_config = '".$this->filterInput($_POST['header_logo_config'])."',publish_status='U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
			        $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
			
		}
    //update the heading    
	/**
	 * Common::updateHeading()
	 * 
	 * @return
	 */
	function updateHeading()
		{
			global $CFG,$objSmarty;
		    if(isset($_POST['domain_id']) && !empty($_POST['domain_id']))
                {
                    $publish_status='U';
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET heading_content = '".$_POST['heading_content']."',publish_status= '".$this->filterInput($publish_status)."' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	//update heading description
	/**
	 * Common::updateheadingdescription()
	 * 
	 * @return
	 */
	function updateheadingdescription()
		{
			global $CFG,$objSmarty;			
		    if(isset($_POST['domain_id']) && !empty($_POST['domain_id']))
                {
                    $publish_status='U';
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET heading_description = '".$_POST['headingdescription']."',publish_status= '".$this->filterInput($publish_status)."' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }
		}
	//Font Style changing Process for all title,heading
	/**
	 * Common::updateCommonFontForEach()
	 * 
	 * @return
	 */
	function updateCommonFontForEach()
		{
			global $CFG,$objSmarty;
			if($_POST['domain_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET ".$_POST['fontochange']." = '".$this->filterInput($_POST['font'])."',publish_status='U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	/**
	 * Common::updateCommonFontForEachPagelist()
	 * 
	 * @return
	 */
	function updateCommonFontForEachPagelist($changeval)
		{
			global $CFG,$objSmarty;
            if($_POST['page_id'] != '')
                {
                    if($_POST['fontochange'] == 'main_title_font_size')
        				$_POST['fontochange'] = 'buildTitle_fontsize';
        			elseif($_POST['fontochange'] == 'main_paragraph_font_size')
        				$_POST['fontochange'] = 'buildPara_fontsize';
        		      $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET ".$_POST['fontochange']." = '".$this->filterInput($_POST['font'])."',publish_status='U' WHERE page_id ='".$this->filterInput($_POST['page_id'])."' AND ".$changeval." = '1'";   
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	
	/**
	 * Common::updateLogoImg()
	 * 
	 * @return
	 */
	function updateLogoImg()
		{
			global $CFG,$objSmarty;
			if($_POST['domain_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET logo_width = '".$this->filterInput($_POST['width'])."',logo_height = '".$this->filterInput($_POST['height'])."',publish_status='U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	
	/**
	 * Common::updateImgForPage()
	 * 
	 * @return
	 */
	function updateImgForPage()
		{
			global $CFG,$objSmarty;
			if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET img_width = '".$this->filterInput($_POST['width'])."',img_height = '".$this->filterInput($_POST['height'])."',publish_status='U' WHERE pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	
	/**
	 * Common::updateLogoImgPos()
	 * 
	 * @return
	 */
	function updateLogoImgPos()
		{
			global $CFG,$objSmarty;
			if($_POST['domain_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET logo_left = '".$this->filterInput($_POST['left'])."',logo_top = '".$this->filterInput($_POST['top'])."',publish_status='U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	/**
	 * Common::updateUtubeVideo()
	 * 
	 * @return
	 */
	function updateUtubeVideo()
		{
			global $CFG,$objSmarty;
			if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_youtube_video']." SET youtube_url='".$this->filterInput($_POST['url'])."',youtube_spacing='".$this->filterInput($_POST['spacing'])."',youtube_width='".$this->filterInput($_POST['width'])."',publish_status='U' WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
        		
                	$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
		
	/**
	 * Common::insertYoutubeDetails()
	 * 
	 * @return
	 */
	function insertYoutubeDetails($userid,$pagelistid)
		{
			global $CFG,$objSmarty;
			if($userid != '' && $pagelistid != '' && $_GET['domainid'] != '' && $_GET['pageid'] != '')
                {
                     $UpQuery  = "INSERT ".$CFG['table']['temp_youtube_video']." SET   page_id = '".$this->filterInput($_GET['pageid'])."',page_list_id = '".$this->filterInput($pagelistid)."',domain_id = '".$this->filterInput($_GET['domainid'])."',youtube_url='".$this->filterInput($_POST['url'])."',youtube_spacing='".$this->filterInput($_POST['spacing'])."',youtube_width='".$this->filterInput($_POST['width'])."',added_date = NOW(),publish_status='U'"; 
        			$UpResult	=	$this->ExecuteQuery($UpQuery,'insert');
        			return true;
                }
		}
        
	/**
	 * Common::getYoutubeDetails()
	 * 
	 * @return
	 */
	function getYoutubeDetails($pagelistid)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT ytube_id,page_id,page_list_id,domain_id,youtube_url,youtube_spacing,youtube_width,added_date  FROM ".$CFG['table']['youtube_video']. " WHERE page_list_id = '".$this->filterInput($pagelistid)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("youtubelist", $sqlres);
		}
        //get you tube details for buildpagelist
    /**
     * Common::getYoutubeDetails_buildpage()
     * 
     * @return
     */
    function getYoutubeDetails_buildpage($pagelistid)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT ytube_id,page_id,page_list_id,domain_id,youtube_url,youtube_spacing,youtube_width,added_date  FROM ".$CFG['table']['temp_youtube_video']. " WHERE page_list_id = '".$this->filterInput($pagelistid)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("youtubelist", $sqlres);
		}  
	#Delete Youtube Video Details
	/**
	 * Common::deleteYoutubevideo()
	 * 
	 * @return
	 */
	function deleteYoutubevideo()
		{
			global $CFG,$objSmarty;
			if($_POST['page_list_id'])
                {
                    $UpQuery  = "DELETE FROM ".$CFG['table']['temp_youtube_video']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }			
		}
	//get invites url from site setting table
	/**
	 * Common::getInvitesUrl()
	 * 
	 * @return
	 */
	function getInvitesUrl()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT invites_url  FROM ".$CFG['table']['sitesetting']. " WHERE  id IS NOT NULL";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("invites_url",$sqlres[0]['invites_url']);
		}
	//to check this email already exist in webbxyz already
	/**
	 * Common::chkIsEmailAlreadyInReg()
	 * 
	 * @return
	 */
	function chkIsEmailAlreadyInReg($email)
		{
		  	global $CFG,$objSmarty;
			$sqlsel = "SELECT email  FROM ".$CFG['table']['register']. " WHERE  email='".$this->filterInput($email)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			//print_r($sqlres[0]['email']);die();
			return $sqlres[0]['email'];
		}
	/**
	 * Common::InsertCategory()
	 * 
	 * @return
	 */
	function InsertCategory()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "INSERT INTO ".$CFG['table']['temp_category']." SET cat_name = '".$this->filterInput($_POST['cat'])."',added_date = NOW(),domain_id = '".$this->filterInput($_SESSION['domain_id'])."',publish_status='U'"; 
			$lastId	=	$this->ExecuteQuery($UpQuery,'insert');
			$objSmarty->assign("lastId",$lastId);
			return true;			
		}
	/**
	 * Common::selectCat()
	 * 
	 * @return
	 */
	function selectCat()
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT *  FROM ".$CFG['table']['temp_category']. " WHERE  domain_id = '".$this->filterInput($_SESSION['domain_id'])."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			 
			$objSmarty->assign("cate",$sqlres);
		}
	/**
	 * Common::selectCategory()
	 * 
	 * @return
	 */
	function selectCategory($domain_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT *  FROM ".$CFG['table']['category']. " WHERE  domain_id = '".$this->filterInput($domain_id)."' ";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			 
			$objSmarty->assign("category",$sqlres);
		}
	/**
	 * Common::getCategoryForParticularPost()
	 * 
	 * @return
	 */
	function getCategoryForParticularPost($titleid,$domain_id,$title)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $titleid != '' && $title != '')
                {
                    $sqlsel = "SELECT category  FROM ".$CFG['table']['temp_posttitle']. " WHERE  domain_id = '".$this->filterInput($domain_id)."' AND post_id = '".$this->filterInput($titleid)."' AND title ='".$this->filterInput($title)."'";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        		 	$objSmarty->assign("cate",$sqlres);
        			return $sqlres[0]['category'];
                }		    
		}
	 
	/**
	 * Common::updateCategoryTable()
	 * 
	 * @return
	 */
	function updateCategoryTable($post_id)
		{
			global $CFG,$objSmarty;
			$sql_regupdate	=	"UPDATE ".$CFG['table']['category']." SET  post_id = '".$this->filterInput($post_id)."'";
			$res_regupdate	=	$this->ExecuteQuery($sql_regupdate,'update');
		}
	/**
	 * Common::selectPosted()
	 * 
	 * @return
	 */
	function selectPosted()
		{
			global $CFG,$objSmarty;
			if($_POST['cat'])
				{
					$sqlsel = "SELECT post_id,domain_id,title,addeddate FROM ".$CFG['table']['posttitle']. " WHERE category LIKE '%".$this->filterInput($_POST['cat'])."' OR category LIKE '".$this->filterInput($_POST['cat'])."%' OR category LIKE '".$this->filterInput($_POST['cat'])."' AND drafts !='yes'";
			 		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				}
		 	else
		 		{
		 		   if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                       {
                        $sqlsel = " SELECT post_id,domain_id,title,addeddate FROM ".$CFG['table']['posttitle']. " WHERE  drafts !='yes' AND domain_id = '".$this->filterInput($_SESSION['domain_id'])."' ";
    					$sqlres =  $this->ExecuteQuery($sqlsel,'select');
                       }					
				}
						
			$objSmarty->assign("titlelist", $sqlres);
		}
	//getFont style
	/**
	 * Common::getFontSize()
	 * 
	 * @return
	 */
	function getFontSize()
		{
			global $CFG;
			if($_POST['fonttotchange'] == 'site_title' && $_POST['domain_id'] != '')
				{
					$sqlsel = "SELECT site_title_font_size,site_title_line_size FROM ".$CFG['table']['temp_domaindetails']. " WHERE  domain_id = '".$this->filterInput($_POST['domain_id'])."' ";
					$sqlres =  $this->ExecuteQuery($sqlsel,'select');
					if($sqlres[0]['site_title_font_size'])
						$sqlres[0]['site_title_font_size'] = $sqlres[0]['site_title_font_size'];
					else
						$sqlres[0]['site_title_font_size'] = 20;
					if($sqlres[0]['site_title_line_size'])
						$sqlres[0]['site_title_line_size'] = $sqlres[0]['site_title_line_size'];
					else
						$sqlres[0]['site_title_line_size'] = 20;
					echo $sqlres[0]['site_title_font_size']."|@|".$sqlres[0]['site_title_line_size'];exit; 
				}
			elseif($_POST['fonttotchange'] == 'nav_menu' && $_POST['domain_id'] != '')
				{
					$sqlsel = "SELECT nav_menu_font_size,nav_menu_line_size FROM ".$CFG['table']['temp_domaindetails']. " WHERE  domain_id = '".$this->filterInput($_POST['domain_id'])."' ";
					$sqlres =  $this->ExecuteQuery($sqlsel,'select');	
					if($sqlres[0]['nav_menu_font_size'])
						$sqlres[0]['nav_menu_font_size'] = $sqlres[0]['nav_menu_font_size'];
					else
						$sqlres[0]['nav_menu_font_size'] = 20;
					if($sqlres[0]['nav_menu_line_size'])
						$sqlres[0]['nav_menu_line_size'] = $sqlres[0]['nav_menu_line_size'];
					else
						$sqlres[0]['nav_menu_line_size'] = 20;
					echo $sqlres[0]['nav_menu_font_size']."|@|".$sqlres[0]['nav_menu_line_size'];exit; 
				}
			elseif($_POST['fonttotchange'] == 'main_headline' && $_POST['domain_id'] != '')
				{
					$sqlsel = "SELECT main_headline_font_size,main_headline_line_size FROM ".$CFG['table']['temp_domaindetails']. " WHERE  domain_id = '".$this->filterInput($_POST['domain_id'])."' ";
					$sqlres =  $this->ExecuteQuery($sqlsel,'select');
					
					if($sqlres[0]['main_headline_font_size'])
						$sqlres[0]['main_headline_font_size'] = $sqlres[0]['main_headline_font_size'];
					else
						$sqlres[0]['main_headline_font_size'] = 20;
					if($sqlres[0]['main_headline_line_size'])
						$sqlres[0]['main_headline_line_size'] = $sqlres[0]['main_headline_line_size'];
					else
						$sqlres[0]['main_headline_line_size'] = 20;
							
					echo $sqlres[0]['main_headline_font_size']."|@|".$sqlres[0]['main_headline_line_size'];exit; 
				}
			elseif($_POST['fonttotchange'] == 'main_title' && $_POST['domain_id'] != '')
				{
					$sqlsel = "SELECT buildTitle_fontsize,main_title_line_size FROM ".$CFG['table']['temp_pagelist']. " WHERE  domain_id = '".$this->filterInput($_POST['domain_id'])."' AND page_id = '".$this->filterInput($_POST['page_id'])."'";
					$sqlres =  $this->ExecuteQuery($sqlsel,'select');	
					
					if($sqlres[0]['buildTitle_fontsize'])
						$sqlres[0]['buildTitle_fontsize'] = $sqlres[0]['buildTitle_fontsize'];
					else
						$sqlres[0]['buildTitle_fontsize'] = 20;
					if($sqlres[0]['main_title_line_size'])
						$sqlres[0]['main_title_line_size'] = $sqlres[0]['main_title_line_size'];
					else
						$sqlres[0]['main_title_line_size'] = 20;
						
					echo $sqlres[0]['buildTitle_fontsize']."|@|".$sqlres[0]['main_title_line_size'];exit; 
				}
			elseif($_POST['fonttotchange'] == 'main_paragraph' && $_POST['domain_id'] != '')
				{
					$sqlsel = "SELECT buildPara_fontsize,main_paragraph_line_size FROM ".$CFG['table']['temp_pagelist']. " WHERE  domain_id = '".$this->filterInput($_POST['domain_id'])."' AND page_id = '".$this->filterInput($_POST['page_id'])."'";
					$sqlres =  $this->ExecuteQuery($sqlsel,'select');	
					
					if($sqlres[0]['buildPara_fontsize'])
						$sqlres[0]['buildPara_fontsize'] = $sqlres[0]['buildPara_fontsize'];
					else
						$sqlres[0]['buildPara_fontsize'] = 20;
					if($sqlres[0]['main_paragraph_line_size'])
						$sqlres[0]['main_paragraph_line_size'] = $sqlres[0]['main_paragraph_line_size'];
					else
						$sqlres[0]['main_paragraph_line_size'] = 20;
						
					echo $sqlres[0]['buildPara_fontsize']."|@|".$sqlres[0]['main_paragraph_line_size'];exit; 
				}
			elseif($_POST['fonttotchange'] == 'main_imagetitle' && $_POST['domain_id'] != '')
				{
					$sqlsel = "SELECT main_imagetitle_line_size,main_imagetitle_font_size FROM ".$CFG['table']['temp_pagelist']. " WHERE  domain_id = '".$this->filterInput($_POST['domain_id'])."' AND page_id = '".$this->filterInput($_POST['page_id'])."'";
					$sqlres =  $this->ExecuteQuery($sqlsel,'select');	
					
					if($sqlres[0]['main_imagetitle_font_size'])
						$sqlres[0]['main_imagetitle_font_size'] = $sqlres[0]['main_imagetitle_font_size'];
					else
						$sqlres[0]['main_imagetitle_font_size'] = 20;
					if($sqlres[0]['main_imagetitle_line_size'])
						$sqlres[0]['main_imagetitle_line_size'] = $sqlres[0]['main_imagetitle_line_size'];
					else
						$sqlres[0]['main_imagetitle_line_size'] = 20;
						
					echo $sqlres[0]['main_imagetitle_font_size']."|@|".$sqlres[0]['main_imagetitle_line_size'];exit; 
				}
		}
	 
	 /**
	  * Common::updateSortableForPage()
	  * 
	  * @return
	  */
	 function updateSortableForPage($ord,$key)
	 	{
	 		global $CFG,$objSmarty;
				
			$UpQuery  = "UPDATE ".$CFG['table']['temp_pages']." SET sort_order = '".$this->filterInput($key)."',publish_status='U' WHERE page_id ='".$this->filterInput($ord)."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			
		}
	/**
	 * Common::updateTitleInIndex()
	 * 
	 * @return
	 */
	function updateTitleInIndex()
		{
			global $CFG,$objSmarty;
			
		 	if($_POST['domain_id'])
                {
                    $publish_status='U';
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET site_title = '".$_POST['site_title']."',publish_status= '".$this->filterInput($publish_status)."' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }            
		}
	/**
	 * Common::updateSubdomainForSettings()
	 * 
	 * @return
	 */
	function updateSubdomainForSettings($domain_id)
		{
			global $CFG,$objSmarty;
	 	//$UpQuery  = "UPDATE ".$CFG['table']['domaindetails']." SET subdomainurl = '".$_POST['subdomain_url']."' WHERE domain_id ='".$domain_id."'";
        if($domain_id)
            {
                $publish_status='U';
                $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET subdomainurl = '".$this->filterInput($_POST['subdomain_url'])."', domain_type = '".$this->filterInput($_POST['type'])."',publish_status= '".$this->filterInput($publish_status)."' WHERE domain_id ='".$this->filterInput($domain_id)."'";
    			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
    			echo "updated";
            }        
		}
	
	#-----------------------------------------------------------------------------------------------------------------------------------
	#Add domain in point domain page
	/**
	 * Common::addPointDomain()
	 * 
	 * @return
	 */
	function addPointDomain()
		{
			global $CFG, $objSmarty;
            if(isset($_SESSION['user_id']) && $_POST['domain_id'] != '')
                {
                    $point_domain       = $this->filterInput($_POST['point_domain']);
        		    $inssql = "INSERT into 
        								".$CFG['table']['point']." 
        							SET 
        								point_domain          = '".$this->filterInput($point_domain)."',
        								domain_id             = '".$this->filterInput($_POST['domain_id'])."',
        								user_id               = '".$this->filterInput($_SESSION['user_id'])."',
        								addeddate             =NOW()";
        								  
        			$ressql = $this->ExecuteQuery($inssql, "insert");
        			
        			$from_email =   $this->getValue("email",$CFG['table']['register'],"user_id='".$this->filterInput($_SESSION['user_id'])."'");
        			$to_email	= 	$this->getValue("admin_email",$CFG['table']['sitesetting'],"id='1'");
        			$domain_name = $this->getValue("subdomainurl",$CFG['table']['domaindetails'],"domain_id='".$this->filterInput($_POST['domain_id'])."'");
        	
        					$mailsubject  = $CFG['site']['sitename']." Point Domain Details ";
        					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailPointDomain.tpl");
        					$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
        					$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
        			        $mail_content = str_replace('{STATUS}','The Domain"'.$CFG['site']['base_url'].'" has been requested to point  the domain to "'.$point_domain.'" .So please configure the DNS settings',$mail_content);
                            $mail_content = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content);
        					$ok=$this->sendMail($CFG['site']['site_main_domain'],$from_email,$to_email,$mailsubject,$mail_content);
        			$objSmarty->assign('ErrorMessage','Domain Name Added Successfully');
                }			
		}
	/**
	 * Common::resetLinkSendToUsers()
	 * 
	 * @return
	 */
	function resetLinkSendToUsers()
		{
			global $CFG;
			global $objSmarty;
			$email       = $this->My_addslashes($_POST['email']);
			$user_id       = $this->My_addslashes($_POST['user_id']);
			$reset_email		=	$this->getMultivalue('email,user_id,username,password,log_status',$CFG['table']['register'],"email = '".$email."' "); 			
			if($reset_email[0]['email'])
				{
			 	if($reset_email[0]['log_status'] == '2')
					{
						$user=base64_encode($user_id);
						$from_email			= 	$this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id='1'");
						$mailsubject  = $CFG['site']['sitename']." Reset Your Password ";
						$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailResetPass.tpl");
						$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
						$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
				        $mail_content = str_replace('{INIT}','Hi,',$mail_content);
				        $mail_content = str_replace('{STATUS_ONE}','A password reset was requested for your account.',$mail_content);
				        $mail_content = str_replace('{STATUS_TWO}','Please follow the link next to the account you wish to reset.',$mail_content);
				        $mail_content = str_replace('{SINCERELY}','Sincerely',$mail_content);
				        $mail_content = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' team',$mail_content);
				        $mail_content = str_replace('{LINK}',$CFG['site']['base_url'].'/resetNewConfirm.php?u='.$user,$mail_content);
                        $mail_content = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content);
				        //echo $mail_content;die();
						$ok=$this->sendMail($CFG['site']['site_main_domain'],$from_email,$email,$mailsubject,$mail_content);
						if($ok){
								 echo 'sendpass_success';
							}
					}
				else
					{
						echo 'activation_failed';
					}
		 		}
			else
				{
					echo 'no_email';
				}
			
		}
	/**
	 * Common::resetPasswordAndChangeStatus()
	 * 
	 * @return
	 */
	function resetPasswordAndChangeStatus()
		{
			global $CFG;
			global $objSmarty;
		    $UpQuery  = "UPDATE ".$CFG['table']['register']." SET password = '".$this->filterInput($_POST['new_pass'])."', delete_status = '' WHERE user_id ='".$this->filterInput($_POST['user_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			echo "updated";
		}
	/**
	 * Common::EmailForForgotUser()
	 * 
	 * @return
	 */
	function EmailForForgotUser()
		{
			global $CFG,$objSmarty;
		
		$forgetemail	=	$this->filterInput($_POST['email']);
        $forgetpass		=	$this->getMultivalue('email,user_id,username,password,log_status',$CFG['table']['register'],"email = '".$this->filterInput($forgetemail)."' ");
		$from_email		=	$this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id='1'");	
		$user_id=$forgetpass[0]['user_id'];
		if(count($forgetpass[0]['password']) > 0 && count($forgetpass[0]['password']) != 0){
			if($forgetpass[0]['log_status'] == '2'){
				$user=base64_encode($user_id);
                
			$from_email			= 	$this->getValue("admin_email",$CFG['table']['sitesetting'],"domain_id='1'");
			$mailsubject  = $CFG['site']['sitename']." Reset Your Password ";
			$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailResetPass.tpl");
			$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
			$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
	        $mail_content = str_replace('{INIT}','Hi,',$mail_content);
	        $mail_content = str_replace('{STATUS_ONE}','A password reset was requested for your account.',$mail_content);
	        $mail_content = str_replace('{STATUS_TWO}','Please follow the link next to the account you wish to reset.',$mail_content);
	        $mail_content = str_replace('{SINCERELY}','Sincerely',$mail_content);
	        $mail_content = str_replace('{TEAM}','The '.$CFG['site']['site_main_domain'].' team',$mail_content);
	        $mail_content = str_replace('{LINK}',$CFG['site']['base_url'].'/resetNewConfirm.php?u='.$user,$mail_content);
            $mail_content = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content);
            
	        #echo $mail_content;die();
			$ok=$this->sendMail($CFG['site']['sitename'],$from_email,$forgetemail,$mailsubject,$mail_content);
			//$ok=1;
		        if($ok){
					 echo 'sendpass_success';
				}
			}else{
				echo 'activation_failed';
			}
		}else{
			echo 'no_email';
		}
		}
		
	//Gallery Image Function
	/**
	 * Common::getGalleryImage()
	 * 
	 * @return
	 */
	public function getGalleryImage($domain_id,$page_id,$page_list_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT gallery_name,gallery_name_thumb,gallery_id FROM ".$CFG['table']['temp_gallery_images']. " WHERE page_list_id = '".$this->filterInput($page_list_id)."' AND domain_id ='".$this->filterInput($domain_id)."' AND page_id ='".$this->filterInput($page_id)."' AND delete_status='N' order by gallery_id asc";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('images',$sqlres);			
		}
	 //Gallery Image Function and show slider images in Buildpage
	/**
	 * Common::getSliderImage()
	 * 
	 * @return
	 */
	public function getSliderImage($domain_id,$page_id,$page_list_id)
		{
			global $CFG,$objSmarty;
            if($domain_id != '' && $page_id != '' && $page_list_id != '')
                {
                    $sqlsel = "SELECT slider_images,slider_id FROM ".$CFG['table']['temp_slider_images']. " WHERE page_list_id = '".$this->filterInput($page_list_id)."' and domain_id ='".$this->filterInput($domain_id)."' and page_id ='".$this->filterInput($page_id)."' order by slider_id asc";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        			$objSmarty->assign('images',$sqlres);
                }		    			
		}	
	//Gallery Image Function and show slider images in subdomain pages
	/**
	 * Common::getSliderImageInSubdomain()
	 * 
	 * @return
	 */
	public function getSliderImageInSubdomain($domain_id,$page_id,$page_list_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT slider_images,slider_id FROM ".$CFG['table']['slider_images']. " WHERE page_list_id = '".$this->filterInput($page_list_id)."' and domain_id ='".$this->filterInput($domain_id)."' and page_id ='".$this->filterInput($page_id)."' and slider_images!='' order by slider_id asc";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('images',$sqlres);			
		}
   
   	//Show images for pagelist slider
	/**
	 * Common::getSliderImageNew()
	 * 
	 * @return
	 */
	
	//Show images for pagelist slider
	/**
	 * Common::getSliderImageNew()
	 * 
	 * @return
	 */
	public function getSliderImageNew($page_list_id)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT slider_images,slider_id,page_list_id,page_id FROM ".$CFG['table']['temp_slider_images']. " WHERE page_list_id = '".$this->filterInput($page_list_id)."' AND domain_id ='".$this->filterInput($_SESSION['domain_id'])."' AND page_id ='".$this->filterInput($_SESSION['page_id'])."' AND delete_status='N'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
           	$objSmarty->assign('slider_images',$sqlres);			
		}
			
	//Delete Image
	/**
	 * Common::delImgforGallery()
	 * 
	 * @return
	 */
	public function delImgforGallery()
		{
			global $CFG,$objSmarty;
            
            if($_POST['domain_id'] != '' && $_POST['gallery_id'] != '')
                {
                    $tempAlreadyImage = $this->getValue("gallery_name",$CFG['table']['temp_gallery_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND gallery_id ='".$this->filterInput($_POST['gallery_id'])."'");
    				
                    $imagesFolderImage = $this->getValue("gallery_name",$CFG['table']['gallery_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND gallery_id ='".$this->filterInput($_POST['gallery_id'])."'");
                    if($tempAlreadyImage && $imagesFolderImage == '')
                    @unlink($CFG['site']['photo_domain_image_path'].'/'.$tempAlreadyImage);
        			$UpQuery  = "DELETE  FROM ".$CFG['table']['temp_gallery_images']." WHERE gallery_id ='".$this->filterInput($_POST['gallery_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }            
		}
		
	//Delete Image
	/**
	 * Common::delImgforGoogleOld()
	 * 
	 * @return
	 */
	public function delImgforGoogleOld()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "DELETE  FROM ".$CFG['table']['google_images']." WHERE google_image_id ='".$this->filterInput($_POST['google_image_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			//@unlink($CFG['site']['photo_domain_image_path'].'/'.$_POST['image_name']);
		}
    //Delete Image from temp_google_images
	/**
	 * Common::delImgforGoogle()
	 * 
	 * @return
	 */
	public function delImgforGoogle()
		{
			global $CFG,$objSmarty;
            //for delete iamges from folder before publish
            if($_POST['domain_id'] != '' && $_POST['google_image_id'] != '')
                {
                    $tempAlreadyImage = $this->getValue("google_image_name",$CFG['table']['temp_google_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND google_image_id ='".$this->filterInput($_POST['google_image_id'])."'");
    				
                    $imagesFolderImage = $this->getValue("google_image_name",$CFG['table']['google_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND google_image_id ='".$this->filterInput($_POST['google_image_id'])."'");
                    if($tempAlreadyImage && $imagesFolderImage == '')
                    @unlink($CFG['site']['photo_domain_image_path'].'/'.$tempAlreadyImage);
        			$UpQuery  = "DELETE  FROM ".$CFG['table']['temp_google_images']." WHERE google_image_id ='".$this->filterInput($_POST['google_image_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        			 
                }            
		}
	
	//Delete Image For Slider
	/**
	 * Common::delImgforSlider()
	 * 
	 * @return
	 */
	public function delImgforSlider()
		{
			global $CFG,$objSmarty;
            //for delete iamges from folder before publish
            if($_POST['domain_id'] != '' && $_POST['slider_id'] != '')
                {
                    $tempAlreadyImage = $this->getValue("slider_images",$CFG['table']['temp_slider_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND slider_id ='".$this->filterInput($_POST['slider_id'])."'");
    				
                    $imagesFolderImage = $this->getValue("slider_images",$CFG['table']['slider_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND slider_id ='".$this->filterInput($_POST['slider_id'])."'");
                    if($tempAlreadyImage && $imagesFolderImage == '')
                    @unlink($CFG['site']['photo_domain_image_path'].'/'.$tempAlreadyImage);
        			$UpQuery  = "DELETE  FROM ".$CFG['table']['temp_slider_images']." WHERE slider_id ='".$this->filterInput($_POST['slider_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                 }            
			//@unlink($CFG['site']['photo_domain_image_path'].'/'.$_POST['image_name']);
		}
    //Delete Image For Slider banner
	/**
	 * Common::delImgforSliderBanner()
	 * 
	 * @return
	 */
	public function delImgforSliderBanner()
		{
			global $CFG,$objSmarty;
            
            if($_POST['domain_id'] != '' && $_POST['img_id'] != '')
                {
                    $tempAlreadyImage = $this->getValue("image_name",$CFG['table']['temp_banner_slider_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND banner_slider_id ='".$this->filterInput($_POST['img_id'])."'");
    				
                    $imagesFolderImage = $this->getValue("image_name",$CFG['table']['banner_slider_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND banner_slider_id ='".$this->filterInput($_POST['img_id'])."'");
                    //if($tempAlreadyImage && $imagesFolderImage == '')
                    //@unlink($CFG['site']['photo_domain_image_path'].'/'.$tempAlreadyImage);
        			//$UpQuery  = "DELETE  FROM ".$CFG['table']['temp_banner_slider_images']." WHERE banner_slider_id ='".$this->filterInput($_POST['img_id'])."'";
                    $UpQuery  = "UPDATE  ".$CFG['table']['temp_banner_slider_images']." SET delete_status='Y' WHERE banner_slider_id ='".$this->filterInput($_POST['img_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    $numval = $this->getNumvalues($CFG['table']['temp_banner_slider_images']," domain_id='".$_SESSION['domain_id']."' AND  delete_status='N' ");
                    if($numval==0)
                        mysql_query("UPDATE hi_temp_domaindetails SET header_banner = '1',header_slider = '0',publish_status='U' WHERE domain_id='".$_SESSION['domain_id']."'");
                    }            
			//@unlink($CFG['site']['photo_domain_image_path'].'/'.$_POST['image_name']);
		}
		
	//Update Domain Background Enable
	/**
	 * Common::updateBackgroundEnable()
	 * 
	 * @return
	 */
	function updateBackgroundEnable()
		{
			global $CFG, $objSmarty;
            if($_POST['domain_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET background_enable = '".$this->filterInput($_POST['changeable'])."',publish_status='U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }		    
		}
	
	//Get The Banner Enable Concept
	/**
	 * Common::getBannerEnable()
	 * 
	 * @return
	 */
	function getBannerEnable($domain_id)
		{
			global $CFG;
			global $objSmarty;
		    $banner_config =   $this->getValue("background_enable",$CFG['table']['temp_domaindetails'],"domain_id='".$this->filterInput($domain_id)."'");
			if($banner_config == 'On')
				$banner_config = 1;
			else	
			   $banner_config = 0;
			$objSmarty->assign('banner_config',$banner_config);
		}
        
    //Get The Banner Enable Concept for subdomain
	/**
	 * Common::getBannerEnableForSubdomain()
	 * 
	 * @return
	 */
	function getBannerEnableForSubdomain($domain_id)
		{
			global $CFG;
			global $objSmarty;
		    $banner_config =   $this->getValue("background_enable",$CFG['table']['domaindetails'],"domain_id='".$this->filterInput($domain_id)."'");
			if($banner_config == 'On')
				$banner_config = 1;
			else	
			   $banner_config = 0;
			$objSmarty->assign('sub_banner_config',$banner_config);
		}
	
	//Update Map Details
	/**
	 * Common::updateMapProcess()
	 * 
	 * @return
	 */
	function updateMapProcess()
		{
			global $CFG, $objSmarty;
			if($_POST['page_list_id'] != '')
                {
                    if($_POST['addr'])
            			{
            				$latlng = $this->findLatLongForAddress($_POST['addr']);
            				$_POST['lat'] = $latlng[0];
            				$_POST['lon'] = $latlng[1];		
                            echo json_encode($latlng);
            			}    			  
    			  
        			if($_POST['zoom'] == '')
        			   $_POST['zoom'] = 15;
                       
        	       $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET map_zoom = '".$this->filterInput($_POST['zoom'])."',map_addr = '".$this->filterInput($_POST['addr'])."',map_lat = '".$this->filterInput($_POST['lat'])."',map_lon = '".$this->filterInput($_POST['lon'])."',publish_status='U' WHERE pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    
                }			
		}
	
	//Get LatLong
	/**
	 * Common::findLatLongForAddress()
	 * 
	 * @return
	 */
	function findLatLongForAddress($address)
			{
				if( !empty($address) )
					{
						$outputStr .= " ".$address;		
					}		
						
				$outputStr = $outputStr." "."";		
			
				$outputaddr =  str_replace(' ','+',$outputStr);	
	        
	        	$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$outputaddr.'&sensor=false');
				$output= json_decode($geocode);
			
				$lat = $output->results[0]->geometry->location->lat;
				$long = $output->results[0]->geometry->location->lng;
				if(!empty($lat) || !empty($long))
					{
						$lat = $lat;
						$long = $long;
					}
				else
					{
						$lat = '37.775';
						$long = '-122.418333';
					}		
				return array($lat, $long);
			}
		
		//Update Gallery Process
		/**
		 * Common::updateGalleryProcess()
		 * 
		 * @return
		 */
		function updateGalleryProcess()
			{
				global $CFG, $objSmarty;
                if($_POST['page_list_id'])
                    {
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET gallery_column = '".$this->filterInput($_POST['column'])."',gallery_spacing = '".$this->filterInput($_POST['spacing'])."',gallery_border = '".$this->filterInput($_POST['border'])."' , publish_status ='U' WHERE  pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
    				    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    }			    
			}
		  /**
		   * Common::updateGoogleScriptProcess()
		   * this process for update script text area
		   * @return void
		   */
		/**
		 * Common::updateGoogleScriptProcess()
		 * 
		 * @return
		 */
		function updateGoogleScriptProcess()	
			{
				 
				global $CFG, $objSmarty;
			    
                if($_POST['page_list_id'] != '')
                    {
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET google_script_text = '".$this->filterInput($_POST['script_value'])."',google_ads = '".$this->filterInput($_POST['script_enum'])."',publish_status='U'  WHERE  pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        				
        				$sqlsel = "SELECT google_image_name,google_name_thumb FROM ".$CFG['table']['temp_google_images']." WHERE  page_list_id = '".$this->filterInput($_POST['page_list_id'])."'";
                        $res    = $this->ExecuteQuery($sqlsel,"select");
                        if(!empty($res))
                        {   
                            $image=$res[0]['google_image_name'];
                            $image2=$res[0]['google_name_thumb'];
                            @unlink($CFG['site']['photo_google_image_path']."/".$image);
                            @unlink($CFG['site']['photo_google_image_path']."/".$image2);
                        }
                        $delete = "DELETE FROM ".$CFG['table']['temp_google_images']." WHERE  page_list_id = '".$this->filterInput($_POST['page_list_id'])."'";
        				$deleteRes = mysql_query($delete) or die($this->mysql_error($UpQuery));
                    } 
			}
	  /**
	   * Common::updateUrlForGoogle()
	   * used to update url in google adsense process
	   * @return void
	   */
		/**
		 * Common::updateUrlForGoogle()
		 * 
		 * @return
		 */
		function updateUrlForGoogle()	
			{
				global $CFG, $objSmarty;
			     if($_POST['page_list_id'] != '' && $_POST['google_image_id'] != '')
                    {
                        $UpQuery  = "UPDATE ".$CFG['table']['temp_google_images']." SET google_url = '".$this->filterInput($_POST['image_text'])."',publish_status='U' WHERE  page_list_id ='".$this->filterInput($_POST['page_list_id'])."' AND google_image_id = '".$this->filterInput($_POST['google_image_id'])."' "; 
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    }               
			}
		//Gallery Image Function
		/**
		 * Common::getGalleryImageForSubDomain()
		 * 
		 * @return
		 */
		public function getGalleryImageForSubDomain($page_list_id)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT gallery_name,gallery_name_thumb,gallery_id FROM ".$CFG['table']['gallery_images']. " WHERE page_list_id = '".$this->filterInput($page_list_id)."' AND gallery_name!='' order by gallery_id asc"; 
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
                //print_r($sqlres);
				$objSmarty->assign('images',$sqlres);			
			}
		/**
		 * Common::getCheckedOption()
		 * 
		 * @return
		 */
		public function getCheckedOption($cateid,$array)
			{
				if(in_array($cateid,array_unique($array)))
					return "Checked";
				else
					return false;
			}
	  /**
	   * Common::getPageCount()
	   *
	   * @param mixed $domain_id
	   * @return void
	   */
	   //this function used to get page count to show more pages in home page
		/**
		 * Common::getPageCount()
		 * 
		 * @return
		 */
		public function getPageCount($domain_id)
			{
				global $CFG,$objSmarty;
                if($domain_id)
                    {
                        $sqlsel = "SELECT count(page_id) as page_count,pagename FROM ".$CFG['table']['pages']. " WHERE domain_id = '".$this->filterInput($domain_id)."' and page_parent_id = '0'";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				//print_r($sqlres[0]['page_count']);die();
        				return $sqlres[0]['page_count'];
                    }
			}
	  /**
	   * Common::getPages()
	   *
	   * @param mixed $domain_id
	   * @param string $lim
	   * @return void
	   */
		/**
		 * Common::getPages()
		 * 
		 * @return
		 */
		public function getPages($domain_id,$lim='')
			{
				global $CFG,$objSmarty;

			    $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pages']. " WHERE domain_id = '".$domain_id."' AND hide_navigation = '0' and page_parent_id = '0' order by sort_order  asc, page_id ASC";
			    $sqlres =  $this->ExecuteQuery($sqlsel,'select');
                #echo "<pre>"; print_r($sqlres); echo "</pre>";
                #echo $_SESSION['page_id']; exit;
				$objSmarty->assign("buildpagelist1", $sqlres);
			}
       /**
        * Common::getPages_subdomain()
        *  to get pages for subdomain
        * @param mixed $domain_id
        * @param string $lim
        * @return void
        */
       /**
        * Common::getPages_subdomain()
        * 
        * @return
        */
       public function getPages_subdomain($domain_id,$lim='')
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT * FROM ".$CFG['table']['pages']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND hide_navigation = '0' and page_parent_id = '0' order by sort_order  asc, page_id ASC";
			    $sqlres =  $this->ExecuteQuery($sqlsel,'select');
                #echo "<pre>"; print_r($sqlres); echo "</pre>";
                #echo $_SESSION['page_id']; exit;
				$objSmarty->assign("buildpagelist1", $sqlres);
			} 
	  
		/**
		 * Common::remainingdaysforScbscition()
		 * 
		 * @return
		 */
		public function remainingdaysforScbscition()
			{
				global $CFG,$objSmarty;
				
				$sqlsel = ' SELECT subs_monthly_date '.
					   ' FROM '.$CFG['table']['domaindetails'].
					   ' WHERE  user_id = '.$this->filterInput($_SESSION['user_id']);
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$trail_date = $sqlres[0]['subs_monthly_date'];
                $timestamp  = strtotime($trail_date);
     			$trail_date = date('Y-m-d', $timestamp); // d.m.YYYY
     			//echo $trail_date."<br>";
     			$current_date=date('Y-m-d');
     			//echo $current_date."<br>";
     			$date=(strtotime($trail_date)-strtotime($current_date)) / (60 * 60 * 24);
				if($date <= 0)
				   $date = 0;
				else
					$date = $date;
				$objSmarty->assign("rem_days", $date);
			}
		/**
		 * Common::remainingdays()
		 * 
		 * @return
		 */
		public function remainingdays($user_id)
			{
				global $CFG,$objSmarty;
				
				$sqlsel = ' SELECT subs_monthly_date '.
					   ' FROM '.$CFG['table']['domaindetails'].
					   ' WHERE  user_id = '.$this->filterInput($_SESSION['user_id']);
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$trail_date =$sqlres[0]['subs_monthly_date'];
                $timestamp = strtotime($trail_date);
     			$trail_date = date('Y-m-d', $timestamp); // d.m.YYYY
     			//echo $trail_date."<br>";
     			$current_date=date('Y-m-d');
     			//echo $current_date."<br>";
     			$date=(strtotime($trail_date)-strtotime($current_date)) / (60 * 60 * 24);
				if($date <= 0)
				   $date = 0;
				else
					$date = $date;
                    return $date;
				//$objSmarty->assign("rem_days", $date);
			}
		
			/**
			 * Common::do_user_payment()
			 * 
			 * @return
			 */
			public function do_user_payment($creditcardinfo)
			{
				global $CFG,$objSmarty;
				
				if(!$CFG['payment']['authorize']['test_mode']){
					$x_login 	= $CFG['payment']['authorize']['paymentlogin_live'];
					$x_tran_key = $CFG['payment']['authorize']['paymenttransaction_live'];
				}
				else{
					$x_login 	= $CFG['payment']['authorize']['paymentlogin_test'];
					$x_tran_key = $CFG['payment']['authorize']['paymenttransaction_test'];
				}
			    
			    //$x_login  	 		= '2P78f6Az5';//test
			    //$x_tran_key  		= '5mft9R43ppGd92J2';//test
			     
			    $invoice_num 		= '';
			    $x_card_code 		= $creditcardinfo['cvv_code'];
			    $card_number 		= $creditcardinfo['card_no'];
				$card_expiration	= $creditcardinfo['exp_date'];
				$paymentamount		= $creditcardinfo['pay_amount'];
				$user_first_name	= '';
				$user_last_name		= '';
				$user_address1		= '';
				$user_state			= '';
				$user_zip			= '';
			 
			    $post_values['x_invoice_num'] 		= $invoice_num;
			    $post_values['x_login'] 			= $x_login;
			    $post_values['x_tran_key'] 	 		= $x_tran_key;
			 
			    $post_values['x_card_code'] 		= $x_card_code;
			 
			    $post_values['x_version'] 			= "3.1";
			    $post_values['x_delim_data'] 		= "TRUE";
			    $post_values['x_delim_char'] 		= "|";
			    $post_values['x_relay_response'] 	= "FALSE";
			 
			    $post_values['x_type'] 				= "AUTH_CAPTURE"; //Optional
			    $post_values['x_method'] 			= "CC";
			    $post_values['x_card_num'] 			= $card_number;
			    $post_values['x_exp_date'] 			= $card_expiration;
			    $post_values['x_amount']   			= $paymentamount;
			 
			    $post_values['x_first_name'] 		= $user_first_name; //Optional (From Client)
			    $post_values['x_last_name'] 		= $user_last_name; //Optional (From Client)
			    $post_values['x_address'] 			= $user_address1; //Optional (From Client)
			    $post_values['x_state'] 			= $user_state; //Optional (From Client)
			    $post_values['x_zip'] 				= $user_zip; //Optional (From Client)
			 
			 	//Calling Payment function
			    $paymentResponse = $this->do_payment($post_values);
			 
			    return $paymentResponse;
			}	
	
	/**
	 * Common::do_payment()
	 * 
	 * @return
	 */
	public function do_payment ($post_values)
		{
			global $CFG,$objSmarty;
			
			if(!$CFG['payment']['authorize']['test_mode']){
				$post_url = $CFG['payment']['authorize']['authorize_url_live'];
			}else{
				$post_url = $CFG['payment']['authorize']['authorize_url_test'];
			}
			
			#echo "<br>url->".$post_url;		  
		    #$post_url = "https://secure.authorize.net/gateway/transact.dll";
		    #$post_url = "https://test.authorize.net/gateway/transact.dll";
		        // This section takes the input fields and converts them to the proper format
			$post_string = "";
			foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
			   $post_string = rtrim( $post_string, "& " );
		 
			// This sample code uses the CURL library for php to establish a connection,
				// submit the post, and record the response.
				// If you receive an error, you may want to ensure that you have the curl
				// library enabled in your php configuration
		 
				$request = curl_init($post_url); // initiate curl object
		 
				curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		 
				curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
				curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
				curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
				$post_response = curl_exec($request); // execute curl post and store results in $post_response
		 
				// additional options may be required depending upon your server configuration
				// you can find documentation on curl options at http://www.php.net/curl_setopt
				curl_close ($request); // close curl object
		 
				// This line takes the response and breaks it into an array using the specified delimiting character
				$response_array = explode($post_values["x_delim_char"],$post_response);
		        
				// The results are output to the screen in the form of an html numbered list.
				if($response_array)
				{
				return $response_array;
				}
			  	else { return ''; }
			}
			
		/**
		 * Common::logTransactions()
		 * 
		 * @return
		 */
		public function logTransactions($user_id,$domain_id,$resArray,$paypal_type)
			{
				global $CFG,$objSmarty;
				
				$sql_ins = 'INSERT INTO '.$CFG['table']['paypal_transaction'].' SET ' .
						'date_added=\''.time().'\', '.
						'ip=\''.$CFG['remote_client']['ip'].'\', ' .
						'user_id=\''.$this->filterInput($user_id).'\', ' .
                        'domain_id=\''.$this->filterInput($domain_id).'\', ' .
						'txn_id=\''.$this->filterInput($resArray["transaction_id"]).'\', ' .
						'payment_date=\''.time().'\', '.
						'payment_gross=\''.$this->filterInput($resArray["pay_amount"]).'\', ' .
                        'payment_types=\''.$this->filterInput($paypal_type).'\', ' .
						'payment_fee=\''.$this->filterInput($resArray["pay_amount"]).'\', ' .
						'payment_status=\''.$this->filterInput($resArray["pay_status"]).'\''; 
						
				$res_ins =	$this->ExecuteQuery($sql_ins,'insert'); 
           	}
		
		/**
		 * Common::updateSubscriptionRequest()
		 * 
		 * @return
		 */
	/*	public function updateSubscriptionRequest()
           {
           	    global $CFG,$objSmarty;
                $sql_upd = ' UPDATE '.$CFG['table']['domaindetails']. ' SET'.
                       ' subscription_request = \'1\''.
                       ' WHERE domain_id = '.$this->filterInput($_SESSION['domain_id']);
                $res_upd =	$this->ExecuteQuery($sql_upd,'update');  
			}     */
		/**
		 * Common::updateSubscriptionDate()
		 * 
		 * @return
		 */
		public function updateSubscriptionDate($domain_id,$txn_id)
           {
		       global $CFG;
               $validtodate   = $this->getValue("validtodate",$CFG['table']['domaindetails'],"domain_id = '".$domain_id."' ");     
               $upvalidtodate = $validtodate+(365*86400);
               $graceperiod   = $validtodate+(395*86400);
               $sql_upd = " UPDATE ".$CFG['table']['domaindetails']." SET validtodate = '".$upvalidtodate."', expire_grace_period = '".$graceperiod."', payment_status = 'Yes', subscription_request = '1' WHERE domain_id = '".$this->filterInput($domain_id)."' ";
               $res_upd =	$this->ExecuteQuery($sql_upd,'update'); 
               
               $sql_upd1 = " UPDATE ".$CFG['table']['temp_domaindetails']." SET validtodate = '".$upvalidtodate."', expire_grace_period = '".$graceperiod."', payment_status = 'Yes', publish_status='U', subscription_request = '1' WHERE domain_id = '".$this->filterInput($domain_id)."' ";
               $res_upd  =	$this->ExecuteQuery($sql_upd1,'update');  
               
               $sel_qury =  " SELECT dom.domain_id, dom.subdomainurl, reg.email, reg.username ".
                            " FROM hi_domaindetails as dom  ".
                            " LEFT JOIN hi_register as reg ON dom.user_id = reg.user_id ".
            				" WHERE dom.domain_id = '".$domain_id."' ";
	           $res = $this->ExecuteQuery($sel_qury,'select');
               
               $mail_content = '<html>
                                	<head>
                                		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                	</head>
                                	<body style="background-color:#ededed;  padding:25px 0;">
                                		<table width="760" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #CCCCCC; background:#ffffff; box-shadow:0 0 5px #B9B9B9;">
                                			<tr>
                                				<td align="center" colspan="3" style="background: #87CEEB; display: block; text-align: center;">
                                					<img width="200" height="90" src='.$CFG['site']['logoname'].' alt='.$CFG['site']['sitename'].'/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td style="color: #0F0; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0; text-align: center;">
                                					<span style="display: block; margin: 0px 10px; padding: 10px 0px;">
                                						Your domain Payment Success details.
                                					</span>
                                				</td>				
                                			</tr>
                                            
                                			<tr>
                                			 	<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0 10px; text-align: left;">Hi '.$res[0]['username'].'</td>
                                			</tr>
                                			<tr>
                                				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Domain Name</b> : '.$res[0]['subdomainurl'].'</td>
                                			</tr>
                                            <tr>
                                				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Transcation Id</b> : '.$txn_id.'</td>
                                			</tr>
                                            <tr>
                                				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Expired Date</b> : '.date('m/d/Y',($upvalidtodate)).'</td>
                                			</tr>
                                            
                                			<tr>
                                				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 30px 0 0 10px;" align="left" valign="top" colspan="3">Sincerely,</td>
                                			</tr>
                                			<tr>
                                				<td style="color: #393860; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0px 20px 10px;" align="left" valign="top" colspan="3">The enkolayweb.com Team</td>
                                			</tr>
                                		</table>
                                	</body>
                                </html> ';  
                                
                $tomailid     = $res[0]['email'];                                    
    		    $mailsubject  = "Enkolyaweb: Your Domain Payment Success";                          	
    			$ok           = $this->sendMail('Admin',$CFG['site']['adminemail'],$tomailid,$mailsubject,$mail_content); 
			}
        /**
         * Common::updateSubscriptionDateToPaypalTable()
         * 
         * @return
         */
        public function updateSubscriptionDateToPaypalTable($domain_id)
           {
           		global $CFG;
                $sql_upd = ' UPDATE '.$CFG['table']['paypal_transaction']. ' SET'.
                       ' subs_monthly_date =DATE_ADD(CURDATE(),INTERVAL 30 DAY)'. 
                       ' WHERE domain_id = '.$this->filterInput($domain_id);
                $res_upd =	$this->ExecuteQuery($sql_upd,'update'); 
			}
		
		/**
		 * Common::getPaypalUrl()
		 * 
		 * @return
		 */
		public function getPaypalUrl()
			{
				global $CFG,$objSmarty;
				
				if($CFG['payment']['paypal']['test_mode'])
					$url = $CFG['payment']['paypal']['test_url'];
				else
					$url=$CFG['payment']['paypal']['url'];
					
				return $url;
			}
		/**
		 * Common::makeGlobalize()
		 * 
		 * @return
		 */
		public function makeGlobalize($CFG = array(), $LANG = array())
			{
				$this->CFG = $CFG;
				$this->LANG = $LANG;
			}
	  /**
	   * Common::getSubsCripDetails()
	   * get subscription details to show footer in main page
	   * @return void
	   */
		/**
		 * Common::getSubsCripDetails()
		 * 
		 * @return
		 */
		public function getSubsCripDetails()
			{
				global $CFG,$objSmarty;
                if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                    {
                        $sqlsel = "SELECT subs_monthly_date ,subscription_request FROM ".$CFG['table']['domaindetails']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				$monthly_date=$sqlres[0]['subs_monthly_date'];
        			 	$date= date('Y-m-d');
        				$objSmarty->assign("subsdetails", $sqlres);
        				$objSmarty->assign("current_date", $date);
        				return $sqlres;
                    }				
			}
		/**
		 * Common::getSubsCripDetailsFordomain()
		 * 
		 * @return
		 */
		public function getSubsCripDetailsFordomain($domain_id)
			{
				global $CFG,$objSmarty;
                if($domain_id)
                    {
                        $sqlsel = "SELECT subs_monthly_date, subscription_request FROM ".$CFG['table']['domaindetails']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				$monthly_date=$sqlres[0]['subs_monthly_date'];
        			 	$date= date('Y-m-d');
        				$objSmarty->assign("subsdetails", $sqlres);
        				$objSmarty->assign("current_date", $date);
                    }				
			}
		/**
		 * Common::updateFooterContent()
		 * 
		 * @return
		 */
		public function updateFooterContent()
			{
				global $CFG,$objSmarty;
                if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                    {
                        $sql_regupdate	=	"UPDATE ".$CFG['table']['temp_domaindetails']." SET footer_content = '".addslashes($_POST['footer'])."' , publish_status='U'  WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
                        $res_upd =	$this->ExecuteQuery($sql_regupdate,'update'); 
                    }               	
			}
		#---------------------this is for categories add process in store page 
			#---------------------veni function starts-----------------------------
		   /**
		   * Common::insertCategoryStore()
		   * this is for add category
		   * @return
		   */
	/*	function insertCategoryStore()
			{
				global $CFG,$objSmarty;
				$UpQuery  = "INSERT INTO ".$CFG['table']['store_category']." SET domain_id= '".$_POST['domain_id']."'";
				$res_qry = $this->ExecuteQuery($UpQuery,'insert');
				return $res_qry;
			}*/
		/**
		 * Common::getCategoryListForStore()
		 * 
		 * @return
		 */
		function getCategoryListForStore($store_cat_id)
			{
				global $CFG,$objSmarty;
                if(isset($store_cat_id) && !empty($store_cat_id))
                    {
                        $sql_rent		=	"SELECT  store_cat_id,domain_id,cat_name,addeddate,status  FROM 
    									".$CFG['table']['store_category']." 							
    									WHERE store_cat_id = '".$this->filterInput($store_cat_id)."'";
        				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
        				;
        			 	$objSmarty->assign('catdetails',$res_rent);
                    }				
			}
		/**
		 * Common::getProductDetails()
		 * 
		 * @return
		 */
		function getProductDetails()
			{
				//echo $domain_id;
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT product_id,domain_id,product_name  FROM ".$CFG['table']['store_product']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."' AND product_name != ''";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				//print_r($sqlres);
				$objSmarty->assign("products", $sqlres);
				return $sqlres;
			}
		/**
		 * Common::addProductsInCatPage()
		 * 
		 * @return
		 */
		function addProductsInCatPage()
			{
				global $CFG,$objSmarty;
					
				$UpQuery  = "UPDATE ".$CFG['table']['product_images']." SET sort_order = '".$this->filterInput($key)."' WHERE img_id ='".$this->filterInput($ord)."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
	  /**
	   * Common::updateCategoryStore()
	   *
	   * @return void
	   */
		/**
		 * Common::InsertCategoryStore()
		 * 
		 * @return
		 */
		function InsertCategoryStore()
			{
				global $CFG,$objSmarty;
                if(isset($_POST['domain_id']) && !empty($_POST['domain_id']))
                    {
                        $UpQuery  = " INSERT INTO ".$CFG['table']['store_category']." SET domain_id= '".$this->filterInput($_POST['domain_id'])."',
    																				 addeddate=NOW(),
    																				 status='1' ";
        				$res_qry = $this->ExecuteQuery($UpQuery,'insert');
        				return $res_qry;
                    }				
			}
		/**
		 * Common::updateCategoryStoreWhileAdd()
		 * 
		 * @return
		 */
		function updateCategoryStoreWhileAdd($store_cat_id)
			{
				
				global $CFG,$objSmarty;
			 	$UpQuery  = "UPDATE ".$CFG['table']['store_category']." SET cat_name = '".$this->filterInput($_POST['cat_name'])."' WHERE store_cat_id ='".$this->filterInput($store_cat_id)."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
	  /**
	   * Common::updateCategoryStore()
	   * update during edit 
	   * @return
	   */
		/**
		 * Common::updateCategoryStore()
		 * 
		 * @return
		 */
		function updateCategoryStore($store_cat_id)
			{
				global $CFG,$objSmarty;
                if(isset($store_cat_id) && !empty($store_cat_id))
                    {
                        $UpQuery  = " UPDATE ".$CFG['table']['store_category']." SET domain_id= '".$this->filterInput($_POST['domain_id'])."',
    				                                                                 cat_name  = '".$this->filterInput($_POST['cat_name'])."',
    																				 addeddate=NOW(),
    																				 status='1' WHERE store_cat_id = '".$this->filterInput($store_cat_id)."'";
        				$res_qry = $this->ExecuteQuery($UpQuery,'update');
        				return $res_qry;
                    }				
			}
		/**
		 * Common::getCategoryListBasedonDomain()
		 * 
		 * @return
		 */
		function getCategoryListBasedonDomain()
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  store_cat_id,domain_id,cat_name,addeddate,status  FROM 
									".$CFG['table']['store_category']." 							
									WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."' AND cat_name!= ''";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
				//print_r($res_rent);
			 	$objSmarty->assign('catlist',$res_rent);
			}
	  /**
	   * Common::getProducts()
	   * getproducts for list products while click select products
	   * @return void
	   */
		/**
		 * Common::getProducts()
		 * 
		 * @return
		 */
		function getProducts($domain_id)
			{
				global $CFG,$objSmarty;
                if(isset($domain_id) && !empty($domain_id))
                    {
                        $sql_rent		=	"SELECT  product_id,domain_id,product_name,sale_price,price FROM 
    									".$CFG['table']['store_product']." 							
    									WHERE domain_id = '".$this->filterInput($domain_id)."' AND publish ='1' AND product_name !=''";
        				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
        				
        			 	$objSmarty->assign('productsListInCatPage',$res_rent);
                    }				
			}
		/**
		 * Common::InsertProdCategoryTable()
		 * 
		 * @return
		 */
		function InsertProdCategoryTable($store_cat_id)
			{
				global $CFG,$objSmarty;
                if(isset($store_cat_id) && !empty($store_cat_id))
                    {
                        $product_ids=substr($_POST['prod_cat'], 0, -1);
        				$sql_ins	=	"INSERT INTO ".$CFG['table']['product_cat']." SET
        																 domain_id		=	'".$this->filterInput($_POST['domain_id'])."',
        																 category_id	=	'".$this->filterInput($store_cat_id)."',
        																 product_ids	=	'".$this->filterInput($product_ids)."'";
        				$res_ins	=	$this->ExecuteQuery($sql_ins,'insert'); 
                    }				
			}
	  /**
	   * Common::updateProdCategoryTable()
	   * update product ids while edit
	   * @param mixed $store_cat_id
	   * @return void
	   */
		/**
		 * Common::updateProdCategoryTable()
		 * 
		 * @return
		 */
		function updateProdCategoryTable($store_cat_id)
			{
				global $CFG,$objSmarty;
                if(isset($store_cat_id) && !empty($store_cat_id))
                    {
        				$product_ids=substr($_POST['prod_cat'], 0, -1);
        				$sql_ins	=	"UPDATE ".$CFG['table']['product_cat']." SET
        																 domain_id		=	'".$this->filterInput($_POST['domain_id'])."',
        																 category_id	=	'".$this->filterInput($store_cat_id)."',
        																 product_ids	=	'".$this->filterInput($product_ids)."' WHERE category_id = '".$this->filterInput($store_cat_id)."'";
        				$res_ins	=	$this->ExecuteQuery($sql_ins,'update'); 
                    }    
			}
		/**
		 * Common::getProductsCount()
		 * 
		 * @return
		 */
		function getProductsCount($domain_id,$store_cat_id)
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  product_ids,domain_id,category_id FROM 
									".$CFG['table']['product_cat']." 							
									WHERE domain_id = '".$this->filterInput($domain_id)."' AND category_id = '".$this->filterInput($store_cat_id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
				 
				$product_array= explode(',',$res_rent[0]['product_ids']);
				if($product_array[0] == '')
					$pro_array='0';
				else
					$pro_array= count($product_array);
			 	$objSmarty->assign('productsListInCatPage',$res_rent);
			 	return $pro_array;
			}
	  /**
	   * Common::deleteCategoryStore()
	   * this function for delete categories in categories tab
	   * @return void
	   */
		/**
		 * Common::deleteCategoryStore()
		 * 
		 * @return
		 */
		function deleteCategoryStore()
			{
			  	global $CFG,$objSmarty;
                if(isset($_POST['cat_id']) && !empty($_POST['cat_id']))
                    {
                        $UpQuery  = "DELETE  FROM ".$CFG['table']['store_category']." WHERE store_cat_id ='".$this->filterInput($_POST['cat_id'])."'";
    				    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    }				
			}
	  /**
	   * Common::getCategoryImageStore()
	   *
	   * @param mixed $prod_id
	   * @return void
	   */
		/**
		 * Common::getCategoryImageStore()
		 * 
		 * @return
		 */
		function getCategoryImageStore($store_cat_id)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT domain_id,store_cat_id,store_cat_image FROM ".$CFG['table']['store_cat_images']. " WHERE store_cat_id = '".$this->filterInput($store_cat_id)."' order by sort_order asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$objSmarty->assign("category_images", $sqlres);
			}
	  /**
	   * Common::getCountOfProducts()
	   *
	   * @param mixed $store_cat_id
	   * @param mixed $domain_id
	   * @return void
	   */
		/**
		 * Common::getCountOfProducts()
		 * 
		 * @return
		 */
		function getCountOfProducts($store_cat_id,$domain_id)
			{
				
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  product_ids,domain_id,category_id FROM 
									".$CFG['table']['product_cat']." 							
									WHERE domain_id = '".$this->filterInput($domain_id)."' AND category_id = '".$this->filterInput($store_cat_id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
				 
				$product_array= explode(',',$res_rent[0]['product_ids']);
				//print_r($product_array);
			 	$objSmarty->assign('product_array',$product_array);
			 	//return $product_array;
			}
	#-----------------------veni function ends for categoreis in store---------------------------------------
			#-----------------------------------------------------------------
		#Get Page List
		/**
		 * Common::pageListForDropDown()
		 * 
		 * @return
		 */
		function pageListForDropDown()
		 	{
				global $CFG,$objSmarty;
				$sqlsel = "SELECT pagename,page_id FROM ".$CFG['table']['pages']. " WHERE domain_id = ".$this->filterInput($_SESSION['domain_id'])." and page_parent_id =".$this->filterInput($_POST['page_id'])." order by sort_order asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				//echo "<pre>";print_r($sqlres);echo "</pre>";
				$objSmarty->assign("pagelist", $sqlres);
				return $sqlres[0]['page_id'];
			} 
		#-----------------------------------------------------------------
		#Get Page List
		/**
		 * Common::pageListForDropDownList()
		 * 
		 * @return
		 */
		function pageListForDropDownList($page_id)
		 	{
				global $CFG,$objSmarty;
                if($page_id)
                    {
                        $sqlsel = "SELECT pagename,page_id FROM ".$CFG['table']['temp_pages']. " WHERE domain_id = ".$this->filterInput($_SESSION['domain_id'])." and page_parent_id =".$this->filterInput($page_id)." order by sort_order asc,page_id asc";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				#echo "<pre>";print_r($sqlres);echo "</pre>";die();
        				$objSmarty->assign("pagelistdropdown", $sqlres);
                    }				
			} 
		
			#-----------------------------------------------------------------
		#Get Page List For Drop Down
		/**
		 * Common::pageListForDropDownGet()
		 * 
		 * @return
		 */
		function pageListForDropDownGet()
		 	{
				global $CFG,$objSmarty;
                if(isset($_SESSION['domain_id']) && !empty($_SESSION['domain_id']))
                    {
                        $sqlsel = "SELECT pagename,page_id FROM ".$CFG['table']['pages']. " WHERE domain_id = ".$this->filterInput($_SESSION['domain_id'])." and page_parent_id =".$this->filterInput($_GET['parent_page_id'])." order by sort_order asc";
        				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
        				#echo "<pre>";print_r($sqlres);echo "</pre>";die();
        				$objSmarty->assign("pagelist", $sqlres);
        				return $sqlres[0]['page_id'];
                    }				
			}  
		
		#-----------------------------------------------------------------
		#Add Sub Page   
		/**
		 * Common::addSubPage()
		 * 
		 * @return
		 */
		function addSubPage()
			{
				global $CFG,$objSmarty;
				$UpQuery  = "INSERT INTO ".$CFG['table']['temp_pages']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."', pagename = 'untitled',seo_title = 'untitled',page_parent_id='".$this->filterInput($_POST['page_id'])."'";
				$res_qry = $this->ExecuteQuery($UpQuery,'insert');
				return $res_qry;
			}
		
		/**
		 * Common::getPageName()
		 * 
		 * @return
		 */
		function getPageName($pageid)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT pagename FROM ".$CFG['table']['pages']. " WHERE page_id = '".$this->filterInput($pageid)."'";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				return $sqlres[0]['pagename'];
			}
		
		/**
		 * Common::getSubPages()
		 * 
		 * @return
		 */
		function getSubPages($page_id,$domain_id)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT * FROM ".$CFG['table']['pages']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND hide_navigation = '0' and page_parent_id = '".$this->filterInput($page_id)."' order by sort_order asc";
			    $sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$objSmarty->assign("subbuildpagelist", $sqlres);
			}
	  /**
	   * Common::getDateOfPost()
	   *
	   * @param mixed $title_id
	   * @return void
	   */
		/**
		 * Common::getDateOfPost()
		 * 
		 * @return
		 */
		function getDateOfPost($title_id)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT date(addeddate) as date FROM ".$CFG['table']['posttitle']. " WHERE post_id = ".$this->filterInput($title_id)." ";
			    $sqlres =  $this->ExecuteQuery($sqlsel,'select');
			    return $sqlres[0]['date'];
			}
	  /**
	   * Common::updateCommentDefault()
	   * update comment default in new post page
	   * @return
	   */
		/**
		 * Common::updateCommentDefault()
		 * 
		 * @return
		 */
		function updateCommentDefault()
			{
				global $CFG,$objSmarty;
                if($_POST['domain_id'] != '')
                    {
                        $UpQuery  = "UPDATE ".$CFG['table']['blogsettings']." SET comment_default  = '".$this->filterInput($_POST['commentdefault'])."' WHERE  domain_id='".$this->filterInput($_POST['domain_id'])."'";
        				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
        				return true;
                    }			    
			}
	  /**
	   * Common::getSiteNameForContactMail()
	   *
	   * @param mixed $domain_id
	   * @return
   	  */
		/**
		 * Common::getSiteNameForContactMail()
		 * 
		 * @return
		 */
		function getSiteNameForContactMail($domain_id)
			{
			 	global $CFG,$objSmarty;
				$sql_rent		=	"SELECT site_title  FROM 
									".$CFG['table']['domaindetails']." 							
									WHERE domain_id = '".$this->filterInput($domain_id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
				return $res_rent[0]['site_title'];
				//$objSmarty->assign('site_title',$res_rent);
			}
		/**
		 * Common::getImageForShowMail()
		 * 
		 * @return
		 */
		function getImageForShowMail($domain_id,$status='domainlogo')
			{
				global $CFG,$objSmarty;
				$image = $this->getValue('image_name',$CFG['table']['domain_images'],'domain_id = "'.$this->filterInput($domain_id).'" and status ="'.$this->filterInput($status).'"');
			 	$objSmarty->assign('logoimages',$image);
				return $image;
			}
		/**
		 * Common::getHeaderLogoConfig()
		 * 
		 * @return
		 */
		function getHeaderLogoConfig($domain_id)
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  header_logo_config  FROM 
									".$CFG['table']['domaindetails']." 							
									WHERE domain_id = '".$this->filterInput($domain_id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			 	$objSmarty->assign('header_logo_config',$res_rent[0]['header_logo_config']);
				return $res_rent[0]['header_logo_config'];
				 
			}
		/**
		 * Common::getThemeNameForActive()
		 * 
		 * @return
		 */
		function getThemeNameForActive($theme_id)
			{
				global $CFG,$objSmarty;
				$theme_name = $this->getValue('theme_name',$CFG['table']['thememanage'],'theme_id = "'.$this->filterInput($theme_id).'"');
			 	return strtolower($theme_name);
			}
		/**
		 * Common::getBlogNameForActive()
		 * 
		 * @return
		 */
		function getBlogNameForActive($theme_id)
			{
				global $CFG,$objSmarty;
				$theme_name = $this->getValue('blog_name',$CFG['table']['blogmanage'],'blog_id = "'.$this->filterInput($theme_id).'"');
			 	return strtolower($theme_name);
			}	
		/**
		 * Common::getStoreNameForActive()
		 * 
		 * @return
		 */
		function getStoreNameForActive($theme_id)
			{
				global $CFG,$objSmarty;
				$theme_name = $this->getValue('store_name',$CFG['table']['storemanage'],'store_id = "'.$this->filterInput($theme_id).'"');
			 	return strtolower($theme_name);
			}		 
		/**
		 * Common::insertProductStore()
		 * 
		 * @return
		 */
		function insertProductStore()
			{
				global $CFG,$objSmarty;
				$UpQuery  = "INSERT INTO ".$CFG['table']['store_product']." SET domain_id= '".$this->filterInput($_POST['domain_id'])."'";
				$res_qry = $this->ExecuteQuery($UpQuery,'insert');
				return $res_qry;
			}
		/**
		 * Common::getProductListForStore()
		 * 
		 * @return
		 */
		function getProductListForStore($prod_id)
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  product_id,domain_id,product_name,description,price,offer_price,sale_price,sku,weight  FROM 
									".$CFG['table']['store_product']." 							
									WHERE product_id = '".$this->filterInput($prod_id)."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
			 	$objSmarty->assign('productdetails',$res_rent);
			}
		/**
		 * Common::updateProductStore()
		 * 
		 * @return
		 */
		function updateProductStore()
			{
				global $CFG,$objSmarty;
			    $UpQuery  = "UPDATE ".$CFG['table']['store_product']." SET product_name  = '".$this->filterInput($_POST['prod_name'])."',description   = '".$this->filterInput($_POST['desc'])."',price  = '".$this->filterInput($_POST['price'])."',offer_price  = '".$this->filterInput($_POST['offer_price'])."',sale_price = '".$this->filterInput($_POST['sale_price'])."',sku  = '".$this->filterInput($_POST['sku'])."',weight = '".$this->filterInput($_POST['weight'])."'  WHERE  product_id='".$this->filterInput($_POST['product_id'])."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
		/**
		 * Common::getProductListBasedonDomain()
		 * 
		 * @return
		 */
		function getProductListBasedonDomain()
			{
				global $CFG,$objSmarty;
			    $sql_rent		=	"SELECT  product_id,domain_id,product_name,description,price,offer_price,sale_price,sku,weight  FROM 
									".$CFG['table']['store_product']." 							
									WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."' AND product_name!='' ";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
                
			 	$objSmarty->assign('productListdetails',$res_rent);
			}
		/**
		 * Common::deleteProductStore()
		 * 
		 * @return
		 */
		function deleteProductStore()
			{
				global $CFG,$objSmarty;
				$UpQuery  = "DELETE  FROM ".$CFG['table']['store_product']." WHERE product_id ='".$this->filterInput($_POST['prod_id'])."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
		/**
		 * Common::searchProductListForStore()
		 * 
		 * @return
		 */
		function searchProductListForStore()
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  product_id,domain_id,product_name,description,price,offer_price,sale_price,sku,weight  FROM 
									".$CFG['table']['store_product']." 							
									WHERE product_name LIKE '".$_POST['searchkey']."%' and domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
               
				$objSmarty->assign('productListdetails',$res_rent);
			}
		/**
		 * Common::getProductImageStore()
		 * 
		 * @return
		 */
		function getProductImageStore($prod_id)
			{
				global $CFG,$objSmarty;
			    $sqlsel = "SELECT product_id,domain_id,img_id,image_name FROM ".$CFG['table']['product_images']. " WHERE product_id = '".$this->filterInput($prod_id)."' order by sort_order asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$objSmarty->assign("product_images", $sqlres);
                //print_r($sqlres);
			}
		
	/**
	 * Common::updateColumncount()
	 * 
	 * @return
	 */
	function updateColumncount()
		{
			global $CFG,$objSmarty;
		    if($_POST['page_list_id'])
                {
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_pagelist']." SET column_count = '".($this->filterInput($_POST['tdcount']) + 1)."',publish_status='U'  WHERE pagelist ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }				
		}
	/**
	 * Common::deleteProductImg()
	 * 
	 * @return
	 */
	function deleteProductImg()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "DELETE  FROM ".$CFG['table']['product_images']." WHERE img_id ='".$this->filterInput($_POST['img_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	/**
	 * Common::insertOptionList()
	 * 
	 * @return
	 */
	function insertOptionList()
		{
			global $CFG,$objSmarty;
			
            if(isset($_POST['option_title']) && !empty($_POST['option_title']) && isset($_POST['option_choice']) && !empty($_POST['option_choice']))
                {
                    $UpQuery  = "INSERT INTO ".$CFG['table']['product_option']." SET product_id = '".$this->filterInput($_POST['prod_id'])."', domain_id= '".$this->filterInput($_SESSION['domain_id'])."', option_title = '".$this->filterInput($_POST['option_title'])."', option_input = '".$this->filterInput($_POST['input_type'])."' ";
        			$res_qry = $this->ExecuteQuery($UpQuery,'insert');
        			$choice_arr = explode(',',$_POST['option_choice']); 
                    
        			foreach($choice_arr as $val)
        				{
        					$UpQuery1  = "INSERT INTO ".$CFG['table']['product_choice']." SET option_id = '".$this->filterInput($res_qry)."',product_id = '".$this->filterInput($_POST['prod_id'])."', option_input = '".$this->filterInput($val)."' ";
        					$res_qry1 = $this->ExecuteQuery($UpQuery1,'insert');
        				} 
                }			
		}
	/**
	 * Common::getProductOption()
	 * 
	 * @return
	 */
	function getProductOption($product_id)
		{
			global $CFG,$objSmarty;
		   
		    $sqlsel = "SELECT choice_id,option_id,product_id,option_input,price FROM ".$CFG['table']['product_choice']. " WHERE product_id = '".$this->filterInput($product_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("product_choices", $sqlres);
			
		}
	/**
	 * Common::getChoiceName()
	 * 
	 * @return
	 */
	function getChoiceName($choic_id)
		{
			global $CFG,$objSmarty;
			$choice_name = $this->getValue('option_title',$CFG['table']['product_option'],'option_id = "'.$this->filterInput($choic_id).'"');
			return $choice_name;
		}
	/**
	 * Common::updatePriceOption()
	 * 
	 * @return
	 */
	function updatePriceOption()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['product_choice']." SET price = '".$_POST['price']."' WHERE choice_id ='".$this->filterInput($_POST['choice_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	/**
	 * Common::deletePriceOption()
	 * 
	 * @return
	 */
	function deletePriceOption()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "DELETE  FROM ".$CFG['table']['product_choice']." WHERE choice_id ='".$this->filterInput($_POST['choice_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
            
            $remain_choice_count = $this->getCountValue($CFG['table']['product_choice'],"option_id ='".$this->filterInput($_POST['prod_option_id'])."'");
            if($remain_choice_count<=0)
            {
                $del_qury  = "DELETE  FROM ".$CFG['table']['product_option']." WHERE option_id ='".$this->filterInput($_POST['prod_option_id'])."'";
			    $Result = mysql_query($del_qury) or die($this->mysql_error($del_qury));
            }
		}
	/**
	 * Common::getEditProductOption()
	 * 
	 * @return
	 */
	function getEditProductOption()
		{
			global $CFG,$objSmarty;
		   
		    $sqlsel = "SELECT option_id, product_id, domain_id, option_title, option_input FROM ".$CFG['table']['product_option']. " WHERE product_id = '".$this->filterInput($_POST['product_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("product_option", $sqlres);
		}
	/**
	 * Common::getOptions()
	 * 
	 * @return
	 */
	function getOptions($opt_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT option_input FROM ".$CFG['table']['product_choice']. " WHERE option_id = '".$this->filterInput($opt_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			foreach($sqlres as $val)
				{
					$options .= $val['option_input'].",";
				}
			return substr($options,'0','-1');
		}
	/**
	 * Common::deleteOptionList()
	 * 
	 * @return
	 */
	function deleteOptionList()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "DELETE  FROM ".$CFG['table']['product_choice']." WHERE product_id ='".$this->filterInput($_POST['prod_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	/**
	 * Common::deleteChoiceList()
	 * 
	 * @return
	 */
	function deleteChoiceList()
		{
			global $CFG,$objSmarty;
			$UpQuery1  = "DELETE  FROM ".$CFG['table']['product_option']." WHERE product_id 	 ='".$this->filterInput($_POST['prod_id'])."'";
			$UpResult1 = mysql_query($UpQuery1) or die($this->mysql_error($UpQuery1));
		}
	
	/**
	 * Common::insertStoreInfo()
	 * 
	 * @return
	 */
	function insertStoreInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_POST['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			if($sqlres[0]['domain_id'])
				{
		
					$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET currency = '".$this->filterInput($_POST['currency'])."',company_name = '".$this->filterInput($_POST['company_name'])."',street = '".$this->filterInput($_POST['street'])."',postal = '".$this->filterInput($_POST['postal'])."',country = '".$this->filterInput($_POST['country'])."',state = '".$this->filterInput($_POST['state'])."',email = '".$this->filterInput($_POST['storeemail'])."',phone_no = '".$this->filterInput($_POST['ph_no'])."',shipping_policy = '".$this->filterInput($_POST['shipping_policy'])."',return_policy = '".$this->filterInput($_POST['return_policy'])."' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
					$objSmarty->assign('successmsg','Your Store information updated Successfully');
				}
			else
				{
					 
					$UpQuery  = "INSERT INTO ".$CFG['table']['store_details']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."' ,currency = '".$this->filterInput($_POST['currency'])."',company_name = '".$this->filterInput($_POST['company_name'])."',street = '".$this->filterInput($_POST['street'])."',postal = '".$this->filterInput($_POST['postal'])."',country = '".$this->filterInput($_POST['country'])."',state = '".$this->filterInput($_POST['state'])."',email = '".$this->filterInput($_POST['storeemail'])."',phone_no = '".$this->filterInput($_POST['ph_no'])."',shipping_policy = '".$this->filterInput($_POST['shipping_policy'])."',return_policy = '".$this->filterInput($_POST['return_policy'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
					$objSmarty->assign('successmsg','Your Store information added Successfully');
				}
		}
	/**
	 * Common::getStoreInfo()
	 * 
	 * @return
	 */
	function getStoreInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id,currency,company_name,street,postal,country,state,email,phone_no,shipping_policy,return_policy FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('storeinfo',$sqlres);
		}
	/**
	 * Common::getTaxInfo()
	 * 
	 * @return
	 */
	function getTaxInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT tax_rate FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('taxinfo',$sqlres);
		}
	/**
	 * Common::insertTaxInfo()
	 * 
	 * @return
	 */
	function insertTaxInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_POST['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			if($sqlres[0]['domain_id'])
				{
					$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET tax_rate = '".$_POST['tax_rate']."' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
					$objSmarty->assign('successmsg','Your Tax information updated Successfully');
				}
			else
				{
					$UpQuery  = "INSERT INTO ".$CFG['table']['store_details']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."' ,tax_rate = '".$this->filterInput($_POST['tax_rate'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
					$objSmarty->assign('successmsg','Your Tax information added Successfully');
				}
		}
	/**
	 * Common::getCheckoutInfo()
	 * 
	 * @return
	 */
	function getCheckoutInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT paypal_enable,paypal_email FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('payinfo',$sqlres);
		}
	/**
	 * Common::insertPaypalInfo()
	 * 
	 * @return
	 */
	function insertPaypalInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_POST['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			if($sqlres[0]['domain_id'])
				{
					$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET paypal_enable = '1' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
				}
			else
				{
					$UpQuery  = "INSERT INTO ".$CFG['table']['store_details']." SET domain_id= '".$_SESSION['domain_id']."' ,paypal_enable = '1'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
				}
		}
	/**
	 * Common::getShippingInfo()
	 * 
	 * @return
	 */
	function getShippingInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT ship_id,domain_id,ship_name,ship_price,ship_days FROM ".$CFG['table']['ship_store']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('shippinginfo',$sqlres);
		}
	/**
	 * Common::insertShipInformation()
	 * 
	 * @return
	 */
	function insertShipInformation()
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "INSERT INTO ".$CFG['table']['ship_store']." SET domain_id= '".$this->filterInput($_POST['domain_id'])."' ,ship_name = '".$this->filterInput($_POST['ship_name'])."',ship_price = '".$this->filterInput($_POST['ship_price'])."',ship_days = '".$this->filterInput($_POST['ship_days'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			$objSmarty->assign('successmsg','Your Shipping information added Successfully');
		}
	/**
	 * Common::deleteShipInformation()
	 * 
	 * @return
	 */
	function deleteShipInformation()
		{
			global $CFG,$objSmarty;
			$UpQuery1  = "DELETE  FROM ".$CFG['table']['ship_store']." WHERE ship_id ='".$this->filterInput($_POST['shipid'])."'";
			$UpResult1 = mysql_query($UpQuery1) or die($this->mysql_error($UpQuery));
		}
	/**
	 * Common::getShipInfoforid()
	 * 
	 * @return
	 */
	function getShipInfoforid()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT ship_id,domain_id,ship_name,ship_price,ship_days FROM ".$CFG['table']['ship_store']. " WHERE ship_id = '".$this->filterInput($_POST['shipid'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('shippsinginfo',$sqlres);
		}
	/**
	 * Common::updateShipInfo()
	 * 
	 * @return
	 */
	function updateShipInfo()
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "UPDATE ".$CFG['table']['ship_store']." SET ship_name = '".$_POST['ship_name']."',ship_price = '".$this->filterInput($_POST['ship_price'])."',ship_days = '".$this->filterInput($_POST['ship_days'])."' WHERE ship_id ='".$this->filterInput($_POST['ship_id'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	/**
	 * Common::getAdvancedOption()
	 * 
	 * @return
	 */
	function getAdvancedOption()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT advanced_option FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('advanceinfo',$sqlres);
		}
	/**
	 * Common::updateanalyticsInfo()
	 * 
	 * @return
	 */
	function updateanalyticsInfo()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			if($sqlres[0]['domain_id'])
				{
					$UpQuery  = "UPDATE ".$CFG['table']['store_details']." SET advanced_option = '".$_POST['option']."' WHERE domain_id ='".$this->filterInput($_SESSION['domain_id'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
				}
			else
				{
					$UpQuery  = "INSERT INTO ".$CFG['table']['store_details']." SET domain_id= '".$this->filterInput($_SESSION['domain_id'])."' ,advanced_option = '".$this->filterInput($_POST['option'])."'";
					$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
				}
			
			
		}
	/**
	 * Common::updatewidthvalofcolumn()
	 * 
	 * @return
	 */
	function updatewidthvalofcolumn()
		{
			global $CFG,$objSmarty;
		
			$UpQuery  = "UPDATE ".$CFG['table']['page_list']." SET td_col1 = '".$this->filterInput($_POST['td_col1'])."',td_col2 = '".$this->filterInput($_POST['td_col2'])."',td_col3 = '".$this->filterInput($_POST['td_col3'])."',td_col4 = '".$this->filterInput($_POST['td_col4'])."',td_col5 = '".$this->filterInput($_POST['td_col5'])."' WHERE pagelist ='".$this->filterInput($_POST['colpageid'])."'";
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
	/**
	 * Common::getpaypalEnable()
	 * 
	 * @return
	 */
	function getpaypalEnable($domain_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT paypal_enable FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres[0]['paypal_enable'];
		}
	/**
	 * Common::getShippingDetails()
	 * 
	 * @return
	 */
	function getShippingDetails($domain_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT ship_id,domain_id,ship_name,ship_price,ship_days FROM ".$CFG['table']['ship_store']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign('shippingdetails',$sqlres);
		}
	/**
	 * Common::buyPriceforProduct()
	 * 
	 * @return
	 */
	function buyPriceforProduct($sale_price,$domain_id,$ship_price)
		{
			global $CFG,$objSmarty;
			
			$tax_rate = $this->getValue("tax_rate",$CFG['table']['store_details'],"domain_id='".$this->filterInput($domain_id)."'");
			$buy_price = $sale_price + ($sale_price * $tax_rate)/100;
			$buy_price = $buy_price + $ship_price;
			return round($buy_price);
		}
	/**
	 * Common::buyPriceforProductList()
	 * 
	 * @return
	 */
	function buyPriceforProductList($sale_price,$domain_id)
		{
			global $CFG,$objSmarty;
			
			$tax_rate = $this->getValue("tax_rate",$CFG['table']['store_details'],"domain_id='".$this->filterInput($domain_id)."'");
			$buy_price = $sale_price + ($sale_price * $tax_rate)/100;
			return round($buy_price);
		}
	/**
	 * Common::getStoreDetails()
	 * 
	 * @return
	 */
	function getStoreDetails($domain_id)
		{
		 	global $CFG,$objSmarty;
		 	$sqlsel = "SELECT store_info_id, domain_id, currency, company_name,	street,	postal,	country, state, email,paypal_email, phone_no, shipping_policy, return_policy, tax_rate, paypal_enable, advanced_option FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		 	return $sqlres;
		}
	/**
	 * Common::insertOrderPayment()
	 * 
	 * @return
	 */
	function insertOrderPayment()
		{
			global $CFG,$objSmarty;	
			
			$UpQuery  = "INSERT ".$CFG['table']['order_product']." SET  product_id = '".$this->filterInput($_SESSION['product_id'])."', domain_id = '".$this->filterInput($_SESSION['domain_id'])."',amount = '".$this->filterInput($_POST['mc_gross'])."',txn_id = '".$this->filterInput($_POST['txn_id'])."',payment_status = '".$this->filterInput($_POST['payment_status'])."',address = '".$this->filterInput($_SESSION['address'])."',state = '".$this->filterInput($_SESSION['state'])."',city = '".$this->filterInput($_SESSION['city'])."',country = '".$this->filterInput($_SESSION['country'])."',zipcode = '".$this->filterInput($_SESSION['zipcode'])."',email = '".$this->filterInput($_SESSION['email'])."',phone_no = '".$this->filterInput($_SESSION['phoneno'])."',payer_email = '".$this->filterInput($_POST['payer_email'])."',reciever_email = '".$this->filterInput($_POST['receiver_email'])."',status = 'Ordered',sale_price = '".$this->filterInput($_SESSION['sale_price'])."',ship_price = '".$this->filterInput($_SESSION['ship_value'])."',added_date = NOW()"; 
			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
		}
    #......................................................................................................
    #get the order histroy in store admin     
	/**
	 * Common::getOrderListBasedonDomain()
	 * 
	 * @return
	 */
	function getOrderListBasedonDomain()
			{
				global $CFG,$objSmarty;
				$sql_rent		=	"SELECT  order_id,domain_id,sub_total,grand_total,payment_status,order_status,address,state,city,country,zip,email,phone_no,payer_email,receiver_mail,tax_val,ship_val,addeddate  FROM ".$CFG['table']['order']." WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
				$res_rent		=	$this->ExecuteQuery($sql_rent,'select');
                
			 	$objSmarty->assign('orderlist',$res_rent);
			}
	/**
	 * Common::getProductName()
	 * 
	 * @return
	 */
	function getProductName($prod_id)
		{
			global $CFG,$objSmarty;
			
			$prod_name = $this->getValue('product_name',$CFG['table']['store_product'],"product_id = '".$this->filterInput($prod_id)."'");
			return $prod_name;
		}
	/**
	 * Common::getProductId()
	 * 
	 * @return
	 */
	function getProductId($order_id)
		{
			global $CFG,$objSmarty;
			
			$prod_id = $this->getValue('product_id',$CFG['table']['order_product'],"order_id = '".$this->filterInput($order_id)."'");
			return $prod_id;
		}
	/**
	 * Common::getShipAddrInfoForMail()
	 * 
	 * @return
	 */
	function getShipAddrInfoForMail($order_id,$domain_id)
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id,amount,address,city,state,country,zipcode,email,phone_no FROM ".$CFG['table']['order_product']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND order_id = '".$this->filterInput($order_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres;
		}
	/**
	 * Common::getStoreInfoForShippingMail()
	 * 
	 * @return
	 */
	function getStoreInfoForShippingMail()
		{
			global $CFG,$objSmarty;
			
			$sqlsel = "SELECT domain_id,currency,company_name,street,postal,country,state,email,phone_no,shipping_policy,return_policy FROM ".$CFG['table']['store_details']. " WHERE domain_id = '".$this->filterInput($_SESSION['domain_id'])."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres;
		}
	/**
	 * Common::getSubTotalForMail()
	 * 
	 * @return
	 */
	function getSubTotalForMail($order_id)
		{
			global $CFG,$objSmarty;
			
			$sub_total = $this->getValue('sub_total',$CFG['table']['order'],"order_id = '".$this->filterInput($order_id)."'");
			return $sub_total;
		}
	/**
	 * Common::getGrandTotalForMail()
	 * 
	 * @return
	 */
	function getGrandTotalForMail($order_id)
		{
			global $CFG,$objSmarty;
			
			$grand_total = $this->getValue('grand_total',$CFG['table']['order'],"order_id = '".$this->filterInput($order_id)."''");
			return $grand_total;
		}
	/**
	 * Common::getAmount()
	 * 
	 * @return
	 */
	function getAmount($order_id)
		{
			global $CFG,$objSmarty;
			
			$amount = $this->getValue('amount',$CFG['table']['order_product'],"order_id = '".$this->filterInput($order_id)."'");
			return $amount;
		}
	/**
	 * Common::getShippingPrice()
	 * 
	 * @return
	 */
	function getShippingPrice($order_id)
		{
			global $CFG,$objSmarty;
			
			$ship_val= $this->getValue('ship_val',$CFG['table']['order'],"order_id = '".$this->filterInput($order_id)."'");
			return $ship_val;
		}
	/**
	 * Common::getTotalQuantity()
	 * 
	 * @return
	 */
	function getTotalQuantity($order_id,$domain_id)
		{
			global $CFG,$objSmarty;
		 	$sqlsel = "SELECT sum(quantity) as quantity FROM ".$CFG['table']['order_details']. " WHERE domain_id = '".$_SESSION['domain_id']."' AND order_id = '".$this->filterInput($order_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			return $sqlres[0]['quantity'];
		}
        
    /**
     * Common::changeDuplicate()
     * 
     * @return
     */
    /**
     * Common::changeDuplicate()
     * 
     * @return
     */
    function changeDuplicate()
		{
			global $CFG,$objSmarty;
            if(isset($_POST['product_id']) && $_POST['product_id'] != '')
                {
                    $sql  = "SELECT product_id,domain_id,product_name,description,price,offer_price,sale_price FROM
                            ".$CFG['table']['store_product']."
                            WHERE product_id ='".$this->filterInput($_POST['product_id'])."'";
                    $res  =     $this->ExecuteQuery($sql,'select');
                    return $res;  
                }	 		
              
		}   
    /**
     * Common::InsertDuplicate()
     * 
     * @param mixed $duplicate
     * @return
     */
    /**
     * Common::InsertDuplicate()
     * 
     * @return
     */
    function InsertDuplicate($duplicate)
        {
            global $CFG,$objSmarty;
            if(isset($duplicate))
                {
                    $sql = "INSERT INTO ".$CFG['table']['store_product']." SET domain_id =".$this->filterInput($_SESSION['domain_id']).",product_name= '".$this->filterInput($duplicate[0]['product_name'])."',description='".$this->filterInput($duplicate[0]['description'])."',price= '".$this->filterInput($duplicate[0]['price'])."',offer_price= '".$this->filterInput($duplicate[0]['offer_price'])."',sale_price= '".$this->filterInput($duplicate[0]['price'])."'";
                    $res = $this->ExecuteQuery($sql,'insert');
                    
                    $objSmarty->assign('productListdetails',$res);
                    return $res;
                }
        }
    /**
     * Common::changeProductImageDuplicate()
     * 
     * @return
     */
    /**
     * Common::changeProductImageDuplicate()
     * 
     * @return
     */
    function changeProductImageDuplicate()
		{
			global $CFG,$objSmarty;
            if(isset($_POST['product_id']) && $_POST['product_id'] != '')
                {
                	$sql  =     "SELECT img_id,product_id,domain_id,image_name,sort_order FROM
                                ".$CFG['table']['product_images']."
                                WHERE product_id ='".$this->filterInput($_POST['product_id'])."'";
                    $res  =     $this->ExecuteQuery($sql,'select');
                    return $res;  
                }	 	   
		} 
  /**
   * Common::getCurrency()
   *
   * @return void
   */
  	/**
  	 * Common::getCurrency()
  	 * 
  	 * @return
  	 */
  	function getCurrency()
		{
			global $CFG,$objSmarty;
			$selqry = "SELECT currency_code FROM ".$CFG['table']['currencymanage']." WHERE currency_status = '1'";
			$resqry = $this->ExecuteQuery($selqry, "select");
	    	#echo "<pre>";print_r($resqry);echo "</pre>";
		    $objSmarty->assign('currencycode',$resqry); 		    
		}		    
    #........................................................................................
    #view order history    
    /**
     * Common::order_details()
     * 
     * @return
     */
    function order_details($order_id)
 		{
 			global $CFG, $objSmarty;
            $condition  = '';          
            
 			if($order_id != "")
 			{
				$condition .= ($this->filterInput($order_id)!='') ? " AND o.order_id='".$this->filterInput($order_id)."'" : "";			
		
				$Query = " SELECT o.order_id, o.domain_id, o.order_no, o.sub_total, o.tax_val, o.ship_val, o.grand_total, o.payment_status, o.txn_id,  ".
                                " o.order_status, o.payer_email, o.receiver_mail, o.name, o.address, o.phone_no, o.email, o.zip, o.city, o.state, o.country, ".
                                " o.addeddate, od.id, od.domain_id, od.product_id, od.product_name, od.price, od.quantity, ".
                                " st.company_name".
						" FROM ".$CFG['table']['order']." AS o".
						" LEFT JOIN ".$CFG['table']['order_details']." AS od ON o.order_id = od.order_id ".	
						" LEFT JOIN ".$CFG['table']['store_details']." AS st ON o.domain_id = st.domain_id ".					
						" WHERE o.order_id IS NOT NULL $condition"; 
				$order_history = $this->ExecuteQuery($Query, 'select');
				#echo "<pre>";print_r($order_history);echo "</pre>";exit;
				#$this->PR($order_history);				
				foreach($order_history as $key=>$value)
				{
    		  		$option_name  = '';
    				$option_div   = '';
    			    $option_price = 0;
                    $order_history[$key]['product_price'] = $order_history[$key]['quantity']*$order_history[$key]['price'];  
    			    $subtoal     += $order_history[$key]['quantity']*$order_history[$key]['price'];   
				}                
				
                $objSmarty->assign('order_history',$order_history);
			}
			
		}    
    #........................................................................................
    #get store currency symbol
    /**
     * Common::getStoreCurrencysymbol()
     * 
     * @return
     */
    function getStoreCurrencysymbol($domain_id)
        {
            global $CFG, $objSmarty;
            $sel_qry = "SELECT st.tax_rate,st.currency, cur.currency_type, cur.currency_symbol, cur.currency_image ".
                                       " FROM ".$CFG['table']['store_details']." as st ".
                                       " LEFT JOIN ".$CFG['table']['currencymanage']." as cur ON st.currency = cur.currency_code ".
                                       " WHERE st.domain_id = '".$this->filterInput($domain_id)."'";
            $res    = $this->ExecuteQuery($sel_qry,'select');
            
            if($res[0]['currency_type'] == 'I'){
                $CFG['site']['currency_image']	= $CFG['site']['photo_sitelogo_url'].'/'.$res['0']['currency_image']; 
    			$currency   = '<img src="'.$CFG['site']['currency_image'].'" title="" alt="Currency" width="10" height="10"/>';
                define("CURRENCY_SYMBOL",$currency);
    		}else{
    			$currency   = $res['0']['currency_symbol'];
                define("CURRENCY_SYMBOL",$currency);
    		}	
            $currency_rate = 1.00;
            $objSmarty->assign("symbol", CURRENCY_SYMBOL);
            $objSmarty->assign("rate", $currency_rate);
        }    
    #.......................................................................................
    /**
     * Common::InsertDuplicateProductImage()
     * 
     * @param mixed $duplicateImage
     * @param mixed $id
     * @return void
     */
    /**
     * Common::InsertDuplicateProductImage()
     * 
     * @return
     */
    function InsertDuplicateProductImage($duplicateImage,$id)
        {
            global $CFG,$objSmarty;
             $sql = "INSERT INTO ".$CFG['table']['product_images']." SET product_id=".$this->filterInput($id).",domain_id =".$this->filterInput($_SESSION['domain_id']).",image_name = '".$duplicateImage[0]['image_name']."'";
             $res = $this->ExecuteQuery($sql,'insert');
            
            $objSmarty->assign('productListdetails',$res);
           	
        }        
	/**
	 * Common::updateOrderStatus()
	 * 
	 * @return
	 */
	function updateOrderStatus()
		{
		 	global $CFG,$objSmarty;
			
			$sql_regupdate	=	"UPDATE ".$CFG['table']['order']." SET order_status = '".$this->filterInput($_POST['status'])."'  WHERE order_id = '".$this->filterInput($_POST['order_id'])."'";
			$res_regupdate	=	$this->ExecuteQuery($sql_regupdate,'update');
			
			if($_POST['status'] == 'Shipped')
				{
				    global $CFG,$objSmarty;
					$shipped_header_info  =$this->getShippedHeadercontent($_SESSION['domain_id']);
					$shipped_footer_info  =$this->getShippedFootercontent($_SESSION['domain_id']);
					$ship_address=$this->getStoreInfoForShippingMail();
				 	$shipping_company= $ship_address[0]['company_name'];
				 	$shipping_street = $ship_address[0]['street'];
				 	$shipping_postal = $ship_address[0]['postal'];
				 	$shipping_country = $ship_address[0]['country'];
				 	$shipping_state  = $ship_address[0]['state'];
				  	$order_id=$_POST['order_id'];
				 	$sub_total=$this->getSubTotalForMail($_POST['order_id']);
					$shipping_price=$this->getShippingPrice($_POST['order_id']);
					$tax=$this->getTaxPrice($_POST['order_id']);
					$total=$this->getGrandTotalForMail($_POST['order_id']);
					$quantity=$this->getTotalQuantity($_POST['order_id'],$_SESSION['domain_id']);
					$to_email=$this->getEmail($_SESSION['domain_id']);
					$from_email=$this->getAdminEmail($_SESSION['domain_id']);
			 	 	$from_name 			= $CFG['site']['site_main_domain'];
					$mailsubject  = $CFG['site']['sitename']." Mail for Shipped";
					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailShipped.tpl");
			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
			        $mail_content = str_replace('{ORDER_ID}',$order_id,$mail_content);
			        $mail_content = str_replace('{SHIPPING_COMPANY}',$shipping_company,$mail_content);
			        $mail_content = str_replace('{SHIPPING_STREET}',$shipping_street,$mail_content);
			        $mail_content = str_replace('{SHIPPING_POSTAL}',$shipping_postal,$mail_content);
			        $mail_content = str_replace('{SHIPPING_COUNTRY}',$shipping_country,$mail_content);
			        $mail_content = str_replace('{SHIPPING_STATE}',$shipping_state,$mail_content);
			        $mail_content = str_replace('{HEADER}',$shipped_header_info,$mail_content);
			        $mail_content = str_replace('{FOOTER}',$shipped_footer_info,$mail_content);
			        $mail_content = str_replace('{QUANTITY}',$quantity,$mail_content);
			        $mail_content = str_replace('{SALE_PRICE}',$sub_total,$mail_content);
			        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
			        $mail_content = str_replace('{TAX}',$tax,$mail_content);
			        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
			        #echo $mail_content;
	        		$ok=$this->sendMail($CFG['site']['site_main_domain'],$from_email,$to_email,$mailsubject,$mail_content);
	        	    #$ok = '1';
	        		if($ok)
	        			{
	        				$reciever_email	=	$from_email;
							$sender_email	=	$to_email;
							$order_id=$_POST['order_id'];
							$mailsubject  = $CFG['site']['sitename']." Mail for Shipped";
							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailShipped.tpl");
					        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
					        $mail_content = str_replace('{SHIPPING_COMPANY}',$shipping_company,$mail_content);
					        $mail_content = str_replace('{SHIPPING_STREET}',$shipping_street,$mail_content);
					        $mail_content = str_replace('{SHIPPING_POSTAL}',$shipping_postal,$mail_content);
					        $mail_content = str_replace('{SHIPPING_COUNTRY}',$shipping_country,$mail_content);
					        $mail_content = str_replace('{ORDER_ID}',$order_id,$mail_content);
					        $mail_content = str_replace('{SHIPPING_STATE}',$shipping_state,$mail_content);
					        $mail_content = str_replace('{HEADER}',$shipped_header_info,$mail_content);
					        $mail_content = str_replace('{FOOTER}',$shipped_footer_info,$mail_content);
					        $mail_content = str_replace('{QUANTITY}',$quantity,$mail_content);
					        $mail_content = str_replace('{SALE_PRICE}',$sub_total,$mail_content);
					        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
					        $mail_content = str_replace('{TAX}',$tax,$mail_content);
					        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
					        #echo $mail_content;die();
			        		$ok=$this->sendMail($to_name,$sender_email,$reciever_email,$mailsubject,$mail_body);
						}
				}
			elseif($_POST['status'] == 'Refund')	
				{
					global $CFG,$objSmarty;
					$refund_header_info  =$this->getRefundHeadercontent($_SESSION['domain_id']);
					$refund_footer_info  =$this->getRefundFootercontent($_SESSION['domain_id']);
				 	$order_id=$_POST['order_id'];
				 	$sub_total=$this->getSubTotalForMail($_POST['order_id']);
					$shipping_price=$this->getShippingPrice($_POST['order_id']);
					$tax=$this->getTaxPrice($_POST['order_id']);
					$total=$this->getGrandTotalForMail($_POST['order_id']);
					$quantity=$this->getTotalQuantity($_POST['order_id'],$_SESSION['domain_id']);
				  	$to_email=$this->getEmail($_SESSION['domain_id']);
					$from_email=$this->getAdminEmail($_SESSION['domain_id']);
				 	$from_name 			= $CFG['site']['site_main_domain'];
					$mailsubject  = $CFG['site']['sitename']." Mail for Refund";
					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailRefund.tpl");
			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
			        $mail_content = str_replace('{ORDER_ID}',$order_id,$mail_content);
			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
			        $mail_content = str_replace('{PRODUCT_NAME}',$product_name,$mail_content);
			        $mail_content = str_replace('{SALE_PRICE}',$sub_total,$mail_content);
			        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
			        $mail_content = str_replace('{TAX}',$tax,$mail_content);
			        $mail_content = str_replace('{QUANTITY}',$quantity,$mail_content);
			        $mail_content = str_replace('{HEADER}',$refund_header_info,$mail_content);
			        $mail_content = str_replace('{FOOTER}',$refund_footer_info,$mail_content);
			        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
			        //echo $mail_content;
	        		$ok=$this->sendMail($CFG['site']['sitename'],$from_email,$to_email,$mailsubject,$mail_content);
	        		//$ok=1;
	        		if($ok)
	        			{
	        				$reciever_email	=	$from_email;
							$sender_email	=	$to_email;
							$mailsubject  = $CFG['site']['sitename']." Mail for Refund";
							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailRefund.tpl");
					        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
					        $mail_content = str_replace('{ORDER_ID}',$_POST['order_id'],$mail_content);
					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
					        $mail_content = str_replace('{PRODUCT_NAME}',$product_name,$mail_content);
					        $mail_content = str_replace('{SALE_PRICE}',$sub_total,$mail_content);
					        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
					        $mail_content = str_replace('{TAX}',$tax,$mail_content);
					        $mail_content = str_replace('{QUANTITY}',$quantity,$mail_content);
					        $mail_content = str_replace('{HEADER}',$refund_header_info,$mail_content);
					        $mail_content = str_replace('{FOOTER}',$refund_footer_info,$mail_content);
					        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
					        //echo $mail_content;die();
			        		$ok=$this->sendMail($to_name,$sender_email,$reciever_email,$mailsubject,$mail_body);
						}
				}
			elseif($_POST['status'] == 'cancel')	
				{
					global $CFG,$objSmarty;
					$canceled_header_info  =$this->getCanceledHeadercontent($_SESSION['domain_id']);
					$canceled_footer_info  =$this->getCanceledFootercontent($_SESSION['domain_id']);
				  	$to_email=$this->getEmail($_SESSION['domain_id']);
					$from_email=$this->getAdminEmail($_SESSION['domain_id']);
					$sub_total=$this->getSubTotalForMail($_POST['order_id']);
					$shipping_price=$this->getShippingPrice($_POST['order_id']);
					$tax=$this->getTaxPrice($_POST['order_id']);
					$total=$this->getGrandTotalForMail($_POST['order_id']);
					$quantity=$this->getTotalQuantity($_POST['order_id'],$_SESSION['domain_id']);
				 	$from_name 			=$CFG['site']['site_main_domain'];
					$mailsubject  = $CFG['site']['sitename']." Mail for Refund";
					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailCanceled.tpl");
					$mail_content = str_replace('{ORDER_ID}',$_POST['order_id'],$mail_content);
			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
			        $mail_content = str_replace('{HEADER}',$canceled_header_info,$mail_content);
			        $mail_content = str_replace('{FOOTER}',$canceled_footer_info,$mail_content);
			        $mail_content = str_replace('{QUANTITY}',$quantity,$mail_content);
			        $mail_content = str_replace('{SALE_PRICE}',$sub_total,$mail_content);
			        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
			        $mail_content = str_replace('{TAX}',$tax,$mail_content);
			        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
			        //echo $mail_content;
	        		$ok=$this->sendMail($CFG['site']['sitename'],$from_email,$to_email,$mailsubject,$mail_content);
	        		//$ok=1;
					if($ok)
	        			{
	        				$reciever_email	=	$from_email;
							$sender_email	=	$to_email;
							$mailsubject  = $CFG['site']['sitename']." Mail for Refund";
							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailCanceled.tpl");
							$mail_content = str_replace('{ORDER_ID}',$_POST['order_id'],$mail_content);
					        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
					        $mail_content = str_replace('{HEADER}',$canceled_header_info,$mail_content);
					        $mail_content = str_replace('{FOOTER}',$canceled_header_info,$mail_content);
					        $mail_content = str_replace('{QUANTITY}',$quantity,$mail_content);
					        $mail_content = str_replace('{SALE_PRICE}',$sub_total,$mail_content);
					        $mail_content = str_replace('{SHIPPING_PRICE}',$shipping_price,$mail_content);
			        		$mail_content = str_replace('{TAX}',$tax,$mail_content);
					        $mail_content = str_replace('{TOTAL}',$total,$mail_content);
					        //echo $mail_content;die();
			        		$ok=$this->sendMail($CFG['site']['sitename'],$sender_email,$reciever_email,$mailsubject,$mail_body);
						}
				}		
		}
    /**
     * Common::ListDragElementsInPostListPage()
     * 
     * @param mixed $page_id
     * @param mixed $post_id
     * @return void
     */
    
    /**
     * Common::ListDragElementsInPostListPage()
     * 
     * @return
     */
    function ListDragElementsInPostListPage($page_id,$post_id)
	 	{
			global $CFG,$objSmarty;
			if($post_id!="" && $page_id!="" ){
    			$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE page_id = '".$this->filterInput($page_id)."' AND post_title='".$this->filterInput($post_id)."'";
    			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
    			#echo "<pre>";print_r($sqlres);echo "</pre>" ;
    			$objSmarty->assign("list", $sqlres);
            }
		}
    /**
     * Common::ListDragInListPost()
     * 
     * @param mixed $page_id
     * @param mixed $post_id
     * @return void
     */
    /**
     * Common::ListDragInListPost()
     * 
     * @return
     */
    function ListDragInListPost($page_id,$post_id)
	 	{
			global $CFG,$objSmarty;
			if($post_id!="" && $page_id!="" ){
    			$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE page_id = '".$this->filterInput($page_id)."' AND post_title='".$this->filterInput($post_id)."' AND column_id = '0' ORDER BY sort_order ASC";
    			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
    			#echo "<pre>";print_r($sqlres);echo "</pre>" ;
    			$objSmarty->assign("list", $sqlres);
            }
		}
    /**
     * Common::ListDragInblogSource()
     * 
     * @return
     */
    function ListDragInblogSource($page_id,$post_id)
	 	{
			global $CFG,$objSmarty;
			if($post_id!="" && $page_id!="" ){
    			$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE page_id = '".$this->filterInput($page_id)."' AND post_title='".$this->filterInput($post_id)."' ORDER BY sort_order ASC";
    			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
    			#echo "<pre>";print_r($sqlres);echo "</pre>";die();
    			$objSmarty->assign("list", $sqlres);
            }
		}
  		
    /**
     * Common::ListDragElementsInOtherPage()
     * 
     * @param mixed $page_id
     * @return void
     */
    /**
     * Common::ListDragElementsInOtherPage()
     * 
     * @return
     */
    function ListDragElementsInOtherPage($page_id)
	 	{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT * FROM ".$CFG['table']['page_list']. " WHERE page_id = '".$this->filterInput($page_id)."' AND column_pagelist='0'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			#echo "<pre>";print_r($sqlres);echo "</pre>";die();
			$objSmarty->assign("otherPage", $sqlres);
		}
	/**
	 * Common::getPageNameForSubBlog()
	 * 
	 * @param mixed $pageid
	 * @return void
	 */
	/**
	 * Common::getPageNameForSubBlog()
	 * 
	 * @return
	 */
	function getPageNameForSubBlog($pageid)
		{
			global $CFG,$objSmarty;
		    $sqlsel = "SELECT pagename FROM ".$CFG['table']['pages']. " WHERE page_id = '".$this->filterInput($pageid)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("pagenames_for_drag", $sqlres[0]['pagename']);
			//return $sqlres[0]['pagename'];
		}
    /**
     * Common::getBannerStatus()
     * 
     * @return
     */
    function getBannerStatus($pageid)
        {
            global $CFG,$objSmarty;
		    $sqlsel = "SELECT banner_status FROM ".$CFG['table']['temp_pages']. " WHERE page_id = '".$this->filterInput($pageid)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("banner_status", $sqlres[0]['banner_status']);
        }
    function getBannerStatus_subdomain($pageid)
        {
            global $CFG,$objSmarty;
		    $sqlsel = "SELECT banner_status FROM ".$CFG['table']['pages']. " WHERE page_id = '".$this->filterInput($pageid)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			$objSmarty->assign("banner_status", $sqlres[0]['banner_status']);
            
        }        
    /**
     * Common::getDomainNames()
     * 
     * @param mixed $domain_id
     * @return
     */
    /**
     * Common::getDomainNames()
     * 
     * @return
     */
    function getDomainNames($domain_id)
        {
            global $CFG,$objSmarty;
		    $sqlsel = "SELECT subdomainurl FROM ".$CFG['table']['domaindetails']. " WHERE domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
           	return $sqlres[0]['subdomainurl'];
        }
    /**
     * Common::getBannerSliderImage()
     *  for get banner images in slider(banner)
     * @param mixed $domain_id
     * @param mixed $status
     * @return void
     */
    /**
     * Common::getBannerSliderImage()
     * 
     * @return
     */
    function getBannerSliderImage($domain_id,$status)
        {
            global $CFG,$objSmarty;

            if($domain_id != '')
                {
                    $sqlsel = "SELECT banner_slider_id,image_name FROM ".$CFG['table']['temp_banner_slider_images']. " WHERE  domain_id ='".$this->filterInput($domain_id)."'  AND status='".$this->filterInput($status)."' AND delete_status='N' ORDER BY banner_slider_id DESC";
        			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
                   
         	        $objSmarty->assign('banner_images',$sqlres);
                }		    
        }
    /**
     * Common::deletePintDomain()
     * 
     * @return
     */
    function deletePintDomain()
        {
            global $CFG;            
		    $del_qury = "DELETE FROM ".$CFG['table']['point']." WHERE point_id = '".$this->filterInput($_POST['pd_id'])."' AND domain_id = '".$this->filterInput($_POST['d_id'])."' ";
			$sqlres =  $this->ExecuteQuery($del_qury,'delete');
            if($sqlres)
                $_SESSION['home_suc_msg'] = "Selected Point Domain deleted Successfully";
			echo "success";exit;
        }    
    #delete the new domian process
    /**
     * Common::deleteNewDomain()
     * 
     * @return
     */
    function deleteNewDomain()
        {
            global $CFG,$_lang;            
		    $del_qury = "DELETE FROM ".$CFG['table']['new_domain']." WHERE newdomainid = '".$this->filterInput($_POST['nd_id'])."' AND domain_id = '".$this->filterInput($_POST['d_id'])."' ";
			$sqlres =  $this->ExecuteQuery($del_qury,'delete');
            if($sqlres)
                $_SESSION['home_suc_msg'] = "Selected New Domain deleted Successfully";
			echo "success";exit;
        }   
    #Delete Google images from google images and temp_google image table
	/**
	 * Common::deleteGoogleImages()
	 * 
	 * @return
	 */
	function deleteGoogleImages()
		{
			global $CFG,$objSmarty;
            if($_POST['page_list_id'] != '' && $_POST['domain_id'] != '')
                {
                    $UpQuery  = "DELETE FROM ".$CFG['table']['temp_google_images']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                     
                }		    
		}
    #Delete gallery images from gallery images and temp_gallery image table
	/**
	 * Common::deleteGalleryImages()
	 * 
	 * @return
	 */
	function deleteGalleryImages()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '' && $_POST['page_list_id'] != '')
                {
                    $tempAlreadyImages = $this->getMultiValue("gallery_name",$CFG['table']['temp_gallery_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND page_list_id ='".$this->filterInput($_POST['page_list_id'])."'");
                    $imagesFolderImages = $this->getMultiValue("gallery_name",$CFG['table']['gallery_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND page_list_id ='".$this->filterInput($_POST['page_list_id'])."'");
                    foreach($tempAlreadyImages as $key=>$value)
                        {
                            $arr1[]=$value['gallery_name'];
                        }
                      if($arr1 && $imagesFolderImage == '')
                        {
                            foreach($arr1 as $key=>$value)
                                {
                                    @unlink($CFG['site']['photo_domain_image_path'].'/'.$value);
                                }
                        } 
                    
                    $UpQuery  = "DELETE FROM ".$CFG['table']['temp_gallery_images']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_gallery_images']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
        			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }            
		}
     #Delete slider images from  temp_slider image table
	/**
	 * Common::deleteSliderImages()
	 * 
	 * @return
	 */
	function deleteSliderImages()
		{
			global $CFG,$objSmarty;
            if($_POST['domain_id'] != '' && $_POST['page_list_id'] != '')
                {
                $tempAlreadyImages = $this->getMultiValue("slider_images",$CFG['table']['temp_slider_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND page_list_id ='".$this->filterInput($_POST['page_list_id'])."'");
                $imagesFolderImages = $this->getMultiValue("slider_images",$CFG['table']['slider_images'],"domain_id ='".$this->filterInput($_POST['domain_id'])."' AND page_list_id ='".$this->filterInput($_POST['page_list_id'])."'");
                foreach($tempAlreadyImages as $key=>$value)
                    {
                        $arr1[]=$value['slider_images'];
                    }
                  if($arr1 && $imagesFolderImage == '')
                    {
                        foreach($arr1 as $key=>$value)
                            {
                                @unlink($CFG['site']['photo_domain_image_path'].'/'.$value);
                            }
                    } 
                
                $UpQuery  = "DELETE FROM ".$CFG['table']['temp_slider_images']." WHERE page_list_id ='".$this->filterInput($_POST['page_list_id'])."'";
    			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                $UpQuery  = "UPDATE ".$CFG['table']['temp_slider_images']." SET publish_status = 'U' WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
    			$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
            }
		}
     #PUBLISH post title tables
 /**
 * Blog post title publish process
 */
/**
 * Common::getBlogPostTitleValue()
 * 
 * @return
 */
function getBlogPostTitleValue($domain_id,$tablename)
    {       
        global $CFG;
        $sel_qry = "SELECT post_id, domain_id, title, category, addeddate,seo_title,publish_status FROM ".$tablename." WHERE domain_id='".$this->filterInput($domain_id)."' ";
        $res = $this->ExecuteQuery($sel_qry,'select');
        return $res;  
        
    } 
/**
 * Common::blogPostTitlePublishProcess()
 * 
 * @return
 */
function blogPostTitlePublishProcess($domain_id)
    {      
        global $CFG;
        $temp_posttitle_val    = $this->getBlogPostTitleValue($domain_id,$CFG['table']['temp_posttitle'] );
        $main_posttitle_val    = $this->getBlogPostTitleValue($domain_id,$CFG['table']['posttitle']);
        $temp_posttitle_id = array();
        foreach($temp_posttitle_val as $temp=>$value)
            {
                $temp_posttitle_id[] = $temp_posttitle_val[$temp]['post_id'];
            }  
        $cur_main_posttitle_id = array();    
        foreach($main_posttitle_val as $main=>$value)
            {
                if( !in_array($main_posttitle_val[$main]['post_id'],$temp_posttitle_id) )
                    {
                        $delet_id = $main_posttitle_val[$main]['post_id'].","; 
                    }
                else if(in_array($main_posttitle_val[$main]['post_id'],$temp_posttitle_id)) 
                    {
                        $cur_main_posttitle_id[] = $main_posttitle_val[$main]['post_id'];
                    }          
            }                
        $delet_id = substr($delet_id,0,-1);    
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['posttitle']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND post_id IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }     
        $temp_upd_id = '';
        foreach($temp_posttitle_val as $sub=>$value)
            {
                if($temp_posttitle_val[$sub]['publish_status'] == 'U')
                    {
                      if( !in_array($temp_posttitle_val[$sub]['post_id'],$cur_main_posttitle_id) )
                            {
                                $insQuery  = "INSERT INTO ".$CFG['table']['posttitle']." SET post_id= '".$this->filterInput($temp_posttitle_val[$sub]['post_id'])."',domain_id ='".$this->filterInput($temp_posttitle_val[$sub]['domain_id'])."', title='".$this->filterInput($temp_posttitle_val[$sub]['title'])."',seo_title='".$this->filterInput($temp_posttitle_val[$sub]['seo_title'])."',category='".$this->filterInput($temp_posttitle_val[$sub]['category'])."',addeddate='".$this->filterInput($temp_posttitle_val[$sub]['addeddate'])."',status='1'";
    			                $res	=	$this->ExecuteQuery($insQuery,'insert');
                                
                                $temp_upd_id = $temp_posttitle_val[$sub]['post_id'].",";   
                            }    
                       else if(in_array($temp_posttitle_val[$sub]['post_id'],$cur_main_posttitle_id) ) 
                            {
                                $updQuery  = "UPDATE ".$CFG['table']['posttitle']." SET title='".$this->filterInput($temp_posttitle_val[$sub]['title'])."',seo_title='".$this->filterInput($temp_posttitle_val[$sub]['seo_title'])."',category='".$this->filterInput($temp_posttitle_val[$sub]['category'])."',addeddate='".$this->filterInput($temp_posttitle_val[$sub]['addeddate'])."',status='1' WHERE post_id= '".$this->filterInput($temp_posttitle_val[$sub]['post_id'])."' AND domain_id ='".$this->filterInput($temp_posttitle_val[$sub]['domain_id'])."'";
    			                $res	=	$this->ExecuteQuery($updQuery,'update'); 
                                
                                $temp_upd_id = $temp_posttitle_val[$sub]['post_id'].",";
                            }
                    } 
            }  
            
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_posttitle'],"publish_status = 'N'","post_id IN ('".$this->filterInput($temp_upd_id)."')");
                }
    }
   /**
    * Common::publish_youTupe()
    * 
    * @return
    */
   function publish_youTupe($youtupe)
        {        
             global $CFG;
             
             $UpQuery  = "DELETE FROM ".$CFG['table']['youtube_video']." WHERE domain_id ='".$this->filterInput($_POST['domain_id'])."'";
			 $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));            
             
             foreach($youtupe as $key=>$value)
                {                
                    $UpQuery  = "INSERT INTO ".$CFG['table']['youtube_video']." SET domain_id ='".$this->filterInput($_POST['domain_id'])."', page_id='".$this->filterInput($value['page_id'])."', page_list_id='".$this->filterInput($value['page_list_id'])."', youtube_url='".$this->filterInput($value['youtube_url'])."', youtube_spacing='".$this->filterInput($value['youtube_spacing'])."',youtube_width='".$this->filterInput($value['youtube_width'])."' ,added_date='".$this->filterInput($value['added_date'])."'";
    			    $last_insert_id	=	$this->ExecuteQuery($UpQuery,'insert');
                    
                    $UpQuery  = "UPDATE ".$CFG['table']['temp_youtube_video']." SET publish_status = 'N', ytube_id='".$this->filterInput($last_insert_id)."' WHERE domain_id ='".$this->filterInput($value['domain_id'])."' AND ytube_id='".$this->filterInput($value['ytube_id'])."'";
    			    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                }  
        } 
//-----------------------------------------------------------------------------------------------------------------------------------------------    
/** pages table
 */ 
#get pages table value
/**
 * Common::getPagetablesValue()
 * 
 * @return
 */
function getPagetablesValue($domain_id,$tablename)
    {
        global $CFG;
        $pagesary   = " SELECT page_id,page_parent_id,domain_id,pagename,seo_title,hide_navigation,page_layout,page_desc,meta_key,footer_code,header_code,social_plugins,title_select,text_title,text_description,description_select,contact_form,divider,image_select,image_multiple_select,image_text,blog_comments,store_comment,buildtitle_bold,buildtitle_italic,buildtitle_underline,buildtitle_strikethrough,buildTitle_textalign,buildTitle_fontsize,buildTitle_fontcolor,buildPara_bold,buildPara_italic,buildPara_underline,buildPara_strikethrough,buildPara_textalign,buildPara_fontsize,buildPara_fontcolor,sort_order,link_site,link_status,banner_status,publish_status FROM " .$tablename. " WHERE domain_id='".$this->filterInput($domain_id)."' ";
        $sqlres =  $this->ExecuteQuery($pagesary,'select');
        return $sqlres;        
    }     
#................................................................................................................................   
/**
 * Common::pagePublishProcess()
 * 
 * @return
 */
function pagePublishProcess($domain_id)
    {
        global $CFG;
        
        $temp_page_val    = $this->getPagetablesValue($domain_id,$CFG['table']['temp_pages']);
        $main_page_val    = $this->getPagetablesValue($domain_id,$CFG['table']['pages']);  
        
        $temp_page_id = array();
        foreach($temp_page_val as $temp=>$value)
            {
                $temp_page_id[] = $temp_page_val[$temp]['page_id'];
            }                                         
        $cur_main_page_id = array();
        foreach($main_page_val as $main=>$value)
            {
                if( !in_array($main_page_val[$main]['page_id'],$temp_page_id) )
                    {
                        $delet_id.= $main_page_val[$main]['page_id'].","; 
                    } 
                else if(in_array($main_page_val[$main]['page_id'],$temp_page_id)) 
                    {
                        $cur_main_page_id[] = $main_page_val[$main]['page_id'];
                    }   
            }    
        $delet_id = substr($delet_id,0,-1);    
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['pages']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND page_id IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }            
            
        $temp_upd_id = '';
        #insert temp table to main table
        foreach($temp_page_val as $temp=>$value)
            {
                if( !in_array($temp_page_val[$temp]['page_id'],$cur_main_page_id) )
                    {                  
                        $insqury  = "INSERT INTO ".$CFG['table']['pages']." SET page_id= '".$this->filterInput($temp_page_val[$temp]['page_id'])."',domain_id ='".$this->filterInput($temp_page_val[$temp]['domain_id'])."', page_parent_id='".$this->filterInput($temp_page_val[$temp]['page_parent_id'])."',pagename='".$this->filterInput($temp_page_val[$temp]['pagename'])."',seo_title='".$this->filterInput($temp_page_val[$temp]['seo_title'])."',hide_navigation='".$this->filterInput($temp_page_val[$temp]['hide_navigation'])."',page_layout='".$this->filterInput($temp_page_val[$temp]['page_layout'])."',page_desc='".$this->filterInput($temp_page_val[$temp]['page_desc'])."',meta_key='".$this->filterInput($temp_page_val[$temp]['meta_key'])."',footer_code='".$this->filterInput($temp_page_val[$temp]['footer_code'])."',header_code='".$this->filterInput($temp_page_val[$temp]['header_code'])."',social_plugins='".$this->filterInput($temp_page_val[$temp]['social_plugins'])."',title_select='".$this->filterInput($temp_page_val[$temp]['title_select'])."',text_title='".$this->filterInput($temp_page_val[$temp]['text_title'])."',text_description='".addslashes($temp_page_val[$temp]['text_description'])."',description_select='".$this->filterInput($temp_page_val[$temp]['description_select'])."',contact_form='".$this->filterInput($temp_page_val[$temp]['contact_form'])."',divider='".$this->filterInput($temp_page_val[$temp]['divider'])."',image_select='".$this->filterInput($temp_page_val[$temp]['image_select'])."',image_multiple_select='".$this->filterInput($temp_page_val[$temp]['image_multiple_select'])."',image_text='".$this->filterInput($temp_page_val[$temp]['image_text'])."',blog_comments='".$this->filterInput($temp_page_val[$temp]['blog_comments'])."',store_comment='".$this->filterInput($temp_page_val[$temp]['store_comment'])."',buildtitle_bold='".$this->filterInput($temp_page_val[$temp]['buildtitle_bold'])."',buildtitle_italic='".$this->filterInput($temp_page_val[$temp]['buildtitle_italic'])."',buildtitle_underline='".$this->filterInput($temp_page_val[$temp]['buildtitle_underline'])."',buildtitle_strikethrough='".$this->filterInput($temp_page_val[$temp]['buildtitle_strikethrough'])."',buildTitle_textalign='".$this->filterInput($temp_page_val[$temp]['buildTitle_textalign'])."',buildTitle_fontsize='".$this->filterInput($temp_page_val[$temp]['buildTitle_fontsize'])."',buildTitle_fontcolor='".$this->filterInput($temp_page_val[$temp]['buildTitle_fontcolor'])."',buildPara_bold='".$this->filterInput($temp_page_val[$temp]['buildPara_bold'])."',buildPara_italic='".$this->filterInput($temp_page_val[$temp]['buildPara_italic'])."',buildPara_underline='".$this->filterInput($temp_page_val[$temp]['buildPara_underline'])."',buildPara_strikethrough='".$this->filterInput($temp_page_val[$temp]['buildPara_strikethrough'])."',buildPara_textalign='".$this->filterInput($temp_page_val[$temp]['buildPara_textalign'])."',buildPara_fontsize='".$this->filterInput($temp_page_val[$temp]['buildPara_fontsize'])."',buildPara_fontcolor='".$this->filterInput($temp_page_val[$temp]['buildPara_fontcolor'])."',sort_order='".$this->filterInput($temp_page_val[$temp]['sort_order'])."',link_site='".$this->filterInput($temp_page_val[$temp]['link_site'])."',link_status='".$this->filterInput($temp_page_val[$temp]['link_status'])."',banner_status='".$this->filterInput($temp_page_val[$temp]['banner_status'])."'";
                		$ins_res	=	$this->ExecuteQuery($insqury,'insert');                   
                         
                        $temp_upd_id = $temp_page_val[$temp]['page_id'].",";                              
                    }
                 else if(in_array($temp_page_val[$temp]['page_id'],$cur_main_page_id) && $temp_page_val[$temp]['publish_status'] == 'U')   
                    {
                        $updqury  = "UPDATE ".$CFG['table']['pages']." SET page_parent_id='".$this->filterInput($temp_page_val[$temp]['page_parent_id'])."',pagename='".$this->filterInput($temp_page_val[$temp]['pagename'])."',seo_title='".$this->filterInput($temp_page_val[$temp]['seo_title'])."',hide_navigation='".$this->filterInput($temp_page_val[$temp]['hide_navigation'])."',page_layout='".$this->filterInput($temp_page_val[$temp]['page_layout'])."',page_desc='".$this->filterInput($temp_page_val[$temp]['page_desc'])."',meta_key='".$this->filterInput($temp_page_val[$temp]['meta_key'])."',footer_code='".$this->filterInput($temp_page_val[$temp]['footer_code'])."',header_code='".$this->filterInput($temp_page_val[$temp]['header_code'])."',social_plugins='".$this->filterInput($temp_page_val[$temp]['social_plugins'])."',title_select='".$this->filterInput($temp_page_val[$temp]['title_select'])."',text_title='".$this->filterInput($temp_page_val[$temp]['text_title'])."',text_description='".addslashes($temp_page_val[$temp]['text_description'])."',description_select='".$this->filterInput($temp_page_val[$temp]['description_select'])."',contact_form='".$this->filterInput($temp_page_val[$temp]['contact_form'])."',divider='".$this->filterInput($temp_page_val[$temp]['divider'])."',image_select='".$this->filterInput($temp_page_val[$temp]['image_select'])."',image_multiple_select='".$this->filterInput($temp_page_val[$temp]['image_multiple_select'])."',image_text='".$this->filterInput($temp_page_val[$temp]['image_text'])."',blog_comments='".$this->filterInput($temp_page_val[$temp]['blog_comments'])."',store_comment='".$this->filterInput($temp_page_val[$temp]['store_comment'])."',buildtitle_bold='".$this->filterInput($temp_page_val[$temp]['buildtitle_bold'])."',buildtitle_italic='".$this->filterInput($temp_page_val[$temp]['buildtitle_italic'])."',buildtitle_underline='".$this->filterInput($temp_page_val[$temp]['buildtitle_underline'])."',buildtitle_strikethrough='".$this->filterInput($temp_page_val[$temp]['buildtitle_strikethrough'])."',buildTitle_textalign='".$this->filterInput($temp_page_val[$temp]['buildTitle_textalign'])."',buildTitle_fontsize='".$this->filterInput($temp_page_val[$temp]['buildTitle_fontsize'])."',buildTitle_fontcolor='".$this->filterInput($temp_page_val[$temp]['buildTitle_fontcolor'])."',buildPara_bold='".$this->filterInput($temp_page_val[$temp]['buildPara_bold'])."',buildPara_italic='".$this->filterInput($temp_page_val[$temp]['buildPara_italic'])."',buildPara_underline='".$this->filterInput($temp_page_val[$temp]['buildPara_underline'])."',buildPara_strikethrough='".$this->filterInput($temp_page_val[$temp]['buildPara_strikethrough'])."',buildPara_textalign='".$this->filterInput($temp_page_val[$temp]['buildPara_textalign'])."',buildPara_fontsize='".$this->filterInput($temp_page_val[$temp]['buildPara_fontsize'])."',buildPara_fontcolor='".$this->filterInput($temp_page_val[$temp]['buildPara_fontcolor'])."',sort_order='".$this->filterInput($temp_page_val[$temp]['sort_order'])."',link_site='".$this->filterInput($temp_page_val[$temp]['link_site'])."',link_status='".$this->filterInput($temp_page_val[$temp]['link_status'])."',banner_status='".$this->filterInput($temp_page_val[$temp]['banner_status'])."' WHERE page_id= '".$this->filterInput($temp_page_val[$temp]['page_id'])."' AND domain_id ='".$this->filterInput($temp_page_val[$temp]['domain_id'])."' ";
                		$upd_res	=	$this->ExecuteQuery($updqury,'update');  
                        
                        $temp_upd_id = $temp_page_val[$temp]['page_id'].",";
                    }
            }    
        
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_pages'],"publish_status = 'N'","page_id IN ('".$this->filterInput($temp_upd_id)."')");
                }  
    } 
    
/** you tube table
 */ 
#youtybe values
/**
 * Common::getYoutubeValue()
 * 
 * @return
 */
function getYoutubeValue($domain_id,$table_name)
    {
        global $CFG;
        $youtupe  = "SELECT ytube_id, page_id, page_list_id, domain_id, youtube_url, youtube_spacing, youtube_width, added_date,publish_status FROM ".$table_name." WHERE domain_id='".$this->filterInput($domain_id)."' ";
        $sqlres =  $this->ExecuteQuery($youtupe,'select');
        return $sqlres;         
    } 
#youtype publish process
/**
 * Common::youtubePublishProcess()
 * 
 * @return
 */
function youtubePublishProcess($domain_id)
    {
        global $CFG;
        $temp_youtube_val    = $this->getYoutubeValue($domain_id,$CFG['table']['temp_youtube_video']);
        $main_youtube_val    = $this->getYoutubeValue($domain_id,$CFG['table']['youtube_video']);
        $temp_youtube_id = array();
        foreach($temp_youtube_val as $temp=>$value)
            {
                $temp_youtube_id[] = $temp_youtube_val[$temp]['ytube_id'];
            }  
        $cur_main_youtube_id = array();    
        foreach($main_youtube_val as $main=>$value)
            {
                if( !in_array($main_youtube_val[$main]['ytube_id'],$temp_youtube_id) )
                    {
                        $delet_id.= $main_youtube_val[$main]['ytube_id'].","; 
                    }
                else if(in_array($main_youtube_val[$main]['ytube_id'],$temp_youtube_id)) 
                    {
                        $cur_main_youtube_id[] = $main_youtube_val[$main]['ytube_id'];
                    }          
            }    
        $delet_id = substr($delet_id,0,-1); 
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['youtube_video']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND ytube_id IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }     
        $temp_upd_id = '';
         foreach($temp_youtube_val as $sub=>$value)
            {
                if($temp_youtube_val[$sub]['publish_status'] == 'U')
                    {
                      if( !in_array($temp_youtube_val[$sub]['ytube_id'],$cur_main_youtube_id) )
                        {
                           $ins_qry =  " INSERT INTO ".$CFG['table']['youtube_video']." SET ".
                                        " ytube_id              = '".$this->filterInput($temp_youtube_val[$sub]['ytube_id'])."',  ".
                                        " page_id               = '".$this->filterInput($temp_youtube_val[$sub]['page_id'])."', ".
                                        " page_list_id          = '".$this->filterInput($temp_youtube_val[$sub]['page_list_id'])."', ".
                                        " domain_id             = '".$this->filterInput($temp_youtube_val[$sub]['domain_id'])."',".
                                        " youtube_url           = '".$this->filterInput($temp_youtube_val[$sub]['youtube_url'])."',".
                                        " youtube_spacing       = '".$this->filterInput($temp_youtube_val[$sub]['youtube_spacing'])."',".
                                        " youtube_width         = '".$this->filterInput($temp_youtube_val[$sub]['youtube_width'])."',".
                                        " added_date            = '".$this->filterInput($temp_youtube_val[$sub]['added_date'])."' ";                      
                            $res = $this->ExecuteQuery($ins_qry,'insert'); 
                            
                            $temp_upd_id = $temp_youtube_val[$sub]['ytube_id'].",";   
                        }    
                       else if(in_array($temp_youtube_val[$sub]['ytube_id'],$cur_main_youtube_id) && $temp_youtube_val[$sub]['publish_status'] == 'U')   
                        {
                            $upd_qry =  " UPDATE ".$CFG['table']['youtube_video']." SET ".                                        
                                        " youtube_url           = '".$this->filterInput($temp_youtube_val[$sub]['youtube_url'])."',".
                                        " youtube_spacing       = '".$this->filterInput($temp_youtube_val[$sub]['youtube_spacing'])."',".
                                        " youtube_width         = '".$this->filterInput($temp_youtube_val[$sub]['youtube_width'])."',".
                                        " added_date            = '".$this->filterInput($temp_youtube_val[$sub]['added_date'])."' ".
                                        " WHERE  ytube_id       = '".$this->filterInput($temp_youtube_val[$sub]['ytube_id'])."' AND  ".
                                        " page_id               = '".$this->filterInput($temp_youtube_val[$sub]['page_id'])."' AND ".
                                        " page_list_id          = '".$this->filterInput($temp_youtube_val[$sub]['page_list_id'])."' AND  ".
                                        " domain_id             = '".$this->filterInput($temp_youtube_val[$sub]['domain_id'])."' ";  
                            $res = $this->ExecuteQuery($upd_qry,'update'); 
                            
                            $temp_upd_id = $temp_youtube_val[$sub]['ytube_id'].",";
                        }
                    } 
            }  
            
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_youtube_video'],"publish_status = 'N'","ytube_id IN ('".$this->filterInput($temp_upd_id)."')");
                }
    } 
  #get categories
  /**
   * Common::get_Categories()
   * 
   * @return
   */
  function get_Categories($domain_id,$tablename)
    {
        global $CFG;
        $sel_qry = "SELECT cat_id, domain_id, cat_name, added_date, publish_status FROM ".$tablename." WHERE domain_id='".$this->filterInput($domain_id)."' ";
        $res = $this->ExecuteQuery($sel_qry,'select');
        
        return $res;  
        
    }   
    
#category publish process
/**
 * Common::categoryPublishProcess()
 * 
 * @return
 */
function categoryPublishProcess($domain_id)
    {
        global $CFG;
        $temp_category_val    = $this->get_Categories($domain_id,$CFG['table']['temp_category'] );
        $main_category_val    = $this->get_Categories($domain_id,$CFG['table']['category']);
        
        $temp_category_id = array();
        foreach($temp_category_val as $temp=>$value)
            {
                $temp_category_id[] = $temp_category_val[$temp]['cat_id'];
            }  
        $cur_main_category_id = array();    
        foreach($main_category_val as $main=>$value)
            {
                if( !in_array($main_category_val[$main]['cat_id'],$temp_category_id) )
                    {
                        $delet_id.= $main_category_val[$main]['cat_id'].","; 
                    }
                else if(in_array($main_category_val[$main]['cat_id'],$temp_category_id)) 
                    {
                        $cur_main_category_id[] = $main_category_val[$main]['cat_id'];
                    }          
            }                
        $delet_id = substr($delet_id,0,-1);    
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['category']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND cat_id IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }     
        $temp_upd_id = '';
        foreach($temp_category_val as $sub=>$value)
            {
               if($temp_category_val[$sub]['publish_status'] == 'U')
                    {
                      if( !in_array($temp_category_val[$sub]['cat_id'],$cur_main_category_id) )
                            {
                                
                                $insQuery  = "INSERT INTO ".$CFG['table']['category']." SET cat_id= '".$this->filterInput($temp_category_val[$sub]['cat_id'])."',domain_id ='".$this->filterInput($temp_category_val[$sub]['domain_id'])."', cat_name='".$this->filterInput($temp_category_val[$sub]['cat_name'])."',added_date='".$this->filterInput($temp_category_val[$sub]['added_date'])."'";
    			                $res	=	$this->ExecuteQuery($insQuery,'insert');
                                
                                $temp_upd_id = $temp_category_val[$sub]['cat_id'].",";   
                            }    
                       else if(in_array($temp_category_val[$sub]['cat_id'],$cur_main_category_id) ) 
                            {
                               
                                $updQuery  = "UPDATE ".$CFG['table']['category']." SET cat_name='".$this->filterInput($temp_category_val[$sub]['cat_name'])."',added_date='".$this->filterInput($temp_category_val[$sub]['added_date'])."' WHERE cat_id= '".$this->filterInput($temp_category_val[$sub]['cat_id'])."' AND domain_id ='".$this->filterInput($temp_category_val[$sub]['domain_id'])."'";
    			                $res	=	$this->ExecuteQuery($updQuery,'update'); 
                                
                                $temp_upd_id = $temp_category_val[$sub]['cat_id'].",";
                            }
                    } 
            }
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_category'],"publish_status = 'N'","cat_id IN ('".$this->filterInput($temp_upd_id)."')");
                }
        
    }   
#Delete pagelist
function deletePagelist($pageid)
    {
        global $CFG;
        //$pagelistids     = $objSite->GetMultiValue("page_list_id",$CFG['table']['temp_pagelist'],"page_id='".$pageid."'");
        $singleimages    = $this->GetMultiValue("image_name",$CFG['table']['temp_single_images'],"page_id='".$pageid."' AND publish_status='U'");
        $googleimages    = $this->GetMultiValue("google_image_name",$CFG['table']['temp_google_images'],"page_id='".$pageid."' AND publish_status='U'");
        $sliderimages    = $this->GetMultiValue("slider_images",$CFG['table']['temp_slider_images'],"page_id='".$pageid."' AND publish_status='U'");
        $imagetxt        = $this->GetMultiValue("image_name",$CFG['table']['temp_imagetxt_images'],"page_id='".$pageid."' AND publish_status='U'");
        $galleryimages   = $this->GetMultiValue("gallery_name",$CFG['table']['temp_gallery_images'],"page_id='".$pageid."' AND publish_status='U'");
        
        if(!empty($singleimages))
        {
            $this->delete_images_pages($CFG['site']['photo_domain_image_path'],$singleimages,"image_name");
        }
        if(!empty($googleimages))
        {
            $this->delete_images_pages($CFG['site']['photo_google_image_path'],$googleimages,"google_image_name",true);
        }
        if(!empty($sliderimages))
        {
            $this->delete_images_pages($CFG['site']['photo_domain_image_path'],$sliderimages,"slider_images");
        }
        if(!empty($imagetxt))
        {
            $this->delete_images_pages($CFG['site']['photo_domain_image_path'],$imagetxt,"image_name");
        }
        if(!empty($galleryimages))
        {
            $this->delete_images_pages($CFG['site']['photo_domain_image_path'],$galleryimages,"gallery_name",true);
        }
        $delqry     = "DELETE FROM ".$CFG['table']['temp_pagelist']." WHERE page_id='".$pageid."'";
        $this->ExecuteQuery($delqry,"delete");
                             
    }
#delete images when delete a pages.
function delete_images_pages($path,$imgary,$fieldimg,$isThumb=false)
    {
        global $CFG;
        foreach($imgary as $key=>$value)
        {
            
            if($isThumb)
            {
                $delthumb=$path."/".str_replace(".jpg","T.jpg",$value[$fieldimg]);
                unlink($delthumb);
            }
            $delimg=$path."/".$value[$fieldimg];
            unlink($delimg);
        }    
        
    } 
/**
 * Common::chkAlreadyRefered()
 * 
 * @param mixed $email
 * @return
 */
function chkAlreadyRefered($email)
	{
	  	global $CFG,$objSmarty;
		$sqlsel = "SELECT referemail  FROM ".$CFG['table']['referrals']. " WHERE  referemail='".$this->filterInput($email)."' AND user_id='".$_SESSION['user_id']."'";
		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		//print_r($sqlres[0]['email']);die();
		return $sqlres[0]['referemail'];
	}
    
#get Thumbnail width and height
function getThumbnailWidthHeight($file,$persentage)
    {
        $imag=array();
        $ary=(getimagesize($file));
        $imag['width']= ceil($ary[0]/100)*$persentage;
        $imag['height']=ceil(($ary[1]/100)*$persentage);
        
        return $imag;
    }
function updateImageAlign()
{
    global $CFG,$objSmarty;
    $uptqry = "UPDATE ".$CFG['table']['temp_pagelist']." SET single_img_alignment='".$_POST['alignment']."',publish_status='U' WHERE pagelist='".$_POST['pagelist']."'";
    
     $this->ExecuteQuery($uptqry,'update');
}          
#Get pagelist for Column count update
function getPagelist_ColumnCount($pagelist)
{
    
				global $CFG,$objSmarty;
                $sqlsel = "SELECT * FROM ".$CFG['table']['temp_pagelist']. " WHERE pagelist = '".$this->filterInput($pagelist)."'  order by sort_order asc";
				$sqlres =  $this->ExecuteQuery($sqlsel,'select');
				$objSmarty->assign("pagefirstlist", $sqlres);
			
}
#Add Default page lists
/*function defaultpageList($domain_id,$page_id,$theme_id)
{
    global $CFG;
    $themename      = $this->getThemeNameForActive($theme_id);
    $defaultimg1    = $CFG['site']['photo_theme_path'].'/'.$themename.'/'.$themename.'column1.jpg';
    $defaultimg2    = $CFG['site']['photo_theme_path'].'/'.$themename.'/'.$themename.'column2.jpg';
    $defaultimg3    = $CFG['site']['photo_theme_path'].'/'.$themename.'/'.$themename.'column3.jpg';
    if($domain_id != '' && $page_id != '' && (file_exists($defaultimg1) && file_exists($defaultimg2) && file_exists($defaultimg3)))
        {
           $UpQuery  = "INSERT INTO ".$CFG['table']['temp_pagelist']." SET  page_id = '".$this->filterInput($page_id)."',domain_id = '".$this->filterInput($domain_id)."',publish_status = 'U',column_show='1',column_count='4' ";
           $UpResult1	=	$this->ExecuteQuery($UpQuery,'insert');
           $LastInsertedRow = mysql_insert_id();
           $this->copy_theme_image($themename,$domain_id,$page_id,$LastInsertedRow,1);
           $this->copy_theme_image($themename,$domain_id,$page_id,$LastInsertedRow,2);
           $this->copy_theme_image($themename,$domain_id,$page_id,$LastInsertedRow,3);		  
          
        }
} */  
#Copy default them iamge   
function copy_theme_image($themename,$domain_id,$page_id,$colpagelist,$colid)
{      
       global $CFG;
       $UpQuery  = "INSERT INTO ".$CFG['table']['temp_pagelist']." SET  page_id = '".$this->filterInput($page_id)."',domain_id = '".$this->filterInput($domain_id)."',publish_status = 'U',image_select='1',column_pagelist='".$colpagelist."',column_id='".$colid."'";
       $pagelist	=	$this->ExecuteQuery($UpQuery,'insert');
       
       $themeimage  =  $CFG['site']['photo_theme_path'].'/'.$themename.'/'.$themename.'column'.$colid.'.jpg';          
       $newthemeimage   =   $CFG['site']['photo_domain_image_path'].'/'.$themename.'column'.$colid.$domain_id.$pagelist.'.jpg';
       $filename   = $themename.'column'.$colid.$domain_id.$pagelist.'.jpg';
       copy($themeimage,$newthemeimage);       
       $imginr  = "INSERT INTO ".$CFG['table']['temp_single_images']."(domain_id,page_id,page_list_id,image_name,status,publish_status) VALUES('".$domain_id."','".$page_id."','".$pagelist."','".$filename."','".$status."','U')";                  
       $this->ExecuteQuery($imginr,'insert');    
}
#.............................................................................................
#check the domain password process
function checkDomainPassword()
    {
        global $CFG;
        
        $domain_pwd_check = $this->getCountValue($CFG['table']['domaindetails'],"sd_password = '".$this->filterInput($_POST['domain_password'])."' AND domain_id = '".$this->filterInput($_POST['domainid'])."' ");
        
        if($domain_pwd_check >0){
            $_SESSION['domain_session'] = $_POST['domainid'];
            echo 'suc';exit;
         }else{
            echo 'fail';exit;
         }           
    }
#.............................................................................................
#nestpay payment merchant values
function nestpayMerchantValues($domain_id)
    {
        global $CFG,$objSmarty;
        
        $nestpay_merchant = array();
        
        if($CFG['payment']['nestpay']['Pay_mode'] == 'L')
            {
                $nestpay_merchant["business_url"] = "https://www.sanalakpos.com/servlet/est3Dgate";
                $nestpay_merchant["clientId"]     = $CFG['payment']['nestpay']['live_clientId'];
                $nestpay_merchant["storekey"]     = $CFG['payment']['nestpay']['live_storeId'];
            }	
        else 
            {
                $nestpay_merchant["business_url"] = "https://entegrasyon.asseco-see.com.tr/fim/est3Dgate";
                $nestpay_merchant["clientId"]     = $CFG['payment']['nestpay']['test_clientId'];
                $nestpay_merchant["storekey"]     = $CFG['payment']['nestpay']['test_storeId'];
            }   
        
        if(USER_FRINDLY == 'Y'){    				
            $nestpay_merchant["okUrl"]   = "https://www.enkolayweb.com/buycredits/".$domain_id;
            $nestpay_merchant["failUrl"] = "https://www.enkolayweb.com/buycredits/".$domain_id;
		}else{    				
            $nestpay_merchant["okUrl"]   = "https://www.enkolayweb.com/buyCredits.php?domain_id=".$domain_id;	
            $nestpay_merchant["failUrl"] = "https://www.enkolayweb.com/buyCredits.php?domain_id=".$domain_id;		
		}        
        
        $pck_details    = $this->getMultiValue("price_id, price_name, price",$CFG['table']['pricemanage'],"price_id IS NOT NULL LIMIT 1");        
		$amount	        = $pck_details[0]['price'];
            
        $nestpay_merchant["amount"]    = $amount;
        $nestpay_merchant["oid"]       = "EK".time();
        $nestpay_merchant["rnd"]       = microtime();     
        $nestpay_merchant["storetype"] = "3d";
        $nestpay_merchant["transtype"] = "Auth";
        $nestpay_merchant["hashstr"]   = $nestpay_merchant["clientId"].$nestpay_merchant["oid"].$nestpay_merchant["amount"].$nestpay_merchant["okUrl"].$nestpay_merchant["failUrl"].$nestpay_merchant["transtype"].$nestpay_merchant["rnd"].$nestpay_merchant["storekey"];
        $nestpay_merchant["hash1"]      = base64_encode(pack('H*',sha1($nestpay_merchant["hashstr"])));
        $nestpay_merchant["description"] = "";
        $nestpay_merchant["xid"]         = "";
        $nestpay_merchant["email"]       = "";
        $nestpay_merchant["userid"]      = "";
        
        $objSmarty->assign("nestpay_merchant", $nestpay_merchant);
    }
#....................................................................................  
#nestpayment process
function nestPaymentProcess()
    {
        global $CFG;
        $hashparams    = $_POST["HASHPARAMS"];
    	$hashparamsval = $_POST["HASHPARAMSVAL"];
    	$hashparam     = $_POST["HASH"];
    	$paramsval     = "";
    	$index1=0;
    	$index2=0;  
    		
    	while($index1 < strlen($hashparams))
    	{
    		$index2 = strpos($hashparams,":",$index1);
    		$vl = $_POST[substr($hashparams,$index1,$index2- $index1)];
    		if($vl == null)
    		$vl = "";
    		$paramsval = $paramsval . $vl;
    		$index1 = $index2 + 1;
    	}
        if($CFG['payment']['nestpay']['Pay_mode'] == 'L')
            {
                $nestpay_merchant['business_url'] = "https://www.sanalakpos.com/servlet/est3Dgate";
                $name         = $CFG['payment']['nestpay']['live_username'];
                $password     = $CFG['payment']['nestpay']['live_password'];
                $apiurl       = "https://www.sanalakpos.com/servlet/cc5ApiServer";
                $storekey     = $CFG['payment']['nestpay']['live_storeId'];
            }	
        else 
            {
                $nestpay_merchant['business_url'] = "https://entegrasyon.asseco-see.com.tr/fim/est3Dgate";
                $name         = $CFG['payment']['nestpay']['test_username'];
                $password     = $CFG['payment']['nestpay']['test_password'];
                $apiurl       = "https://entegrasyon.asseco-see.com.tr/fim/api";
                $storekey     = $CFG['payment']['nestpay']['test_storeId'];
            }              
        
    	$hashval = $paramsval.$storekey;
    	
    	$hash = base64_encode(pack('H*',sha1($hashval))); // Hash value
    	
    	if($paramsval != $hashparamsval || $hashparam != $hash)
            {
                //echo "<h4>Security Warning. Digital Signature is NOT Valid !</h4>";
                $seourl="/subscription/".$_GET['domain_id']."/failure";
        		$filename="/subscription.php?domain_id=".$_GET['domain_id']."&msg=failure";
        		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
            	$url= $CFG['site']['base_url'].$redirect_url;
        		$this->redirectUrl($url);
            }
                    
    	//$name     = "AKTESTAPI";       		// Merchant API username
    	//$password = "AKBANK01";    		// API user's password
    	$clientid = $_POST["clientid"];   // Merchant id
    
    	$mode = "P";                    // default P
    	$type="Auth";   				// Transaction type
    		
    	$expires = $_POST["Ecom_Payment_Card_ExpDate_Month"]."/".$_POST["Ecom_Payment_Card_ExpDate_Year"];
    	$cv2     = $_POST['cv2'];					
    	$tutar   = $_POST["amount"];			
    	$taksit  = "";							
    	$oid     = $_POST['oid'];				
    	$lip     = GetHostByName($REMOTE_ADDR);	
    	$email   = "";							
    										
    	$mdStatus= $_POST['mdStatus'];   	
    	$xid     = $_POST['xid'];                 
    	$eci     = $_POST['eci'];                
    	$cavv    = $_POST['cavv'];               
    	$md      = $_POST['md'];  
        
        if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
        	{ 	      
        		// XML request template
        		$request= "DATA=<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>".
        		"<CC5Request>".
        		"<Name>{NAME}</Name>".
        		"<Password>{PASSWORD}</Password>".
        		"<ClientId>{CLIENTID}</ClientId>".
        		"<IPAddress>{IP}</IPAddress>".
        		"<Email>{EMAIL}</Email>".
        		"<Mode>P</Mode>".
        		"<OrderId>{OID}</OrderId>".
        		"<GroupId></GroupId>".
        		"<TransId></TransId>".
        		"<UserId></UserId>".
        		"<Type>{TYPE}</Type>".
        		"<Number>{MD}</Number>".
        		"<Expires></Expires>".
        		"<Cvv2Val></Cvv2Val>".
        		"<Total>{TUTAR}</Total>".
        		"<Currency>949</Currency>".
        		"<Taksit>{TAKSIT}</Taksit>".
        		"<PayerTxnId>{XID}</PayerTxnId>".
        		"<PayerSecurityLevel>{ECI}</PayerSecurityLevel>".
        		"<PayerAuthenticationCode>{CAVV}</PayerAuthenticationCode>".
        		"<CardholderPresentCode>13</CardholderPresentCode>".
        		"<BillTo>".
        		"<Name></Name>".
        		"<Street1></Street1>".
        		"<Street2></Street2>".
        		"<Street3></Street3>".
        		"<City></City>".
        		"<StateProv></StateProv>".
        		"<PostalCode></PostalCode>".
        		"<Country></Country>".
        		"<Company></Company>".
        		"<TelVoice></TelVoice>".
        		"</BillTo>".
        		"<ShipTo>".
        		"<Name></Name>".
        		"<Street1></Street1>".
        		"<Street2></Street2>".
        		"<Street3></Street3>".
        		"<City></City>".
        		"<StateProv></StateProv>".
        		"<PostalCode></PostalCode>".
        		"<Country></Country>".
        		"</ShipTo>".
        		"<Extra></Extra>".
        		"</CC5Request>";
        	
        	
        		$request=str_replace("{NAME}",$name,$request);	
        		$request=str_replace("{PASSWORD}",$password,$request);
        		$request=str_replace("{CLIENTID}",$clientid,$request);
        		$request=str_replace("{IP}",$lip,$request);
        		$request=str_replace("{OID}",$oid,$request);
        		$request=str_replace("{TYPE}",$type,$request);
        		$request=str_replace("{XID}",$xid,$request);
        		$request=str_replace("{ECI}",$eci,$request);
        		$request=str_replace("{CAVV}",$cavv,$request);
        		$request=str_replace("{MD}",$md,$request);
        		$request=str_replace("{TUTAR}",$tutar,$request);
        		$request=str_replace("{TAKSIT}",$taksit,$request); 
        
        		// URL below is payment gateway's adress ( API Server), it is NOT 3D Gateway.		
        		//$apiurl = "https://entegrasyon.asseco-see.com.tr/fim/api";
        		// initialize curl handle		
        		$ch = curl_init();    
        		
        		curl_setopt($ch, CURLOPT_URL,$apiurl); 		// set url to post to
        		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
        		curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
        		curl_setopt($ch, CURLOPT_TIMEOUT, 90); 		// times out after 90s
        		curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($request)); // add POST fields
        				
        		$result = curl_exec($ch); // run the whole process
        		
        		if (curl_errno($ch)) 
        		{
        			print curl_error($ch);
        		} else 
        		{
        			curl_close($ch);
        		}
        	
        		$Response ="";
        		$OrderId ="";
        		$AuthCode  ="";
        		$ProcReturnCode    ="";
        		$ErrMsg  ="";
        		$HOSTMSG  ="";
        		$HostRefNum = "";
        		$TransId="";
        	
        		$response_tag="Response";
        		$posf = strpos (  $result, ("<" . $response_tag . ">") );
        		$posl = strpos (  $result, ("</" . $response_tag . ">") ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$Response = substr (  $result, $posf, $posl - $posf) ;
        	
        		$response_tag="OrderId";
        		$posf = strpos (  $result, ("<" . $response_tag . ">") );
        		$posl = strpos (  $result, ("</" . $response_tag . ">") ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$OrderId = substr (  $result, $posf , $posl - $posf   ) ;
        
        		$response_tag="AuthCode";
        		$posf = strpos (  $result, "<" . $response_tag . ">" );
        		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$AuthCode = substr (  $result, $posf , $posl - $posf   ) ;
        		
        		$response_tag="ProcReturnCode";
        		$posf = strpos (  $result, "<" . $response_tag . ">" );
        		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$ProcReturnCode = substr (  $result, $posf , $posl - $posf   ) ;
        
        		$response_tag="ErrMsg";
        		$posf = strpos (  $result, "<" . $response_tag . ">" );
        		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$ErrMsg = substr (  $result, $posf , $posl - $posf   ) ;
        		
        		
        		$response_tag="HostRefNum";
        		$posf = strpos (  $result, "<" . $response_tag . ">" );
        		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$HostRefNum = substr (  $result, $posf , $posl - $posf   ) ;
        		
        		
        		$response_tag="TransId";
        		$posf = strpos (  $result, "<" . $response_tag . ">" );
        		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
        		$posf = $posf+ strlen($response_tag) +2 ;
        		$TransId = substr (  $result, $posf , $posl - $posf   ) ;  

                
                if ( $Response === "Approved")
        		{
        			#echo "Payment is Successful.";
                    $postarrvalues['transaction_id'] = $TransId;
					$postarrvalues['pay_amount']     = $_POST['amount'];
					$postarrvalues['pay_status']     = "completed";
					$user_id                         = $_SESSION['user_id'];
                    $this->logTransactions($user_id,$_REQUEST['domain_id'],$postarrvalues,"nestpay");
                    #$this->updateSubscriptionRequest();
                    $this->updateSubscriptionDate($_REQUEST['domain_id'],$TransId);
                    #$this->updateSubscriptionDateToPaypalTable($_SESSION['domain_id']);
                    
                    $theme_id = $this->getValue('theme_id',$CFG['table']['domaindetails'],'domain_id = "'.$this->filterInput($_REQUEST['domain_id']).'"');
	                $blog_id = $this->getValue('blog_id',$CFG['table']['domaindetails'],'domain_id = "'.$this->filterInput($_REQUEST['domain_id']).'"');
	                $store_id = $this->getValue('store_id',$CFG['table']['domaindetails'],'domain_id = "'.$this->filterInput($_REQUEST['domain_id']).'"');
	                if($theme_id != 0)
	                	{
							unset($_SESSION['blogonuse']);
							unset($_SESSION['storeonuse']);
							unset($_SESSION['store_id']);
							$_SESSION['themeOnuse'] = 1; 
							$_SESSION['theme_id'] = $theme_id;
							$themename = $this->getValue('theme_name',$CFG['table']['themeselection'],"domain_id='".$this->filterInput($_REQUEST['domain_id'])."'");
							$_SESSION['themename'] = strtolower($themename);
						}
					if($blog_id != 0)
						{
							unset($_SESSION['themeOnuse']);
							unset($_SESSION['storeonuse']);
							unset($_SESSION['store_id']);
							$_SESSION['blogonuse'] = 1; 
							$_SESSION['blog_id'] = $blog_id;
							$themename = $this->getValue('blog_name',$CFG['table']['blogselection'],"domain_id='".$this->filterInput($_REQUEST['domain_id'])."'");
							$_SESSION['themename'] = strtolower($themename);
						}
					if($store_id != 0)
						{
							unset($_SESSION['themeOnuse']);
							unset($_SESSION['blogonuse']);
							$_SESSION['storeonuse'] = 1; 
							$_SESSION['store_id'] = $store_id;
							$themename = $this->getValue('store_name',$CFG['table']['storeselection'],"domain_id='".$this->filterInput($_REQUEST['domain_id'])."'");
							$_SESSION['themename'] = strtolower($themename);
						}
					#$seourl="/subscription/".$_GET['domain_id']."/sucess";
            		#$filename="/subscription.php?domain_id=".$_GET['domain_id']."&msg=sucess";
                    $seourl="/myhome/".$_GET['domain_id']."/sucess";
	             	$filename="/MyHome.php?domain_id=".$_GET['domain_id']."&msg=sucess";
            		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
                    $url= $CFG['site']['base_url'].$redirect_url;
                	$this->redirectUrl($url);
        		}
        		else
        		{	
        		    $postarrvalues['transaction_id'] = $TransId;
					$postarrvalues['pay_amount']     = $_POST['amount'];
					$postarrvalues['pay_status']     = "uncompleted";
					$user_id                         = $_SESSION['user_id'];            			
					$this->logTransactions($user_id,$_SESSION['domain_id'],$postarrvalues,'Subscription Pending Payment');
					$seourl="/subscription/".$_GET['domain_id']."/failure";
            		$filename="/subscription.php?domain_id=".$_GET['domain_id']."&msg=failure";
            		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
                	$url= $CFG['site']['base_url'].$redirect_url;
            		$this->redirectUrl($url);	
        		}
        	} // end of mdStatus control.
    	else
        	{
        		$seourl="/subscription/".$_GET['domain_id']."/failure";
        		$filename="/subscription.php?domain_id=".$_GET['domain_id']."&msg=failure";
        		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
            	$url= $CFG['site']['base_url'].$redirect_url;
        		$this->redirectUrl($url);
        	}       
    } 
    #.................................................................................................
    function monlyPlanUpgradePaypalProcess()
        {
            global $CFG;    
            $amount = '';
                        
            $pck_details    = $this->getMultiValue("price_id, price_name, price",$CFG['table']['pricemanage'],"price_id IS NOT NULL LIMIT 1");        
			$amount	        = $pck_details[0]['price'];						
       		
       		if(USER_FRINDLY == 'Y'){
				$cancelUrl= $CFG['site']['base_url']."/subscription/".$_REQUEST['domain_id']."/failure";
                $goBackUrl = $CFG['site']['base_url']."/buy_credits/".$_REQUEST['domain_id']."/sucess";
			}else{
				$cancelUrl = $CFG['site']['base_url']."/subscription.php?domain_id=".$_REQUEST['domain_id']."&action=failure";
                $goBackUrl = $CFG['site']['base_url']."/buyCredits.php?domain_id=".$_REQUEST['domain_id']."&action=sucess";	
			}
			$item_name = $pck_details[0]['price_name'];        		
            
           if($amount > 0)
               {                                   
                   if($CFG['payment']['paypal']['test_mode']  == "1")           			                              
            			$server   = $CFG['payment']['paypal']['test_url']; 
            	   else          			
            			$server   = $CFG['payment']['paypal']['url'];
                   
                   $business      = $CFG['payment']['paypal']['merchant_email'];     
            	          
                   echo '<form name= "paypal" action="'.$server.'" method="post" id="paypal_form">';
                   echo '<input type=hidden name=amount value="'.$amount.'" />';
                   echo '<input type=hidden name=business value="'.$business.'" />
                             <input type=hidden name=cmd value="_xclick" />
                             <input type=hidden name=currency_code value="TRY" />
                             <input type=hidden name=item_name value="'.$item_name.'" />
                             <input type=hidden name=quantity value="1" />
                             <input type=hidden name=payer_email value="" />
                             <input type=hidden name=return value="'.$goBackUrl.'"/>
                             <input type=hidden name=cancel_return value="'.$cancelUrl.'"/>
                             <input type=hidden name=rm value="2" />
                             <input type="hidden" name="bn" value="Go to MyAccount Page" />
                             <input type="hidden" name="cbt" value="Return to The Site" />';
                    echo '</form>';
                   echo "<style>
        		   
        					#paymentLoadWindow{display:none;position:fixed;top:0; bottom: 0;left:0; right:0;background:#fff; width:100%;}
        					.paymentLoad{position:fixed;z-index:1100;padding:100px 20px 20px;}
        					.payLoader{font:bold 30px/45px Arial; text-align:center; padding-top:20px; margin-bottom:30px;}
        					.loadingtxt{font:25px/35px Arial; text-align:center; margin-bottom:50px;}
        					.paymentMsgs{ text-align:center; margin-bottom:2px !important; font-weight:bold !important;}
        					.contain { display: inline-block; width: 100%;}
        					.text-center { text-align: center;}
        			   </style>
        			   <div id='paymentLoadWindow' class='paymentLoad'  style='display: block;'>
        				<div class='contain'>
        					<div class='payLoader'>
        						Please don''t use refresh or back button!						
        						<div class='loadingtxt'>Loading...</div>
        					</div>
        					<div class='contain text-center'>
        						<img src='images/ajax-loader.gif' alt='loader' title='loader' />	
        					</div>
        				</div>	
        			</div>
        		   "
                   ?>
                   <script>
                           document.paypal.submit();
                   </script>
                   <?php 
             }  
        }
        
     #Image Library

function ImageLibrary()
{
      global $CFG,$objSmarty;
      $user_id=$_SESSION['user_id'];
      $domainid=$this->getMultiValue('domain_id',$CFG['table']['temp_domaindetails'] ,"user_id='".$user_id."'");
      $domainid_list;
      foreach($domainid as $key=>$value)
      {
            $domainid_list.=",".$value['domain_id'];
      }
      $domainid_list=substr($domainid_list,1);
     if($domainid_list!="")
     {
          $imagelist0   = $this->getMultiValue("gallery_name AS image_name,gallery_id AS img_id, 'gallery' AS type",$CFG['table']['temp_gallery_images']," domain_id IN($domainid_list)");
          $imagelist1   = $this->getMultiValue("image_name, banner_slider_id AS img_id,'bannerslider' AS type",$CFG['table']['temp_banner_slider_images']," domain_id IN($domainid_list)");
          $imagelist2   = $this->getMultiValue("image_name,img_id,'single' AS type",$CFG['table']['temp_single_images']," domain_id IN($domainid_list)");
          $imagelist3   = $this->getMultiValue("image_name,img_id,'imagetext' AS type",$CFG['table']['temp_imagetxt_images']," domain_id IN($domainid_list)");
          $imagelist4   = $this->getMultiValue("temp_image_name AS image_name,img_id,'domainimages' AS type",$CFG['table']['domain_images']," domain_id IN($domainid_list)");
          $imagelist5   = $this->getMultiValue("slider_images AS image_name,slider_id AS img_id,'slider' AS type",$CFG['table']['temp_slider_images']," domain_id IN($domainid_list)");
          //$imagelist6   = $this->getMultiValue("google_image_name AS image_name,'Y' AS isGoogle",$CFG['table']['temp_google_images']," domain_id IN($domainid_list)");
          $imagelists=array();
          if(is_array($imagelist0))
            {
                $imagelists=array_merge($imagelists,$imagelist0);                
            }
          if(is_array($imagelist1))
            {
                $imagelists=array_merge($imagelists,$imagelist1);
            }
          if(is_array($imagelist2))
            {
                $imagelists=array_merge($imagelists,$imagelist2);
            }
          if(is_array($imagelist3))
            {
                $imagelists=array_merge($imagelists,$imagelist3);
            }
          if(is_array($imagelist4))
            {
                $imagelists=array_merge($imagelists,$imagelist4);
            }
          if(is_array($imagelist5))
            {   
                $imagelists=array_merge($imagelists,$imagelist5);
            }
          if(is_array($imagelist6))
            {
                $imagelists=array_merge($imagelists,$imagelist6);
            }   
        $objSmarty->assign('imageslist',$imagelists);
     }
     
      
      
}
#Delete image from image library
function deleteImage_Library()
{
    global $CFG,$objSmarty;
    
    if($_POST['type']=='single')
        {
            $table=$CFG['table']['temp_single_images'];
            $tablesub=$CFG['table']['single_images'];
            $img_id = $_POST['imgid'];
            $alreadimage     = $this->getMultiValue('image_name',$table," img_id='".$this->filterInput($img_id)."' ");
            $alreadimagesub     = $this->getMultiValue('image_name',$tablesub," img_id='".$this->filterInput($img_id)."' ");             
            
            if($alreadimage[0]['image_name']!=$alreadimagesub[0]['image_name'])
            {
                unlink($CFG['site']['photo_domain_image_path']."/".$alreadimage[0]['image_name']); 
            }                
            mysql_query("DELETE FROM ".$table." WHERE img_id='".$this->filterInput($img_id)."'"); 
        }
    if($_POST['type']=='imagetext')
        {
            $table=$CFG['table']['temp_imagetxt_images'];
            $tablesub=$CFG['table']['imagetxt_images'];
            $img_id = $_POST['imgid'];
            $alreadimage     = $this->getMultiValue('image_name',$table," img_id='".$this->filterInput($img_id)."' ");
            $alreadimagesub     = $this->getMultiValue('image_name',$tablesub," img_id='".$this->filterInput($img_id)."' ");             
            
            if($alreadimage[0]['image_name']!=$alreadimagesub[0]['image_name'])
            {
                unlink($CFG['site']['photo_domain_image_path']."/".$alreadimage[0]['image_name']); 
            }                
            mysql_query("DELETE FROM ".$table." WHERE img_id='".$this->filterInput($img_id)."'"); 
        }
        if($_POST['type']=='slider')
        {
            $table=$CFG['table']['temp_slider_images'];
            $tablesub=$CFG['table']['slider_images'];
            $img_id = $_POST['imgid'];
            $alreadimage     = $this->getMultiValue('slider_images',$table," slider_id='".$this->filterInput($img_id)."' ");
            $alreadimagesub     = $this->getMultiValue('slider_images',$tablesub," slider_id='".$this->filterInput($img_id)."' ");             
            
            if($alreadimage[0]['slider_images']!=$alreadimagesub[0]['slider_images'])
            {
                unlink($CFG['site']['photo_domain_image_path']."/".$alreadimage[0]['slider_images']); 
            }                
            mysql_query("DELETE FROM ".$table." WHERE slider_id='".$this->filterInput($img_id)."'"); 
        }
        if($_POST['type']=='gallery')
        {
            $table=$CFG['table']['temp_gallery_images'];
            $tablesub=$CFG['table']['gallery_images'];
            $img_id = $_POST['imgid'];
            $alreadimage     = $this->getMultiValue('gallery_name,gallery_name_thumb',$table," gallery_id='".$this->filterInput($img_id)."' ");
            $alreadimagesub     = $this->getMultiValue('gallery_name',$tablesub," gallery_id='".$this->filterInput($img_id)."' ");             
            if($alreadimage[0]['gallery_name']!=$alreadimagesub[0]['gallery_name'])
            {
                unlink($CFG['site']['photo_domain_image_path']."/".$alreadimage[0]['gallery_name']);
                unlink($CFG['site']['photo_domain_image_path']."/".$alreadimage[0]['gallery_name_thumb']);  
            }                
            mysql_query("DELETE FROM ".$table." WHERE gallery_id='".$this->filterInput($img_id)."'");           
        }
        if($_POST['type']=='bannerslider')
            {
                $table=$CFG['table']['temp_banner_slider_images'];
                $tablesub=$CFG['table']['banner_slider_images'];
                $img_id = $_POST['imgid'];
                $alreadimage     = $this->getMultiValue('image_name',$table," banner_slider_id='".$this->filterInput($img_id)."' ");
                $alreadimagesub     = $this->getMultiValue('image_name',$tablesub," banner_slider_id='".$this->filterInput($img_id)."' ");             
                if($alreadimage[0]['image_name']!=$alreadimagesub[0]['image_name'])
                {
                    unlink($CFG['site']['photo_domain_image_path']."/".$alreadimage[0]['image_name']); 
                }                
                mysql_query("DELETE FROM ".$table." WHERE banner_slider_id='".$this->filterInput($img_id)."'");
                $numval = $this->getNumvalues($table," domain_id='".$_SESSION['domain_id']."' ");
                if($numval==0)
                mysql_query("UPDATE hi_temp_domaindetails SET header_banner = '1',header_slider = '0',publish_status='U' WHERE domain_id='".$_SESSION['domain_id']."'");     
            }
          if($_POST['type']=='domainimages')
            {
                $table=$CFG['table']['domain_images'];
                //$tablesub=$CFG['table']['banner_slider_images'];
                $img_id = $_POST['imgid'];
                $curimage     = $this->getValue('temp_image_name',$table," img_id='".$this->filterInput($img_id)."' ");
                $imagestatus    = $this->getValue('status',$table," img_id='".$this->filterInput($img_id)."' ");
                $alreadimageary  = $this->getMultiValue('image_name',$table," img_id='".$this->filterInput($img_id)."' ");
                if(!empty($alreadimageary)){
                    foreach($alreadimageary as $key=>$value)
                    {
                        $alreadimages[]=$value['image_name'];
                    }                
                 }
               if($imagestatus  == 'domainlogo')
               {
                    mysql_query("UPDATE hi_temp_domaindetails SET header_logo_config = '1',publish_status='U' WHERE domain_id='".$_SESSION['domain_id']."'");     
               }             
                if(!in_array($curimage,$alreadimages))
                {
                    unlink($CFG['site']['photo_domain_image_path']."/".$curimage); 
                }
                                                  
                mysql_query("UPDATE ".$table." SET temp_image_name='' WHERE img_id='".$this->filterInput($img_id)."'");
                mysql_query("DELETE FROM ".$table." WHERE temp_image_name='' AND image_name='' AND domain_id='".$_SESSION['domain_id']."'");
                
            }         
    
}   
 function getContactFormFieldsValue($domain_id,$tablename)
    {
        global $CFG;
        $qry_det = " SELECT field_id, page_list_id, domain_id, field_label_name, field_post_name, field_type,  value, instruction,spacing,size, required, place_holder,spacing,size, instruction, publish_status, addeddate FROM ".$tablename." WHERE domain_id ='".$this->filterInput($domain_id)."'";
        $res = $this->ExecuteQuery($qry_det,'select');
        return $res;
    }
 #Function to publish contact form custome fields
    function customFieldsPublish_contactform($domain_id)
    {
        global $CFG;
        $temp_contform_val    = $this->getContactFormFieldsValue($domain_id,$CFG['table']['temp_contact_form_field']);
        $main_contform_val    = $this->getContactFormFieldsValue($domain_id,$CFG['table']['contact_form_field']);
        
        $temp_contform_id = array();
        foreach($temp_contform_val as $temp=>$value)
            {
                $temp_contform_id[] = $temp_contform_val[$temp]['field_id'];
            }  
        $cur_main_contform_id = array();    
        foreach($main_contform_val as $main=>$value)
            {
                if( !in_array($main_contform_val[$main]['field_id'],$temp_contform_id) )
                    {
                        $delet_id.= $main_contform_val[$main]['field_id'].","; 
                    }
               else if(in_array($main_contform_val[$main]['field_id'],$temp_contform_id)) 
                    {
                        $cur_main_contform_id[] = $main_contform_val[$main]['field_id'];
                    }       
            }     
            
        $delet_id = substr($delet_id,0,-1);    
        if($delet_id != '')
            {                
                $sql_delete="DELETE FROM ".$CFG['table']['contact_form_field']." WHERE domain_id = '".$this->filterInput($domain_id)."' AND field_id IN (".$delet_id.") ";
                $UpResult = mysql_query($sql_delete) or die($this->mysql_error($sql_delete));
            }     
            
        $temp_upd_id = '';
        foreach($temp_contform_val as $sub=>$value)
            {
                if($temp_contform_val[$sub]['publish_status'] == 'U')
                    {
                       if( !in_array($temp_contform_val[$sub]['field_id'],$cur_main_contform_id) )
                        {
                          $ins_qry =  " INSERT INTO ".$CFG['table']['contact_form_field']." SET ".
                                        " field_id                    = '".$this->filterInput($temp_contform_val[$sub]['field_id'])."',  ".
                                        " page_list_id               = '".$this->filterInput($temp_contform_val[$sub]['page_list_id'])."', ".
                                        " domain_id          = '".$this->filterInput($temp_contform_val[$sub]['domain_id'])."', ".                                         
                                        " field_label_name            = '".$this->filterInput($temp_contform_val[$sub]['field_label_name'])."',".
                                        " field_post_name                 = '".$this->filterInput($temp_contform_val[$sub]['field_post_name'])."',".
                                        " field_type		                = '".$this->filterInput($temp_contform_val[$sub]['field_type'])."',".
                                        " value	                = '".$this->filterInput($temp_contform_val[$sub]['value'])."',".
                                        " required                 = '".$this->filterInput($temp_contform_val[$sub]['required'])."',".
                                        " place_holder                 = '".$this->filterInput($temp_contform_val[$sub]['place_holder'])."',".
                                        " instruction                 = '".$this->filterInput($temp_contform_val[$sub]['instruction'])."',".
                                        " spacing                 = '".$this->filterInput($temp_contform_val[$sub]['spacing'])."',".
                                        " size                 = '".$this->filterInput($temp_contform_val[$sub]['size'])."',".
                                        " addeddate                 = '".$this->filterInput($temp_contform_val[$sub]['addeddate'])."' ";                      
                            $res = $this->ExecuteQuery($ins_qry,'insert'); 
                            $temp_upd_id = $temp_contform_val[$sub]['field_id'].",";
                        }
                     else if(in_array($temp_contform_val[$sub]['field_id'],$cur_main_contform_id) && $temp_contform_val[$sub]['publish_status'] == 'U')   
                        {
                            $upd_qry =  " UPDATE ".$CFG['table']['contact_form_field']." SET ".
                                        " field_id                    = '".$this->filterInput($temp_contform_val[$sub]['field_id'])."',  ".
                                        " page_list_id               = '".$this->filterInput($temp_contform_val[$sub]['page_list_id'])."', ".
                                        " domain_id          = '".$this->filterInput($temp_contform_val[$sub]['domain_id'])."', ".                                         
                                        " field_label_name            = '".$this->filterInput($temp_contform_val[$sub]['field_label_name'])."',".
                                        " field_post_name                 = '".$this->filterInput($temp_contform_val[$sub]['field_post_name'])."',".
                                        " field_type		                = '".$this->filterInput($temp_contform_val[$sub]['field_type'])."',".
                                        " value	                = '".$this->filterInput($temp_contform_val[$sub]['value'])."',".
                                        " required                 = '".$this->filterInput($temp_contform_val[$sub]['required'])."',".
                                        " place_holder                 = '".$this->filterInput($temp_contform_val[$sub]['place_holder'])."',".
                                        " instruction                 = '".$this->filterInput($temp_contform_val[$sub]['instruction'])."',".
                                        " spacing                 = '".$this->filterInput($temp_contform_val[$sub]['spacing'])."',".
                                        " size                 = '".$this->filterInput($temp_contform_val[$sub]['size'])."',".
                                        " addeddate                 = '".$this->filterInput($temp_contform_val[$sub]['addeddate'])."' ".
                              " WHERE    field_id                    = '".$this->filterInput($temp_contform_val[$sub]['field_id'])."' AND ".                                        
                                        " page_list_id          = '".$this->filterInput($temp_contform_val[$sub]['page_list_id'])."' AND ".
                                        " domain_id             = '".$this->filterInput($temp_contform_val[$sub]['domain_id'])."' ";                      
                            $res = $this->ExecuteQuery($upd_qry,'update'); 
                            
                            $temp_upd_id = $temp_contform_val[$sub]['field_id'].",";
                        }                                
                    } 
            }
            $temp_upd_id = substr($temp_upd_id,0,-1);
            if($temp_upd_id != '')
                {
                    $this->getUpdate($CFG['table']['temp_contact_form_field'],"publish_status = 'N'","field_id IN ('".$this->filterInput($temp_upd_id)."')");
                }
    }    
   #Split contact files
    function split_contact_files($files,$file_names,$istpl=false)
    {
          global $objSmarty;
          $tempfile_ary=explode(",",$files);
          foreach($tempfile_ary as $key=>$value)
          {
             $tmp   = explode(":",$value);
             $file_ary[$tmp[0]]=$tmp[1];
          } 
          
          $tempfilename_ary=explode(",",$file_names);
          foreach($tempfilename_ary as $key=>$value)
          {
             $tmp   = explode(":",$value);
             $filename_ary[$tmp[0]]=$tmp[1];
          }
          foreach($file_ary as $key=>$value)
          {
                $file_array[$key]=array($file_ary[$key],$filename_ary[$key]);
          }
          
          $objSmarty->assign("file_array",$file_array);
          if(!$istpl)
          return $file_array;
    }    
    #get contact form fields
    function getContactFormFields($domain_id,$pagelist)
    {
        global $CFG,$objSmarty;
        if(!empty($_POST['field_id']))
        {
            $cond=" AND field_id='".$_POST['field_id']."'";
        }
        $contactfields=$this->getMultivalue('field_id,page_list_id,domain_id,field_post_name,field_label_name,field_type,value,required,place_holder,instruction, spacing, size',$CFG['table']['temp_contact_form_field'],"domain_id='".$domain_id."' AND page_list_id='".$pagelist."' ".$cond." ORDER BY addeddate ASC");
        $objSmarty->assign('contactfields',$contactfields);   
            
    } 
   #get contact form fields
    function getContactFormFields_saubdomain($domain_id,$pagelist)
    {
        global $CFG,$objSmarty;
        
        $contactfields=$this->getMultivalue('field_id,page_list_id,domain_id,field_post_name,field_label_name,field_type,value,required,place_holder,instruction, spacing, size',$CFG['table']['contact_form_field'],"domain_id='".$domain_id."' AND page_list_id='".$pagelist."' ".$cond." ORDER BY addeddate ASC");
        
        $objSmarty->assign('contactfields',$contactfields);   
        
    }
   #add new contact form fields
    function AddContactFormField($page_list_id)
    {
        global $CFG,$objSmarty;
        if(is_array($_POST['default_value']))
        {
            $value  = implode(",",$_POST['default_value']);
        }
        else
        {
            $value  = $_POST['default_value'];
        }
        $insqry   = " INSERT INTO ".$CFG['table']['temp_contact_form_field']." SET page_list_id='".$page_list_id."', domain_id='".$_SESSION['domain_id']."',field_label_name='".$_POST['label_name']."', field_post_name='".str_replace(" ","-",$_POST['label_name'])."', field_type='".$_POST['field_type']."', value='".$value."',required='".$_POST['required']."', place_holder='".$_POST['place_holder']."', instruction='".$_POST['instruction']."',spacing='".$_POST['spacing']."',size='".$_POST['width']."',addeddate=now();";
        $this->ExecuteQuery($insqry,'insert');
    } 
function uploadImage_Library()
{
    global $CFG,$objSmarty,$objThumb;
    $domain_id=$_POST['domain_id'];
    $page_id=$_POST['page_id'];
    $page_list_id=$_POST['pagelist'];
    //print_r($_POST);
    if(is_array($_POST['files']) && !empty($_POST['files']))
    {
        foreach($_POST['files']as $key=>$value)
        {
            $file=preg_replace('/[0-9]/','',basename($value));
            $file=str_replace(' ','',$file);
            
            $file=time().$domain_id.substr(rand(),2,6).$file;
            //$file=base64_encode($file)."jpg";
            if($_POST['type']=='single')
            {
                $table=$CFG['table']['temp_single_images'];   
                $alreadimage     = $this->getMultiValue('image_name,alignment,status',$table,"page_list_id='".$this->filterInput($page_list_id)."' AND publish_status='U' ");             
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',page_list_id='".$this->filterInput($page_list_id)."',image_name='".$this->filterInput($file)."',alignment='".$alreadimage[0]['alignment']."',status='single',publish_status='U',delete_status='N'";               
                $thumbsize = $this->GetValue("single_image_thumb_size",$CFG['table']['iconsetting'],"single_image_thumb_size!=''");
	            $imagWH    = $this->getThumbnailWidthHeight($CFG['site']['photo_domain_image_path']."/".basename($value),$thumbsize);
                mysql_query("UPDATE ".$table." SET delete_status='Y' WHERE page_list_id='".$this->filterInput($page_list_id)."' AND delete_status='N'"); 
            }
            if($_POST['type']=='imagetext')
            {
                $table=$CFG['table']['temp_imagetxt_images'];   
                $alreadimage     = $this->getMultiValue('image_name,status',$table,"page_list_id='".$this->filterInput($page_list_id)."' AND publish_status='U' ");             
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',page_list_id='".$this->filterInput($page_list_id)."',image_name='".$this->filterInput($file)."',status='".$alreadimage[0]['status']."',publish_status='U'";               
                $thumbsize = $this->GetValue("img_txt_thumb_size",$CFG['table']['iconsetting'],"img_txt_thumb_size!=''");
	            $imagWH    = $this->getThumbnailWidthHeight($CFG['site']['photo_domain_image_path']."/".basename($value),$thumbsize);
                mysql_query("UPDATE  ".$table." SET delete_status='Y' WHERE page_list_id='".$this->filterInput($page_list_id)."' AND  delete_status='N'"); 
            }
            if($_POST['type']=='slider')
            {
                $table=$CFG['table']['temp_slider_images'];                
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',page_list_id='".$this->filterInput($page_list_id)."',slider_images='".$this->filterInput($file)."',publish_status='U'";
                $thumbsize = $this->GetValue("slider_thumb_size",$CFG['table']['iconsetting'],"slider_thumb_size!=''");
	            $imagWH    = $this->getThumbnailWidthHeight($CFG['site']['photo_domain_image_path']."/".basename($value),$thumbsize);
            }
            if($_POST['type']=='gallery')
            {
                $table=$CFG['table']['temp_gallery_images'];                
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',page_list_id='".$this->filterInput($page_list_id)."',gallery_name_thumb='".$this->filterInput($file)."',gallery_name='".$this->filterInput($file)."',publish_status='U'";               
                $thumbsize = $this->GetValue("gallery_thumb_size",$CFG['table']['iconsetting'],"gallery_thumb_size!=''");
	            $imagWH    = $this->getThumbnailWidthHeight($CFG['site']['photo_domain_image_path']."/".basename($value),$thumbsize);
            }
            if($_POST['type']=='bannerslider')
            {
                $table=$CFG['table']['temp_banner_slider_images'];                
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',image_name='".$this->filterInput($file)."',status='sliderimage',publish_status='U'";               
                $domainimages    = $this->getMultiValue('temp_image_name,image_name',$CFG['table']['domain_images'],"domain_id='".$domain_id."' AND status='bannerimage'");
                          
            }
            if($_POST['type']=='bannerimage')
            {
                $table=$CFG['table']['domain_images'];        
                $pubimage   = $this->getMultiValue("temp_image_name,image_name",$table," page_id='".$this->filterInput($page_id)."'AND domain_id='".$this->filterInput($domain_id)."' AND status='bannerimage' AND delete_status='N' ");        
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',temp_image_name='".$this->filterInput($file)."',image_name='".$pubimage[0]['image_name']."',status='bannerimage' ";               
                
            }
            if($_POST['type']=='background')
            {
                $table=$CFG['table']['domain_images'];
                $pubimage   = $this->getMultiValue("temp_image_name,image_name",$table," page_id='".$this->filterInput($page_id)."'AND domain_id='".$this->filterInput($domain_id)."' AND status='backgroundimage' ");
                $fields="page_id='".$this->filterInput($page_id)."',domain_id='".$this->filterInput($domain_id)."',temp_image_name='".$this->filterInput($file)."',image_name='".$pubimage[0]['image_name']."',status='backgroundimage' ";               
            }
            if(file_exists($CFG['site']['photo_domain_image_path']."/".basename($value)))
            {
                $file_name_source  = $CFG['site']['photo_domain_image_path']."/".basename($value);             
                
                $file_name_dest = $CFG['site']['photo_domain_image_path']."/".$file;
                copy($file_name_source,$file_name_dest);
                if(!empty($imagWH))
                {
                    $objThumb->createThumb($file_name_dest,$file_name_dest,$imagWH['width'],$imagWH['height'],'crop');
                }
                                
                if( $_POST['type']=='bannerimage'  )
                {                                    
                     $this->getUpdate($CFG['table']['domain_images'],"image_name='',delete_status='Y'","domain_id='".$domain_id."' AND delete_status='N' AND status='bannerimage'  ORDER BY img_id DESC");
                     mysql_query("UPDATE hi_temp_domaindetails SET header_banner = '1',header_slider = '0',publish_status='U' WHERE domain_id='".$domain_id."'");   
                }
                if( $_POST['type']=='background'  )
                {
                     $this->getUpdate($CFG['table']['domain_images'],"image_name='',delete_status='Y'","domain_id='".$domain_id."' AND delete_status='N' AND status='backgroundimage'  ORDER BY img_id DESC");
                }   
                              
                if($_POST['type']=="bannerslider")
                {
                    if($domainimages[0]['temp_image_name']!=$domainimages[0]['image_name'])
                    {
                        unlink($CFG['site']['photo_domain_image_path']."/".$domainimages[0]['temp_image_name']);
                        
                    } 
                    $this->getUpdate($CFG['table']['domain_images'],"temp_image_name=''","domain_id='".$domain_id."'  AND status='bannerimage'"); 
                    mysql_query("UPDATE hi_temp_domaindetails SET header_banner = '0',header_slider = '1',publish_status='U' WHERE domain_id='".$domain_id."'");
                     
                }              
            }
            else
            {
                continue;
            }            
            $insqry=" INSERT INTO ".$table." SET ".$fields." ";
            $this->ExecuteQuery($insqry,'insert');
        }    
        
        
    }   
    
}
#delete custome fields
function deleteCustomeFields()
{
    global $CFG;
    $delqry     = " DELETE FROM ".$CFG['table']['temp_contact_form_field']." WHERE  domain_id='".$_SESSION['domain_id']."' AND field_id='".$_POST['field_id']."'";
    $this->ExecuteQuery($delqry,'delete');
    
    $uptqry     = " UPDATE ".$CFG['table']['temp_contact_form_field']." SET publish_status='U' WHERE domain_id='".$_SESSION['domain_id']."' ";
    $this->ExecuteQuery($uptqry,'update');
}
#add new contact form fields
function UpdateContactFormField($page_list_id)
{
    global $CFG,$objSmarty;
    if(is_array($_POST['default_value']))
    {
        $default_value=implode(",",$_POST['default_value']);
    }
    else
    {
        $default_value=$_POST['default_value'];
    }
    $insqry     = " UPDATE ".$CFG['table']['temp_contact_form_field']." SET domain_id='".$_SESSION['domain_id']."',field_label_name='".$_POST['fieldlabel']."', field_post_name='".$_POST['fieldname']."', value='".$default_value."',required='".$_POST['required']."', place_holder='".$_POST['place_holder']."',instruction='".$_POST['instruction']."',spacing='".$_POST['spacing']."',size='".$_POST['width']."',publish_status='U' WHERE page_list_id='".$page_list_id."' AND field_id='".$_POST['field_id']."'";
    $this->ExecuteQuery($insqry,'update');
}
#Chenge column id pagelist
function UpdateColumnPagelist()
{
    global $CFG;
    
    $pagelist   = preg_replace("/[^0-9]/",'',$_POST['pagelist']);
    $colid      = preg_replace("/[^0-9]/",'',$_POST['columnid']);
    $this->getUpdate($CFG['table']['temp_pagelist'],"column_id	 = '".$colid."',publish_status='U' ","pagelist='".$pagelist."'");

}

function ChangeBackgrounfColoroff()
{
    global $CFG;
    if($_POST['type']=="img")
    {
        $cond=",background_enable='On',background_color_off='Y',default_switch='N'";
    }
    elseif($_POST['type']=="color")
    {
        $cond=",background_enable='Off',background_color_off='N',default_switch='N'";
    }
    elseif($_POST['type']=="default")
    {
        $cond=",background_enable='Off',background_color_off='Y',default_switch='Y'";
    }    
    $backcolor  = $_POST['backgroundcolor'];
    $this->getUpdate($CFG['table']['temp_domaindetails'],"publish_status='U' $cond ,background_color='".$backcolor."'","domain_id ='".$_SESSION['domain_id']."'");
    
}

#get Backgrounf status
function getBacgroundColor_status()
{
    global $CFG,$objSmarty;
    $backstatus=$this->getValue('background_color_off',$CFG['table']['temp_domaindetails'],"domain_id ='".$_SESSION['domain_id']."'");
    $default_switch	=$this->getValue('default_switch',$CFG['table']['temp_domaindetails'],"domain_id ='".$_SESSION['domain_id']."'");
    $backscolor=$this->getValue('background_color',$CFG['table']['temp_domaindetails'],"domain_id ='".$_SESSION['domain_id']."'");
    $objSmarty->assign("backgroundcolor",$backstatus);
    $objSmarty->assign("default_switch",$default_switch);
    $objSmarty->assign("backcolor",$backscolor);
} 

/**
	 * Common::getSliderImageNew()
	 * 
	 * @return
	 */
public function getGalleryImageNew($page_list_id)
	{
		global $CFG,$objSmarty;
	    $sqlsel = "SELECT gallery_name,gallery_id,page_list_id,page_id FROM ".$CFG['table']['temp_gallery_images']. " WHERE page_list_id = '".$this->filterInput($page_list_id)."' AND domain_id ='".$this->filterInput($_SESSION['domain_id'])."' AND page_id ='".$this->filterInput($_SESSION['page_id'])."' AND delete_status='N'";
		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
       	$objSmarty->assign('gallery_images',$sqlres);			
	}  

function clearSession()
{
//print_r($_POST);
unset($_SESSION['showstorepage']);
unset($_SESSION['paymentSuccmsg']);

}
    
 #....................................................................................................       
}



?>