<?php if (isset($_SESSION['success'])) : ?>
    <div class="message message-success">
        <?= $_SESSION['success'] ?>
    </div>
<?php elseif (isset($_SESSION['error'])) : ?>
    <div class="message message-danger">
        <?= $_SESSION['error'] ?>
    </div>
<?php elseif (isset($_SESSION['info'])): ?>
<div class="message message-info">
    <?= $_SESSION['info'] ?>
</div>
<?php endif ?>