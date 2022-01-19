<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <img class="bg_banner" src="../../Assets/LogIn-Registration/Registration_login.png" alt="">
        
        <div class="Signup">
            <span class="Index_Notif"> 
                <?php
                include_once 'includes/loginnotif.inc.php';
            ?>
            </span>
            <form method="POST" action="../PHP_Comms/Login.Comms.php">
                <div class="LoginFormStyle">
                    <p>Email or Username:</p><input name="UserorEmail" type="text" placeholder="example@Gmail.com">
                </div>
                <div class="LoginFormStyle">
                    <p>Password:</p><input name="Password"type="text" placeholder="Password">
                </div>
                <div class="option-box">
                    <input class="sbt-btn opt-btn" name="submit" type="submit" placeholder=" Submit ">
                    <a class="btn-signin opt-btn" href="Signup.php"> Sign up </a>
                </div>
            </form>
        </div>
    </main>
    <?php
    echo '<link rel="stylesheet" type="text/css" href="../../CSS/Signup.css">';
    ?>
</body>
</html>