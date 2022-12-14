#
# My Evolution Site Database Dump
# Evolution CMS Version:3.1.10
# 
# Host: 
# Generation Time: 07-08-2022 12:40:24
# Server version: 8.0.30
# PHP Version: 8.1.9
# Database: `evo`
# Description: 
#

# --------------------------------------------------------

#
# Table structure for table `api_active_user_locks`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_active_user_locks`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_active_user_locks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `elementType` int NOT NULL DEFAULT '0',
  `elementId` int NOT NULL DEFAULT '0',
  `lasthit` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_element_id` (`elementType`,`elementId`,`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_active_user_sessions`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_active_user_sessions`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_active_user_sessions` (
  `sid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `lasthit` int NOT NULL DEFAULT '0',
  `ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_active_user_sessions`
#

INSERT INTO `api_active_user_sessions` VALUES
  ('3ad9509fb4b36cb6fb40e6fbf1ed01ce','1','1659876022','172.29.0.1');


# --------------------------------------------------------

#
# Table structure for table `api_active_users`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_active_users`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_active_users` (
  `sid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `lasthit` int NOT NULL DEFAULT '0',
  `action` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id` int DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_active_users`
#

INSERT INTO `api_active_users` VALUES
  ('3ad9509fb4b36cb6fb40e6fbf1ed01ce','1','root','1659876022','93','0');


# --------------------------------------------------------

#
# Table structure for table `api_categories`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_categories`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `rank` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_categories`
#

INSERT INTO `api_categories` VALUES
  ('1','Manager and Admin','0'),
  ('2','Templates','0'),
  ('3','Assets','0'),
  ('4','Navigation','0'),
  ('5','Content','0'),
  ('6','SEO','0');


# --------------------------------------------------------

#
# Table structure for table `api_document_groups`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_document_groups`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_document_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `document_group` int NOT NULL DEFAULT '0',
  `document` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_dg_id` (`document_group`,`document`),
  KEY `document_group` (`document_group`),
  KEY `document` (`document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_documentgroup_names`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_documentgroup_names`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_documentgroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `private_memgroup` int DEFAULT '0' COMMENT 'determine whether the document group is private to manager users',
  `private_webgroup` int DEFAULT '0' COMMENT 'determines whether the document is private to web users',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_event_log`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_event_log`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_event_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventid` int DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '1' COMMENT '1- information, 2 - warning, 3- error',
  `user` int NOT NULL DEFAULT '0' COMMENT 'link to user table',
  `usertype` int NOT NULL DEFAULT '0' COMMENT '0 - manager, 1 - web',
  `source` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `event_log_user_index` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_manager_log`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_manager_log`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_manager_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` int NOT NULL DEFAULT '0',
  `internalKey` int NOT NULL DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `action` int NOT NULL DEFAULT '0',
  `itemid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `itemname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `useragent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_manager_log`
#

INSERT INTO `api_manager_log` VALUES
  ('1','1659876006','1','root','54','','api_manager_log','Optimizing a table','172.29.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('2','1659876007','1','root','93','','-','Backup Manager','172.29.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('3','1659876010','1','root','54','','api_event_log','Optimizing a table','172.29.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('4','1659876011','1','root','93','','-','Backup Manager','172.29.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
  ('5','1659876017','1','root','26','','-','Refreshing site','172.29.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');


# --------------------------------------------------------

#
# Table structure for table `api_member_groups`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_member_groups`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_member_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_group` int NOT NULL DEFAULT '0',
  `member` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_group_member` (`user_group`,`member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_membergroup_access`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_membergroup_access`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_membergroup_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membergroup` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_membergroup_names`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_membergroup_names`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_membergroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `membergroup_names_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_migrations_install`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_migrations_install`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_migrations_install` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_migrations_install`
#

INSERT INTO `api_migrations_install` VALUES
  ('1','2018_06_29_182342_create_active_user_locks_table','1'),
  ('2','2018_06_29_182342_create_active_user_sessions_table','1'),
  ('3','2018_06_29_182342_create_active_users_table','1'),
  ('4','2018_06_29_182342_create_categories_table','1'),
  ('5','2018_06_29_182342_create_document_groups_table','1'),
  ('6','2018_06_29_182342_create_documentgroup_names_table','1'),
  ('7','2018_06_29_182342_create_event_log_table','1'),
  ('8','2018_06_29_182342_create_manager_log_table','1'),
  ('9','2018_06_29_182342_create_manager_users_table','1'),
  ('10','2018_06_29_182342_create_member_groups_table','1'),
  ('11','2018_06_29_182342_create_membergroup_access_table','1'),
  ('12','2018_06_29_182342_create_membergroup_names_table','1'),
  ('13','2018_06_29_182342_create_permissions_groups_table','1'),
  ('14','2018_06_29_182342_create_permissions_table','1'),
  ('15','2018_06_29_182342_create_role_permissions_table','1'),
  ('16','2018_06_29_182342_create_site_content_table','1'),
  ('17','2018_06_29_182342_create_site_htmlsnippets_table','1'),
  ('18','2018_06_29_182342_create_site_module_access_table','1'),
  ('19','2018_06_29_182342_create_site_module_depobj_table','1'),
  ('20','2018_06_29_182342_create_site_modules_table','1'),
  ('21','2018_06_29_182342_create_site_plugin_events_table','1'),
  ('22','2018_06_29_182342_create_site_plugins_table','1'),
  ('23','2018_06_29_182342_create_site_snippets_table','1'),
  ('24','2018_06_29_182342_create_site_templates_table','1'),
  ('25','2018_06_29_182342_create_site_tmplvar_access_table','1'),
  ('26','2018_06_29_182342_create_site_tmplvar_contentvalues_table','1'),
  ('27','2018_06_29_182342_create_site_tmplvar_templates_table','1'),
  ('28','2018_06_29_182342_create_site_tmplvars_table','1'),
  ('29','2018_06_29_182342_create_system_eventnames_table','1'),
  ('30','2018_06_29_182342_create_system_settings_table','1'),
  ('31','2018_06_29_182342_create_user_attributes_table','1'),
  ('32','2018_06_29_182342_create_user_roles_table','1'),
  ('33','2018_06_29_182342_create_user_settings_table','1'),
  ('34','2018_06_29_182342_create_web_groups_table','1'),
  ('35','2018_06_29_182342_create_web_user_attributes_table','1'),
  ('36','2018_06_29_182342_create_web_user_settings_table','1'),
  ('37','2018_06_29_182342_create_web_users_table','1'),
  ('38','2018_06_29_182342_create_webgroup_access_table','1'),
  ('39','2018_06_29_182342_create_webgroup_names_table','1'),
  ('40','2020_09_12_110820_create_site_content_closure','1'),
  ('41','2020_09_16_110820_update_web_user_attributes_table','1'),
  ('42','2020_10_05_124820_second_update_web_user_attributes_table','1'),
  ('43','2020_10_05_154230_drop_manager_user_tables','1'),
  ('44','2020_10_05_162325_rename_web_user_tables','1'),
  ('45','2020_10_08_112342_remove_column_from_role_table','1'),
  ('46','2020_10_12_065655_make_guid_nullable_in_modules','1'),
  ('47','2020_10_12_065655_make_moduleguid_nullable_in_plugins','1'),
  ('48','2020_10_28_154230_drop_webuser_group_tables','1'),
  ('49','2020_10_30_065655_make_dob_nullable_in_userattributes','1'),
  ('50','2020_11_02_100555_add_token_columns_to_user_table','1'),
  ('51','2020_11_10_110555_add_verified_columns_to_user_table','1'),
  ('52','2020_11_22_114803_create_user_role_vars','1'),
  ('53','2020_11_22_114809_create_user_values','1'),
  ('54','2020_12_23_065655_make_display_nullable_in_tmplvars','1'),
  ('55','2021_02_05_121655_add_index_to_pubdate_column_content_table','1'),
  ('56','2021_02_10_060454_add_properties_column_to_site_tmplvars','1'),
  ('57','2021_02_17_102610_rename_donthit_column_in_site_content_table','1'),
  ('58','2018_06_29_182342_create_permissions_table','1');


# --------------------------------------------------------

#
# Table structure for table `api_permissions`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_permissions`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `group_id` int DEFAULT NULL,
  `disabled` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_permissions`
#

INSERT INTO `api_permissions` VALUES
  ('1','Request manager frames','frames','role_frames','1','1',NULL,NULL),
  ('2','Request manager intro page','home','role_home','1','1',NULL,NULL),
  ('3','Log out of the manager','logout','role_logout','1','1',NULL,NULL),
  ('4','View help pages','help','role_help','1','0',NULL,NULL),
  ('5','View action completed screen','action_ok','role_actionok','1','1',NULL,NULL),
  ('6','View error dialog','error_dialog','role_errors','1','1',NULL,NULL),
  ('7','View the about page','about','role_about','1','1',NULL,NULL),
  ('8','View credits','credits','role_credits','1','1',NULL,NULL),
  ('9','Change password','change_password','role_change_password','1','0',NULL,NULL),
  ('10','Save password','save_password','role_save_password','1','0',NULL,NULL),
  ('11','View a Resource\'s data','view_document','role_view_docdata','2','1',NULL,NULL),
  ('12','Create new Resources','new_document','role_create_doc','2','0',NULL,NULL),
  ('13','Edit a Resource','edit_document','role_edit_doc','2','0',NULL,NULL),
  ('14','Change Resource-Type','change_resourcetype','role_change_resourcetype','2','0',NULL,NULL),
  ('15','Save Resources','save_document','role_save_doc','2','0',NULL,NULL),
  ('16','Publish Resources','publish_document','role_publish_doc','2','0',NULL,NULL),
  ('17','Delete Resources','delete_document','role_delete_doc','2','0',NULL,NULL),
  ('18','Permanently purge deleted Resources','empty_trash','role_empty_trash','2','0',NULL,NULL),
  ('19','Empty the site\'s cache','empty_cache','role_cache_refresh','2','0',NULL,NULL),
  ('20','View Unpublished Resources','view_unpublished','role_view_unpublished','2','0',NULL,NULL),
  ('21','Use the file manager (full root access)','file_manager','role_file_manager','3','0',NULL,NULL),
  ('22','Manage assets/files','assets_files','role_assets_files','3','0',NULL,NULL),
  ('23','Manage assets/images','assets_images','role_assets_images','3','0',NULL,NULL),
  ('24','Use the Category Manager','category_manager','role_category_manager','4','0',NULL,NULL),
  ('25','Create new Module','new_module','role_new_module','5','0',NULL,NULL),
  ('26','Edit Module','edit_module','role_edit_module','5','0',NULL,NULL),
  ('27','Save Module','save_module','role_save_module','5','0',NULL,NULL),
  ('28','Delete Module','delete_module','role_delete_module','5','0',NULL,NULL),
  ('29','Run Module','exec_module','role_run_module','5','0',NULL,NULL),
  ('30','List Module','list_module','role_list_module','5','0',NULL,NULL),
  ('31','Create new site Templates','new_template','role_create_template','6','0',NULL,NULL),
  ('32','Edit site Templates','edit_template','role_edit_template','6','0',NULL,NULL),
  ('33','Save Templates','save_template','role_save_template','6','0',NULL,NULL),
  ('34','Delete Templates','delete_template','role_delete_template','6','0',NULL,NULL),
  ('35','Create new Snippets','new_snippet','role_create_snippet','7','0',NULL,NULL),
  ('36','Edit Snippets','edit_snippet','role_edit_snippet','7','0',NULL,NULL),
  ('37','Save Snippets','save_snippet','role_save_snippet','7','0',NULL,NULL),
  ('38','Delete Snippets','delete_snippet','role_delete_snippet','7','0',NULL,NULL),
  ('39','Create new Chunks','new_chunk','role_create_chunk','8','0',NULL,NULL),
  ('40','Edit Chunks','edit_chunk','role_edit_chunk','8','0',NULL,NULL),
  ('41','Save Chunks','save_chunk','role_save_chunk','8','0',NULL,NULL),
  ('42','Delete Chunks','delete_chunk','role_delete_chunk','8','0',NULL,NULL),
  ('43','Create new Plugins','new_plugin','role_create_plugin','9','0',NULL,NULL),
  ('44','Edit Plugins','edit_plugin','role_edit_plugin','9','0',NULL,NULL),
  ('45','Save Plugins','save_plugin','role_save_plugin','9','0',NULL,NULL),
  ('46','Delete Plugins','delete_plugin','role_delete_plugin','9','0',NULL,NULL),
  ('47','Create new users','new_user','role_new_user','10','0',NULL,NULL),
  ('48','Edit users','edit_user','role_edit_user','10','0',NULL,NULL),
  ('49','Save users','save_user','role_save_user','10','0',NULL,NULL),
  ('50','Delete users','delete_user','role_delete_user','10','0',NULL,NULL),
  ('51','Access permissions','access_permissions','role_access_persmissions','11','0',NULL,NULL),
  ('52','Web access permissions','web_access_permissions','role_web_access_persmissions','11','0',NULL,NULL),
  ('53','Create new roles','new_role','role_new_role','12','0',NULL,NULL),
  ('54','Edit roles','edit_role','role_edit_role','12','0',NULL,NULL),
  ('55','Save roles','save_role','role_save_role','12','0',NULL,NULL),
  ('56','Delete roles','delete_role','role_delete_role','12','0',NULL,NULL),
  ('57','View event log','view_eventlog','role_view_eventlog','13','0',NULL,NULL),
  ('58','Delete event log','delete_eventlog','role_delete_eventlog','13','0',NULL,NULL),
  ('59','View system logs','logs','role_view_logs','14','0',NULL,NULL),
  ('60','Change site settings','settings','role_edit_settings','14','0',NULL,NULL),
  ('61','Use the Backup Manager','bk_manager','role_bk_manager','14','0',NULL,NULL),
  ('62','Remove Locks','remove_locks','role_remove_locks','14','0',NULL,NULL),
  ('63','Display Locks','display_locks','role_display_locks','14','0',NULL,NULL);


# --------------------------------------------------------

#
# Table structure for table `api_permissions_groups`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_permissions_groups`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_permissions_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_permissions_groups`
#

INSERT INTO `api_permissions_groups` VALUES
  ('1','General','page_data_general',NULL,NULL),
  ('2','Content Management','role_content_management',NULL,NULL),
  ('3','File Management','role_file_management',NULL,NULL),
  ('4','Category Management','category_management',NULL,NULL),
  ('5','Module Management','role_module_management',NULL,NULL),
  ('6','Template Management','role_template_management',NULL,NULL),
  ('7','Snippet Management','role_snippet_management',NULL,NULL),
  ('8','Chunk Management','role_chunk_management',NULL,NULL),
  ('9','Plugin Management','role_plugin_management',NULL,NULL),
  ('10','User Management','role_user_management',NULL,NULL),
  ('11','Permissions','role_udperms',NULL,NULL),
  ('12','Role Management','role_role_management',NULL,NULL),
  ('13','Events Log Management','role_eventlog_management',NULL,NULL),
  ('14','Config Management','role_config_management',NULL,NULL);


# --------------------------------------------------------

#
# Table structure for table `api_role_permissions`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_role_permissions`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_role_permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_role_permissions`
#

INSERT INTO `api_role_permissions` VALUES
  ('1','frames','1',NULL,NULL),
  ('2','home','1',NULL,NULL),
  ('3','logout','1',NULL,NULL),
  ('4','help','1',NULL,NULL),
  ('5','role_actionok','1',NULL,NULL),
  ('6','error_dialog','1',NULL,NULL),
  ('7','about','1',NULL,NULL),
  ('8','credits','1',NULL,NULL),
  ('9','change_password','1',NULL,NULL),
  ('10','save_password','1',NULL,NULL),
  ('11','view_document','1',NULL,NULL),
  ('12','new_document','1',NULL,NULL),
  ('13','edit_document','1',NULL,NULL),
  ('14','change_resourcetype','1',NULL,NULL),
  ('15','save_document','1',NULL,NULL),
  ('16','publish_document','1',NULL,NULL),
  ('17','delete_document','1',NULL,NULL),
  ('18','empty_trash','1',NULL,NULL),
  ('19','empty_cache','1',NULL,NULL),
  ('20','view_unpublished','1',NULL,NULL),
  ('21','file_manager','1',NULL,NULL),
  ('22','assets_files','1',NULL,NULL),
  ('23','assets_images','1',NULL,NULL),
  ('24','category_manager','1',NULL,NULL),
  ('25','new_module','1',NULL,NULL),
  ('26','edit_module','1',NULL,NULL),
  ('27','save_module','1',NULL,NULL),
  ('28','delete_module','1',NULL,NULL),
  ('29','exec_module','1',NULL,NULL),
  ('30','list_module','1',NULL,NULL),
  ('31','new_template','1',NULL,NULL),
  ('32','edit_template','1',NULL,NULL),
  ('33','save_template','1',NULL,NULL),
  ('34','delete_template','1',NULL,NULL),
  ('35','new_snippet','1',NULL,NULL),
  ('36','edit_snippet','1',NULL,NULL),
  ('37','save_snippet','1',NULL,NULL),
  ('38','delete_snippet','1',NULL,NULL),
  ('39','new_chunk','1',NULL,NULL),
  ('40','edit_chunk','1',NULL,NULL),
  ('41','save_chunk','1',NULL,NULL),
  ('42','delete_chunk','1',NULL,NULL),
  ('43','new_plugin','1',NULL,NULL),
  ('44','edit_plugin','1',NULL,NULL),
  ('45','save_plugin','1',NULL,NULL),
  ('46','delete_plugin','1',NULL,NULL),
  ('47','new_user','1',NULL,NULL),
  ('48','edit_user','1',NULL,NULL),
  ('49','save_user','1',NULL,NULL),
  ('50','delete_user','1',NULL,NULL),
  ('51','access_permissions','1',NULL,NULL),
  ('52','web_access_permissions','1',NULL,NULL),
  ('53','new_role','1',NULL,NULL),
  ('54','edit_role','1',NULL,NULL),
  ('55','save_role','1',NULL,NULL),
  ('56','delete_role','1',NULL,NULL),
  ('57','view_eventlog','1',NULL,NULL),
  ('58','delete_eventlog','1',NULL,NULL),
  ('59','logs','1',NULL,NULL),
  ('60','settings','1',NULL,NULL),
  ('61','bk_manager','1',NULL,NULL),
  ('62','remove_locks','1',NULL,NULL),
  ('63','display_locks','1',NULL,NULL),
  ('64','frames','2',NULL,NULL),
  ('65','home','2',NULL,NULL),
  ('66','logout','2',NULL,NULL),
  ('67','help','2',NULL,NULL),
  ('68','role_actionok','2',NULL,NULL),
  ('69','error_dialog','2',NULL,NULL),
  ('70','about','2',NULL,NULL),
  ('71','credits','2',NULL,NULL),
  ('72','change_password','2',NULL,NULL),
  ('73','save_password','2',NULL,NULL),
  ('74','view_document','2',NULL,NULL),
  ('75','new_document','2',NULL,NULL),
  ('76','edit_document','2',NULL,NULL),
  ('77','change_resourcetype','2',NULL,NULL),
  ('78','save_document','2',NULL,NULL),
  ('79','publish_document','2',NULL,NULL),
  ('80','delete_document','2',NULL,NULL),
  ('81','empty_cache','2',NULL,NULL),
  ('82','view_unpublished','2',NULL,NULL),
  ('83','file_manager','2',NULL,NULL),
  ('84','assets_files','2',NULL,NULL),
  ('85','assets_images','2',NULL,NULL),
  ('86','exec_module','2',NULL,NULL),
  ('87','list_module','2',NULL,NULL),
  ('88','edit_chunk','2',NULL,NULL),
  ('89','save_chunk','2',NULL,NULL),
  ('90','remove_locks','2',NULL,NULL),
  ('91','display_locks','2',NULL,NULL),
  ('92','access_permissions','2',NULL,NULL),
  ('93','frames','3',NULL,NULL),
  ('94','home','3',NULL,NULL),
  ('95','logout','3',NULL,NULL),
  ('96','help','3',NULL,NULL),
  ('97','role_actionok','3',NULL,NULL),
  ('98','error_dialog','3',NULL,NULL),
  ('99','about','3',NULL,NULL),
  ('100','credits','3',NULL,NULL),
  ('101','change_password','3',NULL,NULL),
  ('102','save_password','3',NULL,NULL),
  ('103','view_document','3',NULL,NULL),
  ('104','new_document','3',NULL,NULL),
  ('105','edit_document','3',NULL,NULL),
  ('106','change_resourcetype','3',NULL,NULL),
  ('107','save_document','3',NULL,NULL),
  ('108','publish_document','3',NULL,NULL),
  ('109','delete_document','3',NULL,NULL),
  ('110','empty_trash','3',NULL,NULL),
  ('111','empty_cache','3',NULL,NULL),
  ('112','view_unpublished','3',NULL,NULL),
  ('113','file_manager','3',NULL,NULL),
  ('114','assets_files','3',NULL,NULL),
  ('115','assets_images','3',NULL,NULL),
  ('116','exec_module','3',NULL,NULL),
  ('117','list_module','3',NULL,NULL),
  ('118','new_template','3',NULL,NULL),
  ('119','edit_template','3',NULL,NULL),
  ('120','save_template','3',NULL,NULL),
  ('121','delete_template','3',NULL,NULL),
  ('122','new_chunk','3',NULL,NULL),
  ('123','edit_chunk','3',NULL,NULL),
  ('124','save_chunk','3',NULL,NULL),
  ('125','delete_chunk','3',NULL,NULL),
  ('126','new_user','3',NULL,NULL),
  ('127','edit_user','3',NULL,NULL),
  ('128','save_user','3',NULL,NULL),
  ('129','delete_user','3',NULL,NULL),
  ('130','logs','3',NULL,NULL),
  ('131','settings','3',NULL,NULL),
  ('132','bk_manager','3',NULL,NULL),
  ('133','remove_locks','3',NULL,NULL),
  ('134','display_locks','3',NULL,NULL),
  ('135','access_permissions','3',NULL,NULL);


# --------------------------------------------------------

#
# Table structure for table `api_site_content`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_content`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_content` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'document',
  `contentType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'text/html',
  `pagetitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `longtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `alias` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `link_attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Link attriubtes',
  `published` int NOT NULL DEFAULT '0',
  `pub_date` int NOT NULL DEFAULT '0',
  `unpub_date` int NOT NULL DEFAULT '0',
  `parent` int NOT NULL DEFAULT '0',
  `isfolder` int NOT NULL DEFAULT '0',
  `introtext` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Used to provide quick summary of the document',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
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
  `menutitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Menu title',
  `hide_from_tree` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disable page hit count',
  `privateweb` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Private web document',
  `privatemgr` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Private manager document',
  `content_dispo` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-inline, 1-attachment',
  `hidemenu` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Hide document from menu',
  `alias_visible` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `typeidx` (`type`),
  KEY `aliasidx` (`alias`),
  KEY `parent` (`parent`),
  KEY `pub_unpub_published` (`pub_date`,`unpub_date`,`published`),
  KEY `pub_unpub` (`pub_date`,`unpub_date`),
  KEY `unpub` (`unpub_date`),
  KEY `pub` (`pub_date`),
  FULLTEXT KEY `content_ft_idx` (`pagetitle`,`description`,`content`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_content`
#

INSERT INTO `api_site_content` VALUES
  ('1','document','text/html','main','','','index','','1','0','0','0','1','','<h1>Works</h1>','1','2','0','1','1','1','1652777125','1','1659863772','0','0','0','1130304721','1','','0','0','0','0','0','1');


# --------------------------------------------------------

#
# Table structure for table `api_site_content_closure`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_content_closure`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_content_closure` (
  `closure_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ancestor` int unsigned NOT NULL,
  `descendant` int unsigned NOT NULL,
  `depth` int unsigned NOT NULL,
  PRIMARY KEY (`closure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_content_closure`
#

INSERT INTO `api_site_content_closure` VALUES
  ('1','1','1','0');


# --------------------------------------------------------

#
# Table structure for table `api_site_htmlsnippets`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_htmlsnippets`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_htmlsnippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Chunk',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `editor_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'none',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `snippet` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disables the snippet',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_htmlsnippets`
#

INSERT INTO `api_site_htmlsnippets` VALUES
  ('1','html-head','???????????? HTML Head. ????????????????????, ???????????????????????????? ??????????????????','2','none','2','0','<head>\n	<meta charset=\"UTF-8\" />\n	<base href=\"/\" />\n	<title>[*pagetitle*]</title>\n	<meta name=\"description\" content=\"[*description*]\"/>\n	<meta name=\"keywords\" content=\"[*meta-keywords*]\" />\n	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\n	<meta http-equiv=\"imagetoolbar\" content=\"no\" />\n	<meta http-equiv=\"Content-language\" content=\"ru\" />\n	<meta http-equiv=\"Cache-Control\" content=\"max-age=3600, must-revalidate\" />\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\n	[*meta-robots*]\n    [*meta-state*]\n	<meta name=\"googlebot\" content=\"NOODP\" />\n	<meta name=\"theme-color\" content=\"[+color+]\" />\n	<meta name=\"msapplication-navbutton-color\" content=\"[+color+]\" />\n	<meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />\n	<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black-translucent\">\n    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />\n	<link rel=\"stylesheet\" type=\"text/css\" href=\"/frontend/css/global.css\"/>\n	<link rel=\"preload\" href=\"/frontend/css/_responsive.css\" as=\"style\" onload=\"this.onload=null;this.rel=\'stylesheet\'\"/>\n	<noscript><link rel=\"stylesheet\" type=\"text/css\" href=\"/frontend/css/_responsive.css\"/></noscript>\n	[[include? &type=`html` &src=`<script defer type=\"text/javascript\" src=\"/frontend/js/htmx.min.js\"></script>`]]\n</head>','0','1659863564','1659875029','0'),
  ('2','header','?????????? ??????????','2','none','2','0','<header></header>','0','1659869216','1659869216','0'),
  ('3','footer','???????????? ??????????','2','none','2','0','<footer></footer>','0','1659869245','1659869245','0'),
  ('4','page-assets','???????????????????? ?????? ????????????????','2','none','3','0','','0','1659869276','1659869276','0'),
  ('5','seo-assets','???????????????????? SEO','2','none','6','0','','0','1659869324','1659869324','0');


# --------------------------------------------------------

#
# Table structure for table `api_site_module_access`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_module_access`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_module_access` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module` int NOT NULL DEFAULT '0',
  `usergroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_site_module_depobj`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_module_depobj`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_module_depobj` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module` int NOT NULL DEFAULT '0',
  `resource` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '0' COMMENT '10-chunks, 20-docs, 30-plugins, 40-snips, 50-tpls, 60-tvs',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_site_modules`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_modules`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_modules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `wrap` tinyint(1) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'url to module icon',
  `enable_resource` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'enables the resource file feature',
  `resourcefile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'a physical link to a resource file',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `guid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'globally unique identifier',
  `enable_sharedparams` tinyint(1) NOT NULL DEFAULT '0',
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `modulecode` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'module boot up code',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_modules`
#

INSERT INTO `api_site_modules` VALUES
  ('1','Extras','<strong>0.1.3</strong> first repository for Evolution CMS','0','0','1','0','0','','0','','1652777125','1652777125','store435243542tf542t5t','1','',' \n/**\n * Extras\n * \n * first repository for Evolution CMS\n * \n * @category	module\n * @version 	0.1.3\n * @internal	@properties\n * @internal	@guid store435243542tf542t5t	\n * @internal	@shareparams 1\n * @internal	@dependencies requires files located at /assets/modules/store/\n * @internal	@modx_category Manager and Admin\n * @internal    @installset base, sample\n * @lastupdate  25/11/2016\n */\n\n//AUTHORS: Bumkaka & Dmi3yy \ninclude_once(\'../assets/modules/store/core.php\');');


# --------------------------------------------------------

#
# Table structure for table `api_site_plugin_events`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_plugin_events`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_plugin_events` (
  `pluginid` int NOT NULL,
  `evtid` int NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0' COMMENT 'determines plugin run order',
  PRIMARY KEY (`pluginid`,`evtid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_plugin_events`
#

INSERT INTO `api_site_plugin_events` VALUES
  ('1','24','0'),
  ('1','30','0'),
  ('1','39','0'),
  ('1','45','0'),
  ('1','51','0'),
  ('1','71','0'),
  ('1','88','0'),
  ('2','110','0'),
  ('3','105','0'),
  ('4','68','0'),
  ('4','110','1'),
  ('4','127','0'),
  ('5','3','0'),
  ('5','21','0'),
  ('5','83','0'),
  ('5','87','0'),
  ('5','88','1'),
  ('5','94','0'),
  ('5','95','0');


# --------------------------------------------------------

#
# Table structure for table `api_site_plugins`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_plugins`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_plugins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Plugin',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `plugincode` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Default Properties',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disables the plugin',
  `moduleguid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'GUID of module from which to import shared parameters',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_plugins`
#

INSERT INTO `api_site_plugins` VALUES
  ('1','CodeMirror','<strong>1.5</strong> JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)','0','1','0','\n/**\n * CodeMirror\n *\n * JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)\n *\n * @category    plugin\n * @version     1.5\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @package     evo\n * @internal    @events OnDocFormRender,OnChunkFormRender,OnModFormRender,OnPluginFormRender,OnSnipFormRender,OnTempFormRender,OnRichTextEditorInit\n * @internal    @modx_category Manager and Admin\n * @internal    @properties &theme=Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;default &darktheme=Dark Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;one-dark &fontSize=Font-size;list;10,11,12,13,14,15,16,17,18;14 &lineHeight=Line-height;list;1,1.1,1.2,1.3,1.4,1.5;1.3 &indentUnit=Indent unit;int;4 &tabSize=The width of a tab character;int;4 &lineWrapping=lineWrapping;list;true,false;true &matchBrackets=matchBrackets;list;true,false;true &activeLine=activeLine;list;true,false;false &emmet=emmet;list;true,false;true &search=search;list;true,false;false &indentWithTabs=indentWithTabs;list;true,false;true &undoDepth=undoDepth;int;200 &historyEventDelay=historyEventDelay;int;1250\n * @internal    @installset base\n * @reportissues https://github.com/evolution-cms/evolution/issues/\n * @documentation Official docs https://codemirror.net/doc/manual.html\n * @author      hansek from http://www.modxcms.cz\n * @author      update Mihanik71\n * @author      update Deesen\n * @author      update 64j\n * @lastupdate  08-01-2018\n */\n\n$_CM_BASE = \'assets/plugins/codemirror/\';\n\n$_CM_URL = MODX_SITE_URL . $_CM_BASE;\n\nrequire(MODX_BASE_PATH. $_CM_BASE .\'codemirror.plugin.php\');\n','0','{\"theme\":[{\"label\":\"Theme\",\"type\":\"list\",\"value\":\"default\",\"options\":\"default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light\",\"default\":\"default\",\"desc\":\"\"}],\"darktheme\":[{\"label\":\"Dark Theme\",\"type\":\"list\",\"value\":\"one-dark\",\"options\":\"default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light\",\"default\":\"one-dark\",\"desc\":\"\"}],\"fontSize\":[{\"label\":\"Font-size\",\"type\":\"list\",\"value\":\"14\",\"options\":\"10,11,12,13,14,15,16,17,18\",\"default\":\"14\",\"desc\":\"\"}],\"lineHeight\":[{\"label\":\"Line-height\",\"type\":\"list\",\"value\":\"1.3\",\"options\":\"1,1.1,1.2,1.3,1.4,1.5\",\"default\":\"1.3\",\"desc\":\"\"}],\"indentUnit\":[{\"label\":\"Indent unit\",\"type\":\"int\",\"value\":\"4\",\"default\":\"4\",\"desc\":\"\"}],\"tabSize\":[{\"label\":\"The width of a tab character\",\"type\":\"int\",\"value\":\"4\",\"default\":\"4\",\"desc\":\"\"}],\"lineWrapping\":[{\"label\":\"lineWrapping\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"matchBrackets\":[{\"label\":\"matchBrackets\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"activeLine\":[{\"label\":\"activeLine\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"emmet\":[{\"label\":\"emmet\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"search\":[{\"label\":\"search\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"indentWithTabs\":[{\"label\":\"indentWithTabs\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"undoDepth\":[{\"label\":\"undoDepth\",\"type\":\"int\",\"value\":\"200\",\"default\":\"200\",\"desc\":\"\"}],\"historyEventDelay\":[{\"label\":\"historyEventDelay\",\"type\":\"int\",\"value\":\"1250\",\"default\":\"1250\",\"desc\":\"\"}]}','0','','1652777125','1652777125'),
  ('2','OutdatedExtrasCheck','<strong>1.4.6</strong> Check for Outdated critical extras not compatible with EVO 1.4.6','0','1','0','/**\n * OutdatedExtrasCheck\n *\n * Check for Outdated critical extras not compatible with EVO 1.4.6\n *\n * @category	plugin\n * @version     1.4.6\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @package     evo\n * @author      Author: Nicola Lambathakis\n * @internal    @events OnManagerWelcomeHome\n * @internal    @properties &wdgVisibility=Show widget for:;menu;All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly;AdminOnly &ThisRole=Run only for this role:;string;;;(role id) &ThisUser=Run only for this user:;string;;;(username)\n * @internal    @modx_category Manager and Admin\n * @internal    @installset base\n * @internal    @disabled 0\n */\n\nrequire MODX_BASE_PATH . \'assets/plugins/extrascheck/OutdatedExtrasCheck.plugin.php\';\n','0','{\"wdgVisibility\":[{\"label\":\"Show widget for:\",\"type\":\"menu\",\"value\":\"AdminOnly\",\"options\":\"All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly\",\"default\":\"AdminOnly\",\"desc\":\"\"}],\"ThisRole\":[{\"label\":\"Run only for this role:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"ThisUser\":[{\"label\":\"Run only for this user:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}]}','0','','1652777126','1652777126'),
  ('3','TransAlias','<strong>1.0.4</strong> Human readible URL translation supporting multiple languages and overrides','0','1','0','require MODX_BASE_PATH.\'assets/plugins/transalias/plugin.transalias.php\';','0','{\"table_name\":[{\"label\":\"Trans table\",\"type\":\"list\",\"value\":\"russian\",\"options\":\"common,russian,dutch,german,czech,utf8,utf8lowercase\",\"default\":\"russian\",\"desc\":\"\"}],\"char_restrict\":[{\"label\":\"Restrict alias to\",\"type\":\"list\",\"value\":\"lowercase alphanumeric\",\"options\":\"lowercase alphanumeric,alphanumeric,legal characters\",\"default\":\"lowercase alphanumeric\",\"desc\":\"\"}],\"remove_periods\":[{\"label\":\"Remove Periods\",\"type\":\"list\",\"value\":\"No\",\"options\":\"Yes,No\",\"default\":\"No\",\"desc\":\"\"}],\"word_separator\":[{\"label\":\"Word Separator\",\"type\":\"list\",\"value\":\"dash\",\"options\":\"dash,underscore,none\",\"default\":\"dash\",\"desc\":\"\"}],\"override_tv\":[{\"label\":\"Override TV name\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}]}','0','','1652777126','1652777126'),
  ('4','Updater','<strong>0.8.5</strong> show message about outdated CMS version','0','1','0','require MODX_BASE_PATH.\'assets/plugins/updater/plugin.updater.php\';','0','{\"version\":[{\"label\":\"Version:\",\"type\":\"text\",\"value\":\"evolution-cms\\/evolution\",\"default\":\"evolution-cms\\/evolution\",\"desc\":\"\"}],\"wdgVisibility\":[{\"label\":\"Show widget for:\",\"type\":\"menu\",\"value\":\"All\",\"options\":\"All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly\",\"default\":\"All\",\"desc\":\"\"}],\"ThisRole\":[{\"label\":\"Show only to this role id:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"ThisUser\":[{\"label\":\"Show only to this username:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"showButton\":[{\"label\":\"Show Update Button:\",\"type\":\"menu\",\"value\":\"AdminOnly\",\"options\":\"show,hide,AdminOnly\",\"default\":\"AdminOnly\",\"desc\":\"\"}],\"type\":[{\"label\":\"Type:\",\"type\":\"menu\",\"value\":\"tags\",\"options\":\"tags,releases,commits\",\"default\":\"tags\",\"desc\":\"\"}],\"branch\":[{\"label\":\"Commit branch:\",\"type\":\"text\",\"value\":\"develop\",\"default\":\"develop\",\"desc\":\"\"}],\"stableOnly\":[{\"label\":\"Offer upgrade to stable version only:\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}]}','0','','1652777126','1652777126'),
  ('5','TinyMCE4','<strong>4.9.11</strong> Javascript rich text editor','0','1','0','if (!defined(\'MODX_BASE_PATH\')) { die(\'What are you doing? Get out of here!\'); }\n\nrequire(MODX_BASE_PATH.\"assets/plugins/tinymce4/plugin.tinymce.inc.php\");','0','{\"styleFormats\":[{\"label\":\"Custom Style Formats <b>RAW<\\/b><br\\/><br\\/><ul><li>leave empty to use below block\\/inline formats<\\/li><li>allows simple-format: <i>Title,cssClass|Title2,cssClass2<\\/i><\\/li><li>Also accepts full JSON-config as per TinyMCE4 docs \\/ configure \\/ content-formating \\/ style_formats<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"styleFormats_inline\":[{\"label\":\"Custom Style Formats <b>INLINE<\\/b><br\\/><br\\/><ul><li>will wrap selected text with span-tag + css-class<\\/li><li>simple-format only<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"InlineTitle,cssClass1|InlineTitle2,cssClass2\",\"default\":\"InlineTitle,cssClass1|InlineTitle2,cssClass2\",\"desc\":\"\"}],\"styleFormats_block\":[{\"label\":\"Custom Style Formats <b>BLOCK<\\/b><br\\/><br\\/><ul><li>will add css-class to selected block-element<\\/li><li>simple-format only<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"BlockTitle,cssClass3|BlockTitle2,cssClass4\",\"default\":\"BlockTitle,cssClass3|BlockTitle2,cssClass4\",\"desc\":\"\"}],\"customParams\":[{\"label\":\"Custom Parameters<br\\/><b>(Be careful or leave empty!)<\\/b>\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"entityEncoding\":[{\"label\":\"Entity Encoding\",\"type\":\"list\",\"value\":\"named\",\"options\":\"named,numeric,raw\",\"default\":\"named\",\"desc\":\"\"}],\"entities\":[{\"label\":\"Entities\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"pathOptions\":[{\"label\":\"Path Options\",\"type\":\"list\",\"value\":\"Site config\",\"options\":\"Site config,Absolute path,Root relative,URL,No convert\",\"default\":\"Site config\",\"desc\":\"\"}],\"resizing\":[{\"label\":\"Advanced Resizing\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"disabledButtons\":[{\"label\":\"Disabled Buttons\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webTheme\":[{\"label\":\"Web Theme\",\"type\":\"test\",\"value\":\"webuser\",\"default\":\"webuser\",\"desc\":\"\"}],\"webPlugins\":[{\"label\":\"Web Plugins\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webButtons1\":[{\"label\":\"Web Buttons 1\",\"type\":\"text\",\"value\":\"bold italic underline strikethrough removeformat alignleft aligncenter alignright\",\"default\":\"bold italic underline strikethrough removeformat alignleft aligncenter alignright\",\"desc\":\"\"}],\"webButtons2\":[{\"label\":\"Web Buttons 2\",\"type\":\"text\",\"value\":\"link unlink image undo redo\",\"default\":\"link unlink image undo redo\",\"desc\":\"\"}],\"webButtons3\":[{\"label\":\"Web Buttons 3\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webButtons4\":[{\"label\":\"Web Buttons 4\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webAlign\":[{\"label\":\"Web Toolbar Alignment\",\"type\":\"list\",\"value\":\"ltr\",\"options\":\"ltr,rtl\",\"default\":\"ltr\",\"desc\":\"\"}],\"width\":[{\"label\":\"Width\",\"type\":\"text\",\"value\":\"100%\",\"default\":\"100%\",\"desc\":\"\"}],\"height\":[{\"label\":\"Height\",\"type\":\"text\",\"value\":\"400px\",\"default\":\"400px\",\"desc\":\"\"}],\"introtextRte\":[{\"label\":\"<b>Introtext RTE<\\/b><br\\/>add richtext-features to \\\"introtext\\\"\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"inlineMode\":[{\"label\":\"<b>Inline-Mode<\\/b>\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"inlineTheme\":[{\"label\":\"<b>Inline-Mode<\\/b><br\\/>Theme\",\"type\":\"text\",\"value\":\"inline\",\"default\":\"inline\",\"desc\":\"\"}],\"browser_spellcheck\":[{\"label\":\"<b>Browser Spellcheck<\\/b><br\\/>At least one dictionary must be installed inside your browser\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"paste_as_text\":[{\"label\":\"<b>Force Paste as Text<\\/b>\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}]}','0','','1652777694','1652777694');


# --------------------------------------------------------

#
# Table structure for table `api_site_snippets`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_snippets`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_snippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Snippet',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` int NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `snippet` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Default Properties',
  `moduleguid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'GUID of module from which to import shared parameters',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disables the snippet',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_snippets`
#

INSERT INTO `api_site_snippets` VALUES
  ('1','include','?????????????????????? ????????????/???????? ?? ????????????????','0','3','0','\n/* [[include]]\n *\n *\n * @description: ?????????????????????? ????????????/???????? ?? ????????????????\n *\n * @category    snippet\n * @version     1.00\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @author      Alexander Sharapov\n *\n * Example: [[include? &type=`js` &src=`/frontend/js/ui.js`]]\n */\n\n$type = (isset($type)) ? $type : \"js-head\";\n$src = (isset($src)) ? $src : null; // chunk | string | file path\nif ($src) {\n	if ($modx->getChunk($src)) {\n		$src = $modx->getChunk($src);\n	} else {\n		$src = trim($src);\n	}\n	switch ($type) {\n		case \'html\':\n			$modx->regClientHTMLBlock($src);\n			break;\n		case \'html-head\':\n			$modx->regClientStartupHTMLBlock($src);\n			break;\n		case \'js\':\n			$modx->regClientScript($src);\n			break;\n		case \'js-head\':\n			$modx->regClientStartupScript($src);\n			break;\n		case \'css\':\n			$modx->regClientCSS($src);\n			break;\n	}\n}\nreturn;','0','{}','','1659863868','1659863868','0'),
  ('2','UUID','?????????????????? UUID','0','3','0','\nreturn sprintf( \'%04x%04x-%04x-%04x-%04x-%04x%04x%04x\',\n        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),\n        mt_rand( 0, 0xffff ),\n        mt_rand( 0, 0x0fff ) | 0x4000,\n        mt_rand( 0, 0x3fff ) | 0x8000,\n        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )\n);','0','{}','','1659864056','1659864056','0'),
  ('3','SimpleMenu','?????????????? ???????????????????????????? ???????? ???? ???????????? DocInfo ?? ????????????????????????????','0','4','0','\n/* [[SimpleMenu]]\n *\n *\n * @description: ?????????????? ???????????????????????????? ???????? ???? ???????????? DocInfo ?? ????????????????????????????\n *\n * @category    snippet\n * @version     1.00\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @author      Alexander Sharapov\n *\n * Example: [[SimpleMenu? &start=`5` &title=`pagetitle` &ignore=`1,2,3` &deep=`3` ]]\n */\n\n$menu = (isset($menu)) ? $menu : \'<nav[+role+] role=\"navigation\" itemscope itemtype=\"http://schema.org/SiteNavigationElement\">[+wrapper+]</nav>\';\n$wrapper = (isset($wrapper)) ? $wrapper : \'<ul data-role=\"[+prop+]\" itemscope itemtype=\"http://schema.org/ItemList\">[+list+]</ul>\';\n$element = (isset($element)) ? $element : \'<li data-id=\"[+docid+]\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ItemList\">[+item+][+submenu+]</li>\';\n$link = (isset($link)) ? $link : \'<a href=\"[+url+]\" itemprop=\"url\" [+link_attributes+]>[+item+]</a>\';\n$item = (isset($item)) ? $item : \'<span itemprop=\"name\" [+link_attributes+]>[+title+]</span>\';\n$title = (isset($title)) ? $title : \"menutitle\";\n$sortBy = (isset($sortBy)) ? $sortBy : \"menuindex\";\n$sortDir = (isset($sortDir)) ? strtoupper($sortDir) : \"ASC\";\n$prop = (isset($prop)) ? $prop : \"menu\";\n$deep = (isset($deep)) ? $deep : 1;\n$start = (isset($start)) ? $start : 0;\n$role = (isset($role)) ? $role : null;\n\n$ignore = explode(\",\", $ignore);\n$current = $modx->documentIdentifier;\n$items = array();\n$parents = array();\n$currentParent = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $modx->documentIdentifier, \"field\" => \"parent\"));\n\n$documents = $modx->getActiveChildren($start, $sortBy, $sortDir);\nforeach ($documents as &$document) {\n	$currentDeep = 1;\n	if ($deep > $currentDeep) {\n		$submenu = $modx->runSnippet(\"SimpleMenu\", array(\"deep\" => (int) $deep-$currentDeep, \"start\" => $document[\'id\'], \"menu\" => \"[+wrapper+]\", \"prop\" => \"submenu\"));\n	}\n	\n	$tpllinkassets = \"\";\n	\n	$hidden = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $document[\'id\'], \"field\" => \"hidemenu\"));\n	$isfolder = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $document[\'id\'], \"field\" => \"isfolder\"));\n	\n	if ($hidden != 1 && !in_array($document[\'id\'], $ignore)) {\n		$tpl = str_replace(\"[+docid+]\", $document[\'id\'], $element);\n		\n		if ($isfolder == 1) {\n			$tpl = str_replace(\"[+submenu+]\", $submenu, $tpl);\n		}\n		\n		if ($document[\'id\'] != $current) {\n			$tpl = str_replace(\"[+item+]\", $link, $tpl);\n			$tpl = str_replace(\"[+url+]\", $modx->makeUrl($document[\'id\'], 0), $tpl);\n			if ((int) $document[\'id\'] === (int) $currentParent) {\n				$tpllinkassets = \"data-active=\\\"true\\\" \";\n			}\n			$tpl = str_replace(\"[+link_attributes+]\", $tpllinkassets.$modx->runSnippet(\"DocInfo\", array(\"docid\" => $document[\'id\'], \"field\" => \"link_attributes\")), $tpl);\n			$tpl = str_replace(\"[+item+]\", $item, $tpl);\n		} else {\n			$tpl = str_replace(\"[+item+]\", $item, $tpl);\n			if ((int) $document[\'id\'] === (int) $currentParent) {\n				$tpllinkassets = \"data-active=\\\"true\\\" \";\n			}\n			$tpl = str_replace(\"[+link_attributes+]\", $tpllinkassets.$modx->runSnippet(\"DocInfo\", array(\"docid\" => $document[\'id\'], \"field\" => \"link_attributes\")), $tpl);\n		}\n							   \n		$currentTitle = (!empty($document[$title])) ? $document[$title] : $document[\"pagetitle\"];\n		$currentItem = str_replace(\"[+title+]\", $currentTitle, $tpl);\n		\n		array_push($items, $currentItem);\n	}\n}\n\n$tpl = str_replace(\"[+wrapper+]\", $wrapper, $menu);\nif (isset($role)) {\n	$tpl = str_replace(\"[+role+]\", \" data-role=\\\"\".$role.\"\\\"\", $tpl);\n}\n$tpl = str_replace(\"[+prop+]\", $prop, $tpl);\n$out = str_replace(\"[+list+]\", implode($items, \"\"), $tpl);\n\nreturn $out;','0','{}','','1659864139','1659868378','0'),
  ('4','SimpleCrumbs','?????????????? ?????????????? ???????????? ???? ???????????? DocInfo ?? ????????????????????????????','0','4','0','\n/* [[SimpleCrumbs]]\n *\n *\n * @description: ?????????????? ?????????????? ???????????? ???? ???????????? DocInfo ?? ????????????????????????????\n *\n * @category    snippet\n * @version     1.00\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @author      Alexander Sharapov\n *\n * Example: [[SimpleCrumbs? &title=`longtitle` &hometitle=`Home` &hidehome=`1` ]]\n */\n      \n$wrapper = (isset($wrapper)) ? $wrapper : \'<nav data-role=\"breadcrumbs\"><ol itemscope itemtype=\"https://schema.org/BreadcrumbList\">[+wrapper+]</ol></nav>\';\n$itemWrapper = (isset($itemWrapper)) ? $itemWrapper : \'<li itemprop=\"itemListElement\" itemscope itemtype=\"https://schema.org/ListItem\">[+item+]<meta itemprop=\"position\" content=\"[+position+]\" /></li>\';\n$linkWrapper = (isset($linkWrapper)) ? $linkWrapper : \'<a itemprop=\"item\" href=\"[+href+]\">[+item+]</a>\';\n$item = (isset($item)) ? $item : \'<span itemprop=\"name\" data-id=\"[+id+]\">[+title+]</span>\';\n$title = (isset($title)) ? $title : \"pagetitle\";\n$hometitle = (isset($hometitle)) ? $hometitle : $modx->getConfig(\"site_name\");\n$position = 1;\n\n$id = $modx->documentIdentifier;\n$docParents = $modx->getParentIds($id);\n$items = array();\n$innerItems = array();\n\nif (!isset($hidehome)) {\n$tpl = str_replace(\"[+position+]\", $position, $itemWrapper);\n$currentItem = str_replace(\"[+item+]\", $linkWrapper, $tpl);\n$currentItem = str_replace(\"[+item+]\", $item, $currentItem);\n$currentItem = str_replace(\"[+href+]\", \"/\", $currentItem);\n$currentItem = str_replace(\"[+id+]\", \"0\", $currentItem);	\n$currentItem = str_replace(\"[+title+]\", $hometitle, $currentItem);\n$position++;\narray_push($items, $currentItem);\n}\n\nforeach ($docParents as $parentId) {\n	$visible = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $parentId, \"field\" => \"alias_visible\"));\n	if ($visible == 1) {\n		$tpl = str_replace(\"[+position+]\", $position, $itemWrapper);\n		$tpl = str_replace(\"[+item+]\", $linkWrapper, $tpl);\n		$tpl = str_replace(\"[+item+]\", $item, $tpl);\n		$pitem = str_replace(\"[+href+]\", $modx->makeUrl($parentId, 0), $tpl);\n		$pitem = str_replace(\"[+id+]\", $parentId, $pitem);\n		$ptitle = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $parentId, \"field\" => $title));\n		if (empty($ptitle)) {\n			$ptitle = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $parentId, \"field\" => \"pagetitle\"));\n		}\n		$pitem = str_replace(\"[+title+]\", $ptitle, $pitem);\n		$position++;\n		array_push($innerItems, $pitem);\n	}\n}\n\n$innerItems = array_reverse($innerItems);\n$items = array_merge($items, $innerItems);\n\n$tpl = str_replace(\"[+position+]\", $position, $itemWrapper);\n$currentItem = str_replace(\"[+item+]\", $item, $tpl);\n$currentItem = str_replace(\"[+id+]\", $id, $currentItem);\n$currentTitle = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $id, \"field\" => $title));\nif (empty($currentTitle)) {\n	$currentTitle = $modx->runSnippet(\"DocInfo\", array(\"docid\" => $id, \"field\" => \"pagetitle\"));\n}\n$currentItem = str_replace(\"[+title+]\", $currentTitle, $currentItem);\narray_push($items, $currentItem);\n\n$items = implode($items, \"\");\n$out = str_replace(\"[+wrapper+]\", $items, $wrapper);\n\nreturn $out;','0','{}','','1659864186','1659868360','0'),
  ('5','DocInfo','<strong>0.4.1</strong> Take any field from any document (fewer requests than GetField)','0','3','0','return require MODX_BASE_PATH.\'assets/snippets/docinfo/snippet.docinfo.php\';\n','0','','','1659864265','1659868541','0'),
  ('6','multiTV','<strong>2.0.16</strong> Custom Template Variabe containing a sortable multi item list or a datatable','0','5','0','return require MODX_BASE_PATH . \'assets/tvs/multitv/multitv.snippet.php\';\n','0','','','0','0','0');


# --------------------------------------------------------

#
# Table structure for table `api_site_templates`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_templates`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_templates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `templatename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `templatealias` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Template',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'url to icon file',
  `template_type` int NOT NULL DEFAULT '0' COMMENT '0-page,1-content',
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `selectable` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_templates`
#

INSERT INTO `api_site_templates` VALUES
  ('1','Base','base','?????????????? ???????????? ???????????? ???????????? (???????????? ??????????????)','0','2','','0','[*content*]','0','1','0','1659863206'),
  ('2','Main','main','???????????? ?????? ?????????????????????? HTML ????????????????','0','2','','0','<!DOCTYPE html>\n<html>\n	{{html-head?\n		&color=`#333`\n	}}\n<body data-page-id=\"[*id*]\" data-page-parent=\"[*parent*]\">\n	<main id=\"page\">\n		{{header}}\n		<article id=\"content-wrapper\">\n			<section id=\"page-content\">[*content*]</section>\n			{{sections}}\n		</article>\n		{{footer}}\n	</main>\n	{{page-assets}}\n	{{seo-assets}}\n</body>\n</html>','0','1','1659863502','1659869199');


# --------------------------------------------------------

#
# Table structure for table `api_site_tmplvar_access`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_tmplvar_access`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_tmplvar_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_site_tmplvar_contentvalues`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_tmplvar_contentvalues`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_tmplvar_contentvalues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0' COMMENT 'Template Variable id',
  `contentid` int NOT NULL DEFAULT '0' COMMENT 'Site Content Id',
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_tvid_contentid` (`tmplvarid`,`contentid`),
  KEY `idx_tmplvarid` (`tmplvarid`),
  KEY `idx_id` (`contentid`),
  FULLTEXT KEY `content_ft_idx` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_site_tmplvar_templates`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_tmplvar_templates`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_tmplvar_templates` (
  `tmplvarid` int NOT NULL DEFAULT '0' COMMENT 'Template Variable id',
  `templateid` int NOT NULL DEFAULT '0',
  `rank` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`tmplvarid`,`templateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_tmplvar_templates`
#

INSERT INTO `api_site_tmplvar_templates` VALUES
  ('1','2','0'),
  ('2','2','0'),
  ('3','2','0');


# --------------------------------------------------------

#
# Table structure for table `api_site_tmplvars`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_site_tmplvars`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_site_tmplvars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `caption` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `elements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rank` int NOT NULL DEFAULT '0',
  `display` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'Display Control',
  `display_params` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Display Control Properties',
  `default_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `indx_rank` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_site_tmplvars`
#

INSERT INTO `api_site_tmplvars` VALUES
  ('1','dropdown','meta-state','???????????????? meta-???????? Document-state','???????????????? ??Static?? ????????????????, ?????? ?????????????? ?????? ?????????????????????????? ?????????????????????????? ???????????????? ?? ????????????????????, ??Dynamic?? ?????????????????? ?????????????????? ?????????????????????????? ????????????????-????????????????.','0','6','0','Static||Dynamic','0','custom_widget','&output=<meta name%3D\"document-state\" content%3D\"[+value+]\" />','Dynamic','1659875003','1659875003','[]'),
  ('2','dropdown','meta-robots','???????????????? meta-???????? Robots','<b>index, follow</b> &ndash; ?????????????????????????? ???????????????? ?? ?????????????????? ???? ??????????????','0','6','0','index,follow||\nnoindex,nofollow||\nindex,nofollow||\nnoindex,follow','0','custom_widget','&output=<meta name%3D\"robots\" content%3D\"[+value+]\" />','index,follow','1659875070','1659875120','[]'),
  ('3','textareamini','meta-keywords','???????????????? ??????????','???????????????????????? ?? ?????????????????????????????? meta-????????','0','6','0','','0','','','','1659875223','1659875301','[]');


# --------------------------------------------------------

#
# Table structure for table `api_system_eventnames`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_system_eventnames`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_system_eventnames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `service` int NOT NULL DEFAULT '0' COMMENT 'System Service number',
  `groupname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_system_eventnames`
#

INSERT INTO `api_system_eventnames` VALUES
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
  ('31','OnBeforeDocFormSave','1','Documents'),
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
  ('62','OnUserFormPrerender','1','Users'),
  ('63','OnUserFormRender','1','Users'),
  ('64','OnBeforeUserSave','1','Users'),
  ('65','OnUserSave','1','Users'),
  ('66','OnBeforeUserDelete','1','Users'),
  ('67','OnUserDelete','1','Users'),
  ('68','OnSiteRefresh','1',''),
  ('69','OnFileManagerUpload','1',''),
  ('70','OnModFormPrerender','1','Modules'),
  ('71','OnModFormRender','1','Modules'),
  ('72','OnBeforeModFormDelete','1','Modules'),
  ('73','OnModFormDelete','1','Modules'),
  ('74','OnBeforeModFormSave','1','Modules'),
  ('75','OnModFormSave','1','Modules'),
  ('76','OnBeforeWebLogin','3',''),
  ('77','OnWebAuthentication','3',''),
  ('78','OnBeforeManagerLogin','2',''),
  ('79','OnManagerAuthentication','2',''),
  ('80','OnSiteSettingsRender','1','System Settings'),
  ('81','OnFriendlyURLSettingsRender','1','System Settings'),
  ('82','OnUserSettingsRender','1','System Settings'),
  ('83','OnInterfaceSettingsRender','1','System Settings'),
  ('84','OnSecuritySettingsRender','1','System Settings'),
  ('85','OnFileManagerSettingsRender','1','System Settings'),
  ('86','OnMiscSettingsRender','1','System Settings'),
  ('87','OnRichTextEditorRegister','1','RichText Editor'),
  ('88','OnRichTextEditorInit','1','RichText Editor'),
  ('89','OnManagerPageInit','2',''),
  ('90','OnWebPageInit','5',''),
  ('91','OnLoadDocumentObject','5',''),
  ('92','OnBeforeLoadDocumentObject','5',''),
  ('93','OnAfterLoadDocumentObject','5',''),
  ('94','OnLoadWebDocument','5',''),
  ('95','OnParseDocument','5',''),
  ('96','OnParseProperties','5',''),
  ('97','OnBeforeParseParams','5',''),
  ('98','OnManagerLoginFormRender','2',''),
  ('99','OnWebPageComplete','5',''),
  ('100','OnLogPageHit','5',''),
  ('101','OnBeforeManagerPageInit','2',''),
  ('102','OnBeforeEmptyTrash','1','Documents'),
  ('103','OnEmptyTrash','1','Documents'),
  ('104','OnManagerLoginFormPrerender','2',''),
  ('105','OnStripAlias','1','Documents'),
  ('106','OnMakeDocUrl','5',''),
  ('107','OnBeforeLoadExtension','5',''),
  ('108','OnCreateDocGroup','1','Documents'),
  ('109','OnManagerWelcomePrerender','2',''),
  ('110','OnManagerWelcomeHome','2',''),
  ('111','OnManagerWelcomeRender','2',''),
  ('112','OnBeforeDocDuplicate','1','Documents'),
  ('113','OnDocDuplicate','1','Documents'),
  ('114','OnManagerMainFrameHeaderHTMLBlock','2',''),
  ('115','OnManagerPreFrameLoader','2',''),
  ('116','OnManagerFrameLoader','2',''),
  ('117','OnManagerTreeInit','2',''),
  ('118','OnManagerTreePrerender','2',''),
  ('119','OnManagerTreeRender','2',''),
  ('120','OnManagerNodePrerender','2',''),
  ('121','OnManagerNodeRender','2',''),
  ('122','OnManagerMenuPrerender','2',''),
  ('123','OnManagerTopPrerender','2',''),
  ('124','OnDocFormTemplateRender','1','Documents'),
  ('125','OnBeforeMinifyCss','1',''),
  ('126','OnPageUnauthorized','1',''),
  ('127','OnPageNotFound','1',''),
  ('128','OnFileBrowserUpload','1','File Browser Events'),
  ('129','OnBeforeFileBrowserUpload','1','File Browser Events'),
  ('130','OnFileBrowserDelete','1','File Browser Events'),
  ('131','OnBeforeFileBrowserDelete','1','File Browser Events'),
  ('132','OnFileBrowserInit','1','File Browser Events'),
  ('133','OnFileBrowserMove','1','File Browser Events'),
  ('134','OnBeforeFileBrowserMove','1','File Browser Events'),
  ('135','OnFileBrowserCopy','1','File Browser Events'),
  ('136','OnBeforeFileBrowserCopy','1','File Browser Events'),
  ('137','OnBeforeFileBrowserRename','1','File Browser Events'),
  ('138','OnFileBrowserRename','1','File Browser Events'),
  ('139','OnLogEvent','1','Log Event');


# --------------------------------------------------------

#
# Table structure for table `api_system_settings`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_system_settings`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_system_settings` (
  `setting_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_system_settings`
#

INSERT INTO `api_system_settings` VALUES
  ('a','30'),
  ('aliaslistingfolder','0'),
  ('allow_duplicate_alias','1'),
  ('allow_eval','with_scan'),
  ('allow_multiple_emails','0'),
  ('automatic_alias','1'),
  ('auto_menuindex','1'),
  ('auto_template_logic','sibling'),
  ('blocked_minutes','60'),
  ('cache_default','1'),
  ('cache_type','2'),
  ('captcha_words','EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote'),
  ('captcha_words_default','EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote'),
  ('check_files_onlogin','index.php\n.htaccess\nmanager/index.php\n/core/config/database/connections/default.php'),
  ('chunk_processor','DLTemplate'),
  ('clean_uploaded_filename','1'),
  ('clientResize','1'),
  ('ControllerNamespace',''),
  ('custom_contenttype','application/rss+xml,application/pdf,application/vnd.ms-word,application/vnd.ms-excel,text/html,text/css,text/xml,text/javascript,text/plain,application/json'),
  ('datepicker_offset','-10'),
  ('datetime_format','dd-mm-YYYY'),
  ('default_template','1'),
  ('denyExtensionRename','0'),
  ('denyZipDownload','0'),
  ('disable_chunk_cache','0'),
  ('disable_plugins_cache','0'),
  ('disable_snippet_cache','0'),
  ('docid_incrmnt_method','1'),
  ('editor_css_path',''),
  ('editor_css_selectors',''),
  ('emailsender','mail@localhost'),
  ('emailsubject','???????????? ?????? ??????????????????????'),
  ('emailsubject_default','???????????? ?????? ??????????????????????'),
  ('email_method','mail'),
  ('email_sender_method','1'),
  ('enable_bindings','1'),
  ('enable_cache','1'),
  ('error_page','1'),
  ('error_reporting','1'),
  ('failed_login_attempts','3'),
  ('fck_editor_autolang','0'),
  ('fck_editor_toolbar','standard'),
  ('fe_editor_lang',''),
  ('filemanager_path','/var/www/html/'),
  ('friendly_alias_urls','1'),
  ('friendly_urls','1'),
  ('friendly_url_prefix',''),
  ('friendly_url_suffix','.html'),
  ('full_aliaslisting','1'),
  ('global_tabs','1'),
  ('group_tvs','1'),
  ('jpegQuality','90'),
  ('lang_code','ru'),
  ('login_bg','assets/images/blank-background.svg'),
  ('login_form_position','center'),
  ('login_form_style','dark'),
  ('login_logo',''),
  ('mail_check_timeperiod','600'),
  ('make_folders','1'),
  ('manager_direction','ltr'),
  ('manager_language','ru'),
  ('manager_layout','4'),
  ('manager_menu_position','top'),
  ('manager_theme','default'),
  ('manager_theme_mode','4'),
  ('maxImageHeight','2200'),
  ('maxImageWidth','2600'),
  ('minifyphp_incache','0'),
  ('modx_charset','UTF-8'),
  ('new_file_permissions','0644'),
  ('new_folder_permissions','0755'),
  ('noThumbnailsRecreation','1'),
  ('number_of_logs','100'),
  ('number_of_messages','40'),
  ('number_of_results','30'),
  ('old_template','1'),
  ('publish_default','1'),
  ('pwd_hash_algo','UNCRYPT'),
  ('rb_base_dir','/var/www/html/assets/'),
  ('rb_base_url','assets/'),
  ('rb_webuser','0'),
  ('reload_captcha_words',''),
  ('reload_emailsubject',''),
  ('reload_site_unavailable','en'),
  ('reload_system_email_webreminder_message',''),
  ('reload_websignupemail_message',''),
  ('remember_last_tab','1'),
  ('resource_tree_node_name','pagetitle'),
  ('rss_url_news','http://feeds.feedburner.com/evocms-release-news'),
  ('rss_url_security','http://feeds.feedburner.com/evocms-security-news'),
  ('safe_functions_at_eval','time,date,strtotime,strftime'),
  ('search_default','1'),
  ('send_errormail','0'),
  ('seostrict','1'),
  ('server_offset_time','0'),
  ('server_protocol','http'),
  ('session.cookie.lifetime','604800'),
  ('session_timeout','15'),
  ('settings_version','3.1.10'),
  ('showHiddenFiles','1'),
  ('show_fullscreen_btn','0'),
  ('show_newresource_btn','0'),
  ('show_picker','0'),
  ('siteunavailable_message_default','?? ?????????????????? ?????????? ???????? ????????????????????.'),
  ('site_id','628360a5e164f'),
  ('site_name','My Evolution Site'),
  ('site_start','1'),
  ('site_status','1'),
  ('site_unavailable_message','<!DOCTYPE html>\n<html>\n<head>\n    <base href=\"/\">\n    <meta charset=\"UTF-8\" />\n    <title>Maintenance!</title>\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\n    <meta http-equiv=\"imagetoolbar\" content=\"no\" />\n    <meta http-equiv=\"Content-language\" content=\"ru\" />\n    <meta http-equiv=\"Cache-Control\" content=\"max-age=3600, must-revalidate\" />\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\n    <meta name=\"description\" content=\"This app on maintenance now\" />\n    <meta name=\"document-state\" content=\"Static\" />\n    <meta name=\"keywords\" content=\"\" />\n    <meta name=\"theme-color\" content=\"#fefefe\" />\n    <meta name=\"msapplication-navbutton-color\" content=\"#fefefe\" />\n    <meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />\n    <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black-translucent\">\n    <meta name=\"robots\" content=\"noindex, nofollow\" />\n    <meta name=\"googlebot\" content=\"NOODP\" />\n    <style type=\"text/css\">\n        @import url(\'@import url(\'https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700&subset=cyrillic-ext,latin-ext\');\');\n\n        * {\n            user-select: none;\n            font-family: \'PT Sans\', sans-serif;\n        }\n\n        button,\n        hr,\n        input {\n            overflow: visible;\n        }\n\n        audio,\n        canvas,\n        progress,\n        video {\n            display: inline-block;\n        }\n\n        progress,\n        sub,\n        sup {\n            vertical-align: baseline;\n        }\n\n        [type=checkbox],\n        [type=radio],\n        legend {\n            box-sizing: border-box;\n            padding: 0;\n        }\n\n        html {\n            font-family: sans-serif;\n            line-height: 1.15;\n            -ms-text-size-adjust: 100%;\n            -webkit-text-size-adjust: 100%;\n        }\n\n        body {\n            margin: 0;\n        }\n\n        article,\n        aside,\n        details,\n        figcaption,\n        figure,\n        footer,\n        header,\n        main,\n        menu,\n        nav,\n        section {\n            display: block;\n        }\n\n        h1 {\n            font-size: 2em;\n            margin: .67em 0;\n        }\n\n        figure {\n            margin: 1em 40px;\n        }\n\n        hr {\n            box-sizing: content-box;\n            height: 0;\n        }\n\n        code,\n        kbd,\n        pre,\n        samp {\n            font-family: monospace, monospace;\n            font-size: 1em;\n        }\n\n        a {\n            background-color: transparent;\n            -webkit-text-decoration-skip: objects;\n        }\n\n        a:active,\n        a:hover {\n            outline-width: 0;\n        }\n\n        abbr[title] {\n            border-bottom: none;\n            text-decoration: underline;\n            text-decoration: underline dotted;\n        }\n\n        b,\n        strong {\n            font-weight: bolder;\n        }\n\n        dfn {\n            font-style: italic;\n        }\n\n        mark {\n            background-color: #ff0;\n            color: #000;\n        }\n\n        small {\n            font-size: 80%;\n        }\n\n        sub,\n        sup {\n            font-size: 75%;\n            line-height: 0;\n            position: relative;\n        }\n\n        sub {\n            bottom: -.25em;\n        }\n\n        sup {\n            top: -.5em;\n        }\n\n        audio:not([controls]) {\n            display: none;\n            height: 0;\n        }\n\n        img {\n            border-style: none;\n        }\n\n        svg:not(:root) {\n            overflow: hidden;\n        }\n\n        button,\n        input,\n        optgroup,\n        select,\n        textarea {\n            font-family: sans-serif;\n            font-size: 100%;\n            line-height: 1.15;\n            margin: 0;\n        }\n\n        button,\n        select {\n            text-transform: none;\n        }\n\n        [type=reset],\n        [type=submit],\n        button,\n        html [type=button] {\n            -webkit-appearance: button;\n        }\n\n        [type=button]::-moz-focus-inner,\n        [type=reset]::-moz-focus-inner,\n        [type=submit]::-moz-focus-inner,\n        button::-moz-focus-inner {\n            border-style: none;\n            padding: 0;\n        }\n\n        [type=button]:-moz-focusring,\n        [type=reset]:-moz-focusring,\n        [type=submit]:-moz-focusring,\n        button:-moz-focusring {\n            outline: ButtonText dotted 1px;\n        }\n\n        fieldset {\n            border: 1px solid silver;\n            margin: 0 2px;\n            padding: .35em .625em .75em;\n        }\n\n        legend {\n            color: inherit;\n            display: table;\n            max-width: 100%;\n            white-space: normal;\n        }\n\n        textarea {\n            overflow: auto;\n        }\n\n        [type=number]::-webkit-inner-spin-button,\n        [type=number]::-webkit-outer-spin-button {\n            height: auto;\n        }\n\n        [type=search] {\n            -webkit-appearance: textfield;\n            outline-offset: -2px;\n        }\n\n        [type=search]::-webkit-search-cancel-button,\n        [type=search]::-webkit-search-decoration {\n            -webkit-appearance: none;\n        }\n\n        ::-webkit-file-upload-button {\n            -webkit-appearance: button;\n            font: inherit;\n        }\n\n        summary {\n            display: list-item;\n        }\n\n        [hidden],\n        template {\n            display: none;\n        }\n\n        html {\n            background: #eee;\n        }\n\n        body {\n            font-size: 14px;\n            color: #333;\n            text-shadow: 0 1px 0 #fff;\n        }\n\n        main {\n            position: relative;\n            display: block;\n            box-sizing: border-box;\n            padding: 40px;\n            width: 300px;\n            margin: 10% auto 0;\n            text-align: center;\n            background: #fff;\n            background: linear-gradient(to top, #fefefe, #fff);\n            text-align: left;\n            border: 1px solid #ddd;\n            border-bottom-width: 5px;\n            box-shadow: 0 2px 25px rgba(0, 0, 0, .05);\n            border-radius: 3px;\n            overflow: hidden;\n        }\n\n        h1 {\n            margin: 0;\n            font-size: 24px;\n            line-height: 30px;\n            color: #FFAE00;\n            margin: 0 0 20px;\n        }\n\n        p {\n            padding: 0;\n            margin: 0 0 20px;\n            color: #777;\n        }\n\n        h1+p {\n            position: relative;\n        }\n\n        hr {\n            display: block;\n            clear: both;\n            width: 70px;\n            height: 5px;\n            margin: 30px 0;\n            background: #FFAE00;\n            border: none;\n        }\n\n        input,\n        button {\n            display: inline-block;\n            margin: 0 5px;\n            padding: 10px;\n            line-height: 30px;\n            border: 1px solid #ccc;\n        }\n\n        .highlighted {\n            position: relative;\n            overflow: visible;\n            background: #efefef;\n            background: linear-gradient(to top, #efefef, #fff);\n            color: #333;\n            text-shadow: 0 1px 0 #fff;\n        }\n\n        .highlighted:before,\n        .highlighted:after {\n            content: \'\';\n            position: absolute;\n            left: -3px;\n            top: -3px;\n            background: linear-gradient(45deg, #FFAE00, #ffda8c, #FFAE00, #ffe3a8, #FFAE00, #fbad06,\n                    #FFAE00, #ffda8c, #ffe3a8, #FFAE00);\n            background-size: 400%;\n            width: calc(100% + 6px);\n            height: calc(100% + 11px);\n            z-index: -1;\n            animation: steam 20s linear infinite;\n        }\n\n        .highlighted:after {\n            filter: blur(10px);\n            opacity: .2;\n        }\n\n        @keyframes steam {\n            0% {\n                background-position: 0 0;\n            }\n\n            50% {\n                background-position: 400% 0;\n            }\n\n            100% {\n                background-position: 0 0;\n            }\n        }\n\n        .ui-progressbar {\n            position: relative;\n            display: inline-block;\n            min-width: 100%;\n            clear: both;\n            height: 5px;\n            background: #efefef;\n            border: none;\n            border-bottom: 1px solid #ccc;\n            overflow: hidden;\n            box-shadow: inset 0 0 0 1px #ddd, 0 1px 3px rgba(0, 0, 0, .05);\n        }\n\n        .ui-progressbar>.indicator {\n            display: block;\n            height: 100%;\n            width: 0%;\n            clear: both;\n            background: #FFAE00;\n        }\n\n        .ui-progressbar>.indicator:before {\n            content: \'\';\n            position: absolute;\n            background: #FFAE00;\n            top: 0;\n            left: 0;\n            bottom: 0;\n            will-change: left, right;\n            animation: indeterminate 2s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;\n        }\n\n        .ui-progressbar>.indicator:after {\n            content: \'\';\n            position: absolute;\n            background: #FFAE00;\n            top: 0;\n            left: 0;\n            bottom: 0;\n            will-change: left, right;\n            animation: indeterminate-short 2s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;\n            animation-delay: 1.15s;\n        }\n\n        @keyframes indeterminate {\n            0% {\n                left: -35%;\n                right: 100%;\n            }\n\n            60% {\n                left: 100%;\n                right: -90%;\n            }\n\n            100% {\n                left: 100%;\n                right: -90%;\n            }\n        }\n\n    </style>\n</head>\n\n<body>\n    <main>\n        <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"70px\" height=\"70px\" viewBox=\"0 0 70 70\" xml:space=\"preserve\">\n            <g id=\"alert\">\n                <polygon fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#FFAE00\" points=\"35,5.021 0.384,64.978 69.615,64.978\" />\n                <rect x=\"31.531\" y=\"49.436\" fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#FFFFFF\" width=\"6.938\" height=\"6.938\" />\n                <polygon fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#FFFFFF\" points=\"31.531,25.651 38.469,25.651 37.478,45.472 32.523,45.472\" />\n            </g>\n        </svg>\n        <hr />\n        <h1>Installing updates</h1>\n        <p>We are currently maintenance our web app.</p>\n        <p>This should take a few hours, so please check back soon.</p>\n    </main>\n</body>\n\n</html>'),
  ('site_unavailable_page',''),
  ('smtp_auth','0'),
  ('smtp_autotls','0'),
  ('smtp_host','smtp.example.com'),
  ('smtp_port','25'),
  ('smtp_secure','none'),
  ('smtp_username','emailsender'),
  ('strip_image_paths','1'),
  ('system_email_webreminder_default','????????????????????????, [+uid+]!\n\n?????????? ???????????????????????? ?????? ?????????? ????????????, ?????????????????? ???? ?????????????????? ????????????:\n\n[+surl+]\n\n?????????? ???? ?????????????? ???????????????????????? ?????????????????? ???????????? ?????? ??????????????????????: [+pwd+]\n\n???????? ?????? ???????????? ???????????? ?? ?????? ???? ????????????, ????????????????????, ???????????????????????????? ??????.\n\n?? ??????????????????, ??????????????????????????'),
  ('system_email_websignup_default','????????????????????????, [+uid+]!\n\n???????? ???????????? ?????? ?????????????????????? ???? [+sname+]:\n\n?????? ????????????????????????: [+uid+]\n????????????: [+pwd+]\n\n?????????? ???????????????? ?????????????????????? ???? [+sname+] ([+surl+]), ???? ?????????????? ???????????????? ???????? ????????????.\n\n?? ??????????????????, ??????????????????????????'),
  ('sys_files_checksum','a:4:{s:23:\"/var/www/html/index.php\";s:32:\"599511a98673763d066ea76b9e50fbb0\";s:23:\"/var/www/html/.htaccess\";s:32:\"2b6e47a07d6de80ca08fb7f396469225\";s:31:\"/var/www/html/manager/index.php\";s:32:\"19c60de055d5efeb3fdd9debde124cb7\";s:59:\"/var/www/html//core/config/database/connections/default.php\";s:32:\"ce1c29ab8e530c45a1d73d844207fb53\";}'),
  ('theme_refresher',''),
  ('thumbHeight','150'),
  ('thumbsDir','.thumbs'),
  ('thumbWidth','150'),
  ('tinymce4_blockFormats','Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3'),
  ('tinymce4_custom_buttons1','undo redo | cut copy paste | searchreplace | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | styleselect'),
  ('tinymce4_custom_buttons2','link unlink anchor image media codesample table | hr removeformat | subscript superscript charmap | nonbreaking | visualchars visualblocks print preview fullscreen code formatselect'),
  ('tinymce4_custom_buttons3',''),
  ('tinymce4_custom_buttons4',''),
  ('tinymce4_custom_plugins','advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen spellchecker insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor codesample colorpicker textpattern imagetools paste modxlink youtube'),
  ('tinymce4_element_format','xhtml'),
  ('tinymce4_entermode','p'),
  ('tinymce4_schema','html5'),
  ('tinymce4_skin','lightgray'),
  ('tinymce4_skintheme','inlite'),
  ('tinymce4_template_chunks',''),
  ('tinymce4_template_docs',''),
  ('tinymce4_theme','custom'),
  ('track_visitors','0'),
  ('tree_page_click','27'),
  ('tree_show_protected','0'),
  ('udperms_allowroot','1'),
  ('unauthorized_page','1'),
  ('UpgradeRepository',''),
  ('upload_files','bmp,ico,gif,jpeg,jpg,png,psd,tif,tiff,fla,flv,swf,aac,au,avi,css,cache,doc,docx,gz,gzip,htaccess,htm,html,js,mp3,mp4,mpeg,mpg,ods,odp,odt,pdf,ppt,pptx,rar,tar,tgz,txt,wav,wmv,xls,xlsx,xml,z,zip,JPG,JPEG,PNG,GIF,svg,tpl'),
  ('upload_images','bmp,ico,gif,jpeg,jpg,png,psd,tif,tiff,svg'),
  ('upload_maxsize','10485760'),
  ('upload_media','au,avi,mp3,mp4,mpeg,mpg,wav,wmv'),
  ('use_alias_path','1'),
  ('use_breadcrumbs','1'),
  ('use_browser','1'),
  ('use_captcha','0'),
  ('use_editor','1'),
  ('use_udperms','1'),
  ('validate_referer','1'),
  ('warning_visibility','0'),
  ('webpwdreminder_message','????????????????????????, [+uid+]!\n\n?????????? ???????????????????????? ?????? ?????????? ????????????, ?????????????????? ???? ?????????????????? ????????????:\n\n[+surl+]\n\n?????????? ???? ?????????????? ???????????????????????? ?????????????????? ???????????? ?????? ??????????????????????: [+pwd+]\n\n???????? ?????? ???????????? ???????????? ?? ?????? ???? ????????????, ????????????????????, ???????????????????????????? ??????.\n\n?? ??????????????????, ??????????????????????????'),
  ('websignupemail_message','????????????????????????, [+uid+]!\n\n???????? ???????????? ?????? ?????????????????????? ???? [+sname+]:\n\n?????? ????????????????????????: [+uid+]\n????????????: [+pwd+]\n\n?????????? ???????????????? ?????????????????????? ???? [+sname+] ([+surl+]), ???? ?????????????? ???????????????? ???????? ????????????.\n\n?? ??????????????????, ??????????????????????????'),
  ('which_browser','mcpuk'),
  ('which_editor','TinyMCE4'),
  ('xhtml_urls','0');


# --------------------------------------------------------

#
# Table structure for table `api_user_attributes`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_user_attributes`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_user_attributes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `internalKey` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `mobilephone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `blocked` int NOT NULL DEFAULT '0',
  `blockeduntil` int NOT NULL DEFAULT '0',
  `blockedafter` int NOT NULL DEFAULT '0',
  `logincount` int NOT NULL DEFAULT '0',
  `lastlogin` int NOT NULL DEFAULT '0',
  `thislogin` int NOT NULL DEFAULT '0',
  `failedlogincount` int NOT NULL DEFAULT '0',
  `sessionid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dob` int DEFAULT '0',
  `gender` int NOT NULL DEFAULT '0' COMMENT '0 - unknown, 1 - Male 2 - female',
  `country` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `state` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `zip` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `fax` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'link to photo',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `verified` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `web_user_attributes_internalkey_index` (`internalKey`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_user_attributes`
#

INSERT INTO `api_user_attributes` VALUES
  ('1','1','1',NULL,NULL,NULL,'1','mail@a-sharapov.com','','','0','0','0','17','1659862723','1659862723','0','1','0','0','','','','','','','',NULL,'1652777125','1659862723','1');


# --------------------------------------------------------

#
# Table structure for table `api_user_role_vars`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_user_role_vars`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_user_role_vars` (
  `tmplvarid` int NOT NULL DEFAULT '0',
  `roleid` int NOT NULL DEFAULT '0',
  `rank` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`tmplvarid`,`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_user_roles`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_user_roles`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_user_roles`
#

INSERT INTO `api_user_roles` VALUES
  ('1','Administrator','Site administrators have full access to all functions'),
  ('2','Editor','Limited to managing content'),
  ('3','Publisher','Editor with expanded permissions including manage users, update Elements and site settings');


# --------------------------------------------------------

#
# Table structure for table `api_user_settings`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_user_settings`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_user_settings` (
  `user` int NOT NULL,
  `setting_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`user`,`setting_name`),
  KEY `user_settings_user_index` (`user`),
  KEY `setting_name` (`setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_user_values`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_user_values`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_user_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL DEFAULT '0',
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_values_tmplvarid_userid_unique` (`tmplvarid`,`userid`),
  KEY `user_values_tmplvarid_index` (`tmplvarid`),
  KEY `user_values_userid_index` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `api_users`
#

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `api_users`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

CREATE TABLE `api_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `cachepwd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Store new unconfirmed password',
  `refresh_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valid_to` timestamp NULL DEFAULT NULL,
  `verified_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `web_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Dumping data for table `api_users`
#

INSERT INTO `api_users` VALUES
  ('1','root','$P$Bcr2P4nKJq.jVe2QB9l2DoJGd0VKlJ.','','359d6801110863861162e62247ba7adf707a421c78e68feaf65111dd4c9676db','50f26e59a32ac163e41b2db4936871f2862681ebb5c9340e76591d75dc43c2b1','2022-08-07 19:58:43',NULL);
