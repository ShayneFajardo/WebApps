<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "PLEASE FILL THE LABELS"){
            echo "<p>Fill all required fields</p>";
        }
        elseif ($_GET["error"] == "USERNAME INVALID"){
            echo "<p>Make a proper Username</p>";
        }
        elseif ($_GET["error"] == "E-MAIL IS INVALID OR REGISTERED"){
            echo "<p>Invalid Email</p>";
        }
        elseif ($_GET["error"] == "USERNAME TAKEN"){
            echo "<p>Username or E-mail is already taken</p>";
        }
        elseif ($_GET["error"] == "stmt1 failed"){
            echo "<p>Failed to connect with db</p>";
        }
        elseif ($_GET["error"] == "Account signed successful"){
            echo "<p>Account signed successful</p>";
        }
    }