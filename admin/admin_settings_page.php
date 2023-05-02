<?php
global $wpdb;
$table_name = $wpdb->prefix . 'subscribe_form_options';
$api_key = get_option('sg_newsletter_api_key');

if (isset($_POST['api_key'])) {
    $api_key = $_POST['api_key'];
    update_option('sg_newsletter_api_key', $api_key);
    echo '<div class="notice notice-success is-dismissible"><p>API key saved successfully.</p></div>';
}

include SG_NEWSLETTER_PLUGIN . '/admin/templates/api_key_form.php';

if ($api_key) {
    if (isset($_POST['delete_option'])) {
        $result = $wpdb->delete($table_name, array('id' => $_POST['delete_option']));
        if ($result) {
            echo '<div class="notice notice-success is-dismissible"><p>Option deleted successfully.</p></div>';
        } else {
            echo '<div class="notice notice-error is-dismissible"><p>Failed to delete option.</p></div>';
        }
    } else if (isset($_POST['image'], $_POST['title'], $_POST['description'], $_POST['frequency'])) {
        $insert_data = array(
            'image' => $_POST['image'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'frequency' => $_POST['frequency']
        );
        $wpdb->insert($table_name, $insert_data);
        echo '<div class="notice notice-success is-dismissible"><p>Option added successfully.</p></div>';
    } else if (isset($_POST['contact_list'], $_POST['sg_newsletter_field'])) {
        update_option('sendgrid_contact_list', $_POST['contact_list']);
        update_option('sg_newsletter_field', $_POST['sg_newsletter_field']);
        echo '<div class="notice notice-success is-dismissible"><p>Contact list has been saved.</p></div>';
    } else if (isset($_POST['content_title'], $_POST['content_description'])) {
        update_option('sendgrid_content_title', $_POST['content_title']);
        update_option('sendgrid_content_description', $_POST['content_description']);
        echo '<div class="notice notice-success is-dismissible"><p>Content title and description has been saved.</p></div>';
    }

    $sg = new \SendGrid($api_key);
    $response = $sg->client->marketing()->lists()->get();
    $fields_response = $sg->client->marketing()->field_definitions()->get();

    if ($response->statusCode() == 200 && $fields_response->statusCode() == 200) {
        $lists = json_decode($response->body());
        $fields = json_decode($fields_response->body());
        $selected_list = get_option('sendgrid_contact_list');
        include SG_NEWSLETTER_PLUGIN . '/admin/templates/contact_list_form.php';
    } else {
        echo '<div class="notice notice-error is-dismissible"><p>There was an error fetching contact lists & newsletter fields. Please check your API key and try again.</p></div>';
    }

    include SG_NEWSLETTER_PLUGIN . '/admin/templates/content_form.php';
    include SG_NEWSLETTER_PLUGIN . '/admin/templates/options_table.php';
    include SG_NEWSLETTER_PLUGIN . '/admin/templates/new_option_form.php';
}
?>