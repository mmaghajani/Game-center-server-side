-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: game_center
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'تیراندازی',NULL,NULL),(2,'اول شخص',NULL,NULL),(3,'اکشن',NULL,NULL),(4,'ماجراجویی',NULL,NULL),(5,'ورزشی',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `player` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `game` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'بدک نبود!',4,'۱۳۹۵ دی ۲۱','mmam@gmail.com','بازی Dishonored 2','2017-01-13 16:39:37',NULL),(2,'افتضاح بود',1,'۱۳۹۵ دی ۲۱','mmam@gmail.com','بازی The Last Guardian','2017-01-13 16:39:37',NULL),(3,'باور نکردنی بود',5,'۱۳۹۵ دی ۲۱','john@yahoo.com','بازی The Last Guardian','2017-01-13 16:39:37',NULL),(4,'فوق العاده',4,'۱۳۹۵ دی ۲۱','koomar@gmail.com','بازی The Last Guardian','2017-01-13 16:39:37',NULL),(5,'فوق العاده',5,'۱۳۹۵ دی ۲۱','wooHang@yahoo.com','بازی The Last Guardian','2017-01-13 16:39:37',NULL),(6,'یک بازی ماجراجویی جذاب :)',4,'۱۳۹۵ دی ۲۱','mirza@gmail.com','بازی The Last Guardian','2017-01-13 16:39:37',NULL),(7,'خیلی مسخره بود !',2,'۲۰ دی ۱۳۵۲','sokrat@ymail.com','بازی Batman : The Telltale Series','2017-01-13 16:39:37',NULL),(8,'آشغال :|',1,'۱۲ اردیبهشت ۱۳۹۴','valentino@gmail.com','بازی Batman : The Telltale Series','2017-01-13 16:39:37',NULL),(9,'خوب بود . ولی میتونست بهتر باشه',4,'۶ شهریور ۱۳۹۵','valentino@gmail.com','بازی Batman : The Telltale Series','2017-01-13 16:39:37',NULL),(10,'فوق العاده است این بازی...',5,'۲۲ بهمن ۱۳۹۳','karimm@gmail.com','بازی Read Rising 4','2017-01-13 16:39:37',NULL),(11,'حرف نداره . رقیب نداره . دیگه آخه چی میخوای :)',5,'۳۰ خرداد ۱۳۹۰','john@yahoo.com','بازی Call of duty : Infinite warfare','2017-01-13 16:39:37',NULL),(12,'راضی کننده بود !',4,'۱۱ اسفند ۱۳۹۱','pier@gmail.com','بازی Call of duty : Infinite warfare','2017-01-13 16:39:37',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_categories`
--

DROP TABLE IF EXISTS `game_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_categories`
--

LOCK TABLES `game_categories` WRITE;
/*!40000 ALTER TABLE `game_categories` DISABLE KEYS */;
INSERT INTO `game_categories` VALUES (1,'بازی Dishonored 2',1,NULL,NULL),(2,'بازی Dishonored 2',2,NULL,NULL),(3,'بازی Dishonored 2',3,NULL,NULL),(4,'بازی The Last Guardian',3,NULL,NULL),(5,'بازی The Last Guardian',4,NULL,NULL),(6,'بازی Batman : The Telltale Series',4,NULL,NULL),(7,'بازی Batman : The Telltale Series',1,NULL,NULL),(8,'بازی Read Rising 4',1,NULL,NULL),(9,'بازی Read Rising 4',2,NULL,NULL),(10,'بازی Call of duty : Infinite warfare',2,NULL,NULL),(11,'بازی Call of duty : Infinite warfare',1,NULL,NULL);
/*!40000 ALTER TABLE `game_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_comments` int(11) NOT NULL DEFAULT '0',
  `large_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `games_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (5,'بازی Call of duty : Infinite warfare','خیلی راحت می‌توان مقدمه بررسی را با یک تاریخچه پربار و پر از حس نوستالژی شروع کرد، از اولین Call of Duty ها گفت، سری به نورمندی زد یا کمی به آینده آمد و به نقطه اوج این سری، به مدرن وارفرها و کاپیتان پرایس رسید',' <p>قصه از جایی شروع می‌شود که در آینده‌ای تخیلی؛ خیلی خیلی دورتر از ما، رشد جمعیت، زیاده‌خواهی انسان‌ها و مشکلاتی که اکنون هم در حال تجربه آن‌ها هستیم سبب شده‌‌اند تا انسان‌ها پا را فراتر از این کره خاکی گذاشته و به فضا سفر کنند، سیاره‌های مختلف را تحت سلطه درآورند و همان تصمیمی را بگیرند که ما در تخیل و آینده احتمالی خودمان می‌بینیم؛ این‌که نه تنها زمین، بلکه منظومه شمسی را تحت تسلط خودمان دربیاوریم و بر آن حکمرانی کنیم.&nbsp;</p><p>تبدیل شدن نیک ریس به فرمانده کشتی فضایی هم یکی از مواردی است که هم در داستان بازی تاثیر دارد و هم در گیم‌پلی آن. با این فعل و انفعال شما می‌توانید در نقش کاپیتان ریس پشت میز مدیریتی خود بنشینید و پیغام‌های سری را از زمین یا اقصی‌نقاط منظومه شمسی بشنوید یا حتی در مقر فرماندهی، ماموریت بعدی این کشتی فضایی را انتخاب کنید. اما این مساله چطور روی گیم‌پلی بازی تاثیرگزار است؟ با تبدیل شدن ریس به فرمانده کشتی فضایی رتریبیوشن، شما می‌توانید ماموریت بعدی این کشتی را از بین ماموریت‌های اصلی و فرعی انتخاب کنید. با این قدرت شما به جای اینکه مانند همه نسخه‌های قبلی مجموعه Call of Duty، خط داستانی بازی را به صورت خطی دنبال کنید، می‌توانید وقفه‌ای در آن ایجاد کرده و به ماموریت‌های فرعی مانند نجات یک محموله از دست تروریست‌ها یا به هلاکت رساندن آن‌ها بروید. با این حال این ماموریت‌ها کم و تا حدودی تکراری هستند و آزادی عملی که دیگر بازی‌ها به شما می‌دهند را در اختیارتان نمی‌گذارد.&nbsp;</p><h3>Call of duty : infinite warefar</h3><ul><li><strong><strong>سازنده: </strong></strong>جن&zwnj;دیزاین، ژاپن استودیو</li><li><strong><strong><strong>سبک: </strong></strong></strong>ماجراجویی</li><li><strong><strong>پلتفرم: </strong></strong>پلی&zwnj;استیشن 4<strong><strong><br></strong></strong></li><li><strong>تاریخ انتشار:</strong> ۱۶ آذر</li></ul><p><img src=\\\"http://cdn.zoomg.ir/2016/12/ecbef6aa-a03e-4bc6-8668-9fa7186ac9ef.jpeg\\\" alt=\\\"the last guardian\\\"></p><h2>','3',2,'http://cdn.zoomg.ir/2016/12/ecbef6aa-a03e-4bc6-8668-9fa7186ac9ef.jpeg','http://cdn.zoomg.ir/2016/12/ecbef6aa-a03e-4bc6-8668-9fa7186ac9ef.jpeg','2017-01-13 15:58:58',NULL),(6,'بازی Read Rising 4','دیگر چیز عجیبی نیست که هر سال یک یا چند اثر زامبی‌ محور عرضه شوند که تنها هدفشان سرگرم کردن بازیکنان است. یکی از پیشکسوتان این مدل آثار که جزو اولین بازی‌هایی بود که زامبی‌ها را از سبک ترس دور کردن و سر شوخی را با آن‌ها باز کرد، سری Dead Rising نام دارد','<p>دیگر چیز عجیبی نیست که هر سال یک یا چند اثر زامبی‌ محور عرضه شوند که تنها هدفشان سرگرم کردن بازیکنان است. یکی از پیشکسوتان این مدل آثار که جزو اولین بازی‌هایی بود که زامبی‌ها را از سبک ترس دور کردن و سر شوخی را با آن‌ها باز کرد، سری Dead Rising نام دارد. این سری همیشه سعی داشت تا بیشتر از این که از زامبی‌ها به عنوان یک عنصر ترس استفاده کند، آن‌ها را وسیله‌ای برای سرگرم کردن بازیکنان قرار دهد و می‌توان گفت با توجه به فروش و محبوبیت آن، این سری توانسته به خوبی به هدفش دست پیدا کند. اما سری Dead Rising همیشه از عیب و نقص‌های زیادی رنج می‌برد که غیر قابل انکار هستند. هر بار که سعی شده مشکلی از بازی حل شود، سر و کله عیب و نقصی دیگر در نسخه جدید پیدا می‌شود. مشکلات عجیب فنی، باگ‌های بی‌شمار، اتفاقات تکراری و ده‌ها مشکل دیگر. اما پس از عرضه سه نسخه که بهتر است آن‌ّها را نیمه موفق بدانیم، حال <a href=\"http://www.zoomg.ir/topics/capcom\" target=\"_blank\">کپکام </a>توانسته تصمیمات درستی را برای نسخه چهارم بازی اتخاذ کند و بهترین قسمت از Dead Rising را برای کریسمس ۲۰۱۶ عرضه کند.</p><p>این بار در چهارمین قسمت از سری Dead Rising به سراغ کاراکتر محبوب نسخه اول آن، یعنی فرانک وست بازمی‌گردیم و او را باری دیگر همراه با دوربین و تجهیزات کاراگاهی‌اش در فروشگاه بزرگ ویلامیت دنبال می‌کنیم. پس از اتفاقات نسخه اول، فرانک وست حرفه اصلی‌اش را کنار گذاشت و به عنوان یک استاد به سراغ تدریس درس‌ رفت. اما پس از یک سری اتفاقات، او همراه با یکی از ماموران دولت تصمیم بر این می‌گیرد تا دست سران دولت را در حوادث وحشتناک حمله زامبی‌ها رو کند. این داستان با وجود چند شخصیت فرعی نچندان جالب و دلنشین تا آخر بازی ادامه پیدا می‌کند و تغییر بخصوصی هم که هیجان را در بازی تزریق کند در آن رخ نمی‌دهد. به همین دلیل اگر از آن دست افرادی هستید که داستان و شخصیت‌پردازی برای‌تان از اهمیت بالایی برخوردار است خیلی رک و پوست کنده می‌گویم که این بازی اصلا برای شما ساخته نشده است.</p><h3>Read Rising 4</h3><ul><li><strong><strong>سازنده: </strong></strong>جن&zwnj;دیزاین، ژاپن استودیو</li><li><strong><strong><strong>سبک: </strong></strong></strong>ماجراجویی</li><li><strong><strong>پلتفرم: </strong></strong>پلی&zwnj;استیشن 4<strong><strong><br></strong></strong></li><li><strong>تاریخ انتشار:</strong> ۱۶ آذر</li></ul><p><img src=\\\"http://cdn.zoomg.ir/2017/1/70c80736-defe-4ad1-968c-9208bc94a43f.jpg\\\" alt=\\\"the last guardian\\\"></p><h2>','5',1,'http://cdn.zoomg.ir/2017/1/70c80736-defe-4ad1-968c-9208bc94a43f.jpg','http://cdn.zoomg.ir/2017/1/70c80736-defe-4ad1-968c-9208bc94a43f.jpg','2017-01-13 15:58:58',NULL),(7,'بازی Batman : The Telltale Series','بازی اپیزودیک بتمن روایت‌گر داستان زندگی بروس وین و چالش‌هایی است که برای او به وجود می‌آید. اندکی از شروع کار شبانه وی در نقش بتمن می‌گذرد و هنوز در این راه تجربیات لازم را کسب نکرده است','<p>بازی اپیزودیک بتمن روایت‌گر داستان زندگی بروس وین و چالش‌هایی است که برای او به وجود می‌آید. اندکی از شروع کار شبانه وی در نقش بتمن می‌گذرد و هنوز در این راه تجربیات لازم را کسب نکرده است. مردم از بتمن به عنوان یک شورشی یاد کرده و وی را به عنوان یک نگهبان قبول ندارند. از طرفی هاروی دنت، دوست صمیمی بروس وین با حمایت پشتوانه خانوادگی و میراث وین قصد دارد تا شهردار گاتهام شود. ماجرا دقیقا با این تعاریف شروع شده و رفته رفته شخصیت‌هایی نظیر سلینا کایل یا همان کت وومن به مخاطبان معرفی می‌شوند. مشکل از جایی شروع می‌شود که لیدی آرکام، اصلی‌ترین ویلن فصل اول، در قالب یک خبرنگار قصد دارد با نزدیک شدن به بروس وین میراث وین را زیر سوال برده و پشت پرده خلاف‌های پدر بروس را آشکار کند تا بتواند از این طریق انتقام بگیرد. انتقام از گاتهام، انتقام از خانواده خویش و تمامی کسانی که در گذشته باعث آزار و اذیت لیدی آرکام یا همان نیکی ویل شده‌اند. از طرفی با روی کار آمدن لیدی آرکام و گروهش (فرزندان آرکام)، شخصیت دو چهره و پنگوئن نیز روی کار آمده و کار را بیش از پیش برای بتمن سخت‌تر و سخت‌تر کرده و از آن طرف هم میراث خانواده وین در حال نابودی است.</p><p>در آخرین قسمت از بازی اپیزودیک بتمن، تمامی ماجراها و اتفاقات قرار است به نقطه پایان خود برسند. Two Face قصد دارد هم از فرزندان آرکام انتقام بگیرد و هم از بروس وین و در حال به آتش کشیدن خانه بروس است. از طرفی دیگر لیدی آرکام قصد دارد با پخش کردن ویروس مخصوص خود، گاتهام را به خاک و خون بکشد و از همه مهم‌تر بتمن در این راه تنهاست و دوستی ندارد. نگهبان گاتهام باید با بزرگترین چالش‌های خود مواجه شده و بار دیگر نور و روشنایی را برای گاتهام به ارمغان بیاورد. سوال اینجاست استودیو تل‌تیل گیمز تا چه اندازه در این جمع بندی موفق بوده است؟ در آخر قسمت چهارم شاهد بودیم که بتمن فعلا پرونده پنگوئن را بست و بازی با یک خبر به بتمن به اتمام رسید و آن هم حمله هاروی دنت به خانه بروس وین بود. حال با شروع قسمت پنجم بروس وین به سراغ هاروی دنت رفته و با تصمیماتی که بازی برای شما به ارمغان می‌آورد، پرنده هاروی دنت را نیز فعلا می‌بندید. روایت داستانی قسمت پنجم اصلا نمی‌خواهد شما به سراغ پنگوئن یا هاروی دنت بروید، ظاهرا فصل‌های آینده شاهد حضور دوباره آن‌ها خواهیم بود. داستان اصلی حول لیدی آرکام و مبارزه بتمن با وی می‌چرخد. شخصیت پردازی وی شاید در نقطه پایانی به خوبی سایر شخصیت‌ها نباشد ولی با این حال به بهترین شکل ممکن، پرونده وی بسته می‌شود.</p><h3>Batman : The Telltale Series</h3><ul><li><strong><strong>سازنده: </strong></strong>جن&zwnj;دیزاین، ژاپن استودیو</li><li><strong><strong><strong>سبک: </strong></strong></strong>ماجراجویی</li><li><strong><strong>پلتفرم: </strong></strong>پلی&zwnj;استیشن 4<strong><strong><br></strong></strong></li><li><strong>تاریخ انتشار:</strong> ۱۶ آذر</li></ul><p><img src=\\\"http://cdn.zoomg.ir/2016/12/a8989132-62bc-4bee-aac8-fe4cca7c90c1.jpg\\\" alt=\\\"the last guardian\\\"></p><h2>','4',3,'http://cdn.zoomg.ir/2016/12/a8989132-62bc-4bee-aac8-fe4cca7c90c1.jpg','http://cdn.zoomg.ir/2016/12/a8989132-62bc-4bee-aac8-fe4cca7c90c1.jpg','2017-01-13 15:58:58',NULL),(8,'بازی The Last Guardian','هفت سال انتظار برای انتشار یک بازی که روند ساختش فراز و نشیب‌های بسیاری از سر گذارند اصلاً اتفاق رایجی در دنیای بازی‌های ویدیویی نیست. اما «آخرین نگهبان» هم یک بازی معمولی نیست...\n','<p>هفت سال انتظار برای انتشار یک بازی که روند ساختش فراز و نشیب&zwnj;های بسیاری از سر گذارند اصلاً اتفاق رایجی در دنیای بازی&zwnj;های ویدیویی نیست. اما «آخرین نگهبان» هم یک بازی معمولی نیست، کافیست نگاهی به آثار پیشین سازندگان آن بیاندازیم تا ببینیم آن&zwnj;ها چه دنیاهایی خلق کرده&zwnj;اند. استودیوی&zwnj;های جن&zwnj;دیزاین و ژاپن استودیو به رهبری فومیتو اوئدا، بار دیگری اثری خلق کردند که تنها مشابهانش را در بازی&zwnj;های گذشته&zwnj;ش خودشان می&zwnj;تواند پیدا کرد. بن&zwnj;مایه&zwnj;ی بازی رابطه&zwnj;ی غیرمعمول پسر بچه و موجودی فرازمینی است که در طول آشنایی با یکدیگر، ماجراهای زیادی از سر می&zwnj;گذارنند.</p><p>اما شاید حالا که بازی منتشر شده، مهم&zwnj;ترین خبر در مورد بازی نظر منتقدین نسبت به بازی باشد. با توجه به نمره&zwnj;های منتشر شده، با یک بازی شاخص طرف هستیم که البته بازه&zwnj;ی نمرات از ۴ تا ۱۰ را در بر می&zwnj;گیرد. اینطور که از ابتدا هم به نظر می&zwnj;رسید، The Last Guardian یک بازی کاملاً سلیقه&zwnj;ای است که هرکسی نمی&zwnj;تواند با آن ارتباط برقرار کند. منتقدین در مجموع اتمسفر و دنیای بازی، شخصیت&zwnj;پردازی و گرافیک هنری بازی را تحسین کرده&zwnj;اند و از مشکلات فنی مانند کنترل دوربین نالیده&zwnj;اند. در ادامه می&zwnj;توانید خلاصه&zwnj;ی نقد چند وبسایت معتبر بازی&zwnj;های رایانه&zwnj;ای را مطالعه کنید و البته بررسی ویدیویی و متنی زومجی از The Last Guardian را هم هفته&zwnj;ی آینده از دست ندهید.</p><h3>The Last Guardian</h3><ul><li><strong><strong>سازنده: </strong></strong>جن&zwnj;دیزاین، ژاپن استودیو</li><li><strong><strong><strong>سبک: </strong></strong></strong>ماجراجویی</li><li><strong><strong>پلتفرم: </strong></strong>پلی&zwnj;استیشن 4<strong><strong><br></strong></strong></li><li><strong>تاریخ انتشار:</strong> ۱۶ آذر</li></ul><p><img src=\\\"http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg\\\" alt=\\\"the last guardian\\\"></p><h2>','4',5,'http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg','http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg','2017-01-13 15:58:58',NULL),(9,'بازی Dishonored 2','Dishonored 2 مثل قسمت اولش بازی بی‌عیب و نقصی نیست، اما ویژگی‌های خوب بازی آن‌قدر بیشتر و شگفت‌انگیزتر هستند که آن را در جایگاه منحصربه‌فردی در صنعت بازی‌های ویدیویی این روزها قرار می‌دهند.','<p>حقیقت این است که سابقه نشان داده مهم نیست چقدر بازی&zwnj;تان عجیب و غریب و تازه و چالش&zwnj;برانگیز است، فقط کافی است کارتان را به درستی انجام داده باشید، تا حتی پای یکی از وحشتناک&zwnj;ترین بازی&zwnj;های روز از لحاظ درجه&zwnj;ی سختی مثل دارک سولزها (Dark Souls) هم به جریان اصلی باز شود. وقتی پاش بیافتد، هیچ&zwnj;کس به اندازه&zwnj;ی گیمرها هوای بازیسازها را ندارد. جای سختی طاقت&zwnj;فرسا اما لذت&zwnj;بخش دارک سولز را با مخفی&zwnj;کاری&zwnj;های زیاد اما سرگرم&zwnj;کننده عوض کنید تا به Dishonored برسید. مخفی&zwnj;کاری برای خیلی از ما مساوی با یک&zwnj;عالمه صبر کردن، دندان روی جگر گذاشتن و نهایتا حوصله&zwnj; سر رفتن است. به خاطر همین است که دیگر بازی مخفی&zwnj;کاری واقعی نداریم و همه&zwnj;چیز به&zwnj;طرز احمقانه&zwnj;ای سرراست شده است و به خاطر همین است که سر و ته مراحل مخفی&zwnj;کاری بازی&zwnj;ها در عرض چند دقیقه به هم می&zwnj;آید. اما Dishonored تجربه&zwnj;ی واقعی مخفی&zwnj;کاری بود. محیط&zwnj;ها آن&zwnj;قدر بزرگ و پیچیده و قابلیت&zwnj;های ماوراطبیعه و مبارزه&zwnj;&zwnj;ای شخصیت اصلی آ&zwnj;ن&zwnj;قدر متنوع و نوآورانه بودند که مخفی&zwnj;کاری را به کاری حقیقا هیجان&zwnj;انگیز تبدیل کرده بود. به خاطر همین بود که حتی کسانی که در حالت عادی حوصله&zwnj;ی مخفی&zwnj;کاری ندارند Dishonored را بازی می&zwnj;کردند و این&zwnj;طوری قسمت دوم این بازی در حالی عرضه شد که دیگر یک بازی بی&zwnj;سروصدا نبود، بلکه بتسدا آن را به عنوان یک بلاک&zwnj;باستر تمام&zwnj;عیار پاییزی عرضه کرد.<div class=\\\"pullquote larticle\\\">Dishonored 2 تمام ویژگی&zwnj;هایی که بازی اول را متفاوت و عمیق کرده بود را در خود دارد</div><p><p>Dishonored 2 تمام ویژگی&zwnj;هایی که بازی اول را متفاوت و عمیق کرده و تمام ضعف&zwnj;هایی که جلوی بازی اول را از تبدیل شدن به یک اثر بدون افسوس&zwnj; گرفته بود را در خود دارد. حالا اما همه&zwnj;چیز جذاب&zwnj;تر و مهندسی&zwnj;شده&zwnj;تر احساس می&zwnj;شود و مهم&zwnj;تر از همه استودیوی آرکین بازی&zwnj;ای ساخته است که نشان می&zwnj;دهد چیزی که بازی&zwnj;های ویدیویی را به مدیوم منحصربه&zwnj;فردی تبدیل می&zwnj;کند و چیزی که&nbsp;نسل بعدی را تعریف می&zwnj;کند، گرافیک&zwnj;های سرسام&zwnj;آور نیست، بلکه عنصر تعامل و گیم&zwnj;پلی است. اگر تعریف شما مثل من از بازی&zwnj;های ویدیویی پیشرفته چیزی بیشتر از کیفیت بالای سیبیل کاراکترها است، Dishonored 2 بازی شماست.<p>مهم&zwnj;ترین چیزی که در طول بازی کردن Dishonored 2 متوجه شدم این بود که فرو رفتن در قالب یک قاتل خاموش، خیلی به جراحی مغز و قلب شبیه است. آره، شاید این بهترین چیزی است که می&zwnj;توان برای توصیف تجربه&zwnj;ی Dishonored 2 گفت: حساسیتِ غرق&zwnj;شدن در یک ماموریت طولانی و خطرناک، مثل ساعت&zwnj;ها ایستادن در اتاق عمل برای جراحی می&zwnj;ماند. چند وقت پیش پژوهشگران گزارشی منتشر کردند که نشان می&zwnj;داد گیمرها جراح&zwnj;های ماهرتر و بادقت&zwnj;تری می&zwnj;شوند. در هنگام بازی کردن Dishonored 2 احساس می&zwnj;کردم جراحی هستم که باید با ابزارهای مختلف و ریز و درشتی که در اختیار دارم، یک ماموریت بسیار حساس، مثل برداشتن یک غده&zwnj;ی مغزی (ترور یک کودتاچی شرور) را عملی کنم.<p>همان&zwnj;طور که یک جراح باید برای ساعت&zwnj;ها تک&zwnj;تک حرکاتش را با دقت تمام انجام دهد، اعصاب قوی&zwnj;ای داشته باشد، آماده&zwnj;ی تصمیم&zwnj;گیری&zwnj;های صدم&zwnj;ثانیه&zwnj;ای باشد و هماهنگی نزدیکی بین ذهن و انگشتانش داشته باشد، من هم در هنگام خزیدن به عنوان یک قاتلِ حرفه&zwnj;ای در خیابان&zwnj;ها و پشت&zwnj;بام&zwnj;های شهر، برای اینکه به تمیزترین شکل ممکن خودم را به هدفم برسانم، باید تمام این ویژگی&zwnj;ها را می&zwnj;داشتم یا در طول بازی و تمرین به آنها دست پیدا می&zwnj;کردم. تنها تفاوت بازی کردن Dishonored 2 و جراحی این است که اگر برداشتن یک تومور مغزی معمولا یک راه&zwnj;حل عالی برای موفقیت دارد، در Dishonored 2 سازندگان این امکان را بهتان می&zwnj;دهند تا راه&zwnj;حل خودتان را پیدا کنید و با خلاقیت خودتان و با وجود تمام توانایی&zwnj;ها و محدودیت&zwnj;هایی که بازی جلوی رویتان قرار می&zwnj;دهد گلیم خودتان را هرطوری که خواستید از آب بیرون بکشید. این یعنی بعضی&zwnj;وقت&zwnj;ها می&zwnj;توانید بی&zwnj;خیال درآوردن ادای یک قاتل نامرئی شوید و برای حل کردن مشکلاتتان به خشونت و خون و خونریزی روی بیاورید و جوی آب خیابان&zwnj;ها را با خون دشمنانتان قرمز کنید.<p class=midmargin><img src=http://cdn.zoomg.ir/2016/11/81f0d840-b4c3-4566-b2e7-2e58195096b6.jpg alt=\\\"\\\"><p>بازی&zwnj;کننده&zwnj;ها در قسمت دوم در نقش کوروو آتانو، قهرمان لال قسمت اول که خوشبختانه حالا زبان باز کرده قرار می&zwnj;گیرند یا می&zwnj;توانند امیلی کالدوین، ملکه&zwnj;ی دان&zwnj;وال و دختر کوروو را به عنوان شخصیت اصلی انتخاب کنند. ماجراهای این قسمت ۱۵ سال بعد از قسمت اول و از جایی شروع می&zwnj;شود که یک جادوگر شرور با کودتا، تاج و تخت امیلی را از او می&zwnj;گیرد. از اینجا ماجراجویی خونین &zwnj;بازی&zwnj;کننده برای فرار از دان&zwnj;وال و سفر به شهر جنوبی کارناکا برای برنامه&zwnj;ریزی انتقامش آغاز می&zwnj;شود. در هر مرحله بازی&zwnj;کننده وظیفه&zwnj;ی ترور و حذف کردن یکی از چرخ&zwnj;دهنده&zwnj;های قدرتمند کودتا را برعهده دارد تا بالاخره امیلی را به تاج و تختِ به حقش برگرداند.<p>اولین نکته&zwnj;ی شگفت&zwnj;انگیز Dishonored 2 این است که بله، استودیوی آرکین باری دیگر در ارائه&zwnj;ی جنس خاصی از تجربه&zwnj;ی اکشن/مخفی&zwnj;کاری که این روزها نمونه&zwnj;اش در جای دیگری یافت نمی&zwnj;شود موفق شده است و این موفقیت از دفعه&zwnj;ی اول ارزشمندتر است. چرا؟ چون بازی اول طوری کامل بود که به نظر نمی&zwnj;رسید جای پیشرفت داشته باشد. قسمت اول Dishonored منهای داستانگویی، در زمینه&zwnj;ی طراحی گیم&zwnj;پلی&zwnj;ای خارق&zwnj;العاده و ساخت دنیایی اوریجینال و غنی هیچ کم&zwnj;و&zwnj;کسری نداشت. بنابراین سوال این بود که سازندگان چگونه می&zwnj;خواهند روی دست خودشان بلند شوند. آیا قسمت دوم تکرار ویژگی&zwnj;&zwnj;های قسمت اول در محیطی تازه است یا سازندگان موفق می&zwnj;شوند دنباله&zwnj;ای عرضه کنند که روی پای خودش بیاستد و قابلیت&zwnj;های بازی اول را گسترش بدهد؟ خب، هنوز یکی-دو ساعت از بازی نگذشته بود که جواب مشخص شد. Dishonored 2 مثال تحسین&zwnj;برانگیز و معرکه&zwnj;ای از شکل درست دنباله&zwnj;سازی است. طبیعتا بازی دوم یک مجموعه نباید در حد قسمت اول تازه و غیرمنتظره باشد، اما یکی از اولین شگفتی&zwnj;های Dishonored 2 این است که اگرچه بازی به اندازه&zwnj;ی قسمت اول انقلابی نیست، اما سازندگان آن&zwnj;قدر روی صیقل دادن استخوان&zwnj;بندی بازی اول وقت گذاشته&zwnj;اند که بازی فوق&zwnj;العاده&zwnj;ی قبلی&zwnj;شان را به چیزی بی&zwnj;نقص&zwnj;تر و عمیق&zwnj;تر تبدیل کرده&zwnj;اند که اگر قبل از این از من می&zwnj;پرسیدید، می&zwnj;گفتم که چنین کاری امکان ندارد.<p class=midmargin><img src=http://cdn.zoomg.ir/2016/11/503bf415-c222-41db-9ae0-5f71a9d2f3b4.jpg alt=\\\"\\\"><p>شما را نمی&zwnj;دانم، اما من هیچ چیزی را با یک بخش تک&zwnj;نفره&zwnj;ی درجه&zwnj;یک عوض نمی&zwnj;کنم و عاشق بازی&zwnj;هایی هستم که تمرکز اصلی&zwnj;شان را بر روی طراحی یک کمپین داستانی می&zwnj;گذارند. چون مهم نیست در فلان بازی تیراندازی چند نفر به&zwnj;صورت آنلاین به جان هم می&zwnj;افتند، چیزی که جایگاه بازی&zwnj;های ویدیویی را در میان مدیوم&zwnj;های شناخته&zwnj;شده&zwnj;تر باز می&zwnj;کند و چیزی که قابلیت&zwnj;های کشف&zwnj;نشده و منحصربه&zwnj;فرد بازی&zwnj;ها را فاش می&zwnj;کند، بخش داستانی آنها است. Dishonored 2 یکی از بازی&zwnj;هایی است که مطمئن باشید در آینده خیلی درباره&zwnj;ی جادوی کارگردانی مرحله&zwnj;اش خواهید شنید. این روزها تمام فکر و ذکر ناشرها و استودیوها به ارائه&zwnj;ی گرافیک&zwnj;های فک&zwnj;اندازتر و ساخت کنسول&zwnj;های قوی&zwnj;تر خلاصه شده است. یک روز نمی&zwnj;شود که خبری از دستیابی فلان بازی به فلان فریم ریت و قابلیت اجرای فلان بازی با رزولوشن 4K منتشر نشود. همه&zwnj;چیز به تکنیک خلاصه شده و خبری از صحبت درباره&zwnj;ی پیشبرد هنر طراحی یک بازی نیست.<p>استودیوی آرکین با قسمت اول Dishonored یکی از پیشگام&zwnj;ترین بازی&zwnj;هایی آن روزها در زمینه&zwnj;ی گیم&zwnj;پلی و اتمسفرسازی را منتشر کرد و چنین چیزی درباره&zwnj;ی Dishonored 2 هم صدق می&zwnj;کند. این بازی نشان می&zwnj;دهد که کارگردانی گیم&zwnj;پلی و طراحی مرحله یعنی چه و چرا ساختن مرحله&zwnj;ی سندباکسی که بازی&zwnj;کننده می&zwnj;تواند به ده&zwnj;ها نوع مختلف آن را به اتمام برساند کار بزرگی است. Dishonored 2 مثال بارزی از ساخت گیم&zwnj;پلی منسجمی سرشار از مکانیک&zwnj;ها و قابلیت&zwnj;های هیجان&zwnj;انگیز است که همه برای دادن آزادی عمل مطلق به بازی&zwnj;کننده طراحی شده&zwnj;اند. اشتباه نکنید، Dishonored 2 یکی از آن بازی&zwnj;هایی نیست که آزادی عملشان به دو گزینه&zwnj;ی اکشن و مخفی&zwnj;کاری خلاصه می&zwnj;شوند. در Dishonored 2 تعداد انتخاب&zwnj;ها و نوع طراحی مراحل آن&zwnj;قدر گسترده و پیچیده است که حتی اگر خودتان را هم بکشید، نمی&zwnj;توانید یک مرحله را دوبار به یک شکل به اتمام برسانید. شاید این تعریف برای کسانی که با مجموعه&zwnj;ی Dishonored آشنا نیستند خیلی گیچ&zwnj;کننده به نظر برسد، اما هنر کار سازندگان همین&zwnj;جاست. آنها موفق شده&zwnj;اند کاری کنند که بازی&zwnj;کننده&zwnj;ها با وجود محیط&zwnj;های وسیع و پیچیده&zwnj;ی بازی، هرگز گیج و گم نشوند.','2',1,'http://cdn.zoomg.ir/2016/11/bf222635-75e2-4c6e-8635-9e5415dc9332.jpg','http://cdn.zoomg.ir/2016/11/bf222635-75e2-4c6e-8635-9e5415dc9332.jpg','2017-01-13 15:58:58',NULL);
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (41,'2014_10_12_000000_create_users_table',1),(42,'2014_10_12_100000_create_password_resets_table',1),(43,'2017_01_10_113157_create_comments_table',1),(44,'2017_01_10_113456_create_games_table',1),(45,'2017_01_10_113519_create_records_table',1),(46,'2017_01_10_113546_create_categories_table',1),(47,'2017_01_10_122622_create_game_categories_table',1),(48,'2017_01_10_122723_create_user_categories_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `player` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `game` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displacement` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (1,'john@yahoo.com',152000,20,'بازی The Last Guardian',4,NULL,NULL),(2,'koomar@gmail.com',120000,13,'بازی The Last Guardian',-3,NULL,NULL),(3,'mirza@gmail.com',20000,10,'بازی The Last Guardian',1,NULL,NULL),(4,'pier@gmail.com',12300,5,'بازی The Last Guardian',8,NULL,NULL),(5,'sherlooook@yahoo.com',100000,18,'بازی The Last Guardian',7,NULL,NULL),(6,'pier@gmail.com',24000,10,'بازی Dishonored 2',-9,NULL,NULL),(7,'mirza@gmail.com',12320,10,'بازی Dishonored 2',-1,NULL,NULL),(8,'sherlooook@yahoo.com',5000,4,'بازی Dishonored 2',3,NULL,NULL),(9,'pier@gmail.com',30000,8,'بازی Batman : The Telltale Series',4,NULL,NULL),(10,'sherlooook@yahoo.com',60000,14,'بازی Batman : The Telltale Series',10,NULL,NULL),(11,'mmam@gmail.com',10000,9,'بازی Batman : The Telltale Series',2,NULL,NULL),(12,'pier@gmail.com',11000,6,'بازی Read Rising 4',-1,NULL,NULL),(13,'wooHang@yahoo.com',12300,11,'بازی Read Rising 4',3,NULL,NULL),(14,'mmam@gmail.com',22000,12,'بازی Read Rising 4',1,NULL,NULL),(15,'wooHang@yahoo.com',23000,15,'بازی Call of duty : Infinite warfare',6,NULL,NULL),(16,'mirza@gmail.com',1000,3,'بازی Call of duty : Infinite warfare',-3,NULL,NULL),(17,'mmam@gmail.com',90000,23,'بازی Call of duty : Infinite warfare',12,NULL,NULL);
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_categories`
--

DROP TABLE IF EXISTS `user_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_categories`
--

LOCK TABLES `user_categories` WRITE;
/*!40000 ALTER TABLE `user_categories` DISABLE KEYS */;
INSERT INTO `user_categories` VALUES (1,'mmam@gmail.com','اول شخص',NULL,NULL),(2,'mmam@gmail.com','تیراندازی',NULL,NULL),(3,'sherlooook@yahoo.com','اول شخص',NULL,NULL),(4,'karimm@gmail.com','تیراندازی',NULL,NULL),(5,'sokrat@ymail.com','اول شخص',NULL,NULL),(6,'sokrat@ymail.com','تیراندازی',NULL,NULL),(7,'pier@gmail.com','تیراندازی',NULL,NULL),(8,'pier@gmail.com','اول شخص',NULL,NULL),(9,'wooHang@yahoo.com','تیراندازی',NULL,NULL),(10,'mirza@gmail.com','اول شخص',NULL,NULL),(11,'koomar@gmail.com','تیراندازی',NULL,NULL),(12,'john@yahoo.com','تیراندازی',NULL,NULL),(13,'valentino@gmail.com','تیراندازی',NULL,NULL);
/*!40000 ALTER TABLE `user_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isLoggedIn` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'جو آلن','mmam@gmail.com','1234',NULL,'jo_alen',0,NULL,NULL,NULL),(2,'شرلوک هولمز','sherlooook@yahoo.com','1234',NULL,'sherloooooook_h',0,NULL,NULL,NULL),(3,'کریم باوی','karimm@gmail.com','1234',NULL,'karim_bavi',0,NULL,NULL,NULL),(4,'سوکراتیس پاپاستوپولوس','sokrat@ymail.com','1234',NULL,'sokrat_papa',0,NULL,NULL,NULL),(10,'پیر اوبامیانگ','pier@gmail.com','1234',NULL,'obamia',0,NULL,NULL,NULL),(11,'ووهانگ چنگ','wooHang@yahoo.com','1234',NULL,'woo_cheng',0,NULL,NULL,NULL),(12,'میرزا مرادبیگ','mirza@gmail.com','1234',NULL,'mirzamorad',0,NULL,NULL,NULL),(13,'جلیل کومار','koomar@gmail.com','1234',NULL,'where_snake',0,NULL,NULL,NULL),(14,'جان کوچولو','john@yahoo.com','1234',NULL,'littleJohn',0,NULL,NULL,NULL),(15,'والنتینو','valentino@gmail.com','1234',NULL,'valen95',0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-14  0:53:11
