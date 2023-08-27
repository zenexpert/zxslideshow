<?php

if(ZX_SLIDESHOW_STATUS == 'true') {
// TODO - slide_group will be dynamic once code for category and EZ Pages is ready
$slides_sql = "SELECT * FROM " . TABLE_ZX_SLIDESHOW . "
            WHERE status = '1'
            AND slide_group LIKE 'home'
            ORDER BY slide_sort_order ASC";
$slides = $db->Execute($slides_sql);
?>

<?php
$debug = false;
//$debug = true;
if ($debug) {
    foreach ($slides as $slide) {
        $slide_data = json_decode($slide['slide_data'], true);
        echo '<pre>';
        print_r($slide_data);
        echo '</pre>';
    }
}
?>

<div class="home-slider-area">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($slides as $slide) {
                $slide_data = json_decode($slide['slide_data'], true);

                $style_slideTitlePos = $style_slideSubtitlePos = $style_slideLeadinPos = $style_slideTextPos = $style_slideButtonPos = '';
                $style_slideTitle = $style_slideSubtitle = $style_slideLeadin = $style_slideText = $style_slideButton = '';
                $animationsTitle = $animationsSubtitle = $animationsLeadin = $animationsText = $animationsButton = '';

                // slide lead in
                if (!empty($slide_data['slide_lead_in'])) {
                    if ($slide_data['slide_lead_in_color'] != '#000000') $style_slideLeadin .= ' color: ' . $slide_data['slide_lead_in_color'] . ';';
                    if ($slide_data['slide_lead_in_position'] != 'left') $style_slideLeadin .= ' text-align: ' . $slide_data['slide_lead_in_position'] . ';';
                    if ($slide_data['slide_lead_in_size'] > 0) $style_slideLeadin .= ' font-size: ' . $slide_data['slide_lead_in_size'] . 'rem; line-height: ' . $slide_data['slide_lead_in_size'] . 'rem;';
                    $style_slideLeadin = 'style="' . $style_slideLeadin . '"';

                    if ($slide_data['slide_lead_in_vertical'] > 0) $style_slideLeadinPos .= ' top: '.$slide_data['slide_lead_in_vertical'].'%;
    transform: translateY(-'.$slide_data['slide_lead_in_vertical'].'%);';
                    $style_slideLeadinPos = 'style="' . $style_slideLeadinPos . '"';

                    if ($slide_data['slide_lead_in_speed'] != 'default') $animationsLeadin .= ' animate__' . $slide_data['slide_lead_in_speed'];
                    if ($slide_data['slide_lead_in_delay'] != '0') $animationsLeadin .= ' animate__delay-' . $slide_data['slide_lead_in_delay'] . 's';
                }

                // slide title
                if (!empty($slide_data['slide_top_title'])) {
                    if ($slide_data['slide_top_title_color'] != '#000000') $style_slideTitle .= ' color: ' . $slide_data['slide_top_title_color'] . ';';
                    if ($slide_data['slide_top_title_position'] != 'left') $style_slideTitle .= ' text-align: ' . $slide_data['slide_top_title_position'] . ';';
                    if ($slide_data['slide_top_title_size'] > 0) $style_slideTitle .= ' font-size: ' . $slide_data['slide_top_title_size'] . 'rem; line-height: ' . $slide_data['slide_top_title_size'] . 'rem;';
                    $style_slideTitle = 'style="' . $style_slideTitle . '"';

                    if ($slide_data['slide_top_title_vertical'] > 0) $style_slideTitlePos .= ' top: '.$slide_data['slide_top_title_vertical'].'%;
    transform: translateY(-'.$slide_data['slide_top_title_vertical'].'%);';
                    $style_slideTitlePos = 'style="' . $style_slideTitlePos . '"';

                    if ($slide_data['slide_top_title_speed'] != 'default') $animationsTitle .= ' animate__' . $slide_data['slide_top_title_speed'];
                    if ($slide_data['slide_top_title_delay'] != '0') $animationsTitle .= ' animate__delay-' . $slide_data['slide_top_title_delay'] . 's';
                }

                // slide subtitle
                if (!empty($slide_data['slide_subtitle'])) {
                    if ($slide_data['slide_subtitle_color'] != '#000000') $style_slideSubtitle .= ' color: ' . $slide_data['slide_subtitle_color'] . ';';
                    if ($slide_data['slide_subtitle_position'] != 'left') $style_slideSubtitle .= ' text-align: ' . $slide_data['slide_subtitle_position'] . ';';
                    if ($slide_data['slide_subtitle_size'] > 0) $style_slideSubtitle .= ' font-size: ' . $slide_data['slide_subtitle_size'] . 'rem; line-height: ' . $slide_data['slide_subtitle_size'] . 'rem;';
                    $style_slideSubtitle = 'style="' . $style_slideSubtitle . '"';

                    if ($slide_data['slide_subtitle_vertical'] > 0) $style_slideSubtitlePos .= ' top: '.$slide_data['slide_subtitle_vertical'].'%;
    transform: translateY(-'.$slide_data['slide_subtitle_vertical'].'%);';
                    $style_slideSubtitlePos = 'style="' . $style_slideSubtitlePos . '"';

                    if ($slide_data['slide_subtitle_speed'] != 'default') $animationsSubtitle .= ' animate__' . $slide_data['slide_subtitle_speed'];
                    if ($slide_data['slide_subtitle_delay'] != '0') $animationsSubtitle .= ' animate__delay-' . $slide_data['slide_subtitle_delay'] . 's';
                }

                // slide text
                if (!empty($slide_data['slide_text'])) {
                    if ($slide_data['slide_text_color'] != '#000000') $style_slideText .= ' color: ' . $slide_data['slide_text_color'] . ';';
                    if ($slide_data['slide_text_position'] != 'left') $style_slideText .= ' text-align: ' . $slide_data['slide_text_position'] . ';';
                    if ($slide_data['slide_text_size'] > 0) $style_slideText .= ' font-size: ' . $slide_data['slide_text_size'] . 'rem; line-height: ' . $slide_data['slide_text_size'] . 'rem;';
                    $style_slideText = 'style="' . $style_slideText . '"';

                    if ($slide_data['slide_text_vertical'] > 0) $style_slideTextPos .= ' top: '.$slide_data['slide_text_vertical'].'%;
    transform: translateY(-'.$slide_data['slide_text_vertical'].'%);';
                    $style_slideTextPos = 'style="' . $style_slideTextPos . '"';

                    if ($slide_data['slide_text_speed'] != 'default') $animationsText .= ' animate__' . $slide_data['slide_text_speed'];
                    if ($slide_data['slide_text_delay'] != '0') $animationsText .= ' animate__delay-' . $slide_data['slide_text_delay'] . 's';
                }

                // slide button
                if (!empty($slide_data['button_text'])) {
                    if ($slide_data['button_color'] != '#000000') $style_slideButton .= ' color: ' . $slide_data['button_color'] . ';';
                    if ($slide_data['button_color_bg'] != '#000000') $style_slideButton .= ' background-color: ' . $slide_data['button_color_bg'] . ';';
                    if ($slide_data['button_size'] > 0) $style_slideButton .= ' font-size: ' . $slide_data['button_size'] . 'rem; line-height: ' . $slide_data['button_size'] . 'rem;';
                    $style_slideButton = 'style="' . $style_slideButton . '"';

                    if ($slide_data['button_vertical'] > 0) $style_slideButtonPos .= ' top: '.$slide_data['button_vertical'].'%;
    transform: translateY(-'.$slide_data['button_vertical'].'%);';
                    if ($slide_data['button_position'] != 'left') $style_slideButtonPos .= ' text-align: ' . $slide_data['button_position'] . ';';
                    $style_slideButtonPos = 'style="' . $style_slideButtonPos . '"';

                    if ($slide_data['button_speed'] != 'default') $animationsButton .= ' animate__' . $slide_data['button_speed'];
                    if ($slide_data['button_delay'] != '0') $animationsButton .= ' animate__delay-' . $slide_data['button_delay'] . 's';
                }

                ?>
                <div class="swiper-slide">
                    <?php if (!empty($slide_data['slide_lead_in'])) { ?>
                        <div
                            class="slideLeadin animate hidden animate__<?php echo $slide_data['slide_lead_in_effect'] . $animationsLeadin; ?>" <?php echo $style_slideLeadinPos; ?>>
                            <div class="slideLeadin__text" <?php echo $style_slideLeadin; ?>><?php echo $slide_data['slide_lead_in']; ?></div>
                        </div>
                    <?php } ?>

                    <?php if (!empty($slide_data['slide_top_title'])) { ?>
                        <div
                            class="slideTitle animate hidden animate__<?php echo $slide_data['slide_top_title_effect'] . $animationsTitle; ?>" <?php echo $style_slideTitlePos; ?>>
                            <h2 class="slideTitle__text" <?php echo $style_slideTitle; ?>><?php echo $slide_data['slide_top_title']; ?></h2>
                        </div>
                    <?php } ?>

                    <?php if (!empty($slide_data['slide_subtitle'])) { ?>
                        <div
                            class="slideSubtitle animate hidden animate__<?php echo $slide_data['slide_subtitle_effect'] . $animationsSubtitle; ?>" <?php echo $style_slideSubtitlePos; ?>>
                            <div class="slideSubtitle__text" <?php echo $style_slideSubtitle; ?>><?php echo $slide_data['slide_subtitle']; ?></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($slide_data['slide_text'])) { ?>
                        <div
                            class="slideText animate hidden animate__<?php echo $slide_data['slide_text_effect'] . $animationsText; ?>" <?php echo $style_slideTextPos; ?>>
                            <div class="slideText__text" <?php echo $style_slideText; ?>><?php echo $slide_data['slide_text']; ?></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($slide_data['button_text'])) { ?>
                        <div
                            class="slideButton animate hidden animate__<?php echo $slide_data['button_effect'] . $animationsButton; ?>" <?php echo $style_slideButtonPos; ?>>
                            <?php if(!empty($slide['slide_url'])) { ?>
                                <a href="<?php echo $slide['slide_url']; ?>"<?php echo $slide['slide_open_new_windows'] == 1 ? ' target="_blank"' : '' ?>>
                                    <div class="slideButton__text" <?php echo $style_slideButton; ?>><?php echo $slide_data['button_text']; ?></div>
                                </a>
                            <?php } else { ?>
                                <div class="slideButton__text" <?php echo $style_slideButton; ?>><?php echo $slide_data['button_text']; ?></div>
                            <?php } ?>

                        </div>
                    <?php } ?>

                    <div class="background-image">
                        <img class="background-image__image" src="<?php echo DIR_WS_IMAGES . $slide['slide_image']; ?>"
                             alt="A random unsplash image"/>
                    </div>
                </div>


            <?php } ?>
        </div>
        <?php if(ZX_SLIDESHOW_PAGINATION == 'true') { ?>
            <div class="swiper-pagination"></div>
        <?php } ?>

        <?php if(ZX_SLIDESHOW_NAV == 'true') { ?>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        <?php } ?>

    </div>
    <!-- !swiper slides -->

</div>

<?php } ?>
