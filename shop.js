function detectChange(value) {
  var rangeDiv = document.getElementById("output");
  rangeDiv.value = value;
}


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
/*
$("#model").live("change", function () {
  alert("You choose " + $('#model').val());
});
*/

function submit() {
  document.getElementById("sort").submit();
}