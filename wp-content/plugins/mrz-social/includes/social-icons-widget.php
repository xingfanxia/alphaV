<?php
/**
* MRZ Social Icons Widget
*
* @since 0.0.1
* @package MRZ Social
* @author Michał Załęcki <michal@zalecki.pl>
*/
class MRZ_Social_Icons_Widget extends WP_Widget {

	/**
	 * Settings.
	 *
	 * @since 0.0.1
	 * @access private
	 */
	private $settings = array( 'default-icon-size' => '36px' );

	/**
	 * MRZ_Social_Icons_Widget constructor.
	 *
	 * Create widget and enqueue CSS.
	 *
	 * @since 0.0.1
	 * @see MRZ_Social_Icons_Widget
	 */
	public function __construct() {
		parent::__construct(
			'', 											// Base ID
			__('MRZ Social Icons Widget', 'mrz_social'), 	// Name
			array(											// Args
				'description' => __( 'Display social icons.', 'mrz_social' )
			)
		);

		wp_enqueue_style( 'mrz-social-widgets', plugins_url() . '/mrz-social/css/mrz-social-widgets.css' );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @since 0.0.1
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$icon_size = empty( $instance['icon-size'] ) ? $this->settings['default-icon-size'] : $instance['icon-size'];

		$html = $args['before_widget'];
		if ( ! empty( $title ) )
			$html .= $args['before_title'] . $title . $args['after_title'];
		$html .= '<ul class="mrz-social-icons">';
		$options = get_option('mrz_social_links');
			if ( is_array($options) ) {
				foreach ( $options as $id => $url ) {
					if ( ! empty( $url ) )
						$html .= '<li style="font-size: ' . $icon_size . '"><a href="' . $url . '" class="mrz-social-link-' . $id . '"><i class="mrz-social-icon-' . $id . '"></i></a></li>';
				}
			}
		$html .= '</ul>';
		$html .= $args['after_widget'];
		echo $html;
	}

	/**
	 * Ouputs the options form on admin
	 *
	 * @since 0.0.1
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = isset( $instance['title'] ) ? strip_tags($instance['title']) : '';
		$icon_size = empty( $instance['icon-size'] ) ? $this->settings['default-icon-size'] : strip_tags($instance['icon-size']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'icon-size' ); ?>"><?php _e( 'Icon size:', 'mrz_social' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'icon-size' ); ?>" name="<?php echo $this->get_field_name( 'icon-size' ); ?>" type="text" value="<?php echo esc_attr( $icon_size ); ?>">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @since 0.0.1
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icon-size'] = strip_tags($new_instance['icon-size']);
		return $instance;
	}
}

?>
