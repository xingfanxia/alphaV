<?php

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option( 'mrz_social_links' );
delete_option( 'mrz_social_counters' );
delete_option( 'mrz_social_twitter_token' );

delete_transient( 'mrz_social_facebook_count' );
delete_transient( 'mrz_social_facebook_page_id' );
delete_transient( 'mrz_social_gplus_count' );
delete_transient( 'mrz_social_gplus_page_url' );
delete_transient( 'mrz_social_twitter_count' );
delete_transient( 'mrz_social_twitter_screen_name' );

?>
