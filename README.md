# Update for the Global Content Blocks (GCB) WordPress plugin

## Issue

The GCB plugin became unsupported and was taken down from the WordPress plugin directory as of September 2016. 
This is allegedly mainly because of a Cross-Site Request Forgery (CSRF) security vulnerability. 
The second issue with the plugin is, that it saves the data into the options table, which makes the data disappear if we use WordPress Multisite and saving as a network administrator.

* [Original Plugin GitHub repo](https://github.com/qriouslad/global-content-blocks)
* [Link for the security vulnerability description](https://wpvulndb.com/vulnerabilities/8757)
* [Link to the forum regarding stopping support for the plugin](https://wordpress.org/support/topic/this-plugin-is-no-longer-supported-5/)

## Solution

1. I have added nonce creation and verification functions for the update function.

2. I have created a custom post type and rewritten the code, so the code block inserted by the user (including possible HTML markup) is converted to a format that can be safely saved as a custom post type content. A function has been created to converted back the post into useable code on the init hook (```gcb_retrieveSavedRecords()``` on line 272 of the *global-content-blocks.php* file. This function retrieves the saved data from the custom post type table, converts it and then updates the options table with the data. I have tested the functionality although further testing might be necessary.

![Screenshot of Code Update: New Custom Post Type and Update for the Save function](/global-content-blocks-master/screenshots/newPostTypeAndSave.png?raw=true "New Custom Post type and updated save function")

## Test

To test the updated plugin, please download the *global-content-blocks-master* directory to the WordPress plugin directory, activate the plugin from the dashboard, add custom shortcodes under the Global Content Blocks menu and test it by adding custom blocks to a post.




