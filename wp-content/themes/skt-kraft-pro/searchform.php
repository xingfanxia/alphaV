<?php
/**
 * The template for displaying search forms in SKT Kraft
 *
 * @package SKT Kraft
 */
?>
<form role="search" method="get" class="searchbox" action="<?php echo esc_url( home_url( '/' ) ); ?>">		
	<input type="search" class="searchbox-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'skt-kraft' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" onkeyup="buttonUp();">
	<input type="submit" class="" value="<?php echo esc_attr_x( '', 'submit button', 'skt-kraft' ); ?>">
     <span class="searchbox-icon"></span>
</form>
