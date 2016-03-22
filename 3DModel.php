<html>
<head>
<title>3D</title>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="now">
  
</head>

<body>

<?php

	/*
		Below there are values that must be set for 3D and auth and payment processes. There are some optional values as well.	
		Some values are set for testing purposes.
		Hidden form field names are fixed and should not change.
		This code sample is used for EST 3D PAY HOSTING model.
		 Merchant must change field values according to his own actual valeus, for instance merchant id, username, password must be set  with values that bank gave.
	*/


	/*
		Mandatory variables that merchant must provide to start valid transaction
		--- START ---
	 */

	$clientId = "100100000";	//	Merchant ID
	$amount = "9.95";       //	Total Amount
	$oid = "EK".time();        		// Order ID

	$okUrl = "https://enkolayweb.com/3DModelodeme.php";	// return page ( hosted at merchant's server ) when process finished successfully, process means 3D authentication and payment after 3D auth
	$failUrl = "https://enkolayweb.com/3DModelodeme.php";	// return page ( hosted at merchant's server ) when process finished UNsuccessfully, process means 3D authentication and payment after 3D auth

	$rnd = microtime();            // Random Value

	$storekey = "123456";          // Merchant's store key, it must be produced using merchant reporting interface and set here.	
	$storetype = "3d";             // 3D model
    $transtype = "Auth";

	$hashstr = $clientId . $oid . $amount . $okUrl . $failUrl . $transtype . $rnd  . $storekey; // hash string

	$hash = base64_encode(pack('H*',sha1($hashstr))); // hash value

	/*
		Mandatory variables that merchant must provide to start valid transaction
		--- END ---
	*/

	
	/*
		Optional Fields
		--- START ---
	*/

	$description = "";	// Description
	$xid = "";    							
	$lang="";     		// Presentation language, default value is tr ( Turkish )  ,  for English en, For Romanian ro
	$email="";    		// e-mail address
	$userid="";   		// userid, it is just for tracking purposes, NOT mandatory

	/*
		Optional Fields
		--- END ---
	*/
?>

<center>
            <form method="post" action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate">
                <table>
                    <tr>
                        <td>Credit Card Number : </td>
                        <td><input type="text" name="pan" size="20"/>
                    </tr>
                    
                    <tr>
                        <td>CVV2 Number ( on the back of your card 3 digit number ) : </td>
                        <td><input type="text" name="cv2" size="4" value=""/></td>
                    </tr>
                    
                    <tr>
                        <td>Last Expire Year : </td>
                        <td><input type="text" name="Ecom_Payment_Card_ExpDate_Year" value=""/></td>
                    </tr>
                    
                    <tr>
                        <td>Last Expire Month : </td>
                        <td><input type="text" name="Ecom_Payment_Card_ExpDate_Month" value=""/></td>
                    </tr>
                    
                    <tr>
                        <td>Card Type</td>
                        <td><select name="cardType">
                            <option value="1">Visa</option>
                            <option value="2">MasterCard</option>
                        </select>
                    </tr>
                    
                    <tr>
                        <td align="center" colspan="2">
                            <input type="submit" value="Complete Payment"/>
                        </td>
                    </tr>
                    
                </table>
				
                <input type="hidden" name="clientid" value="<?php  echo $clientId ?>">	
                <input type="hidden" name="tranType" value="<?php echo $transtype ?>" />
                <input type="hidden" name="amount" value="<?php  echo $amount ?>">
                <input type="hidden" name="oid" value="<?php  echo $oid ?>">	
                <input type="hidden" name="okUrl" value="<?php  echo $okUrl ?>">
                <input type="hidden" name="failUrl" value="<?php  echo $failUrl ?>">
                <input type="hidden" name="rnd" value="<?php  echo $rnd ?>" >
                <input type="hidden" name="hash" value="<?php  echo $hash ?>" >                
                <input type="hidden" name="storetype" value="3d" >	
                <input type="hidden" name="currency" value="949"/>	
                <input type="hidden" name="lang" value="tr">
                               
            </form>
            <br>
            <b>Hidden Form Fields Used in Form ( form fields are fixed )</b>
            <br>
            
				&lt;input type="hidden" name="clientid" value=""&gt;Merchant ID<br>
                &lt;input type="hidden" name="amount" value=""&gt;Total Amount<br>
                &lt;input type="hidden" name="oid" value=""&gt;Order ID / Order Number, may be produced by some sort of code and set, if it doesn't exist, gateway produces it and returns.<br>
                &lt;input type="hidden" name="okUrl" value=""&gt;Return page ( hosted at merchant's server ) when process finished successfully, process means 3D authentication and payment after 3D auth<br>
                &lt;input type="hidden" name="failUrl" value=""&gt;Return page ( hosted at merchant's server ) when process finished UNsuccessfully, process means 3D authentication and payment after 3D auth<br>
                &lt;input type="hidden" name="rnd" value="" &gt;Random Value<br>
                &lt;input type="hidden" name="hash" value="" &gt;Hash Value<br>
                
                &lt;input type="hidden" name="storetype" value="" &gt;Store Type ( 3D -> 3d, 3D Pay -> 3d_pay, 3D Pay Hosting -> 3d_pay_hosting )<br>	
                &lt;input type="hidden" name="lang" value=""&gt;Page Language That User See, for Turkish tr, for Romanian ro, for English en<br>
        </center>
    </body>
</html>