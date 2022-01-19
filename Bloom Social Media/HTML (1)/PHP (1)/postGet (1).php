<?php $basicimgURL="../../Assets/Pictures/anonymous-male-profile-picture-emotion-avatar-vector-15887369.jpg"?>

<div id="post">
    <div class="Main_Box">
        <div class="img_holder">

        <?php
            $image = $USERROW["bloom_pfp"];
            if($image == ""){
                $image=$basicimgURL;
            }
        ?>    

        <img src="<?php echo $image ?>" alt=""></div>
        <div class="post_ContentWrapper">
            <h6><?php echo $USERROW["user_name"] ?></h6>
            <p><?php echo $row['bloom_content'] ?></p>
        </div>
        <img class="Postimg" src="<?php echo $row['bloom_image']?>">    
    </div>
    <div class="Option_Box">
    <a href="">Like</a> 
    <a href="">Comment</a> 
    <span> 
         <?php echo $row['bloom_date']?>
    </span>
    </div>
    
</div>