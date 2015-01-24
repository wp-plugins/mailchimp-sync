=== MailChimp Sync ===
Contributors: DvanKooten
Donate link: https://dannyvankooten.com/donate/
Tags: mailchimp,users,sync
Requires at least: 3.8
Tested up to: 4.1.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Synchronize your WP Users with a MailChimp list

== Description ==

Synchronize your registered WordPress users with a MailChimp list.

> **This plugin is an add-on for MailChimp for WordPress**
>
> This plugin depends on the [MailChimp for WordPress plugin](https://wordpress.org/plugins/mailchimp-for-wp/).

**This plugin is still in beta. You can definitely use it but it _could_ be subject to changes breaking backwards compatibility.**

= New Users =
New users are automatically subscribed to your MailChimp list.

= User Fields =
User fields are synced with your MailChimp list fields, even when users update their profile or change their email address.

= Deleted Users =
When a user is deleted from your site, they will be unsubscribed from the selected MailChimp list as well.

= Existing Users =
After activation, the plugin will listen to all changes in your userbase. This doesn't mean you can't synchronise existing users though. :)

> **Development**
>
> The development of [MailChimp Sync takes place on GitHub](https://github.com/dannyvankooten/wp-mailchimp-sync). [Bugs](https://github.com/dannyvankooten/wp-mailchimp-sync/issues) and pull requests are welcomed there.


== Installation ==

1. If you have not installed [MailChimp for WordPress](https://wordpress.org/plugins/mailchimp-for-wp/) yet, install that first.
1. In your WordPress admin panel, go to *Plugins > New Plugin*, search for **MailChimp Sync** and click "*Install now*"
1. Alternatively, download the plugin and upload the contents of `mailchimp-sync.zip` to your plugins directory, which usually is `/wp-content/plugins/`.
1. Activate the plugin
1. Set [your MailChimp API key](https://admin.mailchimp.com/account/api) in the plugin settings.
1. Select a list to sync with in the plugin settings

== Frequently Asked Questions ==

Coming soon.

== Screenshots ==

1. Synchronisation settings
2. Status overview

== Changelog ==

= 0.1 =
Initial beta release.

