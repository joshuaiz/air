<?php
/*------------------------------------
* Theme: Air by studio.bio 
* File: WordPress Customizer functions + styles
* Author: Joshua Michaels
* URI: https://studio.bio/themes/air
*------------------------------------
*
* We've moved all of the customizer stuffs here 
* so if you don't need it, remove the include 
* statement at the top of `functions.php`.
*
*/

/****************************************
WordPress Theme Customizer 

Air includes full support for some of 
the core controls for the WP Customizer.

Edit these or add your own. The customizer
has come a long way in the past couple years
but good developer documentation is sparse.

Some good info here if you want to go deep: 
https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-1/
https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2/

****************************************/

add_action( 'customize_register', 'air_register_theme_customizer' );

function air_register_theme_customizer( $wp_customize ) {

    // Uncomment this to see what's going on if you make a lot of changes
    // echo '<pre>';
    // var_dump( $wp_customize );  
    // echo '</pre>';

    // Customize title and tagline sections and labels
    $wp_customize->get_section( 'title_tagline' )->title = __( 'Site Name and Description', 'airtheme' );  
    $wp_customize->get_control( 'blogname' )->label = __( 'Site Name', 'airtheme' );  
    $wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description', 'airtheme' );  
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Customize the Front Page Settings
    $wp_customize->get_section( 'static_front_page' )->title = __( 'Homepage Preferences', 'airtheme' );
    $wp_customize->get_section( 'static_front_page' )->priority = 20;
    $wp_customize->get_control( 'show_on_front' )->label = __( 'Choose Homepage Preference:', 'airtheme' );  
    $wp_customize->get_control( 'page_on_front' )->label = __( 'Select Homepage:', 'airtheme' );  
    $wp_customize->get_control( 'page_for_posts' )->label = __( 'Select Blog Homepage:', 'airtheme' );  

    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'airtheme' );  
    $wp_customize->get_control( 'background_color' )->section = 'background_image'; 

    // Customize Header Image Settings  
    $wp_customize->add_section( 'header_text_styles' , array(

        'title'      => __( 'Header Text Styles', 'airtheme' ), 
        'priority'   => 30

        ) 
    );

    $wp_customize->get_control( 'display_header_text' )->section = 'header_text_styles';  
    $wp_customize->get_control( 'header_textcolor' )->section = 'header_text_styles'; 
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage'; 

}


// Custom scripts + styles for theme customizer
add_action( 'customize_preview_init', 'air_customizer_scripts' );

function air_customizer_scripts() {

    wp_enqueue_script( 'air_theme_customizer', get_template_directory_uri() . '/library/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '', true);

    // register customizer stylesheet
    wp_register_style( 'air-customizer', get_template_directory_uri() . '/library/css/customizer.css', array(), '', 'all' );
   
    wp_enqueue_style( 'air-customizer' );

}


// Callback function for updating header styles
function air_style_header() {

    $text_color = get_header_textcolor();
  
    ?>
  
    <style type="text/css">

        header.header .site-title a {
            color: #<?php echo esc_attr( $text_color ); ?>;
        }
      
        <?php if( display_header_text() != true ): ?>
            .site-title, .site-description {
                display: none;
            } 
        <?php endif; ?>

        #banner .header-image {
            max-width: 100%;
            height: auto;
        }

        .customize-control-description {
            font-style: normal;
        }

    </style>

  <?php 

}