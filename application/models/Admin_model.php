<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
public function get_admin_by_email(string $email = NULL)
{
    $sql = "SELECT * FROM admin  WHERE email = ?";
    $query = $this->db->query($sql, $email);
    $result = $query->result();
    if (count($result) <= 0) {
        return false;
    }
    return $result[0];
}
public function get_last_ten_entries()
{
    $query = $this->db->get('admin', 10);
    return $query->result();
}
public function add_admin()
{
    $this->load->dbutil();
    return $this->db->insert('admin', [
        'first_name' => $this->input->post('first-name'),
        'last_name' => $this->input->post('last-name'),
        'email' => $this->input->post('email'),
        'mobile_number' => $this->input->post('number'),
        'password' => password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT),
        'gender' => $this->input->post('gender'),
        'dob' => $this->input->post('DOB'),
    ]);
}
public function update_password($id, $password)
{
    $sql = "UPDATE admin SET password = ?  WHERE id = ?";
    if ($this->db->query($sql, array($password, $id))) {
        return true;
    }
    return false;
}
public function isEmailRegistered($email)
{
    $sql = "SELECT * FROM admin  WHERE email = ?";
    $query = $this->db->query($sql, $email);
    $result = $query->result();
    if (count($result) <= 0) {
        return false;
    } else {
        return true;
    }
}
}
