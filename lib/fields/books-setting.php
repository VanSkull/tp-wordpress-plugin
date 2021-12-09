<?php
// Création d'un post_type "livre" et de ces taxonomies
add_action('init', function() {
    register_post_type('book', [
        'labels' => [
            'name' => 'Livres',
            'singular_name' => 'Livres',
            'menu_name' => 'Livres',
            'name_admin_bar' => 'Livres'
        ],        
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail']
    ]);

    register_taxonomy(
        'book-genre',
        ['book'], 
        [
            'labels' => [
                'name' => 'Genre',
                'singular_name' => 'Genre',
                'menu_name' => 'Genre'
            ],        
            'menu_icon' => 'dashicons-book',
            'public' => true,
            'show_admin_column' => true,
            'hierarchical' => true
        ]
    );

    register_taxonomy(
        'book-age',
        ['book'], 
        [
            'labels' => [
                'name' => 'Catégorie d\'âge',
                'singular_name' => 'Catégorie d\'âge',
                'menu_name' => 'Catégorie d\'âge'
            ],        
            'menu_icon' => 'dashicons-age',
            'public' => true,
            'show_admin_column' => true,
            'hierarchical' => true
        ]
    );
});

acf_add_options_page([
    'page_title' => 'Options de la bibliothèque',
    'menu_title' => 'Options de la bibliothèque',
    'menu_slug' => 'library-settings',
]);

add_action('save_post', function($post_id, $post, $update){
    // Image mise en avant par défaut
    if(has_post_thumbnail($post)){
        do_action("save_post/{$post->post_type}/thumbnail", $post_id, $post, $update);
    }else{
        do_action("save_post/{$post->post_type}/no_thumbnail", $post_id, $post, $update);
    }
}, 10, 3);

add_action('save_post/book/no_thumbnail', function($post_id, $post){
    if ($default_thumbnail = get_field('default_book_thumbnail', 'options')){
        set_post_thumbnail($post, $default_thumbnail);
    }
}, 10, 2);

/* 
$args = [
    ... vos arguments,
    'meta_query' => [
        [
            'key' => 'votre_clé',
            'value' => '1',
        ]
    ],
];


*/