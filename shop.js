function detectChange(value) {
  var rangeDiv = document.getElementById("output");
  rangeDiv.value = value;
}


/* filter
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
*/

function openFilters() {
  $('.side').css('display', 'block');
  $('#filters').css('display', 'none');
  $('#filters2').css('display', 'block');
}


function closeFilters() {
  $('.side').css('display', 'none');
  $('#filters2').css('display', 'none');
  $('#filters').css('display', 'block');
}