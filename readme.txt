=== YSPComplete! ===
Contributors: nashworks
Donate link: http://blog.nashbrooklyn.com
Tags: YSPComplete!, auction, auctions, widget
Requires at least: 3.2
Tested up to: 3.3.2
Stable tag: 2012.06.04
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

== Description ==

YSPComplete! is a very simple Wordpress Plugin.

A WordPress Widget that allows to display items in the sidebar from a unique seller of any auction site that is powered by YSPComplete!

You specify a site's url, a seller's username, a number of items to display, and optinal keywords to filter the items.

== Installation ==

1. Download wordpress-yspcomplete.zip and unzip into the `/wp-content/plugins/` directory

2. From the Wordpress admin backend, Activate the plugin through the 'Plugins' menu

3. From the Wordpress admin backend, in the Widgets menu, drag-and-drop
   the widget to your sidebar.  You can place it in any position you like.

4. Specify the settings for the widget:
   Title, Site URL, Username, Number of Items, and Keywords.  For the keywords, you can specify:

    - a single word, like "toyota".  This will fetch items with the word "toyota".

    - a pipe-separated list of the above. For example, if you specify
      "toyota|nissan|jeep|2012", then it will fetch items
	  with either "toyota" or "nissan" or "jeep" or "2012".


That's it !


== Frequently Asked Questions ==

= Where do I get YSPComplete! auction platform? =

To permanently purchase YSPComplete! auction platform license,
you need to visit http://nashbrooklyn.com

To temperary rent YSPComplete! auction platform license,
you need to visit http://nashload.com

= Can I set the visual style of the widget from the admin backend? =

No, I haven't built that capability into this simple plugin, just yet.
Let me know if you have strong requirements in this area.

= What should I put for Widget Title? =

You can put anything but in general it would be the seller's username
and auction site's name, such as something like this for example:
Astroboy on Astroland.com

= What should I put for Site URL? =

This should be the full URL of an auction site that is powered by YSPComplete! 
Such as this for example: http://yspcomplete.nashbrooklyn.com
NOTE: do not put trailing slash at the end of the url.

= What should I put for Username? =

This should be the seller's username on an auction site that is powered by YSPComplete!
For example it could be your username or someone you want to promote on your site.
You can even charge them for putting their items on your site.
NOTE: do not put any CAPITAL letters, all letters must be in lower case.

= What should I put for Number of Items? =

This should be self-explanatory that it is how many items to be displayed in the sidebar.
You can even charge sellers for displaying certain number of items.
Just an idea: you can charge a buck per item per month per seller.

= What should I put for Keywords? =

This is an optional setting and can be left empty if you don't want to filter items to a certain keyword.

== Screenshots ==

1. This shows the rendering of the Widget in the sidebar of a WP blog.
2. This shows how to Activate the plugin in the Plugins menu in the WP Admin backend.
3. Configuring the settings for the YSPComplete! widget in the WP Admin backend.


== Changelog ==

= 2012.06.04 =
* initial release

== Dependencies ==

- This plugin depends on and uses YSPComplete! auction platform Version 2012-7 or later.
- It also relies on and uses the Curl library within PHP.
- It makes outbound http connections from the Wordpress/PHP server. Most hosters allow this, so it won't be a problem.


== Thanks ==

Thanks for your interest!

-Nash

