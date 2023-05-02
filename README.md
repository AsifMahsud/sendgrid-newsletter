# SendGrid Newsletter WordPress Plugin

The SendGrid Newsletter plugin allows WordPress site owners to easily add a subscription form to their website that integrates with SendGrid. With this plugin, you can create a custom subscription form and choose which SendGrid contacts list to add subscribers to.

## Requirements

In order to use the SendGrid Newsletter plugin, you must have:

-   A SendGrid account
-   An API key for your SendGrid account
-   At least one contacts list on SendGrid
-   At least one custom field with type "text" on your SendGrid account.

## Installation

1.  Upload the `sendgrid-newsletter` folder to the `/wp-content/plugins/` directory
2.  Activate the plugin through the 'Plugins' menu in WordPress
3.  In the WordPress dashboard, go to the SendGrid Newsletter settings page and enter your SendGrid API key
4.  Create a new subscription form in the SendGrid Newsletter settings and choose the SendGrid contacts list to add subscribers to.
5.  Use the shortcode `[sendgrid_newsletter]` to add the subscription form to your WordPress pages or posts.

## Shortcode

The SendGrid Newsletter plugin provides a shortcode for adding the subscription form to your WordPress pages or posts. Use the following shortcode to render the form:

csharpCopy code

`[sendgrid_newsletter]`

## Customizing the Subscription Form

You can customize the subscription form by modifying the HTML and CSS in the plugin settings. Additionally, you can modify the form fields and labels by adding custom fields to your SendGrid account and updating the form fields in the plugin settings.

We hope this plugin will help you easily manage your email subscriptions and grow your audience. If you have any questions or feedback, please don't hesitate to contact us at <asifmahsud543@gmail.com>.