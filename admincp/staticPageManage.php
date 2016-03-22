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
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement;
 #list static pages
  	$objAdminMgmt->staticList();
 #for show success mesaage after add and update
  	
if(isset($_GET['msg']) == 'addstatic')
	{
		$objSmarty->assign('ErrorMessage','Static Pages added successfully');	
	}
else 
		{
			if (isset($_GET['msg']) == 'updatestatic')
				{
					$objSmarty->assign('ErrorMessage','Static Pages updated successfully');	
				}
		}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('staticPageManage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>