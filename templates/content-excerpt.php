<?php if ( has_post_thumbnail() ) { ?>

    <div class="post-thumbnail">

    	<?php the_post_thumbnail( 'air-thumb-300' ); ?>

    </div>

<?php } ?>

<?php the_excerpt(); ?>