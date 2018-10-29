
$('#cbxAuth').removeAttr('checked');
$('#btnProceed').attr('disabled', 'true');

$('#cbxAuth').click(function () {
  if(!$('#cbxAuth').is(':checked')) {
      $("#btnProceed").attr('disabled', 'true');
  } else {
      $("#btnProceed").removeAttr('disabled');
  }
});

var initTime = 420;
function timeOut() {
  $("#timeOut").html(initTime);
  setTimeout("timeOut()", 1000);
}

timeOut();
