-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 12:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_news247`
--
CREATE DATABASE IF NOT EXISTS `db_news247` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_news247`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `hassub` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `title`, `keyword`, `description`, `parent_id`, `hassub`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'LIFESTYLE', 'lifestyle', 'News247 - News Magazine Newspaper - LIFESTYLE title', 'News247 - News Magazine Newspaper - LIFESTYLE keyword', 'News247 - News Magazine Newspaper - LIFESTYLE description', 0, 0, 1, 1, '2017-07-22 01:18:29', '2017-07-22 01:18:29'),
(3, 'Sport', 'sport', 'News247 - News Magazine Newspaper - Sport title', 'News247 - News Magazine Newspaper - Sport keyword', 'News247 - News Magazine Newspaper - Sport description', 0, 1, 1, 1, '2017-07-22 01:18:29', '2017-07-28 02:18:14'),
(4, 'Football', 'football', 'News247 - News Magazine Newspaper - Football title', 'News247 - News Magazine Newspaper - Football keyword', 'News247 - News Magazine Newspaper - Football description', 3, 0, 1, 1, '2017-07-22 01:18:29', '2017-07-22 01:18:29'),
(8, 'Basketball', 'basketball', 'News247 - News Magazine Newspaper - Basketball title', 'News247 - News Magazine Newspaper - Basketball keyword', 'News247 - News Magazine Newspaper - Basketball description', 3, 0, 1, 1, '2017-07-28 02:18:55', '2017-07-28 02:18:55'),
(9, 'Fashion', 'fashion', 'Title of fashion category', 'Keyword of fashion category', 'Description of fashion category', 0, 0, 1, 1, '2017-07-31 06:33:12', '2017-07-31 06:33:12'),
(10, 'Technology', 'technology', 'Title of fashion technology category', 'Keyword of technology category', 'Description of technology category', 0, 0, 1, 1, '2017-07-31 06:38:17', '2017-07-31 06:38:17'),
(11, 'Health', 'health', 'Title of fashion health category', 'Keyword of health category', 'Description of health category', 0, 0, 1, 1, '2017-07-31 06:39:00', '2017-07-31 06:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `configs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_07_21_032112_create_configs_table', 1),
('2017_07_21_032234_create_posttypes_table', 1),
('2017_07_21_032509_create_videos_table', 1),
('2017_07_21_033334_create_posts_table', 1),
('2017_07_21_034227_create_tags_table', 1),
('2017_07_21_034313_create_post_tags_table', 1),
('2017_07_21_034446_create_comments_table', 1),
('2017_07_21_034613_create_post_comments_table', 1),
('2017_07_21_042031_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `keyword` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posttype_id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_posttype_id_foreign` (`posttype_id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `intro`, `alias`, `title`, `description`, `keyword`, `content`, `status`, `image`, `posttype_id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Samsung Gear S3 review: A whimper, when smartwatches need a bang', 'Samsung Gear S3 review: A whimper, when smartwatches need a bang. Awesome', 'samsung-gear-s3-review:-a-whimper,-when-smartwatches-need-a-bang', 'Title of Samsung Gear S3 review: A whimper, when smartwatches need a bang', 'Description of Samsung Gear S3 review: A whimper, when smartwatches need a bang', 'Keyword of Samsung Gear S3 review: A whimper, when smartwatches need a bang', '<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">\r\n<figcaption class="caption caption--inline" style="box-sizing: inherit; text-rendering: geometricPrecision; -webkit-font-smoothing: antialiased; margin-top: 5px;">\r\n<p style="box-sizing: inherit; margin: 0px; text-align: left;"><span class="caption__credit" style="box-sizing: inherit; margin-left: 0.3em;"><span style="color: #aaaaaa; font-family: MarrSans, Helvetica, ''Arial Black'', Arial, sans-serif;"><span style="line-height: 21px;">New Atlas reviews the Samsung Gear S3, a very solid smartwatch that doesn''t improve in many ways over its predecessor (Credit: Will Shanklin/New Atlas)</span></span></span></p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 1.8em; line-height: 1.8; color: #333333; font-family: PublicoText, ''Helvetica Neue'', Arial; font-size: 18px; text-align: start;">When a company has spent the last three years aggressively churning out smartwatches on a yearly or twice-yearly basis, trying to kickstart the "Next Big Thing," what does it do when demand sputters? If you''re Samsung, the answer is apparently: not much. The Gear S3 is a solid smartwatch with an intuitive input system, but barely improves over its 2015 predecessor.</p>\r\n<ul class="gallery-preview" style="box-sizing: inherit; margin: 0px 0px 1.3em; list-style: none; padding: 0px; color: #333333; font-family: PublicoText, ''Helvetica Neue'', Arial; font-size: 18px; line-height: 27px; text-align: start;">\r\n<li style="box-sizing: inherit; margin: 0px 16.375px 16.375px 0px; float: left; width: 141.672px; background: transparent;"><a style="box-sizing: inherit; cursor: pointer; text-decoration: none; background-color: transparent;" href="http://newatlas.com/gear-s3-review/46576/#gallery?thumb=true#picture1" data-tracking="gallery-preview_thumbnail_top" data-image-hash="#p437140"><img style="box-sizing: inherit; border-style: none; max-width: 100%; vertical-align: middle;" title="Continuing a concerning trend, timers are currently&nbsp;broken on the Gear S3: They won''t notify you when completed" src="https://img.newatlas.com/gear-s3-review-1.jpg?auto=format%2Ccompress&amp;fit=crop&amp;h=200&amp;q=60&amp;w=200&amp;s=f1d95713c86a8e177ecf9c0473380006" srcset="https://img.newatlas.com/gear-s3-review-1.jpg?auto=format%2Ccompress&amp;dpr=2&amp;fit=crop&amp;h=200&amp;q=40&amp;w=200&amp;s=5321255c732e44978a3cacef23e66351 2x" alt="Continuing a concerning trend, timers are currently&nbsp;broken on the Gear S3: They won''t notify you when completed" /></a></li>\r\n<li style="box-sizing: inherit; margin: 0px 16.375px 16.375px 0px; float: left; width: 141.672px; background: transparent;"><a style="box-sizing: inherit; cursor: pointer; text-decoration: none; background-color: transparent;" href="http://newatlas.com/gear-s3-review/46576/#gallery?thumb=true#picture3" data-tracking="gallery-preview_thumbnail_top" data-image-hash="#p437142"><img style="box-sizing: inherit; border-style: none; max-width: 100%; vertical-align: middle;" title="Reminders are finally fixed in the S3" src="https://img.newatlas.com/gear-s3-review-3.jpg?auto=format%2Ccompress&amp;fit=crop&amp;h=200&amp;q=60&amp;w=200&amp;s=131b85b8a21bc148354c1d58e5b66c65" srcset="https://img.newatlas.com/gear-s3-review-3.jpg?auto=format%2Ccompress&amp;dpr=2&amp;fit=crop&amp;h=200&amp;q=40&amp;w=200&amp;s=c5edf61556ce413a945d9486d77a17bf 2x" alt="Reminders are finally fixed in the S3" /></a></li>\r\n<li style="box-sizing: inherit; margin: 0px 16.375px 16.375px 0px; float: left; width: 141.672px; background: transparent;"><a style="box-sizing: inherit; cursor: pointer; text-decoration: none; background-color: transparent;" href="http://newatlas.com/gear-s3-review/46576/#gallery?thumb=true#picture4" data-tracking="gallery-preview_thumbnail_top" data-image-hash="#p437143"><img style="box-sizing: inherit; border-style: none; max-width: 100%; vertical-align: middle;" title="The Gear''s rotating bezel is still its killer feature" src="https://img.newatlas.com/gear-s3-review-4.jpg?auto=format%2Ccompress&amp;fit=crop&amp;h=200&amp;q=60&amp;w=200&amp;s=4ceb75a4dc3afbcc9d885bd0ca205595" srcset="https://img.newatlas.com/gear-s3-review-4.jpg?auto=format%2Ccompress&amp;dpr=2&amp;fit=crop&amp;h=200&amp;q=40&amp;w=200&amp;s=5b32006f0b07472d6d68431b69511ac7 2x" alt="The Gear''s rotating bezel is still its killer feature" /></a></li>\r\n<li style="box-sizing: inherit; margin: 0px 0px 16.375px; float: left; width: 141.672px; background: transparent;"><a style="box-sizing: inherit; cursor: pointer; text-decoration: none; background-color: transparent;" href="http://newatlas.com/gear-s3-review/46576/#gallery?thumb=true#picture5" data-tracking="gallery-preview_thumbnail_top" data-image-hash="#p437144"><img style="box-sizing: inherit; border-style: none; max-width: 100%; vertical-align: middle;" title="We like the look of this Frontier model, though the watch is large" src="https://img.newatlas.com/gear-s3-review-5.jpg?auto=format%2Ccompress&amp;fit=crop&amp;h=200&amp;q=60&amp;w=200&amp;s=1dba979837f90f889a5adeb6859cd00f" srcset="https://img.newatlas.com/gear-s3-review-5.jpg?auto=format%2Ccompress&amp;dpr=2&amp;fit=crop&amp;h=200&amp;q=40&amp;w=200&amp;s=214ba82b01583a4f6bb45a5be4df4f85 2x" alt="We like the look of this Frontier model, though the watch is large" /></a></li>\r\n</ul>\r\n<p style="box-sizing: inherit; margin: 0px; text-align: left;">&nbsp;</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 1.8em; line-height: 1.8; color: #333333; font-family: PublicoText, ''Helvetica Neue'', Arial; font-size: 18px; text-align: start;">One of the most unsightly features of the earliest smartwatches was a tendency towards gargantuan sizes that announced to anyone in sight: "I''m a tech product." After a year or two, those sizes &ndash; thankfully &ndash; started shrinking down to better blend in with their timekeeping watch ancestors. The popular assumption was that smartwatches would continue in that trajectory towards inconspicuousness.</p>\r\n</figcaption>\r\n</figure>', 1, '/photos/1/post/gadget2.jpg', 4, 10, 1, '2017-07-31 06:47:52', '2017-07-31 06:47:52'),
(3, 'Hynopedia helps female travelers find health care in Maldivs', 'Hynopedia helps female travelers find health care in Maldivs, it''s very beautyful', 'hynopedia-helps-female-travelers-find-health-care-in-maldivs', 'Title of Hynopedia helps female travelers find health care in Maldivs', 'Description of Hynopedia helps female travelers find health care in Maldivs', 'Keyword of Hynopedia helps female travelers find health care in Maldivs', '<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">Visit your health professional at least 4 to 6 weeks before your trip to check whether you need any vaccinations or other preventive measures. Country specific information and advice is published by the National Travel Health Network and Centre on the TravelHealthPro website and by NHS (Scotland) on the fitfortravel website. Useful information and advice about healthcare abroad is also available on the NHS Choices website.</figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;"></figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">UK health authorities have classified Maldives as having a risk of Zika virus transmission. For more information and advice visit the National Travel Health Network and Centre website</figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;"></figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">Medical facilities are limited. There are only 2 hospitals and these are on the capital island, Mal&eacute;. Neither has a trauma unit. Although most resort islands are within easy reach of a doctor, many are several hours&rsquo; travel away from the hospital facilities on Mal&eacute;. Many resort islands are more than an hour away from the nearest decompression chamber.</figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;"></figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">Make sure you have adequate travel health insurance and accessible funds to cover the cost of any medical treatment abroad and repatriation.</figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;"></figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">If you need emergency medical assistance during your trip, dial 102 and ask for an ambulance. You should contact your insurance/medical assistance company promptly if you are referred to a medical facility for treatment.</figure>\r\n<figure class="inline-item" style="box-sizing: inherit; margin: 0px auto 1.8em; text-align: center; position: relative;">\r\n<figcaption class="caption caption--inline" style="box-sizing: inherit; text-rendering: geometricPrecision; -webkit-font-smoothing: antialiased; margin-top: 5px;">\r\n<p style="border: none; margin: 20px 0px; padding: 0px; font-size: 19px; font-family: nta, Arial, sans-serif; line-height: 1.31579; color: #0b0c0c; text-align: start;">&nbsp;</p>\r\n</figcaption>\r\n</figure>', 1, '/photos/1/post/travel1.jpg', 3, 2, 1, '2017-07-31 06:56:49', '2017-07-31 06:56:49'),
(5, 'Soaring through Southern Patagonia with the Premium Byrd drone', 'Soaring through Southern Patagonia with the Premium Byrd drone hmm', 'soaring-through-southern-patagonia-with-the-premium-byrd-drone', 'Title of Soaring through Southern Patagonia with the Premium Byrd drone', 'Description of Soaring through Southern Patagonia with the Premium Byrd drone', 'Keyword of Soaring through Southern Patagonia with the Premium Byrd drone', '<div class="itemIntroText" style="box-sizing: border-box; color: #333333; font-family: ''Open Sans'', sans-serif; line-height: 24px;">\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px;">Pityful a rethoric question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>\r\n</div>\r\n<div class="itemFullText" style="box-sizing: border-box; color: #333333; font-family: ''Open Sans'', sans-serif; line-height: 24px;">\r\n<p style="box-sizing: border-box; margin: 0px 0px 15px;">Throw myself down teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 15px;">Lo-fi cred gastropub, brunch aliquip stumptown culpa. Banh mi eiusmod tattooed, freegan Schlitz master cleanse pug. Eu 8-bit id PBR Pinterest taxidermy, swag church-key Echo Park commodo yr. Adipisicing leggings enim laboris wayfarers, cliche Carles placeat typewriter mixtape cold-pressed. Etsy Pitchfork Austin, selvage beard reprehenderit ea ugh.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 15px;">Pitchfork kitsch plaid forage aliquip, sustainable taxidermy deserunt health goth stumptown cred VHS butcher. Mixtape fap Intelligentsia small batch placeat labore, bitters swag chia Echo Park. Four loko aliquip id, delectus beard Bushwick bespoke Blue Bottle eu keytar veniam ethical High Life pour-over.</p>\r\n<h3 style="box-sizing: border-box; font-family: Arimo, sans-serif; line-height: 30px; margin: 0px; font-size: 22px; padding: 15px;">When, while the lovely valley teems with vapour around me, and the meridian sun strikes.</h3>\r\n<p style="box-sizing: border-box; margin: 0px 0px 15px;">Art party photo booth deserunt exercitation plaid squid. Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally duis photo booth Thundercats shabby chic. Velit non seitan, tilde art party minim Thundercats viral.</p>\r\n<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px;">\r\n<li style="box-sizing: border-box;">Plaid fashion axe semiotics skateboard</li>\r\n<li style="box-sizing: border-box;">Mixtape fap Intelligentsia small batch placeat labore</li>\r\n<li style="box-sizing: border-box;">Gleams steal into the inner sanctuary grow</li>\r\n<li style="box-sizing: border-box;">Like these sweet mornings of spring which</li>\r\n</ul>\r\n<p style="box-sizing: border-box; margin: 0px 0px 15px;">High Life tempor retro Truffaut. Tofu mixtape twee, assumenda quinoa flexitarian aesthetic artisan vinyl pug. Chambray et Carles Thundercats cardigan actually, magna bicycle rights. Plaid fashion axe semiotics skateboard, try-hard food truck aesthetic biodiesel exercitation. Accusamus VHS Wes Anderson Banksy food truck vero. Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo. Listicle meditation paleo, drinking vinegar sint direct trade vegan 3 wolf moon.</p>\r\n</div>', 1, '/photos/1/gadget4.jpg', 3, 2, 1, '2017-08-01 00:24:47', '2017-08-01 00:24:47'),
(6, 'Early tourists choices to the sea of Maldives in fancy dresses and suits', 'Pityful a rethoric question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lan', 'early-tourists-choices-to-the-sea-of-maldives-in-fancy-dresses-and-suits', 'Title of Early tourists choices to the sea of Maldives in fancy dresses and suits', 'Description of Early tourists choices to the sea of Maldives in fancy dresses and suits', 'Keyword of Early tourists choices to the sea of Maldives in fancy dresses and suits', '<p>&nbsp;<span style="color: #333333; font-family: ''Open Sans'', sans-serif; line-height: 24px;">Pityful a rethoric question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</span></p>\r\n<div class="itemFullText" style="box-sizing: border-box; color: #333333; font-family: ''Open Sans'', sans-serif; line-height: 24px;">\r\n<p style="box-sizing: border-box; margin: 0px 0px 15px;">Throw myself down teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath</p>\r\n</div>', 1, '/photos/1/post/travel2.jpg', 3, 2, 1, '2017-08-01 00:34:44', '2017-08-01 00:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `posttypes`
--

CREATE TABLE IF NOT EXISTS `posttypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posttypes_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `posttypes`
--

INSERT INTO `posttypes` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Popular post', 1, NULL, NULL),
(2, 'Review', 1, NULL, NULL),
(3, 'Hot news', 1, '2017-07-31 06:30:32', '2017-07-31 06:30:32'),
(4, 'Hot new in top homepage', 1, '2017-07-31 06:41:21', '2017-07-31 06:41:21'),
(5, 'Normal news', 1, '2017-07-31 06:41:21', '2017-07-31 06:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(10, 1, 1, '2017-07-28 00:16:57', '2017-07-28 00:16:57'),
(11, 1, 2, '2017-07-28 00:16:57', '2017-07-28 00:16:57'),
(12, 1, 3, '2017-07-28 00:16:57', '2017-07-28 00:16:57'),
(13, 1, 4, '2017-07-28 00:16:57', '2017-07-28 00:16:57'),
(14, 1, 5, '2017-07-28 00:16:57', '2017-07-28 00:16:57'),
(15, 2, 6, '2017-07-31 06:47:52', '2017-07-31 06:47:52'),
(16, 2, 7, '2017-07-31 06:47:52', '2017-07-31 06:47:52'),
(17, 2, 8, '2017-07-31 06:47:52', '2017-07-31 06:47:52'),
(18, 3, 9, '2017-07-31 06:56:49', '2017-07-31 06:56:49'),
(19, 3, 10, '2017-07-31 06:56:49', '2017-07-31 06:56:49'),
(20, 5, 11, '2017-08-01 00:24:48', '2017-08-01 00:24:48'),
(21, 6, 9, '2017-08-01 00:34:44', '2017-08-01 00:34:44'),
(22, 6, 10, '2017-08-01 00:34:44', '2017-08-01 00:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `alias`, `name`) VALUES
(1, '2017-07-27 23:45:16', '2017-07-27 23:45:16', 'test1', 'Test1'),
(2, '2017-07-27 23:45:17', '2017-07-27 23:45:17', 'test2', 'Test2'),
(3, '2017-07-27 23:45:17', '2017-07-27 23:45:17', 'test3', 'Test3'),
(4, '2017-07-27 23:45:17', '2017-07-27 23:45:17', 'test4', 'Test4'),
(5, '2017-07-28 00:16:08', '2017-07-28 00:16:08', 'test5', 'Test5'),
(6, '2017-07-31 06:47:52', '2017-07-31 06:47:52', 'samsung', 'Samsung'),
(7, '2017-07-31 06:47:52', '2017-07-31 06:47:52', 's3', ' S3'),
(8, '2017-07-31 06:47:52', '2017-07-31 06:47:52', 'gear', ' Gear'),
(9, '2017-07-31 06:56:49', '2017-07-31 06:56:49', 'travel', 'Travel'),
(10, '2017-07-31 06:56:49', '2017-07-31 06:56:49', 'maldive', 'Maldive'),
(11, '2017-08-01 00:24:48', '2017-08-01 00:24:48', 'soaring', 'Soaring');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `about`, `facebook`, `twitter`, `google`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hominh', '', '', '', '', '', 'minhhh12@gmail.com', '$2y$10$P9IrjVIVnvbeybMeh/LIA.xnKofF0wKJIjibhjb9udrXklY7JMp2K', NULL, '2017-07-20 21:29:27', '2017-07-20 21:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `alias`, `intro`, `title`, `description`, `keyword`, `url`, `thumb`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test name video', 'test-name-video', 'Day la video de test', 'Title of video', 'Description of video', '', 'https://www.youtube.com/watch?v=cU7v3eqR6Ho', '', 1, 1, '2017-07-30 20:37:13', '2017-07-31 01:21:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `configs`
--
ALTER TABLE `configs`
  ADD CONSTRAINT `configs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_posttype_id_foreign` FOREIGN KEY (`posttype_id`) REFERENCES `posttypes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posttypes`
--
ALTER TABLE `posttypes`
  ADD CONSTRAINT `posttypes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
