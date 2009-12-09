=== Mini Mail Dashboard Widget ===
Contributors: Marcel Bokhorst
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=AJSBB7DGNA3MJ&lc=US&item_name=Mini%20Mail%20Dashboard%20Widget%20WordPress%20Plugin&item_number=Marcel%20Bokhorst&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: e-mail, email, mail, sms, notify, notification, admin, dashboard, widget, security, ajax
Requires at least: 2.7
Tested up to: 2.8.4
Stable tag: 1.0.4

Send and receive e-mails on the administration panel and optionally receive SMS messages when new messages arrive.

== Description ==

Send and receive e-mail messages on the administration panel and optionally receive SMS messages containing the sender, subject and (part of) the text when new messages arrive.

All e-mail is text based ([HTML](http://en.wikipedia.org/wiki/HTML "HTML") will be converted to text). However, it is possible to view HTML messages and to download attachments. Mail can be received by [POP3](http://en.wikipedia.org/wiki/POP3 "POP3") or [IMAP](http://en.wikipedia.org/wiki/IMAP "IMAP") and sent by [PHP mail](http://www.php.net/mail "PHP mail") or [SMTP](http://en.wikipedia.org/wiki/SMTP "SMTP"). There is a simple address book for both e-mail addresses and phone numbers, which can optionally be populated by your WordPress users.

See [Other Notes](http://wordpress.org/extend/plugins/mini-mail-dashboard-widget/other_notes/ "Other Notes") for usage instructions.

**This plugin requires at least PHP 5.2.4.**

Please report any issue you have on the [support page](http://blog.bokhorst.biz/2414/computers-en-internet/wordpress-plugin-mini-mail-dashboard-widget/ "Marcel's weblog"), so I can at least try to fix it.

See my [other plugins](http://wordpress.org/extend/plugins/profile/m66b "Marcel Bokhorst").

== Installation ==

*Using the WordPress dashboard*

1. Login to your weblog
1. Go to Plugins
1. Select Add New
1. Search for Mini Mail Dashboard Widget
1. Select Install
1. Select Install Now
1. Select Activate Plugin

*Manual*

1. Download and unzip the plugin
1. Upload the entire *mini-mail-dashboard-widget/* directory to the */wp-content/plugins/* directory
1. Activate the plugin through the Plugins menu in WordPress

== Frequently Asked Questions ==

= Why did you write this plugin? =

See [here](http://blog.bokhorst.biz/2414/computers-en-internet/wordpress-plugin-mini-mail-dashboard-widget/ "Marcel's weblog").

= Is this plugin multi-user? =

Yes.

= Who can access the tools menu? =

Users with *publish\_posts* capability (authors).

= Who can access the general settings? =

Users with *manage\_options* capability (administrators).

= How can I change the styling? =

1. Copy *wp-mini-mail.css* to your theme directory to prevent it from being overwritten by an update
2. Change the style sheet to your wishes; the style sheet contains documentation

= Why does this plugin require at least PHP version 5.2.4? =

Because this is [a requirement](http://framework.zend.com/manual/en/requirements.html#requirements.version "PHP 5.2.4") of the Zend Framework.

= Are you affiliated to VoipBuster? =

No.

= Can you give me an example of an SMS schedule? =

To receive SMS notifications from 9am to 5pm on working days you could use the following schedule:

* +9:00
* -17:00
* -Sat
* -Sun

= What does 'Connection refused' mean? =

Probably that your hosting provider has blocked POP3, IMAP and/or SMTP.
Try switching from IMAP to POP3 and/or from SMTP to PHP mail.

= Why are not all new e-mail messages marked as unread? =

Because e-mail messages for which SMS notifications are sent are considered as read.

= Where can I ask questions, report bugs and request features? =

You can write comments on the [support page](http://blog.bokhorst.biz/2414/computers-en-internet/wordpress-plugin-mini-mail-dashboard-widget/ "Marcel's weblog").

== Screenshots ==

1. The Mini Mail Dashboard Widget

== Changelog ==

= 1.0.4 =
* Updated Farsi translation

= 1.0.3 =
* Added Farsi (fa\_IR) translation by [Jafar](http://www.nanakar.ir/ "Jafar")

= 1.0.2 =
* Updated everything, but forgot to add translation to subversion ...

= 1.0.1 =
* Added German (de\_DE) translation by [Jan](http://terrarienpflanzen-lexikon.de/ "Jan")

= 1.0 =
* Added option to send announcement e-mails to WordPress users
* Added resources panel to tools menu
* Updated Dutch and Flemisch translations
* Updated to version 1, because there were no error reports so far

= 0.10 =
* Added checks for missing phone number / e-mail address

= 0.9 =
* Replaced *private* by *var* for class variables
* Undone change 0.8.2
* Reduced required capability for tools menu to *edit_posts*
* Added option to limit number of SMS messages per day
* Updated Dutch and Flemisch translations

= 0.8.2 =
* Checking PHP version before loading classes

= 0.8.1 =
* Disabled wrapping of text lines at column 70

= 0.8 =
* Added option to limit SMS message length
* Added option to limit from/subject/text length SMS notifications
* Updated Dutch and Flemisch translations
* Updated documentation (faq)

= 0.7.3 =
* Fix for non-cached HTML message view

= 0.7.2 =
* Fix for SMS phone number
* Replacing unsupported characters in SMS messages

= 0.7.1 =
* Fix for address/phone book

= 0.7 =
* Added option to download attachments
* Added call to *htmlspecialchars* to process message text
* Splitted mail connection and handling
* Improved logging
* Updated Dutch and Flemisch translations

= 0.6 =
* Added some HTML entities and JavaScript escapes
* Moved widget configuration to tools menu to allow non-administrators access
* Added option to in/exclude WordPress address book (default off for privacy reasons)
* Calling *stripslashes* to process form input
* Showing message data when deleting a message
* Updated Dutch and Flemisch translations
* Updated documentation

= 0.5 =
* Allowing multiple to/cc addresses (comma separates)
* Added address book to cc too
* Improved parsing/handling of addresses
* Some little code improvements (it's never perfect ;))

= 0.4 =
* Added option to view HTML messages
* Resetting address book when reply/forward
* Improved logging

= 0.3.1 =
* Fix for SMS schedule, which is now default off

= 0.3 =
* Added CC field to compose message
* Applying *htmlspecialchars* to error messages
* Calling *load\_plugin\_textdomain* for ajax calls
* Updated Dutch and Flemisch translations
* Some little code improvements

= 0.2.1 =
* Fix for fix for encoded headers with surrounding quotes

= 0.2 =
* Added Dutch and Flemisch translations (nl\_NL/be\_NL)
* Fixed bug: name of to address was set incorrect
* Fixed bug: use first address if multiple present (Reply-To)
* Improved style of compose buttons
* Fix for encoded headers with surrounding quotes

= 0.1 =
* Initial version

= 0.0 =
* Development version

== Usage ==

Goto *Tools*, *Mini Mail*.

*Receiving mail*

1. Select at least a receive method in the *Mail* section
1. Fill in the *POP3* or *IMAP* settings

*Sending mail*

1. Fill in at least your e-mail address in the *Mail* section
1. Select at least a send method in the *Mail* section
1. Fill in the *SMTP* settings if needed

PHP mail is the simplest to use and probably allowed by your hosting provider.

*Sending SMS*

1. Register at one of the [VoipBuster clones](http://progx.ch/home-voip-smsbetamax-3-1-1.html "VoipBuster clones") and buy some credit
1. Fill in the SMS settings

*Save* the settings

The *General* settings are site-wide and only accessible for users with *manage\_options* capability (administrators).
All other settings are user specific.

== Acknowledgments ==

This plugin uses:

* [Zend Framework](http://framework.zend.com/ "Zend Framework") published under the new BSD license

* [XML Parser Class](http://www.criticaldevelopment.net/xml/ "XML Parser Class")
by *Adam A. Flynn* and published under the GNU Lesser General Public License version 2

* [PHP Class: HTML to Plain Text Conversion](http://www.chuggnutt.com/html2text.php "HTML to Plain Text Conversion")
by *Jonathon T. Abernathy* et al and published under the GNU General Public License version 2

* [jQuery JavaScript Library](http://jquery.com/ "jQuery") published under both the GNU General Public License and MIT License

* Ajax loader image generated by [ajaxload.info](http://ajaxload.info/ "ajaxload.info") "totally free for use"

* [Info](http://commons.wikimedia.org/wiki/File:Info_Simple_bw.svg "File:Info_Simple_bw.svg"),
[delete](http://commons.wikimedia.org/wiki/File:Pictogram_voting_delete.svg "Pictogram_voting_delete.svg") and
[attachment](http://commons.wikimedia.org/wiki/File:Gnome-mail-attachment.svg "File:Gnome-mail-attachment.svg")
icons from [Wikimedia Commons](http://commons.wikimedia.org/ "Wikimedia Commons")
published under the GNU General Public License version 2 or released in the [public domain](http://en.wikipedia.org/wiki/Public_domain "public domain")
