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
        <div class="main-post video-format "  >
            <div class="post-content d-flex justify-content-center" style='background-image:url(<?php echo $bg ;?>)'> 
                <?php
                    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
                    $embed = get_media_embedded_in_content( $content, $type );
                    $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
                    echo $output;
                ?>
            </div>
            
            <h3 class="post-title text-center">
                ~ <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> ~
            </h3>
            <div class="post-info text-center">
                <?php  sunset_posted_info() ?>
            </div> 
            <div class="video-excerpt">
                <?php the_excerpt();?>
            </div>
            <div class="post-meta">
                <?php sunset_posted_meta(); ?>
            </div>
            <div class="clearfix"></div>
        </div> 
        

    </article>