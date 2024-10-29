<?php if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('APG_Post_type')){


  class APG_Post_type {


    function __construct(){

      add_action( 'init', array( $this , 'create_post_type' ) );

    }





    function create_post_type() {

      $labels = array(
		'name'                  => _x( 'Albums', 'Post Type General Name', 'aswin-photo-gallery' ),
		'singular_name'         => _x( 'Album', 'Post Type Singular Name', 'aswin-photo-gallery' ),
		'menu_name'             => __( 'Albums', 'aswin-photo-gallery' ),
		'name_admin_bar'        => __( 'Albums', 'aswin-photo-gallery' ),
		'archives'              => __( 'Album Archives', 'aswin-photo-gallery' ),
		'attributes'            => __( 'Album Attributes', 'aswin-photo-gallery' ),
		'parent_item_colon'     => __( 'Parent Album:', 'aswin-photo-gallery' ),
		'all_items'             => __( 'All Albums', 'aswin-photo-gallery' ),
		'add_new_item'          => __( 'Add Album', 'aswin-photo-gallery' ),
		'add_new'               => __( 'Add Album', 'aswin-photo-gallery' ),
		'new_item'              => __( 'New Album', 'aswin-photo-gallery' ),
		'edit_item'             => __( 'Edit Album', 'aswin-photo-gallery' ),
		'update_item'           => __( 'Update Album', 'aswin-photo-gallery' ),
		'view_item'             => __( 'View Album', 'aswin-photo-gallery' ),
		'view_items'            => __( 'View Albums', 'aswin-photo-gallery' ),
		'search_items'          => __( 'Search Album', 'aswin-photo-gallery' ),
		'not_found'             => __( 'Not found', 'aswin-photo-gallery' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'aswin-photo-gallery' ),
		'featured_image'        => __( 'Album Cover Image', 'aswin-photo-gallery' ),
		'set_featured_image'    => __( 'Set Album Cover image', 'aswin-photo-gallery' ),
		'remove_featured_image' => __( 'Remove Album Cover image', 'aswin-photo-gallery' ),
		'use_featured_image'    => __( 'Use as Album Cover image', 'aswin-photo-gallery' ),
		'insert_into_item'      => __( 'Insert into Photo Album', 'aswin-photo-gallery' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'aswin-photo-gallery' ),
		'items_list'            => __( 'Items list', 'aswin-photo-gallery' ),
		'items_list_navigation' => __( 'Items list navigation', 'aswin-photo-gallery' ),
		'filter_items_list'     => __( 'Filter items list', 'aswin-photo-gallery' ),
	);
	$rewrite = array(
		'slug'                  => 'photo-album',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Album', 'aswin-photo-gallery' ),
		'description'           => __( 'Custom post type for aswin photo gallery plugin', 'aswin-photo-gallery' ),
		'labels'                => $labels,
		'supports'              => array( 'title','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'photo-album',
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'query_var'             => 'apg',
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'apg', $args );



    }

  }
}
