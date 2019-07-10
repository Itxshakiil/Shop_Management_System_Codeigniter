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
            <?= validation_errors() ?>
            <form action="<?= base_url("login") ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required />
                    <i class="fa fas fa-eye password-toggler" title="Show Password"></i>
                    <small class="input-hint">Password is case-sensitive.</small>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Didn't Have an Account? <a href="<?php echo  base_url() . 'register'; ?>" class="text-primary">Register</a></p>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>