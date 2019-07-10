<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->model('product_model');
		$products = $this->product_model->get_products();
		$data = array(
			'title' => "Acme Computers | Home",
			'products' => $products,
		);
		$this->load->view('welcome_message', $data);
	}
	public function register()
	{
		$this->form_validation->set_rules('first-name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('number', 'Mobile Number', 'required|greater_than[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register', ['title' => 'Register']);
		} else {
			$this->load->model('user_model');
			if ($this->user_model->create_user()) {
				$this->session->set_flashdata('success', "Account Registered Successfully.");
				redirect(base_url("login"));
			} else {

				$this->session->set_flashdata('error', "Error Occured. Please try again");

				$this->load->view('register', ['title' => 'Register']);
			}
		}
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('Login', ['title' => 'Login']);
		}else{
			$this->load->model('user_model');
			$user = $this->user_model->get_user_by_email($this->input->post('email'));
			if (password_verify($this->input->post('password'), $user->password)) {
				$newdata = array(
					'first-name'  => $user->first_name,
					'logged_in' => TRUE,
					'user_type' => 'user',
					'user_id' => $user->id
				);
				$this->session->set_userdata($newdata);
				header('Location:' . base_url());
			} else {
				$this->session->set_flashdata('error', "Password don't match");
				$this->load->view('login');
			}
		}
	}
public function email_check($email){
	$this->load->model('user_model');
	if($this->user_model->isEmailRegistered($email)){
	return true;
	}else {
		$this->form_validation->set_message('email_check', 'Email is not registered');
		return false;
	}
}
	public function __login()
	{
		$this->load->view('login', ['title' => 'Login | Acme Computers']);
	}
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location:./');
	}
	public function contact()
	{
		$data = array(
			'title' => 'Contact Us'
		);
		$this->load->view('pages/contact_us', $data);
	}
}
