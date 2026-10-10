<?php
require_once __DIR__ . '/auth.php';
header('Content-Type: application/json');

if (empty($_FILES['file'])) {
    echo json_encode(['error' => 'no file']); exit;
}
$url = upload_file('file', 'blog/inline', ['jpg','jpeg','png','webp','gif']);
if (!$url) { echo json_encode(['error' => 'upload failed']); exit; }
echo json_encode(['location' => $url]);