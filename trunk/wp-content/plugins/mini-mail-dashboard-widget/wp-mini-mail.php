<?php
/*
Plugin Name: Mini Mail Dashboard Widget
Plugin URI: http://blog.bokhorst.biz/2414/computers-en-internet/wordpress-plugin-mini-mail-dashboard-widget/
Description: Send and receive e-mails on the administration panel and optionally receive SMS messages when new messages arrive
Version: 1.0.4
Author: Marcel Bokhorst
Author URI: http://blog.bokhorst.biz/about/
*/

/*
	Copyright 2009  Marcel Bokhorst

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

#error_reporting(E_ALL);

// Needed for ajax calls
global $wp_version;
if (!$wp_version)
	require_once('../../../wp-config.php');

// Include mini mail class
if (!class_exists('WPMiniMail'))
	require_once('wp-mini-mail-class.php');

// Check pre-requisites
WPMiniMail::wpmm_check_prerequisites();

// Start plugin
global $wp_mini_mail;
$wp_mini_mail = new WPMiniMail();

// Schedule cron if needed
if (!wp_next_scheduled('wpmm_cron')) {
	$hour = intval(time() / 3600);
	wp_schedule_event($hour * 3600, 'wpmm_schedule', 'wpmm_cron');
}

function wpmm__cron() {
	$wp_mini_mail->wpmm_cron();
}

// Check ajax requests
$wp_mini_mail->wpmm_check_ajax();

// That's it!

?>
