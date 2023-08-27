<?php

$define = [
    'HEADING_TITLE' => 'ZX Slideshow',
    'TABLE_HEADING_SLIDES' => 'Slides',
    'TABLE_HEADING_GROUPS' => 'Groups',
    'TABLE_HEADING_SLIDE_OPEN_NEW_WINDOWS' => 'New Window',
    'TABLE_HEADING_SLIDE_SORT_ORDER' => 'Sort<br>Order',
    'TEXT_SLIDE_TITLE' => 'Slide Title:',
    'TEXT_SLIDE_LEAD_IN' => 'Lead In Text:',
    'TEXT_SLIDE_TOP_TITLE' => 'Top Title:',
    'TEXT_SLIDE_SUBTITLE' => 'Subtitle:',
    'TEXT_SLIDE_TEXT' => 'Text:',
    'TEXT_SLIDE_BUTTON' => 'Button Text:',
    'TEXT_SLIDE_URL' => 'Slide URL:',
    'TEXT_SLIDE_GROUP' => 'Slide Group:',
    'TEXT_SLIDE_NEW_GROUP' => ', or enter a new Slide group below',
    'TEXT_SLIDE_IMAGE' => 'Image:',
    'TEXT_SLIDE_IMAGE_LOCAL' => ', or enter local file below',
    'TEXT_SLIDE_IMAGE_TARGET' => 'Image Target (Save To):',
    'TEXT_SLIDE_IMAGE_TARGET_INFO' => '<strong>Suggested Target location for the image on the server:</strong> ' . DIR_FS_CATALOG_IMAGES . 'banners/',
    'TEXT_SLIDE_ALL_SORT_ORDER' => 'Sort Order',
    'TEXT_SLIDE_ALL_SORT_ORDER_INFO' => '<strong>NOTE: if left empty or 0, slides will be displayed at random order</strong>',
    'TEXT_SLIDE_EXPIRES_ON' => 'Expires On: <br>(Must be after today)',
    'TEXT_SLIDE_SLIDE_NOTE' => '<b>Slide Notes:</b><ul><li>Use an image or HTML text for the Slide - not both.</li><li>HTML Text has priority over an image</li><li>HTML Text will not register the click thru, but will register displays</li><li>Banners with absolute image URLs should not be displayed on secure pages</li></ul>',
    'TEXT_SLIDE_INSERT_NOTE' => '<b>Image Notes:</b><ul><li>Uploading directories must have proper user (write) permissions setup!</li><li>Do not fill out the \'Save To\' field if you are not uploading an image to the webserver (ie, you are using a local (serverside) image).</li><li>The \'Save To\' field must be an existing directory with an ending slash (eg, banners/).</li></ul>',
    'TEXT_SLIDE_EXPIRY_NOTE' => '<b>Expiry Notes:</b><ul><li>Only one of the two fields should be submitted</li><li>If the Slide is not to expire automatically, then leave these fields blank</li></ul>',
    'TEXT_SLIDE_STATUS' => 'Slide Status:',
    'TEXT_SLIDE_ACTIVE' => 'Active',
    'TEXT_SLIDE_NOT_ACTIVE' => 'Not Active',
    'TEXT_SLIDE_OPEN_NEW_WINDOWS' => 'Slide New Window',
    'TEXT_INFO_SLIDE_OPEN_NEW_WINDOWS' => '<strong>NOTE:</strong> Slide will open in a new window',
    'TEXT_SLIDE_DATE_ADDED' => 'Date Added:',
    'TEXT_SLIDE_EXPIRES_AT_DATE' => 'Expires At: <b>%s</b>',
    'TEXT_SLIDE_STATUS_CHANGE' => 'Status Change: %s',
    'TEXT_INFO_DELETE_INTRO' => 'Are you sure you want to delete this slide?',
    'TEXT_INFO_DELETE_IMAGE' => 'Delete Slide image',
    'SUCCESS_SLIDE_INSERTED' => 'Success: The Slide has been inserted.',
    'SUCCESS_SLIDE_UPDATED' => 'Success: The Slide has been updated.',
    'SUCCESS_SLIDE_REMOVED' => 'Success: The Slide has been removed.',
    'SUCCESS_SLIDE_STATUS_UPDATED' => 'Success: The status of the Slide has been updated.',
    'ERROR_SLIDE_TITLE_REQUIRED' => 'Error: Slide title required.',
    'ERROR_SLIDE_GROUP_REQUIRED' => 'Error: Slide group required.',
    'ERROR_IMAGE_DOES_NOT_EXIST' => 'Error: Image does not exist.',
    'ERROR_IMAGE_IS_NOT_WRITEABLE' => 'Error: Image can not be removed.',
    'ERROR_UNKNOWN_STATUS_FLAG' => 'Error: Unknown status flag.',
    'ERROR_SLIDE_IMAGE_REQUIRED' => 'Error: Slide image required.',
    'ERROR_UNKNOWN_SLIDE_OPEN_NEW_WINDOW' => 'Error: Slide could not be set to open in a new window',
    'TEXT_LEGEND_SLIDE_OPEN_NEW_WINDOWS' => 'New Window',
    'IMAGE_ICON_SLIDE_OPEN_NEW_WINDOWS_ON' => 'Open New Window - Enabled',
    'IMAGE_ICON_SLIDE_OPEN_NEW_WINDOWS_OFF' => 'Open New Window - Disabled',
    'SUCCESS_SLIDE_OPEN_NEW_WINDOW_UPDATED' => 'Success: The status of the Slide to open in a new window has been updated.',
    'SUCCESS_SLIDE_ON_SSL_UPDATED' => 'Success: The status of the Slide to show on SSL has been updated.',
];

return $define;
