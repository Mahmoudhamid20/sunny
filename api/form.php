<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\OAuth;
    use League\OAuth2\Client\Provider\Google;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';

    //Set the SMTP port number:
    // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
    // - 587 for SMTP+STARTTLS
    $mail->Port = 465;

    //Set the encryption mechanism to use:
    // - SMTPS (implicit TLS on port 465) or
    // - STARTTLS (explicit TLS on port 587)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Set AuthType to use XOAUTH2
    $mail->AuthType = 'XOAUTH2';

    //Start Option 1: Use league/oauth2-client as OAuth2 token provider
    //Fill in authentication details here
    //Either the gmail account owner, or the user that gave consent
    $email = 'noreply.sunnysocks@gmail.com';
    $clientId = '424157455018-grmf6am7t56lj3c9l4nhq8cu35obu2ij.apps.googleusercontent.com';
    $clientSecret = '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';

    //Obtained by configuring and running get_oauth_token.php
    //after setting up an app in Google Developer Console.
    $refreshToken = '1//04Mn5P6P_EbsyCgYIARAAGAQSNwF-L9IryRdGjnorZhVQxwEC96NamzZXsO9iWo5trvJQyalnMX2rpmcEhK5UJWsRYxdKOSk9ozQ';

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
                'userName' => $email,
                'refreshToken' => $refreshToken,
            ]
        )
    );
       //Set who the message is to be sent from
    //For gmail, this generally needs to be the same as the user you logged in as
    $mail->setFrom($email, 'Sunny no-reply');

    //Set who the message is to be sent to
    $mail->addAddress('artjoms.grisajevs.11@rpg.lv', 'Artjoms Grisajevs');

    //Set the subject line
    $mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body "file_get_contents('contentsutf8.html'"), __DIR__
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->msgHTML("<h1>HELLO</h1>");

    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

      //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
?>