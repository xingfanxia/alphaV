<?php
/**
* MRZ Social Counter
*
* Provide methods for getting number of likes, folowers etc.
*
* @since 0.0.1
* @package MRZ Social
* @author Michał Załęcki <michal@zalecki.pl>
*/
class MRZ_Social_Counter {

	/**
	 * Settings from database.
	 *
	 * @since 0.0.1
	 * @access private
	 */
	private $settings;

	/**
	 * MRZ_Social_Counter constructor.
	 *
	 * Assign settings from database.
	 *
	 * @since 0.0.1
	 * @see MRZ_Social_Counter
	 */
	public function __construct() {
		$options = get_option('mrz_social_counters');
		$this->settings = array(
			'facebook_page_id' 		=> isset( $options['facebook_page_id'] ) 	? $options['facebook_page_id'] : '',
			'gplus_page_url' 		=> isset( $options['gplus_page_url'] ) 		? $options['gplus_page_url'] : '',
			'twitter_screen_name' 	=> isset( $options['twitter_screen_name'] ) ? $options['twitter_screen_name'] : '',
			'twitter_api_key' 		=> isset( $options['twitter_api_key'] ) 	? $options['twitter_api_key'] : '',
			'twitter_api_secret' 	=> isset( $options['twitter_api_secret'] ) 	? $options['twitter_api_secret'] : '',
		);
	}

	/**
	 * Facebook likes.
	 *
	 * @since 0.0.1
	 *
	 * @see MRZ_Social_Counter
	 *
	 * @param  string $page_id Optional. ID of Facebook page.
	 * @return string Number of likes.
	 */
	public function facebook( $page_id = false ) {
		if ( $page_id === false )
			$page_id = $this->settings['facebook_page_id'];

		$count = get_transient( 'mrz_social_facebook_count' );
		$old_page_id = get_transient( 'mrz_social_facebook_page_id' );

		if ( $count === false || $page_id != $old_page_id ) {
			$data = wp_remote_get( 'http://api.facebook.com/restserver.php?method=facebook.fql.query&query=SELECT%20fan_count%20FROM%20page%20WHERE%20page_id=' . $page_id );
			if ( !is_wp_error( $data ) ) {
				$xml = new SimpleXmlElement( $data['body'] );
				if ( !isset($xml->page->fan_count) )
					return false;
				$count = (int) $xml->page->fan_count;
				set_transient( 'mrz_social_facebook_count', $count , HOUR_IN_SECONDS );
				set_transient( 'mrz_social_facebook_page_id', $page_id, HOUR_IN_SECONDS );
			}
		}

		return $count;
	}

	/**
	 * Google+'s +1.
	 *
	 * @since 0.0.1
	 *
	 * @see MRZ_Social_Counter
	 * @link https://gist.github.com/jonathanmoore/2640302
	 *
	 * @param  string $page_url Optional. Google+ page URL.
	 * @return string Number of +1.
	 */
	public function gplus( $page_url = false ) {
		if ( $page_url === false )
			$page_url = $this->settings['gplus_page_url'];

		$count = get_transient( 'mrz_social_gplus_count' );
		$old_page_url = get_transient( 'mrz_social_gplus_page_url' );

		if ( $count === false || $page_url != $old_page_url ) {
			$params = array(
				'method'    => 'POST',
				'sslverify' => false,
				'timeout'   => 30,
				'headers'   => array( 'Content-Type' => 'application/json' ),
				'body'      => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $page_url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]'
			);

			$data = wp_remote_get( 'https://clients6.google.com/rpc', $params );

			if ( !is_wp_error( $data ) ) {
				$encoded_json = json_decode( $data['body'] );
				if ( !isset($encoded_json[0]->result->metadata->globalCounts->count) )
					return false;
				$count = $encoded_json[0]->result->metadata->globalCounts->count;
				set_transient( 'mrz_social_gplus_count', $count , HOUR_IN_SECONDS );
				set_transient( 'mrz_social_gplus_page_url', $page_url, HOUR_IN_SECONDS );
			}
		}

		return $count;
	}

	/**
	 * Twitter followers.
	 *
	 * @since 0.0.1
	 *
	 * @see MRZ_Social_Counter
	 * @link http://www.codeforest.net/get-twitter-follower-count
	 *
	 * @param  string $screen_name Optional. Twitter screen name.
	 * @param  string $api_key Optional. Twitter API key.
	 * @param  string $api_secret Optional. Twitter API secret.
	 * @return string Number of followers on twitter.
	 */
	public function twitter( $screen_name = false, $api_key = false, $api_secret = false ) {
		if ( $screen_name === false )
			$screen_name = $this->settings['twitter_screen_name'];
		if ( $api_key === false )
			$api_key = $this->settings['twitter_api_key'];
		if ( $api_secret === false )
			$api_secret = $this->settings['twitter_api_secret'];


		$count = get_transient( 'mrz_social_twitter_count' );
		$token = get_option('mrz_social_twitter_token');
		$old_screen_name = get_transient( 'mrz_social_twitter_screen_name' );

		if ( $token === false ) {
			$token_param = array(
                'method' => 'POST',
                'httpversion' => '1.1',
                'blocking' => true,
                'headers' => array(
                    'Authorization' => 'Basic ' . base64_encode( $api_key . ':' . $api_secret ),
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );

            add_filter('https_ssl_verify', '__return_false' );

            $token_data = wp_remote_post( 'https://api.twitter.com/oauth2/token', $token_param );

            if ( !is_wp_error( $token_data ) ) {
            	$encoded_token_json = json_decode( wp_remote_retrieve_body( $token_data ) );
            	if ( !isset($encoded_token_json->access_token) )
            		return false;
            	$token = $encoded_token_json->access_token;
            	update_option( 'mrz_social_twitter_token', $token );
            }
		}

		if ( $count === false || $screen_name != $old_screen_name ) {
	        $param = array(
	            'httpversion' => '1.1',
	            'blocking' => true,
	            'headers' => array(
	                'Authorization' => 'Bearer ' . $token
	            )
	        );

	        add_filter( 'https_ssl_verify', '__return_false' );

	        $data = wp_remote_get( 'https://api.twitter.com/1.1/users/show.json?screen_name=' . $screen_name, $param );

	        if ( !is_wp_error( $data ) ) {
	        	$encoded_json = json_decode( wp_remote_retrieve_body( $data ) );
	        	if ( !isset($encoded_json->followers_count) )
	        		return false;
	        	$count = $encoded_json->followers_count;
	        	set_transient( 'mrz_social_twitter_screen_name', $screen_name , HOUR_IN_SECONDS );
	        	set_transient( 'mrz_social_twitter_count', $count , HOUR_IN_SECONDS );
	        }
		}

		return $count;
	}
}

?>