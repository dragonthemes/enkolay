<?
include("includes/config.inc.php");
$objDomain = new DomainProcess();
#$objSite->languageSession();
#$objCommon->userAuthendication();
#if(isset($_GET['domain_id']) && !empty($_GET['domain_id'])) 
    #$objCommon->domainAuthendication($_GET['domain_id']);
#.............................................................................................
	#$objCommon->user_unauthetic();
    
#$domain = $_REQUEST["domain"];
#$domain = str_replace(array('http://', 'www.', '/'), '', $domain);
// Params //

#$domain = 'ekw.info';
$productid = "27895942";

if ($productid != '') {    
	   $response = $objDomain->domainHostAdd($productid, $CFG['site']['process_url'], $CFG['site']['process_gui']);
    
       echo "<pre>"; print_r($response); echo "</pre>";
    
    }
    	
?>
