
<?php get_header(); ?>
    
<section class="content text page header-padding">
    
    <?php if(has_post_thumbnail()):?>
        <img class="featuredImage" src="<?php the_post_thumbnail_url('post_image'); ?>"  alt="<?php echo get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true ); ?>"/>
    <?php endif; ?>


    <h1><?php the_title()?></h1>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php the_content();?>
    <?php endwhile; else: endif; ?>

    <?php get_sidebar() ?>
    </section>

<?php get_footer(); ?>
