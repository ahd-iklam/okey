

<h1 style="text-align:center;"> Sidebar Options</h1>
<?php settings_errors();?>
<?php 
        $firstName = esc_attr(get_option('first_name')) ;
        $lastName = esc_attr(get_option('last_name')) ;
        $fullName = $firstName . '  ' . $lastName;
        $description = esc_attr(get_option('user_description')) ;
?>
<div class="sunset-sidebar-prev">
    <div class="sunset-sidebar">
        <h1 class="sunset-username"><?php print $fullName ;?> </h1>
        <h2 class="sunset-description"><?php print $description ;?> </h2>
        <div class="icon-wrapper">

        </div>
    </div>
</div>
<form action="options.php" method = "post" class = "sunset-general-form">
    <?php  settings_fields('sunset-settings-group') ;?>
    <?php  do_settings_sections('iklam_sunset'); ?>
    <?php submit_button('save information'); ?>
</form>

