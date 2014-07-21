<?php get_header(); ?>

  <?php 
    if (have_posts()) { ?>
      <ul>
        <?php while ( have_posts() ) : the_post(); ?>
          <li>
            <?php the_title() ?>: 
            <?php echo get_post_meta(get_the_ID(), 'atom_value', true ); ?>
          </li>
        <?php endwhile; ?>
      </ul>
	<?php } else { ?>
	  <p>Not found</p>	  
	<?php } ?>

<?php get_footer(); ?>