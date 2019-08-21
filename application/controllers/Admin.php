<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if ($this->config->item('is_admin_configured') === FALSE) {
            header('Location:' . base_url("admin/config"));
        }
        if (!is_logged_admin()) {
            $this->session->set_flashdata('redirect', uri_string());
            header('Location:' . base_url("admin/login"));
        }
        $this->load->model('transaction_model');
        $transactions = $this->transaction_model->get_last_ten_entries();
        $data =  array(
            'title' => 'Dashboard',
            'transactions' => $transactions,
        );
        $this->load->view('admin/dashboard', $data);
    }
    public function config()
    {
        if (!$this->config->item('is_admin_configured')) {
            $this->load->view('config_admin');
        } else {
            $this->session->set_flashdata('error', 'Already Configured');
            header('Location:' . base_url("admin"));
        }
    }
    public function configure()
    {
        $this->load->model('admin_model');
        $this->admin_model->add_admin();
        // Function for changing config file data
        $out = '';
        $pattern = '$config[\'is_admin_configured\']';
        $newValue = 'TRUE';
        $filename = "application/config/config.php";
        if (file_exists($filename)) {
            $file = fopen($filename, 'r+');
            while (!feof($file)) {
                $line = fgets($file);
                if (strpos($line, $pattern) !== false) {
                    $out .= $pattern . "=" . $newValue . ";";
                    echo $newValue;
                } else {
                    $out .= $line;
                }
            }
            file_put_contents($filename, $out);
            fclose($file);
        } else {
            echo ' File not found';
        }
        header('Location:' . base_url("admin/login"));
    }

    public function order(string $action = 'index', int $id = NULL){

        if (!is_logged_admin()) {
            $_SESSION['redirect'] = uri_string();
            header('Location:' . base_url("admin/login"));
        }
        $this->load->model('order_model');
        if ($action === 'index') {
            $orders = $this->order_model->get_orders();
            $data = array(
                'title' => "User_list",
                'orders' => $orders
            );
            $this->load->view('admin/order/index', $data);
        }
    }
    public function user(string $action = 'index', int $id = NULL)
    {
        if (!is_logged_admin()) {
            $_SESSION['redirect'] = uri_string();
            header('Location:' . base_url("admin/login"));
        }
        $this->load->model('user_model');
        if ($action === 'index') {
            $users = $this->user_model->get_last_ten_entries();
            $data = array(
                'title' => "User_list",
                'users' => $users
            );
            $this->load->view('user_list', $data);
        }
        if ($action == 'delete' && $id != NULL) {
            if ($this->user_model->delete_user($id)) {
                $this->session->set_flashdata('success', 'Deleted User Successfully');
            } else {
                $this->session->set_flashdata('error', 'User didn\'t Deleted .Please Try Again.');
            }
            header('Location:' . base_url() . 'admin/user');
        }
        if ($action == 'edit' && $id != NULL) {
            #Have to update and move to model base approach
            $this->load->database();
            $this->load->dbutil();
            $sql = "SELECT id, first_name, last_name, email, gender FROM users  WHERE id = ?";
            if ($query = $this->db->query($sql, $id)) {
                $user =  $query->result();
                $data = array(
                    'title' => 'Edit',
                    'user' => $user[0],
                );
                $this->session->set_tempdata('user_id', $user[0]->id, 300);
                $this->load->view('user_edit.php', $data);
            } else {
                $this->session->set_flashdata('error', 'User not Found .Please Try Again.');
            }
        }
    }
    public function user_update()
    {
        if (!is_logged_admin()) {
            $_SESSION['redirect'] = uri_string();
            header('Location:' . base_url("admin/login"));
        }
        $this->load->database();
        $this->load->dbutil();
        $this->load->helper('form');
        $sql = "UPDATE users SET first_name = ? , last_name = ? ,  email = ? ,gender =?  WHERE id = ?";
        if ($query = $this->db->query($sql, array($this->input->post('first-name'), $this->input->post('last-name'), $this->input->post('email'), $this->input->post('gender'), $_SESSION['user_id']))) {
            $_SESSION['user_id'] = NULL;
            $this->session->set_flashdata('success', 'User Updated Successfully');
        } else {

            $this->session->set_flashdata('error', 'Unable to Update .Please Try Again.');
        }
        header('Location:' . base_url() . 'admin/user');
    }
    public function login()
    {
        if ($this->config->item('is_admin_configured') === FALSE) {
            header('Location:' . base_url("admin/config"));
        }
        if (is_logged_admin()) {
            header('Location:' . base_url("admin"));
        }
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login', ['title' => 'Admin Login']);
        } else {
            $this->load->model('admin_model');
            if ($admin = $this->admin_model->get_admin_by_email($this->input->post('email'))) {
                if (password_verify($this->input->post('password'), $admin->password)) {
                    $newdata = array(
                        'first-name'  => $admin->first_name,
                        'last-name'     => $admin->last_name,
                        'logged_in' => TRUE,
                        'user_type' => 'admin',
                        'user_id' => $admin->id
                    );
                    $this->session->set_userdata($newdata);

                    $url = $_SESSION["redirect"] ?? "admin";
                    // FOR php version earlier than PHP7
                    // $url = isset($_SESSION["redirect"]) ? $_SESSION["redirect"] : "admin";
                    $_SESSION["redirect"] = "";
                    header('Location:' . base_url($url));
                } else {
                    $this->session->set_flashdata('error', "Password don't match");
                    $this->load->view('admin/login');
                }
            } else {
                $this->session->set_flashdata('error', "Email is not registered with any account. Please Register");
                $this->load->view('admin/login');
            }
        }
    }
    public function check_email($email)
    {
        $this->load->model('admin_model');

        if ($this->admin_model->isEmailRegistered($email)) {
            return true;
        } else {
            $this->form_validation->set_message('check_email', 'No account is registered with entered email');
            return false;
        }
    }
    public function signup()
    {
        # TODO: Model Base Approach
        $this->load->database();
        $this->db->insert('users', [
            'first_name' => $this->input->post('first-name'),
            'last_name' => $this->input->post('last-name'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('number'),
            'password' => password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT),
            'gender' => $this->input->post('gender'),
        ]);

        $this->session->set_flashdata('success', 'Admin Account Created Successfully');
        header('Location:' . base_url() . 'admin/login');
    }
    #TODO : have to look through full function
    public function product(string $action = 'index', int $id = NULL)
    {
        if (!is_logged_admin()) {
            $_SESSION['redirect'] = uri_string();
            header('Location:' . base_url("admin/login"));
        }
        $this->load->model('product_model');
        if ($action === 'index') {
            $products = $this->product_model->get_last_ten_entries();
            $data = array(
                'title' => "product_list",
                'products' => $products
            );
            $this->load->view('admin/product/product_list', $data);
        }
        if ($action == 'add') {
            $data = array(
                'title' => 'Add Product',
            );
            $this->load->view('admin/product/product_create', $data);
        }
        if ($action == 'save') {
            $target_dir = "./assets/img/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            if ($_FILES["image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    if ($this->product_model->add_product()) {
                        $this->session->set_flashdata('success', 'Added product Successfully');
                    } else {
                        $this->session->set_flashdata('error', 'User can\'t Added .Please Try Again.');
                    }
                    header('Location:' . base_url() . 'admin/product');

                    $this->load->view('admin/product/product_create', $data);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        if ($action == 'delete' && $id != NULL) {
            if ($this->product_model->delete_product($id)) {
                $this->session->set_flashdata('success', 'Deleted Product Successfully');
            } else {
                $this->session->set_flashdata('error', 'Product didn\'t Deleted .Please Try Again.');
            }
            header('Location:' . base_url() . 'admin/product');
        }
        if ($action == 'edit' && $id != NULL) {
            $this->load->model('product_model');
            if ($query = $this->product_model->get_product($id)) {
                $product =  $query->result();
                $data = array(
                    'title' => 'Edit',
                    'product' => $product[0],
                );
                $this->session->set_tempdata('product_id', $product[0]->id, 300);
                $this->load->view('admin/product/product_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'product not Found .Please Try Again.');
            }
        }
        if ($action == 'update') {

            $this->load->database();
            $this->load->dbutil();
            $this->load->library('session');
            $this->load->helper('form');
            $sql = "UPDATE product SET name = ? , price = ? ,  description = ? WHERE id = ?";
            if ($query = $this->db->query($sql, array($this->input->post('name'), $this->input->post('price'), $this->input->post('description'), $_SESSION['product_id']))) {
                $_SESSION['product_id'] = NULL;
                $this->session->set_flashdata('success', 'Product Updated Successfully');
            } else {

                $this->session->set_flashdata('error', 'Unable to Update .Please Try Again.');
            }
            header('Location:' . base_url() . 'admin/product');
        }
    }
    public function forgot_password()
    {
        #TODO : What to do if already logged in
        $data = array(
            'title' => 'Forgot Password'
        );
        $this->load->view('admin/forgot_password', $data);
    }
    public function reset_link()
    {
        $email = trim($this->input->post('email'));
        $this->load->model('admin_model');
        $this->load->model('passwordreset_model');
        if ($admin = $this->admin_model->get_admin_by_email($this->input->post('email'))) {
            $reset_link = sha1($admin->email . time());
            $email = $admin->email;
            $fullname = $admin->first_name . ' ' . $admin->last_name;
            $subject = 'Reset Password';
            $html = '<p>Your Reset Link is <a href="' . base_url("admin/reset_password/" . $reset_link) . '">' . base_url("reset_password/" . $reset_link) . '</a></p>';
            $this->load->helper('mail_helper');
            if (send_mail($email, $fullname, $subject, $html)) {
                $this->passwordreset_model->save_reset_link($admin->id, $admin->email, $reset_link);
                $this->session->set_flashdata('success', 'Reset Link sent to Email Click on the link and change Password');
            } else {
                $this->session->set_flashdata('error', 'Error during sending reset link . Please Try again ');
            }
            header('Location:' . base_url("admin/forgot_password"));
        }
    }
    public function reset_password($link)
    {
        $this->load->model('passwordreset_model');
        if ($this->passwordreset_model->is_valid($link)) {
            $link_data = $this->passwordreset_model->get_link_data($link);
            $this->passwordreset_model->set_expired($link_data->id);
            $data = array(
                'title' => 'Reset Password',
                'link' => $link_data->link,
            );
            $this->load->view('admin/reset_password', $data);
        } else {
            $this->session->set_flashdata('error', 'Reset Link Expired Try Again..');
            header('Location:' . base_url("admin/forgot_password"));
        }
    }
    public function change_password()
    {
        $this->load->model('passwordreset_model');
        $this->load->model('admin_model');
        if ($this->input->post('password') == $this->input->post('confirm_password')) {
            $link_data = $this->passwordreset_model->get_link_data($this->input->post('verification'));
            $id = $link_data->account_id;
            $password = password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT);
            if ($this->admin_model->update_password($id, $password)) {
                $this->session->set_flashdata('success', 'Password Updated Successfully');
                header('Location:' . base_url("admin/login"));
            } else {
                $this->session->set_flashdata('error', 'Try Again');
                header('Location:' . base_url("admin/forgot_password"));
            }
        } else {
            $this->session->set_flashdata('error', 'Password didnt match');
            header('Location:' . base_url("admin/forgot_password"));
        }
    }
}
