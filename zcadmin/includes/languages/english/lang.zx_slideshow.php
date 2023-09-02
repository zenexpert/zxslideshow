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
    'TEXT_SLIDE_IMAGE_ALT' => 'Image Alt Text: ',
    'TEXT_SLIDE_ALL_SORT_ORDER' => 'Sort Order',
    'TEXT_SLIDE_ALL_SORT_ORDER_INFO' => '<strong>NOTE: if left empty or 0, slides will be displayed at random order</strong>',
    'TEXT_SLIDE_EXPIRES_ON' => 'Expires On: <br>(Must be after today)',
    'TEXT_SLIDE_INSERT_NOTE' => '<b>Image Notes:</b><ul><li>Uploading directories must have proper user (write) permissions setup!</li><li>Do not fill out the \'Save To\' field if you are not uploading an image to the webserver (ie, you are using a local (serverside) image).</li><li>The \'Save To\' field must be an existing directory with an ending slash (eg, banners/).</li></ul>',
    'TEXT_SLIDE_EXPIRY_NOTE' => '<b>Expiry Notes:</b><ul><li>Only one of the two fields should be submitted</li><li>If the Slide is not to expire automatically, then leave these fields blank</li></ul>',
    'TEXT_SLIDE_LEGEND' => 'Legend',
    'TEXT_SLIDE_LEGEND_TEXT' => '<strong>Effect</strong>
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
                    <p>For home page, set the group to \'home\'.</p>
                    <strong>Image Alt Text</strong>
                    <p>Add image alternative text for screen readers. This is required for <a href="https://www.w3.org/WAI/tutorials/images/" target="_blank">Accessibility</a> compliance (ADA/WCAG).<br>HINT: keep it simple, but as detailed as needed. Imagine the image was being described to you over the phone and you should understand what it is about.<br>If you don\'t add any alt text, it will be automatically generated from the title, subtitle, text and button text just for basic compliance, but keep in mind it\'s always better to have good quality alt text as it also helps with your SEO.</p>',
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
