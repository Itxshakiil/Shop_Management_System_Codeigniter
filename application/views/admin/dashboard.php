<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$this->load->view('includes/header');
$this->load->view('includes/navbar');
?>
<main>
    <div class="container">
        <?php $this->load->view('includes/message'); ?>
        <div class="action-btns">
            <a href="<?= base_url() ?>admin/user" class="btn btn-primary">User Management</a>
            <a href="<?= base_url() ?>admin/product" class="btn btn-primary">Product Management</a>
        </div>
        <section class="orders">
            <p class="lead btn text-primary">Orders</p>
            <table>
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction) : ?>
                        <tr>
                            <td><?= $transaction->id ?></td>
                            <td><?= $transaction->customer_id ?></td>
                            <td><?= $transaction->product ?></td>
                            <td><?= $transaction->amount ?> <?= $transaction->currency ?></td>
                            <td><?= $transaction->status == 'succeeded'  ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Failed</span>' ?></td>
                            <td><?= $transaction->created_at ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</main>
<?php
$this->load->view('includes/footer');
?>