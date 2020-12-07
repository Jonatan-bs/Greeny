
<?php get_header(); ?>
    
<section class="content page">
    
    <?php if(has_post_thumbnail()):?>
        <img class="featuredImage" src="<?php the_post_thumbnail_url('post_image'); ?>"/>
    <?php endif; ?>


    <h1><?php the_title()?></h1>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php the_content();?>
    <?php endwhile; else: endif; ?>

    <?php get_sidebar() ?>
    </section>

<?php get_footer(); ?>
