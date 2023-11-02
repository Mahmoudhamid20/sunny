<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/img/Logo/png/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/contact.css">
    <title>Contact us</title>
    <script src="scripts/jquery-3.7.1.min.js"></script>

</head>
<body>
<header></header>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    if (empty($_POST["Name"])) {
        $errors[] = "The field 'First Name' cannot be empty!";
    }

    if (empty($_POST["Surname"])) {
        $errors[] = "The field 'Last Name' cannot be empty!";
    }

    if (empty($_POST["Email"])) {
        $errors[] = "Email must be specified";
    } elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }

    if (empty($_POST["Message"])) {
        $errors[] = "The field 'Question' cannot be empty!";
    }

    if (count($errors) > 0) {
        $errorQuery = http_build_query(['errors' => $errors, 'values' => $_POST]);
        header("Location: ./contact.php?$errorQuery");
        exit;
    }
    ini_set( 'display_errors', 0 );
    $from = "no-reply@sunny.edupathag.com";
    //$to = "artjoms.grisajevs.11@rpg.lv";
    $to = $_POST["Email"];
    $subject = "Message from Sunny";
    $message = "We've recieved a new message from Sunny website!\n".$_POST["Name"]." ".$_POST["Surname"]." with email: ".$_POST["Email"]." wrote:\n\t".$_POST["Message"]."\nThis message was sent automatically, please do not reply!\nsunny.edupathag.com";
    $headers = "From:" . $from;
    ?>
    <main id="success-main">
        <?php
        if (mail ($to,$subject,$message,$headers)) {
            echo "<h2 class='centered'>Thank you for contacting us! We will get back to you as soon as possible!</h2>";
        } else {
            echo "<h2 class='centered'>We are sorry, but an error occurred while sending your message! Try again later.</h2>";
        }
        ?>

    </main>
    <?php
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $errors = isset($_GET['errors']) ? $_GET['errors'] : [];
    $values = isset($_GET['values']) ? $_GET['values'] : [];
    ?>
    <main>
        <form name="contact" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div id="warning-block">
                <ul>
                    <?php
                    foreach ($errors as $text) {
                        echo "<li class='warning-text'><p>{$text}</p></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="input-block" id="block-fname">
                <label for="Name">First Name</label>
                <input type="text" name="Name" id="Name" class="field" <?php echo "value='".(isset($values["Name"]) ? $values["Name"] : "")."'";?>>
            </div>
            <div class="input-block" id="block-lname">
                <label for="Surname">Last Name</label>
                <input type="text" name="Surname" id="Surname" class="field" <?php echo "value='".(isset($values["Surname"]) ? $values["Surname"] : "")."'";?>>
            </div>
            <div class="input-block" id="block-email">
                <label for="Email">Email</label>
                <input type="text" name="Email" id="Email" class="field" <?php echo "value='".(isset($values["Email"]) ? $values["Email"] : "")."'";?>>
            </div>
            <div class="input-block" id="block-message">
                <label for="Message">Your Question</label>
                <textarea name="Message" rows="5" id="Message" class="field"><?php echo isset($values["Name"]) ? $values["Name"] : "";?></textarea>
            </div>
            <div class="input-block" id="submit-block">
                <input type="submit" id="btn-submit" value="Send">
            </div>
        </form>
    </main>
    <?php

}
?>
        <footer></footer>
        <script src="scripts/index.js"></script>
</body>
</html>
