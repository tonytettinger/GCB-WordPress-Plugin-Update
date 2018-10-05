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

2. I have created a custom post type and revwritten the code, so the code (including possible HTML markup) is converted to a format that can be safely saved as a custom post type content. A function has been created to converted back the post into useable code on the init hook. This function retrieves the saved data from the custom post type table, converts it and then updates the options table with the data. I have tested the functionality although further testing might be necessary.





