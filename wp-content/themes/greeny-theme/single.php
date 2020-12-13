
<?php get_header(); ?>
    
    <section id="blog-post" class="content text header-padding page">
        
        <h1 class=""><?php the_title()?></h1>
        
        <?php if(has_post_thumbnail()):?>
            <img class="featuredImage" src="<?php the_post_thumbnail_url('post_image'); ?>"/>
        <?php endif; ?>

        
    
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
        <?php the_content();?>
        <?php endwhile; else: endif; ?>
    
    </section>
    
    <?php get_footer(); ?>
    