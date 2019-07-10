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
            <h3 class="lead text-primary">Checkout with RazorPay</h3>
            <p class="text-dark">You are going to Pay <strong>₹ <?= $product_price ?></strong> for <strong><?= $product->name ?></strong></p>
            <form action="<?= base_url("product/charge/") . $product->id ?>" method="post" id="payment-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="nameInput" class=" mb-3" placeholder="John Doe" required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" name="emailInput" class=" mb-3" placeholder="Enter Email Address" required />
                </div>
                <div class="form-group">
                    <label for="contact">Mobile Number</label>
                    <input type="tel" name="contact" id="contact" placeholder="9876543210" required>
                </div>
                <div class="form-group">
                    <label for="contact">Shipping Address</label>
                    <div class="form-group">
                        <label for="notes[shipping address][local]">Street Address</label>
                        <input type="text" name="notes[shipping address][local]" id="notes[shipping address][local]" class="mb-3" placeholder="Flat/House No./Colony/Street/Locality" required />
                    </div>
                    <div class="form group row">

                        <div class="form-group">
                            <label for="notes[shipping address][state]">State</label>
                            <input type="text" name="notes[shipping address][state]" id="notes[shipping address][state]" class="mb-3" placeholder="State" required />
                        </div>
                        <div class="form-group">
                            <label for="notes[shipping address][pincode]">Pincode</label>
                            <input type="number" name="notes[shipping address][pincode]" id="notes[shipping address][pincode]" class="mb-3" placeholder="6 digits [0-9] pincode" max-length="6" required />
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Submit Payment</button>
            </form>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                const paymentForm = document.getElementById('payment-form');
                paymentForm.addEventListener('submit', (event) => {
                    event.preventDefault();
                    let shippingAddress = function(formData) {
                        let address = ' ';
                        address = formData.get('notes[shipping address][local]');
                        address += ',';
                        address += formData.get('notes[shipping address][state]');
                        address += '-';
                        address += formData.get('notes[shipping address][pincode]');
                        return address;
                    }
                    var formData = new FormData(paymentForm);
                    console.log(event);
                    var options = {
                        "key": "rzp_test_UtGYTNBzepZoVA",
                        "name": "Acme Computers",
                        "description": "<?= $product->name ?>",
                        "image": "<?= base_url("assets/img/lazy-placeholder.png") ?>",
                        "order_id": "<?= $order['id'] ?>",
                        "handler": function(response) {
                            window.location.replace('<?= base_url("payment/verify/") ?>' + response.razorpay_signature +'/'+ response.razorpay_payment_id + '/' + response.razorpay_order_id);
                        },
                        "prefill": {
                            "name": formData.get('name').toString(),
                            "email": formData.get('email').toString()
                        },
                        "notes": {
                            "shipping_address": shippingAddress(formData).toString(),
                        },
                        "theme": {
                            "color": "#17a2b8"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                })
            </script>
        </div>
    </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>