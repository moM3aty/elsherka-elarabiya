-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2026 at 10:06 PM
-- Server version: 11.8.9-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u439595347_elsharka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(120) DEFAULT NULL,
  `role` enum('super','editor') DEFAULT 'editor',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password_hash`, `full_name`, `role`, `last_login`, `created_at`) VALUES
(1, 'admin', 'info@elsharkaelarabiya.com', '$2y$10$01HU9yk/HlkpIFUgxT3ljubIoMefK6yvyNCG5BSwTBOVLHT.ctAlK', NULL, 'super', '2026-10-10 22:02:03', '2026-10-10 21:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `featured_image` varchar(500) DEFAULT NULL,
  `category` varchar(100) DEFAULT 'أخبار',
  `tags` varchar(500) DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `views` int(11) DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `category`, `tags`, `status`, `views`, `meta_title`, `meta_description`, `author_id`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'أفضل 10 نصائح لاختيار صباغ الكويت المحترف', 'tips-choosing-painter-kuwait', 'اختيار الصباغ المناسب هو أهم خطوة للحصول على تشطيب مثالي يدوم سنوات. تعرف على أهم المعايير التي يجب أن تبحث عنها.', '<h2>لماذا اختيار الصباغ أهم من نوع الدهان؟</h2><p>كثير من العملاء يركزون على نوع الدهان ويهملون مهارة الصباغ نفسه، مع أن <strong>الصباغ المحترف</strong> هو من يصنع الفرق الحقيقي في التشطيب النهائي.</p><h3>1. الخبرة في السوق الكويتي</h3><p>الصباغ الذي يعمل في الكويت سنوات طويلة يعرف تماماً كيف يتعامل مع:<br>- رطوبة الجو الكويتي<br>- درجات الحرارة المرتفعة<br>- أنواع الجدران المختلفة (خرسانة، طابوق، جبس)</p><h3>2. استخدام الخامات الأصلية</h3><p>اطلب دائماً أن يريك الصباغ علبة الدهان الأصلية وعلامتها التجارية. أشهر العلامات الموثوقة في الكويت: ناشيونال، جوتن، هيمبل.</p><h3>3. التأسيس الصحيح قبل الدهان</h3><p>الصباغ الجيد يخصص 60% من وقته للتأسيس: تنظيف الجدران، معالجة الشقوق، سنفرة، ثم وضع طبقة Primer.</p><h3>4. التسليم النظيف</h3><p>لا تقبل العمل قبل أن يقوم الصباغ ب:<br>- رفع الأغطية<br>- تنظيف الأرضيات<br>- إزالة أي بقايا دهان</p><h3>5. ضمان مكتوب</h3><p>الشركة المحترفة تقدم ضماناً مكتوباً على العمل والمواد.</p><p><strong>هل تبحث عن أفضل صباغ في الكويت؟</strong> اتصل بالشركة العربية للمنازل: <a href=\"tel:65600310\">65600310</a></p>', NULL, 'نصائح تصميم', NULL, 'published', 125, 'أفضل 10 نصائح لاختيار صباغ الكويت المحترف | الشركة العربية للمنازل', 'دليل شامل لاختيار أفضل صباغ في الكويت - معايير الجودة والتأسيس الصحيح والتسليم النظيف.', 1, '2026-10-10 21:27:14', '2026-10-10 21:27:14', '2026-10-10 21:38:31'),
(2, 'كيف تختار تصميم ديوانية كويتية فخمة تناسب مساحتك؟', 'choosing-dewaniya-design', 'الديوانية هي واجهة البيت الكويتي. تعرف على أحدث تصاميم الديوانيات الكويتية 2026 وعوامل اختيار التصميم المناسب.', '<h2>الديوانية: قلب الضيافة الكويتية</h2><p>الديوانية ليست مجرد غرفة، بل هي <strong>هوية البيت الكويتي</strong> وواجهة الكرم والضيافة. في هذا الدليل ستتعرف على أحدث التصاميم.</p><h3>أنواع الديوانيات الحديثة</h3><h4>1. الديوانية الأرضية التقليدية</h4><p>جلسات منخفضة ووسائد أرضية، مناسبة للمساحات الصغيرة وذات الطابع التراثي.</p><h4>2. الديوانية المرتفعة (جلسة كنبات)</h4><p>الأكثر شيوعاً حالياً، مع كنبات حديثة وطاولات جانبية، تناسب المساحات المتوسطة والكبيرة.</p><h4>3. الديوانية المفتوحة على حديقة</h4><p>تدمج بين الداخل والخارج، مثالية لمن لديه قسيمة واسعة أو فيلا.</p><h3>عوامل اختيار التصميم</h3><ul><li><strong>المساحة المتاحة:</strong> قياس دقيق قبل التصميم</li><li><strong>عدد الضيوف المتوقع:</strong> حدد الطاقة الاستيعابية</li><li><strong>نمط الحياة:</strong> مودرن أم كلاسيكي أم تراثي</li><li><strong>الميزانية:</strong> تتراوح من 3,000 إلى 25,000 دينار حسب المواصفات</li></ul><h3>5 عناصر أساسية لأي ديوانية فخمة</h3><ol><li>جدار ديكوري رئيسي (3D Wave أو تجاليد رخام)</li><li>أسقف جبسية بإضاءة مخفية</li><li>وحدة شاشة وتلفزيون مدمجة</li><li>منطقة مغاسل رخامية</li><li>مطبخ تحضيري مخفي</li></ol><p><strong>هل ترغب في تصميم ديوانية فخمة؟</strong> اتصل بنا للمعاينة المجانية: <a href=\"tel:65600310\">65600310</a></p>', NULL, 'ديوانيات', NULL, 'published', 89, 'كيف تختار تصميم ديوانية كويتية فخمة | دليل 2026', 'دليل شامل لاختيار تصميم ديوانية كويتية فخمة - أنواع الديوانيات وعوامل الاختيار والعناصر الأساسية.', 1, '2026-10-10 21:27:14', '2026-10-10 21:27:14', '2026-10-10 21:27:14'),
(3, 'الفرق بين بديل الخشب وبديل الرخام - أيهما أفضل لمنزلك؟', 'wood-vs-marble-alternatives', 'بديل الخشب وبديل الرخام من أكثر الخامات طلباً في 2026. تعرف على الفروق والمزايا والعيوب وأيهما يناسب مساحتك.', '<h2>بديل الخشب وبديل الرخام - مقارنة شاملة</h2><p>مع التطور الهائل في مواد الديكور، أصبح العملاء يفضلون <strong>البدائل الحديثة</strong> على الخامات الطبيعية. لكن أيهما أفضل؟</p><h3>بديل الخشب (WPC / PVC Wood)</h3><h4>المزايا:</h4><ul><li>مقاوم للرطوبة والماء 100%</li><li>لا يتأثر بالحشرات والأرضة</li><li>مظهر الخشب الطبيعي تماماً</li><li>سهل التنظيف والصيانة</li><li>أرخص بكثير من الخشب الطبيعي</li></ul><h4>العيوب:</h4><ul><li>لا يمكن إعادة دهانه (يُستبدل فقط)</li><li>يحتاج تركيب احترافي</li></ul><h3>بديل الرخام (PVC Marble Sheet)</h3><h4>المزايا:</h4><ul><li>مظهر الرخام الإيطالي الفاخر</li><li>مقاوم للخدوش والبقع</li><li>خفيف الوزن مقارنة بالرخام الطبيعي</li><li>بدون فواصل ترويبة</li><li>توفير 60-70% من تكلفة الرخام الأصلي</li></ul><h4>العيوب:</h4><ul><li>لا يتحمل الحرارة العالية جداً</li><li>يحتاج تنظيف بمواد مخصصة</li></ul><h3>أيهما يناسبك؟</h3><table style=\"width:100%;border-collapse:collapse\"><tr style=\"background:rgba(223,162,67,0.1)\"><th style=\"padding:10px;border:1px solid #333\">الاستخدام</th><th style=\"padding:10px;border:1px solid #333\">الأفضل</th></tr><tr><td style=\"padding:10px;border:1px solid #333\">خلفية شاشة التلفزيون</td><td style=\"padding:10px;border:1px solid #333\">بديل رخام + خشب مدمج</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">مدخل الفيلا</td><td style=\"padding:10px;border:1px solid #333\">بديل رخام</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">تجليد أعمدة</td><td style=\"padding:10px;border:1px solid #333\">بديل خشب</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">مغاسل ودورات مياه</td><td style=\"padding:10px;border:1px solid #333\">بديل رخام</td></tr></table><p><strong>هل تريد استشارة مجانية؟</strong> اتصل بنا: <a href=\"tel:65600310\">65600310</a></p>', NULL, 'ديكور', NULL, 'published', 156, 'بديل الخشب vs بديل الرخام - أيهما أفضل | دليل 2026', 'مقارنة تفصيلية بين بديل الخشب وبديل الرخام - المزايا والعيوب والاستخدامات المثالية لكل منهما.', 1, '2026-10-10 21:27:14', '2026-10-10 21:27:14', '2026-10-10 21:27:14'),
(4, 'مراحل تشطيب القسيمة السكنية في الكويت خطوة بخطوة', 'stages-of-villa-finishing-kuwait', 'دليل شامل لمراحل تشطيب القسيمة السكنية من الأسود إلى المفتاح - مع الجدول الزمني والتكاليف التقديرية.', '<h2>مراحل تشطيب القسيمة السكنية بالتفصيل</h2><p>تشطيب القسيمة السكنية رحلة تمتد من 4 إلى 8 أشهر. تعرف على كل مرحلة بالتفصيل.</p><h3>المرحلة 1: التأسيس (4-6 أسابيع)</h3><ul><li>أعمال العزل المائي للحمامات والمطابخ والسطح</li><li>تمديدات الصحي والسباكة</li><li>تمديدات الكهرباء والتكييف</li><li>اختبار ضغط المياه والكهرباء</li></ul><h3>المرحلة 2: المحارة والمساح (3-4 أسابيع)</h3><ul><li>محارة الجدران والأسقف</li><li>تركيب البورسلان والسيراميك</li><li>تركيب الرخام للمداخل والدرج</li></ul><h3>المرحلة 3: الجبس والديكورات (2-3 أسابيع)</h3><ul><li>تركيب أسقف الجبس بورد</li><li>تأسيس مسارات الإضاءة المخفية</li><li>تركيب بدائل الخشب والرخام</li></ul><h3>المرحلة 4: الأصباغ والأبواب (2-3 أسابيع)</h3><ul><li>معالجة الجدران وسنفرتها</li><li>تطبيق الدهانات النهائية</li><li>تركيب الأبواب والنوافذ</li><li>تركيب الإكسسوارات والمفاتيح</li></ul><h3>المرحلة 5: التنظيف والتسليم (أسبوع)</h3><ul><li>تنظيف شامل للموقع</li><li>فحص كافة الأنظمة</li><li>تسليم المفتاح</li></ul><h3>التكلفة التقديرية (قسيمة 400م²)</h3><table style=\"width:100%;border-collapse:collapse\"><tr style=\"background:rgba(223,162,67,0.1)\"><th style=\"padding:10px;border:1px solid #333\">البند</th><th style=\"padding:10px;border:1px solid #333\">التكلفة التقديرية (د.ك)</th></tr><tr><td style=\"padding:10px;border:1px solid #333\">التأسيسات (كهرباء + صحي)</td><td style=\"padding:10px;border:1px solid #333\">4,000 - 6,000</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">الأرضيات والرخام</td><td style=\"padding:10px;border:1px solid #333\">5,000 - 9,000</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">الجبس والديكورات</td><td style=\"padding:10px;border:1px solid #333\">3,000 - 5,000</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">الأصباغ والأبواب</td><td style=\"padding:10px;border:1px solid #333\">2,500 - 4,500</td></tr></table><p><strong>احجز معاينة مجانية لقسيمتك:</strong> <a href=\"tel:65600310\">65600310</a></p>', NULL, 'تشطيبات', NULL, 'published', 203, 'مراحل تشطيب القسيمة السكنية في الكويت خطوة بخطوة | دليل 2026', 'دليل شامل لمراحل تشطيب القسيمة السكنية في الكويت - التأسيس والمحارة والجبس والأصباغ مع التكاليف التقديرية.', 1, '2026-10-10 21:27:14', '2026-10-10 21:27:14', '2026-10-10 21:27:14'),
(5, 'أفكار ديكورات شاشة التلفزيون - 15 تصميم مودرن 2026', 'tv-wall-decor-ideas-2026', '15 فكرة عصرية لديكور شاشة التلفزيون بتصاميم مضلعة وبدائل خشب ورخام وإضاءة LED - بأفكار تناسب كل المساحات.', '<h2>أفكار ديكورات شاشة التلفزيون المودرن</h2><p>شاشة التلفزيون هي نقطة التركيز البصري في صالة المعيشة. اكتشف 15 تصميم عصري.</p><h3>1. التصميم المضلع (Fluted Panel)</h3><p>شرائح بديل الخشب المضلعة مع إضاءة LED خلف الشاشة - التصميم الأكثر طلباً في 2026.</p><h3>2. الرخام الكبير مع الخشب الداكن</h3><p>مزيج فاخر من بديل الرخام الأبيض وبديل خشب الجوز الداكن.</p><h3>3. التصميم المنحني (Curved)</h3><p>ألواح منحنية مضيئة تعطي إحساساً بالمستقبل.</p><h3>4. تصميم البانوهات الكلاسيكية</h3><p>إطارات جدارية مع خلفية قماشية للطابع الكلاسيكي.</p><h3>5. المكتبة المدمجة</h3><p>دمج رفوف الكتب مع ديكور الشاشة.</p><h3>6. الطابع الصناعي (Industrial)</h3><p>خرسانة مكشوفة وحديد أسود مع بديل خشب خام.</p><h3>7. الإضاءة المخفية</h3><p>بروفايل ليد مخفي خلف الشاشة وحول الرفوف.</p><h3>8. التصميم الهندسي الصارم</h3><p>خطوط مستقيمة زاوية 45 درجة.</p><h3>9. الأرضيات المثبتة (Floating Console)</h3><p>وحدة شاشة معلقة بطول مترين بدون أرجل.</p><h3>10. الطابع الياباني (Wabi-Sabi)</h3><p>خشب طبيعي بملمس غير مصقول.</p><h3>11. الرخام اللامع (Glossy)</h3><p>انعكاس قوي مع إضاءة مخفية.</p><h3>12. تجليد الجدار بالكامل</h3><p>تغطية الجدار من الأرض للسقف.</p><h3>13. تصميم 3D Wave</h3><p>موجات مجسمة على الخشب.</p><h3>14. تصميم مخفي (Hidden Design)</h3><p>الشاشة تنزلق داخل الجدار عند عدم الاستخدام.</p><h3>15. الدمج بين الطرز</h3><p>كلاسيكي + مودرن في تصميم واحد.</p><h3>التكلفة التقديرية</h3><p>تتراوح بين <strong>300 - 1,500 دينار</strong> حسب التصميم والمقاس والمواد.</p><p><strong>اطلب تصميم مخصص لشاشتك:</strong> <a href=\"tel:65600310\">65600310</a></p>', NULL, 'ديكور', NULL, 'published', 312, 'أفكار ديكورات شاشة التلفزيون - 15 تصميم مودرن 2026', '15 فكرة عصرية لديكور شاشة التلفزيون بتصاميم مضلعة وبدائل خشب ورخام وإضاءة LED.', 1, '2026-10-10 21:27:14', '2026-10-10 21:27:14', '2026-10-10 21:27:14'),
(6, 'أفضل أنواع السيراميك والبورسلان للصالات في الكويت', 'best-tiles-for-halls-kuwait', 'دليل شامل لاختيار السيراميك والبورسلان للصالات - المقاسات والأنواع والموردين وأسعار التكلفة للمتر.', '<h2>كيف تختار السيراميك المناسب للصالة؟</h2><p>الصالة هي المساحة الأكثر استخداماً في المنزل، لذا اختيار الأرضية الصحيحة أمر حيوي.</p><h3>الفرق بين السيراميك والبورسلان</h3><table style=\"width:100%;border-collapse:collapse\"><tr style=\"background:rgba(223,162,67,0.1)\"><th style=\"padding:10px;border:1px solid #333\">الميزة</th><th style=\"padding:10px;border:1px solid #333\">السيراميك</th><th style=\"padding:10px;border:1px solid #333\">البورسلان</th></tr><tr><td style=\"padding:10px;border:1px solid #333\">الصلابة</td><td style=\"padding:10px;border:1px solid #333\">متوسطة</td><td style=\"padding:10px;border:1px solid #333\">عالية جداً</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">امتصاص الماء</td><td style=\"padding:10px;border:1px solid #333\">3-6%</td><td style=\"padding:10px;border:1px solid #333\">0.5-3%</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">السعر</td><td style=\"padding:10px;border:1px solid #333\">اقتصادي</td><td style=\"padding:10px;border:1px solid #333\">أعلى بـ 30-50%</td></tr><tr><td style=\"padding:10px;border:1px solid #333\">العمر</td><td style=\"padding:10px;border:1px solid #333\">10-15 سنة</td><td style=\"padding:10px;border:1px solid #333\">20-30 سنة</td></tr></table><h3>المقاسات الشائعة للصالات</h3><ul><li><strong>60×60 سم:</strong> اقتصادي ومناسب للشقق</li><li><strong>80×80 سم:</strong> أكثر شيوعاً في الفلل</li><li><strong>120×60 سم:</strong> مودرن وعصري</li><li><strong>120×120 سم:</strong> فخم للصالات الكبيرة</li><li><strong>160×320 سم:</strong> الرخام الكبير للفلل الفاخرة</li></ul><h3>أنواع التصاميم</h3><ul><li>سيراميك رخامي (الأكثر طلباً)</li><li>سيراميك خشبي (بورسلان باركيه)</li><li>سيراميك سادة (ألوان موحدة)</li><li>سيراميك منقوش (نقشات هندسية)</li></ul><h3>التكلفة التقديرية للمتر</h3><ul><li>سيراميك صيني: 2-4 د.ك</li><li>سيراميك هندي: 3-5 د.ك</li><li>بورسلان إسباني: 5-9 د.ك</li><li>بورسلان إيطالي: 8-15 د.ك</li></ul><p><strong>هل تحتاج معلم سيراميك شاطر؟</strong> اتصل بنا: <a href=\"tel:65600310\">65600310</a></p>', NULL, 'سيراميك', NULL, 'published', 180, 'أفضل أنواع السيراميك والبورسلان للصالات في الكويت | دليل 2026', 'دليل شامل لاختيار السيراميك والبورسلان للصالات - المقاسات والأنواع والتكاليف التقديرية.', 1, '2026-10-10 21:27:14', '2026-10-10 21:27:14', '2026-10-10 21:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `area` varchar(80) DEFAULT NULL,
  `service` varchar(180) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(60) DEFAULT 'villas',
  `media_type` enum('image','video') DEFAULT 'image',
  `media_url` varchar(500) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `category`, `media_type`, `media_url`, `thumbnail`, `sort_order`, `is_featured`, `created_at`) VALUES
(1, 'جولة تشطيب فيلا وأسقف ليد', 'جولة في تشطيب فيلا وقسيمة سكنية - أصباغ وإضاءات', 'videos villas paint', 'video', 'https://elsharkaelarabiya.com/assets/css/v (1).mp4', 'https://elsharkaelarabiya.com/assets/css/p (7).jpeg', 1, 1, '2026-10-10 21:27:14'),
(2, 'ديكور جداري ومرايا دائرية', 'تنفيذ ديكور جداري ومرايا وبديل خشب', 'videos decor villas', 'video', 'https://elsharkaelarabiya.com/assets/css/v (2).mp4', 'https://elsharkaelarabiya.com/assets/css/p (28).jpeg', 2, 0, '2026-10-10 21:27:14'),
(3, 'أصباغ حوائط ناعمة حديثة', 'دهانات وأصباغ عصرية بتشطيب ناعم', 'videos paint decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (3).mp4', 'https://elsharkaelarabiya.com/assets/css/p (2).jpeg', 3, 0, '2026-10-10 21:27:14'),
(4, 'تشطيب ديوانية وصالة فخمة', 'تشطيب ديوانية وصالة استقبال رئيسية', 'videos dewaniya decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (4).mp4', 'https://elsharkaelarabiya.com/assets/css/p (14).jpeg', 4, 1, '2026-10-10 21:27:14'),
(5, 'تجاليد شاشة ورفوف خشب ملامين', 'تجاليد خشبية لشاشة تلفزيون ورفوف معلقة', 'videos wood decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (5).mp4', 'https://elsharkaelarabiya.com/assets/css/p (32).jpeg', 5, 0, '2026-10-10 21:27:14'),
(6, 'أسقف جبس بورد وبروفايل ليد', 'تشطيب أسقف جبس بورد وإضاءة بروفايل ليد', 'videos villas decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (6).mp4', 'https://elsharkaelarabiya.com/assets/css/p (11).jpeg', 6, 0, '2026-10-10 21:27:14'),
(7, 'دهانات غرف وصالات بتنسيق ألوان', 'دهانات داخلية وتشطيب غرف نوم وصالات', 'videos paint villas', 'video', 'https://elsharkaelarabiya.com/assets/css/v (7).mp4', 'https://elsharkaelarabiya.com/assets/css/p (8).jpeg', 7, 0, '2026-10-10 21:27:14'),
(8, 'فيلا كاملة تسليم مفتاح', 'جولة شاملة في فيلا سكنية كاملة تسليم مفتاح', 'videos villas dewaniya', 'video', 'https://elsharkaelarabiya.com/assets/css/v (8).mp4', 'https://elsharkaelarabiya.com/assets/css/p (20).jpeg', 8, 1, '2026-10-10 21:27:14'),
(9, 'بارتشن خشب فخم وفاصل صالات', 'تركيب قواطع خشبية وبارتشن عصري', 'videos wood decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (9).mp4', 'https://elsharkaelarabiya.com/assets/css/p (16).jpeg', 9, 0, '2026-10-10 21:27:14'),
(10, 'بديل رخام وخشب مدمج', 'تفاصيل بديل الرخام وبديل الخشب وإضاءات الليد', 'videos decor villas', 'video', 'https://elsharkaelarabiya.com/assets/css/v (10).mp4', 'https://elsharkaelarabiya.com/assets/css/p (3).jpeg', 10, 0, '2026-10-10 21:27:14'),
(11, 'مداخل فلل ومرايا مموجة LED', 'ديكورات مداخل ومرايا مضيئة', 'videos decor villas', 'video', 'https://elsharkaelarabiya.com/assets/css/v (11).mp4', 'https://elsharkaelarabiya.com/assets/css/p (26).jpeg', 11, 0, '2026-10-10 21:27:14'),
(12, 'تشطيب أرضيات وأصباغ ناعمة', 'تشطيب أرضيات وسيراميك وأصباغ', 'videos villas paint', 'video', 'https://elsharkaelarabiya.com/assets/css/v (12).mp4', 'https://elsharkaelarabiya.com/assets/css/p (30).jpeg', 12, 0, '2026-10-10 21:27:14'),
(13, 'ديوانية كويتية مجهزة بالكامل', 'تجهيز ديوانية رجال بأحدث اللمسات', 'videos dewaniya decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (13).mp4', 'https://elsharkaelarabiya.com/assets/css/p (14).jpeg', 13, 0, '2026-10-10 21:27:14'),
(14, 'جولة تفصيلية في قسيمة خاصة', 'جولة كبرى في قسيمة سكنية فاخرة', 'videos villas decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (14).mp4', 'https://elsharkaelarabiya.com/assets/css/p (7).jpeg', 14, 0, '2026-10-10 21:27:14'),
(15, 'أعمال تشطيبات خشبية وأبواب', 'تشطيبات خشبية وأصباغ متطورة', 'videos paint wood', 'video', 'https://elsharkaelarabiya.com/assets/css/v (15).mp4', 'https://elsharkaelarabiya.com/assets/css/p (22).jpeg', 15, 0, '2026-10-10 21:27:14'),
(16, 'مراحل التنفيذ والإشراف الفني', 'كواليس وتفاصيل مراحل التنفيذ', 'videos decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (16).mp4', 'https://elsharkaelarabiya.com/assets/css/p (31).jpeg', 16, 0, '2026-10-10 21:27:14'),
(17, 'صالات استقبال عصرية', 'تشطيبات صالات واستقبالات فخمة', 'videos villas decor', 'video', 'https://elsharkaelarabiya.com/assets/css/v (17).mp4', 'https://elsharkaelarabiya.com/assets/css/p (19).jpeg', 17, 0, '2026-10-10 21:27:14'),
(18, 'خزائن وتجاليد حائط ملامين', 'خزائن ودواليب ملامين وتجاليد حوائط', 'videos decor wood', 'video', 'https://elsharkaelarabiya.com/assets/css/v (18).mp4', 'https://elsharkaelarabiya.com/assets/css/p (25).jpeg', 18, 0, '2026-10-10 21:27:14'),
(19, 'التسليم النهائي النظيف 100%', 'التسليم النهائي لقسيمة سكنية بالكامل', 'videos villas paint', 'video', 'https://elsharkaelarabiya.com/assets/css/v (19).mp4', 'https://elsharkaelarabiya.com/assets/css/p (35).jpeg', 19, 0, '2026-10-10 21:27:14'),
(20, 'مقر الشركة وقسم المخططات الهندسية', 'قسم التصاميم والمخططات', 'villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (1).jpeg', NULL, 20, 0, '2026-10-10 21:27:14'),
(21, 'تشطيب جدران وأصباغ راقية', 'تشطيب جداري وأصباغ وديكور مودرن', 'paint decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (2).jpeg', NULL, 21, 0, '2026-10-10 21:27:14'),
(22, 'إضاءات مخفية وبديل خشب راقي', 'تنفيذ إضاءة مخفية وبديل خشب للصالة', 'decor villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (3).jpeg', NULL, 22, 0, '2026-10-10 21:27:14'),
(23, 'ممر استقبال مع تجاليد جدارية', 'تصميم ممر استقبال وديكور مرايا', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (4).jpeg', NULL, 23, 0, '2026-10-10 21:27:14'),
(24, 'أسقف جبس وإضاءة سبوت لايت', 'أعمال الأسقف المعلقة والإضاءة السقفية', 'decor paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (5).jpeg', NULL, 24, 0, '2026-10-10 21:27:14'),
(25, 'تناسق ألوان وديكور صالة معيشة', 'تشطيب صالة معيشة مع تناسق ألوان', 'villas paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (6).jpeg', NULL, 25, 0, '2026-10-10 21:27:14'),
(26, 'صالة رئيسية بتجاليد خشبية فاخرة', 'صالة رئيسية فخمة مع ديكور شاشة خشبية', 'villas decor wood', 'image', 'https://elsharkaelarabiya.com/assets/css/p (7).jpeg', NULL, 26, 1, '2026-10-10 21:27:14'),
(27, 'دهانات حوائط وجبس بدون عيوب', 'تناسق أصباغ ناعمة وجبس مودرن', 'paint decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (8).jpeg', NULL, 27, 0, '2026-10-10 21:27:14'),
(28, 'ديكور جداري وإضاءة ليد عصرية', 'ديكور جداري راقي مع إضاءة موجهة', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (9).jpeg', NULL, 28, 0, '2026-10-10 21:27:14'),
(29, 'دقة في معالجة الزوايا والكرانيش', 'تشطيبات زوايا وكرانيش دقيقة', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (10).jpeg', NULL, 29, 0, '2026-10-10 21:27:14'),
(30, 'أسقف جبس بورد وإنارة وورم مخفية', 'أسقف جبس بورد مع إنارة دافئة', 'decor villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (11).jpeg', NULL, 30, 0, '2026-10-10 21:27:14'),
(31, 'قواطع خشبية هندسية وتوزيع فراغات', 'أعمال بارتشن وتوزيع فراغات', 'wood decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (12).jpeg', NULL, 31, 0, '2026-10-10 21:27:14'),
(32, 'دهانات حوائط قابلة للغسيل 100%', 'دهانات مقاومة للحرارة والرطوبة', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (13).jpeg', NULL, 32, 0, '2026-10-10 21:27:14'),
(33, 'تصميم وتنفيذ ديوانية فخمة (3D Wave)', 'ديوانية كويتية فخمة مع جدار ثلاثي الأبعاد', 'dewaniya decor villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (14).jpeg', NULL, 33, 1, '2026-10-10 21:27:14'),
(34, 'توزيع إضاءات مدروس للصالات', 'أعمال الإضاءة والجبس للصالات', 'decor villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (15).jpeg', NULL, 34, 0, '2026-10-10 21:27:14'),
(35, 'بارتشن خشب مفرغ مع شاشة مدمجة', 'بارتشن خشبي مفرغ مع وحدة شاشة', 'wood decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (16).jpeg', NULL, 35, 1, '2026-10-10 21:27:14'),
(36, 'تشطيبات معمارية بإشراف هندسي', 'تشطيبات معمارية داخلية متقنة', 'villas paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (17).jpeg', NULL, 36, 0, '2026-10-10 21:27:14'),
(37, 'أصباغ هادئة لغرف النوم', 'دهانات غرف النوم والمجالس', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (18).jpeg', NULL, 37, 0, '2026-10-10 21:27:14'),
(38, 'صالة استقبال وأرضيات باركيه أنيقة', 'صالة استقبال واسعة وأرضيات باركيه', 'villas decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (19).jpeg', NULL, 38, 0, '2026-10-10 21:27:14'),
(39, 'جدار منحني ديكوري مع رفوف ملامين', 'جدار منحني ديكوري ووحدة تلفزيون معلقة', 'wood decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (20).jpeg', NULL, 39, 0, '2026-10-10 21:27:14'),
(40, 'بانوهات جدارية بتشطيب فخم', 'أعمال الكرانيش والإطارات الجدارية', 'decor paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (21).jpeg', NULL, 40, 0, '2026-10-10 21:27:14'),
(41, 'تسليم نظيف وتغطية الأرضيات', 'تشطيبات نظيفة بدون بهدلة', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (22).jpeg', NULL, 41, 0, '2026-10-10 21:27:14'),
(42, 'دهانات مقاومة للرطوبة وعوامل الجو', 'دهانات مقاومة للرطوبة لحوائط الفلل', 'paint villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (23).jpeg', NULL, 42, 0, '2026-10-10 21:27:14'),
(43, 'بروفايل ليد حديث وتصميم هندسي', 'إضاءات ليد بروفايل في الأسقف', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (24).jpeg', NULL, 43, 0, '2026-10-10 21:27:14'),
(44, 'تفصيل خزائن ملامين وأبواب', 'تفصيل خزائن وأعمال نجارة دقيقة', 'wood', 'image', 'https://elsharkaelarabiya.com/assets/css/p (25).jpeg', NULL, 44, 0, '2026-10-10 21:27:14'),
(45, 'ديكور مدخل وقاطع مرآة مضيء', 'ديكور مداخل ومرايا مضيئة', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (26).jpeg', NULL, 45, 0, '2026-10-10 21:27:14'),
(46, 'تأسيس ومعجون وسنفرة الجدران بدقة', 'أعمال السنفرة والمعجون والتأسيس', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (27).jpeg', NULL, 46, 0, '2026-10-10 21:27:14'),
(47, 'جدار مرايا مع إطار خشبي دائري أيقوني', 'ديكور مرايا شبكية مع إطار خشبي دائري', 'decor wood villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (28).jpeg', NULL, 47, 1, '2026-10-10 21:27:14'),
(48, 'صالة استقبال كويتية متكاملة', 'صالة استقبال واسعة مع أسقف جبس', 'villas decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (29).jpeg', NULL, 48, 0, '2026-10-10 21:27:14'),
(49, 'أرضيات سيراميك رخامي وبورسلان', 'أعمال الأرضيات السيراميك والباركيه', 'villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (30).jpeg', NULL, 49, 0, '2026-10-10 21:27:14'),
(50, 'تشطيب قسائم الرعاية السكنية', 'تشطيبات فلل وقسائم سكنية', 'villas paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (31).jpeg', NULL, 50, 0, '2026-10-10 21:27:14'),
(51, 'تجاليد شاشة مضلعة وإضاءة وورم LED', 'تجاليد جدارية مضلعة مع وحدة خشبية', 'decor wood', 'image', 'https://elsharkaelarabiya.com/assets/css/p (32).jpeg', NULL, 51, 1, '2026-10-10 21:27:14'),
(52, 'حوائط ديكورية عصرية وإضاءة ليد', 'ديكورات حوائط حديثة وإضاءات مخفية', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (33).jpeg', NULL, 52, 0, '2026-10-10 21:27:14'),
(53, 'أصباغ سادة ولمسات أنيقة', 'دهانات حوائط سادة وناعمة', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (34).jpeg', NULL, 53, 0, '2026-10-10 21:27:14'),
(54, 'قسيمة سكنية جاهزة للسكن', 'تسليم قسائم سكنية بمواصفات قياسية', 'villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (35).jpeg', NULL, 54, 0, '2026-10-10 21:27:14'),
(55, 'دهانات واجهات وحوائط مقاومة للشمس', 'دهانات مقاومة للحرارة والشمس', 'paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (36).jpeg', NULL, 55, 0, '2026-10-10 21:27:14'),
(56, 'أسقف جبس مستوية 100%', 'أعمال الجبس والأسقف بدون تموجات', 'decor paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (37).jpeg', NULL, 56, 0, '2026-10-10 21:27:14'),
(57, 'إشراف هندسي على أدق التفاصيل', 'تشطيبات معمارية متكاملة', 'villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (38).jpeg', NULL, 57, 0, '2026-10-10 21:27:14'),
(58, 'خامات ورق جدران فاخرة وقابلة للغسيل', 'كتالوج أحدث خامات ورق الجدران', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (39).jpeg', NULL, 58, 0, '2026-10-10 21:27:14'),
(59, 'كتالوج وتصاميم ورق جدران حديثة', 'عينات وتصاميم ورق جدران عصري', 'decor', 'image', 'https://elsharkaelarabiya.com/assets/css/p (40).jpeg', NULL, 59, 0, '2026-10-10 21:27:14'),
(60, 'تناغم الألوان بين الأرضية والجدران', 'تناسق الأرضيات والدهانات والديكورات', 'villas paint', 'image', 'https://elsharkaelarabiya.com/assets/css/p (41).jpeg', NULL, 60, 0, '2026-10-10 21:27:14'),
(61, 'تشطيب نهائي بأعلى مواصفات الإتقان', 'تشطيبات أنيقة تلبي تطلعات العميل', 'paint villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (42).jpeg', NULL, 61, 0, '2026-10-10 21:27:14'),
(62, 'مكتب التعاقدات والمناقصات بالشركة', 'قسم التعاقدات والمناقصات', 'villas', 'image', 'https://elsharkaelarabiya.com/assets/css/p (43).jpeg', NULL, 62, 0, '2026-10-10 21:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `title`, `meta_description`, `content`, `updated_at`) VALUES
(15, 'painting', 'أفضل صباغ الكويت', 'أفضل صباغ في الكويت - دهانات حوائط، صباغة شقق وفلل، دهانات داخلية وخارجية، معالجة رطوبة وتشطيب نظيف 100%. اتصل: 65600310', '<h2>لماذا تختار صباغ محترف في الكويت؟</h2><p>اختيار صباغ شاطر في الكويت يوفر عليك وقت وتكلفة ويضمن لك نتيجة أفضل تدوم طويلاً. نحن في <strong>الشركة العربية للمنازل</strong> متخصصون في أعمال الدهانات والصباغة بجودة عالية.</p><h3>خدماتنا في الصباغة:</h3><ul><li>دهان شقق الكويت بجميع المساحات</li><li>دهان فلل بتشطيبات فخمة</li><li>دهانات داخلية بجودة عالية</li><li>دهانات خارجية مقاومة للعوامل الجوية</li><li>تجديد الدهانات للمنازل القديمة</li></ul><h3>خطوات شغلنا:</h3><ol><li>تنظيف وتجهيز الجدران</li><li>معالجة الشقوق والعيوب</li><li>وضع طبقة الأساس (Primer)</li><li>تطبيق الدهان النهائي بدقة</li><li>تسليم نظيف وبدون أي فوضى</li></ol>', '2026-10-10 21:27:14'),
(16, 'finishing', 'تشطيب داخلي الكويت تسليم مفتاح', 'تشطيب داخلي متكامل للفلل والقسائم السكنية والشقق في الكويت - أعمال صحي، كهرباء، جبس، أرضيات، أصباغ وديكور تسليم مفتاح. اتصل: 65600310', '<h2>تشطيب داخلي متكامل بأعلى المواصفات</h2><p>الشركة العربية للمنازل تقدم خدمات التشطيب الداخلي المتكامل للفلل والقسائم السكنية والشقق الاستثمارية. نلتزم بالعقود المعتمدة والجدول الزمني وضمان شامل على كافة الأعمال.</p><h3>باقات التشطيب:</h3><ul><li>التأسيسات الكهربائية والإضاءة</li><li>أعمال الصحي والسباكة والعزل</li><li>أرضيات البورسلان والسيراميك والرخام</li><li>الأسقف المعلقة والجبس بورد</li><li>الأصباغ والديكورات النهائية</li></ul><h3>لماذا نحن:</h3><ul><li>عقود قانونية وضمانات موثقة</li><li>إشراف هندسي يومي</li><li>عمالة فنية متخصصة ومصنفة</li><li>أفضل الخامات والمواد المعتمدة</li><li>تسليم مفتاح نظيف 100%</li></ul>', '2026-10-10 21:27:14'),
(17, 'interior-design', 'التصميم الداخلي 3D في الكويت', 'خدمات التصميم الداخلي 3D والمخططات التنفيذية للفلل والديوانيات والشقق والمحلات التجارية في الكويت. اتصل: 65600310', '<h2>التصميم الداخلي ثلاثي الأبعاد</h2><p>نحول المساحات الصامتة إلى تحف فنية تنبض بالحياة والجمال. تصاميم داخلية عصرية ومدروسة هندسياً تعكس ذوقك الخاص وتستغل كل متر مربع بأقصى فاعلية.</p><h3>خدماتنا:</h3><ul><li>تصميم داخلي للفلل والقسائم</li><li>تصميم ديوانيات وصالات استقبال</li><li>تصميم الشقق والمكاتب التجارية</li><li>تصميم المطابخ وغرف الملابس</li></ul><h3>مراحل التصميم:</h3><ol><li>جلسة الاستماع وتحديد الطراز</li><li>رفع المقاسات وزيارة الموقع</li><li>تقديم المخطط المبدئي</li><li>الرندرة ثلاثية الأبعاد 3D Render</li><li>تسليم المخططات التنفيذية</li></ol>', '2026-10-10 21:27:14'),
(18, 'gypsum-board', 'جبس بورد وأسقف معلقة الكويت', 'تركيب أسقف جبس بورد، قواطع جدارية، ديكورات شاشات وبروفايل ليد في الكويت بخامات فرنسية وكناوف. اتصل: 65600310', '<h2>جبس بورد احترافي بألواح كناوف الألمانية</h2><p>تصميم وتركيب أحدث ديكورات الأسقف الجبسية المعلقة، شاشات التلفزيون، والقواطع الجدارية العازلة للصوت والحرارة.</p><h3>مميزاتنا:</h3><ul><li>وزن وتطابق بالليزر 360 درجة</li><li>شاسيهات أوميجا وحديد مجلفن ثقيل</li><li>ألواح خضراء مقاومة للرطوبة</li><li>تأسيس مسارات الليد بروفايل بدقة</li><li>معالجة فواصل بشاش فرنسي ومعجون ممتاز</li></ul>', '2026-10-10 21:27:14'),
(19, 'wallpaper', 'تركيب ورق جدران الكويت', 'تركيب وتوريد أحدث ورق جدران كوري وأوروبي ثلاثي الأبعاد 3D في الكويت - خامات قماش وفينيل قابلة للغسيل. اتصل: 65600310', '<h2>ورق جدران كوري وأوروبي فاخر</h2><p>تشكيلة حصرية من أرقى خامات ورق الجدران ثلاثي الأبعاد والخامات القماشية والفينيل المقاوم للرطوبة وقابل للغسيل.</p><h3>لماذا تختارنا:</h3><ul><li>قابل للغسيل والمسح 100%</li><li>تركيب بدون فواصل ظاهرة</li><li>غراء ألماني أصلي مضاد للعفن</li><li>مئات الكتالوجات الحصرية</li><li>إنجاز الغرفة في ساعتين فقط</li></ul>', '2026-10-10 21:27:14'),
(20, 'melamine-wood', 'خشب ملامين الكويت', 'تفصيل وتوريد خشب ملامين ألماني وتركي في الكويت - خزائن ملابس، مطابخ، تجاليد حوائط، رفوف ديكورية. اتصل: 65600310', '<h2>خشب ملامين بمواصفات عالمية</h2><p>تفصيل وتنفيذ أرقى وحدات خشب الملامين للفلل والشقق والديوانيات في الكويت. خزائن ملابس بلت إن، مطابخ حديثة، تجاليد شاشات تلفزيون، ومكاتب بتشطيب فائق النعومة.</p><h3>مميزاتنا:</h3><ul><li>مقاومة عالية للخدش والاحتكاك</li><li>قلب خشب مقاوم للرطوبة Green Core</li><li>عشرات النقشات الخشبية والرخامية</li><li>إكسسوارات بلوم ألمانية وهيدروليك</li><li>تفصيل دقيق بالمليمتر بالليزر</li></ul>', '2026-10-10 21:27:14'),
(21, 'carpenter', 'نجار الكويت', 'أشطر نجار في الكويت - تصنيع وتركيب أبواب خشب، بارتشن خشبي، قواطع صالات، غرف نوم. اتصل: 65600310', '<h2>أفضل نجار في الكويت</h2><p>تنفيذ وتفصيل وتركيب كافة أعمال النجارة الخشبية للفلل والشقق والديوانيات. أبواب خشب قشرة طبيعية، بارتشن وقواطع مفرغة، صيانة الأبواب والأقفال.</p><h3>لماذا نحن:</h3><ul><li>أخشاب زان وموسكي وسويدي أصلية</li><li>أبواب كواتم صوت وأقفال أمان</li><li>دهانات إيطالية نارية مقاومة</li><li>سرعة حضور واستجابة فورية</li><li>أسعار مباشرة من الورشة</li></ul>', '2026-10-10 21:27:14'),
(22, 'marble', 'الرخام الإيطالي وأعمال الجلي', 'توريد وتركيب الرخام الإيطالي الفاخر في الكويت - كلكتا، ستاتوارو، إمبرادور، درج رخام، مغاسل، جلي بالكريستال. اتصل: 65600310', '<h2>الرخام الإيطالي الفاخر</h2><p>توريد وتركيب أفخم أنواع الرخام الطبيعي للأرضيات والمداخل والمغاسل والسلالم. جلي وتلميع بالكريستال الإيطالي يمنحك بريق المرآة.</p><h3>مميزاتنا:</h3><ul><li>رخام نخب أول خالٍ من العيوب</li><li>قص ليزر وحساب Bookmatch</li><li>أحدث ماكينات الجلي بالماس</li><li>معالجة العزل النانوي (Nano Sealer)</li><li>تنفيذ الدرج والمغاسل المودرن</li></ul>', '2026-10-10 21:27:14'),
(23, 'alternatives', 'بديل الخشب والرخام الكويت', 'تركيب وتوريد بديل الخشب وبديل الرخام (PVC / WPC) في الكويت - شاشات تلفزيون، مداخل فلل، إضاءات مخفية. اتصل: 65600310', '<h2>بدائل الخشب والرخام الحديثة</h2><p>الحل الديكوري الأحدث والأكثر طلباً لتزيين الجدران ومداخل الفلل وخلفيات شاشات التلفزيون. مظهر فخم يطابق الخشب والرخام الطبيعي بوزن خفيف.</p><h3>المميزات:</h3><ul><li>مقاومة مطلقة للماء والرطوبة</li><li>مضادة للأرضة والحشرات</li><li>مقاومة للاشتعال والحرارة</li><li>سرعة فائقة في التركيب</li><li>تكلفة اقتصادية مع فخامة باهرة</li></ul>', '2026-10-10 21:27:14'),
(24, 'ceramics-parquet', 'سيراميك وباركيه الكويت', 'تركيب سيراميك، بورسلان، باركيه خشب ألماني في الكويت - تسوية بالليزر، غراء أصلي وترويبة إيبوكسي. اتصل: 65600310', '<h2>سيراميك وبورسلان وباركيه</h2><p>تركيب احترافي للأرضيات والحوائط بكافة المقاسات الكبيرة (120×120 و 160×320 سم). أرضيات بورسلان رخامي للصالات، سيراميك حمامات ومطابخ، وباركيه ألماني HDF عالي التحمل.</p><h3>لماذا نحن:</h3><ul><li>استخدام كلبسات التسوية (Leveling Clips)</li><li>غراء بورسلان ألماني سي فليكس</li><li>ترويبة إيبوكسي عازلة للمياه</li><li>سرعة ودقة وإنجاز بالميعاد</li><li>تسليم نظيف وجلي فواصل</li></ul>', '2026-10-10 21:27:14'),
(25, 'dewaniya', 'تصميم ديوانية الكويت', 'تصميم وتنفيذ ديوانيات كويتية فاخرة - جلسات أرضية، بدائل خشب ورخام، ألواح 3D، إضاءات مخفية وأسقف جبس. اتصل: 65600310', '<h2>تصميم وتنفيذ ديوانية الكويت</h2><p>الديوانية هي قلب البيت الكويتي وواجهة الكرم والضيافة. نصمم وننفذ ديوانيات تجمع بين الهيبة والفخامة التراثية وأحدث معايير الديكور المودرن.</p><h3>مميزات ديوانياتنا:</h3><ul><li>جلسات مريحة وتوزيع ذكي</li><li>عزل صوتي وتنسيق صوتيات</li><li>مطبخ تحضيري ومغاسل فخمة</li><li>تحكم ذكي بالإضاءة والتكييف</li><li>سرعة تسليم والتزام تام</li></ul>', '2026-10-10 21:27:14'),
(26, 'reception-halls', 'صالات استقبال خارجية', 'تصميم وتنفيذ صالات استقبال خارجية فاخرة مع ديكورات كرفانات في الكويت - جلسات خارجية، مظلات، تنسيق حدائق. اتصل: 65600310', '<h2>صالات الاستقبال الخارجية والكرفانات</h2><p>نصمم وننفذ صالات استقبال خارجية فاخرة تليق بفللك وقسيمتك في الكويت. من الجلسات المظللة وديكورات الكرفانات المميزة إلى الأرضيات الخارجية والإضاءة الليلية.</p><h3>ماذا تشمل:</h3><ul><li>كرفانات مكيفة بواجهات ديكورية</li><li>مظلات وأسقف خشبية مظللة</li><li>جلسات خارجية وكنب مقاوم للطقس</li><li>إضاءة ليلية احترافية</li><li>تنسيق حدائق وزراعة خضراء</li><li>أرضيات خارجية مقاومة للانزلاق</li></ul>', '2026-10-10 21:27:14'),
(27, 'roof-insulation', 'عزل أسطح الكويت', 'عزل أسطح الكويت بأحدث المواد - فوم بولي يوريثان، شينكو عاكس، لياسة إيبوكسي، عوازل حرارية. اتصل: 65600310', '<h2>عزل أسطح احترافي</h2><p>نوفر أفضل حلول عزل الأسطح في الكويت بمواد عالية الجودة تحمي منزلك من الحرارة الشديدة والتسرب المائي.</p><h3>أنواع العزل:</h3><ul><li>فوم بولي يوريثان المرش (Spray Foam)</li><li>شينكو عاكس للحرارة</li><li>لياسة وطلاء إيبوكسي مقاوم للماء</li><li>عزل بلاطات XPS الحرارية</li><li>إسفلت ومشمع بيتومين</li><li>طلاء نانو سيراميكي عاكس</li></ul>', '2026-10-10 21:27:14'),
(28, 'water-leak', 'كشف تسربات المياه', 'كشف تسربات المياه وإصلاحها بدون تكسير في الكويت - أجهزة حديثة لكشف خرير المياه والرطوبة. اتصل: 65600310', '<h2>كشف تسربات المياه بدون تكسير</h2><p>نكشف تسربات المياه المخفية في الحوائط والأسقف والأرضيات باستخدام أحدث أجهزة الكشف الإلكترونية بدون تكسير أو هدم.</p><h3>أنواع التسربات التي نكشفها:</h3><ul><li>تسربات السطح والخزان</li><li>تسربات الحمامات والمطابخ</li><li>خرير الأنابيب الداخلية</li><li>رطوبة وتعرق الجدران</li><li>تسربات المسبح والخزانات</li><li>تسربات شبكة الري الخارجية</li></ul><h3>تقنياتنا:</h3><ul><li>جهاز الاستماع الإلكتروني (Acoustic Detector)</li><li>جهاز Correlator لتقاطع التسربات</li><li>كاميرا الحرارة الحرارية (Thermal Imaging)</li><li>ضخ الغاز الخامل (Tracer Gas)</li><li>كاميرا التفتيش الداخلي للأنابيب</li></ul>', '2026-10-10 21:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `key` varchar(80) NOT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`key`, `value`) VALUES
('blog_page_size', '9'),
('facebook', 'https://facebook.com'),
('instagram', 'https://www.instagram.com/decor_home_design.q8'),
('pinterest', 'https://pin.it/2MMPlOmY5'),
('site_address', 'الكويت - خيطان دوار المخفر'),
('site_email', 'info@elsharkaelarabiya.com'),
('site_name', 'الشركة العربية للمنازل'),
('site_phone', '65600310'),
('site_whatsapp', '96565600310'),
('snapchat', 'https://www.snapchat.com/add/decor_ahmed2021'),
('stat_clients', '4500'),
('stat_projects', '6000'),
('stat_years', '20'),
('tiktok', 'https://www.tiktok.com/@home_design.q8'),
('twitter', 'https://x.com/home_design2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `idx_status_date` (`status`,`published_at`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_read` (`is_read`,`created_at`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
