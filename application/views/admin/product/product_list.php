<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$this->load->view('includes/header');
$this->load->view('includes/navbar');
?>
<main>
    <div class="container">
        Welcome, <?= $_SESSION['first-name'] ?? 'User'  ?>
        <div class="action-btns">
            <a href="user" class="btn btn-primary">User Management</a>
            <a href="product" class="btn btn-primary">Product Management</a>
        </div>
        <p class="lead text-primary">
            Products
        </p>
        <?php
        $this->load->view('includes/message');
        ?>
        <table>
            <tr>
                <th>User Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Last Updated</th>
                <th colspan="3">Actions</th>
                <!-- <th>Edit</th>
                <th>Delete</th> -->
            <tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <?php foreach ($product as $detail) : ?>
                        <? if ($detail == 'description') : ?>
                            <?php
                            $detail = str_replace('&nbsp;', ' ', $detail);
                            $detail = substr($detail, 0, 100); ?>
                        <? endif ?>
                        <td><?= strip_tags($detail) ?></td>
                    <?php endforeach ?>
                    <td>
                        <a href="<?= base_url() ?>product/view/<?= $product['id'] ?>" title="View"> <i class="fa fa-eye fas"></i> </a></td>
                    <td>
                        <a href="product/edit/<?= $product['id'] ?>" title="Edit"> <i class="fa far fa-edit "></i></a></td>
                    <td>

                        <a onclick="return confirm('Are you Sure You want to Delete This Entry?')" href="product/delete/<?= $product['id'] ?>" title="Delete">  <i class="fa fas fa-trash"></i></i>
                    </td>
                <tr>
                <?php endforeach ?>
        </table>
        <a href="product/add" class="btn btn-primary">Add Product </a>
    </div>
</main>
<?php
$this->load->view('includes/footer');
?>