<?
include("includes/config.inc.php");
$objDomain = new DomainProcess();
$objSite->languageSession();
$objCommon->userAuthendication();
if(isset($_GET['domain_id']) && !empty($_GET['domain_id'])) 
    $objCommon->domainAuthendication($_GET['domain_id']);
#.............................................................................................
	$objCommon->user_unauthetic();
    
$domain = $_REQUEST["domain"];
$domain = str_replace(array('http://', 'www.', '/'), '', $domain);
// Params //

if ($domain != '' && $objDomain->valid_domain($domain)) {    
	$response = $objDomain->check_domain($domain, $CFG['site']['process_url'], $CFG['site']['process_gui']);
    
	if ($response && $response->status->statusCode == 1000) {
		echo '<div class="buy_domain clearfix">';
		echo '<p class="bold no-margin" style="display: inline-block;">'.$response->response->domain->domainName.(($response->response->domain->domainAvailable == 'Yes') ? ' <span class="avail">Available</span>' : ' <span class="avail red">Not Avaiable</span>').'</p>';
        if ($response->response->domain->domainAvailable == 'Yes') {
            ?>
            <input class="submitButton buy-btn" type="button" name="Buy" value="Buy" onclick="showbuyButton('<?echo $response->response->domain->domainName;?>')"/>
            <?
		}
        echo '</div>';
        
	} else {
		echo '<p class="errormsg pull-left "> Please Try again</p>';
	}
} else {
	echo '<p class="errormsg pull-left"> Enter Valid domain Name</p>';
}
?>