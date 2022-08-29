<?php
namespace yottahead_\Includes;
defined( 'ABSPATH' ) || exit;

class Posttype Extends Common{

    /**
     * instance property
     *
     * @var String
     */
    private static $instance;

    public function __construct(){

        if(current_user_can('manage_options')){

            // create custom posttype
            add_action( 'init', [ $this, 'custom_posttype' ] );
            // add metabox
            add_action( 'add_meta_boxes', [ $this, 'template_type'] );
            // save meta data
            add_action( 'save_post', [ $this, 'save_meta' ] );
            // manage metabox column and column control
            add_action( 'manage_'.$this->posttype.'_posts_custom_column', [ $this, 'column_content' ], 10, 2 );
            add_filter( 'manage_'.$this->posttype.'_posts_columns', [ $this, 'column_set' ] );
            
            // set header anf footer templates for individual pages nad post
            add_action('add_meta_boxes', [ $this, 'render_metabox']);
        }
        
    }

    /**
    * Name: custom_posttype
    * Desc: Create custom post type for Header Footer Builder
    * Params: @void
    * Return: @void
    * Since: @1.0.0
    * Package: @yottahead_
    * Author: DroitThemes
    * Developer: Hazi
    */
    public function custom_posttype(){
        $labels = [
			'name'               => __( 'Templates', 'yottahead_' ),
			'singular_name'      => __( 'Templates', 'yottahead_' ),
			'menu_name'          => __( 'Templates', 'yottahead_' ),
			'name_admin_bar'     => __( 'Templates', 'yottahead_' ),
			'add_new'            => __( 'Add New', 'yottahead_' ),
			'add_new_item'       => __( 'Add New Header, Footer', 'yottahead_' ),
			'new_item'           => __( 'New Templates', 'yottahead_' ),
			'edit_item'          => __( 'Edit Header Footer & Blocks Template', 'yottahead_' ),
			'view_item'          => __( 'View Header Footer & Blocks Template', 'yottahead_' ),
			'all_items'          => __( 'All Templates', 'yottahead_' ),
			'search_items'       => __( 'Search Header Footer & Blocks Templates', 'yottahead_' ),
			'parent_item_colon'  => __( 'Parent Header Footer & Blocks Templates:', 'yottahead_' ),
			'not_found'          => __( 'No Header Footer & Blocks Templates found.', 'yottahead_' ),
			'not_found_in_trash' => __( 'No Header Footer & Blocks Templates found in Trash.', 'yottahead_' ),
		];

		$args = [
			'labels'              => $labels,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'menu_icon'           => 'dashicons-editor-kitchensink',
            'supports'            => [ 'title', 'thumbnail', 'elementor' ],
            'show_in_nav_menus'     => true,
		];
		register_post_type( $this->posttype, $args );
    }

 
    public function column_set( $columns ) {
		unset( $columns['date'] );
		$columns['yotta_type'] = __( 'Templates type', 'yottahead_' );
		$columns['yotta_shortcode'] = __( 'Shortcode', 'yottahead_' );
		$columns['yotta_display'] = __( 'Display On', 'yottahead_' );
		$columns['date']      = __( 'Date', 'yottahead_' );
		return $columns;
    }
    public function column_content( $column, $post_id ){

        $data = get_post_meta($post_id, 'themeim_header_templates', true);
        $is_active_404 = (get_post_meta($post_id, 'is_themeim_404_active', true) == 'yes') ? '<span style="background-color: #6754e2;; color: #fff;padding: 2px 12px;border-radius: 10px; line-height: 32px;">Active</span>': '';

        switch( $column ):

            case 'yotta_type':
                $type = ($data['type']) ?? '';
                $type = !empty($type) ? $this->template_type_array($type) : '';
                echo esc_html( $type );
            break;

            case 'yotta_display':
                $display = ($data['display']) ?? [];
                echo esc_html( implode(' - ', $display) );
                echo $is_active_404;
            break;

            case 'yotta_shortcode':
                ?>
                <span class="dtdr-shortcode dtdr-clipboard" data-clipborad-action="copy" data-clipboard-target=".dtdr-shortcode" aria-label="Copied">
                <?php
                echo yotta_kses_html('[dtdr-template id="'.esc_attr($post_id).'"]');
                ?>
                </span>
                <?php
            break;

        endswitch;

    }

    public function save_meta( $postid ){

        // check autosave action
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
        
		// checking nounce action 
		if ( ! isset( $_POST['droitsave_meta_save'] ) || ! wp_verify_nonce( $_POST['droitsave_meta_save'], 'droitsave_meta_nounce' ) ) {
			return;
		}
		// if our current user can't edit this post, bail.
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
        }
        
        if( isset( $_POST['drdtdata'])){
            $options = ($_POST['drdtdata']) ? $_POST['drdtdata'] : [];
            update_post_meta($postid, 'themeim_header_templates', $options);
        }

        if( isset( $_POST['dtdrselect'])){
            $options = ($_POST['dtdrselect']) ? $_POST['dtdrselect'] : [];
            update_post_meta($postid, 'themeim_header_templates_select', $options);
        }
        
        if( isset( $_POST['is_themeim_404_active'])){
            update_post_meta($postid, 'is_themeim_404_active', $_POST['is_themeim_404_active']);
        }
        
        return $postid;
        
    }


    public function template_type(){
        add_meta_box( 
            'droti-template-type',
             __( 'Template Settings', 'yottahead_' ),
            [ $this, 'meta_action'],
            'themeim-builder',
            'normal',
            'high'
        );
    }

    public function meta_action( $post ){
        
        $data = get_post_meta($post->ID, 'themeim_header_templates', true); 
        
        wp_nonce_field( 'droitsave_meta_nounce', 'droitsave_meta_save' );
        
        $type = $this->template_type_array();

        // query all pages
        $pages = $this->all_posts([
            'post_type' => 'page',
            'post_status' => 'publish',
            'sort_order' => 'ASC',
            'sort_column' => 'ID,post_title',
        ]);
        
        // query all post
        $posts = $this->all_posts([
            'post_type' => 'post',
            'post_status' => 'publish',
            'sort_order' => 'ASC',
            'sort_column' => 'ID,post_title',
        ]);


        $display = apply_filters('yotta_head_template_display', [
            '' => __('Select', 'yottahead_'),
            'entire_website' => __('Entire Website', 'yottahead_'),
            'front_page' => __('Front Page', 'yottahead_'),
            'all_posts' => __('All Post', 'yottahead_'),
            'all_pages'  => __('All Page', 'yottahead_'),
            'four_0_4'  => __('404', 'yottahead_'),
            'singulars' => __('All Singulars', 'yottahead_'),
            'archives' => __('All Archives', 'yottahead_'),
            'pages' => [ 
                'title' => __('Pages', 'yottahead_'),
                'options' => $pages
            ],
            'post' => [ 
                'title' => __('Posts', 'yottahead_'),
                'options' => $posts
            ],

        ]);

        global $wp_roles;
        $roles = $wp_roles->get_names();
        $userrole = apply_filters('yotta_head_template_role', [
            'all' => __('All', 'yottahead_'),
            'logged-in' => __('Logged In', 'yottahead_'),
            'logged-out' => __('Logged Out', 'yottahead_'),
            'advanced' => [ 
                'title' => __('Advanced', 'yottahead_'),
                'options' => $roles
            ],

        ]);        

        //  include meta files
        include_once( __DIR__ . '/views/posttype-settings-meta.php');
    }

    public function render_metabox( ){
        global $post;
       
        if($post->post_type == 'themeim-builder') {
            return;
        }
        add_meta_box( 
            'droti-template-select',
             __( 'Droit Template', 'yottahead_' ),
            [ $this, 'meta_action_select'],
            $this->working_posttype(),
            'side',
            'high'
        );
    }


    public function meta_action_select( $post ){

        $data = get_post_meta($post->ID, 'themeim_header_templates_select', true);

        wp_nonce_field( 'droitsave_meta_nounce', 'droitsave_meta_save' );

        $tem = $this->all_posts([
            'post_type' => $this->posttype,
            'post_status' => 'publish',
            'sort_order' => 'ASC',
            'sort_column' => 'ID,post_title',
            'meta_query' => [
                'key'     => 'themeim_header_templates',
                'value'   => 'header',
                'compare' => 'IN'
            ]
        ]);
        ?>        
        <div class="themeim-builder-meta">
           <label for="yotta_template_head_select">
                <?php echo esc_html__('Header Templates', 'yottahead_'); ?>
           </label>
           <select name="dtdrselect[header]" id="yotta_template_head_select">
               <option value=""><?php echo esc_html__('Default', 'yottahead_'); ?></option>
                <?php
                foreach($tem as $k=>$v ){
                    if( $k == 0){
                        continue;
                    }
                    $selected = selected( ($data['header']) ?? '', $k, 'selected');
                    ?>
                    <option value="<?php echo esc_attr($k);?>" <?php echo esc_attr($selected); ?> ><?php echo esc_html($v);?></option>
                    <?php
                }
                ?>
           </select>
         
        </div>

        <div class="themeim-builder-meta">
           <label for="yotta_template_foot_select">
           <?php echo esc_html__('Footer Templates', 'yottahead_'); ?>
           </label>
           <select name="dtdrselect[footer]" id="yotta_template_foot_select">
               <option value=""><?php echo esc_html__('Default', 'yottahead_'); ?></option>
               <?php
                foreach($tem as $k=>$v ){
                    if( $k == 0){
                        continue;
                    }
                    $selected = selected( ($data['footer']) ?? '', $k, 'selected');
                    ?>
                   <option value="<?php echo esc_attr($k);?>" <?php echo esc_attr($selected); ?> ><?php echo esc_html($v);?></option>
                   <?php
                }
                ?>
           </select>
          
        </div>

        <?php
    }

    public static function _instance(){
        if( is_null(self::$instance) ){
            self::$instance = new self();
        }
        return self::$instance;
    }

}