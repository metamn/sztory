$(document).ready(function() {
  
  // Show the first article in the timeline
  jQuery("#timeline article").first().addClass('active');

  // Hide duplicated years in the timeline
  for (var i=1989; i<2015; i++) {
    jQuery("#timeline article .time-" + i).first().addClass('visible');
  }

});