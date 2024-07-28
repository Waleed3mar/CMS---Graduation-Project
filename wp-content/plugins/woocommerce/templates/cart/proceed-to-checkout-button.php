<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<a href="<?php echo esc_url( "#" ); ?>" style="color:white; background-color:#1e5cef;" class="checkout-button installment-button button alt wc-forward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
	<?php esc_html_e( 'Pay With Raya Installments', 'woocommerce' ); ?>
</a>

<div class="et_pb_module_inner" style="position: relative;">
	<div class="dsm-text-divider-wrapper dsm-text-divider-align-center et_pb_bg_layout_light">			
		<div class="dsm-text-divider-before dsm-divider"></div>
		<h6 class="dsm-text-divider-header et_pb_module_header"><span>OR</span></h6>
		<div class="dsm-text-divider-after dsm-divider"></div>
	</div>
</div>


<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
	<?php esc_html_e( 'Proceed to Checkout', 'woocommerce' ); ?>
</a>