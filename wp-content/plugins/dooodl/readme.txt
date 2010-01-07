=== Dooodl ===
Contributors: noCreativity
Tags: doodle, doodles, guestbook, drawing, Flash, sidebar, images,  fun, paint
Requires at least: 2.7
Tested up to: 2.8.5
Stable tag: trunk

Live Demo: [noCreativity.com](http://nocreativity.com/blog/ "View a live demo of Dooodle in the sidebar") 
Dooodl is a fun plugin for your blog that allows your visitors to draw a little doodle and save it to your sidebar together with a little note. It's a bit like a guestbook but less boring and more visual aka more fun!

== Description ==

Live demo: [noCreativity.com](http://nocreativity.com/blog/ "View a live demo of Dooodle in the sidebar") 
Updating? Read this first! [Other notes](http://wordpress.org/extend/plugins/dooodl/other_notes/ "Read this before running the update")

Dooodl is a fun plugin for your blog that allows your visitors to draw a little doodle and save it to your sidebar together with a little note. It's a bit like a guestbook but less boring and more visual aka more fun!

Your visitors will view the latest doodle (image, author and title) in the sidebar and will be able to view all others using the Dooodl History Viewer or add one themselves using the Dooodl Creator.

The result? You'll be able to view what people drew on your sidebar over time. It's fun!

Features:
1. Latest Dooodl is shown as a Widget in the Sidebar along with the author's name, the Dooodl-title and links to the Dooodle Creator and Viewer
2. Cool Flash viewer to see all of the Dooodls visitors have created.
3. If the user has no valid Flash Player or Javascript disabled, he/she is presented a basic HTML version of the viewer.
4. A small Flash Dooodl Creator to allow your visitors to draw anything they like.
5. Great integration with Shadowbox-JS in order to maximize the experience of your visitor.

Note: Would you like your users to have an even better Dooodl experience? Dooodl is Shadowbox ready! Install Shadowbox-JS in order to make full use of the advantages!

== Installation ==

1. Make sure to first backup your database.
2. Upload the `Dooodl` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Add the 'Dooodl'-widget to your sidebar.
5. [Optional] For an optimized experience: install [Shadowbox-JS](http://wordpress.org/extend/plugins/shadowbox-js/ "Shadowbox JS for Wordpress by Matt Martz")
5. You're set!

== Frequently Asked Questions ==

= What do you mean with 'This plugin is Shadowbox ready'? =

It means the links in de sidebar widget are ready to be used by Shadowbox. This greatly improves the Dooodl experience of your visitors. They will not ever be sent to another page as Shadowbox opens the Dooodl Creator and the Dooodl History Viewer in a Shadowbox Dialog. 
No need to worry about installation: Matt Martz created a Wordpress plugin allowing you to install Shadowbox quick and painless to your blog. [Get the plugin here](http://wordpress.org/extend/plugins/shadowbox-js/ "Shadowbox JS for Wordpress by Matt Martz")

= What are those settings in the Dooodl settings page? =

The Dooodl plugin adds a table to your Wordpress database and saves the actual doodles (= images) to a folder in the plugin directory.
The checkboxes in the Dooodl settings pages allow you to choose whether you want to remove that table and the images when you deactivate the plugin. 

= Can I view a live demo somewhere? =

Yes you can! Head over to my blog and see it for yourself: [noCreativity.com](http://nocreativity.com/blog/ "View a live demo of Dooodle in the sidebar") 

== Screenshots ==

1. This is what the widget in the sidebar looks like. 
2. The current Dooodl History viewer (using Shadowbox to view it as a dialog on your current page). This is the Flash version. (I'm working on creating cooler one ;))
3. Viewing a Dooodl in the Dooodl History Viewer.
4. Viewing the message your visitors wrote when they submitted the Dooodl.
5. The HTML Dooodl History viewer. This is the HTML version for people that don't have Flash installed / Flash blocked / Javascript Disabled / using a mobile device that doesn't support Flash (most mobile phones for example)
6. The Dooodl Creator (using Shadowbox to view it as a dialog on your current page).
7. The form before submitting your image. All fields are optional.
8. The Dooodl Settings page.

== READ BEFORE UPDATING TO 1.0.5 == 
**IMPORTANT**: Are you using any version below 1.0.3? Read this first and make sure you've a save backup of the images. This is a one time deal, so take your time and do this carefully.

Before updating, download the /wp-content/plugins/dooodl/doodls/ folder. This folder contains all doodles your users saved. **If you don't, you will lose all images your users saved**. 
Create a folder in /wp-content/uploads/ and name it 'doodls'. Upload the images to this(/wp-content/uploads/doodls/) folder. 
Now you can upgrade the new version of the plugin.

More info: The previous versions of this plugin saved the Doodls in the plugin folder itself. However updating the plugin using the automatic update function overwrites the folder used to saved the images in. (It happened to me...)

Sorry for the problems, guys. I hope none of you lost anything. If you did, I'm terribly sorry. I really didn't know the plugin would be deleted (and therefore deleting the files inside the doodls folder)

== Changelog ==

= 1.0.13 =
* Little Javascript error.
* Note: Ever since Shadowbox-js updated the autoload() doesn't work anymore... 

= 1.0.12 =
* Added stripslashes to the widget. Overlooked that a few times. My bad :)

= 1.0.11 =
* Changed the xml.php output in order to make sure the content is fully validated.

= 1.0.10 =
* Fixed a compatibility issue caused by a action_handler in the plugin. 

= 1.0.9 = 
* 'stripslash()'ed the description and the title in the Viewer HTML and XML feeds.

= 1.0.8 = 
* Enabled the plugin to be called using '<? if (function_exists("Dooodl_widget")) Dooodl_widget(); ?>' in themes that are not widget-ready.

= 1.0.7 =
* Minor Bugfixes

= 1.0.6 =
* Added a smaller brush to the Dooodl Creator.

= 1.0.5 =
* Updated and optimized the uninstall procedure to delete the /uploads/doodls/ folder and its contents if the 'Remove Doodls Option' is checked.

= 1.0.4 = 
* Updated the install procedure to add the 1.jpg (the default doodle) to the uploads/doodls/ folder.

= 1.0.3 = 
* Moved the save folder to /wp_content/uploads/doodls/ to make sure upgrading the plugin doesn't delete the images when updating.
* Code cleaning

= 1.0.2 =
* Added deeplinking
* Added settings link in the plugin list

= 1.0.1 =
* First public version as a plugin

= 1.0 =
* This was the first version (not open to the public)
