<?php
global $wpdb;
$table_name = $wpdb->prefix . 'manage_sendgrid_newsletter';
$api_key = get_option('sg_newsletter_api_key');
$selected_list = get_option('sendgrid_contact_list');
$inline_selected_list = get_option('sendgrid_inline_contact_list');
$sidebar_selected_list = get_option('sendgrid_sidebar_contact_list');
$allowed_tags = array(
    'br' => array(),
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'b' => array()
);

if (isset($_POST['api_key'])) {
    $api_key = sanitize_text_field(wp_unslash($_POST['api_key']));
    update_option('sg_newsletter_api_key', $api_key);
    echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__('API key saved successfully.', 'msg_newsletter') . '</p></div>';
} else if (isset($_POST['delete_option'])) {
    $id = absint($_POST['delete_option']);
    if (!$id) {
        $message = esc_html__('Invalid ID: Please provide a valid ID number to delete the option.', 'msg_newsletter');
        $message_type = 'error';
    } else {
        $result = $wpdb->delete($table_name, array('id' => $id));
        if ($result) {
            $message = esc_html__('Option successfully deleted.', 'msg_newsletter');
            $message_type = 'success';
        } else {
            $message = esc_html__('Failed to delete option: Please try again later or contact support for assistance.', 'msg_newsletter');
            $message_type = 'error';
        }
    }
    printf('<div class="notice notice-%s is-dismissible"><p>%s</p></div>', esc_attr($message_type), $message);
} else if (isset($_POST['image'], $_POST['title'], $_POST['description'], $_POST['frequency'])) {
    $image = sanitize_text_field($_POST['image']);
    $title = wp_kses($_POST['title'], $allowed_tags);
    $description = wp_kses($_POST['description'], $allowed_tags);
    $frequency = sanitize_text_field($_POST['frequency']);
    $insert_data = array(
        'image' => esc_url_raw($image),
        'title' => esc_html($title),
        'description' => esc_html($description),
        'frequency' => esc_html($frequency)
    );
    $wpdb->insert($table_name, $insert_data);
    echo '<div class="notice notice-success is-dismissible"><p>Option added successfully.</p></div>';
} else if (isset($_POST['contact_list'], $_POST['sg_newsletter_field'])) {
    $contact_list = sanitize_text_field($_POST['contact_list']);
    $sg_newsletter_field = sanitize_text_field($_POST['sg_newsletter_field']);
    update_option('sendgrid_contact_list', $contact_list);
    update_option('sg_newsletter_field', $sg_newsletter_field);
    echo '<div class="notice notice-success is-dismissible"><p>Contact list has been saved.</p></div>';
} else if (isset($_POST['inline_list_contact_form'])) {
    $inline_list_contact_form = sanitize_text_field($_POST['inline_list_contact_form']);
    update_option('sendgrid_inline_contact_list', $inline_list_contact_form);
    echo '<div class="notice notice-success is-dismissible"><p>Inline Contact list has been saved.</p></div>';
} else if (isset($_POST['sidebar_list_contact_form'])) {
    $sidebar_list_contact_form = sanitize_text_field($_POST['sidebar_list_contact_form']);
    update_option('sendgrid_sidebar_contact_list', $sidebar_list_contact_form);
    echo '<div class="notice notice-success is-dismissible"><p>Sidebar Contact list has been saved.</p></div>';
} else if (isset($_POST['content_title'], $_POST['content_description'])) {
    $content_title = wp_kses_post($_POST['content_title'], $allowed_tags);
    $content_description = wp_kses_post($_POST['content_description'], $allowed_tags);
    update_option('sendgrid_content_title', $content_title);
    update_option('sendgrid_content_description', $content_description);
    echo '<div class="notice notice-success is-dismissible"><p>Content title and description has been saved.</p></div>';
}

include SG_NEWSLETTER_PLUGIN . '/admin/includes/api_key_form.php';

if ($api_key) {
    $sg = new \SendGrid($api_key);
    try {
        $response = $sg->client->marketing()->lists()->get();
        $fields_response = $sg->client->marketing()->field_definitions()->get();
        if ($response->statusCode() == 200 && $fields_response->statusCode() == 200) {
            $lists = json_decode($response->body());
            $fields = json_decode($fields_response->body());
            include SG_NEWSLETTER_PLUGIN . '/admin/includes/newsletter_tabs.php';
        } else {
            echo '<div class="notice notice-error is-dismissible"><p>There was an error fetching contact lists & newsletter fields. Please check your API key and try again.</p></div>';
        }
    } catch (Exception $ex) {
        echo 'Caught exception: ' . $ex->getMessage();
    }
}
?>