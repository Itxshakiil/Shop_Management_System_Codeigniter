<?php
class Payment_model extends CI_Model{
    private $privateKey = "23xP5rQCOqdRjie8nNvu3FD2";
    public $publicKey = "rzp_test_UtGYTNBzepZoVA";
    public $api ;
    public function __construct(){
        parent::__construct();
        require_once('./vendor/autoload.php');
        $this->api = new \Razorpay\Api\Api($this->publicKey,$this->privateKey);
        $this->load->database();
    }
    public function create_order($orderData){
        // $order = $api->order->create(array('receipt' => '1235',  'amount' => 2000,  'currency' => 'INR'));
        return $this->api->order->create($orderData);
    }
    public function get_payment($payment_id){
        return $this->api->payment->fetch($payment_id);
    }
    public function verify_payment($razorpay_signature, $razorpay_payment_id, $razorpay_order_id){
        $attributes = array('razorpay_signature' => $razorpay_signature, 'razorpay_payment_id' => $razorpay_payment_id, 'razorpay_order_id' => $razorpay_order_id,);
        return $this->api->utility->verifyPaymentSignature($attributes);
    }
    public function add_payment($payment_data)
    {
        return $this->db->insert('payment', [
            'payment_id' => $payment_data['id'],
            'amount' => $payment_data['amount'],
            'currency' => $payment_data['currency'],
            'status' => $payment_data['status'],
            'order_id' => $payment_data['order_id'],
            'method' => $payment_data['method'],
            'captured' => $payment_data['captured'],
            'description' => $payment_data['description'],
            'card_id' => $payment_data['card_id'],
            'email' => $payment_data['email'],
            'contact' => $payment_data['contact'],
            'shipping_address' => $payment_data['notes']['shipping_address']
        ]);
    }

}