(function($){
  $(window).load(function(){
    $(".news-block-content").mCustomScrollbar({
      setHeight: '310',
      theme: 'dark-3',
      scrollbarPosition: 'outside',
    });
  
  $(".w-notification-content").mCustomScrollbar({
      setHeight: '300',
      theme: 'dark-3',
      scrollbarPosition: 'outside',
    });

    $(".tab-pane-news").mCustomScrollbar({
      setHeight: '560',
      theme: 'dark-3',
      scrollbarPosition: 'outside',
    });

    $(".rss-news-content").mCustomScrollbar({
      setHeight: '350',
      theme: 'dark-3',
      scrollbarPosition: 'outside',
    });
  });
})(jQuery);