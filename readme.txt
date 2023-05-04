=== Sendgrid Newsletter ===
Contributors: asifkhan855
Tags: email marketing, newsletter, SendGrid, email automation, subscriber management
Requires at least: 6.0
Tested up to: 6.2
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

The SendGrid Newsletter plugin allows users to create subscription forms on WordPress and directly subscribe their audience to SendGrid email lists.

== Description ==
The SendGrid Newsletter plugin allows WordPress site owners to easily add a subscription form to their website that integrates with SendGrid. With this plugin, you can create a custom subscription form and choose which SendGrid contacts list to add subscribers to.

= Installation =

In order to use the SendGrid Newsletter plugin, you must have:

* A SendGrid account
* An API key for your SendGrid account
* At least one contacts list on SendGrid
* At least one custom field with type \"text\" on your SendGrid account (required only for sendgrid_newsletter_options_style)

= Shortcode =

The plugin uses three shortcodes:

1. `[sendgrid_newsletter_options_style]` for a subscription form with SendGrid audience segmentation. You can customize the option title to match your segment condition.
2. `[sendgrid_newsletter_inline_style]` for a subscription form with an email field and a subscribe button in the same row.
3. `[sendgrid_newsletter_sidebar_style]` for a subscription form with an email field and a subscribe button in separate rows.
= Privacy notices =

With the default configuration, this plugin, in itself, does not:

* track users by stealth;
* write any user personal data to the database;
* send any data to external servers;
* use cookies.

By using the SendGrid Newsletter plugin, you confirm that you agree with ([SendGrid\'s privacy policy](https://sendgrid.com/policies/privacy/services-privacy-policy)).

= Customizing the Subscription Form =

You can customize the subscription form by modifying the HTML and CSS in the plugin settings. Additionally, you can modify the form fields and labels by adding custom fields to your SendGrid account and updating the form fields in the plugin settings.

We hope this plugin will help you easily manage your email subscriptions and grow your audience.


== Installation ==
1.  Upload the `sendgrid-newsletter` folder to the `/wp-content/plugins/` directory
2.  Activate the plugin through the \'Plugins\' menu in WordPress
3.  In the WordPress dashboard, go to the `SendGrid Newsletter` settings page and enter your SendGrid API key
4.  Create a new subscription form in the SendGrid Newsletter settings and choose the SendGrid contacts list to add subscribers to.

== Frequently Asked Questions ==
If you have any questions or feedback, please don\'t hesitate to contact us at [asifmahsud543@gmail.com](mailto:asifmahsud543@gmail.com)

== Screenshots ==
1. Sendgrid Newsletter plugin\'s admin menu and options style newsletter settings page after adding the Sendgrid API
2. Sendgrid Newsletter plugin\'s sidebar style newsletter form with an email field and a subscribe button
3. Sendgrid Newsletter plugin\'s options style form with segmentation options for subscribing to specific Sendgrid audience segments

== Changelog ==
 

== Upgrade Notice ==
 