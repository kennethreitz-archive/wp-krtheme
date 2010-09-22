iA3 Theme (1.1.0)

Installation:

1. Open the .zip file and upload the folder to your ‘wp-content/themes directory’. 
2. Log in to the admin area of your Wordpress website and select the Appearance tab. The new iA3 theme should be visible, under the ‘Available Themes’ heading, as iA3 1.1.0. Select ‘Activate’ to begin using the theme.

Customisation:

The new version of the iA3 theme extends our previous options page to allow you to configure the appearance of the theme, and the items that appear in the header and footer of your website. After activating the theme, a new tab should appear in the left-hand side of your Wordpress admin area, labelled ‘iA3’. Clicking on this tab will open the new iA3 options page.

The ‘Navigation’ tab within the iA3 options page allows you to select pages or posts, or enter links to appear in the site header and footer. You can add headings for each header/footer section. When using this form, please be aware that:

1. Selection boxes take precedence over manually entered text. If you don’t wish to use the selection box for a particular navigation cell, ensure it is not displaying a selected page.

2. If you wish to truncate manually entered text in the mobile versions of the site, wrap an HTML <span> tag around the portion of the text to be hidden. For example: <a href="/ja/">日本語<span> - ホーム</span></a> will display as <a href="/ja/">日本語</a> within the iPad/iPhone optimised layouts.

The ‘Miscellaneous’ tab under the iA3 options page allows you to configure the highlight colours used within the website, and to specify a logo to display in the top-left corner of the website. When selecting a colour, please use an HTML compatible colour code, (hexadecimal, RGB, RGBA, HSL, HSLA).

Featured Posts:

To promote a post on the front page of your website, you file it under a category named ‘Featured’. To set an image to appear with the promoted post, you can either use the new Featured Image functionality added in Wordpress 2.9, (http://justintadlock.com/archives/2009/11/16/everything-you-need-to-know-about-wordpress-2-9s-post-image-feature) or set a custom field with the label ‘featured_image’ containing the URL of the image you wish to be displayed.

Tweets:

The twitter stream displayed on the Tweets page uses the list of twitter accounts within the HTML to determine which tweets to show. By default it displays the twitter accounts of iA staff and services. You can modify this list of users to suit your website. No plugins are needed for the Twitter stream in the Tweets page.

Other Improvements:

Unlike previous versions of the iA3 template, you are no longer required to edit the Javascript or install plugins to access some functionality. Fancybox, (used to display images in a jQuery powered lightbox), will automatically detect the presence of the plugin and work/not work accordingly. If you do not wish to use the Fancybox plugin, you can remove the Javascript file references in ‘inc_body_footer.php’ and the reference to ‘style-fancybox-1.3.1.css’ in the ‘inc_head.php’ file.

If you have not used the iA3 theme before, you may remove the reference to ‘assets/css/style-ia3-1.0.2.css’ in the ‘inc_head.php’ file. This CSS file contains rules to maintain (some, unsupported) backwards compatibility with previous versions of the website.



