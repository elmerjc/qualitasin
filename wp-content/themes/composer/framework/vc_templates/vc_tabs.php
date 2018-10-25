<?php
$output = $title = $interval = $el_class = '';
extract(shortcode_atts(array(
    'title' => '',
    'icon_name' => '',
    'interval' => 0,
    'el_class' => '',
    'style' => '',
    'align' => '',
    'side' => ''
), $atts));

wp_enqueue_script('jquery-ui-tabs');

$el_class = $this->getExtraClass($el_class);

$element = 'wpb_tabs pix_tabs';
if ( 'vc_tour' == $this->shortcode) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = $icon_matches = $tab_icons = array();


preg_match_all('/icon_name="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $icon_matches, PREG_OFFSET_CAPTURE );



/**
 * vc_tabs
 *
 */
if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
if ( isset($icon_matches[0]) ) { $tab_icons = $icon_matches[0]; }
else{
    $tab_icons = array();
}


$pix = 0;

$tabs_nav = $tab_icon = '';
$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix">';
foreach ( $tab_titles as $tab ) {
    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
    if($tab_icon != '' && isset($tab_icons[$pix][0])){
        preg_match('/icon_name="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab_icons[$pix][0], $tab_icon, PREG_OFFSET_CAPTURE );
    }
    else{
         $tab_icon = array();
         $tab_icon[1][0] = '';
    }

    if(isset($tab_matches[1][0])) {
        $tabs_nav .= '<li>';
        $icons = '';
        if( $tab_icon[1][0] != '' ){
            $icons ='<i class="pix '.$tab_icon[1][0].'"></i>';
        }
        $tabs_nav .= '<a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">'. $icons .'' . $tab_matches[1][0] . '</a></li>';

    }

    $pix++;
}
$tabs_nav .= '</ul>'."\n";

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim($element.' wpb_content_element '.$el_class), $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.' '. $style .' '. $align .' '. $side .'" data-interval="'.$interval.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));

if($side !='tabs-bottom'){
    $output .= "\n\t\t\t".'<div class="tabs-navigation">'.$tabs_nav.'</div>';
}
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);

if($side =='tabs-bottom'){
    $output .= "\n\t\t\t".'<div class="tabs-navigation">'.$tabs_nav.'</div>';
}
if ( 'vc_tour' == $this->shortcode) {
    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'. esc_html__('Previous slide', 'composer') .'">'. esc_html__('Previous slide', 'composer') .'</a></span> <span class="wpb_next_slide"><a href="#next" title="'. esc_html__('Next slide', 'composer') .'">'. esc_html__('Next slide', 'composer') .'</a></span></div>';
}
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($element);

echo $output;