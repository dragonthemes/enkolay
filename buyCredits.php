<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
#.............................................................................................
	$objCommon->user_unauthetic();        

//exit;
#------------------------------------------------------------
if(isset($_POST['mdStatus']) && !empty($_POST['mdStatus']))
	{	        
        $objCommon->nestPaymentProcess();
	}
else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "sucess" && $_REQUEST['txn_id'] != "" && $_REQUEST['domain_id'] != "")
	{
		
		if(PayPalVerify::verify() == 'VERIFIED'){

			//Update process..
			//$objCommon->updateSubscriptionRequest();
			$objCommon->updateSubscriptionDate($_REQUEST['domain_id'],$_REQUEST['txn_id']);
			$user_id                         = $_SESSION['user_id'];
			$postarrvalues['transaction_id'] = $_REQUEST['txn_id'];
			$postarrvalues['pay_amount']     = $_REQUEST['mc_gross'];
			$postarrvalues['pay_status']     = "completed";
			$objCommon->logTransactions($user_id,$_REQUEST['domain_id'],$postarrvalues,"paypal");
			$theme_id = $objCommon->getValue('theme_id',$CFG['table']['domaindetails'],'domain_id = "'.$objCommon->filterInput($_GET['domain_id']).'"');
			$blog_id  = $objCommon->getValue('blog_id',$CFG['table']['domaindetails'],'domain_id = "'.$objCommon->filterInput($_GET['domain_id']).'"');
			$store_id = $objCommon->getValue('store_id',$CFG['table']['domaindetails'],'domain_id = "'.$objCommon->filterInput($_GET['domain_id']).'"');
			if($theme_id != 0)
			{
				unset($_SESSION['blogonuse']);
				unset($_SESSION['storeonuse']);
				unset($_SESSION['store_id']);
				$_SESSION['themeOnuse'] = 1;
				$_SESSION['theme_id'] = $theme_id;
				$themename = $objCommon->getValue('theme_name',$CFG['table']['themeselection'],"domain_id='".$objCommon->filterInput($_GET['domain_id'])."'");
				$_SESSION['themename'] = strtolower($themename);
			}
			if($blog_id != 0)
			{
				unset($_SESSION['themeOnuse']);
				unset($_SESSION['storeonuse']);
				unset($_SESSION['store_id']);
				$_SESSION['blogonuse'] = 1;
				$_SESSION['blog_id'] = $blog_id;
				$themename = $objCommon->getValue('blog_name',$CFG['table']['blogselection'],"domain_id='".$objCommon->filterInput($_GET['domain_id'])."'");
				$_SESSION['themename'] = strtolower($themename);
			}
			if($store_id != 0)
			{
				unset($_SESSION['themeOnuse']);
				unset($_SESSION['blogonuse']);
				$_SESSION['storeonuse'] = 1;
				$_SESSION['store_id'] = $store_id;
				$themename = $objCommon->getValue('store_name',$CFG['table']['storeselection'],"domain_id='".$objCommon->filterInput($_GET['domain_id'])."'");

				$_SESSION['themename'] = strtolower($themename);
			}
			$seourl="/myhome/".$_GET['domain_id']."/sucess";
			$filename="/MyHome.php?domain_id=".$_GET['domain_id']."&msg=sucess";
			$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
			$url= $CFG['site']['base_url'].$redirect_url;
			$objCommon->redirectUrl($url);
		}
	}
else
    {
        #$seourl="/myhome/".$_GET['domain_id']."/failure";
		#$filename="/MyHome.php?domain_id=".$_GET['domain_id']."&msg=failure";
        $seourl="/subscription/".$_GET['domain_id']."/failure";
        $filename="/subscription.php?domain_id=".$_GET['domain_id']."&msg=failure";
		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
    	$url= $CFG['site']['base_url'].$redirect_url;
		$objCommon->redirectUrl($url);
    }    
    
for($yi=0; $yi<10; $yi++)
	{
		$current_year = date('Y', mktime(0, 0, 0, date('m'), date('d'), date('Y')+$yi));
		$payment_details[] = $current_year;
	}
$objSmarty->assign('year_list',$payment_details);
$objSmarty->assign('objCommon',$objCommon);
#.............................................................................................
$main_content = $objSmarty->fetch('buyCredits.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>