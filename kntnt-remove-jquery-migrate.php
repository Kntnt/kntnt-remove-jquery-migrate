<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Remove JQuery Migrate
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Removes the unnecessary jquery-migrate.js.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


defined( 'ABSPATH' ) || die;

add_action( 'wp_default_scripts', function ( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, [ 'jquery-migrate' ] );
        }
    }
} );
