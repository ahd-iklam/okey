<?php get_header()?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class=" text-center load-icon" >
                <span ><?php previous_posts_link('<i class="fas fa-sync-alt"></i>'); ?></span>
            </div>
            <div class="row">
            <div class="col-md-12">
                <?php  
                    if(have_posts()) {
                        while(have_posts()){ 
                            the_post();
                            get_template_part('template/content' , get_post_format());
                    }}
                ?>
            </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container text-center load-icon " >
            see more
                <div ><?php next_posts_link('<i class="fas fa-sync-alt"></i>' ); ?></div>
        </div>
    </main>
</div>

<?php get_footer()?>