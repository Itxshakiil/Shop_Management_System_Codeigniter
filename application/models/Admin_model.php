<?php
class Admin_model extends CI_Model
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
    public function get_admin_by_email(string $email = NULL)
    {
        $this->load->database();
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
        $this->load->database();
        $query = $this->db->get('admin', 10);
        return $query->result();
    }
    public function add_admin()
    {
        $this->load->database();
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
        $this->load->database();
        $sql = "UPDATE admin SET password = ?  WHERE id = ?";
        if ($this->db->query($sql, array($password, $id))) {
            return true;
        }
        return false;
    }
}
