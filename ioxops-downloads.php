<?php
/**
 * IOXOPS Downloads
 *
 * @package       IOXOPSDOWN
 * @author        Ioxops
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   IOXOPS Downloads
 * Plugin URI:    https://ioxops.tech/
 * Description:   This is some demo short description...
 * Version:       1.0.0
 * Author:        Ioxops
 * Author URI:    https://ioxops.tech/
 * Text Domain:   ioxops-downloads
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'IOXOPSDOWN_NAME',			'IOXOPS Downloads' );

// Plugin version
define( 'IOXOPSDOWN_VERSION',		'1.0.0' );

// Plugin Root File
define( 'IOXOPSDOWN_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'IOXOPSDOWN_PLUGIN_BASE',	plugin_basename( IOXOPSDOWN_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'IOXOPSDOWN_PLUGIN_DIR',	plugin_dir_path( IOXOPSDOWN_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'IOXOPSDOWN_PLUGIN_URL',	plugin_dir_url( IOXOPSDOWN_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once IOXOPSDOWN_PLUGIN_DIR . 'core/class-ioxops-downloads.php';

require_once IOXOPSDOWN_PLUGIN_DIR . 'lib/cpt-data.php';
require_once IOXOPSDOWN_PLUGIN_DIR . 'lib/functions.php';
require_once IOXOPSDOWN_PLUGIN_DIR . 'lib/meta-data.php';
require_once IOXOPSDOWN_PLUGIN_DIR . 'lib/shortcode.php';
/***********************
 *  Filter Functions
 ***********************/

function fetch_filter_data($content)
{  
$plugin_url = IOXOPSDOWN_PLUGIN_URL . '/ajax/fetch.php';
$search_url = IOXOPSDOWN_PLUGIN_URL . '/ajax/search.php';

?>
<!-- <script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> -->
<script>
	
	
jQuery(document).ready(function($) {
    
		filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
		// 		var valarr=$('.category[data-details="1"]').val();
		// 		console.log(valarr);
		var envvalue = $('input[name="category"]').filter(':checked').attr("data-details");
		// alert(pricevalue);
		
        var action = 'fetch_data';
		var templateUri = "<?php  echo $plugin_url; ?>";
        var category = get_filter('category');
        var license = get_filter('license');
        var oriend = get_filter('oriend');
        var color = get_filter('coloor');
		var keyword = $('#resultkey').val();
        //var storage = get_filter('color');
        $.ajax({
            url:templateUri,
            method:"POST",
            data:{action:action, category:category, license:license, oriend:oriend,color:color,keyword:keyword},
            success:function(data){
                $('#outputdata').html(data);
				

				if(envvalue==1){
					$( "#displayOptionBtn" ).trigger( "click" );
					$( "#displayOptionBtn" ).addClass( "display_option_highlight" );
				}else{
					$( "#displayOptionBtn" ).removeClass( "display_option_highlight" );
				}
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = "";
        $('.'+class_name+':checked').each(function(){
            filter = $(this).val();
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
	
   
  $("#keyword").change(function(){
        var action = 'search_data';
		var searchUri = "<?php  echo $search_url; ?>";
        var keyword = $('#keyword').val();

        $.ajax({
            url:searchUri,
            method:"POST",
            data:{action:action, keyword:keyword},
            success:function(data){
                $('#outputdata').html(data);
				$('#resultkey').val(keyword);
            }
        });
   });
});


</script>

<?php
}
add_action('wp_footer', 'fetch_filter_data', 1);

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Ioxops
 * @since   1.0.0
 * @return  object|Ioxops_Downloads
 */
function IOXOPSDOWN() {
	return Ioxops_Downloads::instance();
}

IOXOPSDOWN();