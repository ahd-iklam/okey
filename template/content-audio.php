<?php

/*
==================
this is the template for header
==================
 */ 
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class()?>>
        <div class="main-post audio-format"  >
            <div class="audio-post-content" >
                <div class="row" >
                    <div class="col-md-3 ">
                        <div class="post-thumbnail text-center ">
                            <?php if(has_post_thumbnail()){
                                the_post_thumbnail( 'post-thumbnail' , array('class' => 'img-fluid img-thumbnail '));
                            }?>
                        </div>
                    </div>
                    <div class="col-md-8" >    
                        <div class="post-content "> 
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
                            <span class="post-author"> created by: <?php echo get_the_author_link() ?> </span>
                            <span class="post-date"> date posted :  <?php echo human_time_diff( get_the_time( 'G'),current_time('timestamp') )?> ago</span>
                        </div>          

                    </div>
                </div>
            </div>
            <div class="post-meta">
                <?php sunset_posted_meta();  ?>
            </div>
        </div> 
    </article>
