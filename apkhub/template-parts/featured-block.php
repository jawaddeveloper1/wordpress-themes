<!-- Featured Section -->
<div class="apkhub-featured-sec">
    <h2>Featured</h2>
<?php get_template_directory_uri(); ?>
    <div class="apkhub-featured">
        <?php
            $args = array(
                    'post_type'      => 'apk',
                    'post_status'   => 'publish',
                    'posts_per_page' => 11,
                    'tax_query' => array(
                        array(
                        'taxonomy' => 'apkcat',
                        'field' => 'slug',
                        'terms' => 'featured',
                    ),
                ),
            );
            $apk_query = new WP_Query($args);
            while ( $apk_query->have_posts() ) {
                $apk_query->the_post();
                ?>
                <a href="<?php the_permalink(); ?>">
                <div class="apkhub-featured-content">
                    <?php the_post_thumbnail('full') ?>
                    <h6><?php the_title(); ?> </h6>
                </div>
                </a>
                <?php
            }
        ?>
    </div>
</div>