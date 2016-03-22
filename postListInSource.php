<?php

/**
 * @author krishnaveni
 * @copyright 2014
 */
 
include("includes/subconfig.inc.php");
$objSite->languageSession();

#.............................................................................................

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
        $domein = str_replace('http://.', '', $domein); 
        if ($domein != "enkolayweb.com" && $domein !="localhost")
            $baseurl = "http://".$domein;
        else    
            $baseurl = $CFG['site']['subdomain_url'];
    } 

    #$domain_id = $objCommon->commonFunctionForSingleValue($table=$CFG['table']['domaindetails'],$value='domain_id',$confor='subdomainurl',$CFG['site']['subdomain_url']);    
    
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

/*$baseurl  = $CFG['site']['subdomain_url'];

$domain_id = $objCommon->commonFunctionForSingleValue($table=$CFG['table']['domaindetails'],$value='domain_id',$confor='subdomainurl',$baseurl);
if($domain_id == "")
	{
		$url = $CFG['site']['base_url']."/error.html";
		$objSite->redirectUrl($url);
	}*/
//$objCommon->getPageDetailOfDomain($domain_id);
#$blog_details =$objCommon->getDetailOfDomain($domain_id);
$domain_id = $CFG['site']['sub_domain_id'];
$objCommon->listAllTitle($domain_id);
//for get page names in source file
$objCommon->getPageNameForSource($domain_id);

//for get page details in source file for default page
 	$pagefirstid = $objCommon->getpageDetails($domain_id);
	
 
$_SESSION['page_id']=$pagefirstid;
 
$objCommon->pageFirstWithPublish($pagefirstid); 
if($domain_values)
	{
		$objCommon->listPostDetBasedCat($domain_id,$_GET['cat']);
		$themecolorname = $objCommon->getValue('blog_color',$CFG['table']['blogselection'],"domain_id='".$objSite->filterInput($domain_id)."'");
		$objSmarty->assign('themecolorname',$themecolorname);
	}
else
	{
		$themecolorname = $objCommon->getValue('theme_color',$CFG['table']['themeselection'],"domain_id='".$objSite->filterInput($domain_id)."'");
		$objSmarty->assign('themecolorname',$themecolorname);
	}
     
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'commoncontact')
	{
		//$ok= $objCommon->sendMailToContactForm();
		//if($ok)
		$objCommon->CommonContactInsertion($domain_id);		
	 	//echo "sucess|@|";
		echo "Teşekkür ederim. Bilgileriniz gönderildi";
		exit();
	}

 
$objSmarty->assign('objCommon',$objCommon);
 
#.............................................................................................
$objSmarty->display('postListInSource.tpl'); 
?>