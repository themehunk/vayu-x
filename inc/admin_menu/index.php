<?php
require_once  'settings.php';

add_action('init', 'vayu_xconnect_admin_menu');
function vayu_xconnect_admin_menu()
{
	if (class_exists('VayuMenuSettings')) {
		new VayuMenuSettings();
	}
}