<?php
/*------------------------------------
 * Theme: Air by studio.bio 
 * File: Admin custom functions
 * Author: Joshua Michaels
 * URI: https://studio.bio/themes/air
 *------------------------------------
 *
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard and other adminifications.
 *
 */

/*********************
REMOVE DASHBOARD WIDGETS
Clean up the Dashboard, yo.
*********************/

// Comment some of these out if you want those dashboard widgets to show.
// Still, a clean dashboard is cool. No one likes a mess.
add_action('wp_dashboard_setup', 'air_remove_dashboard_widgets');

function air_remove_dashboard_widgets() {

    remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
    remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
    remove_meta_box('dashboard_primary','dashboard','side'); // WordPress.com Blog
    remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
    remove_meta_box('dashboard_incoming_links','dashboard','normal'); // Incoming Links
    remove_meta_box('dashboard_plugins','dashboard','normal'); // Plugins
    remove_meta_box('dashboard_right_now','dashboard', 'normal'); // Right Now
    remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
    remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
    remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
    remove_action('welcome_panel','wp_welcome_panel'); // WP Welcome

}

/** 
 * Dashboard Widget
 * 
 * Add your own widget to the dashboard in the WP Admin.
 * Great to add instructions or info for clients.
 *  
 * If you don't need/want this, just remove it or 
 * comment it out.
 * 
 * Customize it...yeaaaahhh...but don't criticize it.
 * 
 */

function air_add_dashboard_widgets() {

    // Call the built-in dashboard widget function with our callback
    wp_add_dashboard_widget(
        'air_dashboard_widget', // Widget slug. Also the HTML id for styling in admin.css.
        __( 'Welcome to air!', 'airtheme' ), // Title.
        'air_dashboard_widget_init' // Display function (below)
    );
}
add_action( 'wp_dashboard_setup', 'air_add_dashboard_widgets' );

// Create the function to output the contents of our Dashboard Widget.
function air_dashboard_widget_init() {

    // helper vars for links and images and stuffs.
    $url = get_admin_url();
    $img = get_template_directory_uri() . '/library/images/logo.svg';

    echo '<div class="dashboard-image"><img src=' . $img . ' width="96" height="96" /></div>';
    echo '<h3>You\'ve arrived at the WordPress Dashboard aka the \'Site Admin\' or \'WordPress Admin\' or simply the \'Admin\'.</h3>'; 
    echo '<p><strong>Thank you for using the <a href="https://github.com/joshuaiz/air" target="_blank">air</a> theme by <a href="https://studio.bio/" target="_blank">studio.bio</a>!</strong></p>'; 
    echo '<p>You can add your own message(s) or HTML here. Edit the <code>air_dashboard_widget_init()</code> function in <code>admin.php</code> at line 72. Styles are in <code>admin.css</code>. Or if you don\'t want or need this, just delete the function. Have it your way.</p>';
    echo '<p>This is a great place for site instructions, links to help or resources, and to add your contact info for clients.</p>';
    echo '<p>Make sure to remind them about the <code>Screen Options</code> tab on the top right. Often clients do not know about that and that they can show or hide or rearrange these Dashboard Widgets or show/hide boxes on any edit screen.</p>';
    
}

/*********************
CUSTOM LOGIN PAGE
Customize it, we don't criticize it.
*********************/

// calling your own login css so you can style it

// Updated to proper 'enqueue' method
// http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function air_login_css() {
	wp_enqueue_style( 'air_login_css', get_template_directory_uri() . '/library/css/admin/login.css', false );
}

// changing the logo link from wordpress.org to your site
function air_login_url() { 
    return home_url(); 
}

// changing the alt text on the logo to show your site name
function air_login_title() { 
    return get_option( 'blogname' ); 
}

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'air_login_css', 10 );
add_filter( 'login_headerurl', 'air_login_url' );
add_filter( 'login_headertitle', 'air_login_title' );


/*********************
CUSTOMIZE ADMIN
Customize it, and I'll advertise it.
*********************/

/*
I don't really recommend editing the admin too much
as things may get wonky if WordPress updates. Here
are a few functions which you can choose to use if
you like.
*/


// Load admin-specific styles. Edit in /css/admin/admin.css.
function air_admin_css() {
    wp_enqueue_style( 'air_admin_css', get_template_directory_uri() . '/library/css/admin/admin.css', false );
}
add_action( 'admin_enqueue_scripts', 'air_admin_css', 10 );


// Custom Backend Footer
// adding it to the admin area
add_filter( 'admin_footer_text', 'air_custom_admin_footer' );

function air_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="https://studio.bio" target="_blank">studio.bio</a></span>. Built using <a href="https://studio.bio/themes/air" target="_blank">Air</a>.', 'airtheme' );
}

?>