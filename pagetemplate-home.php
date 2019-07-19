<?php 
/*
Template Name: Home Page
*/

get_header(); ?>
<div id="front-pic">
<?php

		while ( have_posts() ) : the_post();
			the_content();
		endwhile;		
?>
</div>
<?php
		wp_reset_query();
		query_posts( array ( 'category_name' => 'home-top', 'posts_per_page' => 1 ) );

		if ( have_posts() ) {
          while ( have_posts() ) { 
              the_post();
?>   			
    			<div id="front-first">
    			<section>
    			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    			<header>
    			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    			</header>
    			<?php the_content(); ?>
    			</article>
    			</section>
    			</div>
 <?php
          }
        }
?>
    			<div id="front-bottom">
<?php
		wp_reset_query();
		query_posts( array ( 'category_name' => 'home-page', 'posts_per_page' => 3 ) );

		if ( have_posts() ) {
          while ( have_posts() ) { 
              the_post();        
 ?>                                   

    			<div class="content-third">
    			<section>
    			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    			<header>
    			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    			</header>
    			<?php the_content(); ?>
    			</article>
    			</section>
    			</div>
<?php	
            }
        } 
?>
	</div>
<?php

        wp_reset_query();

        get_footer(); 
?>