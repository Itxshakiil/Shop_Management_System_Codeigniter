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
            Users
        </p>
        <?php $this->load->view('includes/message') ?>
        <table>
            <tr>
                <th>User Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Last Updated</th>
                <th>Edit</th>
                <th>Delete</th>
            <tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->first_name ?></td>
                    <td><?= $user->last_name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->gender ?></td>
                    <td><?= $user->updated_at ?></td>
                    <td>
                        <a href="user/edit/<?= $user->id ?>" title="Edit">Edit </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you Sure You want to Delete This Entry?')" href="user/delete/<?= $user->id ?>" title="Delete"> Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</main>
<?php
$this->load->view('includes/footer');
?>