<?php
/*
  Plugin Name: Sztory
  Plugin URI: http://sztory.com
  Description: A plugin for sztorytelling
  Version: 0.0.1
  Author: Sztory
  Author URI: http://sztory.com
  License: Copyright 2014 Csongor Bartus
*/



// Registering Custom Post Types
// - http://www.smashingmagazine.com/2012/11/08/complete-guide-custom-post-types/

// Atoms
function my_custom_post_type_atoms() {
  $labels = array(
    'name'               => _x( 'Atoms', 'post type general name' ),
    'singular_name'      => _x( 'Atom', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Atom' ),
    'edit_item'          => __( 'Edit Atom' ),
    'new_item'           => __( 'New Atom' ),
    'all_items'          => __( 'All Atoms' ),
    'view_item'          => __( 'View Atom' ),
    'search_items'       => __( 'Search Atoms' ),
    'not_found'          => __( 'No Atoms found' ),
    'not_found_in_trash' => __( 'No Atoms found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Atoms'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'The basic building blocks of a story',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'excerpt' ),
    'has_archive'   => true,
    'rewrite' => array('slug' => 'atoms'),
  );
  register_post_type( 'atom', $args ); 
}
add_action( 'init', 'my_custom_post_type_atoms' );




// Meta boxes for Atoms
// Value
function atom_value() {
  add_meta_box( 
    'atom_value',
    __( 'Value', 'myplugin_textdomain' ),
    'atom_value_box_content',
    'atom',
    'normal',
    'high'
  );
}
add_action( 'add_meta_boxes', 'atom_value' );

// Displaying the Value
function atom_value_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'atom_value_content_nonce' );
  echo '<label for="atom_value"></label>';
  
  $value = get_post_meta( $post->ID, 'atom_value', true );
  echo '<input type="text" id="atom_value" name="atom_value" placeholder="' . $value . '" />';
}

// Handling the form for value
function atom_value_save( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['atom_value_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $atom_value = $_POST['atom_value'];
  update_post_meta( $post_id, 'atom_value', $atom_value );
}
add_action( 'save_post', 'atom_value_save' );






// Categories for Atoms
function my_taxonomies_atom() {
  $labels = array(
    'name'              => _x( 'Atom Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Atom Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Atom Categories' ),
    'all_items'         => __( 'All Atom Categories' ),
    'parent_item'       => __( 'Parent Atom Category' ),
    'parent_item_colon' => __( 'Parent Atom Category:' ),
    'edit_item'         => __( 'Edit Atom Category' ), 
    'update_item'       => __( 'Update Atom Category' ),
    'add_new_item'      => __( 'Add New Atom Category' ),
    'new_item_name'     => __( 'New Atom Category' ),
    'menu_name'         => __( 'Atom Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'atom_category', 'atom', $args );
}
add_action( 'init', 'my_taxonomies_atom', 0 );



// Status messages
function my_updated_status_messages_for_atoms( $messages ) {
  global $post, $post_ID;
  $messages['atom'] = array(
    0 => '', 
    1 => sprintf( __('Atom updated. <a href="%s">View Atom</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Product updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Atom restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Atom published. <a href="%s">View Atom</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Product saved.'),
    8 => sprintf( __('Atom submitted. <a target="_blank" href="%s">Preview Atom</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Atom scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Atom</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Atom draft updated. <a target="_blank" href="%s">Preview Atom</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_status_messages_for_atoms' );

?>
