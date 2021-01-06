
<?php 

$thisCategoryID = $wp_query->get_queried_object_id(); 
$cat_id = get_query_var('cat')? get_query_var('cat') : -1 ;
$currentPage = get_query_var('paged');

$posts = new WP_Query(
    array(
        'post_type'=>'post', 
        'post_status'=>'publish',
        'cat'=>$cat_id, 
        'posts_per_page' => 10, // Max number of posts per page
        'paged' => $currentPage 
        )
); ?>

<?php if ( $posts->have_posts() ) : ?>


    <!-- the loop -->
    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <?php  get_template_part('components/partials/blog', 'single');?>
    <?php endwhile; ?>
    <!-- end of the loop -->


    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 
    echo "<div class='page-nav-container'>" . paginate_links(array(
        'total' => $posts->max_num_pages,
        'prev_text' => __('<'),
        'next_text' => __('>')
    )) . "</div>";  
?>





