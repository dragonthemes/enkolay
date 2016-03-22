<?php
	include("../includes/config.inc.php");
#Language
$objSite->languageSession();
//end	
#.............................................................................................	
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
	{
		$objSmarty->assign('action',$_REQUEST['action']);
	}

	/****************************************** SELECT Zipcode Per Selected area *********************************************/
	if(isset($_GET['area_id']) && !empty($_GET['area_id']) )
	{
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->selectZipcode($_GET['area_id']);	
	}
	if(isset($_POST['action']) && $_POST['action'] == 'invoiceInfo_view' )
	{
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->getInvoiceInfoAdmin();	
	}
		
	$objSmarty->display('adminAjaxAction.tpl');
?>