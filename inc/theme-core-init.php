<?php
/**
 * Theme Core Init
 * @package yotta
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Yotta_Core_Init')) {

	class Yotta_Core_Init
	{
	   /**
        * $instance
        * @since 1.0.0
        */
		protected static $instance;

		public function __construct()
		{
			//Load plugin assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
			//Load plugin admin assets
			add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
			//load plugin text domain
			add_action('init', array($this, 'load_textdomain'));
			//add custom icon to codester framework
			add_filter('csf_field_icon_add_icons', array($this, 'csf_custom_icon'));
			//load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
		}

	   /**
        * getInstance()
        * @since 1.0.0
        */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 */
		public function load_textdomain()
		{
			load_plugin_textdomain('yotta-core', false, YOTTA_CORE_ROOT_PATH . '/languages');
		}

		/**
		 * Load plugin dependency files()
		 * @since 1.0.0
		 */
		public function load_plugin_dependency_files()
		{
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => YOTTA_CORE_LIB . '/codestar-framework'
				),
				array(
					'file-name' => 'theme-menu-page',
					'folder-name' => YOTTA_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-custom-post-type',
					'folder-name' => YOTTA_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-post-column-customize',
					'folder-name' => YOTTA_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-yotta-core-excerpt',
					'folder-name' => YOTTA_CORE_INC
				),
				array(
					'file-name' => 'csf-taxonomy',
					'folder-name' => YOTTA_CORE_INC
				),
				array(
					'file-name' => 'theme-core-shortcodes',
					'folder-name' => YOTTA_CORE_INC
				),
				array(
					'file-name' => 'elementor-widget-init',
					'folder-name' => YOTTA_CORE_ELEMENTOR
				),
                array(
                    'file-name' => 'theme-social-share-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-widget-nav',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-me-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-us-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-search-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-tags-menu',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-recent-post-widget',
					'folder-name' => YOTTA_CORE_WP_WIDGETS
				),
				array(
					'file-name' => 'theme-contact-info-widget',
					'folder-name' => YOTTA_CORE_WP_WIDGETS
				),
                array(
                    'file-name' => 'theme-service-category-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-request-form-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-category-widget',
                    'folder-name' => YOTTA_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-demo-data-import',
					'folder-name' => YOTTA_CORE_DEMO_IMPORT
				),
			);

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'theme-elementor-icon-manager',
                    'folder-name' => YOTTA_CORE_INC
                );
            }
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as $file) {
					if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function plugin_assets()
		{
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

		/**
		 * Load plugin css files()
		 * @since 1.0.0
		 */
		public function load_plugin_css_files()
		{
			$plugin_version = YOTTA_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'flaticon',
					'src' => YOTTA_CORE_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
                array(
                    'handle' => 'nice-select',
                    'src' => YOTTA_CORE_CSS . '/nice-select.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
                array(
                    'handle' => 'slick',
                    'src' => YOTTA_CORE_CSS . '/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
					'handle' => 'fontawesome',
					'src' => YOTTA_CORE_CSS . '/font-awesome.min.css',
					'deps' => array(),
					'ver' => '5.12.0',
					'media' => 'all'
				),
				array(
					'handle' => 'yotta-core-main-style',
					'src' => YOTTA_CORE_CSS . '/main-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);
			
			if (!yotta_core()->is_yotta_active()) {
				$all_css_files[] = array(
					'handle' => 'animate',
					'src' => YOTTA_CORE_CSS . '/animate.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'bootstrap',
					'src' => YOTTA_CORE_CSS . '/bootstrap.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'magnific-popup',
					'src' => YOTTA_CORE_CSS . '/magnific-popup.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'yotta-main-style',
					'src' => YOTTA_CORE_CSS . '/theme-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'yotta-responsive',
					'src' => YOTTA_CORE_CSS . '/theme-responsive.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
			}
			$all_css_files = apply_filters('yotta_core_css', $all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin js
		 * @since 1.0.0
		 */
		public function load_plugin_js_files()
		{
			$plugin_version = YOTTA_CORE_VERSION;
			$all_js_files = array(
                array(
                    'handle' => 'wow',
                    'src' => YOTTA_CORE_JS . '/wow.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'nice-select',
                    'src' => YOTTA_CORE_JS . '/jquery.nice-select.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'waypoints',
					'src' => YOTTA_CORE_JS . '/waypoints.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'jquery-easychart',
                    'src' => YOTTA_CORE_JS . '/jquery.easypiechart.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'isotope.pkgd',
                    'src' => YOTTA_CORE_JS . '/isotope.pkgd.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'imagesloaded-pkgd',
                    'src' => YOTTA_CORE_JS . '/imagesloaded.pkgd.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'countdown',
                    'src' => YOTTA_CORE_JS . '/jquery.countdown.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'counterup',
					'src' => YOTTA_CORE_JS . '/jquery.counterup.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'viewport',
                    'src' => YOTTA_CORE_JS . '/viewport.jquery.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'odometer',
                    'src' => YOTTA_CORE_JS . '/odometer.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'slick',
                    'src' => YOTTA_CORE_JS . '/slick.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'swiper',
                    'src' => YOTTA_CORE_JS . '/swiper.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'yotta-core-main-script',
					'src' => YOTTA_CORE_JS . '/main.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			if (!yotta_core()->is_yotta_active()) {
				$all_js_files[] = array(
					'handle' => 'popper',
					'src' => YOTTA_CORE_JS . '/popper.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'bootstrap',
					'src' => YOTTA_CORE_JS . '/bootstrap.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'magnific-popup',
					'src' => YOTTA_CORE_JS . '/jquery.magnific-popup.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
			}

			$all_js_files = apply_filters('yotta_core_frontend_script_enqueue', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function admin_assets()
		{
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * Load plugin admin css files()
		 * @since 1.0.0
		 */
		public function load_admin_css_files()
		{
			$plugin_version = YOTTA_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'yotta-core-admin-style',
					'src' => YOTTA_CORE_ADMIN_ASSETS . '/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'flaticon',
					'src' => YOTTA_CORE_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
			);

			$all_css_files = apply_filters('yotta_admin_css', $all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin admin js
		 * @since 1.0.0
		 */
		public function load_admin_js_files()
		{
			$plugin_version = YOTTA_CORE_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'yotta-core-lightcase',
					'src' => YOTTA_CORE_ROOT_URL . '/js/lightcase.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
				array(
					'handle' => 'yotta-swiper',
					'src' => YOTTA_CORE_ROOT_URL . '/js/swiper.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
				array(
					'handle' => 'yotta-core-widget',
					'src' => YOTTA_CORE_ADMIN_ASSETS . '/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('yotta_admin_js', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Add Custom Icon To Codester Framework
		 * @since 1.0.0
		 */
		public function csf_custom_icon($icons)
		{
			//adding new icon
			$icons[]  = array(
				'title' => esc_html__('Flaticon', 'yotta-core'),
				'icons' => array(
					'flaticon-right-arrow',
					'flaticon-running',
					'flaticon-stationery-bicycle',
					'flaticon-boxing-gloves',
					'flaticon-kickboxing',
					'flaticon-right-arrow-1',
					'flaticon-share',
					'flaticon-facebook',
					'flaticon-twitter',
					'flaticon-google-plus',
					'flaticon-instagram',
					'flaticon-consultation',
					'flaticon-customer',
					'flaticon-trainer',
					'flaticon-team',
					'flaticon-straight-quotes',
					'flaticon-star',
					'flaticon-telephone-call',
					'flaticon-volume',
					'flaticon-qualified',
					'flaticon-fit',
					'flaticon-fighting',
					'flaticon-karate',
					'flaticon-judo',
					'flaticon-kickboxing-1',
					'flaticon-karate-1',
					'flaticon-wrestling',
					'flaticon-karate-2',
					'flaticon-karate-3',
					'flaticon-taekwondo',
					'flaticon-check',
					'flaticon-email',
					'flaticon-badge',
					'flaticon-placeholder',
					'flaticon-boxing',
					'flaticon-boxing-1',
					'flaticon-boxing-2',
					'flaticon-location',
					'flaticon-phone-call',
					'flaticon-quote',
					'flaticon-good-shape',
					'flaticon-man',
					'flaticon-fitness',
					'flaticon-star-1',
					'flaticon-whistle',
					'flaticon-boxing-glove',
					'flaticon-magnifying-glass',
					'flaticon-mission',
					'flaticon-focus',
					'flaticon-mission-1',
					'flaticon-arroba',
					'flaticon-clock-circular-outline',
					'flaticon-calendar',
					'flaticon-stopwatch',
					'flaticon-maps-and-flags',
					'flaticon-slim-down',
					'flaticon-heart',
					'flaticon-flag',
					'flaticon-document',
					'flaticon-expand',
					'flaticon-red-eye',
					'flaticon-group',
					'flaticon-writing',
					'flaticon-id-card',
					'flaticon-calendar-1',
					'flaticon-calendar-2',
					'flaticon-right-arrow-2',
					'flaticon-right-arrows',
					'flaticon-next',
					'flaticon-next-1',
					'flaticon-right-arrow-3',
					'flaticon-arrow',
					'flaticon-left-arrow',
					'flaticon-arrow-1',
					'flaticon-youtube'
				)
			);

			$icons = array_reverse($icons);

			return $icons;
		}
	} //end class
	if (class_exists('Yotta_Core_Init')) {
		Yotta_Core_Init::getInstance();
	}
}
