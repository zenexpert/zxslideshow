<?php
// -----
// Admin-level initialization script for the ZX Slideshow plugin by ZenExpert.
// Copyright (C) 2023, ZenExpert
//
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

if (!defined('ZX_SLIDESHOW_VERSION')) define('ZX_SLIDESHOW_VERSION', '3.0.0');

// -----
// Only update configuration when an admin is logged in.
//
if (isset($_SESSION['admin_id'])) {

    if (!defined('ZX_SLIDESHOW_STATUS')) {
        $configurationGroupTitle = 'ZX Slideshow';
        $configuration = $db->Execute(
            "SELECT configuration_group_id
           FROM " . TABLE_CONFIGURATION_GROUP . "
          WHERE configuration_group_title = '$configurationGroupTitle'
          LIMIT 1"
        );
        if ($configuration->EOF) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION_GROUP . "
                (configuration_group_title, configuration_group_description, sort_order, visible)
            VALUES
                ('$configurationGroupTitle', '$configurationGroupTitle', '1', '1')"
            );
            $cgi = $db->Insert_ID();
            $db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = $cgi WHERE configuration_group_id = $cgi;");
        } else {
            $cgi = $configuration->fields['configuration_group_id'];
        }

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('ZX Slideshow', 'ZX_SLIDESHOW_STATUS', 'false', 'Activate ZX Slideshow', $cgi, 1, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')"
        );
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Effect', 'ZX_SLIDESHOW_EFFECT', 'fade', 'Effect used for image transition', $cgi, 3, NOW(), NULL, 'zen_cfg_select_option(array(\'slide\', \'fade\', \'cube\', \'coverflow\', \'flip\', \'cards\'),')"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Animation Speed', 'ZX_SLIDESHOW_ANIM_SPEED', '500', 'Duration of transition between slides (in ms)', $cgi, 4, NOW(), NULL, NULL)"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Slides Autoplay', 'ZX_SLIDESHOW_AUTOPLAY', 'true', 'Show Prev/Next navigation arrows only on hover', $cgi, 5, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Pause Time', 'ZX_SLIDESHOW_PAUSE', '5000', 'How long each slide will show in miliseconds (if Autoplay is on)', $cgi, 6, NOW(), NULL, NULL)"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Slideshow Loop', 'ZX_SLIDESHOW_LOOP', 'true', 'Set to true to enable continuous loop mode', $cgi, 7, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Navigation Arrows', 'ZX_SLIDESHOW_NAV', 'true', 'Show Prev/Next navigation arrows', $cgi, 8, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Pagination', 'ZX_SLIDESHOW_PAGINATION', 'true', 'Show pagination bullets', $cgi, 9, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                ( configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function )
             VALUES
                ('Slideshow Direction', 'ZX_SLIDESHOW_DIRECTION', 'horizontal', 'Slides direction', $cgi, 10, NOW(), NULL, 'zen_cfg_select_option(array(\'horizontal\', \'vertical\'),')"
        );

        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, set_function)
             VALUES
                ('ZX Slideshow Version', 'ZX_SLIDESHOW_VERSION', '3.0.0', 'Currently installed version of ZX Slideshow.<br />Module brought to you by <a href=\"https://zenexpert.com\" target=\"_blank\">ZenExpert</a>', $cgi, now(), 100, 'trim(')"
        );

        zen_register_admin_page('configZXSlideshow', 'BOX_CONFIGURATION_ZX_SLIDESHOW', 'FILENAME_CONFIGURATION', "gID=$cgi", 'configuration', 'Y', $cgi);
        zen_register_admin_page('toolsZXSlideshow', 'BOX_TOOLS_ZX_SLIDESHOW', 'FILENAME_ZX_SLIDESHOW', '', 'tools', 'Y');

        if (!$sniffer->table_exists(TABLE_ZX_SLIDESHOW)) {
            $insert_query = "CREATE TABLE " . TABLE_ZX_SLIDESHOW . " (
 `slide_id` int(11) NOT NULL AUTO_INCREMENT,
 `slide_title` varchar(64) NOT NULL DEFAULT '',
 `slide_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
 `slide_url` varchar(255) NOT NULL DEFAULT '',
 `slide_image` varchar(255) NOT NULL DEFAULT '',
 `slide_group` varchar(15) NOT NULL DEFAULT '',
 `expires_date` datetime DEFAULT NULL,
 `date_added` datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
 `date_status_change` datetime DEFAULT NULL,
 `status` int(1) NOT NULL DEFAULT 1,
 `slide_open_new_windows` int(1) NOT NULL DEFAULT 1,
 `slide_sort_order` int(11) NOT NULL DEFAULT 0,
 PRIMARY KEY (`slide_id`),
 KEY `idx_status_group_zen` (`status`,`slide_group`),
 KEY `idx_expires_date_zen` (`expires_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4";

            $db->Execute($insert_query);

        }
        $messageStack->add('ZX Slideshow installed. Please enable it from Configuration->ZX Slideshow Configuration.', 'success');
    }

}
