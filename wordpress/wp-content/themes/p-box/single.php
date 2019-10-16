<?php get_header(); ?>

  <main class="blog">
      <p class="pege-title">
        <span>BLOG</span>
      </p>
      <div class="bread-crumb">
        <div class="site-width">
          <ul class="list-inline-block">
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><a href="<?php echo get_category_link(get_the_category()[0]->parent); ?>"><?php echo strtoupper(get_category(get_the_category()[0]->parent)->slug); ?></a></li>
            <li><a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>"><?php echo get_the_category()[0]->name; ?></a></li>
            <li><?php the_title(); ?></li>
          </ul>
        </div>
      </div>

      <div class="single">
        <div class="site-width cf">
          <div class="w70">
            <div class="post">
              <h1 class="header-line2"><?php the_title(); ?></h1>
              <ul class="post-info">
                <li><time><?php the_time('Y/m/d'); ?></time></li>
                <li>
                  <ul class="list-inline-block">
                    <?php
                    foreach( get_the_category() as $category ): ?>
                    <li><?php echo $category->name; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              </ul>
              <div class="content">
                <figure>

                </figure>
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; endif; ?>
              </div>
              <div class="prev-next">
                <ul class="cf">
                  <li class="prev w50"><?php previous_post_link('%link' , '%title' , true ); ?></li>
                  <li class="next w50"><?php next_post_link('%link' , '%title' , true ); ?></li>
                </ul>
              </div>
            </div><!-- /.post -->
          </div>
          <div class="w30">
            <div class="sidebar">
              <h2 class="header-line1">カテゴリー</h2>
              <ul>
                <?php
                  foreach( get_categories('hierarchical=0') as $category ): ?>
                  <li>
                    <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div><!-- /.sidebar -->
          </div>
        </div>
      </div>

    </main>

<?php get_footer(); ?>
