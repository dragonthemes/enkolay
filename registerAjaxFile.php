<?php

include("includes/config.inc.php");
#.............................................................................................
			
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'register'){
		$objCommon->addRegister();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkUserLogin'){
		$objCommon->chkUserLogin();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changePassword'){
		$objCommon->change_pwd_register();
 	}
 	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeEmail'){
		$objCommon->updateemail();
 	}
 	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeFullname'){
		$objCommon->updatefullname();
 	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editprofile'){
		$objCommon->change_profile();
	}
	/*if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editaccount'){
		$objCommon->change_account();
	}*/
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'sendmessagetofriend'){
		$objCommon->sendMailToFriend();
	}	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addComments'){
		$objCommon->addComments();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'contactOwner'){
		$objCommon->contactOwner();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'signUpForm'){
		$objCommon->addSignUp();
	}
	
	
#.............................................................................................
#SMARTY ASSIGNING 
 //$objSmarty->display('registerAjaxFile.tpl');
?>