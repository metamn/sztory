$(document).ready(function() {

  // Mark the first item in timeline active
  $('#timeline article.timeline').first().addClass('active');
  
  // On hover show guidance
  $('#timeline article.timeline .date').hover(
    function() {
      $(this).addClass('hover');
    }, function() {
      $(this).removeClass('hover');
    }
  );
  
  // Toggle active timeline entry
  $('#timeline article.timeline .date').click(function() {
    $(this).parent().toggleClass('active');
  });
});