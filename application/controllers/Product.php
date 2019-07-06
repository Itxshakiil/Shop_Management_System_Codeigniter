<?php
class Product extends CI_Controller
{
    public function view(int $id = NULL)
    {
        $this->load->model('product_model');
        $query = $this->product_model->get_product($id);
        $product = $query->result();
        $data = array(
            'title' => "Product | Home",
            'product' => $product[0],
        );
        $this->load->view('product_view', $data);
    }
    public function buy($id)
    {
        $this->load->model('product_model');
        $query = $this->product_model->get_product($id);
        $product = $query->result();
        $product_price = $this->product_model->get_product_price($id);
        $data = array(
            'title' => "Buy | Home",
            'product' => $product[0],
            'product_price' =>  $product_price,
        );
        $this->load->view('paypal', $data);
    }

    public function charge($id)
    {
        require_once('./vendor/autoload.php');
        \Stripe\Stripe::setApiKey('sk_test_ft7Q5Cquk6Hje6lLbUAaJpOB');

        // Sanitize POST Array
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

        $first_name = $POST['first_name'];
        $last_name = $POST['last_name'];
        $email = $POST['email'];
        $token = $POST['stripeToken'];

        // Create Customer In Stripe
        $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => $token
        ));

        //GET PRODUCT

        $this->load->model('product_model');
        $query = $this->product_model->get_product($id);
        $products = $query->result();

        // Charge Customer
        $charge = \Stripe\Charge::create(array(
            "amount" => $this->product_model->get_product_price($id) * 100,
            "currency" => "usd",
            "description" => $products[0]->name,
            "customer" => $customer->id
        ));

        // Customer Data
        $customerData = [
            'id' => $charge->customer,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email
        ];

        // // Instantiate Customer
        // $customer = new Customer();
        $this->load->model('customer_model');
        $query = $this->customer_model->addCustomer($customerData);
        // // Add Customer To DB
        // $customer->addCustomer($customerData);

        // Transaction Data
        $transactionData = [
            'id' => $charge->id,
            'customer_id' => $charge->customer,
            'product' => $charge->description,
            'amount' => $charge->amount,
            'currency' => $charge->currency,
            'status' => $charge->status,
        ];
        // // Instantiate Transaction
        // $transaction = new Transaction();

        $this->load->model('transaction_model');
        $query = $this->transaction_model->addTransaction($transactionData);

        // // Add Transaction To DB
        // $transaction->addTransaction($transactionData);

        // var_dump($transaction);
        // Redirect to success
        header('Location: ' . base_url("product/success/") . $charge->id . '/' . $charge->description);
    }
    public function success($charge_id, $description)
    {
        if (!empty($charge_id && !empty($description))) {
            $data = array(
                'title' => 'Thank You',
                "tid" => $charge_id,
                "product" => $description,
            );
            $this->load->view('success_payment', $data);
        } else {
            header('Location:' . base_url());
        }
    }
}