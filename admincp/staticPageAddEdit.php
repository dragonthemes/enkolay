<?php 
include ("../includes/config.inc.php");
include ("fckeditor_files.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin;
$objAdminMgmt	= new AdminManagement();
$objAdmin->Admin_authetic();
#.............................................................................................
	
if(isset($_GET['conid']) && !empty($_GET['conid'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objAdminMgmt->editStatic($_GET['conid']);
	}
	#Edit
	$contentValue = $objSite->getMultiValue("content_name,status,content,addeddate",$CFG['table']['content'],"content_id='".$objAdminMgmt->filterInput($_GET['conid'])."'");
	
	#content
	$oFCKeditor->Value	= stripslashes($contentValue['0']['content']);
	$Editor 			= $oFCKeditor->Create();
	
	$objSmarty->assign("contentValue",$contentValue);
	$objSmarty->assign("Editor", $Editor);	
}else{
	#Add
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminMgmt->newStaticAdd();
	}
}
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('stateAddEdit.tpl');
$main_content = $objSmarty->fetch('staticPageAddEdit.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>