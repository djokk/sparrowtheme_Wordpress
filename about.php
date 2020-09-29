<?php
    /*
        Template Name: Шаблон для страницы About
    */
?>
<?php get_header(); ?>
<!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_field('page-name'); ?><span>.</span></h1>

            <p><?php the_field('page-description'); ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>

               <?php the_content(); ?>

               <div class="row">

                  <div id="team-wrapper" class="bgrid-halves cf">

                  <?php
                      $team = new WP_Query([
                         'post_type' => 'team',
                         'posts_per_page' => -1
                      ])
                  ?>
                  <?php if($team->have_posts()): while($team->have_posts()): $team->the_post(); ?>
                     <div class="column member">

                        <?php the_post_thumbnail(); ?>

                        <div class="member-name">
                           <h5><?php the_title(); ?></h5>
                           <span><?php the_field('job'); ?></span>
                        </div>

                        <?php the_content(); ?>


            			</div>
                  <?php endwhile;endif; ?>

                  </div> <!-- Team wrapper End -->

               </div> <!-- row End -->

            </section> <!-- section end -->

         </div> <!-- primary end -->

         <div id="secondary" class="four columns end">

           <?php get_sidebar('about'); ?>

         </div> <!-- secondary End-->

      </div> <!-- page-content End-->

   </div> <!-- Content End-->
   <?php get_footer(); ?>