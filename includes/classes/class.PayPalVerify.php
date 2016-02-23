<?php

/*
if($_GET['lol']){

   header('HTTP/1.1 200 OK'); 
   $a= '{"paypal":"ipn","mc_gross":"10.00","protection_eligibility":"Eligible","address_status":"confirmed","payer_id":"HBMEZ9BSRD4AU","tax":"0.00","address_street":"1 Main St","payment_date":"00:45:35 Feb 23, 2016 PST","payment_status":"Completed","charset":"windows-1252","address_zip":"95131","first_name":"test","mc_fee":"0.59","address_country_code":"US","address_name":"test buyer","notify_version":"3.8","custom":"","payer_status":"verified","business":"khangvm530-facilitator@gmail.com","address_country":"United States","address_city":"San Jose","quantity":"1","verify_sign":"An2k9CYwT.kf48olIbtC7BwPCN25AYR9ZPvFMLtvBj4wpXITLcoi6XL3","payer_email":"khangvm530-buyer@gmail.com","txn_id":"93864998LD896233L","payment_type":"instant","last_name":"buyer","address_state":"CA","receiver_email":"khangvm530-facilitator@gmail.com","payment_fee":"0.59","receiver_id":"DLHYQTK3G9AEC","txn_type":"web_accept","item_name":"test course","mc_currency":"USD","item_number":"409","residence_country":"US","test_ipn":"1","handling_amount":"0.00","transaction_subject":"","payment_gross":"10.00","shipping":"0.00","ipn_track_id":"e6eb4ed8aca98"}';
    $b =  json_decode($a, true);

    // Assign payment notification values to local variables
  $item_name        = $b['item_name'];
  $item_number      = $b['item_number'];
  $payment_status   = $b['payment_status'];
  $payment_amount   = $b['mc_gross'];
  $payment_currency = $b['mc_currency'];
  $txn_id           = $b['txn_id'];
  $receiver_email   = $b['receiver_email'];
  $payer_email      = $b['payer_email'];


  // Build the required acknowledgement message out of the notification just received  
  $req = 'cmd=_notify-validate';               // Add 'cmd=_notify-validate' to beginning of the acknowledgement
  foreach ($b as $key => $value) {         // Loop through the notification NV pairs
    $value = urlencode(stripslashes($value));  // Encode these values
    $req  .= "&$key=$value";                   // Add the NV pairs to the acknowledgement
  }


   
  $url = 'https://www.sandbox.paypal.com/cgi-bin/webscr?'.$req;


    $process = curl_init($url);
    //curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    //curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($process, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($process, CURLOPT_CAINFO, NULL);
    curl_setopt($process, CURLOPT_CAPATH, NULL);
    $api = curl_exec($process);
    var_dump($api);
    die;

}

$a= '{"paypal":"ipn","mc_gross":"10.00","protection_eligibility":"Eligible","address_status":"confirmed","payer_id":"HBMEZ9BSRD4AU","tax":"0.00","address_street":"1 Main St","payment_date":"00:45:35 Feb 23, 2016 PST","payment_status":"Completed","charset":"windows-1252","address_zip":"95131","first_name":"test","mc_fee":"0.59","address_country_code":"US","address_name":"test buyer","notify_version":"3.8","custom":"","payer_status":"verified","business":"khangvm530-facilitator@gmail.com","address_country":"United States","address_city":"San Jose","quantity":"1","verify_sign":"An2k9CYwT.kf48olIbtC7BwPCN25AYR9ZPvFMLtvBj4wpXITLcoi6XL3","payer_email":"khangvm530-buyer@gmail.com","txn_id":"93864998LD896233L","payment_type":"instant","last_name":"buyer","address_state":"CA","receiver_email":"khangvm530-facilitator@gmail.com","payment_fee":"0.59","receiver_id":"DLHYQTK3G9AEC","txn_type":"web_accept","item_name":"test course","mc_currency":"USD","item_number":"409","residence_country":"US","test_ipn":"1","handling_amount":"0.00","transaction_subject":"","payment_gross":"10.00","shipping":"0.00","ipn_track_id":"e6eb4ed8aca98"}';
$b =  json_decode($a, true);
$values = array();
foreach($b as $key => $val ){
    $values[] = "$key=".urlencode($val); 
}

echo implode('&', $values);
die;

*/

?>