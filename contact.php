<?php
    /*
        Template Name: Шаблон для страницы Contact
    */
?>
<?php get_header(); ?>
<!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_field('page_title') ?><span>.</span></h1>

            <p><?php the_field('page_subtitle'); ?></p>
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

              <div id="contact-form">

                 <?php dynamic_sidebar('contact-form'); ?>

                  <!-- contact-warning -->
                  <div id="message-warning"></div>
                  <!-- contact-success -->
      				<div id="message-success">
                     <i class="icon-ok"></i>Your message was sent, thank you!<br />
      				</div>

               </div>

            </section> <!-- section end -->

         </div>

         <div id="secondary" class="four columns end">

         <?php get_sidebar('about'); ?>

         </div>

      </div>

   </div> <!-- Content End-->
   
   <?php get_footer(); ?>