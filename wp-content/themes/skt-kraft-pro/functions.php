<?php
/**
 * SKT Kraft functions and definitions
 *
 * @package SKT Kraft
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}


if ( ! function_exists( 'skt_kraft_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_kraft_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-kraft', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_image_size('homepage-thumb',240,145,true);	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-kraft' ),
		'footer' => __( 'Footer Menu', 'skt-kraft' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_kraft_setup
add_action( 'after_setup_theme', 'skt_kraft_setup' );

function skt_kraft_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-kraft' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-kraft' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'skt-kraft' ),
		'description'   => __( 'Appears on page sidebar', 'skt-kraft' ),
		'id'            => 'sidebar-main',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'skt-kraft' ),
		'description'   => __( 'Appears on footer', 'skt-kraft' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="cols-3 widget-column-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'skt-kraft' ),
		'description'   => __( 'Appears on footer', 'skt-kraft' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="cols-3 widget-column-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'skt-kraft' ),
		'description'   => __( 'Appears on footer', 'skt-kraft' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="cols-3 widget-column-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Sidebar Contact Page', 'skt-kraft' ),
		'description'   => __( 'Appears on contact page', 'skt-kraft' ),
		'id'            => 'sidebar-contact',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'skt-kraft' ),
		'description'   => __( 'Appears on header', 'skt-kraft' ),
		'id'            => 'header-widget',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6 style="display:none">',
		'after_title'   => '</h6>',
	) );
		

}
add_action( 'widgets_init', 'skt_kraft_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

function skt_kraft_scripts() {
	
	wp_enqueue_style( 'skt_kraft-gfonts-roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' );	
	wp_enqueue_style( 'skt_kraft-gfonts-robotocondensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700' );	
	wp_enqueue_style( 'skt_kraft-gfonts-lato', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' );
	wp_enqueue_style( 'skt_kraft-gfonts-ptsans', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' );	
	wp_enqueue_style( 'skt_kraft-gfonts-raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' );
	
	

	if( of_get_option('bodyfontface',true) != '' ){
		wp_enqueue_style( 'skt_kraft-gfonts-body', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('bodyfontface',true)) );
	}
	if( of_get_option('logofontface',true) != '' ){
		wp_enqueue_style( 'skt_kraft-gfonts-logo', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('logofontface',true)) );
	}
	if ( of_get_option('navfontface', true) != '' ) {
		wp_enqueue_style( 'skt_kraft-gfonts-nav', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('navfontface',true)) );
	}
	if ( of_get_option('headfontface', true) != '' ) {
		wp_enqueue_style( 'skt_kraft-gfonts-heading', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('headfontface',true)) );
	}
	
	if ( of_get_option('hdrtopfontface', true) != '' ) {
		wp_enqueue_style( 'skt_kraft-gfonts-hdrtopfontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('hdrtopfontface',true)) );
	}
	
	if ( of_get_option('hdrtopfontface', true) != '' ) {
		wp_enqueue_style( 'skt_kraft-gfonts-hdrtopfontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('hdrtopfontface',true)) );
	}
	

	wp_enqueue_style( 'skt_kraft-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt_kraft-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'skt_kraft-base-style', get_template_directory_uri().'/css/style_base.css' );	
	if ( is_home() || is_front_page() ) { 
	wp_enqueue_style( 'skt_kraft-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'skt_kraft-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}	
	wp_enqueue_style( 'skt_kraft-prettyphoto-style', get_template_directory_uri().'/css/prettyPhoto.css' );
	wp_enqueue_script( 'skt_kraft-prettyphoto-script', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery') );
	wp_enqueue_script( 'skt_kraft-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'skt_kraft-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery') );
	wp_enqueue_script( 'skt_kraft-filter-scripts', get_template_directory_uri().'/js/filter-gallery.js' );
	wp_enqueue_style( 'skt_kraft-font-awesome-style', get_template_directory_uri().'/css/font-awesome.min.css' );	
	wp_enqueue_script( 'skt_kraft-testimonialsminjs', get_template_directory_uri().'/testimonialsrotator/js/jquery.quovolver.min.js', array('jquery') );
	wp_enqueue_script( 'skt_kraft-testimonials-bootstrap', get_template_directory_uri().'/testimonialsrotator/js/bootstrap.js', array('jquery') );
	wp_enqueue_style( 'skt_kraft-testimonialslider-style', get_template_directory_uri().'/testimonialsrotator/js/tm-rotator.css' );		
	wp_enqueue_style( 'skt_kraft-animation-style', get_template_directory_uri().'/css/animation.css' );
	wp_enqueue_style( 'skt_kraft-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );		
	wp_enqueue_style( 'skt_kraft-owl-style', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.css' );
	wp_enqueue_script( 'skt_kraft-owljs', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.js', array('jquery') );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_kraft_scripts' );

function media_css_hook(){
	
	?>
    	
    	<script>
			jQuery(window).bind('scroll', function() {
	var wwd = jQuery(window).width();
	if( wwd > 939 ){
		var navHeight = jQuery( window ).height() - 0;
		<?php if( of_get_option('headstick',true) != true) { ?>
		if (jQuery(window).scrollTop() > navHeight) {
			jQuery(".header").addClass('fixed');
		}else {
			jQuery(".header").removeClass('fixed');
		}
		<?php } ?>
	}
});
		jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
        	effect:'<?php echo of_get_option('slideefect',true); ?>', //sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
		  	animSpeed: <?php echo of_get_option('slideanim',true); ?>,
			pauseTime: <?php echo of_get_option('slidepause',true); ?>,
			directionNav: <?php echo of_get_option('slidenav',true); ?>,
			controlNav: <?php echo of_get_option('slidepage',true); ?>,
			pauseOnHover: <?php echo of_get_option('slidepausehover',true); ?>,
    });
});


jQuery(document).ready(function() {
  
  jQuery('.link').on('click', function(event){
    var $this = jQuery(this);
    if($this.hasClass('clicked')){
      $this.removeAttr('style').removeClass('clicked');
    } else{
      $this.css('background','#7fc242').addClass('clicked');
    }
  });
 
});
		</script>
<?php 
}
add_action('wp_head','media_css_hook'); 


function skt_kraft_custom_head_codes() { 
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
		}
		echo "<style>";
		if ( of_get_option('bodyfontface', true) != '') {
			echo 'body, .price-table{font-family:\''. esc_html( of_get_option('bodyfontface', true) ) .'\', sans-serif;}';
		}
		if ( of_get_option('bodyfontcolor', true) != '' ) {
			echo 'body, .contact-form-section .address,  .accordion-box .acc-content{color:'. esc_html( of_get_option('bodyfontcolor', true) ) .';}';
		}
		if( of_get_option('bodyfontsize',true) != ''){
			echo "body{font-size:".of_get_option('bodyfontsize',true)."}";
		}
		if( of_get_option('logofontface',true) != '' || of_get_option('logofontcolor',true) != '' || of_get_option('logofontsize',true) != ''){
			echo ".header .header-inner .logo h1, .header .header-inner .logo a {font-family:".of_get_option('logofontface').";color:".of_get_option('logofontcolor',true).";font-size:".of_get_option('logofontsize',true)."}";
		}
		if( of_get_option('logofontcolor',true) != '' ){
			echo ".header span.tagline{color:".of_get_option('logofontcolor',true).";}";
		}		
		if( of_get_option('hdrtopfontface',true) != '' || of_get_option('hdrtopfontcolor',true) != '' || of_get_option('hdrtopfontsize',true) != '' || of_get_option('hdrtopbgcolor',true) != ''){
			echo ".signin_wrap {font-family:".of_get_option('hdrtopfontface').";color:".of_get_option('hdrtopfontcolor',true).";font-size:".of_get_option('hdrtopfontsize',true)."; background-color:".of_get_option('hdrtopbgcolor',true)."}";
		}		
		if ( of_get_option('navfontface', true) != '' || of_get_option('navfontsize',true) != '' ) {
			echo '.header .header-inner .nav ul{font-family:\''. esc_html( of_get_option('navfontface', true) ) .'\', sans-serif;font-size:'.of_get_option('navfontsize',true).'}';
		}
		if ( of_get_option('navfontcolor', true) != '' ) {
			echo '.header .header-inner .nav ul li a, .header .header-inner .nav ul li.current_page_item ul li a{color:'. esc_html( of_get_option('navfontcolor', true) ) .';}';
		}
		
		if ( of_get_option('navhovercolor', true) != '') {
			echo '.header .header-inner .nav ul li a:hover, .header .header-inner .nav ul li.current_page_item a, .header .header-inner .nav ul li.current_page_item ul li a:hover, .header .header-inner .nav ul li.current-menu-ancestor a.parent{ color:'. esc_html( of_get_option('navhovercolor', true) ) .';}';
		}	
		
		if( of_get_option('menufontstyle',true) != '' ){
			echo ".fixed .header-inner .nav ul li a span, .header .header-inner .nav ul li a span{font-style:".of_get_option('menufontstyle',true)."}";
		}
				
		if( of_get_option('sectitlesize',true) != '' ){
			echo "h2.section_title{font-size:".of_get_option('sectitlesize',true)."}";
		}		
		if ( of_get_option('headfontface', true) != '' || of_get_option('sectitlecolor',true) != '' ) {
			echo 'h1, h2, h3, h4, h5, h6, h2.section_title{font-family:\''. esc_html( of_get_option('headfontface', true) ) .'\', sans-serif;color:'.of_get_option('sectitlecolor',true).'}';
		}				
		if ( of_get_option('linkcolor', true) != '' ) {
			echo 'a{color:'. esc_html( of_get_option('linkcolor', true) ) .';}';
		}
		if ( of_get_option('linkhovercolor', true) != '' ) {
			echo 'a:hover{color:'. esc_html( of_get_option('linkhovercolor', true) ) .';}';
		}			
		if( of_get_option('foottitlecolor', true) != '' || of_get_option('ftfontsize', true) != '' ){
			echo ".cols-3 h5{color:".of_get_option('foottitlecolor', true)."; font-size:".of_get_option('ftfontsize', true)."; }";
		}		
		if( of_get_option('footdesccolor', true) != ''){
			echo ".cols-3{color:".of_get_option('footdesccolor', true).";}";
		}					
		if( of_get_option('copycolor', true) != ''){
			echo ".copyright-txt{color:".of_get_option('copycolor',true)."}";
		}
		if( of_get_option('designcolor', true) != ''){
			echo ".design-by{color:".of_get_option('designcolor',true)."}";
		}		
		if ( of_get_option('headerbg', true) != '' ) {
			echo ".header, .header .header-inner .nav ul li:hover > ul{background-color:".of_get_option('headerbg',true).";}";
		}			
		if( of_get_option('socialfontcolor',true) != '' ){
			echo ".social-icons a{color:".of_get_option('socialfontcolor',true).";}";
		}
		if( of_get_option('socialfonthvcolor',true) != ''){
			echo ".social-icons a:hover{color:".of_get_option('socialfonthvcolor',true)."; }";
		}			
		if( of_get_option('btnbgcolor',true) != '' || of_get_option('btntxtcolor', true) != '' || of_get_option('btnbordercolor', true) != ''){
			echo ".button, #commentform input#submit, input.search-submit, .post-password-form input[type=submit], p.read-more a, .accordion-box h2:before, .pagination ul li span, .pagination ul li a{background-color:".of_get_option('btnbgcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; border-bottom:4px solid ". of_get_option('btnbordercolor', true) ."; }";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' || of_get_option('btnborderhvcolor', true) != '' ){
			echo ".button:hover, #commentform input#submit:hover, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) ."; border-bottom:4px solid ". of_get_option('btnborderhvcolor', true) .";}";
		}
		
		if( of_get_option('searchbgcolor',true) != ''){
			echo ".searchbox-icon, .searchbox-submit {background-color:".of_get_option('searchbgcolor',true)."; }";
		}
		
		if( of_get_option('galleryactivebc',true) != ''){
			echo ".photobooth .filter-gallery ul li.current a{border-bottom:3px solid ".of_get_option('galleryactivebc',true)."; }";
		}
		
		if( of_get_option('searchbgcolor',true) != ''){
			echo ".wrap_one .fa {color:".of_get_option('searchbgcolor',true)."; }";
		}
		
		if( of_get_option('fsh2color',true) != ''){
			echo ".wrap_one h2 {color:".of_get_option('fsh2color',true)."; }";
		}
		
		if( of_get_option('tbfontcolor', true) != '' || of_get_option('tbbtnborder', true) != ''){
			echo ".btnfeatures { color:". of_get_option('tbfontcolor', true) ."; border:1px solid ". of_get_option('tbbtnborder', true) ."; }";
		}
		
		if( of_get_option('tbfonthvcolor', true) != '' || of_get_option('tbbtnhvborder', true) != ''){
			echo ".btnfeatures:hover { color:". of_get_option('tbfonthvcolor', true) ."; border:1px solid ". of_get_option('tbbtnhvborder', true) ."; }";
		}
		
		if ( of_get_option('widgettitlebgcolor', true) != '' || of_get_option('wdgttitleccolor', true) != '' ) {
			echo "h3.widget-title{background-color:".of_get_option('widgettitlebgcolor', true)."; color:".of_get_option('wdgttitleccolor', true).";}";
		}
		if ( of_get_option('footerbgcolor', true) != '' ) {
			echo "#footer-wrapper{background-color:".of_get_option('footerbgcolor', true)."; }";
		}			
		if ( of_get_option('footermenucolor', true) != '' ) {
			echo ".cols-3 ul li a{color:".of_get_option('footermenucolor', true)."; }";
		}
		
		if ( of_get_option('footermenucurrent', true) != '' ) {
			echo ".cols-3 ul li a:hover, .cols-3 ul li.current_page_item a{color:".of_get_option('footermenucurrent', true)."; }";
		}			
		if ( of_get_option('copybgcolor', true) != '' ) {
			echo '.copyright-wrapper{background-color:'. esc_html( of_get_option('copybgcolor', true) ) .';}';
		}
		if( of_get_option('galhvcolor',true) != ''){
			echo ".photobooth .gallery ul li:hover{ background:".of_get_option('galhvcolor',true)."; float:left; background:url(".get_template_directory_uri()."/images/camera-icon.png) 50% 50% no-repeat ".of_get_option('galhvcolor',true)."; }";
		}				
		if( of_get_option('sldpagebg',true) != ''){
			echo ".nivo-controlNav a{background-color:".of_get_option('sldpagebg',true)."}";
		}
		if( of_get_option('sldpagehvbg',true) != ''){
			echo ".nivo-controlNav a.active{background-color:".of_get_option('sldpagehvbg',true)."}";
		}				
		if( of_get_option('sidebarfontcolor',true) != '' || of_get_option('sidebarliaborder', true) != '' ){
			echo "#sidebar ul li a{color:".of_get_option('sidebarfontcolor',true)."; border-bottom:1px dashed ".of_get_option('sidebarliaborder',true)."}";
		}		
		if( of_get_option('sidebarfonthvcolor',true) != '' ){
			echo "#sidebar ul li a:hover{color:".of_get_option('sidebarfonthvcolor',true)."; }";
		}	
				
		if (  of_get_option('slidetitlecolor', true) != '' || of_get_option('slidetitlefontsize', true) != '') {
		echo ".slide_info h2{ color:".of_get_option('slidetitlecolor', true)."; font-size:".of_get_option('slidetitlefontsize', true).";}";
		}		
		if ( of_get_option('slidedesccolor', true) != '' || of_get_option('slidedescfontsize', true) != '') {
		echo ".slide_info p{ color:".of_get_option('slidedesccolor', true)."; font-size:".of_get_option('slidedescfontsize', true).";}";
		}
		
		if ( of_get_option('slideorngcolor', true) != '' ) {
		echo ".slide_info h2 span{ color:".of_get_option('slideorngcolor', true).";}";
		}
				
		if ( of_get_option('tmn_titlefontcolor', true) != '' ) {
		echo "#testimonials ul li h6{ color: ".of_get_option('tmn_titlefontcolor', true)."; }";
		}		
		if ( of_get_option('copylinks', true) != '' ) {
		echo ".copyright-wrapper a{ color: ".of_get_option('copylinks', true)."; }";
		}	
		if ( of_get_option('copylinkshover', true) != '' ) {
		echo ".copyright-wrapper a:hover{ color: ".of_get_option('copylinkshover', true)."; }";
		}	
		if ( of_get_option('footerpostborder', true) != '' ) {
		echo ".recent-post{ border-bottom:1px dotted ".of_get_option('footerpostborder', true)."; }";
		}
		if ( of_get_option('footerpoststitle', true) != '' ) {
		echo ".recent-post h6{ color: ".of_get_option('footerpoststitle', true)."; }";
		}		
		if ( of_get_option('footerpoststitlehv', true) != '' ) {
		echo ".recent-post h6:hover{ color: ".of_get_option('footerpoststitlehv', true)."; }";
		}				
		if ( of_get_option('teamtitlecolor', true) != '' ) {
		echo ".teammember-list h5, .member-desination{ color:".of_get_option('teamtitlecolor', true)."; }";
		}	
		if ( of_get_option('teamparacolor', true) != '' ) {
		echo ".teammember-list p{ color:".of_get_option('teamparacolor', true)."; }";
		}	
		if ( of_get_option('teamtitlehovercolor', true) != '' ) {
		echo ".teammember-list:hover h5{ color:".of_get_option('teamtitlehovercolor', true)."; }";
		}
			
		if ( of_get_option('teamsicolor', true) != '' ) {
		echo ".member-social-icon a{ color:".of_get_option('teamsicolor', true)."; }";
		}
		if ( of_get_option('teamsicolorhv', true) != '' ) {
		echo ".member-social-icon a:hover{ color:".of_get_option('teamsicolorhv', true)."; }";
		}
		if ( of_get_option('teamsiconborder', true) != '' ) {
		echo ".member-social-icon{ border-top:1px solid ".of_get_option('teamsiconborder', true)."; }";
		}		
		if ( of_get_option('iframeborder', true) != '') {
		echo "iframe{ border:1px solid ".of_get_option('iframeborder', true)."; }";
		}		
		if ( of_get_option('sidebarbgcolor', true) != '' ) {
		echo "aside.widget{ background-color:".of_get_option('sidebarbgcolor', true)."; }";
		}	
	
		if ( of_get_option('readmorebutton', true) != '' ) {
		echo ".view-all-btn a{ border:1px solid ".of_get_option('readmorebutton', true)."; border-left:5px solid ".of_get_option('readmorebutton', true)."; }";
		}		
		if ( of_get_option('readmorebuttonhv', true) != '' ) {
		echo ".view-all-btn a:hover{ border-color:".of_get_option('readmorebuttonhv', true)."; }";
		}			

		if ( of_get_option('togglemenu', true) != '' ) {
		echo ".toggle a{ background-color:".of_get_option('togglemenu', true)."; }";
		}
		if ( of_get_option('phoneiconcolor', true) != '' ) {
		echo ".signin_wrap .right .fa{ color:".of_get_option('phoneiconcolor', true)."; }";
		}
		if ( of_get_option('secborderbottom', true) != '' ) {
		echo "#wrapone, #wrapsecond, #ourclient{border-bottom:1px solid ".of_get_option('secborderbottom', true)."; }";
		}		
		if ( of_get_option('srvciconbg', true) != '' || of_get_option('srvciconfc', true) != '' ) {
		echo ".services-wrap .one_third .fa{background-color: ".of_get_option('srvciconbg', true)."; color: ".of_get_option('srvciconfc', true)."; }";
		}		
		if ( of_get_option('srvciconbghv', true) != '' || of_get_option('srvciconfchv', true) != '' ) {
		echo ".services-wrap .one_third:hover .fa{background-color: ".of_get_option('srvciconbghv', true)."; color: ".of_get_option('srvciconfchv', true)."; }";
		}		
		if ( of_get_option('srvclinkcolor', true) != '' ) {
		echo ".services-wrap .one_third a.rdmore{ color: ".of_get_option('srvclinkcolor', true)."; }";
		}		
		if ( of_get_option('srvclinkcolorhv', true) != '' ) {
		echo ".services-wrap .one_third:hover a.rdmore{ color: ".of_get_option('srvclinkcolorhv', true)."; }";
		}		
		if ( of_get_option('titlecolorhv', true) != '' ) {
		echo ".services-wrap .one_third:hover h4{ color: ".of_get_option('titlecolorhv', true)."; }";
		}
		if ( of_get_option('tmndescbgcolor', true) != '' ) {
		echo "#testimonials ul li .tm_description{background-color: ".of_get_option('tmndescbgcolor', true)."; }";
		}
		
		if ( of_get_option('tmnpagerbg', true) != '' ) {
		echo "ol.nav-numbers li a{background-color: ".of_get_option('tmnpagerbg', true)."; border:2px solid ".of_get_option('tmnpagerbg', true)."; }";
		}
		
		if ( of_get_option('tmnpagerbghv', true) != '' ) {
		echo "ol.nav-numbers li.active a{background-color: ".of_get_option('tmnpagerbghv', true)."; border:2px solid ".of_get_option('tmnpagerbg', true)."; }";
		}
		
		
		if ( of_get_option('tgmenuresponsivebg', true) != '' ) {
		echo "@media screen and (max-width: 1169px){.header .header-inner .nav{background-color: ".of_get_option('tgmenuresponsivebg', true).";}}";
		}
		
		
		echo "</style>";
	}
}
add_action('wp_head', 'skt_kraft_custom_head_codes');


function skt_kraft_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';

function excerpt($num) {
        $limit = $num+1;
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt)."...";
        echo $excerpt;
    }
	
function skt_kraft_string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}	

function skt_kraft_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}

class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		
		$menu_icon = strstr($class_names, ' ', true);
		$icon_check = strrchr($menu_icon,"fa-");
		if(!empty($icon_check)){
		$class_names = str_replace($menu_icon, '', $class_names);
		$icon_class = ' class="fa '.$menu_icon.'"';
		}
		
		
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . '><i '.$icon_class.'></i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<span>' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// get slug by id
function skt_kraft_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}