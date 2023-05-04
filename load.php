<?php

if (is_admin()) {
    require_once SG_NEWSLETTER_PLUGIN . '/admin/admin.php';
}

require_once(SG_NEWSLETTER_PLUGIN . 'lib/sendgrid-php/BaseSendGridClientInterface.php');
require_once(SG_NEWSLETTER_PLUGIN . 'lib/sendgrid-php/SendGrid.php');
require_once(SG_NEWSLETTER_PLUGIN . 'lib/sendgrid-php/Exception/InvalidRequest.php');