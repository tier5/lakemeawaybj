<?php
if (!defined('ABSPATH')) {
	exit;
}

global $woocommerce;
if ($order) {
$related=ThemexWoo::getRelatedPost($order->id, 'tour');
if(!empty($related)) {
$query=new WP_Query(array(
	'post__in' => array($related->ID), 
	'post_type' => 'tour',
));
?>
	<div class="column fourcol">
		<?php $query->the_post(); ?>
		<?php get_template_part('content', 'tour-grid'); ?>
	</div>
	<div class="tour-checkout fivecol column">
		<?php if ( in_array( $order->status, array( 'failed' ) ) ) : ?>
			<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'midway' ); ?></p>
			<p>
			<?php
				if ( is_user_logged_in() )
					_e( 'Please attempt your purchase again or go to your account page.', 'midway' );
				else
					_e( 'Please attempt your purchase again.', 'midway' );
			?>
			</p>
			<p>
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'midway' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'midway' ); ?></a>
				<?php endif; ?>
			</p>
		<?php else : ?>
			<h3><?php _e( 'Thank you. Your order has been received.', 'midway' ); ?></h3>
			<ul class="order_details">
				<li class="order">
					<?php _e( 'Order:', 'midway' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>
				<li class="date">
					<?php _e( 'Date:', 'midway' ); ?>
					<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
				</li>
				<li class="total">
					<?php _e( 'Total:', 'midway' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>
				<?php if ( $order->payment_method_title ) : ?>
				<li class="method">
					<?php _e( 'Payment method:', 'midway' ); ?>
					<strong><?php echo $order->payment_method_title; ?></strong>
				</li>
				<?php endif; ?>
			</ul>
			<br />
			<div class="clear"></div>
		<?php endif; ?>
		<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	</div>	
<?php
	} else if(file_exists(ABSPATH.'wp-content/plugins/woocommerce/templates/checkout/thankyou.php')) {
		include(ABSPATH.'wp-content/plugins/woocommerce/templates/checkout/thankyou.php');
	}
}