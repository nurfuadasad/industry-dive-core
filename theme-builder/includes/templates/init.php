<?php 

function themeim_should_replace_404() {
    $arg = [
        'post_type' => 'themeim-builder',
        'post_status' => 'publish',
        'sort_order' => 'DESC',
        'sort_column' => 'ID,post_title',
        'numberposts' => -1,
     ];
     $pages = get_posts( $arg );
        
     foreach($pages as $page) {
        $get_tempalte = get_post_meta($page->ID, 'themeim_header_templates', true);
        $active_not_found = get_post_meta($page->ID, 'is_themeim_404_active', true);

        //  Check display Header 	
        if($get_tempalte['type'] == 'f0f' && $active_not_found == 'yes') {
            return $page->ID;
        }	
     } 
   return false;
}
// active inactive 404 page
add_action( 'wp_ajax_template_404_update', 'template_404_update' );

function template_404_update() {
  if(empty($_POST['post_id'])){
    wp_die(__('Post Id not valid', 'domain'));
  }
  update_post_meta( $_POST['post_id'], 'is_themeim_404_active', $_POST['status'] );
  if($_POST['status'] == 'yes'){
    $arg = [
      'post_type' => 'themeim-builder',
      'post_status' => 'publish',
      'sort_order' => 'DESC',
      'sort_column' => 'ID,post_title',
      'numberposts' => -1,
      'exclude'          => $_POST['post_id'],
   ];
   $pages = get_posts( $arg );
      
   foreach($pages as $page) {
    $get_type = get_post_meta($page->ID, 'themeim_header_templates', true);
    if($get_type['type'] == 'f0f'){
      update_post_meta( $page->ID, 'is_themeim_404_active', 'no' );
    }
   } 
  }
  printf(__('%s Successfull', 'domain'), $_POST['message']);
	wp_die(); // this is required to terminate immediately and return a proper response
}

// admin enqeue for header footer template 
function wpdocs_selectively_enqueue_admin_script( $hook ) {

  wp_enqueue_script( 'themeim-hfb-scrpt', YOTTA_CORE_ROOT_URL . 'theme-builder/assets/js/admin.js', array('jquery'));
	wp_localize_script( 'themeim-hfb-scrpt', 'themeim_hfb_obj',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

function get_themebuilder_Id( $id, $type = 'header' ) {

     $arg = [
       'post_type' => 'themeim-builder',
       'post_status' => 'publish',
       'sort_order' => 'DESC',
       'sort_column' => 'ID,post_title',
       'numberposts' => -1,
    ];
    $pages = get_posts( $arg );
   
    $dispaly_list = [];
   
    foreach($pages as $page) {
       $get_tempalte = get_post_meta($page->ID, 'themeim_header_templates', true);
       
       //  Check display Header 	
       if($get_tempalte['type'] == $type) {
           $dispaly = $get_tempalte['display'];
           $dispaly_list[$page->ID] = $dispaly;
       }	
    }  
    
    return __themename_themebuilder_id($dispaly_list, $id);
   
   }
   function get_builder_id($arr, $key) {
	foreach ($arr as $k => $val) {
		if(in_array($key, $val)){
			return $k;
		}
	}
	return null;
 }
   if(!function_exists('__themename_themebuilder_id')){
    function __themename_themebuilder_id($arr = [], $id) {
      if(empty($arr)) {
          return;
      }
      global $post;
      $post_type = get_post_type( $post->ID );
          
      //  check custom postype select header
      if(is_singular($post_type) && get_builder_id($arr, $post_type)) {
        return $content_id = get_builder_id($arr, $post_type);
      }
      
      if(is_front_page() && get_builder_id($arr, 'front_page')) {
        return $content_id = get_builder_id($arr, 'front_page');
      }
      //  Check block page 
      if(is_home() && get_builder_id($arr, 'home_page')) {
        return $content_id = get_builder_id($arr, 'home_page');
      }
    // Check 404 page 
      if(is_404() && get_builder_id($arr, 'four_0_4')) {
        return $content_id = get_builder_id($arr, 'four_0_4');
      }
    // Check category
    if(is_category() && get_builder_id($arr, 'category')) {
        return $content_id = get_builder_id($arr, 'category');
      }
    // if has header on archive page 
    if(is_archive() && get_builder_id($arr, 'archives')) {
        return $content_id = get_builder_id($arr, 'archives');
      }
    //  Check is search page 
    if(is_search() && get_builder_id($arr, 'search')) {
    return $content_id = get_builder_id($arr, 'search');
    }
    // if page has uniqeuue header 
    if(get_builder_id($arr, $id)) {
        return $content_id = get_builder_id($arr, $id);
    }
    if(is_single() && get_builder_id($arr, 'all_posts')) {
        return $content_id = get_builder_id($arr, 'all_posts');
    }
    if(is_page() && get_builder_id($arr, 'all_pages')) {
        return $content_id = get_builder_id($arr, 'all_pages');
    }
    if(get_builder_id($arr, 'entire_website')) {
        return $content_id = get_builder_id($arr, 'entire_website');
    }
        return '';
     }
    }

    add_action('get_header', 'themeim_core_replace_header');
    function themeim_core_replace_header(){
        global $post;
        $header_id = get_themebuilder_Id($post->ID, 'header');
       if($header_id == '') {
        return false;
       }
      require PLUGIN_DIR.'includes/templates/header.php';
  
      $templates   = [];
      $templates[] = 'header.php';
      remove_all_actions( 'wp_head' );
      ob_start();
      locate_template( $templates, true );
      ob_get_clean();
  }
  // replace footer 

  add_action('get_footer', 'themeim_core_replace_footer');
    function themeim_core_replace_footer(){
        global $post;
        $footer = get_themebuilder_Id($post->ID, 'footer');
       if($footer == '') {
        return false;
       }
      require PLUGIN_DIR.'includes/templates/footer.php';
  
      $templates   = [];
      $templates[] = 'footer.php';
      remove_all_actions( 'wp_footer' );
      ob_start();
      locate_template( $templates, true );
      ob_get_clean();
  }

// For header 
  if(!function_exists('themeim_header_builder')){
    function themeim_header_builder( $header_banner ) {  
        if ( $header_banner != '' && class_exists('\Elementor\Plugin' ) ) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_banner );
        }
    }
    add_action('themeim_core_header', 'themeim_header_builder');
  }
// For banner
if(!function_exists('themeim_banner_builder')){
    function themeim_banner_builder( $banner_builder ) {  
        if ( $banner_builder != '' && class_exists('\Elementor\Plugin' ) ) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $banner_builder );
        }
    }
    add_action('themeim_core_banner', 'themeim_banner_builder');
}
//  for footer 

if(!function_exists('themeim_footer_builder')){
    function themeim_footer_builder( $footer_banner ) {  
        if ( $footer_banner != '' && class_exists('\Elementor\Plugin' ) ) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_banner );
        }
    }
    add_action('themeim_core_footer', 'themeim_footer_builder');
  }

  // replace 404 page with elementor
  if(themeim_should_replace_404()){

    add_filter( "404_template", 'load_custom_404_page');
    function load_custom_404_page ( $themeim_four_zero_page ) {
      $themeim_four_zero_page = PLUGIN_DIR.'includes/templates/404.php';
      return $themeim_four_zero_page;
    }
    add_action('four_0_4_content', 'for_0_4_content_display');
    function for_0_4_content_display() {
        if ( themeim_should_replace_404() != '' && class_exists('\Elementor\Plugin' ) ) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( themeim_should_replace_404() );
        }
    }
  } 

