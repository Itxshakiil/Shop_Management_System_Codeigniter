<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$this->load->view('includes/header');
$this->load->view('includes/navbar');
?>
<main>
    <div class="container">
        <div class="action-btns">
            <a href="user" class="btn btn-primary">User Management</a>
            <a href="product" class="btn btn-primary">Product Management</a>
        </div>
        <p class="lead text-primary">
            Orders
        </p>
        <?php
        $this->load->view('includes/message');
        ?>
        <div class="table-wrapper">

        <table>
            <tr>
                <th>Order Id</th>
                <th>Product Name</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Payment Id</th>
                <th>Invoice</th>
                <!-- <th>Edit</th>
                <th>Delete</th> -->
            <tr>
                <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $order->order_id ?></td>
                    <td><?= $order->name ?></td>
                    <td><?= $order->amount ?> <?= $order->currency ?></td>
                    <td><span class="badge badge-primary"><?= $order->status ?></span></td>
                    <td><?= $order->payment_id ?></td>
                    <td><i class="fa fas fa-file" title="Create Invoice"></i></td>
                <tr>
                <?php endforeach ?>
        </table>
        </div>
        <a href="order/add" class="btn btn-primary">Add order </a>
    </div>
</main>
<?php
$this->load->view('includes/footer');
?>