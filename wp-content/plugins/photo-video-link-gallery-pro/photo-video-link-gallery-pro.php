<?php
/**
 * Plugin Name: Photo Video Link Gallery Pro 
 * Version: 5.1
 * Description: Design Photo, Video, Link, Image Gallery With CSS3 Hover Animation & Display With Lightbox
 * Author: Weblizar
 * Author URI: http://weblizar.com/plugins/photo-video-link-gallery-pro/
 * Plugin URI: http://weblizar.com/plugins/photo-video-link-gallery-pro/
 */
 
/**
 * Constant Variable
 */
define("PGPP_TEXT_DOMAIN","PGPP_TEXT_DOMAIN" );
define("PGPP_PLUGIN_URL", plugin_dir_url(__FILE__));

add_action('plugins_loaded', 'PGPP_GetReadyTranslation');
function PGPP_GetReadyTranslation() {
	load_plugin_textdomain(PGPP_TEXT_DOMAIN, FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

// Apply default settings on activation
register_activation_hook( __FILE__, 'PGPP_DefaultSettingsPro' );
function PGPP_DefaultSettingsPro(){
    $DefaultSettingsProArray = serialize( array(
		'PGPP_Effect'          		=> "effect2",
		'PGPP_Effect_animation'     => "right_to_left",
		'PGPP_Masonry_Thumbnail'    => "no",
		'PGPP_Image_Style'          => "rectangle",
		'PGPP_Show_Gallery_Title'	=> "yes",
		'PGPP_Show_Image_Label'     => "yes",
        'PGPP_Gallery_Layout'      	=> "col-md-6",
		'PGPP_Open_Link'      		=> "_blank",
        'PGPP_Color'         		=> "#31A3DD",
        'PGPP_Color_Opacity'		=> 0.5,
        'PGPP_Font_Style'			=> "Courgette",
        'PGPP_Light_Box'          	=> "lightbox2",
		'PGPP_Image_Border'    		=> "no",
		'PGPP_Image_Border_Size'    => 5,
        'PGPP_Image_Border_Color'   => "#FFFFFF"
    ));
    add_option("PGPP_Settings", $DefaultSettingsProArray);	
}

/**
* Crop Images In Desire Format
*/
add_image_size( 'PGPP_gallery_admin_thumb', 300, 300, array( 'top', 'center' ) ); 
add_image_size( 'PGPP_gallery_admin_circle', 400, 400, array( 'top', 'center' ) ); 
add_image_size( 'PGPP_gallery_admin_medium', 400,9999,array( 'top', 'center' ) ); 

// Function To Remove Feature Image
function PGPP_remove_image_box() {
	remove_meta_box('postimagediv','pgpp_gallery','side');
}
add_action('do_meta_boxes', 'PGPP_remove_image_box');

/**
* Short Code Detach Function To UpLoad JS And CSS
*/  
function PGPP_ShortCodeDetect() {
    global $wp_query;
    $Posts = $wp_query->posts;
    $Pattern = get_shortcode_regex();

    //foreach ($Posts as $Post) {
		//if ( strpos($Post->post_content, 'PGPP' ) ) {

			/**
             * js scripts
             */
            wp_enqueue_script('jquery');
			
         	/**
             * Load Light Box 2  preety photo JS CSS
             */  
			wp_enqueue_style('PGPP-pretty-css1', PGPP_PLUGIN_URL.'lightbox/prettyphoto/pgpp-prettyPhoto.css');
			wp_enqueue_script('PGPP-pretty-js1', PGPP_PLUGIN_URL.'lightbox/prettyphoto/pgpp-jquery.prettyPhoto.js', array('jquery'));
         	
			/**
             * Load Light Box 3 Swipebox JS CSS
             */   
			wp_enqueue_style('PGPP-swipe-css1', PGPP_PLUGIN_URL.'lightbox/swipebox/swipebox.css');
			wp_enqueue_script('PGPP-swipe-js1', PGPP_PLUGIN_URL.'lightbox/swipebox/jquery.swipebox.min.js', array('jquery'));    
			
		  /**   
             * css scripts
             */
           wp_enqueue_style('PGPP-boot-strap-css', PGPP_PLUGIN_URL.'css/bootstrap.css');
           wp_enqueue_style('PGPP-Main-css', PGPP_PLUGIN_URL.'css/main.css');
		   
            /**
             * font awesome css
             */
            wp_enqueue_style('PGPP-font-awesome-4', PGPP_PLUGIN_URL.'css/font-awesome-latest/css/font-awesome.min.css');

			/**
             * envira & isotope js
             */
            wp_enqueue_script( 'PGPP-envira-js', PGPP_PLUGIN_URL.'js/envira.js', array(), '1.5.26', true );
            wp_enqueue_script( 'PGPP-isotope-js', PGPP_PLUGIN_URL.'js/gl_isotope.js', array(), '', true );
			
            //break;
        //} //end of if
    //} //end of foreach
}
add_action( 'wp_enqueue_scripts', 'PGPP_ShortCodeDetect' );
add_filter( 'widget_text', 'do_shortcode' );

add_action('admin_menu' , 'PGPP_SettingsPage');

function PGPP_SettingsPage() {
    
    add_submenu_page('edit.php?post_type=pgpp_gallery', __('Help and Support', PGPP_TEXT_DOMAIN), __('Help and Support', PGPP_TEXT_DOMAIN), 'administrator', 'PGP-image-gallery-settings', 'PGPP_image_gallery_settings_page_function');
	add_submenu_page('edit.php?post_type=pgpp_gallery', __('Our Products', PGPP_TEXT_DOMAIN), __('Our Products', PGPP_TEXT_DOMAIN), 'administrator', 'PGPP-Our-Products-page', 'PGPP_Our_Products_page');
}

function PGPP_image_gallery_settings_page_function() {
    //css
    wp_enqueue_style('PGPP-boot-strap-admin', PGPP_PLUGIN_URL.'css/bootstrap-admin.css');
    require_once("pgp_help_support.php");
}

function PGPP_Our_Products_page() {
	wp_enqueue_style('PGPP-boot-strap-admin', PGPP_PLUGIN_URL.'css/bootstrap-admin.css');
    require_once("our_product.php");
}

class PGPP {
    private static $instance;
    private $admin_thumbnail_size = 150;
    private $thumbnail_size_w = 150;
    private $thumbnail_size_h = 150;
	var $counter;

    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		$this->counter = 0;
        add_action('admin_print_scripts-post.php', array(&$this, 'pgpp_admin_print_scripts'));
        add_action('admin_print_scripts-post-new.php', array(&$this, 'pgpp_admin_print_scripts'));
        add_image_size('pgpp_gallery_admin_thumb', $this->admin_thumbnail_size, $this->admin_thumbnail_size, true);
        add_image_size('pgpp_gallery_thumb', $this->thumbnail_size_w, $this->thumbnail_size_h, true);
        add_shortcode('pgppgallery', array(&$this, 'shortcode'));
        if (is_admin()) {
			add_action('init', array(&$this, 'PhotoGalleryPluginPro'), 1);
			add_action('add_meta_boxes', array(&$this, 'add_all_pgpp_meta_boxes'));
			add_action('admin_init', array(&$this, 'add_all_pgpp_meta_boxes'), 1);
			
			add_action('save_post', array(&$this, 'PGPP_image_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'PGPP_settings_meta_save'), 9, 1);
			
			add_action('wp_ajax_PGPPgallery_get_thumbnail', array(&$this, 'ajax_get_thumbnail'));
		}
    }
	
	//Required JS & CSS
	public function pgpp_admin_print_scripts() {
		if ( 'pgpp_gallery' == $GLOBALS['post_type'] ) {		
			wp_enqueue_script('media-upload');
			wp_enqueue_script('pgpp-media-uploader-js', PGPP_PLUGIN_URL . 'js/pgpp-multiple-media-uploader.js', array('jquery'));
			
			wp_enqueue_media();
			//custom add image box css
			wp_enqueue_style('pgpp-meta-css', PGPP_PLUGIN_URL.'css/pgpp-meta.css');
			
			//color-picker css n js
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'pgpp-color-picker-script', plugins_url('js/wl-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			
			//font awesome css
			wp_enqueue_style('pgpp-font-awesome-4', PGPP_PLUGIN_URL.'css/font-awesome-latest/css/font-awesome.min.css');
			
			//tool-tip js & css
			wp_enqueue_script('pgpp-tool-tip-js',PGPP_PLUGIN_URL.'tooltip/jquery.darktooltip.min.js', array('jquery'));
			wp_enqueue_style('pgpp-tool-tip-css', PGPP_PLUGIN_URL.'tooltip/darktooltip.min.css');
		}
	}
	
	// Register Custom Post Type
	public function PhotoGalleryPluginPro() {
		$labels = array(
			'name' => __('Photo Video Link Gallery Pro','PGPP_TEXT_DOMAIN' ),
			'singular_name' => __('Photo Video Link Gallery Pro','PGPP_TEXT_DOMAIN' ),
			'add_new' => __('Add New Gallery', 'PGPP_TEXT_DOMAIN' ),
			'add_new_item' => __('Add New Gallery', 'PGPP_TEXT_DOMAIN' ),
			'edit_item' => __('Edit Gallery', 'PGPP_TEXT_DOMAIN' ),
			'new_item' => __('New Gallery', 'PGPP_TEXT_DOMAIN' ),
			'view_item' => __('View Gallery', 'PGPP_TEXT_DOMAIN' ),
			'search_items' => __('Search Gallery', 'PGPP_TEXT_DOMAIN' ),
			'not_found' => __('No Gallery found', 'PGPP_TEXT_DOMAIN' ),
			'not_found_in_trash' => __('No Gallery found in Trash', 'PGPP_TEXT_DOMAIN' ),
			'parent_item_colon' => __('Parent Gallery:', 'PGPP_TEXT_DOMAIN' ),
			'all_items' => __('All Photo Video Link Gallery', 'PGPP_TEXT_DOMAIN' ),
			'menu_name' => __('Photo Video Link Gallery Pro', 'PGPP_TEXT_DOMAIN' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title','thumbnail'),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-format-gallery',
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => false,
			'capability_type' => 'post'
		);

        register_post_type( 'pgpp_gallery', $args );
        add_filter( 'manage_edit-pgpp_gallery_columns', array(&$this, 'pgpp_gallery_columns' )) ;
        add_action( 'manage_pgpp_gallery_posts_custom_column', array(&$this, 'pgpp_gallery_manage_columns' ), 10, 2 );
	}
	
	function pgpp_gallery_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Photo Video Link Gallery','PGPP_TEXT_DOMAIN' ),
            'shortcode' => __( 'Gallery Shortcode','PGPP_TEXT_DOMAIN' ),
            'date' => __( 'Date','PGPP_TEXT_DOMAIN' )
        );
        return $columns;
    }

    function pgpp_gallery_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[PGPP id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	
	public function add_all_pgpp_meta_boxes() {
		add_meta_box( __('Add Images', 'PGPP_TEXT_DOMAIN'), __('Add Images', 'PGPP_TEXT_DOMAIN'), array(&$this, 'PGPP_generate_add_image_meta_box_function'), 'pgpp_gallery', 'normal', 'low' );
		add_meta_box( __('Apply Setting On Gallery', 'PGPP_TEXT_DOMAIN'), __('Apply Setting On Gallery', 'PGPP_TEXT_DOMAIN'), array(&$this, 'PGPP_settings_meta_box_function'), 'pgpp_gallery', 'normal', 'low');
		add_meta_box ( __('Gallery Shortcode', 'PGPP_TEXT_DOMAIN'), __('Gallery Shortcode', 'PGPP_TEXT_DOMAIN'), array(&$this, 'PGPP_shotcode_meta_box_function'), 'pgpp_gallery', 'side', 'low');
		}

	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into gallery
	 */
    public function PGPP_generate_add_image_meta_box_function($post) { ?>
		<div >
			<input id="PGPP_delete_all_button" class="button" type="button" value="Delete All" rel="">
			<input type="hidden" id="PGPP_wl_action" name="PGPP_wl_action" value="PGPP-save-settings">
            <ul id="pgpp_gallery_thumbs" class="clearfix">
				<?php
				/* load saved photos into portfolio */
				$WPGP_AllPhotosDetails = unserialize(get_post_meta( $post->ID, 'PGPP_all_photos_details', true));
				$TotalImages =  get_post_meta( $post->ID, 'PGPP_total_images_count', true );
				if($TotalImages) {
					foreach($WPGP_AllPhotosDetails as $WPGP_SinglePhotoDetails) {
						$name = $WPGP_SinglePhotoDetails['PGPP_image_label'];
						$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
						$url = $WPGP_SinglePhotoDetails['PGPP_image_url'];
						$url1 = $WPGP_SinglePhotoDetails['PGPP_gallery_admin_thumb'];
						$url2 = $WPGP_SinglePhotoDetails['PGPP_gallery_admin_medium'];
						$circle = $WPGP_SinglePhotoDetails['PGPP_gallery_admin_circle'];
						$video = $WPGP_SinglePhotoDetails['PGPP_video_link']; 
						$link = $WPGP_SinglePhotoDetails['PGPP_external_link'];
						$type = $WPGP_SinglePhotoDetails['PGPP_portfolio_type'];
						?>
						<li class="pgpp-image-entry" id="rpg_img">
							<a class="image_gallery_remove pgppgallery_remove" href="#gallery_remove" id="rpg_remove_bt" ><img src="<?php echo  PGPP_PLUGIN_URL.'images/image-close-icon.png'; ?>" /></a>
							<div class="pgpp-admin-inner-div1" >
								
								<img src="<?php echo $url1; ?>" class="pgpp-meta-image" alt=""  style="">
								<input type="hidden" id="unique_string[]" name="unique_string[]" value="<?php echo $UniqueString; ?>" />
								
								<select name="PGPP_portfolio_type[]" id="PGPP_portfolio_type[]" style="width:100%;">
									<optgroup label="Select Type">
										<option value="image" <?php if($type == 'image') echo "selected=selected"; ?>><i class="fa fa-image"></i> <?php _e('Image','PGPP_TEXT_DOMAIN')?></option>
										<option value="video" <?php if($type == 'video') echo "selected=selected"; ?>><i class="fa fa-youtube-play"></i> <?php _e('Video','PGPP_TEXT_DOMAIN')?></option>
										<option value="link" <?php if($type == 'link') echo "selected=selected"; ?>><i class="fa fa-link"></i> <?php _e('Link','PGPP_TEXT_DOMAIN')?></option>
									</optgroup>
								</select>
							</div>
							<div class="pgpp-admin-inner-div2" >
								
								<input type="text" id="PGPP_image_url[]" name="PGPP_image_url[]" class="pgpp_label_text"  value="<?php echo $url; ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="PGPP_gallery_admin_thumb[]" name="PGPP_gallery_admin_thumb[]" class="pgpp_label_text"  value="<?php echo $url1; ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="PGPP_gallery_admin_medium[]" name="PGPP_gallery_admin_medium[]" class="pgpp_label_text"  value="<?php echo $url2; ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="PGPP_gallery_admin_circle[]" name="PGPP_gallery_admin_circle[]" class="pgpp_label_text"  value="<?php echo $circle; ?>"  readonly="readonly" style="display:none;" />
				
								<p>
									<label><?php _e('Label','PGPP_TEXT_DOMAIN')?></label>
									<input type="text" id="PGPP_image_label[]" name="PGPP_image_label[]" value="<?php echo $name; ?>" placeholder="Enter Label Here" class="pgpp_label_text">
								</p>
								<p>
									<label><?php _e('Video URL','PGPP_TEXT_DOMAIN')?> ( <a href="http://weblizar.com/get-youtube-vimeo-video-url/" target="_blank"><strong><?php _e('Help','PGPP_TEXT_DOMAIN')?></strong></a> )</label>
									<input type="text" id="PGPP_video_link[]" name="PGPP_video_link[]" value="<?php echo $video; ?>" placeholder="Enter Youtube/Vimeo Video URL" class="pgpp_label_text">
								</p>
								<label><?php _e('Link','PGPP_TEXT_DOMAIN')?></label>
								<input type="text" id="PGPP_external_link[]" name="PGPP_external_link[]" value="<?php echo $link; ?>" placeholder="Enter Link URL" class="pgpp_label_text">
							</div>
						</li>
						<?php
					} // end of foreach
				} else {
					$TotalImages = 0;
				}
				?>
            </ul>
        </div>
		
		<!--Add New Image Button-->
		<div class="pgpp-image-entry add_pgpp_new_image" id="pgpp_gallery_upload_button" data-uploader_title="Upload Image" data-uploader_button_text="Select" >
			<div class="dashicons dashicons-plus"></div>
			<p>
				<?php _e('Add New Media', PGPP_TEXT_DOMAIN); ?>
			</p>
		</div>
		<div style="clear:left;"></div>
        <?php
    }
	
	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into gallery
	 */
    public function PGPP_settings_meta_box_function($post) { 
		require_once('photo-video-link-gallery-pro-setting-meta-box.php');
	}
	
	public function PGPP_shotcode_meta_box_function() { ?>
		<p><?php _e("Use below shortcode in any Page/Post to publish your gallery", PGPP_TEXT_DOMAIN);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[PGPP id=".get_the_ID()."]"; ?>">
		<?php 
	}
	

	public function admin_thumb($id) {
		$image  = wp_get_attachment_image_src($id, 'PGPP_gallery_admin_original', true);
		$image1 = wp_get_attachment_image_src($id, 'PGPP_gallery_admin_thumb', true);
		$image2 = wp_get_attachment_image_src($id, 'PGPP_gallery_admin_medium', true);
		$circle = wp_get_attachment_image_src($id, 'PGPP_gallery_admin_circle', true);
		$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        ?>
		<li class="pgpp-image-entry" id="rpg_img">
			<a class="image_gallery_remove pgppgallery_remove" href="#gallery_remove" id="rpg_remove_bt" ><img src="<?php echo  PGPP_PLUGIN_URL.'images/image-close-icon.png'; ?>" /></a>
			<div class="pgpp-admin-inner-div1" >
				
				<img src="<?php echo $image1[0]; ?>" class="pgpp-meta-image" alt=""  style="">
				<select name="PGPP_portfolio_type[]" id="PGPP_portfolio_type[]" style="width:100%;">
					<optgroup label="Select Type">
						<option value="image" selected="selected"><i class="fa fa-image"></i> <?php _e('Image','PGPP_TEXT_DOMAIN')?></option>
						<option value="video"><i class="fa fa-youtube-play"></i> <?php _e('Video','PGPP_TEXT_DOMAIN')?></option>
						<option value="link"><i class="fa fa-link"></i> <?php _e('Link','PGPP_TEXT_DOMAIN')?></option>
					</optgroup>
				</select>
				</div>
			<div class="pgpp-admin-inner-div2" >
				<input type="text" id="PGPP_image_url[]" name="PGPP_image_url[]" class="pgpp_label_text"  value="<?php echo $image[0]; ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="PGPP_gallery_admin_thumb[]" name="PGPP_gallery_admin_thumb[]" class="pgpp_label_text"  value="<?php echo $image1[0]; ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="PGPP_gallery_admin_medium[]" name="PGPP_gallery_admin_medium[]" class="pgpp_label_text"  value="<?php echo $image2[0]; ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="PGPP_gallery_admin_circle[]" name="PGPP_gallery_admin_circle[]" class="pgpp_label_text"  value="<?php echo $circle[0]; ?>"  readonly="readonly" style="display:none;" />
				<p>
					<label><?php _e('Label','PGPP_TEXT_DOMAIN')?></label>
					<input type="text" id="PGPP_image_label[]" name="PGPP_image_label[]" placeholder="Enter Label Here" class="pgpp_label_text">
				</p>
				<p>
					<label><?php _e('Video URL','PGPP_TEXT_DOMAIN')?> ( <a href="http://weblizar.com/get-youtube-vimeo-video-url/" target="_blank"><strong><?php _e('Help','PGPP_TEXT_DOMAIN')?></strong></a> )</label>
					<input type="text" id="PGPP_video_link[]" name="PGPP_video_link[]" placeholder="Enter Youtube/Vimeo Video URL" class="pgpp_label_text">
				</p>
					<label><?php _e('Link','PGPP_TEXT_DOMAIN')?></label>
					<input type="text" id="PGPP_external_link[]" name="PGPP_external_link[]" placeholder="Enter Link URL" class="pgpp_label_text">
			</div>
		</li>
        <?php
    }
	
	
    public function ajax_get_thumbnail() {
        echo $this->admin_thumb($_POST['imageid']);
        die;
    }

    public function PGPP_image_meta_box_save($PostID) {
		if(isset($PostID) && isset($_POST['PGPP_wl_action'])) {
			if(isset($_POST['PGPP_image_url'])){
				$TotalImages = count($_POST['PGPP_image_url']);
				$ImagesArray = array();
				if($TotalImages) {
					for($i=0; $i < $TotalImages; $i++) {
						$image_label = stripslashes($_POST['PGPP_image_label'][$i]);
						$url = $_POST['PGPP_image_url'][$i];
						$url1 = $_POST['PGPP_gallery_admin_thumb'][$i];
						$url2 = $_POST['PGPP_gallery_admin_medium'][$i];
						$circle = $_POST['PGPP_gallery_admin_circle'][$i];
						$video = $_POST['PGPP_video_link'][$i];
						$link = $_POST['PGPP_external_link'][$i];
						$type = $_POST['PGPP_portfolio_type'][$i];
						$ImagesArray[] = array(
							'PGPP_image_label' => $image_label,
							'PGPP_image_url' => $url,
							'PGPP_gallery_admin_thumb' => $url1,
							'PGPP_gallery_admin_medium' => $url2,
							'PGPP_gallery_admin_circle' => $circle,
							'PGPP_video_link' => $video,
							'PGPP_external_link' => $link,
							'PGPP_portfolio_type' => $type
						);
					}
					update_post_meta($PostID, 'PGPP_all_photos_details', serialize($ImagesArray));
					update_post_meta($PostID, 'PGPP_total_images_count', $TotalImages);
				} 
			
			}else {
				$TotalImages = 0;
				update_post_meta($PostID, 'PGPP_total_images_count', $TotalImages);
				$ImagesArray = array();
				update_post_meta($PostID, 'PGPP_all_photos_details', serialize($ImagesArray));
			}
		}
    }
	
	//save settings meta box values
	public function PGPP_settings_meta_save($PostID) {		
	  if(isset($PostID) && isset($_POST['PGPP_Show_Gallery_Title'])){
			
		$PGPP_Effect  = $_POST['PGPP_Effect'];
		
		switch ($PGPP_Effect) {
			case "effect2":
				$PGPP_Effect_animation=$_POST['PGPP_effect2_anim'];
				break;
			case "effect3":
				$PGPP_Effect_animation=$_POST['PGPP_effect3_anim'];
				break;
			case "effect4":
				$PGPP_Effect_animation=$_POST['PGPP_effect4_anim'];
				break;
			case "effect6":
				$PGPP_Effect_animation=$_POST['PGPP_effect6_anim'];
				break;
			case "effect7":
				$PGPP_Effect_animation=$_POST['PGPP_effect7_anim'];
				break;
			case "effect8":
				$PGPP_Effect_animation=$_POST['PGPP_effect8_anim'];
				break;
			case "effect9":
				$PGPP_Effect_animation=$_POST['PGPP_effect9_anim'];
				break;
			case "effect10":
				$PGPP_Effect_animation=$_POST['PGPP_effect10_anim'];
				break;
			case "effect11":
				$PGPP_Effect_animation=$_POST['PGPP_effect11_anim'];
				break;
			case "effect12":
				$PGPP_Effect_animation=$_POST['PGPP_effect12_anim'];
				break;
			case "effect13":
				$PGPP_Effect_animation=$_POST['PGPP_effect13_anim'];
				break;				
			case "effect14":
				$PGPP_Effect_animation=$_POST['PGPP_effect14_anim'];
				break;	
			case "effect15":
				$PGPP_Effect_animation=$_POST['PGPP_effect15_anim'];
				break;
			case "effect16":
				$PGPP_Effect_animation=$_POST['PGPP_effect16_anim'];
				break;
			case "effect18":
				$PGPP_Effect_animation=$_POST['PGPP_effect18_anim'];
				break;
			case "effect20":
				$PGPP_Effect_animation=$_POST['PGPP_effect20_anim'];
				break;	
			default:
				$PGPP_Effect_animation="";
		}
		
		$PGPP_Masonry_Thumbnail    	= $_POST['PGPP_Masonry_Thumbnail'];
		$PGPP_Image_Style    		= $_POST['PGPP_Image_Style'];
		$PGPP_Show_Gallery_Title    = $_POST['PGPP_Show_Gallery_Title'];
		$PGPP_Show_Image_Label      = $_POST['PGPP_Show_Image_Label'];
		$PGPP_Gallery_Layout        = $_POST['PGPP_Gallery_Layout'];
		$PGPP_Open_Link		        = $_POST['PGPP_open_link'];
		$PGPP_Color 				= $_POST['PGPP_Color'];
		$PGPP_Color_Opacity         = $_POST['PGPP_Color_Opacity'];
		$PGPP_Font_Style           	= $_POST['PGPP_Font_Style'];
		$PGPP_Light_Box           	= $_POST['PGPP_Light_Box'];
		$PGPP_Image_Border          = $_POST['PGPP_Image_Border'];
		$PGPP_Image_Border_Size     = $_POST['PGPP_Image_Border_Size'];
		$PGPP_Image_Border_Color    = $_POST['PGPP_Image_Border_Color'];
		$PGPP_Custom_CSS    		= $_POST['PGPP_Custom_CSS'];

		$PGPP_Settings_Array = serialize( array(
			'PGPP_Effect'          		=> $PGPP_Effect,
			'PGPP_Effect_animation'     => $PGPP_Effect_animation,
			'PGPP_Masonry_Thumbnail'    => $PGPP_Masonry_Thumbnail,
			'PGPP_Image_Style'          => $PGPP_Image_Style,
			'PGPP_Show_Gallery_Title'	=> $PGPP_Show_Gallery_Title,
			'PGPP_Show_Image_Label'     => $PGPP_Show_Image_Label,
			'PGPP_Gallery_Layout'      	=> $PGPP_Gallery_Layout,
			'PGPP_Open_Link'      		=> $PGPP_Open_Link,
			'PGPP_Color'         		=> $PGPP_Color,
			'PGPP_Color_Opacity'		=> $PGPP_Color_Opacity,
			'PGPP_Font_Style'			=> $PGPP_Font_Style,
			'PGPP_Light_Box'          	=> $PGPP_Light_Box,
			'PGPP_Image_Border'         => $PGPP_Image_Border,
			'PGPP_Image_Border_Size'    => $PGPP_Image_Border_Size,
			'PGPP_Image_Border_Color'   => $PGPP_Image_Border_Color,
			'PGPP_Custom_CSS'   		=> $PGPP_Custom_CSS
		) );

		$PGPP_Gallery_Settings = "PGPP_Gallery_Settings_".$PostID;
		update_post_meta($PostID, $PGPP_Gallery_Settings, $PGPP_Settings_Array);
	  }
	}
}

global $PGPP;
$PGPP = PGPP::forge();

/**
 * Photo Video Link Gallery Pro Short Code [PGPP].
 */
require_once("photo-video-link-gallery-pro-short-code.php");

add_action('media_buttons_context', 'pgpp_add_rpg_custom_button');
add_action('admin_footer', 'pgpp_add_rpg_inline_popup_content');


function pgpp_add_rpg_custom_button($context) {
 $img = plugins_url( '/images/gallery.png' , __FILE__ );
  $container_id = 'PGPP';
  $title =  __('Select Gallery to insert into post','PGPP_TEXT_DOMAIN') ;
  $context = '<a class="button button-primary thickbox"  title="'. __("Select Gallery to insert into post",PGPP_TEXT_DOMAIN).'"  
  href="#TB_inline?width=400&inlineId='.$container_id.'">
		<span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
	'. __("Photo Video Link Gallery Pro Shortcode","PGPP_TEXT_DOMAIN").'
	</a>';
  return $context;
}

function pgpp_add_rpg_inline_popup_content() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#pgpp_galleryinsert').on('click', function() {
			var id = jQuery('#pgpp-gallery-select option:selected').val();
			window.send_to_editor('<p>[PGPP id=' + id + ']</p>');
			tb_remove();
		})
	});
	</script>

	<div id="PGPP" style="display:none;">
	  <h3><?php _e('Select Photo Video Link Gallery Pro To Insert Into Post','PGPP_TEXT_DOMAIN');?></h3>
	  <?php 
		$all_posts = wp_count_posts( 'pgpp_gallery')->publish;
		$args = array('post_type' => 'pgpp_gallery', 'posts_per_page' =>$all_posts);
		global $pgpp_galleries;
		$pgpp_galleries = new WP_Query( $args );			
		if( $pgpp_galleries->have_posts() ) { ?>	
			<select id="pgpp-gallery-select">
				<?php
				while ( $pgpp_galleries->have_posts() ) : $pgpp_galleries->the_post(); ?>
				<option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
				<?php
				endwhile; 
				?>
			</select>
			<button class='button primary' id='pgpp_galleryinsert'><?php _e('Insert Gallery Shortcode','PGPP_TEXT_DOMAIN');?></button>
			<?php
		} else { 
			_e('No Gallery found','PGPP_TEXT_DOMAIN');
		}
		?>
	</div>
	<?php
}
?>