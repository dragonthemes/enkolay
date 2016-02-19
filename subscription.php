<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
#$objCommon->userAuthendication();
$objCommon->user_unauthetic();	
#.............................................................................................
if($_GET['action'] == 'auto')
	{
		$_SESSION['user_id']=base64_decode($_GET['user_id']);
		$_SESSION['domain_id']=base64_decode($_GET['domain_id']);
		header("location:subscription.php");
	}
    
 #echo "<pre>"; print_r($_REQUEST); echo "</pre>";
/*if(isset($_REQUEST['payprice']) && !empty($_REQUEST['payprice']) && !empty($_GET['domain_id']))
    {
        $objCommon->nestpayMerchantValues($_GET['domain_id']);
    }*/
if(isset($_REQUEST['paypalprocess']) && $_REQUEST['paypalprocess'] == "PalpalPayment" && !empty($_GET['domain_id']))  
    {
        $objCommon->monlyPlanUpgradePaypalProcess();
    }  
 
		
$objCommon->getPriceList();
for($yi=0; $yi<10; $yi++)
	{
		$current_year = date('Y', mktime(0, 0, 0, date('m'), date('d'), date('Y')+$yi));
		$payment_details[] = $current_year;
	}
$objCommon->nestpayMerchantValues($_GET['domain_id']); 
$objCommon->getInvoicebuyDetailsValues($_GET['domain_id']);   
$objSmarty->assign('year_list',$payment_details);
$objSmarty->assign('objCommon',$objCommon);
#.............................................................................................
$main_content = $objSmarty->fetch('subscription.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>