<?php
include('lib/config.php');
include('lib/simple_html_dom.php');
include('lib/zkb_parser.php');
include('lib/template_helper.php');
include('lib/PHPMailerAutoload.php');

$url = $_POST["zkb"];
$password = md5($_POST["pass"]);
$zkb = new ZKBParser;

if(!startsWith($url, "https://zkillboard.com/kill/"))
{
	die("Error: Your link does not lead to a zKillboard kill page (https://zkillboard.com/kill/*).");
}

if($password === PASSWORD_HASH || !PASSWORD_ENABLED) {
	$data = $zkb->getKillInfo($url);

	if($data) {
		$html = render('template.mail', $data);

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = SMTP_ADDRESS;
		$mail->SMTPAuth = true;
		$mail->Username = SMTP_USERNAME;
		$mail->Password = SMTP_PASSWORD;
		$mail->SMTPSecure = SMTP_SECURITY;
		$mail->Port = SMTP_PORT;

		$mail->From = MAILER_FROM;
		$mail->FromName = MAILER_NAME;
		$mail->addAddress(MAIL_TO); 
		$mail->Subject = MAILER_SUBJECT;
		$mail->Body = $html;

		if(!$mail->send()) {
		    echo 'Error: Failed while trying to send a message, please contact the website administrator.';
		} else {
		    echo 'Success! Your kill will be added to our killboard soon.';
		}
	} else {
		echo "Error: Failed while trying to access zKillboard, please try again later.";
	}
} else {
	echo "Error: Wrong password.";
}
