<?php
// config.php - نقطة الوصول العامة لكل الصفحات الأمامية
require_once __DIR__ . '/admin/config.php';
require_once __DIR__ . '/admin/functions.php';

// اختصارات للاستخدام في القوالب
$SITE_PHONE    = setting('site_phone', '65600310');
$SITE_WHATSAPP = setting('site_whatsapp', '96565600310');
$WA_BASE       = 'https://wa.me/' . $SITE_WHATSAPP;