<?php
/*
Template Name: Main Job Page
*/

get_header();

$args = array(
    'post_type' => 'hello-job',
);

$hjb_query = new WP_Query ($args);

?>
<div class="container my-5">
<?php
if($hjb_query->have_posts()):
    while($hjb_query->have_posts()) : $hjb_query->the_post() ;
        ?>
        <div class="row hjb-job-content mt-3 p-5">
            <?php 
                $jlocation = get_post_meta(get_the_ID(), 'jlocation', true);
                $jjobtype = get_post_meta(get_the_ID(), 'jjobtype', true);
            ?>
            <div class="col-2">
            <p><?php echo esc_html(get_the_date()); ?></p>
            </div>
            <div class="col-7">
            <h4><?php the_title(); ?></h4>
            <p><b>Type:</b> <?php echo esc_html($jjobtype); ?></p>
            <p><b>Location:</b> <?php echo esc_html($jlocation); ?></p>
            </div>
            <div class="col-3 text-end">
            <a href="<?php the_permalink(); ?>" class="btn btn-success">View Job</a>
            </div>
        </div>
        <?php 
    endwhile;
    endif;    
    wp_reset_postdata();   ?>
 </div>
<?php 
get_footer();