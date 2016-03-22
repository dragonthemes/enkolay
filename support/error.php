<?php 
    include("includes/config.inc.php");
    
   /* $fromname     = "Page not found";
    $fromemail    = 'info@enkolayweb.com';
    $to_email     = 'info@enkolayweb.com';
    $mail_subject = "404 ".ucfirst($_SERVER['HTTP_HOST'])." ". date("F j, H:i:s");
    
    $eol = "\n";
    
    $mail_content = 
            "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
			<html>
    			<head>
    			 <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    			 <title>\".$mail_subject.\"</title>
    			</head>
    			<body> 
                    <div style='font-size:14px;'>
        			     <pre>".print_r($_SERVER, true)."</pre>
                         <pre>".print_r($_SESSION, true)."</pre>
                         <pre>".print_r($_REQESUT, true)."</pre>
                    </div>
    			</body>
			</html>
			".$eol.$eol;
    
    
    $mailHeader  = "From:".$fromname." <".$fromemail."> \n" ;
    $mailHeader .= "X-Sender:". $fromemail." \n";
    $mailHeader .= "Reply-To: ".$fromname." <".$fromemail."> \n";
    $mailHeader .= "Content-Type: text/html; charset=iso-8859-1 \n";
    $mailHeader .= "Return-Path:".$fromemail." \n";
    $mailHeader .= "Error-To: ".$fromemail." \n";
    $mailHeader .= "X-Mailer: ".$_SERVER['SERVER_NAME']." \n";
    $mailHeader .= "MIME-Version: 1.0 \n";
    
    $mailresult  = @mail($to_email,$mail_subject,$mail_content,$mailHeader);*/
    #.....................................................................................
    $objSmarty->display('error.tpl');
?>
