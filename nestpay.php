<html>
<head>
<title>3D</title>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="now"/>
</head>
<body>
<?php

echo "<pre>"; print_r($_REQUEST); echo "</pre>";

$clientId  = "100100000";   // 100875447";   
$amount    = "9.27";
$oid       = "EK".time();
$okUrl     = "https://enkolayweb.com/3DModelodeme.php";
$failUrl   = "https://enkolayweb.com/3DModelodeme.php";
$rnd       = microtime();
$storekey  = "123456";   //YE9ewUkam2";      
$storetype = "3d";
$transtype = "Auth";
$hashstr   = $clientId.$oid.$amount.$okUrl.$failUrl.$transtype.$rnd.$storekey;
$hash      = base64_encode(pack('H*',sha1($hashstr)));
$description = "";
$xid    = "";
$lang   = "";
$email  = "";
$userid = "";
?>
<center>
<form method="post" action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate">      <!-- <form method="post" action="https://www.sanalakpos.com/servlet/est3Dgate">  -->
<table>

<tr>
<td>Credit Card Number</td>
<td><input type="text" name="pan" size="20"/>
</tr>
<tr>
<td>CVV</td>
<td><input type="text" name="cv2" size="4" value=""/></td>
</tr>
<tr>
<td>Expiration Date Year</td>
<td><input type="text" name="Ecom_Payment_Card_ExpDate_Year"
value=""/></td>
</tr>
<tr>
<td>Expiration Date Month</td>
<td><input type="text" name="Ecom_Payment_Card_ExpDate_Month"
value=""/></td>
</tr>

<tr>
<td align="center" colspan="2">
<input type="submit" value="Complete Payment"/>
</td>
</tr>
</table>
<input type="hidden" name="clientid" value="<?php echo $clientId ?>"/>
<input type="hidden" name="tranType" value="<?php echo $transtype ?>" />
<input type="hidden" name="amount" value="<?php echo $amount ?>"/>
<input type="hidden" name="oid" value="<?php echo $oid ?>"/>
<input type="hidden" name="okUrl" value="<?php echo $okUrl ?>"/>
<input type="hidden" name="failUrl" value="<?php echo $failUrl ?>"/>
<input type="hidden" name="rnd" value="<?php echo $rnd ?>" />
<input type="hidden" name="hash" value="<?php echo $hash ?>" />
<input type="hidden" name="storetype" value="3d" />
<input type="hidden" name="lang" value="en"/>
<input type="hidden" name="currency" value="949"/>
</form>
</center>
</body>
</html>