<html>
<head>
<title>3D</title>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="now">
</head>

<body>
<h1>3D Payment Page - 3D Model</h1>        
<h3>3D Return Parameters and Values</h3>
    <table border="1">
        <tr>
            <td><b>Parametre Name</b></td>
            <td><b>Parametre Value</b></td>
        </tr>
<?php

	foreach($_POST as $key => $value)
	{
		echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
	}
?>
</table>
<br>
<br>

<?php

	/* hash control section, it checks mathcing value for sent hash value and hash value at server side  */
	
	$hashparams = $_POST["HASHPARAMS"];
	$hashparamsval = $_POST["HASHPARAMSVAL"];
	$hashparam = $_POST["HASH"];
	$storekey="123456";
	$paramsval="";
	$index1=0;
	$index2=0;
		
	while($index1 < strlen($hashparams))
	{
		$index2 = strpos($hashparams,":",$index1);
		$vl = $_POST[substr($hashparams,$index1,$index2- $index1)];
		if($vl == null)
		$vl = "";
		$paramsval = $paramsval . $vl;
		$index1 = $index2 + 1;
	}
	$storekey = "123456";
	$hashval = $paramsval.$storekey;
	
	$hash = base64_encode(pack('H*',sha1($hashval))); // Hash value
	
	if($paramsval != $hashparamsval || $hashparam != $hash)
		echo "<h4>Security Warning. Digital Signature is NOT Valid !</h4>";

	/*	
		Variables below for payment phase. In this model payment is done by merchant's developer.  So, these values must be change according to merchant's setting and needs.
	*/

	$name="AKTESTAPI";       		// Merchant API username
	$password="AKBANK01";    		// API user's password
	$clientid=$_POST["clientid"];   // Merchant id

	$mode = "P";                    // default P
	$type="Auth";   				// Transaction type
	
	/*
		There are seven type of transactions : Auth, Void, Credit, PreAuth, PostAuth, OrderStatus, OrderHistory
		A unique transastion id returns after each transaction, it is used for reference purposes for some sort of transactions, explained below.
		Auth : Sale
		Void : Canceling sale, it must be done in same day that sale was done.  Sale's order id must be provided.
		Credit : Canceling sale and refunding provisioned amount  during sale process.  It can be done after settlement. Transaction id must be provided.
		PreAuth : Pre Authorization, it starts a sale request but it doesn't end process.
		PostAuth : Post Authorization, it ends sale process started before by Pre Authorization, transaction id must be provided.
		OrderStatus : Reporting request for order's status.
		OrderHistory : Reporting request for order's history.	
	*/
		
	$expires = $_POST["Ecom_Payment_Card_ExpDate_Month"]."/".$_POST["Ecom_Payment_Card_ExpDate_Year"]; // Expire date, it must be  in mm/yy format
	$cv2=$_POST['cv2'];					// CVV2 Number
	$tutar=$_POST["amount"];			// Total Amount
	$taksit="";							// Installment (  how many installments will be for this sale ) for sales without any installment it must ve EMPTY, NOT zero, NOT "0", NOT space
	$oid= $_POST['oid'];				// Order Number, may be produced by some sort of code and set here, if it doesn't exist gateway produces it and returns									

	$lip=GetHostByName($REMOTE_ADDR);	// card holder's IP address (  computer's IP adress that card holder uses at shopping moment )
	$email="";							// Email
										
	$mdStatus=$_POST['mdStatus'];       // if mdStatus 1,2,3,4 then 3D authentication is successful, if mdStatus 5,6,7,8,9,0 then 3D authentication is FAILED
										// Check mdStatus value and do not send payment request if it points out that 3D authentication is failed
	$xid=$_POST['xid'];                 // Payer Transaction ID
	$eci=$_POST['eci'];                 // Payer Securitry Level
	$cavv=$_POST['cavv'];               // Payer Authentication Code
	$md=$_POST['md'];                   // If 3D authentication is successful then md value is sent to payment process. It does not need to send card number, expire date and CVV2 number

	
	/* 
		If mdStatus 1,2,3,4 then 3D authentication is successful, if mdStatus 5,6,7,8,9,0 then 3D authentication is FAILED		
		Do not send payment request if 3D authentication is failed.		
	*/
	
	if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
	{ 	
		echo "<h5>3D Auth is Successful.</h5><br/>";

		// XML request template
		$request= "DATA=<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>".
		"<CC5Request>".
		"<Name>{NAME}</Name>".
		"<Password>{PASSWORD}</Password>".
		"<ClientId>{CLIENTID}</ClientId>".
		"<IPAddress>{IP}</IPAddress>".
		"<Email>{EMAIL}</Email>".
		"<Mode>P</Mode>".
		"<OrderId>{OID}</OrderId>".
		"<GroupId></GroupId>".
		"<TransId></TransId>".
		"<UserId></UserId>".
		"<Type>{TYPE}</Type>".
		"<Number>{MD}</Number>".
		"<Expires></Expires>".
		"<Cvv2Val></Cvv2Val>".
		"<Total>{TUTAR}</Total>".
		"<Currency>949</Currency>".
		"<Taksit>{TAKSIT}</Taksit>".
		"<PayerTxnId>{XID}</PayerTxnId>".
		"<PayerSecurityLevel>{ECI}</PayerSecurityLevel>".
		"<PayerAuthenticationCode>{CAVV}</PayerAuthenticationCode>".
		"<CardholderPresentCode>13</CardholderPresentCode>".
		"<BillTo>".
		"<Name></Name>".
		"<Street1></Street1>".
		"<Street2></Street2>".
		"<Street3></Street3>".
		"<City></City>".
		"<StateProv></StateProv>".
		"<PostalCode></PostalCode>".
		"<Country></Country>".
		"<Company></Company>".
		"<TelVoice></TelVoice>".
		"</BillTo>".
		"<ShipTo>".
		"<Name></Name>".
		"<Street1></Street1>".
		"<Street2></Street2>".
		"<Street3></Street3>".
		"<City></City>".
		"<StateProv></StateProv>".
		"<PostalCode></PostalCode>".
		"<Country></Country>".
		"</ShipTo>".
		"<Extra></Extra>".
		"</CC5Request>";
	
	
		$request=str_replace("{NAME}",$name,$request);	
		$request=str_replace("{PASSWORD}",$password,$request);
		$request=str_replace("{CLIENTID}",$clientid,$request);
		$request=str_replace("{IP}",$lip,$request);
		$request=str_replace("{OID}",$oid,$request);
		$request=str_replace("{TYPE}",$type,$request);
		$request=str_replace("{XID}",$xid,$request);
		$request=str_replace("{ECI}",$eci,$request);
		$request=str_replace("{CAVV}",$cavv,$request);
		$request=str_replace("{MD}",$md,$request);
		$request=str_replace("{TUTAR}",$tutar,$request);
		$request=str_replace("{TAKSIT}",$taksit,$request); 

		// URL below is payment gateway's adress ( API Server), it is NOT 3D Gateway.		
		$url = "https://entegrasyon.asseco-see.com.tr/fim/api";
		// initialize curl handle		
		$ch = curl_init();    
		
		curl_setopt($ch, CURLOPT_URL,$url); 		// set url to post to
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
		curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
		curl_setopt($ch, CURLOPT_TIMEOUT, 90); 		// times out after 90s
		curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($request)); // add POST fields
				
		$result = curl_exec($ch); // run the whole process
		echo "<br>";
		
		if (curl_errno($ch)) 
		{
			print curl_error($ch);
		} else 
		{
			curl_close($ch);
		}
	
		$Response ="";
		$OrderId ="";
		$AuthCode  ="";
		$ProcReturnCode    ="";
		$ErrMsg  ="";
		$HOSTMSG  ="";
		$HostRefNum = "";
		$TransId="";
	
		$response_tag="Response";
		$posf = strpos (  $result, ("<" . $response_tag . ">") );
		$posl = strpos (  $result, ("</" . $response_tag . ">") ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$Response = substr (  $result, $posf, $posl - $posf) ;
	
		$response_tag="OrderId";
		$posf = strpos (  $result, ("<" . $response_tag . ">") );
		$posl = strpos (  $result, ("</" . $response_tag . ">") ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$OrderId = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="AuthCode";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$AuthCode = substr (  $result, $posf , $posl - $posf   ) ;
		
		$response_tag="ProcReturnCode";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$ProcReturnCode = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="ErrMsg";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$ErrMsg = substr (  $result, $posf , $posl - $posf   ) ;
		
		
		$response_tag="HostRefNum";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$HostRefNum = substr (  $result, $posf , $posl - $posf   ) ;
		
		
		$response_tag="TransId";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$TransId = substr (  $result, $posf , $posl - $posf   ) ;

?>
			<h3>Payment Result</h3>
                <table border="1">
                    <tr>
                        <td><b>Parameter Name</b></td>
                        <td><b>Parameter Value</b></td>
                    </tr>                    
                    <tr>
                        <td>AuthCode</td>
                        <td><?php echo $AuthCode; ?></td>
                    </tr>                    
                    <tr>
                        <td>Response</td>
                        <td><?php echo $Response; ?></td>
                    </tr>                    
                    <tr>
                        <td>HostRefNum</td>
                        <td><?php echo $HostRefNum;?></td>
                    </tr>                    
                    <tr>
                        <td>ProcReturnCode</td>
                        <td><?php echo $ProcReturnCode?></td>
                    </tr>                    
                    <tr>
                        <td>TransId</td>
                        <td><?php echo $TransId ?></td>
                    </tr>                    
                    <tr>
                        <td>ErrMsg</td>
                        <td><?php echo $ErrMsg?></td>
                    </tr>                    
                </table>

<?php
		if ( $Response === "Approved")
		{
			echo "Payment is Successful.";
		}
		else
		{	
			echo "Payment is NOT Successful.. Error Message : ".$ErrMsg;		
		}
	} // end of mdStatus control.
	else
	{
		echo "3D Authentication is NOT Successful !";
	}
?>
</body>
</html>