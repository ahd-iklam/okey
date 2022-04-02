<?php get_header()?>
<?php
/*
==================
this is the template for header
==================
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class()?>>
    <div class="main-post contact-page" >
            <h3 class="post-title text-center" >
            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> 
            </h3>
            <div class="post-content">
                <?php the_content()?>
            </div>
</article>
<?php get_footer()?>
