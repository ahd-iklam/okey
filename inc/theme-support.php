<?php
/*
    $options = get_option('post_formats');
    $formats = array('aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio');
    $output = array();
    foreach($formats as $format){
        $output[] = ( @$options[$format] == 1 ? $format : '' );
    }
    if( !empty ($options )) {
        add_theme_support('post-formats', $output );
    }*/
  

    add_theme_support( 'post-formats', array('aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio'));
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('post-thumbnails');
    add_theme_support( 'align-wide' );
    
/* 
===========================
ACTIVATE MENU FUNCTION
===========================
*/

add_action( 'after_setup_theme', 'sunset_register_nav_menu' );
function sunset_register_nav_menu(){
    $args = array(
            'primary' => __( 'Primary Menu', 'header nav menu' ),
    'secondary' => __( 'Secondary Menu', 'footer nav menu' ),
    );
    register_nav_menus($args);
   
}
function sunset_add_nav_menu(){
    wp_nav_menu( array(
        'theme_location'  => 'primary',
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse sunset-nav ',
        'container_id'    => 'navbarSupportedContent',
        'menu_class'      => 'navbar-nav  mr-auto',
        'walker'    => new wp_bootstrap_navwalker(),
        ) );
}


/*
===========================
BLOG LOOP CUSTOM FUNCTION
============================
*/
function sunset_posted_info() {?>

<span class='post-author'>Created by : <?php the_author_posts_link();?> </span>
<span class='post-time'>posted :<a href="<?php esc_url(get_permalink()) ?>"><span style="padding-top:.3rem"> <?php echo human_time_diff(get_post_time( 'U' ) ,current_time( 'timestamp' ));?></span></a> ago</span>
<?php 
}
function sunset_posted_meta() {?>

    <span class='post-author float-left'><i class="fas fa-tags"></i><?php the_category( ' | ');?> </span>
    <span class='post-comments float-right'>
            <?php 
            if(comments_open()){?>
                <i class='fas fa-comments'></i> 
                <?php comments_popup_link("no comments" , "one comment" , "% comments" , "post-comments" , "comments are disable");
            }else{
                echo ( ' sorry comments of this post are closed');
            }
            ; ?> 
    </span>
<?php 
} 
function add_share_media() {
?>
            <div class="share-option">
                <?php 
                $title = get_the_title();
                $permalink = get_permalink();
                $twitter_handler =  ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );
                $twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
                $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
                $google = 'https://plus.google.com/share?url=' . $permalink;
                ?>
                <div class="btn-group share-media">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-share"></i>
                    </button>
                    <div class="dropdown-menu">
                        <p>share </p>
                        <a href="<?php echo $twitter ;?>" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo  $facebook;?>" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a>
                        <a href="<?php echo $google; ?>" target="_blank" rel="nofollow"><i class="fab fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
<?php
}
function add_sidebar_support() {
    register_sidebar(
        array(
        'name'          => 'main sidebar',
        'id'            => 'signle-page-sidebar',
        'description'   => 'this is the main sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'class'         => 'main_sidebar',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
        ));
    }
add_action('widgets_init', 'add_sidebar_support');
