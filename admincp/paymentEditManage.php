<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................
#Classes
$objAdmin->Admin_authetic();
#.............................................................................................	
	#Add new cuisine 
	 if($_GET['method'] == 'paypal')
		{
			if(isset($_POST['pay_payment_edit']) && !empty($_POST['pay_payment_edit']) && $_POST['pay_payment_edit'] == "update"){		
				$objAdminMgmt = new AdminManagement;	
				$objAdminMgmt->updatePaypalInfo();		
			}
		}
/*	else
		{
			if(isset($_POST['auth_payment_edit']) && !empty($_POST['auth_payment_edit']) && $_POST['auth_payment_edit'] == "update"){		
				$objAdminMgmt = new AdminManagement;	
				$objAdminMgmt->updateAuthInfo();		
			}
		} */
    
    #Update Nest Payment        
	if($_GET['method'] == 'nestPayment')
		{
			if(isset($_POST['pay_payment_edit']) && !empty($_POST['pay_payment_edit']) && $_POST['pay_payment_edit'] == "update"){		
				$objAdminMgmt = new AdminManagement;	
				$objAdminMgmt->updateNestPaymentInfo();		
			}
		}
	#Edit cuisine names
	if(isset($_GET['price_id']) && !empty($_GET['price_id']) && isset($_POST['action']) && ($_POST['action'] == "pricemanageedit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->updatePriceFunction();		
	}
	
	#List In edit table
	$selectFollowersValue = $objSite->getMultiValue("id, pay_test_mode, pay_test_url, pay_url, pay_merchant_email,auth_test_mode,live_pay_app_id,live_pay_trans_key,test_pay_app_id,test_pay_trans_key,auth_live_url,auth_pay_text_url, nestPay_mode, nestPay_test_clientId, nestPay_test_storeId, nestPay_test_userName, nestPay_test_pwd, nestPay_live_clientId, nestPay_live_storeId, nestPay_live_userName, nestPay_live_pwd ",$CFG['table']['sitesetting'],"id =1 ");
			
	$objSmarty->assign('select',$selectFollowersValue);
	
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('paymentEditManage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>