<?php
class Customer_model extends CI_Model
{
    public function addCustomer($data)
    {
        $this->load->database();
        $this->load->dbutil();
        return $this->db->insert('customers', [
            'id' => $data['id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
    }

    public function getCustomers()
    {
        $this->db->query('SELECT * FROM customers ORDER BY created_at DESC');

        $results = $this->db->resultset();

        return $results;
    }
}
