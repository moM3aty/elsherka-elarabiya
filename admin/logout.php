<?php
// admin/logout.php
require_once __DIR__ . '/functions.php';
session_destroy();
redirect(ADMIN_URL . '/login.php');