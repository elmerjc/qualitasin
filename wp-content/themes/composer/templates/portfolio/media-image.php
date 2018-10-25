<?php

    $prefix = composer_get_prefix();

    $id = get_the_id();

    $portfolio_single_image = json_decode( composer_get_meta_value( $id, '_amz_portfolio_single_image', '' ) );

    // Assign width and height
    $layout = composer_get_meta_value( $id, '_amz_portfolio_layout', 'full_width' );
    if( 'full_width' === $layout ) {
        $width = composer_get_meta_value( $id, '_amz_width', 1200 );
        $height = composer_get_meta_value( $id, '_amz_height', 300 );
    }
    else {
        $width = composer_get_meta_value( $id, '_amz_width', 790 );
        $height = composer_get_meta_value( $id, '_amz_height', 890 );
    }

    //Assign Image
    echo '<div class="portfolio-img pix-post-gallery">';

        if( !empty( $portfolio_single_image ) ) {
            echo '<div class="portfolio-image-gallery">';
                echo composer_get_image_by_id( (int)$width, (int)$height, $portfolio_single_image[0]->itemId, 0, 0, 1 );
            echo '</div>';
        }

    echo '</div>';
?>