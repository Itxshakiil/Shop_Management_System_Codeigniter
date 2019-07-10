<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Payment extends CI_Controller{
    public function index(){
        echo 'Index';
    }
    public function verify($razorpay_signature,$razorpay_payment_id,$razorpay_order_id){
        $this->load->model('payment_model');
        $payment = $this->payment_model->get_payment($razorpay_payment_id);
        $data = array(
            'title'     => 'Payment',
            'payment'   => $payment,
        );
        $this->payment_model->add_payment($payment);
        $this->load->model('order_model');
        if($this->payment_model->verify_payment($razorpay_signature, $razorpay_payment_id, $razorpay_order_id)) {
            if ($this->order_model->update_payment($payment) !== TRUE) {
                log_message('error', $this->order_model->update_payment($payment));
            }
            $this->load->view('payment_success',$data);

        }
    }
}