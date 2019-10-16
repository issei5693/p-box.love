$(document).ready(function(){
//ドキュメント準備完了時に実行

  //slick
  $('#sliderContent ul').slick({
    autoplay: true,
    fade: true,
    pauseOnHover: false,
  }); //slick

  //magnific-popup
  $('#designItems').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery:{
      enabled:true
    },
    image: {
    tError: '<p>画像が読み込めません。</p>',
    titleSrc: function(item){
      return item.el.next('.image-info').prop('outerHTML');
      }
    }
  }); //magnificPopup

}); //ドキュメント準備完了時終了

$('#menuButton').on('click',function(){
  if( $(this).attr('class') == 'close' ){
    $(this).removeClass('close').addClass('open');
  } else if( $(this).attr('class') == 'open' ){
    $(this).removeClass('open').addClass('close');
  }
});

$(window).on('load resize', function() {
//ロード時とウィンドウサイズ変更時に実行
  //////////////////////////////////////////
  //youtube画面サイズ調整(16:9 ※推奨サイズ)
  /////////////////////////////////////////
  var iframe_width = $('.access-movie').width();
  var iframe_height = ( iframe_width / 16 ) * 9;
  $('.access-movie').height(iframe_height);

  //////////////////////////////////////////
  //googlemapサイズ調整(1:1)
  /////////////////////////////////////////
  var iframe_width = $('.google-map').width();
  var iframe_height = ( iframe_width / 1 ) * 1;
  $('.google-map').height(iframe_height);

  //////////////////////////////////////////
  //追従ヘッダーの分のmargin-top計算
  /////////////////////////////////////////
  if($(window).width() < 759){
    $('main').css('margin-top',$('.header').outerHeight());
    $('.header .global-nav').css('top',$('.header').outerHeight());
  } else {
    $('main').css('margin-top',0);
  }
});
