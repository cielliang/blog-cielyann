=== WP-CopyProtect [Protect your posts] ===
Contributors: cchetanonline
Donate link: http://www.thechetan.com/wp-copyprotect/#donate
Tags: post, posts, copy, protect, right, click, disable, copyprotect, Google, SEO, page, plugin, access, content, javascript, security, wp-copyprotect, RSS, fetcher, duplicate, Bing, 
Requires at least: 2
Tested up to: 2.9
Stable tag: 1.9.1

Protect your blog content from getting copied. A simple plug-in developed to stop the Copy cats

== Description ==

Protect your blog content from getting copied. A simple plug-in developed to stop the Copy cats

= This plug-in will =
* **Disable selection of text** 
* **Disable right click** on your blog 

So that no one can simply copy and paste the content of your blog in there blog or site.

= Please note = 
* Both *disable right click* and *disable selection of text* can be switch ON or OFF through *Settings* menu.
* **You must enable the options** from WP-CopyProtect settings page after installing the plugin, to enable the protection to your blog.

 Why dont you rate the plugin if you like it !! :)  >> 

** *Latest* release 1.9.1 : VALID XHTML (Validation errors removed) + Compatable with WP-2.9 **


By [Chetan Gole](http://chetangole.com/).

== Installation ==

1. Upload `wp-copyprotect.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to **Settings** and then **WP-CopyProtect** to configure and enable.

== Frequently Asked Questions ==

= Why Disable content selection is not working ? =

Actually your theme doesn't have `<?php wp_footer(); ?>` in footer, so please edit the footer of your theme and insert that code. 
To edit the theme  go to Design >> Theme Editor >> Select "Footer.php" from right hand list >>  and paste `<?php wp_footer(); ?>` just before the '< /body >' tag.
If possible add this code near to Wordpress link. 
The "disable Content selection" will start working.

= I have problems and questions =

Catch me on [Wp-CopyProtect Homepage](http://www.thechetan.com/wp-copyprotect/)

== Screenshots ==
1. Configuration page

== Change Log ==
* ver : 1.9.1.0 : Compatiblility tag added for Wp 2.9 .
* ver : 1.9.0.0 : VALID XHTML (Validation errors removed).
* ver : 1.8.0.0 : Update for Wordpress 2.8 with change in settng page.