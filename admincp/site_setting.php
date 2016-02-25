<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
$objSetting	= new Setting;
#.............................................................................................
	#update sitesetting
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateSiteSetting'){
		 $objSetting->updateSiteSetting();
	}
	
	$objSetting->selectSiteSetting();
#.............................................................................................
#SMARTY ASSIGNING
$main_content = $objSmarty->fetch('site_setting.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>