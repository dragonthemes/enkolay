<?php
/**
Author               P.Maheswari
Start Date           17July2012        
Note:
      This is as include file for all the php files
       - setup.php is the parent file
       - included files &  global settings
**/
	require 'setup.php';
	
	date_default_timezone_set("Turkey");
	setlocale(LC_TIME, 'turkish');
	#------------------------------------------------------------------------------------
    #Global declarations
    #$CFG['site']['css_url']						= $CFG['site']['base_url_https']."/css";
    $CFG['site']['js_url']						= $CFG['site']['base_url_https']."/js";
    
    $CFG['site']['include_path']				= $CFG['site']['base_path']."/includes";
    $CFG['site']['include_url']					= $CFG['site']['base_url']."/includes";
    
    $CFG['site']['image_path']					= $CFG['site']['base_path']."/images";
    $CFG['site']['image_url']					= $CFG['site']['base_url']."/images";
    
	$CFG['site']['language_path']			    = $CFG['site']['include_path']."/language";
    $CFG['site']['language_url']			    = $CFG['site']['include_url']."/language";
    
    $CFG['site']['emailtpl_path']			    = $CFG['site']['base_path']."/emailtemplates";
    
    $CFG['site']['photo_theme_path']			= $CFG['site']['base_path']."/uploads/photo_theme";
    $CFG['site']['photo_theme_url']		        = $CFG['site']['base_url']."/uploads/photo_theme";
    
    $CFG['site']['photo_banner_path']			= $CFG['site']['base_path']."/uploads/photo_banner";
    $CFG['site']['photo_banner_url']		    = $CFG['site']['base_url']."/uploads/photo_banner";
    
    $CFG['site']['photo_background_path']	    = $CFG['site']['base_path']."/uploads/photo_background";
    $CFG['site']['photo_background_url']		= $CFG['site']['base_url']."/uploads/photo_background";
    
    $CFG['site']['photo_blog_path']			        = $CFG['site']['base_path']."/uploads/photo_blog";
    $CFG['site']['photo_blog_url']		            = $CFG['site']['base_url']."/uploads/photo_blog";
    
    $CFG['site']['photo_domain_image_path']			= $CFG['site']['base_path']."/uploads/photo_domain_image";
    $CFG['site']['photo_domain_image_url']		    = $CFG['site']['base_url']."/uploads/photo_domain_image";
    
    $CFG['site']['photo_google_image_path']			= $CFG['site']['base_path']."/uploads/photo_google_image";
    $CFG['site']['photo_google_image_url']		    = $CFG['site']['base_url']."/uploads/photo_google_image";
    
    $CFG['site']['photo_product_image_path']		= $CFG['site']['base_path']."/uploads/photo_product_image";
    $CFG['site']['photo_product_image_url']		    = $CFG['site']['base_url']."/uploads/photo_product_image";
    
    $CFG['site']['photo_cat_image_path']			= $CFG['site']['base_path']."/uploads/photo_cat_image";
    $CFG['site']['photo_cat_image_url']		        = $CFG['site']['base_url']."/uploads/photo_cat_image";
    
    

 #------------------------------------------------------------------------------------
    #Table settings
	require_once ($CFG['site']['include_path'].'/DbTablesNames.php');
	#------------------------------------------------------------------------------------
    #Global object for db connections
    $objSite = new Site();
    global $objSite,$CFG,$_lang; 
    $objSite = new Site($db_host="localhost",$db_name="ro@m50ft",$db_user="developer",$db_pwd="P@55w0rd");
    //$CFG['site']['themename'] = $objSite->getValue("theme",$CFG['table']['domain_user'],"domain='".str_replace('www.','',$CFG['site']['base_url'])."'");
    #Included files & global settings
    require_once ('smarty_files.php');
	#------------------------------------------------------------------------------------
    #Inc Smarty files
    #require_once $CFG['site']['include_path'].'/smarty/Smarty.class.php';
    #$objSmarty = new Smarty();       
    
    #Base Path & base Url
    if(isset($_SERVER['HTTP_X_FORWARDED_HOST']) && !empty($_SERVER['HTTP_X_FORWARDED_HOST'])){
    		$url = explode(',',$_SERVER['HTTP_X_FORWARDED_HOST']);
    		if($url[1])
             $serverhost_url = trim($url[0]);
            else
             $serverhost_url = trim($url[0]);
             
             $CFG['site']['base_path1']    = dirname(dirname(__FILE__));
	    	 $CFG['site']['base_url1']     = "http://".$serverhost_url;
	    	 $objSmarty->assign("SITE_SOURCE_BASEPATH",$CFG['site']['base_path1']);
			 $objSmarty->assign("SITE_SOURCE_BASEURL",$CFG['site']['base_url1']);
             $CFG['site']['subdomain_url'] = $CFG['site']['base_url1'];
    	}
    else
    	{
			$objSmarty->assign("SITE_SOURCE_BASEPATH",$CFG['site']['base_path']);
			$objSmarty->assign("SITE_SOURCE_BASEURL",$CFG['site']['base_url']);
            $CFG['site']['subdomain_url'] = $CFG['site']['base_url'];
		}
    
    #echo $CFG['site']['subdomain_url']."  subdomain<br>";
    
        
    $objCommon	= new Common;   
    
    //$objCommon->getPageDetailOfDomain($domain_id);    
	
	$objSmarty->assign("SITE_BASEPATH",$CFG['site']['base_path']);
	$objSmarty->assign("SITE_BASEURL",$CFG['site']['base_url']);
	
	#Css & Js
	$objSmarty->assign("SITE_CSS_URL",$CFG['site']['css_url']);
	$objSmarty->assign("SITE_JS_URL",$CFG['site']['js_url']);
	
	#Image Url
	$objSmarty->assign("SITE_IMAGE_URL",$CFG['site']['image_url']);
	$objSmarty->assign("THEME_NAME",$CFG['site']['themename']);
	$objSmarty->assign("SITE_IMAGE_BANNER_URL",$CFG['site']['photo_theme_url']);
	$objSmarty->assign("SITE_IMAGE_BLOG_URL",$CFG['site']['photo_blog_url']);
	$objSmarty->assign("SITE_BANNER_URL",$CFG['site']['photo_banner_url']);
	$objSmarty->assign("SITE_BACKGROUND_URL",$CFG['site']['photo_background_url']);
	$objSmarty->assign("SITE_DOMAIN_IMAGES_URL",$CFG['site']['photo_domain_image_url']);
	$objSmarty->assign("SITE_GOOGLE_IMAGES_URL",$CFG['site']['photo_google_image_url']);
	$objSmarty->assign("SITE_PRODUCT_IMAGES_URL",$CFG['site']['photo_product_image_url']);
	$objSmarty->assign("SITE_CAT_IMAGES_URL",$CFG['site']['photo_cat_image_url']);    
    
    #$CFG['site']['support_email'] = "info@enkolayweb.com";

	$objSmarty->assign("SITE_DOMAIN_ID",$CFG['site']['domain_id']);                
	
	#------------------------------------------------------------------------------------
	#GET CURRENT FILENAME
	$req_file_name = $objSite->get_file_name();
	#------------------------------------------------------------------------------------
	#Site setting
	$sitesetting = $objSite->getsite_setting();

	#------------------------------------------------------------------------------------
	#Js Global variable
	$objSite->setglobalvarjavascript();
	#------------------------------------------------------------------------------------
	#Header SITE LOGO
	$objSetting	= new Setting;
	$objSetting->selectSiteSetting();
	#------------------------------------------------------------------------------------
	#Common Class Object Creation
	
	#$objCommon->getStaticPages();
	$objCommon->getLanguageNames();
	$objCommon->getThemeImages();
	$objCommon->getBannerImages();
	if($_SESSION['domain_id'])
		$objCommon->getSiteName();
	
	$objAdmin	= new Admin;
	
	$objAdminMgmt	= new AdminManagement;
	$objSmarty->assign('objAdminMgmt', $objAdminMgmt);
	
	$objSmarty->assign('objAdmin', $objAdmin);
	$objSmarty->assign('objSetting', $objSetting);
	$objSmarty->assign('objCommon', $objCommon);
	
	#Header Menu Active Class For Query String URL:
	$query_string	=	$_SERVER['QUERY_STRING'];
	$arr_query		=	explode('=',$query_string);	
	#print_r($arr_query);	
	$objSmarty->assign('querystr',$arr_query[0]);
	$objSmarty->assign('querystrval',$arr_query[1]);
	
	#------------------------------------------------------------------------------------
	if($_GET['seourl'] == 'admincp') $objSite->redirectUrl($CFG['site']['base_url'].'/admincp/login.php');
	#................................................................................................
	function __autoload($class_name){
		global $CFG;
		
		include_once $CFG['site']['include_path']."/classes/class.".$class_name.'.php';
		if (!class_exists($class_name, false)) {
	        trigger_error("Unable to load class: $class_name", E_USER_WARNING);
	    }
	}
?>