<?php

class Utilities_model extends CI_Model{
    public function is_user_logged_in(){

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['user_type'] === 'user'){
            return true;
        }
        return false;
    }
}