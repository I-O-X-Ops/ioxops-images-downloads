<?php 
add_shortcode( 'ioxops_download', 'wpshout_date_content' );
function wpshout_date_content() {
		wp_enqueue_script( 'ioxopsdown-frontend-expone-scripts','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), IOXOPSDOWN_VERSION, 'all' );
		
		wp_enqueue_script( 'ioxopsdown-frontend-exptwo-scripts','https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array(), IOXOPSDOWN_VERSION, 'all' );
		
		wp_enqueue_script( 'ioxopsdown-frontend-expthree-scripts','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array(), IOXOPSDOWN_VERSION, 'all' );
		
		wp_enqueue_style( 'ioxopsdown-frontend-expone-styles','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), IOXOPSDOWN_VERSION, 'all' );
		
		wp_enqueue_style( 'ioxopsdown-frontend-styles', IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/css/frontend-styles.css', array(), IOXOPSDOWN_VERSION, 'all' );     
        	       
	
		wp_enqueue_script( 'ioxopsdown-frontend-scripts', IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/js/frontend-scripts.js', array( 'jquery' ), IOXOPSDOWN_VERSION, true );
	// Write query
	$dateconts_arg = array(
			 'post_type' => 'ioxops_download',	
			  'numberposts'  => -1
	);
	 $dateConts = get_posts($dateconts_arg);
	// Return output
	ob_start();
	
get_header();?>
<div id="searchBar_block" class="searchBar_block">
        <div class="searchBar_inner">
            <div id="searchBar_filter" class="searchBar_filter">
                <a onclick="OpenFilter()"><img height="20" style="margin-top: -3px;height: 20px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/edit.png';?>"
                        alt=""><span>&nbsp;Filter</span></a>
            </div>

            <div class="searchBar_box">
                <div id="resourses_filter_whole" class="resourses">
                    <div onclick="showNavBarFilter()" class="resourses_inner">
                        <div>
                            <a>Resourses&nbsp;&nbsp;</a>
                        </div>

                        <div>
                            <img style="transform: rotate(90deg);height: 10px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/play.png';?>" alt="">
                        </div>
                    </div>

                    <div id="resourses_filter" class="resourses_filter">
                        <div class="resourses_filter_category">
                            <h6>Category</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resourses_filter_category"
                                    id="resourses_filter_category1" value="all" checked>
                                <label class="form-check-label" for="resourses_filter_category1">
                                    All
                                </label>
                            </div>
							<?php
							   $args = array(
										   'taxonomy' => 'ioxops_download_categories',
										   'orderby' => 'name',
										   'order'   => 'ASC'
									   );

							   $cats = get_categories($args);

							   foreach($cats as $cat) {
							?>
                            <div class="form-check">
                                <input class="form-check-input common_selector category" type="radio" name="resourses_filter_category"
                                    id="resourses_filter_category<?php echo $cat->term_id ; ?>" value="<?php echo $cat->slug ; ?>">
                                <label class="form-check-label" for="resourses_filter_category2">
                                    <?php echo $cat->name ; ?>
                                </label>
                            </div>
							<?php } ?>
                           
                            
                        </div>

                        <div class="resourses_filter_category">
                            <h6>License</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resourses_filter_License"
                                    id="resourses_filter_License1" value="" checked>
                                <label class="form-check-label" for="resourses_filter_License1">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resourses_filter_License"
                                    id="resourses_filter_License2" value="free">
                                <label class="form-check-label" for="resourses_filter_License2">
                                    Free
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resourses_filter_License"
                                    id="resourses_filter_License3" value="premium">
                                <label class="form-check-label" for="resourses_filter_License3">
                                    Premium
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="searchbar_input">
                    <input type="text" placeholder="Search all resourses" id="keyword" value=" ">
					<input type="hidden" id="resultkey" value="">
                </div>
                <div class="searchBar_icon">
                    <a href="javascript:void(0)"><img height="20" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/search.png';?>" alt="" style="height:16px;"></a>
                </div>
				<div style=" margin-top: 12px; " class="desktop-view">
					<a id="displayOptionBtn" onclick="DisplayOption()"><img height="20" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/monitor.png';?>"
                        alt="" style="height:20px;">&nbsp;&nbsp;Display
                    Option</a>
				</div>
            </div>
        </div>
    </div>
	<div id="filter_scroll" class="filter_block">
        <div class="filter_block_title">
            <div>
                <a><img height="20" style="margin-top: -3px;height:20px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/edit.png';?>" alt="">&nbsp;Filter</a>
            </div>
            <div>
                <a style="cursor: pointer" onclick="OpenFilter()"><img height="20" style="transform: scale(-1, 1);height:20px;"
                        src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/exit.png';?>" alt=""></a>
            </div>
        </div>
        <div style="margin-top: 5px;">
            <div id="filter_category1" class="filter_category">
                <div onclick="UnfoldFilter('filter_category1', 'filter_arrow1')" class="filter_fold">
                    <div>
                        <h6>Category</h6>
                    </div>
                    <div>
                        <img id="filter_arrow1" height="10" style="transform: rotate(90deg);height:10px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/play.png';?>"
                            alt="">
                    </div>
                </div>
				<div class="form-check">
                    <input class="form-check-input common_selector category" type="radio" name="category" id="category1" value=" " checked>
                    <label class="form-check-label" for="category1">
                        All
                    </label>
                </div>
				<?php
				   $args = array(
							   'taxonomy' => 'ioxops_download_categories',
							   'orderby' => 'name',
							   'order'   => 'ASC'
						   );

				   $cats = get_categories($args);
				   $items = array();
				   foreach($cats as $cat) {
					   $term_data = get_term_meta($cat->term_id, 'p_order', true);
					   if(!empty($term_data)){
						  $items[] = $cat->term_id;

					   }
				?>
                <div class="form-check">
                    <input class="form-check-input common_selector category" type="radio" name="category" id="category<?php echo $cat->term_id ; ?>" data-details="<?php echo $term_data; ?>" value="<?php echo $cat->term_id; ?>" >
					
                    <label class="form-check-label" for="category<?php echo $cat->term_id ; ?>">
                        <?php echo $cat->name; ?>
                    </label>
                </div>
				<?php } 
				?>
				<input class="hiddendata" type="hidden" name="hiddendata" value="<?php echo $items; ?>">
            </div>

            <div id="filter_category2" class="filter_category">
                <div onclick="UnfoldFilter('filter_category2', 'filter_arrow2')" class="filter_fold">
                    <div>
                        <h6>License</h6>
                    </div>
                    <div>
                        <img id="filter_arrow2" height="10" style="transform: rotate(90deg);height:10px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/play.png';?>"
                            alt="">
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input common_selector license" type="radio" name="License" id="License1" value=" " checked>
                    <label class="form-check-label" for="License1">
                        All
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input common_selector license" type="radio" name="License" id="License2" value="free">
                    <label class="form-check-label" for="License2">
                        Free
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input common_selector license" type="radio" name="License" id="License3" value="premium">
                    <label class="form-check-label" for="License3">
                        Premium
                    </label>
                </div>
            </div>

           

            <div id="filter_category4" class="filter_category">
                <div onclick="UnfoldFilter('filter_category4', 'filter_arrow4')" class="filter_fold">
                    <div>
                        <h6>I/O-x-Ops's Choice</h6>
                    </div>
                    <div>
                        <img id="filter_arrow4" height="10" style="transform: rotate(90deg);height:10px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/play.png';?>"
                            alt="">
                    </div>
                </div>
<!-- 
                <input type="checkbox" class="checkiox  common_selector favourite" name="i/ochoice" value="faviox">
                <label for="">See our favorites</label> -->
				<div class="form-check">
                    <input class="form-check-input common_selector favourite" type="radio" name="favourite" id="favourite1" value=" " checked>
                    <label class="form-check-label" for="favourite1">
                        All
                    </label>
                </div>
				<div class="form-check">
                    <input class="form-check-input common_selector favourite" type="radio" name="favourite" id="favourite2" value="faviox" >
                    <label class="form-check-label" for="favourite2">
                        See our favorites
                    </label>
                </div>
				
            </div>


            <div id="filter_category6" class="filter_color">
                <div onclick="UnfoldFilter('filter_category6', 'filter_arrow6')" class="filter_fold">
                    <div>
                        <h6>Color</h6>
                    </div>
                    <div>
                        <img id="filter_arrow6" height="10" style="transform: rotate(90deg);height:10px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/play.png';?>"
                            alt="">
                    </div>
                </div>
				<div class="iox-color">
				<label>
                    <input type="radio" name="color" class="common_selector coloor" value=" ">
                    <div class="layer"></div>
                    <div class="button"><span style="background:grayscale;"></span></div>
                </label>
				<?php	
					$taxtags = 'ioxops_tag';
					$terms = get_terms( $taxtags );
					foreach ( $terms as $term ) {
				?>
                <label>
                    <input type="radio" name="color" class="common_selector coloor" value="<?php echo $term->term_id ; ?>">
                    <div class="layer"></div>
                    <div class="button"><span style="background:<?php echo $term->slug; ?>"></span></div>
                </label>
				<?php } ?>
				</div>
            </div>

            <div id="filter_category7" class="filter_category">
                <div onclick="UnfoldFilter('filter_category7', 'filter_arrow7')" class="filter_fold">
                    <div>
                        <h6>Orientation</h6>
                    </div>
                    <div>
                        <img id="filter_arrow7" height="10" style="transform: rotate(90deg);height:10px;" src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/play.png';?>"
                            alt="">
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input common_selector oriend" type="radio" name="Orientation" id="orientation1" value=" " checked>
                    <label class="form-check-label" for="orientation1">
                        All
                    </label>
                </div>
				<?php
							   $ori_args = array(
										   'taxonomy' => 'ioxops_orientation',
										   'orderby' => 'name',
										   'order'   => 'ASC'
									   );

							   $ori_cats = get_categories($ori_args);

							   foreach($ori_cats as $ori_cat) {
							?>
                <div class="form-check">
                    <input class="form-check-input common_selector oriend" type="radio" name="Orientation" id="orientation<?php echo $ori_cat->term_id; ?>" value="<?php echo $ori_cat->term_id; ?> ">
                    <label class="form-check-label" for="orientation<?php echo $ori_cat->term_id; ?>">
                       <?php echo $ori_cat->name; ?>
                    </label>
                </div>
				<?php } ?>
                
				 <div class="form-check">
					 
				</div>
				<br>
            </div>
        </div>
    </div>

    <div id="body_content" class="body_content">

        
		<?php
					                $download_args = array(
					                 'post_type' => 'ioxops_download',
					                 'orderby'    => 'menu_order',
					                 'order' => 'DESC',
					                 'numberposts'=> -1
					                 
					                );
					               $downloads = get_posts($download_args);
								   $count = count($downloads);

		?>
				<input type='hidden' id='current_page' />
				<input type='hidden' id='show_per_page' />		              
        <div style="padding: 15px;" id="outputdata">
            <label for=""><?php echo $count; ?> Resourses</label>

        <div id="body_content_images" class="body_content_images product-grid">
			<?php 
					 foreach ($downloads as $download) {
						 	$feat_image = wp_get_attachment_url(get_post_thumbnail_id($download->ID));
							$authid = $download->post_author;
						 	$download_image=	get_post_meta( $download->ID, '_uplogo', true );
							$download_link=	get_post_meta( $download->ID, '_title_link', true );
							$files=isset($download_image)?$download_image:$download_link;
						 	$taxname = get_the_terms( $download->ID, 'ioxops_download_categories' );
						 	$license= get_post_meta( $download->ID, 'disp_in_hme', true );
						 	$fav= get_post_meta( $download->ID, 'disp_in_sb', true );
			?>
            <div data-bs-toggle="modal" data-bs-target="#ImageViewModal" id="body_content_images_div"
                class="body_content_images_div all <?php foreach ( $taxname as $tax ) {
    echo  $tax->slug.' '; 
} ?> <?php echo $license;?> <?php echo $fav;?>">
                <img id="content_images" class="content_images" src="<?php echo $feat_image;?>" alt="">
                <div class="images_hover">
					<div class="iox-hover">
						<img src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/search.png';?>" alt="">
					</div>
                    <label for="" style="text-transform: capitalize;"><?php the_author_meta( 'user_nicename' , $authid ); ?> </label>
                    <a href="<?php echo $files;?>" download target="_blank"><img src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/icons8-download-48.png';?>" alt=""></a>
                </div>
            </div>
			<?php } ?>
        </div>
        </div>
        
    </div>
<?php
return ob_get_clean();
}

add_action('admin_menu', 'ioxops_download_options_order');
//   Category Meta Box for Product
function ioxops_download_options_order() {
    add_meta_box('ioxops_download_options_order', 'Show in home Options', 'ioxops_download_metabox_add_media', 'ioxops_download');
}
add_action('ioxops_download_categories_edit_form_fields', 'ioxops_download_metabox_edit_media', 10, 1);

function ioxops_download_metabox_edit_media($tag) {
    $term_order = get_term_meta($_REQUEST['tag_ID'], 'p_order', true);
?>
        <table class="form-table">
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="cat_order">Enable Display Options</label>
                </th>
                <td>
                    <input type="checkbox" name="p_order" id="p_order"  style="" value="1" <?php if($term_order == 1){ echo 'checked="checked"'; }?> />
                </td>
            </tr>
        </table>
<?php } 

add_action('created_ioxops_download_categories', 'save_ioxops_download_product', 10, 1);
add_action('edited_ioxops_download_categories', 'save_ioxops_download_meta_data_product', 10, 1);
function save_ioxops_download_product($term_id) {
    if (isset($_REQUEST['p_order'])) {
        update_term_meta($term_id, 'p_order', $_REQUEST['p_order']);
    }
}
function save_ioxops_download_meta_data_product($term_id) {

    update_term_meta($term_id, 'p_order', $_REQUEST['p_order']);
}