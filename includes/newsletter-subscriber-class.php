<?php
class newsletter_subscriber_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'newsletter_subscriber_widget',
			'description' => 'A simple email subscriber.',
		);
		parent::__construct( 'newsletter_subscriber_widget', 'Newsletter Subscriber Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance )
	{
		echo $args['before_widget'];
		echo $args['before_title'];
		if(!empty($instance['title']))
		{
			echo $instance['title'];
		}
		echo $args['after_title'];
		
		?>
			<div id = "form-msg" ></div>
			<form id = "subscriber-form" method = "post" action = "<?php plugins_url().'/newsletter-subscriber-widget/includes/newsletter-subscriber-mailer.php'?>">
				<div class = "form-group">
					<lable for = "name" >Name: </lable> <br/>
					<input type = "text" id = "name" class = "form-control" name = "name" required>
				</div> </br>

				<div class = "form-group">
					<lable for = "email" >Email: </lable> <br/>
					<input type = "text" id = "email" class = "form-control" name = "email" required>
				</div><br/>

				<input type = "hidden" name = "recipient" value = "<?php echo $instance['recipient'];?>">
				<input type = "hidden" name = "subject" value = "<?php echo $instance['subject'];?>">
				<input type = "submit" value = "Subscribe" class = "btn btn-primary" name = "subscribe_submit" />
			</form>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance )
	{
		// Outputs the options form on admin
		$title = !empty($instance['title']) ? $instance['title'] : __('Newsletter Subscriber', 'nsw_domain');
		$recipient = $instance['recipient'];
		$subject = !empty($instance['subject']) ? $instance['subject'] : __('You have a new subscriber', 'nsw_domain');
		//$this->getForm( $instance);
		?>
		<p>
			<lable for="<?php echo $this->get_field_id('title')?>">
				<?php _e('Title:') ?>
			</lable><br>
			<input type="text" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" value = "<?php echo esc_attr($title);?>"/>
		</p>

		<p>
			<lable for="<?php echo $this->get_field_id('recipient')?>">
				<?php _e('Recipient:') ?>
			</lable><br>
			<input type="text" id="<?php echo $this->get_field_id('recipient')?>" name="<?php echo $this->get_field_name('recipient')?>" value = "<?php echo esc_attr($recipient);?>"/>
		</p>

		<p>
			<lable for="<?php echo $this->get_field_id('subject')?>">
				<?php _e('Subject:') ?>
			</lable><br>
			<input type="text" id="<?php echo $this->get_field_id('subject')?>" name="<?php echo $this->get_field_name('subject')?>" value = "<?php echo esc_attr($subject);?>"/>
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
		// processes widget options to be saved
		$instance = array(
			'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '',
			'recipient' => (!empty($new_instance['recipient'])) ? strip_tags($new_instance['recipient']) : '',
			'subject' => (!empty($new_instance['subject'])) ? strip_tags($new_instance['subject']) : '',
		);

		return $instance;
	}
}
?>