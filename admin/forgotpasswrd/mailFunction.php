<?php

error_reporting(E_ALL);
require_once 'vendor1/autoload.php';


  function sendMail($email,$email1,$name, $subject, $body){ //function parameters, 3 variables.
	$mail = new PHPMailer();
	$mail->IsSMTP();
	//$mail->SMTPDebug = 2;
	$mail->SMTPAuth = true;
	
	$mail->Host = "smtp.gmail.com";
	$mail->Username = "lassanaparty123@gmail.com";
	$mail->Password = "nimasha123";
	$mail->SMTPSecure = "tls";
	$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
	$mail->Port = 587;
	$mail->From = "lassanaparty123@gmail.com";
	$mail->FromName = "Lassana Party";
	$mail->AddReplyTo("$email1","$name");
	
	//$mail->AddAddress("fshalika.fdo@gmail.com","shalika");
	//$mail->AddAddress("shalikafernando9@gmail.com","shalika");
	$mail->addBCC("$email");
	
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	//$mail->addAttachment('images/ifs.png','ifs.png');//if needed
	
	$mail->Subject = $subject;
	$mail->Body = $body;
	$_SESSION["mail"] = "";
	if($mail->send())
	{
		//echo "sent mail";
		//$_SESSION["mail"] = "success";
		setcookie("mail", "Success");

	}else{
		//echo "send mail failed" . $mail->ErrorInfo;
		//$_SESSION["mail"] = "failed";
		setcookie("mail", "Failed");
	}
}



?>