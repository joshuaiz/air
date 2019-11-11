<!doctype html>

<html <?php html_schema(); ?> <?php language_attributes(); ?> class="no-js">

	<head>

        <?php /**
         * updated with non-blocking order
         * see here: https://csswizardry.com/2018/11/css-and-network-performance/
         * 
         * In short, place any js here that doesn't need to act on css before any css to
         * speed up page loads.
         */
        ?>

        <?php // drop Google Analytics here ?>
        <?php // end analytics ?>

        <?php // See everything you need to know about the <head> here: https://github.com/joshbuchea/HEAD ?>
        <meta charset='<?php bloginfo( 'charset' ); ?>'>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php // favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
        <link rel="icon" href="<?php echo get_theme_file_uri(); ?>/favicon.png">
        <!--[if IE]>
            <link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/favicon.ico">
        <![endif]-->

        <!-- Apple Touch Icon -->
        <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri(); ?>/library/images/apple-touch-icon.png">

        <!-- Safari Pinned Tab Icon -->
        <link rel="mask-icon" href="<?php echo get_theme_file_uri(); ?>/library/images/icon.svg" color="#0088cc">

        <?php // updated pingback. Thanks @HardeepAsrani https://github.com/HardeepAsrani ?>
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

        <?php // put font scripts like Typekit/Adobe Fonts here ?>
        <?php // end fonts ?>

        <?php // WordPress head functions ?>
        <?php wp_head(); ?>
        <?php // end of WordPress head ?>

    </head>

	<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

		<div id="container" class="container">

			<header class="header" id="header" role="banner" itemscope itemtype="https://schema.org/WPHeader">

                <div id="inner-header" class="wrap py-4 flex items-center">

                    <?php // updated with proper markup and wrapping div for organization ?>
                    <div id="bloginfo" itemscope itemtype="https://schema.org/Organization" class="flex items-center">

                        <?php 
                        /*
                        * You can use text or a logo (or both) in your header. If you use both, 
                        * try placing them in a single link element for better accessibility.
                        */
                        ?>
                        <?php if (has_custom_logo()) { ?>

                            <div id="logo" itemprop="logo" class="w-12 mr-4">
                                <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url" title="<?php bloginfo('name'); ?>"><?php the_custom_logo(); ?></a>
                            </div>

                            <div id="site-title" class="site-title mr-4 font-bold" itemprop="name">
                                <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url" title="<?php bloginfo('name'); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>
                            
                        <?php } else { ?>

                            <div id="logo" itemprop="logo" class="w-12 mr-4">
                                <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url" title="<?php bloginfo('name'); ?>">
                                    <img src="<?php echo get_theme_file_uri(); ?>/library/images/logo.svg" itemprop="logo" alt="site logo" />
                                </a>
                            </div>

                            <div id="site-title" class="site-title mr-4 font-bold" itemprop="name">
                                <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url" title="<?php bloginfo('name'); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>

                        <?php } ?>
                        
                    </div>

                    <nav class="header-nav primary-menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php _e( 'Primary Menu ', 'airtheme' ); ?>">

                        <?php // added primary menu marker for accessibility ?>
                        <h2 class="screen-reader-text hidden"><?php _e( 'Primary Menu', 'airtheme' ); ?></h2>

                        <?php // see all default args here: https://developer.wordpress.org/reference/functions/wp_nav_menu/ ?>

                        <?php wp_nav_menu( array(

                            'container' => false,                          // remove nav container
                            'container_class' => 'menu',                   // class of container (should you choose to use it)
                            'menu' => __( 'The Main Menu', 'airtheme' ), // nav name
                            'menu_class' => 'main-menu flex items-center',       // adding custom nav class
                            'theme_location' => 'main-nav',                // where it's located in the theme
                            )
                        ); ?>

                    </nav>

                </div>

            </header>
