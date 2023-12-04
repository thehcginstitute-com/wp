=== Companion Sitemap Generator - HTML & XML ===
Contributors: papin, boudewijnkok
Donate link: https://www.paypal.me/dakel/10
Tags: sitemap, generator, xml, html, robots, companion, seo, searchengine, optimization, google sitemap, google sitemap generator, sitemap xml, xml sitemap, xml sitemap generator, multilingual, polylang, mulitisite
Requires at least: 4.6.0
Tested up to: 5.6
Stable tag: 4.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates and XML sitemap for search engines and allows you to add an HTML sitemap to any page using a shortcode or Gutenberg block. Also comes with an built-in Robots.txt editor.

== Description ==

= What is a sitemap? =
A sitemap is a file where you provide information about the pages and posts your site, and the relationships between them. Search engines read this file to more intelligently crawl your site. A sitemap tells the search engine which pages you think are important in your site, and also provides valuable information about these pages: for example, when the page was last updated, how often the page is changed, and any alternate language versions of a page.

= Plugin Features =
Easily create a sitemap which is then updated every hour, or can be updated manually at any time via the WordPress dashboard. You can select single pages/posts or entire posttypes that you want to exclude from the sitemap. It will generate both an XML sitemap and an HTML sitemap that you can display on your site via the shortcode or gutenberg block.

= We'll keep search engines up-to-date for you =
If there are changes being made to your sitemap we'll notify search engines for you. You don't have to submit them manual anymore.

= What do we add to the sitemap? =
The following URLs are added to the sitemap (with an option to hide them, ofcourse):

* Pages
* Posts
* Post categories
* Post tags
* Custom post types
* Custom taxonomies
* Additional pages: Add URLs yourself

= Robots editor =
While a sitemap allows search engines to scan pages faster, a robots.txt file disallows search engines from scanning certain pages. This plugin also comes with a handy robots editor to give you full control over your search engine visibility.

= Multilingual =
Companion Sitemap Generator also supports [multilingual sitemaps](https://support.google.com/webmasters/answer/2620865?hl=en). Right now this is only supported when using the Polylang plugin but more plugins will be added upon request.

= Multisite =
This plugin has support for multisite. Each site will get its own sitemap.

== Installation ==

= Manual install =
1. Download Companion Sitemap Generator.
1. Upload the 'Companion Sitemap Generator' directory to your '/wp-content/plugins/' directory.
1. Activate Companion Sitemap Generator from your Plugins page.

= Via WordPress =
1. Search for 'Companion Sitemap Generator'.
1. Click install.
1. Activate.

= Settings =
1. Configure this plugin via Tools > Sitemap.

== Screenshots ==

1. Sitemap dashboard
2. Exclude posts from sitemap
3. Quickly update via dashboard
4. Edit robots file
5. HTML Sitemap

== Changelog ==

= 4.3.1 (December 9, 2020) =
* Fix: Error when adding additional pages
* Fix: Undefined variable when saving settings

= 4.3.0 (November 24, 2020) =
* Fix: Sometimes settings wouldn't save
* Fix: Sometimes some pages wouldn't get excluded
* Fix: Translation URLs will only get added if the translation is actually published
* Notice: We've made some big changes to the database connection, making it better and safer but this does mean that some settings might get lost in the process

= 4.2.0 (July 11, 2020) =
* New: We can notify search engines about changes made
* Tweak: Only load frontend stylesheet on the HTML sitemap page when gutenberg block is used
* Tweak: Hard-coded headings in sitemap listing are no longer hard-coded
* Fix: Some columns wouldn't display properly on mobile devices

= 4.1.0 (March 11, 2020) =
* New: A better, cleaner dashboard. We've also moved support, settings and the robots editor to here
* New: Additional pages, add pages outside of your WordPress installation to your sitemaps
* Tweak: Support for WordPress 5.4
* Tweak: Minor security improvements

= 4.0.4 (January 10, 2020) =
* Fixed issue where the sitemap wouldn't load in the backend
* Various security improvements

= 4.0.3 (January 5, 2020) =
* Fixed an issue where sometimes you couldn't uncheck an item in the content filter

= 4.0.2 (January 4, 2020) =
* Fixed an issue where the XML sitemap would seem blank
* Fixed an issue where sometimes the settings wouldn't actually save

= 4.0.1 (January 3, 2020) =
* Removed shortcode generator in favor of Gutenberg block
* Moved settings to new tab called "Settings" and gave the dashboard a redesign
* Renamed the "Exclusion" tab to "Content filter"
* Fixed a few (minor) errors
* Made some under the hood security and performance improvements

= 4.0 (January 2, 2020) =
* New: We've added a fancy shiny gutenberg block to replace the shortcode

= 3.9.1 (November 7, 2019) =
* Tweak: Only load frontend stylesheet on the HTML sitemap page

= 3.9.0 (September 27, 2019) =
* New: Option to disable XML stylesheet

= 3.8.9 (September 20, 2019) =
* Actually added XML styling
* Added option to use custom XML stylesheet

= 3.8.8 (August 7, 2019) =
* New: XML sitemap now has styling added
* Fixed: Few minor errors

= 3.8.7 (August 3, 2019) =
* New: Multilingual categories, terms etc. will now show up in the proper format on XML sitemap
* Fixed: Few minor errors
* Tweak: All items in HTML sitemap now have an unique class

= 3.8.6 (May 16, 2019) =
* Fix: Error: Cannot modify header information 

= 3.8.5 (April 6, 2019) =
* Fix: Variable mismatch error

= 3.8.4 (March 12, 2019) = 
* Actually added the option to exclude items in taxonomies

= 3.8.3 (March 12, 2019) = 
* Added hierarchy to categories
* Option to exclude items in taxonomies (Categories, Tags and More)

= 3.8.2 (March 7, 2019) =
* Few changes in HTML sitemap classes

= 3.8.1 (February 27, 2019) =
* Security improvements

= 3.8.0 (February 22, 2019) =
* New: Added support for Post tags and Custom taxonomies
* Fix: Fixed a few minor errors

= 3.7.4 (February 20, 2019) =
* New: New support page
* New: Exclude categories option
* Improvement: On the HTML sitemap custom post types no longer show as Post type: {identifier} but now show using the proper name
* Improvement: Some security improvements
* Fix: Fixed a few errors when saving settings
* BETA: Few fixes for new gutenberg block beta

= 3.7.3 =
* We no longer create a robots file on activation, instead you'll have to enable this yourself.

= 3.7.2 =
* New: We're working hard on a Gutenberg block to "replace" the shortcode. If you'd like to give feedback on this button you can start testing it with this version :)
* Fixed: Undefined index page error
* Fixed: Exclude Posts table being a bit off
* Fixed: Call to undefined function error

= 3.7.1 =
* New: We're working hard on a Gutenberg block to "replace" the shortcode. If you'd like to give feedback on this button you can start testing it with this version :)

= 3.7.0 =
* Fix: Cross-site request forgery (CSRF) vulnerabilitie
* Removed add to content button for old editor

= 3.6.6 =
* HTML sitemap columns work properly again
* HTML sitemap now has Level 3 hierarchy (still working on even deeper levels)

= 3.6.5 =
* Re-enabled post-exclusion and robots editor for multisite

= 3.6.4 =
* Fix for multisite issues.

= 3.6.3 =
* Multisite support stopped working, the sitemaps are fixed but settings are temporarily disabled on sub-sites.

= 3.6.2 =
* Fix: HTML sitemap would look distorted when post types were hidden or empty

= 3.6.1 = 
* Fix: Error: unexpected '[' 

= 3.6 =
* Fix: Multisite support
* Fix: Error with & sign in search console

= 3.5.5 =
* New: Set auto-update schedule, how often should the sitemap be updated?

= 3.5.0 =
* New: HTML sitemap: Show in 2 columns
* New: HTML sitemap: Sort by date or name
* New: HTML sitemap: Order ASC or DESC

= 3.4.5 =
* Dashboard redesign
* Add HTML sitemap tab (settings coming up)

= 3.4.1 = 
* Added Hungarian translations

= 3.3.5 =
* New: Added categories to the sitemap

= 3.3.1 =
* Exclude posts fix for multiple languages

= 3.3.0 =
* New: Support for multilingual (only works with Polylang atm)

= 3.2.0 =
* New: Added lastmodified to sitemap
* New: Added changefreq to sitemap

= 3.1.6 = 
* Fix: Undefined variable: charset_collate

= 3.1.5 =
* Fix: Undefined index: page error
* Fix: Undefined index: tabbed error

= 3.1.4. =
* Fix: Few strings were not translatable

= 3.1.3 =
* Improvement: HTML sitemap pages now have hierarchy

= 3.1.2 =
* Fix: Pages not being added to sitemap

= 3.1.1 =
* Fix: Update not working

= 3.1.0 =
* New: Exclude post types.
* New: Added classes to the HTML sitemap list to allow styling.
* New: Added button to quicker insert HTML sitemap into a page.
* Fix: Empty post types are no longer shown in HTML sitemap.

= 3.0.3 =
* Few minor fixes

= 3.0.2 =
* Fix: Some strings could not be translated.
* Fix: You could not exclude posts from multiple post types.
* Improvement: Minor dashboard improvement.
* New: Update sitemap from plugin dashboard.

= 3.0.1 =
* Fix: After selecting posts all posts were selected

= 3.0 =
* Completely rewrote the plugin fixing sooo many bugs
* Fix: Better errors
* Fix: auto-updating of sitemap
* New: HTML-sitemap shortcode
* New: Sitemap is updated every hour
* New: Better robots dashboard
* New: Better sitemap dashboard
* New: Remove pages/posts etc. from sitemap
* Improvement: Better dashboard widget
* Improvement: Cleaner code
* Improvement: Better update handling

[View full changelog](https://codeermeneer.nl/stuffs/companion-sitemap-generator-changelog/)