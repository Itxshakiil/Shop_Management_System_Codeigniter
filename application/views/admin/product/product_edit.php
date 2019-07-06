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
            <h3 class="lead">Edit</h3>
            <form action="<?php echo base_url() . 'admin/product/update'; ?>" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Product Name" value="<?= $product->name ?>" autofocus required>
                    </div>
                    <div class="form-group col">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" placeholder="Enter Price" value="<?= $product->price ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description <span style="color:red;margin-left:.2em;">*</span></label>
                    <textarea name="description" id="description" placeholder="Test Description" required> <?=$product->description?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
<?php
$this->load->view('includes/footer');
?>