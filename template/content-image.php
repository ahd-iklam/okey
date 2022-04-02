<?php
	if( has_post_thumbnail() ) {
        $bg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    }

/*
==================
this is the template for header
==================
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class()?>>
    <div class="main-post image-format" style='background-image:url(<?php echo $bg ;?>)'>
            <h3 class="post-title text-center" >
                ~ <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> ~
            </h3>
            <div class="post-info text-center">
                <?php sunset_posted_info(); ?>
            </div>
            <div class="post-content text-center">
                <?php the_excerpt()?>
            </div>
            <div class="post-meta">
                <?php sunset_posted_meta();?>
            </div>
            <div class="clearfix"></div>  
    </div> 

</article>
<div class="clearfix"></div>