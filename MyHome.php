<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
$objCommon->userAuthendication();
$objCommon->user_unauthetic();
#.............................................................................................
if(isset($_SESSION['home_suc_msg']) && !empty($_SESSION['home_suc_msg']))
    {
        $objSmarty->assign('home_suc_msg',$_SESSION['home_suc_msg']);
        unset($_SESSION['home_suc_msg']);
        empty($_SESSION['home_suc_msg']);
    }
if(isset($_GET['domain_id']) && !empty($_GET['domain_id'])) 
    {
        $objCommon->domainAuthendication($_GET['domain_id']);
        $objCommon->myDomainList($_GET['domain_id']);
    }
    		
#$objCommon->myDomainList();
#$objCommon->mypointDomainList();
$objSmarty->assign('objCommon',$objCommon);
#.............................................................................................
$main_content = $objSmarty->fetch('myhome.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>