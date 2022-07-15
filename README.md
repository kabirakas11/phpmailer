# phpmailer
PHP Mailer XOAUTH

1. Go to google developer console.
2. Enable Gmail API
3. Create OAuth2 credentials
4. Copy client id and client secret
5. Put those client id and client secret in config.php and update other paramaters in config.php except refreshtoken
6. Create a Project folder
7. Install PHP packages by composer in project folder
   -composer require league/oauth2-google
   -composer require phpmailer/phpmailer
8. Run get_oauth_token.php to generate refresh token and put it into config.php

#optional: you can also update other paramters in phpmailer.php 
//Enter destination email address
$mail->addAddress('test@example.com', 'Person Name');
$mail->isHTML(true);
$mail->Subject = 'Test Email';
$mail->Body = '<b>Email Body</b>';

9. Test phpmailer.php by running it in browser.

