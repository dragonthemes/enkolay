<?php 
include("includes/config.inc.php");
#Language
$objSite->languageSession();

#echo "<pre>"; print_r($_SERVER); echo "</pre>";

if($_SERVER['HTTP_X_FORWARDED_HOST'])
	{
		$url = explode(',', $_SERVER['HTTP_X_FORWARDED_HOST']);
		if($url[1])
		 $serverhost_url = trim($url[1]);
		else
		 $serverhost_url = trim($url[0]);
		
		$baseurl = "http://" . $serverhost_url;
		
		#$domain_id = $objCommon->commonFunctionForSingleValue($table=$CFG['table']['domaindetails'],$value='domain_id',$confor='subdomainurl',$baseurl);
        $domain_check = $objSite->getMultiValue("domain_id, publish, payment_status, domain_type",$CFG['table']['domaindetails'],"subdomainurl = '".$objSite->filterInput($baseurl)."' ");
		//print_r($domain_check);
        if($domain_check[0]['domain_id'] == "" )
			{
				$url = $CFG['site']['base_url']."/error.html";
				$objSite->redirectUrl($url);
			}
        else if($domain_check[0]['publish'] == 'N')    
            {
                $url = $CFG['site']['base_url']."/notPublish.html";
    			$objSite->redirectUrl($url);
            }    
            
        $domain_id=$domain_check[0]['domain_id'] ;
        
        #subdomain with password production
        if( isset($domain_check[0]['domain_type']) && $domain_check[0]['domain_type'] == 'SD' &&   $domain_check[0]['payment_status'] != 'Yes' &&  $_SESSION['domain_session'] != $domain_check[0]['domain_id'] )  
                $objSmarty->assign("passrequired", '1');            
        
     	//$objCommon->getPageDetailOfDomain($domain_id);
		$blog_details =$objCommon->getDetailOfDomain($domain_id);
		$objCommon->listAllTitle($domain_id);
		//for get page names in source file
		$objCommon->getPageNameForSource($domain_id);
		
		//for get page details in source file for default page
		if($_GET['pageurl'])
			$pagefirstid=$objCommon->getpageDetailsForSelectedPage($_GET['pageurl'],$domain_id);
		else
		 	$pagefirstid = $objCommon->getpageDetails($domain_id);			
		
		$_SESSION['page_id']=$pagefirstid;
		
		$objCommon->pageFirstWithPublish($pagefirstid);		
		 
		if($blog_details)
			{
				$objCommon->listPost($domain_id);
				$themecolorname = $objCommon->getValue('blog_name, blog_color',$CFG['table']['blogselection'],"domain_id='".$domain_id."'");
                $themename      = $themecolorname[0]['blog_name'];
        		$objSmarty->assign('themecolorname',$themecolorname[0]['blog_color']);
			}
		else
			{
				$themecolorname = $objCommon->getMultiValue('theme_name, theme_color',$CFG['table']['themeselection'],"domain_id='".$domain_id."'");
                $themename      = $themecolorname[0]['theme_name'];
        		$objSmarty->assign('themecolorname',$themecolorname[0]['theme_color']);
			}
		     
		if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == "commoncontact")
			{
				$objCommon->CommonContactInsertion($domain_id);		
				$objCommon->sendMailToContactForm();
				echo "sucess|@|";
				echo "Thanks for given a comments";
				exit();
			}		
		 
		$objSmarty->assign('objCommon',$objCommon);
		 
		#.............................................................................................
		if($themename != '' && file_exists($CFG['site']['tpl_path']."/".$themename."/sourceNew.tpl"))   
           $objSmarty->display($CFG['site']['tpl_path']."/".$themename."/sourceNew.tpl"); 
        else    
           $objSmarty->display('sourceNew.tpl'); 
	}
else
	{
		#.............................................................................................			
		$objCommon->getPriceList();	
		$objSmarty->assign('objCommon',$objCommon);
		if($_SESSION['user_id'])
			{
				#header("Location:userHome.php");
                $objSite->redirect("userHome.php","userhome");
			}
		#.............................................................................................
		#SMARTY ASSIGNING 
		$main_content = $objSmarty->fetch('index.tpl');
		$objSmarty->assign("MAIN_CONTENT", $main_content);
		$objSmarty->display('main.tpl');
	}
?>