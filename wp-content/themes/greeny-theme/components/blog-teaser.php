<div class="content mb">
    <?php $wpb_all_query = new WP_Query(
        array(
            'post_type'=>'post', 
            'post_status'=>'publish', 
            'posts_per_page'=>-1
            )
    ); ?>

    <?php if ( $wpb_all_query->have_posts() ) : ?>
    
    
        <!-- the loop -->
        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
                <div class="blog-card">
                    <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
                    <img  class="image" src="<?echo $src[0];?>" alt=""/>
                    <div class="container">
                        <p class="blog-title"><?php the_title(); ?></p>
                        <p class="blog-tag">Category example</p>
                        <div class="excerpt blog-body"> <?php the_excerpt(); ?> </div>
                    </div>
                </div>
            </a>
        <?php endwhile; ?>
        <!-- end of the loop -->
    
    
        <?php wp_reset_postdata(); ?>
    
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    <div class="flexcenter">
    <a class="page-link" href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>">Blog</a>
    </div>
</div>