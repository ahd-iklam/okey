<?php get_header()?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <?php  
                    if(have_posts()) {
                ?>
                <div class="clearfix"></div>
                <div class="archive-title">
                    <?php the_archive_title('<h1>' , '</h1>'); ?>
                </div>
                
                <?php
                        while(have_posts()){ 
                            the_post();
                            get_template_part('template/content' , get_post_format());
                    }}
                ?>
            </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </main>
</div>
<?php get_footer()?>