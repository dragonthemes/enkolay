<?
include("includes/config.inc.php");
$objDomain = new DomainProcess();
$objSite->languageSession();
$objCommon->userAuthendication();

$domain    = $_REQUEST["domain"];
$domain_id = $_REQUEST["domain_id"];
$qty       = "1";
$domain    = str_replace(array('http://', 'www.', '/'), '', $domain);
// Params //

/*$domain     = "sitemikendimyaparim.net";
$username   = "";
$first_name = "";
$last_name  = "";
$address    = "";
$city       = "";
$zip        = "";  */
$first_name = $_REQUEST['Fname'];
$last_name  = $_REQUEST['lname'];
$address    = $_REQUEST['address'];
$city       = $_REQUEST['city'];
$zip        = $_REQUEST['postcode'];
$country    = "Turkey";

if ($domain != '' && $objDomain->valid_domain($domain)) {
    
	// Get User Details
	$uservalues = $objSite->getMultiValue("email",$CFG['table']['register']," user_id = '".$_SESSION['user_id']."' ");
	// Get User Details
	// Buy Domain
   $response = $objDomain->buy_domain($domain, $CFG['site']['process_url'], $CFG['site']['process_gui'], $qty, $ns_1, $ns_2, $uservalues[0]['email'], $first_name, $last_name, $country, $city, $zip, $address);
      #echo "<pre>"; print_r($response); echo "</pre>";
	if ($response && $response->status->statusCode == 1000) {
        $objDomain->addNewDomain($domain,$domain_id,$response->response->productId);
	} 
} else {	
	echo '<p class="errormsg pull-left "> Please Try again</p>';
}
?>
