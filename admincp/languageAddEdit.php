<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
#.............................................................................................
#Edit Language
if(isset($_GET['langid']) && !empty($_GET['langid'])){
	
	$objSmarty->assign('langcode',$_GET['langcode']);
	
	$objAdminMgmt	= new AdminManagement;
	$langvalue = $objSite->getMultiValue("lang_name, lang_code",$CFG['table']['language'],"lang_id='".$objAdminMgmt->filterInput($_GET['langid'])."'");	
	$objSmarty->assign("langvalue",$langvalue);
	
	/*$filename = $CFG['site']['language_path']."/".$langvalue[0]['lang_code']."/lang.php";	
	$filedata = $objSite->readfilecontent($filename);
	$objSmarty->assign("filedata",$filedata);*/
	
	$dir_files_list = $objAdminMgmt->list_directory_files($CFG['site']['language_path']."/".$_GET['langcode']);
	$objSmarty->assign('dir_files_list',$dir_files_list);
	
	if( isset($_GET['lfile']) && !empty($_GET['lfile']) ){
		
		$objSmarty->assign("langcode",$langvalue[0]['lang_code']);
		
		$filename = $filename = $CFG['site']['language_path'].'/'.$_GET['langcode'].'/'.$_GET['lfile'];
		$filedata = $objSite->readfilecontent($filename);
		
		if( $_GET['langcode'] == 'CS' || $_GET['langcode'] == 'SK' || $_GET['langcode'] == 'SL' || $_GET['langcode'] == 'AR' || $_GET['langcode'] == 'SV' || $_GET['langcode'] == 'LT' || $_GET['langcode'] == 'TR'){
			$objSmarty->assign("filedata",$filedata);
		}else{
			$objSmarty->assign("filedata",utf8_decode($filedata));
		}			
	}
	
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('languageAddEdit.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>