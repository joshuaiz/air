<?php
/*
 Template Name: Full Width Page
 * 
 * No Sidebar on this page.
 * 
*/
?>

<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="w-full">

			<main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/Blog">

				<?php // Edit the loop in /templates/loop. Or roll your own. ?>
				<?php get_template_part( 'templates/loop'); ?>

			</main>

		</div>

	</div>

<?php get_footer(); ?>
