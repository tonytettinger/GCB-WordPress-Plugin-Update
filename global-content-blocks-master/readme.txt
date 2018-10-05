=== Global Content Blocks===
Contributors: Dave Liske
Donate link: 
https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CDTVLY73RQJSC
Tags: admin, shortcode, shortcodes, code, html, php, javascript, snippet, code snippet, iframe, reuse, reusable, adsense, paypal, insert, global, content block, raw html, formatting, pages, posts, editor, tinymce, form, forms, variables, global variables, modify output
Requires at least: 2.8.6
Tested up to: 4.4
Stable tag: 2.1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates shortcodes to add HTML, PHP, forms, opt-ins, iframes, Adsense, code snippets, reusable objects, etc, to posts/pages, and preserves formatting. Ideal for adding reusable objects to your content or to preserve formatting of code that normally gets stripped out or reformatted by the editor. See the <a href="http://micuisine.com/content-block-plugins/global-content-blocks/" target="_blank">General Usage</a> page for complete instructions.

== Description ==

**Global Content Blocks** lets you create your own shortcodes to insert reusable code snippets, PHP or HTML including forms, opt-in boxes, iframes, Adsense code, etc, into pages and posts as well as widgets and directly into php content. You can insert them directly using  shortcodes or via a button in the TinyMCE visual editor toolbar. You can also insert the entire content of the Content Block instead of the shortcode or use other shortcodes within the Content Block. You can also modify the output of the Content Block via a hook.

It is ideal for inserting reusable objects into your content or to prevent the WordPress editor from stripping out your code or otherwise changing your formatting. The shortcodes are masked as images to allow easy manipulation and non-html tags contamination.

You can also use your own variables, WordPress global variables and other shortcodes within Content Blocks, modify the output, use shortcodes in themes and widgets, nest shorcodes and a whole lot more. See http://micuisine.com/content-block-plugins/category/gcb-advanced-usage/ for more information.

The plugin includes an Import/Export fuction to copy content blocks from one WordPress site to another.

Further information and screenshots are available on the plugin homepage at http://micuisine.com/content-block-plugins/global-content-blocks/.

As featured on ManageWP Blog (http://managewp.com/global-content-blocks) and Spanky Media (http://spankymedia.com.au/using-wordpress-global-content-blocks-to-promote-your-content/).

If you have any feedback, issues or suggestions for improvements please leave a comment on the plugin homepage and if you like the plugin please give it a rating at http://wordpress.org/extend/plugins/global-content-blocks :-)

== Installation ==

1. Download the **global-content-blocks.zip** file to your local machine.
2. Either use the automatic plugin installer *(Plugins - Add New)* or Unzip the file and upload the **global-content-blocks** folder to your **/wp-content/plugins/** directory.
3. Activate the plugin through the Plugins menu
4. Visit the **Global Content Blocks** settings page *(Settings > Global Content Blocks)* to add or edit Content Blocks.
5. Insert the Content Block into pages or posts using the button on the editor tool bar or by inserting the shortcode **[contentblock id=xx]** where **xx** is the ID number of the Content Block.


== Frequently Asked Questions ==

= How big a content block can I add? =
The content block will hold up to 64,000 characters.

= Can I create content blocks with PHP code? =
Yes, just copy the PHP as normal into a content block without the &lt;?php, &lt;?, ?&gt; tags and insert the block into your content as normal.

= Can I create content blocks using a visual editor? =
Yes, the Settings page where the content blocks are created includes the standard WordPress visual/HTML editor.

= How do I use a shortcode within a content block? =
Simply add the shortcode within a block as normal, for example [gallery] to add a WordPress gallery.

= Can I use content blocks outside of posts and pages? =
Yes, just wrap it in the PHP function &lt;?php echo gcb(x);?&gt; where x is the content block ID. You can also use the longer form &lt;?php do_shortcode(&quot;[contentblock id=x]&quot;);?&gt;

= Why do the contentblock shortcodes display instead of my content when I link to one of my posts or pages in Facebook? =
If you look at the source code for your page you'll likely find something like this:
< ! -- This site is optimized with the Yoast SEO plugin v3.0.3 - https: //yoast.com/wordpress/plugins/seo/ -- >
< meta name="description" content="[contentblock id=hmn_yanagibas_oct] [contentblock id=17 img=gcb.png]"/ >
What happens is that Facebook scrapes the meta description (or an og:description if you have that set up instead) and loads it as the description for their link. That's probably what you're seeing happen, especially since this is the only place the shortcodes appear when viewing the page source. This is a known issue with the Yoast SEO plugin, as described here:
https://github.com/Yoast/wordpress-seo/issues/2846
Looking at their changelog, it appears the fix has not yet been implemented. If you're so inclined, the solution is also listed on the above linked page. I haven't tried it myself, so I can offer no guarantees. But this issue is definitely reproducable with the current version of the Yoast plugin installed. 

= Is it possible to modify the output of inserted content blocks? =
Yes, you can add the filter 'gcb_block_output' to modify output by adding a PHP script to functions.php, for example:<br>
add_filter('gcb_block_output', 'alter_block_output');<br>
function alter_block_output($value) {<br>
//process the output here, e.g., convert text to lowercase<br>
$new_value = strtolower($value); <br>
return &quot;Processed output: &quot;.$new_value;<br>
}

= Can I use variables? =
Yes, You can use variables within the content block that will be replaced when the block is displayed. For example, if you create a content block, say id=1 with:
My name is %%name%%<br>
by using the shortcode [contentblock id=1 name=&quot;John Doe&quot;] when displayed it will appear as My name is John Doe.

= Can I use WordPress global variables? =
Yes, WordPress global variables can be used within content blocks, for example,
global $user_login;<br>
global $user_email;<br>
echo &quot;$user_login, you email is: $user_email&quot;;<br>
would output the username and email of the current logged in user, e.g., John, your email is john@youremail.com.

= Will I lose my content blocks if I change the theme or upgrade WordPress? =
No, the blocks are added to the WordPress database, so are independent of the theme and unaffected by WordPress upgrades.

= Can it be completely uninstalled? =
Yes, there is an option to delete the database table if you want to completely remove the plugin.

= Can I copy any content blocks I've created to another WordPress site? =
Yes, an Import/Export function is included. Just Export form one site, install the plugin on the other site and import.

== Screenshots ==

1. The Settings page
2. Adding a new Content Block
3. Inserting a Content Block using the toolbar button
4. Inserting a Content Block using the shortcode

== Changelog ==

= 2.1.5 =
* Changed auto paragraphs in Tiny MCE
* Updated for WP 4.4.

= 2.1.4 =
* Removed CSS capability for further development
* Worked with iThemes Security to further work on session_destroy() issue in 2.1.3

= 2.1.3 =
* Fixed hard error regarding session_destroy() attempting to destroy an uninitialized session

= 2.1.2 =
* Added ability to include a customstyle.css file so admins can provide their own separate CSS
* Created Settings page, moved Import and Uninstall functions to it
* Moved Global Contents Blocks out of the Settings menu
* Minor cosmetic changes
* Code cleanup

= 2.1.1 =
* Modified statements using WP_PLUGIN_URL to plugins_url in global-content-blocks.php to ensure correct usage in HTTPS environments

= 2.1.0 =
* Included both Save & Close and Update buttons on the Edit page
* Added ID# and Name (short title) to top label on the Edit page
* Sorted the Select list on the Insert Global Content Block popup
* Added sort select function for ID and Name on the Manage page
* Added a CSS for additional functionality
* Added two-column and three-column layouts using CSS, with working examples on the Advanced Usage page
* Added feature to run PHP code inside HTML code
* Minor bug fixes
* Minor cosmetic changes
* Created new plugin homepage, http://micuisine.com/content-block-plugins, and redirected all links within the plugin

= 2.0.2 =
* Made sure the PHP type is edited via simple textarea
* Added Dave Liske as contributor

= 2.0.1 =
* Minor bug fixes

= 2.0.0 =
* Removed all calls to mysql_real_escape_string as the extension is now deprecated with PHP 5.5.0
* Moved all data to the standard WP database structure, via the Options API
* Removed unused files

= 1.5.7 =
* Fixed bug when updating from old version

= 1.5.6 =
* Fixed bug introduced in previous release

= 1.5.5 =
* Default charset for the database table is now UTF-8
* Added optional custom ID for content blocks

= 1.5.3 =
* Minor fix to allow the TinyMCE editor GCB icon to coexist with icons from other plugins

= 1.5.2 =
* security patch applied

= 1.5.1 =
* Minor fix for issue experienced by some users

= 1.5 =
* Added a visual editor when creating content blocks
* Added function to include own variables in content blocks

= 1.4.1 =
* Home site moved to http://wpxpert.com

= 1.4 =
* Improvements to HTML content block
* New function to include shortcodes within content blocks
* Added shortened PHP function to use content blocks outside of pages or posts
* Added hook to modify output of inserted content block

= 1.3 =
* Fixed reported expoloit vulnerability
* Fixed export issue in some browsers
* Added option to show/hide the icon in the editor toolbar in case of conflict with other plugins.

= 1.2 =
* Added option to create a new content block while inserting the block in the page/post
* Tidied up code to avoid errors in debug mode

= 1.1.2 =
* Fixed bug, TinyMCE editor button replacing button of some other plugins

= 1.1.1 =
* Fixed bug, slashes being stripped when inserting code block
* Updated TinyMCE default manager for better cross platform compatibility

= 1.1 =
* Added ability to insert PHP blocks into content
* Option to insert to entire content block into pages/posts instead of the shortcode
* Option to select the block type, each represented by a different image block when inserted into content making it easier to identify on the page
* Added Import/Export function to export all or selected content blocks to an xml file that can be imported into the Global Content Blocks plugin on another WordPress site
* Added a link to the Settings page from the Plugins page listing
* Minor cosmetic changes
* Added a Donate button on the Settings page and some advertising

= 1.0.1 =
* Minor typo correction in install file

= 1.0 =
* Stable version released.

== Upgrade Notice ==

= 1.1 =
A major update adding several new features and functions including the ability to insert PHP blocks, insert the entire content block instead of the shortcode and export blocks to another site.

= 1.0.1 =
Minor typo fixed
