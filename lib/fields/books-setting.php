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