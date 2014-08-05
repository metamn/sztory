$(document).ready(function() {

  // Mark the first item in timeline active
  $('#timeline article.timeline').first().addClass('active');
  
  // Toggle active timeline entry
  $('#timeline article.timeline .date').click(function() {
    $(this).parent().toggleClass('active');
  });
});