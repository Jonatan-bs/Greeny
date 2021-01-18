<?php get_header('light'); ?>
<div id="front-page">

<!-- HERO -->
    <section>
        <?php  get_template_part('components/frontpage', 'hero');?>
    </section>

<!-- Starter pack CTA -->
    <section class="content mb animate slideIn">
        <?php  get_template_part('components/starterpack');?>
    </section>

<!-- Products -->
    <section class="content mb">
        <?php  get_template_part('components/products','featured');?>
    </section>

<!-- Symbols -->
    <section class="content mb ">
        <?php  get_template_part('components/symbols');?>
    </section>

<!-- About Greeny juices -->
    <section class="mb">
        <?php  get_template_part('components/frontpage','about');?>
    </section>
    
<!-- Blog -->
    <section class="content mb">
        <?php  get_template_part('components/blog','teaser');?>
    </section>
<!-- Newsletter -->
<!--    
    <section class="content mb animate slideIn">
        <?php  get_template_part('components/newsletter');?>
    </section>
-->
    
</div>
<?php get_footer(); ?>


