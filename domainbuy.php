<?
  $request_xml = "DATA=<?xml version=\"1.0\" encoding=\"utf-8\" ?> 
  <serviceRequest>
<command>domainCheck</command>
<client>
<applicationGuid>feb17966-7fe8-4794-a161-068bb330f380</applicationGuid>
<clientRef>'".time()."'</clientRef>
</client>
<request>
<sld>thiyagu</sld>
<extensions>
<extension>com</extension>
<extension>net</extension>
<extension>biz</extension>
</extensions>
</request>
</serviceRequest>";

  //Initialize handle and set options 
  //$username = 'user'; 
  //$password = 'pass'; 
 

 $url =  'https://staging-services.rxportalexpress.com/V1.0/';  
  
 $ch = curl_init();    // initialize curl handle
        	
curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
curl_setopt($ch, CURLOPT_TIMEOUT, 15); // times out after 4s
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_xml); // add POST fields

$result = curl_exec($ch); // run the whole process        

if (curl_errno($ch)) {
   print curl_error($ch);
} else {
   curl_close($ch);
} 

   echo "Result Record<pre>"; print_r($result); echo "</pre>";
   ?>