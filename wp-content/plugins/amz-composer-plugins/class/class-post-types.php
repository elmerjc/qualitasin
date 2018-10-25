<?php

/* Custom Post Type Class */

class Amazee_Post_Type{
	
	public function __construct($name, $singluar_name, $args){
		$this -> register_post_type($name, $singluar_name, $args);	
	}	
	
	//Registering Post Types
	public function register_post_type($name, $singluar_name, $args){ 

		$args = array_merge(
			array(
				'labels' => array(
					'name' 			=> $name,
					'singular_name' => $singluar_name,
					'add_new'		=> "Add New $singluar_name",
					'add_new_item' 	=> "Add New $singluar_name",
					'edit_item' 	=> "Edit $singluar_name",
					'new_item' 		=> "New $singluar_name",
					'view_item' 	=> "View $singluar_name",
					'search_items' 	=> "Search $name",
					'not_found' 	=> "No $name found",
					'all_items' => "All $name",
					'not_found_in_trash' 	=> "No $name found in Trash", 
					'parent_item_colon' 	=> '',
					'menu_name' 	=>  $name
					),
				'public' 	=> true,
				'query_var' => strtolower($singluar_name),
				'hierarchical' => true,
				'rewrite' 	=> array(
					'slug' => $name
					),
				'menu_icon' =>	admin_url().'images/media-button-video.gif',		 
				'supports' 	=> array('title','editor')
				),
			$args  
			);

		register_post_type('pix_' . strtolower($name), $args);
	}
	
	//Taxonomies
	public function taxonomies($post_types, $tax_arr)
	{		
		$taxonomies = array();

		foreach ($tax_arr as $name => $arr){
			
			$singular_name = $arr['singular_name'];
			
			$labels = array(
				'name' => $name,
				'singular_name' => $singular_name,
				'add_new' => "Add New $singular_name",
				'add_new_item' => "Add New $singular_name",
				'edit_item' => "Edit $singular_name",
				'new_item' => "New $singular_name",
				'view_item' => "View $singular_name",
				'update_item' => "Update $singular_name",
				'search_items' => "Search $name",
				'not_found' => "$name Not Found",
				'not_found_trash' => "$name Not Found in Trash",
				'all_items' => "All $name",
				'separate_items_with_comments' => "Separate tags with commas"
				);

			$defaultArr = array(
				'hierarchical' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => strtolower( trim( $name ) ) ),
				'labels' => $labels	
				);
			
			$taxonomies[$name] =  array_merge($defaultArr, $arr);
			
		}
		
		$this -> register_all_taxonomies($post_types, $taxonomies);	
	}
	
	public function register_all_taxonomies($post_types, $taxonomies)
	{	
		foreach($taxonomies as $name => $arr){
			register_taxonomy('pix_'. str_replace(' ', '_',strtolower($name)), 'pix_' .strtolower($post_types), $arr);
		}
	}
}