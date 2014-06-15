<?php
/*
Plugin Name: WP Document selector
Plugin URI:
Description:
Author: YAT
Version: 0.1
Author URI: http://wp.yat-net.com
*/

function selectorjs_read(){
	wp_enqueue_style('selector',plugins_url() . '/wp-document-selector/js/selector.css',false,'screen');
	wp_enqueue_script('selector',plugins_url() . '/wp-document-selector/js/selector.js',false);
}

if(! is_admin()){
  add_action('wp_print_scripts','selectorjs_read');
}

/*------------Custom field----------------*/

function add_itemlist_box() {
  add_meta_box('meta_info', 'selector_list', 'meta_summary_form', 'post', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_itemlist_box');
 
//metabox content
function meta_summary_form() {
	global $post;
	wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');
?>
	<div id="meta_info">
		<p><label>selector_list<br />
		<input type="text" name="meta_summary" value="<?php echo esc_html(get_post_meta($post->ID, 'meta_summary', false)); ?>"  style="width:80%" />
		<input type="text" name="meta_summary" value="<?php echo esc_html(get_post_meta($post->ID, 'meta_summary', false)); ?>"  style="width:80%" />
		<input type="text" name="meta_summary" value="<?php echo esc_html(get_post_meta($post->ID, 'meta_summary', false)); ?>"  style="width:80%" />
		</label></p>
	</div>
<?php
}

//Custom field data Update
function summary_save($post_id) {
  global $post;
  $my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;
  if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {
  	//セキュリティチェック。
    return $post_id;
  }
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
  if(!current_user_can('edit_post', $post->ID)) { return $post_id; }//
  if($_POST['post_type'] == 'post'){  
    update_post_meta($post->ID, 'meta_summary', $_POST['meta_summary']);
    update_post_meta($post->ID, 'meta_summary', $_POST['meta_summary']);
    update_post_meta($post->ID, 'meta_summary', $_POST['meta_summary']);
  }
  if($_POST['post_type'] == 'page'){  
    update_post_meta($post->ID, 'meta_summary', $_POST['meta_summary']);
    update_post_meta($post->ID, 'meta_summary', $_POST['meta_summary']);
    update_post_meta($post->ID, 'meta_summary', $_POST['meta_summary']);
  }
}
add_action('save_post', 'summary_save');

//display
function itemlist_disp($post_id){
	global $post;
	echo get_post_meta($post->ID,'meta_summary', $_POST['meta_summary']);
}

/*------------/カスタムフィールド----------------*/

?>