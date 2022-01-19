<?php
if (isset($_POST["submit"])){

    $Login_usermail = $_POST["UserorEmail"];
    $Login_pass = $_POST["Password"];

    require_once 'SQL.php';
    require_once 'Functions.php';

    // Checks if user has filled all inputs
    if (emptyInputLogin($Login_pass, $Login_usermail) !== false){
        closeScript("location: ../PHP/Login.php?error=Incomplete_Login");
    }

    loginUser($conn, $Login_usermail, $Login_pass);
} else {
    closeScript("location: ../PHP/Login.php?error=function");
}