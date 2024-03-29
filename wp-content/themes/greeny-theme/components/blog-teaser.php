<?php $wpb_all_query = new WP_Query(
    array(
        'post_type'=>'post', 
        'post_status'=>'publish', 
        'posts_per_page'=>2
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
<div class="flexcenter">
    <a class="page-link" href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>">Blog</a>
</div>
