<?php 

$thisCategoryID = $wp_query->get_queried_object_id(); 


$cat_id = get_query_var('cat')? get_query_var('cat') : -1 ;

$wpb_all_query = new WP_Query(
    array(
        'post_type'=>'post', 
        'post_status'=>'publish',
        'cat'=>$cat_id, 
        'posts_per_page'=>-1
        )
); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>


    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <?php  get_template_part('components/partials/blog', 'single');?>
    <?php endwhile; ?>
    <!-- end of the loop -->


    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

