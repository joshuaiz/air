<?php get_header(); ?>
	
	<div id="content">

		<div id="inner-content" class="wrap content-sidebar">

			<main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/Blog">

				<?php // Edit the loop in /templates/archive-loop. Or roll your own. ?>
				<?php get_template_part( 'templates/archive', 'loop'); ?>

            </main>
            
            <?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
