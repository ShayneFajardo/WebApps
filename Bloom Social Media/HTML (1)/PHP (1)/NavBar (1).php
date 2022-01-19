
<nav class="MainNav">
<?php
                $userID = $_SESSION["BloomUser_id"];
                $q = "select bloom_pfp from bloom_user where user_id = '$userID' limit 1";
                $BF = new bloom_functions();
                $result = $BF->read($q);
            $image = $result;
            if(file_exists($result[0]['bloom_pfp'])){
                $image = $result[0]['bloom_pfp'];
            } else {
                $image = "../../Assets/Pictures/anonymous-male-profile-picture-emotion-avatar-vector-15887369.jpg";
            }
                
            ?>
        <div id="Profile_picture"><img src="<?php echo $image;?>"></div>
        <?php echo '<h6 id="UserDisplay">' . $_SESSION["BloomUser_name"] . '</h6>';?>
        <a href="Main.php"><button class="btn1"> Home </button></a>
        <a href="Profile.php"><button class="btn2"> Profile </button></a>
        <a href="Logout.php"><button class="btn3"> Log out </button></a>
    </nav>