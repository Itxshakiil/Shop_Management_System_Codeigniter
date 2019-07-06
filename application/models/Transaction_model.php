<?php
class Transaction_model extends CI_Model
{
    public function addTransaction($data)
    {
        $this->load->database();
        $this->load->dbutil();
        return $this->db->insert('transactions', [
            'id' => $data['id'],
            'customer_id' => $data['customer_id'],
            'product' => $data['product'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'status' => $data['status'],
        ]);
    }

    public function get_last_ten_entries()
    {
        $this->load->database();
        $query = $this->db->get('transactions', 10);
        return $query->result();
    }
    public function get_transactions()
    {
        $this->load->database();
        $query = $this->db->get('transactions');
        return $query->result();
    }
}
