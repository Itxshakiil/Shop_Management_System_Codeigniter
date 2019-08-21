<?php
class Order_model extends CI_model
{
    private $privateKey = "23xP5rQCOqdRjie8nNvu3FD2";
    public $publicKey = "rzp_test_UtGYTNBzepZoVA";
    public $api;
    public function __construct()
    {
        parent::__construct();
        require_once('./vendor/autoload.php');
        $this->api = new \Razorpay\Api\Api($this->publicKey, $this->privateKey);
        $this->load->database();
    }
    public function get_orders()
    {
        $this->load->dbutil();
        $sql = "SELECT o.*,p.name
                FROM orders o
                INNER JOIN product p
                ON o.product_id = p.id";
        $query = $this->db->query($sql, '');
         return $query->result();
    }
    public function add_order($order_data, $product_id)
    {
        return $this->db->insert('orders', [
            'order_id' => $order_data['id'],
            'product_id' => $product_id,
            'amount' => $order_data['amount'],
            'currency' => $order_data['currency'],
            'receipt' => $order_data['receipt'],
            'status' => $order_data['status'],
        ]);
    }
    public function update_payment($payment)
    {
        $data = array(
            'payment_id' => $payment['id'],
            'status' => self::get_order_status($payment['order_id']),
        );

        $this->db->where('order_id', $payment['order_id']);
        return $this->db->update('orders', $data);
    }
    public function get_order_status($order_id)
    {
        $order = $this->api->order->fetch($order_id);
        return $order['status'];
    }
}
