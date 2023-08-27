<?php

if (class_exists('AdminRequestSanitizer') && method_exists('AdminRequestSanitizer', 'getInstance')) {
    $zx_slideshow_sanitizer = AdminRequestSanitizer::getInstance();
    $zx_slideshow_sanitizer->addSimpleSanitization('PRODUCT_DESC_REGEX', array('slide_title', 'lead_in', 'top_title', 'subtitle', 'slide_text', 'button_text'));
}
