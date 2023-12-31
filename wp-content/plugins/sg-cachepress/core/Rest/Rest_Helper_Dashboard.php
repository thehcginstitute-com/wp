<?php
namespace SiteGround_Optimizer\Rest;

use SiteGround_Optimizer;
use SiteGround_Optimizer\Helper\Helper;

/**
 * Rest Helper class that manages the plugin dashboard.
 */
class Rest_Helper_Dashboard extends Rest_Helper {
	/**
	 * Sends notifications info.
	 *
	 * @since  6.0.0
	 */
	public function notifications() {
		// Prepare the response array.
		$response = array();

		// Add notification if we have updates available.
		if ( Helper::has_updates() ) {
			$response = array(
				array(
					'title'       => __( 'YOUR WORDPRESS NEEDS ATTENTION', 'sg-cachepress' ),
					'text'        => __( 'There are new updates for your website. Keeping your WordPress updated is crucial for your website security', 'sg-cachepress' ),
					'button_text' => __( 'Update', 'sg-cachepress' ),
					'button_link' => admin_url( 'update-core.php' ),
				),
			);
		}

		// Send the response.
		self::send_json_success(
			'',
			$response
		);
	}

	/**
	 * Prepare the necesary text, classes and data for the info boxes on the dashboard.
	 *
	 * @since  6.0.0
	 */
	public function hardening() {
		// The dahboard boxes properties.
		$boxes = array(
			'environment' => array(
				'icon'        => 'product-https',
				'icon_color'  => 'royal',
				'status'      => 'warning',
				'text'        => __( 'Server-side optimizations can have a great impact on loading speed and TTFB.', 'sg-cachepress' ),
				'button_text' => __( ' Go to Environment', 'sg-cachepress' ),
				'button_link' => 'admin.php?page=sgo_environment',
				'title'       => __( 'Environment', 'sg-cachepress' ),
			),
			'frontend'    => array(
				'icon'        => 'product-frontend-optimizations',
				'icon_color'  => 'grassy',
				'status'      => 'warning',
				'text'        => __( 'Decrease your loading speed by optimizing your frontend code.', 'sg-cachepress' ),
				'button_text' => __( ' Go to Frontend', 'sg-cachepress' ),
				'button_link' => 'admin.php?page=sgo_frontend',
				'title'       => __( 'Frontend', 'sg-cachepress' ),
			),
			'media'       => array(
				'icon'        => 'product-stopwatch',
				'icon_color'  => 'grassy',
				'status'      => 'warning',
				'text'        => __( 'Optimizing your media and images can significantly decrease usage and loading time.', 'sg-cachepress' ),
				'button_text' => __( ' Go to Media', 'sg-cachepress' ),
				'button_link' => 'admin.php?page=sgo_media',
				'title'       => __( 'Media', 'sg-cachepress' ),
			),
			'caching'     => array(
				'icon'        => 'product-caching',
				'icon_color'  => 'salmon',
				'status'      => 'warning',
				'text'        => __( 'Dynamic Caching is essential for speeding up your website and is the single most effective optimization that every website must have.', 'sg-cachepress' ),
				'button_text' => __( ' Go to Dynamic Caching', 'sg-cachepress' ),
				'button_link' => 'admin.php?page=sgo_caching',
				'title'       => __( 'Caching', 'sg-cachepress' ),
				'is_enabled'  => intval( get_option( 'siteground_optimizer_enable_cache', 0 ) ),
			),
		);

		if ( 0 === $boxes['caching']['is_enabled'] ) {
			$boxes['caching']['text'] = __( 'Review your caching settings and enable the recommended options to get the best of your website caching.', 'sg-cachepress' );
		}
		$data = array();

		// Loop the optimization necesary boxes.
		foreach ( $this->recommended_optimizations as $type => $key ) {

			$box = array_merge(
				$boxes[ $type ],
				array(
					'total_optimizations'  => count( $this->recommended_optimizations[ $type ] ),
					'active_optimizations' => 0,
				)
			);

			// Count the enabled optimizatons.
			foreach ( $key as $option ) {
				// Add to the count if the optimization is enabled.
				if ( 0 !== intval( get_option( 'siteground_optimizer_' . $option, 0 ) ) ) {
					$box['active_optimizations']++;
				}

				// Check for heartbeat control optimization since we have 3 different options.
				// The optimization itself is not holding 1/0 values so we must make addition actions.
				if ( 'heartbeat_control' === $option ) {

					// If they match the default one, we can say that the optimization is not used as recommended.
					if (
						(
							120 === intval( get_option( 'siteground_optimizer_heartbeat_post_interval', 120 ) ) ||
							0 === intval( get_option( 'siteground_optimizer_heartbeat_post_interval', 120 ) )
						) &&
						0 === intval( get_option( 'siteground_optimizer_heartbeat_dashboard_interval', false ) ) &&
						0 === intval( get_option( 'siteground_optimizer_heartbeat_frontend_interval', false ) )
					) {
						$box['active_optimizations']++;
					}
				}
			}

			// Calculate the percentage.
			// x% = ( 100 * active) / total.
			$percentage = intval(
				round(
					( 100 * $box['active_optimizations'] ) /
					$box['total_optimizations']
				)
			);

			// Assign the proper class.
			if ( 20 > $percentage ) {
				$box['status'] = 'error';
			}

			if ( 80 < $percentage ) {
				$box['status'] = 'success';
			}

			// Add the box to the specific type.
			'caching' === $type ? $data[ $type ] = $box : $data['other'][] = $box;
		}

		// Send the response.
		self::send_json_success(
			'',
			$data
		);
	}

	/**
	 * Sends information about the free ebook.
	 *
	 * @since  6.0.0
	 */
	public function ebook() {

		$data = array(
			'image' => SiteGround_Optimizer\URL . '/assets/images/ebook.png',
			'link'  => 'https://www.siteground.com/wordpress-speed-optimization-ebook?utm_source=sitegroundoptimizer',
			'title' => __( 'Free Ebook', 'sg-cachepress' ),
		);

		if ( ! file_exists( '/Z' ) ) {
			$data = array(
				'image' => SiteGround_Optimizer\URL . '/assets/images/banner.png',
				'link'  => 'https://www.siteground.com/wordpress-hosting.htm?mktafcode=8df9fe65af8e6fd3d868748fb344b2ed',
				'title' => __( 'Get Secure WordPress Hosting', 'sg-cachepress' ),
			);
		}

		self::send_json_success(
			'',
			$data
		);
	}

	/**
	 * Sends information whether we should display the rating box
	 *
	 * @since  6.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function rate( $request ) {
		$show = $this->validate_and_get_option_value( $request, 'show', false );

		update_option( 'siteground_optimizer_hide_rating', intval( ! $show ) );

		self::send_json_success(
			'',
			array(
				'show' => intval( $show ),
			)
		);
	}

	/**
	 * Get information whether we should display the rating box
	 *
	 * @since  6.0.1
	 */
	public function rate_get() {
		self::send_json_success(
			'',
			array(
				'show' => ! intval( get_option( 'siteground_optimizer_hide_rating', 0 ) ),
			)
		);
	}
}
