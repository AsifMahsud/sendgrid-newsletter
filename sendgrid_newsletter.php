<?php
/*
Plugin Name: Sendgrid Newsletter
Plugin URI: https://letsremotify.com
Description: A custom plugin for newsletter subscription.
Version: 1.0.0
Author: Muhammad Asif
Author URI: mailto: asifmahsud543@gmail.com
License: GPL2
*/

define('SG_NEWSLETTER_PLUGIN', plugin_dir_path(__FILE__));
define('SG_NEWSLETTER_PLUGIN_URL', plugin_dir_url(__FILE__));

function subscribe_form_shortcode()
{
    wp_enqueue_style('subscribe-form-style', SG_NEWSLETTER_PLUGIN_URL . '/assets/css/subscribe-form.css');
    wp_enqueue_script('subscribe-form-script', SG_NEWSLETTER_PLUGIN_URL . '/assets/js/subscribe-form.js', array('jquery'), '1.0', true);

    ob_start();
    include_once(plugin_dir_path(__FILE__) . 'templates/subscribe-form.php');
    $output = ob_get_clean();
    return $output;
}


add_shortcode('subscribe_form', 'subscribe_form_shortcode');

require_once SG_NEWSLETTER_PLUGIN . '/load.php';