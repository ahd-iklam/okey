<h1 style="text-align:center;"> Theme Support</h1>
<?php settings_errors();?>
<?php 

        //$options = esc_attr(get_option('user_description')) ;
?>

<form action="options.php" method = "post" class = "sunset-general-form">
    <?php  settings_fields('sunset-theme-options') ;?>
    <?php  do_settings_sections('iklam_sunset_theme'); ?>
    <?php  submit_button('save information'); ?>
</form>
