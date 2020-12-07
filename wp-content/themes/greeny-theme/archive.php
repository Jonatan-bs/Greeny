
<?php get_header(); ?>
    
    <section class="content page">
    
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <a href="<?php the_permalink()?>">
            <h1>
                <?php the_title()?>
            </h1>
        </a>
        <?php the_excerpt();?>
        <?php endwhile; else: endif; ?>
    
        <?php get_sidebar() ?>
    </section>
    
<?php get_footer(); ?>
    