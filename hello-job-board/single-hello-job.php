<?php get_header(); 
    $jlocation = get_post_meta(get_the_ID(), 'jlocation', true);
    $jjobtype= get_post_meta(get_the_ID(), 'jjobtype', true);
    $jbudgetfrom = get_post_meta(get_the_ID(), 'jbudgetfrom', true);
    $jbudgetto = get_post_meta(get_the_ID(), 'jbudgetto', true);
    $jbudget = get_post_meta(get_the_ID(), 'jbudget', true);
    $jhowtoapply = get_post_meta(get_the_ID(), 'jhowtoapply', true);
    $jhowtoapply_link = get_post_meta(get_the_ID(), 'jhowtoapply_link', true);
?>
    <div class="container">
        <div class="row"> 
        <?php if(have_posts()):
        while(have_posts()) : the_post() ; ?>
        <div class="job-single-banner pt-5 pb-2">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="col-8">  
        <div class="job-single-content py-3">
            <p><?php the_content(); ?></p>
        </div>
        <?php 
        endwhile;
        endif;    
        wp_reset_postdata();   ?>
    </div>

    <div class="col-4">
    <p><b>Job Type</b><br><?php echo esc_html($jjobtype); ?></p>
    <p><b>Location</b><br>
    <?php 
    if($jlocation == ''){
        ?>
        <span>N/A</span> 
        <?php
    }
    else{
        echo esc_attr($jlocation); 
    }
    ?></p> 
    <p><b>Budget</b><br>
    <?php 
    if($jbudgetfrom == '' && $jbudgetto == ''){
        ?>
        <span>N/A</span> 
        <?php
    }
    else if($jbudgetfrom == ''){
        echo '$'.esc_attr($jbudgetto).' '.esc_attr($jbudget); 
    }
    else if($jbudgetto == ''){
        echo '$'.esc_attr($jbudgetfrom).' '.esc_attr($jbudget); 
    }
    else{
        echo '$'.esc_attr($jbudgetfrom).' - $'.esc_attr($jbudgetto).' '.esc_attr($jbudget); 
    }
    ?></p> 
    <p><b>How To Apply</b><br>
    <?php 
    if($jhowtoapply == 'Email'){
        ?>
        <span>Via</span>
        <a href="mailto:<?php echo esc_html($jhowtoapply_link); ?>"><?php echo esc_html($jhowtoapply) ?></a>
        <?php
    }
    else if($jhowtoapply == 'Phone'){
        ?>
        <span>Via</span>
        <a href="tel:<?php echo esc_html($jhowtoapply_link); ?>"><?php echo esc_html($jhowtoapply) ?></a>
        <?php
    }
    else{
        ?>
        <span>Via</span>
        <a href="<?php echo esc_html($jhowtoapply_link); ?>"><?php echo esc_html($jhowtoapply) ?></a>
        <?php
    }
    ?>
    </p> 
    </div>
    </div>
    </div>
<?php get_footer(); ?>