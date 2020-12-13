<?php get_header(); ?>

    <div class="content header-padding">
        <section class="content mb">
            <div class="categories">
                <a class="active" href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>">
                    All
                </a>
                <?php $categories = get_categories(); 
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
            <?php  get_template_part('components/blog','list');?>
        </section>
    </div>

<?php get_footer(); ?>


