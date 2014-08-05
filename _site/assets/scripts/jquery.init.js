$(document).ready(function() {

  
  // Toggle active timeline entry
  $('#timeline article.timeline .date, #timeline article.timeline .title, #timeline article.timeline .tags').click(function() {
    $(this).parent().toggleClass('active');
  });
  
  
  // Gradient background for timeline articles 
  $('#timeline article.timeline').each(function(index) {
    gradient = 250 + index * 75;
    color = 'hsl(' + gradient.toString() + ', 53%, 88%)';
    $(this).find('.tags ul li span').css({'border-color' : color, 'background' : color});
  });
});