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
            <h3 class="lead">Checkout with Stripe</h3>
            <p class="text-dark">You are going to Pay <strong><?= $product_price ?> USD</strong> for <strong><?= $product->name ?></strong></p>
            <form action="<?= base_url("product/charge/") . $product->id ?>" method="post" id="payment-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class=" mb-3 StripeElement StripeElement--empty" placeholder="First Name" required />
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class=" mb-3 StripeElement StripeElement--empty" placeholder="Last Name" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class=" mb-3 StripeElement StripeElement--empty" placeholder="Enter Email Address" required />
                    </div>
                <button type="submit">Submit Payment</button>
            </form>
        </div>
    </div>
    </div>
</main>
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stripe.js"></script>
<?php
$this->load->view('includes/footer');
?>