
<!DOCTYPE html>
<html <?php language_attributes()?>>
    <head>
        <title><?php bloginfo('name');single_cat_title();  wp_title();?></title>
        <meta charset = "<?php bloginfo('charset')?>">
    <meta name="description" content="<?php  bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link  rel ='pingback'  href='<?php bloginfo('pingback_url') ?>'>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" >
        <?php wp_head()?>
    </head>
<body <?php body_class(); ?>>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <header class="header-container " style = "background-image:url('<?php header_image();  ?>')">
                <div class="header-content text-center">
                    <h1 class="site-title"><?php bloginfo('name') ?></h1>
                    <h3 class="site-description"><?php bloginfo('description') ?></h3>
                </div>
                <div class="nav-container ">
                    <nav class="navbar navbar-expand-lg ">
                    <div class="search-form"><?php get_search_form(); ?></div>s
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style='color:red'></span>
                    </button>
                    
                        <div class=""><?php sunset_add_nav_menu();?></div>
                        
                    </nav>
                </div>
            </header>
        </div>
    </div>
</div>

