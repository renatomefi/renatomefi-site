SET SQL\_MODE="NO\_AUTO\_VALUE\_ON\_ZERO";


/**!40101 SET @OLD\_CHARACTER\_SET\_CLIENT=@@CHARACTER\_SET\_CLIENT**/;
/**!40101 SET @OLD\_CHARACTER\_SET\_RESULTS=@@CHARACTER\_SET\_RESULTS**/;
/**!40101 SET @OLD\_COLLATION\_CONNECTION=@@COLLATION\_CONNECTION**/;
/**!40101 SET NAMES utf8**/;

--
-- Database: `CMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
> `id` int(11) unsigned NOT NULL AUTO\_INCREMENT,
> `author` varchar(250) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `email` varchar(250) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `date` int(11) DEFAULT NULL,
> `url` varchar(250) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `description` text COLLATE utf8\_unicode\_ci,
> `priority` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `status` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8\_unicode\_ci AUTO\_INCREMENT=256 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_nodes`
--

CREATE TABLE IF NOT EXISTS `content_nodes` (
> `id` int(11) NOT NULL AUTO\_INCREMENT,
> `page_id` int(11) DEFAULT NULL,
> `node` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `content` text COLLATE utf8\_unicode\_ci,
> PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8\_unicode\_ci AUTO\_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
> `id` int(11) NOT NULL AUTO\_INCREMENT,
> `name` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `access_level` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8\_unicode\_ci AUTO\_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
> `id` int(11) NOT NULL AUTO\_INCREMENT,
> `menu_id` int(11) DEFAULT NULL,
> `label` varchar(250) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `page_id` int(11) DEFAULT NULL,
> `link` varchar(250) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `position` int(11) DEFAULT NULL,
> PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8\_unicode\_ci AUTO\_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
> `id` int(11) NOT NULL AUTO\_INCREMENT,
> `parent_id` int(11) DEFAULT NULL,
> `namespace` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `name` varchar(100) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `date_created` int(11) DEFAULT NULL,
> PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8\_unicode\_ci AUTO\_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
> `id` int(11) NOT NULL AUTO\_INCREMENT,
> `username` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `password` varchar(250) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `first_name` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `last_name` varchar(50) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> `role` varchar(25) COLLATE utf8\_unicode\_ci DEFAULT NULL,
> PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8\_unicode\_ci AUTO\_INCREMENT=10 ;