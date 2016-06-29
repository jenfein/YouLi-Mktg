<?php
/*
Plugin Name: Simple Google Analytics Plugin
Plugin URI: http://www.youli.travel
Description: Adds a Google analytics tracking code to the <head> of your theme, by hooking to wp_head.
Author: Jennifer Fein
Version: 1.0
 */

function wpsimple_google_analytics() { 
	include_once("/wp-include/analyticstracking.php");
}

add_action( 'wp_head', 'wpsimple_google_analytics', 10 );