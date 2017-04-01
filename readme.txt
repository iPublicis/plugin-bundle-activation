=== Plugin  ===
Contributors: ipublicis
Plugin URI: https://github.com/iPublicis/plugin-bundle-activation/
Author: Lopo Lencastre de Almeida - iPublicis.com
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
Tags: plugin, tools, development
Requires at least: 4.1
Tested up to: 4.4.2
Stable tag: 1.0

An easy way to add a preset plugins to your new WordPress website

== Description ==

How many times do you setup a new site and had to install the same plugins over and over again?

This plugin creates a way to automatically install and activate plugins just using a simple JSON file and with no extra coding required. The plugins can be either bundled, downloaded from the WordPress Plugin Repository or downloaded from another external source.

With this you can have separated packs for eCommerce, blog, community and any kind of site you wish to install. Your way and the easy way: install WordPress afresh and add your `config.json` file to the plugin zip file. Upload it and start configuring your new site.

Afterwards, you can keep the plugin installed or just remove it.

This plugin is based on the fine work of the [TGM Plugin Activation](http://tgmpluginactivation.com/) and the [JSON.minify()](https://github.com/getify/JSON.minify/tree/php) teams.

**PLEASE READ CAREFULLY THE INSTALLATION SECTION HERE AND IN THE `readme.txt` INCLUDED.**

*Check out the other [Wordpress plugins](http://profiles.wordpress.org/ipublicis) by the same author.*

== Installation ==

How to install the **Plugin Bundle Activation** plugin and get it working in an handful of steps:

1. **BE SURE THAT** you DON'T install this plugin automatically. It requires some tweakning.
2. **DOWNLOAD** the zip file to you own local system.
3. Extract zip file to your local system.
4. Open the `config.json.sample` file included and change it accordingly to your project.
5. Add your new plugins to the file and save it as `config.json`
6. Upload `/plugin-bundle-activation/` folder and its files to the `/wp-content/plugins/` directory OR compress it to a new zip file and use the Wordpress admin interface to upload it, what best fits you.
7. If not activate the plugin through the 'Plugins' menu in WordPress.
8. Start configuring your plugins and your new site.
9. You can remove the **Plugin Bundle Activation** safely if you wish.

And that's it.

== Translations ==

If you want to make a translation for your language, use the ipcorepba.pot included and (if you want) send me the files (just the .po and .mo ones) to dev@ipublicis.com for inclusion in plugin's package. You'll be credited, of course.

== Frequently Asked Questions ==

= HOW TO CREATE A NEW BUNDLE =

Just get the `config.json.sample` included and make the changes you want. The file is full commented so it is easy to follow.

= Have more questions? =

Go to the [Plugin's forum](https://github.com/iPublicis/plugin-bundle-activation/issues).

== Changelog ==

= 1.0 =

* First version released.
