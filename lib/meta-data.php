<?php
add_action('admin_menu', 'DispInSbMetabox');

function DispInSbMetabox() {
    $arry_disp = array('ioxops_download');
    foreach ($arry_disp as $disp_post){
    add_meta_box('IOXOPS Picks', 'IOXOPS Picks', 'DispInSbMetaboxCb', $disp_post,'side','high');
    }
}

function DispInSbMetaboxCb($post_id) {
    global $post;
    $disp_in_sb = get_post_meta($post->ID, 'disp_in_sb', true);
    ?>
    <table>
    <tr>
        <td class="left">Favourites</td>
        <td >
           <input type="checkbox" id="disp_in_sb" name="disp_in_sb" value="faviox" <?php if($disp_in_sb=="faviox"){ echo "checked='checked'"; } ?>>
           
        </td>
    </tr>
    </table>
    <?php
}

add_action('save_post', 'saveSbMb');

function saveSbMb($post_id) {
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;
    update_post_meta($post_id, 'disp_in_sb', $_REQUEST['disp_in_sb']);
}



add_action('admin_menu', 'DispInHomeMetabox');

function DispInHomeMetabox() {
    add_meta_box('DispInHomeMbox', 'License Type', 'DispInHomeMetaboxCb', 'ioxops_download','side','high');
}

function DispInHomeMetaboxCb($post_id) {
    global $post;
    $disp_in_hme = get_post_meta($post->ID, 'disp_in_hme', true);
    ?>
    <table>
    <tr>
        <td class="left">License</td>
        <td width="500">
            <select name="disp_in_hme" id="disp_in_hme">
                <option value="" <?php
                if ($disp_in_hme == '') {
                    echo 'selected="selected"';
                }
                ?>>select</option>
                <option value="free" <?php
                if ($disp_in_hme == free) {
                    echo 'selected="selected"';
                }
                ?>>Free</option>
                <option value="premium" <?php
                if ($disp_in_hme == premium) {
                    echo 'selected="selected"';
                }
                ?>>Premium</option>
            </select>
        </td>
    </tr>
    </table>
    <?php
}

add_action('save_post', 'saveDhMb');

function saveDhMb($post_id) {
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;
    update_post_meta($post_id, 'disp_in_hme', $_REQUEST['disp_in_hme']);
}


/*** Metabox for page, post ***/



add_action("add_meta_boxes", "add_page_settings_custom_meta_box");
add_action("save_post", "save_page_settings_custom_meta_box", 10, 3);

function add_page_settings_custom_meta_box($post){
	add_meta_box("banner-meta-box", "Download Files", "banner_page_settings_box_markup", array('ioxops_download'), "normal", "high", null);

}

function banner_page_settings_box_markup($post){
	wp_nonce_field(basename(__FILE__), "page-settings-nonce");

	$imgBaglnk = get_post_meta( $post->ID, '_title_link', true );
	$logo = get_post_meta( $post->ID, '_uplogo', true );
	$productlnk = get_post_meta( $post->ID, '_pro_link', true );


	get_template_part('inc/upload-scripts');

	echo '<style type="text/css"> .page_settings_tbl td, .page_settings th{ padding: 7px 0px; } .page_settings textarea{ width: 25em;} </style>';
	echo '<table width="100%" class="page_settings" style="text-align: left;">';
		//echo get_admin_input('up_image', '_banner_image', 'Upload', $banner_image , '');
	echo get_admin_input('up_image', '_uplogo', 'Upload Image', $logo , '');
	echo get_admin_input('text', '_title_link', 'Image url', $imgBaglnk , '');

	echo get_admin_input('text', '_pro_link', 'Premium url', $productlnk , '');



	echo '</table>';
	
}

function save_page_settings_custom_meta_box( $post_id ) {


	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if ( in_array($_POST['post_type'], array('page','post','cpt-conditions')) ) {

		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	}

	$fields = array( '_upimg1','_uplogo','_banner_title','_upimg','_insta','_title_link','section','_pro_link' );

	foreach( $fields as $field ) {
		if(isset($_POST[$field])){
			$value = ( $_POST[$field] );
			update_post_meta( $post_id, $field, $value );
		}
	}

}







add_action('admin_menu', 'product_options_order');
//   Category Meta Box for Product
function product_options_order() {
    add_meta_box('product_options_order', 'Show in home Options', 'product_metabox_add_media', 'ioxops_download_categories');
}
add_action('product_cat_add_form_fields', 'cpt_resource_metabox_add_media', 10, 1);
add_action('product_cat_edit_form_fields', 'cpt_resource_metabox_edit_media', 10, 1);

function cpt_resource_metabox_add_media($tag) {
    ?>
    <div class="form-field">
        <label for="cat_order">Show category</label>
        <input type="text" name="order" id="order"  style="width:100px;" value="" />
        <p class="description">Please fill this field with unique value.</p>
    </div>
    <?php
}
function cpt_resource_metabox_edit_media($tag) {
    $term_order = get_term_meta($_REQUEST['tag_ID'], 'p_order', true);
?>
        <table class="form-table">
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="cat_order">Highlight text</label>
                </th>
                <td>
                    <input type="checkbox" name="p_order" id="p_order"  style="" value="1" <?php if($term_order == 1){ echo 'checked="checked"'; }?> />
                </td>
            </tr>
        </table>
<?php } 

add_action('created_product_cat', 'save_catodr_product', 10, 1);
add_action('edited_product_cat', 'save_catodr_meta_data_product', 10, 1);
function save_catodr_product($term_id) {
    if (isset($_REQUEST['p_order'])) {
        update_term_meta($term_id, 'p_order', $_REQUEST['p_order']);
    }
}
function save_catodr_meta_data_product($term_id) {

    update_term_meta($term_id, 'p_order', $_REQUEST['p_order']);
}

?>