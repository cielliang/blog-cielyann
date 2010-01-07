=== Fluency Admin ===
Contributors: deanjrobinson
Donate link: http://deanjrobinson.com/donate/
Tags: fluency, admin, plugin, theme, login, design
Requires at least: 2.8
Tested up to: 2.9
Stable tag: 2.2

Give your WordPress admin the Fluency look, Fluency 2.2 is the latest update and is compatible with WP 2.9.x.

== Description ==

Fluency Admin give the WordPress admin interface a boost, with a new style and some cool features.

Features include:

* Hover menus
* Switch bettwen full menu view and icon-only view
* Hot keys for menu/submenu access
* Support for both Grey and Classic/Blue color schemes
* Turn on/off Fluency login styles
* Display your own custom logo on WP Login page

New in Fluency 2.2:

* Customisable menu width (for users with wiiiide menu items)
* Disable menu fixed positioning (for users with loooong menus)
* Option to hide icons from menu when in expanded mode
* Tested with a few more plugins for compatibility
* Bug fixes and updates to support WordPress 2.9

== Installation ==

There a couple of ways to install Fluency Admin on your WordPress blog.

First up, you can download it directly from the WordPress.org plugins directory, and install it by following these steps:

1. Upload the whole fluency admin directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

Or, you can install it directory from the Admin section of your WordPress blog by following these steps:

1. Under the 'Plugins' menu in WordPress select 'Add New'
2. Enter 'Fluency Admin' into the search box
3. Choose the 'install' option on the right hand side of the Fluency Admin listing

== Frequently Asked Questions ==

= What browsers does this work in? =

Fluency Admin has been tested in the latest versions of Safari, Firefox, Opera, Camino and Internet Explorer. Users of Camino, Opera and Internet Explorer may experience some display "issues" to to each browsers particular css-handling ability.

Internet Explorer 6 is NOT supported. It is an 8 year old browser which has now been superseded twice. Upgrade. Please.
Internet Explorer 7 works with the exception of a few display bugs.
Internet Explorer works pretty well except for the lack of CSS3.

= Why doesn't my plugin work with Fluency? =

The majority of plugins should work without issue when Fluency is activated, however there are a few that don't for one reason or another. If you come across a plugin that doesn't play nice with Fluency please let me know so that I can address any issues in a future release.

Most common cause of a plugins incompatibility are highly custom admin pages, ie. those that don't follow the standard WordPress admin design. In the majority of these cases its not particularly feasible for me to write a bunch of custom styles just to get them to play nice.

= How do I get support for plugin X to be added to Fluency? =

Leave a comment on my blog or post something in the support forum here on WordPress.org.

Please note that I will not test be testing commercial paid for plugins or those that require me to signup to some spam laden site just to download and/or use them.

= What plugins have been tested with Fluency Admin? =

The following plugins have been tested with Fluency 2.2, any minors issues noted.

* Acronyms 1.6.2
* Akismet
* Analytics360
* cFormsII 11.1 (not pretty, but functional, the admin pages are too far from the WP standard)
* Contact Form 7
* Event Calendar
* Events Calendar 6.6
* Feedburner Feed Replacement
* Fresh Page (Flutter) 1.1
* Google Analytics
* Google XML Sitemaps
* Gregarious (not pretty, but fully functional)
* Headspace2 3.6.32
* My Category Order 2.8.3
* NextGen Gallery 1.4.3
* One Click Plugin Updater 2.4.14
* OpenID
* Order Categories
* Page Management Dropdown 2.1
* PageMash 1.3.0
* Simple Tags
* Subscribe To Comments
* WordPress Download Monitor
* WP-Polls 2.50
* WP-PostRatings
* wp-typogrify
* WP Movie Ratings

== Screenshots ==

1. The Dashboard
2. Add New Post
3. Edit Posts
4. Blue/Classic color scheme - Dashboard
5. Blue/Classic color scheme - Add New Post
6. Blue/Classic color scheme - Edit Posts

== Changelog ==

= 2.2 =
* Update css to work with changes introduced in 2.9
* Fixed Login styles for WP2.9
* Now using wp_enqueue_style and wp_enqueue_script functions
* Added custom menu width option for users with wide menu items that were previously wrapping over multiple lines
* Added option to disable the fixed positioned menu for users with lots of plugins that add menu items or that have small screens

= 2.1.1 =
* Fixed display issues with Acronyms, NextGen Gallery, One-Click Plugin Updater, HeadSpace2 and WP-Polls
* Fixed broken styling of Media Library popup
* Fixed custom menu icons no longer display over default icon
* Fixed positioning of "Update WordPress" message (not perfect, but better)
* Added option to set custom logo to display at the top of the menu (replaces WordPress logo)

= 2.1 =
* Updated css to work with slight changes introduced in WordPress 2.8.x
* Updated menu script to fix bug with long submenus disappearing off screen.
* Updated hotkeys to work with submenus longer that 9 items
* Added support for collapsing/showing side menu.
* Added Blue/Classic color scheme (based on user preference).
* Added option to disable the Fluency style on the login screen.
* Added option to specify a custom logo to be show on the login screen.
* Added function to add Akismet menu item to the Comments submenu (if Akismet is activated)

= 2.0 =
* Complete re-write of Fluency to work with the all-new Admin interface that was introduced in WordPress 2.7
