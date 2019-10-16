<?php
/*
Template Name: design
*/
?>

<?php get_header(); ?>

    <main class="design">
      <h1 class="pege-title">
        <span>DESIGN</span>
      </h1>
      <div class="bread-crumb">
        <div class="site-width">
          <ul class="list-inline-block">
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li>DESIGN</li>
          </ul>
        </div>
      </div>
      <section class="section1">
        <div class="site-width">
          <dl class="dl-2 cf">
            <dt>カテゴリ</dt>
            <dd>
              <ul class="category-list list-inline-block">
                <!-- <li><a href="" class="select">カテゴリ1</a></li> -->

                <?php
                  foreach( get_terms('design','hierarchical=0') as $term ): ?>
                  <li>
                    <a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </dd>
          </dl>
        </div><!-- /.site-width -->
      </section><!-- /.section1 -->
      <section class="section2">
        <div class="site-width">
          <ul id="designItems" class="list-inline-block">

            <?php
            $args = array(
            'post_type' => 'nail',
            'posts_per_page' => -1
            );

            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <li>
              <?php
                if (has_post_thumbnail()): ?>
                <a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), true )[0]; ?>">
                  <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), true )[0]; ?>" alt="ALTs">
                </a>
                <?php else: ?>
                <a href="http://dummyimage.com/100x100/000/ffffff&text=no-image">
                  <img src="http://dummyimage.com/100x100/000/ffffff&text=no-image" alt="ダミーテキスト">
                </a>
              <?php endif;  ?>
              <div class="image-info">
                <p><?php the_title(); ?></p>
                <p><?php the_content(); ?></p>
              </div>
            </li>

            <?php endwhile; else: ?>

            <li>記事はありません</li>

            <?php endif; ?>

            <?php //多分ここにWp-pagenavi ?>

            <?php wp_reset_postdata(); ?>

          </ul>
        </div><!-- /.site-width -->
        <!--
        <div class="pager">
          <div class="site-width">
            <ul class="list-inline-block">
              <li class="prev"><span>◀︎</span></li>
              <li class="current"><span>1</span></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href="">5</a></li>
              <li class="next"><a href="">▶︎</a></li>
            </ul>
          </div>
        </div>
        -->
      </section><!-- /.section2 -->
    </main>

<?php get_footer(); ?>
