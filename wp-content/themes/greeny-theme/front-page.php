<?php get_header(); ?>

<div id="hero">
    <h1>Woocommerce shop</h1>
</div>

<section class="content">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    
    <?php the_content();?>

    <?php endwhile; else: endif; ?>
</section>

<?php get_footer(); ?>


