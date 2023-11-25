<?php get_header(); ?>
    <section class="apkhub-content-area">
    <?php if ( true == get_theme_mod( 'apkhub_home_slider_visibility', 'on' ) ) : ?>
        <div class="swiper">
            <div class="swiper-wrapper"> 
                <?php 
                $defaults = [
                    [
                        'slide_bg_image' => '',
                        'slide_heading'  => esc_html__( 'Lorem Ipsum', 'apkhub' ),
                        'slide_description'  => esc_html__( 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly. ', 'apkhub' ),
                    ],
                ];
                $settings = get_theme_mod( 'apkhub_home_slider_slides', $defaults ); 
                ?>
                <?php foreach ( $settings as $setting ) : ?>
                    <div class="swiper-slide" style="background-image:linear-gradient(rgb(0 0 0 / 60%), rgb(0 0 0 / 50%)), url('<?php echo esc_url($setting['slide_bg_image']); ?>')">
                        <h1><?php esc_attr_e( $setting['slide_heading'] ); ?></h1>
                        <p><?php esc_attr_e( $setting['slide_description'] ); ?></p>
                        <p><?php  ?></p>
                    </div>    
                <?php endforeach; ?>
            </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
        </div>
    <?php endif; ?>

    <?php
    // Get the parts.
    $template_parts = get_theme_mod( 'apkhub_home_blocks', array( 'featured-block', 'latest-apps-block', 'latest-games-block' ) );

    // Loop parts.
    foreach ( $template_parts as $template_part ) {
        get_template_part( 'template-parts/' . $template_part );
    } ?>
    </section>

<?php get_footer(); ?>