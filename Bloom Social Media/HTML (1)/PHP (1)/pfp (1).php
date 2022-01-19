<?php
session_start();
include'../PHP_Comms/SQL.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
        echo "<pre>";
        print_r($_FILES);
        echo "<pre>";
        if($_FILES['file']['type'] === "image/jpeg"){
            $allowedsize = (1024 * 1024) * 3;
            if($_FILES['file']['size']< $allowedsize){
                    $filename = "../../Uploads/" . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $filename);

                    if(file_exists($filename)){
                        $usID = $_SESSION['BloomUser_id'];
                        $q = "update `bloom_user` set `bloom_pfp` = '$filename' where `user_id` = '$usID' limit 1";
                        $BF = new bloom_functions();
                        $res = $BF->save($q);

                        header(("location: profile.php"));
                        die;
                    }
            }
        }
        die;
        
    }
}

?>





<form id="profile_change"method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="file" name="file">
    <input class="submit-btn" type="submit" value="Post">
</form>
