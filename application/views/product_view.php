<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<main>
    <section class="product-view container">
        <div class="content">
            <div class="img-container">

                <div class="item-img">
                    <img src="<?= base_url() ?>assets/img/<?= $product->img ? $product->img : 'bg.jpg' ?>" alt="Item Id">
                </div>
                <div class="product-detail">
                    <p><strong>Product :</strong> <?= $product->name ?></p>
                    <p><strong>Price :</strong> ₹ <?= $product->price ?></p>

                    <div class="center">
                        <div><?= @$product->description ?></div>
                    </div>
                </div>
                <div class="action-btn">
                    <a href="<?= base_url("product/buy/" . $product->id) ?>" class="btn btn-primary">Buy Now</a>
                    <button class="btn btn-success" disabled="disabled">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include 'includes/footer.php';
?>