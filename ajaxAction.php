<?php 
    include("includes/config.inc.php");
    $objSite->languageSession();

    if(!$_SESSION['user_id']){
        die('You do not have permision for this action!');
    }
    #.............................................................................................
    if(isset($_REQUEST['action'])){ 
    	$action	 = $_REQUEST['action'];
    	$objSmarty->assign('action',$action);
    }
    #..............................................................................................
    #view order history
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'store_admin_vieworderhistory')
		{
			$objCommon = new Common;
            $objCommon->getStoreCurrencysymbol($_SESSION['domain_id']);
			$objCommon->order_details($_REQUEST['orderid']);						 
		}
#.........................................................................................
    #For Captcha code
    if(isset($_GET['action']) && $_GET['action'] == 'viewRefreshCaptchacode' ){     
        $objCommon->changeCaptchaCode();
    }
#.................................................................................................
    $objSmarty->display('ajaxAction.tpl');

?>

