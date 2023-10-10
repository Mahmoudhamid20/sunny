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
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->AuthType = 'XOAUTH2';
    $email = 'noreply.sunnysocks@gmail.com';
    $clientId = '424157455018-grmf6am7t56lj3c9l4nhq8cu35obu2ij.apps.googleusercontent.com';
    $clientSecret = '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';
    $refreshToken = '1//04Mn5P6P_EbsyCgYIARAAGAQSNwF-L9IryRdGjnorZhVQxwEC96NamzZXsO9iWo5trvJQyalnMX2rpmcEhK5UJWsRYxdKOSk9ozQ';

    $provider = new Google(
        [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]
    );

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

    $mail->setFrom($email, 'Sunny no-reply');
    $mail->addAddress('artjoms.grisajevs.11@rpg.lv', 'Artjoms Grisajevs');
    $mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->msgHTML("<h1>HELLO</h1>");

    $mail->AltBody = 'This is a plain-text message body';

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
?>