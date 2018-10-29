
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
  var hours = Math.floor(seconds / 3600);
  var min = Math.floor((seconds - (hours * 3600)) / 60);
  var seconds = Math.floor(seconds % 60);
  return min + ':' + seconds;
}

var time = 5;
function timeOut() {
  if (time <= 0) {
    $("#formTimeOut").submit();
  }
  time -= 1;
  $("#timeOut").html(secToTime(time));
  setTimeout("timeOut()", 1000);
}

timeOut();
