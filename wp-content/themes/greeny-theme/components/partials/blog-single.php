
    <article class="blog-card animate slideIn sequence">
        <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
        <a class="image" href="<?php the_permalink(); ?>">
            <img  src="<?php echo $src[0];?>"  alt="<?php echo get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true ); ?>"/>
        </a>
        <div class="container">
            <a href="<?php the_permalink(); ?>">
                <p class="blog-title"><?php the_title(); ?></p>
            </a>
            <div class="blog-tag">
                <?php $categories = get_the_category(); 
                foreach( $categories as $categorie){
                    $link = get_category_link( $categorie->term_id )
                    ?>
                        <a href="<?php echo $link ?>">
                            <?php echo $categorie->name ?>
                        </a>

                <?php    
                }
                ?>
            </div>
            <div class="excerpt blog-body"> <?php the_excerpt(); ?> </div>
        </div>
    </article>
