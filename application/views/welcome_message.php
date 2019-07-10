<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$this->load->view('includes/header');
$this->load->view('includes/navbar');
?>
<main>
	<section id="home-section">
		<div class="dark-overlay">
			<div class="main-content">
				<h2 class=" x-large">Welcome to My Shop</h2>
				<p class="lead">We provide quality laptops in reasonable price.</p>
				<div class="button">
					<a href="<?= base_url() ?>./#product-section" class="btn btn-primary action-btn">Our Products</a>
				</div>
			</div>
		</div>
	</section>
	<section class="container item-wrapper" id="product-section">
		<div class="section-title">
			Latest Item
		</div>
		<div class="section-items">
			<?php foreach ($products as $product) : ?>
				<div class="section-item card" title="Buy <?= $product->name ?>">
					<div class="item-img">
						<img src="<?= base_url("assets/img/lazy-placeholder.png") ?>" data-src="<?= base_url() ?>assets/img/<?= $product->img ? $product->img : 'bg.jpg' ?>" alt="<?= $product->name ?>" class="lazy">
						<div class="product-badge"> <span class="badge badge-primary">Sale</span><span class="badge badge-primary">Trending</span> </div>
						<span class="like-btn">Like <i class="far fa-heart"></i></span>
					</div>
					<div class="item-details">
						<a href="<?= base_url("product/view/" . $product->id) ?>">
							<div class="title"><?= $product->name ?></div>
						</a>
						<div class="btns">
							<span class="price"> ₹ <?= $product->price ?></span>
						</div>
						<!-- <a href="#" class="btn btn-primary">Add to Cart</a> -->
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
</main>
<?php
$this->load->view('includes/footer');
?>