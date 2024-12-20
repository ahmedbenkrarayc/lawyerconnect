<?php

function isAuth($role){
    if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_role'])){
        return $role == $_COOKIE['user_role'];
    }else if($role == 'guest'){
        return true;
    }

    return false;
}