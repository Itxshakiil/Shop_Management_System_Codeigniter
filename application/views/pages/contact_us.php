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
            <h3 class="lead">Add Product</h3>
            <form action="<?php echo base_url() . 'admin/product/save'; ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                <div class="form-wrapper">
                    <form action="" id="myForm" onsubmit="return validate()" class="contact-form" method="post">
                        <h1 class="title">Contact Us</h1>
                        <div class="input-wrapper">
                            <label for="name" data-info="Enter Full name">Name</label>
                            <input type="text" name="name" id="name" class="required" title="Enter Your Full name" placeholder="Enter Your Full name" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="mobile">Mobile</label>
                            <input type="number" max="9999999999" min="1234567890" name="mobile" id="mobile" placeholder="Enter Mobile Number">
                        </div>
                        <div class="input-wrapper">
                            <label for="contact-msg">Message</label>
                            <span style="color:red;margi n-left:.2em;">*</span>
                            <textarea name="msg" id="contact-msg" required cols="30" rows="10" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="input-wrapper">
                            <input type="submit" value="Send">
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
$this->load->view('includes/footer');
?>