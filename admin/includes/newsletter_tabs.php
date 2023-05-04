<div class="newsletter-tabs">
    <ul class="tab-list">
        <li class="active"><a href="#options-style">Newsletter Options Style</a></li>
        <li><a href="#inline-style">Newsletter Inline Style</a></li>
        <li><a href="#sidebar-style">Newsletter Sidebar Style</a></li>
    </ul>
    <div class="tab-content">
        <div id="options-style" class="tab-pane active">
            <div class="sendgrid_newsletter_tab_info">Shortcode: <code>[sendgrid_newsletter_options_style]</code></div>
            <?php include SG_NEWSLETTER_PLUGIN . '/admin/includes/contact_list_form.php'; ?>
            <?php include SG_NEWSLETTER_PLUGIN . '/admin/includes/content_form.php'; ?>
            <?php include SG_NEWSLETTER_PLUGIN . '/admin/includes/options_table.php'; ?>
            <?php include SG_NEWSLETTER_PLUGIN . '/admin/includes/new_option_form.php'; ?>
        </div>
        <div id="inline-style" class="tab-pane">
            <div class="sendgrid_newsletter_tab_info">Shortcode: <code>[sendgrid_newsletter_inline_style]</code></div>
            <?php include SG_NEWSLETTER_PLUGIN . '/admin/includes/inline_list_contact_form.php'; ?>
        </div>
        <div id="sidebar-style" class="tab-pane">
            <div class="sendgrid_newsletter_tab_info">Shortcode: <code>[sendgrid_newsletter_sidebar_style]</code></div>
            <?php include SG_NEWSLETTER_PLUGIN . '/admin/includes/sidebar_list_contact_form.php'; ?>
        </div>
    </div>
</div>
