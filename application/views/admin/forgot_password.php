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
            <h3 class="lead text-primary">Forgot Password</h3>
            <?php $this->load->view('includes/message'); ?>
            <form action="<?= base_url("admin/reset_link") ?>" method="post">
                <div class="form-group">
                    <label for="email">Registered Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send Reset Link">
                </div>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>