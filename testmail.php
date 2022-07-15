<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
 
 
require_once 'vendor/autoload.php';
require_once 'config.php';
 
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = $Host;
$mail->Port = $port;
$mail->SMTPDebug = $SMTPDebug;
$mail->SMTPSecure = $SMTPSecure;
$mail->SMTPAuth = $SMTPAuth;
$mail->AuthType = 'XOAUTH2';
 
 
//Create a new OAuth2 provider instance
$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);
 
//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);
 
$mail->setFrom($email, 'Test');
//Enter address to
$mail->addAddress($email, 'Test Name');
$mail->isHTML(true);
$mail->Subject = 'Test Email';
$mail->Body = '<b>Email Body</b>';
 
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
