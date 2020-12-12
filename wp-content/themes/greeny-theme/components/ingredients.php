<div class="ingredients">
    <?php 
        $ingredients = get_post_meta( $post->ID, 'ingredients_fields', true );


        foreach( $ingredients as $ingredient ){
            $title = $ingredient['title'];
            $text = $ingredient['text'];
            $percentage = $ingredient['percentage'] . " %";
            $image_attr =  wp_get_attachment_image_src(  esc_attr( $ingredient['image'], 'thumbnail' ));
            ?>
                <div class="ingredient">
                    <div class="image-percentage">
                        <img 
                            class="symbol" 
                            src="<?php echo $image_attr[0] ?>" 
                            width="<?php echo $image_attr[1] ?>" 
                            height="<?php echo $image_attr[2] ?>" alt="" />

                        <p class="percentage"><?php echo $percentage ?></p>
                    </div>
                    <div class="title">
                        <?php echo $title ?>
                    </div>
                    <div class="text">
                        <?php echo $text ?>
                    </div>
                </div>
            <?php
        }


    ?>
</div>