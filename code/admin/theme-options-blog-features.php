<?php
/**
 * Lists out all the options from the Blog Features Section of the theme options
 * This file is included in functions.php
 *
 * @package Suffusion
 * @subpackage Admin
 */

global $suffusion_social_networks, $suffusion_comment_label_name, $suffusion_comment_label_req, $suffusion_comment_label_email, $suffusion_comment_label_uri, $suffusion_comment_label_your_comment;
$suffusion_blog_features_options = array(
	array("name" => "Back-End",
		"type" => "sub-section-2",
		"category" => "blog-features",
		"parent" => "root"
	),

	array("name" => "Comment Settings",
		"type" => "sub-section-3",
		"category" => "comment-settings",
		"parent" => "blog-features"
	),

	array("name" => "Hide \"Comment form closed\" Message on Pages",
		"desc" => "You can decide if you want to show the \"Comment form closed\" message on pages.
			If you choose 'All' your settings in the next option will be ignored.
			Note that this option is different from choosing 'Select All' in the next option, because this guarantees that always all are selected, while the next option only ensures that all selections at the time of setup are stored",
		"id" => "suf_comments_disabled_all_sel",
		"parent" => "comment-settings",
		"type" => "radio",
		"options" => array("all" => "All, ignoring next option", "selected" => "Selections from the next option"),
		"std" => "all"),

	array("name" => "Select pages to hide \"Comment form closed\" message",
		"desc" => "If you disable comments on a page, a \"Comment form closed\" message shows up. " .
				"You can choose to hide this message for selected pages, if you think it makes your page look too \"blog-like\". " .
				"If you select a page from the list below it will not show the \"Comment form closed\" message. " .
				"Note that if comments are <b>enabled</b> for a page, selecting it here will not make a difference. ",
		"id" => "suf_comments_disabled",
		"parent" => "comment-settings",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_page_array()),

	array("name" => "Hide \"Comment form closed\" Message on Posts",
		"desc" => "If you disable comments on a post, you can make a  \"Comment form closed\" message show up. " .
				"You can choose to hide this message for all such posts, if you think it makes your page look too \"blog-like\". " .
				"Note that if comments are <b>enabled</b> for a post, setting this option will not make a difference. ",
		"id" => "suf_comments_disabled_msg_for_posts",
		"parent" => "comment-settings",
		"type" => "radio",
		"options" => array('show' => 'Show the message', 'hide' => 'Hide the message'),
		"std" => "show"),

	array("name" => "Show Trackbacks and Pingbacks?",
		"desc" => "By default Trackbacks and Pingbacks to your blog posts show up along with other comments. ",
		"id" => "suf_show_track_ping",
		"parent" => "comment-settings",
		"type" => "radio",
		"options" => array("show" => "Show all Trackbacks and Pingbacks with comments", "hide" => "Don't show Trackbacks and Pingbacks",
			"separate" => "Show Trackbacks and Pingbacks, but separate them from the comments"),
		"std" => "show"),

	array("name" => "Allow Replies for Trackbacks and Pingbacks?",
		"desc" => "For comments that are trackbacks or pingbacks you might want to hide the \"Reply\" link: ",
		"id" => "suf_show_hide_reply_link_for_pings",
		"parent" => "comment-settings",
		"type" => "radio",
		"options" => array("allow" => "Allow replies to Trackbacks and Pingbacks", "disallow" => "Don't allow replies to Trackbacks and Pingbacks"),
		"std" => "disallow"),

	array("name" => "Comment styles",
		"desc" => "How do you want your comments to be displayed?",
		"id" => "suf_comment_display_type",
		"parent" => "comment-settings",
		"type" => "radio",
		"options" => array(
			"theme" => "Theme default",
			"plain" => "Plain nested",
			"author-above" => "Bubble with author above comment",
			"author-below" => "Bubble with author below comment",
		),
		"std" => "theme"),

	array("name" => "Comment form labels styles",
		"desc" => "You can choose to have theme-based styles for labels in your comment form, or leave them unstyled. The theme-based style is more colorful (which you may or may not prefer): ",
		"id" => "suf_comment_label_styles",
		"parent" => "comment-settings",
		"type" => "radio",
		"options" => array("theme" => "Theme default", "plain" => "Plain (unstyled)", "colored" => "Coloured", "inside" => "Label inside field"),
		"std" => "theme"),

	array("name" => "Comment form labels",
		"desc" => "Setup your comment form labels here",
		"category" => "comment-labels",
		"parent" => "comment-settings",
		"type" => "sub-section-4",),

	array("name" => "Comment form: Name",
		"desc" => "Label for 'Name': ",
		"id" => "suf_comment_label_name",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "text",
		"std" => esc_attr($suffusion_comment_label_name)),

	array("name" => "Comment form: Name Required",
		"desc" => "Label to display to show that the name is required: ",
		"id" => "suf_comment_label_name_req",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "text",
		"std" => esc_attr($suffusion_comment_label_req)),

	array("name" => "Comment form: Email",
		"desc" => "Label for 'Email': ",
		"id" => "suf_comment_label_email",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "text",
		"std" => esc_attr($suffusion_comment_label_email)),

	array("name" => "Comment form: Email Required",
		"desc" => "Label to display to show that the email is required: ",
		"id" => "suf_comment_label_email_req",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "text",
		"std" => esc_attr($suffusion_comment_label_req)),

	array("name" => "Comment form: URI",
		"desc" => "Label for 'URI': ",
		"id" => "suf_comment_label_uri",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "text",
		"std" => esc_attr($suffusion_comment_label_uri)),

	array("name" => "Comment form: Your Comment",
		"desc" => "Label for 'Your Comment': ",
		"id" => "suf_comment_label_your_comment",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "text",
		"std" => esc_attr($suffusion_comment_label_your_comment)),

	array("name" => "Comment form: HTML Tags",
		"desc" => "Show the message about allowed HTML tags?",
		"id" => "suf_comment_show_html_tags",
		"parent" => "comment-settings",
		"grouping" => "comment-labels",
		"type" => "radio",
		"options" => array("show" => "Show message", "hide" => "Hide message"),
		"std" => "show"),

	array("name" => "User Profiles",
		"type" => "sub-section-3",
		"category" => "user-profiles",
		"parent" => "blog-features"
	),

	array("name" => "Select Additional Social Networks",
		"desc" => "You can add other contact methods for users on your blog. These will show up in the admin page under Users -&gt; Your Profile.
				This will take effect only if you are at WordPress verison 2.9 or later: ",
		"id" => "suf_uprof_networks",
		"parent" => "user-profiles",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array($suffusion_social_networks), "std" => ""),

	array("name" => "Show author information for individual posts and pages",
		"desc" => "You can add author information to each post. In subsequent options you can specify what you want to put in the author information section.",
		"id" => "suf_uprof_post_info_enabled",
		"parent" => "user-profiles",
		"type" => "radio",
		"options" => array("hide" => "Don't show author information", "bottom" => "Show information at the bottom of the content for pages and posts",
			'pages' => "Show information for pages only", 'posts' => 'Show information for posts only'
		),
		"std" => "hide"),

	array("name" => "Author information header",
		"desc" => "Specify the header for the author information section. Leave blank if you don't want a header",
		"id" => "suf_uprof_post_info_header",
		"parent" => "user-profiles",
		"type" => "text",
		"std" => "[suffusion-the-author]"),

	array("name" => "Author Gravatar",
		"desc" => "You can choose to show the Gravatar for the author in the information section",
		"id" => "suf_uprof_post_info_gravatar",
		"parent" => "user-profiles",
		"type" => "radio",
		"options" => array("hide" => "Don't show Gravatar", "show" => "Show Gravatar"),
		"std" => "show"),

	array("name" => "Gravatar Size",
		"desc" => "Set the size of the gravatar",
		"id" => "suf_uprof_post_info_gravatar_size",
		"parent" => "user-profiles",
		"type" => "radio",
		"options" => array("32" => "32px", "48" => "48px", "64" => "64px", "96" => "96px", "128" => "128px",),
		"std" => "64"),

	array("name" => "Gravatar Alignment",
		"desc" => "Which side do you want your Gravatar?",
		"id" => "suf_uprof_post_info_gravatar_alignment",
		"parent" => "user-profiles",
		"type" => "radio",
		"options" => array("left" => "Left", "right" => "Right"),
		"std" => "left"),

	array("name" => "Author information content",
		"desc" => "Here you can put in any information you want about the author. You can use any of the author short codes:",
		"id" => "suf_uprof_post_info_content",
		"parent" => "user-profiles",
		"type" => "textarea",
		"std" => "[suffusion-the-author display='description']"),

	array("name" => "Analytics",
		"type" => "sub-section-3",
		"category" => "analytics",
		"parent" => "blog-features"
	),

	array("name" => "Enable Analytics?",
		"desc" => "If you have a Google Analytics acccount you can add your tracking code through this section. " .
				"Note that if you are using a separate plugin for analytics you can ignore this section (i.e., don't enable Analytics).",
		"id" => "suf_analytics_enabled",
		"parent" => "analytics",
		"type" => "radio",
		"note" => "Please set this option to \"Analytics enabled\" if you want to override the theme's settings for Analytics.",
		"options" => array("not-enabled" => "Analytics not enabled",
			"enabled" => "Analytics enabled"),
		"std" => "not-enabled"),

	array("name" => "Custom Google Analytics Tracking Code",
		"desc" => "Enter your tracking code here for Google Analytics (with the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags). Note that you can skip this if you are using a plugin for analytics",
		"id" => "suf_custom_analytics_code",
		"parent" => "analytics",
		"type" => "textarea",
		"hint" => "Enter the tracking code here",
		"note" => "If you have any text here, it will be included with your pages (even if incorrect!!). Note that if your analytics are not enabled then this will be ignored.",
		"std" => ""),

	array("name" => "Custom Includes",
		"type" => "sub-section-3",
		"category" => "custom-additions",
		"parent" => "blog-features"
	),

	array("name" => "Don't like the default styles? Add your own...",
		"desc" => "If you are really picky about how your blog should look and the bundled styles don't make you happy, feel free to add your own styles here.
				You can either add externally defined stylesheets or define the CSS here.
				These are called up at the end of all other stylesheet invocations (unless of course you have a plugin that adds something after this!), so what you define here will pretty much override everything else.",
		"parent" => "custom-additions",
		"category" => "custom-css",
		"type" => "sub-section-4",
	),

	array("name" => "Custom Styles",
		"desc" => "If you want to define any custom styles, include the CSS code here. These styles will override all other styles that you have defined / set.
				Don't include the <code>&lt;style&gt;</code> and <code>&lt;/style&gt;</code> tags.",
		"id" => "suf_custom_css_code",
		"parent" => "custom-additions",
		"grouping" => "custom-css",
		"type" => "textarea",
		"hint" => "Enter the CSS styles here",
		"note" => "If you have any text here, it will be included in the header of your pages (even if incorrect!!).",
		"std" => ""),

	array("name" => "First Additional Stylesheet link",
		"desc" => "If you want to define any additional stylesheets, include the entire link here for the first sheet. An example would be a plugin with a separate stylesheet. Note that for this option to work you have to set <i>Back-end &rarr; Site Optimization &rarr; Auto-generate CSS file for customization options</i> to be linked in the source.",
		"id" => "suf_custom_css_link_1",
		"parent" => "custom-additions",
		"grouping" => "custom-css",
		"type" => "text",
		"hint" => "Enter the stylesheet here, including https://",
		"std" => ""),

	array("name" => "Second Additional Stylesheet link",
		"desc" => "If you want to define any additional stylesheets, include the entire link here for the second sheet. An example would be a plugin with a separate stylesheet.  Note that for this option to work you have to set <i>Back-end &rarr; Site Optimization &rarr; Auto-generate CSS file for customization options</i> to be linked in the source.",
		"id" => "suf_custom_css_link_2",
		"parent" => "custom-additions",
		"grouping" => "custom-css",
		"type" => "text",
		"hint" => "Enter the stylesheet here, including https://",
		"std" => ""),

	array("name" => "Third Additional Stylesheet link",
		"desc" => "If you want to define any additional stylesheets, include the entire link here for the third sheet. An example would be a plugin with a separate stylesheet. Note that for this option to work you have to set <i>Back-end &rarr; Site Optimization &rarr; Auto-generate CSS file for customization options</i> to be linked in the source.",
		"id" => "suf_custom_css_link_3",
		"parent" => "custom-additions",
		"grouping" => "custom-css",
		"type" => "text",
		"hint" => "Enter the stylesheet here, including https://",
		"std" => ""),

	array("name" => "Got JavaScript?",
		"desc" => "Here you can add custom JavaScript. This is a feature that will normally not be used, since you will rely on plugins to automatically add JavaScript.",
		"parent" => "custom-additions",
		"category" => "custom-js",
		"type" => "sub-section-4",
	),

	array("name" => "First External JavaScript file",
		"desc" => "If you want to define any additional JavaScript files, include the entire link here for the first file.
				Note that you have to ensure the JavaScript file's variables and definitions don't conflict with other JS variables and definitions. ",
		"id" => "suf_custom_js_file_1",
		"parent" => "custom-additions",
		"grouping" => "custom-js",
		"type" => "text",
		"hint" => "Enter the JavaScript file path here, including https:://",
		"std" => ""),

	array("name" => "Second External JavaScript file",
		"desc" => "If you want to define any additional JavaScript files, include the entire link here for the second file.
				Note that you have to ensure the JavaScript file's variables and definitions don't conflict with other JS variables and definitions. ",
		"id" => "suf_custom_js_file_2",
		"parent" => "custom-additions",
		"grouping" => "custom-js",
		"type" => "text",
		"hint" => "Enter the JavaScript file path here, including https:::://",
		"std" => ""),

	array("name" => "Third External JavaScript file",
		"desc" => "If you want to define any additional JavaScript files, include the entire link here for the third file.
				Note that you have to ensure the JavaScript file's variables and definitions don't conflict with other JS variables and definitions. ",
		"id" => "suf_custom_js_file_3",
		"parent" => "custom-additions",
		"grouping" => "custom-js",
		"type" => "text",
		"hint" => "Enter the JavaScript file path here, including https://",
		"std" => ""),

	array("name" => "Custom Header JavaScript",
		"desc" => "If you want to add some custom JavaScript to your header you can do so here.
				This could include affiliate code or anything else that you want to add.
				Do not include the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags.",
		"id" => "suf_custom_header_js",
		"parent" => "custom-additions",
		"grouping" => "custom-js",
		"type" => "textarea",
		"hint" => "Enter the JavaScript here",
		"note" => "If you have any text here, it will be included in the header of your pages (even if incorrect!!).",
		"std" => ""),

	array("name" => "Custom Footer JavaScript",
		"desc" => "If you want to add some custom JavaScript to your footer you can do so here.
				This could include affiliate code or anything else that you want to add.
				Do not include the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags.",
		"id" => "suf_custom_footer_js",
		"grouping" => "custom-js",
		"parent" => "custom-additions",
		"type" => "textarea",
		"hint" => "Enter the JavaScript here",
		"note" => "If you have any text here, it will be included in the footer of your pages (even if incorrect!!).",
		"std" => ""),

	array("name" => "Additional Auto-discovery RSS / Atom feeds",
		"desc" => "You might want to set up additional RSS / Atom feeds for your blog, like a \"Post of the Day\" etc. You can add those feeds here.
				Note that this section is for <b>auto-discovery</b> of feeds only. It will make your feed show up in the address bar of browsers like FireFox.",
		"parent" => "custom-additions",
		"category" => "custom-feed",
		"type" => "sub-section-4",
	),

	array("name" => "Disable default feed?",
		"desc" => "By default Suffusion creates the default RSS feed for the theme. If you would prefer using FeedBurner or another such feed, you might want to disable the default feed:",
		"id" => "suf_custom_default_rss_enabled",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "radio",
		"options" => array("not-enabled" => "Default feed not enabled",
			"enabled" => "Default feed enabled"),
		"std" => "enabled"),

	array("name" => "Address of First Additional RSS Feed",
		"desc" => "If you want to define any additional RSS Feeds, include the entire link here for the first feed. You could set up a FeedBurner feed here",
		"id" => "suf_custom_rss_feed_1",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed URL here, including https://",
		"std" => ""),

	array("name" => "Title of First Additional RSS Feed",
		"desc" => "What should the first feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
		"id" => "suf_custom_rss_title_1",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed title here",
		"std" => ""),

	array("name" => "Address of Second Additional RSS Feed",
		"desc" => "If you want to define any additional RSS Feeds, include the entire link here for the second feed.",
		"id" => "suf_custom_rss_feed_2",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed URL here, including https://",
		"std" => ""),

	array("name" => "Title of Second Additional RSS Feed",
		"desc" => "What should the second feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
		"id" => "suf_custom_rss_title_2",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed title here",
		"std" => ""),

	array("name" => "Address of Third Additional RSS Feed",
		"desc" => "If you want to define any additional RSS Feeds, include the entire link here for the third feed.",
		"id" => "suf_custom_rss_feed_3",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed URL here, including https://",
		"std" => ""),

	array("name" => "Title of Third Additional RSS Feed",
		"desc" => "What should the third feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
		"id" => "suf_custom_rss_title_3",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed title here",
		"std" => ""),

	array("name" => "Address of First Additional Atom Feed",
		"desc" => "If you want to define any additional Atom Feeds, include the entire link here for the first feed.",
		"id" => "suf_custom_atom_feed_1",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed URL here, including https://",
		"std" => ""),

	array("name" => "Title of First Additional Atom Feed",
		"desc" => "What should the first feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
		"id" => "suf_custom_atom_title_1",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed title here",
		"std" => ""),

	array("name" => "Address of Second Additional Atom Feed",
		"desc" => "If you want to define any additional Atom Feeds, include the entire link here for the second feed.",
		"id" => "suf_custom_atom_feed_2",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed URL here, including https://",
		"std" => ""),

	array("name" => "Title of Second Additional Atom Feed",
		"desc" => "What should the second feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
		"id" => "suf_custom_atom_title_2",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed title here",
		"std" => ""),

	array("name" => "Address of Third Additional Atom Feed",
		"desc" => "If you want to define any additional Atom Feeds, include the entire link here for the third feed.",
		"id" => "suf_custom_atom_feed_3",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed URL here, including https://",
		"std" => ""),

	array("name" => "Title of Third Additional Atom Feed",
		"desc" => "What should the third feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
		"id" => "suf_custom_atom_title_3",
		"parent" => "custom-additions",
		"grouping" => "custom-feed",
		"type" => "text",
		"hint" => "Enter the feed title here",
		"std" => ""),

	array("name" => "Modules",
		"type" => "sub-section-3",
		"category" => "modules",
		"parent" => "blog-features"
	),

	array("name" => "Disable Widgets",
		"desc" => "Disabling widgets that you are not using keeps your site load lower. You won't see a disabled widget in Appearance &rarr; Widgets",
		"id" => "suf_module_widgets",
		"parent" => "modules",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array(array(
				'search' => 'Disable Search',
				'twitter' => 'Disable Twitter',
				'flickr' => 'Disable Flickr',
				'translator' => 'Disable Google Translator',
				'featured-posts' => 'Disable Featured Posts',
				'follow-me' => 'Disable Follow Me',
				'child-pages' => 'Disable Child Pages',
				'query-posts' => 'Disable Query Posts',
				'query-users' => 'Disable Query Users',
			)
		),
		"std" => ""
	),

	array("name" => "Site Optimization",
		"type" => "sub-section-3",
		"category" => "site-optimization",
		"parent" => "blog-features"
	),

	array("name" => "Auto-generate CSS file for customization options",
		"desc" => "You can cache the generated CSS and/or link it to another file instead of printing it all out in your site's HTML.",
		"id" => "suf_autogen_css",
		"parent" => "site-optimization",
		"type" => "radio",
		"options" => array("autogen" => "Auto-generate the CSS and include it as a linked file (High load on server, elegant page source code)",
			"autogen-inline" => "Auto-generate the CSS and print it in the HTML source (Least load on server, ugly page source code)",
			"autogen-file" => "Auto-generate the CSS and link it as a file (Low load on server, elegant page source code)",
			"nogen" => "Don't auto-generate the CSS, and print it in the HTML source (Low load on server, ugly page source code)",
			"nogen-link" => "Don't auto-generate the CSS, and link it in the HTML source (Highest load on server, elegant page source code)"
		),
		"std" => "autogen-file"),

	array("name" => "Minify generated CSS",
		"desc" => "Minifying the generated CSS will make it all be printed in a single line. Disable this if you are using a caching plugin.",
		"id" => "suf_minify_css",
		"parent" => "site-optimization",
		"type" => "radio",
		"options" => array("minify" => "Minify the CSS", "no-minify" => "Don't minify the CSS"),
		"std" => "no-minify"),

	array("name" => "Use \"Lite\" version of JQuery Cycle?",
		"desc" => "If you are using the \"Featured Content\" or the Advanced Gallery features (in <em>Other Graphical Elements</em>) and you require only the 'Fade' transition and you don't want the post index, you should use the Lite version of the JQuery Cycle plugin. It is much smaller: ",
		"id" => "suf_featured_use_lite",
		"parent" => "site-optimization",
		"type" => "radio",
		"options" => array("lite" => "Use Lite version (4 KB)", "regular" => "Use Regular version (29 KB)"),
		"std" => "regular"),

	array("name" => "Child Themes",
		"type" => "sub-section-3",
		"category" => "child-themes",
		"parent" => "blog-features"
	),

	array("name" => "Inherit styles?",
		"desc" => "Suffusion has a multi-level stylesheet hierarchy that processes style.css first, then skin.css, where 'skin' is the light theme corresponding to your theme selection.
			If your theme selection is a dark theme, it then processes dark-style.css and finally dark-skin.css.
			In case of child themes, however, you might not want to load all the CSS files. Pick what you want for your child theme. Note that this might impact gzip/minification:",
		"id" => "suf_style_inheritance",
		"parent" => "child-themes",
		"type" => "radio",
		"options" => array("everything" => "Inherit all stylesheets corresponding to the theme selection (You don't need any @import in your style.css)",
			"nothing" => "Don't inherit any stylesheet (all inclusions will be done using @import tags in your child theme's style.css. Use this if you don't want any pre-defined color scheme)"),
		"std" => "everything"),
);
?>