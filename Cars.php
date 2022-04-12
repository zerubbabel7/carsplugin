<?php
/*
Plugin Name: Cars
Description: This is my custom post type assignement 
Author: Derrick Zerubbabel
Version:1.0.0
*/

function cptui_register_my_cpts() {

	/**
	 * Post Type: portfolio.
	 */

	$labels = [
		"name" => __( "portfolio", "astra" ),
		"singular_name" => __( "portfolio", "astra" ),
		"add_new" => __( "add new portifolly", "astra" ),
		"add_new_item" => __( "add new portifolly", "astra" ),
	];

	$args = [
		"label" => __( "portfolio", "astra" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "portifolio", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-car",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "portifolio", $args );

	/**
	 * Post Type: car.
	 */

	$labels = [
		"name" => __( "car", "astra" ),
		"singular_name" => __( "car", "astra" ),
		"add_new" => __( "Add a car", "astra" ),
	];

	$args = [
		"label" => __( "car", "astra" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "car", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "car", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_portifolio() {

	/**
	 * Post Type: portfolio.
	 */

	$labels = [
		"name" => __( "portfolio", "astra" ),
		"singular_name" => __( "portfolio", "astra" ),
		"add_new" => __( "add new portifolly", "astra" ),
		"add_new_item" => __( "add new portifolly", "astra" ),
	];

	$args = [
		"label" => __( "portfolio", "astra" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "portifolio", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-car",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "portifolio", $args );
}

add_action( 'init', 'cptui_register_my_cpts_portifolio' );


function cptui_register_my_cpts_car() {

	/**
	 * Post Type: car.
	 */

	$labels = [
		"name" => __( "car", "astra" ),
		"singular_name" => __( "car", "astra" ),
		"add_new" => __( "Add a car", "astra" ),
	];

	$args = [
		"label" => __( "car", "astra" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "car", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "car", $args );
}

add_action( 'init', 'cptui_register_my_cpts_car' );

function wporg_add_custom_box() {
    $screens = [ 'post', 'car' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'wporg_box_id',                 // Unique ID
            'Choose your car model and color',      // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen,
                                    // Post type
        );
    }
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

function wporg_custom_box_html( $post ) {
//display posted data
    //echo '<pre>';print_r($post); echo '</pre>';
    //$value= get_post_meta($post->ID,'wporg_field',true);

    ?>
    <label for="wporg_field">Choose your model</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Hatch Back</option>
        <option value="something">SUV</option>
        <option value="else">SEDAN</option>
    </select>

    <label for="wporg_field">Choose your car color</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">White</option>
        <option value="something">Silver</option>
        <option value="else">Black</option>
    </select>
    <?php
}
//save capture data
function wporg_save_postdata( $post_id ) {
    if ( array_key_exists( 'wporg_field', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }
}
add_action( 'save_post', 'wporg_save_postdata' );





?>