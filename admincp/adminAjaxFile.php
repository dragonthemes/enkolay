<?php
	include("../includes/config.inc.php");
	
	#Language
    $objSite->languageSession();
    //end	
    #.............................................................................................
	
	/****************************************** Common *****************************************/
	#Change Status 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeStatus'){
		
		$objAdmin = new Admin();		
		$objAdmin->changeStatus();
	}
	
	
	#Delete 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteProcess'){
		
		$objAdmin = new Admin();		
		$objAdmin->Delete_Admin();		
	}
	
	/****************************************** Admin Login *****************************************/
	#Admin Login
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAdminLogin'){
		
		$objAdmin = new Admin();
		$objAdmin->chkAdminLogin();
	}
	/****************************************** Change Password *****************************************/
	#Change Password
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkChangePassword'){
		$objAdmin = new Admin();
		$objAdmin->change_pwd_update_register();
	 
	}
	/*********************************************change profile******************************************/
	#change profile
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editprofile'){
		$objAdmin = new Admin();
		$objAdmin->change_profile();
	}
	/****************************************** Icon Settings *****************************************/
	#Update Icon Setting
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editUpdateIconSetting'){
		
		$objSetting	= new Setting();
		$objSetting->updateIconSettings();
	}
	
	/****************************************** Language  checkAddCustomer*********************************************/
	#add Language name
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAddLanguageName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->LanguageNameAdd();
	}
	#Edit Language name 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditLanguageName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->languageNameEdit();
	}
	
	
	if(isset($_POST['action']) && !empty($_POST['action']) && ( $_POST['action'] == 'LanguageFilesListEdit') && ($_POST['lfile'] == $_POST['lang_file_name'])){
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->updateLanguageFiles();
	}
	
 #****************************************** Common *****************************************/
	#Change Lang Status 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeLangStat'){
		$objAdmin = new Admin();		
		$objAdmin->changeStatus();
	}
	
	#this for send maiil to publish user-----------------------------------------------------------------------------------------------
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeMailStatus'){
		
		$objAdmin	= new Admin();
		$objAdmin->sendMailForDomainUser();
		 
	}
	
		#this for send maiil to publish user-----------------------------------------------------------------------------------------------
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'MailToPublishUnPublish'){
		
		$objAdmin	= new Admin();
		$objAdmin->sendMailForDomainPublishUnPublish();
		 
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="buydomainInvoiceStore" )
    {
        $objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->buydomainInvoiceStoreDetails();
    }
	 

?>