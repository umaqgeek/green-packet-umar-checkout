
$('#cbxAuth').removeAttr('checked');
$('#btnProceed').attr('disabled', 'true');

$('#cbxAuth').click(function () {
  if(!$('#cbxAuth').is(':checked')) {
      $("#btnProceed").attr('disabled', 'true');
  } else {
      $("#btnProceed").removeAttr('disabled');
  }
});

function secToTime(seconds) {
  var min = Math.floor((sec - (hours*3600)) / 60);
  var seconds = Math.floor(sec % 60);
  return min + ':' + seconds;
}

var time = 420;
function timeOut() {
  time -= 1;
  $("#timeOut").html(secToTime(time));
  setTimeout("timeOut()", 1000);
}

timeOut();
