<h1 style="text-align:center;"> Contact Form</h1>
<?php settings_errors();?>
<p>use this <strong> shortcode</strong> to activate the contact form inside a page or a post</p>
<code>[contact_form]</code>

<form action="options.php" method = "post" class = "sunset-general-form">
    <?php  settings_fields('sunset-contact-option') ;?>
    <?php  do_settings_sections('iklam_sunset_theme_contact'); ?>
    <?php  submit_button('save information'); ?>
</form>
