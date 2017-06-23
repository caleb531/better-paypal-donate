<?php

// Output the front-end <form> (for both the widget and shortcode)
function bpd_frontend_form( $args, $button_text ) {
	?>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="POST" target="_blank" class="better-paypal-donate">
		<input type="hidden" name="cmd" value="_donations" />
		<input type="hidden" name="business" value="<?php echo antispambot( $args['email'] ); ?>" />
		<?php if ( ! empty( $args['purpose'] ) ): ?>
			<input type="hidden" name="item_name" value="<?php echo $args['purpose']; ?>" />
		<?php endif; ?>
		<?php if ( ! empty( $args['amount'] ) ): ?>
			<?php $amount = $args['amount']; ?>
		<?php else: ?>
			<?php $amount = ''; ?>
		<?php endif; ?>
		$ <input type="text" name="amount" size="6" value="<?php echo $amount; ?>" required pattern="\d+(\.\d{2})?" placeholder="x.xx" />
		<button><?php echo $button_text; ?></button>
	</form>
	<?php
}
