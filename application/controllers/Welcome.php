<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('product_model');
		$products = $this->product_model->get_last_ten_entries();
		$data = array(
			'title' => "Acme Computers | Home",
			'products' => $products,
		);
		$this->load->view('welcome_message', $data);
	}
	public function product(int $id = NULL)
	{
		$this->load->model('product_model');
		$products = $this->product_model->get_last_ten_entries();
		$data = array(
			'title' => "Acme Computers | Home",
			'products' => $products,
		);
		$this->load->view('welcome_message', $data);
	}
	public function register()
	{
		$this->load->helper('form');
		$this->load->view('register', ['title' => 'Register']);
	}

	public function login()
	{
		$this->load->view('login', ['title' => 'Login | Acme Computers']);
	}
	public function signup()
	{
		$this->load->database();
		$this->db->insert('users', [
			'first_name' => $this->input->post('first-name'),
			'last_name' => $this->input->post('last-name'),
			'email' => $this->input->post('email'),
			'mobile_number' => $this->input->post('number'),
			'password' => password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT),
			'gender' => $this->input->post('gender'),
		]);
		header('Location:' . base_url("login"));
	}
	public function signin()
	{
		$this->load->model('user_model');
		if ($user = $this->user_model->get_user_by_email($this->input->post('email'))) {
			if (password_verify($this->input->post('password'), $user->password)) {
				echo 'Logged In';
				$newdata = array(
					'first-name'  => $user->first_name,
					'last-name'     => $user->last_name,
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
		} else {
			$this->session->set_flashdata('error', "Email is not registered with any account. Please Register");
			$this->load->view('login');
		}
	}
	public function logout(){
		session_unset();
		session_destroy();
		header('Location:./');
	}
	public function contact(){
		$data = array(
			'title' => 'Contact Us'
		);
		$this->load->view( 'pages/contact_us', $data);
	}
}
