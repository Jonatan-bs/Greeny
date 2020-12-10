<?php get_header('light'); ?>
<div id="front-page">

<!-- HERO -->
    <?php  get_template_part('components/frontpage', 'hero');?>

<!-- Starter pack CTA -->
    <?php  get_template_part('components/starterpack');?>

<!-- Products -->
    <?php  get_template_part('components/products','featured');?>
    
<!-- Symbols -->
    <?php  get_template_part('components/frontpage','symbols');?>
    
<!-- About Greeny juices -->
    <?php  get_template_part('components/frontpage','about');?>
    
<!-- Blog -->
    <?php  get_template_part('components/blog','teaser');?>
    
    

<!-- Newsletter -->
    <?php  get_template_part('components/newsletter');?>
    
</div>
<?php get_footer(); ?>


