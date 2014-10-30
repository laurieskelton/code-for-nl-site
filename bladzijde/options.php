<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

function sanitize_font_options_framework( $value ) {
    if ( ! in_array( $value, array( 'lucida', 'pt-sans','pt-sans-nar', 'pt-serif', 'open-sans', 'open-sans-con', 'bree-serif') ) )
        $value = 'PT Sans (normal)';
 
    return $value;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'bladzijde'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Alignment for the logo image
	$logo_align_array = array(
		'alignright' => __('Right', 'bladzijde'),
		'alignleft' => __('Left', 'bladzijde'),
		'aligncenter' => __('Center', 'bladzijde')
	);

	// Alignment for iamges on static page
	$align_array = array(
		'right' => __('Right', 'bladzijde'),
		'left' => __('Left', 'bladzijde')
	);

	// Header Text Alignment Array
	$header_radio_array = array(
		'text-align-right' => __('Right', 'bladzijde'),
		'text-align-left' => __('Left', 'bladzijde'),
		'text-align-center' => __('Center', 'bladzijde')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	/* Basic Settings */

	$options[] = array(
		'name' => __('Basic Settings', 'bladzijde'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Typography and Text Color Options', 'bladzijde'),
		'desc' => __('Onboard font options are found under "Font Settings" in the Customize tab (located under the Appearance menu).</br> The default font is PT Sans.', 'bladzijde'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Text Color for Site Tagline', 'bladzijde'),
		'desc' => __('#404040 selected by default.', 'bladzijde'),
		'id' => 'tagline_text_colorpicker',
		'std' => '#404040',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Text Color for Main Body Content', 'bladzijde'),
		'desc' => __('#404040 selected by default.', 'bladzijde'),
		'id' => 'body_text_colorpicker',
		'std' => '#404040',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Link Color for Main Body Content', 'bladzijde'),
		'desc' => __('#666666 selected by default.', 'bladzijde'),
		'id' => 'body_link_colorpicker',
		'std' => '#666666',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Hover Link Color for Main Body Content', 'bladzijde'),
		'desc' => __('#dd9933 selected by default.', 'bladzijde'),
		'id' => 'hover_link_colorpicker',
		'std' => '#dd9933',
		'type' => 'color' );

		//extra Google Font Options
	$options[] = array(
		'name' => __('Extra Google Fonts', 'bladzijde'),
		'desc' => __('Add some extra Google Fonts to your theme. Copy and paste the text after "http://fonts.googleapis.com/css?family=" from Google Web Fonts.', 'options_framework_theme'),
		'pre' =>  __('http://fonts.googleapis.com/css?family=', 'bladzijde'),
		'id' => 'font_select',
		'std' => 'Lato',
		'type' => 'text');

	$options[] = array(
		'name' => __('Apply Extra Fonts to Site Content', 'bladzijde'),
		'desc' => __('Apply one of your extra fonts to the site content. Paste text after "font-family:" in Google Fonts.', 'options_framework_theme'),
		'pre' =>  __('font-family:', 'bladzijde'),
		'id' => 'font_family_content',
		'std' => '"Lato", sans-serif;',
		'type' => 'text');

	$options[] = array(
		'name' => __('', 'bladzijde'),
		'desc' => __('Check to apply the extra font to site content.', 'bladzijde'),
		'id' => 'apply_font_content_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Apply Extra Fonts to Site Title', 'bladzijde'),
		'desc' => __('Apply one of your extra fonts to the site title. Paste text after "font-family:" in Google Fonts.', 'options_framework_theme'),
		'pre' =>  __('font-family:', 'bladzijde'),
		'id' => 'font_family_title',
		'std' => '"Lato", sans-serif;',
		'type' => 'text');

	$options[] = array(
		'name' => __('', 'bladzijde'),
		'desc' => __('Check to apply the extra font to site title.', 'bladzijde'),
		'id' => 'apply_font_title_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Apply Extra Fonts to Site Tagline', 'bladzijde'),
		'desc' => __('Apply one of your extra fonts to the site tagline. Paste text after "font-family:" in Google Fonts.', 'options_framework_theme'),
		'pre' =>  __('font-family:', 'bladzijde'),
		'id' => 'font_family_tag',
		'std' => '"Lato", sans-serif;',
		'type' => 'text');

	$options[] = array(
		'name' => __('', 'bladzijde'),
		'desc' => __('Check to apply the extra font to site tagline.', 'bladzijde'),
		'id' => 'apply_font_tag_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Apply Extra Fonts to Entry Titles', 'bladzijde'),
		'desc' => __('Apply one of your extra fonts to the entry titles. Paste text after "font-family:" in Google Fonts.', 'options_framework_theme'),
		'pre' =>  __('font-family:', 'bladzijde'),
		'id' => 'font_family_content_title',
		'std' => '"Lato", sans-serif;',
		'type' => 'text');

	$options[] = array(
		'name' => __('', 'bladzijde'),
		'desc' => __('Check to apply the extra font to the entry titles.', 'bladzijde'),
		'id' => 'apply_font_content_title_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	/* Header and Footer Settings */

	$options[] = array(
		'name' => __('Header and Footer Settings', 'bladzijde'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Extra Options for Header and Footer', 'bladzijde'),
		'desc' => __('Customize your header and footer with the settings below. </br>To upload a background image to the header, go to the Header tab under the Appearance menu or use the theme customizer.', 'bladzijde'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Select Minimum Height For Header', 'bladzijde'),
		'desc' => __('Select a minimum height for the header. Only enter a number. Do not add "px" or "em". </br>If your background image is not visible, try increasing the minimum height.', 'bladzijde'),
		'pre'=> __('Numbers only! Example: 200','bladzijde'),
		'id' => 'header_height',
		'std' => '150',
		'type' => 'text');

	$options[] = array(
		'name' => __('Background Color for Header', 'bladzijde'),
		'desc' => __('No color selected by default.', 'bladzijde'),
		'id' => 'headerbg_colorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Display Header Search Box?', 'bladzijde'),
		'desc' => __('Display the search toggle in the header.', 'bladzijde'),
		'id' => 'search_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Text alignment for the Site Title and Tagline.', 'bladzijde'),
		'desc' => __('Default option is "center".', 'bladzijde'),
		'id' => 'alignment_radio',
		'std' => 'text-align-center',
		'type' => 'radio',
		'options' => $header_radio_array);

	$options[] = array(
		'name' => __('Display Site Title?', 'bladzijde'),
		'desc' => __('Display the site title in the header.', 'bladzijde'),
		'id' => 'displayh1_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Display Site Tagline?', 'bladzijde'),
		'desc' => __('Display the site tagline in the header.', 'bladzijde'),
		'id' => 'displayh2_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Display Box Behind Text?', 'bladzijde'),
		'desc' => __('Display a box behind  in the header (works best with center-aligned text).', 'bladzijde'),
		'id' => 'displaybox_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Logo Upload', 'bladzijde'),
		'desc' => __('This replaces the site title with your logo. Be sure to check the "display logo" checkbox below!', 'bladzijde'),
		'id' => 'logo_image_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Display Logo?', 'bladzijde'),
		'desc' => __('Replace the site title with your logo.', 'bladzijde'),
		'id' => 'logo_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Logo alignment.', 'bladzijde'),
		'desc' => __('Default option is "center".', 'bladzijde'),
		'id' => 'logo_radio',
		'std' => 'aligncenter',
		'type' => 'radio',
		'options' => $logo_align_array);

	$options[] = array(
		'name' => __('Display Footer Menu?', 'bladzijde'),
		'desc' => __('Display the menu in the footer.', 'bladzijde'),
		'id' => 'footer_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Alternate Footer Text', 'bladzijde'),
		'desc' => __('Write some alternative text for your footer (HTML is not allowed). Check the box below to display it.', 'options_framework_theme'),
		'id' => 'footer_text',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Display Alternate Footer Text?', 'bladzijde'),
		'desc' => __('Display alternative footer text.', 'bladzijde'),
		'id' => 'footer_text_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Background Color for Top Menu', 'bladzijde'),
		'desc' => __('#6AB0CC selected by default.', 'bladzijde'),
		'id' => 'top_colorpicker',
		'std' => '#6AB0CC',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Text Color for Top Menu', 'bladzijde'),
		'desc' => __('#ededed selected by default.', 'bladzijde'),
		'id' => 'top_text_colorpicker',
		'std' => '#ededed',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Hover Text Color for Top Menu', 'bladzijde'),
		'desc' => __('#ffffff selected by default.', 'bladzijde'),
		'id' => 'hover_top_text_colorpicker',
		'std' => '#ffffff',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Background Color for Footer and Bottom Menu', 'bladzijde'),
		'desc' => __('#6AB0CC selected by default.', 'bladzijde'),
		'id' => 'bottom_colorpicker',
		'std' => '#6AB0CC',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Text Color for Footer and Bottom Menu', 'bladzijde'),
		'desc' => __('#ededed selected by default.', 'bladzijde'),
		'id' => 'bottom_text_colorpicker',
		'std' => '#ededed',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Hover Text Color for Footer and Bottom Menu', 'bladzijde'),
		'desc' => __('#ffffff selected by default.', 'bladzijde'),
		'id' => 'hover_bottom_text_colorpicker',
		'std' => '#ffffff',
		'type' => 'color' );


	/* Settings for Static Front Page */

	$options[] = array(
		'name' => __('Settings for Static Front Page', 'bladzijde'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Using the Static Front Page Template', 'bladzijde'),
		'desc' => __('This theme comes with an optional Static Front Page Template that will display posts from a certain category as distinct sections of static/featured content (e.g. "About Us", "New This Month!") that you can easily update. These posts will not be displayed in your regular blog feed.
						<p>To use this template: 
						<ol>
							<li> Create a page.</li>
							<li> On your new page, select "Category Page Template for Static Front Page" under Templates.</li>
							<li> Write an introductory "Call to Action" blurb on the page you just created. This will be your first section.</li>
							<li> Create a category for the posts you would like to display on your front page (Note: posts in this category will NOT appear in your regular blog feed).</li>
							<li> Select that category from the drop down menu below. </li>
							<li> Write some posts! And be sure to post them in your chosen category.</li>
							<li> Under "Settings" and "Reading", select "Front page displays" to Static Front Page. Choose the page you just created.</li>
							<li> Optional: Create another page to hold your normal blog feed and set "Posts page:" to that page.</li>
						</ol>
						</p>', 'bladzijde'),
		'type' => 'info');

		if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Front Page Category', 'bladzijde'),
		'desc' => __('Choose the category of the posts you would like to display on your front page.', 'bladzijde'),
		'id' => 'select_categories',
		'type' => 'select',
		'options' => $options_categories);
	}

			if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Blog Category', 'bladzijde'),
		'desc' => __('Choose the category of the posts you would like to display on your blog page.', 'bladzijde'),
		'id' => 'select_categories_blog',
		'type' => 'select',
		'options' => $options_categories);
	}

	$options[] = array(
	'name' => __('Call to Action Uploader', 'bladzijde'),
	'desc' => __('This creates an optional full-width background image in the Call to Action on the Static Page.', 'bladzijde'),
	'id' => 'call_to_action_uploader',
	'type' => 'upload');

	$options[] = array(
		'name' => __('Fixed Image for Static Page (below Call to Action)', 'bladzijde'),
		'desc' => __('This creates an optional full-width fixed image below the Call to Action on the Static Page.', 'bladzijde'),
		'id' => 'fixed_image_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Select Image Alignment for Featured Images', 'options_framework_theme'),
		'desc' => __('Align the featured image for each post on the Static Front Page to the right or left.', 'options_framework_theme'),
		'id' => 'example_select',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $align_array);

	$options[] = array(
	'name' => __('Creating a Custom Scroll Menu for the', 'bladzijde'),
	'desc' => __('This theme comes with an optional scrolling menu for the static front page.
					<p>To Use This Menu</p>
					<ol>
						<li> Create a new menu.</li>
						<li> Name the new menu "Scroll Menu".</li>
						<li> Create a new menu item within the Links option in the sidebar on the left.</li>
						<li> In the "URL" box, type in "#area1" for the first item on the page.</li>
						<li> For the "Link Text" type in the text you would like to display in the menu (e.g. "About Us"). </li>
						<li> Click "Add to menu".</li>
						<li> For each additional menu item, type "#area2", "#area3", "#area4", etc. into the URL box.</li>
						<li> Click "Save Menu".</li>
						<li> Optional: You can also add Pages to this menu. However, once you click on that Page link, your user will navigate away from the Static Front Page menu and the "Primary Menu" will display in its place.</li>
					</ol>
					</p>', 'bladzijde'),
	'type' => 'info');

	$options[] = array(
		'name' => __('Shortcodes', 'bladzijde'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Create a Circular Photo', 'bladzijde'),
		'desc' => __(' [circle-photo] (image goes here) [/circle-photo] - Place this shortcode around an image for a circular "badge" photo.', 'bladzijde'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Display Circular Photos Horizontally', 'bladzijde'),
		'desc' => __('[display-horizontal] (content goes here) [/display-horizontal] - Place this shortcode around your images to display them horizontally.', 'bladzijde'),
		'type' => 'info');


	return $options;
}