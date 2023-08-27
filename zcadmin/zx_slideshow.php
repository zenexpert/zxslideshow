<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: ZenExpert 2023 Jan 23 v1.0 $
 */
require 'includes/application_top.php';

$action = (isset($_GET['action']) ? $_GET['action'] : '');
if (isset($_GET['flagslide_enabled'])) {
    $_GET['flagslide_enabled'] = (int)$_GET['flagslide_enabled'];
}
if (isset($_GET['slideID'])) {
    $_GET['slideID'] = (int)$_GET['slideID'];
}
if (isset($_GET['page'])) {
    $_GET['page'] = (int)$_GET['page'];
}

if (!empty($action)) {
    switch ($action) {
        case 'setflag':
            if (($_GET['flagslide_enabled'] == '0') || ($_GET['flagslide_enabled'] == '1')) {
                zx_set_slide_status($_GET['slideID'], $_GET['flagslide_enabled']);

                $messageStack->add_session(SUCCESS_SLIDE_STATUS_UPDATED, 'success');
            } else {
                $messageStack->add_session(ERROR_UNKNOWN_STATUS_FLAG, 'error');
            }

            zen_redirect(zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&slideID=' . $_GET['slideID']));
            break;

        case 'insert': // deprecated
        case 'update': // deprecated
        case 'add':
        case 'upd':
            if (isset($_POST['slide_id'])) {
                $slide_id = (int)$_POST['slide_id'];
            }
            $slide_title = zen_db_prepare_input($_POST['slide_title']);
            $new_slide_group = zen_db_prepare_input($_POST['new_slide_group']);
            $slide_group = (empty($new_slide_group)) ? zen_db_prepare_input($_POST['slide_group']) : $new_slide_group;
            $slide_lead_in = zen_db_prepare_input($_POST['lead_in']);
            $slide_lead_in_effect = zen_db_prepare_input($_POST['lead_in_effect']);
            $slide_lead_in_speed = zen_db_prepare_input($_POST['lead_in_speed']);
            $slide_lead_in_delay = zen_db_prepare_input($_POST['lead_in_delay']);
            $slide_lead_in_position = zen_db_prepare_input($_POST['lead_in_position']);
            $slide_lead_in_size = zen_db_prepare_input($_POST['lead_in_size']);
            $slide_lead_in_color = zen_db_prepare_input($_POST['lead_in_color']);
            $slide_lead_in_vertical = zen_db_prepare_input($_POST['lead_in_vertical']);
            $slide_top_title = zen_db_prepare_input($_POST['top_title']);
            $slide_top_title_effect = zen_db_prepare_input($_POST['top_title_effect']);
            $slide_top_title_speed = zen_db_prepare_input($_POST['top_title_speed']);
            $slide_top_title_delay = zen_db_prepare_input($_POST['top_title_delay']);
            $slide_top_title_position = zen_db_prepare_input($_POST['top_title_position']);
            $slide_top_title_size = zen_db_prepare_input($_POST['top_title_size']);
            $slide_top_title_color = zen_db_prepare_input($_POST['top_title_color']);
            $slide_top_title_vertical = zen_db_prepare_input($_POST['top_title_vertical']);
            $slide_subtitle = zen_db_prepare_input($_POST['subtitle']);
            $slide_subtitle_effect = zen_db_prepare_input($_POST['subtitle_effect']);
            $slide_subtitle_speed = zen_db_prepare_input($_POST['subtitle_speed']);
            $slide_subtitle_delay = zen_db_prepare_input($_POST['subtitle_delay']);
            $slide_subtitle_position = zen_db_prepare_input($_POST['subtitle_position']);
            $slide_subtitle_size = zen_db_prepare_input($_POST['subtitle_size']);
            $slide_subtitle_color = zen_db_prepare_input($_POST['subtitle_color']);
            $slide_subtitle_vertical = zen_db_prepare_input($_POST['subtitle_vertical']);
            $slide_text = zen_db_prepare_input($_POST['slide_text']);
            $slide_text_effect = zen_db_prepare_input($_POST['text_effect']);
            $slide_text_speed = zen_db_prepare_input($_POST['text_speed']);
            $slide_text_delay = zen_db_prepare_input($_POST['text_delay']);
            $slide_text_position = zen_db_prepare_input($_POST['text_position']);
            $slide_text_size = zen_db_prepare_input($_POST['text_size']);
            $slide_text_color = zen_db_prepare_input($_POST['text_color']);
            $slide_text_vertical = zen_db_prepare_input($_POST['text_vertical']);
            $button_text = zen_db_prepare_input($_POST['button_text']);
            $button_effect = zen_db_prepare_input($_POST['button_effect']);
            $button_speed = zen_db_prepare_input($_POST['button_speed']);
            $button_delay = zen_db_prepare_input($_POST['button_delay']);
            $button_position = zen_db_prepare_input($_POST['button_position']);
            $button_size = zen_db_prepare_input($_POST['button_size']);
            $button_color = zen_db_prepare_input($_POST['button_color']);
            $button_color_bg = zen_db_prepare_input($_POST['button_color_bg']);
            $button_vertical = zen_db_prepare_input($_POST['button_vertical']);
            $slide_data_array = [
                'slide_lead_in' => $slide_lead_in,
                'slide_lead_in_effect' => $slide_lead_in_effect,
                'slide_lead_in_speed' => $slide_lead_in_speed,
                'slide_lead_in_delay' => $slide_lead_in_delay,
                'slide_lead_in_position' => $slide_lead_in_position,
                'slide_lead_in_size' => $slide_lead_in_size,
                'slide_lead_in_color' => $slide_lead_in_color,
                'slide_lead_in_vertical' => $slide_lead_in_vertical,
                'slide_top_title' => $slide_top_title,
                'slide_top_title_effect' => $slide_top_title_effect,
                'slide_top_title_speed' => $slide_top_title_speed,
                'slide_top_title_delay' => $slide_top_title_delay,
                'slide_top_title_position' => $slide_top_title_position,
                'slide_top_title_size' => $slide_top_title_size,
                'slide_top_title_color' => $slide_top_title_color,
                'slide_top_title_vertical' => $slide_top_title_vertical,
                'slide_subtitle' => $slide_subtitle,
                'slide_subtitle_effect' => $slide_subtitle_effect,
                'slide_subtitle_speed' => $slide_subtitle_speed,
                'slide_subtitle_delay' => $slide_subtitle_delay,
                'slide_subtitle_position' => $slide_subtitle_position,
                'slide_subtitle_size' => $slide_subtitle_size,
                'slide_subtitle_color' => $slide_subtitle_color,
                'slide_subtitle_vertical' => $slide_subtitle_vertical,
                'slide_text' => $slide_text,
                'slide_text_effect' => $slide_text_effect,
                'slide_text_speed' => $slide_text_speed,
                'slide_text_delay' => $slide_text_delay,
                'slide_text_position' => $slide_text_position,
                'slide_text_size' => $slide_text_size,
                'slide_text_color' => $slide_text_color,
                'slide_text_vertical' => $slide_text_vertical,
                'button_text' => $button_text,
                'button_effect' => $button_effect,
                'button_speed' => $button_speed,
                'button_delay' => $button_delay,
                'button_position' => $button_position,
                'button_size' => $button_size,
                'button_color' => $button_color,
                'button_color_bg' => $button_color_bg,
                'button_vertical' => $button_vertical,
            ];
            $slide_data = json_encode($slide_data_array);
            $slide_image_local = zen_db_prepare_input($_POST['slide_image_local']);
            $slide_image_target = zen_db_prepare_input($_POST['slide_image_target']);
            $db_image_location = '';
            $expires_date_raw = zen_db_prepare_input($_POST['expires_date']);
            if (DATE_FORMAT_DATE_PICKER != 'yy-mm-dd' && !empty($expires_date_raw)) {
                $local_fmt = zen_datepicker_format_fordate();
                $dt = DateTime::createFromFormat($local_fmt, $expires_date_raw);
                $expires_date_raw = 'null';
                if (!empty($dt)) {
                    $expires_date_raw = $dt->format('Y-m-d');
                }
            }
            $expires_date = (date('Y-m-d') < $expires_date_raw) ? $expires_date_raw : 'null';
            $status = (int)$_POST['status'];
            $slide_url = zen_db_prepare_input($_POST['slide_url']);
            $slide_open_new_windows = (int)$_POST['slide_open_new_windows'];
            $slide_sort_order = (int)$_POST['slide_sort_order'];

            $slide_error = false;
            if (empty($slide_title)) {
                $messageStack->add(ERROR_SLIDE_TITLE_REQUIRED, 'error');
                $slide_error = true;
            }

            if (empty($slide_group)) {
                $messageStack->add(ERROR_SLIDE_GROUP_REQUIRED, 'error');
                $slide_error = true;
            }

            if (empty($slide_image_local)) {
                $slide_image = new upload('slide_image');
                $slide_image->set_extensions(['jpg', 'jpeg', 'gif', 'png', 'webp', 'flv', 'webm', 'ogg']);
                $slide_image->set_destination(DIR_FS_CATALOG_IMAGES . $slide_image_target);
                if (($slide_image->parse() == false) || ($slide_image->save() == false)) {
                    $messageStack->add(ERROR_SLIDE_IMAGE_REQUIRED, 'error');
                    $slide_error = true;
                }
            }

            if ($slide_error == false) {
                $db_image_location = (zen_not_null($slide_image_local) || !isset($slide_image)) ? $slide_image_local : $slide_image_target . $slide_image->filename;
                $db_image_location = zen_limit_image_filename($db_image_location, TABLE_ZX_SLIDESHOW, 'slide_image');
                $slide_url = zen_limit_image_filename($slide_url, TABLE_ZX_SLIDESHOW, 'slide_url');

                $sql_data_array = [
                    'slide_title' => $slide_title,
                    'slide_data' => $slide_data,
                    'slide_url' => $slide_url,
                    'slide_image' => $db_image_location,
                    'slide_group' => $slide_group,
                    'status' => $status,
                    'slide_open_new_windows' => $slide_open_new_windows,
                    'slide_sort_order' => (int)$slide_sort_order,
                ];

                if ($action == 'add') {
                    $insert_sql_data = [
                        'date_added' => 'now()',
                        'status' => '1',
                    ];

                    $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

                    zen_db_perform(TABLE_ZX_SLIDESHOW, $sql_data_array);

                    $slide_id = zen_db_insert_id();

                    $messageStack->add_session(SUCCESS_SLIDE_INSERTED, 'success');
                } elseif ($action == 'upd') {
                    zen_db_perform(TABLE_ZX_SLIDESHOW, $sql_data_array, 'update', "slide_id = " . (int)$slide_id);

                    $messageStack->add_session(SUCCESS_SLIDE_UPDATED, 'success');
                }

// NOTE: status will be reset by the /functions/banner.php
// build new update sql for date_scheduled, expires_date and expires_impressions

                if (!empty($expires_date)) {
                    $sql = "UPDATE " . TABLE_ZX_SLIDESHOW . "
                SET expires_date = DATE_ADD(:expiresDate, INTERVAL '23:59:59' HOUR_SECOND)
                WHERE slide_id = :slideID";
                    $sql = $db->bindVars($sql, ':expiresDate', $expires_date, 'date');
                    $sql = $db->bindVars($sql, ':slideID', $slide_id, 'integer');
                    $db->Execute($sql);
                }

                zen_redirect(zen_href_link(FILENAME_ZX_SLIDESHOW, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'sID=' . $slide_id));
            } else {
                $action = 'new';
            }
            break;
        case 'deleteconfirm':
            $slide_id = zen_db_prepare_input($_POST['sID']);

            if (isset($_POST['delete_image']) && ($_POST['delete_image'] == 'on')) {
                $banner = $db->Execute("SELECT slide_image
                                FROM " . TABLE_ZX_SLIDESHOW . "
                                WHERE slide_id = " . (int)$slide_id);

                if (is_file(DIR_FS_CATALOG_IMAGES . $banner->fields['slide_image'])) {
                    if (is_writeable(DIR_FS_CATALOG_IMAGES . $banner->fields['slide_image'])) {
                        unlink(DIR_FS_CATALOG_IMAGES . $banner->fields['slide_image']);
                    } else {
                        $messageStack->add_session(ERROR_IMAGE_IS_NOT_WRITEABLE, 'error');
                    }
                } else {
                    $messageStack->add_session(ERROR_IMAGE_DOES_NOT_EXIST, 'error');
                }
            }

            $db->Execute("DELETE FROM " . TABLE_ZX_SLIDESHOW . "
                    WHERE slide_id = " . (int)$slide_id);

            $messageStack->add_session(SUCCESS_SLIDE_REMOVED, 'success');

            zen_redirect(zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page']));
            break;
    }
}
?>
    <!doctype html>
    <html <?php echo HTML_PARAMS; ?>>
    <head>
        <?php require DIR_WS_INCLUDES . 'admin_html_head.php'; ?>

        <?php if ($editor_handler != '') include($editor_handler); ?>

    </head>
    <body>
    <div id="spiffycalendar" class="text"></div>
    <!-- header //-->
    <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
    <!-- header_eof //-->

    <!-- body //-->
    <div class="container-fluid">
        <h1><?php echo HEADING_TITLE; ?></h1>
        <!-- body_text //-->
        <?php if ($action == '') { ?>
            <div class="row">
                <table class="table-condensed">
                    <tr>
                        <td class="text-right"><?php echo TEXT_LEGEND; ?></td>
                        <td class="text-center"><?php echo TABLE_HEADING_STATUS; ?></td>
                        <td class="text-center"><?php echo TEXT_LEGEND_SLIDE_OPEN_NEW_WINDOWS; ?></td>

                    </tr>
                    <tr>
                        <td class="text-right"></td>
                        <td class="text-center">
                            <i class="fa fa-square fa-2x txt-status-on align-middle" aria-hidden="true"
                               title="<?php echo IMAGE_ICON_STATUS_ON; ?>"></i>&nbsp;<i
                                class="fa fa-square fa-2x txt-status-off align-middle" aria-hidden="true"
                                title="<?php echo IMAGE_ICON_STATUS_OFF; ?>"></i>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-square fa-2x txt-orange align-middle" aria-hidden="true"
                               title="<?php echo IMAGE_ICON_SLIDE_OPEN_NEW_WINDOWS_ON; ?>"></i>&nbsp;
                            <span class="fa-stack" title="<?php echo IMAGE_ICON_SLIDE_OPEN_NEW_WINDOWS_OFF; ?>">
                  <i class="fa fa-square fa-stack-2x opacity-25 txt-orange align-middle" aria-hidden="true"></i>
                  <i class="fa fa-times fa-stack-1x txt-red" aria-hidden="true"></i>
                </span>
                        </td>

                    </tr>
                </table>
            </div>
        <?php } // legend ?>
        <?php
        if ($action == 'new') {
            $form_action = 'add';

            $parameters = [
                'expires_date' => '',
                'date_scheduled' => '',
                'slide_title' => '',
                'slide_url' => '',
                'slide_group' => '',
                'slide_image' => '',
                'slide_data' => '',
                'status' => 1,
            ];

            $sInfo = new objectInfo($parameters);

            if (isset($_GET['sID'])) {
                $form_action = 'upd';

                $sID = zen_db_prepare_input($_GET['sID']);

                $slide = $db->Execute("SELECT slide_title, slide_url, slide_image, slide_group,
                                         slide_data, status,
                                         date_format(expires_date, '" . zen_datepicker_format_forsql() . "') AS expires_date,
                                         date_status_change, slide_open_new_windows, slide_sort_order
                                  FROM " . TABLE_ZX_SLIDESHOW . "
                                  WHERE slide_id = " . (int)$sID);

                $sInfo->updateObjectInfo($slide->fields);
            } elseif (!empty($_POST)) {
                $sInfo->updateObjectInfo($_POST);
            }

            $groups_array = array();
            $groups = $db->Execute("SELECT DISTINCT slide_group
                                FROM " . TABLE_ZX_SLIDESHOW . "
                                ORDER BY slide_group");
            foreach ($groups as $group) {
                $groups_array[] = [
                    'id' => $group['slide_group'],
                    'text' => $group['slide_group'],
                ];
            }
            $slide_data = json_decode($sInfo->slide_data, true);


            ?>
            <div class="row">
                <div class="col-xs-12 col-md-9">
                <?php
                echo zen_draw_form('new_banner', FILENAME_ZX_SLIDESHOW, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'action=' . $form_action, 'post', 'enctype="multipart/form-data" class="form-horizontal"');
                if ($form_action == 'upd') {
                    echo zen_draw_hidden_field('slide_id', $sID);
                }
                ?>
                <div class="form-group">
                    <div class="col-sm-3">
                        <p class="control-label"><?php echo TEXT_SLIDE_STATUS; ?></p>
                    </div>
                    <div class="col-sm-9 col-md-9">
                        <label
                            class="radio-inline"><?php echo zen_draw_radio_field('status', '1', $sInfo->status == 1) . TEXT_SLIDE_ACTIVE; ?></label>
                        <label
                            class="radio-inline"><?php echo zen_draw_radio_field('status', '0', $sInfo->status == 0) . TEXT_SLIDE_NOT_ACTIVE; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <p class="control-label"><?php echo TEXT_SLIDE_OPEN_NEW_WINDOWS; ?></p>
                    </div>
                    <div class="col-sm-9 col-md-9">
                        <label
                            class="radio-inline"><?php echo zen_draw_radio_field('slide_open_new_windows', '1', $sInfo->slide_open_new_windows == 1) . TEXT_YES; ?></label>
                        <label
                            class="radio-inline"><?php echo zen_draw_radio_field('slide_open_new_windows', '0', $sInfo->slide_open_new_windows == 0) . TEXT_NO; ?></label><br>
                        <span class="help-block"><?php echo TEXT_INFO_SLIDE_OPEN_NEW_WINDOWS; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_TITLE, 'slide_title', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('slide_title', htmlspecialchars($sInfo->slide_title, ENT_COMPAT, CHARSET, TRUE), zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_title"', true); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_LEAD_IN, 'slide_lead_in', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('lead_in', htmlspecialchars($slide_data['slide_lead_in'] ?? '', ENT_COMPAT, CHARSET, TRUE), zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_lead_in"'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9 col-md-9 col-md-offset-3">
                        <div class="col-sm-12 col-md-4">
                            <label>Effect</label>
                            <?php echo zx_slideshow_menu('lead_in_effect', 'grouped', 'effects', $slide_data['slide_lead_in_effect'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Speed</label>
                            <?php echo zx_slideshow_menu('lead_in_speed', 'regular', 'speed', $slide_data['slide_lead_in_speed'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Delay</label>
                            <?php echo zx_slideshow_menu('lead_in_delay', 'regular', 'delay', $slide_data['slide_lead_in_delay'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Position</label>
                            <?php echo zx_slideshow_menu('lead_in_position', 'regular', 'position', $slide_data['slide_lead_in_position'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Size (rem)</label>
                            <?php echo zen_draw_input_field('lead_in_size', $slide_data['slide_lead_in_size'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_lead_in_size"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Color</label>
                            <?php echo zen_draw_input_field('lead_in_color', $slide_data['slide_lead_in_color'] ?? '', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_lead_in_color"', false, 'color'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Vertical</label>
                            <?php echo zen_draw_input_field('lead_in_vertical', $slide_data['slide_lead_in_vertical'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_lead_in_vertical"'); ?>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_TOP_TITLE, 'slide_top_title', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('top_title', htmlspecialchars($slide_data['slide_top_title'] ?? '', ENT_COMPAT, CHARSET, TRUE), zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_top_title"'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9 col-md-9 col-md-offset-3">
                        <div class="col-sm-12 col-md-4">
                            <label>Effect</label>
                            <?php echo zx_slideshow_menu('top_title_effect', 'grouped', 'effects', $slide_data['slide_top_title_effect'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Speed</label>
                            <?php echo zx_slideshow_menu('top_title_speed', 'regular', 'speed', $slide_data['slide_top_title_speed'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Delay</label>
                            <?php echo zx_slideshow_menu('top_title_delay', 'regular', 'delay', $slide_data['slide_top_title_delay'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Position</label>
                            <?php echo zx_slideshow_menu('top_title_position', 'regular', 'position', $slide_data['slide_top_title_position'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Size (rem)</label>
                            <?php echo zen_draw_input_field('top_title_size', $slide_data['slide_top_title_size'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_top_title_size"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Color</label>
                            <?php echo zen_draw_input_field('top_title_color', $slide_data['slide_top_title_color'] ?? '', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_top_title_color"', false, 'color'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Vertical</label>
                            <?php echo zen_draw_input_field('top_title_vertical', $slide_data['slide_top_title_vertical'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_top_title_vertical"'); ?>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_SUBTITLE, 'slide_subtitle', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('subtitle', htmlspecialchars($slide_data['slide_subtitle'] ?? '', ENT_COMPAT, CHARSET, TRUE), zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_subtitle"'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9 col-md-9 col-md-offset-3">
                        <div class="col-sm-12 col-md-4">
                            <label>Effect</label>
                            <?php echo zx_slideshow_menu('subtitle_effect', 'grouped', 'effects', $slide_data['slide_subtitle_effect'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Speed</label>
                            <?php echo zx_slideshow_menu('subtitle_speed', 'regular', 'speed', $slide_data['slide_subtitle_speed'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Delay</label>
                            <?php echo zx_slideshow_menu('subtitle_delay', 'regular', 'delay', $slide_data['slide_subtitle_delay'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Position</label>
                            <?php echo zx_slideshow_menu('subtitle_position', 'regular', 'position', $slide_data['slide_subtitle_position'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Size (rem)</label>
                            <?php echo zen_draw_input_field('subtitle_size', $slide_data['slide_subtitle_size'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_subtitle_size"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Color</label>
                            <?php echo zen_draw_input_field('subtitle_color', $slide_data['slide_subtitle_color'] ?? '', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_subtitle_color"', false, 'color'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Vertical</label>
                            <?php echo zen_draw_input_field('subtitle_vertical', $slide_data['slide_subtitle_vertical'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_subtitle_vertical"'); ?>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_TEXT, 'slide_text', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_textarea_field('slide_text', 'soft', '80', '10', htmlspecialchars($slide_data['slide_text'] ?? '', ENT_COMPAT, CHARSET, TRUE), 'class="form-control" id="slide_text"'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9 col-md-9 col-md-offset-3">
                        <div class="col-sm-12 col-md-4">
                            <label>Effect</label>
                            <?php echo zx_slideshow_menu('text_effect', 'grouped', 'effects', $slide_data['slide_text_effect'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Speed</label>
                            <?php echo zx_slideshow_menu('text_speed', 'regular', 'speed', $slide_data['slide_text_speed'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Delay</label>
                            <?php echo zx_slideshow_menu('text_delay', 'regular', 'delay', $slide_data['slide_text_delay'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Position</label>
                            <?php echo zx_slideshow_menu('text_position', 'regular', 'position', $slide_data['slide_text_position'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Size (rem)</label>
                            <?php echo zen_draw_input_field('text_size', $slide_data['slide_text_size'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_text_size"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Color</label>
                            <?php echo zen_draw_input_field('text_color', $slide_data['slide_text_color'] ?? '', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_text_color"', false, 'color'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Vertical</label>
                            <?php echo zen_draw_input_field('text_vertical', $slide_data['slide_text_vertical'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="slide_text_vertical"'); ?>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_BUTTON, 'button_text', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('button_text', htmlspecialchars($slide_data['button_text'] ?? '', ENT_COMPAT, CHARSET, TRUE), zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="button_text"'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9 col-md-9 col-md-offset-3">
                        <div class="col-sm-12 col-md-4">
                            <label>Effect</label>
                            <?php echo zx_slideshow_menu('button_effect', 'grouped', 'effects', $slide_data['button_effect'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Speed</label>
                            <?php echo zx_slideshow_menu('button_speed', 'regular', 'speed', $slide_data['button_speed'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label>Delay</label>
                            <?php echo zx_slideshow_menu('button_delay', 'regular', 'delay', $slide_data['button_delay'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Position</label>
                            <?php echo zx_slideshow_menu('button_position', 'regular', 'position', $slide_data['button_position'] ?? '', 'class="form-control"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Size (rem)</label>
                            <?php echo zen_draw_input_field('button_size', $slide_data['button_size'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="button_size"'); ?>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="col-xs-6">
                                <label>Color</label>
                                <?php echo zen_draw_input_field('button_color', $slide_data['button_color'] ?? '', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="button_color"', false, 'color'); ?>
                            </div>
                            <div class="col-xs-6">
                                <label>Background</label>
                                <?php echo zen_draw_input_field('button_color_bg', $slide_data['button_color_bg'] ?? '', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="button_color_bg"', false, 'color'); ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label>Vertical</label>
                            <?php echo zen_draw_input_field('button_vertical', $slide_data['button_vertical'] ?? '0', zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_title') . ' class="form-control" id="button_vertical"'); ?>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_URL, 'slide_url', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('slide_url', $sInfo->slide_url, zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_url') . ' class="form-control" id="slide_url"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_GROUP, 'slide_group', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_pull_down_menu('slide_group', $groups_array, $sInfo->slide_group, 'class="form-control" id="slide_group"'); ?>
                        <br>
                        <p><?php echo TEXT_SLIDE_NEW_GROUP; ?></p><?php echo zen_draw_input_field('new_slide_group', '', 'class="form-control" id="new_slide_group"', ((count($groups_array) > 0) ? false : true)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_IMAGE, 'slide_image', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_file_field('slide_image', '', 'class="form-control" id="slide_image"'); ?>
                        <p><?php echo TEXT_SLIDE_IMAGE_LOCAL; ?></p>
                        <p><?php echo DIR_FS_CATALOG_IMAGES; ?></p>
                        <?php echo zen_draw_input_field('slide_image_local', (isset($sInfo->slide_image) ? $sInfo->slide_image : ''), zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_image') . ' class="form-control"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_IMAGE_TARGET, 'slide_image_target', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo zen_draw_input_field('slide_image_target', '', 'class="form-control" id="slide_image_target"'); ?>
                        <span class="help-block"><?php echo DIR_FS_CATALOG_IMAGES; ?></span>
                        <div>
                            <?php echo TEXT_SLIDE_IMAGE_TARGET_INFO; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_ALL_SORT_ORDER, 'slide_sort_order', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <?php echo TEXT_SLIDE_ALL_SORT_ORDER_INFO . '<br>' . zen_draw_input_field('slide_sort_order', $sInfo->slide_sort_order, zen_set_field_length(TABLE_ZX_SLIDESHOW, 'slide_sort_order') . ' class="form-control" id="slide_sort_order"'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo zen_draw_label(TEXT_SLIDE_EXPIRES_ON, 'expires_date', 'class="col-sm-3 control-label"'); ?>
                    <div class="col-sm-9 col-md-9">
                        <div class="date input-group" id="datepicker_expires_date">
                <span class="input-group-addon datepicker_icon">
                  <i class="fa fa-calendar fa-lg"></i>
                </span>
                            <?php echo zen_draw_input_field('expires_date', $sInfo->expires_date, 'class="form-control" id="expires_date" autocomplete="off"'); ?>
                        </div>
                        <span class="help-block errorText">(<?php echo zen_datepicker_format_full(); ?>)</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit"
                                class="btn btn-primary"><?php echo(($form_action == 'add') ? IMAGE_INSERT : IMAGE_UPDATE); ?></button>
                        <a href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . (isset($_GET['sID']) ? 'sID=' . (int)$_GET['sID'] : '')); ?>"
                           class="btn btn-default" role="button"><?php echo IMAGE_CANCEL; ?></a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 col-md-9">
                        <?php echo TEXT_SLIDE_SLIDE_NOTE . '<br>' . TEXT_SLIDE_INSERT_NOTE . '<br>' . TEXT_SLIDE_EXPIRY_NOTE . '<br>'; ?>
                    </div>
                </div>
                <?php echo '</form>'; ?>
            </div>
                <div class="col-xs-12 col-md-3" style="position: sticky; top: 0;">
                    <h4>Legend</h4>
                    <strong>Effect</strong>
                    <p>All effects are powered by Animate.css and you can see the demo for each effect on the <a href="https://animate.style/" target="blank">official website</a>.</p>
                    <br>
                    <strong>Speed</strong>
                    <p>Refers to animate-duration (default set to 1s). Slow = 2s, Slower = 3s, Fast = 800ms, Faster = 500ms</p>
                    <br>
                    <strong>Delay</strong>
                    <p>Allows you to set a delay before the animation begins.</p>
                    <br>
                    <strong>Size (rem)</strong>
                    <p>Allows you to set the font size of the element (in rem). You can find more information about rem <a href="https://www.sitepoint.com/understanding-and-using-rem-units-in-css/" target="_blank">here</a>.<br>Leave blank or 0 to use default value set in css file.</p>
                    <br>
                    <strong>Vertical</strong>
                    <p>Allows you to position the element vertically using absolute positioning. You can set the percentage of distance from top. Use 1-99 to set your custom position. Leave blank or 0 to use default value set in css file.</p>
                    <br>
                    <strong>Slide Group</strong>
                    <p>For home page, set the group to 'home'.</p>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 configurationColumnLeft">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr class="dataTableHeadingRow">
                            <th class="dataTableHeadingContent"><?php echo TABLE_HEADING_SLIDES; ?></th>
                            <th class="dataTableHeadingContent text-right"><?php echo TABLE_HEADING_GROUPS; ?></th>
                            <th class="dataTableHeadingContent text-center"><?php echo TABLE_HEADING_STATUS; ?></th>
                            <th class="dataTableHeadingContent text-center"><?php echo TABLE_HEADING_SLIDE_OPEN_NEW_WINDOWS; ?></th>

                            <th class="dataTableHeadingContent text-right"><?php echo TABLE_HEADING_SLIDE_SORT_ORDER; ?></th>
                            <th class="dataTableHeadingContent text-right"><?php echo TABLE_HEADING_ACTION; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $slide_query_raw = "SELECT slide_id, slide_title, slide_data, slide_image, slide_group, status,
                                             expires_date, date_status_change,
                                             date_added, slide_open_new_windows, slide_sort_order
                                      FROM " . TABLE_ZX_SLIDESHOW . "
                                      ORDER BY slide_title, slide_group";
                        // Split Page
                        // reset page when page is unknown
                        if ((empty($_GET['page']) || $_GET['page'] == '1') && !empty($_GET['sID'])) {
                            $check_page = $db->Execute($slide_query_raw);
                            $check_count = 0;
                            if ($check_page->RecordCount() > MAX_DISPLAY_SEARCH_RESULTS) {
                                foreach ($check_page as $item) {
                                    if ($item['slide_id'] == (int)$_GET['sID']) {
                                        break;
                                    }
                                    $check_count++;
                                }
                                $_GET['page'] = round((($check_count / MAX_DISPLAY_SEARCH_RESULTS) + (fmod_round($check_count, MAX_DISPLAY_SEARCH_RESULTS) != 0 ? .5 : 0)), 0);
                            } else {
                                $_GET['page'] = 1;
                            }
                        }
                        $slide_split = new splitPageResults($_GET['page'], MAX_DISPLAY_SEARCH_RESULTS, $slide_query_raw, $slide_query_numrows);
                        $slides = $db->Execute($slide_query_raw);
                        foreach ($slides as $slide) {
                            if ((empty($_GET['sID']) || $_GET['sID'] == $slide['slide_id']) && empty($sInfo) && substr($action, 0, 3) != 'new') {
                                $sInfo = new objectInfo($slide);
                            }

                            if (isset($sInfo) && is_object($sInfo) && ($slide['slide_id'] == $sInfo->slide_id)) {
                                ?>
                                <tr id="defaultSelected" class="dataTableRowSelected" onclick="document.location.href = '<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $sInfo->slide_id . '&action=new'); ?>'" role="button">
                                <?php
                            } else {
                                ?>
                                <tr class="dataTableRow" onclick="document.location.href = '<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $slide['slide_id']); ?>'" role="button">
                                <?php
                            }
                            ?>
                            <td class="dataTableContent">
                                <a href="javascript:popupImageWindow('<?php echo zen_href_link(FILENAME_POPUP_IMAGE, 'banner=' . $slide['slide_id']); ?>')"
                                   title="View Banner"><i class="fa fa-window-restore fa-lg txt-black"
                                                          aria-hidden="true"></i></a>&nbsp;<?php echo $slide['slide_title']; ?>
                            </td>
                            <td class="dataTableContent text-right"><?php echo $slide['slide_group']; ?></td>
                            <td class="dataTableContent text-center">
                                <?php if ($slide['status'] == '1') { ?>
                                    <a href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $slide['slide_id'] . '&action=setflag&flag=0'); ?>"><i
                                            class="fa fa-square fa-2x txt-status-on" aria-hidden="true"
                                            title="<?php echo IMAGE_ICON_STATUS_ON; ?>"></i></a>
                                <?php } else { ?>
                                    <a href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $slide['slide_id'] . '&action=setflag&flag=1'); ?>"><i
                                            class="fa fa-square fa-2x txt-status-off" aria-hidden="true"
                                            title="<?php echo IMAGE_ICON_STATUS_OFF; ?>"></i></a>
                                <?php } ?>
                            </td>
                            <td class="dataTableContent text-center">
                                <?php if ($slide['slide_open_new_windows'] == '1') { ?>
                                    <a href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $slide['slide_id'] . '&action=setslide_open_new_windows&flagslide_open_new_windows=0'); ?>"><i
                                            class="fa fa-square fa-2x txt-orange align-middle" aria-hidden="true"
                                            title="<?php echo IMAGE_ICON_SLIDE_OPEN_NEW_WINDOWS_ON; ?>"></i></a>
                                <?php } else { ?>
                                    <a href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $slide['slide_id'] . '&action=setslide_open_new_windows&flagslide_open_new_windows=1'); ?>"><span
                                            class="fa-stack"
                                            title="<?php echo IMAGE_ICON_SLIDE_OPEN_NEW_WINDOWS_OFF; ?>">
                            <i class="fa fa-square fa-stack-2x opacity-25 txt-orange" aria-hidden="true"></i>
                            <i class="fa fa-times fa-stack-1x txt-red" aria-hidden="true"></i>
                          </span>
                                    </a>
                                <?php } ?>
                            </td>

                            <td class="dataTableContent text-right"><?php echo $slide['slide_sort_order']; ?></td>
                            <td class="dataTableContent text-right">

                                <?php if (isset($sInfo) && is_object($sInfo) && ($slide['slide_id'] == $sInfo->slide_id)) { ?>
                                    <i class="fa fa-caret-right fa-2x fa-fw txt-navy align-middle"></i>
                                <?php } else { ?>
                                    <a href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $slide['slide_id']); ?>">
                                        <i class="fa fa-info-circle fa-2x fa-fw txt-black align-middle"></i>
                                    </a>
                                <?php } ?>
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 configurationColumnRight">
                    <?php
                    $heading = [];
                    $contents = [];
                    switch ($action) {
                        case 'delete': // deprecated
                        case 'del':
                            $heading[] = array('text' => '<h4>' . $sInfo->slide_title . '</h4>');

                            $contents = array('form' => zen_draw_form('banners', FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&action=deleteconfirm') . zen_draw_hidden_field('sID', $sInfo->slide_id));
                            $contents[] = array('text' => TEXT_INFO_DELETE_INTRO);
                            $contents[] = array('text' => '<b>' . $sInfo->slide_title . '</b>');
                            if ($sInfo->slide_image) {
                                $contents[] = array('text' => '<div class="checkbox-inline"><label>' . zen_draw_checkbox_field('delete_image', 'on', true) . TEXT_INFO_DELETE_IMAGE . '</label></div>');
                            }
                            $contents[] = array('align' => 'text-center', 'text' => '<button type="submit" class="btn btn-danger">' . IMAGE_DELETE . '</button> <a href="' . zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $_GET['sID']) . '" class="btn btn-default" role="button">' . IMAGE_CANCEL . '</a>');
                            break;
                        default:
                            if (is_object($sInfo)) {
                                $heading[] = array('text' => '<h4>' . $sInfo->slide_title . '</h4>');

                                $contents[] = array('align' => 'text-center', 'text' => '<a href="' . zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $sInfo->slide_id . '&action=new') . '" class="btn btn-primary" role="button">' . IMAGE_EDIT . '</a> <a href="' . zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $sInfo->slide_id . '&action=del') . '" class="btn btn-warning" role="button">' . IMAGE_DELETE . '</a>');
                                $contents[] = array('text' => TEXT_SLIDE_DATE_ADDED . ' ' . zen_date_short($sInfo->date_added));
                                $contents[] = array('align' => 'text-center', 'text' => '<a href="' . zen_href_link(FILENAME_ZX_SLIDESHOW, 'page=' . $_GET['page'] . '&sID=' . $sInfo->slide_id) . '" class="btn btn-default" role="button">' . IMAGE_UPDATE . '</a>');

                                $banner_id = $sInfo->slide_id;

                                if ($sInfo->date_scheduled) {
                                    $contents[] = array('text' => sprintf(TEXT_SLIDE_SCHEDULED_AT_DATE, zen_date_short($sInfo->date_scheduled)));
                                }

                                if ($sInfo->expires_date) {
                                    $contents[] = array('text' => sprintf(TEXT_SLIDE_EXPIRES_AT_DATE, zen_date_short($sInfo->expires_date)));
                                } elseif ($sInfo->expires_impressions) {
                                    $contents[] = array('text' => sprintf(TEXT_SLIDE_EXPIRES_AT_IMPRESSIONS, $sInfo->expires_impressions));
                                }

                                if ($sInfo->date_status_change) {
                                    $contents[] = array('text' => sprintf(TEXT_SLIDE_STATUS_CHANGE, zen_date_short($sInfo->date_status_change)));
                                }
                            }
                            break;
                    }

                    if (!empty($heading) && !empty($contents)) {
                        $box = new box();
                        echo $box->infoBox($heading, $contents);
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <tr>
                        <td><?php echo $slide_split->display_count($slide_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_BANNERS); ?></td>
                        <td class="text-right"><?php echo $slide_split->display_links($slide_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="2"><a
                                href="<?php echo zen_href_link(FILENAME_ZX_SLIDESHOW, 'action=new'); ?>"
                                class="btn btn-primary" role="button"><?php echo IMAGE_NEW_BANNER; ?></a></td>
                    </tr>
                </table>
            </div>
        <?php } ?>

        <!-- body_text_eof //-->
    </div>
    <!-- body_eof //-->

    <!-- footer //-->
    <?php require DIR_WS_INCLUDES . 'footer.php'; ?>
    <!-- footer_eof //-->
    <!-- script for datepicker -->
    <script>
        $(function () {
            $('input[name="date_scheduled"]').datepicker();
            $('input[name="expires_date"]').datepicker();
        })
    </script>
    </body>
    </html>
<?php
require DIR_WS_INCLUDES . 'application_bottom.php';
