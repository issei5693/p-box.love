<?php
/*
Template Name: blog
*/
?>

<?php get_header(); ?>

  <main class="blog">
      <?php if(get_category($cat)->parent == 0): ?>
        <h1 class="pege-title">
          <span style="font-weight: bold;">BLOG</span>
        </h1>
      <?php else: ?>
        <p class="pege-title">
          <span style="font-weight: bold;">BLOG</span>
        </p>
      <?php endif; ?>

      <div class="bread-crumb">
        <div class="site-width">
          <ul class="list-inline-block">
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <?php
            $category = get_category($cat);
            if( $category->parent ==  0 ): ?>
              <li><?php echo strtoupper($category->slug); ?></li>
            <?php else: ?>
              <li><a href="<?php echo get_category_link(get_the_category()[0]->parent); ?>"><?php echo strtoupper(get_category(get_the_category()[0]->parent)->slug); ?></a></li>
              <li><?php echo $category->name; ?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <div class="top">
        <section class="section1">
          <div class="site-width">
            <?php if(get_category($cat)->parent == 0): ?>
              <p class="header-line1">最新記事<?php if($paged){ echo'（'.$paged.'ページ目）';}?></p>
            <?php else: ?>
              <h1 class="header-line1">「<?php echo get_category($cat)->name; ?>」の最新記事<?php if($paged){ echo'（'.$paged.'ページ目）';}?></h1>
            <?php endif; ?>
            <ul class="post-list list-inline-block">

              <?php
    					$args = array(
              'cat' => $cat,
              'paged' => $paged,
    					'posts_per_page' => $GLOBALS['wp_query']->posts_per_page
    					);

    					$the_query = new WP_Query( $args );

    					if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <li>
                <a href="<?php the_permalink(); ?>" class="cf">
                  <figure class="w30">
                    <?php
                      if (has_post_thumbnail()):
                        the_post_thumbnail('full');
                      else: ?>
                      <img src="http://dummyimage.com/100x100/000/ffffff&text=no-image" alt="ダミーテキスト">
                    <?php endif;  ?>
                  </figure>
                  <ul class="post-info w70">
                    <li><time><?php the_time('Y/m/d'); ?></time></li>
                    <li class="post-title"><?php the_title(); ?></li>
                    <li>
                      <ul class="post-category list-inline-block">
                      <?php
                      foreach( get_the_category() as $category ): ?>
                        <li><?php echo $category->name; ?></li>
                      <?php endforeach; ?>
                      </ul>
                    </li>
                  </ul>
                  <p class="post-excerpt w100"><?php the_excerpt(); ?></p>
                </a>
              </li>

              <?php endwhile; else: ?>

              <li>記事はありません</li>

              <?php endif; ?>

              <?php wp_reset_postdata(); ?>

            </ul>

          </div><!-- /.site-width -->
        </section>

        <section class="section2">
          <div class="pager">
            <div class="site-width">
              <?php wp_pagenavi(array('query' => $the_query)); ?>
            </div><!-- /.site-width -->
          </div><!-- /.pager -->
        </section>

        <section class="section3">
          <div class="site-width">
            <dl class="dl-2 cf">
              <dt>カテゴリ</dt>
              <dd>
                <ul class="category-list list-inline-block">
                <?php
                  foreach( get_categories('hierarchical=0') as $category ): ?>
                  <li>
                    <a href="<?php echo get_category_link($category->term_id); ?>" <?php if($category->term_id==$cat){ echo 'class="select"';} ?>><?php echo $category->name; ?></a>
                  </li>
                <?php endforeach; ?>
                </ul>
              </dd>
            </dl>
          </div><!-- /.site-width -->
        </section><!-- /. -->
      </div><!-- /.top -->
    </main>

<?php get_footer(); ?>
