<?php 

include("includes/config.inc.php");
#Language
$objSite->languageSession();
#.............................................................................................
$objCommon->user_unauthetic();

#echo $_SESSION['themeOnuse'];

if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'domainAdd')
	{		
		$domain_url = $objCommon->ChkDomainUrlIsAlreadyPresent();
		if($domain_url)		
			echo "error";	
		else
			$objCommon->InsertdomainUrl();
		exit();	
	}
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'domain_settings')
	{
	 	$domain_url = $objCommon->ChkDomainUrlForSettings();
		if($domain_url)		
			echo "error";	
		else
			$objCommon->updateSubdomainForSettings($_POST['domain_id']);
		exit();	;	
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'savetitle')
	{
		$objCommon->updateDomainDetails($sitetitle='site_title',$_POST['sitetitle']);
		$objCommon->getCurrentDomainDetails();
		$objSmarty->display('sitetitle.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateSubDomain')
	{
		if(empty($_POST['subdomain_url']))
			{
				echo "error|@|";
				$objSmarty->display('subdomain.tpl');	
			}
		else
			{	
				$domain_url = $objCommon->ChkDomainUrlIsAlreadyPresent();
				if($domain_url)
					{
						$objCommon->getCurrentDomainDetails();
						echo "error|@|";
						$objSmarty->display('subdomain.tpl');	
					}
				else
					{
						$objCommon->updateDomainDetails($sitetitle='subdomainurl',$_POST['subdomain_url']);
						$objCommon->getCurrentDomainDetails();
						$objSmarty->display('subdomain.tpl');
					}				
			}		
		exit();
	}	
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'savedescription')
	{
		$objCommon->updateDomainDetails($sitetitle='site_description',$_POST['site_description']);
		$objCommon->getCurrentDomainDetails();
		$objSmarty->display('sitedescription.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'savekeyword')
	{
		$objCommon->updateDomainDetails($sitetitle='metakeywords',$_POST['site_keyword']);
		$objCommon->getCurrentDomainDetails();
		$objSmarty->display('sitemetakeyword.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveHeader')
	{
		$objCommon->updateDomainDetails($sitetitle='header_code',$_POST['site_header']);
		$objCommon->getCurrentDomainDetails();
		$objSmarty->display('siteheader.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveFooter')
	{
		$objCommon->updateDomainDetails($sitetitle='footer_code',$_POST['site_footer']);
		$objCommon->getCurrentDomainDetails();
		$objSmarty->display('sitefooter.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateBlogSetting')
	{
		$objCommon->updateTheSettingOfBlog();
		echo "sucess";
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'commentblogpopup')
	{	
		$objCommon->getParicularDomainDetails($_SESSION['domain_id']);
		$objCommon->ListtheCommentDetails($_SESSION['domain_id']);
		echo "show|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'blogcommentdeletepopup')
	{	
		$ids = $_POST['checkedvalues'];
		if(is_array($ids))
			{
				foreach($ids as $x => $value)
					{
						$objCommon->deleteBlogComment($_POST['domain_id'],$value);
					}
			}
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->ListtheCommentDetails($_POST['domain_id']);
		echo "delete|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'blogcommentspampopup')
	{	
		$ids = $_POST['checkedvalues'];
		if(is_array($ids))
			{
				foreach($ids as $x => $value)
					{
						$objCommon->spamBlogComment($_POST['domain_id'],$value);
					}
			}
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->ListtheCommentDetails($_POST['domain_id']);
		echo "spam|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'blogcommentupdateapprove')
	{	
		$ids = $_POST['checkedvalues'];
		if(is_array($ids))
			{
				foreach($ids as $x => $value)
					{
						$objCommon->updateBlogComment($_POST['domain_id'],$value);
					}
			}
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->ListtheCommentDetails($_POST['domain_id']);
		echo "update|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'onlydeletedcomments')
	{	
		 
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->listonlyDeletedComments($_POST['domain_id']);
		echo "deletedcomments|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'onlyrecentcomments')
	{	
		 
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->listonlyRecentComments($_POST['domain_id']);
		echo "recentcomments|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'onlyrnotapprovecomments')
	{	
		 
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->listonlyNotApproveComments($_POST['domain_id']);
		echo "notapprovecomments|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'onlyspamcomments')
	{	
		 
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->listonlySpamComments($_POST['domain_id']);
		echo "spamcomments|@|";
		$objSmarty->display('blockpopupcomment.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeauthor')
	{	
		$objCommon->getBlogDetails($_POST['domain_id']);
		echo "blogarea|@|";
		$objSmarty->display('authorBlogReplace.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeoutauthor')
	{
		$objCommon->CommonUpdateOfSingleValue($CFG['table']['temp_domaindetails'],'author',$objCommon->My_addslashes_content($_POST['author']),$_POST['domain_id'],'domain_id');
		$objCommon->getBlogDetails($_POST['domain_id']);
		echo "outblog|@|";
		$objSmarty->display('authorBlog.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changearchives')
	{	
		$objCommon->getBlogDetails($_POST['domain_id']);
		echo "blogarea|@|";
		$objSmarty->display('archivesBlogReplace.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeoutarchives')
	{
		$objCommon->CommonUpdateOfSingleValue($CFG['table']['temp_domaindetails'],'archives',$objCommon->My_addslashes_content($_POST['archives']),$_POST['domain_id'],'domain_id');
		$objCommon->getBlogDetails($_POST['domain_id']);
		echo "outblog|@|";
		$objSmarty->display('archivesBlog.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changecategories')
	{	
		$objCommon->getBlogDetails($_POST['domain_id']);
		echo "blogarea|@|";
		$objSmarty->display('categoriesBlogReplace.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeoutcategories')
	{
		$objCommon->CommonUpdateOfSingleValue($CFG['table']['temp_domaindetails'],'categories',$_POST['categories'],$_POST['domain_id'],'domain_id');
		$objCommon->getBlogDetails($_POST['domain_id']);
		echo "outblog|@|";
		$objSmarty->display('categoriesBlog.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showtitleedit')
	{
		$objSmarty->assign('title_id',$_POST['title_id']);
		$objSmarty->assign('title',$_POST['title']);
		$objSmarty->assign('domain_id',$_POST['domain_id']);
		$objSmarty->assign('date',$_POST['date']);
		$category =$objCommon->getCategoryForParticularPost($_POST['title_id'],$_POST['domain_id'],$_POST['title']);
		$objCommon->pageListForListBlog($_POST['title_id']);
		$sep_cat=explode(',',$category);
		$objSmarty->assign('category_edit',$sep_cat);
		echo "showtitlepopup|@|";
		$objSmarty->display('addtitle.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateEditTitle')
	{
		//$objCommon->CommonUpdateOfSingleValue($table=$CFG['table']['posttitle'],$valuefor='title',$value=$_POST['title'],$condfor=$_POST['title_id'],$cond='post_id');
		$sep_cat=array();
		if($_POST['category'])
	 	$cat=implode(',',$_POST['category']);
		$objCommon->updateTitleWithoutDrafts($_POST['domain_id'],$_POST['titlename'],$_POST['title_id'],$cat);
		$objCommon->updatePublishPageForBlog();
		$objCommon->listAllTitle($_POST['domain_id']);
			$objSmarty->assign('category_edit',$sep_cat);
		echo "sucess";
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addTitlepopup')
	{	
		$sep_cat=array();
        $title_id  = $objCommon->InsertBlankPostTitle();
	 	$objSmarty->assign('domain_id',$_POST['domain_id']);
	 	$objSmarty->assign('category_edit',$sep_cat);
		echo "sucess|@|".$title_id."|@|Untitled|@|";
		//$objSmarty->display('addtitle.tpl');
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addTitle')
	{
		$sep_cat=array();
		if($_POST['category'])
	 	$cat=implode(',',$_POST['category']);
		$objCommon->InsertTitle($_POST['domain_id'],$_POST['titlename'],$cat);
		$objCommon->listAllTitle($_POST['domain_id']);
		$objCommon->updateCommentDefault($_POST['domain_id'],$_POST['commentdefault']);
		$objSmarty->assign('category_edit',$sep_cat);
		echo "sucess";
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addTitleWithDrafts')
	{
		$objCommon->InsertTitleWithDrafts($_POST['domain_id'],$_POST['titlename']);
		$objCommon->listAllTitle($_POST['domain_id']);
		$objCommon->updateCommentDefault($_POST['domain_id'],$_POST['commentdefault']);
		echo "sucess";
		exit();
	}
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateTitleAsDraft')
	{
		$objCommon->update_Title($_POST['domain_id'],$_POST['titlename'],$_POST['title_id']);
		echo "sucess";
		exit();
	}		
elseif(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteTitle')
	{
		$objCommon->DeleteSelectedTitle($_POST['domain_id'],$_POST['title_id']);
		echo "sucess";
		exit();
	}
if($_SESSION['blog'])
	{
		$objCommon->ListTheUserSelectedBlog();
	}
elseif($_SESSION['theme'])
	{
		$objCommon->ListTheUserSelectedTheme();
	}																								
elseif($_SESSION['store'])	
	{
		$objCommon->ListTheUserSelectedStore();
	}
if($_SESSION['themeOnuse'])
	{
		$objCommon->ListTheUserSelectedTheme();
		//List Pages In Main Page		
	}	
/*elseif($_SESSION['blogonuse'])
	{
		$objCommon->ListTheUserSelectedBlog();
		$objCommon->getBlogDetails($_SESSION['domain_id']);
		$objCommon->ListBlogSettingDetails();		
		$objCommon->listAllTitle($_SESSION['domain_id']);
	}*/

if($_SESSION['domain_id'])
	{
		if($_SESSION['blogonuse'])
			{
				$objCommon->ListTheUserSelectedBlog();
				$objCommon->getBlogDetails($_SESSION['domain_id']);
				$objCommon->ListBlogSettingDetails($_SESSION['domain_id']);		
				$objCommon->listAllTitle($_SESSION['domain_id']);
			}
		//List Pages In Main Page
		$pagefirstid = $objCommon->getpageDetails($_SESSION['domain_id']);
		if(isset($_SESSION['page_id']))
			$objCommon->pageListForList($_SESSION['page_id']);
		else
			$objCommon->pageListForList($pagefirstid);
		if($_SESSION['blogonuse'])
			{
				$themename = $objCommon->getValue('blog_name',$CFG['table']['temp_blogselection'],"domain_id='".$objSite->filterInput($_SESSION['domain_id'])."'");
				$themecolorname = $objCommon->getValue('blog_color',$CFG['table']['temp_blogselection'],"domain_id='".$_SESSION['domain_id']."'");	
			}	
		elseif($_SESSION['storeonuse'])
			{
				$themename = $objCommon->getValue('store_name',$CFG['table']['temp_storeselection'],"domain_id='".$objSite->filterInput($_SESSION['domain_id'])."'");
				$themecolorname = $objCommon->getValue('store_color',$CFG['table']['temp_storeselection'],"domain_id='".$_SESSION['domain_id']."'");
			}
		else
			{
				$themename = $objCommon->getValue('theme_name',$CFG['table']['temp_themeselection'],"domain_id='".$objSite->filterInput($_SESSION['domain_id'])."'");
				$themecolorname = $objCommon->getValue('theme_color',$CFG['table']['temp_themeselection'],"domain_id='".$objSite->filterInput($_SESSION['domain_id'])."'");		
			}
		$_SESSION['themecolorname'] = strtolower($themecolorname);
		$_SESSION['themename'] = strtolower($themename);
		if(!isset($_SESSION['page_id']))
		   $_SESSION['page_id'] = $pagefirstid;
		$objCommon->getBlogList();
		$objCommon->getThemeList();
		$objCommon->getStoreList();
		$objCommon->getFontList();
		$objCommon->getSubsCripDetails();		
	}	
	
if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
    $pagelistpath = $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl";
else    
    $pagelistpath = $CFG['site']['tpl_path']."/"."buildpagesList.tpl";
    
$objSmarty->assign("pagelistpath", $pagelistpath);    			

//settings page
$objCommon->getCurrentDomainDetails();

$objSmarty->assign('objCommon',$objCommon);	
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('mainpage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>