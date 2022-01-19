<?php
@require_once 'SQL.php';
//Additional Functions
function closeScript($header){
    header($header);
    exit();
}

//Functions of Signup.php
function emptyInputSignup($email, $psword, $usernm){
    $rtv = false;
    if (empty($email) || empty($psword) || empty($usernm)){
        $rtv = true;
    }
    else {
        $rtv = false;
    }
    return $rtv;
}

function invalidUsername($usernm){
    $rtv = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $usernm)) {
        $rtv = true;
    }
    return $rtv;
}

function invalidEmail($email) {
    $rtv = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $rtv = true;
    }
    return $rtv;
}

function MatchUsernames($conn, $usernm, $email) {
    //connects to the bloom database and checks for matching username or e-mails
    $rtv = true;
    $sql = "SELECT * FROM bloom_user WHERE user_name = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        closeScript("location: ../PHP/Signup.php?error=stmt1 failed");
    }

    mysqli_stmt_bind_param($stmt, "ss", $usernm, $email);
    mysqli_stmt_execute($stmt);

    $rtv_data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($rtv_data)) {
        return $row;
    } else {
        $rtv = false;
        return $rtv;
    }
    mysqli_stmt_close($stmt);
}

function createAcc($conn, $email, $usernm, $psword) {
    //connects to the db and creates user account from sign-up page
    $encrypted_pass = password_hash($psword, PASSWORD_DEFAULT);
    $sql = "INSERT INTO bloom_user (user_name,user_email,user_pass) 
    VALUES ('$usernm','$email','$encrypted_pass');";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        closeScript("location: ../PHP/Signup.php?error=insert failed");
    }
    mysqli_stmt_bind_param($stmt, "sss", $usernm, $email, $encrypted_pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    closeScript("location: ../PHP/Signup.php?error=Account signed successful");
}

//Functions of Login.Comms.php
function emptyInputLogin($psword, $usernm){
    $rtv = false;
    if (empty($psword) || empty($usernm)){
        $rtv = true;
    }
    else {
        $rtv = false;
    }
    return $rtv;
}

function loginUser($conn, $usernm, $psword){
    $userVar = MatchUsernames($conn, $usernm, $usernm);
    $sql = "SELECT * FROM bloom_db WHERE user_name = ? OR user_email = ?;";

    if ($userVar === false) {
        closeScript("location: ../PHP/Signup.php?error=Invalid_Username/Password");
    }

    $passHash = $userVar["user_pass"];
    $passcheck = password_verify($psword, $passHash);

    if ($passcheck === false) {
        closeScript("location: ../PHP/Signup.php?error=Invalid_Username/Password");
    }
    else if ($passcheck === true) {
        session_start();

        //Declaires Session Variables
        $_SESSION["BloomUser_id"] = $userVar["user_id"];
        $_SESSION["BloomUser_name"] = $userVar["user_name"];
        $_SESSION["Loggedin"] = true;
        closeScript("location: ../PHP/Main?successfulLogin");
    }
}

function check_login(){
    if ($_SESSION["Loggedin"] === false){
        closeScript("location: ../PHP/Login.php?error=not logged in user");
    } 
}