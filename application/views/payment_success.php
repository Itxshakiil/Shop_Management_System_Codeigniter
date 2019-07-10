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
            <h3 class="lead">Payment Successful</h3>
            <p class="text-dark">Your Payment of <strong>₹ <?= $payment['amount']/100 ?></strong> is <strong><?=$payment['status'] ?></strong> for Order ID <strong>#<?=$payment['order_id']?></strong></p>


        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<?php
$this->load->view('includes/footer');
?>