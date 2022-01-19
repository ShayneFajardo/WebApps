<?php
include_once("../PHP_Comms/post.php");
include_once("../PHP_Comms/user.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $thispage = $_SERVER['PHP_SELF'];
    $post = new Post();
    $userid = $_SESSION['BloomUser_id'];
    $result = $post->create_post($userid, $_POST, $_FILES);

    if($result ="" && $postimg = ""){
        header("Location: $thispage");
        die;
    } else  {
        echo "<br> The following errors occured:<br><br>";
        echo $result;
    }
}

//Collect posts
    $post = new Post();
    $userid = $_SESSION['BloomUser_id'];
    $postinfo = $post->get_Userpost($userid);
?>
<div class="Post_Box">
     <div class="Update_box">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="txt_Wrapper">
                  <textarea name="boxpost" placeholder="What's on your mind?"></textarea>
            </div>
             <div class="Media_wrapper">
                 <label class="bt1"><input id="photo" type="file" class="btn1" name="fileup"/></label>
                 <input type="submit" class="btn3" placeholder=" Bloom">
             </div>      
        </form>
    </div>
        <div class="TL_Viewbox">
            <div class="MediaPost">
                <?php
                if($postinfo){
                    foreach ( $postinfo as $row) {
                        $user = new User();
                        $USERROW = $user->get_user($row['bloom_userid']);
                        include('postGet.php');
                    }
                }
                ?>
            </div>
        </div>
</div>