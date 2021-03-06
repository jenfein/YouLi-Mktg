<?php
/*
Plugin Name: Contact Form 7 Campaign Monitor Extension
Plugin URI: http://renzojohnson.com/contributions/contact-form-7-campaign-monitor-extension
Description: Integrate Contact Form 7 with Campaign Monitor. Automatically add form submissions to predetermined lists in Campaign Monitor, using its latest API.
Author: Renzo Johnson
Author URI: http://renzojohnson.com
Text Domain: contact-form-7
Domain Path: /languages/
Version: 0.4.3
*/

/*  Copyright 2013-2016 Renzo Johnson (email: renzojohnson at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

define( 'SPARTAN_CME_VERSION', '0.4.3' );
define( 'SPARTAN_CME_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'SPARTAN_CME_PLUGIN_NAME', trim( dirname( SPARTAN_CME_PLUGIN_BASENAME ), '/' ) );
define( 'SPARTAN_CME_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'SPARTAN_CME_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );

require_once( SPARTAN_CME_PLUGIN_DIR . '/lib/settings.php' );

