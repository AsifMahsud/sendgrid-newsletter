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

function subscribe_form_install()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribe_form_options';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      image varchar(255) NOT NULL,
      title varchar(255) NOT NULL,
      description varchar(255) NOT NULL,
      frequency varchar(255) NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function subscribe_form_activation()
{
    // Run installation function
    subscribe_form_install();
    // Clear the permalinks after activation
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'subscribe_form_activation');

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