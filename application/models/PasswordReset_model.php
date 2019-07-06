<?php
class PasswordReset_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function save_reset_link($account_id, $email, $link)
    {
        $this->load->dbutil();
        return $this->db->insert('reset_links', [
            'account_id' => $account_id,
            'email' => $email,
            'link' => $link
        ]);
    }
    public function get_link_data($link){
        $sql = "SELECT * FROM reset_links  WHERE link = ?";
        $query = $this->db->query($sql, $link);
        $result = $query->result();
        if (count($result) <= 0) {
            return false;
        }
        return $result[0];
    }
    public function is_valid($link){
        $link_data =self::get_link_data($link);
        if($link_data->expired){
            return true;
        }
        return false;
    }
    public function set_expired(int $id){
        $sql = "UPDATE reset_links SET expired = 0  WHERE id = ?";
        if( $this->db->query($sql, $id)){
            return true;
        }
        return false;
    }
}