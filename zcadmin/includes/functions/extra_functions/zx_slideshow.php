<?php
// name - set name for the menu
// type - grouped or regular select menu
// values - effects, speed or delay - get values from another function
function zx_slideshow_menu($name, $type, $values, $default = '', $parameters = '', $required = false) {
    switch($values) {
        case 'effects':
            $dropdown_array = zx_slideshow_effects_menu();
            break;
        case 'speed':
            $dropdown_array = zx_slideshow_speed_menu();
            break;
        case 'delay':
            $dropdown_array = zx_slideshow_delay_menu();
            break;
        case 'position':
            $dropdown_array = zx_slideshow_position_menu();
            break;
    }

    $field = '<select name="' . zen_output_string($name) . '"';
    if (!empty($parameters)) {
        $field .= ' ' . $parameters;
    }

    if ($required && strpos($parameters, 'required') === false) {
        $field .= ' required';
    }
    if (empty($default)) {
        $default = 'fadeIn';
    }

    $field .= '>' . "\n";

    if($type == 'grouped') {
        foreach ($dropdown_array as $group => $options) {

            $field .= '<optgroup label="' . $group . '">';
            foreach ($options as $option) {
                $field .= '<option value="' . $option . '"';
                if ($default == $option) {
                    $field .= ' selected="selected"';
                }

                $field .= '>' . zen_output_string($option, array('"' => '&quot;', '\'' => '&#039;', '<' => '&lt;', '>' => '&gt;')) . '</option>' . "\n";
            }
            $field .= '</optgroup>';

        }
    } else {
        foreach ($dropdown_array as $option) {
            $field .= '<option value="' . $option . '"';
            if ($default == $option) {
                $field .= ' selected="selected"';
            }
            $field .= '>' . zen_output_string($option, array('"' => '&quot;', '\'' => '&#039;', '<' => '&lt;', '>' => '&gt;')) . '</option>' . "\n";
        }
    }
    $field .= '</select>' . "\n";

    return $field;
}

function zx_slideshow_effects_menu() {
    $dropdown_array = [
        'Attention seekers' => [
            'bounce',
            'flash',
            'pulse',
            'rubberBand',
            'shakeX',
            'shakeY',
            'headShake',
            'swing',
            'tada',
            'wobble',
            'jello',
            'heartBeat',
        ],
        'Back entrances' => [
            'backInDown',
            'backInLeft',
            'backInRight',
            'backInUp',
        ],
        'Bouncing entrances' => [
            'bounceIn',
            'bounceInDown',
            'bounceInLeft',
            'bounceInRight',
            'bounceInUp',
        ],
        'Fading entrances' => [
            'fadeIn',
            'fadeInDown',
            'fadeInDownBig',
            'fadeInLeft',
            'fadeInLeftBig',
            'fadeInRight',
            'fadeInRightBig',
            'fadeInUp',
            'fadeInUpBig',
            'fadeInTopLeft',
            'fadeInTopRight',
            'fadeInBottomLeft',
            'fadeInBottomRight',
        ],
        'Flippers' => [
            'flip',
            'flipInX',
            'flipInY',
            'flipOutX',
            'flipOutY',
        ],
        'Lightspeed' => [
            'lightSpeedInRight',
            'lightSpeedInLeft',
            'lightSpeedOutRight',
            'lightSpeedOutLeft',
        ],
        'Rotating entrances' => [
            'rotateIn',
            'rotateInDownLeft',
            'rotateInDownRight',
            'rotateInUpLeft',
            'rotateInUpRight',
        ],
        'Specials' => [
            'hinge',
            'jackInTheBox',
            'rollIn',
            'rollOut',
        ],
        'Zooming entrances' => [
            'zoomIn',
            'zoomInDown',
            'zoomInLeft',
            'zoomInRight',
            'zoomInUp',
        ],
        'Sliding entrances' => [
            'slideInDown',
            'slideInLeft',
            'slideInRight',
            'slideInUp',
        ]
    ];

    return $dropdown_array;
}

function zx_slideshow_speed_menu() {
    $dropdown_array = [
        'default', 'slow', 'slower', 'fast', 'faster'
    ];

    return $dropdown_array;
}

function zx_slideshow_delay_menu() {
    $dropdown_array = [
        '0', '1', '2', '3', '4', '5'
    ];

    return $dropdown_array;
}

function zx_slideshow_position_menu() {
    $dropdown_array = [
        'left', 'center', 'right'
    ];

    return $dropdown_array;
}

function zx_set_slide_status($slide_id, $status) {
    if ($status != 0 && $status != 1) return -1;
    global $db;
    $sql = "UPDATE " . TABLE_ZX_SLIDESHOW;
    $sql .= ($status == 1) ? " SET status = 1" : " SET status = 0";
    $sql .= ", date_status_change = now() WHERE slide_id = '" . (int)$slide_id . "'";
    return $db->Execute($sql);
}
