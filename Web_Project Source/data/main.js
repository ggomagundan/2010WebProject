/* Fancy effect on the upcoming events list */

$(function() {
  $('.city-block a').hover(
    function() {
      $('.city-image', $(this)).slideUp(300);
    },
    function() {
      $('.city-image', $(this)).slideDown(300, 'easeInQuad');
    }
  );
  
  /* *** */
  
});




