<?php
@include_once '../PHP_Comms/Functions.php';
require_once '../PHP_Comms/SQL.php';
session_start();
print_r($_SESSION);
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    @include_once 'NavBar.php';
    ?>

    <div class="Timeline_container">
        <?php
        @include_once 'Post_Box.php';
        ?>
        <div class="sidebar">
            <h1> BLOOM </h1>
            <p> 
                Welcome to Bloom! 
                A safe place for everyone to share their thoughts and ideas together.
                As one says with enough love and support, a flower blooms!
                You're the flower of our community
            </p>
        </div>
    </div>
    <div class="img_wrapper"></div>
    <?php
    echo '<link rel="stylesheet" type="text/css" href="../../CSS/Main.css">';
    ?>
</body>
</html>