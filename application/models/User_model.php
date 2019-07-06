<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_user_by_email(string $email = NULL)
    {
        $sql = "SELECT * FROM users  WHERE email = ?";
        $query = $this->db->query($sql, $email);
        $result = $query->result();
        if (count($result) <= 0) {
            return false;
        }
        return $result[0];
    }
    public function get_last_ten_entries()
    {
        $query = $this->db->get('users', 10);
        return $query->result();
    }
    public function delete_user(int $id = NULL)
    {
        if ($id == NULL || $id < 0) {
            return false;
        }
        # TODO:Check if available to delete
        # TODO:Add to Trash
        # TODO: Delete from Database
        $this->load->dbutil();
        $sql = "DELETE FROM users  WHERE id = ?";
        return  $this->db->query($sql, $id);
    }
    public function update_users()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();
        return $this->db->update('users', $this, array('id' => $_POST['id']));
    }
    public function create_user()
    {
        return $this->db->insert('users', [
            'first_name' => $this->input->post('first-name'),
            'last_name' => $this->input->post('last-name'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('number'),
            'password' => password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT),
            'gender' => $this->input->post('gender'),
        ]);
    }
    public function isEmailRegistered($email)
    {
        $sql = "SELECT * FROM users  WHERE email = ?";
        $query = $this->db->query($sql, $email);
        $result = $query->result();
        if (count($result) <= 0) {
            return false;
        }else{
            return true;
        }
    }
}
