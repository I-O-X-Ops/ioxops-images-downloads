<?php
global $_POST;
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0].'wp-load.php';
$category = sanitize_text_field($_POST['category']);
$license = sanitize_text_field($_POST['license']);
$oriend  = sanitize_text_field($_POST['oriend']);
$color  = sanitize_text_field($_POST['color']);
$keyword  = sanitize_text_field($_POST['keyword']);
$favourite  = sanitize_text_field($_POST['favourite']);


if(empty($category) && empty($license) && empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
							's' => $keyword,
					        'orderby'    => 'menu_order',
					        'order' => 'DESC',
					        'numberposts'=> -1,
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(!empty($category) && empty($license) && empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
					        'orderby'    => 'menu_order',
							's' => $keyword,
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'tax_query' => array(
                                        array(
                                            'taxonomy' =>'ioxops_download_categories',
                                            'field' => 'term_id',
                                            'terms' => $category ),
										 
                                    ),
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(empty($category) && !empty($license) && empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
							's' => $keyword,
					        'orderby'    => 'menu_order',
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'meta_query' => array(
                                array(
                                'key' => 'disp_in_hme',
                                'value' => $license,
                                'compare' => '=='
                                    )
                                ),
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(!empty($category) && empty($license) && !empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
							's' => $keyword,
					        'orderby'    => 'menu_order',
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'tax_query' => array(
                                        array(
                                            'taxonomy' =>'ioxops_download_categories',
                                            'field' => 'term_id',
                                            'terms' => $category ),
										 array(
                                            'taxonomy' =>'ioxops_orientation',
                                            'field' => 'term_id',
                                            'terms' => $oriend ),
										 
                                    ),
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(!empty($category) && !empty($license) && empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
							's' => $keyword,
					        'orderby'    => 'menu_order',
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'tax_query' => array(
                                        array(
                                            'taxonomy' =>'ioxops_download_categories',
                                            'field' => 'term_id',
                                            'terms' => $category ),
										 
                                    ),
							'meta_query' => array(
                                        array(
                                        'key' => 'disp_in_hme',
                                        'value' => $license,
                                        'compare' => '=='
                                            )
                                   	 ),
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(empty($category) && !empty($license) && !empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
					        'orderby'    => 'menu_order',
							's' => $keyword,
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'tax_query' => array(                        
                                 array(
                                    'taxonomy' =>'ioxops_orientation',
                                    'field' => 'term_id',
                                    'terms' => $oriend ),
                                 
                            ),
                            'meta_query' => array(
                                array(
                                'key' => 'disp_in_hme',
                                'value' => $license,
                                'compare' => '=='
                                    )
                                ),
							
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(empty($category) && empty($license) && !empty($oriend)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
					        'orderby'    => 'menu_order',
							's' => $keyword,
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'tax_query' => array(

										 array(
                                            'taxonomy' =>'ioxops_orientation',
                                            'field' => 'term_id',
                                            'terms' => $oriend ),
										 
                                    ),
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}elseif(!empty($color)){
	$download_args = array(
					        'post_type' => 'ioxops_download',
					        'orderby'    => 'menu_order',
							's' => $keyword,
					        'order' => 'DESC',
					        'numberposts'=> -1,
							'tax_query' => array(
										 array(
                                            'taxonomy' =>'ioxops_tag',
                                            'field' => 'term_id',
                                            'terms' => $color ),
										 
                                    ),
						);
					$downloads = get_posts($download_args);
					$count = count($downloads);
}else{				
						$download_args = array(
					                 'post_type' => 'ioxops_download',
					                 'orderby'    => 'menu_order',
							         's' => $keyword,
					                 'order' => 'DESC',
					                 'numberposts'=> -1,
									 'meta_query' => array(
                                        array(
                                        'key' => 'disp_in_hme',
                                        'value' => $license,
                                        'compare' => '=='
                                            )
                                   	 ),
									 'tax_query' => array(
                                        array(
                                            'taxonomy' =>'ioxops_download_categories',
                                            'field' => 'term_id',
                                            'terms' => $category ),
										 array(
                                            'taxonomy' =>'ioxops_orientation',
                                            'field' => 'term_id',
                                            'terms' => $oriend ),
										 array(
                                            'taxonomy' =>'ioxops_tag',
                                            'field' => 'term_id',
                                            'terms' => $color ),
										 
                                    ),
								
					                 
					                );
					               $downloads = get_posts($download_args);
								   $count = count($downloads);
	 }

$cat_name = get_term( $category )->name;
//$lic_name = get_term( $license )->name;
$ori_name = get_term( $oriend )->name;
$color_name = get_term( $color )->name;

?>
<label for=""><?php echo $count; ?> Resourses</label>
<div class="tag-section">
	<?php if(!empty($category)){?>
	<span class="tagName"><?php echo $cat_name; ?></span>
	<?php } ?>
	<?php if(!empty($license)){?>
	<span class="tagName"><?php echo $license; ?></span>
	<?php } ?>
	<?php if(!empty($oriend)){?>
	<span class="tagName"><?php echo $ori_name; ?></span>
	<?php } ?>
	<?php if(!empty($color)){?>
	<span class="tagName"><?php echo $color_name; ?></span>
	<?php } ?>

</div>			
       <div id="body_content_images" class="body_content_images product-grid">
<?php foreach ($downloads as $download) {
						 	$feat_image = wp_get_attachment_url(get_post_thumbnail_id($download->ID));
							$authid = $download->post_author;
						 	$download_image=	get_post_meta( $download->ID, '_uplogo', true );
							$download_link=	get_post_meta( $download->ID, '_title_link', true );
							$files=isset($download_image)?$download_image:$download_link;
						 	$taxname = get_the_terms( $download->ID, 'ioxops_download_categories' );
						 	$license= get_post_meta( $download->ID, 'disp_in_hme', true );
						 	$fav= get_post_meta( $download->ID, 'disp_in_sb', true );
?>
 <div id="body_content_images_div"
                class="body_content_images_div blogBox moreBox">
                <img id="content_images" class="content_images" src="<?php echo $feat_image;?>" alt="">
                <div class="images_hover">
					<div class="iox-hover" data-bs-toggle="modal" data-bs-target="#ImageViewModal<?php echo $download->ID;?>" >
						<img src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/view-pop.png';?>" alt="">
					</div>
                    <label for="" style="text-transform: capitalize;"><?php the_author_meta( 'user_nicename' , $authid ); ?> </label>
                    <a href="<?php echo $files;?>" download target="_blank"><img src="<?php echo IOXOPSDOWN_PLUGIN_URL . 'core/includes/assets/img/icons8-download-48.png';?>" alt=""></a>
                </div>
            </div>
			
<?php } ?>
</div>

<?php foreach ($downloads as $download) {
						 	$feat_image = wp_get_attachment_url(get_post_thumbnail_id($download->ID));
							$authid = $download->post_author;
						 	$download_image=	get_post_meta( $download->ID, '_uplogo', true );
							$download_link=	get_post_meta( $download->ID, '_title_link', true );
							$files=isset($download_image)?$download_image:$download_link;
						 	$taxname = get_the_terms( $download->ID, 'ioxops_download_categories' );
						 	$license= get_post_meta( $download->ID, 'disp_in_hme', true );
						 	$fav= get_post_meta( $download->ID, 'disp_in_sb', true );
?>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="ImageViewModal<?php echo $download->ID;?>" tabindex="-1" aria-labelledby="ImageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content iox-popup">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ImageModalLabel<?php echo $download->ID;?>"><?php echo $download->post_title;?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="image_model_content">

                            <div class="model_content_image">
                                <div class="model_content_image_inner">
                                    <img src="<?php echo $feat_image;?>" alt="">
                                </div>
                            </div>

                            <div class="model_content_description">
                                <a href="<?php echo $files;?>">Download</a>
								
                                <div style="margin-top: 30px;">
                                    <h5>Description</h5>
                                    <p><?php echo apply_filters('the_content', $download->post_content); ?></p>
                                </div>
                                <label style="font-weight: 500; padding-bottom: 50px;"> <strong>Author:</strong> <?php the_author_meta( 'user_nicename' , $authid ); ?></label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>