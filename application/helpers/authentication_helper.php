<?php

function is_logged()
{
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        return true;
    }
    return false;
}
function is_logged_admin()
{
    if (is_logged() && $_SESSION['user_type'] == 'admin') {
        return true;
    }
    return false;
}


