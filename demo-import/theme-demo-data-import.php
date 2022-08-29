<?php

/**
 * default page assing
 *
 * @return void
 */
function constro_after_import_setup()
{

    //assign menus to their locations
    $main_menu = get_term_by('name', 'Primary menu','nav_menu');

    set_theme_mod('nav_menu_locations',array(
            'main-menu' => $main_menu->term_id
        )
    );

    $main_menu_two = get_term_by('name', 'Center Logo Menu','nav_menu');

    set_theme_mod('nav_menu_locations',array(
            'main-menu-02' => $main_menu_two->term_id
        )
    );
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home');
    $blog_page_id  = get_page_by_title('News');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}
add_action('ocdi/after_import', 'constro_after_import_setup');


/**
 * One click demo setup
 */

function import_files()
{
    return [
        [
            'import_file_name'           => 'Yotta',
            'categories'                   => 'yotta',
            'local_import_file'            => trailingslashit(YOTTA_CORE_ROOT_PATH) . 'demo-import/demo-data/content.xml',
            'local_import_customizer_file'     => trailingslashit(YOTTA_CORE_ROOT_PATH) . 'demo-import/demo-data/customize.dat',
            'local_import_widget_file'     => trailingslashit(YOTTA_CORE_ROOT_PATH) . 'demo-import/demo-data/widgets.wie',
            'local_import_json' => array(
                array(
                    'file_path'     => trailingslashit(YOTTA_CORE_ROOT_PATH) . 'demo-import/demo-data/theme-settings.json',
                    'option_name'   => 'yotta_theme_options',
                ),
            ),
            'preview_url'   => 'https://themeim.com/wp/yotta',
        ],
    ];
}
add_filter('ocdi/import_files', 'import_files');



/**
 * Adding local_import_json and import_json param supports.
 */
if (!function_exists('prefix_after_content_import_execution')) {
    function prefix_after_content_import_execution($selected_import_files, $import_files, $selected_index)
    {

        $downloader = new OCDI\Downloader();

        if (!empty($import_files[$selected_index]['import_json'])) {

            foreach ($import_files[$selected_index]['import_json'] as $index => $import) {
                $file_path = $downloader->download_file($import['file_url'], 'demo-import-file-' . $index . '-' . date('Y-m-d__H-i-s') . '.json');
                $file_raw  = OCDI\Helpers::data_from_file($file_path);
                update_option($import['option_name'], json_decode($file_raw, true));
            }
        } else if (!empty($import_files[$selected_index]['local_import_json'])) {

            foreach ($import_files[$selected_index]['local_import_json'] as $index => $import) {
                $file_path = $import['file_path'];
                $file_raw  = OCDI\Helpers::data_from_file($file_path);
                update_option($import['option_name'], json_decode($file_raw, true));
            }
        }
    }
    add_action('ocdi/after_content_import_execution', 'prefix_after_content_import_execution', 3, 99);
}
