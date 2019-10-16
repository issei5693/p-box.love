<?php get_header(); ?>

    <main class="design">
      <p class="pege-title">
        <span>DESIGN</span>
      </p>
      <div class="bread-crumb">
        <div class="site-width">
          <ul class="list-inline-block">
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><a href="<?php echo get_permalink(29); ?>"><?php echo get_the_title(29); ?></a></li>
            <li><?php echo get_term_by('slug',$term,get_query_var('taxonomy'))->name; ?></li>
          </ul>
        </div>
      </div>
      <section class="section1">
        <div class="site-width">
          <h1>
            <dl class="dl-2 cf">
              <dt>カテゴリ</dt>
              <dd>
                <ul class="category-list list-inline-block">
                  <!-- <li><a href="" class="select">カテゴリ1</a></li> -->
                  <?php $now_term = $term;
                    foreach( get_terms('design','hierarchical=0') as $term ): ?>
                    <li>
                      <a href="<?php echo get_term_link( $term->term_id ); ?>" <?php if($term->slug==$now_term){ echo 'class="select"';} ?>><?php echo $term->name; ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </dd>
            </dl>
          </h1>
        </div><!-- /.site-width -->
      </section><!-- /.section1 -->
      <section class="section2">
        <div class="site-width">
          <ul id="designItems" class="list-inline-block">

            <?php
            $args = array(
            'post_type' => 'nail',
            'tax_query' => array(
              array(
                'taxonomy' => 'design',                //(string) - タクソノミー。
                'field' => 'slug',                    //(string) - IDかスラッグのどちらでタクソノミー項を選択するか
                'terms' => $now_term,    //(int/string/array) - タクソノミー項
                //'include_children' => true,           //(bool) - 階層構造を持ったタクソノミーの場合に、子タクソノミー項を含めるかどうか。デフォルトはtrue
                //'operator' => 'IN'                    //(string) - テスト用の演算子。'IN' 'NOT IN' 'AND'のいずれかが使用できる
              ),
            ),
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

            <?php wp_reset_postdata(); ?>

          </ul>
        </div><!-- /.site-width -->

      </section><!-- /.section2 -->
    </main>

<?php get_footer(); ?>
