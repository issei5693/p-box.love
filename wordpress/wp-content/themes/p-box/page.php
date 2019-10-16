<?php
/*
Template Name: dfault
*/
?>

<?php get_header(); ?>

<main class="menu">
      <h1 class="pege-title">
        <span>MENU</span>
      </h1>
      <div class="bread-crumb">
        <div class="site-width">
          <ul class="list-inline-block">
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><?php the_title(); ?></li>
          </ul>
        </div>
      </div>

      <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>

    </main>

<?php get_footer(); ?>
