<?php 

/**
 * @author kathirvel
 * @copyright 2013
 */
 
include("includes/config.inc.php");
#Language
$objSite->languageSession();
unset($_SESSION['page_id']);
unset($_SESSION['domain_id']);
#.............................................................................................
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'selecttheme')
		{
			/*$yes = $objCommon->ChkUserAlreadySelectedATheme();
			if($yes)
				$objCommon->updateThemeSelection();
			else*/
				$objCommon->InsertThemeSelection();
				
		}
	else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'selectblog')
		{
			$objCommon->InsertBlogSelection();
		}	
	else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'selectstore')
		{
			$objCommon->InsertStoreSelection();
		}	
	$objCommon->getThemeList();	
	$objCommon->getBlogList();	
	#$objCommon->getStoreList();
	$objSmarty->assign('objCommon',$objCommon);
	
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('onboarding.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>