<?php
namespace SiteGround_Optimizer\Cli;

use SiteGround_Optimizer\Options\Options;
use SiteGround_Optimizer\Htaccess\Htaccess;
/**
 * WP-CLI: wp sg status {type}.
 *
 * Run the `wp sg status {type} to check the current status of optimization.
 *
 * @since 5.0.0
 * @package Cli
 * @subpackage Cli/Cli_Status
 */

/**
 * Define the {@link Cli_Status} class.
 *
 * @since 5.0.0
 */
class Cli_Status {
	/**
	 * Return the current status of specific optimization
	 *
	 * ## OPTIONS
	 *
	 * <type>
	 * : Optimization type.
	 * ---
	 * options:
	 *  - html
	 *  - js
	 *  - js-async
	 *  - css
	 *  - combine-css
	 *  - combine-js
	 *  - querystring
	 *  - emojis
	 *  - webp
	 *  - lazyload_images
	 *  - image_compression
	 *  - heartbeat_post_interval
	 *  - heartbeat_dashboard_interval
	 *  - heartbeat_frontend_interval
	 *  - memcache
	 *  - ssl
	 *  - ssl-fix
	 *  - autoflush
	 *  - dynamic-cache
	 *  - google-fonts
	 *  - database-optimization
	 *  - dns-prefetch
	 *  - heartbeat-control
	 * ---
	 *
	 * [--blog_id=<blog_id>]
	 * : Blod id for multisite optimizations
	 */
	public function __invoke( $args, $assoc_args ) {
		$this->option_service   = new Options();
		$this->htaccess_service = new Htaccess();

		$blog_id = ! empty( $assoc_args['blog_id'] ) ? $assoc_args['blog_id'] : false;

		$this->get_status( $args[0], $blog_id );
	}

	/**
	 * Get the optimization status.
	 *
	 * @since  5.1.2
	 *
	 * @param  string  $type    The optimization type.
	 * @param  boolean $blog_id Blog id for multisites.
	 */
	public function get_status( $type, $blog_id = false ) {
		$mapping = array(
			'autoflush'                    => 'siteground_optimizer_autoflush_cache',
			'dynamic-cache'                => 'siteground_optimizer_enable_cache',
			'memcache'                     => 'siteground_optimizer_enable_memcached',
			'ssl-fix'                      => 'siteground_optimizer_fix_insecure_content',
			'html'                         => 'siteground_optimizer_optimize_html',
			'js'                           => 'siteground_optimizer_optimize_javascript',
			'js-async'                     => 'siteground_optimizer_optimize_javascript_async',
			'css'                          => 'siteground_optimizer_optimize_css',
			'combine-css'                  => 'siteground_optimizer_combine_css',
			'querystring'                  => 'siteground_optimizer_remove_query_strings',
			'emojis'                       => 'siteground_optimizer_disable_emojis',
			'lazyload_images'              => 'siteground_optimizer_lazyload_images',
			'heartbeat_post_interval'      => 'siteground_optimizer_heartbeat_post_interval',
			'heartbeat_dashboard_interval' => 'siteground_optimizer_heartbeat_dashboard_interval',
			'heartbeat_frontend_interval'  => 'siteground_optimizer_heartbeat_frontend_interval',
			'image_compression'            => 'siteground_optimizer_compression_level',
			'ssl'                          => 'siteground_optimizer_ssl_enabled',
			'google-fonts'                 => 'siteground_optimizer_optimize_web_fonts',
			'combine-js'                   => 'siteground_optimizer_combine_javascript',
			'webp'                         => 'siteground_optimizer_webp_support',
			'database-optimization'        => 'siteground_optimizer_database_optimization',
			'dns-prefetch'                 => 'siteground_optimizer_dns_prefetch',
			'heartbeat-control'            => 'siteground_optimizer_heartbeat_control',
		);

		if ( ! array_key_exists( $type, $mapping ) ) {
			\WP_CLI::error( "$type does not exist" );
		}

		switch ( $type ) {
			case 'ssl':
			case 'gzip':
			case 'browser-caching':
				$status = $this->htaccess_service->is_enabled( $type );
				break;
			default:
				$this->validate_multisite( $type, $blog_id );
				$status = $this->get_option_status( $mapping[ $type ], $blog_id );
				break;
		}

		// Very ugly way to get meaningful message.
		$message = str_replace( ' Disabled', '', $this->option_service->get_response_message( true, $mapping[ $type ], false ) );

		// The optimization is disabled.
		if ( false === $status ) {
			\WP_CLI::error( "$message is Disabled" );
		}

		\WP_CLI::success( "$message is Enabled" );

	}

	/**
	 * Validate if it's a multisite when blog id is provided
	 *
	 * @since  5.1.2
	 *
	 * @param  string  $type    The optimization type.
	 * @param  boolean $blog_id Blog id for multisites.
	 */
	public function validate_multisite( $type, $blog_id = false ) {
		if (
			! \is_multisite() &&
			false !== $blog_id
		) {
			\WP_CLI::error( 'Blog id should be passed to multisite setup only!' );
		}

		if (
			\is_multisite() &&
			false === $blog_id
		) {
			\WP_CLI::error( "Blog id is required to check the status of $type optimization on multisite setup!" );
		}

		if ( function_exists( 'get_sites' ) ) {
			$site = \get_sites( array( 'site__in' => $blog_id ) );

			if ( empty( $site ) ) {
				\WP_CLI::error( 'There is no existing site with id: ' . $blog_id );
			}
		}
	}

	/**
	 * Get optimization status
	 *
	 * @since  5.1.2
	 *
	 * @param  string  $option  The optimization option name.
	 * @param  boolean $blog_id Blog id for multisites.
	 *
	 * @return boolean          Optimization status.
	 */
	public function get_option_status( $option, $blog_id = false ) {
		// Ge the status.
		$status = $this->option_service::is_enabled( $option );

		// Get the status from mu.
		if ( false !== $blog_id ) {
			$status = $this->option_service::is_mu_enabled( $option, $blog_id );
		}

		return $status;
	}
}
