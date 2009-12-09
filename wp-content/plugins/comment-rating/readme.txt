=== Comment Rating ===
Contributors: bobking
Tags: comments, vote, poll, polls, image, images, rating, ratings, comment, AJAX, javascript, automatic, button, plugin, plugins, Dislike, Like, embed, Formatting, user, users, visitors, text, counter, cms, highlight, digg, integration, thumb, tool, style, youtube, community
Donate link: http://WealthyNetizen.com/donate/
Requires at least: 2.3
Tested up to: 2.8.5
Stable tag: 2.8.4

Allows visitors to rate comments in Like vs. Dislike fashion with
clickable images. Poorly-rated & highly-rated comments are displayed differently.
This plugin is simple and light-weight. 

== Description ==

If you're tired of moderating readers' comments on your blog, stop doing
that and let your readers decide which comment deserves to be shown.
If you're getting outrageous comments on your blog, don't get too
angry yet.  Let's see how many readers feel the same.  You can
do these tasks (and more) with the Comment Rating plugin.

Comment Rating makes "user moderated content" possible.
This plugin automatically embeds clickable images in comments using
simple AJAX javascript (no heavy jQuery) to allow visitors rate comments in
Like vs. Dislike fashion.  The votes are displayed along with the
comments in either two numbers, one combined, or both.

Once the user ratings are in place, the comments can be displayed
and styled accordingly.  Poorly rated comments (too many Dislikes,
not enough Likes) can be hidden in a click-to-see link, just like
those on Digg.  Highly-rated comments (a lot Likes and few Dislikes)
can be highlighted.  Hotly-debated comments (many Likes and
Dislikes) can also be highlighted to draw more attention, to encourage
more votes and comments. 

The threshholds for all three types of comments are configurable.
So are the styling.  Styling can be done with background color,
opacity,fonts, etc. on the comment as well as the entire comment box.

This plugin allows using Wordpress as a general CMS in a
Web 2.0 fashion.  User generated content can be rated and their
display influnced by other users. An example website is
<a href="http://captionwit.com">Caption Wit</a>.

Summary of key features;

*  Auto-insert to comments AJAX based clickable images 
*  Configurable display of two vote numbers, a combined one or both
*  Preventing voting fraud with one vote per IP address. This is less subject to manipulation than cookie based approaches. The author of a comment cannot rate his/her own comment.
*  Styling of popular and mostly debated comments based on on the votes
*  Poorly rated comments can be hidden in a click-to-see fashion. 
*  Styling of the vote numbers differently. 
*  Mouseover effect on images to entice voting
*  Choice of images and image size
*  Localization for multi-lingual support
*  Functions are provide for theme customization.
*  Allow vote types of: positive only, negative only votes or both.
*  Store votes in wp_comments table comment_karma field. Stored votes can be: positive only, negative only or combined.
*  Simple and light-weight (i.e. high performance).  It's also wp-cache and wp-super-cache friendly.

Comment Rating plugin is built on top of Alex Bailey's discontinued Comment Karma.
Thanks to Jean-Paul Horn and many other users for ideas and suggestions.


== Installation ==

1. After download the plug in, you can upload and install it from 
Wordpress Dashboard -> Plugins -> Add New. Alternatively, you can
unpack and upload the dir with files to the wp-content/plugins folder on your blog.  

1. Activate the plugin.

1. You can configure the options under Setting -> Comment Rating.
The default options should be good enough. It works out of box. You
are done. Sit back and have a look at your blog.

1. If you want to tailor the display format further, you can turn
off auto-insertion into comments and add the following line to an
appropriate place in your theme "comments.php" file within the comment loop.
 if(function_exists(ckrating_display_karma)) { ckrating_display_karma(); }

More about custom installation in the <a href="http://wealthynetizen.com/comment-rating-plugin-faq/"> Comment Rating plugin FAQ</a>.

== Frequently Asked Questions ==

Please see <a href="http://wealthynetizen.com/comment-rating-plugin-faq/"> Comment Rating plugin FAQ</a>.

== ToDo List ==

If you want to request a feature, please post to <a href="http://wealthynetizen.com/comment-rating-plugin-todo-list/"> Comment Rating ToDo List</a>.

== Screenshots ==

1. Example a Wordpress installation right after installation.

2. An example website <a href="http://captionwit.com">Caption Wit</a>.

3. Option page showing the rich & flexible configuration features.

== Changelog ==

= 2.8.3 =

French translation by Charlie Borghini.

= 2.8.2 =

Tested on WordPress 2.8.5

= 2.8.2 =

*  Store votes in wp_comments table comment_karma field. Stored votes can be: positive only, negative only or combined.
*  Add database access caching, improve efficiency.
*  Fix the known bug that, If you enable Comment Rating, disable it and then enable it again,  the comments were made during the disabling period will not have any database record and won't show any rating images.

= 2.8.1 =

Fix a Javascript bug when choosing Likes-only or Dislikes-only.

= 2.8.0 =

Allow vote type of: positive only, negative only votes or both.

= 2.7.8 =

Arabic Yemen translation by  <a href="http://www.teedoz.com">Thamood Binmahfooz</a>

= 2.7.7 =

* Add options for mouseover effect
* Spanish translation by <a href="http://www.plataformanetworks.com">David Basulto</a>.

= 2.7.6 =

Fix missing closing tag in hidden comments.

= 2.7.5 =

* Add youtub style voting images.
* Fix the hidden comment not displayed bug, introduced in version 2.7.4 

= 2.7.4 =

* Add option to turn off inline style sheet and javascript loading.
This helps power users to customize their theme efficiently.

* Bulgarian translation by <a href="http://itws.eu">ITWS</a>.

= 2.7.2 =

NL translation by <a href="http://www.iphoneclub.nl">iPhoneclub.nl</a>.

= 2.7.1 =

* Added localization capability. 
* Please help out with translation.

= 2.7.0 =

* Add hotly-debated highlighting.
* Add option to turn off comment box, to avoid messy styling for
nested comments.
* Wording before the image now changes with the rating of the comment.
* Made all javascript function/var name unique.
* Fix the get_bloginfo('wpurl') bug.
* Fix an incompatibility with WP Super Cache.

= 2.6.1 =

* 2.6.0 turns out to be rather stable.  
* Add thumb image titles. 

= 2.6.0 =

* Allow display of 1, 2 or both voting numbers.  
* Add styling of the numbers. 
* Add mouseover effect to images
* Add choice of images.
* Add choice of image size

= 2.5.2 =

* Turn off duplicated vote error message.  Duplicated votes are
skipped in counting.
* Add an empty space between vote number and image.

= 2.5.1 =

Fix javascript loading problem in admin pages.

= 2.5.0 =

* Add option to choose one number or two.
* Use checkmark to indicate voting success.

= 2.4.6 =

Fix a bug that caused non-valide XHTML.

= 2.4.4 =

* Add "!important" to default styling to avoid being overriden.
* Change option page layout.  change highly/poorly rated criteria.

= 2.4.2 =

Enhance the highly-rated comment styling to the entire comment box.

= 2.4.1 =

* Change default threshholds on highlight good comments and hide poor comments.

* Fixing the bug: when auto-insert is turned off, comment highlighting
and hiding are missing too.

= 2.4.0 =

Adding styling to highly-rated comments.

= 2.3.3 =

Correct image alt text.  Remove mentioning of IP address in error
message.

= 2.3.2 =

* Fix a bug for rating threshhold.
* Add fine-tuned control to turn off rating for admin/author's comments.

= 2.3 =

Comments disliked too much by readers will be hidden in a click-to-show link.

= 2.2 =

Add flexibility with an option page.

= 2.1 =

Add auto-insertion rating images into comments, and javascript to footer

= 2.0 =

* Change the vote counter from 1 (total) to 2 (Likes and Dislikes) and
display them separately.
* Added index to vote count table. Improved the plug-in performance

