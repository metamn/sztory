$(document).ready(function() {
  
  var scrollables = $('article.navigation-full-screen');
  
  scrollables.waypoint(function(direction) {
    scrollables.removeClass('visible');
    
    if (direction == 'down') {
      var next = $(this).next();
    }
    if (direction == 'up') {
      var next = $(this).prev();
    }
    
    next.addClass('visible');
    $(this).trigger('scroll');
  }, { 
    offset: '75%'
  });
  
  
  scrollables.on('scroll', function() { 
    console.log('event1');
    scrollTo(scrollables.filter('.visible'));
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