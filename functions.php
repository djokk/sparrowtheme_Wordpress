<?php
    
add_action('wp_enqueue_scripts', 'themeStyle');
add_action('wp_enqueue_scripts', 'themeScripts');
add_action('after_setup_theme', 'themeCustom');
add_action('widgets_init', 'themeWidgets');


function themeStyle(){
  wp_enqueue_style('default',       get_template_directory_uri() . '/css/default.css');
  wp_enqueue_style('layout',        get_template_directory_uri() . '/css/layout.css');
  wp_enqueue_style('media-queries', get_template_directory_uri() . '/css/media-queries.css');
  wp_enqueue_style('style',         get_template_directory_uri() . '/style.css');
}

function themeScripts(){
  wp_deregister_script('jquery');
  wp_register_script('jquery',       get_template_directory_uri() . '/js/jquery-1.10.2.min.js', '', false, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr',     get_template_directory_uri() . '/js/modernizr.js');
  wp_enqueue_script('migrate',       get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', '', false, true);
  wp_enqueue_script('flexslider',    get_template_directory_uri() . '/js/jquery.flexslider.js', '', false, true);
  wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/js/doubletaptogo.js', '', false, true);
  wp_enqueue_script('init',          get_template_directory_uri() . '/js/init.js', '', false, true);
}

function themeCustom(){
  add_theme_support('post-thumbnails', ['post', 'slider', 'portfolio', 'team']);
  add_theme_support('custom-logo');
  register_nav_menus([
    'top_menu' => 'Верхнее меню',
    'bottom_menu' => 'Нижнее меню'
  ]);
}


function themeWidgets(){
	register_sidebar( array(
		'name'          => 'Сайдбар',
		'id'            => "sidebar",
		'description'   => 'Любое описание',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5>',
		'after_title'   => "</h5>\n",
	) );
	register_sidebar( array(
		'name'          => 'Сайдбар About',
		'id'            => "sidebar-about",
		'description'   => 'Любое описание',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5>',
		'after_title'   => "</h5>\n",
	) );
	register_sidebar( array(
		'name'          => 'Панель текстовых виджетов на главной',
		'id'            => "text_widgets",
		'description'   => 'Любое описание',
		'before_widget' => '<div class="columns">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2>',
		'after_title'   => "</h2>\n",
	) );
	register_sidebar( array(
		'name'          => 'Соц иконки в футере',
		'id'            => "social",
		'description'   => 'Любое описание',
		'before_widget' => '<ul class="footer-social">',
		'after_widget'  => "</ul>\n",
	) );
	register_sidebar( array(
		'name'          => 'Контактная форма',
		'id'            => "contact-form",
		'description'   => 'Любое описание',
		'before_widget' => false,
		'after_widget'  => false,
	) );
}


add_filter( 'excerpt_length', function(){
	return 50;
} );

add_filter('excerpt_more', function($more) {
	return '';
});

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	global $post;
	return '<a class="more-link" href="'. get_permalink($post) . '"Read more... <i class="fa fa-arrow-circle-o-right"></i></a>';
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="col full navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

add_action( 'init', 'register_post' );
function register_post(){
	register_post_type( 'slider', [
		'label'  => null,
		'labels' => [
			'name'               => 'Слайдер', // основное название для типа записи
			'singular_name'      => 'Слайдер', // название для одной записи этого типа
			'add_new'            => 'Добавить Слайдер', // для добавления новой записи
			'add_new_item'       => 'Добавление Слайдера', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Слайдера', // для редактирования типа записи
			'new_item'           => 'Новый Слайдер', // текст новой записи
			'view_item'          => 'Смотреть Слайдер', // для просмотра записи этого типа.
			'search_items'       => 'Искать Слайдер', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Слайдер', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-video-alt3',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить Портфолио', // для добавления новой записи
			'add_new_item'       => 'Добавление Портфолио', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Портфолио', // для редактирования типа записи
			'new_item'           => 'Новый Портфолио', // текст новой записи
			'view_item'          => 'Смотреть Портфолио', // для просмотра записи этого типа.
			'search_items'       => 'Искать Портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-list-view',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'team', [
		'label'  => null,
		'labels' => [
			'name'               => 'Команда', // основное название для типа записи
			'singular_name'      => 'Команда', // название для одной записи этого типа
			'add_new'            => 'Добавить Команду', // для добавления новой записи
			'add_new_item'       => 'Добавление Команды', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Команды', // для редактирования типа записи
			'new_item'           => 'Новая Команда', // текст новой записи
			'view_item'          => 'Смотреть Команду', // для просмотра записи этого типа.
			'search_items'       => 'Искать Команду', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Команда', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-admin-users',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}
