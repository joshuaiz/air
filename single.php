<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap content-sidebar">

			<main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/Blog">

				<?php // Edit the loop in /templates/single-loop. Or roll your own. ?>
                <?php get_template_part( 'templates/single', 'loop'); ?>
                
                <?php // related posts function; uncomment below to use ?>
                <?php // plate_related_posts(); ?>

            </main>
            
            <?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
