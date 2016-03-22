<?php 
  
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin;
$objAdminMgmt	= new AdminManagement();
$objAdmin->Admin_authetic();
#.............................................................................................
	
if(isset($_GET['fans_id']) && !empty($_GET['fans_id'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objAdminMgmt->editFansLink($_GET['fans_id']);
	}
	#Edit
	$contentValue = $objSite->getMultiValue("fans_url,status,fans_name,added_date",$CFG['table']['fans'],"fans_id='".$objAdminMgmt->filterInput($_GET['fans_id'])."'");
	
	$objSmarty->assign("contentValue",$contentValue);
	}else{
	#Add
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminMgmt->addFansLink();
	}
}
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('stateAddEdit.tpl');
$main_content = $objSmarty->fetch('fansAddEdit.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');

?>