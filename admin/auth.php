<?php
// admin/auth.php
require_once __DIR__ . '/functions.php';

if (!is_logged_in()) {
    redirect(ADMIN_URL . '/login.php');
}