<?php

namespace Kirki\Controls;

class PromoControl extends \WP_Customize_Control {

	public $type = 'promo';

	/**
	 * Render the control's content.
	 */
	protected function render_content() { ?>
		<div class="promo-box">
        <div class="promo-2">
        	<div class="promo-wrap">
            	<a href="<?php esc_attr_e( 'http://templatesnext.org/imax/', 'i-max' ); ?>" target="_blank"><?php esc_attr_e( 'i-max Demo', 'i-max' ); ?></a>
                <a href="<?php esc_attr_e( 'https://www.facebook.com/templatesnext', 'i-max' ); ?>"><?php esc_attr_e( 'Facebook', 'i-max' ); ?></a> 
                <a href="<?php esc_attr_e( 'http://templatesnext.org/ispirit/landing/forums/', 'i-max' ); ?>"><?php esc_attr_e( 'Support', 'i-max' ); ?></a>                                 
                <!-- <a href="<?php esc_attr_e( 'http://templatesnext.org/imax/docs', 'i-max' ); ?>"><?php esc_attr_e( 'Documentation', 'i-max' ); ?></a> -->
                <a href="<?php esc_attr_e( 'http://templatesnext.org/ispirit/landing/themes/', 'i-max' ); ?>"><?php esc_attr_e( 'Go Premium', 'i-max' ); ?></a>
                
                <div class="donate">                
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="M2HN47K2MQHAN">
                    <table>
                    <tr><td><input type="hidden" name="on0" value="If you like my work, you can buy me"><?php esc_attr_e( 'If you like my work, you can buy me', 'i-max' ); ?></td></tr><tr><td><select name="os0">
                        <option value="a cup of coffee"><?php esc_attr_e( '1 cup of coffee $10.00 USD', 'i-max' ); ?></option>
                        <option value="2 cup of coffee"><?php esc_attr_e( '2 cup of coffee $20.00 USD', 'i-max' ); ?></option>
                        <option value="3 cup of coffee"><?php esc_attr_e( '3 cup of coffee $30.00 USD', 'i-max' ); ?></option>
                    </select> </td></tr>
                    </table>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="<?php esc_attr_e( 'PayPal – The safer, easier way to pay online.', 'i-max' ); ?>">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                                                                          
            </div>
        </div>
		</div>
		<?php
	}
}
