<?php

/**
 * @author krishnaveni
 * @copyright 2014
 */
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

include ("fckeditor_files.php");
#Classes
$objAdmin	= new Admin;
$objThumb   = new Thumbnail;
$objAdmin->Admin_authetic();
#.............................................................................................	
 
	#Edit contact mail id
	if(isset($_GET['contact_id']) && $_GET['page_id'] && $_GET['domain_id'] && !empty($_GET['contact_id']) && isset($_POST['action']) && ($_POST['action'] == "contactAddEdit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->editContact($_GET['contact_id'],$_GET['page_id'],$_GET['domain_id']);		
	}else{
			$selectFollowersValue = $objSite->getMultiValue("id, mail_to,page_id,domain_id,text1,text2,text3,text4,text5",$CFG['table']['contact_form'],"id ='".$objAdminMgmt->filterInput($_GET['contact_id'])."' ");	
			
			$objSetting	= new Setting;
			global $objSetting;	
			 
		 	//print_r($selectFollowersValue);die();
			$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
		 			
	}
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('contactManageEdit.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>