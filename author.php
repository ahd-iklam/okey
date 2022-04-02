<?php get_header(); ?>

<div class="container">   

        <h3 class = "page-title">  author biography</h3>
        <div class="row author-biography">        
            <div class="col-sm-2"> 
                <div class ="avatar">
                    <?php
                        echo get_avatar(get_the_author_meta('ID'));
                    ?>
                </div>
            </div> 
            <div class="col-sm-10"> 
                <div class = "personal-info">
                    <h4> <?php 
                        if (get_the_author_meta('first_name')) { echo 'firstName : '; echo get_the_author_meta('first_name');}
                        else{
                                echo '';
                        }
                        ?> 
                    </h4>
                    <h4> 
                        <?php 
                            if (get_the_author_meta('last_name')) { echo 'lastName : '; echo get_the_author_meta('last_name');}
                            else{
                                    echo '';
                            }
                            ?> 
                    </h4>
                    <h4>
                    <?php 
                            if (get_the_author_meta('nickname')) { echo 'nickname : '; echo get_the_author_meta('nickname');}
                            else{
                                    echo '';
                            }
                            ?>
                    </h4>
                </div>
                
                    <h4 class = "content">
                        <hr>
                        <?php
                            if(get_the_author_meta('description')) 
                                {the_author_meta('description');}
                            else 
                                {echo ('sorry This user does not have a bio');}
                        ?>
                    </h4>
            </div>
        </div>
</div> <!--end container-->
<div class="container">
<h3 class = 'author_articles_title'><?php echo get_the_author_meta('first_name') ?> articles</h3>  
        <?php
        /*------------------- look at 86 video ------------------*/
                    $post_args = array(
                        'author'   => get_the_author_meta('ID'),
        
                    'posts_per_page'  => 3
                    );
                    $author_post = new WP_Query( $post_args ); 
        if($author_post->have_posts()) {            
            while ($author_post->have_posts()) {
                $author_post->the_post(); ?>            
                    <div class="row author-posts"> 
                        <div class="col-sm-2"> <!--start col-4-->
                            <div class="post-images">
                            <?php the_post_thumbnail('' , ["class" => "img-responsive img-thumbnail"]) ?>
                            </div>
                        </div> <!--end col 4-->

                        <div class="col-sm-9"> <!--start second col 8-->
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title();?>
                                </a>
                            </h3>
                            <div class="author-info">
                                <span class="post-date"> <i class="far fa-calendar"></i> <?php the_time('F  Y');?> </span>
                                <span class="post-comments"><i class="fas fa-comment"></i>
                                    <?php 
                                    comments_popup_link("be the first comment" , "one comments" , "% comments" , "post-comments" , "comments are disable");
                                    ?>
                                </span>
                            </div>
                            <div class="post-content"><?php the_excerpt();?></div>
                        </div> <!--end second col 8-->
                    </div>  <!--end third row-->
                <?php        

            } // End while loop     
            
        }// end if condition 
        else {echo('sorry This user does not have a bio');}?>
</div>
<?php get_footer();