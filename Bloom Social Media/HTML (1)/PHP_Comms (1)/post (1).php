<?php
require_once('SQL.php');
class Post{
    private $error="";

    public function create_post($userid, $content, $files)
    {
        if(!empty($content['boxpost']) || !empty($files['fileup'])){
            $post = addslashes($content['boxpost']);
            $filename = "../../Uploads/" . $files['fileup']['name'];
            move_uploaded_file($files['fileup']['tmp_name'], $filename);
            $postid = $this->create_postid();
            $query = "
            INSERT INTO bloom_post (bloom_userid,bloom_postid,bloom_content,bloom_image)
             VALUES ('$userid','$postid','$post','$filename');";
            $BF = new bloom_functions();
            $BF->save($query);
        }else
        {
            $this->error .=" Try to post something!<br>'";
        }
        return $this->error;
    }
    private function create_postid(){
        $length = rand(4,18);
        $number = "";
        for ($i=0; $i< $length; $i++){
            $new_rand = rand(0,9);
            $number = $number.$new_rand;
        }
        return $number;
    }

    public function get_Userpost($userID){
        $query = "SELECT * FROM `bloom_post` where bloom_userid = '$userID' order by bloom_id desc limit 5";

        $BF = new bloom_functions();
        $result = $BF->read($query);

        if($result)
        {
            return $result;
        } else {
            return false;
        }
    }
    public function get_Userimg($postID){
        $query = "SELECT bloom_image FROM `bloom_post` where bloom_postid = '$postID'";

        $BF = new bloom_functions();
        $result = $BF->read($query);

        if($result)
        {
            return $result;
        } else {
            return false;
        }
    }
}