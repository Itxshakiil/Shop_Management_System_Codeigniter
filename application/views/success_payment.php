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
            <h2>Thank you for purchasing <?php echo str_replace("%20", " ", $product); ?></h2>
            <hr>
            <p>Your transaction ID is <strong> <?php echo $tid; ?></strong></p>
            <p>Check your email for more info</p>
            <p><a href="<?= base_url() ?>" class="btn btn-light mt-2">Go Back</a></p>

        </div>
    </div>
    </div>
</main>
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>