<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Yoast SEO Activ@tor
 * Plugin URI:        https://bit.ly/yseo-act
 * Description:       Yoast SEO Plugin Activ@tor
 * Version:           1.3.0
 * Requires at least: 5.9.0
 * Requires PHP:      7.2
 * Author:            moh@medhk2
 * Author URI:        https://bit.ly/medhk2
 **/

defined( 'ABSPATH' ) || exit;
$PLUGIN_NAME   = 'Yoast SEO Activ@tor';
$PLUGIN_DOMAIN = 'yoast-seo-activ@tor';
extract( require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php' );
if (
	$admin_notice_ignored()
	|| $admin_notice_plugin_install( 'wordpress-seo/wp-seo.php', 'wordpress-seo', 'Yoast SEO', $PLUGIN_NAME, $PLUGIN_DOMAIN )
	|| $admin_notice_plugin_activate( 'wordpress-seo/wp-seo.php', $PLUGIN_NAME, $PLUGIN_DOMAIN )
) {
	return;
}
add_action( 'plugins_loaded', function () {
	if ( ! defined( 'WPSEO_PREMIUM_FILE' ) ) {
		define( 'WPSEO_PREMIUM_FILE', 'yoast-seo-premium/yoast-seo-premium.php' );
	}
	if ( ! defined( 'WPSEO_PREMIUM_VERSION' ) ) {
		define( 'WPSEO_PREMIUM_VERSION', WPSEO_VERSION );
	}
} );
add_action( 'admin_menu', function () {
	remove_submenu_page( 'wpseo_dashboard', 'wpseo_page_academy' );
	remove_submenu_page( 'wpseo_dashboard', 'wpseo_licenses' );
	remove_submenu_page( 'wpseo_dashboard', 'wpseo_workouts' );
}, 99 );

