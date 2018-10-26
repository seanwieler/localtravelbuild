<?php

add_shortcode("travel_grid", "travel_grid_func");

function travel_grid_func($atts, $content=null) {
    $a = shortcode_atts(array(
        'country' => 'all',
        'city' => 'all'
    ), $atts);

    $args = array(
        'post_type' => 'travel_blog',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    if ($a['city'] !== 'all') {
        $args['meta_query'] = array(
		    array(
                'key'     => 'city',
                'value'   => $a['city'],
                'compare' => 'LIKE'
            )
        );
    }

    if($a['country'] !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'country',
                'field' => 'slug',
                'terms' => $a['country']
            )
        );
    }
    // error_log(print_r($args, true));
    $travel_query = new WP_Query($args);
    ob_start();
    if ($travel_query->have_posts()):
        $count = $travel_query->found_posts;
        echo "<h2>There are $count posts found:</h2>";
        echo '<ul>';
        while ( $travel_query->have_posts() ) {
            $travel_query->the_post();
            the_title('<h1>', '</h1>');
            the_excerpt();
            // echo '<li><h1>' . get_the_title() . '</h1></li>';
            // echo '<p>' . get_the_excerpt() . '</p>';
        }
        echo '</ul>';
    else:
        ?>
        <p>No blogs found</p>
        <?php
    endif;
    
    return ob_get_clean();
}
?>