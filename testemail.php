<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require_once 'PHPMailer/class.phpmailer.php';


/*
$body = "Testing";
$ldapuser = 'NA10B042';
$ldappwd = '';
$replymail = 'webops@smail.iitm.ac.in';
$replyname = 'Institute WebOps';
$frommail = 'webops@students.iitm.ac.in';
$fromname = 'Institute WebOps';
$to = 'g.prasanthsai@gmail.com';
$subj = 'Testing Subject';
*/


try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	//$body             = file_get_contents('contents.html');
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	//$mail->SMTPAuth   = 'true';                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "smtp2.iitm.ac.in"; // SMTP server
	$mail->Username   = $ldapuser;     // SMTP server username
	$mail->Password   = $ldappwd;            // SMTP server password

//	$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->AddReplyTo($replymail,$replyname);

	$mail->From       = $frommail;
	$mail->FromName   = $fromname;



	$mail->AddAddress($to);

	$mail->Subject  = $subj;

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	echo 'Message has been sent.<br>';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>
