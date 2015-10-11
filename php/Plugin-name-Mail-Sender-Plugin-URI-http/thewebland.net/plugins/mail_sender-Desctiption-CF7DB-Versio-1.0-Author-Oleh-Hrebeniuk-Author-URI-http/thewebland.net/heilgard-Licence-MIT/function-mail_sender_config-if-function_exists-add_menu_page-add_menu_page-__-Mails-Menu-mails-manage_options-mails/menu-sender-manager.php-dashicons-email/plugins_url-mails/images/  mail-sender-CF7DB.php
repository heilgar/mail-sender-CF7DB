<?php
/*
Plugin name: Mail Sender
Plugin URI: http://thewebland.net/plugins/mail_sender
Desctiption: Рассылка сообщений по базе CF7DB
Versio: 1.0
Author: Oleh Hrebeniuk
Author URI: http://thewebland.net/heilgard
Licence: MIT
*/


function mail_sender_config()
{
	if(function_exists('add_menu_page')){
		add_menu_page(
	        __( 'Mails Menu', 'mails' ),
	        'Рассылка сообщений',
	        'manage_options',
	        'mails/menu-sender-manager.php',
	        '',
	        'dashicons-email',//plugins_url( 'mails/images/icon.png' ),
	        6
    	);
	}
}

	  add_action('admin_menu', 'mail_sender_config');

