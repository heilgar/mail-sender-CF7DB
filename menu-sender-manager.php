<div class="wrap">
	
	<h1> <?php esc_html_e( 'Рассылка сообщений', 'mails' ); ?></h1>	

	<form action="#" method="post" id="send-mails"> 

	<label for="from"> От: </label>
	<input type="email" name="from" size="40" value="">
	<br/>
	<label for="subject"> Тема: </label>
	<input type="text" name="subject" size="40" value="">
	<br/>
	<label for="text">Текст: </label> <br/>
	
<?php 	wp_editor('Сообщение', 'editor_id', array(
	'wpautop' => 1,
	'media_buttons' => 1,
	'textarea_name' => 'text', //нужно указывать!
	'textarea_rows' => 10,
	'tabindex'      => null,
	'editor_css'    => '',
	'editor_class'  => '',
	'teeny'         => 0,
	'dfw'           => 0,
	'tinymce'       => 1,
	'quicktags'     => 1,
	'drag_drop_upload' => false
) );
?>
	<br/>
	<br/>
	<?php submit_button(); ?>
	</form>

	<?php 
		if(isset($_POST['from']) && isset($_POST['text']) && isset($_POST['subject'])){
			
			send($_POST['from'], $_POST['text'], $_POST['subject']);
		
		}

		function send( $from, $text, $subject ){
			echo 'Начинаю рассылку...<br/>';

			$headers = 'From: '. $from .''. "\r\n" .
    'Reply-To: '. $from . "\r\n" . "Content-type: text/html\r\n";

			global $wpdb;

			$sql = "SELECT `field_value` FROM `ev_cf7dbplugin_submits` WHERE `field_name` = 'email'"; 
			$r = $wpdb->get_results($sql);

			echo "<pre>";
				foreach($r as $e){
					$email = trim($e->field_value);
					echo "Отправка... ". $e->field_value ."...";
					if(mail($email, $subject, $text, $headers)) echo ".<b> Done </b><br/>";
				}
			echo "</pre>";

		}
	?>
</div>

