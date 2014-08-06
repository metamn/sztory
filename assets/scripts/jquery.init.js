$(document).ready(function() {
  
  
  
  // Scroll the whole page at once
  scrollTo($('article.navigation-full-screen').last());
  
  // Scroll to an element on the page
  function scrollTo(element) {
    $('html, body').animate({
        scrollTop: element.offset().top
    }, 2000);
  }
  
  
  
  
  
  // Add background image to articles
  $('article.navigation-full-screen').each(function() {
    var url = $(this).find('img').attr('src');
    $(this).css('background-image', 'url(' + url + ')');
  });
  
});