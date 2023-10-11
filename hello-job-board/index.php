<?php get_header(); ?>
<div class="hjb-blog-banner bg-light text-center py-5">
<h1><?php single_post_title(); ?></h1>
</div>
<div class="hjb-blog-content my-5">
<?php if(have_posts()):
    while(have_posts()) : the_post();
    ?>
        <h2 class="mt-3"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>" class="link-underline-primary">Read More</a>
    <?php
endwhile; 
endif; ?>
</div>
<?php echo paginate_links();
get_footer(); ?>