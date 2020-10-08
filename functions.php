<?php
function isn_get_index(){
    return get_index_template();
}



add_theme_support( 'customize-selective-refresh-widgets' );
function isn_widgets_init() {

    register_sidebar(
        array(
            'name'          => __( 'Widgets de traduction', 'isn' ),
            'id'            => 'sidebar-1',
            'description'   => __( '.', 'isn' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'isn_widgets_init' );
//menu//
register_nav_menu('main-menu', 'Le menu de navigation principal');
/*
function additional_custom_styles() {
    wp_enqueue_style( 'uniquestylesheetid', get_template_directory_uri() . 'assets/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );
*/
/*
function isn_get_form(){
    return do_shortcode('[contact-form-7 id="23" title="Contact form"]');
}
add_filter('wpcf7_form_elements', 'do_shortcode' );
add_action($title = 'contact', 'isn_get_form');*/

function isn_get_date(){
    $date = get_field('expo_date_at');
    $date2 = get_field('expo_date_end');
    $date = substr($date, 0, 5);
    $date2 = substr($date2, 0, 5);
    echo $date . ' - ' . $date2;
}

/**
 * Retrieves navigation objects (links) for given custom locaction
 *
 * @param string $location      The nav_menu location (main, social, ...)
 * @param string $baseClass     A CSS class to use for BEM syntax
 **/

function isn_get_menu($location, $baseClass) {
    global $post;

    $items = [];

    // On va remplir le tableau $items
    // 1. Récupérer la structure du menu WP pour $location
    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menu = wp_get_nav_menu_items($id);

    foreach($menu as $i => $object) {
        // 2. On va formater chaque lien récupérer en un objet qui contient :
        $item = new stdClass();
        //      - l'URL du lien
        $item->url = $object->url;
        //      - le label du lien
        $item->label = $object->title;
        //      - l'état "current" du lien
        $isTargettingHome = rtrim($object->url, '/') == rtrim(home_url(), '/');
        $item->current = (is_home() && $isTargettingHome) || ($object->object_id == $post->ID);
        //      - l'état "target" du lien
        $item->target = $object->target;
        //      - les éventuelles classes CSS
        $item->classes = array_map(function($item) use ($baseClass) {
            return $baseClass . '--' . $item;
        }, array_filter(array_merge([$item->current ? 'current' : null], $object->classes)));

        array_unshift($item->classes, $baseClass);

        $items[] = $item;
    }

    return $items;
}


register_post_type('books', [
    'label' => 'Books',
    'labels' => [
        'name' => 'Books',
        'singular_name' => 'Books',
        'all_items' => 'All books',
        'add_new' => 'Add new books',
        'add_new_item' => 'Add books',
        'edit_item' => 'Modify books',
    ],
    'public' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'menu_position' => 5,
    'description' => 'Les livres présentés.',
    'menu_icon' => 'dashicons-book-alt',
    'rewrite' => array('slug' => 'historic/books')
]);

register_post_type('exhibitions', [
    'label' => 'Exhibitions',
    'labels' => [
        'name' => 'Exhibitions',
        'singular_name' => 'Exhibitions',
        'all_items' => 'All exhibitions',
        'add_new' => 'Add new exhibitions',
        'add_new_item' => 'Add exhibitions',
        'edit_item' => 'Modify exhibitions',
    ],

    'public' => true,
    'menu_position' => 5,
    'description' => 'Les présentations realisés / à réaliser.',
    'menu_icon' => 'dashicons-format-image',
    'rewrite' => array('slug' => 'historic/exhibitions')
]);


register_post_type('about', [
    'label' => 'About',
    'labels' => [
        'name' => 'About',
        'singular_name' => 'About',
        'all_items' => 'All About text',
        'add_new' => 'Add new about text',
        'add_new_item' => 'Add description',
        'edit_item' => 'Modify text description',
    ],

    'public' => true,
    'menu_position' => 5,
    'description' => 'Décrit la page d\'information ',
    'menu_icon' => 'dashicons-text',
    'rewrite' => array('slug' => 'historic/about')
]);


function isn_add_filters_image(array $element)
{
    $element[] = 'book_img';
    return $element;
}
add_filter('rwp_add_filter', 'isn_add_filters_image');


function isn_get_theme_asset($asset)
{
    return get_stylesheet_directory_uri() .'/' . ltrim($asset, '/');
}

function isn_get_title($separator = "|", $displayTitleLeft = true)
{
    $separator = ' ' . $separator . ' ';

    $title = trim(wp_title('', false, 'right'));
    if(!$title) {
        return get_bloginfo('name');
    }

    if($displayTitleLeft) {
        return $title . $separator . get_bloginfo('name');
    } else {

        return get_bloginfo('name') . $separator . $title;
    }
}
function isn_wp_query(string $elementType, int $ElementNumber )
{
    $loop = new WP_Query([
        'post_type' => $elementType,
        'posts_per_page' => $ElementNumber,
        'rwp_settings' => array(
            'sizes' => array('thumbnail', 'medium', 'large'),
            'media_queries' => array(
                'medium' => 'min-width: 500px',
                'large' => 'min-width: 1024px'
            )
        )
    ]);
    return $loop;
}

/*function isn_add_fonts()
{
    wp_enqueue_style('Novecentowide-Bold', get_stylesheet_directory_uri() . '/assets/font/novencento/Novecentowide-Bold.ttf');
    wp_enqueue_style('Novecentowide-Bold', get_stylesheet_directory_uri() . '/assets/font/novencento/Novecentowide-Bold.otf');
    wp_enqueue_style('Novecentowide-Bold', get_stylesheet_directory_uri() . '/assets/font/novencento/Novecentowide-Bold.etf');
    wp_enqueue_style('Novecentowide-Bold', get_stylesheet_directory_uri() . '/assets/font/novencento/Novecentowide-Bold.woff');
    wp_enqueue_style('Novecentowide-Bold', get_stylesheet_directory_uri() . '/assets/font/novencento/Novecentowide-Bold.woff2');

}

add_action('wp_enqeue_scripts', 'isn_add_fonts');*/

