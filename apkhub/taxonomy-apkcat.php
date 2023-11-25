<?php get_header(); ?>

<section class="apkhub-content-area">
    <div class="apkcat-header">
        <h1><?php the_archive_title(); ?></h1>
        <p><?php the_archive_description() ?></p>
            <div class="apkhub-apps">
            <?php
            while ( have_posts() ) {
                the_post();
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
</section>

<?php get_footer();?>
