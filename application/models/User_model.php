<?php
class User_model extends CI_Model
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $mobile_number;
    protected $gender;
    public function another(string $first_name = null, string $last_name = null, string $email, string $password = null, int $mobile_number = null, string $gender = null)
    {
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$email = $email;
        $this->$password = $password;
        $this->$mobile_number = $mobile_number;
        $this->$gender = $gender;
    }
    public function get_user_by_email(string $email = NULL)
    {
        $this->load->database();
        $sql = "SELECT * FROM users  WHERE email = ?";
        $query =$this->db->query($sql, $email);
        $result = $query->result();
        if(count($result) <= 0 ){
            return false;
        }
        return $result[0];
    }
    public function get_last_ten_entries()
    {
        $this->load->database();
        $query = $this->db->get('users', 10);
        return $query->result();
    }
    public function delete_user(int $id = NULL)
    {
        if ($id == NULL || $id < 0) {
            return false;
        }
        // Check if User available to delete

        // Add to trash

        // Delete from Users
        $this->load->database();
        $this->load->dbutil();
        $sql = "DELETE FROM users  WHERE id = ?";
        return  $this->db->query($sql, $id);
    }
    public function get_user_info(int $id)
    { }
    public function update_users()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('users', $this, array('id' => $_POST['id']));
    }
    public function update_user(array $data, array $condition)
    {
        $this->db->update('users', $data, $condition);
    }
    public function get_user_where_email(){

    }
}
