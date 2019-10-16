<!DOCTYPE html>
<!-- use git -->
<html <?php language_attributes(); ?>>
<head><!-- this is cfbx -->
	<title><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/slick/slick.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/slick/slick-theme.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/Magnific-Popup-master/dist/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
  <div class="wrapper">
    <header class="header">
      <div class="site-width">
        <div class="col-3">
          <div class="left">
            <figure class="logo">
              <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">
              </a>
            </figure>
          </div>
          <div class="center">
            <span id="menuButton" class="close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-menu.png"></span>
            <nav class="global-nav">
              <ul class="list-table">
                <li>
                  <a href="<?php echo home_url(); ?>">
                    <span class="en">TOP</span><br>
                    <span class="ja">トップ</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo get_permalink(29); ?>">
                    <span class="en">DESIGN</span><br>
                    <span class="ja">デザイン</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo get_permalink(2); ?>">
                    <span class="en">MENU</span><br>
                    <span class="ja">メニュー紹介</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo get_permalink(14); ?>">
                    <span class="en">BLOG</span><br>
                    <span class="ja">ブログ</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="right">
            <div class="reserve">
              <a href="https://beauty.hotpepper.jp/smartphone/kr/slnH000408919/" target="_blank" class="button">ご予約はこちらから</a>
            </div>
          </div>
        </div>
      </div>
    </header>
