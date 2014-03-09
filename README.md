MantisTagColumn
===============

Adds the Tags column to views in the Mantis bug tracker

#MantisTagColumn

Copyright 2010, Brian Enigma, <http://netninja.com/projects/tagcolumn/>

Licensed under the GNU General Public License.

##THEORY

When used correctly, adding tags to Mantis issues can be a powerful feature.
Unfortunately, the current tag implementation feels more like an 
afterthought rather than a completely baked-in feature.  This is especially
true on the View Issues page, where tags are completely hidden from the
user.  This plugin attempts to fix this by adding a Tags column.

##USAGE

After installation (see below), users can add the "Tags" column to their
View Issues screen by following these steps.  

1. Go to My Account -> Manage Columns.
2. Add the "tagcolumn_tags" column to your View Issues Columns.

An administrator can perform similar steps, but under Manage -> Manage 
Configuration -> Manage Columns to add this column for all users.

##REQUIREMENTS

Mantis 1.2.0 or greater is required.

Note that this version of the plugin does not support the column data
caching API.  This means that there could be some performance penalties
when run on high-traffic sites.

##INSTALLATION

Installation is simple and involves creating a plugin folder and copying the
plugin's PHP file into the folder.  You then activate it from within Mantis.

1. Create a folder under your mantis plugins folder named TagColumn.
   For instance, if you have Mantis installed at /var/www/mantisbt, then
   you would create /var/www/mantisbt/plugins/TagColumn.
2. Copy TagColumn.php into this folder.
3. Log in to Mantis as an administrator.
4. Go to Manage -> Manage Plugins and click "Install" next to TagColumn.

Once installed, you can use it as described in the "Usage" section, above.

Have fun!
