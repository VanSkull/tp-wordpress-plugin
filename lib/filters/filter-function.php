<?php
    function books_related_posts($id = 0){
        $id = $id === 0 ? get_the_ID() : $id;
        $terms = get_the_terms( $id, 'book-genre' );
    
        if(!$terms){
            return false;
        }
    
        // $term = $terms[0]->slug;
        //var_dump($terms);
        $term = [];
        foreach($terms as $value){
            $term[] = $value->slug;
        }
    
        $args = [
            'post_type' => 'book',
            'posts_per_page' => 4,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post__not_in' => [$id],
            'tax_query' => [
                'relation' => 'OR',
                [
                    'taxonomy' => 'book-genre',
                    'field' => 'slug',
                    'terms' => $term,
                ]
            ],
        ];
        
        return new WP_Query( $args );
    } 