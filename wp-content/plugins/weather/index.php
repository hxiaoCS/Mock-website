<?php
/*
Plugin Name: Today's Weather
*/

add_action('init', function(){
    add_shortcode('weather-plugin', function($atts = [], $content = null){
        $content .= "<script>var atts = " .
            json_encode($atts) .
            "</script>";
        $content .= file_get_contents(dirname(__FILE__)."/weather.html");
        return $content;
    });
    
});
