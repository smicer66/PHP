-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2010 at 12:42 PM
-- Server version: 5.0.85
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `syncstat_church`
--
CREATE DATABASE `syncstat_church` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `syncstat_church`;

-- --------------------------------------------------------

--
-- Table structure for table `cpj_administrator_functions`
--

CREATE TABLE IF NOT EXISTS `cpj_administrator_functions` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `accessLevel` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `equality` varchar(5) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `cpj_administrator_functions`
--

INSERT INTO `cpj_administrator_functions` (`id`, `name`, `accessLevel`, `status`, `equality`, `description`) VALUES
(1, 'admin_functions_tuner', 7, 1, '=', 'Sets user access the various administrative functions'),
(2, 'components_manager', 5, 1, '>=', 'Enables Administrator(s) to manage the components on the portal'),
(3, 'features_manager', 5, 1, '>=', 'Enables Administrator(s) to manage the features on the portal'),
(4, 'template_manager', 5, 1, '>=', 'Enables Administrator(s) to manage the templates on the portal'),
(5, 'architecture_creator', 7, 1, '>=', 'Creates the base/foundation of the church structure.'),
(6, 'architecture_creator_next', 7, 1, '>=', 'Creates the other layers above the base/foundation of the church structure'),
(7, 'architecture_feeder', 5, 1, '>=', 'Feeds the various churches into the different layers'),
(8, 'architecture_updater', 7, 1, '>=', 'Enables the different tiers/layers of the church structure to be updated'),
(9, 'header_updater', 7, 1, '>=', 'Enables the different banners uploaded on the portal to be managed'),
(10, 'header_upload', 5, 1, '>=', 'Enables additional banners to be uploaded. To upload efficiently, ensure that the banners are split into various parts and then uploaded serially to enable fast loading of banners'),
(11, 'images_uploader', 5, 1, '>=', 'Enables images to be uploaded into the general images folder for easy access from the pool of images'),
(12, 'menu_creator', 5, 1, '>=', 'Enables Menus to be created efficiently'),
(13, 'menu_items_inserter', 5, 1, '>=', 'Enables the various menu entries to be inserted appropriately'),
(14, 'menu_mapper', 5, 1, '>=', 'Maps the menus to the features appropriately'),
(15, 'menu_updater', 5, 1, '>=', 'Manages the different menus created on the portal.'),
(16, 'position_creator', 5, 1, '>=', 'Used to create positions for placement of features on the page.'),
(17, 'position_updater', 5, 1, '>=', 'Manages the different positions created which are used for feature placement on the portal.'),
(18, 'site_updater', 5, 1, '>=', 'Manages the site configuration/details'),
(19, 'features_tuner', 7, 1, '>=', 'Manages the features on the portal such as position on the page where each feature will appear'),
(20, 'advertisement_creator', 5, 1, '>=', 'Used to create advertisement. Advertisement are of two types: Images, and HTML format.'),
(21, 'advertisement_update', 5, 1, '>=', 'Manages advertisements that have been created.'),
(22, 'announcement_creator', 5, 1, '>=', 'Used to create Announcements.'),
(23, 'announcement_display', 7, 1, '>=', 'Manages the display of Announcement'),
(24, 'announcement_update', 5, 1, '>=', 'Manages Announcements that have been created.'),
(25, 'article_type_creator', 5, 1, '>=', 'Enables the different types of Article Categories to be created'),
(26, 'articles_creator', 5, 1, '>=', 'Enables articles to be created.'),
(33, 'articles_creator1', 7, 0, '>=', ''),
(34, 'articles_types_update', 5, 1, '>=', 'Enables the different categories of articles to be updated'),
(35, 'articles_update', 5, 1, '>=', 'Enables the various articles uploaded to updated'),
(36, 'blog_creator', 5, 1, '>=', 'Used to create blogs'),
(37, 'blog_posts_update', 5, 1, '>=', 'Enables the various blog posts entries to be updated.'),
(38, 'blog_updater', 5, 1, '>=', 'Enables the blog page to be updated'),
(39, 'contact_creator1', 5, 1, '>=', ''),
(40, 'contact_creator', 5, 1, '>=', 'Enables the contact page for the different tiers of the church to created'),
(41, 'contact_update', 5, 1, '>=', 'Enables the various contact information entries to updated.'),
(42, 'desk_creator', 5, 1, '>=', 'Enables pastors to be able to post messages to the portal.'),
(43, 'desk_update', 5, 1, '>=', 'Enables the various entries on the desk feature to be updated.'),
(44, 'devotional_create', 5, 1, '>=', 'Enables devotionals to be created on the portal.'),
(45, 'blogs_update', 5, 1, '>=', 'Enables the various blogs to have their settings updated.'),
(46, 'devotional_display', 5, 1, '>=', 'Enables the Devotional page display to be configured'),
(47, 'devotionals_update', 5, 1, '>=', 'Updates the various devotionals on the portal'),
(48, 'event_creator', 5, 1, '>=', 'Enables events to be created'),
(49, 'events_display', 7, 1, '>=', 'Enables the events display to be configured'),
(50, 'events_update', 5, 1, '>=', 'Enables the different events entries to be updated'),
(51, 'group_creator', 5, 1, '>=', 'Creates groups on the portal'),
(52, 'groups_update', 5, 1, '>=', 'Update on the various groups are handled here.'),
(53, 'media_creator', 5, 1, '>=', 'Adds media content to the media feature.'),
(54, 'media_update', 5, 1, '>=', 'Updates on the media contents are done here!'),
(55, 'news_creator', 5, 1, '>=', 'Creates news.'),
(56, 'news_display', 5, 1, '>=', 'Enables the display of news feature to be performed'),
(57, 'news_update', 7, 1, '>=', 'Update on news entries are performed here.'),
(58, 'newsletter_creator', 5, 1, '>=', 'Creates newsletters on the portal.'),
(59, 'newsletter_sender', 5, 1, '>=', 'Send Newsletters Using this platform'),
(60, 'newsletter_update', 5, 1, '>=', 'Make updates to the various newsletters'),
(61, 'prayer_display', 5, 1, '>=', 'Manage the display of prayers page on the portal'),
(62, 'prayer_request_update', 5, 1, '>=', 'Enables the various prayer requests to be viewed.'),
(63, 'prayers_creator', 5, 1, '>=', 'Create prayers page for display on the portal'),
(64, 'prayers_update', 5, 1, '>=', 'Make updates to the different prayers pages entries on the portal'),
(65, 'search_modifier', 7, 1, '>=', 'Enables administrator define which features can be searched for during search operation.'),
(66, 'section_creator', 5, 1, '>=', 'Enables the webpage contents of the different church entries to be inputted.'),
(67, 'section_update', 5, 1, '>=', 'Makes updates to the different sections that have been created'),
(68, 'sectionChildUpdate', 5, 1, '>=', 'Makes updates to the different entries of the sections on the portal'),
(69, 'shop_creator', 5, 1, '>=', 'Creates shop page for display of the shop feature'),
(70, 'shop_item_entry', 5, 1, '>=', 'Enables items for sale on the shop to be inputted'),
(71, 'shop_settings', 5, 1, '>=', 'Handles the settings of the shop.'),
(72, 'shop_update', 5, 1, '>=', 'Makes update on the shop item entries'),
(73, 'user_creator', 5, 1, '>=', 'Used to create users on the portal by the administrator'),
(74, 'user_display', 5, 1, '>=', 'Manages the display of the user profile for each user'),
(75, 'user_email_creator', 5, 1, '>=', 'Enables email  to be created for any of the registered users on the portal.'),
(76, 'user_type_creator', 5, 1, '>=', 'Creates a user-type such as administrator, pastor etc.'),
(77, 'user_update', 5, 1, '>=', 'Lists all the registered users on the portal, enabling the users to be updated'),
(78, 'usertype_update', 5, 1, '>=', 'Update on the usertypes'),
(79, 'template_installer', 5, 1, '>=', 'Install/Add templates to the portal'),
(80, 'template_updater', 5, 1, '>=', 'Update the templates on the portal.'),
(81, 'footer_creator', 7, 1, '>=', 'Creates footer content for the site'),
(82, 'footer_updater', 7, 1, '>=', 'Manages the various footer entries '),
(83, 'portlet_creator', 7, 1, '>=', 'Creates portlet holder on the portal page'),
(84, 'portlet_update', 7, 1, '>=', 'Manages the various portlets created on the portal'),
(85, 'churchpositions_creator', 7, 1, '>=', 'Creates various positions of authority in the church'),
(86, 'churchpositions_updater', 7, 1, '>=', 'Manages the various positions of authority in the church created on the portal'),
(87, 'error_update', 7, 1, '>=', 'Manages the different error messages in the portal system'),
(88, 'error_updater', 7, 1, '>=', 'Edits the different error messages based on error message selected'),
(89, 'donations_creator', 7, 1, '>=', 'Creates various donation medium for the church'),
(90, 'donations_update', 7, 1, '>=', 'Manages the various donation medium of the church created on the portal'),
(91, 'fpss_creator', 7, 1, '>=', 'Creates Slide Show'),
(92, 'frontpageslideshow_update', 7, 1, '>=', 'Updates of the various slideshows created on the portal are done here.'),
(93, 'group_members', 5, 1, '>=', 'Lists all the group members of a selected group'),
(94, 'group_update', 7, 1, '>=', 'Enables update of group such as frontpage and group contents.'),
(95, 'prayer_need_creator', 7, 1, '>=', 'Adds Prayer Needs to the list already existing'),
(96, 'site_map_creator', 7, 1, '>=', 'Adds links to the site map'),
(97, 'prayer_need_update', 7, 1, '>=', 'Enables update of prayer needs in the system'),
(98, 'site_map_update', 7, 1, '>=', 'Enables update of Links on site map'),
(99, 'configuration_manager', 7, 1, '>=', 'Handles configurations and site settings'),
(100, 'prayers_needs_update', 7, 1, '>=', 'Updates Prayer needs!'),
(101, 'menu_mapper_edit', 5, 1, '>=', 'Edits Menus mapped'),
(102, 'subscriptions_creator', 5, 1, '>=', 'Creates different subscriptions users can subscribe for'),
(103, 'subscriptions_update', 5, 1, '>=', 'Updates subscriptions'),
(104, 'subscriptions_sender', 5, 1, '>=', 'Sends Subscriptions'),
(105, 'schools_creator', 5, 1, '>=', 'Creates Schools'),
(106, 'schools_update', 5, 1, '>=', 'Updates schools in portal'),
(107, 'school_fees', 5, 1, '>=', 'Displays a log of school fees paid'),
(108, 'schools_level_creator', 5, 1, '>=', 'Creates students Levels.'),
(109, 'schools_level_update', 5, 1, '>=', 'Updates list of students levels.'),
(110, 'template_mapper', 5, 1, '>=', 'Maps features to templates'),
(111, 'paypal_settings', 7, 1, '>=', 'Payment Settings for Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_advertisement`
--

CREATE TABLE IF NOT EXISTS `cpj_advertisement` (
  `id` int(11) NOT NULL auto_increment,
  `imageYes` tinyint(4) NOT NULL,
  `section` int(100) NOT NULL,
  `sectionId` int(11) default NULL,
  `contentsHTML` text NOT NULL,
  `contentsNoHTML` text NOT NULL,
  `fpYes` tinyint(4) NOT NULL,
  `fileId` int(11) default NULL,
  `status` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `showYes` tinyint(4) NOT NULL,
  `linkToFeatureId` int(11) NOT NULL,
  `linkToFeatureChildId` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cpj_advertisement`
--

INSERT INTO `cpj_advertisement` (`id`, `imageYes`, `section`, `sectionId`, `contentsHTML`, `contentsNoHTML`, `fpYes`, `fileId`, `status`, `name`, `showYes`, `linkToFeatureId`, `linkToFeatureChildId`) VALUES
(13, 0, 1, 0, '<table style="width: 702px; height: 71px;" border="0" bgcolor="#d4d0c8">\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'rrttv &nbsp;\r\n\r\n\r\n', 1, 65, 1, 'lksds', 0, 0, 0),
(14, 1, 4, 1, '', '', 1, 55, 1, 'Fire Conference', 0, 0, 0),
(15, 1, 1, 0, '', '', 1, 77, 1, 'Media Week', 1, 0, 0),
(17, 0, 1, 0, '<p>Try next lane1</p>', 'Try next lane1', 1, 0, 1, 'Try next lane', 0, 8, 1),
(18, 1, 1, 0, 'dsadsd sdsd', 'dsadsd sdsd', 0, 352, 1, 'A32', 0, 2, 1),
(19, 0, 1, 0, '<p>this is an advert trial</p>', 'this is an advert trial', 0, 0, 1, 'Advert''1kilsd"dsdjsd`ds ', 0, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_announcement`
--

CREATE TABLE IF NOT EXISTS `cpj_announcement` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '1',
  `body` text NOT NULL,
  `date` text NOT NULL,
  `pictureId` int(11) NOT NULL,
  `publishedYes` tinyint(1) NOT NULL default '1',
  `status` tinyint(1) NOT NULL default '1',
  `section` varchar(100) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `expiryDate` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cpj_announcement`
--

INSERT INTO `cpj_announcement` (`id`, `title`, `frontPageYes`, `body`, `date`, `pictureId`, `publishedYes`, `status`, `section`, `sectionId`, `expiryDate`) VALUES
(1, 'Home Coming', 1, 'e', 'f', 37, 1, 1, '4', 1, '17-Jun-2009'),
(2, 'd1', 1, 'e1', 'f1', 37, 1, 1, '0', 0, '17-Jun-2009'),
(3, 'a', 0, 'b', 'c', 234, 1, 1, '0', 1, '2009-11-05'),
(4, 'A1', 1, 'Hey! There', 'asas dsds', 250, 1, 0, '1', 0, '2009-11-18'),
(5, 'A2', 0, 'sdsd', 'sdsd', 0, 1, 1, '1', 0, '2009-11-26'),
(6, 'jesus is lord', 1, 'our father', '23/10/2009', 0, 1, 1, '2', 28, '2009-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_area`
--

CREATE TABLE IF NOT EXISTS `cpj_area` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentNodeId` int(11) default NULL,
  `information` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cpj_area`
--

INSERT INTO `cpj_area` (`id`, `name`, `parentNodeId`, `information`, `status`) VALUES
(1, 'Awka', 0, '', 1),
(2, 'Bauchi', 0, '', 1),
(3, 'Ikono', 0, '', 1),
(4, 'Kano', 0, '', 1),
(5, 'Obubra', 0, '', 1),
(6, 'Otukpo', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_articles`
--

CREATE TABLE IF NOT EXISTS `cpj_articles` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `frontPageContents` text NOT NULL,
  `articleTypeId` int(11) NOT NULL,
  `contents` text NOT NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `frontPageContentsNoHtml` text NOT NULL,
  `contentsNoHtml` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `section` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cpj_articles`
--

INSERT INTO `cpj_articles` (`id`, `name`, `frontPageContents`, `articleTypeId`, `contents`, `frontPageYes`, `sectionId`, `frontPageContentsNoHtml`, `contentsNoHtml`, `status`, `section`) VALUES
(1, 'We are Here', '<span>God Will Supply Your Need</span>\r\n<br><img title="" height="107" alt="" hspace="7" src="../../images/284242SDC.jpg" width="112" align="left" vspace="7" border="0" />By Morris Cerullo</p>\r\n<p>Regardless of the conditions you face, as the world''s economy continues to crumble around you, you do not need to be fearful! " (Psalm 37:18-19)...\r\n', 2, '<table style="width: 59%;" border="0" cellspacing="0" cellpadding="5">\r\n<tbody>\r\n<tr>\r\n<td><img src="../../images/284242SDC.jpg" alt="" hspace="12" width="87" height="87" align="left" />we are here because of you and the people of the state</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 'we are here because of you and the people of the state', 'we are here because of you and the people of the state', 1, 1),
(2, 'They are Here', '<table style="width: 59%;" border="0" cellspacing="0" cellpadding="5">\r\n<tbody>\r\n<tr>\r\n<td><img src="file:///C|/wamp/www/churchPortal/images/284242SDC.jpg" alt="" hspace="12" width="87" height="87" align="left" />we are here because of you and the people of the state</td>\r\n</tr>\r\n</tbody>\r\n</table>', 2, '<table style="width: 59%;" border="0" cellspacing="0" cellpadding="5">\r\n<tbody>\r\n<tr>\r\n<td><img src="file:///C|/wamp/www/churchPortal/images/284242SDC.jpg" alt="" hspace="12" width="87" height="87" align="left" />we are here because of you and the people of the state</td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, 0, '', '', 1, 1),
(3, 'Evangel Theological Seminary Jos', '<p>Register and take a course in one of our various theological institutions scattered all over the country. To find a theological school click on the link below.</p>', 3, '<p>Register and take a course in one of our various theological institutions scattered all over the country. A list of the various schools include:<br /><br /></p>\r\n<ul>\r\n<li>Evangel Theological Seminary Jos</li>\r\n<li>Assemblies of God Divinity School Umuahia</li>\r\n<li>Nigeria Advanced School of theology Ewu</li>\r\n<li>Assemblies of God seminary</li>\r\n<li>South West Advanced School of Theology</li>\r\n<li>Rivers Bible College Port Harcourt</li>\r\n<li>Northern Nigeria Bible College, Jos</li>\r\n<li>Assemblies of God Bible College Uyo</li>\r\n<li>Bethel Bible College</li>\r\n<li>North East Bible School, Demsa</li>\r\n<li>Lay, Preacher Training Institute, Enugu</li>\r\n</ul>\r\n<p>To view Courses, click <a href="#">here</a></p>\r\n<ul>\r\n</ul>\r\n<p>To view lecturers profile, click <a href="#">here</a></p>\r\n<ul>\r\n</ul>', 0, 0, 'Register and take a course in one of our various theological institutions scattered all over the country. To find a theological school click on the link below.', 'Register and take a course in one of our various theological institutions scattered all over the country. A list of the various schools include:\r\n\r\nEvangel Theological Seminary Jos\r\nAssemblies of God Divinity School Umuahia\r\nNigeria Advanced School of theology Ewu\r\nAssemblies of God seminary\r\nSouth West Advanced School of Theology\r\nRivers Bible College Port Harcourt\r\nNorthern Nigeria Bible College, Jos\r\nAssemblies of God Bible College Uyo\r\nBethel Bible College\r\nNorth East Bible School, Demsa\r\nLay, Preacher Training Institute, Enugu\r\n\r\nTo view Courses, click here\r\n\r\n\r\nTo view lecturers profile, click here\r\n\r\n', 1, 1),
(5, 'Projects', '<p><img id="agnewsheadlinesheader" title="Directorate Projects" src="http://www.agnigeria.com/departments/directorate_corporate_planning/corporate_images/dprojectsbar.jpg" alt="Directorate Projects" width="636" height="21" /></p>\r\n<div id="internationalNews">\r\n<p>The General Council of Assemblies of God Nigeria is embarking on the following projects in the year 2010.</p>\r\n<ul>\r\n<li><a href="http://www.agnigeria.com/departments/directorate_corporate_planning/projects.php#EHA">Evangel House Annex</a></li>\r\n<li><a href="http://www.agnigeria.com/departments/directorate_corporate_planning/projects.php#DM">Digital Mapping</a></li>\r\n<li><a href="http://www.agnigeria.com/departments/directorate_corporate_planning/projects.php#ITD">Information Technology Development</a></li>\r\n</ul>\r\n</div>', 4, '<p><a name="EHA"><img id="agnewsheadlinesheader" title="Evangel House Annex" src="http://www.agnigeria.com/departments/directorate_corporate_planning/corporate_images/ehabar.jpg" alt="Evangel House Annexs" width="636" height="21" /></a></p>\r\n<p>The Evangel House Annex is a three building complex, which will be an extension of the currently existing General Council Secretariat.&nbsp; The complex will contain the Office of the General Superintendent, the Offices of the Evangel Corporate Ministries, the Evangel Digital Communications Centre, and the Evangel Resort, which will be a set of residential quarters. The Project is expected to kick off in March 2004 and will run until September 2004.</p>\r\n<p><a name="DM"><img id="agnewsheadlinesheader" title="Digital Mapping" src="http://www.agnigeria.com/departments/directorate_corporate_planning/corporate_images/dmbar.jpg" alt="Digital Mapping" width="636" height="21" /></a></p>\r\n<p>The aim of this project is to produce a fully digital map of the entire country, complete with information on the extent of evangelistic and missionary work in Nigeria. The Map will highlight all the Autonomous Communities, Peoples Groups and Local Government Areas indicating where Church-planting and evangelistic activities have been carried out and also where more work needs to be done.</p>\r\n<p>&nbsp; <a name="ITD"><img id="agnewsheadlinesheader" title="Information Technology Development" src="http://www.agnigeria.com/departments/directorate_corporate_planning/corporate_images/itbar.jpg" alt="Information Technology Development" width="636" height="21" /></a></p>\r\n<p>The National Church is in need for an efficient Information Technology Backbone, which will be centred around five major objectives:</p>\r\n<ul>\r\n<li>Information Management</li>\r\n<li>Communication Management</li>\r\n<li>World Evangelization</li>\r\n<li>Education and Capacity Building</li>\r\n<li>Fund Generation</li>\r\n</ul>\r\n<p><br /><br /></p>\r\n<div id="itDevChart">\r\n<p>The project is broken into four phases:</p>\r\n<img title="Information Technology Development Chart" src="http://www.agnigeria.com/departments/directorate_corporate_planning/corporate_images/itdevelopmentchart.jpg" alt="Information Technology Development Chart" width="508" height="223" /></div>\r\n<p>&nbsp;</p>\r\n<p>The Project will begin in January 2004 and is expected to last for a period of ten years</p>', 1, 0, '\r\n\r\nThe General Council of Assemblies of God Nigeria is embarking on the following projects in the year 2010.\r\n\r\nEvangel House Annex\r\nDigital Mapping\r\nInformation Technology Development\r\n\r\n', '\r\nThe Evangel House Annex is a three building complex, which will be an extension of the currently existing General Council Secretariat.&nbsp; The complex will contain the Office of the General Superintendent, the Offices of the Evangel Corporate Ministries, the Evangel Digital Communications Centre, and the Evangel Resort, which will be a set of residential quarters. The Project is expected to kick off in March 2004 and will run until September 2004.\r\n\r\nThe aim of this project is to produce a fully digital map of the entire country, complete with information on the extent of evangelistic and missionary work in Nigeria. The Map will highlight all the Autonomous Communities, Peoples Groups and Local Government Areas indicating where Church-planting and evangelistic activities have been carried out and also where more work needs to be done.\r\n&nbsp; \r\nThe National Church is in need for an efficient Information Technology Backbone, which will be centred around five major objectives:\r\n\r\nInformation Management\r\nCommunication Management\r\nWorld Evangelization\r\nEducation and Capacity Building\r\nFund Generation\r\n\r\n\r\n\r\nThe project is broken into four phases:\r\n\r\n&nbsp;\r\nThe Project will begin in January 2004 and is expected to last for a period of ten years', 1, 1),
(6, 'Our History', '<p>The Assemblies of God Nigeria was born through a bold, faith-inspired decision by individuals who were obedient to the leading of the Holy Spirit. Today, that simple step in obedience has blossomed into a ministry that has touched millions of lives with the glorious gospel of Jesus Christ and through the powerful working of the Holy Spirit.<em> </em></p>', 5, '<h1>Our History</h1>\r\n<!-- beginning spiritual-help-scripture-quotes -->\r\n<div>\r\n<div>\r\n<div>\r\n<blockquote>\r\n<p><em>The Assemblies of God Nigeria was born through a bold, faith-inspired decision by individuals who were obedient to the leading of the Holy Spirit. Today, that simple step in obedience has blossomed into a ministry that has touched millions of lives with the glorious gospel of Jesus Christ and through the powerful working of the Holy Spirit. </em></p>\r\n</blockquote>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end spiritual-help-scripture-quotes -->\r\n<h2>In The Beginning...</h2>\r\n<dl><dt>(June 1930) </dt><dd>Brother Augustus Ehurie Wogu, an illustrious son of Old Umuahia, then a civil servant with the Nigerian Marine Department, is converted to the Christian faith. With his new found faith in Christ Jesus, he leaves the Anglican Church for the Faith Tabernacle Church. </dd><dt>(January 1931) </dt><dd>Based on the wonderful testimony and ministry of Brother Augustus Wogu, several other people are converted into the Christian faith. These include George M. Alioha, (later a Reverend Minister). From Brother Alioha''s witness, Abel Nwoji, James Nwoji, Wilfred Woko, Augustus Asonye, Godwin Akwarandu, Ebenezer Eborgu (all later Ministers of the Gospel), and many others are converted into the Christian faith, all under the Faith Tabernacle Church. </dd><dt>(August 1934) </dt><dd>The brethren, fresh with zeal for the Lord, and deep into the scriptures, discover the promise of the Holy Spirit meant for all who believe in Jesus Christ as written in Acts 2:39. However, the doctrine of the baptism in the Holy Spirit with evidence of speaking in tongues, is rejected by the Faith Tabernacle Church and this leads to the ejection of the brethren from the Faith Tabernacle Church. With the ejection, a new church - "The Church of Jesus Christ" is born, with Reverend Augustus Asonye as the first Pastor and Reverend George M. Alioha as the pioneer Overseer. Churches are opened in Old Umuahia and Port Harcourt. </dd><dt>(June 1939) </dt><dd>Reverend W.L. Shirer and his wife, US Assemblies of God foreign missionaries to then Gold Coast (Ghana) make their first historic visit to Nigeria, upon visitation to assess the situation of the young Church. </dd><dt>(September 1939) </dt><dd>First General Council held; Brethren accept the doctrines of the Assemblies of God, especially as pertaining to the Holy Spirit. A new name now emerges for the Church - Assemblies of God Mission in Nigeria. Reverend Shirer becomes first District Superintendent. Port Harcourt brethren filled with the Holy Spirit, Matthew O. Ezeigbo, later the pioneer General Superintendent, is converted at Enugu. </dd><dt>(February 1940) </dt><dd>First official resident Missionaries - Reverend and Mrs. Everett L. Phillips (and their son Donald), arrive Nigeria, replacing Reverend and Mrs. Shirer, who return to Ghana, their original place of assignment. A Bible School is opened at Old Umuahia.\r\n<h2>Early Years</h2>\r\n</dd><dt>(1941 - 1943) </dt><dd>The pioneer work was geared up and this period witnessed the conversion of Gabriel O. Oyakhilome, then a civil servant with the Governor''s Office in Enugu. Oyakhilome then pioneered the work at Ewu in the then Bendel State of Nigeria, became the first Supervisor of Mid-Western Area, and later the first District Superintendent. </dd><dt>(1944 - 1950) </dt><dd>Missionary work spread to the Igedes in Benue State, mostly as a result of migration by traders from the Ibo members of the Church. From here, the gospel spread to Kafanchan in the North and Ogoja in the South East. Also during this period, the Mid-Western Bible Institute was founded. </dd><dt>(1951 - 1954) </dt><dd>During these years, Reverend M.O. Ezeigbo and his wife pioneered the work in the Abakaliki axis. Reverend Ezeigbo was then appointed Area Supervisor of Northern Igboland Area, and later moved to Ohabiam, Imo State. Also during this period, the Northern Bible Institute in Saminaka was founded by Ralph C. Cobb. </dd><dt>(1955 - 1957) </dt><dd>Pioneer work began in Lagos within this period primarily due to the efforts of Reverends J. Ohiagbara, U.M. Okpo, and J.U. Omereonye while Reverend Ward Wood, a Missionary, pioneered the work in Ibadan. Reverend Glenn Reeves and wife, arrived as missionaries and resided at Uyo. From there, they pioneered the work in the then Calabar Administrative Division, which spans the present Cross River and Akwa Ibom States. </dd><dt>(1958 - 1965) </dt><dd>Much work was carried out during this period especially in the Western Region of Nigeria, which is predominantly Yoruba. This was achieved mostly through the evangelistic efforts of some brethren, most notably Reverend Israel Ajayi Shofile, who strengthened the indigenous missionary effort in the Western Region. During this era, Bible Schools sprang up at Iperu in the West, Saminaka in the North, and Ogoja in the East. Also this period saw the establishment of the Church''s first secular educational institution, Evangel High School, Old Umuahia. </dd><dt>(1966 - 1968) </dt><dd>During this pre-Civil War Period, Reverend M.O. Ezeigbo was elected the first General Superintendent, with Reverend Gabriel O. Oyakhilome as his assistant. This period recorded tremendous growth for the Church as the Church recorded a total of 560 churches, 479 Pastors, 50,057 members and adherents, with about 25 foreign missionaries.\r\n<h2>Civil War Era</h2>\r\n</dd><dt>(1968 - 1970) </dt><dd>The Nigerian Civil War disrupted evangelistic expansions, as foreigners living in Nigeria, particularly the brethren of Ibo Extraction returned home. While home churches in Eastern Nigeria swelled, the Churches in Northern and Western Nigeria shriveled.<br />Describing the situation in the West, Reverend Glenn Reeves, then Western Area Supervisor reported (in 1967):"Many of our brethren have returned to their native homes. Our average church attendance has dropped by 60%. For quite some time, we have had only three Pastors for 14 congregations"&nbsp;(19th General Council Report, March 1967).<br />From the North, Reverend Harry Shumway, then Northern District Superintendent, also reported: "There have been both losses and victories in the Northern District during the past year. Six of our township churches were closed and the buildings destroyed. With the exception of Kano Church, these have all been re-opened and now record an attendance of 20... All these have been repaired. The Kafanchan section has suffered a great loss in both the Kafanchan and Lafia Township Churches due to the return of members to the East."&nbsp;<br />As at this period, only 70 Pastors were left in the whole of the North to continue the work. During this period, some Missionaries left the Country. There was also a drop in financial support according to Reverend Shumway''s Report: "All Make-Up Pastors'' Salaries from the Sectional tithe have been stopped since August 1966. This financial crisis has made the whole work in the North more difficult." The situation however was different in the East, although towards the end of 1969, most churches had been closed down and members fled for refuge in neighboring towns. No known accurate growth records were kept.&nbsp;<br />In spite of the setbacks the Church faced during the Civil War, a great revival swept across the Church at the end of the Civil War. War survivors who pledged to serve God if kept alive, fulfilled their promises; Backsliders were restored, the scattered flock returned and the shepherds resumed duty.&nbsp;\r\n<h2>After the Civil War...</h2>\r\n<br /></dd><dt>(1971 - 1975) </dt><dd>As the revival fire was burning with the Government''s programme of Reconciliation, Rehabilitation, and Reconstruction, brethren from the East returned back to the West, North and other parts of the country. Reverend Gabriel O. Oyakhilome was elected General Superintendent. This period was a crucial period of rebuilding for the Church. </dd><dt>(1975 - 1985) </dt><dd>This period witnessed some glorious as well as trying moments for the Church. Operation Counterpart Evangelism (OCE), an evangelistic Programme aimed at getting everyone to win one other, was launched. Results were tremendous and from all indications, the Programme was a huge success. As a direct outcome of this Programme, a total of 14,200 souls were reported saved and the Church membership swelled to 125,798 by the end of 1976.<br />Another landmark Programme that characterized this era was the Operation Teach the People Programme (OTP), which was launched to complement Operation Counterpart Evangelism. According to Reverend Israel A. Shofile, then Western Area Supervisor,"The OCE has given birth to OTP...The OTP has proven to be God''s will and a blessing to both the Pastors and Members. We really thank the Lord for the OTP Programme." This period also witnessed the first executive participation of the Assemblies of God leadership in International Conferences and Meetings. </dd><dt>(1985 - 1989) </dt><dd>Towards the beginning of this period, the Church went through some trying moments, which threatened its very existence, but the Lord gave victory to His people and the Church bounced back and waxed stronger. In 1988, a new administration headed by Reverend Charles Osueke as General Superintendent, came into being. In 1989, the National Church celebrated its Golden Jubilee at in colorful ceremony attended by United States Assemblies of God Executive Committee delegation led by its then General Superintendent.<br />A transition from the 1st and 2nd generation leadership was giving way for the 3rd Generation. Rev Dr E A E Umoh then combined the role of the General Secretary and Treasurer until after the first tenure of the new administration. Rev Umoh retired later. </dd><dt>(1990 - 2000) </dt><dd>The Church began to grow. A National Secretariat was acquired at Coal City of Enugu. When Rev Umoh retired, the national leadership and the operations of the Church was restructured to reflect the growing trend. Among key changes were the election of the full time Assistant General Superintendent, Rev Franklin Ukomah, along other Executives - Rev John Ikoni - General Secretary and Rev Deme Bot - General Treasurer. The Lord then set out to heal all the wounds that had plagued the Church and returned stability within the rank and file of the National Church.&nbsp;Having now put behind her the "dark ages", the Church embarked upon the Decade of Harvest Programme, which was an evangelistic and missionary initiative, aimed at planting a Church in each of the 6,451 autonomous communities strategic enough to facilitate the evangelization of all the 9,000 autonomous communities in Nigeria. This programme lasted a full decade and also saw a launch into foreign missions that yielded fruitful results. The Decade of Harvest was officially concluded in November 2000 at a National Convention tagged Hosanna 2000, which held at the Evangel Camp. Among those who facilitated the Decade of Harvest in Nigeria were Rev Charles Osueke, the General Superintendent, Rev Dr Chukwuma Iroezi,who served as Taskforce Chairman (1988-1993); Rev UcheChukwu Ama who was in charge of Research and Planning (1988-2000) as well as the Secretary to the Joint Action Committee (JAC) and Taskforce (1988-1993) of the DOH and Rev Samuel Asiedu who later served as its Executive Secretary (1994-2000). In 1994, the Osueke''s administration received another mandate at the General Council held in Port Harcourt. By 1998 General Council, Rev Dr Deme Bot had retired and Rev Dr Effiong Isangadighi, former District Superintendent of Eket District was elected as the successor.&nbsp; </dd><dt>(2000 &amp; Beyond) </dt><dd>With the challenges of the 21st Century, the Church is re-evaluating its goals and objectives and has taken a number of steps:<br />&nbsp; The leadership has restructured the General Council functions to reflect its new role. In addition to the its administrative and supervisory functions, the Evangel House now serves as the CENTER FOR MINISTRIES for the national Church. The Evangel House (Corporate) Ministries was established in 2003 to facilitate this.<br />&nbsp; The Church administrative units have grown from few Districts and Areas to forty (40) Districts and nineteen (19) Areas, with over 9,000 churches set in order and nearly 9,500 pastors and full time workers. Similarly, Departments have either been merged or restructured to fit into a more strategic function.<br />&nbsp; About nine (9) theological institutions namely - Assemblies of God Divinity School of Nigeria (AGDSN), Old Umuahia, Nigeria Advanced School of Theology (NAST), Ewu and the Evangel Theological Seminary, Jos has been established and upgraded to over first and second degrees. Other Diploma awarding Colleges have also been established and invigorated.<br />&nbsp; The Leadership has established an International Conference Center named EVANGEL CAMP whose Central Hall Capacity will take over 60,000 at a seating.<br />&nbsp; A University is in the pipeline among other things and Strategy Committee has been set up to get it established.<br />&nbsp; A 21st Century Committee headed by Rev Isaac Mpamaugo, the Lagos District Superintendent and a member of the Executive Committee has been constituted to make recommendations on how to overhaul the entire system to fit into the future church. </dd></dl>', 0, 0, 'The Assemblies of God Nigeria was born through a bold, faith-inspired decision by individuals who were obedient to the leading of the Holy Spirit. Today, that simple step in obedience has blossomed into a ministry that has touched millions of lives with the glorious gospel of Jesus Christ and through the powerful working of the Holy Spirit. ', 'Our History\r\n\r\n\r\n\r\n\r\n\r\nThe Assemblies of God Nigeria was born through a bold, faith-inspired decision by individuals who were obedient to the leading of the Holy Spirit. Today, that simple step in obedience has blossomed into a ministry that has touched millions of lives with the glorious gospel of Jesus Christ and through the powerful working of the Holy Spirit. \r\n\r\n\r\n\r\n\r\n\r\nIn The Beginning...\r\n(June 1930) Brother Augustus Ehurie Wogu, an illustrious son of Old Umuahia, then a civil servant with the Nigerian Marine Department, is converted to the Christian faith. With his new found faith in Christ Jesus, he leaves the Anglican Church for the Faith Tabernacle Church. (January 1931) Based on the wonderful testimony and ministry of Brother Augustus Wogu, several other people are converted into the Christian faith. These include George M. Alioha, (later a Reverend Minister). From Brother Alioha''s witness, Abel Nwoji, James Nwoji, Wilfred Woko, Augustus Asonye, Godwin Akwarandu, Ebenezer Eborgu (all later Ministers of the Gospel), and many others are converted into the Christian faith, all under the Faith Tabernacle Church. (August 1934) The brethren, fresh with zeal for the Lord, and deep into the scriptures, discover the promise of the Holy Spirit meant for all who believe in Jesus Christ as written in Acts 2:39. However, the doctrine of the baptism in the Holy Spirit with evidence of speaking in tongues, is rejected by the Faith Tabernacle Church and this leads to the ejection of the brethren from the Faith Tabernacle Church. With the ejection, a new church - "The Church of Jesus Christ" is born, with Reverend Augustus Asonye as the first Pastor and Reverend George M. Alioha as the pioneer Overseer. Churches are opened in Old Umuahia and Port Harcourt. (June 1939) Reverend W.L. Shirer and his wife, US Assemblies of God foreign missionaries to then Gold Coast (Ghana) make their first historic visit to Nigeria, upon visitation to assess the situation of the young Church. (September 1939) First General Council held; Brethren accept the doctrines of the Assemblies of God, especially as pertaining to the Holy Spirit. A new name now emerges for the Church - Assemblies of God Mission in Nigeria. Reverend Shirer becomes first District Superintendent. Port Harcourt brethren filled with the Holy Spirit, Matthew O. Ezeigbo, later the pioneer General Superintendent, is converted at Enugu. (February 1940) First official resident Missionaries - Reverend and Mrs. Everett L. Phillips (and their son Donald), arrive Nigeria, replacing Reverend and Mrs. Shirer, who return to Ghana, their original place of assignment. A Bible School is opened at Old Umuahia.\r\nEarly Years\r\n(1941 - 1943) The pioneer work was geared up and this period witnessed the conversion of Gabriel O. Oyakhilome, then a civil servant with the Governor''s Office in Enugu. Oyakhilome then pioneered the work at Ewu in the then Bendel State of Nigeria, became the first Supervisor of Mid-Western Area, and later the first District Superintendent. (1944 - 1950) Missionary work spread to the Igedes in Benue State, mostly as a result of migration by traders from the Ibo members of the Church. From here, the gospel spread to Kafanchan in the North and Ogoja in the South East. Also during this period, the Mid-Western Bible Institute was founded. (1951 - 1954) During these years, Reverend M.O. Ezeigbo and his wife pioneered the work in the Abakaliki axis. Reverend Ezeigbo was then appointed Area Supervisor of Northern Igboland Area, and later moved to Ohabiam, Imo State. Also during this period, the Northern Bible Institute in Saminaka was founded by Ralph C. Cobb. (1955 - 1957) Pioneer work began in Lagos within this period primarily due to the efforts of Reverends J. Ohiagbara, U.M. Okpo, and J.U. Omereonye while Reverend Ward Wood, a Missionary, pioneered the work in Ibadan. Reverend Glenn Reeves and wife, arrived as missionaries and resided at Uyo. From there, they pioneered the work in the then Calabar Administrative Division, which spans the present Cross River and Akwa Ibom States. (1958 - 1965) Much work was carried out during this period especially in the Western Region of Nigeria, which is predominantly Yoruba. This was achieved mostly through the evangelistic efforts of some brethren, most notably Reverend Israel Ajayi Shofile, who strengthened the indigenous missionary effort in the Western Region. During this era, Bible Schools sprang up at Iperu in the West, Saminaka in the North, and Ogoja in the East. Also this period saw the establishment of the Church''s first secular educational institution, Evangel High School, Old Umuahia. (1966 - 1968) During this pre-Civil War Period, Reverend M.O. Ezeigbo was elected the first General Superintendent, with Reverend Gabriel O. Oyakhilome as his assistant. This period recorded tremendous growth for the Church as the Church recorded a total of 560 churches, 479 Pastors, 50,057 members and adherents, with about 25 foreign missionaries.\r\nCivil War Era\r\n(1968 - 1970) The Nigerian Civil War disrupted evangelistic expansions, as foreigners living in Nigeria, particularly the brethren of Ibo Extraction returned home. While home churches in Eastern Nigeria swelled, the Churches in Northern and Western Nigeria shriveled.Describing the situation in the West, Reverend Glenn Reeves, then Western Area Supervisor reported (in 1967):"Many of our brethren have returned to their native homes. Our average church attendance has dropped by 60%. For quite some time, we have had only three Pastors for 14 congregations"&nbsp;(19th General Council Report, March 1967).From the North, Reverend Harry Shumway, then Northern District Superintendent, also reported: "There have been both losses and victories in the Northern District during the past year. Six of our township churches were closed and the buildings destroyed. With the exception of Kano Church, these have all been re-opened and now record an attendance of 20... All these have been repaired. The Kafanchan section has suffered a great loss in both the Kafanchan and Lafia Township Churches due to the return of members to the East."&nbsp;As at this period, only 70 Pastors were left in the whole of the North to continue the work. During this period, some Missionaries left the Country. There was also a drop in financial support according to Reverend Shumway''s Report: "All Make-Up Pastors'' Salaries from the Sectional tithe have been stopped since August 1966. This financial crisis has made the whole work in the North more difficult." The situation however was different in the East, although towards the end of 1969, most churches had been closed down and members fled for refuge in neighboring towns. No known accurate growth records were kept.&nbsp;In spite of the setbacks the Church faced during the Civil War, a great revival swept across the Church at the end of the Civil War. War survivors who pledged to serve God if kept alive, fulfilled their promises; Backsliders were restored, the scattered flock returned and the shepherds resumed duty.&nbsp;\r\nAfter the Civil War...\r\n(1971 - 1975) As the revival fire was burning with the Government''s programme of Reconciliation, Rehabilitation, and Reconstruction, brethren from the East returned back to the West, North and other parts of the country. Reverend Gabriel O. Oyakhilome was elected General Superintendent. This period was a crucial period of rebuilding for the Church. (1975 - 1985) This period witnessed some glorious as well as trying moments for the Church. Operation Counterpart Evangelism (OCE), an evangelistic Programme aimed at getting everyone to win one other, was launched. Results were tremendous and from all indications, the Programme was a huge success. As a direct outcome of this Programme, a total of 14,200 souls were reported saved and the Church membership swelled to 125,798 by the end of 1976.Another landmark Programme that characterized this era was the Operation Teach the People Programme (OTP), which was launched to complement Operation Counterpart Evangelism. According to Reverend Israel A. Shofile, then Western Area Supervisor,"The OCE has given birth to OTP...The OTP has proven to be God''s will and a blessing to both the Pastors and Members. We really thank the Lord for the OTP Programme." This period also witnessed the first executive participation of the Assemblies of God leadership in International Conferences and Meetings. (1985 - 1989) Towards the beginning of this period, the Church went through some trying moments, which threatened its very existence, but the Lord gave victory to His people and the Church bounced back and waxed stronger. In 1988, a new administration headed by Reverend Charles Osueke as General Superintendent, came into being. In 1989, the National Church celebrated its Golden Jubilee at in colorful ceremony attended by United States Assemblies of God Executive Committee delegation led by its then General Superintendent.A transition from the 1st and 2nd generation leadership was giving way for the 3rd Generation. Rev Dr E A E Umoh then combined the role of the General Secretary and Treasurer until after the first tenure of the new administration. Rev Umoh retired later. (1990 - 2000) The Church began to grow. A National Secretariat was acquired at Coal City of Enugu. When Rev Umoh retired, the national leadership and the operations of the Church was restructured to reflect the growing trend. Among key changes were the election of the full time Assistant General Superintendent, Rev Franklin Ukomah, along other Executives - Rev John Ikoni - General Secretary and Rev Deme Bot - General Treasurer. The Lord then set out to heal all the wounds that had plagued the Church and returned stability within the rank and file of the National Church.&nbsp;Having now put behind her the "dark ages", the Church embarked upon the Decade of Harvest Programme, which was an evangelistic and missionary initiative, aimed at planting a Church in each of the 6,451 autonomous communities strategic enough to facilitate the evangelization of all the 9,000 autonomous communities in Nigeria. This programme lasted a full decade and also saw a launch into foreign missions that yielded fruitful results. The Decade of Harvest was officially concluded in November 2000 at a National Convention tagged Hosanna 2000, which held at the Evangel Camp. Among those who facilitated the Decade of Harvest in Nigeria were Rev Charles Osueke, the General Superintendent, Rev Dr Chukwuma Iroezi,who served as Taskforce Chairman (1988-1993); Rev UcheChukwu Ama who was in charge of Research and Planning (1988-2000) as well as the Secretary to the Joint Action Committee (JAC) and Taskforce (1988-1993) of the DOH and Rev Samuel Asiedu who later served as its Executive Secretary (1994-2000). In 1994, the Osueke''s administration received another mandate at the General Council held in Port Harcourt. By 1998 General Council, Rev Dr Deme Bot had retired and Rev Dr Effiong Isangadighi, former District Superintendent of Eket District was elected as the successor.&nbsp; (2000 &amp; Beyond) With the challenges of the 21st Century, the Church is re-evaluating its goals and objectives and has taken a number of steps:&nbsp; The leadership has restructured the General Council functions to reflect its new role. In addition to the its administrative and supervisory functions, the Evangel House now serves as the CENTER FOR MINISTRIES for the national Church. The Evangel House (Corporate) Ministries was established in 2003 to facilitate this.&nbsp; The Church administrative units have grown from few Districts and Areas to forty (40) Districts and nineteen (19) Areas, with over 9,000 churches set in order and nearly 9,500 pastors and full time workers. Similarly, Departments have either been merged or restructured to fit into a more strategic function.&nbsp; About nine (9) theological institutions namely - Assemblies of God Divinity School of Nigeria (AGDSN), Old Umuahia, Nigeria Advanced School of Theology (NAST), Ewu and the Evangel Theological Seminary, Jos has been established and upgraded to over first and second degrees. Other Diploma awarding Colleges have also been established and invigorated.&nbsp; The Leadership has established an International Conference Center named EVANGEL CAMP whose Central Hall Capacity will take over 60,000 at a seating.&nbsp; A University is in the pipeline among other things and Strategy Committee has been set up to get it established.&nbsp; A 21st Century Committee headed by Rev Isaac Mpamaugo, the Lagos District Superintendent and a member of the Executive Committee has been constituted to make recommendations on how to overhaul the entire system to fit into the future church. ', 1, 1),
(7, 'Our Mission Statement', '<p>The Assemblies of God Nigeria is FOCUSED on Empowering Healthy  Pentecostal Pastors to Grow and Conserve Healthy Pentecostal Churches in the  Power of the Holy Spirit.<em> </em></p>', 5, '<h1>Our Mission Statement</h1>\r\n<!-- beginning spiritual-help-scripture-quotes -->\r\n<div>\r\n<div>\r\n<div>\r\n<blockquote>\r\n<p><em>The Assemblies of God Nigeria is FOCUSED on Empowering Healthy  Pentecostal Pastors to Grow and Conserve Healthy Pentecostal Churches in the  Power of the Holy Spirit. </em></p>\r\n</blockquote>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end spiritual-help-scripture-quotes -->\r\n<p>&nbsp;</p>\r\n<p>The Assemblies of God Nigeria exists to propagate the gospel of Jesus Christ  in Nigeria and beyond by all scriptural means in the power of the Holy Spirit,  to encourage worship of God and promote fellowship among believers; to develop  educational work in so far as seems necessary for the proper growth and  efficiency of the church; and to own, hold in trust, use, sell, convey,  mortgage, lease, or otherwise dispose of&nbsp; such property real or chattel, as may  be needed for the prosecution of its work under God.</p>', 0, 0, 'The Assemblies of God Nigeria is FOCUSED on Empowering Healthy  Pentecostal Pastors to Grow and Conserve Healthy Pentecostal Churches in the  Power of the Holy Spirit. ', 'Our Mission Statement\r\n\r\n\r\n\r\n\r\n\r\nThe Assemblies of God Nigeria is FOCUSED on Empowering Healthy  Pentecostal Pastors to Grow and Conserve Healthy Pentecostal Churches in the  Power of the Holy Spirit. \r\n\r\n\r\n\r\n\r\n\r\n&nbsp;\r\nThe Assemblies of God Nigeria exists to propagate the gospel of Jesus Christ  in Nigeria and beyond by all scriptural means in the power of the Holy Spirit,  to encourage worship of God and promote fellowship among believers; to develop  educational work in so far as seems necessary for the proper growth and  efficiency of the church; and to own, hold in trust, use, sell, convey,  mortgage, lease, or otherwise dispose of&nbsp; such property real or chattel, as may  be needed for the prosecution of its work under God.', 1, 1),
(8, 'Our Core Values', '<p>We believe the local church is the unique and divinely ordained instrument on  earth in God&#65533;s purpose to glorify Himself. We respect, edify, and cooperate with  like-minded churches at home and abroad.</p>', 5, '<h1>Our Core Values</h1>\r\n<!-- beginning spiritual-help-scripture-quotes -->\r\n<div>\r\n<div>\r\n<div>\r\n<blockquote>\r\n<p><em>The Assemblies of God Nigeria is a Purpose-Driven, Value-Based Community. </em></p>\r\n</blockquote>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end spiritual-help-scripture-quotes -->\r\n<p><br />We Value:</p>\r\n<h2>The Church</h2>\r\n<p>We believe the local church is the unique and divinely ordained instrument on  earth in God&#65533;s purpose to glorify Himself. We respect, edify, and cooperate with  like-minded churches at home and abroad.</p>\r\n<h2>The Family</h2>\r\n<p>We are committed to supporting the development and nurture of the family.</p>\r\n<h2>Service</h2>\r\n<p>We are, above all, servants of our Lord Jesus Christ. We give ourselves to  the highest good for our brothers in Christ and the community in which we live.  We are committed to a Christ-like love expressed in all we are and do (Matt.  20:28; Acts 13:36; Gal. 5:13).</p>\r\n<h2>Excellence</h2>\r\n<p>We believe that God of our salvation deserves the best we have to offer. In  our ministries and activities, we will seek to maintain a high standard of  excellence to the glory of God. This will be achieved when every person is  exercising his or her God-given spiritual gift to the best of his or her ability  (1Cor. 12).</p>\r\n<h2>Prayer</h2>\r\n<p>We believe that God desires his people to pray and that he hears and answers  prayer (Matt. 7:7-11; James 5:13-18). Therefore, the ministries and activities  of his church will be characterized by a reliance on prayer in their conception,  planning, and execution.</p>\r\n<h2>People</h2>\r\n<p>God works through people, and each person is unique and vital to God&rsquo;s  plan.</p>\r\n<h2>Relationships</h2>\r\n<p>Building relationships is indispensable to spiritual birth and spiritual  growth.</p>\r\n<h2>World Missions</h2>\r\n<p>We are committed to bring the gospel to the lost by all available means.</p>\r\n<h2>Innovation</h2>\r\n<p>While our message is timeless, our methods adapt to those we are here to  serve.</p>\r\n<h2>Optimism</h2>\r\n<p>&ldquo;All things are possible with God&rdquo; Mark 10:27; Matt. 9:29.</p>\r\n<h2>Teamwork</h2>\r\n<p>&ldquo;Two are better off than one, because together they can work more  effectively&rdquo; Eccles. 4:9; Rom.12:5.</p>\r\n<h2>Feedback</h2>\r\n<p>&ldquo;A fool thinks he needs no advice, but a wise man listens to others&rdquo; Prov.  12:15 LB.... &ldquo;Get the facts at any price&rdquo; Prov. 23:23 LB.</p>\r\n<h2>Informality and Humor</h2>\r\n<p>&ldquo;A relaxed attitude lengthens a man&rsquo;s life&rdquo;. Prov. 14:30 LB. &ldquo;Being cheerful  keeps you healthy. It is slow death&nbsp; to be gloomy all the time&rdquo; Prov. 17:22 GNB.</p>', 0, 0, 'We believe the local church is the unique and divinely ordained instrument on  earth in God&#65533;s purpose to glorify Himself. We respect, edify, and cooperate with  like-minded churches at home and abroad.', 'Our Core Values\r\n\r\n\r\n\r\n\r\n\r\nThe Assemblies of God Nigeria is a Purpose-Driven, Value-Based Community. \r\n\r\n\r\n\r\n\r\n\r\nWe Value:\r\nThe Church\r\nWe believe the local church is the unique and divinely ordained instrument on  earth in God&#65533;s purpose to glorify Himself. We respect, edify, and cooperate with  like-minded churches at home and abroad.\r\nThe Family\r\nWe are committed to supporting the development and nurture of the family.\r\nService\r\nWe are, above all, servants of our Lord Jesus Christ. We give ourselves to  the highest good for our brothers in Christ and the community in which we live.  We are committed to a Christ-like love expressed in all we are and do (Matt.  20:28; Acts 13:36; Gal. 5:13).\r\nExcellence\r\nWe believe that God of our salvation deserves the best we have to offer. In  our ministries and activities, we will seek to maintain a high standard of  excellence to the glory of God. This will be achieved when every person is  exercising his or her God-given spiritual gift to the best of his or her ability  (1Cor. 12).\r\nPrayer\r\nWe believe that God desires his people to pray and that he hears and answers  prayer (Matt. 7:7-11; James 5:13-18). Therefore, the ministries and activities  of his church will be characterized by a reliance on prayer in their conception,  planning, and execution.\r\nPeople\r\nGod works through people, and each person is unique and vital to God&rsquo;s  plan.\r\nRelationships\r\nBuilding relationships is indispensable to spiritual birth and spiritual  growth.\r\nWorld Missions\r\nWe are committed to bring the gospel to the lost by all available means.\r\nInnovation\r\nWhile our message is timeless, our methods adapt to those we are here to  serve.\r\nOptimism\r\n&ldquo;All things are possible with God&rdquo; Mark 10:27; Matt. 9:29.\r\nTeamwork\r\n&ldquo;Two are better off than one, because together they can work more  effectively&rdquo; Eccles. 4:9; Rom.12:5.\r\nFeedback\r\n&ldquo;A fool thinks he needs no advice, but a wise man listens to others&rdquo; Prov.  12:15 LB.... &ldquo;Get the facts at any price&rdquo; Prov. 23:23 LB.\r\nInformality and Humor\r\n&ldquo;A relaxed attitude lengthens a man&rsquo;s life&rdquo;. Prov. 14:30 LB. &ldquo;Being cheerful  keeps you healthy. It is slow death&nbsp; to be gloomy all the time&rdquo; Prov. 17:22 GNB.', 1, 1);
INSERT INTO `cpj_articles` (`id`, `name`, `frontPageContents`, `articleTypeId`, `contents`, `frontPageYes`, `sectionId`, `frontPageContentsNoHtml`, `contentsNoHtml`, `status`, `section`) VALUES
(9, 'Statement of Faith', '<p>God gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God`s Word, the Bible is Spirit and therefore higher than a natural man`s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)</p>', 5, '<h1>Our Beliefs</h1>\r\n<!-- beginning spiritual-help-scripture-quotes -->\r\n<div>\r\n<div>\r\n<div>\r\n<blockquote>\r\n<p><em>The Assemblies of God Nigeria accepts the INFALLIBLE, FLAWLESS and AUTHENTIC WORD OF GOD - the Bible (Holy Scriptures) as its FINAL AUTHORITY! </em></p>\r\n</blockquote>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end spiritual-help-scripture-quotes -->\r\n<h2>We believe that The Bible is God`s Word</h2>\r\n<p>God gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God`s Word, the Bible is Spirit and therefore higher than a natural man`s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)</p>\r\n<h2>We believe in the one true and living God</h2>\r\n<p>There is one true and living God (Deut. 6:4). He loves all people and wishes to have them as His children (John 3:16). God is all-powerful, knows everything, and is everywhere present. God wishes for us to graduate from a mere superficial knowledge of Him into a personal relationship through His son Jesus Christ.</p>\r\n<h2>We believe that the natural man is separated from God and there is only one way back to God&nbsp;- Jesus Christ</h2>\r\n<p>God created man in His own image and after His own likeness as a good and upright being who was perfect (Gen 1:27). Man sinned by a willful act of disobedience and thereby forfeited his position as a child of God by his own choice. This fall caused the fellowship that hitherto existed between God and man to be broken. By the sin of Adam, the progenitor of the human race, the whole of mankind suffered the punishment and consequences of sin (Romans 5:14-19). God, in His infinite love and mercy provided a way for man to be reconciled to himself, by sending His only begotten son in the likeness of a man who took upon Himself all the punishment that was due to man (2Cor. 5:21). By this work of propitiation, man is brought back to God through faith in Christ Jesus and can then inherit God`s promise of eternal life.</p>\r\n<h2>We believe in the divine pattern for the salvation of man</h2>\r\n<p>God`s mercy brought salvation for all people. The salvation of God means total deliverance from the punishment, consequences, guilt, and power of sin, divine protection and security, total healing and renewal of strength. The salvation of God is open for everyone who will accept it. In order for a person to receive this salvation, the person must acknowledge the fact that he is a sinner according to Romans 3:23, must confess all his sins and repent from them (1John 1:9), must have faith in Jesus Christ and believe that Jesus is the only way to salvation (Romans 10:9). He must then accept Jesus Christ as his personal Lord and Savior and be submissive to His will. The Holy Spirit then works in the life of the new believer and makes him a new creature (2Cor.5:17).</p>\r\n<h2>We believe in water baptism</h2>\r\n<p>All who have really repented and in their hearts have truly believed on Jesus Christ as savior and Lord should be baptized in water according to the command of Christ (Mark 16:16). The baptism in water serves as a testimony to others, it signifies identification with the death, burial and resurrection of Jesus Christ, and hence we believe in the biblical pattern of baptism by full immersion (Romans 6:3,4). All baptism in water must be done in the name of the Lord Jesus Christ.</p>\r\n<h2>We believe in the Holy Communion</h2>\r\n<p>Bread and wine are used for the Lord`s Supper. The bread signifies the body of the Lord and the wine signifies His blood (1Cor. 11:23-26). The Holy Communion is a sign that shows that we have received, and are now partakers of the divine nature and thus hope and wait patiently for His return.</p>\r\n<h2>We believe that the promise of the father, the baptism in the Holy Spirit is a reality</h2>\r\n<p>The promise was made in the Old Testament (Joel 2:28) and was fulfilled on the day of Pentecost (Acts 2:4). The promise is for all believers and as such should be diligently sought after. The Holy Spirit in the life of a believer empowers the believer to gain victory over the flesh and the influences of the Devil (Romans 8:13B). A Spirit-filled believer will yield the fruit of the Spirit (Gal. 5:22-23).</p>\r\n<h2>We believe that baptism in the Holy Ghost is evidenced by speaking in tongues</h2>\r\n<p>Speaking in other tongues is an outward expression of the power of the Holy Spirit of God now dwelling on the inside of the Believer (Acts 2:4). The believer is baptized in the Holy Spirit and is totally lost in worship and praise of the glory and majesty of God.</p>\r\n<h2>We believe in complete Sanctification</h2>\r\n<p>The Bible records that without righteousness and holiness no man shall see God (Hebrews 12:14). Sanctification means separation from sin and separation unto God. The Word of God sanctifies us and keeps us pure and undefiled in the sight of God.</p>\r\n<h2>We believe in the Church</h2>\r\n<p>The Church as the body of Christ, headed by Christ Himself is the dwelling place of the glory of God. The Church is charged with the responsibility of preaching the gospel to every creature.</p>\r\n<h2>We believe that God calls some people to do special service for Him</h2>\r\n<p>Christ is the head and chief shepherd of the flock, and He has under-shepherds tending to the flock on earth. Each worker has his own gift commensurate to his work.</p>\r\n<h2>We believe in divine healing</h2>\r\n<p>People can be healed from sickness because Christ died on the cross and gave His blood for our sins and for our sicknesses (Isa. 53:5).</p>\r\n<h2>We believe in the joyful hope that Jesus Christ will come back again for the Church</h2>\r\n<p>The joyous hope rests on the Word of God. Jesus said: "I will come again and receive you unto myself (John 14:3)." We believe that we shall be changed and be like Him. Jesus is coming soon.</p>\r\n<h2>We believe in the Millennial Reign of Christ</h2>\r\n<p>The promise in the Bible and the hope of the world is this: the Lord Jesus will be seen coming from Heaven. The nation of Israel will also have salvation. Christ will rule on the earth for one thousand years.</p>\r\n<h2>We believe in the Lake of Fire</h2>\r\n<p>There is a place called the lake of fire, which was prepared for the Devil and His fallen angels. Unfortunately, many people will end up there because they have chosen to follow the Devil. All who are sinners and whose names are not found in the Book of Life shall be cast into the lake of fire at the Last Judgment (Rev. 20:15). The only way of escape is through faith in Christ Jesus.</p>\r\n<h2>We believe in the new Heaven and the new Earth</h2>\r\n<p>This vision as recorded in the book of Revelation, will be fulfilled after the old heaven and the old earth have passed away. The beauty of this place is humanly inexplicable and incomprehensible. Those who have an eternal covenant with God will enjoy this wonderful place forever and ever (Rev. 21:1).</p>', 0, 0, 'God gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God`s Word, the Bible is Spirit and therefore higher than a natural man`s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)', 'Our Beliefs\r\n\r\n\r\n\r\n\r\n\r\nThe Assemblies of God Nigeria accepts the INFALLIBLE, FLAWLESS and AUTHENTIC WORD OF GOD - the Bible (Holy Scriptures) as its FINAL AUTHORITY! \r\n\r\n\r\n\r\n\r\n\r\nWe believe that The Bible is God`s Word\r\nGod gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God`s Word, the Bible is Spirit and therefore higher than a natural man`s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)\r\nWe believe in the one true and living God\r\nThere is one true and living God (Deut. 6:4). He loves all people and wishes to have them as His children (John 3:16). God is all-powerful, knows everything, and is everywhere present. God wishes for us to graduate from a mere superficial knowledge of Him into a personal relationship through His son Jesus Christ.\r\nWe believe that the natural man is separated from God and there is only one way back to God&nbsp;- Jesus Christ\r\nGod created man in His own image and after His own likeness as a good and upright being who was perfect (Gen 1:27). Man sinned by a willful act of disobedience and thereby forfeited his position as a child of God by his own choice. This fall caused the fellowship that hitherto existed between God and man to be broken. By the sin of Adam, the progenitor of the human race, the whole of mankind suffered the punishment and consequences of sin (Romans 5:14-19). God, in His infinite love and mercy provided a way for man to be reconciled to himself, by sending His only begotten son in the likeness of a man who took upon Himself all the punishment that was due to man (2Cor. 5:21). By this work of propitiation, man is brought back to God through faith in Christ Jesus and can then inherit God`s promise of eternal life.\r\nWe believe in the divine pattern for the salvation of man\r\nGod`s mercy brought salvation for all people. The salvation of God means total deliverance from the punishment, consequences, guilt, and power of sin, divine protection and security, total healing and renewal of strength. The salvation of God is open for everyone who will accept it. In order for a person to receive this salvation, the person must acknowledge the fact that he is a sinner according to Romans 3:23, must confess all his sins and repent from them (1John 1:9), must have faith in Jesus Christ and believe that Jesus is the only way to salvation (Romans 10:9). He must then accept Jesus Christ as his personal Lord and Savior and be submissive to His will. The Holy Spirit then works in the life of the new believer and makes him a new creature (2Cor.5:17).\r\nWe believe in water baptism\r\nAll who have really repented and in their hearts have truly believed on Jesus Christ as savior and Lord should be baptized in water according to the command of Christ (Mark 16:16). The baptism in water serves as a testimony to others, it signifies identification with the death, burial and resurrection of Jesus Christ, and hence we believe in the biblical pattern of baptism by full immersion (Romans 6:3,4). All baptism in water must be done in the name of the Lord Jesus Christ.\r\nWe believe in the Holy Communion\r\nBread and wine are used for the Lord`s Supper. The bread signifies the body of the Lord and the wine signifies His blood (1Cor. 11:23-26). The Holy Communion is a sign that shows that we have received, and are now partakers of the divine nature and thus hope and wait patiently for His return.\r\nWe believe that the promise of the father, the baptism in the Holy Spirit is a reality\r\nThe promise was made in the Old Testament (Joel 2:28) and was fulfilled on the day of Pentecost (Acts 2:4). The promise is for all believers and as such should be diligently sought after. The Holy Spirit in the life of a believer empowers the believer to gain victory over the flesh and the influences of the Devil (Romans 8:13B). A Spirit-filled believer will yield the fruit of the Spirit (Gal. 5:22-23).\r\nWe believe that baptism in the Holy Ghost is evidenced by speaking in tongues\r\nSpeaking in other tongues is an outward expression of the power of the Holy Spirit of God now dwelling on the inside of the Believer (Acts 2:4). The believer is baptized in the Holy Spirit and is totally lost in worship and praise of the glory and majesty of God.\r\nWe believe in complete Sanctification\r\nThe Bible records that without righteousness and holiness no man shall see God (Hebrews 12:14). Sanctification means separation from sin and separation unto God. The Word of God sanctifies us and keeps us pure and undefiled in the sight of God.\r\nWe believe in the Church\r\nThe Church as the body of Christ, headed by Christ Himself is the dwelling place of the glory of God. The Church is charged with the responsibility of preaching the gospel to every creature.\r\nWe believe that God calls some people to do special service for Him\r\nChrist is the head and chief shepherd of the flock, and He has under-shepherds tending to the flock on earth. Each worker has his own gift commensurate to his work.\r\nWe believe in divine healing\r\nPeople can be healed from sickness because Christ died on the cross and gave His blood for our sins and for our sicknesses (Isa. 53:5).\r\nWe believe in the joyful hope that Jesus Christ will come back again for the Church\r\nThe joyous hope rests on the Word of God. Jesus said: "I will come again and receive you unto myself (John 14:3)." We believe that we shall be changed and be like Him. Jesus is coming soon.\r\nWe believe in the Millennial Reign of Christ\r\nThe promise in the Bible and the hope of the world is this: the Lord Jesus will be seen coming from Heaven. The nation of Israel will also have salvation. Christ will rule on the earth for one thousand years.\r\nWe believe in the Lake of Fire\r\nThere is a place called the lake of fire, which was prepared for the Devil and His fallen angels. Unfortunately, many people will end up there because they have chosen to follow the Devil. All who are sinners and whose names are not found in the Book of Life shall be cast into the lake of fire at the Last Judgment (Rev. 20:15). The only way of escape is through faith in Christ Jesus.\r\nWe believe in the new Heaven and the new Earth\r\nThis vision as recorded in the book of Revelation, will be fulfilled after the old heaven and the old earth have passed away. The beauty of this place is humanly inexplicable and incomprehensible. Those who have an eternal covenant with God will enjoy this wonderful place forever and ever (Rev. 21:1).', 1, 1),
(10, 'Jobs1', '<p>dgvfdgdfg</p>', 6, '<p>dgdfgdfg</p>', 0, 1, 'dgvfdgdfg', 'dgdfgdfg', 0, 1),
(11, 'ETS Jos Courses', '<p>To start building your architecture, start from the base of the architecture. The base is the<br />tier of the architecture that is subordinate to no other tier. Its at this tier that your church<br />leader/founders office most probably can be found. Most churches refer to that place as<br />their headquarters.</p>\r\n<p><br />To create the base tier, provide the tiers name in the textfield termed layer name. Do not<br />select a tier/layer in the parent layer and then click on Create. This should create the base<br />tier for you.</p>', 8, '<p>Enables adverts to be created on the portal. To create an advert, click on Advertisement<br />link in the features manager. You can then provide the name of the advert, its type, and<br />other details required to create the advert.</p>\r\n<p><br />One of the requirements is the &lsquo;When clicked redirect to&rsquo; requirement. This enables the<br />advert to link to another feature when clicked. To select the feature entry it links to, select<br />the feature type first of all, all valid entries made under that feature will appear on the page<br />so that you can select one particular feature entry. When the final advert designed has been<br />clicked on the portal by a user, that users browser will be directed to the feature entry you<br />selected.</p>\r\n<p><br />If you were going to create a text advert, select HTML Format as the type of advert and<br />ensure that you provide the advert in the &lsquo;Advert Contents (HTML format)&rsquo; textarea.</p>', 0, 0, 'To start building your architecture, start from the base of the architecture. The base is thetier of the architecture that is subordinate to no other tier. Its at this tier that your churchleader/founders office most probably can be found. Most churches refer to that place astheir headquarters.\r\nTo create the base tier, provide the tiers name in the textfield termed layer name. Do notselect a tier/layer in the parent layer and then click on Create. This should create the basetier for you.', 'Enables adverts to be created on the portal. To create an advert, click on Advertisementlink in the features manager. You can then provide the name of the advert, its type, andother details required to create the advert.\r\nOne of the requirements is the &lsquo;When clicked redirect to&rsquo; requirement. This enables theadvert to link to another feature when clicked. To select the feature entry it links to, selectthe feature type first of all, all valid entries made under that feature will appear on the pageso that you can select one particular feature entry. When the final advert designed has beenclicked on the portal by a user, that users browser will be directed to the feature entry youselected.\r\nIf you were going to create a text advert, select HTML Format as the type of advert andensure that you provide the advert in the &lsquo;Advert Contents (HTML format)&rsquo; textarea.', 1, 1),
(12, 'Our Vision', '<p><em>A Pentecostal pacesetter in Nigeria, Up-reach in worship of God, In-reach in discipleship of believers, and Out-reach in evangelizing the world</em></p>\r\n<p>&nbsp;</p>', 5, '<p>The Assemblies of God Nigeria aims to remain:</p>\r\n<h2>The Foremost Pentecostal Movement</h2>\r\n<p>in the country;</p>\r\n<h2>A Spirit-Led Movement</h2>\r\n<p>where all the component parts recognize and submit to the leadership of the Holy Spirit;</p>\r\n<h2>A Christ-Centered and Christ-Propagating Movement</h2>\r\n<p>spreading throughout the nooks and crannies of our country and beyond;</p>\r\n<h2>A Spiritual Catalyst</h2>\r\n<p>dictating the spiritual tempo of the church community within and beyond our country;</p>\r\n<h2>A Bible Holiness Preaching and Practicing Movement</h2>\r\n<p>keeping the world out of the church and preparing the saints for the rapture;</p>\r\n<h2>A Power-Packed Movement</h2>\r\n<p>terrorizing and humiliating the forces of darkness in all facets of this last onslaught against the devil by the church, striking terror in the heart of Satan;</p>\r\n<h2>A Growth-Oriented Movement</h2>\r\n<p>growing upward in worship, together in brotherly love and fellowship, outward in evangelism, and beyond in missions;</p>\r\n<h2>A Powerful Movement</h2>\r\n<p>locking and unlocking heaven on her knees, binding and casting out devils where they exist, demolishing strongholds of Satan and bringing to submission all minds that exalt themselves above the knowledge of God.</p>', 1, 0, 'A Pentecostal pacesetter in Nigeria, Up-reach in worship of God, In-reach in discipleship of believers, and Out-reach in evangelizing the world\r\n&nbsp;', 'The Assemblies of God Nigeria aims to remain:\r\nThe Foremost Pentecostal Movement\r\nin the country;\r\nA Spirit-Led Movement\r\nwhere all the component parts recognize and submit to the leadership of the Holy Spirit;\r\nA Christ-Centered and Christ-Propagating Movement\r\nspreading throughout the nooks and crannies of our country and beyond;\r\nA Spiritual Catalyst\r\ndictating the spiritual tempo of the church community within and beyond our country;\r\nA Bible Holiness Preaching and Practicing Movement\r\nkeeping the world out of the church and preparing the saints for the rapture;\r\nA Power-Packed Movement\r\nterrorizing and humiliating the forces of darkness in all facets of this last onslaught against the devil by the church, striking terror in the heart of Satan;\r\nA Growth-Oriented Movement\r\ngrowing upward in worship, together in brotherly love and fellowship, outward in evangelism, and beyond in missions;\r\nA Powerful Movement\r\nlocking and unlocking heaven on her knees, binding and casting out devils where they exist, demolishing strongholds of Satan and bringing to submission all minds that exalt themselves above the knowledge of God.', 1, 1),
(13, 'Casor', '<p>we are students&nbsp;&nbsp;</p>', 8, '<p>yes</p>', 0, 0, 'we are students&nbsp;&nbsp;', 'yes', 1, 1),
(14, 'Evangel University', '<p>2010</p>', 8, '<p>we will open</p>', 0, 0, '2010', 'we will open', 1, 1),
(15, 'Privacy Information', '<p>Privacy Information Here!</p>', 5, '<p>Privacy Information Here!</p>', 0, 0, 'Privacy Information Here!', 'Privacy Information Here!', 1, 1),
(16, 'Trial', '<p><img title="images/2.jpg" src="2.JPG" alt="" /></p>', 7, '<p><img style="vertical-align: baseline;" src="images/2.JPG" alt="" width="101" height="101" /> dsdkks kskds kdkdskd kdksd</p>', 0, 0, '', ' dsdkks kskds kdkdskd kdksd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_articles_type`
--

CREATE TABLE IF NOT EXISTS `cpj_articles_type` (
  `id` int(11) NOT NULL auto_increment,
  `articleTypeName` varchar(150) NOT NULL,
  `parentId` int(11) default NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  `sectionYes` tinyint(4) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `section` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `articleTypeName` (`articleTypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cpj_articles_type`
--

INSERT INTO `cpj_articles_type` (`id`, `articleTypeName`, `parentId`, `frontPageYes`, `sectionYes`, `sectionId`, `status`, `section`) VALUES
(2, 'Blessings', NULL, 1, 0, 0, 1, 1),
(3, 'Bible Schools', NULL, 0, 0, 0, 1, 1),
(4, 'Projects', NULL, 0, 1, 0, 1, 1),
(5, 'Church Information', NULL, 0, 0, 0, 1, 1),
(6, 'Jobs', NULL, 0, 0, 1, 1, 1),
(7, 'A23', NULL, 0, 0, 0, 1, 1),
(8, 'Educational', NULL, 1, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_bible_students`
--

CREATE TABLE IF NOT EXISTS `cpj_bible_students` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `schoolId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dateAccountCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `programmeOfStudyId` int(11) NOT NULL,
  `levelId` int(11) NOT NULL,
  `identificationNumber` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cpj_bible_students`
--

INSERT INTO `cpj_bible_students` (`id`, `userId`, `schoolId`, `status`, `dateAccountCreated`, `programmeOfStudyId`, `levelId`, `identificationNumber`) VALUES
(10, 23, 1, 1, '2009-11-22 04:52:44', 1, 1, ''),
(12, 1, 2, 1, '2009-11-28 09:38:24', 1, 1, ''),
(13, 1, 1, 1, '2009-11-28 22:45:44', 1, 1, '2322'),
(14, 1, 1, 1, '2009-11-29 03:46:27', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_bible_students_registered_courses`
--

CREATE TABLE IF NOT EXISTS `cpj_bible_students_registered_courses` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `score` double NOT NULL,
  `grade` varchar(100) NOT NULL,
  `dateRegistered` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `dateLastModified` timestamp NOT NULL default '0000-00-00 00:00:00',
  `schoolId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `cpj_bible_students_registered_courses`
--

INSERT INTO `cpj_bible_students_registered_courses` (`id`, `userId`, `courseId`, `status`, `score`, `grade`, `dateRegistered`, `dateLastModified`, `schoolId`) VALUES
(1, 23, 1, 1, 0, '', '2009-11-22 05:50:48', '0000-00-00 00:00:00', 1),
(2, 23, 1, 1, 0, '', '2009-11-22 05:51:03', '0000-00-00 00:00:00', 1),
(3, 23, 4, 1, 0, '', '2009-11-23 17:39:39', '0000-00-00 00:00:00', 1),
(21, 1, 1, 1, 0, '', '2009-11-29 08:03:09', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_blog`
--

CREATE TABLE IF NOT EXISTS `cpj_blog` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `ownerUserId` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `userCommentYes` tinyint(4) NOT NULL,
  `displayUserComment` tinyint(4) NOT NULL,
  `activateNotifierYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `fpYes` tinyint(4) NOT NULL,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ownerUserId` (`ownerUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cpj_blog`
--

INSERT INTO `cpj_blog` (`id`, `title`, `ownerUserId`, `dateCreated`, `userCommentYes`, `displayUserComment`, `activateNotifierYes`, `status`, `fpYes`, `section`, `sectionId`) VALUES
(1, 'dsfdsfds fdf', 3, '2009-08-16 00:41:15', 0, 0, 0, 0, 0, 4, 1),
(2, 'Revd Dr. Charles Osueke ', 1, '2009-08-16 00:44:05', 0, 0, 0, 1, 0, 1, 0),
(3, 'Testimonies', 4, '2009-10-23 12:28:27', 1, 1, 0, 1, 0, 1, 0),
(4, 'Revd Prof Paul Emeka - AGS', 5, '2009-10-23 15:09:28', 0, 0, 0, 1, 1, 1, 0),
(5, 'James', 8, '2009-11-04 11:12:29', 0, 0, 0, 0, 0, 1, 1),
(7, 'A12', 14, '2009-11-11 18:54:34', 0, 0, 0, 0, 0, 1, 0),
(8, 'Blog of General Secretary', 21, '2009-11-20 17:50:14', 1, 1, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_blog_posts`
--

CREATE TABLE IF NOT EXISTS `cpj_blog_posts` (
  `id` int(11) NOT NULL auto_increment,
  `topic` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `pictureId` int(11) NOT NULL,
  `datePosted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `blogId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `topic` (`topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cpj_blog_posts`
--

INSERT INTO `cpj_blog_posts` (`id`, `topic`, `message`, `pictureId`, `datePosted`, `blogId`, `status`) VALUES
(1, 'Lust Devastating Power', 'Lust has terrifying power. Normally you’d ask yourself, ‘What about the repercussions of this? What if I go ahead and do the thing I shouldn’t?’ But when lust is fanned into flame, all rational thoughts vanish. Gone are the concerns, ‘What about my wife, my children, my career, my relationship with God, this woman’s husband, her reputation?’ These things no longer matter. Lust crashes in like a great tidal wave and sweeps all responsible thinking aside. It fills the emotions and emotions rob the mind of its control. Suddenly you must have satisfaction – now. Lust urges you to live for now. It forces your mind to yield and compels your will to obey. The wave knocks you off your feet. All resolutions to live a godly life are swept aside. David, a man who loved God, was overwhelmed as lust prevailed.\r\n\r\nDavid: A Product of His Generation?\r\n\r\nBut you need not fall. You have the power to overcome this enemy. God would urge you, ‘Live a clean life, young man, young woman. I want you free of those unclean habits. I don’t want you away from the battle, lying in bed, letting your imagination run wild and then finding yourself overwhelmed with passion.’ Young Christian couples, what standards are you settling for? Boyfriend, girlfriend – perhaps not engaged, but very fond of one another – what are your standards? How do you conduct yourselves when nobody else is around? Does God approve of what you are doing?\r\n\r\nSome people have argued in defence of David. ‘We mustn’t be too hard on him,’ they say. ‘He was in a unique position. He was a despotic king in an oriental society. Other kings living at that time wouldn’t have thought twice about taking a woman. Bathsheba was not particularly at fault, either. How could she be expected to resist the will of this great monarch? Surely he could have whatever he wanted, so if he wanted Bathsheba, he would have her. We must make allowances for the culture of the day. David was, to some degree, a product of his age, and we must understand that before we judge him for his conduct.''\r\n\r\nDavid: A Man After God’s Heart\r\n\r\nBut David was not a mere product of his generation, he was the ‘man after God’s heart’. I once read an alarming Gallup survey indicating that 52% of regular churchgoers between the ages of thirteen and eighteen didn’t consider premarital sex wrong. The poll pointed out that this was 10% below the national average. But you are not called to be 10% better than the world. You are meant to be as different as light and darkness!\r\n\r\nGod sees the moral landslide that’s taken place in the last few decades. He watches as young people are seduced, abused, corrupted. They carry the guilt and shame around with them, yet many young Christians argue, ‘Everyone’s doing it.’ They accept the world’s standard that as soon as they have been going out for a short time they should give rein to their sexual impulses.\r\n\r\n‘All the other oriental kings did it,’ say David’s defenders. ‘Everyone else does it’ – is that your excuse? Do you adopt worldly standards and merely follow everybody else? Does God’s Word tell you that you are free to play around like this? Never! David was not just another oriental king, a product of his age. He was God’s chosen man. All the other kings, in their ungodliness, could do whatever they liked, but David had much higher standards to keep. So have you.\r\n', 0, '2009-08-16 00:46:55', 2, 1),
(2, 'Trust in the Lord', 'Trusting in the lord is alwayz', 2, '2009-08-22 09:25:18', 1, 0),
(4, 'Not Yet Available', 'Not Yet Available!', 205, '2009-10-23 15:15:40', 4, 1),
(6, 'dsdsd', 'sdsdsd', 0, '2009-11-04 12:06:14', 5, 0),
(7, 'dsdsdsd', 'sdsdadas', 0, '2009-11-04 12:08:54', 5, 0),
(10, 'Jesus Is Alive', 'In Acts 1:8 we read, "and you shall be witnesses of me throughout all the earth"; and Christians should do just that. The followers of Jesus Christ should give their own witness for or about Jesus anytime they have the opportunity, being careful of course not to offend others. But our own personal testimony for Jesus has absolutely nothing to do with the testimony of Jesus.\r\n\r\nWhen President Clinton gave his testimony before the Grand Jury it was his very own personal testimony. That testimony consisted of what President Clinton had to say in his very own words and will be forever referred to as the testimony of President William J. Clinton. If you ever have to testify at a trial or a hearing or before a grand jury it will be known as your very own personal testimony. Similarly, the testimony of Jesus is His very own personal testimony; the very words spoken by Jesus, what he had to say. In Revelation 1:1-2; we read: "The Revelation of Jesus Christ, which God gave unto him, to show unto his servants things which must shortly come to pass; and he sent and signified it by his angel unto his servant John: who bore record of the word of God and the testimony of Jesus Christ and of all things that he saw."', 203, '2009-10-23 12:42:31', 3, 1),
(11, 'What Jesus Means to Me', 'In Genesis 11:8 we read about our own personal testimony for Jesus has absolutely nothing to do with the testimony of Jesus.\r\n\r\nWhen President Clinton gave his testimony before the Grand Jury it was his very own personal testimony. That testimony consisted of what President Clinton had to say in his very own words and will be forever referred to as the testimony of President William J. Clinton. If you ever have to testify at a trial or a hearing or before a grand jury it will be known as your very own personal testimony. Similarly, the testimony of Jesus is His very own personal testimony; the very words spoken by Jesus, what he had to say. In Revelation 1:1-2; we read: "The Revelation of Jesus Christ, which God gave unto him, to show unto his servants things which must shortly come to pass; and he sent and signified it by his angel unto his servant John: who bore record of the word of God and the testimony of Jesus Christ and of all things that he saw."\r\nOther Blog Posts: No Additional Blog Posts Yet!', 233, '2009-10-31 10:31:21', 3, 1),
(12, 'This is A test', 'sfdfdf dfsdf sddfs', 357, '2009-11-20 17:53:30', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_blog_posts_comments`
--

CREATE TABLE IF NOT EXISTS `cpj_blog_posts_comments` (
  `id` int(11) NOT NULL auto_increment,
  `blogPostId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `datePosted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cpj_blog_posts_comments`
--

INSERT INTO `cpj_blog_posts_comments` (`id`, `blogPostId`, `firstName`, `lastName`, `location`, `message`, `datePosted`, `status`) VALUES
(1, 1, 'asasa', 'ssds', 'svfvf', 'dkd dskfs', '2009-08-16 01:19:28', 1),
(2, 2, 'sas', 'dssds', 'sdsa', 'sdasdsa', '2009-08-16 01:21:44', 1),
(3, 2, 'Kachi', 'Chibuzo', 'Lagos, Nigeria', 'I love the blog post', '2009-08-16 02:10:52', 1),
(6, 10, 'Rev Ben', 'Okoroafor', 'enugu', 'praise the Lord www.agnigeria.com is a reality', '2009-10-23 12:57:45', 1),
(7, 10, 'Kachi', 'Akujua', 'Germany', 'Thank God my work load is finishing', '2009-10-23 12:58:32', 1),
(8, 12, 'wrere', 'rewrew', 'werewr', 'ewrewr', '2009-11-20 18:02:08', 1),
(9, 12, 'dsadsa', 'asdsad', 'asdad', 'dasdas', '2009-11-20 18:02:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_careers`
--

CREATE TABLE IF NOT EXISTS `cpj_careers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '0',
  `description` text NOT NULL,
  `location` text NOT NULL,
  `churchId` int(11) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `externalLink` varchar(300) NOT NULL,
  `pictureId` int(11) NOT NULL,
  `publishedYes` tinyint(1) NOT NULL default '1',
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_careers`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_church_information`
--

CREATE TABLE IF NOT EXISTS `cpj_church_information` (
  `id` int(11) NOT NULL auto_increment,
  `sectionId` int(11) default NULL,
  `sectionChildId` int(11) default NULL,
  `information` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_church_information`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_church_positions`
--

CREATE TABLE IF NOT EXISTS `cpj_church_positions` (
  `id` int(11) NOT NULL auto_increment,
  `position` varchar(200) NOT NULL,
  `parentId` int(11) default NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cpj_church_positions`
--

INSERT INTO `cpj_church_positions` (`id`, `position`, `parentId`, `status`) VALUES
(1, 'GS', NULL, 1),
(2, 'AGS', 1, 1),
(3, 'Secretary', 2, 1),
(4, 'Treasurer', 3, 1),
(5, 'District Superintendent', 4, 1),
(6, 'Sectional Leaders', 5, 1),
(7, 'Pastor', 6, 1),
(8, 'Members', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_components`
--

CREATE TABLE IF NOT EXISTS `cpj_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `lowestAccessLevel` enum('General User','Administrator','Special','Logged In Member') NOT NULL,
  `position` int(11) NOT NULL,
  `pagePosition` varchar(50) NOT NULL,
  `templateIds` text,
  `status` enum('Activated','Deactivated') NOT NULL,
  `sectionYes` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpj_components`
--

INSERT INTO `cpj_components` (`id`, `name`, `lowestAccessLevel`, `position`, `pagePosition`, `templateIds`, `status`, `sectionYes`) VALUES
(1, 'Header', 'General User', 1, 'header', '6, 7', 'Activated', 0),
(2, 'Menus', 'General User', 2, 'left', '6, 7', 'Activated', 0),
(3, 'Footer', 'General User', 1, 'footer', '6, 7', 'Activated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_contact`
--

CREATE TABLE IF NOT EXISTS `cpj_contact` (
  `id` int(11) NOT NULL auto_increment,
  `information` text NOT NULL,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phoneNumber` text NOT NULL,
  `pictureId` int(11) NOT NULL,
  `contactAddress` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cpj_contact`
--

INSERT INTO `cpj_contact` (`id`, `information`, `section`, `sectionId`, `email`, `phoneNumber`, `pictureId`, `contactAddress`, `status`, `frontPageYes`) VALUES
(1, '<p>Welcome To General Council</p>', 1, 0, 'help@assembliesofgodnigeria.org', '042-451080', 395, '<p>Plot R8 Ozubulu Street,</p>\r\n<p>Independence Layout,</p>\r\n<p>P.O. Box 395,</p>\r\n<p>Enugu,</p>\r\n<p>Enugu State,</p>\r\n<p>Nigeria</p>', 1, 0),
(2, '<p>Contact Us</p>', 6, 0, 'adminagnigeria@agnigeria.com', '090238484', 269, '<p>dfdf dfdf</p>', 1, 0),
(3, '<p>This is contact page for districts&nbsp;&nbsp;</p>', 2, 0, 'admin@agnigeria.com', '09012332323', 351, '<p>dsadsdsd</p>', 1, 0),
(4, '<p>dfdf dfdf&nbsp;&nbsp;</p>', 4, 1, 'admin@agnigeria.com', '08033337810', 373, '<p>fdfd dfdf</p>', 1, 0),
(5, '<p>sdasdsa</p>', 8, 0, 'admin@agnigeria.com', '08012121212', 374, '<p>dsddsd</p>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_contact_list`
--

CREATE TABLE IF NOT EXISTS `cpj_contact_list` (
  `id` int(11) NOT NULL auto_increment,
  `names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `dateSent` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_contact_list`
--

INSERT INTO `cpj_contact_list` (`id`, `names`, `email`, `message`, `dateSent`, `status`) VALUES
(1, 'dsdsad sdsd', 'sdsdlsd@sdkskds.com', 'dasdsa sasad sds', '2009-11-11 02:40:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_corporate_ministries_members`
--

CREATE TABLE IF NOT EXISTS `cpj_corporate_ministries_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `adminPosition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_corporate_ministries_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_country`
--

CREATE TABLE IF NOT EXISTS `cpj_country` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(64) NOT NULL default '',
  `iso_code` char(2) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `iso_code` (`iso_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_country`
--

INSERT INTO `cpj_country` (`id`, `name`, `iso_code`) VALUES
(1, 'Nigeria', 'NG'),
(2, 'USA', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_department_projects`
--

CREATE TABLE IF NOT EXISTS `cpj_department_projects` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `information` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `deptId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `section` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_department_projects`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_departments`
--

CREATE TABLE IF NOT EXISTS `cpj_departments` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(300) NOT NULL,
  `mediaType` enum('Audio','Flash','Picture','Video') NOT NULL,
  `mediaId` int(11) NOT NULL,
  `information` text NOT NULL,
  `vision` text NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_departments`
--

INSERT INTO `cpj_departments` (`id`, `name`, `mediaType`, `mediaId`, `information`, `vision`, `status`) VALUES
(1, 'Visitation & Counseling', 'Audio', 20, 'Department was created on sunday 12th May 2008.', 'To create awareness of brotherhood within Christendom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_departments_list`
--

CREATE TABLE IF NOT EXISTS `cpj_departments_list` (
  `id` int(11) NOT NULL auto_increment,
  `departmentName` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_departments_list`
--

INSERT INTO `cpj_departments_list` (`id`, `departmentName`, `status`) VALUES
(1, 'Visitation', 1),
(2, 'Music', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_desk`
--

CREATE TABLE IF NOT EXISTS `cpj_desk` (
  `id` int(11) NOT NULL auto_increment,
  `deskContentsHTML` text NOT NULL,
  `deskContentsNoHTML` text NOT NULL,
  `srcId` int(11) NOT NULL,
  `datePosted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `fpYes` tinyint(4) NOT NULL default '0',
  `status` tinyint(4) NOT NULL,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cpj_desk`
--

INSERT INTO `cpj_desk` (`id`, `deskContentsHTML`, `deskContentsNoHTML`, `srcId`, `datePosted`, `fpYes`, `status`, `section`, `sectionId`) VALUES
(1, '<p>Welcome To Assemblies of God Nigeria Website. We hope to provide solution to your physical and spiritual needs through the word of God.</p>\r\n<p>God gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God?s Word, the Bible is Spirit and therefore higher than a natural man?s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)</p>\r\n<p>There is one true and living God (Deut. 6:4). He loves all people and wishes to have them as His children (John 3:16). God is all-powerful, knows everything, and is everywhere present. God wishes for us to graduate from a mere superficial knowledge of Him into a personal relationship through His son Jesus Christ.</p>\r\n<p>God created man in His own image and after His own likeness as a good and upright being who was perfect (Gen 1:27). Man sinned by a willful act of disobedience and thereby forfeited his position as a child of God by his own choice. This fall caused the fellowship that hitherto existed between God and man to be broken. By the sin of Adam, the progenitor of the human race, the whole of mankind suffered the punishment and consequences of sin (Romans 5:14-19). God, in His infinite love and mercy provided a way for man to be reconciled to himself, by sending His only begotten son in the likeness of a man who took upon Himself all the punishment that was due to man (2Cor. 5:21). By this work of propitiation, man is brought back to God through faith in Christ Jesus and can then inherit God?s promise of eternal life.</p>\r\n<p>God?s mercy brought salvation for all people. The salvation of God means total deliverance from the punishment, consequences, guilt, and power of sin, divine protection and security, total healing and renewal of strength. The salvation of God is open for everyone who will accept it. In order for a person to receive this salvation, the person must acknowledge the fact that he is a sinner according to Romans 3:23, must confess all his sins and repent from them (1John 1:9), must have faith in Jesus Christ and believe that Jesus is the only way to salvation (Romans 10:9). He must then accept Jesus Christ as his personal Lord and Savior and be submissive to His will. The Holy Spirit then works in the life of the new believer and makes him a new creature (2Cor.5:17).</p>\r\n<p>All who have really repented and in their hearts have truly believed on Jesus Christ as savior and Lord should be baptized in water according to the command of Christ (Mark 16:16). The baptism in water serves as a testimony to others, it signifies identification with the death, burial and resurrection of Jesus Christ, and hence we believe in the biblical pattern of baptism by full immersion (Romans 6:3,4). All baptism in water must be done in the name of the Lord Jesus Christ.</p>\r\n<p>Bread and wine are used for the Lord`s Supper. The bread signifies the body of the Lord and the wine signifies His blood (1Cor. 11:23-26). The Holy Communion is a sign that shows that we have received, and are now partakers of the divine nature and thus hope and wait patiently for His return.</p>', 'Welcome To Assemblies of God Nigeria Website. We hope to provide solution to your physical and spiritual needs through the word of God.\r\nGod gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God?s Word, the Bible is Spirit and therefore higher than a natural man?s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)\r\nThere is one true and living God (Deut. 6:4). He loves all people and wishes to have them as His children (John 3:16). God is all-powerful, knows everything, and is everywhere present. God wishes for us to graduate from a mere superficial knowledge of Him into a personal relationship through His son Jesus Christ.\r\nGod created man in His own image and after His own likeness as a good and upright being who was perfect (Gen 1:27). Man sinned by a willful act of disobedience and thereby forfeited his position as a child of God by his own choice. This fall caused the fellowship that hitherto existed between God and man to be broken. By the sin of Adam, the progenitor of the human race, the whole of mankind suffered the punishment and consequences of sin (Romans 5:14-19). God, in His infinite love and mercy provided a way for man to be reconciled to himself, by sending His only begotten son in the likeness of a man who took upon Himself all the punishment that was due to man (2Cor. 5:21). By this work of propitiation, man is brought back to God through faith in Christ Jesus and can then inherit God?s promise of eternal life.\r\nGod?s mercy brought salvation for all people. The salvation of God means total deliverance from the punishment, consequences, guilt, and power of sin, divine protection and security, total healing and renewal of strength. The salvation of God is open for everyone who will accept it. In order for a person to receive this salvation, the person must acknowledge the fact that he is a sinner according to Romans 3:23, must confess all his sins and repent from them (1John 1:9), must have faith in Jesus Christ and believe that Jesus is the only way to salvation (Romans 10:9). He must then accept Jesus Christ as his personal Lord and Savior and be submissive to His will. The Holy Spirit then works in the life of the new believer and makes him a new creature (2Cor.5:17).\r\nAll who have really repented and in their hearts have truly believed on Jesus Christ as savior and Lord should be baptized in water according to the command of Christ (Mark 16:16). The baptism in water serves as a testimony to others, it signifies identification with the death, burial and resurrection of Jesus Christ, and hence we believe in the biblical pattern of baptism by full immersion (Romans 6:3,4). All baptism in water must be done in the name of the Lord Jesus Christ.\r\nBread and wine are used for the Lord`s Supper. The bread signifies the body of the Lord and the wine signifies His blood (1Cor. 11:23-26). The Holy Communion is a sign that shows that we have received, and are now partakers of the divine nature and thus hope and wait patiently for His return.', 1, '2009-09-02 06:12:59', 1, 1, 1, 0),
(3, '<p><img style="float: left;" src="features/user/images/4ae25f4e4d4c4.png" alt="" width="87" height="108" />We welcome you to Assemblies of God Church Onuiyi webpage of Assemblies of God Nigeria portal.</p>\r\n<p>Please anytime you are around our vicinity do not fail to worship with us at our church. May God bless you abundantly, Amen.</p>', 'We welcome you to Assemblies of God Church Onuiyi webpage of Assemblies of God Nigeria portal.\r\nPlease anytime you are around our vicinity do not fail to worship with us at our church. May God bless you abundantly, Amen.', 6, '2009-10-23 21:49:51', 1, 1, 4, 1),
(4, '<p><img style="float: left;" src="features/user/images/4ae258f47193a.png" alt="" width="87" height="108" />We welcome you to Nsukka District webpage of Assemblies of God Nigeria portal.</p>\r\n<p>Please anytime you are around our vicinity do not fail to worship with us at our any of our churches. May God bless you abundantly, Amen.</p>', 'We welcome you to Nsukka District webpage of Assemblies of God Nigeria portal.\r\nPlease anytime you are around our vicinity do not fail to worship with us at our any of our churches. May God bless you abundantly, Amen.', 4, '2009-10-24 04:09:56', 1, 1, 2, 3),
(5, '<p>dsddsdsdsd sdsdsads</p>', 'dsddsdsdsd sdsdsads', 0, '2009-11-04 13:49:41', 1, 1, 0, 0),
(6, '\r\n\r\ndsdsadsadsadsadasd\r\n', 'dsdsadsadsadsadasd', 0, '2009-11-04 13:52:06', 0, 1, 0, 0),
(7, '<p>dskdskdsd sdksdk&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 'dskdskdsd sdksdk&nbsp;&nbsp;  &nbsp;&nbsp;', 0, '2009-11-04 14:45:26', 0, 1, 0, 0),
(8, '\r\n\r\nsdsds sdsdasdsdsa\r\n', 'sdsds sdsdasdsdsa', 0, '2009-11-04 14:47:16', 0, 1, 0, 0),
(9, '<p>sdsds sdsdasdsdsa</p>', 'sdsds sdsdasdsdsa', 0, '2009-11-04 14:47:59', 0, 1, 0, 0),
(10, '<p>sdsadsad</p>', 'sdsadsad', 0, '2009-11-04 14:50:00', 0, 1, 0, 1),
(11, 'sdksdk skdaskdksd', 'sdksdk skdaskdksd', 0, '2009-11-12 10:53:54', 0, 0, 6, 2),
(12, '<p>This is Sango District! Welcome To Assemblies of God Nigeria Website. We hope to provide solution to your physical and spiritual needs through the word of God.</p>\r\n<p>God gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God?s Word, the Bible is Spirit and therefore higher than a natural man?s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)</p>\r\n<p>There is one true and living God (Deut. 6:4). He loves all people and wishes to have them as His children (John 3:16). God is all-powerful, knows everything, and is everywhere present. God wishes for us to graduate from a mere superficial knowledge of Him into a personal relationship through His son Jesus Christ.</p>\r\n<p>God created man in His own image and after His own likeness as a good and upright being who was perfect (Gen 1:27). Man sinned by a willful act of disobedience and thereby forfeited his position as a child of God by his own choice. This fall caused the fellowship that hitherto existed between God and man to be broken. By the sin of Adam, the progenitor of the human race, the whole of mankind suffered the punishment and consequences of sin (Romans 5:14-19). God, in His infinite love and mercy provided a way for man to be reconciled to himself, by sending His only begotten son in the likeness of a man who took upon Himself all the punishment that was due to man (2Cor. 5:21). By this work of propitiation, man is brought back to God through faith in Christ Jesus and can then inherit God?s promise of eternal life.</p>\r\n<p>God?s mercy brought salvation for all people. The salvation of God means total deliverance from the punishment, consequences, guilt, and power of sin, divine protection and security, total healing and renewal of strength. The salvation of God is open for everyone who will accept it. In order for a person to receive this salvation, the person must acknowledge the fact that he is a sinner according to Romans 3:23, must confess all his sins and repent from them (1John 1:9), must have faith in Jesus Christ and believe that Jesus is the only way to salvation (Romans 10:9). He must then accept Jesus Christ as his personal Lord and Savior and be submissive to His will. The Holy Spirit then works in the life of the new believer and makes him a new creature (2Cor.5:17).</p>\r\n<p>All who have really repented and in their hearts have truly believed on Jesus Christ as savior and Lord should be baptized in water according to the command of Christ (Mark 16:16). The baptism in water serves as a testimony to others, it signifies identification with the death, burial and resurrection of Jesus Christ, and hence we believe in the biblical pattern of baptism by full immersion (Romans 6:3,4). All baptism in water must be done in the name of the Lord Jesus Christ.</p>\r\n<p>Bread and wine are used for the Lord?s Supper. The bread signifies the body of the Lord and the wine signifies His blood (1Cor. 11:23-26). The Holy Communion is a sign that shows that we have received, and are now partakers of the divine nature and thus hope and wait patiently for His return.</p>', 'This is Sango District! Welcome To Assemblies of God Nigeria Website. We hope to provide solution to your physical and spiritual needs through the word of God.\r\nGod gave The Bible and He worked by the Holy Spirit on the minds of the writers of the Bible, and thus they received the inspiration to write (2Tim. 3:16). By the Bible, God makes Himself and his thoughts known to man. The Bible is the infallible truth and Word of God, it has no mistakes and it is the perfect rule, which guides our faith and manner of living (1 Peter 2:2). Being God?s Word, the Bible is Spirit and therefore higher than a natural man?s wisdom and understanding, and can only be revealed by the Holy Spirit (Romans 8:7)\r\nThere is one true and living God (Deut. 6:4). He loves all people and wishes to have them as His children (John 3:16). God is all-powerful, knows everything, and is everywhere present. God wishes for us to graduate from a mere superficial knowledge of Him into a personal relationship through His son Jesus Christ.\r\nGod created man in His own image and after His own likeness as a good and upright being who was perfect (Gen 1:27). Man sinned by a willful act of disobedience and thereby forfeited his position as a child of God by his own choice. This fall caused the fellowship that hitherto existed between God and man to be broken. By the sin of Adam, the progenitor of the human race, the whole of mankind suffered the punishment and consequences of sin (Romans 5:14-19). God, in His infinite love and mercy provided a way for man to be reconciled to himself, by sending His only begotten son in the likeness of a man who took upon Himself all the punishment that was due to man (2Cor. 5:21). By this work of propitiation, man is brought back to God through faith in Christ Jesus and can then inherit God?s promise of eternal life.\r\nGod?s mercy brought salvation for all people. The salvation of God means total deliverance from the punishment, consequences, guilt, and power of sin, divine protection and security, total healing and renewal of strength. The salvation of God is open for everyone who will accept it. In order for a person to receive this salvation, the person must acknowledge the fact that he is a sinner according to Romans 3:23, must confess all his sins and repent from them (1John 1:9), must have faith in Jesus Christ and believe that Jesus is the only way to salvation (Romans 10:9). He must then accept Jesus Christ as his personal Lord and Savior and be submissive to His will. The Holy Spirit then works in the life of the new believer and makes him a new creature (2Cor.5:17).\r\nAll who have really repented and in their hearts have truly believed on Jesus Christ as savior and Lord should be baptized in water according to the command of Christ (Mark 16:16). The baptism in water serves as a testimony to others, it signifies identification with the death, burial and resurrection of Jesus Christ, and hence we believe in the biblical pattern of baptism by full immersion (Romans 6:3,4). All baptism in water must be done in the name of the Lord Jesus Christ.\r\nBread and wine are used for the Lord?s Supper. The bread signifies the body of the Lord and the wine signifies His blood (1Cor. 11:23-26). The Holy Communion is a sign that shows that we have received, and are now partakers of the divine nature and thus hope and wait patiently for His return.', 21, '2009-11-20 16:08:37', 1, 1, 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_devotionals`
--

CREATE TABLE IF NOT EXISTS `cpj_devotionals` (
  `id` int(11) NOT NULL auto_increment,
  `authorId` int(11) NOT NULL,
  `memberYes` tinyint(1) NOT NULL,
  `dateOfPublication` date NOT NULL default '2009-11-17',
  `title` varchar(500) NOT NULL,
  `message` text character set armscii8 NOT NULL,
  `bibleQuote` text NOT NULL,
  `frontPageIntro` text NOT NULL,
  `bibleReading` text NOT NULL,
  `watchWord` text NOT NULL,
  `pictureId` int(11) NOT NULL,
  `oneYearReading` text NOT NULL,
  `publishedYes` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `dateOfPublication` (`dateOfPublication`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cpj_devotionals`
--

INSERT INTO `cpj_devotionals` (`id`, `authorId`, `memberYes`, `dateOfPublication`, `title`, `message`, `bibleQuote`, `frontPageIntro`, `bibleReading`, `watchWord`, `pictureId`, `oneYearReading`, `publishedYes`, `status`) VALUES
(1, 1, 1, '2009-10-22', 'When the Saints get Called Home', 'are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows:', 'He was wounded for our transgressions, He was bruised for our iniquities\r\n\r\n---Isaiah 34: 4', 'Pastor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms. Here him today.', 'I Cor. 11:23 - 26 ', 'Be Smart, Ask for Gods wisdom', 21, 'Jeremiah 1-3', 1, 1),
(2, 1, 1, '2009-08-20', 'When the Saints get Called Home', 'are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows:', 'He was wounded for our transgressions, He was bruised for our iniquities\r\n\r\n---Isaiah 34: 4', 'Pastor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms. Here him today.', 'I Cor. 11:23 - 26 ', 'Be Smart, Ask for Gods wisdom', 21, 'Jeremiah 1-3', 0, 1),
(3, 1, 1, '2009-08-21', 'When the Saints get Called Home', 'are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows: try are ???thrown??? when they are detected and the language run time searches its call stack to see if there is a relevant try/catch construct that is willing to handle the exception. There are many advantages to this method. To begin with, you don???t have to place if() statements in every place where an exception might occur; thus, you end up writing a lot less code. Instead, you can enclose the entire section of code with a try/catch construct and handle an error if one occurs. Also, after you detecte an error using the throw statement, you can easily return to a point in the code that is responsible for handling and continuing execution of the program, because throw unwinds the function call-stack until it detects an appropriate try/catch block. The syntax of try/catch is as follows:', 'He was wounded for our transgressions, He was bruised for our iniquities\r\n\r\n---Isaiah 34: 4', 'Pastor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms. Here him today.', 'I Cor. 11:23 - 26 ', 'Be Smart, Ask for Gods wisdom', 21, 'Jeremiah 1-3', 0, 1),
(4, 0, 0, '0000-00-00', 'ABC', 'dsfdfds', 'qseww', 'dsfdfdf', 'ewrere', 'kskdskd', 80, 'afsadfdfd', 0, 1),
(5, 2, 0, '2009-08-28', 'asdsad`ssdds''sdjdj"sdks', 'dasdsa''skdks@ "sdlsd"1sdkd` sdd', 'dasd', 'dsdas', 'sdasd', 'sadasda', 81, 'sdasdsad', 0, 1),
(6, 1, 1, '2009-11-29', 'Jesus is Lord', 'stor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms.stor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms.stor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms.stor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms.stor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms.', 'Gen 1:1', 'stor Yetunde Asogwa in todays word explains the differences between living a life and living a fulfilled life. He speaks directly from experience after being a CEO of primeHTP a Human Resource Company involved in software development for big oil firms.', 'in the begining God fdfd xvv cgf   cff', 'anything', 82, 'Psalm 1;1-20', 0, 1),
(7, 1, 1, '2009-10-28', 'Jesus is Lord', 'SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `".$this->getLoginParameter()."` = ''".base64_encode($loginParameter)."'' AND `password` = ".$securityOption."(''".base64_encode($password)."'') AND status = ''1''\r\n\r\n\r\nSELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `".$this->getLoginParameter()."` = ''".base64_encode($loginParameter)."'' AND `password` = ".$securityOption."(''".base64_encode($password)."'') AND status = ''1''\r\n\r\nSELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `".$this->getLoginParameter()."` = ''".base64_encode($loginParameter)."'' AND `password` = ".$securityOption."(''".base64_encode($password)."'') AND status = ''1''', '2nd John 2: 1', 'U0VMRUNUICogRlJPTSBgXCIuREVGQVVMVF9EQl9UQkxfUFJFRklYLlwiX3VzZXJgIFdIRVJFIGBcIi4kdGhpcy0+Z2V0TG9naW5QYXJhbWV0ZXIoKS5cImAgPSBcJ1wiLmJhc2U2NF9lbmNvZGUoJGxvZ2luUGFyYW1ldGVyKS5cIlwnIEFORCBgcGFzc3dvcmRgID0gXCIuJHNlY3VyaXR5T3B0aW9uLlwiKFwnXCIuYmFzZTY0X2VuY29kZSgkcGFzc3dvcmQpLlwiXCcpIEFORCBzdGF0dXMgPSBcJzFcJw==', 'in the begining God fdfd xvv cgf   cff', 'SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `".$this->getLoginParameter()."` = ''".base64_encode($loginParameter)."'' AND `password` = ".$securityOption."(''".base64_encode($password)."'') AND status = ''1''', 231, '3of asalsa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_advertisement`
--

CREATE TABLE IF NOT EXISTS `cpj_display_advertisement` (
  `id` int(11) NOT NULL auto_increment,
  `sectionYes` tinyint(4) NOT NULL,
  `randomizeYes` tinyint(4) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_display_advertisement`
--

INSERT INTO `cpj_display_advertisement` (`id`, `sectionYes`, `randomizeYes`, `status`) VALUES
(1, 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_announcement`
--

CREATE TABLE IF NOT EXISTS `cpj_display_announcement` (
  `id` int(11) NOT NULL auto_increment,
  `dateYes` tinyint(1) NOT NULL default '1',
  `titleYes` tinyint(1) NOT NULL default '1',
  `titleFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '1',
  `bodyYes` tinyint(1) NOT NULL default '1',
  `pictureYes` tinyint(1) NOT NULL default '1',
  `sectionYes` tinyint(1) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cpj_display_announcement`
--

INSERT INTO `cpj_display_announcement` (`id`, `dateYes`, `titleYes`, `titleFormat`, `frontPageYes`, `bodyYes`, `pictureYes`, `sectionYes`, `status`) VALUES
(1, 0, 1, 'Title Case', 1, 1, 1, 1, 'Default'),
(2, 1, 1, 'Title Case', 1, 1, 1, 1, ''),
(3, 1, 1, 'Title Case', 1, 1, 1, 1, 'Inactive'),
(4, 1, 0, 'Title Case', 1, 1, 1, 1, 'Inactive'),
(5, 0, 1, 'Title Case', 1, 1, 0, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_articles`
--

CREATE TABLE IF NOT EXISTS `cpj_display_articles` (
  `id` int(11) NOT NULL auto_increment,
  `titleYes` tinyint(4) NOT NULL,
  `titleFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `contentsYes` tinyint(4) NOT NULL,
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_display_articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_careers`
--

CREATE TABLE IF NOT EXISTS `cpj_display_careers` (
  `id` int(11) NOT NULL auto_increment,
  `nameYes` tinyint(1) NOT NULL default '1',
  `nameFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `titleYes` tinyint(1) NOT NULL default '1',
  `titleFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '0',
  `descriptionYes` tinyint(1) NOT NULL default '1',
  `locationYes` tinyint(1) NOT NULL default '1',
  `churchYes` tinyint(1) NOT NULL default '1',
  `dateYes` tinyint(1) NOT NULL default '1',
  `externalLinkYes` tinyint(1) NOT NULL default '1',
  `pictureYes` tinyint(1) NOT NULL default '1',
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_display_careers`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_departments`
--

CREATE TABLE IF NOT EXISTS `cpj_display_departments` (
  `id` int(11) NOT NULL auto_increment,
  `nameYes` tinyint(1) default '1',
  `mediaYes` tinyint(1) default '1',
  `informationYes` tinyint(1) default '1',
  `visionYes` tinyint(1) default '1',
  `projectsYes` tinyint(1) default '1',
  `status` enum('Default','Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `cpj_display_departments`
--

INSERT INTO `cpj_display_departments` (`id`, `nameYes`, `mediaYes`, `informationYes`, `visionYes`, `projectsYes`, `status`) VALUES
(50, 1, 0, 1, 1, 0, 'Default'),
(63, 0, 0, 0, 0, 0, 'Inactive'),
(64, 0, 0, 0, 0, 0, 'Inactive'),
(65, 0, 0, 0, 0, 0, 'Inactive'),
(66, 0, 0, 0, 0, 0, 'Inactive'),
(67, 0, 0, 0, 1, 1, 'Inactive'),
(68, 0, 0, 0, 1, 1, 'Inactive'),
(69, 0, 0, 0, 1, 1, 'Inactive'),
(70, 0, 0, 0, 1, 1, 'Inactive'),
(71, 0, 0, 0, 1, 1, 'Inactive'),
(72, 0, 0, 0, 1, 1, 'Inactive'),
(73, 0, 0, 0, 1, 0, 'Inactive'),
(74, 0, 0, 1, 1, 0, 'Inactive'),
(75, 1, 0, 1, 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_devotional`
--

CREATE TABLE IF NOT EXISTS `cpj_display_devotional` (
  `id` int(11) NOT NULL auto_increment,
  `authorNameYes` tinyint(1) NOT NULL,
  `authorNameFormat` enum('Full Names','Initials') NOT NULL,
  `authorPictureYes` tinyint(1) NOT NULL,
  `localChurchYes` tinyint(1) NOT NULL,
  `publicationDateYes` tinyint(1) NOT NULL,
  `publicationDateFormat` enum('Full Date','MM/DD/YY','DD/MM/YY') NOT NULL,
  `titleYes` tinyint(1) NOT NULL,
  `titleFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `messageYes` tinyint(1) NOT NULL,
  `messageAlign` enum('Left','Right','Justify','Center') NOT NULL,
  `bibleQuoteYes` tinyint(1) NOT NULL,
  `bibleReadingYes` tinyint(1) NOT NULL,
  `watchWordYes` tinyint(1) NOT NULL,
  `watchWordFormat` enum('Upper Case','Title Case','Lower Case') NOT NULL,
  `devotionalPictureYes` tinyint(1) NOT NULL,
  `bibleInOneYearYes` tinyint(1) NOT NULL,
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cpj_display_devotional`
--

INSERT INTO `cpj_display_devotional` (`id`, `authorNameYes`, `authorNameFormat`, `authorPictureYes`, `localChurchYes`, `publicationDateYes`, `publicationDateFormat`, `titleYes`, `titleFormat`, `messageYes`, `messageAlign`, `bibleQuoteYes`, `bibleReadingYes`, `watchWordYes`, `watchWordFormat`, `devotionalPictureYes`, `bibleInOneYearYes`, `status`) VALUES
(1, 0, '', 0, 0, 0, 'Full Date', 0, '', 0, '', 0, 0, 0, '', 0, 0, 'Inactive'),
(2, 0, '', 0, 0, 0, 'Full Date', 0, '', 0, '', 0, 0, 0, '', 0, 0, 'Inactive'),
(3, 1, '', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(5, 1, 'Initials', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 0, 'Default'),
(6, 1, 'Full Names', 1, 1, 1, 'Full Date', 0, 'Title Case', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 0, 'Inactive'),
(7, 1, 'Initials', 1, 1, 1, 'Full Date', 1, 'Title Case', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(8, 0, 'Initials', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(9, 0, 'Initials', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(10, 1, 'Initials', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(11, 1, 'Initials', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 0, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(12, 1, 'Initials', 1, 1, 1, 'Full Date', 0, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Inactive'),
(13, 1, 'Initials', 1, 1, 1, 'Full Date', 1, '', 1, 'Justify', 1, 1, 1, 'Title Case', 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_events`
--

CREATE TABLE IF NOT EXISTS `cpj_display_events` (
  `id` int(11) NOT NULL auto_increment,
  `nameYes` tinyint(1) NOT NULL default '1',
  `nameFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `dateYes` tinyint(1) NOT NULL default '1',
  `resourcePersonsYes` tinyint(1) NOT NULL default '1',
  `registrationFeeYes` tinyint(1) NOT NULL default '1',
  `extraInfoYes` tinyint(1) NOT NULL default '1',
  `eventLinkYes` tinyint(1) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  `sectionYes` tinyint(1) NOT NULL default '1',
  `mapPictureYes` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cpj_display_events`
--

INSERT INTO `cpj_display_events` (`id`, `nameYes`, `nameFormat`, `dateYes`, `resourcePersonsYes`, `registrationFeeYes`, `extraInfoYes`, `eventLinkYes`, `status`, `sectionYes`, `mapPictureYes`) VALUES
(4, 1, 'tOGGLE cASE', 1, 1, 1, 1, 1, 'Default', 1, 1),
(7, 1, 'Title Case', 1, 1, 1, 0, 1, 'Inactive', 1, 1),
(8, 1, 'Title Case', 1, 1, 1, 0, 1, 'Inactive', 1, 1),
(9, 1, 'Title Case', 1, 1, 1, 0, 1, 'Inactive', 1, 1),
(10, 1, 'Title Case', 1, 1, 1, 0, 1, 'Inactive', 1, 1),
(11, 1, 'Title Case', 1, 1, 1, 1, 1, 'Inactive', 1, 1),
(12, 0, 'Title Case', 1, 1, 1, 1, 1, 'Inactive', 1, 1),
(13, 1, 'Title Case', 1, 1, 1, 1, 1, 'Active', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_forum`
--

CREATE TABLE IF NOT EXISTS `cpj_display_forum` (
  `id` int(11) NOT NULL auto_increment,
  `threadTitleYes` tinyint(1) NOT NULL default '1',
  `platformNameYes` tinyint(1) NOT NULL default '1',
  `authorInfoYes` tinyint(1) NOT NULL default '1',
  `datePostedYes` tinyint(1) NOT NULL default '1',
  `timePostedYes` tinyint(1) NOT NULL default '1',
  `noOfViewsYes` tinyint(1) NOT NULL default '0',
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cpj_display_forum`
--

INSERT INTO `cpj_display_forum` (`id`, `threadTitleYes`, `platformNameYes`, `authorInfoYes`, `datePostedYes`, `timePostedYes`, `noOfViewsYes`, `status`) VALUES
(1, 0, 0, 0, 0, 0, 0, ''),
(2, 1, 1, 1, 1, 0, 1, ''),
(3, 0, 0, 0, 0, 0, 0, 'Active'),
(4, 1, 1, 1, 1, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_forum_platform`
--

CREATE TABLE IF NOT EXISTS `cpj_display_forum_platform` (
  `id` int(11) NOT NULL auto_increment,
  `platformNameYes` tinyint(1) NOT NULL default '1',
  `dateCreatedYes` tinyint(1) NOT NULL default '1',
  `platformInfoYes` tinyint(1) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpj_display_forum_platform`
--

INSERT INTO `cpj_display_forum_platform` (`id`, `platformNameYes`, `dateCreatedYes`, `platformInfoYes`, `status`) VALUES
(1, 0, 0, 0, 'Active'),
(2, 1, 1, 1, 'Default'),
(3, 1, 0, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_guestbook`
--

CREATE TABLE IF NOT EXISTS `cpj_display_guestbook` (
  `id` int(11) NOT NULL auto_increment,
  `usersNameYes` tinyint(1) NOT NULL default '1',
  `usersNameFormat` enum('Full Names','Initials') NOT NULL,
  `emailAddressYes` tinyint(1) NOT NULL default '1',
  `datePostedYes` tinyint(1) NOT NULL default '1',
  `timePostedYes` tinyint(1) NOT NULL default '1',
  `status` enum('Default','Active','Inactive') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_display_guestbook`
--

INSERT INTO `cpj_display_guestbook` (`id`, `usersNameYes`, `usersNameFormat`, `emailAddressYes`, `datePostedYes`, `timePostedYes`, `status`) VALUES
(1, 1, 'Initials', 1, 1, 1, 'Default'),
(2, 1, 'Full Names', 0, 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_news`
--

CREATE TABLE IF NOT EXISTS `cpj_display_news` (
  `id` int(11) NOT NULL auto_increment,
  `dateYes` tinyint(1) NOT NULL default '1',
  `dateFormat` enum('Full Date','MM/DD/YY','DD/MM/YY') NOT NULL,
  `titleYes` tinyint(1) NOT NULL default '1',
  `titleFormat` enum('UPPER CASE','Title Case','lower case','Sentence case','tOGGLE cASE') NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '0',
  `newsMediaYes` tinyint(1) NOT NULL default '1',
  `sectionYes` tinyint(1) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  `ff` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cpj_display_news`
--

INSERT INTO `cpj_display_news` (`id`, `dateYes`, `dateFormat`, `titleYes`, `titleFormat`, `frontPageYes`, `newsMediaYes`, `sectionYes`, `status`, `ff`) VALUES
(1, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 0, '', ''),
(2, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 0, 'Inactive', ''),
(3, 1, 'Full Date', 1, '', 0, 1, 0, 'Inactive', ''),
(4, 1, 'Full Date', 1, '', 0, 1, 1, 'Inactive', ''),
(5, 1, 'Full Date', 1, '', 0, 1, 1, 'Inactive', ''),
(6, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(7, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(8, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(9, 1, 'Full Date', 1, 'Title Case', 1, 1, 1, 'Default', ''),
(10, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(11, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(12, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(13, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(14, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(15, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(16, 1, 'Full Date', 1, 'UPPER CASE', 0, 0, 1, 'Inactive', ''),
(17, 0, 'Full Date', 0, 'Sentence case', 0, 0, 0, 'Inactive', ''),
(18, 0, 'Full Date', 0, 'Title Case', 0, 0, 0, 'Inactive', ''),
(19, 1, 'Full Date', 1, 'Title Case', 0, 1, 1, 'Inactive', ''),
(20, 1, 'Full Date', 1, 'UPPER CASE', 1, 0, 1, 'Inactive', ''),
(21, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(22, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', '<p>This is some example text that you can edit inside the <strong>TinyMCE editor</strong>.</p>\r\n<p>Nam nisi elit, cursus in rhoncus sit amet, pulvinar laoreet leo. Nam sed lectus quam, ut sagittis tellus. Quisque dignissim mauris a augue rutrum tempor. Donec vitae purus nec massa vestibulum ornare sit amet id tellus. Nunc quam mauris, fermentum nec lacinia eget, sollicitudin nec ante. Aliquam molestie volutpat dapibus. Nunc interdum viverra sodales. Morbi laoreet pulvinar gravida. Quisque ut turpis sagittis nunc accumsan vehicula. Duis elementum congue ultrices. Cras faucibus feugiat arcu quis lacinia. In hac habitasse platea dictumst. Pellentesque fermentum magna sit amet tellus varius ullamcorper. Vestibulum at urna augue, eget varius neque. Fusce facilisis venenatis dapibus. Integer non sem at arcu euismod tempor nec sed nisl. Morbi ultricies, mauris ut ultricies adipiscing, felis odio condimentum massa, et luctus est nunc nec eros.</p>'),
(23, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', '<p><img src="../../inde.jpg" alt="" />This is some example text that you can edit inside the <strong>TinyMCE editor</strong>.</p>\r\n<p>Nam nisi elit, cursus in rhoncus sit amet, pulvinar laoreet leo. Nam sed lectus quam, ut sagittis tellus. Quisque dignissim mauris a augue rutrum tempor. Donec vitae purus nec massa vestibulum ornare sit amet id tellus. Nunc quam mauris, fermentum nec lacinia eget, sollicitudin nec ante. Aliquam molestie volutpat dapibus. Nunc interdum viverra sodales. Morbi laoreet pulvinar gravida. Quisque ut turpis sagittis nunc accumsan vehicula. Duis elementum congue ultrices. Cras faucibus feugiat arcu quis lacinia. In hac habitasse platea dictumst. Pellentesque fermentum magna sit amet tellus varius ullamcorper. Vestibulum at urna augue, eget varius neque. Fusce facilisis venenatis dapibus. Integer non sem at arcu euismod tempor nec sed nisl. Morbi ultricies, mauris ut ultricies adipiscing, felis odio condimentum massa, et luctus est nunc nec eros.</p>'),
(24, 0, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(25, 0, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(26, 0, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(27, 0, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(28, 0, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(29, 1, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Inactive', ''),
(30, 0, 'Full Date', 1, 'UPPER CASE', 0, 1, 1, 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_newsletter`
--

CREATE TABLE IF NOT EXISTS `cpj_display_newsletter` (
  `id` int(11) NOT NULL auto_increment,
  `copyAdminYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_display_newsletter`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_prayers`
--

CREATE TABLE IF NOT EXISTS `cpj_display_prayers` (
  `id` int(11) NOT NULL auto_increment,
  `articleYes` tinyint(1) NOT NULL default '1',
  `requesterInfoYes` tinyint(1) NOT NULL default '1',
  `prayerForWhoYes` tinyint(1) NOT NULL default '1',
  `prayerNeedYes` tinyint(1) NOT NULL default '1',
  `detailsYes` tinyint(1) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cpj_display_prayers`
--

INSERT INTO `cpj_display_prayers` (`id`, `articleYes`, `requesterInfoYes`, `prayerForWhoYes`, `prayerNeedYes`, `detailsYes`, `status`) VALUES
(1, 1, 1, 1, 0, 1, 'Default'),
(11, 1, 1, 1, 0, 1, 'Inactive'),
(12, 1, 1, 1, 1, 1, 'Inactive'),
(13, 1, 1, 1, 1, 1, 'Inactive'),
(14, 1, 1, 1, 1, 1, 'Inactive'),
(15, 0, 1, 1, 1, 1, 'Inactive'),
(16, 0, 1, 1, 1, 1, 'Inactive'),
(17, 0, 1, 1, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_register`
--

CREATE TABLE IF NOT EXISTS `cpj_display_register` (
  `id` int(11) NOT NULL auto_increment,
  `churchYes` tinyint(4) NOT NULL default '1',
  `usernameYes` tinyint(4) NOT NULL default '1',
  `passwordYes` tinyint(4) NOT NULL default '1',
  `firstNameYes` tinyint(4) NOT NULL default '1',
  `surnameYes` tinyint(4) NOT NULL default '1',
  `otherNameYes` tinyint(4) NOT NULL default '1',
  `sexYes` tinyint(4) NOT NULL default '1',
  `dateOfBirthYes` tinyint(4) NOT NULL default '1',
  `userTypeYes` tinyint(4) NOT NULL default '1',
  `dateRegisteredYes` tinyint(4) NOT NULL default '1',
  `emailYes` tinyint(4) NOT NULL default '1',
  `phoneNumberYes` tinyint(4) NOT NULL default '1',
  `pictureYes` tinyint(4) NOT NULL default '1',
  `profileYes` tinyint(4) NOT NULL default '1',
  `postYes` tinyint(4) NOT NULL default '1',
  `status` enum('Default','Inactive','Active') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_display_register`
--

INSERT INTO `cpj_display_register` (`id`, `churchYes`, `usernameYes`, `passwordYes`, `firstNameYes`, `surnameYes`, `otherNameYes`, `sexYes`, `dateOfBirthYes`, `userTypeYes`, `dateRegisteredYes`, `emailYes`, `phoneNumberYes`, `pictureYes`, `profileYes`, `postYes`, `status`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Default'),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_display_user`
--

CREATE TABLE IF NOT EXISTS `cpj_display_user` (
  `id` int(11) NOT NULL auto_increment,
  `churchYes` tinyint(1) NOT NULL default '1',
  `fullNamesYes` tinyint(1) NOT NULL default '1',
  `dateOfBirthYes` tinyint(1) NOT NULL default '0',
  `externalEmailYes` tinyint(1) NOT NULL default '1',
  `internalEmailYes` tinyint(1) NOT NULL default '1',
  `phoneNumberYes` tinyint(1) NOT NULL default '0',
  `pictureYes` tinyint(1) NOT NULL default '1',
  `profileYes` tinyint(1) NOT NULL default '1',
  `hierarchialLevelYes` tinyint(1) NOT NULL default '1',
  `loginParameter` enum('email','username') NOT NULL default 'username',
  `status` enum('Default','Inactive','Active') NOT NULL,
  `usernameYes` tinyint(4) NOT NULL default '1',
  `passwordYes` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cpj_display_user`
--

INSERT INTO `cpj_display_user` (`id`, `churchYes`, `fullNamesYes`, `dateOfBirthYes`, `externalEmailYes`, `internalEmailYes`, `phoneNumberYes`, `pictureYes`, `profileYes`, `hierarchialLevelYes`, `loginParameter`, `status`, `usernameYes`, `passwordYes`) VALUES
(4, 1, 1, 0, 1, 0, 0, 1, 1, 1, 'username', 'Default', 1, 1),
(6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'username', 'Active', 1, 1),
(7, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'username', 'Active', 1, 1),
(8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'username', 'Active', 1, 1),
(9, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'username', 'Active', 1, 1),
(10, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'username', 'Active', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_districts`
--

CREATE TABLE IF NOT EXISTS `cpj_districts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentNodeId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `cpj_districts`
--

INSERT INTO `cpj_districts` (`id`, `name`, `parentNodeId`, `status`, `information`) VALUES
(1, 'Enugu', 0, 1, ''),
(2, 'Aba', 0, 1, ''),
(3, 'Nsukka', 0, 1, ''),
(4, 'Afikpo', 0, 1, ''),
(5, 'Afenmai', 0, 1, ''),
(6, 'Anioma', 0, 1, ''),
(7, 'Ali Udo', 0, 1, ''),
(9, 'Bayelsa', 0, 1, ''),
(10, 'Awka', 0, 1, ''),
(11, 'Eastern Rivers', 0, 1, ''),
(12, 'Mbaise', 0, 1, ''),
(13, 'Owerri', 0, 1, ''),
(14, 'Oyo', 0, 1, ''),
(15, 'Lagos Mainland', 0, 1, ''),
(16, 'Uyo', 0, 1, ''),
(17, 'Ngwa', 0, 1, ''),
(18, 'Rivers', 0, 1, ''),
(19, 'Eleme Tai', 0, 1, ''),
(20, 'Kogi', 0, 1, ''),
(21, 'Warri', 0, 1, ''),
(22, 'Aba-North', 0, 1, ''),
(23, 'Umuahia', 0, 1, ''),
(24, 'Lagos', 0, 1, ''),
(25, 'Lafia', 0, 1, ''),
(26, 'Sapele District', 0, 1, ''),
(27, 'Ughelli', 0, 1, ''),
(28, 'Sango', 0, 1, ''),
(29, 'Aba North', 0, 1, ''),
(30, 'Abakaliki', 0, 1, ''),
(31, 'Abeokuta', 0, 1, ''),
(32, 'Abuja', 0, 1, ''),
(33, 'Ukwa', 0, 1, ''),
(34, 'Saminaka', 0, 1, ''),
(35, 'Pankshin', 0, 1, ''),
(36, 'Owerri East', 0, 1, ''),
(37, 'Osun', 0, 1, ''),
(38, 'Oron', 0, 1, ''),
(39, 'Orlu', 0, 1, ''),
(40, 'Onitsha', 0, 1, ''),
(41, 'Ondo', 0, 1, ''),
(42, 'Okigwe South', 0, 1, ''),
(43, 'Okigwe', 0, 1, ''),
(44, 'Ogoja', 0, 1, ''),
(45, 'Obudu', 0, 1, ''),
(46, 'Niger', 0, 1, ''),
(47, 'Kaduna South', 0, 1, ''),
(48, 'Kaduna', 0, 1, ''),
(49, 'Jos', 0, 1, ''),
(50, 'Ikwerre', 0, 1, ''),
(51, 'Ikorodu', 0, 1, ''),
(52, 'Ikom', 0, 1, ''),
(53, 'Ijebu', 0, 1, ''),
(54, 'Igede', 0, 1, ''),
(55, 'Ezzikwo', 0, 1, ''),
(56, 'Esan', 0, 1, ''),
(57, 'Eket', 0, 1, ''),
(58, 'Edo East', 0, 1, ''),
(59, 'Edo', 0, 1, ''),
(60, 'Ebonyi', 0, 1, ''),
(61, 'Calabar', 0, 1, ''),
(62, 'Apapa', 0, 1, ''),
(63, 'Akamkpa', 0, 1, ''),
(64, 'Ahoada', 0, 1, ''),
(65, 'Bauchi', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_donations`
--

CREATE TABLE IF NOT EXISTS `cpj_donations` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `fpYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `fpText` text NOT NULL,
  `bodyContents` text NOT NULL,
  `pictureId` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cpj_donations`
--

INSERT INTO `cpj_donations` (`id`, `name`, `fpYes`, `status`, `fpText`, `bodyContents`, `pictureId`) VALUES
(1, 'Evangel Light Media Productions', 1, 1, 'Join us to partner for our Evangel Light Media Productions as we look forward to kick starting very soon. To donate please use your credit card online or call us on +234.', 'Join us to partner for our AG Men group as we look forward to kick starting very soon. To donate please use your credit card online or call us on +234.', 2),
(2, 'Missions Donation', 0, 1, 'Join us to donate for our Missions Cause. To donate please use your credit card online or call us on +234.', 'Join us to partner for our Missions Cause. To donate please use your credit card online or call us on +234.', 0),
(3, 'Evangel University', 0, 1, 'Join us to partner for our Evangel University as we look forward to kick starting very soon. To donate please use your credit card online or call us on +234.', 'Join us to partner for our Evangel University as we look forward to kick starting very soon. To donate please use your credit card online or call us on +234.', 0),
(4, 'Evangel Camp', 0, 1, '<p>support our camp development</p>', '<p>support our camp development</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_donations_donors`
--

CREATE TABLE IF NOT EXISTS `cpj_donations_donors` (
  `id` int(11) NOT NULL auto_increment,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `country` varchar(5) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `donationsId` int(11) NOT NULL,
  `transactionId` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateDonated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `currency` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `transactionId` (`transactionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cpj_donations_donors`
--

INSERT INTO `cpj_donations_donors` (`id`, `firstName`, `lastName`, `country`, `state`, `address`, `city`, `zipCode`, `amount`, `donationsId`, `transactionId`, `status`, `phone`, `email`, `userId`, `dateDonated`, `currency`) VALUES
(2, 'Akujua', 'Onyekachi', 'NG', '', '4 Adesina Street ', 'Ikoja', '23442', 40, 1, '4', 1, '%2B2348037804471', 'smicer66%40yahoo.com', 1, '0000-00-00 00:00:00', 'USD'),
(3, 'James', 'Adesemowo', 'NG', '', '4 Adesina Street ', 'Jos', '23342', 23, 1, '4b0f893017703', 1, '%2B2348037804471', 'james%40akskd.com', 1, '0000-00-00 00:00:00', 'USD'),
(4, 'James', 'Adesemowo', 'NG', '1', 'asdsds asd', 'Ikoja', '23233', 59, 2, '4b10c72816f33', 1, '%2B2348037804471', 'smicer66%40yahoo.com', 1, '0000-00-00 00:00:00', 'USD'),
(5, 'Onyekachi', 'Akujua', 'NG', '1', '2dsdsdsd ', '232323', '23333', 232, 2, '4b10dd155ad8c', 1, '%2B2348037804471', 'smicer66%40yahoo.com', 1, '0000-00-00 00:00:00', 'NGN'),
(6, 'kachi', 'akujua', 'NG', '', 'dsdsds sdsdsd ', 'sdsds', '22322', 232, 4, '4b2531cd29813', 1, '%2B3432233334334', 'smicer66%40yahoo.com', 1, '2009-12-13 19:26:21', 'USD'),
(7, 'kachi', 'akujua', 'NG', '', 'dsdsds sdsdsd ', 'sdsds', '22322', 232, 4, '4b25322678d9b', 1, '%2B3432233334334', 'smicer66%40yahoo.com', 1, '2009-12-13 19:27:50', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_educations_members`
--

CREATE TABLE IF NOT EXISTS `cpj_educations_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `adminPosition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_educations_members`
--

INSERT INTO `cpj_educations_members` (`id`, `userId`, `adminYes`, `adminPosition`, `status`) VALUES
(1, 1, 0, '', 1),
(2, 2, 1, 'President', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_errors`
--

CREATE TABLE IF NOT EXISTS `cpj_errors` (
  `id` int(11) NOT NULL auto_increment,
  `errorCode` varchar(20) NOT NULL,
  `errorStatement` text NOT NULL,
  `errorPixId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `errorCode` (`errorCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `cpj_errors`
--

INSERT INTO `cpj_errors` (`id`, `errorCode`, `errorStatement`, `errorPixId`, `status`) VALUES
(1, 'ERRCPJ0001', 'Sorry Administrator Module can not be accessed as it is presently inactive.\r\n\r\nPlease contact site Administrator to activate the module.', 400, 1),
(2, 'ERRCPJ0002', 'Sorry You can not access this administrator module as it requires higher priviledges.', 400, 1),
(3, 'ERRCPJ0003', 'Sorry Administrator Module can not be accessed as no access level has been set for this module', 400, 1),
(4, 'ERRCPJ004', 'Error! Please select a church tier', 400, 1),
(5, 'ERRCPJ005', 'Error! Please provide the advertisement contents (HTML format)!', 400, 1),
(6, 'ERRCPJ006', 'Error! Please provide the required name', 400, 1),
(7, 'ERRCPJ007', 'Error! Please provide the required image file.', 400, 1),
(8, 'ERRCPJ008', 'Error! To change the present uploaded image, select another image file', 400, 1),
(9, 'ERRCPJ009', 'Error! Problems were encountered uploading your selected file', 400, 1),
(10, 'ERRCPJ010', 'Error! Advert name already exists. Please provide another name.', 400, 1),
(11, 'ERRCPJ011', 'Operation Successful! Menus were mapped successfully to selected feature', 400, 1),
(12, 'ERRCPJ012', 'Error! Menus cannot be mapped. Please select a feature and its feature entry first before mapping menus to it.', 400, 1),
(13, 'ERRCPJ013', 'Delete Operation Successful! ', 400, 1),
(14, 'ERRCPJ014', 'Delete Operation Failed! Item does not exist', 400, 1),
(15, 'ERRCPJ015', 'Error! Please provide the required title.', 400, 1),
(16, 'ERRCPJ016', 'Error! Please provide the required contents of this feature entry.', 400, 1),
(17, 'ERRCPJ017', 'Error! Please provide the frontpage contents of this feature entry.', 400, 1),
(18, 'ERRCPJ018', 'Error! Please provide the article type.', 400, 1),
(19, 'ERRCPJ019', 'Error! Please provide your first name', 400, 1),
(20, 'ERRCPJ020', 'Error! Please provide your last name', 400, 1),
(21, 'ERRCPJ021', 'Error! Please provide your location ', 400, 1),
(22, 'ERRCPJ022', 'Error! Please select if the users can make comments', 400, 1),
(23, 'ERRCPJ024', 'Error! Please Make A Decision If Users are to be notified my mail of blog postings', 400, 1),
(24, 'ERRCPJ023', 'Error! Please Make A Decision If User Comments should be displayed', 400, 1),
(25, 'ERRCPJ025', 'Error! User already has a blog. Only one blog can be assigned to a user', 400, 1),
(26, 'ERRCPJ026', 'Error! Please provide the required topic', 400, 1),
(27, 'ERRCPJ027', 'Error! Please provide the church email address', 400, 1),
(28, 'ERRCPJ028', 'Error! Please provide the location/address of the church tier entry', 400, 1),
(29, 'ERRCPJ029', 'Error! Please provide information about the church tier entry', 400, 1),
(30, 'ERRCPJ030', 'Error! Please provide the phone number of the church tier entry', 400, 1),
(31, 'ERRCPJ031', 'Error! Please provide your names', 400, 1),
(32, 'ERRCPJ032', 'Error! Please provide your email address', 400, 1),
(33, 'ERRCPJ033', 'Error! Please provide the bible quote of this devotional', 400, 1),
(34, 'ERRCPJ034', 'Error! Please provide the one year bible reading of this devotional', 400, 1),
(35, 'ERRCPJ035', 'Error! Please provide the watchword of this devotional', 400, 1),
(36, 'ERRCPJ036', 'Error! Please select or provide the name of the author of this devotional', 400, 1),
(37, 'ERRCPJ037', 'Error! Please provide publication date of this feature entry', 400, 1),
(38, 'ERRCPJ050', 'Error! Please attend to all requirements of this feature entry', 400, 1),
(39, 'ERRCPJ038', 'Error! Please provide the venue of the event', 400, 1),
(40, 'ERRCPJ039', 'Error! Please provide the date of the event', 400, 1),
(41, 'ERRCPJ040', 'Error! Please provide resource persons for the event', 400, 1),
(42, 'ERRCPJ041', 'Error! Please provide the extra information. Extra Information contains important information about the event', 400, 1),
(43, 'ERRCPJ042', 'Error! Please provide the opacity of the slideshow', 400, 1),
(44, 'ERRCPJ043', 'Error! Please provide the timing of the slideshow image display', 400, 1),
(45, 'ERRCPJ044', 'Error! Please provide slideshow style.Default is simple style', 400, 1),
(46, 'ERRCPJ045', 'Error! Please provide the slide title', 400, 1),
(47, 'ERRCPJ047', 'You have been registered successfully into the group. Depending on the settings of this group, the groups administrator may have to grant you access to the group.', 400, 1),
(48, 'ERRCPJ048', 'Your membership with this group has been terminated.', 400, 1),
(49, 'ERRCPJ049', 'Error! Select if the Group is Open to all the general public or to only church web portal members', 400, 1),
(50, 'ERRCPJ051', 'Error! Select if a message board should be added to this group. It enables users to post messages on the group', 400, 1),
(51, 'ERRCPJ052', 'Error! Select if newsletter notification should be added', 400, 1),
(52, 'ERRCPJ053', 'Error! Select if a feedback platform for the users to post messages to the administrator should be added', 400, 1),
(53, 'ERRCPJ054', 'Error! Select if users can view the message board postings', 400, 1),
(54, 'ERRCPJ055', 'Error! Please provide the media name', 400, 1),
(55, 'ERRCPJ056', 'Error! Please select a media type.', 400, 1),
(56, 'ERRCPJ057', 'Error! Please select a media file to be uploaded.', 400, 1),
(57, 'ERRCPJ099', 'Error! Data insertion failure', 400, 1),
(58, 'ERRCPJ101', 'Data was inserted Successfully!', 400, 1),
(59, 'ERRCPJ102', 'Update was Successful!', 400, 1),
(60, 'ERRCPJ103', 'Update was not successful! Please try again.', 400, 1),
(61, 'ERRCPJ104', 'Error! Select newsletter to be sent to receipients', 400, 1),
(62, 'ERRCPJ105', 'Newsletter was sent successfully to receipients', 400, 1),
(63, 'ERRCPJ106', 'Error! Please select a newsletter', 400, 1),
(64, 'ERRCPJ107', 'Error! You have already subscribed for this newsletter before. Contact your administrator to confirm.', 400, 1),
(65, 'ERRCPJ108', 'Subscription to this newsletter was successful!', 400, 1),
(66, 'ERRCPJ109', 'Error! Please provide information to display on the prayer page', 400, 1),
(67, 'ERRCPJ110', 'Your Prayer request has been sent successfully. It will be attended to appropriately. Thank you!', 400, 1),
(68, 'ERRCPJ111', 'Error! Select a church tier.', 400, 1),
(69, 'ERRCPJ112', 'Error! Please provide the author of the item being entered.', 400, 1),
(70, 'ERRCPJ113', 'Error! Please provide the cost for the item being entered', 400, 1),
(71, 'ERRCPJ114', 'Error! Please provide the preview information on the item being uploaded', 400, 1),
(72, 'ERRCPJ115', 'Error! Please select the slideshow to be displayed on this feature', 400, 1),
(73, 'ERRCPJ116', 'Error! Please select the items under the weekly specials!', 400, 1),
(74, 'ERRCPJ117', 'Error! Please select an advert and the feature entry it links to', 400, 1),
(75, 'ERRCPJ121', 'Error! The usertype you provided already exists. Provide another usertype name to create another', 400, 1),
(76, 'ERRCPJ130', 'Error! Login failed. Please provide a valid username and password combination to log in.', 400, 1),
(77, 'ERRCPJ132', 'Error! Registration failed. Please provide valid data for registration.', 400, 1),
(78, 'ERRCPJ131', 'Registration was successful. Please to activate your account, click on the activation link in the email sent to your email box. Check your spam mail if it cannot be found in your inbox.', 400, 1),
(79, 'ERRCPJ133', 'Account modified successfully!', 400, 1),
(80, 'ERRCPJ134', 'Account Modification failed!', 400, 1),
(81, 'ERRCPJ135', 'Your username and new password has been sent to your email box.', 400, 1),
(82, 'ERRCPJ141', 'Error! The template name you provided already exists. Provide another name for this template.', 400, 1),
(83, 'ERRCPJ142', 'Error! Please provide a name for the template you want to upload.', 400, 1),
(84, 'ERRCPJ143', 'Error! Please Provide template creator details.', 400, 1),
(85, 'ERRCPJ144', 'Error! Please Provide the date template was created.', 400, 1),
(86, 'ERRCPJ147', 'Error! Please Provide the Template in its zipped format. See administrator manual for file structure of the zipped templates.', 400, 1),
(87, 'ERRCPJ148', 'Error Encountered Uploading zipped file. Please Select a valid zipped template file.', 400, 1),
(88, 'ERRCPJ149', 'Template installed successfully!', 400, 1),
(89, 'ERRCPJ151', 'Error! Please provide a layer name', 400, 1),
(90, 'ERRCPJ152', 'Error! Church Tier already exists please provide another.', 400, 1),
(91, 'ERRCPJ153', 'Error! Select church tier this entry belongs to.', 400, 1),
(92, 'ERRCPJ154', 'Error! Church tier with the same parent already exists. Please provide correct details.', 400, 1),
(93, 'ERRCPJ161', 'Error! Please provide your administrator username for this site.', 400, 1),
(94, 'ERRCPJ162', 'Error! Please Provide your administrator password for this site.', 400, 1),
(95, 'ERRCPJ163', 'Error! Please confirm the password. The confirmation password should be the same as the password you provided.', 400, 1),
(96, 'ERRCPJ164', 'Error! The two passwords do not match. Ensure they match.', 400, 1),
(97, 'ERRCPJ165', 'Error! Please provide the administrator email.', 400, 1),
(98, 'ERRCPJ171', 'Error! Please provide a valid database name.', 400, 1),
(99, 'ERRCPJ172', 'Error! Please provide the database user name.', 400, 1),
(100, 'ERRCPJ173', 'Error! Please provide the server host. Default is localhost. You are advised to make use of that.', 400, 1),
(101, 'ERRCPJ174', 'Error! Please provide the prefix of your database tables. Default is cpj.', 400, 1),
(102, 'ERRCPJ175', 'Database created successfully!', 400, 1),
(106, 'ERRCPJ180', 'Images uploaded successfully to the default image folder.', 400, 1),
(107, 'ERRCPJ190', 'Error! The shop item you requested is not in stock presently in our store. Please contact our administrator for more information about the item/product.', 400, 1),
(108, 'ERRCPJ191', 'Error! Invalid quantity selected. Only numeric values are accepted.', 400, 1),
(109, 'ERRCPJ192', 'Error! Item added to your cart.', 400, 1),
(110, 'ERRCPJ201', 'Error! Please provide the address for the shipping of your items.', 400, 1),
(111, 'ERRCPJ202', 'Error! Please provide your zip code.', 400, 1),
(112, 'ERRCPJ203', 'Error! Please select or provide the state where the item should be shipped to or collected at.', 400, 1),
(113, 'ERRCPJ204', 'Error! Please select a country where the item should be shipped to.', 400, 1),
(114, 'ERRCPJ205', 'No receipient name provided for the shipping.', 400, 1),
(115, 'ERRCPJ220', 'Error! Please Provide the digits in the captcha image displayed correctly.', 400, 1),
(116, 'ERRCPJ221', 'Error! Email cannot be created.', 400, 1),
(117, 'ERRCPJ222', 'Error! Email account already exists.', 400, 1),
(118, 'ERRCPJ223', 'Operation Successful! Email Account Created.', 400, 1),
(119, 'ERRCPJ224', 'Error! The User account you selected does not exist of its account is not active.', 400, 1),
(120, 'ERRCPJ206', 'Error! No Item in the shopping cart. Please select items first before proceeding.', 400, 1),
(121, 'ERRCPJ062', 'Error! Please provide the name of the feature entry being inserted.', 400, 1),
(122, 'ERRCPJ210', 'Error! No image file(s) selected.', 400, 1),
(123, 'ERRCPJ211', 'Error! No header name provided or the header name is already assigned to a header entry.', 400, 1),
(125, 'ERRCPJ240', 'Error Encountered! The entry already exists in the portal. Please provide another entry.', 400, 1),
(126, 'ERRCPJ241', 'Operation Successful! Entry has been created.', 400, 1),
(127, 'ERRCPJ242', 'Error Encountered! Please provide an entry before attempting to create it.', 400, 1),
(128, 'ERRCPJ243', 'Error Encountered! Please select position the entry falls under', 400, 1),
(129, 'ERRCPJ250', 'Error Encountered! The Prayer Need Exists. Please provide another prayer need.', 400, 1),
(130, 'ERRCPJ251', 'Operation Successful! Prayer Need inserted.', 400, 1),
(131, 'ERRCPJ252', 'Error Encountered! Please provide a valid prayer need.', 400, 1),
(132, 'ERRCPJ260', 'Error Encountered! Please provide a name for the footer entry.', 400, 1),
(133, 'ERRCPJ261', 'Error Encountered! Please provide an contact email for the portal.', 400, 1),
(135, 'ERRCPJ262', 'Error Encountered! Please provide a phone number for the portal.', 400, 1),
(136, 'ERRCPJ263', 'Error Encountered! Please provide an contact address for the portal.', 400, 1),
(137, 'ERRCPJ300', 'Error! Please select a group name before proceeding.', 400, 1),
(138, 'ERRCPJ301', 'Error! No receipients specfied. Please provide the receipients email address.', 400, 1),
(139, 'ERRCPJ350', 'Thanks very much. Your transaction was successful.', 400, 1),
(140, 'ERRCPJ351', 'Error Encountered in processing payments. Please try again.', 400, 1),
(141, 'ERRCPJ501', 'Error! Please select a Programme of study!', 400, 1),
(142, 'ERRCPJ502', 'Sorry You Cannot Register For this Programme As You Have Already Registered Before!', 400, 1),
(143, 'ERRCPJ503', 'Thank you for registering for the programme. Please proceed to pay the required fees.', 400, 1),
(144, 'ERRCPJ601', 'Error! Please provide your first name.', 400, 1),
(145, 'ERRCPJ602', 'Error! Please provide your last name.', 400, 1),
(146, 'ERRCPJ603', 'Error! Please provide your credit card number.', 400, 1),
(147, 'ERRCPJ604', 'Error! Please provide your card verification number.', 400, 1),
(148, 'ERRCPJ605', 'Error! Please provide your address', 400, 1),
(149, 'ERRCPJ606', 'Error! Please provide the city of your location', 400, 1),
(150, 'ERRCPJ607', 'Error! Please select a state', 400, 1),
(151, 'ERRCPJ608', 'Error! Please select a country', 400, 1),
(152, 'ERRCPJ609', 'Error! Please provide your zip code', 400, 1),
(153, 'ERRCPJ610', 'Error! Please provide the amount for the donation.', 400, 1),
(154, 'ERRCPJ611', 'Error! Please provide your phone number.', 400, 1),
(155, 'ERRCPJ612', 'Error! Please provide a valid email.', 400, 1),
(156, 'ERRCPJ613', 'Error! Please provide your email, or phone number required for the subscription', 400, 1),
(157, 'ERRCPJ614', 'Error! You have already subscribed for this feature before.', 400, 1),
(158, 'ERRCPJ615', 'Error! This subscription is invalid. No distribution mode associated to this subscription. Contact your portal administrator for more information', 400, 1),
(159, 'ERRCPJ620', 'Error! Please provide the subscriptions main body contents.', 400, 1),
(160, 'ERRCPJ621', 'Error! Please provide the subscriptions name.', 400, 1),
(161, 'ERRCPJ622', 'Error! Please provide the subscriptions title.', 400, 1),
(162, 'ERRCPJ623', 'Error! Please provide the subscriptions frontpage portlet contents', 400, 1),
(163, 'ERRCPJ624', 'Error! Please select the distribution mode.', 400, 1),
(164, 'ERRCPJ625', 'Error! Please select if user must pay to subscribe', 400, 1),
(165, 'ERRCPJ626', 'Error! You have already paid fees for this  programme of study under the level you specified', 400, 1),
(166, 'ERRCPJ504', 'Error! Please select the courses to be taken.', 400, 1),
(167, 'ERRCPJ505', 'Error! The Courses you have registered has exceeded the maximum units of courses required to be registered.', 400, 1),
(168, 'ERRCPJ506', 'Error! No Courses selected. Please select at least a course before performing the operation.', 400, 1),
(169, 'ERRCPJ507', 'Error! Entry already exists. Please provide another.', 400, 1),
(170, 'ERRCPJ1001', 'Error Encountered! Please provide a username that has not been taken yet.', 400, 1),
(171, 'ERRCPJ1002', 'Error Encountered! Please provide a password which must match the confirmation password. Your password must have at least six(6) characters.', 400, 1),
(172, 'ERRCPJ1003', 'Error! Please provide a valid email that has not been registered on this portal', 400, 1),
(173, 'ERRCPJ1004', 'Error! Please provide a valid phone number.', 0, 1),
(174, 'ERRCPJ701', 'Error! Please select a payment option.', 400, 1),
(175, 'ERRCPJ702', 'Error! The Selected payment module does not exist on the portal', 400, 1),
(176, 'ERRCPJ703', 'Error! Please provide all the information required in order to proceed.', 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_evangel_theatre_members`
--

CREATE TABLE IF NOT EXISTS `cpj_evangel_theatre_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `adminPosition` varchar(100) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_evangel_theatre_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_events`
--

CREATE TABLE IF NOT EXISTS `cpj_events` (
  `id` int(11) NOT NULL auto_increment,
  `venue` text NOT NULL,
  `startDate` date default NULL,
  `endDate` date default NULL,
  `title` varchar(150) NOT NULL,
  `resourcePersons` text NOT NULL,
  `registrationFee` double NOT NULL,
  `mapPictureFileId` int(11) NOT NULL,
  `extraInfo` text NOT NULL,
  `eventLink` varchar(300) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  `frontPageYes` tinyint(1) NOT NULL default '1',
  `PublishedYes` tinyint(1) NOT NULL default '1',
  `frontPageText` text NOT NULL,
  `eventPictureFileId` int(11) NOT NULL,
  `section` varchar(300) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `sectionFpYes` tinyint(4) NOT NULL default '0',
  `downloadFileId` int(11) NOT NULL,
  `grpId` int(11) default NULL,
  `datePeriod` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cpj_events`
--

INSERT INTO `cpj_events` (`id`, `venue`, `startDate`, `endDate`, `title`, `resourcePersons`, `registrationFee`, `mapPictureFileId`, `extraInfo`, `eventLink`, `name`, `status`, `frontPageYes`, `PublishedYes`, `frontPageText`, `eventPictureFileId`, `section`, `sectionId`, `sectionFpYes`, `downloadFileId`, `grpId`, `datePeriod`) VALUES
(1, 'Overland Park Convention Center\r\n6000 College Boulevard\r\nOverland Park, KS 66211 ', '2009-08-03', '2009-08-20', 'Fire Conference', 'Pastor Benny Hinn;\r\nRevd Jacobs', 300, 2, 'Session Schedule:\r\nFriday: 7:00 PM\r\nSaturday: 10:00 AM & 7:00 PM\r\n\r\n(Doors open approximately 1 1/2 hours prior to service time)\r\n\r\nRegistration Fee:Complimentary with Pre-Registration\r\nWhile registration is still required for admission to this event Pastor Benny has waived the registration fee. There will be plenty of available seats for those who pre-register for this unforgettable Fire Conference.\r\n\r\nWorld Healing Fellowship Members who pre-register for this event will receive special reserved seating.\r\n\r\n* Please Note: All children must be registered for this event. No child care will be provided and all children must sit with accompanying adult and be respectful of service environment.\r\n\r\nLocation Details:\r\nThe Overland Park Convention Center offers a high-quality, high-service, high-tech center for trade shows, conventions, training sessions, corporate meetings and social events alike. It is certain to open your eyes to new possibilities in successful meetings and events.\r\n\r\nDirections:\r\nClick Here for Driving Directions\r\n\r\nHotel Information:\r\nSheraton Overland Park At The Convention Center\r\n6100 College Boulevard\r\nOverland Park, KS 66211\r\n913-234-2100\r\nHotel Website\r\n\r\n*Hotel Group Rates:\r\n\r\nTriple/Quad $119\r\n\r\n* All rates are subject to availability and based on room type.  Fees may include advance deposits, cancellation penalties and other charges.  Please contact hotel for further information.  Individuals are responsible for payment of all charges.  Benny Hinn Ministries supplies this information for the convenience of our partners and friends only and will not be held liable for any agreements or charges between the hotel and attendee.\r\n\r\nPastor Benny recently made the exciting announcement that conferences will be followed by a great Miracle Service in the same city! These services are free and open to the public, so come and experience the anointed worship, ministry and healing power of God.', 'http://www.fireconference.com', 'Fire Conference', 1, 0, 1, 'Dear Partners and Friends,\r\n\r\nPastor Benny Hinn will be in Montreal, September 13, 2009 for an unforgettable conference! We expect the Holy Spirit to flow mightily through the preaching of the Word for the edification of Godâ€™s children. \r\n\r\nâ€œIt is not by power, nor by might, but by My Spiritâ€ says the Lord of Hosts. (Zach 4:6) ', 26, '1', 0, 0, 2, NULL, ''),
(2, 'Okpara Square, Enugu. \r\nEnugu State.', '2009-11-27', '2009-11-28', 'Diamond Jubilee Celebrations', 'Revd Dr. Charles Osueke,\r\nand a host of Foreign Guest Speakers', 2323, 0, 'A host of events comprise this celebration such as:\r\n\r\nCultural Display\r\nYouth Football Match', 'http://www.', 'Diamond Jubilee Celebrations', 0, 0, 1, 'Join us as we - Assemblies of God Nigeria celebrate our Jubilee Anniversary. The celebrations commence on the 27th of November 2008 through the 28th of November 2008.\r\n', 26, '1', 0, 0, 0, NULL, '2009-11-27 to 2009-2'),
(9, 'The yearly National Leader`s retreat and prayers will hold at the Evangel camp Okpoto Ebonyi', '2010-01-04', '2010-01-08', 'Leaders'' Retreat', 'Rev. Dr C. O Osueke\r\nRev. Prof Paul Emeka\r\nRev. Dr John Ikoni\r\nRev. Dr Isiagandigi', 0, 0, 'The Program will attract the Leaders from the 88 administrative unit as well as the Presidents of the Bible Colleges', '', 'Leader`s Retreat', 1, 1, 1, 'The Lord is gracious having lead us successfully into the year 2010. Leaders from the 88 administrative units and Bible Colleges will gather to seek the face of the Lord for a glorious 2010', 396, '1', 0, 0, 0, NULL, '11th-15th Jan. 2010'),
(10, '', '2010-04-01', '2010-04-05', 'National Easter Retreat', '', 0, 0, '', '', '', 1, 1, 1, '', 0, '1', 0, 0, 0, NULL, ''),
(11, '8 Ozubulu Street, \r\nIndependence Layout Enugu', NULL, NULL, 'Media Week', 'Media Department members', 0, 0, 'Place Information About Information here', '', 'Media Week', 1, 0, 1, 'Place Frontpage Information here', 214, 'NULL', 0, 0, 215, 11, '9th - 13th, 15th Nov'),
(12, 'The Ordination Service will hold at our National camp Okpoto', NULL, NULL, 'Ordination', 'Rev Charles Osueke', 0, 0, 'The service will be attended by Qualified Ministers who had spend over 13years in ministry with AG', '', 'Ordination', 1, 1, 1, 'Ordination Service', 236, '1', 0, 1, 0, NULL, 'January 15'),
(13, 'dss', NULL, NULL, 'sdsd', 'dfdsf', 2323, 0, 'fsfdsfd dfdsf', 'fdsfdsfdsf', 'sd', 1, 0, 1, 'sdffdsf', 237, '1', 1, 0, 0, NULL, 'dsdsa'),
(14, 'The program will be held in all our local Churches', NULL, NULL, 'Family Life Week', 'Local Church Pastor', 0, 0, 'Our focus is on the success of th family which is the oldest institution', '', 'Family Life Week', 1, 0, 1, 'Family Life Week', 273, '1', 0, 0, 0, NULL, 'February 8th-14th');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_executive_members_members`
--

CREATE TABLE IF NOT EXISTS `cpj_executive_members_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `adminPosition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_executive_members_members`
--

INSERT INTO `cpj_executive_members_members` (`id`, `userId`, `adminYes`, `deleteYes`, `adminPosition`, `status`) VALUES
(1, 1, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_feature_menus`
--

CREATE TABLE IF NOT EXISTS `cpj_feature_menus` (
  `id` int(11) NOT NULL auto_increment,
  `featureId` int(11) NOT NULL,
  `featureChildId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `position` varchar(40) NOT NULL,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

--
-- Dumping data for table `cpj_feature_menus`
--

INSERT INTO `cpj_feature_menus` (`id`, `featureId`, `featureChildId`, `menuId`, `position`, `section`, `sectionId`, `status`) VALUES
(1, 1, 1, 1, '', 0, 0, 1),
(2, 1, 1, 6, '', 0, 0, 1),
(3, 1, 1, 9, '', 0, 0, 1),
(4, 1, 1, 11, '', 0, 0, 1),
(5, 1, 1, 12, '', 0, 0, 1),
(6, 1, 1, 13, '', 0, 0, 1),
(7, 1, 1, 14, '', 0, 0, 1),
(8, 1, 1, 15, '', 0, 0, 1),
(9, 1, 1, 16, '', 0, 0, 1),
(10, 1, 5, 1, '', 0, 0, 1),
(11, 1, 5, 6, '', 0, 0, 1),
(12, 1, 5, 9, '', 0, 0, 1),
(13, 1, 5, 11, '', 0, 0, 1),
(14, 1, 5, 12, '', 0, 0, 1),
(15, 1, 5, 13, '', 0, 0, 1),
(16, 1, 5, 14, '', 0, 0, 1),
(17, 1, 5, 15, '', 0, 0, 1),
(37, 1, 3, 1, '', 0, 0, 1),
(38, 1, 3, 6, '', 0, 0, 1),
(39, 1, 3, 9, '', 0, 0, 1),
(40, 1, 3, 11, 'left', 0, 0, 1),
(41, 1, 3, 12, '', 0, 0, 1),
(42, 1, 3, 13, '', 0, 0, 1),
(43, 1, 3, 14, '', 0, 0, 1),
(44, 1, 3, 15, '', 0, 0, 1),
(45, 1, 3, 16, '', 0, 0, 1),
(46, 1, 6, 1, '', 0, 0, 1),
(47, 1, 6, 6, '', 0, 0, 1),
(48, 1, 6, 9, '', 0, 0, 1),
(49, 1, 6, 11, '', 0, 0, 1),
(50, 1, 6, 12, '', 0, 0, 1),
(51, 1, 6, 13, '', 0, 0, 1),
(52, 1, 6, 14, '', 0, 0, 1),
(53, 1, 6, 15, '', 0, 0, 1),
(54, 1, 6, 16, '', 0, 0, 1),
(55, 1, 5, 16, '', 0, 0, 1),
(56, 1, 2, 1, '', 0, 0, 1),
(57, 1, 2, 6, '', 0, 0, 1),
(58, 1, 2, 9, '', 0, 0, 1),
(59, 1, 2, 11, '', 0, 0, 1),
(60, 1, 2, 12, '', 0, 0, 1),
(61, 1, 2, 13, '', 0, 0, 1),
(62, 1, 2, 14, '', 0, 0, 1),
(63, 1, 2, 15, '', 0, 0, 1),
(64, 1, 2, 16, '', 0, 0, 1),
(65, 13, 0, 1, '', 0, 0, 1),
(66, 13, 0, 6, '', 0, 0, 1),
(67, 13, 0, 9, 'left2', 0, 0, 1),
(68, 13, 0, 11, 'left1', 0, 0, 1),
(69, 13, 0, 12, '', 0, 0, 1),
(70, 13, 0, 13, '', 0, 0, 1),
(71, 13, 0, 14, 'left', 0, 0, 1),
(72, 13, 0, 15, 'left5', 0, 0, 1),
(73, 13, 0, 16, '', 0, 0, 1),
(74, 14, 6, 1, '', 0, 0, 1),
(75, 14, 6, 6, '', 0, 0, 1),
(76, 14, 6, 9, '', 0, 0, 1),
(77, 14, 6, 11, 'left1', 0, 0, 1),
(78, 14, 6, 12, '', 0, 0, 1),
(79, 14, 6, 13, 'left2', 0, 0, 1),
(80, 14, 6, 14, 'left', 0, 0, 1),
(81, 14, 6, 15, 'left5', 0, 0, 1),
(82, 14, 6, 16, '', 0, 0, 1),
(83, 14, 9, 1, '', 0, 0, 1),
(84, 14, 9, 6, '', 0, 0, 1),
(85, 14, 9, 9, '', 0, 0, 1),
(86, 14, 9, 11, 'left2', 0, 0, 1),
(87, 14, 9, 12, 'left1', 0, 0, 1),
(88, 14, 9, 13, '', 0, 0, 1),
(89, 14, 9, 14, 'left', 0, 0, 1),
(90, 14, 9, 15, '', 0, 0, 1),
(91, 14, 9, 16, '', 0, 0, 1),
(92, 9, 0, 1, '', 0, 0, 1),
(93, 9, 0, 6, 'left5', 0, 0, 1),
(94, 9, 0, 9, '', 0, 0, 1),
(95, 9, 0, 11, 'left1', 0, 0, 1),
(96, 9, 0, 12, '', 0, 0, 1),
(97, 9, 0, 13, '', 0, 0, 1),
(98, 9, 0, 14, 'left', 0, 0, 1),
(99, 9, 0, 15, 'left2', 0, 0, 1),
(100, 9, 0, 16, '', 0, 0, 1),
(101, 14, 0, 1, '', 0, 0, 1),
(102, 14, 0, 6, '', 0, 0, 1),
(103, 14, 0, 9, '', 0, 0, 1),
(104, 14, 0, 11, 'left1', 0, 0, 1),
(105, 14, 0, 12, '', 0, 0, 1),
(106, 14, 0, 13, 'left2', 0, 0, 1),
(107, 14, 0, 14, '', 0, 0, 1),
(108, 14, 0, 15, 'left5', 0, 0, 1),
(109, 14, 0, 16, '', 0, 0, 1),
(110, 17, 0, 1, '', 0, 0, 1),
(111, 17, 0, 6, '', 0, 0, 1),
(112, 17, 0, 9, 'left2', 0, 0, 1),
(113, 17, 0, 11, 'left1', 0, 0, 1),
(114, 17, 0, 12, '', 0, 0, 1),
(115, 17, 0, 13, 'back', 0, 0, 1),
(116, 17, 0, 14, 'left', 0, 0, 1),
(117, 17, 0, 15, 'left5', 0, 0, 1),
(118, 17, 0, 16, '', 0, 0, 1),
(119, 22, 0, 1, '', 0, 0, 1),
(120, 22, 0, 6, 'left1', 0, 0, 1),
(121, 22, 0, 9, '', 0, 0, 1),
(122, 22, 0, 11, 'left2', 0, 0, 1),
(123, 22, 0, 12, 'back', 0, 0, 1),
(124, 22, 0, 13, '', 0, 0, 1),
(125, 22, 0, 14, 'left', 0, 0, 1),
(126, 22, 0, 15, 'left5', 0, 0, 1),
(127, 22, 0, 16, '', 0, 0, 1),
(128, 24, 0, 1, '', 0, 0, 1),
(129, 24, 0, 6, 'back', 0, 0, 1),
(130, 24, 0, 9, 'left2', 0, 0, 1),
(131, 24, 0, 11, 'left1', 0, 0, 1),
(132, 24, 0, 12, '', 0, 0, 1),
(133, 24, 0, 13, '', 0, 0, 1),
(134, 24, 0, 14, 'left', 0, 0, 1),
(135, 24, 0, 15, 'left5', 0, 0, 1),
(136, 24, 0, 16, '', 0, 0, 1),
(137, 10, 0, 1, '', 0, 0, 1),
(138, 10, 0, 6, 'left2', 0, 0, 1),
(139, 10, 0, 9, '', 0, 0, 1),
(140, 10, 0, 11, 'left1', 0, 0, 1),
(141, 10, 0, 12, '', 0, 0, 1),
(142, 10, 0, 13, 'left5', 0, 0, 1),
(143, 10, 0, 14, 'left', 0, 0, 1),
(144, 10, 0, 15, '', 0, 0, 1),
(145, 10, 0, 16, '', 0, 0, 1),
(146, 20, 0, 1, '', 0, 0, 1),
(147, 20, 0, 6, 'left1', 0, 0, 1),
(148, 20, 0, 9, '', 0, 0, 1),
(149, 20, 0, 11, 'left2', 0, 0, 1),
(150, 20, 0, 12, 'back', 0, 0, 1),
(151, 20, 0, 13, '', 0, 0, 1),
(152, 20, 0, 14, 'left', 0, 0, 1),
(153, 20, 0, 15, 'left5', 0, 0, 1),
(154, 20, 0, 16, '', 0, 0, 1),
(155, 19, 0, 1, '', 0, 0, 1),
(156, 19, 0, 6, '', 0, 0, 1),
(157, 19, 0, 9, 'left5', 0, 0, 1),
(158, 19, 0, 11, 'left2', 0, 0, 1),
(159, 19, 0, 12, '', 0, 0, 1),
(160, 19, 0, 13, 'back', 0, 0, 1),
(161, 19, 0, 14, 'left', 0, 0, 1),
(162, 19, 0, 15, 'left1', 0, 0, 1),
(163, 19, 0, 16, '', 0, 0, 1),
(164, 21, 0, 1, '', 0, 0, 1),
(165, 21, 0, 6, '', 0, 0, 1),
(166, 21, 0, 9, 'left5', 0, 0, 1),
(167, 21, 0, 11, '', 0, 0, 1),
(168, 21, 0, 12, '', 0, 0, 1),
(169, 21, 0, 13, 'back', 0, 0, 1),
(170, 21, 0, 14, 'left', 0, 0, 1),
(171, 21, 0, 15, 'left2', 0, 0, 1),
(172, 21, 0, 16, '', 0, 0, 1),
(173, 7, 0, 1, '', 0, 0, 1),
(174, 7, 0, 6, 'left1', 0, 0, 1),
(175, 7, 0, 9, 'left2', 0, 0, 1),
(176, 7, 0, 11, 'left5', 0, 0, 1),
(177, 7, 0, 12, '', 0, 0, 1),
(178, 7, 0, 13, '', 0, 0, 1),
(179, 7, 0, 14, 'left', 0, 0, 1),
(180, 7, 0, 15, 'back', 0, 0, 1),
(181, 7, 0, 16, '', 0, 0, 1),
(182, 8, 0, 1, '', 0, 0, 1),
(183, 8, 0, 6, '', 0, 0, 1),
(184, 8, 0, 9, '', 0, 0, 1),
(185, 8, 0, 11, 'left2', 0, 0, 1),
(186, 8, 0, 12, 'left1', 0, 0, 1),
(187, 8, 0, 13, '', 0, 0, 1),
(188, 8, 0, 14, 'left', 0, 0, 1),
(189, 8, 0, 15, '', 0, 0, 1),
(190, 8, 0, 16, '', 0, 0, 1),
(191, 16, 0, 1, '', 0, 0, 1),
(192, 16, 0, 6, '', 0, 0, 1),
(193, 16, 0, 9, '', 0, 0, 1),
(194, 16, 0, 11, 'left2', 0, 0, 1),
(195, 16, 0, 12, '', 0, 0, 1),
(196, 16, 0, 13, '', 0, 0, 1),
(197, 16, 0, 14, 'left', 0, 0, 1),
(198, 16, 0, 15, 'left1', 0, 0, 1),
(199, 16, 0, 16, '', 0, 0, 1),
(200, 3, 0, 1, '', 0, 0, 1),
(201, 3, 0, 6, 'left1', 0, 0, 1),
(202, 3, 0, 9, 'left2', 0, 0, 1),
(203, 3, 0, 11, '', 0, 0, 1),
(204, 3, 0, 12, '', 0, 0, 1),
(205, 3, 0, 13, '', 0, 0, 1),
(206, 3, 0, 14, 'left', 0, 0, 1),
(207, 3, 0, 15, 'left5', 0, 0, 1),
(208, 3, 0, 16, '', 0, 0, 1),
(209, 23, 0, 1, '', 0, 0, 1),
(210, 23, 0, 6, '', 0, 0, 1),
(211, 23, 0, 9, '', 0, 0, 1),
(212, 23, 0, 11, '', 0, 0, 1),
(213, 23, 0, 12, '', 0, 0, 1),
(214, 23, 0, 13, '', 0, 0, 1),
(215, 23, 0, 14, 'left', 0, 0, 1),
(216, 23, 0, 15, 'left1', 0, 0, 1),
(217, 23, 0, 16, '', 0, 0, 1),
(218, 26, 0, 1, '', 0, 0, 1),
(219, 26, 0, 6, 'left1', 0, 0, 1),
(220, 26, 0, 9, '', 0, 0, 1),
(221, 26, 0, 11, 'left2', 0, 0, 1),
(222, 26, 0, 12, '', 0, 0, 1),
(223, 26, 0, 13, '', 0, 0, 1),
(224, 26, 0, 14, 'left', 0, 0, 1),
(225, 26, 0, 15, 'left5', 0, 0, 1),
(226, 26, 0, 16, '', 0, 0, 1),
(227, 27, 0, 1, '', 0, 0, 1),
(228, 27, 0, 6, '', 0, 0, 1),
(229, 27, 0, 9, '', 0, 0, 1),
(230, 27, 0, 11, 'left2', 0, 0, 1),
(231, 27, 0, 12, '', 0, 0, 1),
(232, 27, 0, 13, '', 0, 0, 1),
(233, 27, 0, 14, 'left', 0, 0, 1),
(234, 27, 0, 15, 'left1', 0, 0, 1),
(235, 27, 0, 16, '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_features`
--

CREATE TABLE IF NOT EXISTS `cpj_features` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  `lowestAccessLevel` int(11) NOT NULL,
  `position` varchar(50) NOT NULL default 'body',
  `fpPositionalLevel` int(11) NOT NULL,
  `status` enum('Activated','Deactivated') NOT NULL,
  `sectionYes` tinyint(4) NOT NULL,
  `fpPosition` varchar(50) NOT NULL,
  `mainViewTemplateId` int(11) default NULL,
  `subViewTemplateIds` text,
  `searchYes` tinyint(4) NOT NULL default '1',
  `menuYes` tinyint(4) NOT NULL default '0',
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `menuIds` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cpj_features`
--

INSERT INTO `cpj_features` (`id`, `name`, `frontPageYes`, `lowestAccessLevel`, `position`, `fpPositionalLevel`, `status`, `sectionYes`, `fpPosition`, `mainViewTemplateId`, `subViewTemplateIds`, `searchYes`, `menuYes`, `section`, `sectionId`, `menuIds`) VALUES
(1, 'Announcement', 1, 2, 'body', 11, 'Activated', 1, 'body13', 15, NULL, 1, 1, 0, 0, ''),
(2, 'Devotionals', 1, 1, 'body', 3, 'Activated', 0, 'NULL', 15, NULL, 1, 1, 0, 0, ''),
(3, 'Events', 1, 1, 'body', 2, 'Activated', 0, 'body11', 15, '', 1, 1, 0, 0, ''),
(4, 'Forum', 0, 1, 'body', 18, 'Activated', 0, 'body', 15, NULL, 1, 0, 0, 0, ''),
(5, 'FrontPage SlideShow', 1, 1, 'body7', 1, 'Activated', 0, 'body2', 15, NULL, 1, 1, 0, 0, ''),
(6, 'Guestbook', 0, 1, 'body', 6, 'Activated', 0, 'body', 15, NULL, 1, 0, 0, 0, ''),
(7, 'News', 1, 1, 'body', 4, 'Activated', 0, 'body5', 15, NULL, 1, 1, 0, 0, ''),
(8, 'Prayers', 1, 1, 'body', 8, 'Activated', 0, 'body7', 15, NULL, 1, 1, 0, 0, ''),
(9, 'User', 1, 1, 'body', 9, 'Activated', 0, 'body10', 15, NULL, 1, 1, 0, 0, ''),
(10, 'Contact', 0, 1, 'body', 10, 'Activated', 0, 'body', 15, NULL, 1, 1, 0, 0, ''),
(12, 'Department', 0, 1, 'body', 12, 'Deactivated', 0, 'body', 15, NULL, 1, 1, 0, 0, ''),
(13, 'Frontpage', 1, 1, 'body', 0, 'Activated', 0, 'NULL', 14, NULL, 1, 1, 0, 0, ''),
(14, 'Articles', 1, 1, 'body', 1, 'Activated', 0, 'NULL', 15, NULL, 1, 1, 0, 0, ''),
(15, 'Search', 1, 1, 'body', 1, 'Activated', 0, 'top2', 15, '6', 0, 0, 0, 0, ''),
(16, 'Blog', 1, 1, 'body', 0, 'Activated', 0, 'body12', 15, '0', 1, 1, 0, 0, ''),
(17, 'Groups', 1, 2, 'body', 0, 'Activated', 0, 'body3', 15, NULL, 1, 1, 0, 0, ''),
(18, 'Advertisement', 1, 1, 'body', 1, 'Activated', 0, 'NULL', 15, NULL, 0, 1, 0, 0, ''),
(19, 'Media', 1, 1, 'body', 1, 'Activated', 0, 'body4', 15, NULL, 1, 1, 0, 0, ''),
(20, 'Desk', 1, 1, 'body', 1, 'Activated', 1, 'body1', 15, NULL, 1, 1, 0, 0, ''),
(21, 'Shop', 1, 1, 'body', 0, 'Activated', 0, 'body8', 15, NULL, 1, 1, 0, 0, ''),
(22, 'Section', 0, 0, 'body', 0, 'Activated', 0, 'body', 15, NULL, 1, 1, 0, 0, ''),
(23, 'Newsletter', 0, 0, 'body', 0, 'Activated', 0, 'body', 15, NULL, 1, 1, 0, 0, ''),
(24, 'Donations', 0, 0, 'body', 0, 'Activated', 0, 'body', 15, NULL, 1, 1, 0, 0, ''),
(25, 'Site Map', 0, 0, 'body', 0, 'Activated', 0, 'NULL', 15, NULL, 1, 1, 0, 0, ''),
(26, 'Schools', 0, 0, 'body', 0, 'Activated', 0, '', 15, NULL, 1, 0, 0, 0, ''),
(27, 'Subscriptions', 0, 0, 'body', 0, 'Activated', 0, '', 15, NULL, 1, 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_files`
--

CREATE TABLE IF NOT EXISTS `cpj_files` (
  `id` int(11) NOT NULL auto_increment,
  `uniqueId` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `dateUploaded` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=397 ;

--
-- Dumping data for table `cpj_files`
--

INSERT INTO `cpj_files` (`id`, `uniqueId`, `fileName`, `dateUploaded`, `status`) VALUES
(1, 'dsdsd', 'asdsd', '2009-06-12 09:47:10', 0),
(2, '4a32088fc15c2', '3.JPG', '0000-00-00 00:00:00', 1),
(3, '4a3208b3595b2', '7.JPG', '0000-00-00 00:00:00', 1),
(4, 'sds', 'sdsd', '2009-06-12 09:50:55', 0),
(5, '4a32090091053', '4.JPG', '2009-06-12 09:51:28', 1),
(6, '4a32090d8c232', '8.JPG', '2009-06-12 09:51:41', 1),
(7, '4a320aeb0f233', '8.JPG', '2009-06-12 09:59:39', 1),
(8, '4a320c42416e2', 'banner_left1.png', '2009-06-12 10:05:22', 1),
(9, '4a320c42433fc', 'banner_mid1.png', '2009-06-12 10:05:22', 1),
(10, '4a320c424826e', 'banner_rt1.png', '2009-06-12 10:05:22', 1),
(19, '4a353219182ba', '05_41_17---The-Cross_web.jpg', '2009-06-14 19:23:37', 1),
(20, '4a3534c0128e2', '05_41_17---The-Cross_web.jpg', '2009-06-14 19:34:56', 1),
(21, '4a3552365cc62', '11listmotor_small11.gif', '2009-06-14 21:40:38', 1),
(22, '4a359e4326932', '11listmotor_small11.gif', '2009-06-15 03:05:07', 1),
(23, '4a359eb8aece2', '08.gif', '2009-06-15 03:07:04', 1),
(24, '4a359f501a1fb', '3.JPG', '2009-06-15 03:09:36', 1),
(25, '4a359fc579d3b', '4.JPG', '2009-06-15 03:11:33', 1),
(26, '4a35a21c23e3a', 'AGUU!!!!.jpg', '2009-06-15 03:21:32', 1),
(27, '4a35a21c2c95e', 'attachm6ent.jpg', '2009-06-15 03:21:32', 1),
(28, '4a38ff10eb5a2', '22-08-06_1956.jpg', '2009-06-17 16:34:56', 1),
(29, '4a38ff10eeaa8', '08.gif', '2009-06-17 16:34:56', 1),
(30, '4a390190d2732', '2.JPG', '2009-06-17 16:45:36', 1),
(31, '4a390190d3adc', '3.JPG', '2009-06-17 16:45:36', 1),
(32, '4a39039b9c7ea', '05_41_17---The-Cross_web.jpg', '2009-06-17 16:54:19', 1),
(33, '4a39039b9e7ab', '11listmotor_small11.gif', '2009-06-17 16:54:19', 1),
(34, '4a39047a6f542', '44_flail_collector.jpg', '2009-06-17 16:58:02', 1),
(35, '4a39047a70b91', '22-08-06_2002.jpg', '2009-06-17 16:58:02', 1),
(36, '4a3949ceb98c3', '08.gif', '2009-06-17 21:53:50', 1),
(37, '4a3970f815bab', '7.JPG', '2009-06-18 00:40:56', 1),
(39, '4a6b49106361f', '3.jpg', '2009-07-25 20:04:00', 1),
(40, '4a6b491065422', '499e280c6d603.jpg', '2009-07-25 20:04:00', 1),
(41, '4a6b4910675f2', '499e281c9ac92.jpg', '2009-07-25 20:04:00', 1),
(43, '4a6b491071cc4', '499e285cea9ea.jpg', '2009-07-25 20:04:00', 1),
(44, '4a6b491078482', '499e286d4f972.jpg', '2009-07-25 20:04:00', 1),
(45, '4a6b49107a462', '499e28011fbd3.jpg', '2009-07-25 20:04:00', 1),
(46, '4a6b49107ca6e', '499e28235f75b.jpg', '2009-07-25 20:04:00', 1),
(47, '4a6b49107f292', '499e283356aba.jpg', '2009-07-25 20:04:00', 1),
(49, '4a6b49108354c', 'attachm6ent.jpg', '2009-07-25 20:04:00', 1),
(52, '4a6b491089e98', 'attachme4nt.jpg', '2009-07-25 20:04:00', 1),
(53, '4a7e27bc16ba3', '0.png', '2009-08-09 03:34:52', 1),
(54, '4a7e27f100ffa', 'apm.png', '2009-08-09 03:35:45', 1),
(55, '4a7e2857c21d2', '8_plate.png', '2009-08-09 03:37:27', 1),
(56, '4a7e2ab4bdf6a', '8_plate.png', '2009-08-09 03:47:32', 1),
(57, '4a7e2b0cbfeaa', '8_plate.png', '2009-08-09 03:49:00', 1),
(58, '4a7e2b7305e1b', '8_plate.png', '2009-08-09 03:50:43', 1),
(59, '4a7e2c19b144b', '8_plate.png', '2009-08-09 03:53:29', 1),
(60, '4a7e2c48d8163', '8_plate.png', '2009-08-09 03:54:16', 1),
(61, '4a7e2c90cc1fa', '8_plate.png', '2009-08-09 03:55:28', 1),
(62, '4a7e2ccec549b', '8_plate.png', '2009-08-09 03:56:30', 1),
(63, '4a7e2cefc3d2a', '8_plate.png', '2009-08-09 03:57:03', 1),
(64, '4a7e2d60e489a', 'apm.png', '2009-08-09 03:58:56', 1),
(65, '4a7e2e1bb6653', '0.png', '2009-08-09 04:02:03', 1),
(66, '4a7ec8c3d1b7b', '7_plate.jpg', '2009-08-09 15:01:55', 1),
(67, '4a7ec961a9ada', 'dot.png', '2009-08-09 15:04:33', 1),
(68, '4a823a0e4594a', '1_plate.jpg', '2009-08-12 05:42:06', 1),
(69, '4a823adcf2ebb', '1_plate.jpg', '2009-08-12 05:45:32', 1),
(70, '4a8732c02f5d3', 'header.jpg', '2009-08-16 00:12:16', 1),
(71, '4a873318e53fb', 'header.jpg', '2009-08-16 00:13:44', 1),
(72, '4a873a8080e82', 'header.jpg', '2009-08-16 00:45:20', 1),
(73, '4a873adf1349a', 'header.jpg', '2009-08-16 00:46:55', 1),
(74, '4a8ff63b273c0', 'bg.gif', '2009-08-22 15:44:27', 1),
(75, '4a8ff63b2bc99', 'banner.jpg', '2009-08-22 15:44:27', 1),
(76, '4a8ff63b2d8bb', 'bg.gif', '2009-08-22 15:44:27', 1),
(77, '4a91c4f2bd35b', 'advert.png', '2009-08-24 00:38:42', 1),
(78, '4a96448500bbb', 'Delivering a Message at Washington DC.jpg', '2009-08-27 10:32:05', 1),
(79, '4a96452db71b2', 'end.gif', '2009-08-27 10:34:53', 1),
(80, '4a964da861e6b', 'template_thumbnail.png', '2009-08-27 11:11:04', 1),
(81, '4a964e846aef3', 'banner.jpg', '2009-08-27 11:14:44', 1),
(82, '4a968a99b6213', '284242SDC.jpg', '2009-08-27 15:31:05', 1),
(83, '4a976d9d3b53a', 'XL.html', '2009-08-28 07:39:41', 1),
(84, 'sdskcdiias', 'AVSEQ06.flv', '2009-08-28 08:12:14', 1),
(85, '4aa03d4f6c27b', 'canstock0145344.jpg', '2009-09-04 00:03:59', 1),
(86, '4aa03ef952083', '5290_1204014421710_1269093193_604958_6142793_n.jpg', '2009-09-04 00:11:05', 1),
(87, '4adfc5353ccac', 'home_1_1.jpg', '2009-10-22 04:36:37', 1),
(88, '4adfc61304a3b', 'AG Logo..png', '2009-10-22 04:40:19', 1),
(177, '4aa03ef952083', 'akas.jpg', '2009-10-22 15:52:07', 1),
(178, '4ae12ef1ea9eb', 'banner_strip.png', '2009-10-23 06:20:01', 1),
(179, '4ae12ef2248d9', 'banner_main.png', '2009-10-23 06:20:02', 1),
(180, '4ae12ef22640d', 'banner_strip.png', '2009-10-23 06:20:02', 1),
(181, '4ae1482a48c19', '4a6b49106361f.jpg', '2009-10-23 08:07:38', 1),
(182, '4ae1482a9061d', '4a6b491087a83.jpg', '2009-10-23 08:07:38', 1),
(183, '4ae1482a9277a', '4a6b49105999a.jpg', '2009-10-23 08:07:38', 1),
(184, '4ae1482a9cef8', '4a6b49108128d.jpg', '2009-10-23 08:07:38', 1),
(185, '4ae1482a9ed41', '4a6b491085a4e.jpg', '2009-10-23 08:07:38', 1),
(186, '4ae1482aa0a95', '4a6b4910691c8.jpg', '2009-10-23 08:07:38', 1),
(187, '4ae15b26b3eec', 'gs.png', '2009-10-23 09:28:38', 1),
(188, '4ae16d478d5bb', 'news-headlines-75-diamond-jubilee-01.jpg', '2009-10-23 10:45:59', 1),
(189, '4ae16d47a1000', 'news-headlines-75-diamond-jubilee-02.jpg', '2009-10-23 10:45:59', 1),
(190, '4ae16d47a2c6a', 'news-headlines-75-diamond-jubilee-03.jpg', '2009-10-23 10:45:59', 1),
(191, '4ae16d47b242a', 'news-headlines-75-diamond-jubilee-04.jpg', '2009-10-23 10:45:59', 1),
(192, '4ae16d47b457e', 'news-headlines-75-diamond-jubilee-07.jpg', '2009-10-23 10:45:59', 1),
(193, '4ae16d47b7a2b', 'sd.png', '2009-10-23 10:45:59', 1),
(194, '4ae175c7b5a43', 'news-headlines-75-diamond-jubilee-01.jpg', '2009-10-23 11:22:15', 1),
(195, '4ae175c7b7bb7', 'bad.png', '2009-10-23 11:22:15', 1),
(196, '4ae175c7b9c03', '11.png', '2009-10-23 11:22:15', 1),
(197, '4ae175c7bbaf7', 'sd.png', '2009-10-23 11:22:15', 1),
(198, '4ae175c7bd805', 'news-headlines-75-diamond-jubilee-02.jpg', '2009-10-23 11:22:15', 1),
(199, '4ae175c7bffe5', 'news-headlines-75-diamond-jubilee-03.jpg', '2009-10-23 11:22:15', 1),
(200, '4ae175c7c36e8', 'news-headlines-75-diamond-jubilee-04.jpg', '2009-10-23 11:22:15', 1),
(201, '4ae175c7c5af8', 'news-headlines-75-diamond-jubilee-07.jpg', '2009-10-23 11:22:15', 1),
(202, '4ae175c7c7e6e', 'bad.png', '2009-10-23 11:22:15', 1),
(203, '4ae188977c063', 'person-praying-~-78379-58il.jpg', '2009-10-23 12:42:31', 1),
(204, '4a35a21c23e3', 'dsdsd.jpg', '2009-10-23 14:18:30', 1),
(205, '4ae1ac7c28c5b', 'revdEmeka.png', '2009-10-23 15:15:40', 1),
(206, '4ae1d00d858b7', 'gs.png', '2009-10-23 17:47:25', 1),
(207, '4ae1d0dc224b5', 'gs.png', '2009-10-23 17:50:52', 1),
(208, 'dsdsxss2323d', 'as.png', '2009-10-23 21:14:45', 1),
(209, '4ae258f47193a', 'linus.png', '2009-10-24 03:31:32', 1),
(210, '4ae25f4e4d4c4', 'micheal.png', '2009-10-24 03:58:38', 1),
(211, '4ae26c8bb7d6b', 'Arrow Up.png', '2009-10-24 04:55:07', 1),
(212, '4ae26cec1c13c', 'AG Logo.png', '2009-10-24 04:56:44', 1),
(213, '4ae273a350813', 'mediaman.png', '2009-10-24 05:25:23', 1),
(214, '4ae27a68cb9d2', '4a91c4f2bd35b.png', '2009-10-24 05:54:16', 1),
(215, '4ae27a68ce22a', '4a91c4f2bd35b.png', '2009-10-24 05:54:16', 1),
(216, '4ae2a799b277c', 'ikonimsg.flv', '2009-10-24 09:07:05', 1),
(217, '4ae2aa41036b3', 'profemekamsg.swf', '2009-10-24 09:18:25', 1),
(218, '4ae2ab5b15f94', 'osuekemsg.swf', '2009-10-24 09:23:07', 1),
(219, '4ae2ad2c3d863', 'isighmsg.swf', '2009-10-24 09:30:52', 1),
(220, '4ae2b017a25aa', 'encounters in revelation-front.JPG', '2009-10-24 09:43:19', 1),
(221, '4ae2b0c0635dc', 'the relevance of the holy spirit-front.JPG', '2009-10-24 09:46:08', 1),
(222, '4ae2b1358126c', 'the life and teaching of christ - front.JPG', '2009-10-24 09:48:05', 1),
(223, '4ae2b69790883', 'tenets of faith.JPG', '2009-10-24 10:11:03', 1),
(224, '4ae4cc350fe73', '08.gif', '2009-10-25 23:07:49', 1),
(225, '4ae4ccf1ea3ea', '08.gif', '2009-10-25 23:10:57', 1),
(226, '4ae4d3f416130', '08.gif', '2009-10-25 23:40:52', 1),
(227, '4ae4d4b86ada7', '08.gif', '2009-10-25 23:44:08', 1),
(228, '4ae4d75c09dc8', '08.gif', '2009-10-25 23:55:24', 1),
(229, '4ae596e62f40d', '08.gif', '2009-10-26 13:32:38', 1),
(230, '4ae597050f7ba', '08.gif', '2009-10-26 13:33:09', 1),
(231, '4ae8297f4baf4', '4a6b491085a4e.png', '2009-10-28 12:22:39', 1),
(232, '4ae8307e6d603', '4a6b491085a4e.png', '2009-10-28 12:52:30', 1),
(233, '4aec03e9157c3', 'khhh.jpg', '2009-10-31 10:31:21', 1),
(234, '4af0c97b2f5d4', '1.JPG', '2009-11-04 01:23:23', 1),
(235, '4af1726bbd745', '05_41_17---The-Cross_web.jpg', '2009-11-04 13:24:11', 1),
(236, '4af19db50b79b', '05_41_17---The-Cross_web.jpg', '2009-11-04 16:28:53', 1),
(237, '4af19e4713884', '05_41_17---The-Cross_web.jpg', '2009-11-04 16:31:19', 1),
(238, '4af1bbd882dc3', '1.JPG', '2009-11-04 18:37:28', 1),
(239, '4af1c3cd6939c', '05_41_17---The-Cross_web.jpg', '2009-11-04 19:11:25', 1),
(240, '4af254bf70cb3', '3.JPG', '2009-11-05 05:29:51', 1),
(241, '4af2a7061d169', '1.JPG', '2009-11-05 11:20:54', 1),
(242, '4af2a785d736a', '1.JPG', '2009-11-05 11:23:01', 1),
(243, '4af2a82ad9a0e', '1.JPG', '2009-11-05 11:25:46', 1),
(244, '4af2a8d573ed2', '08.gif', '2009-11-05 11:28:37', 1),
(245, '4afa028245b2e', '08.gif', '2009-11-11 01:17:06', 1),
(246, '4afa02ee909da', '08.gif', '2009-11-11 01:18:54', 1),
(247, '4afa03508e2f3', '08.gif', '2009-11-11 01:20:32', 1),
(248, '4afa03bac2e15', '08.gif', '2009-11-11 01:22:18', 1),
(249, '4afabb6d53bdc', '05_41_17---The-Cross_web.jpg', '2009-11-11 14:26:05', 1),
(250, '4afad9c29926d', '05_41_17---The-Cross_web.jpg', '2009-11-11 16:35:30', 1),
(251, '4afafa6c89f0c', '05_41_17---The-Cross_web.jpg', '2009-11-11 18:54:52', 1),
(252, '4afafcc4a8753', '6.JPG', '2009-11-11 19:04:52', 1),
(253, '4afafce1cf083', '6.JPG', '2009-11-11 19:05:21', 1),
(254, '4afafcf3222e3', '6.JPG', '2009-11-11 19:05:39', 1),
(255, '4afafd30b9cac', '6.JPG', '2009-11-11 19:06:40', 1),
(256, '4afafd822ee02', '6.JPG', '2009-11-11 19:08:02', 1),
(257, '4afafe0bd5614', '6.JPG', '2009-11-11 19:10:19', 1),
(258, '4afafe36b083b', '08.gif', '2009-11-11 19:11:02', 1),
(259, '4afbd36d0a7fc', '7.JPG', '2009-11-12 10:20:45', 1),
(260, '4afbd3aee2133', '7.JPG', '2009-11-12 10:21:50', 1),
(261, '4afbd3ed416e2', '7.JPG', '2009-11-12 10:22:53', 1),
(262, '4afbd437ef03b', '7.JPG', '2009-11-12 10:24:07', 1),
(263, '4afbd468b277b', '7.JPG', '2009-11-12 10:24:56', 1),
(264, '4afbd47dd987b', '7.JPG', '2009-11-12 10:25:17', 1),
(265, '4afbd4b6c8323', '7.JPG', '2009-11-12 10:26:14', 1),
(266, '4afbd4e417ed4', '7.JPG', '2009-11-12 10:27:00', 1),
(267, '4afbd50408ca2', '7.JPG', '2009-11-12 10:27:32', 1),
(268, '4afbd65ccb203', '05_41_17---The-Cross_web.jpg', '2009-11-12 10:33:16', 1),
(269, '4afbd6822d693', '05_41_17---The-Cross_web.jpg', '2009-11-12 10:33:54', 1),
(270, '4afbdc398f4fc', '05_41_17---The-Cross_web.jpg', '2009-11-12 10:58:17', 1),
(271, '4afbe5eed812c', '05_41_17---The-Cross_web.jpg', '2009-11-12 11:39:42', 1),
(272, '4afbe635877fb', '05_41_17---The-Cross_web.jpg', '2009-11-12 11:40:53', 1),
(273, '4afbe6923ebec', '05_41_17---The-Cross_web.jpg', '2009-11-12 11:42:26', 1),
(274, '4afbecdb510e4', '05_41_17---The-Cross_web.jpg', '2009-11-12 12:09:15', 1),
(275, '4afbecdb53572', '08.gif', '2009-11-12 12:09:15', 1),
(276, '4afbecdb580f5', '2.JPG', '2009-11-12 12:09:15', 1),
(277, '4afc3c6788b83', '05_41_17---The-Cross_web.jpg', '2009-11-12 17:48:39', 1),
(278, '4afc3c792bf23', '05_41_17---The-Cross_web.jpg', '2009-11-12 17:48:57', 1),
(279, '4afc3f524517b', '05_41_17---The-Cross_web.jpg', '2009-11-12 18:01:06', 1),
(280, '4afc4bbf474a3', '05_41_17---The-Cross_web.jpg', '2009-11-12 18:54:07', 1),
(281, '4afc4bcb8e55b', '05_41_17---The-Cross_web.jpg', '2009-11-12 18:54:19', 1),
(282, '4afc5d396d21a', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:41', 1),
(283, '4afc5d396d21a', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:41', 1),
(284, '4afc5d415b10b', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:49', 1),
(285, '4afc5d415b10b', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:49', 1),
(286, '4afc5d47a1223', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:55', 1),
(287, '4afc5d47a1223', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:55', 1),
(288, '4afc5d4be6b6b', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:59', 1),
(289, '4afc5d4be6b6b', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:08:59', 1),
(290, '4afc5d6d67c2a', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:09:33', 1),
(291, '4afc5d6d67c2a', '05_41_17---The-Cross_web.jpg', '2009-11-12 20:09:33', 1),
(292, '4afcffba186bd', '08.gif', '2009-11-13 07:42:02', 1),
(293, '4afcffba186bd', '08.gif', '2009-11-13 07:42:02', 1),
(294, '4afcfffe77243', '08.gif', '2009-11-13 07:43:10', 1),
(295, '4afcfffe77243', '08.gif', '2009-11-13 07:43:10', 1),
(296, '4afd003a5a552', '08.gif', '2009-11-13 07:44:10', 1),
(297, '4afd003a5a552', '08.gif', '2009-11-13 07:44:10', 1),
(298, '4afd007379d3b', '08.gif', '2009-11-13 07:45:07', 1),
(299, '4afd007379d3b', '08.gif', '2009-11-13 07:45:07', 1),
(300, '4afd0082be2fa', '08.gif', '2009-11-13 07:45:22', 1),
(301, '4afd0082be2fa', '08.gif', '2009-11-13 07:45:22', 1),
(302, '4afd009a24ddb', '08.gif', '2009-11-13 07:45:46', 1),
(303, '4afd009a24ddb', '08.gif', '2009-11-13 07:45:46', 1),
(304, '4afd0247059da', '08.gif', '2009-11-13 07:52:55', 1),
(305, '4afd0247059da', '08.gif', '2009-11-13 07:52:55', 1),
(306, '4afd027ddb7cd', '08.gif', '2009-11-13 07:53:49', 1),
(307, '4afd02a5e733a', '08.gif', '2009-11-13 07:54:29', 1),
(308, '4afd033295e71', '08.gif', '2009-11-13 07:56:50', 1),
(309, '4afd0f9116c39', '05_41_17---The-Cross_web.jpg', '2009-11-13 08:49:37', 1),
(310, '4afe5f0511d2c', 'Test2.zip', '2009-11-14 08:40:53', 1),
(311, '4afe5fe44d64c', 'Test2.zip', '2009-11-14 08:44:36', 1),
(312, '4afe6bda2ab9e', 'update.zip', '2009-11-14 09:35:38', 1),
(313, '4afe6c325d04b', 'update01-11.zip', '2009-11-14 09:37:06', 1),
(314, '4afe6c7e854d2', 'update01-11.zip', '2009-11-14 09:38:22', 1),
(315, '4afe6cf056ea3', 'update01-11.zip', '2009-11-14 09:40:16', 1),
(316, '4afe6d2984d03', 'update01-11.zip', '2009-11-14 09:41:13', 1),
(317, '4afe6d4e5c0aa', 'update01-11.zip', '2009-11-14 09:41:50', 1),
(318, '4afe6e0aa6043', 'update01-11.zip', '2009-11-14 09:44:58', 1),
(319, '4afe6e511e07b', 'update01-11.zip', '2009-11-14 09:46:09', 1),
(320, '4afe6fafd84f4', 'update01-11.zip', '2009-11-14 09:51:59', 1),
(321, '4afe6ff2dcb43', 'update012.zip', '2009-11-14 09:53:06', 1),
(322, '4afe747b802cb', 'update012.zip', '2009-11-14 10:12:27', 1),
(323, '4afe751be1194', 'update012.zip', '2009-11-14 10:15:07', 1),
(324, '4afe75750908b', 'update012.zip', '2009-11-14 10:16:37', 1),
(325, '4afe7595ec15a', 'update012.zip', '2009-11-14 10:17:09', 1),
(326, '4afe75cad2b1b', 'update012.zip', '2009-11-14 10:18:02', 1),
(327, '4afe76164c6ab', 'update012.zip', '2009-11-14 10:19:18', 1),
(328, '4afe766939213', 'update012.zip', '2009-11-14 10:20:41', 1),
(329, '4afe768c858bb', 'update012.zip', '2009-11-14 10:21:16', 1),
(330, '4afe76d67c064', 'update012.zip', '2009-11-14 10:22:30', 1),
(331, '4afe77133a1b2', 'update012.zip', '2009-11-14 10:23:31', 1),
(332, '4afe77e39a4c3', 'update012.zip', '2009-11-14 10:26:59', 1),
(333, '4afe780ece8b2', 'update012.zip', '2009-11-14 10:27:42', 1),
(334, '4afe787b87413', 'update012.zip', '2009-11-14 10:29:31', 1),
(335, '4afe78bd34fab', 'update012.zip', '2009-11-14 10:30:37', 1),
(336, '4afe791f69b6b', 'update012.zip', '2009-11-14 10:32:15', 1),
(337, '4afe7bd024223', 'update012.zip', '2009-11-14 10:43:44', 1),
(338, '4afe7c936f16a', 'update012.zip', '2009-11-14 10:46:59', 1),
(339, '4afe7cbbcb5eb', 'update012.zip', '2009-11-14 10:47:39', 1),
(340, '4afe8be9d0023', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:52:25', 1),
(341, '4afe8c2137e8b', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:53:21', 1),
(342, '4afe8c3441eb3', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:53:40', 1),
(343, '4afe8c6c5340b', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:54:36', 1),
(344, '4afe8c75acda4', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:54:45', 1),
(345, '4afe8c7bce0e4', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:54:51', 1),
(346, '4afe8c862078b', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:55:02', 1),
(347, '4afe8c8d84d03', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:55:09', 1),
(348, '4afe8ca61a5e3', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:55:34', 1),
(349, '4afe8cb4631f3', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:55:48', 1),
(350, '4afe8cbb8b293', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:55:55', 1),
(351, '4afe8cdc4e9d3', 'Nigeria_Employment_Ad_Feb05.pdf', '2009-11-14 11:56:28', 1),
(352, '4afe8e982f9bb', '1.JPG', '2009-11-14 12:03:52', 1),
(353, '4b042ae364d4b', 'trinity.mp3', '2009-11-18 18:12:03', 1),
(354, '4b0437461e466', 'trinity.mp3', '2009-11-18 19:04:54', 1),
(355, '4b06b1eed15c2', '08.gif', '2009-11-20 16:12:46', 1),
(356, '4b06c95a02ee6', '05_41_17---The-Cross_web.jpg', '2009-11-20 17:52:42', 1),
(357, '4b06c98ac4c73', '05_41_17---The-Cross_web.jpg', '2009-11-20 17:53:30', 1),
(358, '4b06eea108cab', 'attachme8nt.jpg', '2009-11-20 20:31:45', 1),
(359, '4b06ef7a704e3', 'attachme8nt.jpg', '2009-11-20 20:35:22', 1),
(360, '4b06ef8c2bf23', 'attachme8nt.jpg', '2009-11-20 20:35:40', 1),
(361, '4b06ef8c4519e', 'attachme9nt.jpg', '2009-11-20 20:35:40', 1),
(362, '4b06efb2de2b3', 'attachme8nt.jpg', '2009-11-20 20:36:18', 1),
(363, '4b06efb2e41e4', 'attachme9nt.jpg', '2009-11-20 20:36:18', 1),
(364, '4b06efb2e5edc', 'b7b68a6f-6139-4f6d-b97f-fb8d51f61412.jpg', '2009-11-20 20:36:18', 1),
(370, '4b06f4536fd13', 'chrome-205_noshadow.png', '2009-11-20 20:56:03', 1),
(371, '4b07be3a5e3d4', 'chrome-205_noshadow.png', '2009-11-21 11:17:30', 1),
(372, '4b07bf4a0d2f3', 'chrome-205_noshadow.png', '2009-11-21 11:22:02', 1),
(373, '4b07d344d040b', '05_41_17---The-Cross_web.jpg', '2009-11-21 12:47:16', 1),
(374, '4b07d37254f63', '8.JPG', '2009-11-21 12:48:02', 1),
(375, '4b07d742b94db', '08.gif', '2009-11-21 13:04:18', 1),
(376, '4b083900b4d49', '7.JPG', '2009-11-21 20:01:20', 1),
(377, '4b08398debeb8', '7.JPG', '2009-11-21 20:03:41', 1),
(378, '4b0ba6382de63', '1.JPG', '2009-11-24 10:24:08', 1),
(379, '4b0ba6389356f', '2.JPG', '2009-11-24 10:24:08', 1),
(382, '4b0ba6cc30573', '05_41_17---The-Cross_web.jpg', '2009-11-24 10:26:36', 1),
(383, '4b0ba72f8879c', 'American-Gangster-2007-013-01.jpg', '2009-11-24 10:28:15', 1),
(384, '4b0ba760eb98b', 'Abuja, UNN.jpg', '2009-11-24 10:29:04', 1),
(385, '4b0c1bae17704', '22-08-06_1956.jpg', '2009-11-24 18:45:18', 1),
(386, 'sa32sd32dd', 's.wmv', '2009-12-01 12:15:40', 1),
(387, '4b15124f90fb0', 'test-wav.wav', '2009-12-01 13:55:43', 1),
(388, '4b1d2ad32f400', '1.JPG', '2009-12-07 17:18:27', 1),
(389, '4b1d2d3a3c713', '1.JPG', '2009-12-07 17:28:42', 1),
(390, '4b3a3e082f631', 'Build ur Church Lord. Acappella.mp3', '2009-12-29 11:36:08', 1),
(391, '4b3b6e80468a9', 'peniel 2009.mp3', '2009-12-30 09:15:12', 1),
(392, '4b3f6c0a86d7c', 'SDC12361.JPG', '2010-01-02 09:53:46', 1),
(393, '4b46b63961017', 'IMG0149A.jpg', '2010-01-07 22:36:09', 1),
(394, '4b46b79810cd1', 'holy sirit.jpg', '2010-01-07 22:42:00', 1),
(395, '4b46b8783069c', 'holy sirit.jpg', '2010-01-07 22:45:44', 1),
(396, '4b46bff40151f', 'holy sirit.jpg', '2010-01-07 23:17:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_footer`
--

CREATE TABLE IF NOT EXISTS `cpj_footer` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `portalEmail` varchar(100) NOT NULL,
  `portalContactAddress` varchar(500) NOT NULL,
  `portalPhone` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpj_footer`
--

INSERT INTO `cpj_footer` (`id`, `name`, `portalEmail`, `portalContactAddress`, `portalPhone`, `status`) VALUES
(3, 'footer1', 'info@agnigeria.com', 'Assemblies Of God Nigeria. 12 Ozubulu Road, Independence Layout. Enugu State. Nigeria', '+2349038910291', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_forum`
--

CREATE TABLE IF NOT EXISTS `cpj_forum` (
  `id` int(11) NOT NULL auto_increment,
  `threadTitle` varchar(500) NOT NULL,
  `authorId` int(11) NOT NULL,
  `datePosted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `noOfViews` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `message` text NOT NULL,
  `platformId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_forum`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_forum_platform`
--

CREATE TABLE IF NOT EXISTS `cpj_forum_platform` (
  `id` int(11) NOT NULL auto_increment,
  `platformName` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `dateCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `platformInfo` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_forum_platform`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_frontpage_slideshow`
--

CREATE TABLE IF NOT EXISTS `cpj_frontpage_slideshow` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL,
  `backgroundId` int(11) NOT NULL,
  `opacity` double(5,2) NOT NULL default '0.63',
  `timing` int(11) NOT NULL default '5',
  `style` enum('Simple','Complex') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  `featureId` int(11) NOT NULL,
  `section` varchar(30) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `slideText` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cpj_frontpage_slideshow`
--

INSERT INTO `cpj_frontpage_slideshow` (`id`, `name`, `backgroundId`, `opacity`, `timing`, `style`, `status`, `frontPageYes`, `featureId`, `section`, `sectionId`, `slideText`) VALUES
(1, 'FPSS1', 0, 0.63, 5, 'Simple', 1, 0, 0, '4', 1, ''),
(2, 'FPSS2', 0, 0.63, 5, 'Simple', 0, 0, 0, '1', 0, ''),
(3, 'FPSS3', 0, 0.63, 5, 'Simple', 0, 0, 0, '1', 0, ''),
(4, 'FPSS4', 0, 0.63, 5, 'Simple', 0, 0, 0, '1', 0, ''),
(5, 'twitter', 0, 0.63, 5, 'Simple', 1, 0, 0, '1', 0, 'Worship God In Spirit & In Truth!'),
(6, 'New Slide Show', 0, 0.63, 5, 'Simple', 1, 1, 0, '1', 0, 'We are a people of the Spirit'),
(7, 'Event SlideShow', 0, 0.63, 5, 'Simple', 1, 0, 0, '1', 0, 'Event SlideShow'),
(8, 'Events Slideshow', 0, 0.63, 5, 'Simple', 1, 0, 0, '1', 0, 'Events Slideshow'),
(15, 'Teddy', 0, 0.63, 5, 'Simple', 1, 0, 0, '1', 0, 'As usual');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_group_information`
--

CREATE TABLE IF NOT EXISTS `cpj_group_information` (
  `id` int(11) NOT NULL auto_increment,
  `information` text NOT NULL,
  `grpId` int(11) NOT NULL,
  `srcId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datePosted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `title` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_group_information`
--

INSERT INTO `cpj_group_information` (`id`, `information`, `grpId`, `srcId`, `status`, `datePosted`, `title`) VALUES
(1, 'dsdsd', 9, 0, 1, '2009-11-12 17:24:39', 'asds'),
(2, 'sdsadsdsad', 7, 1, 1, '2009-11-12 17:32:34', 'sdsdsad');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_group_message`
--

CREATE TABLE IF NOT EXISTS `cpj_group_message` (
  `id` int(11) NOT NULL auto_increment,
  `srcId` int(11) NOT NULL,
  `grpId` int(11) NOT NULL,
  `postedDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cpj_group_message`
--

INSERT INTO `cpj_group_message` (`id`, `srcId`, `grpId`, `postedDate`, `message`, `status`) VALUES
(3, 0, 0, '0000-00-00 00:00:00', 'sds sds', 1),
(4, 0, 0, '2009-08-12 21:55:16', 'sdasdsa', 1),
(5, 7, 11, '2009-10-24 05:49:02', 'Media week comes up between 9th - 13th, 15th November 2009', 1),
(11, 2, 7, '2009-10-31 10:09:35', 'Jesus us lord', 1),
(12, 2, 7, '2009-10-31 10:10:35', 'sadsd', 1),
(13, 2, 7, '2009-10-31 10:15:18', 'fdsfsdfsdf', 1),
(14, 1, 7, '2009-11-11 02:45:36', 'dsdsadasd', 1),
(15, 1, 7, '2009-11-11 02:45:42', 'sdsds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_groups`
--

CREATE TABLE IF NOT EXISTS `cpj_groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `messageBoardYes` tinyint(4) NOT NULL,
  `openToAllMembersYes` tinyint(4) NOT NULL,
  `newsletterYes` tinyint(4) NOT NULL,
  `adminFeedbackYes` tinyint(4) NOT NULL,
  `messageViewYes` tinyint(4) NOT NULL,
  `pictureFileId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sectionYes` tinyint(4) NOT NULL,
  `groupEmail` varchar(120) NOT NULL,
  `groupDescription` text NOT NULL,
  `groupContactInfo` text NOT NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  `frontPageText` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cpj_groups`
--

INSERT INTO `cpj_groups` (`id`, `name`, `title`, `section`, `sectionId`, `messageBoardYes`, `openToAllMembersYes`, `newsletterYes`, `adminFeedbackYes`, `messageViewYes`, `pictureFileId`, `status`, `sectionYes`, `groupEmail`, `groupDescription`, `groupContactInfo`, `frontPageYes`, `frontPageText`) VALUES
(1, 'Sunday School', 'Sunday School', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 'sundayschool@agnigeria.com', '', '', 0, ''),
(2, 'Youth Ministries', 'Youth Ministries', 1, 0, 1, 1, 0, 0, 1, 0, 1, 0, 'youthministries@agnigeria.com', 'Jesus is Lord', 'Plot', 0, ''),
(3, 'Evangel Camp', 'Evangel Camp', 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 'evangelcamp@agnigeria.com', '', '', 0, ''),
(4, 'Ambassadors of the Kingdom', 'Ambassadors of the Kingdom', 1, 0, 0, 0, 0, 0, 0, 66, 1, 0, 'kingdom_ambassadors@agnigeria.com', 'a', 'a', 0, ''),
(5, 'Church of later day sents', 'plosaert', 1, 0, 1, 1, 1, 0, 1, 67, 0, 0, 'lasf@sksd.com', 'We love to party', '2kd kcx xc', 0, ''),
(6, 'Corporate Ministries', 'Corporate Ministries', 1, 0, 1, 1, 1, 1, 1, 68, 1, 0, 'corporateministries@agnigeria.com', '', '', 0, ''),
(7, 'Educations', 'Educations', 1, 0, 1, 1, 1, 1, 1, 69, 1, 0, 'educations@agnigeria.com', 'We love to worship jesus as he his the king of kings', '4 egbu Street', 0, 'We love to worship jesus as he his the king of kings. There is a reason Why God Created ABC. Its a group that reasons for today.'),
(8, 'Missions', 'Missions & Fields', 1, 0, 0, 1, 0, 0, 0, 87, 1, 0, 'missions@agnigeria.com', 'The Assemblies of God Church heartily welcomes you to its new website. We hope you visit everyday even as we look forward to providing you with daily information to soothe your physical and spiritual needs. The Assemblies of God Church heartily welcomes you to its new website. We hope you visit everyday even as we look forward to providing you with daily information to soothe your physical and spiritual needs. The Assemblies of God Church heartily welcomes you to its new website. We hope you visit everyday even as we look forward to providing you with daily information to soothe your physical and spiritual needs.', '', 0, ''),
(9, 'Evangel Theatre', 'dsdsd', 1, 0, 0, 0, 0, 0, 0, 88, 0, 0, '', '', '', 0, ''),
(10, 'GS Ministries', 'GS Ministries', 1, 0, 1, 1, 1, 0, 0, 187, 1, 0, 'gs@agnigeria.com', 'This group highlights the General Superintendents Activities.', 'General Superintendent Suite\r\nEvangel House,\r\nEnugu.\r\nNigeria', 1, '&nbsp;&nbsp;&#8226;&nbsp;&nbsp;Read Weekly Exhortation<br>&nbsp;&nbsp;&#8226;&nbsp;&nbsp;Q&A With the GS<br>&nbsp;&nbsp;&#8226;&nbsp;&nbsp;Crusades<br> &nbsp;&nbsp;&#8226;&nbsp;&nbsp;Books<br>&nbsp;&nbsp;&#8226;&nbsp;&nbsp;News and other activities<br> and lots more ...'),
(11, 'Media Department', 'Media Department', 1, 0, 1, 0, 1, 1, 1, 212, 1, 0, 'media@agnigeria.com', 'Welcome to the Media Department of Assemblies of God Nigeria. The overall purpose of the department is to keep the church on the cutting edge of modern communication technology in fulfilling the Great Commission. This purpose will be realized by;\r\n\r\n1) Producing and marketing those products that are in harmony with our reasons-for-being.\r\n\r\n2) Keeping our production cost under control and strive to increase productivity through efficient personnel and equipment.\r\n\r\n3) Providing suitable radio and television gospel programmes.\r\n\r\n4) Providing and equipping a viable resource centre and library/archives\r\n\r\n5) Maintaining good public relations for the church.', 'Media Ministries Department,\r\nGeneral Council,\r\nAssemblies of God, Nigeria,\r\nPlot R8 Ozubulu Street,\r\nIndependence Layout,\r\nP. O. Box 395,\r\nEnugu.\r\nTel: +2348033166672', 0, ''),
(14, 'dsdsd', 'sdsad', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'dsds@dsd.com', 'sdsadsad', 'dsadasd', 0, ''),
(15, 'Executive Members', 'Executive Members', 1, 0, 1, 0, 1, 0, 1, 370, 1, 0, 'executivemembers@agnigeria.com', 'This is ', 'skd', 0, ''),
(16, 'Men Ministries', 'Men Ministries', 1, 0, 1, 1, 1, 0, 1, 371, 1, 0, 'menministries@agnigeria.com', 'Men are for Christ', 'Plot R8 Ozubulu street independence layout, Enugu', 0, ''),
(17, 'Women Ministries', 'Women Ministries', 1, 0, 1, 0, 1, 0, 1, 372, 1, 0, 'womenministries@agnigeria.com', 'Women are for Men', 'Plot ', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_gs_ministries_members`
--

CREATE TABLE IF NOT EXISTS `cpj_gs_ministries_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `adminPosition` varchar(100) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_gs_ministries_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_guestbook`
--

CREATE TABLE IF NOT EXISTS `cpj_guestbook` (
  `id` int(11) NOT NULL auto_increment,
  `usersName` varchar(30) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `datePosted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_guestbook`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_header`
--

CREATE TABLE IF NOT EXISTS `cpj_header` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `activated` enum('Activated','Deactivated') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cpj_header`
--

INSERT INTO `cpj_header` (`id`, `name`, `status`, `activated`) VALUES
(1, '', 1, 'Deactivated'),
(2, 'ABC', 1, 'Deactivated'),
(3, 'ASDD', 1, 'Deactivated'),
(4, 'adf', 1, 'Deactivated'),
(5, 'ddsd', 1, 'Deactivated'),
(6, 'asd', 1, 'Deactivated'),
(7, '', 1, 'Deactivated'),
(8, 'Header1', 0, 'Deactivated'),
(9, 'AGN', 0, 'Deactivated'),
(10, 'New banner', 1, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_header_images`
--

CREATE TABLE IF NOT EXISTS `cpj_header_images` (
  `id` int(11) NOT NULL auto_increment,
  `headerId` int(11) NOT NULL,
  `backgroundYes` tinyint(4) NOT NULL,
  `fileId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cpj_header_images`
--

INSERT INTO `cpj_header_images` (`id`, `headerId`, `backgroundYes`, `fileId`, `status`) VALUES
(1, 7, 0, 7, 1),
(2, 8, 0, 8, 1),
(3, 8, 1, 9, 1),
(4, 8, 0, 10, 1),
(5, 9, 1, 74, 1),
(6, 9, 0, 75, 1),
(7, 9, 1, 76, 1),
(8, 10, 1, 178, 1),
(9, 10, 0, 179, 1),
(10, 10, 1, 180, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_local_church`
--

CREATE TABLE IF NOT EXISTS `cpj_local_church` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentNodeId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpj_local_church`
--

INSERT INTO `cpj_local_church` (`id`, `name`, `parentNodeId`, `status`, `information`) VALUES
(1, 'AG Onuiyi', 1, 1, ''),
(2, 'Mokola', 4, 1, ''),
(3, 'Ijaye', 5, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_logger`
--

CREATE TABLE IF NOT EXISTS `cpj_logger` (
  `id` int(11) NOT NULL auto_increment,
  `sessId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `data` text NOT NULL,
  `logDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `cpj_logger`
--

INSERT INTO `cpj_logger` (`id`, `sessId`, `userId`, `data`, `logDate`, `status`) VALUES
(1, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:37:43', 0),
(2, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:37:46', 0),
(3, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:38:05', 0),
(4, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:39:14', 0),
(5, 59, 1, 'a:2:{s:6:"secYes";i:1;s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:48:25', 0),
(6, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:52:27', 0),
(7, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:54:24', 0),
(8, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:55:42', 0),
(9, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:56:01', 0),
(10, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:56:08', 0),
(11, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:56:22', 0),
(12, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:58:03', 0),
(13, 59, 1, 'a:2:{s:6:"secYes";i:1;s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:58:31', 0),
(14, 59, 1, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 15:58:56', 0),
(15, 59, 10, 'a:1:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 16:05:58', 0),
(16, 59, 10, 'a:2:{s:6:"secYes";i:1;s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";}', '2009-09-07 16:06:32', 0),
(17, 59, 1, 'a:2:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";s:3:"uid";N;}', '2009-09-07 17:20:10', 0),
(18, 59, 1, 'a:2:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";s:3:"uid";N;}', '2009-09-07 17:20:30', 0),
(19, 59, 1, 'a:2:{s:6:"sessId";s:32:"59a518531b4c5882a593c44a016cdf3b";s:3:"uid";s:1:"1";}', '2009-09-07 17:21:41', 0),
(20, 0, 1, 'a:17:{s:7:"section";i:0;s:9:"sectionId";i:0;s:6:"values";a:8:{s:10:"USERNAME11";s:0:"";s:10:"PASSWORD11";s:0:"";s:10:"PASSWORD12";s:0:"";s:5:"EMAIL";s:0:"";s:7:"PROFILE";s:0:"";s:5:"SPECS";s:0:"";s:13:"selectBidTemp";s:0:"";s:11:"BidTempName";s:0:"";}s:4:"temp";a:1:{s:8:"password";s:0:"";}s:6:"errors";a:15:{s:10:"USERNAME11";s:6:"hidden";s:10:"PASSWORD11";s:8:"style37a";s:10:"PASSWORD12";s:6:"hidden";s:8:"HRLYRATE";s:6:"hidden";s:5:"EMAIL";s:6:"hidden";s:7:"PROFILE";s:6:"hidden";s:5:"SPECS";s:6:"hidden";s:3:"msg";s:6:"hidden";s:9:"BIDPERIOD";s:6:"hidden";s:9:"BIDAMOUNT";s:6:"hidden";s:12:"chkReadTerms";s:6:"hidden";s:11:"BIDSELECTOR";s:6:"hidden";s:11:"BidTempName";s:6:"hidden";s:12:"REALPASSWORD";s:6:"hidden";s:7:"SPECIFY";s:6:"hidden";}s:5:"proid";s:0:"";s:7:"id_temp";s:0:"";s:7:"postprj";a:1:{s:7:"SPECIFY";s:0:"";}s:8:"shopCart";s:73:"439ec72309efe86ab61wxcxzqab3455efa82b84,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:74:"12Trials & Temptations That Befall Us,Trials & Temptations That Befall Us,";s:11:"shopCartQty";s:4:"1,7,";s:17:"shopCartUnitPrice";s:5:"70,0,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=5";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:12:"shopCartView";a:1:{s:6:"paynow";i:1;}s:6:"sessId";s:32:"faec94d1074973b9e213652b4ca7c92c";s:3:"uid";s:1:"1";}', '2009-10-22 05:28:05', 0),
(21, 7755546, 7, 'a:11:{s:7:"section";i:0;s:9:"sectionId";i:0;s:6:"values";a:8:{s:10:"USERNAME11";s:0:"";s:10:"PASSWORD11";s:0:"";s:10:"PASSWORD12";s:0:"";s:5:"EMAIL";s:0:"";s:7:"PROFILE";s:0:"";s:5:"SPECS";s:0:"";s:13:"selectBidTemp";s:0:"";s:11:"BidTempName";s:0:"";}s:4:"temp";a:1:{s:8:"password";s:0:"";}s:6:"errors";a:15:{s:10:"USERNAME11";s:6:"hidden";s:10:"PASSWORD11";s:8:"style37a";s:10:"PASSWORD12";s:6:"hidden";s:8:"HRLYRATE";s:6:"hidden";s:5:"EMAIL";s:6:"hidden";s:7:"PROFILE";s:6:"hidden";s:5:"SPECS";s:6:"hidden";s:3:"msg";s:6:"hidden";s:9:"BIDPERIOD";s:6:"hidden";s:9:"BIDAMOUNT";s:6:"hidden";s:12:"chkReadTerms";s:6:"hidden";s:11:"BIDSELECTOR";s:6:"hidden";s:11:"BidTempName";s:6:"hidden";s:12:"REALPASSWORD";s:6:"hidden";s:7:"SPECIFY";s:6:"hidden";}s:5:"proid";s:0:"";s:7:"id_temp";s:0:"";s:7:"postprj";a:1:{s:7:"SPECIFY";s:0:"";}s:13:"AntiSpamImage";s:6:"506284";s:6:"sessId";s:32:"7755546efb04b0499b808238feff0ed6";s:3:"uid";s:1:"7";}', '2009-10-24 05:30:14', 0),
(22, 5619, 12, 'a:14:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"801802";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:4:"temp";a:1:{s:8:"password";s:8:"password";}s:8:"shopCart";s:0:"";s:12:"shopCartName";s:0:"";s:11:"shopCartQty";s:0:"";s:17:"shopCartUnitPrice";s:0:"";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"5619be3bc84328800afa196fb7621148";s:3:"uid";s:2:"12";}', '2009-10-28 12:00:55', 0),
(23, 5619, 13, 'a:14:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"173709";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:4:"temp";a:1:{s:8:"password";s:8:"password";}s:8:"shopCart";s:0:"";s:12:"shopCartName";s:0:"";s:11:"shopCartQty";s:0:"";s:17:"shopCartUnitPrice";s:0:"";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"5619be3bc84328800afa196fb7621148";s:3:"uid";s:2:"13";}', '2009-10-28 14:05:19', 0),
(24, 5619, 14, 'a:14:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"961045";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:4:"temp";a:1:{s:8:"password";s:8:"password";}s:8:"shopCart";s:0:"";s:12:"shopCartName";s:0:"";s:11:"shopCartQty";s:0:"";s:17:"shopCartUnitPrice";s:0:"";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"5619be3bc84328800afa196fb7621148";s:3:"uid";s:2:"14";}', '2009-10-28 14:11:23', 0),
(25, 537, 1, 'a:10:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"shopCart";s:99:"29cef1477982ee24803b853f6ade3251,ff16d8b07a5a081f8ee74426899279b6,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:73:"The Life and Teaching of Christ,Encounters in Revelation,Pastors Journal,";s:11:"shopCartQty";s:8:"12,40,5,";s:17:"shopCartUnitPrice";s:10:"70,90,100,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-10-31 08:36:45', 0),
(26, 537, 2, 'a:10:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"shopCart";s:99:"29cef1477982ee24803b853f6ade3251,ff16d8b07a5a081f8ee74426899279b6,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:73:"The Life and Teaching of Christ,Encounters in Revelation,Pastors Journal,";s:11:"shopCartQty";s:8:"12,40,5,";s:17:"shopCartUnitPrice";s:10:"70,90,100,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"2";}', '2009-10-31 09:53:52', 0),
(27, 537, 1, 'a:10:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"shopCart";s:99:"29cef1477982ee24803b853f6ade3251,ff16d8b07a5a081f8ee74426899279b6,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:73:"The Life and Teaching of Christ,Encounters in Revelation,Pastors Journal,";s:11:"shopCartQty";s:8:"12,40,5,";s:17:"shopCartUnitPrice";s:10:"70,90,100,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-10-31 09:58:25', 0),
(28, 537, 2, 'a:10:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"shopCart";s:99:"29cef1477982ee24803b853f6ade3251,ff16d8b07a5a081f8ee74426899279b6,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:73:"The Life and Teaching of Christ,Encounters in Revelation,Pastors Journal,";s:11:"shopCartQty";s:8:"12,40,5,";s:17:"shopCartUnitPrice";s:10:"70,90,100,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"2";}', '2009-10-31 09:59:03', 0),
(29, 537, 4, 'a:10:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"shopCart";s:99:"29cef1477982ee24803b853f6ade3251,ff16d8b07a5a081f8ee74426899279b6,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:73:"The Life and Teaching of Christ,Encounters in Revelation,Pastors Journal,";s:11:"shopCartQty";s:8:"12,40,5,";s:17:"shopCartUnitPrice";s:10:"70,90,100,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=1";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"4";}', '2009-10-31 11:19:10', 0),
(30, 537, 1, 'a:10:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"shopCart";s:132:"b437b1ddbd11b2694e2c98435ee5b5c8,29cef1477982ee24803b853f6ade3251,ff16d8b07a5a081f8ee74426899279b6,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:94:"Key Concepts Of Life,The Life and Teaching of Christ,Encounters in Revelation,Pastors Journal,";s:11:"shopCartQty";s:10:"4,12,40,5,";s:17:"shopCartUnitPrice";s:15:"2310,70,90,100,";s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=2";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-10-31 11:46:31', 0),
(31, 537, 4, 'a:6:{s:7:"section";i:0;s:9:"sectionId";i:0;s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=2";s:4:"ship";a:1:{s:8:"shipCost";d:0;}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"4";}', '2009-10-31 11:48:47', 0),
(32, 537, 1, 'a:12:{s:7:"section";i:0;s:9:"sectionId";i:0;s:11:"shopCartRef";s:81:"http://localhost/churchportal/index.php?linkToFeatureId=21&linkToFeatureChildId=6";s:4:"ship";a:10:{s:8:"shipCost";s:4:"1900";s:7:"recName";s:12:"Kachi Akujua";s:7:"country";s:2:"NG";s:5:"state";s:1:"1";s:3:"zip";s:3:"234";s:7:"address";s:11:"dsdds sdsds";s:10:"shipOption";s:1:"1";s:9:"insurance";s:1:"1";s:15:"dischargeamount";s:2:"30";s:6:"state1";s:0:"";}s:8:"shopCart";s:66:"a080008cdc5e74c952b82ab3bd3b7337,439ec72309efe86ab6ab3455efa82b84,";s:12:"shopCartName";s:32:"Tenets of Faith,Pastors Journal,";s:11:"shopCartQty";s:5:"10,1,";s:17:"shopCartUnitPrice";s:9:"2310,100,";s:12:"shopCartView";a:1:{s:6:"paynow";i:1;}s:7:"reshash";N;s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-10-31 23:27:22', 0),
(33, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-03 14:29:32', 0),
(34, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-03 14:35:19', 0),
(35, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-03 14:51:44', 0),
(36, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-03 15:49:33', 0),
(37, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-03 16:54:32', 0),
(38, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 00:22:37', 0),
(39, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-04 00:56:49', 0),
(40, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 01:21:56', 0),
(41, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-04 01:31:12', 0),
(42, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 01:34:40', 0),
(43, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-04 10:34:56', 0),
(44, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 10:41:15', 0),
(45, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 10:45:49', 0),
(46, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-04 16:23:21', 0),
(47, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 16:27:30', 0),
(48, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-04 17:18:58', 0),
(49, 537, 8, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-04 18:00:59', 0),
(50, 537, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"891218";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-05 08:11:45', 0),
(51, 537, 8, 'a:7:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"043202";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-05 10:59:54', 0),
(52, 537, 8, 'a:7:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"870646";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"8";}', '2009-11-05 11:43:10', 0),
(53, 537, 8, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"870646";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:8:"actnpals";s:5:"kachi";s:3:"uid";s:1:"8";}', '2009-11-05 12:19:05', 0),
(54, 537, 1, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"870646";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"537c18651458cc3e7a3facf8636507ca";s:3:"uid";s:1:"1";}', '2009-11-05 12:22:50', 0),
(55, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-09 15:54:06', 0),
(56, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-09 16:42:40', 0),
(57, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-09 17:44:45', 0),
(58, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-09 18:31:24', 0),
(59, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-09 18:32:43', 0),
(60, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-09 19:13:05', 0),
(61, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 11:26:32', 0),
(62, 0, 1, 'a:3:{s:6:"sessId";s:0:"";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-10 17:08:04', 0),
(63, 0, 1, 'a:3:{s:6:"sessId";s:0:"";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-10 17:08:51', 0),
(64, 0, 1, 'a:3:{s:6:"sessId";s:0:"";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-10 17:09:38', 0),
(65, 0, 1, 'a:3:{s:6:"sessId";s:0:"";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-10 17:10:18', 0),
(66, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 17:11:16', 0),
(67, 2, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 17:26:15', 0),
(68, 2, 1, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"106474";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 23:44:56', 0),
(69, 2, 1, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"106474";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 23:45:56', 0),
(70, 2, 1, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"106474";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 23:46:59', 0),
(71, 2, 1, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"106474";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-10 23:48:42', 0),
(72, 2, 1, 'a:8:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"704566";s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-11 01:23:50', 0),
(73, 2, 1, 'a:19:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"704566";s:8:"shopCart";s:66:"29cef1477982ee24803b853f6ade3251,b437b1ddbd11b2694e2c98435ee5b5c8,";s:12:"shopCartName";s:53:"The Life and Teaching of Christ,Key Concepts Of Life,";s:11:"shopCartQty";s:5:"10,1,";s:17:"shopCartUnitPrice";s:8:"70,2310,";s:11:"shopCartRef";s:77:"http://localhost/mychurch/index.php?linkToFeatureId=21&linkToFeatureChildId=5";s:4:"ship";a:10:{s:8:"shipCost";s:1:"0";s:7:"recName";s:8:"ddsdsdsd";s:7:"country";s:2:"NG";s:5:"state";s:1:"1";s:3:"zip";s:5:"sadsd";s:7:"address";s:6:"sdsdsa";s:10:"shipOption";s:1:"2";s:9:"insurance";s:1:"0";s:15:"dischargeamount";s:1:"0";s:6:"state1";s:0:"";}s:12:"shopCartView";a:1:{s:6:"paynow";i:1;}s:12:"search_start";i:0;s:11:"search_last";s:13:"SEARCH_PAGING";s:13:"SEARCHSTRING1";s:10:"Assemblies";s:13:"searchResults";a:6:{i:0;s:1204:"<a href=''index.php?linkToFeatureId=17&linkToFeatureChildId=8''>Missions & Fields</a><br><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>M<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>n<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>";i:1;s:1460:"<a href=''index.php?linkToFeatureId=17&linkToFeatureChildId=9''>Evangel Theatre</a><br><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>E<em><b><strong><em></em></strong></b></em>v<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>n<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>T<em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>";i:2;s:1505:"<a href=''index.php?linkToFeatureId=17&linkToFeatureChildId=11''>Media Department</a><br><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>M<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>d<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>D<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>n<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>";i:3;s:5658:"<a href=''index.php?linkToFeatureId=20&linkToFeatureChildId=1''><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>T<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>A<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>G<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>d<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>N<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em></a><br><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>T<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>A<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>G<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>d<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>N<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>";i:4;s:5744:"<a href=''index.php?linkToFeatureId=20&linkToFeatureChildId=3''><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>y<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>A<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>G<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>d<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>C<em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>O<em><b><strong><em></em></strong></b></em>n<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>y<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em></a><br><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>y<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>A<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>G<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>d<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>C<em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>h<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>O<em><b><strong><em></em></strong></b></em>n<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>y<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>";i:5;s:5830:"<a href=''index.php?linkToFeatureId=20&linkToFeatureChildId=4''><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>y<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>N<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em>k<em><b><strong><em></em></strong></b></em>k<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>D<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>A<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em></a><br><em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>W<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>y<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>N<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>u<em><b><strong><em></em></strong></b></em>k<em><b><strong><em></em></strong></b></em>k<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>D<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em>r<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>c<em><b><strong><em></em></strong></b></em>t<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>w<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>p<em><b><strong><em></em></strong></b></em>a<em><b><strong><em></em></strong></b></em>g<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>A<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>m<em><b><strong><em></em></strong></b></em>b<em><b><strong><em></em></strong></b></em>l<em><b><strong><em></em></strong></b></em>i<em><b><strong><em></em></strong></b></em>e<em><b><strong><em></em></strong></b></em>s<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>o<em><b><strong><em></em></strong></b></em>f<em><b><strong><em></em></strong></b></em> <em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>.<em><b><strong><em></em></strong></b></em>";}s:6:"sessId";s:32:"2c2522e61763a73cd789d7310b8303c1";s:3:"uid";s:1:"1";}', '2009-11-11 02:44:38', 0),
(74, 9117, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:6:"sessId";s:32:"9117c8c2422ed344f2fd8c7379478c7d";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-12 10:10:38', 0),
(75, 0, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:6:"sessId";s:32:"d2dc521deb4f81aaef8423afcfd37c92";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-13 23:34:39', 0),
(76, 9, 1, 'a:5:{s:7:"section";i:0;s:9:"sectionId";i:0;s:6:"sessId";s:32:"9a4129ced570eb845e25d9dcba8c0fa9";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-14 03:26:13', 0),
(77, 9, 1, 'a:6:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:10:"upcontents";s:107:"thensd sskdsk sksd\r\nsdsdsd\r\nsdsdsd\r\ns\r\n\r\nssdsds\r\n\r\ndXBkYXRlMDEyLnppcA== !sdksd skdskd \r\ndsdsd\r\nsdsdsd sdskd";s:6:"sessId";s:32:"9a4129ced570eb845e25d9dcba8c0fa9";s:3:"uid";s:1:"1";}', '2009-11-15 15:42:00', 0),
(78, 9, 1, 'a:6:{s:7:"section";i:0;s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:10:"upcontents";s:107:"thensd sskdsk sksd\r\nsdsdsd\r\nsdsdsd\r\ns\r\n\r\nssdsds\r\n\r\ndXBkYXRlMDEyLnppcA== !sdksd skdskd \r\ndsdsd\r\nsdsdsd sdskd";s:6:"sessId";s:32:"9a4129ced570eb845e25d9dcba8c0fa9";s:3:"uid";s:1:"1";}', '2009-11-15 17:23:54', 0),
(79, 58, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-20 12:49:06', 0),
(80, 58, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-20 12:56:48', 0),
(81, 58, 2, 'a:8:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:6:"osueke";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"222723";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"2";}', '2009-11-20 19:46:50', 0),
(82, 58, 8, 'a:8:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"kachi";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"222723";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"8";}', '2009-11-20 19:47:19', 0),
(83, 58, 1, 'a:8:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"222723";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-20 19:59:10', 0),
(84, 58, 1, 'a:8:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"576439";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-20 20:00:16', 0),
(85, 58, 1, 'a:10:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"562603";s:4:"ship";a:0:{}s:12:"shopCartView";a:0:{}s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-21 14:26:44', 0),
(86, 58, 23, 'a:10:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:4:"dare";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"189362";s:4:"ship";a:0:{}s:12:"shopCartView";a:0:{}s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:2:"23";}', '2009-11-21 20:06:53', 0),
(87, 58, 1, 'a:11:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"189362";s:4:"ship";a:0:{}s:12:"shopCartView";a:0:{}s:14:"set_POS_b4_Pay";s:1:"1";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-24 09:38:32', 0),
(88, 58, 1, 'a:11:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"060587";s:4:"ship";a:0:{}s:12:"shopCartView";a:0:{}s:14:"set_POS_b4_Pay";s:1:"1";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-24 19:04:43', 0),
(89, 58, 2, 'a:11:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:6:"osueke";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"404963";s:4:"ship";a:0:{}s:12:"shopCartView";a:0:{}s:14:"set_POS_b4_Pay";s:1:"1";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"2";}', '2009-11-24 19:24:33', 0),
(90, 58, 1, 'a:11:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"404963";s:4:"ship";a:0:{}s:12:"shopCartView";a:0:{}s:14:"set_POS_b4_Pay";s:1:"1";s:6:"sessId";s:32:"58b4d4fa18c09e42ce9d7751cacb7cd1";s:3:"uid";s:1:"1";}', '2009-11-24 23:35:17', 0),
(91, 901, 1, 'a:3:{s:6:"sessId";s:32:"901c632e081298ef2bda6bf1e47ae756";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-26 17:11:19', 0),
(92, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-11-28 09:04:54', 0),
(93, 0, 1, 'a:6:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:14:"set_POS_b4_Pay";s:1:"1";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"1";}', '2009-11-28 10:03:52', 0),
(94, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"1";}', '2009-11-28 10:04:45', 0),
(95, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"1";}', '2009-11-28 10:06:30', 0),
(96, 0, 2, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:6:"osueke";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"2";}', '2009-11-28 10:13:28', 0),
(97, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"1";}', '2009-11-28 10:17:12', 0),
(98, 0, 1, 'a:8:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"071291";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"1";}', '2009-12-03 16:42:43', 0),
(99, 0, 1, 'a:8:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:8:"actnpals";s:5:"james";s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:13:"AntiSpamImage";s:6:"294306";s:6:"sessId";s:32:"d30e6962a12d8a3ba0b1ce89bd655a80";s:3:"uid";s:1:"1";}', '2009-12-03 17:24:09', 0),
(100, 88730, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"88730bbeff7537558c226917382256de";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-05 23:14:40', 0),
(101, 88730, 1, 'a:6:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"291813";s:6:"sessId";s:32:"88730bbeff7537558c226917382256de";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-07 18:20:39', 0),
(102, 0, 1, 'a:3:{s:6:"sessId";s:32:"d17f554efc0331c788a16d3e0eb6f9ff";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-11 22:51:11', 0),
(103, 0, 1, 'a:7:{s:8:"actnpals";s:5:"james";s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"values";a:1:{s:12:"txtFirstname";s:0:"";}s:6:"errors";a:1:{s:12:"txtFirstname";s:6:"hidden";}s:6:"sessId";s:32:"d17f554efc0331c788a16d3e0eb6f9ff";s:3:"uid";s:1:"1";}', '2009-12-12 01:07:08', 0),
(104, 0, 1, 'a:3:{s:6:"sessId";s:32:"ec075cbcf0a94cf3d45b81843bb7e756";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-13 06:30:41', 0);
INSERT INTO `cpj_logger` (`id`, `sessId`, `userId`, `data`, `logDate`, `status`) VALUES
(105, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"d6ca32e59272518669e868a71d75b494";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-14 12:05:49', 0),
(106, 18, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"18b67d5e4f44ee2dc66814d661cf7b41";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-17 05:20:41', 0),
(107, 4, 1, 'a:6:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:13:"AntiSpamImage";s:6:"764259";s:6:"sessId";s:32:"4ffb1d96dce66ba22636f3a899c5c49b";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-18 10:47:29', 0),
(108, 9320, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"932e1b9dacb599f3d7c797f10ebab9a7";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-18 11:14:55', 0),
(109, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"cd032559a4ed4a81e7b2abb7935ccf0f";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-23 04:23:20', 0),
(110, 20, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"20a9f14b4bc4d495e921a7f0c97b2696";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-23 10:33:21', 0),
(111, 0, 1, 'a:3:{s:6:"sessId";s:32:"ae17ef3756e897652d81ab916f5378e8";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-23 11:15:23', 0),
(112, 44931, 1, 'a:3:{s:6:"sessId";s:32:"44931c2ee1fe02647af58a884247b794";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-23 11:53:45', 0),
(113, 6, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"6caff513a38fc36cee680e3f0b62577e";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-24 05:46:15', 0),
(114, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"c4995bf8a7f557cdab91ee875a2d914a";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-24 19:02:55', 0),
(115, 7, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"7ad11954cdc7bfc75773579ab20b7a14";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-25 02:52:34', 0),
(116, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"ad705802aa78833ce0ca14c7081bb404";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-26 13:18:32', 0),
(117, 0, 1, 'a:3:{s:6:"sessId";s:32:"c6f9b338acf81f43a8ea6b1e2f4fff2a";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-26 14:21:56', 0),
(118, 8, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"8bc53e691dfea9308bc6f07c8c3ff6ad";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-27 15:36:40', 0),
(119, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"b0d0daeb92ad8586ddf5410fa5f71831";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 00:56:04', 0),
(120, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"b0d0daeb92ad8586ddf5410fa5f71831";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 00:56:15', 0),
(121, 2147483647, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"03e75984847e027918da490437a3ac0e";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 07:26:58', 0),
(122, 4, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"4b99b5fde68bfa68ea4f1e32660a53ef";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 08:19:12', 0),
(123, 2147483647, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"3294e55d26052d5ea4592e85bfb6d6f5";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 09:56:53', 0),
(124, 2147483647, 1, 'a:3:{s:6:"sessId";s:32:"03e75984847e027918da490437a3ac0e";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 12:27:07', 0),
(125, 882193945, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"882193945b8b28d388cf5a30916fad00";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-28 20:14:20', 0),
(126, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"a34e034f6e67b0e530cbe00e73d642f0";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-29 02:06:11', 0),
(127, 6, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"6d19a531c7f4041e59a40304f701e04c";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-29 07:08:02', 0),
(128, 1337263, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"1337263d42980c76a5e6a21f3f54d43f";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-29 11:02:24', 0),
(129, 33, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"33fd19d2c6e3e5309da5cde3ee47a60f";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-29 12:49:23', 0),
(130, 536, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"536b0c2b4bc3c28a2924b4d4ec807788";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-30 07:47:05', 0),
(131, 63264, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"63264eafcc8dfe9ed53c1baa8a1cb8b8";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-30 09:01:35', 0),
(132, 90, 1, 'a:3:{s:6:"sessId";s:32:"90f9c02ca18255658122ab80983b72dc";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-30 09:40:05', 0),
(133, 42587, 1, 'a:3:{s:6:"sessId";s:32:"42587d49f43c60e0d35c0ed132ada473";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-30 13:16:07', 0),
(134, 357, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"357fd92f99fd9d69714cc02c958e9576";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-30 15:37:33', 0),
(135, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"abc30ebcec69b41a8a90fd77100765ea";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-31 11:36:00', 0),
(136, 36, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"36c7e99696b98a8cda6b611b73df5939";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2009-12-31 18:21:52', 0),
(137, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"0d29ce38d34aed066a9736fed78572fb";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-01 07:04:47', 0),
(138, 0, 1, 'a:3:{s:6:"sessId";s:32:"0d29ce38d34aed066a9736fed78572fb";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-01 10:57:23', 0),
(139, 0, 1, 'a:3:{s:6:"sessId";s:32:"dacd9d2b261642dec17b30576cb7957b";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-02 20:02:39', 0),
(140, 416150, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"416150a9aaac8f19f7bc7b1c2176a677";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-04 21:58:54', 0),
(141, 2147483647, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"82225767970941b7aaa9204cdd1396b0";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-05 15:56:06', 0),
(142, 528652, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"528652c0abaf973c84bd7e61e0fd5908";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-06 00:12:40', 0),
(143, 81959, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"81959c8a67b96c04bf4ea2ccf70ec027";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-06 10:38:10', 0),
(144, 96553, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"96553ba92e8adf3be6bf7ab1331a0e18";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-06 13:41:41', 0),
(145, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"d29c07aab894bee14799e05e58a312b1";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 05:25:40', 0),
(146, 0, 1, 'a:9:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:12:"search_start";i:0;s:11:"search_last";i:10;s:13:"SEARCHSTRING1";s:7:"project";s:13:"searchResults";a:0:{}s:6:"sessId";s:32:"ca05c245ed73d053a239a1fbcb19375e";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 05:48:09', 0),
(147, 1789, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"1789f5bf756fef1dd151bf58f599a3f6";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 07:59:39', 0),
(148, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"a46834ab88dec6715b76a78e3b002e66";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 11:22:42', 0),
(149, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"b10e27dfc030607134c3dffc3483d687";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 12:29:26', 0),
(150, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"a46834ab88dec6715b76a78e3b002e66";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 13:37:57', 0),
(151, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"cadf1cfa76ad12678709162e978a969a";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 14:26:26', 0),
(152, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"b9822787edf7b61f1b46d8326a697df4";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-07 20:57:54', 0),
(153, 0, 1, 'a:5:{s:7:"section";s:1:"1";s:9:"sectionId";i:0;s:6:"sessId";s:32:"cadf1cfa76ad12678709162e978a969a";s:8:"actnpals";s:5:"james";s:3:"uid";s:1:"1";}', '2010-01-08 03:04:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_media`
--

CREATE TABLE IF NOT EXISTS `cpj_media` (
  `id` int(11) NOT NULL auto_increment,
  `mediaCategoryId` int(11) NOT NULL,
  `mediaTitle` varchar(200) NOT NULL,
  `mediaContents` text NOT NULL,
  `fpYes` tinyint(4) NOT NULL,
  `fileId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cpj_media`
--

INSERT INTO `cpj_media` (`id`, `mediaCategoryId`, `mediaTitle`, `mediaContents`, `fpYes`, `fileId`, `status`, `section`, `sectionId`) VALUES
(2, 1, 'Entering Diving Presence', '<p>This is a</p>', 0, 84, 1, 1, 0),
(3, 2, 'The Joy of Giving', '<p>The Joy of Giving</p>', 0, 35, 0, 1, 0),
(4, 1, 'The Joy of Service', '', 0, 35, 1, 1, 0),
(5, 2, 'The Glorious Hope', '<p>Revd Ikoni talks about The Glorious Hope in Jesus Christ.</p>', 0, 0, 1, 1, 0),
(6, 2, 'The Glorious Hope', '<p>Revd Ikoni talks about The Glorious Hope in Jesus Christ.</p>', 0, 216, 1, 1, 0),
(7, 2, 'Experiencing Divine Presence', '<p>Revd Prof. Paul Emeka preaches on Experiencing God''s Divine Presence at Peniel 2009.</p>', 0, 217, 1, 1, 0),
(8, 2, 'Cultivating Divine Presence - Part 1', '<p>Revd Dr. Osueke talks on how to cultivate the presence of God in our everyday life</p>', 0, 218, 1, 1, 0),
(9, 2, 'Experiencing Divine Presence - Isangadighi (Part 1)', '<p>Revd Dr. E. Isangadighi talks about experiencing Gods divine presence at Peniel 2009</p>', 0, 219, 1, 1, 0),
(11, 1, 'dsdasd', '<p>dasdasdasd</p>', 0, 239, 1, 1, 1),
(12, 1, 'AWESOME GOD', 'fdsffd sd', 0, 278, 1, 1, 0),
(13, 1, 'run-this-town', '<p>Audio Testing&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 0, 0, 0, 1, 0),
(14, 1, 'run-this-town', '<p>sdsdsd&nbsp;&nbsp;</p>', 0, 0, 0, 1, 0),
(15, 1, 'run-this-town', '<p>sdsd</p>', 0, 0, 0, 1, 0),
(16, 1, 'trinity', '<p>Peniel 2009</p>', 0, 391, 1, 1, 0),
(17, 1, 'as', '<p>dsdsdsd</p>', 0, 354, 1, 1, 0),
(19, 2, 'Test1', '<p>Test 1</p>', 1, 386, 1, 1, 0),
(20, 2, 'Test2', '<p>Testing part2</p>', 0, 387, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_media_category`
--

CREATE TABLE IF NOT EXISTS `cpj_media_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpj_media_category`
--

INSERT INTO `cpj_media_category` (`id`, `name`, `status`) VALUES
(1, 'Audio', 1),
(2, 'Video', 1),
(3, 'Books', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_media_department_members`
--

CREATE TABLE IF NOT EXISTS `cpj_media_department_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `adminPosition` varchar(100) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_media_department_members`
--

INSERT INTO `cpj_media_department_members` (`id`, `userId`, `adminYes`, `adminPosition`, `deleteYes`, `status`) VALUES
(2, 7, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_media_keywords`
--

CREATE TABLE IF NOT EXISTS `cpj_media_keywords` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_media_keywords`
--

INSERT INTO `cpj_media_keywords` (`id`, `name`, `status`) VALUES
(1, 'Healing', 1),
(2, 'Wealth', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_members`
--

CREATE TABLE IF NOT EXISTS `cpj_members` (
  `id` int(11) NOT NULL auto_increment,
  `message` text NOT NULL,
  `mediaType` enum('Audio','Flash','Picture','Video') NOT NULL,
  `mediaId` int(11) NOT NULL,
  `deptId` int(11) NOT NULL,
  `section` varchar(200) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `PublishedYes` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_men_ministries_members`
--

CREATE TABLE IF NOT EXISTS `cpj_men_ministries_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `adminPosition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_men_ministries_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_menu`
--

CREATE TABLE IF NOT EXISTS `cpj_menu` (
  `id` int(11) NOT NULL auto_increment,
  `uniqueId` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` enum('header','top','top1','top2','left','left','left1','left2','left3','left4','left5','left6','right','right1','right2','right3','right4','right5','right6','body','body1','body2','body3','body4','body5','body6','footer','breadcrumbs','bottom','bottom1','bottom2') default NULL,
  `parentId` int(11) default NULL,
  `status` enum('Activated','Deactivated') NOT NULL,
  `type` enum('Horizontal','Vertical') NOT NULL,
  `sectionId` int(11) default NULL,
  `sectionChildId` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cpj_menu`
--

INSERT INTO `cpj_menu` (`id`, `uniqueId`, `name`, `position`, `parentId`, `status`, `type`, `sectionId`, `sectionChildId`) VALUES
(1, '4a32dfd4ae12b', 'main_menu', 'left', 0, 'Activated', 'Horizontal', 0, 0),
(5, '4a8db3a05b8db', 'Top Articles', 'left1', 0, '', 'Vertical', 0, 0),
(6, '4a8db3bada433', 'Top News', 'left2', 0, 'Activated', 'Vertical', 4, 1),
(7, '4a91be020cb23', 'Upcoming Events', 'left2', 0, '', 'Vertical', 0, 0),
(8, '4a91bf628e943', 'Groups', 'left3', 0, '', 'Vertical', 0, 0),
(9, '4adfef6a9cfbb', 'New Videos Series', 'header', 8, 'Activated', 'Vertical', 0, 0),
(11, '4ae0001411943', 'Quick Links', 'header', 0, 'Activated', 'Vertical', 0, 0),
(12, '4ae17da50e293', 'Prayers', 'header', 0, 'Activated', 'Vertical', 0, 0),
(13, '4b069deba47ba', 'New Audio Message', 'header', 0, 'Activated', 'Vertical', 1, 0),
(14, '4b07b6cf36b03', 'top_menu', 'header', 0, 'Activated', 'Horizontal', 1, 0),
(15, '4b07ddff2078b', 'Subscriptions', 'header', 0, 'Activated', 'Vertical', 1, 0),
(16, '4b07ee5069b6b', 'footer_menu', 'header', 0, 'Activated', 'Horizontal', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_menu_items`
--

CREATE TABLE IF NOT EXISTS `cpj_menu_items` (
  `id` int(11) NOT NULL auto_increment,
  `menuId` int(11) NOT NULL,
  `title` text NOT NULL,
  `linkToFeatureId` int(11) NOT NULL,
  `linkToFeatureChildId` int(11) NOT NULL,
  `linkToSectionYes` tinyint(4) NOT NULL,
  `linkToSectionId` int(11) NOT NULL default '0',
  `linkToSectionChildId` int(11) default NULL,
  `parentId` int(11) default NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `cpj_menu_items`
--

INSERT INTO `cpj_menu_items` (`id`, `menuId`, `title`, `linkToFeatureId`, `linkToFeatureChildId`, `linkToSectionYes`, `linkToSectionId`, `linkToSectionChildId`, `parentId`, `status`) VALUES
(1, 1, 'Home', 13, 0, 0, 0, NULL, NULL, 1),
(7, 5, 'Read Todays Devotionals', 2, 2, 0, 0, NULL, NULL, 1),
(8, 5, 'We are here', 14, 2, 0, 0, NULL, NULL, 1),
(9, 7, 'Fire Conference', 3, 2, 0, 0, NULL, NULL, 1),
(10, 7, 'Fire Conference I', 3, 1, 0, 0, NULL, NULL, 1),
(11, 7, 'Fire Conference II', 3, 6, 0, 0, NULL, NULL, 1),
(12, 7, 'Fire Conference III', 3, 1, 0, 0, NULL, NULL, 1),
(13, 5, 'Blog Focus: Pst James Taye', 16, 1, 0, 0, NULL, NULL, 1),
(18, 5, 'In todays News', 7, 2, 0, 0, NULL, NULL, 1),
(21, 1, 'Events', 3, 0, 0, 0, NULL, 22, 1),
(22, 1, 'News', 7, 0, 0, 0, NULL, NULL, 1),
(23, 1, 'Online Store', 21, 0, 0, 0, NULL, NULL, 1),
(24, 11, 'Devotionals', 2, 0, 0, 0, NULL, NULL, 1),
(25, 1, 'Donate', 21, 0, 0, 0, NULL, NULL, 0),
(26, 1, 'Departments', 19, 1, 0, 0, NULL, NULL, 1),
(27, 1, 'User Area', 9, 0, 0, 0, NULL, NULL, 1),
(28, 1, 'Special Features', 14, 0, 0, 0, NULL, NULL, 1),
(29, 1, 'Email', 0, 0, 0, 0, NULL, 28, 1),
(30, 1, 'GuestBook', 0, 0, 0, 0, NULL, 28, 1),
(31, 1, 'Forum', 0, 0, 0, 0, NULL, 28, 1),
(32, 1, 'Groups', 17, 5, 0, 0, NULL, NULL, 0),
(33, 1, 'Districts', 22, 2, 0, 0, NULL, NULL, 1),
(35, 1, 'Media', 19, 1, 0, 0, NULL, 26, 1),
(36, 1, 'Missions', 17, 8, 0, 0, NULL, 26, 1),
(37, 1, 'Evangel Theatre', 17, 9, 0, 0, NULL, 26, 1),
(38, 1, 'Men', 17, 8, 0, 0, NULL, 26, 1),
(39, 1, 'Women Ministry', 17, 8, 0, 0, NULL, 26, 1),
(40, 1, 'Youths Ministry', 17, 8, 0, 0, NULL, 26, 1),
(41, 1, 'Sunday School', 17, 8, 0, 0, NULL, 26, 1),
(42, 1, 'Corporate Ministries', 17, 8, 0, 0, NULL, 26, 1),
(43, 1, 'Evangel Camp', 17, 8, 0, 0, NULL, 26, 1),
(44, 1, 'CASOR', 17, 8, 0, 0, NULL, 26, 1),
(45, 9, 'Peniel 2009', 19, 1, 0, 0, NULL, NULL, 1),
(46, 9, 'Asuza 2009', 19, 1, 0, 0, NULL, NULL, 1),
(47, 9, 'Leaders Retreat', 19, 1, 0, 0, NULL, NULL, 1),
(51, 11, 'Online T.V.', 19, 0, 0, 0, NULL, NULL, 1),
(52, 11, 'Give Online', 19, 0, 0, 0, NULL, NULL, 1),
(53, 11, 'Prayers', 8, 1, 0, 0, NULL, NULL, 1),
(54, 11, 'Call To Salvation', 14, 2, 0, 0, NULL, NULL, 1),
(55, 11, 'Counseling', 14, 2, 0, 0, NULL, NULL, 1),
(57, 11, 'From The G.S.', 20, 0, 0, 0, NULL, NULL, 1),
(59, 11, 'Blogs', 16, 2, 0, 0, NULL, NULL, 1),
(60, 11, 'Evangel University', 14, 0, 0, 0, NULL, 58, 1),
(61, 11, 'AG Homes', 14, 0, 0, 0, NULL, NULL, 1),
(62, 9, 'Easter Retreat', 19, 0, 0, 0, NULL, NULL, 1),
(63, 9, 'And Many More ...', 19, 0, 0, 0, NULL, NULL, 1),
(65, 1, 'Areas', 22, 6, 0, 0, NULL, 33, 1),
(66, 12, 'Prayer Request', 8, 1, 0, 0, NULL, NULL, 1),
(67, 12, 'Testimonies', 16, 3, 0, 0, NULL, NULL, 1),
(68, 12, 'Partner With Us', 24, 2, 0, 0, NULL, NULL, 1),
(69, 1, 'Bible Schools', 14, 3, 0, 0, NULL, NULL, 1),
(70, 1, 'About Us', 14, 7, 0, 0, NULL, NULL, 1),
(72, 1, 'Education', 14, 3, 0, 0, NULL, 26, 1),
(73, 1, 'Our History', 14, 6, 0, 0, NULL, 70, 1),
(74, 1, 'Our Mission Statement', 14, 7, 0, 0, NULL, 70, 1),
(75, 1, 'Our Core Values', 14, 8, 0, 0, NULL, 70, 1),
(76, 1, 'Our Beliefs', 14, 9, 0, 0, NULL, 70, 1),
(77, 13, 'A12', 2, 1, 0, 0, NULL, NULL, 1),
(78, 13, 'A121', 21, 503, 0, 0, NULL, NULL, 1),
(79, 1, 'ETS Jos', 14, 3, 0, 0, NULL, 69, 1),
(80, 13, 'Latest Message', 19, 16, 0, 0, NULL, NULL, 1),
(81, 1, 'Church Sections', 22, 3, 0, 0, NULL, 33, 1),
(82, 1, 'Local Churches', 22, 4, 0, 0, NULL, 33, 1),
(83, 14, 'Home', 13, 0, 0, 0, NULL, NULL, 1),
(84, 14, 'About Us', 14, 6, 0, 0, NULL, NULL, 1),
(85, 14, 'Ministries', 17, 7, 0, 0, NULL, NULL, 1),
(86, 14, 'History', 14, 6, 0, 0, NULL, 84, 1),
(87, 14, 'Statement of Faith', 14, 9, 0, 0, NULL, 84, 1),
(88, 14, 'Missions Statements', 14, 7, 0, 0, NULL, 84, 1),
(89, 14, 'Vision', 14, 12, 0, 0, NULL, 84, 1),
(90, 14, 'Men Ministries', 17, 16, 0, 0, NULL, 85, 1),
(91, 14, 'WomenMinistries', 17, 17, 0, 0, NULL, 85, 1),
(94, 14, 'Missions', 17, 8, 0, 0, NULL, 85, 1),
(95, 14, 'Media Ministries', 17, 11, 0, 0, NULL, 85, 1),
(97, 14, 'Corporate Ministries', 17, 6, 0, 0, NULL, 85, 1),
(98, 14, 'Educations', 17, 7, 0, 0, NULL, 85, 1),
(100, 14, 'Evangel Camp', 17, 3, 0, 0, NULL, 85, 1),
(101, 14, 'Districts', 22, 2, 0, 0, NULL, NULL, 1),
(102, 14, 'Districts', 22, 2, 0, 0, NULL, 101, 1),
(103, 14, 'Areas', 22, 6, 0, 0, NULL, 101, 1),
(104, 14, 'Missionary Areas', 22, 8, 0, 0, NULL, 101, 1),
(105, 14, 'Bible Schools', 14, 3, 0, 0, NULL, NULL, 1),
(106, 14, 'Casor', 14, 13, 0, 0, NULL, NULL, 1),
(108, 14, 'Universities', 14, 13, 0, 0, NULL, 106, 1),
(109, 14, 'Polytechnics', 14, 13, 0, 0, NULL, 106, 1),
(110, 14, 'Colleges', 14, 13, 0, 0, NULL, 106, 1),
(111, 14, 'Senior Friends', 14, 13, 0, 0, NULL, 106, 1),
(112, 14, 'Support Us', 24, 2, 0, 0, NULL, NULL, 1),
(113, 14, 'Projects', 14, 5, 0, 0, NULL, NULL, 0),
(114, 14, 'University', 14, 14, 0, 0, NULL, NULL, 0),
(115, 14, 'Contact Us', 10, 1, 0, 0, NULL, NULL, 1),
(116, 14, 'General Council', 10, 1, 0, 0, NULL, 115, 1),
(117, 14, 'Districts', 10, 3, 0, 0, NULL, 115, 1),
(118, 14, 'Areas', 10, 2, 0, 0, NULL, 115, 1),
(119, 14, 'Missionary Areas', 10, 5, 0, 0, NULL, 115, 1),
(120, 14, 'Local Churches', 10, 4, 0, 0, NULL, 115, 1),
(122, 11, 'Ambassadors Of the Kingdom', 17, 4, 0, 0, NULL, NULL, 1),
(123, 15, 'Newsletters', 23, 2, 0, 0, NULL, NULL, 1),
(124, 15, 'Receive Prophetic Messages - SMS', 23, 0, 0, 0, NULL, NULL, 1),
(125, 15, 'Magazine - The Pastor', 21, 1, 0, 0, NULL, NULL, 1),
(126, 15, 'Magazine - Evangel', 21, 1, 0, 0, NULL, NULL, 1),
(127, 16, 'Privacy Information', 14, 15, 0, 0, NULL, NULL, 1),
(128, 6, 'GS farewell Visit', 7, 4, 0, 0, NULL, NULL, 1),
(129, 6, 'University Takes Off', 7, 0, 0, 0, NULL, NULL, 1),
(130, 14, '', 17, 14, 0, 0, NULL, 85, 0),
(131, 13, 'Jesus is Lord', 19, 2, 0, 0, NULL, 77, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_missionary_areas`
--

CREATE TABLE IF NOT EXISTS `cpj_missionary_areas` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentNodeId` int(11) default NULL,
  `information` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cpj_missionary_areas`
--

INSERT INTO `cpj_missionary_areas` (`id`, `name`, `parentNodeId`, `information`, `status`) VALUES
(1, 'Bali', 0, '', 1),
(2, 'Ilorin', 0, '', 1),
(3, 'Kafanchan', 0, '', 1),
(4, 'Kastina', 0, '', 1),
(5, 'Kebbi', 0, '', 1),
(6, 'Maiduguri', 0, '', 1),
(7, 'Oyo North', 0, '', 1),
(8, 'Uba', 0, '', 1),
(9, 'Wukari', 0, '', 1),
(10, 'Yobe', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_missions_members`
--

CREATE TABLE IF NOT EXISTS `cpj_missions_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `adminPosition` varchar(100) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_missions_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_news`
--

CREATE TABLE IF NOT EXISTS `cpj_news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '1',
  `body` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `mediaId` int(11) NOT NULL,
  `publishedYes` tinyint(1) NOT NULL default '1',
  `sectionId` int(11) NOT NULL,
  `section` int(200) NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  `mediaCategoryId` int(11) NOT NULL,
  `fpStoryYes` tinyint(4) NOT NULL,
  `HTMLBody` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cpj_news`
--

INSERT INTO `cpj_news` (`id`, `title`, `frontPageYes`, `body`, `date`, `mediaId`, `publishedYes`, `sectionId`, `section`, `status`, `mediaCategoryId`, `fpStoryYes`, `HTMLBody`) VALUES
(1, 'God Answers Country''s Prayer', 1, 'CBNNews - Two Christian teachers in Florida are facing jail time for allegedly breaking the law as they prayed at a school-related event.\r\n\r\nPace High School Principal Frank Lay and Athletic Director Robert Freeman in Santa Rosa County led the prayer before a meal at a booster club meeting for adults, but a judge said the meeting violated a federal court order banning school officials from leading prayers at school events.\r\n\r\nIn 2008 the American Civil Liberties Union filed a lawsuit against the Santa Rosa County School District. They claimed some of the teachers and administration "endorsed" religion in the classroom and school events. The school district did not fight the suit and consented to prohibiting prayer at school-sponsored events.\r\n\r\nNow the two men could be fined or even sent to jail for "criminal contempt."  The Liberty Counsel, a conservative religious rights group, is defending them.\r\n\r\nMathew D. Staver, founder of Liberty Counsel and Dean of Liberty University School of Law, said it is a sad day in America when school officials are criminally prosecuted for a prayer over a meal.\r\n', '2009-10-21 01:23:33', 26, 1, 1, 4, 1, 3, 1, 'CBNNews - Two Christian teachers in Florida are facing jail time for allegedly breaking the law as they prayed at a school-related event.\r\n\r\nPace High School Principal Frank Lay and Athletic Director Robert Freeman in Santa Rosa County led the prayer before a meal at a booster club meeting for adults, but a judge said the meeting violated a federal court order banning school officials from leading prayers at school events.\r\n\r\nIn 2008 the American Civil Liberties Union filed a lawsuit against the Santa Rosa County School District. They claimed some of the teachers and administration "endorsed" religion in the classroom and school events. The school district did not fight the suit and consented to prohibiting prayer at school-sponsored events.\r\n\r\nNow the two men could be fined or even sent to jail for "criminal contempt."  The Liberty Counsel, a conservative religious rights group, is defending them.\r\n\r\nMathew D. Staver, founder of Liberty Counsel and Dean of Liberty University School of Law, said it is a sad day in America when school officials are criminally prosecuted for a prayer over a meal.\r\n'),
(4, 'GS farewell Visit', 1, 'The General Superintendent as part of his retirement itineraries is to visit 22 districts of the church between April 20th and September 18th 2010.', '2009-10-23 14:16:07', 204, 1, 0, 1, 1, 3, 1, '<p>The General Superintendent as part of his retirement itineraries is to visit 22 districts of the church between April 20th and September 18th 2010.</p>'),
(5, 'Evangel University Takes Off', 1, 'The Evangel University takes off next academic session at its temporary site Evangel Camp Okpoto, Ebonyi State.', '2009-10-23 14:16:07', 0, 1, 0, 1, 1, 0, 0, 'The Evangel University takes off next academic session at its temporary site Evangel Camp Okpoto, Ebonyi State.'),
(6, 'Leaders` Meeting', 1, 'dsadsdsa', '2009-11-05 05:29:51', 240, 1, 0, 1, 1, 0, 0, '<p>dsadsdsa</p>'),
(7, 'EC', 1, 'sdasd', '2009-11-12 18:01:06', 279, 1, 0, 1, 1, 0, 0, '<p>sdasd</p>'),
(8, 'African Azusa Conference', 0, 'AFRICAN AZUSA CONFERENCE\r\nWhat an excitement! What a Challenge! And what a Revival!\r\nThe second African Azusa Revival held at the National Christian Worship Center, Abuja Nigeria, between 3rd and 7th August, 2009 has come and gone but the excitements, challenges and revival will linger long in the hearts and lives of the participants.\r\nThe story of the Azusa Centenary held in Azusa, Los Angeles U.S.A between&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2008 ignited curiosities in the minds of some pastors and members who participated in this epoch making revival conference. As it was in the Azusa Revival, only those who thirst and hunger for the Holy Spirit went to where the Holy Spirit was manifesting, so it happened at Abuja.\r\nThe conference proper opened on 4th August with the General Superintendent of the Assemblies of God Nigeria, Rev Dr Charles Ogbonnaya Osueke delivering his opening address.\r\nThe Conference Director, Dr Denny Miller, also the Director of Acts in Africa Initiative gave his power point welcome address. Speaking passionately, he said: &ldquo;it is our prayer that this conference will ignite fire in your heart, and that you will return to your home and help to launch a new Pentecostal outpouring in your church and in your country.&rdquo;&nbsp;\r\nThe Conference was rich in many respects with intercessory prayers, teaching and strategy sessions which cumulated unto signing of covenant by all the participant.\r\nBesides, there were three envigorating devotional services and three power packed Holy Ghost rallies. All these reminiscent of Azusa Revival shaped the minds of the participants for meaningful launching of Decade of Pentecost which the conference metamorphosed to.\r\n&nbsp;\r\nWe encourage everyone to enjoy the conference proceedings in our Website. Thank you and happy viewing.\r\n&nbsp;\r\nRev Ben Nwachukwu Okoroafor \r\nNational Media Director', '2010-01-07 11:38:13', 0, 0, 0, 1, 0, 0, 0, 'AFRICAN AZUSA CONFERENCE\r\nWhat an excitement! What a Challenge! And what a Revival!\r\nThe second African Azusa Revival held at the National Christian Worship Center, Abuja Nigeria, between 3rd and 7th August, 2009 has come and gone but the excitements, challenges and revival will linger long in the hearts and lives of the participants.\r\nThe story of the Azusa Centenary held in Azusa, Los Angeles U.S.A between&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2008 ignited curiosities in the minds of some pastors and members who participated in this epoch making revival conference. As it was in the Azusa Revival, only those who thirst and hunger for the Holy Spirit went to where the Holy Spirit was manifesting, so it happened at Abuja.\r\nThe conference proper opened on 4th August with the General Superintendent of the Assemblies of God Nigeria, Rev Dr Charles Ogbonnaya Osueke delivering his opening address.\r\nThe Conference Director, Dr Denny Miller, also the Director of Acts in Africa Initiative gave his power point welcome address. Speaking passionately, he said: &ldquo;it is our prayer that this conference will ignite fire in your heart, and that you will return to your home and help to launch a new Pentecostal outpouring in your church and in your country.&rdquo;&nbsp;\r\nThe Conference was rich in many respects with intercessory prayers, teaching and strategy sessions which cumulated unto signing of covenant by all the participant.\r\nBesides, there were three envigorating devotional services and three power packed Holy Ghost rallies. All these reminiscent of Azusa Revival shaped the minds of the participants for meaningful launching of Decade of Pentecost which the conference metamorphosed to.\r\n&nbsp;\r\nWe encourage everyone to enjoy the conference proceedings in our Website. Thank you and happy viewing.\r\n&nbsp;\r\nRev Ben Nwachukwu Okoroafor \r\nNational Media Director'),
(9, 'African Azusa Conference', 0, 'What an excitement? What a Challenge? And what a Revival?\r\nThe second African Azusa Revival held at the National Christian Worship Center, Abuja Nigeria, between 3rd and 7th August, 2009 has come and gone but the excitements, challenges and revival will linger long in the hearts and lives of the participants.\r\nThe story of the Azusa Centenary held in Azusa, Los Angeles U.S.A&nbsp;ignited curiosities in the minds of some pastors and members who participated in this epoch making revival conference. As it was in the Azusa Revival, only those who thirst and hunger for the Holy Spirit went to where the Holy Spirit was manifesting, so it happened at Abuja.\r\nThe conference proper opened on 4th August with the General Superintendent of the Assemblies of God Nigeria, Rev Dr Charles Ogbonnaya Osueke delivering his opening address.\r\nThe Conference Director, Dr Denny Miller, also the Director of Acts in Africa Initiative gave his power point welcome address. Speaking passionately, he said: &ldquo;it is our prayer that this conference will ignite fire in your heart, and that you will return to your home and help to launch a new Pentecostal outpouring in your church and in your country.&rdquo;\r\nThe Conference was rich in many respects with intercessory prayers, teaching and strategy sessions which cumulated unto signing of covenant by all the participant.\r\nBesides, there were three envigorating devotional services and three power packed Holy Ghost rallies. All these reminiscent of Azusa Revival shaped the minds of the participants for meaningful launching of Decade of Pentecost which the conference metamorphosed to.\r\nWe encourage everyone to enjoy the conference proceedings in our Website. Thank you and happy viewing.\r\n&nbsp;&nbsp;\r\nRev Ben Nwachukwu Okoroafor \r\nNational Media Dirctor &nbsp;&nbsp;', '2010-01-07 15:43:59', 0, 1, 0, 1, 1, 0, 0, '<p><span style="font-size: small;">What an excitement? What a Challenge? And what a Revival?</span></p>\r\n<p><span style="font-size: small;">The second African Azusa Revival held at the National Christian Worship Center, Abuja Nigeria, between 3<sup>rd</sup> and 7<sup>th</sup> August, 2009 has come and gone but the excitements, challenges and revival will linger long in the hearts and lives of the participants.</span></p>\r\n<p><span style="font-size: small;">The story of the Azusa Centenary held in Azusa, Los Angeles U.S.A&nbsp;ignited curiosities in the minds of some pastors and members who participated in this epoch making revival conference. As it was in the Azusa Revival, only those who thirst and hunger for the Holy Spirit went to where the Holy Spirit was manifesting, so it happened at Abuja.</span></p>\r\n<p><span style="font-size: small;">The conference proper opened on 4<sup>th</sup> August with the General Superintendent of the Assemblies of God Nigeria, Rev Dr Charles Ogbonnaya Osueke delivering his opening address.</span></p>\r\n<p><span style="font-size: small;">The Conference Director, Dr Denny Miller, also the Director of Acts in Africa Initiative gave his power point welcome address. Speaking passionately, he said: &ldquo;it is our prayer that this conference will ignite fire in your heart, and that you will return to your home and help to launch a new Pentecostal outpouring in your church and in your country.&rdquo;</span></p>\r\n<p><span style="font-size: small;">The Conference was rich in many respects with intercessory prayers, teaching and strategy sessions which cumulated unto signing of covenant by all the participant.</span></p>\r\n<p><span style="font-size: small;">Besides, there were three envigorating devotional services and three power packed Holy Ghost rallies. All these reminiscent of Azusa Revival shaped the minds of the participants for meaningful launching of Decade of Pentecost which the conference metamorphosed to.</span></p>\r\n<p><span style="font-size: small;">We encourage everyone to enjoy the conference proceedings in our Website. Thank you and happy viewing.</span></p>\r\n<p><span style="font-size: small;">&nbsp;&nbsp;</span></p>\r\n<p><strong><span style="font-size: small;">Rev Ben Nwachukwu Okoroafor </span></strong></p>\r\n<p><strong><span style="font-size: small;">National Media Dirctor &nbsp;&nbsp;</span></strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_newsletter`
--

CREATE TABLE IF NOT EXISTS `cpj_newsletter` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `contentsHtml` text NOT NULL,
  `contentsNoHtml` text NOT NULL,
  `dateOfPublication` date NOT NULL,
  `receipientTypeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sentYes` tinyint(4) NOT NULL,
  `fpText` text NOT NULL,
  `fpYes` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpj_newsletter`
--

INSERT INTO `cpj_newsletter` (`id`, `name`, `contentsHtml`, `contentsNoHtml`, `dateOfPublication`, `receipientTypeId`, `title`, `status`, `sentYes`, `fpText`, `fpYes`) VALUES
(1, 'Welcome To Texas', '<p>sdsad safsd assads adss</p>', 'sdsad safsd assads adss', '0000-00-00', 1, 'newsletterTitle', 1, 0, 'Sign Up today for Texas newsletter', 1),
(2, 'dasdsda', 'sdsd', 'sdsd', '2009-11-12', 0, 'sdsad', 1, 0, 'sdasd', 0),
(3, 'dsdsd', 'sdasd', 'sdasd', '2009-11-12', 0, 'dsds', 1, 0, 'sadsad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_newsletter_receipients`
--

CREATE TABLE IF NOT EXISTS `cpj_newsletter_receipients` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(200) NOT NULL,
  `newsletterId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_newsletter_receipients`
--

INSERT INTO `cpj_newsletter_receipients` (`id`, `email`, `newsletterId`, `status`) VALUES
(1, 'smicer66@yahoo.com', 1, 1),
(2, 'smicer66@yahoo.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_parish`
--

CREATE TABLE IF NOT EXISTS `cpj_parish` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentNodeId` int(11) default NULL,
  `information` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_parish`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_payment`
--

CREATE TABLE IF NOT EXISTS `cpj_payment` (
  `id` int(11) NOT NULL auto_increment,
  `paymentOption` varchar(100) NOT NULL,
  `logoId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_payment`
--

INSERT INTO `cpj_payment` (`id`, `paymentOption`, `logoId`, `status`) VALUES
(1, 'PayPal', 500, 1),
(2, 'Interswitch', 501, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_paypal_settings`
--

CREATE TABLE IF NOT EXISTS `cpj_paypal_settings` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `signature` varchar(500) NOT NULL,
  `useProxy` tinyint(4) NOT NULL default '0',
  `proxyHost` varchar(50) NOT NULL,
  `proxyPort` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `paypalUrl` varchar(500) NOT NULL,
  `endpoint` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_paypal_settings`
--

INSERT INTO `cpj_paypal_settings` (`id`, `username`, `password`, `signature`, `useProxy`, `proxyHost`, `proxyPort`, `version`, `paypalUrl`, `endpoint`, `status`) VALUES
(1, 'webapp_1255631965_biz_api1.gmail.com', '1255631985', 'A1PsV-IRkRQuGf2go4ckjq31xWnMHAVM3DlsSk4iDjkQ7mKbVMqsQ3hdm', 0, '127.0.0.1', 808, '59.0', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=', 'https://api-3t.sandbox.paypal.com/nvp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_position`
--

CREATE TABLE IF NOT EXISTS `cpj_position` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `cpj_position`
--

INSERT INTO `cpj_position` (`id`, `name`, `status`) VALUES
(1, 'body', 1),
(2, 'body1', 1),
(3, 'body3', 1),
(4, 'body4', 1),
(5, 'body5', 1),
(6, 'body6', 1),
(7, 'body7', 1),
(8, 'body2', 1),
(9, 'body8', 1),
(10, 'body9', 1),
(11, 'body10', 1),
(12, 'body11', 1),
(14, 'right', 1),
(15, 'right1', 1),
(16, 'right2', 1),
(17, 'right3', 1),
(18, 'right4', 1),
(19, 'right5', 1),
(20, 'left', 1),
(21, 'left1', 1),
(22, 'left2', 1),
(23, 'left3', 1),
(24, 'left4', 1),
(25, 'left5', 1),
(26, 'left6', 1),
(27, 'top', 1),
(28, 'header', 1),
(29, 'top1', 1),
(30, 'top2', 1),
(31, 'footer', 1),
(32, 'breadcrumbs', 1),
(33, 'bottom', 1),
(34, 'bottom1', 1),
(35, 'bottom2', 1),
(36, 'back', 1),
(37, 'end1', 1),
(38, 'body12', 1),
(39, 'body13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_prayer_needs`
--

CREATE TABLE IF NOT EXISTS `cpj_prayer_needs` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cpj_prayer_needs`
--

INSERT INTO `cpj_prayer_needs` (`id`, `name`, `status`) VALUES
(1, 'A Neighbor/Co-Worker', 1),
(2, 'Abuse', 1),
(3, 'Alcohol', 1),
(4, 'Allergies', 1),
(5, 'Cancer', 1),
(6, 'Child Custody', 1),
(7, 'Church', 1),
(8, 'Cold &amp; Flu', 1),
(12, 'Deliverance from Addictions', 1),
(13, 'Depression', 1),
(14, 'Diabetes', 1),
(15, 'Family Member', 1),
(16, 'Drugs', 1),
(17, 'Emotional Distress', 1),
(18, 'dsds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_prayer_request`
--

CREATE TABLE IF NOT EXISTS `cpj_prayer_request` (
  `id` int(11) NOT NULL auto_increment,
  `requesterId` int(11) NOT NULL,
  `visitorYes` tinyint(4) NOT NULL,
  `prayerForWho` text NOT NULL,
  `prayerNeed` text NOT NULL,
  `details` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dateSent` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cpj_prayer_request`
--

INSERT INTO `cpj_prayer_request` (`id`, `requesterId`, `visitorYes`, `prayerForWho`, `prayerNeed`, `details`, `status`, `dateSent`) VALUES
(4, 9, 0, 'dsad sds', 'A Neighbor/Co-Worker', ' xfdsfds dfds', 1, '0000-00-00 00:00:00'),
(5, 1, 0, 'sdsadsad', 'Alcohol', 'sdsad sdsadds sdsad', 1, '2009-11-11 02:06:51'),
(6, 2, 1, 'sdkkasds', 'Diabetes', 'sdsdsa sdsa', 1, '2009-11-11 02:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_prayers`
--

CREATE TABLE IF NOT EXISTS `cpj_prayers` (
  `id` int(11) NOT NULL auto_increment,
  `article` text NOT NULL,
  `frontPageText` text NOT NULL,
  `frontPagePictureId` int(11) NOT NULL,
  `frontPageYes` tinyint(1) NOT NULL default '1',
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_prayers`
--

INSERT INTO `cpj_prayers` (`id`, `article`, `frontPageText`, `frontPagePictureId`, `frontPageYes`, `status`) VALUES
(1, '<p><span> Amazing things can happen when people come into agreement. It''s a principle directly from God''s Word, and Assemblies of God Nigeria is dedicated to praying in unity with people, just like you, who desire to see the Holy Spirit''s miracle-working power unleashed.<br /><br />When you send your prayer requests, they are instantly sent to our Mighty Warrior Intercessors Army, a worldwide group of tens of thousands of faithful believers.</span></p>', '<ul>\r\n<li>Prayer Request</li>\r\n<li>Partner With us</li>\r\n<li>Prayer Meetings</li>\r\n<li>Prayer Related Teachings</li>\r\n<li>Testimonies<br /> And Many More ...</li>\r\n</ul>', 26, 1, 1),
(2, 'sdsdsd', 'dsdsds', 281, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_programme_of_study`
--

CREATE TABLE IF NOT EXISTS `cpj_programme_of_study` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `levelId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_programme_of_study`
--

INSERT INTO `cpj_programme_of_study` (`id`, `name`, `levelId`, `status`) VALUES
(1, 'Programme of Study1', 1, 1),
(2, 'Programme Of Study11', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_school_courses`
--

CREATE TABLE IF NOT EXISTS `cpj_school_courses` (
  `id` int(11) NOT NULL auto_increment,
  `courseName` varchar(100) NOT NULL,
  `levelId` int(11) NOT NULL,
  `courseCode` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `programmeOfStudyId` int(11) NOT NULL,
  `unitLoad` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cpj_school_courses`
--

INSERT INTO `cpj_school_courses` (`id`, `courseName`, `levelId`, `courseCode`, `status`, `programmeOfStudyId`, `unitLoad`) VALUES
(1, 'Gods Grace I', 1, 'GG101', 1, 1, 1),
(2, 'Gods Grace II', 1, 'GG102', 1, 1, 2),
(3, 'Gods Grace 2', 2, 'GG201', 1, 1, 3),
(4, 'Gods Grace 2.1', 2, 'GG202', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_school_fees`
--

CREATE TABLE IF NOT EXISTS `cpj_school_fees` (
  `id` int(11) NOT NULL auto_increment,
  `fees` double NOT NULL,
  `bibleStudentId` int(11) NOT NULL,
  `programmeOfStudyId` int(11) NOT NULL,
  `schoolId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `modeOfPay` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `transactionId` int(11) NOT NULL,
  `datePaid` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `levelId` int(11) NOT NULL,
  `denomination` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cpj_school_fees`
--

INSERT INTO `cpj_school_fees` (`id`, `fees`, `bibleStudentId`, `programmeOfStudyId`, `schoolId`, `firstName`, `lastName`, `modeOfPay`, `status`, `country`, `state`, `address`, `city`, `zipCode`, `transactionId`, `datePaid`, `levelId`, `denomination`) VALUES
(7, 231, 12, 1, 2, 'Akujua', 'Onyekachi', 1, 1, 'NG', '1', 'assdd ', 'Ikoja', '23333', 4, '0000-00-00 00:00:00', 1, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_school_level`
--

CREATE TABLE IF NOT EXISTS `cpj_school_level` (
  `id` int(11) NOT NULL auto_increment,
  `level` varchar(100) NOT NULL,
  `baseYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cpj_school_level`
--

INSERT INTO `cpj_school_level` (`id`, `level`, `baseYes`, `status`) VALUES
(1, '100', 1, 1),
(2, '200', 0, 1),
(3, '300', 0, 1),
(4, '400', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_school_students_settings`
--

CREATE TABLE IF NOT EXISTS `cpj_school_students_settings` (
  `id` int(11) NOT NULL auto_increment,
  `schoolId` int(11) NOT NULL,
  `registrationBlockedYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `maxUnitLoad` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_school_students_settings`
--

INSERT INTO `cpj_school_students_settings` (`id`, `schoolId`, `registrationBlockedYes`, `status`, `maxUnitLoad`) VALUES
(1, 1, 0, 1, 33),
(2, 2, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_schools`
--

CREATE TABLE IF NOT EXISTS `cpj_schools` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `information` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `fpYes` tinyint(4) NOT NULL,
  `fpInfo` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cpj_schools`
--

INSERT INTO `cpj_schools` (`id`, `name`, `information`, `status`, `fpYes`, `fpInfo`) VALUES
(1, 'Evangel Theological Seminary Jos', 'Welcome to ETS Jos', 1, 1, ''),
(2, 'Assemblies of God Divinity School Umuahia', 'Welcome to AGDS Umuahia', 1, 0, ''),
(3, 'dsdsd', '', 0, 0, ''),
(4, 'A22', '<p>sdsds</p>', 0, 0, '<p>sdsds</p>'),
(5, 'd43', '<p>sdsdsad</p>', 0, 0, '<p>dsdasd&nbsp;&nbsp;</p>'),
(6, 'A321', '<p><img src="../../../images/2.JPG" alt="" width="1024" height="768" /></p>', 0, 0, '<p><img src="../../../images/2.JPG" alt="" width="1024" height="768" /></p>'),
(7, 'A3212', '<p><img src="images/2.JPG" alt="" /></p>', 0, 0, '<p><img src="images/2.JPG" alt="" /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_section`
--

CREATE TABLE IF NOT EXISTS `cpj_section` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentId` int(11) default NULL,
  `status` tinyint(4) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cpj_section`
--

INSERT INTO `cpj_section` (`id`, `name`, `parentId`, `status`, `information`) VALUES
(1, 'headquarters', NULL, 1, 'ddsad'),
(2, 'Districts', 1, 1, ''),
(3, 'Sections', 2, 1, ''),
(4, 'Local Church', 3, 1, ''),
(6, 'Area', 1, 1, ''),
(7, 'Parish', 6, 0, ''),
(8, 'Missionary Areas', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_sections`
--

CREATE TABLE IF NOT EXISTS `cpj_sections` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `parentNodeId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cpj_sections`
--

INSERT INTO `cpj_sections` (`id`, `name`, `parentNodeId`, `status`, `information`) VALUES
(1, 'Nsukka North East', 3, 1, ''),
(2, 'AG Umuahia North', 23, 1, ''),
(3, 'AG Surulere', 15, 1, ''),
(4, 'Mokola', 14, 1, ''),
(5, 'Sango Otta', 28, 1, ''),
(6, 'Awka', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_shipping_company`
--

CREATE TABLE IF NOT EXISTS `cpj_shipping_company` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_shipping_company`
--

INSERT INTO `cpj_shipping_company` (`id`, `name`, `address`, `status`) VALUES
(1, 'FedEx', '3 Adbas Road,\r\nEnugu ', 1),
(2, 'UPS', '3 Ploas Road,\r\nBauchi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_shipping_rates`
--

CREATE TABLE IF NOT EXISTS `cpj_shipping_rates` (
  `id` int(11) NOT NULL auto_increment,
  `shippingCompanyId` int(11) NOT NULL,
  `destinationStateId` int(11) NOT NULL,
  `destinationCountryId` varchar(10) NOT NULL,
  `cost` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `insurancePercent` double NOT NULL,
  `dischargeamount` double NOT NULL,
  `shippingInfo` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_shipping_rates`
--

INSERT INTO `cpj_shipping_rates` (`id`, `shippingCompanyId`, `destinationStateId`, `destinationCountryId`, `cost`, `status`, `insurancePercent`, `dischargeamount`, `shippingInfo`) VALUES
(1, 1, 1, '1', 1900, 1, 1, 30, 'Not Available'),
(2, 0, 0, '0', 0, 1, 0, 0, 'Get To any AG district nearby and collect your order');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_shop`
--

CREATE TABLE IF NOT EXISTS `cpj_shop` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `pictureId` int(11) NOT NULL,
  `itemCost` double NOT NULL,
  `itemPreview` text NOT NULL,
  `mediaCategoryId` int(11) NOT NULL,
  `mediaKeywordIds` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `uniqueId` varchar(100) NOT NULL,
  `fpYes` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=505 ;

--
-- Dumping data for table `cpj_shop`
--

INSERT INTO `cpj_shop` (`id`, `title`, `author`, `pictureId`, `itemCost`, `itemPreview`, `mediaCategoryId`, `mediaKeywordIds`, `status`, `uniqueId`, `fpYes`) VALUES
(1, 'Pastors Journal', 'Resser Baur', 85, 100, '<p>This book discusses the temptations that befall man everyday and how to overcome them</p>', 0, '2', 1, '439ec72309efe86ab6ab3455efa82b84', 1),
(2, 'Key Concepts Of Life', 'asds sas', 86, 2310, 'What are the concepts of life that affect our daily living', 1, '1,2', 1, 'b437b1ddbd11b2694e2c98435ee5b5c8', 0),
(3, 'Encounters in Revelation', 'Revd Prof. Paul Emeka', 220, 90, '<p>Place Description here!</p>', 0, '0', 1, 'ff16d8b07a5a081f8ee74426899279b6', 0),
(4, 'The Relevance of the Holy Spirit', 'Revd Dr. John Ikoni and Revd Ndubueze Oti', 221, 310, '<p>Place description here!</p>', 0, '0', 1, '3730e87ff8aef30aa7bb28a8db2a8e30', 0),
(5, 'The Life and Teaching of Christ', 'Myer Pearlman', 222, 70, '<p>Place Description here!</p>', 0, '0', 1, '29cef1477982ee24803b853f6ade3251', 0),
(6, 'Tenets of Faith', 'General Council', 223, 2310, '<p>Place book description here</p>', 0, '0', 1, 'a080008cdc5e74c952b82ab3bd3b7337', 0),
(10, 'T2rials & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec72309efe86a82b84', 0),
(12, 'Ke2y Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11c98435ee5b5c8', 0),
(13, '1Tr2ials & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec72309efe86ab61wqab3455efa82b84', 0),
(14, '1Ke2y Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11b268435ee5b5112c8', 0),
(15, '12Tr2ials & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec72309efe86zqab3455efa82b84', 0),
(16, '12Key2 Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11b2694e2c98435ee5cxzcxb5dsd112c8', 0),
(24, 'Key4 Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11b2694e25b5c8', 0),
(34, '1Tr4ials & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec7230b61wqab3455efa82b84', 0),
(44, '1Ke4y Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11b2694e5b5112c8', 0),
(54, '12Tr4ials & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec72309efe86ab65efa82b84', 0),
(64, '12Ke4y Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd12694cxb5112c8', 0),
(103, 'Tri4als & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '2', 1, '439ec72309efe86a5efa82b84', 0),
(104, 'T2ria4ls & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec7230986a82b84', 0),
(116, '12Key42 Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11b269b5dsd112c8', 0),
(124, 'Ke2y 4Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b43d11c98435ee5b5c8', 0),
(125, '12Tr2i4als & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that be2fall man everyday and how to overcome them</p>', 0, '', 1, '439ec7230955efa82b84', 0),
(134, '1Tr2ia4ls & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec72309e455efa82b84', 0),
(144, '1Ke2y 4Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd1ee5b5112c8', 0),
(153, '12Trr2i4als & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec55efa82b84', 0),
(169, '12Kery42 Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddb112c8', 0),
(174, 'T2rira4ls & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439e86a82b84', 0),
(175, 'Trir4als & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '2', 1, '439ec7230982b84', 0),
(178, 'Ke2ry 4Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b43d11c98e5b5c8', 0),
(184, '1Tr2ria4ls & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '4399e455efa82b84', 0),
(274, 'Krey4 Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd2694e2c8', 0),
(374, '1Tr4rials & Temptations That Befall Us', 'Resser Baur', 85, 0, '<p>This video discusses the temptations that befall man everyday and how to overcome them</p>', 0, '', 1, '439ec7230b6efa82b84', 0),
(474, '1Kre4y Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1ddbd11b2b5112c8', 0),
(503, '1Ke2ry 4Concepts in development', 'asds sas', 86, 2310, '<p>fds dfsdd dfs&nbsp;&nbsp;  &nbsp;&nbsp;</p>', 1, '1,2', 1, 'b437b1d112c8', 0),
(504, 'Ultimate purpose', 'Chinedu', 375, 1, '<p>This Is the Best book in the world</p>', 0, '0', 1, '21b6759de249772ac957db2bbf85bcda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_shop_order`
--

CREATE TABLE IF NOT EXISTS `cpj_shop_order` (
  `id` int(11) NOT NULL auto_increment,
  `customerName` varchar(100) NOT NULL,
  `itemUniqueId` varchar(100) NOT NULL,
  `itemCost` double NOT NULL default '0',
  `qty` int(11) NOT NULL default '0',
  `shipCost` double NOT NULL default '0',
  `tax` double NOT NULL default '0',
  `insurance` double NOT NULL default '0',
  `dischargeAmount` double NOT NULL default '0',
  `shippingCompanyName` varchar(100) NOT NULL,
  `status` enum('Invalid','Undelivered','Delivered') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_shop_order`
--

INSERT INTO `cpj_shop_order` (`id`, `customerName`, `itemUniqueId`, `itemCost`, `qty`, `shipCost`, `tax`, `insurance`, `dischargeAmount`, `shippingCompanyName`, `status`) VALUES
(1, 'Kachi Akujua', '', 0, 0, 1900, 0, 232, 0, 'FedEx', 'Undelivered'),
(2, 'Kachi Akujua', '', 0, 0, 1900, 0, 232, 0, 'FedEx', 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_shop_settings`
--

CREATE TABLE IF NOT EXISTS `cpj_shop_settings` (
  `id` int(11) NOT NULL auto_increment,
  `fpssId` int(11) NOT NULL,
  `advertisementId` int(11) NOT NULL,
  `weeklySpecialShopIds` varchar(100) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `sectionChildId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `activeYes` tinyint(4) NOT NULL,
  `advertLinkToFeatureId` int(11) default NULL,
  `advertLinkToFeatureChildId` int(11) default NULL,
  `topTenAutomaticYes` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cpj_shop_settings`
--

INSERT INTO `cpj_shop_settings` (`id`, `fpssId`, `advertisementId`, `weeklySpecialShopIds`, `sectionId`, `sectionChildId`, `status`, `activeYes`, `advertLinkToFeatureId`, `advertLinkToFeatureChildId`, `topTenAutomaticYes`) VALUES
(1, 0, 14, '2', 1, 0, 1, 0, NULL, NULL, 0),
(2, 5, 14, '2', 1, 0, 1, 0, NULL, NULL, 0),
(3, 5, 14, '2', 1, 0, 1, 0, NULL, NULL, 0),
(4, 5, 14, 'Array,Array', 1, 0, 1, 0, NULL, NULL, 0),
(5, 5, 14, 'Array,Array', 1, 0, 1, 0, NULL, NULL, 0),
(6, 5, 14, '1,Array', 1, 0, 1, 0, NULL, NULL, 0),
(7, 5, 14, '1,2', 1, 0, 1, 0, NULL, NULL, 0),
(8, 5, 14, '1,2', 1, 0, 1, 0, NULL, NULL, 0),
(9, 5, 14, '1,2', 1, 0, 1, 0, 3, 1, 0),
(10, 5, 14, '1,2', 1, 0, 1, 0, 0, 0, 0),
(11, 5, 14, '1,2', 1, 0, 1, 0, 3, 0, 0),
(12, 5, 14, '', 1, 0, 1, 0, 0, 0, 0),
(13, 5, 14, '', 1, 0, 1, 0, 19, 0, 0),
(14, 5, 14, '1,2', 1, 1, 1, 0, 3, 0, 0),
(15, 5, 14, '1,2', 1, 0, 1, 0, 0, 0, 0),
(16, 5, 14, '1,2', 1, 0, 1, 0, 3, 0, 0),
(17, 5, 14, '1,2', 1, 0, 1, 1, 3, 1, 0),
(18, 7, 15, '3,2,5', 2, 1, 1, 0, 3, 11, 0),
(19, 9, 14, '5,4,3,2,1,6', 6, 2, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_site`
--

CREATE TABLE IF NOT EXISTS `cpj_site` (
  `id` int(11) NOT NULL auto_increment,
  `churchName` varchar(400) NOT NULL,
  `yearDeveloped` int(11) NOT NULL,
  `faviconFileId` int(11) NOT NULL,
  `siteTitle` varchar(400) NOT NULL,
  `keywords` text NOT NULL,
  `activateSendMails` tinyint(4) NOT NULL default '1',
  `sendAdminMailYes` tinyint(4) NOT NULL default '1',
  `status` tinyint(4) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `author` text NOT NULL,
  `copyright` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `churchName` (`churchName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_site`
--

INSERT INTO `cpj_site` (`id`, `churchName`, `yearDeveloped`, `faviconFileId`, `siteTitle`, `keywords`, `activateSendMails`, `sendAdminMailYes`, `status`, `currency`, `description`, `author`, `copyright`) VALUES
(1, 'Assemblies Of God Nigeria', 2009, 0, 'The Assemblies Of God Nigeria', 'Jesus, Christ, God, Saviour, HolySpirit, Holy, Spirit, Salvation, Blood, Love, Cross, Church, Sin, Repent, Repentance', 0, 1, 1, 'Nigerian Naira', 'General Council of the Assemblies of God Nigeria', 'AG Nigeria', 'Copyright 2008, 2009');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_site_map`
--

CREATE TABLE IF NOT EXISTS `cpj_site_map` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `featureId` int(11) NOT NULL,
  `frontpageYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `featureChildId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `cpj_site_map`
--

INSERT INTO `cpj_site_map` (`id`, `name`, `featureId`, `frontpageYes`, `status`, `featureChildId`) VALUES
(1, 'Revd Prof. Emeka Paul''s Blog', 16, 0, 1, 0),
(6, 'Devotionals', 2, 0, 1, 0),
(8, 'Announcement', 1, 0, 1, 1),
(9, 'Events', 3, 0, 1, 2),
(10, 'Revd Dr. Charles Osueke Blog', 16, 0, 1, 1),
(11, 'Jesus Is Alive', 16, 0, 1, 10),
(12, 'News', 7, 0, 1, 1),
(13, 'Prayers', 8, 0, 1, 1),
(14, 'Our History', 14, 0, 1, 6),
(15, 'Our Mission Statement', 14, 0, 1, 7),
(16, 'Our Core Values', 14, 0, 1, 8),
(17, 'Our Beliefs', 14, 0, 1, 9),
(18, 'Evangel University Donations', 24, 0, 1, 3),
(19, 'Missions Donation', 24, 0, 1, 2),
(20, 'Evangel Light Media Productions Donation', 24, 0, 1, 1),
(21, 'Welcome To AG Nigeria', 23, 0, 1, 1),
(22, 'Our Products', 21, 0, 1, 0),
(23, 'Videos & Audios', 19, 0, 1, 0),
(24, 'Missions', 17, 0, 1, 8),
(25, 'Evangel Theatre', 17, 0, 1, 9),
(26, 'GS Ministries', 17, 0, 1, 10),
(27, 'Media Department', 17, 0, 1, 11),
(28, 'Evangel', 7, 0, 1, 5),
(29, 'Devotionals', 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_slideshow_images`
--

CREATE TABLE IF NOT EXISTS `cpj_slideshow_images` (
  `id` int(11) NOT NULL auto_increment,
  `uniqueId` varchar(50) NOT NULL,
  `fileId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `backgroundYes` tinyint(4) NOT NULL,
  `slideTitle` text NOT NULL,
  `slideShowId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `cpj_slideshow_images`
--

INSERT INTO `cpj_slideshow_images` (`id`, `uniqueId`, `fileId`, `status`, `backgroundYes`, `slideTitle`, `slideShowId`) VALUES
(1, 'sasas', 0, 0, 0, '', 0),
(2, '4a390190d3369', 30, 1, 0, '2009 Conquest ', 2),
(3, '4a390190d4c07', 31, 1, 0, '2010 Conquest', 2),
(4, '4a39039b9d6bb', 32, 1, 0, 'TITLE1', 3),
(5, '4a39039b9f41a', 33, 1, 0, 'TITLE2', 3),
(6, '4a39047a70323', 34, 1, 1, 'TITLE5', 4),
(7, '4a39047a77201', 35, 1, 0, 'TITLE6', 4),
(9, '4a6b491064843', 39, 1, 1, 'Picture 2', 5),
(10, '4a6b491066ae9', 40, 1, 0, 'Picture 3', 5),
(11, '4a6b491068623', 41, 1, 0, 'Picture 4', 5),
(13, '4a6b491072c80', 43, 1, 0, 'Picture 6', 5),
(14, '4a6b4910797f9', 44, 1, 0, 'Picture 7', 5),
(15, '4a6b49107b69d', 45, 1, 0, 'Picture 8', 5),
(16, '4a6b49107e5ae', 46, 1, 0, 'Picture 9', 5),
(17, '4a6b4910805b2', 47, 1, 0, 'Picture 10', 5),
(19, '4a6b491084b82', 49, 1, 0, 'Picture 12', 5),
(22, '4a6b49108b341', 52, 1, 0, 'Picture 15', 5),
(23, '4ae1482a7c03b', 181, 1, 1, 'We are a people of the Spirit', 6),
(24, '4ae1482a91995', 182, 1, 0, 'We are a people of the Spirit', 6),
(25, '4ae1482a9c186', 183, 1, 0, 'We are a people of the Spirit', 6),
(26, '4ae1482a9e11f', 184, 1, 0, 'We are a people of the Spirit', 6),
(27, '4ae1482a9fdd5', 185, 1, 0, 'We are a people of the Spirit', 6),
(28, '4ae1482aa1b1d', 186, 1, 0, 'We are a people of the Spirit', 6),
(29, '4ae16d4792b52', 188, 1, 1, 'Event SlideShow', 7),
(30, '4ae16d47a214a', 189, 1, 0, 'Event SlideShow', 7),
(31, '4ae16d47b18ad', 190, 1, 0, 'Event SlideShow', 7),
(32, '4ae16d47b3656', 191, 1, 0, 'Event SlideShow', 7),
(33, '4ae16d47b579c', 192, 1, 0, 'Event SlideShow', 7),
(34, '4ae16d47baaf3', 193, 1, 0, 'Event SlideShow', 7),
(35, '4ae175c7b6f85', 194, 1, 1, 'Events Slideshow', 8),
(36, '4ae175c7b8e61', 195, 1, 0, 'Events Slideshow', 8),
(37, '4ae175c7bae2a', 196, 1, 0, 'Events Slideshow', 8),
(38, '4ae175c7bcd9b', 197, 1, 0, 'Events Slideshow', 8),
(39, '4ae175c7beaa4', 198, 1, 0, 'Events Slideshow', 8),
(40, '4ae175c7c1408', 199, 1, 0, 'Events Slideshow', 8),
(41, '4ae175c7c4b05', 200, 1, 0, 'Events Slideshow', 8),
(42, '4ae175c7c72bd', 201, 1, 0, 'Events Slideshow', 8),
(43, '4ae175c7c9642', 202, 1, 0, 'Events Slideshow', 8),
(44, '4afbecdb51abc', 274, 1, 1, 'Sdrer', 9),
(45, '4afbecdb53b97', 275, 1, 0, 'Sdrer', 9),
(46, '4afbecdb58786', 276, 1, 0, 'Sdrer', 9),
(47, '4b06ef8c3af6d', 360, 1, 1, 'Sango Slide', 12),
(48, '4b06efb2df536', 362, 1, 1, 'Sango Slide', 13),
(49, '4b06efb2e5411', 363, 1, 0, 'Sango Slide', 13),
(55, '4b0ba63870f8f', 378, 1, 1, 'As usual', 15),
(56, '4b0ba63894852', 379, 1, 0, 'As usual', 15),
(59, '4b0ba6cc320b9', 382, 1, 0, 'As usual', 15),
(60, '4b0ba72f9fbd8', 383, 1, 0, 'As usual', 15),
(61, '4b0ba760ed3a8', 384, 1, 0, 'As usual', 15);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_states`
--

CREATE TABLE IF NOT EXISTS `cpj_states` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `countryId` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_states`
--

INSERT INTO `cpj_states` (`id`, `name`, `countryId`, `status`) VALUES
(1, 'Abia', 'NG', 1),
(2, 'Adamawa', 'NG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_subscriptions`
--

CREATE TABLE IF NOT EXISTS `cpj_subscriptions` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `contentsHtml` text NOT NULL,
  `contentsNoHtml` text NOT NULL,
  `dateOfPublication` date NOT NULL,
  `distributionTypeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sentYes` tinyint(4) NOT NULL,
  `fpText` text NOT NULL,
  `fpYes` tinyint(4) NOT NULL default '0',
  `paymentYes` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cpj_subscriptions`
--

INSERT INTO `cpj_subscriptions` (`id`, `name`, `contentsHtml`, `contentsNoHtml`, `dateOfPublication`, `distributionTypeId`, `title`, `status`, `sentYes`, `fpText`, `fpYes`, `paymentYes`) VALUES
(1, 'Welcome To Texas', '<p>sdsad safsd assads adss</p>', 'sdsad safsd assads adss', '0000-00-00', 1, 'newsletterTitle', 1, 0, 'Sign Up today for Texas newsletter', 1, 1),
(2, 'dasdsda', 'sdsd', 'sdsd', '2009-11-12', 2, 'sdsad', 1, 0, 'sdasd', 0, 0),
(3, 'dsdsd', 'sdasd', 'sdasd', '2009-11-12', 3, 'dsds', 1, 0, 'sadsad', 0, 1),
(4, 'sdsds', '<p>sdsds</p>', 'sdsds', '2009-11-27', 1, 'dsadsad', 1, 0, '<p>asdsadsad</p>', 0, 0),
(5, 'asadsdsd', '<p>dasdsad</p>', 'dasdsad', '2009-11-27', 2, 'sdsdsdsd', 1, 0, '<p>sdadad</p>', 0, 1),
(6, 'a23211', '<p><img src="images/2.JPG" alt="" /></p>', '', '2009-11-29', 2, 'a23211', 0, 0, '<p><img src="../../../images/2.JPG" alt="" /></p>', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_subscriptions_receipients`
--

CREATE TABLE IF NOT EXISTS `cpj_subscriptions_receipients` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(200) NOT NULL,
  `subscriptionsId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userId` int(11) default NULL,
  `dateSubscribed` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_subscriptions_receipients`
--

INSERT INTO `cpj_subscriptions_receipients` (`id`, `email`, `subscriptionsId`, `status`, `phone`, `firstName`, `lastName`, `userId`, `dateSubscribed`) VALUES
(1, '', 2, 1, '+2347804471', 'Akujua', 'Onyekachi', NULL, '0000-00-00 00:00:00'),
(2, '', 2, 1, '+2348037804471', 'Kachi', 'Akujua', 1, '2009-12-12 02:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_sunday_school_members`
--

CREATE TABLE IF NOT EXISTS `cpj_sunday_school_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `adminPosition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_sunday_school_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `cpj_tables_list`
--

CREATE TABLE IF NOT EXISTS `cpj_tables_list` (
  `id` int(11) NOT NULL auto_increment,
  `tableName` varchar(150) NOT NULL,
  `information` text NOT NULL,
  `authorId` tinyint(1) default '0',
  `status` tinyint(1) NOT NULL default '0',
  `dateEstablished` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cpj_tables_list`
--

INSERT INTO `cpj_tables_list` (`id`, `tableName`, `information`, `authorId`, `status`, `dateEstablished`) VALUES
(1, 'cpj_careers', '', 0, 1, '2009-05-26 14:07:08'),
(2, 'cpj_departments', '', 0, 1, '2009-05-26 14:07:08'),
(3, 'cpj_departmentprojects', '', 0, 1, '2009-05-26 14:07:08'),
(4, 'cpj_displaydepartments', '', 0, 1, '2009-05-26 14:07:08'),
(5, 'cpj_displayevents', '', 0, 1, '2009-05-26 14:07:08'),
(6, 'cpj_displayforum', '', 0, 1, '2009-05-26 14:07:08'),
(7, 'cpj_displayforumplatform', '', 0, 1, '2009-05-26 14:07:08'),
(8, 'cpj_displayprayer', '', 0, 1, '2009-05-26 14:07:08'),
(9, 'cpj_displayuser', '', 0, 1, '2009-05-26 14:07:08'),
(10, 'cpj_events', '', 0, 1, '2009-05-26 14:07:08'),
(11, 'cpj_forum', '', 0, 1, '2009-05-26 14:07:08'),
(12, 'cpj_forumplatform', '', 0, 1, '2009-05-26 14:07:08'),
(13, 'cpj_members', '', 0, 1, '2009-05-26 14:07:08'),
(14, 'cpj_prayer', '', 0, 1, '2009-05-26 14:07:08'),
(15, 'cpj_tableslist', '', 0, 1, '2009-05-26 14:07:08'),
(16, 'cpj_user', '', 0, 1, '2009-05-26 14:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_templates`
--

CREATE TABLE IF NOT EXISTS `cpj_templates` (
  `id` int(11) NOT NULL auto_increment,
  `templateName` varchar(200) NOT NULL,
  `creatorNames` varchar(200) NOT NULL,
  `dateCreated` date NOT NULL,
  `dateUploaded` timestamp NOT NULL default '0000-00-00 00:00:00',
  `tempFilePath` varchar(400) NOT NULL,
  `cssFilePath` varchar(400) NOT NULL,
  `status` enum('Active','Deactive','Default') NOT NULL,
  `frontPageYes` tinyint(4) NOT NULL,
  `jsFilePath` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `templateName` (`templateName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cpj_templates`
--

INSERT INTO `cpj_templates` (`id`, `templateName`, `creatorNames`, `dateCreated`, `dateUploaded`, `tempFilePath`, `cssFilePath`, `status`, `frontPageYes`, `jsFilePath`) VALUES
(6, 'asquire', 'kaka', '0000-00-00', '2009-07-13 20:51:13', 'index.php', 'template.css', 'Deactive', 0, ''),
(7, 'asquire1', 'kaka', '0000-00-00', '0000-00-00 00:00:00', 'index.php', 'template.css', 'Deactive', 0, ''),
(8, 'majestic', 'kaka', '0000-00-00', '2009-07-25 19:17:28', 'index.php', 'default.css', 'Deactive', 0, ''),
(9, 'RealTime', 'Kachi', '2023-08-09', '2009-08-18 17:13:14', 'index.php', 'smoots.css', 'Active', 0, ''),
(10, 'RealTimeInner', 'Kachi', '2023-08-09', '2009-08-18 17:13:14', 'index.php', 'smoots1.css', 'Deactive', 0, ''),
(11, 'Templar', 'Kachi Akujua', '0000-00-00', '2009-10-24 06:09:06', 'index.php', '', 'Active', 0, ''),
(12, 'A12', 'A211', '2009-11-16', '2009-11-14 03:48:28', 'index.php', '', 'Deactive', 0, ''),
(13, 'templatedemo', 'trial', '2009-11-21', '2009-11-20 14:30:32', 'index.php', '', 'Deactive', 0, ''),
(14, 'RealBlueTemplate', 'Kachi Akujua', '2009-12-11', '2009-12-05 23:16:22', 'index.php', '', 'Active', 1, ''),
(15, 'blueTemplateInner', 'Kachi Akujua', '2009-12-17', '2009-12-06 17:08:37', 'index.php', '', 'Active', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cpj_toolbox`
--

CREATE TABLE IF NOT EXISTS `cpj_toolbox` (
  `id` int(11) NOT NULL auto_increment,
  `itemName` varchar(200) NOT NULL,
  `activateYes` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `itemName` (`itemName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cpj_toolbox`
--

INSERT INTO `cpj_toolbox` (`id`, `itemName`, `activateYes`, `status`) VALUES
(1, 'View My Account Details', 1, 1),
(2, 'Edit My Account Details', 1, 1),
(3, 'My Mail', 1, 1),
(4, 'My Notifications', 1, 1),
(5, 'FAQ', 1, 1),
(6, 'Index', 1, 1),
(7, 'Admin Support', 1, 1),
(8, 'My Subscriptions', 1, 1),
(9, 'Donate', 1, 1),
(10, 'Payment History', 1, 1),
(11, 'Site Manager', 1, 1),
(12, 'Features Manager', 1, 1),
(13, 'Component Manager', 1, 1),
(14, 'Business Intelligence Reporting Tools', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_updates`
--

CREATE TABLE IF NOT EXISTS `cpj_updates` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(300) NOT NULL,
  `updateDescription` text NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cpj_updates`
--

INSERT INTO `cpj_updates` (`id`, `name`, `updateDescription`, `status`) VALUES
(1, 'update012', 'thensd sskdsk sksd\r\nsdsdsd\r\nsdsdsd\r\ns\r\n\r\nssdsds\r\n\r\ndXBkYXRlMDEyLnppcA== !sdksd skdskd \r\ndsdsd\r\nsdsdsd sdskd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_user`
--

CREATE TABLE IF NOT EXISTS `cpj_user` (
  `id` int(11) NOT NULL auto_increment,
  `section` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(160) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `otherName` varchar(50) NOT NULL,
  `sex` enum('Female','Male') NOT NULL,
  `dateOfBirth` date NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `dateRegistered` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL default '0',
  `departmentIds` varchar(20) default NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(14) NOT NULL,
  `pictureId` int(11) NOT NULL,
  `profile` text NOT NULL,
  `churchPostId` int(11) default NULL,
  `contactAddress` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `activationCode` varchar(100) NOT NULL,
  `dateLastModified` timestamp NOT NULL default '0000-00-00 00:00:00',
  `portalEmail` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cpj_user`
--

INSERT INTO `cpj_user` (`id`, `section`, `sectionId`, `username`, `password`, `firstName`, `lastName`, `otherName`, `sex`, `dateOfBirth`, `userTypeId`, `dateRegistered`, `status`, `departmentIds`, `email`, `phoneNumber`, `pictureId`, `profile`, `churchPostId`, `contactAddress`, `country`, `state`, `activationCode`, `dateLastModified`, `portalEmail`) VALUES
(1, 0, 0, 'james', '5f4dcc3b5aa765d61d8327deb882cf99', 'Paul11', 'Emeka', '', 'Male', '0000-00-00', 7, '2009-06-14 20:24:57', 1, NULL, '', '', 26, '', 7, '', 'NULL', '', '', '2009-11-24 19:22:45', NULL),
(2, 0, 0, 'osueke', '5f4dcc3b5aa765d61d8327deb882cf99', 'Osueke', 'Charles', '', 'Male', '0000-00-00', 0, '2009-10-23 21:09:44', 1, NULL, '', '', 207, '', 1, '', 'NULL', '', '', '2009-11-24 19:24:47', NULL),
(4, 4, 1, 'agaba', '5f4dcc3b5aa765d61d8327deb882cf99', 'linus', 'agaba', 'ugo', 'Male', '1984-10-01', 3, '2009-10-24 03:40:25', 1, NULL, 'agabalinus@agnigeria.com', '08032034292', 209, 'I am currently the District Superintendent of Nsukka District of Assemblies of God.\r\nI am a member of PFN, CAN Secretary, Nsukka Zone, forum for Enugu State Govt. \r\napproved private schools. \r\nI have preached very many messages. But only a few are recorded. (The arcient land \r\nmarks int eh modern world)\r\nMost of my works are yet to be published \r\n', 5, '12 university market road nsukka', 'nigeria', '', '', '0000-00-00 00:00:00', NULL),
(5, 1, 0, 'paul_emeka', '5f4dcc3b5aa765d61d8327deb882cf99', 'Paul', 'Emeka', '', 'Male', '0000-00-00', 0, '2009-10-23 21:14:24', 1, NULL, '', '', 208, '', 2, '', 'NULL', '', '', '2009-11-11 01:55:36', NULL),
(6, 1, 0, 'michael_ezeocha', '5f4dcc3b5aa765d61d8327deb882cf99', 'Michael', 'Ezeocha', 'E.', 'Male', '1984-10-01', 2, '2009-10-24 04:02:48', 1, NULL, 'michael_ezeocha@yahoo.com', '0908199121', 210, 'I am the present Sectional leader of Nsukka North Section and Nsukka District Section', 7, '129 Onuiyi Nsukka ', 'NGA', '', '', '0000-00-00 00:00:00', NULL),
(7, 1, 0, 'ben_okorafor', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ben', 'Okorafor', '', 'Male', '1984-10-03', 0, '2009-10-24 05:29:24', 1, NULL, 'ben_okorafor@yahoo.com', '0908199121', 213, '', 7, '', 'NGA', '', '', '0000-00-00 00:00:00', NULL),
(8, 1, 1, 'kachi', '5f4dcc3b5aa765d61d8327deb882cf99', 'kachi', 'Akujua', 'obinna', 'Male', '1984-07-08', 5, '2009-10-25 23:44:08', 1, NULL, 'sadsd@ksd.com', '0803316667211', 227, 'dfsdfdf', NULL, 'dsd ads', 'NG', '', '', '0000-00-00 00:00:00', NULL),
(9, 2, 3, 'chichi', '5f4dcc3b5aa765d61d8327deb882cf99', 'chichi', 'akujua', 'chibuzor', 'Male', '1984-07-08', 1, '2009-10-25 23:55:24', 0, NULL, 'aassd@slsd.com', '09032233939331', 228, 'dsadadadd', NULL, 'dssdsd', 'NG', '', '0f7af9a8ef9f12d69e9918e24d84cd31', '0000-00-00 00:00:00', NULL),
(11, 4, 1, 'klosds', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'lldk', 'sdksd', 'Male', '1945-10-11', 1, '2009-10-26 13:32:38', 0, NULL, 'SDDD@ASJS.COM', '09033112121', 229, 'dasdasd', 8, 'dasdsadsdsa', 'NG', '', 'b0a3dbc06e71d6ee8de9611050fdb7cb', '0000-00-00 00:00:00', NULL),
(13, 4, 1, 'kaka', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'Chinedu', 'Ofor', 'Male', '1990-10-02', 1, '2009-10-28 14:04:26', 1, NULL, 'msdsd@dsds.com', '09033112121232', 0, 'sadasdasd ', 8, 'sdasdasd', 'NG', '', '8bfb2a0f87fb9f6984cb49179f36166a', '0000-00-00 00:00:00', NULL),
(14, 4, 1, 'kaka`', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'Osinende', 'Palsde', 'Male', '2009-10-01', 1, '2009-10-28 14:06:48', 1, NULL, 'mslds@ldld.com', '09019223', 0, 'dasdss sdsad', NULL, 'sdsd sadsad', 'NG', '', 'e132bfcce9cd2b4ee825b4bd28e6758e', '0000-00-00 00:00:00', NULL),
(15, 4, 1, ';ls -la', '6eadefed14e242466d345879282aac05', '', ';ls -la', ';ls -la', 'Male', '2009-10-14', 1, '2009-10-28 15:03:58', 0, NULL, 'skds@ldscdf.com', ';ls -la', 0, ';ls -la', NULL, ';ls -la', 'NG', '', '28951846e60474e063c60a88009ea943', '0000-00-00 00:00:00', NULL),
(16, 1, 0, 'double', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'sdasd', 'sdsads', 'Male', '2009-11-03', 1, '2009-11-05 11:25:46', 0, NULL, 'dsadasd@lskdksd.com', '0920323232', 243, 'reewr', 7, 'fdsfds dsfsds', 'NG', '', '6f7fa4822df76b8ba68e16ebd98095d6', '0000-00-00 00:00:00', NULL),
(17, 1, 1, 'kachi232', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'dassdsd', 'sdsadsad', 'Male', '2009-11-03', 1, '2009-11-05 11:28:37', 0, NULL, 'sdsss@dsdsd.com', '0655646546456', 244, 'sadsdas', 7, 'dasdsad', 'NG', '', '3fe84cf79db2decee100c4b31b6d4ae6', '0000-00-00 00:00:00', NULL),
(18, 1, 0, 'joe', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'suriname', 'plostrae', 'Male', '1992-11-03', 1, '2009-11-11 01:17:06', 0, NULL, 'sdsdlsd@sdkskds.com', '0901212444112', 245, 'sdsadsa sdsad ssd', 8, 'fsdfdffd dfdsf', 'NG', '', '638e5f83e944a4d69627cb240037b851', '0000-00-00 00:00:00', NULL),
(19, 1, 0, 'joepsd', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'jasjas', 'ksask', 'Male', '2009-11-05', 1, '2009-11-11 01:20:32', 0, NULL, 'sds@sdldlsd.com', '2321212121212', 247, 'dsads', 8, 'dsadsdsad', 'NG', '', 'd2ee3cfab9364eebbfb5bb336d732a93', '0000-00-00 00:00:00', NULL),
(20, 1, 0, 'twinkle', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'kolijj', 'jjhhjh', 'Female', '2009-10-29', 1, '2009-11-13 08:49:37', 0, NULL, 'gjkhkh@hghgh.com', '09754335666', 309, 'vfjhf hhf', 8, 'fhfhh', 'NG', '', 'e06b0e453e31cdb86ed8f99d2b17ab3c', '0000-00-00 00:00:00', NULL),
(21, 2, 28, 'peter', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'Barns', 'Augustus', 'Male', '1953-11-04', 1, '2009-11-20 16:12:46', 1, NULL, 'peterbarns@agnigeria.com', '+234807810023', 355, 'dsds sdsd sdsd', 5, 'dsffvssd sdsds', 'NG', '', '', '0000-00-00 00:00:00', NULL),
(23, 0, 0, 'dare', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'asdsd', 'sdsd', 'Male', '1913-11-05', 1, '2009-11-21 20:03:41', 1, NULL, 'sdsd@sdlsdsd.com', '093433434', 377, 'sdasdsad', 8, 'dfdffdf', 'NG', '', '', '0000-00-00 00:00:00', NULL),
(24, 0, 0, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '0000-00-00', 1, '2009-12-07 11:35:49', 0, NULL, '', '', 0, '', 0, '', 'NULL', '', 'e090a405c0c72613c1434868cfd251dd', '0000-00-00 00:00:00', NULL),
(26, 1, 0, 'paulis', '5f4dcc3b5aa765d61d8327deb882cf99', 'sadasds', 'sadasd', 'dasds', 'Male', '2009-12-04', 1, '2009-12-07 17:28:42', 0, NULL, 'polsodsd@ldspdsd.com', '+2348029394412', 389, 'asdsad sdsd', 8, 'dsdsd sdsd', 'NG', '1', '23b9a2653727339afdfc2805b4a5f3c9', '0000-00-00 00:00:00', NULL),
(27, 1, 0, 'Nedusimtex', '2c8d12cac3fdf29787a2d4807b0dad08', 'Chinedu', 'Okongwu', 'Emmanuel', 'Male', '0000-00-00', 1, '2010-01-02 09:53:46', 0, NULL, 'nedusimtex@yahoo.com', '08034107315', 392, '', 8, 'R8 Ozubulu Street\r\nIndependence Layout, Enugu\r\n', 'NG', '', '78a6a596d960d9fd5ed66f0e35cebc48', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_usertype`
--

CREATE TABLE IF NOT EXISTS `cpj_usertype` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(11) NOT NULL,
  `systemYes` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cpj_usertype`
--

INSERT INTO `cpj_usertype` (`id`, `name`, `status`, `position`, `systemYes`) VALUES
(1, 'General User', 1, 1, 1),
(2, 'Registered Member', 1, 2, 1),
(3, 'Church Worker', 1, 3, 0),
(4, 'Pastor', 1, 4, 0),
(5, 'Administrator', 1, 6, 0),
(6, 'General Council Member', 1, 7, 0),
(7, 'Super Administrator', 1, 8, 1),
(8, 'Coordinators', 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_visitor`
--

CREATE TABLE IF NOT EXISTS `cpj_visitor` (
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `otherName` varchar(30) NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(14) NOT NULL,
  `pictureId` int(11) NOT NULL,
  `profile` text NOT NULL,
  `contactAddress` text NOT NULL,
  `post` varchar(20) NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cpj_visitor`
--

INSERT INTO `cpj_visitor` (`firstName`, `lastName`, `otherName`, `sex`, `email`, `phoneNumber`, `pictureId`, `profile`, `contactAddress`, `post`, `id`) VALUES
('dasdsad', 'sdsad', '', 0, 'sdasdsad@sdsds.com', '', 0, '', 'dssadas, NG', '', 1),
('sdssdsd', 'sdsadsad', '', 0, 'dsdad@sdsjdsd.com', '', 0, '', 'dasdasdsd, NG', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cpj_women_ministries_members`
--

CREATE TABLE IF NOT EXISTS `cpj_women_ministries_members` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) NOT NULL,
  `adminYes` tinyint(4) NOT NULL,
  `deleteYes` tinyint(4) NOT NULL default '0',
  `adminPosition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cpj_women_ministries_members`
--

