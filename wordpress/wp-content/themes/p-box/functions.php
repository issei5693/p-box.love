<?php

/* * * * * * * * * * * * * * * 
 * 
 * トップページのページャー無効化処理
 * 
 * * * * * * * * * * * * * * */
 
function topPagePagerResets( $query ){
	if( $query->is_home() ){
		$global_wp_query = $GLOBALS["wp_query"];
		$global_wp_query->query_vars['posts_per_page'] = 9999;
	}
	
}

add_action( 'pre_get_posts', 'topPagePagerResets' );

//////////////////////////////////////////////////////////////////
//サムネイル画像の使用設定
//////////////////////////////////////////////////////////////////
add_theme_support('post-thumbnails');

//////////////////////////////////////////////////////////////////
//抜粋の編集
//////////////////////////////////////////////////////////////////
remove_filter('the_excerpt', 'wpautop');

function new_excerpt_mblength($length) {
     return 70;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

//////////////////////////////////////////////////////////////////
//カスタムポスト生成
//参考：https://it-tantou.com/2996/
//公式：http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_post_type
//参考：https://www.h-fj.com/blog/archives/2010/08/26-152442.php
//公式：http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_taxonomy
//////////////////////////////////////////////////////////////////
add_action( 'init', 'create_post_type' );
function create_post_type() {

//カスタムポストを生成
register_post_type( 'nail', //カスタム投稿タイプ名を指定
	array(
    'label' => 'ネイル画像',
		'labels' =>  //名前・ラベルに関しての設定
      array(
        'name' => __( 'ネイル画像' ), //カスタム投稿タイプ名の複数形(管理画面のラベル名)
        'singular_name' => __( 'ネイル画像' ), //カスタム投稿タイプ名の単数形(ヘッダーから直接個別ページを作成するときのラベル？)
        'add_new_item' => '新しいネイル画像を作成する', //カスタム投稿の新規作成ページの左上に表示される部分のラベル
        'add_new' => '新規追加', //メニューの「新規 」の位置に表示するラベル
        'new_item' => 'new_item', //カスタム投稿一覧ページの右上の方にある新規作成部分のラベル
        'view_item' => 'view_item', //カスタム投稿編集ページの「〇〇を表示」部分のラベル
        'not_found' => 'not_found', //カスタム投稿を追加していない状態で、カスタム投稿一覧ページを開いたときに表示するメッセージ
        'not_found_in_trash' => 'not_found_in_trash', //カスタム投稿をゴミ箱に入れていない状態で、カスタム投稿のゴミ箱ページを開いたときに表示するメッセージ
        'edit_item' => 'edit_item', //カスタム投稿編集ページの左上の方にある編集部分のラベル
        'search_items' => 'search_items', //カスタム投稿一覧ページの検索ボタンのラベル
		  ),
    'descsiption' => 'descsiption', //カスタム投稿タイプの概要を記述します。特に設定しなくても構いません。
		'public' => true, //サイト運営者が管理画面で記事を書いて公開するようなカスタム投稿タイプを作成するのであれば「ture」にします。WordPressサイトのプログラム内部で使用するようなカスタム投稿タイプを作成するのであれば、「false」に設定します。
    'show_ul' => true, //管理画面の左メニューにカスタム投稿タイプの新規作成や一覧ページの表示をする場合は、「ture」にします。「false」に設定すると管理画面から表示されなくなり、操作はできなくなります。
		//'has_archive' => false, // アーカイブページを持つ
		'menu_position' =>4, //管理画面のメニュー順位
    //'menu_icon' => '' ,//管理画面の左メニューに表示されるカスタム投稿タイプのアイコンのURLを指定します。
    'exclude_from_search' => false, //検索対象にするかどうか
    'publicly_queryable' => false, // フロント側での表示を禁止→リンクはなぜか残ってしまうのでnofollow,sitemapで取り除くこと。
		'supports' =>
      array(
        'title' , //記事の「タイトル」を編集可能にするか
        'editor', //記事の「本文」を編集可能にするか
        //'author', //
        'thumbnail', //アイキャッチ画像を有効にするか
        //'custom-fields', //カスタムフィールドを有効にするか
        //'comments', //コメントを有効にするか
       	//'revisions', //リビジョンを有効にするか
	   )
   )
);

//トップアイテムのカスタムタクソノミを生成
register_taxonomy(
	'design', // タクソノミーの名前
	'nail', // どのカスタム投稿タイプに追加するか（複数指定は配列で指定）
	array(
    'label' => 'ネイルカテゴリー',
    'labels' =>
      array(
        'name' => 'ネイルカテゴリー', //カスタム分類の複数形
        'singular_name' => 'ネイルカテゴリー', //カスタム分類の単数形
        'search_items' => 'ネイルカテゴリーを検索する', //カスタム分類一覧ページの検索ボタンのラベル
        //'popular_items' => '', //「よく使われる○○」のラベル
        'all_items' => '全てのネイルカテゴリー', //「すべての○○」のラベル
        //'parent_item' => '', //「親○○」のラベル
        'not_found' => 'ネイルカテゴリはありません。', //カスタムタクソノミを追加していない状態で、カスタムタクソノミ一覧ページを開いたときに表示するメッセージ
        'edit_item' => 'ネイルカテゴリーの編集', //カスタム分類の編集ページの左上に表示されるタイトル
        'add_new_item' => 'ネイルカテゴリーの新規作成', //カスタム分類の新規作成のボタンに表示されるラベル
        'add_new' => 'ネイルカテゴリの新規追加', //メニューの「新規 」の位置に表示するラベル
        //'choose_from_most_used	' => '', //「よく使われている○○から選択」のラベル（タグ型のカスタム分類のみ）
        //'separate_items_with_commas' => '', //「○○が複数ある場合はコンマで区切ってください」のラベル（タグ型のカスタム分類のみ）
      ),
    'public' => true, //このカスタムタクソノミーを管理画面に表示するか
    'show_ui' => true, //管理画面にカスタム分類の作成や一覧のページを表示する場合は、この値をtrueに設定します。
		'hierarchical' => true, // trueだと親子関係が使用可能。falseで使用不可
    //'show_tagcloud' => , //Codexによると、タグ型のカスタム分類を登録した場合、この値をfalseに設定すると、カスタム分類の管理画面にタグクラウドを表示しないとあります。
    //'query_var' => , //「'query_var' => true」に設定すると、「http://ブログのアドレス/?カスタム分類名=個々の分類のスラッグ」のアドレスで、そのカスタム分類のアーカイブページを開くことができるようになります。また、「'query_var' => 文字列」とすると、「http://ブログのアドレス/?文字列=個々の分類のスラッグ」のアドレスで、そのカスタム分類のアーカイブページを開くことができるようになります。
    //'show_tagcloud' => ,
      /*
      「「'rewrite' => true」に設定すると、「http://ブログのアドレス/カスタム分類名/個々の分類のスラッグ」のアドレスで、そのカスタム分類のアーカイブページを開くことができるようになります。
また、「'rewrite' => array('slug' => 文字列)」とすると、「http://ブログのアドレス/文字列/個々の分類のスラッグ」のアドレスで、そのカスタム分類のアーカイブページを開くことができるようになります。
ただし、rewriteを動作させるには、カスタム分類を登録した後で、flush_rewrite_rules関数を実行する必要があるようです。*/
    //'capabilities' => '', //カスタム分類を操作できるユーザーの権限を指定します。
		//'update_count_callback' => '', //関連付けられた $object_type（例えば投稿）の個数が更新された時に呼び出される関数の名前。フックによく似た動作になります。
	)
);

}//function create_post_type()の終了

//////////////////////////////////////////////////////////////////
//通常の投稿の「タグ」を管理画面から設定できないようにする
//////////////////////////////////////////////////////////////////
add_action( 'init', function(){
  global $wp_taxonomies;
  unset($wp_taxonomies['post_tag']);
});