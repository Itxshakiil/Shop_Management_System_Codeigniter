<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$this->load->view('includes/header');
$this->load->view('includes/navbar');
?>
<main>
    <div class="container">
        <div class="form-wrapper">
            <h3 class="lead text-primary">Login</h3>
            <?php $this->load->view('includes/message'); ?>
            <form action="<?= base_url("admin/signin") ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" required autofocus/>
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required />
                    <div class="row">
                            <small class="input-hint col">Password is case-sensitive.</small>
                        <a href="<?= base_url("admin/forgot_password") ?>" class="forgot_password col">Forgot Password?</a>
                    </div>
                    <div class="password-toggle">
                        <input type="checkbox" name="show-password" id="show-password"><label for="show-password">Show Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>