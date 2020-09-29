<?php
    /*
        Template Name: Шаблон portfolio single
        Template Post Type: portfolio
    */
?>
<?php get_header(); ?>


   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

                  <h1><?php the_title(); ?></h1>

                  <div class="entry-description">

                     <?php the_content(); ?>

                  </div>

                  <ul class="portfolio-meta-list">
						   <li><span>Date: </span><?php the_field('portfolio-date'); ?></li>
						   <li><span>Client </span><?php the_field('portfolio-client'); ?></li>
						   <li><span>Skills: </span><?php the_field('portfolio-skills'); ?></li>
				      </ul>

                  <a class="button" href="<?php the_field('portfolio-link'); ?>">View project</a>

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

               <div class="entry-media">

                  <?php the_post_thumbnail(); ?>


               </div>

               <div class="entry-excerpt">

				      <p><?php the_field('portfolio-description'); ?></p>

					</div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

         <ul class="post-nav cf">
            <li class="prev"><?php previous_post_link('%link','<strong>Previous Entry</strong> %title'); ?></li>
            <li class="next"><?php next_post_link('%link','<strong>Next Entry</strong> %title'); ?></li>
		</ul>

      </div>

   </div> <!-- content End-->
   
   <?php get_footer(); ?>