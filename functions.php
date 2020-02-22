<?php

// enqueue styles and scripts
function wptask_styles_scripts() {
	// enqueue styles
	wp_enqueue_style( 'wptask-ff-css', get_theme_file_uri( '/assets/css/font-faces.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-bs-css', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-animate-css', get_theme_file_uri( '/assets/css/animate.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-classy-css', get_theme_file_uri( '/assets/css/default-assets/classy-nav.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-owl-css', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-magn-css', get_theme_file_uri( '/assets/css/magnific-popup.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-fa-css', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-style-css', get_theme_file_uri( '/assets/css/style.css' ), array(), '1.0' );
	wp_enqueue_style( 'wptask-main-css', get_theme_file_uri( '/assets/css/main.css' ), array(), '1.0' );
	// scripts
	wp_enqueue_script( 'wptask-popper-js', get_theme_file_uri( '/assets/js/popper.min.js' ), array('jquery'), '3.7.3', true );
	wp_enqueue_script( 'wptask-bs-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array('jquery'), '3.7.3', true );
	wp_enqueue_script( 'wptask-main-js', get_theme_file_uri( '/assets/js/uza.bundle.js' ), array(), '3.7.3', true );
	wp_enqueue_script( 'wptask-active-js', get_theme_file_uri( '/assets/js/default-assets/active.js' ), array(), '3.7.3', true );
}
add_action( 'wp_enqueue_scripts', 'wptask_styles_scripts' );

// add menu support
register_nav_menus( array(
	'top'    => __( 'Top Menu', 'wptask' ),
	'footer_links'    => __( 'Footer Links', 'wptask' ),
	'footer_resources'    => __( 'Footer Resources', 'wptask' ),
) );

// add post thumbnail support
add_theme_support('post-thumbnails');

// add widgets
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Меню Links в футере',
		'id'            => "sidebar-footer-1",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );
	register_sidebar( array(
		'name'          => 'Меню Resources в футере',
		'id'            => "sidebar-footer-2",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );
	register_sidebar( array(
		'name'          => 'Contact Us в футере',
		'id'            => "sidebar-footer-3",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );
	register_sidebar( array(
		'name'          => 'About Us в футере',
		'id'            => "sidebar-footer-4",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );
}
// register custom post types
add_action( 'init', 'child_custom_post_types' );
function child_custom_post_types() {
  // custom post type portfolio
  register_post_type( 'portfolio',
    array(
	'has_archive' => true,
		'labels' => array(
        'name' => 'Портфолио',
		'singular_name' => 'Портфолио',
		'add_new' => 'Добавить портфолио', 
		'add_new_item' => 'Добавить новое портфолио',
		'new_item' => 'Новое портфолио',
		'all_items' => 'Все портфолио',
		'edit_item' => 'Редактировать портфолио',
	),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
	'menu_icon' => 'dashicons-video-alt3',
	'menu_position' => 5 
    )
  );
}
// register taxonomies
function add_new_taxonomies(){
register_taxonomy('design',
		array('portfolio'), // cpt portfolio
		array(
			'hierarchical' => true, // разрешить вложенность
			'labels' => array(
				'name' => 'UX/UI Design',
				'singular_name' => 'UX/UI Design',
				'all_items' => 'Все UX/UI Design',
				'edit_item' => 'Редактировать', 
				'add_new_item' => 'Добавить UX/UI Design работу',
				'menu_name' => 'UX/UI Design'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
			'rewrite' => array(
				'slug' => 'design', // ярлык
				'hierarchical' => true // разрешить вложенность
 
			),
		)
	);
register_taxonomy('market_analytics',
		array('portfolio'), // cpt portfolio
		array(
			'hierarchical' => true, // разрешить вложенность
			'labels' => array(
				'name' => 'Market Analytics',
				'singular_name' => 'Market Analytics',
				'all_items' => 'Все Market Analytics',
				'edit_item' => 'Редактировать', 
				'add_new_item' => 'Добавить Market Analytics работу',
				'menu_name' => 'Market Analytics'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
			'rewrite' => array(
				'slug' => 'market_analytics', // ярлык
				'hierarchical' => true // разрешить вложенность
 
			),
		)
	);
register_taxonomy('marketing_social',
		array('portfolio'), // cpt portfolio
		array(
			'hierarchical' => true, // разрешить вложенность
			'labels' => array(
				'name' => 'Marketing Social',
				'singular_name' => 'Marketing Social',
				'all_items' => 'Все Marketing Social',
				'edit_item' => 'Редактировать', 
				'add_new_item' => 'Добавить Marketing Social работу',
				'menu_name' => 'Marketing Social'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
			'rewrite' => array(
				'slug' => 'marketing_social', // ярлык
				'hierarchical' => true // разрешить вложенность
 
			),
		)
	);
}
add_action( 'init', 'add_new_taxonomies', 0 );


