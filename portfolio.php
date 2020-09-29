<?php
    /*
        Template Name: Шаблон для страницы Portfolio
    */
?>
<?php get_header(); ?>

<!-- Page Title
   ================================================== -->
<div id="page-title">

   <div class="row">

      <div class="ten columns centered text-center">
         <h1><?php the_field('page-name') ?><span>.</span></h1>

         <p><?php the_field('page-description'); ?></p>
      </div>

   </div>

</div> <!-- Page Title End-->

<!-- Content
   ================================================== -->
<div class="content-outer">

   <div id="page-content" class="row portfolio">

      <section class="entry cf">

         <div id="secondary" class="four columns entry-details">

            <?php the_content(); ?>

         </div> <!-- Secondary End-->

         <div id="primary" class="eight columns portfolio-list">

            <div id="portfolio-wrapper" class="bgrid-halves cf">

            <?php $portfolio = new WP_Query([
               'post_type' => 'portfolio',
               'posts_per_page' => -1
            ]) ?>
            
            
            <?php if($portfolio->have_posts()): while($portfolio->have_posts()): $portfolio->the_post(); ?>
               <div class="columns portfolio-item">
                  <div class="item-wrap">
                     <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <div class="overlay"></div>
                        <div class="link-icon"><i class="fa fa-link"></i></div>
                     </a>
                     <div class="portfolio-item-meta">
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php the_field('portfolio-subtitle'); ?></p>
                     </div>
                  </div>
               </div>
            <?php endwhile;endif; ?>
               
               
            </div>

         </div> <!-- primary end-->

      </section> <!-- end section -->

   </div> <!-- #page-content end-->

</div> <!-- content End-->



<?php get_footer(); ?>