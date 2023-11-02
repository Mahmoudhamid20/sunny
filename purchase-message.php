<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $size= filter_input(INPUT_POST,"size-drop");
    $style= filter_input(INPUT_POST, "style");
    $colour= filter_input(INPUT_POST,"colour");

    if{
        $size,$style, $colour= true;
        echo("Congrats your socks have been purchased")
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>