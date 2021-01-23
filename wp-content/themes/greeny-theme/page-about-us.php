
<?php get_header(); ?>
    
<section id="aboutUs" class="content text page header-padding">
    <?php if(has_post_thumbnail()):?>
        <img class="featuredImage" src="<?php the_post_thumbnail_url('post_image'); ?>"  alt="<?php echo get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true ); ?>"/>
    <?php endif; ?>


    <h1><?php the_title()?></h1>
    
    <div class="profiles">
        <div class="profile">
            <div class="image" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/profile1.jpg')"> </div>
            <p class="name">Jakub</p>
            <p class="title">owner</p>
            <p class="text">“I usually don’t have time to eat breakfast but I will always find 30 seconds to mix the juice!”</p>
        </div>
        <div class="profile">
            <div class="image" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/profile2.jpg')"> </div>
            <p class="name">Weronika</p>
            <p class="title">owner</p>
            <p class="text">“I love to drink fresh juices and create my own mixes, but I really don’t like to clean a blender”</p>
        </div>


    </div>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php the_content();?>
    <?php endwhile; else: endif; ?>

    <?php get_sidebar() ?>
    </section>

<?php get_footer(); ?>
