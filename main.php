<?php
    /*
        Template Name: Главная
    */
?>

<?php get_header('about'); ?>
  <!-- Intro Section
   ================================================== -->
  <section id="intro">

    <!-- Flexslider Start-->
    <div id="intro-slider" class="flexslider">

      <ul class="slides">

      
        <?php $slider = new WP_Query([
          'post_type' => 'slider',
          'posts_per_page' => -1
        ]); ?>
        <?php if($slider->have_posts()): while($slider->have_posts()): $slider->the_post(); ?>
        <li>
          <div class="row">
            <div class="twelve columns">
              <div class="slider-text">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
              </div>
              <div class="slider-image">
                <?php the_post_thumbnail(); ?>
              </div>
            </div>
          </div>
        </li>
        <?php endwhile;endif; ?>

      </ul>

    </div> <!-- Flexslider End-->

  </section> <!-- Intro Section End-->

  <!-- Info Section
   ================================================== -->
  <section id="info">

    <div class="row">

      <div class="bgrid-quarters s-bgrid-halves">

        <?php dynamic_sidebar('text_widgets'); ?>

      </div>

    </div>

  </section> <!-- Info Section End-->

  <!-- Works Section
   ================================================== -->
  <section id="works">

    <div class="row">

      <div class="twelve columns align-center">
        <h1>Some of our recent works.</h1>
      </div>

      <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

        <?php $portfolio = new WP_Query([
          'post_type' => 'portfolio',
          'posts_per_page' => 4
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

    </div>
  
  </section> <!-- Works Section End-->

  <!-- Journal Section
   ================================================== -->
  <section id="journal">

    <div class="row">
      <div class="twelve columns align-center">
        <h1>Our latest posts and rants.</h1>
      </div>
    </div>

    <div class="blog-entries">
        
    <?php 
    $main_post = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 3
    ])
    ?>

    <?php if($main_post->have_posts()): while($main_post->have_posts()): $main_post->the_post(); ?>

      <article class="row entry">

        <div class="entry-header">

          <div class="permalink">
            <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
          </div>

          <div class="ten columns entry-title pull-right">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a></h3>
          </div>

          <div class="two columns post-meta end">
            <p>
              <time datetime="2014-01-31" class="post-date" pubdate=""><?php the_time('M j, Y'); ?></time>
              <span class="dauthor">By <?php the_author(); ?></span>
            </p>
          </div>

        </div>

        <div class="ten columns offset-2 post-content">
          <!-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.
            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.
            <a class="more-link" href="single.html">Read More<i class="fa fa-arrow-circle-o-right"></i></a></p> -->
            <?php the_excerpt(); ?>
        </div>

      </article>
      
    <?php endwhile; endif; ?>

    </div> <!-- Entries End -->

  </section> <!-- Journal Section End-->




<?php get_footer(); ?>