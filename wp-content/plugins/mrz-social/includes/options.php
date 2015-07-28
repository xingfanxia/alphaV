<?php

/**
 * Add MRZ Social options page
 *
 * @since 0.0.1
 */
function mrz_social_options() {

	add_options_page(
		__('MRZ Social Options', 'mrz_social'), // $page_title - The text to be displayed in the title tags of the page when the menu is selected
		__('MRZ Social', 'mrz_social'), 		// $menu_title - The text to be used for the menu
		'manage_options', 						// $capability - The capability required for this menu to be displayed to the user.
		'mrz_social_options',					// $menu_slug  - The slug name to refer to this menu by (should be unique for this menu).
		'mrz_social_options_callback' 			// $function   - The function to be called to output the content for this page.
	);

}

add_action('admin_menu', 'mrz_social_options');

/**
 * Initialize MRZ Social
 *
 * @since 0.0.1
 */
function mrz_social_init() {

	add_settings_section(
        'mrz_social_links_section',          	// $id 		 - String for use in the 'id' attribute of tags.
        __('Social Links', 'mrz_social'),		// $title    - Title of the section.
        'mrz_social_links_section_callback', 	// $callback - Function that fills the section with the desired content. The function should echo its output.
        'mrz_social_options'                    // $page 	 - The menu page on which to display this section. Should match $menu_slug.
    );

    $social_networks = array(
        'behance'       => 'Behance',
        'dribbble'      => 'Dribbble',
        'dropbox'       => 'Dropbox',
        'evernote'      => 'Evernote',
        'facebook'      => 'Facebook',
        'flattr'        => 'Flattr',
        'flickr'        => 'Flickr',
        'github'        => 'GitHub',
        'gplus'         => 'Google+',
        'instagram'     => 'Instagram',
        'lastfm'        => 'Last.fm',
        'linkedin'      => 'LinkedIn',
        'mixi'          => 'Mixi',
        'paypal'        => 'PayPal',
        'picasa'        => 'Picasa',
        'pinterest'     => 'Pinterest',
        'rdio'          => 'Rdio',
        'renren'        => 'Renren',
        'sina-weibo'    => 'Sina Weibo',
        'skype'         => 'Skype',
        'soundcloud'    => 'SoundCloud',
        'spotify'       => 'Spotify',
        'stumbleupon'   => 'StumbleUpon',
        'tumblr'        => 'Tumblr',
        'twitter'       => 'Twitter',
        'vimeo'         => 'Vimeo',
        'vkontakte'     => 'VKontakte',
        'yelp'          => 'Yelp'
    );

    foreach ($social_networks as $id => $name) {
        add_settings_field(
        'mrz_social_link_' . $id,           // $id - String for use in the 'id' attribute of tags.
        __( $name , 'mrz_social'),          // $title - Title of the field.
            'mrz_social_link_callback',     // $callback - Function that fills the field with the desired inputs as part of the larger form. Passed a single argument, the $args array.
            'mrz_social_options',           // $page - The menu page on which to display this field. Should match $menu_slug.
            'mrz_social_links_section',     // $section - The section of the settings page in which to show the box.
            array(                          // $args - Additional arguments that are passed to the $callback function.
                $id,
                sprintf( __( 'URL to %s.', 'mrz_social' ), $name )
            )
        );
    }

    register_setting(
        'mrz_social_options',		// $option_group - A settings group name. Must exist prior to the register_setting call. This must match the group name in settings_fields()
        'mrz_social_links',	  		// $option_name  - The name of an option to sanitize and save.
        'mrz_social_links_sanitize'	// $sanitize_callback - A callback function that sanitizes the option's value.
    );

    add_settings_section(
        'mrz_social_counters_section',
        __('Social Counters', 'mrz_social'),
        'mrz_social_counters_section_callback',
        'mrz_social_options'
    );

    add_settings_field(
        'mrz_social_facebook_page_id',
        __('Facebook page ID', 'mrz_social'),
        'mrz_social_counter_text_callback',
        'mrz_social_options',
        'mrz_social_counters_section',
        array(
            'facebook_page_id',
            '<a href="http://findmyfacebookid.com/">' . __( 'Find your Facebook page ID' , 'mrz_social') . '</a>'
        )
    );

    add_settings_field(
        'mrz_social_twitter_screen_name',
        __('Twitter screen name', 'mrz_social'),
        'mrz_social_counter_text_callback',
        'mrz_social_options',
        'mrz_social_counters_section',
        array(
            'twitter_screen_name',
            __('e.g., MarkZuckerbergF', 'mrz_social')
        )
    );

    add_settings_field(
        'mrz_social_twitter_api_key',
        __('Twitter API key', 'mrz_social'),
        'mrz_social_counter_text_callback',
        'mrz_social_options',
        'mrz_social_counters_section',
        array(
            'twitter_api_key',
            __( 'More at', 'mrz_social') . ' <a href="https://apps.twitter.com/">Twitter Application Management</a>'
        )
    );

    add_settings_field(
        'mrz_social_twitter_api_secret',
        __('Twitter API secret', 'mrz_social'),
        'mrz_social_counter_text_callback',
        'mrz_social_options',
        'mrz_social_counters_section',
        array(
            'twitter_api_secret',
            __( 'More at', 'mrz_social') . ' <a href="https://apps.twitter.com/">Twitter Application Management</a>'
        )
    );

    add_settings_field(
        'mrz_social_gplus_page_url',
        __('Google+ page URL', 'mrz_social'),
        'mrz_social_counter_text_callback',
        'mrz_social_options',
        'mrz_social_counters_section',
        array(
            'gplus_page_url',
            __('e.g., https://plus.google.com/104560124403688998123', 'mrz_social')
        )
    );

    register_setting(
        'mrz_social_options',       // $option_group - A settings group name. Must exist prior to the register_setting call. This must match the group name in settings_fields()
        'mrz_social_counters'         // $option_name  - The name of an option to sanitize and save.
    );

}

add_action('admin_init', 'mrz_social_init');

/* ------------------------------------------------------------------------ *
 * Pages Callbacks
 * ------------------------------------------------------------------------ */

/**
 * Create MRZ Social options page
 *
 * @since 0.0.1
 */
function mrz_social_options_callback() {
	?>
	<h2><?php _e('MRZ Social', 'mrz_social'); ?></h2>
	<form action="options.php" method="post">
		<?php settings_fields('mrz_social_options') ?>
		<?php do_settings_sections('mrz_social_options'); ?>
		<?php submit_button(); ?>
	</form>
	<?php
}

/* ------------------------------------------------------------------------ *
 * Sections Callbacks
 * ------------------------------------------------------------------------ */

/**
 * Create Social Links section
 *
 * @since 0.0.1
 */
function mrz_social_links_section_callback() {
	?>
	<p><?php _e('Add social links for prefered social networks.', 'mrz_social'); ?></p>
	<?php
}

/**
 * Create Social Links section
 *
 * @since 0.0.1
 */
function mrz_social_counters_section_callback() {
    ?>
    <p><?php _e('Settings required for MRZ Social Counters Widget.', 'mrz_social'); ?></p>
    <?php
}

/* ------------------------------------------------------------------------ *
 * Fields Callbacks
 * ------------------------------------------------------------------------ */

/**
 * Create Social Link field
 *
 * @since 0.0.1
 */
function mrz_social_link_callback( $args ) {
	$options = get_option( 'mrz_social_links' );

	isset($options[$args[0]]) || $options[$args[0]] = '';

	$output = '<input type="text" id="mrz_social_link_' . $args[0] . '" name="mrz_social_links[' . $args[0] . ']" value="' . $options[$args[0]] . '" />';
    /*
    if ( isset( $args[1] ) )
        $output .= '<p class="description">' . $args[1] . '</p>';
    */
	echo $output;
}

/**
 * Create Social Counter Text field
 *
 * @since 0.0.1
 */
function mrz_social_counter_text_callback( $args ) {
    $options = get_option( 'mrz_social_counters' );

    isset($options[$args[0]]) || $options[$args[0]] = '';

    $output = '<input type="text" id="mrz_social_counter_[' . $args[0] . ']" name="mrz_social_counters[' . $args[0] . ']" value="' . $options[$args[0]] . '" />';
    if ( isset( $args[1] ) )
        $output .= '<p class="description">' . $args[1] . '</p>';
    echo $output;
}

/* ------------------------------------------------------------------------ *
 * Santice Callbacks
 * ------------------------------------------------------------------------ */

function mrz_social_links_sanitize( $input ) {
	$output = array();
	foreach ($input as $key => $link) {
		$output[$key] = esc_url($link);
	}
	return $output;
}

?>
