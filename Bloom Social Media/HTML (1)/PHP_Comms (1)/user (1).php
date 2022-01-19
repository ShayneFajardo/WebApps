<?php

class User{
    public function get_user($id){

        $q = "select * from `bloom_user` where user_id = '$id' limit 1";
        $BF = new bloom_functions();
        $result = $BF->read($q);
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }
}
?>