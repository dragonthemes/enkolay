<?php
include("includes/config.inc.php");
$objDomain = new DomainProcess();

$domain = "myfavwebsite123.com";
$domain = str_replace(array('http://', 'www.', '/'), '', $domain);
// Params //
$CFG['site']['process_url'] = 'https://api.rxportalexpress.com/V1.0/';
$CFG['site']['process_gui'] = '4a3d95a4-f01c-4a0f-86eb-d00eb2889044';

echo "Domain name=> ".$domain."<br>";
echo "url => ".$CFG['site']['process_url']."<br>";
#echo " GUI => ".$CFG['site']['process_gui']."<br>";

if ($domain != '' && $objDomain->valid_domain($domain)) {    
	$response = $objDomain->check_domain($domain, $CFG['site']['process_url'], $CFG['site']['process_gui']);
    
    echo "Response=> <pre>"; print_r($response); echo "</pre>";
	
}


#---------------------------------------------------------------------------
#SMARTY ASSIGNING 
/*$main_content = $objSmarty->fetch('payment.tpl');
$objSmarty->assign("MAIN_CONTENT",$main_content);
$objSmarty->display('main.tpl');*/
?>