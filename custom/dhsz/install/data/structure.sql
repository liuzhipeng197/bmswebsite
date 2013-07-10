DROP TABLE IF EXISTS `nitc_ad`;
CREATE TABLE `nitc_ad` (
`ad_id` int(10) unsigned NOT NULL auto_increment,
`language_id` int(10) NOT NULL default '1',
`category` varchar(50) NOT NULL,
`url` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
`file` varchar(100) NOT NULL,
`sort_order` int(10) NOT NULL default '0',
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`type` int(10) NOT NULL default '0',
`state` tinyint(1) NOT NULL default '0',
PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_category`;
CREATE TABLE `nitc_category` (
`category_id` int(10) unsigned NOT NULL auto_increment,
`image` varchar(100) NOT NULL,
`parent_id` int(10) NOT NULL default '0',
`root_category_id` int(10) NOT NULL default '0',
`sort_order` int(3) default '0',
`state` int(1) default '0',
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`html_flag` int(3) unsigned NOT NULL default '0',
PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_category_desc`;
CREATE TABLE `nitc_category_desc` (
`category_id` int(10) NOT NULL default '0',
`language_id` int(10) NOT NULL default '1',
`name` varchar(100) NOT NULL default '',
`abstract` text NOT NULL,
`meta_title` varchar(255) default NULL,
`meta_keywords` text,
`meta_description` text,
`description` text,
`page_name` varchar(100) default NULL,
PRIMARY KEY  (`category_id`,`language_id`),
KEY `name` (`name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_channel_category`;
CREATE TABLE `nitc_channel_category` (
`channel_category_id` int(10) unsigned NOT NULL auto_increment,
`image` varchar(100) NOT NULL,
`parent_id` int(10) NOT NULL default '0',
`sort_order` float(10,1) default '0.0',
`state` int(1) default '0',
`flag` varchar(20) NOT NULL,
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`html_flag` int(3) unsigned NOT NULL default '0',
`sta` int(1) default '0',
`manage_url` varchar(255) NOT NULL default '',
`is_lock` int(1) not null default '0',
`is_display` int(1) not null default '0',
PRIMARY KEY  (`channel_category_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_channel_category` (`channel_category_id`, `image`, `parent_id`, `sort_order`, `state`, `flag`, `date_added`, `date_modified`, `html_flag`, `sta`, `manage_url`, `is_lock`, `is_display`) VALUES 
(1, '', 0, 1, 0, 'index', '2010-04-30 13:33:28', '2010-05-04 10:23:00', 0, 0, 'home_meta.php?action=edit', 1, 0),
(2, '', 0, 2, 0, 'about-us', '2010-04-30 13:38:13', '2010-05-04 11:38:19', 0, 0, 'company.php?action=edit', 1, 0),
(3, '', 0, 3, 0, 'products', '2010-04-30 13:40:13', '2010-05-04 12:40:22', 0, 0, 'product.php?action=list', 1, 0),
(4, '', 0, 4, 0, 'news', '2010-04-30 13:42:13', '2010-05-04 13:42:25', 0, 0, 'channel_content.php?action=list&category_id=4', 1, 0),
(5, '', 0, 5, 0, 'download', '2010-04-30 13:45:13', '2010-05-04 14:45:33', 0, 0, 'channel_content.php?action=list&category_id=5', 0, 0),
(6, '', 0, 6, 0, 'inquiry', '2010-04-30 13:47:13', '2010-05-04 15:47:35', 0, 0, 'inquiry.php?action=list', 1, 0),
(7, '', 0, 7, 0, 'contact-us', '2010-04-30 13:50:13', '2010-05-04 16:50:40', 0, 0, 'contact.php?action=list', 1, 0),
(8, '', 0, 8, 0, 'links', '2010-04-30 13:57:13', '2010-05-04 16:59:47', 0, 1, 'channel_category.php?action=single&category_id=8', 0, 1);

DROP TABLE IF EXISTS `nitc_channel_category_desc`;
CREATE TABLE `nitc_channel_category_desc` (
`channel_category_id` int(10) NOT NULL default '0',
`language_id` int(10) NOT NULL default '1',
`name` varchar(100) NOT NULL default '',
`meta_title` varchar(255) default NULL,
`meta_keywords` text,
`meta_description` text,
`description` text,
`url` varchar(100) default NULL,
PRIMARY KEY  (`channel_category_id`,`language_id`),
KEY `name` (`name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_channel_category_desc` (`channel_category_id`, `language_id`, `name`, `meta_title`, `meta_keywords`, `meta_description`, `description`, `url`) VALUES 
(1, 1, 'Home', 'Home', 'Home', 'Home', '<p>Home</p>', ''),
(1, 2, '首页', '首页', '首页', '首页', '<p>首页</p>', ''),
(2, 1, 'About Us', 'About Us', 'About Us', 'About Us', '<p>About Us</p>', ''),
(2, 2, '公司介绍', '公司介绍', '公司介绍', '公司介绍', '<p>公司介绍</p>', ''),
(3, 1, 'Products', 'Products', 'Products', 'Products', '<p>Products</p>', ''),
(3, 2, '产品展示', '产品展示', '产品展示', '产品展示', '<p>产品展示</p>', ''),
(4, 1, 'News', 'News', 'News', 'News', '<p>News</p>', ''),
(4, 2, '新闻动态', '新闻动态', '新闻动态', '新闻动态', '<p>新闻动态</p>', ''),
(5, 1, 'Download', 'Download', 'Download', 'Download', '<p>Download</p>', ''),
(5, 2, '资料下载', '资料下载', '资料下载', '资料下载', '<p>资料下载</p>', ''),
(6, 1, 'Inquiry', 'Inquiry', 'Inquiry', 'Inquiry', '<p>Inquiry</p>', ''),
(6, 2, '在线咨询', '在线咨询', '在线咨询', '在线咨询', '<p>在线咨询</p>', ''),
(7, 1, 'Contact Us', 'Contact Us', 'Contact Us', 'Contact Us', '<p>Contact Us</p>', ''),
(7, 2, '联系我们', '联系我们', '联系我们', '联系我们', '<p>联系我们</p>', ''),
(8, 1, 'Links', 'Links', 'Links', 'Links', '<p>Links</p>', ''),
(8, 2, '友情链接', '友情链接', '友情链接', '友情链接', '', '');

DROP TABLE IF EXISTS `nitc_channel_content`;
CREATE TABLE `nitc_channel_content` (
`channel_content_id` int(10) unsigned NOT NULL auto_increment,
`channel_category_id` int(10) NOT NULL default '0',
`filename` varchar(100) NOT NULL,
`small_image` varchar(100) NOT NULL default '',
`original_image` varchar(100) NOT NULL default '',
`is_featured` int(1) NOT NULL default '0',
`is_image` int(1) NOT NULL default '0',
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`viewed` int(5) NOT NULL default '0',
`html_flag` int(3) unsigned NOT NULL default '0',
`is_color` int(1) NOT NULL default '0',
`color` varchar(10) NOT NULL default '',
`is_underline` int(1) NOT NULL default '0',
`is_bold` int(1) NOT NULL default '0',
`is_italic` int(1) NOT NULL default '0',
`sort_order` int(10) NOT NULL default '0', 
PRIMARY KEY  (`channel_content_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_channel_content_desc`;
CREATE TABLE `nitc_channel_content_desc` (
`channel_content_id` int(10) NOT NULL default '0',
`language_id` int(10) NOT NULL default '1',
`name` varchar(255) NOT NULL default '',
`abstract` text NOT NULL,
`meta_title` varchar(255) default NULL,
`meta_keywords` text,
`meta_description` text,
`description` text,
PRIMARY KEY  (`channel_content_id`,`language_id`),
KEY `name` (`name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_company`;
CREATE TABLE `nitc_company` (
`company_id` int(10) unsigned NOT NULL auto_increment,
`html_flag` int(3) unsigned NOT NULL default '0',
`year_company_registered` varchar(100) default NULL,
`zip` varchar(50) default NULL,
`googleMapAddress` varchar(255) default NULL,
`googleMapKey` varchar(255) default NULL,
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
PRIMARY KEY  (`company_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_company` (`company_id`) VALUES (1),(2);

DROP TABLE IF EXISTS `nitc_company_desc`;
CREATE TABLE `nitc_company_desc` (
`company_id` int(10) NOT NULL default '0',
`language_id` int(10) NOT NULL default '1',
`company_name` varchar(255) NOT NULL default '',
`logo` varchar(100) default NULL,
`abstract` text NOT NULL,
`address` varchar(250) NOT NULL default '',
`description` text NOT NULL,
`business_type` varchar(255) default NULL,
`product_service` varchar(255) default NULL,
`export_percentage` varchar(100) default NULL,
`factory_size` varchar(100) default NULL,
`factory_location` varchar(255) default NULL,
`employee_number` varchar(100) default NULL,
`annual_turnover` varchar(100) default NULL,
`brands` varchar(100) default NULL,
`main_markets` varchar(255) default NULL,
`certification` varchar(255) default NULL,
`website` varchar(255) default NULL,
PRIMARY KEY  (`company_id`,`language_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_company_desc` (`company_id`, `language_id`) VALUES (1, 1),(1, 2),(2, 1),(2, 2);

DROP TABLE IF EXISTS `nitc_config`;
CREATE TABLE `nitc_config` (
`config_id` int(10) unsigned NOT NULL auto_increment,
`weburl` varchar(100) NOT NULL default '',
`date_start` datetime NOT NULL default '0000-00-00 00:00:00',
`date_end` datetime NOT NULL default '0000-00-00 00:00:00',
`flow_code` text,
`company_name` varchar(255) default NULL,
`version` varchar(50) NOT NULL,
`email_type` int(1) NOT NULL default '0',
`smtp_host` varchar(100) NOT NULL default '',
`smtp_port` varchar(100) NOT NULL default '',
`smtp_user_name` varchar(100) NOT NULL default '',
`smtp_password` varchar(100) NOT NULL default '',
`smtp_email` varchar(100) NOT NULL default '',
`watermark_location` int(10) NOT NULL default '0',
`watermark_transparency` int(10) NOT NULL default '50',
`watermark_value` varchar(100) default NULL,
`support_name` varchar(255) default NULL,
`support_logo` varchar(100) default NULL,
`support_url` varchar(255) NOT NULL default '',
`featured_product_cnt` int(10) NOT NULL default '0',
`new_product_cnt` int(10) NOT NULL default '0',
`view_style` int(1) NOT NULL default '0',
`other_product_cnt` int(10) NOT NULL default '0',
`product_list_cnt` int(10) NOT NULL default '0',
`channel_cnt` int(10) NOT NULL default '0',
`channel_img_cnt` int(10) NOT NULL default '0',
`cache_time` int(10) unsigned NOT NULL default '3600',
`template` varchar(100) NOT NULL,
`small_img_thumb_width` int(10) NOT NULL default '0',
`small_img_thumb_height` int(10) NOT NULL default '0',
`middle_img_thumb_width` int(10) NOT NULL default '0',
`middle_img_thumb_height` int(10) NOT NULL default '0',
`news_img_thumb_width` int(10) NOT NULL default '0',
`news_img_thumb_height` int(10) NOT NULL default '0',
`channel_img_thumb_width` int(10) NOT NULL default '0',
`channel_img_thumb_height` int(10) NOT NULL default '0',
`enable_gzip` int(1) NOT NULL default '1',
`skin` varchar(50) NOT NULL,
`beian` varchar(100) default NULL,
`homepage_priority` float default '1',
`homepage_changefreq` varchar(255) default 'daily',
`category_priority` float default '0.8',
`category_changefreq` varchar(255) default 'daily',
`content_priority` float default '0.7',
`content_changefreq` varchar(255) default 'weekly',
`copyright_year` varchar(50) default '',
`online_services` text default NULL,
`online_state` smallint(1) NOT NULL default '2',
`custom_url` int(1) NOT NULL default '0',
`pseudo_static` int(1) NOT NULL default '0',
`products_show_type` int(1) NOT NULL default '0',
`htaccess` text default NULL,
`randKey` varchar(100) default NULL,
PRIMARY KEY  (`config_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_config` (`config_id`, `weburl`, `date_start`, `date_end`, `flow_code`, `company_name`, `version`, `email_type`, `smtp_host`, `smtp_port`, `smtp_user_name`, `smtp_password`, `smtp_email`, `watermark_location`, `watermark_transparency`, `watermark_value`, `support_name`, `support_logo`, `support_url`, `featured_product_cnt`, `new_product_cnt`, `view_style`,`other_product_cnt`,`product_list_cnt`,`channel_cnt`,`channel_img_cnt`,`cache_time`,`template`,`small_img_thumb_width`,`small_img_thumb_height`,`middle_img_thumb_width`,`middle_img_thumb_height`,`news_img_thumb_width`,`news_img_thumb_height`,`channel_img_thumb_width`,`channel_img_thumb_height`, `enable_gzip`, `skin`, `beian`, `homepage_priority`, `homepage_changefreq`, `category_priority`, `category_changefreq`, `content_priority`, `content_changefreq`, `copyright_year`, `online_services`, `online_state`, `custom_url`, `pseudo_static`, `products_show_type`, `htaccess`, `randKey`) VALUES 
(1, '-HTTP_URL_CHANGE', '0000-00-00 00:00:00', '0000-00-31 00:00:00', '<script type="text/javascript" src="-HTTP_URL_CHANGE/js/statistics.js"></script>', '宁波思迈尔网络科技有限公司', '', 1, '', '25', '', '', '', 0, 65, '', '', '', '', 3, 6, 0, 10, 20, 10, 12, 7200, 'default',110,110,250,250,100,80,200,200, 0, 'blue_2010', '', 1, 'daily', 0.8, 'daily', 0.7, 'weekly', '', '', 2, 1, '', '', '<IfModule mod_rewrite.c>\r\nRewriteEngine on\r\nRewriteBase /\r\n\r\n\r\nRewriteRule ^(|/)$ index.php [L]\r\nRewriteRule ^(about[-|_]us|products|news|download|contact[-|_]us|sitemap).html$ index.php?action=$1 [L]\r\nRewriteRule ^(products|channel|download|news|brand)[-|_]page([0-9]{1,}).html$ index.php?action=$1&rpage=$2 [L]\r\nRewriteRule ^(products|channel|download|news|brand)[-|_]([0-9]{1,})[-|_]page([0-9]{1,}).html$ index.php?action=$1&rid=$2&rpage=$3 [L]\r\nRewriteRule ^(about[-|_]us|news|download|channel)/(.*)[-|_]([0-9]{1,}).html$ index.php?action=content&channel_flag=$1&rid=$2&rid=$3 [L]\r\n\r\nRewriteRule ^([a-zA-Z]{2})(|/)$ index.php?directory=$1 [L]\r\nRewriteRule ^([a-zA-Z]{2})/(about[-|_]us|products|news|download|contact[-|_]us|sitemap).html$ index.php?directory=$1&action=$2 [L]\r\nRewriteRule ^([a-zA-Z]{2})/(products|channel|download|news|brand)[-|_]page([0-9]{1,}).html$ index.php?directory=$1&action=$2&rpage=$3 [L]\r\nRewriteRule ^([a-zA-Z]{2})/(products|channel|download|news|brand)[-|_]([0-9]{1,})[-|_]page([0-9]{1,}).html$ index.php?directory=$1&action=$2&rid=$3&rpage=$4 [L]\r\nRewriteRule ^([a-zA-Z]{2})/(about[-|_]us|news|download|channel)/(.*)[-|_]([0-9]{1,}).html$ index.php?directory=$1&action=content&channel_flag=$2&rid=$3&rid=$4 [L]\r\n\r\nRewriteRule ^(.*).html$ index.php?static_url=$1 [L]\r\n\r\n</IfModule>', '');

DROP TABLE IF EXISTS `nitc_contact`;
CREATE TABLE `nitc_contact` (
`contact_id` int(10) unsigned NOT NULL auto_increment,
`language_id` int(10) NOT NULL default '1',
`department` varchar(100) NOT NULL,
`email` varchar(255) NOT NULL default '',
`tel` varchar(100) NOT NULL default '',
`fax` varchar(100) default NULL,
`aliwangwang` text default NULL,
`yahoo` text default NULL,
`skype` text default NULL,
`qq` text default NULL,
`msn` text default NULL,
`state` int(1) NOT NULL default '0',
`contact_person` varchar(100) NOT NULL default '0',
`company_name` varchar(255) NOT NULL default '',
`address` varchar(255) NOT NULL default '',
`zip` varchar(30) NOT NULL default '',
`sort_order` int(10) NOT NULL default '0',
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`html_flag` int(3) unsigned NOT NULL default '0',
PRIMARY KEY  (`contact_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_country`;
CREATE TABLE `nitc_country` (
`country_id` int(10) NOT NULL auto_increment,
`country` varchar(100) NOT NULL default '',
`countrynum` varchar(10) NOT NULL default '',
`value` varchar(10) NOT NULL default '',
PRIMARY KEY  (`country_id`),
KEY `value` (`value`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_country` (`country_id`, `country`, `countrynum`, `value`) VALUES 
(1, 'Afghanistan', '93', 'AF'),
(2, 'Albania', '355', 'AL'),
(3, 'Algeria', '213', 'DZ'),
(4, 'American Samoa', '684', 'AS'),
(5, 'Andorra', '376', 'AD'),
(6, 'Angola', '244', 'AO'),
(7, 'Anguilla', '1-264', 'AI'),
(8, 'Antarctica', '672', 'AQ'),
(9, 'Antigua and Barbuda', '1-268', 'AG'),
(10, 'Argentina', '54', 'AR'),
(11, 'Armenia', '374', 'AM'),
(12, 'Aruba', '297', 'AW'),
(13, 'Australia', '61', 'AU'),
(14, 'Austria', '43', 'AT'),
(15, 'Azerbaijan', '994', 'AZ'),
(16, 'Bahamas', '1-242', 'BS'),
(17, 'Bahrain', '973', 'BH'),
(18, 'Bangladesh', '880', 'BD'),
(19, 'Barbados', '1-246', 'BB'),
(20, 'Belarus', '375', 'BY'),
(21, 'Belgium', '32', 'BE'),
(22, 'Belize', '501', 'BZ'),
(23, 'Benin', '229', 'BJ'),
(24, 'Bermuda', '1-441', 'BM'),
(25, 'Bhutan', '975', 'BT'),
(26, 'Bolivia', '591', 'BO'),
(27, 'Bosnia and Herzegovina', '387', 'BA'),
(28, 'Botswana', '267', 'BW'),
(29, 'Bouvet Island', '', 'BV'),
(30, 'Brazil', '55', 'BR'),
(31, 'British Indian Ocean Territory', '1-284', 'IO'),
(32, 'Brunei Darussalam', '673', 'BN'),
(33, 'Bulgaria', '359', 'BG'),
(34, 'Burkina Faso', '226', 'BF'),
(35, 'Burundi', '257', 'BI'),
(36, 'Cambodia', '855', 'KH'),
(37, 'Cameroon', '237', 'CM'),
(38, 'Canada', '1', 'CA'),
(39, 'Cape Verde', '238', 'CV'),
(40, 'Cayman Islands', '1-345', 'KY'),
(41, 'Central African Republic', '236', 'CF'),
(42, 'Chad', '235', 'TD'),
(43, 'Chile', '56', 'CL'),
(44, 'China', '86', 'CN'),
(45, 'Christmas Island', '61', 'CX'),
(46, 'Cocos (Keeling) Islands', '61', 'CC'),
(47, 'Colombia', '57', 'CO'),
(48, 'Comoros', '269', 'KM'),
(49, 'Congo', '242', 'CG'),
(50, 'Congo, The Democratic Republic Of The', '243', 'ZR'),
(51, 'Cook Islands', '682', 'CK'),
(52, 'Costa Rica', '506', 'CR'),
(53, 'Cote D''Ivoire', '225', 'CI'),
(54, 'Croatia (local name: Hrvatska)', '385', 'HR'),
(55, 'Cuba', '53', 'CU'),
(56, 'Cyprus', '357', 'CY'),
(57, 'Czech Republic', '420', 'CZ'),
(58, 'Denmark', '45', 'DK'),
(59, 'Djibouti', '253', 'DJ'),
(60, 'Dominica', '1-767', 'DM'),
(61, 'Dominican Republic', '1-809', 'DO'),
(62, 'East Timor', '670', 'TP'),
(63, 'Ecuador', '593', 'EC'),
(64, 'Egypt', '20', 'EG'),
(65, 'El Salvador', '503', 'SV'),
(66, 'Equatorial Guinea', '240', 'GQ'),
(67, 'Eritrea', '291', 'ER'),
(68, 'Estonia', '372', 'EE'),
(69, 'Ethiopia', '251', 'ET'),
(70, 'Falkland Islands (Malvinas)', '500', 'FK'),
(71, 'Faroe Islands', '298', 'FO'),
(72, 'Fiji', '679', 'FJ'),
(73, 'Finland', '358', 'FI'),
(74, 'France', '33', 'FR'),
(75, 'France Metropolitan', '33', 'FX'),
(76, 'French Guiana', '594', 'GF'),
(77, 'French Polynesia', '689', 'PF'),
(78, 'French Southern Territories', '', 'TF'),
(79, 'Gabon', '241', 'GA'),
(80, 'Gambia', '220', 'GM'),
(81, 'Georgia', '995', 'GE'),
(82, 'Germany', '49', 'DE'),
(83, 'Ghana', '233', 'GH'),
(84, 'Gibraltar', '350', 'GI'),
(85, 'Greece', '30', 'GR'),
(86, 'Greenland', '299', 'GL'),
(87, 'Grenada', '1-473', 'GD'),
(88, 'Guadeloupe', '590', 'GP'),
(89, 'Guam', '1-671', 'GU'),
(90, 'Guatemala', '502', 'GT'),
(91, 'Guinea', '224', 'GN'),
(92, 'Guinea-Bissau', '245', 'GW'),
(93, 'Guyana', '592', 'GY'),
(94, 'Haiti', '509', 'HT'),
(95, 'Heard and Mc Donald Islands', '', 'HM'),
(96, 'Honduras', '504', 'HN'),
(97, 'Hong Kong', '852', 'HK'),
(98, 'Hungary', '36', 'HU'),
(99, 'Iceland', '354', 'IS'),
(100, 'India', '91', 'IN'),
(101, 'Indonesia', '62', 'ID'),
(102, 'Iran (Islamic Republic of)', '98', 'IR'),
(103, 'Iraq', '964', 'IQ'),
(104, 'Ireland', '353', 'IE'),
(105, 'Israel', '972', 'IL'),
(106, 'Italy', '39', 'IT'),
(107, 'Jamaica', '1-876', 'JM'),
(108, 'Japan', '81', 'JP'),
(109, 'Jordan', '962', 'JO'),
(110, 'Kazakhstan', '7', 'KZ'),
(111, 'Kenya', '254', 'KE'),
(112, 'Kiribati', '686', 'KI'),
(113, 'Kuwait', '965', 'KW'),
(114, 'Kyrgyzstan', '996', 'KG'),
(115, 'Lao People''s Democratic Republic', '', 'LA'),
(116, 'Latvia', '371', 'LV'),
(117, 'Lebanon', '961', 'LB'),
(118, 'Lesotho', '266', 'LS'),
(119, 'Liberia', '231', 'LR'),
(120, 'Libyan Arab Jamahiriya', '218', 'LY'),
(121, 'Liechtenstein', '423', 'LI'),
(122, 'Lithuania', '370', 'LT'),
(123, 'Luxembourg', '352', 'LU'),
(124, 'Macau', '853', 'MO'),
(125, 'Macedonia', '389', 'MK'),
(126, 'Madagascar', '261', 'MG'),
(127, 'Malawi', '265', 'MW'),
(128, 'Malaysia', '60', 'MY'),
(129, 'Maldives', '960', 'MV'),
(130, 'Mali', '223', 'ML'),
(131, 'Malta', '356', 'MT'),
(132, 'Marshall Islands', '692', 'MH'),
(133, 'Martinique', '596', 'MQ'),
(134, 'Mauritania', '222', 'MR'),
(135, 'Mauritius', '230', 'MU'),
(136, 'Mayotte', '269', 'YT'),
(137, 'Mexico', '52', 'MX'),
(138, 'Micronesia', '691', 'FM'),
(139, 'Moldova', '373', 'MD'),
(140, 'Monaco', '377', 'MC'),
(141, 'Mongolia', '976', 'MN'),
(142, 'Montserrat', '1-664', 'MS'),
(143, 'Montenegro', '382', 'MNE'),
(144, 'Morocco', '212', 'MA'),
(145, 'Mozambique', '258', 'MZ'),
(146, 'Myanmar', '95', 'MM'),
(147, 'Namibia', '264', 'NA'),
(148, 'Nauru', '674', 'NR'),
(149, 'Nepal', '977', 'NP'),
(150, 'Netherlands', '31', 'NL'),
(151, 'Netherlands Antilles', '599', 'AN'),
(152, 'New Caledonia', '687', 'NC'),
(153, 'New Zealand', '64', 'NZ'),
(154, 'Nicaragua', '505', 'NI'),
(155, 'Niger', '227', 'NE'),
(156, 'Nigeria', '234', 'NG'),
(157, 'Niue', '683', 'NU'),
(158, 'Norfolk Island', '672', 'NF'),
(159, 'North Korea', '850', 'KP'),
(160, 'Northern Mariana Islands', '1670', 'MP'),
(161, 'Norway', '47', 'NO'),
(162, 'Oman', '968', 'OM'),
(163, 'Pakistan', '92', 'PK'),
(164, 'Palau', '680', 'PW'),
(165, 'Palestine', '970', 'PS'),
(166, 'Panama', '507', 'PA'),
(167, 'Papua New Guinea', '675', 'PG'),
(168, 'Paraguay', '595', 'PY'),
(169, 'Peru', '51', 'PE'),
(170, 'Philippines', '63', 'PH'),
(171, 'Pitcairn', '872', 'PN'),
(172, 'Poland', '48', 'PL'),
(173, 'Portugal', '351', 'PT'),
(174, 'Puerto Rico', '1-787', 'PR'),
(175, 'Qatar', '974', 'QA'),
(176, 'Reunion', '262', 'RE'),
(177, 'Romania', '40', 'RO'),
(178, 'Russian Federation', '7', 'RU'),
(179, 'Rwanda', '250', 'RW'),
(180, 'Saint Kitts and Nevis', '', 'KN'),
(181, 'Saint Lucia', '', 'LC'),
(182, 'Saint Vincent and the Grenadines', '', 'VC'),
(183, 'Samoa', '685', 'WS'),
(184, 'San Marino', '378', 'SM'),
(185, 'Sao Tome and Principe', '', 'ST'),
(186, 'Saudi Arabia', '966', 'SA'),
(187, 'Serbia', '381', 'SRB'),
(188, 'Senegal', '221', 'SN'),
(189, 'Seychelles', '248', 'SC'),
(190, 'Sierra Leone', '232', 'SL'),
(191, 'Singapore', '65', 'SG'),
(192, 'Slovakia (Slovak Republic)', '421', 'SK'),
(193, 'Slovenia', '386', 'SI'),
(194, 'Solomon Islands', '677', 'SB'),
(195, 'Somalia', '252', 'SO'),
(196, 'South Africa', '27', 'ZA'),
(197, 'South Korea', '82', 'KR'),
(198, 'Spain', '34', 'ES'),
(199, 'Sri Lanka', '94', 'LK'),
(200, 'St. Helena', '290', 'SH'),
(201, 'St. Pierre and Miquelon', '508', 'PM'),
(202, 'Sudan', '249', 'SD'),
(203, 'Suriname', '597', 'SR'),
(204, 'Svalbard and Jan Mayen Islands', '', 'SJ'),
(205, 'Swaziland', '268', 'SZ'),
(206, 'Sweden', '46', 'SE'),
(207, 'Switzerland', '41', 'CH'),
(208, 'Syrian Arab Republic', '963', 'SY'),
(209, 'Taiwan', '886', 'TW'),
(210, 'Tajikistan', '992', 'TJ'),
(211, 'Tanzania', '255', 'TZ'),
(212, 'Thailand', '66', 'TH'),
(213, 'Togo', '228', 'TG'),
(214, 'Tokelau', '690', 'TK'),
(215, 'Tonga', '676', 'TO'),
(216, 'Trinidad and Tobago', '1-868', 'TT'),
(217, 'Tunisia', '216', 'TN'),
(218, 'Turkey', '90', 'TR'),
(219, 'Turkmenistan', '993', 'TM'),
(220, 'Turks and Caicos Islands', '1-649', 'TC'),
(221, 'Tuvalu', '688', 'TV'),
(222, 'Uganda', '256', 'UG'),
(223, 'Ukraine', '380', 'UA'),
(224, 'United Arab Emirates', '971', 'AE'),
(225, 'United Kingdom', '44', 'UK'),
(226, 'United States', '1', 'US'),
(227, 'United States Minor Outlying Islands', '', 'UM'),
(228, 'Uruguay', '598', 'UY'),
(229, 'Uzbekistan', '998', 'UZ'),
(230, 'Vanuatu', '678', 'VU'),
(231, 'Vatican City State (Holy See)', '39', 'VA'),
(232, 'Venezuela', '58', 'VE'),
(233, 'Vietnam', '84', 'VN'),
(234, 'Virgin Islands (British)', '1284', 'VG'),
(235, 'Virgin Islands (U.S.)', '1340', 'VI'),
(236, 'Wallis And Futuna Islands', '681', 'WF'),
(237, 'Western Sahara', '685', 'EH'),
(238, 'Yemen', '967', 'YE'),
(239, 'Yugoslavia', '381', 'YU'),
(240, 'Zambia', '260', 'ZM'),
(241, 'Zimbabwe', '263', 'ZW');

DROP TABLE IF EXISTS `nitc_customer`;
CREATE TABLE `nitc_customer` (
`customer_id` bigint(20) NOT NULL auto_increment,
`company_name` varchar(100) NOT NULL default '',
`address` varchar(250) default NULL,
`country` int(10) NOT NULL default '0',
`sex` varchar(10) NOT NULL,
`contact_person` varchar(100) NOT NULL default '',
`email` varchar(100) NOT NULL default '',
`tel` varchar(100) NOT NULL default '',
`fax` varchar(100) default NULL,
`website` varchar(100) default NULL,
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`language_id` int(10) NOT NULL default '0',
PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_gallery`;
CREATE TABLE `nitc_gallery` (
`gallery_id` int(10) unsigned NOT NULL auto_increment,
`original` varchar(100) default NULL,
`filename` varchar(50) NOT NULL,
`filetype` varchar(50) default NULL,
`size` int(10) default NULL,
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
PRIMARY KEY  (`gallery_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_home_meta`;
CREATE TABLE `nitc_home_meta` (
`meta_id` int(20) NOT NULL auto_increment,
`meta_title` varchar(255) NOT NULL,
`meta_keywords` text NOT NULL,
`meta_description` text NOT NULL,
`language_id` int(10) NOT NULL default '1',
PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_home_meta` (`meta_id`,`language_id`) VALUES (1,2),(2,1);

DROP TABLE IF EXISTS `nitc_inquiry`;
CREATE TABLE `nitc_inquiry` (
`inquiry_id` int(10) NOT NULL auto_increment,
`product_id` int(10) NOT NULL default '0',
`subject` varchar(250) NOT NULL default '',
`company_name` varchar(255) default NULL,
`sex` varchar(10) NOT NULL,
`name` varchar(100) NOT NULL default '',
`email` varchar(250) NOT NULL default '',
`tel` varchar(250) NOT NULL default '',
`ip` varchar(20) NOT NULL default '',
`fax` varchar(100) default NULL,
`website` varchar(100) default NULL,
`state` int(1) NOT NULL default '0',
`content` text,
`country` int(10) NOT NULL default '0',
`address` varchar(250) default NULL,
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`customer_id` int(10) NOT NULL default '0',
`language_id` int(10) NOT NULL default '0',
PRIMARY KEY  (`inquiry_id`),
KEY `customer_id` (`customer_id`),
KEY `product_id` (`product_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_keywords`;
CREATE TABLE `nitc_keywords` (
`keyword_id` int(20) NOT NULL auto_increment,
`product_id` int(10) NOT NULL default '0',
`keyword` char(100) NOT NULL default '',
`language_id` int(10) NOT NULL default '1',
PRIMARY KEY  (`keyword_id`),
KEY `keyword` (`keyword`),
KEY `product_id` (`product_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_language`;
CREATE TABLE `nitc_language` (
`language_id` int(10) NOT NULL auto_increment,
`name` varchar(32) NOT NULL default '',
`image` varchar(64) default NULL,
`directory` varchar(100) NOT NULL default '',
`sort_order` int(3) default NULL,
`default_value` int(1) NOT NULL default '0',
`state` int(1) NOT NULL default '1',
`url` varchar(255) default NULL,
PRIMARY KEY  (`language_id`),
KEY `name` (`name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_language` (`language_id`, `name`, `image`, `directory`, `sort_order`, `default_value`, `state`) VALUES 
(1, 'English', 'country.png', 'en', 1, 0, 1),
(2, '简体中文', 'country.png', 'cn', 2, 1, 1);

DROP TABLE IF EXISTS `nitc_link`;
CREATE TABLE `nitc_link` (
`link_id` int(10) unsigned NOT NULL auto_increment,
`language_id` int(10) NOT NULL default '1',
`link_name` varchar(255) NOT NULL,
`link_logo` varchar(255) NOT NULL,
`link_url` varchar(255) NOT NULL default '',
`sort_order` int(10) NOT NULL default '0',
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
PRIMARY KEY  (`link_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_inquiry_product`;
CREATE TABLE `nitc_inquiry_product` (
`id` int(10) unsigned NOT NULL auto_increment,
`inquiry_id` int(10) unsigned NOT NULL default '0',
`product_id` int(10) unsigned NOT NULL default '0',
`name` varchar(255) NOT NULL,
`model` varchar(100) NOT NULL,
`price` varchar(100) NOT NULL,
`quantity` varchar(100) NOT NULL,
`page_name` varchar(100),
PRIMARY KEY  (`id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_mail_templates`;
CREATE TABLE `nitc_mail_templates` (
`template_id` tinyint(1) unsigned NOT NULL auto_increment,
`template_code` varchar(30) NOT NULL default '',
`is_html` tinyint(1) unsigned NOT NULL default '0',
`template_subject` varchar(200) NOT NULL default '',
`template_content` text NOT NULL,
`last_modify` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`template_id`),
UNIQUE KEY `template_code` (`template_code`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

INSERT INTO `nitc_mail_templates` (`template_id`, `template_code`, `is_html`, `template_subject`, `template_content`, `last_modify`) VALUES
(1, 'send_password', 1, '找回密码', '{\$user_name}，您好!\r\n\r\n您已经进行了密码重置的操作，请点击以下链接(或者复制到您的浏览器):\r\n\r\n{\$reset_email}\r\n\r\n以确认您的新密码重置操作!\r\n\r\n{\$send_date}', 1248768897),
(2, 'send_inquiry', 1, '咨询信息转发', '咨询主题:{\$subject}\r\n咨询内容:\r\n{\$content}\r\n日期:{\$date_added}\r\n咨询产品:{\$product_name}\r\n公司名:{\$company_name}\r\n联系人:{\$name} {\$sex}\r\n邮箱:{\$email}\r\n电话:{\$tel}\r\n传真:{\$fax}\r\n地址:{\$address}\r\n国家:{\$country}\r\nIP:{\$ip}\r\n网站:{\$website}', 1248848239);

DROP TABLE IF EXISTS `nitc_product`;
CREATE TABLE `nitc_product` (
`product_id` int(10) NOT NULL auto_increment,
`model` varchar(100) NOT NULL,
`product_brand_id` int(10) NOT NULL default '0',
`category_id` int(10) NOT NULL default '0',
`small_image` varchar(100) default NULL,
`big_image` varchar(100) default NULL,
`original_image` varchar(100) default NULL,
`minorder` varchar(255) NOT NULL default '',
`price` varchar(255) NOT NULL default '',
`sort_order` int(10) NOT NULL default '0',
`state` int(1) NOT NULL default '0',
`is_new_product` int(1) NOT NULL default '0',
`is_featured_product` int(1) NOT NULL default '0',
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`viewed` int(5) NOT NULL default '0',
`html_flag` int(3) unsigned NOT NULL default '0',
PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_product_desc`;
CREATE TABLE `nitc_product_desc` (
`product_id` int(10) NOT NULL auto_increment,
`language_id` int(10) NOT NULL default '1',
`name` varchar(255) NOT NULL,
`abstract` text NOT NULL,
`keywords` text,
`meta_title` varchar(255) default NULL,
`meta_keywords` text,
`meta_description` text,
`description` text NOT NULL,
`page_name` varchar(100) default NULL,
`attachment` varchar(100) default NULL,
PRIMARY KEY  (`product_id`,`language_id`),
KEY `name` (`name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_product_image`;
CREATE TABLE `nitc_product_image` (
`product_image_id` int(10) NOT NULL auto_increment,
`product_id` int(10) NOT NULL default '0',
`small_image` varchar(100) NOT NULL default '0',
`big_image` varchar(100) NOT NULL default '0',
`original_image` varchar(100) NOT NULL default '0',
PRIMARY KEY  (`product_image_id`),
KEY `product_id` (`product_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_sessions`;
CREATE TABLE `nitc_sessions` (
`sesskey` varchar(32) NOT NULL,
`expiry` int(10) unsigned NOT NULL,
`userid` mediumint(8) unsigned NOT NULL,
`adminid` mediumint(8) unsigned NOT NULL,
`ip` varchar(15) NOT NULL,
`data` longtext NOT NULL,
PRIMARY KEY  (`sesskey`),
KEY `expiry` (`expiry`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_tags`;
CREATE TABLE `nitc_tags` (
`tag_id` int(20) NOT NULL auto_increment,
`tag` varchar(100) NOT NULL,
`url` varchar(255) NOT NULL,
`sort_order` int(10) NOT NULL default '0',
`language_id` int(10) NOT NULL default '1',
PRIMARY KEY  (`tag_id`),
KEY `keyword` (`tag`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_user`;
CREATE TABLE `nitc_user` (
`user_id` tinyint(3) unsigned NOT NULL auto_increment,
`user_name` varchar(60) NOT NULL,
`password` varchar(32) NOT NULL,
`name` varchar(100) NOT NULL,
`tel` varchar(100) NOT NULL,
`email` varchar(100) NOT NULL,
`permission` text NOT NULL,
`date_added` datetime NOT NULL default '0000-00-00 00:00:00',
`date_modified` datetime NOT NULL default '0000-00-00 00:00:00',
`last_time` datetime NOT NULL default '0000-00-00 00:00:00',
`last_ip` varchar(50) NOT NULL,
PRIMARY KEY  (`user_id`),
KEY `user_name` (`user_name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_cart`;
CREATE TABLE `nitc_cart` (
`rec_id` mediumint(8) unsigned NOT NULL auto_increment,
`session_id` varchar(32) NOT NULL default '',
`product_id` mediumint(8) unsigned NOT NULL default '0',
`model` varchar(60) NOT NULL default '',
`name` varchar(120) NOT NULL default '',
`price` decimal(10,2) unsigned NOT NULL default '0.00',
`quantity` smallint(5) unsigned NOT NULL default '0',
PRIMARY KEY  (`rec_id`),
KEY `session_id` (`session_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

DROP TABLE IF EXISTS `nitc_statistics`;
CREATE TABLE `nitc_statistics` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `referer` varchar(255) NOT NULL default '',
  `pageurl` varchar(255) NOT NULL default '',
  `firsttime` varchar(50) NOT NULL default '',
  `lasttime` varchar(50) default NULL,
  `timezone` varchar(10) default NULL,
  `ip` varchar(50) NOT NULL default '',
  `search_text` varchar(100) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `search_text` (`search_text`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;



DROP TABLE IF EXISTS `nitc_product_brand`;
CREATE TABLE `nitc_product_brand` (
  `product_brand_id` int(11) unsigned NOT NULL auto_increment,
  `logo` varchar(100) default NULL,
  `sort_order` int(11) unsigned NOT NULL default '0',
  `html_flag` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`product_brand_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;


DROP TABLE IF EXISTS `nitc_product_brand_desc`;
CREATE TABLE `nitc_product_brand_desc` (
  `product_brand_id` int(11) NOT NULL auto_increment,
  `language_id` int(11) NOT NULL default '1',
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`product_brand_id`,`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;


DROP TABLE IF EXISTS `nitc_static_url`;
CREATE TABLE `nitc_static_url` (
  `static_url_id` int(11) unsigned NOT NULL auto_increment,
  `action` varchar(30) default NULL,
  `rid` int(11) unsigned default NULL,
  `static_url` varchar(100) default NULL,
  `language_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`static_url_id`)
) ENGINE=MyISAM -MYSQL_CHARSET_CHANGE;

