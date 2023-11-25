<!-- Latest Games Section -->
<div class="apkhub-latest-sec">
    <div class="apkhub-section-header">
        <div class="apkhub-heading"><h2>Latest Games</h2></div>
        <div class="apkhub-btn"><a href="<?php echo site_url() . '/apkcat/games'; ?>"><?php esc_attr_e(get_theme_mod('apkhub_home_viewmore_btn_text','View all')); ?></a></div>
    </div>
    <div class="apkhub-apps">
        <?php
            $args = array(
                    'post_type'      => 'apk',
                    'post_status'   => 'publish',
                    'posts_per_page' => 10,
                    'tax_query' => array(
                        array(
                        'taxonomy' => 'apkcat',
                        'field' => 'slug',
                        'terms' => 'games',
                    ),
                ),
            );
            $apk_query = new WP_Query($args);
            while ( $apk_query->have_posts() ) {
                $apk_query->the_post();
                ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="apkhub-app-content">
                        <div class="apkhub-app-con-left">
                            <?php the_post_thumbnail('full') ?>
                        </div>
                        <div class="apkhub-app-con-right">
                            <h4><?php the_title(); ?> </h4>
                            <h5><?php rwmb_the_value( 'apkhub_version' ); ?></h5>
                            <span>
                            <?php 
                            $googlelink = rwmb_meta( 'apkhub_g_playstore_link' );
                            $applink = rwmb_meta( 'apkhub_appstore_link' );
                            if($googlelink !== ''){
                            ?><img src="<?php echo get_template_directory_uri() . '/assets/img/google-play-store-icon.png' ?>">
                            <?php } 
                            if($applink !== ''){
                            ?><img src="<?php echo get_template_directory_uri() . '/assets/img/app-store-icon.png' ?>">
                            <?php } ?> 
                        </div>
                    </div>
                </a>
                <?php
            }
        ?>
    </div>
</div>