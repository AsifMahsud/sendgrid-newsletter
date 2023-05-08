<?php
$api_key = get_option('sg_newsletter_api_key');
$list_id = get_option('sendgrid_sidebar_contact_list');

if (isset($_POST['sendgrid_email'])) {
    $sg = new \SendGrid($api_key);
    $email = sanitize_email($_POST['sendgrid_email']);
    $request_body = json_decode('{
        "list_ids": ["' . $list_id . '" ],
        "contacts": [
            {
                "email": "' . $email . '"
            }
        ]
    }');

    try {
        $sg->client->marketing()->contacts()->put($request_body);
        echo '<style>.sendgrid_newsletter__message_success, .sendgrid_newsletter__message {display: block !important;}</style>';
    } catch (Exception $ex) {
        echo '<style>.sendgrid_newsletter__message_error, .sendgrid_newsletter__message {display: block !important;}</style>';
    }
}

if ($api_key && $list_id) {
    ?>
    <form method="post" id="sendgrid_newsletter_sidebar_form">
        <div class="sendgrid_newsletter_sidebar_form">
            <input type="email" class="sendgrid_email" placeholder="Email address…" id="sendgrid_email"
                name="sendgrid_email" required />
            <button type="submit" class="sendgrid_newsletter_form-btn">Sign Up</button>
        </div>
        <div class="sendgrid_newsletter__message">
            <p class="sendgrid_newsletter__message_success">Successfully joined the community 🎉</p>
            <p class="sendgrid_newsletter__message_error">Something went wrong 😞. Please contact the site admin</p>
        </div>
    </form>
    <?php
}
?>