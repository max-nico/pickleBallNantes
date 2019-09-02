<?php
/**
** activation theme
**/
/* FIXME: is fixed ! Add child stylesheet add your stylesheet in this function TODO: MaxNico 04/05/2019 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 wp_enqueue_style('childbbpress', get_stylesheet_directory_uri() . '/css/childbbpress.css', array('parent-style')); 
 wp_enqueue_style('childtheme-style', get_stylesheet_directory_uri() . '/css/childtheme-style.css', array('parent-style')); 
 wp_enqueue_style('childresponsive', get_stylesheet_directory_uri() . '/css/childresponsive.css', array('parent-style')); 
 wp_enqueue_script('general', get_stylesheet_directory_uri() . '/assets/js/general.js');
}

/*------------------------------------------------------------------------------------*/
/*Mon Menu pickleball*/
/*------------------------------------------------------------------------------------*/

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'Menu PickleBall' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function add_classes_on_li($classes, $item, $args)
{
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);
  

/* FIXME: is fixed ! ADD editor post in BBPRESS TODO:Nico 04/05/2019 */
function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['media_buttons'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

function rk_bbp_topic_stats() {
  $stats = bbp_get_statistics();
  echo "<dl role='main'><dt>Topics</dt><dd><strong>";
  echo esc_html( $stats['topic_count'] );
  echo "</strong></dd></dl>";
}

add_shortcode('bbp-topic-stats', 'rk_bbp_topic_stats'); 

function my_custom_ids( $field_name, $field_value = '' ) {
  
  if ( empty( $field_name ) )
    return '';
  
  global $wpdb;
  
  $field_id = xprofile_get_field_id_from_name( $field_name ); 
 
  if ( !empty( $field_id ) ) 
    $query = "SELECT user_id FROM " . $wpdb->prefix . "bp_xprofile_data WHERE field_id = " . $field_id;
  else
   return '';
  
  if ( $field_value != '' ) 
    $query .= " AND value LIKE '%" . $field_value . "%'";
      /* 
      LIKE is slow. If you're sure the value has not been serialized, you can do this:
      $query .= " AND value = '" . $field_value . "'";
      */
  
  $custom_ids = $wpdb->get_col( $query );
  
  if ( !empty( $custom_ids ) ) {
    // convert the array to a csv string
    $custom_ids_str = 'include=' . implode(",", $custom_ids);
    return $custom_ids_str;
  }
  else
   return '';
   
}