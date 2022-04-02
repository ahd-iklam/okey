<?php get_header()?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9" style='margin-left:0rem'>
                    <?php add_share_media(); ?>
                    <?php  
                        if(have_posts()) {                            
                            while(have_posts()){                                
                                the_post();
                                get_template_part('template/content' , get_post_format());
                                echo '<div class="post-navigation">';
                                the_post_navigation(array(
                                    'prev_text'  => '<i class="fas fa-angle-left "></i> prev',
                                    'next_text'  =>  '<i class="fas fa-angle-right"></i> next'
                                ));
                            echo '</div>';
                        ?>
                        <div class="clearfix"></div>
                        <div class="comment-section">
                            <?php
                                    if(comments_open() || get_comments_number())
                                        {                                
                                        comments_template(); 
                                        }
                                    else{
                                        echo ('sorry the commments of this post are disable');
                                    }
                            }}
                            ?>
                        </div>
                </div>
                <div class="col-md-3 "> 
                <div><i class="fas fa-bars  open-widget"  id='widget-icon'></i></div>
                    <div class="right_sidebar" >
                        <?php dynamic_sidebar( 'signle-page-sidebar' )?>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer();?>

