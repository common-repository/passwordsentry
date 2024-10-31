=== PasswordSentry ===
Contributors:		lionsgate
Developer:		Password Sentry (https://www.password-sentry.com/)
Donate link:		https://www.password-sentry.com/
Tags:			security, login, login security, protection, access-control
Requires at least:	5.7.2
Tested up to:		6.6
Requires PHP:		5.6
Stable Tag:		1.0.15
License:			GPLv2 or later
License URI:		https://www.gnu.org/licenses/gpl-2.0.html

Secure WordPress by detecting shared passwords, and blocking password sharing. The plugin integrates Password Sentry app into WP to track logins.

== Description ==

**Password Sentry** (PS) is the **must-have** application for every membership site! We developed and released Password Sentry in 1999. Password Sentry was groundbreaking as the first application of its kind. Password Sentry continues to be groundbreaking as we grow and re-invent Password Sentry to continue to be the leader in the industry - exceeding anything our competition offers. Password Sentry is an affordable and reliable tool used by thousands of clients to secure and protect thousands of websites from password trading and dictionary / brute force attacks: saving webmasters hundreds or thousands of dollars each year in extra bandwidth, and lost sales. Password Sentry is a free Open Source App.

WordPress (WP) has become a CMS (Content Management System) for many webmasters. In particular, paysite webmasters who offer paid memberships. To that end, we have seen an explosion of apps and WP plugins that enhance the membership functionality of WP. Our plugin is the perfect fit to WP and those plugins. PasswordSentry Plugin hooks into the WP Login to track and log logins to detect and block password sharing and compromised passwords. The PasswordSentry Plugin protects your members and your WP from hackers trying to access your members WP accounts. It also protects your bottom line if you run a paysite by blocking members from sharing their passwords with others. The PasswordSentry Plugin depends on the Password Sentry App: <a href=\"https://www.password-sentry.com/\" title=\"Password Sentry\">Password Sentry</a>. The Password Sentry App includes a standalone, web-based control panel (PS AdminCP) to manage Password Sentry App and logged WP users.

**o** Detect and block password sharing via UserTracking and GeoTracking technology

**o** Web-based control panel to administer Password Sentry App, and monitor / manage users

**o** Priority Support [Fee-Based]

**o** FREE Regular Forum Support

**o** FREE updates

**o** Unlimited Domains 

**o** Capability to block logins from specified countries, and/or IP addresses

**o** Monitor and throttle per-user bandwidth

Before you use this plugin, you must FIRST install the Password Sentry App. Once the Password Sentry App is fully installed and configured, you can then activate and configure the PasswordSentry Plugin. This plugin monitors WP logins, checking for password sharing. If password sharing is detected for a given user, that user is automatically suspended, and you are emailed. Suspended users can either be manually restored via PS AdminCP, or you can setup a cron job to automatically restore suspended users after XX minutes.

== Installation ==

1. Download the Password Sentry App: <a target="_blank" href="https://www.password-sentry.com/signup/" title="Password Sentry">Password Sentry Free Signup</a>

2. Install the Password Sentry App. Once installed, via **PS AdminCP :: System :: Preferences :: Password**, set **{Integrated}** to YES. Configure remaining settings, and click on the **[Save Preferences]** button.

3. Install the PasswordSentry Plugin using the built-in WordPress Plugin Installer.

4. From WP Admin Dashboard, click on **Plugins > Installed Plugins** menu link.

5. Find PasswordSentry Plugin, and click on the **Activate** link.

6. Click on the **Settings** link. Then check the **{Enabled}** checkbox. Enter **{API URL}** which is the URL to your sentry.php PS tracking script (located in your Password Sentry App installation directory). Then, click on the **[Save]** button.

Note that the plugin will only be active when (1) Password Sentry App is installed, (2) {PS API Endpoint URL} is defined, and (3) {Status} is set to Enabled.

== Frequently Asked Questions ==

= What is the difference between the Password Sentry App and the PasswordSentry Plugin? =

The Password Sentry App is standalone PHP application which is installed and operated outside the WP environment. The PasswordSentry Plugin is a WP plugin which is installed and operated inside the WP environment. The plugin integrates WP and the Password Sentry App such that the latter can monitor and track WP logins.

= Can the PasswordSentry Plugin be used as standalone plugin without installing the Password Sentry App? =

No. You need to purchase, download and install the <a target="_blank" href="https://www.password-sentry.com/signup/" title="Password Sentry">Password Sentry App</a> first. Then, you can install and enable the PasswordSentry Plugin.

= Does this plugin conflict with other plugins? =

There are no known or reported conflicts, and we have not experienced any conflicts during development and testing. The PasswordSentry Plugin coding applies all WordPress guidelines, so the probability of conflict is essentially zero. If you encounter any issues or conflicts, disable the PasswordSentry Plugin and contact us. We provide lifetime technical support, and will correct any issues at no additional charge - typically same day.

= Is installation included? =

If you require our techs to install for you, we charge a fee of $24.95 (USD) for our techs to install via Jobber app in Client Area. 

= Do you provide technical support? =

Same-day via Priority Support Ticket System (PSTS) by our professional support techs. Technical support is available 7 days a week, 365 days a year - including all holidays. Same day response time. Unlimited and but fee-based. Priority Support is non-subscription based. You will not be rebilled when it expires. At the end of the plan when it expires, you will be reverted back to the Regular Support. Before your Priority Support expires, you will be notified. Fee is $20.00 (USD) for 1 Month Priority Support, or $180.00 (USD) for 12 Month Priority Support.

Regular Support via our Community Forum. Technical support is available 5 days a week excluding all holidays. Response time can vary, and no guarantee with respect to if we respond and when. Unlimited and free. 

= Do you charge for future updates? =

Updates are performed in the PS AdminCP environment via the web-based upgrader app. Unlimited. If you require our techs to upgrade for you, we charge a fee of $24.95 (USD) for our techs to upgrade via Jobber app in Client Area. 

= What happens if I install the Plugin but do not install the Password Sentry App =

Nothing. The PasswordSentry Plugin will detect that Password Sentry App is not installed, and gracefully exit without interfering with the WP login process.

== Screenshots ==

1. PasswordSentry Plugin Settings Page

== Changelog ==
= 1.0.4 (Jul 23 2021) =
* Ensured the plugin is compatible with latest version of WordPress: Version 5.8.
= 1.0.5 (Feb 18 2022) =
* Ensured the plugin is compatible with latest version of WordPress: Version 5.9.
= 1.0.6 (May 24 2022) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.0.
= 1.0.7(Jul 23 2022) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.0.1.
= 1.0.8(Nov 09 2022) =
* Just updated documents.
= 1.0.9(Mar 31 2023) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.2.
= 1.0.10(May 18 2023) =
* Just updated documents and language
= 1.0.11(Aug 16 2023) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.3.
= 1.0.12(Oct 04 2023) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.3.1.
= 1.0.13(Nov 07 2023) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.4.
= 1.0.14(Apr 11 2024) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.5.5
= 1.0.15(Oct 04 2024) =
* Ensured the plugin is compatible with latest version of WordPress: Version 6.6

== Upgrade Notice ==
= 1.0.3 =
This version fixes a tracking related bug. Upgrade immediately.
= 1.0.4 =
Upgrade not critical since no changes made. Optional.
= 1.0.5 =
Upgrade not critical since no changes made. Optional.
= 1.0.6 =
Upgrade not critical since no changes made. Optional.
= 1.0.7 =
Upgrade not critical since no changes made. Optional.
= 1.0.8 =
Upgrade not required since no changes to actual plugin, just documents.
= 1.0.9 =
Upgrade not critical since no changes made. Optional.
= 1.0.10 =
Upgrade not critical since no changes made. Optional.
= 1.0.11 =
Upgrade not critical since no changes made. Optional.
= 1.0.12 =
Upgrade not critical since no changes made with exception of updating docs. Optional.
= 1.0.13 =
Upgrade not critical since no changes made. Optional.
= 1.0.14 =
Upgrade not critical since no changes made. Optional.
= 1.0.15 =
Upgrade not critical since no changes made. Optional.
