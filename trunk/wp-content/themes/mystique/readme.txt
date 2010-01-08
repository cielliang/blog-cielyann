

Project page:
http://digitalnature.ro/projects/mystique

Licensed under GPL
http://www.opensource.org/licenses/gpl-license.php


CREDITS:
- digitalnature - http://digitalnature.ro (design and coding)
- Dkret3 theme by Joern Kretzschmar - http://diekretzschmars.de
- Sandbox theme - http://www.plaintxt.org/themes/sandbox
- Tarski theme - http://tarskitheme.com
- jQuery - http://jquery.com
- jQuery Flickr plug-in by Daniel MacDonald - www.projectatomic.com
- loopedSlider by Nathan Searles - http://nathansearles.com/loopedslider
- clearfield by Stijn Van Minnebruggen - http://www.donotfold.be
- Fancybox by Janis Skarnelis - http://fancybox.net
- Recent comments by George Notaras - http://www.g-loaded.eu/2006/01/15/simple-recent-comments-wordpress-plugin/
- Smashing Magazine - http://smashingmagazine.com
- Wordpress - http://wordpress.org
- French translation by Sebastien Revollon
- German translation by Pascal Herbert
- Chinese translation by Awu - http://www.awuit.cn
- Polish translation by 96th http://96th.co.uk
- Swedish translation by Magnus Jonasson - http://www.magnusjonasson.com
- jQuery Farbtastic plugin by Steven Wittens
- Spanish translation by Facundo Jordan - http://nogardtech.com.ar
- Italian translation by Alessandro Fiorotto
- Turkish translation by Ömer Taylan Tugut http://www.tuguts.com ; old translation by Erdinç Gür - http://www.turkonline.org 
- Arabic translation by http://www.anas-b.com
- member only content shortcodes - http://justintadlock.com/archives/2009/05/09/using-shortcodes-to-show-members-only-content
- google pie chart shortcode - http://blue-anvil.com/archives/8-fun-useful-shortcode-functions-for-wordpress
- Russian translation by CyberAP - http://anna-sophia-robb.com
- Brazilian Portuguese translation by Atilio Baroni Filho
- CodeMirror javascript library - http://marijn.haverbeke.nl/codemirror
- Czech translation by Lukáš Stredula - http://blog.thatrocked.com
- "Read more" ajax based on "Read More Right Here" plugin by William King - http://www.wooliet.com
- Danish translation by Søren Eskilsen - http://soeren.benzon.org

REQUIREMENTS:
- PHP 5+
- Wordpress or Wordpress MU, 2.8+ required

TO DO: (a list of things to remember I need to do in the future)
- add hide delay to shareThis
- add Facebook connect, twitter and OpenID login to comment box
- featured content: check if images from posts are links and show the link source image in the lightbox
- add footer content filter for wpmu blogs to allow a few html tags like <p> <br> <a> etc...

CHANGE LOG:
             1.62 - bug fixes in theme settings and search page
             1.61 - removed small glitch in comments

28,12,2009: v1.6  - added more restrictions for wpmu blogs: non-admin users are not allowed to post html in footer, add advertisments or add html trough shortcodes
                  - changed comment date/time with timeSince
                  - changes to black nav style (to see them remove the old css & add the new one)
                  - changes to read more links
                  - search page form improvements (don't show more than one form on the page, highlight search terms)
                  - added the [widget] shortcode. more info @ http://wordpress.digitalnature.ro/mystique/shortcodes/arbitrary-widgets-inside-posts
                  - optimized [query] shortcode
                  - improvements and minor js bug-fixes in theme settings
                  - changes to featured content options
                  - replaced wp's reply js with mine, jquery based
                  - changed default thumbnail size and added a option for this
                  - replaced "short post" view with the default one
                  - support for wp-print
                  - made twitter widget show cached tweets if twitter request ends in a error (not more than a 6 hour cache)

19,12,2009: v1.53 - user/default background image improvements
                  - added file upload security checks in theme settings (very important for public wpmu blogs so the users don't upload malicious scripts)
                  - added active menu styles for category navigation type

18,12,2009: v1.5  - twitter widget now loads all data trough ajax to avoid slow page loading (jquery must be enabled)
                  - fancybox plugin compatibility
                  - made theme preview iframe load with ajax so it doesn't affect the theme settings loading time
                  - fixed caption center alignment issue
                  - made twitter widget compatible with php<=4.x
                  - updated post thumbnail functions for the latest beta changes
                  - updated translations and fixed a small theme settings bug
                  - support for 2.9 post thumbnails
                  - added checkboxes for pages/categories in exclude nav. option
                  - added CodeMirror for theme settings code related textareas
                  - restricted <head> php code setting for wpmu users
                  - fixed a XSS vulnerability in search

29,11,2009: v1.4  - added advertisment slots, [ad] shortcode + mystique settings/ads
                  - css fixes and design teaks to navigation and comments
                  - added black navigation style
                  - improvements to user css section
                  - added head code option by request
                  - added twitter button thing by request, visible if the widget was activated at least once
                  - tiny URL fix (extra quote)

25,11,2009: v1.3  - important bug fix to the [query] shortcode, related posts and featured content posts
                  - added yahoo buzz to share post buttons
                  - translation string fixes and updates
                  - sidebar tab clear fix on imageless layout
                  - replaced twitter js functions with wordpress functions
                  - removed default meta widget
                  - login widget url fix (thank Kvera)
                  - replaced curl function with wp_remote_get :)
                  - added [tinyurl] shortcode
                  - flash object alignment fix

12,10,2009: v1.2  - removed div.clear (replaced with clearfix class)
                  - translation updates
                  - fixed some mark-up errors in ShareThis
                  - flash z-index "fix" (wmode=transparent is added with jQuery)
                  - changes to twitter widget js (multiple widgets work now)
                  - improvements to post tags
                  - added more shortcodes
                  - replaced old custom fields with the [query] shortcode (hide_title custom field still exists)
                  - added the option to resize sidebar(s), only with col-3/col-2-right layout
                  - fixed a bug with page controls (not showing when there are no widgets in the footer)
                  - using curl for TinyURL links (will revert to file_get_contents if not loaded)
                  - added reset settings button
                  - fixed a bug in recent comments
                  - added nofollow to comment author/trackback links
                  - removed meta/description, causing problems with some plugins
...


3, 10.2009: First release (1.0)
