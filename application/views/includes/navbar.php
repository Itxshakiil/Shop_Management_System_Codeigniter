<header class="bg-dark">
    <div class="header-wrapper">
        <div class="title"><i class="fas fa-laptop"></i> Acme Computers</div>
        <nav class="nav-wrapper">
            <div class="nav-link">
                <ul>
                    <li><a href="<?= base_url() ?>" title="Homepage">Home</a></li>
                    <!-- <li><a href="<?= base_url() ?>contact_us">Contact Us</a></li> -->
                    <li><a href="<?= base_url() ?>admin">Admin</a></li>
                    <!-- <li class="cart"><a href="#"><i class="fas fa-shopping-cart"></i></a><span class="badge badge-primary">15</span></li> -->
                </ul>
            </div>
            <div class="nav-btn">
                <ul>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
                        <li><a href="#">Welcome, <?= $_SESSION['first-name'] ?> </a></li>
                        <li><a class="text-light" href="<?= base_url("logout") ?>" title="Logout"><i class="far fa fa-sign-out-alt"></i></a></li>
                    <?php else :
                        ?>
                        <li><a href="<?= base_url("login") ?>" class=" btn">Login</a></li>
                        <li><a href="<?= base_url("register") ?>" class=" btn">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>