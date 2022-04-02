<?php
/*
==================
this is the template for header
==================
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class()?>>
    <div class="main-post" >
            <h3 class="post-title text-center" >
                ~ <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> ~
            </h3>
            <div class="post-info text-center">
                <span class="post-author"> created by: <?php the_author_posts_link(); ?> </span>
                <span class="post-date"> date posted :  <?php echo human_time_diff( get_the_time( 'G'),current_time('timestamp') )?> ago</span>
            </div>
            <div class="post-thumbnail text-center  img-fluid">
                <?php if(has_post_thumbnail()){
                    the_post_thumbnail( 'post-thumbnail' , array('class' => 'img-fluid img-thumbnail'));
                }?>
            </div>
            <div class="post-content">
                <?php the_excerpt()?>
            </div>
            <div class="read-more d-flex justify-content-center">
                <a href="<?php the_permalink();?>" class = "btn btn-outline-dark "><?php _e('read more'); ?></a>
            </div>           
            <div class="post-meta">
                <?php sunset_posted_meta();?>
    </div> 
</article>