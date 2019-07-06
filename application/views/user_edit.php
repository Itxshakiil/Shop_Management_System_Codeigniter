<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<main>
    <div class="container">
        <div class="form-wrapper">
            <h3 class="lead">Edit</h3>
            <form action="<?php echo base_url() . 'admin/user_update'; ?>" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first-name" id="first-name" placeholder="Enter Your First Name" value="<?= $user->first_name ?>" autofocus required>
                    </div>
                    <div class="form-group col">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="last-name" id="last-name" placeholder="Enter Your Last Name" value="<?= $user->last_name ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" value="<?= $user->email ?>" />
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url(); ?>assets/js/form.js"></script>
<?php
include 'includes/footer.php';
?>