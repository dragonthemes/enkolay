<?php

require("class.PHPMailer.php");

$mail = new PHPMailer();

// HTML body
$body = '<html>
    <head>
      <title>Birthday Reminders for August</title>
    </head>
    <body>
      <p>Here are the birthdays upcoming in August!</p>
      <table>
        <tr>
          <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
        </tr>
        <tr>
          <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
        </tr>
        <tr>
          <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
        </tr>
      </table>
    </body>
    </html>';

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host          = "localhost"; // sets the SMTP server
$mail->Port          = 25;                    // set the SMTP port for the GMAIL server
$mail->Username      = "delicentro@delicentro.com"; // SMTP account username
$mail->Password      = "TMrm8*h=d=bx";        // SMTP account password

#From & Reply email
$mail->From     = "info@enkolayweb.com";
$mail->FromName = "Enkolayweb.com";
$mail->AddReplyTo("info@enkolayweb.com","Enkolayweb.com");

#To email
//$mail->AddAddress("sindhu.r@outlook.com","iac1165");
$mail->AddAddress("info@enkolayweb.com","Priya");
//$mail->AddAddress("mkksathish@hotmail.com", "Frank"); // Add a recipient // Name is optional
//$mail->AddAddress("sathish.996633@yahoo.in", "Hizlisayfalar"); // Add a recipient // Name is optional
$mail->AddAddress("harikrishnan102@yahoo.in", "Hizlisayfalar"); // Add a recipient // Name is optional

// Dont change anything
$mail->Subject  = "An HTML Message with attachement";
//$mail->MsgHTML($body);
$mail->AddAttachment("kitten-food.jpg","cat.jpg");
$mail->IsHTML(true); 
$mail->Body     = $body;

    if(!$mail->Send()) {
      echo 'Message was not sent.';
      echo '<br>Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }

?>
    