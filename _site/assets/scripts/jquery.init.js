$(document).ready(function() {

  // Add background image to articles
  $('article.navigation-full-screen').each(function() {
    var url = $(this).find('img').attr('src');
    $(this).css('background-image', 'url(' + url + ')');
  });
});