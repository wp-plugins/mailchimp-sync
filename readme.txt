=== MailChimp Sync ===
Contributors: DvanKooten
Donate link: https://dannyvankooten.com/donate/
Tags: mailchimp,users,sync
Requires at least: 3.8
Tested up to: 4.1.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Synchronize your WP Users with a MailChimp list of choice.

== Description ==

Synchronize your registered WordPress users with a MailChimp list of your choice.

**This plugin is still in beta. You can definitely use it but it _could_ be subject to changes breaking backwards compatibility.**

> This plugin depends on the [MailChimp for WordPress plugin](https://wordpress.org/plugins/mailchimp-for-wp/).

= MailChimp Sync, at a glance.. =

MailChimp Sync will watch for changes in your WordPress user base and automatically sync those changes with the selected MailChimp list.

**New Users**

New users are automatically subscribed to your MailChimp list.

**Updated Users**

User fields are synced with your MailChimp list fields, even when users update their profile or change their email address.

**Deleted Users**

When a user is deleted from your site, they will be unsubscribed from the selected MailChimp list as well.

**Synchronise Existing Users**

After activation, the plugin will listen to all changes in your userbase. This doesn't mean you can't synchronise existing users though. :)

= Development of MailChimp Sync =

Bug reports (and Pull Requests) for [MailChimp Sync are welcomed on GitHub](https://github.com/dannyvankooten/wp-mailchimp-sync). Please note that GitHub is _not_ a support forum.

**More information**

- [MailChimp for WordPress](https://wordpress.org/plugins/mailchimp-for-wp/)
- Developers; follow or contribute to the [MailChimp Sync plugin on GitHub](https://github.com/dannyvankooten/wp-mailchimp-sync)
- Other [WordPress plugins](https://dannyvankooten.com/wordpress-plugins/#utm_source=wp-plugin-repo&utm_medium=link&utm_campaign=more-info-link) by [Danny van Kooten](https://dannyvankooten.com#utm_source=wp-plugin-repo&utm_medium=link&utm_campaign=more-info-link)
- [@DannyvanKooten](https://twitter.com/dannyvankooten) on Twitter

== Installation ==

= MailChimp for WordPress =

Since this plugin depends on the [MailChimp for WordPress plugin](https://wordpress.org/plugins/mailchimp-for-wp/), you will need to install that first.

= Installing MailChimp Sync =

1. In your WordPress admin panel, go to *Plugins > New Plugin*, search for **MailChimp Sync** and click "*Install now*"
1. Alternatively, download the plugin and upload the contents of `mailchimp-sync.zip` to your plugins directory, which usually is `/wp-content/plugins/`.
1. Activate the plugin
1. Set [your MailChimp API key](https://admin.mailchimp.com/account/api) in **MailChimp for WP > MailChimp Settings**.
1. Select a list to sync with in **MailChimp for WP > Sync**.
1. Synchronise your existing users. _(optional)_

== Frequently Asked Questions ==

= I think I found a bug. What now? =

Please report it on [GitHub issues](https://github.com/dannyvankooten/wp-mailchimp-sync/issues) if it's not in the list of known issues.

= I have another question =

Please open a topic on the [WordPress.org plugin support forums](https://wordpress.org/support/plugin/mailchimp-sync).


== Screenshots ==

1. Synchronisation settings
2. Status overview

== Changelog ==

= 0.1 =
Initial beta release.

