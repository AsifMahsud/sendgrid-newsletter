<?php
$api_key = get_option('sg_newsletter_api_key');
$list_id = get_option('sendgrid_contact_list');
$newsletter_field_id = get_option('sg_newsletter_field');

if (isset($_POST['email']) && isset($_POST['newsletter'])) {
    $sg = new \SendGrid($api_key);
    $email = $_POST['email'];
    $newsletter = $_POST['newsletter'];
    $request_body = json_decode('{
        "list_ids": ["' . $list_id . '" ],
        "contacts": [
            {
                "email": "' . $email . '",
                "custom_fields": {
                    "' . $newsletter_field_id . '": "' . $newsletter . '"
                }
            }
        ]
    }');

    try {
        $sg->client->marketing()->contacts()->put($request_body);
        echo '<style>.subscribe-form__message_success, .subscribe-form__message {display: block !important;}</style>';
    } catch (Exception $ex) {
        echo '<style>.subscribe-form__message_error, .subscribe-form__message {display: block !important;}</style>';
    }
}

if ($api_key && $list_id && $newsletter_field_id) {
    ?>
    <div class="subscribe-form__content-header">
        <h1 class="subscribe-form-title">
            <?php echo get_option('sendgrid_content_title'); ?>
        </h1>
        <p class="subscribe-form-description">
            <?php echo get_option('sendgrid_content_description'); ?>
        </p>
    </div>
    <form method="post" class="subscribe-form" id="subscribe-form">
        <div class="subscribe-form__header">
            <input type="email" class="subscribe-form-email" placeholder="Enter your Email" id="subscribe-email"
                name="email" required>
            <input type="hidden" name="newsletter" value="" />
            <button type="submit" class="subscribe-form-btn">Subscribe</button>
        </div>
        <div class="subscribe-form__message">
            <p class="subscribe-form__message_success">Successfully subscribed to the newsletter 🎉</p>
            <p class="subscribe-form__message_error">Something went wrong 😞. Please contact the site admin</p>
        </div>
        <div class="subscribe-form-options">
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'subscribe_form_options';
            $options = $wpdb->get_results("SELECT * FROM $table_name");
            ?>
            <?php foreach ($options as $option) { ?>
                <label class="subscribe-form-option">
                    <div class="subscribe-form-option-image">
                        <img src="<?php echo esc_attr($option->image); ?>" width="300">
                    </div>
                    <div class="subscribe-form-option-details">
                        <p class="subscribe-form__option-frequency">
                            <?php echo esc_html($option->frequency); ?>
                        </p>
                        <h5 class="subscribe-form__option-title">
                            <?php echo esc_html($option->title); ?>
                        </h5>
                        <p class="subscribe-form__option-description">
                            <?php echo esc_html($option->description); ?>
                        </p>
                        <div class="subscribe-form__checkbox">
                            <input type="checkbox" name="newsletter" value="<?php echo $option->title; ?>"> Select
                        </div>
                    </div>
                </label>
            <?php } ?>
        </div>
    </form>
    <?php
}
?>
