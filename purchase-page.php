<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/purchase-page.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="icon" type="image/png" href="/img/Logo/png/favicon.png">
    <title>Purchase Page</title>
    <script src="scripts/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header></header>
    <main>      
        <div class="container">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            ?>
            <div class="purchaseImage">
                <img src="./img/sunny_socks_photos/catalogus/Sunny_socks_blue.jpg" alt="Blue socks">
            </div>

            <div class="purchasePage">
                <div class="sockTitle">
                    <h1>Sunny socks</h1>
                </div>

                <div class="description">
                    <h2>Ethically made in the Netherlands!</h2>
                </div>

                <div class="headings">
                    <h2>Sizes</h2>
                </div>
                <!-- dropmenu code -->
                <form name="shop" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <select name="size-drop" id="size-drop" class="dropmenu" onfocus='this.size=6;' onblur='this.size=0;'
                        onchange='this.size=1; this.blur();'>
                        <option selected disabled>Select your Size</option>
                        <option value="30-32">30-32</option>
                        <option value="33-35">33-35</option>
                        <option value="36-38" disabled>36-38</option>
                        <option value="39-41">39-41</option>
                        <option value="42-44">42-44</option>
                    </select>

                    <div class="headings">
                        <h2>Style</h2>
                    </div>

                    <div class="style-select">
                        <input type="radio" name="style" id="stripped" value="stripped">
                        <label for="stripped" class="style">Striped socks</label>
                        <input type="radio" name="style" id="solid" value="solid">
                        <label for="solid" class="style">Unicolor socks</label>
                    </div>

                    <div class="headings">
                        <h2>Colour</h2>
                    </div>
                    <div class="boxes">
                        <input type="radio" name="colour" id="blue" value="blue"/>
                        <label for="blue"><img src="./img/sunny_illustrations/jpeg/Sunny_socks_blue.jpg"
                                alt="sunny socks blue" class="icons"></label>

                        <input type="radio" name="colour" id="green" value="green">
                        <label for="green"><img src="./img/sunny_illustrations/jpeg/Sunny_socks_Green.jpg"
                                alt="sunny socks green" class="icons"></label>

                        <input type="radio" name="colour" id="red" value="red">
                        <label for="red"><img src="./img/sunny_illustrations/jpeg/Sunny_socks_Orange.jpg"
                                alt="sunny socks orange" class="icons"></label>

                        <input type="radio" name="colour" id="pink" value="pink">
                        <label for="pink"><img src="./img/sunny_illustrations/jpeg/Sunny_socks_Pink.jpg"
                                alt="sunny socks pink" class="icons"></label>

                        <input type="radio" name="colour" id="yellow" value="yellow">
                        <label for="yellow"><img src="./img/sunny_illustrations/jpeg/Sunny_socks_Yellow.jpg"
                                alt="sunny socks yellow" class="icons"></label>
                    </div>

                    <button type="submit" class="purchaseButton">Purchase socks</button>
                </form>
            </div>
            <?
        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];
            if (empty($_POST["size-drop"])) {
                $errors[] = "The size must be specified!";
            }
            
            if (empty($_POST["style"])) {
                $errors[] = "The style must be specified!";
            } 
            
            if (empty($_POST["colour"])) {
                $errors[] = "The colour must be specified!";
            }
            if(empty($errors)) {
                echo "<h2 class='centered'>Thank you for buying our socks! We will get back to you as soon as possible!</h2>";
            } else {
                ?>
                <div id="warning-block">
                    <ul>
                        <?php
                        foreach ($errors as $text) {
                            echo "<li class='warning-text'><p>{$text}</p></li>";
                        }
                        ?>
                    </ul>
                    <a href = "purchase-page.php"><button type="submit" class="purchaseButton">Go back</button></a>
                </div>
                <?php
            }
            
        }
        ?>
            
        </div>
    </main>
    <footer></footer>
    <script src="scripts/index.js"></script>
    <script src="scripts/purchase.js"></script>
</body>
</html>