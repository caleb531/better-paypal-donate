<?php
class Better_PayPal_Donate_Widget extends WP_Widget {

	// Default text to use for all widget submit buttons
	static $default_button_text = 'Donate';

	/**
	 * Initialize the widget wih name, ID, etc.
	 */
	public function __construct() {
		parent::__construct(
			'better_paypal_donate_widget',
			'Better PayPal Donate',
		 	array(
				'classname'   => 'better-paypal-donate',
				'description' => 'A simple but customizeable PayPal donate widget'
			)
		);
	}

	/**
	 * Outputs the content of the widget on the front end
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( ! empty( $instance['title'] ) ): ?>
			<?php echo $args['before_title'], apply_filters( 'widget_title', $instance['title'] ), $args['after_title']; ?>
		<?php endif; ?>
		<?php if ( ! empty( $instance['description'] ) ): ?>
			<?php echo wpautop( esc_html( $instance['description'] ) ); ?>
		<?php endif; ?>
		<?php if ( ! empty( $instance['button_text'] ) ): ?>
			<?php bpd_frontend_form( $instance, $instance['button_text'] ); ?>
		<?php else: ?>
			<?php bpd_frontend_form( $instance, static::$default_button_text ); ?>
		<?php endif; ?>
		<?php echo $args['after_widget']; ?>
		<?php
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ( ! empty( $instance['title'] ) ? $instance['title'] : '' );
		$description = ( ! empty( $instance['description'] ) ? $instance['description'] : '' );
		$email = ( ! empty( $instance['email'] ) ? $instance['email'] : '' );
		$purpose = ( ! empty( $instance['purpose'] ) ? $instance['purpose'] : '' );
		$amount = ( ! empty( $instance['amount'] ) ? $instance['amount'] : '' );
		$button_text = ( ! empty( $instance['button_text'] ) ? $instance['button_text'] : '' );
		$button_id = ( ! empty( $instance['button_id'] ) ? $instance['button_id'] : '' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">Description</label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_html( $description ) ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>">PayPal Email (required)</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="email" value="<?php echo esc_attr( $email ); ?>" placeholder="The email for the account receiving the donation" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'purpose' ) ); ?>">Purpose</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'purpose' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'purpose' ) ); ?>" type="text" value="<?php echo esc_attr( $purpose ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>">Default Amount (USD)</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="text" value="<?php echo esc_attr( $amount ); ?>" placeholder="x.xx" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>">Button Text (required)</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" placeholder="<?php echo static::$default_button_text; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_id' ) ); ?>">Button ID (if provided by PayPal)</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_id' ) ); ?>" type="text" value="<?php echo esc_attr( $button_id ); ?>" />
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
