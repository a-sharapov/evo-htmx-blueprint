#
# My Evolution Site Database Dump
# MODX Version:1.4.17
# 
# Host: 
# Generation Time: 07-08-2022 14:56:19
# Server version: 8.0.30
# PHP Version: 7.4.30
# Database: `evo`
# Description: 
#

# --------------------------------------------------------

SET @old_sql_mode := @@sql_mode;
SET @new_sql_mode := @old_sql_mode;
SET @new_sql_mode := TRIM(BOTH ',' FROM REPLACE(CONCAT(',',@new_sql_mode,','),',NO_ZERO_DATE,'  ,','));
SET @new_sql_mode := TRIM(BOTH ',' FROM REPLACE(CONCAT(',',@new_sql_mode,','),',NO_ZERO_IN_DATE,',','));
SET @@sql_mode := @new_sql_mode ;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;


# --------------------------------------------------------



# --------------------------------------------------------

#
# Table structure for table `htmx_active_user_locks`
#

DROP TABLE IF EXISTS `htmx_active_user_locks`;
CREATE TABLE `htmx_active_user_locks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `elementType` int NOT NULL DEFAULT '0',
  `elementId` int NOT NULL DEFAULT '0',
  `lasthit` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_element_id` (`elementType`,`elementId`,`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data about locked elements.';



# --------------------------------------------------------

#
# Table structure for table `htmx_active_user_sessions`
#

DROP TABLE IF EXISTS `htmx_active_user_sessions`;
CREATE TABLE `htmx_active_user_sessions` (
  `sid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `lasthit` int NOT NULL DEFAULT '0',
  `ip` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data about valid user sessions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_active_users`
#

DROP TABLE IF EXISTS `htmx_active_users`;
CREATE TABLE `htmx_active_users` (
  `sid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `lasthit` int NOT NULL DEFAULT '0',
  `action` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id` int DEFAULT NULL,
  PRIMARY KEY (`sid`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data about last user action.';



# --------------------------------------------------------

#
# Table structure for table `htmx_categories`
#

DROP TABLE IF EXISTS `htmx_categories`;
CREATE TABLE `htmx_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `rank` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Categories to be used snippets,tv,chunks, etc';



# --------------------------------------------------------

#
# Table structure for table `htmx_document_groups`
#

DROP TABLE IF EXISTS `htmx_document_groups`;
CREATE TABLE `htmx_document_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `document_group` int NOT NULL DEFAULT '0',
  `document` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_dg_id` (`document_group`,`document`),
  KEY `document` (`document`),
  KEY `document_group` (`document_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_documentgroup_names`
#

DROP TABLE IF EXISTS `htmx_documentgroup_names`;
CREATE TABLE `htmx_documentgroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `private_memgroup` tinyint DEFAULT '0' COMMENT 'determine whether the document group is private to manager users',
  `private_webgroup` tinyint DEFAULT '0' COMMENT 'determines whether the document is private to web users',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_event_log`
#

DROP TABLE IF EXISTS `htmx_event_log`;
CREATE TABLE `htmx_event_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventid` int DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `type` tinyint NOT NULL DEFAULT '1' COMMENT '1- information, 2 - warning, 3- error',
  `user` int NOT NULL DEFAULT '0' COMMENT 'link to user table',
  `usertype` tinyint NOT NULL DEFAULT '0' COMMENT '0 - manager, 1 - web',
  `source` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Stores event and error logs';



# --------------------------------------------------------

#
# Table structure for table `htmx_manager_log`
#

DROP TABLE IF EXISTS `htmx_manager_log`;
CREATE TABLE `htmx_manager_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` int NOT NULL DEFAULT '0',
  `internalKey` int NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `action` int NOT NULL DEFAULT '0',
  `itemid` varchar(10) COLLATE utf8mb4_general_ci DEFAULT '0',
  `itemname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ip` varchar(46) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains a record of user interaction.';



# --------------------------------------------------------

#
# Table structure for table `htmx_manager_users`
#

DROP TABLE IF EXISTS `htmx_manager_users`;
CREATE TABLE `htmx_manager_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains login information for backend users.';



# --------------------------------------------------------

#
# Table structure for table `htmx_member_groups`
#

DROP TABLE IF EXISTS `htmx_member_groups`;
CREATE TABLE `htmx_member_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_group` int NOT NULL DEFAULT '0',
  `member` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_group_member` (`user_group`,`member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_membergroup_access`
#

DROP TABLE IF EXISTS `htmx_membergroup_access`;
CREATE TABLE `htmx_membergroup_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membergroup` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_membergroup_names`
#

DROP TABLE IF EXISTS `htmx_membergroup_names`;
CREATE TABLE `htmx_membergroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_content`
#

DROP TABLE IF EXISTS `htmx_site_content`;
CREATE TABLE `htmx_site_content` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'document',
  `contentType` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'text/html',
  `pagetitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `longtitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `alias` varchar(245) COLLATE utf8mb4_general_ci DEFAULT '',
  `link_attributes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Link attriubtes',
  `published` int NOT NULL DEFAULT '0',
  `pub_date` int NOT NULL DEFAULT '0',
  `unpub_date` int NOT NULL DEFAULT '0',
  `parent` int NOT NULL DEFAULT '0',
  `isfolder` int NOT NULL DEFAULT '0',
  `introtext` text COLLATE utf8mb4_general_ci COMMENT 'Used to provide quick summary of the document',
  `content` mediumtext COLLATE utf8mb4_general_ci,
  `richtext` tinyint(1) NOT NULL DEFAULT '1',
  `template` int NOT NULL DEFAULT '0',
  `menuindex` int NOT NULL DEFAULT '0',
  `searchable` int NOT NULL DEFAULT '1',
  `cacheable` int NOT NULL DEFAULT '1',
  `createdby` int NOT NULL DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `editedby` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `deleted` int NOT NULL DEFAULT '0',
  `deletedon` int NOT NULL DEFAULT '0',
  `deletedby` int NOT NULL DEFAULT '0',
  `publishedon` int NOT NULL DEFAULT '0' COMMENT 'Date the document was published',
  `publishedby` int NOT NULL DEFAULT '0' COMMENT 'ID of user who published the document',
  `menutitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Menu title',
  `donthit` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disable page hit count',
  `privateweb` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Private web document',
  `privatemgr` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Private manager document',
  `content_dispo` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-inline, 1-attachment',
  `hidemenu` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Hide document from menu',
  `alias_visible` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `parent` (`parent`),
  KEY `aliasidx` (`alias`),
  KEY `typeidx` (`type`),
  FULLTEXT KEY `content_ft_idx` (`pagetitle`,`description`,`content`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site document tree.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_htmlsnippets`
#

DROP TABLE IF EXISTS `htmx_site_htmlsnippets`;
CREATE TABLE `htmx_site_htmlsnippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Chunk',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `editor_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'none',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `snippet` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `disabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Disables the snippet',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site chunks.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_module_access`
#

DROP TABLE IF EXISTS `htmx_site_module_access`;
CREATE TABLE `htmx_site_module_access` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module` int NOT NULL DEFAULT '0',
  `usergroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Module users group access permission';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_module_depobj`
#

DROP TABLE IF EXISTS `htmx_site_module_depobj`;
CREATE TABLE `htmx_site_module_depobj` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module` int NOT NULL DEFAULT '0',
  `resource` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '0' COMMENT '10-chunks, 20-docs, 30-plugins, 40-snips, 50-tpls, 60-tvs',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Module Dependencies';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_modules`
#

DROP TABLE IF EXISTS `htmx_site_modules`;
CREATE TABLE `htmx_site_modules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `disabled` tinyint NOT NULL DEFAULT '0',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `wrap` tinyint NOT NULL DEFAULT '0',
  `locked` tinyint NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'url to module icon',
  `enable_resource` tinyint NOT NULL DEFAULT '0' COMMENT 'enables the resource file feature',
  `resourcefile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'a physical link to a resource file',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `guid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'globally unique identifier',
  `enable_sharedparams` tinyint NOT NULL DEFAULT '0',
  `properties` text COLLATE utf8mb4_general_ci,
  `modulecode` mediumtext COLLATE utf8mb4_general_ci COMMENT 'module boot up code',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Modules';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_plugin_events`
#

DROP TABLE IF EXISTS `htmx_site_plugin_events`;
CREATE TABLE `htmx_site_plugin_events` (
  `pluginid` int NOT NULL,
  `evtid` int NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0' COMMENT 'determines plugin run order',
  PRIMARY KEY (`pluginid`,`evtid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Links to system events';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_plugins`
#

DROP TABLE IF EXISTS `htmx_site_plugins`;
CREATE TABLE `htmx_site_plugins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Plugin',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `plugincode` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `properties` text COLLATE utf8mb4_general_ci COMMENT 'Default Properties',
  `disabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Disables the plugin',
  `moduleguid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'GUID of module from which to import shared parameters',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site plugins.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_snippets`
#

DROP TABLE IF EXISTS `htmx_site_snippets`;
CREATE TABLE `htmx_site_snippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Snippet',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `snippet` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `properties` text COLLATE utf8mb4_general_ci COMMENT 'Default Properties',
  `moduleguid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'GUID of module from which to import shared parameters',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `disabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Disables the snippet',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site snippets.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_templates`
#

DROP TABLE IF EXISTS `htmx_site_templates`;
CREATE TABLE `htmx_site_templates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `templatename` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `templatealias` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Template',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'url to icon file',
  `template_type` int NOT NULL DEFAULT '0' COMMENT '0-page,1-content',
  `content` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `selectable` tinyint NOT NULL DEFAULT '1',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site templates.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_tmplvar_access`
#

DROP TABLE IF EXISTS `htmx_site_tmplvar_access`;
CREATE TABLE `htmx_site_tmplvar_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for template variable access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_tmplvar_contentvalues`
#

DROP TABLE IF EXISTS `htmx_site_tmplvar_contentvalues`;
CREATE TABLE `htmx_site_tmplvar_contentvalues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0' COMMENT 'Template Variable id',
  `contentid` int NOT NULL DEFAULT '0' COMMENT 'Site Content Id',
  `value` mediumtext COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_tvid_contentid` (`tmplvarid`,`contentid`),
  KEY `idx_tmplvarid` (`tmplvarid`),
  KEY `idx_id` (`contentid`),
  FULLTEXT KEY `value_ft_idx` (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Template Variables Content Values Link Table';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_tmplvar_templates`
#

DROP TABLE IF EXISTS `htmx_site_tmplvar_templates`;
CREATE TABLE `htmx_site_tmplvar_templates` (
  `tmplvarid` int NOT NULL DEFAULT '0' COMMENT 'Template Variable id',
  `templateid` int NOT NULL DEFAULT '0',
  `rank` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`tmplvarid`,`templateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Template Variables Templates Link Table';



# --------------------------------------------------------

#
# Table structure for table `htmx_site_tmplvars`
#

DROP TABLE IF EXISTS `htmx_site_tmplvars`;
CREATE TABLE `htmx_site_tmplvars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `caption` varchar(80) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `locked` tinyint NOT NULL DEFAULT '0',
  `elements` text COLLATE utf8mb4_general_ci,
  `rank` int NOT NULL DEFAULT '0',
  `display` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Display Control',
  `display_params` text COLLATE utf8mb4_general_ci COMMENT 'Display Control Properties',
  `default_text` text COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rank` (`rank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Template Variables';



# --------------------------------------------------------

#
# Table structure for table `htmx_system_eventnames`
#

DROP TABLE IF EXISTS `htmx_system_eventnames`;
CREATE TABLE `htmx_system_eventnames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `service` tinyint NOT NULL DEFAULT '0' COMMENT 'System Service number',
  `groupname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='System Event Names.';



# --------------------------------------------------------

#
# Table structure for table `htmx_system_settings`
#

DROP TABLE IF EXISTS `htmx_system_settings`;
CREATE TABLE `htmx_system_settings` (
  `setting_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`setting_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains Content Manager settings.';



# --------------------------------------------------------

#
# Table structure for table `htmx_user_attributes`
#

DROP TABLE IF EXISTS `htmx_user_attributes`;
CREATE TABLE `htmx_user_attributes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `internalKey` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `role` int NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `mobilephone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `blocked` int NOT NULL DEFAULT '0',
  `blockeduntil` int NOT NULL DEFAULT '0',
  `blockedafter` int NOT NULL DEFAULT '0',
  `logincount` int NOT NULL DEFAULT '0',
  `lastlogin` int NOT NULL DEFAULT '0',
  `thislogin` int NOT NULL DEFAULT '0',
  `failedlogincount` int NOT NULL DEFAULT '0',
  `sessionid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dob` int NOT NULL DEFAULT '0',
  `gender` int NOT NULL DEFAULT '0' COMMENT '0 - unknown, 1 - Male 2 - female',
  `country` varchar(5) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `zip` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `fax` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'link to photo',
  `comment` text COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `verified` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userid` (`internalKey`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains information about the backend users.';



# --------------------------------------------------------

#
# Table structure for table `htmx_user_messages`
#

DROP TABLE IF EXISTS `htmx_user_messages`;
CREATE TABLE `htmx_user_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(15) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `subject` varchar(60) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8mb4_general_ci,
  `sender` int NOT NULL DEFAULT '0',
  `recipient` int NOT NULL DEFAULT '0',
  `private` tinyint NOT NULL DEFAULT '0',
  `postdate` int NOT NULL DEFAULT '0',
  `messageread` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains messages for the Content Manager messaging system.';



# --------------------------------------------------------

#
# Table structure for table `htmx_user_roles`
#

DROP TABLE IF EXISTS `htmx_user_roles`;
CREATE TABLE `htmx_user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `frames` int NOT NULL DEFAULT '0',
  `home` int NOT NULL DEFAULT '0',
  `view_document` int NOT NULL DEFAULT '0',
  `new_document` int NOT NULL DEFAULT '0',
  `save_document` int NOT NULL DEFAULT '0',
  `publish_document` int NOT NULL DEFAULT '0',
  `delete_document` int NOT NULL DEFAULT '0',
  `empty_trash` int NOT NULL DEFAULT '0',
  `action_ok` int NOT NULL DEFAULT '0',
  `logout` int NOT NULL DEFAULT '0',
  `help` int NOT NULL DEFAULT '0',
  `messages` int NOT NULL DEFAULT '0',
  `new_user` int NOT NULL DEFAULT '0',
  `edit_user` int NOT NULL DEFAULT '0',
  `logs` int NOT NULL DEFAULT '0',
  `edit_parser` int NOT NULL DEFAULT '0',
  `save_parser` int NOT NULL DEFAULT '0',
  `edit_template` int NOT NULL DEFAULT '0',
  `settings` int NOT NULL DEFAULT '0',
  `credits` int NOT NULL DEFAULT '0',
  `new_template` int NOT NULL DEFAULT '0',
  `save_template` int NOT NULL DEFAULT '0',
  `delete_template` int NOT NULL DEFAULT '0',
  `edit_snippet` int NOT NULL DEFAULT '0',
  `new_snippet` int NOT NULL DEFAULT '0',
  `save_snippet` int NOT NULL DEFAULT '0',
  `delete_snippet` int NOT NULL DEFAULT '0',
  `edit_chunk` int NOT NULL DEFAULT '0',
  `new_chunk` int NOT NULL DEFAULT '0',
  `save_chunk` int NOT NULL DEFAULT '0',
  `delete_chunk` int NOT NULL DEFAULT '0',
  `empty_cache` int NOT NULL DEFAULT '0',
  `edit_document` int NOT NULL DEFAULT '0',
  `change_password` int NOT NULL DEFAULT '0',
  `error_dialog` int NOT NULL DEFAULT '0',
  `about` int NOT NULL DEFAULT '0',
  `category_manager` int NOT NULL DEFAULT '0',
  `file_manager` int NOT NULL DEFAULT '0',
  `assets_files` int NOT NULL DEFAULT '0',
  `assets_images` int NOT NULL DEFAULT '0',
  `save_user` int NOT NULL DEFAULT '0',
  `delete_user` int NOT NULL DEFAULT '0',
  `save_password` int NOT NULL DEFAULT '0',
  `edit_role` int NOT NULL DEFAULT '0',
  `save_role` int NOT NULL DEFAULT '0',
  `delete_role` int NOT NULL DEFAULT '0',
  `new_role` int NOT NULL DEFAULT '0',
  `access_permissions` int NOT NULL DEFAULT '0',
  `bk_manager` int NOT NULL DEFAULT '0',
  `new_plugin` int NOT NULL DEFAULT '0',
  `edit_plugin` int NOT NULL DEFAULT '0',
  `save_plugin` int NOT NULL DEFAULT '0',
  `delete_plugin` int NOT NULL DEFAULT '0',
  `new_module` int NOT NULL DEFAULT '0',
  `edit_module` int NOT NULL DEFAULT '0',
  `save_module` int NOT NULL DEFAULT '0',
  `delete_module` int NOT NULL DEFAULT '0',
  `exec_module` int NOT NULL DEFAULT '0',
  `view_eventlog` int NOT NULL DEFAULT '0',
  `delete_eventlog` int NOT NULL DEFAULT '0',
  `new_web_user` int NOT NULL DEFAULT '0',
  `edit_web_user` int NOT NULL DEFAULT '0',
  `save_web_user` int NOT NULL DEFAULT '0',
  `delete_web_user` int NOT NULL DEFAULT '0',
  `web_access_permissions` int NOT NULL DEFAULT '0',
  `view_unpublished` int NOT NULL DEFAULT '0',
  `import_static` int NOT NULL DEFAULT '0',
  `export_static` int NOT NULL DEFAULT '0',
  `remove_locks` int NOT NULL DEFAULT '0',
  `display_locks` int NOT NULL DEFAULT '0',
  `change_resourcetype` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains information describing the user roles.';



# --------------------------------------------------------

#
# Table structure for table `htmx_user_settings`
#

DROP TABLE IF EXISTS `htmx_user_settings`;
CREATE TABLE `htmx_user_settings` (
  `user` int NOT NULL,
  `setting_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`user`,`setting_name`),
  KEY `setting_name` (`setting_name`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains backend user settings.';



# --------------------------------------------------------

#
# Table structure for table `htmx_web_groups`
#

DROP TABLE IF EXISTS `htmx_web_groups`;
CREATE TABLE `htmx_web_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `webgroup` int NOT NULL DEFAULT '0',
  `webuser` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_group_user` (`webgroup`,`webuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for web access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_web_user_attributes`
#

DROP TABLE IF EXISTS `htmx_web_user_attributes`;
CREATE TABLE `htmx_web_user_attributes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `internalKey` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `role` int NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `mobilephone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `blocked` int NOT NULL DEFAULT '0',
  `blockeduntil` int NOT NULL DEFAULT '0',
  `blockedafter` int NOT NULL DEFAULT '0',
  `logincount` int NOT NULL DEFAULT '0',
  `lastlogin` int NOT NULL DEFAULT '0',
  `thislogin` int NOT NULL DEFAULT '0',
  `failedlogincount` int NOT NULL DEFAULT '0',
  `sessionid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dob` int NOT NULL DEFAULT '0',
  `gender` int NOT NULL DEFAULT '0' COMMENT '0 - unknown, 1 - Male 2 - female',
  `country` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `zip` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `fax` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'link to photo',
  `comment` text COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `verified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`internalKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains information for web users.';



# --------------------------------------------------------

#
# Table structure for table `htmx_web_user_settings`
#

DROP TABLE IF EXISTS `htmx_web_user_settings`;
CREATE TABLE `htmx_web_user_settings` (
  `webuser` int NOT NULL,
  `setting_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`webuser`,`setting_name`),
  KEY `setting_name` (`setting_name`),
  KEY `webuserid` (`webuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains web user settings.';



# --------------------------------------------------------

#
# Table structure for table `htmx_web_users`
#

DROP TABLE IF EXISTS `htmx_web_users`;
CREATE TABLE `htmx_web_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `cachepwd` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Store new unconfirmed password',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `htmx_webgroup_access`
#

DROP TABLE IF EXISTS `htmx_webgroup_access`;
CREATE TABLE `htmx_webgroup_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `webgroup` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for web access permissions.';



# --------------------------------------------------------

#
# Table structure for table `htmx_webgroup_names`
#

DROP TABLE IF EXISTS `htmx_webgroup_names`;
CREATE TABLE `htmx_webgroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for web access permissions.';


#
# Dumping data for table `htmx_active_user_locks`
#

#
# Dumping data for table `htmx_active_user_sessions`
#

INSERT INTO `htmx_active_user_sessions` VALUES
  ('a5421cad469125295a8e80dc9f245762','1','1659884179','172.30.0.1');

#
# Dumping data for table `htmx_active_users`
#

INSERT INTO `htmx_active_users` VALUES
  ('a5421cad469125295a8e80dc9f245762','1','root','1659884179','93',NULL);

#
# Dumping data for table `htmx_categories`
#

INSERT INTO `htmx_categories` VALUES
  ('1','Manager and Admin','0'),
  ('2','Content','0'),
  ('3','Navigation','0');

#
# Dumping data for table `htmx_document_groups`
#

#
# Dumping data for table `htmx_documentgroup_names`
#

#
# Dumping data for table `htmx_event_log`
#

#
# Dumping data for table `htmx_manager_log`
#

INSERT INTO `htmx_manager_log` VALUES
  ('1','1659884143','1','root','58','-','MODX','Logged in','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('2','1659884144','1','root','17','-','-','Editing settings','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('3','1659884146','1','root','27','1','Evolution CMS Install Success','Editing resource','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('4','1659884152','1','root','76','-','-','Element management','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('5','1659884153','1','root','76','-','-','Element management','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('6','1659884154','1','root','76','-','-','Element management','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('7','1659884158','1','root','102','2','ElementsInTree','Edit plugin','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('8','1659884160','1','root','103','2','ElementsInTree','Saving plugin','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('9','1659884160','1','root','76','-','-','Element management','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('10','1659884161','1','root','76','-','-','Element management','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('11','1659884163','1','root','102','7','Quick Manager+','Edit plugin','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('12','1659884168','1','root','17','-','-','Editing settings','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('13','1659884169','1','root','17','-','-','Editing settings','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('14','1659884172','1','root','93','-','-','Backup Manager','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('15','1659884175','1','root','54','-','htmx_active_user_locks','Optimizing a table','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('16','1659884175','1','root','93','-','-','Backup Manager','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('17','1659884176','1','root','54','-','htmx_active_users','Optimizing a table','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('18','1659884176','1','root','93','-','-','Backup Manager','172.30.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');

#
# Dumping data for table `htmx_manager_users`
#

INSERT INTO `htmx_manager_users` VALUES
  ('1','root','$P$BgQ1wY/qm9SZItTVCgHXQ8RGEs88i10');

#
# Dumping data for table `htmx_member_groups`
#

#
# Dumping data for table `htmx_membergroup_access`
#

#
# Dumping data for table `htmx_membergroup_names`
#

#
# Dumping data for table `htmx_site_content`
#

INSERT INTO `htmx_site_content` VALUES
  ('1','document','text/html','Evolution CMS Install Success','Welcome to the EVO Content Management System','','minimal-base','','1','0','0','0','0','','<h3>Install Successful!</h3>\n<p>You have successfully installed Evolution CMS.</p>\n\n<h3>Getting Help</h3>\n<p>The <a href=\"http://evo.im/\" target=\"_blank\">EVO Community</a> provides a great starting point to learn all things Evolution CMS, or you can also <a href=\"http://evo.im/\">see some great learning resources</a> (books, tutorials, blogs and screencasts).</p>\n<p>Welcome to EVO!</p>\n','1','3','0','1','1','1','1130304721','1','1130304927','0','0','0','1130304721','1','Base Install','0','0','0','0','0','1');

#
# Dumping data for table `htmx_site_htmlsnippets`
#

#
# Dumping data for table `htmx_site_module_access`
#

#
# Dumping data for table `htmx_site_module_depobj`
#

#
# Dumping data for table `htmx_site_modules`
#

INSERT INTO `htmx_site_modules` VALUES
  ('1','Doc Manager','<strong>1.1</strong> Quickly perform bulk updates to the Documents in your site including templates, publishing details, and permissions','0','0','1','0','0','','0','','0','0','docman435243542tf542t5t','1','[]',' \n/**\n * Doc Manager\n * \n * Quickly perform bulk updates to the Documents in your site including templates, publishing details, and permissions\n * \n * @category	module\n * @version 	1.1\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @internal	@properties\n * @internal	@guid docman435243542tf542t5t	\n * @internal	@shareparams 1\n * @internal	@dependencies requires files located at /assets/modules/docmanager/\n * @internal	@modx_category Manager and Admin\n * @internal    @installset base, sample\n * @lastupdate  09/04/2016\n */\n\ninclude_once(MODX_BASE_PATH.\'assets/modules/docmanager/classes/docmanager.class.php\');\ninclude_once(MODX_BASE_PATH.\'assets/modules/docmanager/classes/dm_frontend.class.php\');\ninclude_once(MODX_BASE_PATH.\'assets/modules/docmanager/classes/dm_backend.class.php\');\n\n$dm = new DocManager($modx);\n$dmf = new DocManagerFrontend($dm, $modx);\n$dmb = new DocManagerBackend($dm, $modx);\n\n$dm->ph = $dm->getLang();\n$dm->ph[\'theme\'] = $dm->getTheme();\n$dm->ph[\'ajax.endpoint\'] = MODX_SITE_URL.\'assets/modules/docmanager/tv.ajax.php\';\n$dm->ph[\'datepicker.offset\'] = $modx->config[\'datepicker_offset\'];\n$dm->ph[\'datetime.format\'] = $modx->config[\'datetime_format\'];\n\nif (isset($_POST[\'tabAction\'])) {\n    $dmb->handlePostback();\n} else {\n    $dmf->getViews();\n    echo $dm->parseTemplate(\'main.tpl\', $dm->ph);\n}'),
  ('2','Extras','<strong>0.1.3</strong> first repository for Evolution CMS','0','0','1','0','0','','0','','0','0','store435243542tf542t5t','1','[]',' \n/**\n * Extras\n * \n * first repository for Evolution CMS\n * \n * @category	module\n * @version 	0.1.3\n * @internal	@properties\n * @internal	@guid store435243542tf542t5t	\n * @internal	@shareparams 1\n * @internal	@dependencies requires files located at /assets/modules/store/\n * @internal	@modx_category Manager and Admin\n * @internal    @installset base, sample\n * @lastupdate  25/11/2016\n */\n\n//AUTHORS: Bumkaka & Dmi3yy \ninclude_once(\'../assets/modules/store/core.php\');');

#
# Dumping data for table `htmx_site_plugin_events`
#

INSERT INTO `htmx_site_plugin_events` VALUES
  ('1','24','0'),
  ('1','30','0'),
  ('1','77','0'),
  ('1','39','0'),
  ('1','94','0'),
  ('1','45','0'),
  ('1','51','0'),
  ('2','28','0'),
  ('2','26','0'),
  ('2','120','0'),
  ('2','124','0'),
  ('2','125','0'),
  ('2','79','0'),
  ('2','81','0'),
  ('2','43','0'),
  ('2','41','0'),
  ('2','49','0'),
  ('2','47','0'),
  ('2','55','0'),
  ('2','53','0'),
  ('2','61','0'),
  ('2','59','0'),
  ('3','40','0'),
  ('3','46','0'),
  ('3','38','0'),
  ('3','39','1'),
  ('3','44','0'),
  ('3','45','1'),
  ('4','84','0'),
  ('4','85','0'),
  ('4','104','0');

INSERT INTO `htmx_site_plugin_events` VALUES
  ('5','31','0'),
  ('5','119','0'),
  ('5','29','0'),
  ('5','30','1'),
  ('5','32','0'),
  ('5','39','2'),
  ('5','57','0'),
  ('6','116','0'),
  ('7','29','1'),
  ('7','32','1'),
  ('7','13','0'),
  ('7','101','0'),
  ('7','3','0'),
  ('8','89','0'),
  ('8','100','0'),
  ('8','21','0'),
  ('8','101','1'),
  ('8','94','1'),
  ('8','93','0'),
  ('8','3','1'),
  ('9','111','0'),
  ('10','116','1'),
  ('10','133','0'),
  ('10','74','0');

#
# Dumping data for table `htmx_site_plugins`
#

INSERT INTO `htmx_site_plugins` VALUES
  ('1','CodeMirror','<strong>1.5</strong> JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)','0','1','0','\n/**\n * CodeMirror\n *\n * JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)\n *\n * @category    plugin\n * @version     1.5\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @package     evo\n * @internal    @events OnDocFormRender,OnChunkFormRender,OnModFormRender,OnPluginFormRender,OnSnipFormRender,OnTempFormRender,OnRichTextEditorInit\n * @internal    @modx_category Manager and Admin\n * @internal    @properties &theme=Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;default &darktheme=Dark Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;one-dark &fontSize=Font-size;list;10,11,12,13,14,15,16,17,18;14 &lineHeight=Line-height;list;1,1.1,1.2,1.3,1.4,1.5;1.3 &indentUnit=Indent unit;int;4 &tabSize=The width of a tab character;int;4 &lineWrapping=lineWrapping;list;true,false;true &matchBrackets=matchBrackets;list;true,false;true &activeLine=activeLine;list;true,false;false &emmet=emmet;list;true,false;true &search=search;list;true,false;false &indentWithTabs=indentWithTabs;list;true,false;true &undoDepth=undoDepth;int;200 &historyEventDelay=historyEventDelay;int;1250\n * @internal    @installset base\n * @reportissues https://github.com/evolution-cms/evolution/issues/\n * @documentation Official docs https://codemirror.net/doc/manual.html\n * @author      hansek from http://www.modxcms.cz\n * @author      update Mihanik71\n * @author      update Deesen\n * @author      update 64j\n * @lastupdate  08-01-2018\n */\n\n$_CM_BASE = \'assets/plugins/codemirror/\';\n\n$_CM_URL = $modx->config[\'site_url\'] . $_CM_BASE;\n\nrequire(MODX_BASE_PATH. $_CM_BASE .\'codemirror.plugin.php\');','0','{\"theme\":[{\"label\":\"Theme\",\"type\":\"list\",\"value\":\"default\",\"options\":\"default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light\",\"default\":\"default\",\"desc\":\"\"}],\"darktheme\":[{\"label\":\"Dark Theme\",\"type\":\"list\",\"value\":\"one-dark\",\"options\":\"default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light\",\"default\":\"one-dark\",\"desc\":\"\"}],\"fontSize\":[{\"label\":\"Font-size\",\"type\":\"list\",\"value\":\"14\",\"options\":\"10,11,12,13,14,15,16,17,18\",\"default\":\"14\",\"desc\":\"\"}],\"lineHeight\":[{\"label\":\"Line-height\",\"type\":\"list\",\"value\":\"1.3\",\"options\":\"1,1.1,1.2,1.3,1.4,1.5\",\"default\":\"1.3\",\"desc\":\"\"}],\"indentUnit\":[{\"label\":\"Indent unit\",\"type\":\"int\",\"value\":\"4\",\"default\":\"4\",\"desc\":\"\"}],\"tabSize\":[{\"label\":\"The width of a tab character\",\"type\":\"int\",\"value\":\"4\",\"default\":\"4\",\"desc\":\"\"}],\"lineWrapping\":[{\"label\":\"lineWrapping\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"matchBrackets\":[{\"label\":\"matchBrackets\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"activeLine\":[{\"label\":\"activeLine\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"emmet\":[{\"label\":\"emmet\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"search\":[{\"label\":\"search\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"indentWithTabs\":[{\"label\":\"indentWithTabs\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"undoDepth\":[{\"label\":\"undoDepth\",\"type\":\"int\",\"value\":\"200\",\"default\":\"200\",\"desc\":\"\"}],\"historyEventDelay\":[{\"label\":\"historyEventDelay\",\"type\":\"int\",\"value\":\"1250\",\"default\":\"1250\",\"desc\":\"\"}]}','0','','0','0'),
  ('2','ElementsInTree','<strong>1.5.10</strong> Get access to all Elements and Modules inside Manager sidebar','0','1','0','require MODX_BASE_PATH.\'assets/plugins/elementsintree/plugin.elementsintree.php\';','0','{\n  \"adminRoleOnly\": [\n    {\n      \"label\": \"Administrators only\",\n      \"type\": \"list\",\n      \"value\": \"yes\",\n      \"options\": \"yes,no\",\n      \"default\": \"yes\",\n      \"desc\": \"\"\n    }\n  ],\n  \"treeButtonsInTab\": [\n    {\n      \"label\": \"Tree buttons in tab\",\n      \"type\": \"list\",\n      \"value\": \"yes\",\n      \"options\": \"yes,no\",\n      \"default\": \"yes\",\n      \"desc\": \"\"\n    }\n  ]\n}','0',' ','0','1659884160'),
  ('3','FileSource','<strong>0.1</strong> Save snippet and plugins to file','0','1','0','require MODX_BASE_PATH.\'assets/plugins/filesource/plugin.filesource.php\';','0','[]','0','','0','0'),
  ('4','Forgot Manager Login','<strong>1.1.7</strong> Resets your manager login when you forget your password via email confirmation','0','1','0','require MODX_BASE_PATH.\'assets/plugins/forgotmanagerlogin/plugin.forgotmanagerlogin.php\';','0','[]','0','','0','0'),
  ('5','ManagerManager','<strong>0.6.3</strong> Customize the EVO Manager to offer bespoke admin functions for end users or manipulate the display of document fields in the manager.','0','1','0','\n/**\n * ManagerManager\n *\n * Customize the EVO Manager to offer bespoke admin functions for end users or manipulate the display of document fields in the manager.\n *\n * @category plugin\n * @version 0.6.3\n * @license http://creativecommons.org/licenses/GPL/2.0/ GNU Public License (GPL v2)\n * @internal @properties &remove_deprecated_tv_types_pref=Remove deprecated TV types;list;yes,no;yes &config_chunk=Configuration Chunk;text;mm_rules\n * @internal @events OnDocFormRender,OnDocFormPrerender,OnBeforeDocFormSave,OnDocFormSave,OnDocDuplicate,OnPluginFormRender,OnTVFormRender\n * @internal @modx_category Manager and Admin\n * @internal @installset base\n * @internal @legacy_names Image TV Preview, Show Image TVs\n * @reportissues https://github.com/DivanDesign/MODXEvo.plugin.ManagerManager/\n * @documentation README [+site_url+]assets/plugins/managermanager/readme.html\n * @documentation Official docs http://code.divandesign.biz/modx/managermanager\n * @link        Latest version http://code.divandesign.biz/modx/managermanager\n * @link        Additional tools http://code.divandesign.biz/modx\n * @link        Full changelog http://code.divandesign.biz/modx/managermanager/changelog\n * @author      Inspired by: HideEditor plugin by Timon Reinhard and Gildas; HideManagerFields by Brett @ The Man Can!\n * @author      DivanDesign studio http://www.DivanDesign.biz\n * @author      Nick Crossland http://www.rckt.co.uk\n * @author      Many others\n * @lastupdate  22/01/2018\n */\n\n// Run the main code\ninclude($modx->config[\'base_path\'].\'assets/plugins/managermanager/mm.inc.php\');\n','0','{\"remove_deprecated_tv_types_pref\":[{\"label\":\"Remove deprecated TV types\",\"type\":\"list\",\"value\":\"yes\",\"options\":\"yes,no\",\"default\":\"yes\",\"desc\":\"\"}],\"config_chunk\":[{\"label\":\"Configuration Chunk\",\"type\":\"text\",\"value\":\"mm_rules\",\"default\":\"mm_rules\",\"desc\":\"\"}]}','0','','0','0'),
  ('6','OutdatedExtrasCheck','<strong>1.4.6</strong> Check for Outdated critical extras not compatible with EVO 1.4.6','0','1','0','/**\n * OutdatedExtrasCheck\n *\n * Check for Outdated critical extras not compatible with EVO 1.4.6\n *\n * @category	plugin\n * @version     1.4.6\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @package     evo\n * @author      Author: Nicola Lambathakis\n * @internal    @events OnManagerWelcomeHome\n * @internal    @properties &wdgVisibility=Show widget for:;menu;All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly;AdminOnly &ThisRole=Run only for this role:;string;;;(role id) &ThisUser=Run only for this user:;string;;;(username)\n * @internal    @modx_category Manager and Admin\n * @internal    @installset base\n * @internal    @disabled 0\n */\n\nrequire MODX_BASE_PATH . \'assets/plugins/extrascheck/OutdatedExtrasCheck.plugin.php\';\n','0','{\"wdgVisibility\":[{\"label\":\"Show widget for:\",\"type\":\"menu\",\"value\":\"AdminOnly\",\"options\":\"All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly\",\"default\":\"AdminOnly\",\"desc\":\"\"}],\"ThisRole\":[{\"label\":\"Run only for this role:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"ThisUser\":[{\"label\":\"Run only for this user:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}]}','0','','0','0'),
  ('7','Quick Manager+','<strong>1.5.11</strong> Enables QuickManager+ front end content editing support','0','1','0','\n/**\n * Quick Manager+\n * \n * Enables QuickManager+ front end content editing support\n *\n * @category 	plugin\n * @version 	1.5.11\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL v3)\n * @internal    @properties &jqpath=Path to jQuery;text;assets/js/jquery.min.js &loadmanagerjq=Load jQuery in manager;list;true,false;false &loadfrontendjq=Load jQuery in front-end;list;true,false;false &noconflictjq=jQuery noConflict mode in front-end;list;true,false;false &loadfa=Load Font Awesome css in front-end;list;true,false;true &loadtb=Load modal box in front-end;list;true,false;true &tbwidth=Modal box window width;text;80% &tbheight=Modal box window height;text;90% &hidefields=Hide document fields from front-end editors;text;parent &hidetabs=Hide document tabs from front-end editors;text; &hidesections=Hide document sections from front-end editors;text; &addbutton=Show add document here button;list;true,false;true &tpltype=New document template type;list;parent,id,selected;parent &tplid=New document template id;int;3 &custombutton=Custom buttons;textarea; &managerbutton=Show go to manager button;list;true,false;true &logout=Logout to;list;manager,front-end;manager &disabled=Plugin disabled on documents;text; &autohide=Autohide toolbar;list;true,false;true &position= Toolbar position;list;top,right,bottom,left,before;top &editbuttons=Inline edit buttons;list;true,false;false &editbclass=Edit button CSS class;text;qm-edit &newbuttons=Inline new resource buttons;list;true,false;false &newbclass=New resource button CSS class;text;qm-new &tvbuttons=Inline template variable buttons;list;true,false;false &tvbclass=Template variable button CSS class;text;qm-tv &removeBg=Remove toolbar background;list;yes,no;no &buttonStyle=QuickManager buttons CSS stylesheet;list;actionButtons,navButtons;navButtons  \n * @internal	@events OnParseDocument,OnWebPagePrerender,OnDocFormPrerender,OnDocFormSave,OnManagerLogout \n * @internal	@modx_category Manager and Admin\n * @internal    @legacy_names QM+,QuickEdit\n * @internal    @installset base, sample\n * @internal    @disabled 1\n * @reportissues https://github.com/modxcms/evolution\n * @documentation Official docs [+site_url+]assets/plugins/qm/readme.html\n * @link        http://www.maagit.fi/modx/quickmanager-plus\n * @author      Mikko Lammi\n * @author      Since 2011: yama, dmi3yy, segr, Nicola1971.\n * @lastupdate  19/03/2020 \n */\n\n// In manager\nif (!$modx->checkSession()) return;\n\n$show = TRUE;\n\nif ($disabled  != \'\') {\n    $arr = array_filter(array_map(\'intval\', explode(\',\', $disabled)));\n    if (in_array($modx->documentIdentifier, $arr)) {\n        $show = FALSE;\n    }\n}\n\nif ($show) {\n    // Replace [*#tv*] with QM+ edit TV button placeholders\n    if ($tvbuttons == \'true\') {\n        if ($modx->event->name == \'OnParseDocument\') {\n             $output = &$modx->documentOutput;\n             $output = preg_replace(\'~\\[\\*#(.*?)\\*\\]~\', \'<!-- \'.$tvbclass.\' $1 -->[*$1*]\', $output);\n             $modx->documentOutput = $output;\n         }\n     }\n    include_once($modx->config[\'base_path\'].\'assets/plugins/qm/qm.inc.php\');\n    $qm = new Qm($modx, $jqpath, $loadmanagerjq, $loadfrontendjq, $noconflictjq, $loadfa, $loadtb, $tbwidth, $tbheight, $hidefields, $hidetabs, $hidesections, $addbutton, $tpltype, $tplid, $custombutton, $managerbutton, $logout, $autohide, $position, $editbuttons, $editbclass, $newbuttons, $newbclass, $tvbuttons, $tvbclass, $buttonStyle, $removeBg);\n}\n','0','{\"jqpath\":[{\"label\":\"Path to jQuery\",\"type\":\"text\",\"value\":\"assets\\/js\\/jquery.min.js\",\"default\":\"assets\\/js\\/jquery.min.js\",\"desc\":\"\"}],\"loadmanagerjq\":[{\"label\":\"Load jQuery in manager\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"loadfrontendjq\":[{\"label\":\"Load jQuery in front-end\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"noconflictjq\":[{\"label\":\"jQuery noConflict mode in front-end\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"loadfa\":[{\"label\":\"Load Font Awesome css in front-end\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"loadtb\":[{\"label\":\"Load modal box in front-end\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"tbwidth\":[{\"label\":\"Modal box window width\",\"type\":\"text\",\"value\":\"80%\",\"default\":\"80%\",\"desc\":\"\"}],\"tbheight\":[{\"label\":\"Modal box window height\",\"type\":\"text\",\"value\":\"90%\",\"default\":\"90%\",\"desc\":\"\"}],\"hidefields\":[{\"label\":\"Hide document fields from front-end editors\",\"type\":\"text\",\"value\":\"parent\",\"default\":\"parent\",\"desc\":\"\"}],\"hidetabs\":[{\"label\":\"Hide document tabs from front-end editors\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"hidesections\":[{\"label\":\"Hide document sections from front-end editors\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"addbutton\":[{\"label\":\"Show add document here button\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"tpltype\":[{\"label\":\"New document template type\",\"type\":\"list\",\"value\":\"parent\",\"options\":\"parent,id,selected\",\"default\":\"parent\",\"desc\":\"\"}],\"tplid\":[{\"label\":\"New document template id\",\"type\":\"int\",\"value\":\"3\",\"default\":\"3\",\"desc\":\"\"}],\"custombutton\":[{\"label\":\"Custom buttons\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"managerbutton\":[{\"label\":\"Show go to manager button\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"logout\":[{\"label\":\"Logout to\",\"type\":\"list\",\"value\":\"manager\",\"options\":\"manager,front-end\",\"default\":\"manager\",\"desc\":\"\"}],\"disabled\":[{\"label\":\"Plugin disabled on documents\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"autohide\":[{\"label\":\"Autohide toolbar\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"position\":[{\"label\":\"Toolbar position\",\"type\":\"list\",\"value\":\"top\",\"options\":\"top,right,bottom,left,before\",\"default\":\"top\",\"desc\":\"\"}],\"editbuttons\":[{\"label\":\"Inline edit buttons\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"editbclass\":[{\"label\":\"Edit button CSS class\",\"type\":\"text\",\"value\":\"qm-edit\",\"default\":\"qm-edit\",\"desc\":\"\"}],\"newbuttons\":[{\"label\":\"Inline new resource buttons\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"newbclass\":[{\"label\":\"New resource button CSS class\",\"type\":\"text\",\"value\":\"qm-new\",\"default\":\"qm-new\",\"desc\":\"\"}],\"tvbuttons\":[{\"label\":\"Inline template variable buttons\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"tvbclass\":[{\"label\":\"Template variable button CSS class\",\"type\":\"text\",\"value\":\"qm-tv\",\"default\":\"qm-tv\",\"desc\":\"\"}],\"removeBg\":[{\"label\":\"Remove toolbar background\",\"type\":\"list\",\"value\":\"no\",\"options\":\"yes,no\",\"default\":\"no\",\"desc\":\"\"}],\"buttonStyle\":[{\"label\":\"QuickManager buttons CSS stylesheet\",\"type\":\"list\",\"value\":\"navButtons\",\"options\":\"actionButtons,navButtons\",\"default\":\"navButtons\",\"desc\":\"\"}]}','1','','0','0'),
  ('8','TinyMCE4','<strong>4.9.11</strong> Javascript rich text editor','0','1','0','\n/**\n * TinyMCE4\n *\n * Javascript rich text editor\n *\n * @category    plugin\n * @version     4.9.11\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @internal    @properties &styleFormats=Custom Style Formats <b>RAW</b><br/><br/><ul><li>leave empty to use below block/inline formats</li><li>allows simple-format: <i>Title,cssClass|Title2,cssClass2</i></li><li>Also accepts full JSON-config as per TinyMCE4 docs / configure / content-formating / style_formats</li></ul>;textarea; &styleFormats_inline=Custom Style Formats <b>INLINE</b><br/><br/><ul><li>will wrap selected text with span-tag + css-class</li><li>simple-format only</li></ul>;textarea;InlineTitle,cssClass1|InlineTitle2,cssClass2 &styleFormats_block=Custom Style Formats <b>BLOCK</b><br/><br/><ul><li>will add css-class to selected block-element</li><li>simple-format only</li></ul>;textarea;BlockTitle,cssClass3|BlockTitle2,cssClass4 &customParams=Custom Parameters<br/><b>(Be careful or leave empty!)</b>;textarea; &entityEncoding=Entity Encoding;list;named,numeric,raw;named &entities=Entities;text; &pathOptions=Path Options;list;Site config,Absolute path,Root relative,URL,No convert;Site config &resizing=Advanced Resizing;list;true,false;false &disabledButtons=Disabled Buttons;text; &webTheme=Web Theme;test;webuser &webPlugins=Web Plugins;text; &webButtons1=Web Buttons 1;text;bold italic underline strikethrough removeformat alignleft aligncenter alignright &webButtons2=Web Buttons 2;text;link unlink image undo redo &webButtons3=Web Buttons 3;text; &webButtons4=Web Buttons 4;text; &webAlign=Web Toolbar Alignment;list;ltr,rtl;ltr &width=Width;text;100% &height=Height;text;400px &introtextRte=<b>Introtext RTE</b><br/>add richtext-features to \"introtext\";list;enabled,disabled;disabled &inlineMode=<b>Inline-Mode</b>;list;enabled,disabled;disabled &inlineTheme=<b>Inline-Mode</b><br/>Theme;text;inline &browser_spellcheck=<b>Browser Spellcheck</b><br/>At least one dictionary must be installed inside your browser;list;enabled,disabled;disabled &paste_as_text=<b>Force Paste as Text</b>;list;enabled,disabled;disabled\n * @internal    @events OnLoadWebDocument,OnParseDocument,OnWebPagePrerender,OnLoadWebPageCache,OnRichTextEditorRegister,OnRichTextEditorInit,OnInterfaceSettingsRender\n * @internal    @modx_category Manager and Admin\n * @internal    @legacy_names TinyMCE Rich Text Editor\n * @internal    @installset base\n * @logo        /assets/plugins/tinymce4/tinymce/logo.png\n * @reportissues https://github.com/extras-evolution/tinymce4-for-modx-evo\n * @documentation Plugin docs https://github.com/extras-evolution/tinymce4-for-modx-evo\n * @documentation Official TinyMCE4-docs https://www.tinymce.com/docs/\n * @author      Deesen\n * @lastupdate  2018-01-17\n */\nif (!defined(\'MODX_BASE_PATH\')) { die(\'What are you doing? Get out of here!\'); }\n\nrequire(MODX_BASE_PATH.\"assets/plugins/tinymce4/plugin.tinymce.inc.php\");\n','0','{\"styleFormats\":[{\"label\":\"Custom Style Formats <b>RAW<\\/b><br\\/><br\\/><ul><li>leave empty to use below block\\/inline formats<\\/li><li>allows simple-format: <i>Title,cssClass|Title2,cssClass2<\\/i><\\/li><li>Also accepts full JSON-config as per TinyMCE4 docs \\/ configure \\/ content-formating \\/ style_formats<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"styleFormats_inline\":[{\"label\":\"Custom Style Formats <b>INLINE<\\/b><br\\/><br\\/><ul><li>will wrap selected text with span-tag + css-class<\\/li><li>simple-format only<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"InlineTitle,cssClass1|InlineTitle2,cssClass2\",\"default\":\"InlineTitle,cssClass1|InlineTitle2,cssClass2\",\"desc\":\"\"}],\"styleFormats_block\":[{\"label\":\"Custom Style Formats <b>BLOCK<\\/b><br\\/><br\\/><ul><li>will add css-class to selected block-element<\\/li><li>simple-format only<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"BlockTitle,cssClass3|BlockTitle2,cssClass4\",\"default\":\"BlockTitle,cssClass3|BlockTitle2,cssClass4\",\"desc\":\"\"}],\"customParams\":[{\"label\":\"Custom Parameters<br\\/><b>(Be careful or leave empty!)<\\/b>\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"entityEncoding\":[{\"label\":\"Entity Encoding\",\"type\":\"list\",\"value\":\"named\",\"options\":\"named,numeric,raw\",\"default\":\"named\",\"desc\":\"\"}],\"entities\":[{\"label\":\"Entities\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"pathOptions\":[{\"label\":\"Path Options\",\"type\":\"list\",\"value\":\"Site config\",\"options\":\"Site config,Absolute path,Root relative,URL,No convert\",\"default\":\"Site config\",\"desc\":\"\"}],\"resizing\":[{\"label\":\"Advanced Resizing\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"disabledButtons\":[{\"label\":\"Disabled Buttons\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webTheme\":[{\"label\":\"Web Theme\",\"type\":\"test\",\"value\":\"webuser\",\"default\":\"webuser\",\"desc\":\"\"}],\"webPlugins\":[{\"label\":\"Web Plugins\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webButtons1\":[{\"label\":\"Web Buttons 1\",\"type\":\"text\",\"value\":\"bold italic underline strikethrough removeformat alignleft aligncenter alignright\",\"default\":\"bold italic underline strikethrough removeformat alignleft aligncenter alignright\",\"desc\":\"\"}],\"webButtons2\":[{\"label\":\"Web Buttons 2\",\"type\":\"text\",\"value\":\"link unlink image undo redo\",\"default\":\"link unlink image undo redo\",\"desc\":\"\"}],\"webButtons3\":[{\"label\":\"Web Buttons 3\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webButtons4\":[{\"label\":\"Web Buttons 4\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webAlign\":[{\"label\":\"Web Toolbar Alignment\",\"type\":\"list\",\"value\":\"ltr\",\"options\":\"ltr,rtl\",\"default\":\"ltr\",\"desc\":\"\"}],\"width\":[{\"label\":\"Width\",\"type\":\"text\",\"value\":\"100%\",\"default\":\"100%\",\"desc\":\"\"}],\"height\":[{\"label\":\"Height\",\"type\":\"text\",\"value\":\"400px\",\"default\":\"400px\",\"desc\":\"\"}],\"introtextRte\":[{\"label\":\"<b>Introtext RTE<\\/b><br\\/>add richtext-features to \\\"introtext\\\"\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"inlineMode\":[{\"label\":\"<b>Inline-Mode<\\/b>\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"inlineTheme\":[{\"label\":\"<b>Inline-Mode<\\/b><br\\/>Theme\",\"type\":\"text\",\"value\":\"inline\",\"default\":\"inline\",\"desc\":\"\"}],\"browser_spellcheck\":[{\"label\":\"<b>Browser Spellcheck<\\/b><br\\/>At least one dictionary must be installed inside your browser\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"paste_as_text\":[{\"label\":\"<b>Force Paste as Text<\\/b>\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}]}','0','','0','0'),
  ('9','TransAlias','<strong>1.0.4</strong> Human readible URL translation supporting multiple languages and overrides','0','1','0','require MODX_BASE_PATH.\'assets/plugins/transalias/plugin.transalias.php\';','0','{\"table_name\":[{\"label\":\"Trans table\",\"type\":\"list\",\"value\":\"russian\",\"options\":\"common,russian,dutch,german,czech,utf8,utf8lowercase\",\"default\":\"russian\",\"desc\":\"\"}],\"char_restrict\":[{\"label\":\"Restrict alias to\",\"type\":\"list\",\"value\":\"lowercase alphanumeric\",\"options\":\"lowercase alphanumeric,alphanumeric,legal characters\",\"default\":\"lowercase alphanumeric\",\"desc\":\"\"}],\"remove_periods\":[{\"label\":\"Remove Periods\",\"type\":\"list\",\"value\":\"No\",\"options\":\"Yes,No\",\"default\":\"No\",\"desc\":\"\"}],\"word_separator\":[{\"label\":\"Word Separator\",\"type\":\"list\",\"value\":\"dash\",\"options\":\"dash,underscore,none\",\"default\":\"dash\",\"desc\":\"\"}],\"override_tv\":[{\"label\":\"Override TV name\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}]}','0','','0','0'),
  ('10','Updater','<strong>0.8.5</strong> show message about outdated CMS version','0','1','0','require MODX_BASE_PATH.\'assets/plugins/updater/plugin.updater.php\';','0','{\"version\":[{\"label\":\"Version:\",\"type\":\"text\",\"value\":\"evolution-cms\\/evolution\",\"default\":\"evolution-cms\\/evolution\",\"desc\":\"\"}],\"wdgVisibility\":[{\"label\":\"Show widget for:\",\"type\":\"menu\",\"value\":\"All\",\"options\":\"All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly\",\"default\":\"All\",\"desc\":\"\"}],\"ThisRole\":[{\"label\":\"Show only to this role id:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"ThisUser\":[{\"label\":\"Show only to this username:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"showButton\":[{\"label\":\"Show Update Button:\",\"type\":\"menu\",\"value\":\"AdminOnly\",\"options\":\"show,hide,AdminOnly\",\"default\":\"AdminOnly\",\"desc\":\"\"}],\"type\":[{\"label\":\"Type:\",\"type\":\"menu\",\"value\":\"tags\",\"options\":\"tags,releases,commits\",\"default\":\"tags\",\"desc\":\"\"}],\"branch\":[{\"label\":\"Commit branch:\",\"type\":\"text\",\"value\":\"develop\",\"default\":\"develop\",\"desc\":\"\"}],\"stableOnly\":[{\"label\":\"Offer upgrade to stable version only:\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}]}','0','','0','0');

#
# Dumping data for table `htmx_site_snippets`
#

INSERT INTO `htmx_site_snippets` VALUES
  ('1','DocInfo','<strong>0.4.1</strong> Take any field from any document (fewer requests than GetField)','0','2','0','return require MODX_BASE_PATH.\'assets/snippets/docinfo/snippet.docinfo.php\';\n','0','[]','','0','0','0'),
  ('2','DocLister','<strong>2.6.3</strong> Snippet to display the information of the tables by the description rules. The main goal - replacing Ditto and CatalogView','0','2','0','return require MODX_BASE_PATH.\'assets/snippets/DocLister/snippet.DocLister.php\';\n','0','[]','','0','0','0'),
  ('3','if','<strong>1.3</strong> A simple conditional snippet. Allows for eq/neq/lt/gt/etc logic within templates, resources, chunks, etc.','0','3','0','return require MODX_BASE_PATH.\'assets/snippets/if/snippet.if.php\';','0','[]','','0','0','0');

#
# Dumping data for table `htmx_site_templates`
#

INSERT INTO `htmx_site_templates` VALUES
  ('3','Minimal Template',NULL,'Default minimal empty template (content returned only)','0','0','','0','[*content*]','0','1','0','0');

#
# Dumping data for table `htmx_site_tmplvar_access`
#

#
# Dumping data for table `htmx_site_tmplvar_contentvalues`
#

#
# Dumping data for table `htmx_site_tmplvar_templates`
#

#
# Dumping data for table `htmx_site_tmplvars`
#

#
# Dumping data for table `htmx_system_eventnames`
#

INSERT INTO `htmx_system_eventnames` VALUES
  ('1','OnDocPublished','5',''),
  ('2','OnDocUnPublished','5',''),
  ('3','OnWebPagePrerender','5',''),
  ('4','OnWebLogin','3',''),
  ('5','OnBeforeWebLogout','3',''),
  ('6','OnWebLogout','3',''),
  ('7','OnWebSaveUser','3',''),
  ('8','OnWebDeleteUser','3',''),
  ('9','OnWebChangePassword','3',''),
  ('10','OnWebCreateGroup','3',''),
  ('11','OnManagerLogin','2',''),
  ('12','OnBeforeManagerLogout','2',''),
  ('13','OnManagerLogout','2',''),
  ('14','OnManagerSaveUser','2',''),
  ('15','OnManagerDeleteUser','2',''),
  ('16','OnManagerChangePassword','2',''),
  ('17','OnManagerCreateGroup','2',''),
  ('18','OnBeforeCacheUpdate','4',''),
  ('19','OnCacheUpdate','4',''),
  ('20','OnMakePageCacheKey','4',''),
  ('21','OnLoadWebPageCache','4',''),
  ('22','OnBeforeSaveWebPageCache','4',''),
  ('23','OnChunkFormPrerender','1','Chunks'),
  ('24','OnChunkFormRender','1','Chunks'),
  ('25','OnBeforeChunkFormSave','1','Chunks'),
  ('26','OnChunkFormSave','1','Chunks'),
  ('27','OnBeforeChunkFormDelete','1','Chunks'),
  ('28','OnChunkFormDelete','1','Chunks'),
  ('29','OnDocFormPrerender','1','Documents'),
  ('30','OnDocFormRender','1','Documents'),
  ('31','OnBeforeDocFormSave','1','Documents');

INSERT INTO `htmx_system_eventnames` VALUES
  ('32','OnDocFormSave','1','Documents'),
  ('33','OnBeforeDocFormDelete','1','Documents'),
  ('34','OnDocFormDelete','1','Documents'),
  ('35','OnDocFormUnDelete','1','Documents'),
  ('36','onBeforeMoveDocument','1','Documents'),
  ('37','onAfterMoveDocument','1','Documents'),
  ('38','OnPluginFormPrerender','1','Plugins'),
  ('39','OnPluginFormRender','1','Plugins'),
  ('40','OnBeforePluginFormSave','1','Plugins'),
  ('41','OnPluginFormSave','1','Plugins'),
  ('42','OnBeforePluginFormDelete','1','Plugins'),
  ('43','OnPluginFormDelete','1','Plugins'),
  ('44','OnSnipFormPrerender','1','Snippets'),
  ('45','OnSnipFormRender','1','Snippets'),
  ('46','OnBeforeSnipFormSave','1','Snippets'),
  ('47','OnSnipFormSave','1','Snippets'),
  ('48','OnBeforeSnipFormDelete','1','Snippets'),
  ('49','OnSnipFormDelete','1','Snippets'),
  ('50','OnTempFormPrerender','1','Templates'),
  ('51','OnTempFormRender','1','Templates'),
  ('52','OnBeforeTempFormSave','1','Templates'),
  ('53','OnTempFormSave','1','Templates'),
  ('54','OnBeforeTempFormDelete','1','Templates'),
  ('55','OnTempFormDelete','1','Templates'),
  ('56','OnTVFormPrerender','1','Template Variables'),
  ('57','OnTVFormRender','1','Template Variables'),
  ('58','OnBeforeTVFormSave','1','Template Variables'),
  ('59','OnTVFormSave','1','Template Variables'),
  ('60','OnBeforeTVFormDelete','1','Template Variables'),
  ('61','OnTVFormDelete','1','Template Variables'),
  ('62','OnUserFormPrerender','1','Users');

INSERT INTO `htmx_system_eventnames` VALUES
  ('63','OnUserFormRender','1','Users'),
  ('64','OnBeforeUserFormSave','1','Users'),
  ('65','OnUserFormSave','1','Users'),
  ('66','OnBeforeUserFormDelete','1','Users'),
  ('67','OnUserFormDelete','1','Users'),
  ('68','OnWUsrFormPrerender','1','Web Users'),
  ('69','OnWUsrFormRender','1','Web Users'),
  ('70','OnBeforeWUsrFormSave','1','Web Users'),
  ('71','OnWUsrFormSave','1','Web Users'),
  ('72','OnBeforeWUsrFormDelete','1','Web Users'),
  ('73','OnWUsrFormDelete','1','Web Users'),
  ('74','OnSiteRefresh','1',''),
  ('75','OnFileManagerUpload','1',''),
  ('76','OnModFormPrerender','1','Modules'),
  ('77','OnModFormRender','1','Modules'),
  ('78','OnBeforeModFormDelete','1','Modules'),
  ('79','OnModFormDelete','1','Modules'),
  ('80','OnBeforeModFormSave','1','Modules'),
  ('81','OnModFormSave','1','Modules'),
  ('82','OnBeforeWebLogin','3',''),
  ('83','OnWebAuthentication','3',''),
  ('84','OnBeforeManagerLogin','2',''),
  ('85','OnManagerAuthentication','2',''),
  ('86','OnSiteSettingsRender','1','System Settings'),
  ('87','OnFriendlyURLSettingsRender','1','System Settings'),
  ('88','OnUserSettingsRender','1','System Settings'),
  ('89','OnInterfaceSettingsRender','1','System Settings'),
  ('90','OnSecuritySettingsRender','1','System Settings'),
  ('91','OnFileManagerSettingsRender','1','System Settings'),
  ('92','OnMiscSettingsRender','1','System Settings'),
  ('93','OnRichTextEditorRegister','1','RichText Editor');

INSERT INTO `htmx_system_eventnames` VALUES
  ('94','OnRichTextEditorInit','1','RichText Editor'),
  ('95','OnManagerPageInit','2',''),
  ('96','OnWebPageInit','5',''),
  ('97','OnLoadDocumentObject','5',''),
  ('98','OnBeforeLoadDocumentObject','5',''),
  ('99','OnAfterLoadDocumentObject','5',''),
  ('100','OnLoadWebDocument','5',''),
  ('101','OnParseDocument','5',''),
  ('102','OnParseProperties','5',''),
  ('103','OnBeforeParseParams','5',''),
  ('104','OnManagerLoginFormRender','2',''),
  ('105','OnWebPageComplete','5',''),
  ('106','OnLogPageHit','5',''),
  ('107','OnBeforeManagerPageInit','2',''),
  ('108','OnBeforeEmptyTrash','1','Documents'),
  ('109','OnEmptyTrash','1','Documents'),
  ('110','OnManagerLoginFormPrerender','2',''),
  ('111','OnStripAlias','1','Documents'),
  ('112','OnMakeDocUrl','5',''),
  ('113','OnBeforeLoadExtension','5',''),
  ('114','OnCreateDocGroup','1','Documents'),
  ('115','OnManagerWelcomePrerender','2',''),
  ('116','OnManagerWelcomeHome','2',''),
  ('117','OnManagerWelcomeRender','2',''),
  ('118','OnBeforeDocDuplicate','1','Documents'),
  ('119','OnDocDuplicate','1','Documents'),
  ('120','OnManagerMainFrameHeaderHTMLBlock','2',''),
  ('121','OnManagerPreFrameLoader','2',''),
  ('122','OnManagerFrameLoader','2',''),
  ('123','OnManagerTreeInit','2',''),
  ('124','OnManagerTreePrerender','2','');

INSERT INTO `htmx_system_eventnames` VALUES
  ('125','OnManagerTreeRender','2',''),
  ('126','OnManagerNodePrerender','2',''),
  ('127','OnManagerNodeRender','2',''),
  ('128','OnManagerMenuPrerender','2',''),
  ('129','OnManagerTopPrerender','2',''),
  ('130','OnDocFormTemplateRender','1','Documents'),
  ('131','OnBeforeMinifyCss','1',''),
  ('132','OnPageUnauthorized','1',''),
  ('133','OnPageNotFound','1',''),
  ('134','OnFileBrowserUpload','1','File Browser Events'),
  ('135','OnBeforeFileBrowserUpload','1','File Browser Events'),
  ('136','OnFileBrowserDelete','1','File Browser Events'),
  ('137','OnBeforeFileBrowserDelete','1','File Browser Events'),
  ('138','OnFileBrowserInit','1','File Browser Events'),
  ('139','OnFileBrowserMove','1','File Browser Events'),
  ('140','OnBeforeFileBrowserMove','1','File Browser Events'),
  ('141','OnFileBrowserCopy','1','File Browser Events'),
  ('142','OnBeforeFileBrowserCopy','1','File Browser Events'),
  ('143','OnBeforeFileBrowserRename','1','File Browser Events'),
  ('144','OnFileBrowserRename','1','File Browser Events'),
  ('145','OnLogEvent','1','');

#
# Dumping data for table `htmx_system_settings`
#

INSERT INTO `htmx_system_settings` VALUES
  ('settings_version',''),
  ('manager_theme','default'),
  ('server_offset_time','0'),
  ('manager_language','russian-UTF8'),
  ('modx_charset','UTF-8'),
  ('site_name','My Evolution Site'),
  ('site_start','1'),
  ('error_page','1'),
  ('unauthorized_page','1'),
  ('site_status','1'),
  ('auto_template_logic','sibling'),
  ('default_template','3'),
  ('old_template',''),
  ('publish_default','1'),
  ('friendly_urls','1'),
  ('friendly_alias_urls','1'),
  ('use_alias_path','1'),
  ('cache_type','2'),
  ('failed_login_attempts','3'),
  ('blocked_minutes','60'),
  ('use_captcha','0'),
  ('emailsender','mail@a-sharapov.com'),
  ('use_editor','1'),
  ('use_browser','1'),
  ('fe_editor_lang','russian-UTF8'),
  ('fck_editor_toolbar','standard'),
  ('fck_editor_autolang','0'),
  ('editor_css_path',''),
  ('editor_css_selectors',''),
  ('upload_maxsize','10485760'),
  ('manager_layout','4');

INSERT INTO `htmx_system_settings` VALUES
  ('auto_menuindex','1'),
  ('session.cookie.lifetime','604800'),
  ('mail_check_timeperiod','600'),
  ('manager_direction','ltr'),
  ('xhtml_urls','0'),
  ('automatic_alias','1'),
  ('datetime_format','dd-mm-YYYY'),
  ('warning_visibility','0'),
  ('remember_last_tab','1'),
  ('enable_bindings','1'),
  ('seostrict','1'),
  ('number_of_results','30'),
  ('theme_refresher',''),
  ('show_picker','0'),
  ('show_newresource_btn','0'),
  ('show_fullscreen_btn','0'),
  ('email_sender_method','1'),
  ('site_id','62efd262d855a');

#
# Dumping data for table `htmx_user_attributes`
#

INSERT INTO `htmx_user_attributes` VALUES
  ('1','1','Admin','1','mail@a-sharapov.com','','','0','0','0','1','0','1659884143','0','a5421cad469125295a8e80dc9f245762','0','0','','','','','','','','','0','0','1');

#
# Dumping data for table `htmx_user_messages`
#

#
# Dumping data for table `htmx_user_roles`
#

INSERT INTO `htmx_user_roles` VALUES
  ('2','Editor','Limited to managing content','1','1','1','1','1','1','1','0','1','1','1','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','1','0','1','0','1','1','1','1','1','0','1','1','1','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','1','0','0','1','1','1'),
  ('3','Publisher','Editor with expanded permissions including manage users, update Elements and site settings','1','1','1','1','1','1','1','1','1','1','1','0','1','1','1','0','0','1','1','1','1','1','1','0','0','0','0','1','1','1','1','1','1','1','1','1','0','1','1','1','1','1','1','0','0','0','0','0','1','0','0','0','0','0','0','0','0','1','0','0','1','1','1','1','0','1','0','0','1','1','1'),
  ('1','Administrator','Site administrators have full access to all functions','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');

#
# Dumping data for table `htmx_user_settings`
#

#
# Dumping data for table `htmx_web_groups`
#

#
# Dumping data for table `htmx_web_user_attributes`
#

#
# Dumping data for table `htmx_web_user_settings`
#

#
# Dumping data for table `htmx_web_users`
#

#
# Dumping data for table `htmx_webgroup_access`
#

#
# Dumping data for table `htmx_webgroup_names`
#


# --------------------------------------------------------

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET @@sql_mode := @old_sql_mode ;


# --------------------------------------------------------

