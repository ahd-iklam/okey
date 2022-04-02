<?php
/*
===================================
            ADMIN PAGE
===================================
*/

function sunset_add_admin_page() {
    // generate sunset admin page  
    add_menu_page('Sunset Theme Options' , 'Control' , 'manage_options', 'iklam_sunset','sunset_theme_create_page','dashicons-lightbulb', 76);

    // generate admin sub pages
    add_submenu_page('iklam_sunset' , 'Sunset Sidebar Options' , 'Sidebar' , 'manage_options' , 'iklam_sunset');
    // generate theme support sub pages
    add_submenu_page('iklam_sunset' , 'sunset theme option' , 'Theme Options' , 'manage_options' , 'iklam_sunset_theme' , 'sunset_theme_support_page');

// generate custom css  sub pages
    add_submenu_page('iklam_sunset' , 'Sunset css Options' , 'Custom Css' , 'manage_options' , 'iklam_sunset_css' , 'sunset_settings_page');
    add_submenu_page('iklam_sunset' , 'Sunset contact form' , 'Contact Form' , 'manage_options' , 'iklam_sunset_theme_contact' , 'sunset_contact_form_page');


// activate custom settings 
add_action('admin_init' , 'sunset_custom_settings' );

} // end of sunset add admin page function


//callback of  sunset_add_admin_page
function sunset_theme_create_page(){ 
require_once (get_template_directory() .'/inc/templates/sunset-admin.php');
}

// callback of generate custom css subpages
function sunset_settings_page(){
    require_once (get_template_directory() .'/inc/templates/sunset-custom-css.php');
}

/*------------------------- START callback of activate custom settings ------------------------------*/

function sunset_custom_settings(){
//------------- start Registers a setting and its data
    register_setting('sunset-settings-group' , 'profile_picture'); 
    register_setting('sunset-settings-group' , 'first_name'); 
    register_setting('sunset-settings-group' , 'last_name'); 
    register_setting('sunset-settings-group' , 'user_description'); 
    register_setting('sunset-settings-group' , 'twitter_handler' , 'sunset_sanitize_twitter_handler'); 
    register_setting('sunset-settings-group' , 'facebook_handler'); 
    register_setting('sunset-settings-group' , 'google_handler');
    // register post format setting
    register_setting('sunset-theme-support' , 'post_formats' ); 
    register_setting('sunset-theme-support' , 'custom_background'); 
    register_setting('sunset-theme-support' , 'custom_header'); 



//Add a new section to a settings page.
    add_settings_section('sunset-sidebar-options' , ' sidebar options' , 'sunset_sidebar_options' , 'iklam_sunset');
    add_settings_section('sunset-theme-options' , ' theme options' , 'sunset_theme_options' , 'iklam_sunset_theme');  
   

//Add a new field to a section of a settings page
    add_settings_field('sidebar-profile-picture' , 'your picture', 'sunset_sidebar_picture' , 'iklam_sunset' , 'sunset-sidebar-options');
    add_settings_field('sidebar-name' , 'first Name', 'sunset_sidebar_name' , 'iklam_sunset' , 'sunset-sidebar-options');
    add_settings_field('sidebar-twitter' , 'twitter handler', 'sunset_sidebar_twitter' , 'iklam_sunset' , 'sunset-sidebar-options'); 
    add_settings_field('sidebar-description' , 'Description', 'sunset_sidebar_description' , 'iklam_sunset' , 'sunset-sidebar-options');
    add_settings_field('sidebar-facebook' , 'facebook handler', 'sunset_sidebar_facebook' , 'iklam_sunset' , 'sunset-sidebar-options'); 
    add_settings_field('sidebar-google' , 'google handler', 'sunset_sidebar_google' , 'iklam_sunset' , 'sunset-sidebar-options'); 

    add_settings_field('post-formats' , 'post formats', 'sunset_post_formats' , 'iklam_sunset_theme' , 'sunset-theme-options'); 
    add_settings_field('custom-background', 'Custom Background', 'sunset_custom_background' , 'iklam_sunset_theme' , 'sunset-theme-options'); 
    add_settings_field('custom-header', 'Custom Header', 'sunset_custom_header' , 'iklam_sunset_theme' , 'sunset-theme-options'); 

    // CONTACT FORM OPTIONS
    register_setting('sunset-contact-option' , 'activate_contact' );
    add_settings_section('sunset-contact-section' , ' contact form' , 'sunset_contact_section' , 'iklam_sunset_theme_contact');  
    add_settings_field('Activate Form', 'Activate Contact Form', 'sunset_activate_contact' , 'iklam_sunset_theme_contact' , 'sunset-contact-section'); 


}
//start callback of Add a new section to a settings page
    function sunset_sidebar_options(){
    echo ('customize your sidebar information');
}

// end callback of Add a new section to a settings page

//callback of profile picture
function sunset_sidebar_picture(){
    $profile= esc_attr(get_option('profile_picture')) ;
    echo(' <input type = "button" value = "your profile picture" id="upload-button">
     <input type="hidden" name = "profile_picture" class="profile-picture" value = "'.$profile.'" >');
}

//callback of Add a new field to a section of a settings page.
    function sunset_sidebar_name() {
        $firstName = esc_attr(get_option('first_name')) ;
        $lastName = esc_attr(get_option('last_name')) ;
        echo('
        <input type="text" name = "first_name" value = "'.$firstName.'" placeholder="First Name">
        <input type="text" name = "last_name" value = "'.$lastName.'" placeholder="Last Name">
        ');
}

//callback of user description
function sunset_sidebar_description(){
    $description = esc_attr(get_option('user_description')) ;
    echo('
    <textarea type="text" name = "user_description" value = "'. $description.'" placeholder="user description" rows="4" cols="50" style="resize:none"></textarea><p>write brefly and smartest</p>');
}
//callback of twitter handler 
    function sunset_sidebar_twitter(){
        $twitter = esc_attr(get_option('twitter_handler')) ;
        echo('
        <input type="text" name = "twitter_handler" value = "'.$twitter.'" placeholder="twitter handler"> <span> input your twitter username without @ character</span>');
}
//callback of sanitization  twitter handler  
    function sunset_sanitize_twitter_handler($input){
    $output = sanitize_text_field($input) ;
    $output = str_replace('@' , '' ,$output );
    return $output;

}
//callback of facebook handler 
    function sunset_sidebar_facebook(){
        $facebook = esc_attr(get_option('facebook_handler')) ;
        echo('
        <input type="text" name = "facebook_handler" value = "'. $facebook.'" placeholder="facebook handler">');
}
//callback of google handler 
    function sunset_sidebar_google(){
        $google = esc_attr(get_option('google_handler')) ;
        echo('
        <input type="text" name = "google_handler" value = "'. $google.'" placeholder="google handler">');
}
/*------------------------- END OF callback of activate custom settings ------------------------------*/

/* --------------------------------- START THEME SUPPORT  CALLBACK FUNCTION  ----------------------------------*/


function sunset_theme_options(){
    echo ('activate and deactivate specific theme support options');
    }
// callback of theme options
    function sunset_theme_support_page() {
        require_once (get_template_directory() .'/inc/templates/sunset-theme-support.php');
    }

// callback of theme formats 
    function sunset_post_formats(){
        $options = get_option('post_formats');
        $formats = array('aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio');
        $output = '';
        foreach($formats as $format){
            $checked = ($options[$format] == 1 ? 'checked' : '');
            $output .=' <input type = "checkbox" id = "'.$format.'" name = "post_formats['. $format .']" value = "1" '.$checked.' > '.$format.'<br>';
        }
        echo $output;
    }

    function sunset_custom_header(){
        $options = get_option('custom_header');
            $checked = ($options == 1 ? 'checked' : '');
            echo'<label> <input type = "checkbox" id = "custom_header" name = "custom_header" value = "1" '.$checked.' > activate custom header </label> '.$format.'<br>';

    }
    function sunset_custom_background(){
        $options = get_option('custom_background');
            $checked = ($options == 1 ? 'checked' : '');
            echo'<label> <input type = "checkbox" id = "custom_background" name = "custom_background" value = "1" '.$checked.' > activate custom background </label> '.$format.'<br>';

    }
 /*----------------------------------- END THEME SUPORT CALLBACK FUNCTIONS---------------------------------------------------------*/
 /* --------------------------------- START CONTACT FORM  CALLBACK FUNCTION  ----------------------------------*/
 function sunset_contact_form_page() {
    require_once (get_template_directory() .'/inc/templates/sunset-contact-form.php');
}
function sunset_contact_section(){
   echo ('activate and deactivate the built In contact form ');
}
function sunset_activate_contact(){
    $options = get_option('activate_contact');
            $checked = ($options == 1 ? 'checked' : '');
            echo'<label> <input type = "checkbox" id = "activate_contact" name = "activate_contact" value = "1" '.$checked.' > activate Contact Form </label> '.$format.'<br>';
}
 /*----------------------------------- END CONTACT FORM  CALLBACK FUNCTION ---------------------------------------------------------*/
add_action('admin_menu' , 'sunset_add_admin_page');

?>