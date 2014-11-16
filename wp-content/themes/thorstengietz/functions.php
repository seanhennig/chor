<?php
/**
 * functions and definitions for the thorstengietz theme
 *
 * author: Sean Hennig
 * contact: sean.hennig@gmx.net
 * url: http://www.sean-hennig.de
 * date: 2014/11/16
 **/

function custom_theme_setup() {
	/**
	 * This theme styles the visual editor with editor-style.css to match the theme style.
	 **/
	add_editor_style();

	/**
	* Enable support for Post Thumbnails on posts and pages.
	**/
	add_theme_support( 'post-thumbnails' );

	/**
	* This theme uses wp_nav_menu() in one location.
	**/
	register_nav_menu( 'primary', __( 'Primary Menu', 'thorstengietz' ) );
	
	/**
	* Enable support for HTML5 markup.
	* We need it mostly for toggle search
	**/
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
	
	/**
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 **/
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
	
	
}

add_action( 'after_setup_theme', 'custom_theme_setup' );

// add_filter('show_admin_bar', '__return_false');
?>