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
            <h3 class="lead text-primary">Reset Password</h3>
            <?php $this->load->view('includes/message'); ?>
            <form action="<?= base_url("admin/change_password") ?>" method="post">
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required autofocus>
                    <div class="password-toggle">
                        <label for="show-password">
                            <input type="checkbox" name="show-password" id="show-password">Show Password
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                </div>
                <input type="hidden" name="verification" value="<?= $link ?>">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Change Password">
                </div>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>