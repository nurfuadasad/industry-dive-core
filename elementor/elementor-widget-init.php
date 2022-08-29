<?php

/**
 * Elementor Addons Init
 * @package yotta
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly
}


if ( ! class_exists( 'Yotta_Elementor_Widget_Init' ) ) {

	class Yotta_Elementor_Widget_Init {
	   /**
		* $instance
		* @since 1.0.0
		*/
		private static $instance;

	   /**
		* construct()
		* @since 1.0.0
		*/
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array( $this, '_widget_categories' ) );
			//elementor widget registered
			add_action( 'elementor/widgets/widgets_registered', array( $this, '_widget_registered' ) );
			// elementor editor css
			add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'load_assets_for_elementor' ) );
			//add icon to elementor new icons fileds
			add_filter( 'elementor/icons_manager/native', array( $this, 'add_custom_icon_to_elementor_icons' ) );
		}
		/**
	     * getInstance()
	     * @since 1.0.0
	     */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 */
		public function _widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'yotta_widgets',
				[
					'title' => esc_html__( 'Yotta Widgets', 'yotta-core' ),
					'icon'  => 'fas fa-plug',
				]
			);
		}
		/**
		 * _widget_registered()
		 * @since 1.0.0
		 */
		public function _widget_registered() {
			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}
			$elementor_widgets = array(
				'accordion',
				'blockquote',
				'blockquote-two',
				'blog-slider-one',
//				'blog-slider-two',
				'brand-slider',
				'button-one',
//				'call-to-action-item',
				'choose-single-item-one',
//				'contact-info-list-one',
//				'countdown',
				'counterup-one',
				'navbar-style-one',
				'navbar-style-two',
//				'empty-div',
//				'event-trainer',
//				'events-grid',
//				'events-list',
//				'feature-single-item-one',
				'footer-menu',
//				'gallery',
				'gallery-slider-item',
				'googlemap-locator',
				'header-slider-one',
//				'header-slider-two',
				'heading-title',
				'icon-box-one',
				'live-video-popup',
				'post-title',
//				'post-image',
//				'post-price',
				'price-plan',
//				'request-form',
//				'routine-calendar-single-item',
//				'single-skill-item',
				'service-single-item',
				'tabs-content-one',
//				'team-single-item',
//				'team-single-item-two',
				'testimonial-one',
//				'training-single-grid',
//				'training-single-slider',
//				'training-single-slider-two',
				'video-hover',
			);

			$elementor_widgets = apply_filters( 'yotta_elementor_widget', $elementor_widgets );
			ksort( $elementor_widgets );
			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				foreach ( $elementor_widgets as $widget ) {
					if ( file_exists( YOTTA_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php' ) ) {
						require_once YOTTA_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php';
					}
				}
			}
		}

		public function add_custom_icon_to_elementor_icons( $icons ) {
			$icons['flaticon'] = [
				'name'          => 'flaticon',
				'label'         => esc_html__( 'Flaticon', 'yotta-core' ),
				'url'           => YOTTA_CORE_CSS . '/flaticon.css',
				// icon css file
				'enqueue'       => [ YOTTA_CORE_CSS . '/flaticon.css' ],
				// icon css file
				'prefix'        => 'flaticon-',
				//prefix ( like fas-fa  )
				'displayPrefix' => '',
				//prefix to display icon
				'labelIcon'     => 'flaticon-karate-1',
				//tab icon of elementor icons library
				'ver'           => '1.0.0',
				'fetchJson'     => YOTTA_CORE_JS . '/flaticon.js',
				//json file with icon list example {"icons: ['icon class']}
				'native'        => true,
			];

			return $icons;
		}

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		 */
		public function load_assets_for_elementor() {
			wp_enqueue_style( 'flaticon', YOTTA_CORE_CSS . '/flaticon.css' );
			wp_enqueue_style( 'yotta-core-elementor-style', YOTTA_CORE_ADMIN_ASSETS . '/css/elementor-editor.css' );
		}

	}

	if ( class_exists( 'Yotta_Elementor_Widget_Init' ) ) {
		Yotta_Elementor_Widget_Init::getInstance();
	}
}//end if
