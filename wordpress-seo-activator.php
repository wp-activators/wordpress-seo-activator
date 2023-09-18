<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Yoast SEO Activator
 * Plugin URI:        https://github.com/wp-activators/wordpress-seo-activator
 * Description:       Yoast SEO Plugin Activator
 * Version:           1.1.0
 * Requires at least: 3.1.0
 * Requires PHP:      7.2
 * Author:            mohamedhk2
 * Author URI:        https://github.com/mohamedhk2
 **/

defined( 'ABSPATH' ) || exit;
const YOAST_SEO_ACTIVATOR_NAME   = 'Yoast SEO Activator';
const YOAST_SEO_ACTIVATOR_DOMAIN = 'yoast-seo-activator';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
if (
	activator_admin_notice_ignored()
	|| activator_admin_notice_plugin_install( 'wordpress-seo/wp-seo.php', 'wordpress-seo', 'Yoast SEO', YOAST_SEO_ACTIVATOR_NAME, YOAST_SEO_ACTIVATOR_DOMAIN )
	|| activator_admin_notice_plugin_activate( 'wordpress-seo/wp-seo.php', YOAST_SEO_ACTIVATOR_NAME, YOAST_SEO_ACTIVATOR_DOMAIN )
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


