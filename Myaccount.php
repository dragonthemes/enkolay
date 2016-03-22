<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
$objCommon->userAuthendication();
#.............................................................................................

if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteaccount')
	{		
		$objCommon->InsertSuggestion();
		$objCommon->deleteAccountOfUser();
	}
 
/*elseif(!empty($_POST['emailsubmit']))
	{
		$objCommon->updateemail();
	}
	
elseif(!empty($_POST['fullsubmit']))
	{
		$objCommon->updatefullname();
	}
*/
#$objCommon->user_unauthetic();
$objCommon->accountListing();
$objCommon->remainingdaysforScbscition();			
#.............................................................................................
$main_content = $objSmarty->fetch('myaccount.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>