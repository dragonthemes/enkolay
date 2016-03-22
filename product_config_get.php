<?
include("includes/config.inc.php");
$objDomain = new DomainProcess();
$objSite->languageSession();
#$objCommon->userAuthendication();
if(isset($_GET['domain_id']) && !empty($_GET['domain_id'])) 
    $objCommon->domainAuthendication($_GET['domain_id']);
#.............................................................................................
	$objCommon->user_unauthetic();
    
$domain = $_REQUEST["domain"];
$domain = str_replace(array('http://', 'www.', '/'), '', $domain);
// Params //

$domain = 'thiyagu123.org';
$url    = 'https://services.rxportalexpress.com/V1.0/';   //https://staging-services.rxportalexpress.com/V1.0/
$gui    =  '4a3d95a4-f01c-4a0f-86eb-d00eb2889044';        //feb17966-7fe8-4794-a161-068bb330f380

echo $domain."<br>";
echo $url."<br>";
echo $gui;


if ($domain != '' && $objDomain->valid_domain($domain)) {    
	$response = $objDomain->productConfiGet($domain, $url, $gui);
    
    echo "<pre>"; print_r($response); echo "</pre>";
    
	if ($response && $response->status->statusCode == 1000) {
		if ($response->response->domain->domainAvailable == 'Yes') {
?>
<script type="text/javascript">$(document).ready(function(){ show_buy_domain(); });</script>
<?
		}
		echo '<p class="warn_2">'.$response->response->domain->domainName.(($response->response->domain->domainAvailable == 'Yes') ? 'Available' : 'Not Avaiable').'</p>';
	} else {
		echo '<p class="warn_2">Please Try again</p>';
	}
} else {
	echo '<p class="warn_2">Enter Valid domain Name</p>';
}
?>
