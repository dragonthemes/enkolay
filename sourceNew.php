<?php

/**
 * @author krishnaveni
 * @copyright 2014
 */
 
include("includes/subconfig.inc.php");
$objSite->languageSession();

#.............................................................................................
if($_GET['pageurl'] == 'admincp')
	{
		if($_SESSION['adminid'])
			$objSite->redirectUrl('index.php');
		else
			$objSite->redirectUrl('login.php');	
	}
//krishnaveni for base url
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
        $domein = str_replace('http://', '', $domein); 
        if ($domein != "enkolayweb.com" && $domein!="localhost" )
            $baseurl = "http://".$domein;
        else    
            $baseurl = $CFG['site']['subdomain_url'];
    } 
       
    $domain_check = $objSite->getMultiValue("domain_id, publish, payment_status, domain_type, validtodate, expire_grace_period",$CFG['table']['domaindetails'],"subdomainurl = '".$objSite->filterInput($baseurl)."' ");
   
    $domain_id=$domain_check[0]['domain_id'] ;         
    if($domain_id == "" )
		{
			$url = $CFG['site']['base_url']."/error.html";
			$objSite->redirectUrl($url);
		}
    else if($domain_check[0]['publish'] == 'N')    
        {
            $url = $CFG['site']['base_url']."/notPublish.html";
			$objSite->redirectUrl($url);
        }
    else
        {
            $domain_values =$objCommon->getDetailOfDomain($domain_id);
            #$CFG['site']['sub_domain_id']= $domain_id;
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
                
$objCommon->listAllTitle($domain_id);
//for get page names in source file
$objCommon->getPageNameForSource($domain_id);

//for get page details in source file for default page
if($_GET['pageurl'])
	$pagefirstid=$objCommon->getpageDetailsForSelectedPage($_GET['pageurl'],$domain_id);
else
 	$pagefirstid = $objCommon->getpageDetails($domain_id);	    
    
if(trim($pagefirstid) == '')  
    {    
        $url = $CFG['site']['base_url']."/error.html";            
        $objSite->redirectUrl($url);       
    }  

$_SESSION['page_id']=$pagefirstid;

$objCommon->pageFirstWithPublish($pagefirstid);

#$objCommon->selectnewCart();

if(isset($domain_values) && $domain_values[0]['store_id'] != '' && $domain_values[0]['store_id'] != 0 )    
    $objCommon->selectCartDetails($domain_id);

 
if($domain_values)
	{
		$objCommon->listPost($domain_id);
		$themecolorname = $objCommon->getMultiValue('blog_name, blog_color',$CFG['table']['blogselection'],"domain_id='".$domain_id."'");
        $themename      = $themecolorname[0]['blog_name'];
		$objSmarty->assign('themecolorname',$themecolorname[0]['blog_color']);
	}
else
	{
		$themecolorname = $objCommon->getMultiValue('theme_name, theme_color',$CFG['table']['themeselection'],"domain_id='".$domain_id."'");
        $themename      = $themecolorname[0]['theme_name'];
		$objSmarty->assign('themecolorname',$themecolorname[0]['theme_color']);
	}
     
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'commoncontact')
	{
		//$ok= $objCommon->sendMailToContactForm($domain_id);
        
		$objCommon->CommonContactInsertion($domain_id);		
        echo "Teşekkür ederim. Bilgileriniz gönderildi";
	 	exit();
	}
 
$objSmarty->assign('objCommon',$objCommon);
 if($themename != '' && file_exists($CFG['site']['tpl_path']."/".$themename."/sourceNew.tpl"))   
   $objSmarty->display($CFG['site']['tpl_path']."/".$themename."/sourceNew.tpl");                                               
else    
   $objSmarty->display('sourceNew.tpl'); 
?>