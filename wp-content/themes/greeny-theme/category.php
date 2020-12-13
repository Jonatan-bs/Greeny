<?php get_header(); ?>

    <div class="content header-padding">
        <section class="content mb">
            <div class="categories">
                <a href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>">
                    All
                </a>
            <?php
            $thisCategory = get_the_category(); 
            $categories = get_categories(); 
                    
                foreach( $categories as $categorie){
                    
                    $link = get_category_link( $categorie->term_id )
                    ?>
                    <a href="<?php echo $link ?>" class="<?php if($thisCategory[0]->term_id === $categorie->term_id){ echo 'active'; }; ?>">
                        <?php echo $categorie->name ?>
                    </a>

            <?php    
                }
            ?>
            </div>
            <?php  get_template_part('components/blog','list');?>
        </section>
    </div>

<?php get_footer(); ?>


