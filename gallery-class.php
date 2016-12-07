<?php
/*
Plugin Name: Gallery Class
Description: Add a new setting in the media gallery settings to set a custom CSS class.
Version: 1.0.0
Author: Francis Santerre
Author URI: http://santerref.com/
License: GPLv2 or later
Text Domain: gallery-class
*/

if ( ! class_exists( 'Gallery_Class' ) ) {

	class Gallery_Class {

		protected static $instance;

		protected function __construct() {
		}

		public function gallery_shortcode( $output = '', $atts, $instance ) {
			if ( ! empty( $atts['class'] ) ) {
				$class = trim( $atts['class'] );
				unset( $atts['class'] );

				$output = sprintf(
					'<div class="gallery-wrapper %1$s">%2$s</div>',
					esc_attr( $class ),
					gallery_shortcode( $atts )
				);
			}

			return $output;
		}

		public function admin_init() {
			add_action( 'wp_enqueue_media', array( $this, 'enqueue_media' ) );
			add_action( 'print_media_templates', array( $this, 'media_template' ) );
		}

		public function enqueue_media() {
			if ( $this->current_screen_base_is_post() ) {
				wp_enqueue_script( 'gallery-class', plugins_url( 'gallery-class.js', __FILE__ ), array( 'media-views' ) );
			}
		}

		public function media_template() {
			if ( $this->current_screen_base_is_post() ) {
				?>
				<script type="text/html" id="tmpl-gallery-class">
					<label class="setting">
						<span><?php _e( 'CSS Class' ); ?></span>
						<input type="text" data-setting="class"/>
					</label>
				</script>
				<?php
			}
		}

		protected function current_screen_base_is_post() {
			$screen = get_current_screen();

			return ! ( empty( $screen ) || ! isset( $screen->id ) || $screen->base != 'post' );
		}

		public static function get_instance() {
			if ( ! self::$instance instanceof self ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

	}

	if ( ! function_exists( 'gallery_class_plugin' ) ) {

		function gallery_class_plugin() {
			static $plugin_instance;

			if ( ! isset( $plugin_instance ) ) {
				$plugin_instance = Gallery_Class::get_instance();
			}

			return $plugin_instance;
		}

		add_action( 'admin_init', array( gallery_class_plugin(), 'admin_init' ) );
		add_filter( 'post_gallery', array( gallery_class_plugin(), 'gallery_shortcode' ), 10000, 3 );

	}

}

