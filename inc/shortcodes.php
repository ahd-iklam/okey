<?php 
/*
====================
shortcode options
[tooltip placement = " top" title="this is the tooltip content"] [/tooltip]
====================
*/
function activate_tooltip( $atts, $content = null) {
    //get attributes
    $atts =shortcode_atts(
        array(
            'placement' => 'top',
            'title'     => '',
        ),
        $atts,
        'tooltip'
    );
    $title = ($atts['title'] == "" ? $content : $atts['title']);
    //return HTML
     return '
     <span class="my-theme-tooltip" data-toggle="tooltip" data-placement="'. $atts['placement'] .'" title="'. $title .'">'.$content.'</span>
     ';

}
add_shortcode('tooltip' , 'activate_tooltip');

// Contact Form shortcode
function theme_contact_form( $atts, $content = null ) {
	
	//[contact_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);
	
	//return HTML
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();
	
}
add_shortcode( 'contact_form', 'theme_contact_form' );