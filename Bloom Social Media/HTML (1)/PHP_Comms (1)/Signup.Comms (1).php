<?php
if (isset($_POST["submit"])) {
    echo "declaring variables";
    $User = $_POST["Username"];
    $email = $_POST["Email"];
    $ps = $_POST["Password"];
    

require_once 'SQL.php';
require_once 'Functions.php';


    // Checks for empty lables
    if (emptyInputSignup($email, $ps, $User) !== false){
        header("location: ../PHP/Signup.php?error=PLEASE FILL THE LABELS");
        exit();
    }

    //Checks for username
    if (invalidUsername($User) !== false){
        header("location: ../PHP/Signup.php?error=USERNAME INVALID");
        exit();
    }

    //Checks Email Integrity
    if (invalidEmail($email) !== false){
        header("location: ../PHP/Signup.php?error=E-MAIL IS INVALID OR REGISTERED");
        exit();
    }

    //Checks for Username Duplicates
    if (MatchUsernames($conn, $User, $email)  !== false){
        header("location: ../PHP/Signup.php?error=USERNAME TAKEN");
        exit();
    }

    createAcc($conn, $email, $User, $ps);
} else {
    header("location: ../PHP/Signup.php");
}
