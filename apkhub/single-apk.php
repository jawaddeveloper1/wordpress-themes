<?php get_header(); ?>
    <section class="apkhub-content-area">
        <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                ?> 
                <div class="apkhub-single-header">
                    <div class="apkhub-single-hl"><?php the_post_thumbnail(); ?></div>
                    <div class="apkhub-single-hr">
                        <h2><?php the_title(); ?></h2>
                        <span>Updated on </span><?php esc_attr_e(get_the_modified_date()); ?>
                    </div>
                </div>
                <div class="apkhub-single-content">
                    <h3>App Info</h3>
                    <div class="apkhub-single-appinfo">
                        <table>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <?php
                                    $terms = get_the_terms( $post->ID, 'apkcat' ); 
                                    foreach($terms as $term) {
                                    echo $term->name.'<span class="apkcat-comma">, </span>';
                                    }?>
                                </td>
                            </tr>
                            <tr>
                                <th>Version</th>
                                <td><?php rwmb_the_value('apkhub_version'); ?></td>
                            </tr>
                            <tr>
                                <th>Publisher</th>
                                <td><?php the_author(); ?></td>
                            </tr>
                            <tr>
                                <th>Google Play Store</th>
                                <td><?php 
                                    $google_playstore = rwmb_meta('apkhub_g_playstore_link'); 
                                    if($google_playstore !== ''){ ?>
                                    <a href="<?php esc_attr_e($google_playstore); ?>">Download</a>
                                    <?php } else{ ?>
                                    <span>Not Available</span>
                                <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>App Store</th>
                                <td><?php 
                                    $appstore = rwmb_meta('apkhub_appstore_link'); 
                                    if($appstore !== ''){ ?>
                                    <a href="<?php esc_attr_e($appstore); ?>">Download</a>
                                    <?php } else{ ?>
                                    <span>Not Available</span>
                                <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="apkhub-single-appscreenshots">
                        <h3>App Screenshots</h3>
                        <div class="apkhub-single-appss-wrap">
                            <?php $appscrshots = rwmb_meta( 'apkhub_app_screenshots', ['size' => 'thumbnail'] );
                            foreach ( $appscrshots as $appscrnshots ) : ?>
                                <span><img src="<?= $appscrnshots['url']; ?>"></span>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <div class="apkhub-single-content">
                        <h3>App Description</h3>
                        <?php the_content(); ?>       
                    </div>
                </div>
                <?php
            } 
        } 
        ?>
    </section>
<?php get_footer();?>