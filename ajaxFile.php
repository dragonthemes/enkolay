<?php

include("includes/config.inc.php");
$objSite->languageSession();

#Facebook Login:
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'userLoginFb'){			
	$objUserShare	=	new UserShare;
	$objUserShare->loginFacebook();
}
#Forget Password:
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'forgetPassword'){
	$objCommon = new Common;
	$objCommon->forgetPass();
}

$auth = new Authentication();
if(!$auth->checkPermision()){
	die('You do not have permision for this action!');
}

/***************************************veni functions start**************************/
		//this is for show categories list in categories page of store
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'categoryList')
		{
			$objCommon = new Common;
			$objSmarty->display('categoryList.tpl');
			exit;
			 
		}
	//this is for add categories in categories of store
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addCategoryList')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
			$objSmarty->assign('objCommon',$objCommon);
			$store_cat_id = $objCommon->InsertCategoryStore();
			$objCommon->getCategoryListForStore($store_cat_id);
			$objSmarty->display('addCategoryList.tpl');
			exit;			 
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveCatList')
		{
			$objCommon = new Common;
			$objCommon->updateCategoryStoreWhileAdd($_POST['store_cat_id']);
			$objCommon->InsertProdCategoryTable($_POST['store_cat_id']);
			$objSmarty->assign('store_cat_id',$store_cat_id);
			$objSmarty->display('categoryList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editCatList')
		{
			$objCommon = new Common;
			$objCommon->updateCategoryStore($_POST['store_cat_id']);
			$objCommon->updateProdCategoryTable($_POST['store_cat_id']);
			$objSmarty->assign('store_cat_id',$store_cat_id);
			$objSmarty->display('categoryList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'listProductInCategoryPage')
		{
			$objCommon = new Common;
			$prod_id = $objCommon->getProducts($_POST['domain_id']);
			$objSmarty->assign('store_cat_id',$_POST['store_cat_id']);
			$objSmarty->display('productsListInCatPage.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteCategory')
		{
			$objCommon = new Common;
			$objCommon->deleteCategoryStore();
			$objSmarty->display('categoryList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editCategory')
		{
			$objCommon = new Common;
			$objCommon->getCategoryListForStore($_POST['store_cat_id']);
			$objCommon->getCategoryImageStore($_POST['store_cat_id']);
			$objSmarty->display('addCategoryList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showProducts')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
			$objCommon->getProductsFromProdCat($_POST['domain_id'],$_POST['store_cat_id']);
			$objCommon->getCategoryNames($_POST['domain_id'],$_POST['store_cat_id']);
			$objSmarty->display('productsBasedCat.tpl');
		  	exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'productsViewPage')
		{
		 	$objCommon = new Common;
			$objCommon->getProductsDetails($_POST['product_id']);
            #$objCommon->getStoreBasicValue($_POST['domain_id']);
			$category_id=$objCommon->getCategoryId($_POST['domain_id'],$_POST['product_id']);
			$objCommon->getCategoryNames($_POST['domain_id'],$category_id);
		    $objSmarty->display('productsViewPage.tpl');
			exit;
		}	
	/**************************for email start*****************************************************/
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveStoreOrderFooter')
		{
		 	$objCommon = new Common;
			$objCommon->updateStoreOrderFooter();
			$objSmarty->display('order_info.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveStoreOrderHeader')
		{
		 	$objCommon = new Common;
			$objCommon->updateStoreOrderHeader();
			$objSmarty->display('order_info.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveShippedHeader')
		{
		 	$objCommon = new Common;
			$objCommon->updateShippedHeader();
			$objSmarty->display('shipped_email.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveShippedFooter')
		{
		 	$objCommon = new Common;
			$objCommon->updateShippedFooter();
			$objSmarty->display('shipped_email.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveRefundHeader')
		{
		 	$objCommon = new Common;
			$objCommon->updateRefundHeader();
			$objSmarty->display('refund_email.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveRefundFooter')
		{
		 	$objCommon = new Common;
			$objCommon->updateRefundFooter();
			$objSmarty->display('refund_email.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveCanceledHeader')
		{
		 	$objCommon = new Common;
			$objCommon->updateCanceledHeader();
			$objSmarty->display('cancelled_email.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveCanceledFooter')
		{
		 	$objCommon = new Common;
			$objCommon->updateCanceledFooter();
			$objSmarty->display('cancelled_email.tpl');
			exit;
		}
	/**************************for email end*****************************************************/
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'searchCategory')
		{
			$objCommon = new Common;
			$objCommon->searchCategoryListForStore();
			$objSmarty->display('searchcategoryList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeIntoUnpublish')
		{
			$objCommon = new Common;
			$objCommon->changeIntoUnpublish();
			$objSmarty->display('productList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeIntoPublish')
		{
			$objCommon = new Common;
			$objCommon->changeIntoPublish();
			$objSmarty->display('productList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeDuplicate')
		{
			$objCommon = new Common;
            
	       	$duplicate =	$objCommon->changeDuplicate();
            $prodtid   =    $objCommon->InsertDuplicate($duplicate);
            $duplicateImage = $objCommon->changeProductImageDuplicate();
            $objCommon->InsertDuplicateProductImage($duplicateImage,$prodtid);
			$objSmarty->display('productList.tpl');
			exit;
		}
	//for add cart details in cart table
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'insertIntoCartTable')
		{
			$objCommon = new Common;
           	$objCommon->InsertCartTable();
            $objCommon->getDetailOfDomain($_REQUEST['domain_id']);
           	#$objCommon->selectnewCart();
            $objCommon->selectCartDetails($_POST['domain_id']);
			$objSmarty->display('cartList.tpl');
			exit;
		}
	//for deleted cart in cart pop up
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'cartDeleted')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
           	$objCommon->deleteCartDet();
            $objCommon->getDetailOfDomain($_POST['domain_id']);
            $objCommon->getShippingDetails($_POST['domain_id']);
            $objCommon->selectCartDetails($_POST['domain_id']);
           	$objSmarty->display('cartList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateQuantity')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
           	$objCommon->updateQuantity();
            $objCommon->getDetailOfDomain($_POST['domain_id']);
            $objCommon->getShippingDetails($_POST['domain_id']);
           	$objCommon->selectCartDetails($_POST['domain_id']);
           	$objSmarty->display('checkOutProduct.tpl');
			exit;
		}
     #update shiping id   
     if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateShipingid')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
           	$objCommon->updateShipingid();
            $objCommon->getDetailOfDomain($_POST['domain_id']);
            $objCommon->getShippingDetails($_POST['domain_id']);
           	$objCommon->selectCartDetails($_POST['domain_id']);
           	$objSmarty->display('checkOutProduct.tpl');
			exit;
		}   
	//to delete cart in checkout page 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'cartDeletedFromCheckoutPage')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
           	$objCommon->deleteCartDet();
            $objCommon->getDetailOfDomain($_POST['domain_id']);
            $objCommon->getShippingDetails($_POST['domain_id']);
            $objCommon->selectCartDetails($_POST['domain_id']);
           	$objSmarty->display('checkOutProduct.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'paypalEmail')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
           	$objCommon->updatePayEmailInStoreDetails();
           	$objSmarty->display('checkoutList.tpl');
			exit;
		}
 /*	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showShippingAddr')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
			$objSmarty->assign('grand_total',$_POST['grandTotal']);
			$store_val=$objCommon->getStoreDetails($_SESSION['domain_id']);
			$objCommon->selectnewCart();
		 	$objSmarty->assign('store_val',$store_val);
          	$objSmarty->display('showShippingAddr.tpl');
			exit;
		}
  	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'insertIntoOrderDetailsTable')
		{
			global $CFG,$objSmarty;
			$objCommon = new Common;
			$objCommon->insertIntoOrderDetails();
			
          	//$objSmarty->display('showShippingAddr.tpl');
			exit;
		} */
 
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="UpdateColumnid_pagelist")
    {
        $objCommon  = new Common;
        $objCommon->UpdateColumnPagelist();
    }    
	/********************************veni function ends for categories*************************/
	/****************************************** Common *****************************************/	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'sales'){
		$objCommon->addSales();
	}
	
	/******************************************************************************************/
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'domainAdd'){
		$objCommon = new Common;
		$objCommon->addNewDomain();
	}
	
	//logout
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'logOut'){
		$objCommon = new Common;
		$objCommon->userLogout();
	}
    #Add Link lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addLink' ){
			global $CFG;
			$objCommon = new Common;
            $objSite=new Site;
            
			if($objCommon->getPageCount($_SESSION['domain_id']) < $CFG['site']['page_subs_count'])
				{
					$pageid = $objCommon->addLink();		
				}
			else
				{
					$subsdetails = $objCommon->getSubsCripDetails();
					if($subsdetails[0]['subs_monthly_date']  <= date('Y-m-d'))
						{
							//echo 'success|@|subscription.php';exit;
                            echo 'success|@|'.$objSite->redirectInAjax('subscription.php','subscription');
                            exit;
						}
					else
						{
							$pageid = $objCommon->addLink();
						}
				}
		    $objCommon->pageList();
		    $objCommon->pageFirstList($pageid);
		    $objSmarty->display('pagesList.tpl');
		}
	#Show pAGE lISTING
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showPage' ){
			$objCommon = new Common;
			$objSmarty->assign('pageaction',$_GET['action']);
			$pagefirstlist = $objCommon->pageList();
			if($_GET['pageid'])
				$objCommon->pageFirstList($_GET['pageid']);
			else
  				$objCommon->pageFirstList($pagefirstlist);
			$objSmarty->display('pagesList.tpl');
				
	}	
	#Edit pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editPage' ){
			$objCommon = new Common;
		    $objCommon->editPage();
		    $objCommon->pageList();
		    $objCommon->pageFirstList($_POST['page_id']);
		    $objSmarty->display('pagesList.tpl');
		}
	
	#Copy pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'copyPage' ){
			$objCommon = new Common;
		    $pageid = $objCommon->copyPage();
		    $objCommon->pageList();
		    $objCommon->pageFirstList($pageid);
		    $objSmarty->display('pagesList.tpl');
		}
	
	#Edit pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deletePage' ){
			$objCommon = new Common;
            $objCommon->deletePagelist($_POST['page_id']);
		    $objCommon->deletePage();
		    $pagefirstlist = $objCommon->pageList();
		    $objCommon->pageFirstList($pagefirstlist);
		    $objSmarty->display('pagesList.tpl');
		}
	#Add pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addPage' ){
			global $CFG;
			$objCommon = new Common;
            $objSite=new Site;
            
			if($objCommon->getPageCount($_SESSION['domain_id']) < $CFG['site']['page_subs_count'])
				{
					$pageid = $objCommon->addPage();		
				}
			else
				{
					$subsdetails = $objCommon->getSubsCripDetails();
					if($subsdetails[0]['subs_monthly_date']  <= date('Y-m-d'))
						{
							//echo 'success|@|subscription.php';exit;
                            echo 'success|@|'.$objSite->redirectInAjax('subscription.php','subscription');
                            exit;
						}
					else
						{
							$pageid = $objCommon->addPage();
						}
				}
		    $objCommon->pageList();
		    $objCommon->pageFirstList($pageid);
		    $objSmarty->display('pagesList.tpl');
		}
	#Show pAGE lISTING
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'buildpage' ){
			$objCommon = new Common;
			$objCommon->getSubsCripDetails();
			$pagefirstid = $objCommon->getpageDetails($_GET['domainid']);
			$_SESSION['page_id'] = $pagefirstid;
			//$objCommon->pageFirstList($pagefirstid);
			$objCommon->selectPosted();
		 	$objCommon->pageListForList($pagefirstid);
			//$objSmarty->display('buildpagesList.tpl');
			if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
				$objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
			else    
				$objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
				
	}	
	#Show pAGE lISTING
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showPageList' ){
			$objCommon = new Common;
			$_SESSION['page_id'] = $_GET['pageid'];
			$objCommon->getSubsCripDetails();
			$objCommon->getpageDetails($_GET['domainid']);
			//$objCommon->pageFirstList($_GET['pageid']);
			$objCommon->pageListForList($_GET['pageid']);
			$objCommon->listAllTitle($_GET['domainid']);
			//$objSmarty->display('buildpagesList.tpl');
			if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
				$objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
			else    
				$objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
				
	}
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showPostList' ){
        
        $objCommon->listAllTitle($_SESSION['domain_id']);
        $objSmarty->display('listPost.tpl');
    }
	#Update Social Plugin
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateSocialPlugin' ){
			$objCommon = new Common;
			$objCommon->updateSocialPlugin();
		}
	
	#Update Title Details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateTitle' ){
			$objCommon = new Common;
			$objCommon->updateTitle();
		}
	#Show Design Details	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showDesintpl' ){
			$objSmarty->display('designTemplate.tpl');
		}
	#Update Mail Details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateMail' ){
			$objCommon = new Common;
			$objCommon->updateMail();
		}	
	#Update Mail Details
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updatePageList' ){
			$objCommon = new Common;
			//$objCommon->updateCommonPageList();
			$pagelistid = $objCommon->insertPageList();
            $posted=explode(",",$_GET['elementids']);
            foreach($posted as $key=>$val)
            {
                if($val=='000')
                {
                    //$posted[$key]=$pagelistid;
                    $objCommon->updateSortableValueForOrder($pagelistid,$key,$_SESSION['page_id'],$_SESSION['domain_id']);
                }
                else
                {
                    $posted[$key]=preg_replace("/[^0-9]/",'',$posted[$key]);
                    $objCommon->updateSortableValueForOrder($posted[$key],$key,$_SESSION['page_id'],$_SESSION['domain_id']);
                }
            }
			if($_GET['name'] == 'contact_form')
			  $objCommon->insertMailDetailsForContact($_SESSION['user_id'],$pagelistid);
			elseif($_GET['name'] == 'youtube_video')
			  $objCommon->insertYoutubeDetails($_SESSION['user_id'],$pagelistid);
			$_SESSION['page_id'] = $_GET['pageid'];
			$objCommon->getpageDetails($_GET['domainid']);
			$objCommon->pageListForList($_SESSION['page_id']);
            
			if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
			{	
			
                $objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
			}
            else    
				$objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
		}
	#Update Mail Details
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updatePageListForColumn' ){

			$objCommon = new Common;
			//$objCommon->updateCommonPageList();
			$pagelistid = $objCommon->insertPageListForColumn();
            $posted=explode(",",$_GET['elementids']);
			if($_GET['name'] == 'contact_form')
			  $objCommon->insertMailDetailsForContact($_SESSION['user_id'],$pagelistid);
			elseif($_GET['name'] == 'youtube_video')
			  $objCommon->insertYoutubeDetails($_SESSION['user_id'],$pagelistid);
			$_SESSION['page_id'] = $_GET['pageid'];
			$objCommon->getpageDetails($_GET['domainid']);
			//$objCommon->pageFirstList($_GET['pageid']);
			$objCommon->pageListForList($_GET['pageid']);
			//$objSmarty->display('buildpagesList.tpl');
			if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
				$objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
			else    
				$objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
		}
	#Update Page List For Blog
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updatePageListForBlog' ){
			$objCommon = new Common;
			//$objCommon->updateCommonPageList();
			$pagelistid = $objCommon->insertPageListForBlog();
            $posted=explode(",",$_GET['elementids']);
            
            foreach($posted as $key=>$val)
            {
                if($val=='000')
                {
                    //$posted[$key]=$pagelistid;
                    $objCommon->updateSortableValueForOrder($pagelistid,$key,$_SESSION['page_id'],$_SESSION['domain_id']);
                }
                else
                {
                    $posted[$key]=preg_replace("/[^0-9]/",'',$posted[$key]);
                    $objCommon->updateSortableValueForOrder($posted[$key],$key,$_SESSION['page_id'],$_SESSION['domain_id']);
                }
            }
			if($_GET['name'] == 'contact_form')
			  $objCommon->insertMailDetailsForContact($_SESSION['user_id'],$pagelistid);
			elseif($_GET['name'] == 'youtube_video')
			  $objCommon->insertYoutubeDetails($_SESSION['user_id'],$pagelistid);
			$objSmarty->assign('title_id',$_GET['title_id']);
			$objSmarty->assign('title',$_GET['titleforblog']);
			$objSmarty->assign('domain_id',$_GET['domainid']);
			$category =$objCommon->getCategoryForParticularPost($_GET['title_id'],$_GET['domainid'],$_GET['titleforblog']);
			$objCommon->pageListForListBlog($_GET['title_id']);
			$sep_cat=explode(',',$category);
			$objSmarty->assign('category_edit',$sep_cat);
			$objSmarty->display('addtitle.tpl');
			exit();
		}
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updatePageListForBlogColumn' ){
			$objCommon = new Common;			
			$pagelistid = $objCommon->insertPageListForBlogColumn();
			if($_GET['name'] == 'contact_form')
			  $objCommon->insertMailDetailsForContact($_SESSION['user_id'],$pagelistid);
			elseif($_GET['name'] == 'youtube_video')
			  $objCommon->insertYoutubeDetails($_SESSION['user_id'],$pagelistid);
			$objSmarty->assign('title_id',$_GET['title_id']);
			$objSmarty->assign('title',$_GET['titleforblog']);
			$objSmarty->assign('domain_id',$_GET['domainid']);
			$category =$objCommon->getCategoryForParticularPost($_GET['title_id'],$_GET['domainid'],$_GET['titleforblog']);
			$objCommon->pageListForListBlog($_GET['title_id']);
			$sep_cat=explode(',',$category);
			$objSmarty->assign('category_edit',$sep_cat);
			$objSmarty->display('addtitle.tpl');
			exit();
		}
	#Update Font Styling
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updateFontStyle' ){
			$objCommon = new Common;
			$objCommon->updateCommonFontList();
			$_SESSION['page_id'] = $_GET['pageid'];
		}
	#update font for contact form title
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updateFontForContact' ){
			$objCommon = new Common;
			$objCommon->updateCommonFontContact();
			$_SESSION['page_id'] = $_GET['pageid'];
		}
	#Update Remove Styling
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'updateRemoveStyle' ){
			$objCommon = new Common;
			$objCommon->updateCommonRemoveStyle();
			$_SESSION['page_id'] = $_GET['pageid'];
		}
	#Update Theme
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatetheme' ){
			$objCommon = new Common;
			$objCommon->updateTheme();
			$objCommon->updateDomainTheme();
			$themename = $objCommon->getValue('theme_name',$CFG['table']['themeselection'],"domain_id='".$_POST['domain_id']."'");
			$_SESSION['themename'] = strtolower($themename);
			echo "success";
		}	
	#Update Blog
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateblog' ){
			$objCommon = new Common;
			$objCommon->updateBlog();
			$objCommon->updateDomainBlog();
			$_SESSION['themename'] = $objCommon->getValue('blog_name',$CFG['table']['blogselection'],"domain_id='".$_POST['domain_id']."'");
			echo "success";
		}
	#Update Store
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatestore' ){
			$objCommon = new Common;
			$objCommon->updateStore();
			$objCommon->updateDomainStore();
			$_SESSION['themename'] = $objCommon->getValue('store_name',$CFG['table']['storeselection'],"domain_id='".$_POST['domain_id']."'");
			echo "success";
		}
	#Update Desc Details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateDesc' ){
			$objCommon = new Common;
			$objCommon->updateDesc();
		}
	#Update Desc Details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateTitleForContactForm' ){
			$objCommon = new Common;
			$objCommon->updateTitleForContactForm();
		}
	#Blog publish process
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'BlogPublish')
    {
        $objCommon = new Common;
        $sep_cat=array();
		if($_POST['category'])
	 	$cat=implode(',',$_POST['category']);	
        $objCommon->updateTitleWithoutDrafts($_POST['domain_id'],$_POST['titlename'],$_POST['title_id'],$cat);
        $objCommon->categoryPublishProcess($_POST['domain_id']);  
        $objCommon->blogPostTitlePublishProcess($_POST['domain_id']);                                 
        $objCommon->pageListPublishProcess($_POST['domain_id']);               
        $objCommon->googleImagePublishProcess($_POST['domain_id']);
        $objCommon->galleryImagePublishProcess($_POST['domain_id']);
        $objCommon->sliderImagePublishProcess($_POST['domain_id']);
        $objCommon->bannerSliderImagePublishProcess($_POST['domain_id']);
        $objCommon->singleImagePublishProcess($_POST['domain_id']);
        $objCommon->imageTextPublishProcess($_POST['domain_id']);  
        $objCommon->FilesPublishProcess($_POST['domain_id']);
        $objCommon->DocumentPublishProcess($_POST['domain_id']);
        $objCommon->contactFormPublishProcess($_POST['domain_id']);       
        $objCommon->youtubePublishProcess($_POST['domain_id']);
        
        $domain_name_arry = $objCommon->getMultiValue('subdomainurl, domain_type',$CFG['table']['temp_domaindetails'],"domain_id='".$_POST['domain_id']."'");
        $domain_name      = $domain_name_arry[0]['subdomainurl'];
        echo 'succes|@|'.$domain_name;
        
    }
    
    #Update date of posttitles
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="updatepostdate")
    {
        $date= date_format(new DateTime($_POST['date']),'Y-m-d');
        $objCommon->UpdatePostDate($date);
    }
	#Update Delete Details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteDetails' ){
			$objCommon = new Common;
            $seldom = "SELECT theme_id, blog_id, store_id FROM ".$CFG['table']['temp_domaindetails']." WHERE domain_id='".$_REQUEST['domain_id']."'";
            //$domain_ids = $objCommon->ExecuteQuery($seldom,'select');
            $domain     = mysql_query($seldom);
            $domain_ids = mysql_fetch_assoc($domain);
            
        	if($domain_ids[0]['theme_id	']!="" && $domain_ids[0]['theme_id']!=0)
            {
                $domain_type     = 'SITE';
            }
            if($domain_ids[0]['blog_id']!="" && $domain_ids[0]['blog_id']!=0)
            {
                $domain_type     = 'BLOG';
            }
            if($domain_ids[0]['store_id']!="" && $domain_ids[0]['store_id']!=0)
            {
                $domain_type     = 'STORE';
            }
            global $domain_type;
			if($_POST['name'] == 'image_select' || $_POST['name'] == 'column_show')
				{
					$objCommon->deleteImageDetails('single',$_POST['page_list_id']);
					$objCommon->deleteDetails();		
				}
			elseif($_POST['name'] == 'image_multiple_select' || $_POST['name'] == 'column_show')
				{
					$objCommon->deleteImageDetailsImageTxt('singletext',$_POST['page_list_id']);
					$objCommon->deleteDetails();		
				}
			elseif($_POST['name'] == 'contact_form' || $_POST['name'] == 'column_show')
				{
					$objCommon->deleteContactForm();
					$objCommon->deleteDetails();		
				}
			elseif($_POST['name'] == 'social_plugins' || $_POST['name'] == 'column_show')
				{
					$objCommon->deleteSocialPlugins();
					$objCommon->deleteDetails();		
				}
			elseif($_POST['name'] == 'youtube_video' || $_POST['name'] == 'column_show')
				{
					$objCommon->deleteYoutubevideo();
					$objCommon->deleteDetails();		
				}
            elseif($_POST['name'] == 'google_adsense' || $_POST['name'] == 'column_show')
                {
                    $objCommon->deleteGoogleImages();
					$objCommon->deleteDetails();	
                }
            elseif($_POST['name'] == 'gallery' || $_POST['name'] == 'column_show')
                {
                    $objCommon->deleteGalleryImages();
					$objCommon->deleteDetails();	
                }
            elseif($_POST['name'] == 'slider' || $_POST['name'] == 'column_show')
                {
                    $objCommon->deleteSliderImages();
					$objCommon->deleteDetails();	
                }
            elseif($_POST['name']=='file' || $_POST['name'] == 'column_show')
                {
                    $objCommon->deleteFile();
                    $objCommon->deleteDetails();
                    
                }
            elseif($_POST['name']=='document' || $_POST['name'] == 'column_show')
                {
                    $objCommon->deleteDoc();
                    $objCommon->deleteDetails();  
                   
                } 
             elseif($_POST['name'] == 'column_image_show')
				{
					$objCommon->deleteColumnTextImageDetails();
					$objCommon->deleteDetails();		
				}   
			else
			  $objCommon->deleteDetails();
              
			$_SESSION['page_id'] = $_POST['page_id'];
            if($_POST['blog_status'] == '1')
                {
                    $objCommon->getpageDetails($_POST['domain_id']);
                    $objCommon->pageListForList($_POST['page_id']);
                }
			$objCommon->getpageDetails($_POST['domain_id']);
			$objCommon->pageListForList($_POST['page_id']);
			//$objSmarty->display('buildpagesList.tpl');
			if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
				$objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
			else    
				$objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
                exit;
		}
	
	#Update Image Title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateImageTitle' ){
			$objCommon = new Common;
			$objCommon->updateImageTitle();
		}
	#Contact Form Show Process.
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'contactFormDetails' ){
			$objCommon->showContactFormDetails();
			$objSmarty->display('contactFormDetails.tpl');
		}
	
	#Contact Form Update Process.
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatecontactFormDetails' ){
			$objCommon->updatecontactFormDetails();
			$_SESSION['page_id'] = $_POST['page_id'];
			$objCommon->getpageDetails($_POST['domain_id']);
			$objCommon->pageListForList($_POST['page_id']);
			$isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
            if($isblog>0)
            {
                echo "BLOG";
            }
		}
	#this used for get individual form details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'getcontactFormDetails' ){
			$objCommon = new Common;
			$objCommon->getContactDetails($_POST['id']);
			$objSmarty->display('showFormIndividual.tpl');
		}
	#this function used for delete contact form details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deletecontactFormDetails' ){
			$objCommon = new Common;
			$objCommon->deleteContactDetails($_POST['id']);
			$objCommon->getParicularDomainDetails($_POST['domain_id']);
			$objCommon->listFormDetailsDetails($_POST['domain_id']);
			$objSmarty->display('formthemeentries.tpl');
		}
	#this function used for sorting process details
	if(isset($_POST['pages']) && !empty($_POST['pages'])){
			$objCommon = new Common;
			parse_str($_POST['pages'], $pageOrder);
			foreach($pageOrder['page'] as $key=>$val)
				{
					$objCommon->updateSortableValueForOrder($val,$key,$_SESSION['page_id'],$_SESSION['domain_id']);
				}
		}
	#this function used for publish the page
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'publishPage' ){
			$objCommon = new Common;
			$objCommon->updatePublishPage();
			$domain_name_arry = $objCommon->getMultiValue('subdomainurl, domain_type, sd_password',$CFG['table']['temp_domaindetails'],"domain_id='".$_POST['domain_id']."'");
            $domain_name      = $domain_name_arry[0]['subdomainurl'];
            if($domain_name_arry[0]['domain_type'] == 'PD')
                {                    
                    $domain_name_val  = $domain_name_arry[0]['subdomainurl'];
                    $domain_name_val = str_replace("http://","www.",$domain_name_val);
                    $domain_name_val = str_replace("https://","www.",$domain_name_val);
                    #echo $domain_name_val;
                    $domain_ipaddress = gethostbyname($domain_name_val);
                      
            #echo "<pre>"; print_r($_SERVER); echo "</pre>"; 
            #echo    $domain_ipaddress."    ".$_SERVER['SERVER_ADDR'];  
   
                    if($domain_ipaddress != $_SERVER['SERVER_ADDR']) 
                        {echo "Not Ready|@|".$domain_name."|@|".$domain_name_arry[0]['sd_password']."";exit;}
                    elseif($domain_ipaddress == $_SERVER['SERVER_ADDR'])
                        {echo "success|@|".$domain_name."|@|".$domain_name_arry[0]['sd_password']."";exit;}
                }
             else  
                {
                    echo "success|@|".$domain_name."|@|".$domain_name_arry[0]['sd_password']."";exit;
                }    
		}
	#this function used for update title while it show and hide
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatetitleforshow' ){
			$objCommon = new Common;
			$objCommon->updateTitleforheaderlogo();
			echo "success";
		}
	#this function used for update heading content in top
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateheading' ){
			$objCommon = new Common;
			$objCommon->updateHeading();
			echo "success";
		}
	
	#this function used for update heading description in top
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateheadingdescription' ){
			$objCommon = new Common;
			$objCommon->updateheadingdescription();
			echo "success";
		}
	#this function used for Update Font Style  For Each
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateFontForEach' ){
			$objCommon = new Common;
			if($_POST['fontochange'] == 'main_title_font_style')
				$objCommon->updateCommonFontForEachPagelist('title_select');
			elseif($_POST['fontochange'] == 'main_paragraph_font_style')
				$objCommon->updateCommonFontForEachPagelist('description_select');
			elseif($_POST['fontochange'] == 'main_imagetitle_font_style')
				$objCommon->updateCommonFontForEachPagelist('image_multiple_select');
			elseif($_POST['fontochange'] == 'main_title_line_size')
				$objCommon->updateCommonFontForEachPagelist('title_select');
			elseif($_POST['fontochange'] == 'main_paragraph_line_size')
				$objCommon->updateCommonFontForEachPagelist('description_select');
			elseif($_POST['fontochange'] == 'main_imagetitle_line_size')
				$objCommon->updateCommonFontForEachPagelist('image_multiple_select');
			elseif($_POST['fontochange'] == 'main_imagetitle_font_size')
				$objCommon->updateCommonFontForEachPagelist('image_multiple_select');
			elseif($_POST['fontochange'] == 'main_title_font_size')
				$objCommon->updateCommonFontForEachPagelist('title_select');
			elseif($_POST['fontochange'] == 'main_paragraph_font_size')
				$objCommon->updateCommonFontForEachPagelist('description_select');
			else
				$objCommon->updateCommonFontForEach();
		}
	#this used for get draft details
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'getdraftDetails' ){
			$objCommon = new Common;
			$objCommon->getDraftsDetails($_POST['domain_id']);
			$objSmarty->display('draftList.tpl');
		}
	
	#Post A Comment
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'insertleave')
		{
		  	$objCommon->InsertAComment();
			if ($objCommon->getNotifyMe() == 'Yes')
			  $objCommon->sendMailToCommentedUser();
              echo "Başarılı|@|";
              echo "<span style='color:green'>Teşekkürler. Yorumunuz gönderildi.</span>";	
			 
		}
	
	#Get A Font Size.
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'getFontSize')
		{
			$objCommon->getFontSize();
			echo "sucess";
		}
		
	#Update Logo Size
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateLogoImg')
		{
			$objCommon->updateLogoImg();	
			echo "sucess";exit;
		}
	#Update Logo Size
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateLogoImgPos')
		{
			$objCommon->updateLogoImgPos();	
			echo "sucess";exit;
		}
	#Update Youtube Video
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateUtubeVideo')
		{
			$objCommon->updateUtubeVideo();	
			echo "sucess";exit;
		}
	#Post A Reply
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'insertreply')
		{
			$objCommon->InsertAComment();
			if ($objCommon->getNotifyMe() == 'Yes')
			  $objCommon->sendMailToCommentedUser();	
			echo "Başarılı|@|";
            echo "<span style='color:green'>Teşekkürler. Yorumunuz gönderildi.</span>";	
		}
	#ADD comment 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'catInpostPage')
		{
			//$sep_cat=array();
			$last_insert_id=$objCommon->InsertCategory();
			$sep_cat=explode(',',$last_insert_id.',');
			$objSmarty->assign('category_edit',$sep_cat);
			$objSmarty->display('selectCat.tpl');
			
		}
	#ADD comment 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'postListed')
		{
			$objCommon->selectPosted();
			$objSmarty->display('listPost.tpl');
		}
	#this function used for update heading content in top
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatetitleIndex' ){
			$objCommon = new Common;
			$objCommon->updateTitleInIndex();
			echo "success";
		}
	#this function used for get subdomain url
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'getDomainUrlFromDomDet' ){
			$sub=$objCommon->getSubdomainName($_POST['domain_id']);
            
            //echo $sub;
            if($sub[0]['domain_type'] == 'SD')
                {
                    $subname= explode(".",$sub[0]['subdomainurl']);
        			$name   = explode("//",$subname[0]);
        			echo $name[1]."^^^".$sub[0]['domain_type'];
                }	
            else if($sub[0]['domain_type'] == 'PD')  
                {                    
                    $pointdomain = str_replace("http://","",$sub[0]['subdomainurl']);
                    $pointdomain = str_replace("https://","",$pointdomain);
                    echo $pointdomain."^^^".$sub[0]['domain_type'];
                }   
		}
	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addPointDomain'){
		$objCommon	= new Common();
		$objCommon->addPointDomain();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'resetAccount'){
		$objCommon	= new Common();
		$objCommon->resetLinkSendToUsers();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'forgtPass'){
		$objCommon	= new Common();
		$objCommon->EmailForForgotUser();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changePassw'){
		$objCommon	= new Common();
		$objCommon->resetPasswordAndChangeStatus();
	}
	
	#Update Logo Size
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateImgForPage')
		{
			$objCommon->updateImgForPage();	
			echo "sucess";exit;
		}
	
	#Update Logo Size
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'delImgforGallery')
		{
			$objCommon->delImgforGallery();
            $objCommon->getGalleryImageNew($_POST['page_list_id']);            
            $objSmarty->display('galleryPopup.tpl');	           
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'delImgforColumnGallery')
		{
			$objCommon->delImgforGallery();
            $objCommon->getGalleryImageNew($_POST['page_list_id']);
            
            $objSmarty->display('galleryPopupColumn.tpl');	           
			exit;
		}
	
	#delete images for pages slider
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'delImgforSlider')
		{
			$objCommon->delImgforSlider();	
            $objCommon->getSliderImageNew($_POST['page_list_id']);
            $objCommon->pageListForList($_SESSION['page_id']);
            $objSmarty->display('sliderPopUp.tpl');
			//echo "sucess";exit;
		}
       
    #Delete column images
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'delImgforSliderColumn')
		{
		 	$objCommon->delImgforSlider();	
            $objCommon->getSliderImageNew($_POST['page_list_id']);
            $objCommon->pageListForList($_SESSION['page_id']);
            $objSmarty->display('sliderPopUpColumn.tpl');
			//echo "sucess";exit;
		}
   #delete slider banner image
   if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteImageForSliderBanner')
		{
			$objCommon->delImgforSliderBanner();
            $objCommon->getBannerSliderImage($_POST['domain_id'],$_POST['status']);	
			$objSmarty->display('sliderPopUpBanner.tpl');
		}
	
	#Update Domain Background Process
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeBackgroundEnable')
		{
			$objCommon->updateBackgroundEnable();	
			echo "sucess";exit;
		}
	
	#Update Domain Background Process
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateMapProcess')
		{
			$objCommon->updateMapProcess();	
			//echo "sucess";
            exit;
		}
	#Update Gallery Process
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateGalleryProcess')
		{
			$objCommon->updateGalleryProcess();	
			echo "sucess";exit;
		}
	#Update Google script process
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateTableScriptGoogle')
		{
			$objCommon->updateGoogleScriptProcess();	
			echo "sucess";exit;
		}
	#Update Logo Size
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'delImgforGoogle')
		{
			$objCommon->delImgforGoogle();	
			echo "sucess";exit;
		}
		#Update Google url for image process
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateurlforgoogle')
		{
			$objCommon->updateUrlForGoogle();	
			echo "sucess";exit;
		}
		
			#Update Google footer content to show in footer
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateFooterContent')
		{
			$objCommon->updateFooterContent();	
			echo "sucess";exit;
		}
	
		#Show sub pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'listPage' ){
			$objCommon = new Common;
		    $pageid = $objCommon->pageList();
		    $objSmarty->display('subPageList.tpl');
				
	}
	#Show sub pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showsubPage' ){
			$objCommon = new Common;
		    $pageid = $objCommon->pageListForDropDown();
		    $objCommon->pageFirstList($pageid=0);
		    $objSmarty->display('subAddPageList.tpl');
				
	}
	#Add sub pAGE lISTING
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addSubPage' ){
			$objCommon = new Common;
            $objSite = new Site;
			$subsdetails = $objCommon->getSubsCripDetails();
			if($subsdetails[0]['subs_monthly_date']  <= date('Y-m-d'))
				{
					//echo 'success|@|subscription.php';exit;
                    echo 'success|@|'.$objSite->redirectInAjax('subscription.php?domain_id='.$_POST['domainid'].'&inv=invoice','subscription/'.$_POST['domainid'].'/invoice');
                    exit;
				}
			else
				{
					$pageid = $objCommon->addSubPage();
				}
		    /*$objCommon->pageListForDropDown();
		    $objCommon->pageFirstList($pageid);
		    $objSmarty->display('subAddPageList.tpl');*/
		    $objCommon->pageList();
		    $objCommon->pageFirstList($pageid);
		    $objSmarty->display('pagesList.tpl');
		}
		#Show pAGE lISTING
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showSubPagelist' ){
			$objCommon = new Common;
			$objSmarty->assign('pageaction',$_GET['action']);
			$objCommon->pageListForDropDownGet();
			$objCommon->pageFirstList($_GET['page_id']);
			$objSmarty->display('subAddPageList.tpl');
				
	}	
	#Redirect Subscription Page
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'redirectSubscribe')
		{
		    $objSite = new Site;
			$_SESSION['domain_id'] = $_POST['domain_id'];
			$pagefirstid = $objCommon->getpageDetails($_POST['domain_id']);
			$_SESSION['page_id'] = $pagefirstid;
			//echo 'subscription.php';exit;
            echo $objSite->redirectInAjax('subscription.php','subscription');
            exit;
		}
	//used for show setting page tab with changed site title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showSettingTab')
		{
			$objCommon = new Common;			
			$objCommon->getCurrentDomainDetails();
			$objSmarty->display('settingsPageReplace.tpl');
			exit;
			 
		}
	//used for show store page tab with changed site title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showStoreTab')
		{
			$objCommon = new Common;            
			#$objSmarty->display('storePageReplace.tpl');
			exit;
			 
		}
	
	//used for show store page tab with changed site title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'productList')
		{
			$objCommon = new Common;
            $objCommon->getStoreCurrencysymbol($_SESSION['domain_id']);
			$objSmarty->display('productList.tpl');
			exit;			 
		}
	//used for show store page tab with changed site title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addProductList')
		{
			$objCommon = new Common;
			$prod_id = $objCommon->insertProductStore();
			$objCommon->getProductListForStore($prod_id);
			$objSmarty->display('addProductList.tpl');
			exit;
			 
		}
	//used for show store page tab with changed site title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveProdList')
		{
			$objCommon = new Common;
			$prod_id = $objCommon->updateProductStore();
			$objSmarty->display('productList.tpl');
			exit;
		}	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteProduct')
		{
			$objCommon = new Common;
			$objCommon->deleteProductStore();
			$objSmarty->display('productList.tpl');
			exit;
		}	
	//used for show store page tab with changed site title
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editProduct')
		{
			$objCommon = new Common;
			$objCommon->getProductListForStore($_POST['prod_id']);
            $objCommon->getProdOptions($_POST['prod_id']);
			$objCommon->getProductImageStore($_POST['prod_id']);
			$objCommon->getProductOption($_POST['prod_id']);
			$objSmarty->display('addProductList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'searchProduct')
		{
			$objCommon = new Common;
			$objCommon->searchProductListForStore();
			$objSmarty->display('searchproductList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateColumncount')
		{
			$objCommon = new Common;
			$objCommon->updateColumncount();
			$objCommon->getSubsCripDetails();
			$objCommon->getpageDetails($_SESSION['domain_id']);
			//$objCommon->pageFirstList($_GET['pageid']);
			//$objCommon->pageListForList($_SESSION['page_id']);
            $objCommon->getPagelist_ColumnCount($_POST['page_list_id']);
			$objCommon->listAllTitle($_SESSION['domain_id']);
			//$objSmarty->display('buildpagesList.tpl');
            $objSmarty->assign('action','updateColumncount');
            $objSmarty->assign('objCommon',$objCommon);
           	$objSmarty->display('ajaxAction.tpl');
			//if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
				//$objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
		//	else    
			//	$objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'delProdImg')
		{
			$objCommon = new Common;
			$objCommon->deleteProductImg();
			$objCommon->getProductListForStore($_POST['prod_id']);
			$objCommon->getProductImageStore($_POST['prod_id']);
			$objSmarty->display('addProductList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addOption')
		{
			$objCommon = new Common;
			$objCommon->insertOptionList();
			$objCommon->getProductOption($_POST['prod_id']);
			$objSmarty->display('OptionList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatePriceOption')
		{
			$objCommon = new Common;
			$objCommon->updatePriceOption();
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deletePriceOption')
		{
			$objCommon = new Common;
			$objCommon->deletePriceOption();
			$objCommon->getProductOption($_POST['prod_id']);
			$objSmarty->display('OptionList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editPriceOption')
		{
			$objCommon = new Common;
			$objCommon->getEditProductOption($_POST['product_id']);
			$objSmarty->display('editOptionList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteOption')
		{
			$objCommon = new Common;
			$objCommon->deleteOptionList();
			$objCommon->deleteChoiceList();
			//exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showSetting')
		{
			$objCommon = new Common;
			$objCommon->getCurrency();
			$objSmarty->display('settingstorePageReplace.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'goBack')
		{
			$objCommon = new Common;
			#$objSmarty->display('storePageReplace.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addStoreInformation')
		{
			$objCommon = new Common;
			$objCommon->getCurrency();
			$objCommon->insertStoreInfo();
			$objSmarty->display('storeSettingList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addtaxInformation')
		{
			$objCommon = new Common;
			$objCommon->insertTaxInfo();
			$objSmarty->display('storeTaxList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'paypalInformation')
		{
			$objCommon = new Common;
			$objCommon->insertPaypalInfo();
			$objSmarty->display('checkoutList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addShipInformation')
		{
			$objSmarty->display('addShippinglist.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'insertShipInformation')
		{
			$objCommon = new Common;
			$objCommon->insertShipInformation();
			$objSmarty->display('storeShipingList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteShipInformation')
		{
			$objCommon = new Common;
			$objCommon->deleteShipInformation();
			$objSmarty->display('storeShipinglist.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editShipInformation')
		{
			$objCommon = new Common;
			$objSmarty->display('addShippinglist.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateShipInfo')
		{
			$objCommon = new Common;
			$objCommon->updateShipInfo();
			$objSmarty->display('storeShipingList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateanalyticsInfo')
		{
			$objCommon = new Common;
			$objCommon->updateanalyticsInfo();
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updatewidthvalofcolumn')
		{
			$objCommon = new Common;
			$objCommon->updatewidthvalofcolumn();
			exit;
		}
	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'saveStoreOrderFooter')
		{
			$objCommon = new Common;
			$objCommon->updateStoreOrderFooter();
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateBuyPrice')
		{
			$objCommon = new Common;
			$_SESSION['ship_value'] = $_POST['ship_value'];
			$_SESSION['sale_price'] = ($_POST['sale_price'] - $_POST['ship_value']);
			$buyprice = $objCommon->buyPriceforProductList($_POST['sale_price'],$_POST['domain_id']);
			echo base64_encode($buyprice).'/'.base64_encode($_POST['domain_id']).'/'.base64_encode($_POST['product_id']);
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateShipPrice')
		{
			$objCommon = new Common;
			$buyprice = $objCommon->buyPriceforProductList($_POST['sale_price'],$_POST['domain_id']);
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'setSessionPay')
		{
			$objCommon = new Common;
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['address'] = $_POST['address1'];
			$_SESSION['state'] = $_POST['state'];
			$_SESSION['city'] = $_POST['city'];
			$_SESSION['country'] = $_POST['country'];
			$_SESSION['phoneno'] = $_POST['phone_no'];
			$_SESSION['zipcode'] = $_POST['zip'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['sub_tot'] = $_POST['sub_tot'];
			$_SESSION['tax_val'] = $_POST['tax_val'];
			$_SESSION['ship_val'] = $_POST['ship_val'];
			$_SESSION['grand_tot'] = $_POST['grand_tot'];
			$_SESSION['domain_id'] = $_POST['domain_id'];
			exit;
		}
	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'orderList')
		{
			$objCommon = new Common;
            $objCommon->getStoreCurrencysymbol($_SESSION['domain_id']);
			$objSmarty->display('orderList.tpl');
			exit;
		}
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateOrderStatus')
		{
			$objCommon = new Common;
			$objCommon->updateOrderStatus();
			$objSmarty->display('orderList.tpl');
			exit;			 
		}
    #delete point domain
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deletepointdoamin')
		{
			$objCommon = new Common;
			$objCommon->deletePintDomain();	 
		}  
     #delete new domain     
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deletenewdoamin')
		{
			$objCommon = new Common;
			$objCommon->deleteNewDomain();	 
		} 
       #slider function to show in buildpage list slider drag pop up    
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'sliderFunction')
		{
			$objCommon = new Common;
			$objCommon->getSliderImageNew($_POST['page_list_id']);
            //$objCommon->pageListForList($_SESSION['page_id']);
            $objSmarty->display('sliderPopUp.tpl');	 
		} 
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'galleryFunction')
		{
			#$objCommon = new Common;
		    $objCommon->getGalleryImageNew($_POST['page_list_id']);
            //$objCommon->pageListForList($_SESSION['page_id']);
           
            $objSmarty->display('galleryPopup.tpl');	 
		}    
     if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'galleryFunctionColumn')
		{
			$objCommon = new Common;
			$objCommon->getGalleryImageNew($_POST['page_list_id']);
            //$objCommon->pageListForList($_SESSION['page_id']);
            $objSmarty->display('galleryPopupColumn.tpl');	 
		}    
          #slider column  function to show in buildpage list column slider drag pop up    
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'sliderFunctionColumn')
		{
			$objCommon = new Common;
			$objCommon->getSliderImageNew($_POST['page_list_id']);
            //$objCommon->pageListForList($_SESSION['page_id']);
            $objSmarty->display('sliderPopUpColumn.tpl');	 
		}
     //Add anewdomain            
     if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'newdomainAdd'){
		$objCommon = new Common;
		$objCommon->addNewDomain();
	}
    //reload a pagelist
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'reloadPageList'){
		$objCommon = new Common;
		$objCommon->pageListForList($_SESSION['page_id']);
        $objCommon->getSubsCripDetails();	    
			if(isset($_SESSION['themename']) && !empty($_SESSION['themename']) && file_exists($CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl"))
			{	
                $objSmarty->display( $CFG['site']['tpl_path']."/".$_SESSION['themename']."/buildpagesList.tpl");
			}
            else 
            {
               $objSmarty->display($CFG['site']['tpl_path']."/"."buildpagesList.tpl");
            }  			
	}       
    #.............................................................................................
    //Update image alignment
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="updateImgAlign")
    {
        $objCommon = new Common;
        $objCommon->updateImageAlign();
    }
    #...............................................................................................
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="CaptchaValid")
    {
        $formcode   = $_POST['formcode'];
        if($_SESSION['captcha'.$formcode]==$_POST['captcha'])        
            echo 'valid';        
        else        
            echo 'invalid';        
    }  
    #...............................................................................................
    //Update image alignment
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="subdomainPasswordChecking")
    {
        $objCommon = new Common;
        $objCommon->checkDomainPassword();
    }
    
    
   if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'singleImageShow')
		{
			$objCommon = new Common;
            $isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
            if($isblog>0)
            {
                $objSmarty->assign("isBlog","Y");;
            }
		    $objCommon->getImage($_REQUEST['page_list_id']);      
            $objSmarty->display('singleImagePopup.tpl');	 
		}
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'ImagetxtShow')
		{
			$objCommon = new Common;
            $isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
            if($isblog>0)
            {
                $objSmarty->assign("isBlog","Y");;
            }
		    $objCommon->getImageText($_REQUEST['page_list_id']);      
            $objSmarty->display('ImageTxtPopup.tpl');	 
	}
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="deleteLibraryImage" )
    {        
        $objCommon->deleteImage_Library();
    }
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="showcontactfieldpopup" )
    {
        $objSmarty->display('contactform_fields_popup.tpl');
    }
#Contact Form fields Show Process.
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'contactFormFieldDetails' )
    {
		$objCommon->getContactFormFields($_SESSION['domain_id'],$_POST['page_list_id']);            
		$objSmarty->display('contactFormFieldDetails.tpl');
        
	}
#add contact form fields
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="AddContactFields" )
{
    $objCommon  = new Common;
    $objCommon->AddContactFormField($_POST['page_list_id']);
    $isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
    if($isblog>0)
    {
        echo "BLOG";
    } 
}
    #Up[date contact form fields
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="UpdatecontactFields" )
    {
        $objCommon  = new Common;    
        $isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
            
        $objCommon->UpdateContactFormField($_POST['page_list_id']);
        if($isblog>0)
        {
            echo "BLOG";
        } 
    }
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="getOptionFrom" )
    {   
        $objSmarty->assign('action','getOptionFrom');
        $objSmarty->assign('formtype',$_POST['type']);
        $objSmarty->display('ajaxAction.tpl');
    }          
    #Delete custome fields
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="deleteCustomeField" )
    {        
        $objCommon  = new Common;
        $objCommon->deleteCustomeFields();
    }
    #Upload image from image library
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="UploadImage_Library")
    {
        $objCommon  = new Common;                
        $objCommon->uploadImage_Library();          
        $isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
        if($isblog>0)
        {
            echo "BLOG";
        }       
    }
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="changeBackgroundColoroff" )
    {
        $objCommon  = new Common;
        $objCommon->ChangeBackgrounfColoroff();
    }    
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=="buydomainInvoiceStore" )
    {
        $objCommon  = new Common;
        $objCommon->buydomainInvoiceStoreDetails();
    } 
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'columnImageShow')
	{
		$objCommon = new Common;
        $isblog=$objCommon->getValue('blog_id',$CFG['table']['temp_domaindetails'],"domain_id='".$_SESSION['domain_id']."'");
        if($isblog>0)
        {
            $objSmarty->assign("isBlog","Y");;
        }
	    $objCommon->getImage($_REQUEST['page_list_id']);      
        $objSmarty->display('columnImagePopup.tpl');	 
	}
	#Update Title in column image with text
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateTilte_columnImage' ){
		$objCommon = new Common;
		$objCommon->updateTilte_columnImage();
	}

	#Update Desc in column image with Desc
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateDesc_columnImage' ){
		$objCommon = new Common;
		$objCommon->updateDesc_columnImage();
	}


?>