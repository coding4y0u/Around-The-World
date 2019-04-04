<?php get_header(); ?>

<section class="upcoming-tours">
  <h2><span>Upcoming Travels</span></h2>
  <?php
   $args = array(
     'post_type'      => 'tours',
     'orderby'        => 'menu_order',
     'order'          => 'ASC',
     'posts_per_page' => 3
   );
  ?>
  <ul>
   <?php $tours = new WP_Query($args); ?>
   <?php while($tours->have_posts()): $tours->the_post(); ?>
    
   <li class="grid1-3">
            <div class="image">
              <a href="">
              <img class="more" src="<?php echo get_stylesheet_directory_uri(); ?>/img/moreinfo.png" alt="">
            </a>
            <?php my_responsive_thumbnail(get_the_ID()); ?>
         </div><!-- image -->
         <div class="content-tours">
         <?php // Dates
         $format = 'd F, Y';
         $date =  strtotime(get_field('departure_date'));
         $departureDate = date_i18n($format, $date);

         $returningDate =  strtotime(get_field('returning_date'));
         $returningDate = date_i18n($format, $returningDate);
        ?>
        <div class="date-price clear">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p class="date">
            <?php echo $departureDate . ' - ' . $returningDate; ?>
          </p>
        </div><!-- date-price -->
         </div>

  <?php endwhile; wp_reset_postdata(); ?>
  </ul>
</section>

<div class="bottom-content">
  <section class="latest-entries grid2-3">
    <h2><span>Travel Tips From our Blog</span></h2>

    <ul>
    <?php $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 2 
    );
      ?>
      <?php $tips = new WP_Query($args);
      while($tips->have_posts()): $tips->the_post();
      ?>
 
      <li class="clear">
        <div class="image-tips grid1-3">
          <?php the_post_thumbnail('medium'); ?>
        </div><!--image-tips-->
        <div class="content-tip grid2-3 omega">
          <h3><?php the_title(); ?></h3>
          <?php html5wp_excerpt('html5wp_index'); ?>
        </div>
      </li>

      <?php endwhile; wp_reset_postdata(); ?>
    </ul>
  </section><!--latest-entries-->
  <section class="latest-testimonials grid1-3">
    <h2><span>Testimonials</span></h2>
    <?php $args = array(
          'post_type'     => 'testimonial',
          'post_per_page' => 2,
          'orderby'       => 'date',
          'order'         => 'DESC',
        ); ?> 
        <ul>
        <?php
         $testimonial = new WP_Query($args); while($testimonial->have_posts()): $testimonial->the_post(); ?>
 
         <li>
           <div class="testimonial-content quote">
           <?php html5wp_excerpt('html5wp_custom_post'); ?>
           <div class="from-testimonial">
             <?php $name = get_field('person_name'); ?>
             <?php $from = get_field('from'); ?>
             <p><strong><?php echo $name . ', ' . $from; ?></strong></p>
           </div>
           </div>
         </li>

      <?php endwhile; wp_reset_postdata(); ?>

      <a href="<?php echo get_permalink(12); ?>" class="button">View All</a>
  </section><!--latest-testimonials-->
</div>

<?php get_footer(); ?>