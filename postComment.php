<?php

/**
 * @author krishnaveni
 * @copyright 2014
 */
 
include("includes/subconfig.inc.php");
$objSite->languageSession();
#.............................................................................................
if($_SERVER['HTTP_X_FORWARDED_HOST'])
	{
		$url = explode(',',$_SERVER['HTTP_X_FORWARDED_HOST']);
		if($url[1])
		 $serverhost_url = trim($url[1]);
		else
		 $serverhost_url = trim($url[0]);
         
         $baseurl = "http://" . $serverhost_url;
     } 
else
    {
        $domein = $_SERVER['HTTP_HOST'];
        $domein = str_replace('www.', '', $domein);
        $domein = str_replace('http://.', '', $domein); 
        if ($domein != "enkolayweb.com" && $domein!="localhost")
            $baseurl = "http://".$domein;
        else    
            $baseurl = $CFG['site']['subdomain_url'];
    } 
       
    #$domain_check = $objSite->getMultiValue("domain_id,publish",$CFG['table']['domaindetails'],"subdomainurl = '".$objSite->filterInput($baseurl)."' "); 
    $domain_check = $objSite->getMultiValue("`domain_id`, `publish`, `payment_status`, `domain_type`, `validtodate`, `expire_grace_period`",$CFG['table']['domaindetails'],"subdomainurl = '".$objSite->filterInput($baseurl)."' ");  
    $domain_id=$domain_check[0]['domain_id'] ;  
           
    if($domain_id == "" )
    	{
    		$url = $CFG['site']['base_url'].'/error.html';
    		$objSite->redirectUrl($url);
    	}
    else if($domain_check[0]['publish'] == 'N')    
        {
            $url = $CFG['site']['base_url'].'/notPublish.html';
    		$objSite->redirectUrl($url);
        }
    else
        {
            $domain_values =$objCommon->getDetailOfDomain($domain_id);
            $CFG['site']['sub_domain_id']= $domain_id;
        }
        
    #subdomain with password production
    if($domain_check[0]['payment_status'] == 'Yes' && $domain_check[0]['validtodate'] < time())
        {          
            $pck_details    = $objSite->getMultiValue("price_id, price_name, price",$CFG['table']['pricemanage'],"price_id IS NOT NULL LIMIT 1");        
	        $pck_details[0]['validtodate'] = $domain_check[0]['expire_grace_period'];
            $objSmarty->assign("pck_details", $pck_details);
        }   
    elseif( isset($domain_check[0]['domain_type']) && $domain_check[0]['domain_type'] == 'SD' &&   $domain_check[0]['payment_status'] != 'Yes' &&  $_SESSION['domain_session'] != $domain_check[0]['domain_id'] )  
        {
            
            $objSmarty->assign("passrequired", '1'); 
        }

/*$url = explode(',',$_SERVER['HTTP_X_FORWARDED_HOST']);
if($url[1])
 $serverhost_url = trim($url[1]);
else
 $serverhost_url = trim($url[0]);

$baseurl = "http://" . $serverhost_url;
//print_r($_GET);
$domain_id = $objCommon->commonFunctionForSingleValue($table=$CFG['table']['domaindetails'],$value='domain_id',$confor='subdomainurl',$baseurl);*/
$domain_id = $CFG['site']['sub_domain_id'];
$objSmarty->assign('domain_id',$domain_id);
$objCommon->getPageNameForSource($domain_id);
$objCommon->ListBlogSettingDetails($domain_id);
#$blog_details =$objCommon->getDetailOfDomain($domain_id);
$objCommon->getCommentForSource($_GET['post_id'],$domain_id);
$objCommon->pageFirstWithPublishForBlog($_GET['post_id']);
$themecolorname = $objCommon->getValue('blog_color',$CFG['table']['blogselection'],"domain_id='".$objSite->filterInput($domain_id)."'");
$objSmarty->assign('themecolorname',$themecolorname);
 
$objSmarty->assign('objCommon',$objCommon);
#.............................................................................................
$objSmarty->display('postComment.tpl'); 
?>