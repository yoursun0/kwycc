=== WP SMTP Mail CONFIG ===
Contributors: TCSS
Tags: mail, smtp, wp_mail, mailer, phpmailer, CONFIG, SMTP CONFIG
Requires at least: 2.7
Tested up to: 3.7.1
Stable tag: 0.9.4

Configures the wp_mail() function to use SMTP instead of mail() and creates an options page to manage the settings.

== Description ==

This plugin reconfigures the wp_mail() function to use SMTP instead of mail() and creates an options page that allows you to specify various options.

You can set the following options:

* Specify the from name and email address for outgoing email.
* Choose to send mail by SMTP or PHP's mail() function.
* Specify an SMTP host (defaults to localhost).
* Specify an SMTP port (defaults to 25).
* Choose SSL / TLS encryption (not the same as STARTTLS).
* Choose to use SMTP authentication or not (defaults to not).
* Specify an SMTP username and password.

== Installation ==

1. Download
2. Upload to your `/wp-contents/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
