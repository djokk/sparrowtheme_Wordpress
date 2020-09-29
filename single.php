<?php get_header(); ?>

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">
         
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <article class="post">

               <div class="entry-header cf">

                  <h1><?php the_title(); ?></h1>

                  <p class="post-meta">

                     <time class="date" datetime="2014-01-14T11:24"><?php the_time('M d, Y'); ?></time>
                     /
                     <span class="categories">
                     <?php the_category(' / '); ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                    <?php the_post_thumbnail(); ?>
               </div>

               <div class="post-content">
                <?php the_content(); ?>
               </div>

            </article> <!-- post end -->
        <?php endwhile; endif; ?>

            <!-- Pagination -->


         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

            <?php get_sidebar(); ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->


  <?php get_footer(); ?>