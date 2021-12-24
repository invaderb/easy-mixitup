=== easy-mixitup ===
Contributors: invaderb
Donate link: http://example.com/
Tags: portfolio, animated, sort, filter, 
Requires at least: 5.0.0
Tested up to: 5.8.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

wp plugin that adds animated filter and sorting for post and custom port types 

== Description ==

wp plugin to filter, sort, and animate posts and custom post types.

This plugin will display featured images of posts and custom post types in a grid format where you and filter the items down by categories

## How it works

This plugin offers a simple shortcode with optional arguments

The curly braces can be replaced or removed entirely if you just want to use the default posts

```
[easy-mixitup {post-type=(custom post type name)}]
```

== Installation ==

Manual uploading

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

## Example usage

Display just posts adn post categories

```
[easy-mixitup]
```

If you have a custom post type named portfolio

```
[easy-mixitup post-type=portfolio]
```

You can also adjust the order of the posts
```
[easy-mixitup order=ASC]
```

```
[easy-mixitup order=DESC]
```

== WP version ==
Tested on wp version 5.8.2
Should work on 5.8+

== Issues ==

If you have issues please open a github issue:
https://github.com/invaderb/easy-mixitup/issues

== Contributions ==
This project is open source and free to use for non comercial projects to mateasy mixitup licensing agreements


== TODO ==

- Add additional arguments
- - order by
- - posts per page
- - define taxamony name
- pagination?
- category arguments


== Frequently Asked Questions ==

will be added in the future

== Screenshots ==

will be added in the future

== Changelog ==

= 1.0 =
* Initial release


