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