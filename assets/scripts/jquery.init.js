$(document).ready(function() {
  
  
  // Scrolling a full page at once
  // ---------------------------------------------------
  
  // the elements
  var scrollables = $('article.navigation-full-screen');
  
  // the plugin
  scrollables.waypoint(function(direction) {
    if (direction == 'down') {
      var next = $(this);
    }
    if (direction == 'up') {
      var next = $(this).prev();
    }
    
    // once the scroll done we disable this checker until the next scroll
    scrollTo(next);
    scrollables.waypoint('disable');
  }, { 
    offset: '75%'
  });
  
  // on every scroll enable the plugin
  $(window).scroll(function() {
    scrollables.waypoint('enable');
  });
  
  // Scroll to an element on the page
  function scrollTo(element) {
    $('html, body').animate({
      scrollTop: element.offset().top
    }, 500);
  }
  
  
  
  
  
  // Add background image to articles
  $('article.navigation-full-screen').each(function() {
    var url = $(this).find('img').attr('src');
    $(this).css('background-image', 'url(' + url + ')');
  });
  
});