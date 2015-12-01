<?php

/**
 * Plugin Name: Fluid Customizer
 * Plugin URI: https://cameronjones.x10.mx/projects/fluid-customizer
 * Description: Preview your site for a variety of different devices by resizing your Customizer sidebar with a simple click and drag
 * Version: 1.0.0
 * Author: Cameron Jones
 * Author URI: http://cameronjones.x10.mx
 * License: GPLv2
 
 * Copyright 2015  Cameron Jones  (email : cameronjonesweb@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 */

class cameronjonesweb_fluid_customizer {

	function __construct() {

		define( 'CJW_FC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'CJW_FC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		define( 'CJW_FC_PLUGIN_VER', '1.0.0' );

		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'fluid_customizer_plugin_action_links' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_resources') );

	}

	function enqueue_resources() {
		$screen = get_current_screen();
		if( $screen->base === 'customize' ){
			wp_enqueue_script( "fluid-customizer", CJW_FC_PLUGIN_URL . "/js/fluid-customizer.min.js" );
			wp_enqueue_style( "fluid-customizer", CJW_FC_PLUGIN_URL . "/css/fluid-customizer.min.css" );
		}
	}

	//Add link on plugins page to my plugins directory
	public function fluid_customizer_plugin_action_links( $links ) {
		$links[] = '<a href="https://profiles.wordpress.org/cameronjonesweb/#content-plugins" target="_blank">More plugins by cameronjonesweb</a>';	
		return $links;
	}

}

$cameronjonesweb_fluid_customizer = new cameronjonesweb_fluid_customizer;