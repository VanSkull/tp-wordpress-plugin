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
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail']
    ]);

    register_taxonomy(
        'book-category',
        ['book'], 
        [
            'labels' => [
                'name' => 'Catégorie d\'évènement',
                'singular_name' => 'Catégorie d\'évènement',
                'menu_name' => 'Catégorie d\'évènement'
            ],        
            'menu_icon' => 'dashicons-calendar',
            'public' => true,
            'show_admin_column' => true,
            'hierarchical' => true
        ]
    );
});