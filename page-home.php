<?php
/*
 Template Name: Home Page
 * 
 * Use this template for a static home page. 
 * If you don't need the main loop, remove it
 * and get busy.
*/
?>

<?php get_header(); ?>

	<div id="content" class="">

		<div id="inner-content" class="px-6 max-w-7xl mx-auto content-sidebar">

			<main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/Blog">

				<?php // Edit the loop in /templates/loop. Or roll your own. ?>
				<?php get_template_part( 'templates/loop'); ?>

            </main>
            
            <?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
