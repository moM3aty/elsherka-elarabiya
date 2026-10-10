<?php
// contact-submit.php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . SITE_URL . '/contact.php'); exit;
}

$name    = trim($_POST['name'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$area    = trim($_POST['area'] ?? '');
$service = trim($_POST['service'] ?? '');
$notes   = trim($_POST['notes'] ?? '');
$isAjax  = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

function respond($ok, $msg, $ajax) {
    if ($ajax) { header('Content-Type: application/json'); echo json_encode(['ok'=>$ok,'message'=>$msg]); exit; }
    header('Location: ' . SITE_URL . '/contact.php?' . ($ok ? 'sent=1' : 'error=1')); exit;
}

if (!$name || !$phone) respond(false, 'الرجاء إدخال الاسم والهاتف.', $isAjax);
if (!preg_match('/^[\d\s\+\-\(\)]{6,20}$/', $phone)) respond(false, 'رقم هاتف غير صالح.', $isAjax);

$ip = $_SERVER['REMOTE_ADDR'] ?? '';
$check = $pdo->prepare("SELECT COUNT(*) FROM messages WHERE ip_address=? AND created_at > (NOW() - INTERVAL 1 HOUR)");
$check->execute([$ip]);
if ($check->fetchColumn() > 5) respond(false, 'تم تجاوز الحد المسموح. حاول لاحقاً.', $isAjax);

$stmt = $pdo->prepare("INSERT INTO messages (name,phone,area,service,notes,ip_address) VALUES (?,?,?,?,?,?)");
$stmt->execute([$name,$phone,$area,$service,$notes,$ip]);

respond(true, 'تم استلام طلبك، سيتواصل معك فريقنا قريباً.', $isAjax);