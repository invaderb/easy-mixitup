<?php

function get_cat_calsses($post_id, $tax){
	$terms = wp_get_object_terms( $post_id, $tax );
	$classes = '';
	foreach ( $terms as $term ) :
	    $cat = get_category( $term );
		$classes .= 'wp-mixitup-cat-' . $cat->slug . ' ';
	endforeach;
	return trim($classes);
}	

function wp_mixitup_shortcode($atts) {
    wp_enqueue_script('wp-mixitup-main', 'https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js', '','',true);
    wp_enqueue_script('wp-mixitup-script', plugin_dir_url( __FILE__ ) . '/script.js', '','',true);
    wp_enqueue_style('wp-mixitup-style', plugin_dir_url( __FILE__ ) . '/style.css');
    extract(shortcode_atts(array(
        'post_type' => 'posts',
        'order' => 'ASC',
        ), $atts
    ));
    $options = array(
        'post_type' => $post_type,
        'order' => $order,
        'orderby' => 'name',
        'posts_per_page' => '-1'
    );
    $items = new WP_Query( $options );
    $tax = ($post_type == 'posts') ? 'category' : $post_type . '_category';
	$args = array (
	    'taxonomy' => $tax, //your custom post type
	    'orderby' => 'name',
	    'order' => 'ASC',
	    'hide_empty' => 0 //shows empty categories
	);
	$categories = get_categories( $args );

    ob_start();
    ?>

    <?php if ( $items->have_posts() ): ?>
    <div class="wp-mixitup container">
        <div>
            <button type="button" class="filter" data-filter="all">Show All</button>
            <?php foreach ($categories as $cat) : ?>
                <button type="button" data-filter=".wp-mixitup-cat-<?php echo $cat->slug; ?>">
                    <?php echo $cat->name; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div id="wp-mixitup-list">
        	<?php while ( $items->have_posts() ) : $items->the_post(); 
        	    $post_id = get_the_ID();
        	?>
        	<div class="mix wp-mixitup-item <?php echo get_cat_calsses($post_id, $tax); ?>">
        	    <?php 
        	        $thumb_id = get_post_thumbnail_id();
        	        $thumb_array = wp_get_attachment_image_src($thumb_id, 'full');
        	        $thumb_url = $thumb_array[0];
        	        $post_url = get_queried_object();
        	        global $post;
                    $slug = $post->post_name;
        	    ?>
        	    <div class="wp-mixitup-item-wrapper">
        	        <a href="<?php echo $slug ?>" >
        	        <img src="<?php echo $thumb_url;?>" />
                    <div class="wp-mixitup-item-label">
                        <div class="wp-mixitup-item-label-text">
                            <span class="wp-mixitup-item-text-title"><?php the_title(); ?></span>
                        </div>
                        <div class="wp-mixitup-item-label-bg"> </div>
                    </div>
                    </a>
                </div>
        	</div>
        
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php else: ?>
        	<h3>Sorry! No items found.</h3>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
} // end  wp_mixitup_html_generator

add_shortcode('wp-mixitup', 'wp_mixitup_shortcode');

?>
