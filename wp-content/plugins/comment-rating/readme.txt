=== Comment Rating ===
Contributors: bobking
Tags: comments, comment rating, vote, poll, polls, image, images, rating, ratings, comment, AJAX, javascript, automatic, button, plugin, plugins, Dislike, Like, embed, Formatting, user, users, visitor, visitors, Karma, text, counter, cms, highlight, digg, integration, thumb, tool, hidden, clickable image
Donate link: http://WealthyNetizen.com/donate/
Requires at least: 2.3
Tested up to: 2.8.4
Stable tag: 2.6.1

Allows visitors to rate comments in Like vs. Dislike fashion with
clickable images. Poorly-rated & highly-rated comments are displayed differently.
This plugin is simple and light-weight. 

== Description ==

If you're tired of approving readers' comments on your blog, stop doing
that and let your readers decide which comment deserves to be shown.
If you're getting outrageous comments on your blog, don't get too
angry yet.  Let's see how many readers feel the same.  You can
do these two tasks with the Comment Rating plugin.

This plugin automatically embeds clickable images in comments. It 
uses simple AJAX javascript to allow your visitors rate comments in
Like vs. Dislike fashion.  The votes are displayed along with the
comments in either two numbers, one combined, or both.  The up or
down vote counters will change rightaway after the visitor casts a
vote and the images change from color to grey indicating the vote
has been accepted.

To prevent cheating, only one vote is allowed per IP address.  This
is less subject to manipulation than cookie based approaches. The author
of a comment cannot rate his/her own comment.

Poorly rated comments (too many Dislikes,
not enough Likes) can be hidden in a click-to-see link, just like
those on Digg. The threshholds for the rating is configurable.  This
way, comments from trolls and "bad guys" will be hidden by default
for anyone who doesn't want to see them, with the option to read the
comment if they really want to.  Formatting of the hidden comments
can be customized.

Highly-rated comments can also be displayed differently. The default
styling is to highlight them. You can customize it e.g. with different fonts.

This plugin allows using Wordpress as a general CMS in a
Web 2.0 fashion.  User generated content can be rated and their
display influnced by other users. An example website is
<a href="http://captionwit.com">Caption Wit</a>.

Summary of key features;

*  AJAX based clickable images 
*  Configurable display of two vote numbers, a combined one or both
*  Preventing cheating with one vote per IP address
*  Styling of popular comments based on on the votes
*  Poorly rated comments can be hidden in a click-to-see fashion. 
*  Styling of the vote numbers differently. 
*  Mouseover effect on images to entice voting
*  Choice of images and image size
*  Simple and light-weight (i.e. high performance).  It's also wp-cache and wp-super-cache friendly.

Comment Rating plugin is built on top of
<a href="http://cyber-knowledge.net">Alex Bailey's discontinued Comment Karma</a>.
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

== Frequently Asked Questions ==

= Why are the voting image in gray? =

Author of the post is not allowed to vote on user comments.  But if
you change to a different IP address, you'll then be able to do so.

= Why doesn't the votes number change ? =

The up or down vote counters will change rightaway after the visitor
has casted a vote and change color to grey indicating the vote has
been accepted.  However, if you have wp-cache or wp-super-cache
enable, other visitors will not see the refreshed vote counters until
the cached page expires and reload.

To keep the vote counters fresh, please set wp-cache/wp-super-cache 
Expiry time to 1 hour or less.


== Screenshots ==

1. Example a Wordpress installation right after installation.

2. Taken from example website <a href="http://captionwit.com">Caption Wit</a>.

3. Option page showing its configurability.

== Changelog ==

= 2.6.1 =

2.6.0 turns out to be rather stable.  
Add thumb image titles. 

= 2.6.0 =

Allow display of 1, 2 or both voting numbers.  
Add styling of the numbers. 
Add mouseover effect to images
Add choice of images.
Add choice of image size

= 2.5.2 =

Turn off duplicated vote error message.  Duplicated votes are
skipped in counting.
Add an empty space between vote number and image.

= 2.5.1 =

Fix javascript loading problem in admin pages.

= 2.5.0 =

Add option to choose one number or two.  Use checkmark to indicate voting success.

= 2.4.6 =

Fix a bug that caused non-valide XHTML.

= 2.4.4 =

Add "!important" to default styling to avoid being overriden.
Change option page layout.  change highly/poorly rated criteria.

= 2.4.2 =

Enhance the highly-rated comment styling to the entire comment box.

= 2.4.1 =

Change default threshholds on highlight good comments and hide poor
comments.

Fixing the bug: when auto-insert is turned off, comment highlighting
and hiding are missing too.

= 2.4.0 =

Adding styling to highly-rated comments.

= 2.3.3 =

Correct image alt text.  Remove mentioning of IP address in error
message.

= 2.3.2 =

Fix a bug for rating threshhold. Add fine-tuned control to turn off
rating for admin/author's comments.

= 2.3 =

Comments disliked too much by readers
will be hidden in a click-to-show link.

= 2.2 =

Add flexibility with an option page.

= 2.1 =

Add auto-insertion rating images into comments, and javascript to footer

= 2.0 =

Change the vote counter from 1 (total) to 2 (Likes and Dislikes) and
display them separately.
Added index to vote count table. Improved the plug-in performance

