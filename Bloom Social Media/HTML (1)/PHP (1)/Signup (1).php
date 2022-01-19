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

            <form method="POST" action="../PHP_Comms/Signup.Comms.php">
                <div class="notif_txt">
                    <?php include_once '../PHP_Comms/Signup_Notif.Comms.php';?>
                </div>
                <div class="LoginFormStyle">
                    <p>Username:</p><input name="Username"type="text" placeholder="Username">
                </div>
                <div class="LoginFormStyle">
                    <p>Email:</p><input name="Email" type="text" placeholder="example@Gmail.com">
                </div>
                <div class="LoginFormStyle">
                    <p>Password:</p><input name="Password"type="text" placeholder="Password">
                </div>
                <div class="option-box">
                    <input class="sbt-btn opt-btn" name="submit" type="submit" placeholder="Sign-up">
                    <a class="btn-signin opt-btn" href="../PHP/Login.php"> LogIn </a>
                </div>
                
                
            </form>
        </div>
    </main>
    <?php
    echo '<link rel="stylesheet" type="text/css" href="../../CSS/Signup.css">';
    ?>
</body>
</html>