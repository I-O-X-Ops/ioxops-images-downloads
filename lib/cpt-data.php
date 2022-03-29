<?php add_action('init', 'create_ioxops_download', 0);

function create_ioxops_download() {
    $labels = array(
        'name' => _x('IOXOPS Downloads', 'post type general name'),
        'singular_name' => _x('IOXOPS Downloads', 'post type singular name'),
        'add_new' => _x('Add Download', 'moments'),
        'add_new_item' => __('Add Download'),
        'edit_item' => __('Edit Download'),
        'new_item' => __('New Download'),
        'view_item' => __('View Download'),
        'search_items' => __('Search Download'),
        'not_found' => __('No Download found'),
        'not_found_in_trash' => __('No Download found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ioxops_download','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
		'menu_icon'           => 'dashicons-cover-image',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('ioxops_download', $args);
    //Register the case_studies_categories taxonomy.
    register_taxonomy("ioxops_download_categories", "ioxops_download", array("hierarchical" => true,
        "label" => "Download Categories",
        "singular_label" => "Download Categories",
        'rewrite' => array('slug' => 'ioxops_downloads','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );
	register_taxonomy("ioxops_orientation", "ioxops_download", array("hierarchical" => true,
        "label" => "Orientations",
        "singular_label" => "Orientations",
		'add_new_item' => __('Add Orientation'),
        'edit_item' => __('Edit Orientation'),
        'new_item' => __('New Orientation'),
        'view_item' => __('View Orientation'),															 
        'rewrite' => array('slug' => 'ioxops_orientation','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );
	register_taxonomy(
    'ioxops_tag',
    'ioxops_download',
    array(
        'hierarchical'  => true,
        'label'         => "Colors",
        'singular_name' => "Color",
		'add_new_item' => __('Add Color'),
        'edit_item' => __('Edit Color'),
        'new_item' => __('New Color'),
        'view_item' => __('View Color'),
        'rewrite'       => true,
        'query_var'     => true
    )
);
	

}
?>