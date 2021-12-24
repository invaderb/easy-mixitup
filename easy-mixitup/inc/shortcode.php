<?php

function create_class($post_id, $tax){
	$terms = wp_get_object_terms( $post_id, $tax );
	$classes = '';
	foreach ( $terms as $term ) :
	    $cat = get_category( $term );
		$classes .= 'easy-mixitup-cat-' . $cat->slug . ' ';
	endforeach;
	return trim($classes);
}	

function easy_mixitup_shortcode($atts) {
    wp_enqueue_script('easy-mixitup-main', plugin_dir_url( __FILE__ ) . 'js/mixitup.js', '','',true);
    wp_enqueue_script('easy-mixitup-script', plugin_dir_url( __FILE__ ) . 'js/script.js', '','',true);
    wp_enqueue_style('easy-mixitup-style', plugin_dir_url( __FILE__ ) . 'css/style.css');

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
        <div class="easy-mixitup container">
            <div>
                <button type="button" class="filter" data-filter="all">Show All</button>
                <?php foreach ($categories as $cat) : ?>
                    <button type="button" data-filter=".easy-mixitup-cat-<?php echo esc_attr($cat->slug); ?>">
                        <?php echo esc_html($cat->name); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div id="easy-mixitup-list">
                <?php while ( $items->have_posts() ) : $items->the_post(); 
                    $post_id = get_the_ID();
                ?>
                <div class="mix easy-mixitup-item <?php echo esc_attr(create_class($post_id, $tax)); ?>">
                    <?php 
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_array = wp_get_attachment_image_src($thumb_id, 'full');
                        $thumb_url = $thumb_array[0];
                        $post_url = get_queried_object();
                        global $post;
                        $slug = $post->post_name;
                    ?>
                    <div class="easy-mixitup-item-wrapper">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_title($slug))); ?>" >
                        <img src="<?php echo esc_url($thumb_url); ?>" />
                        <div class="easy-mixitup-item-label">
                            <div class="easy-mixitup-item-label-text">
                                <span class="easy-mixitup-item-text-title"><?php echo esc_html(the_title('', '', false)); ?></span>
                            </div>
                            <div class="easy-mixitup-item-label-bg"> </div>
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
} // end  easy_mixitup_html_generator

add_shortcode('easy-mixitup', 'easy_mixitup_shortcode');

?>
