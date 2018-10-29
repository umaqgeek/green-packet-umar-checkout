
$('#cbxAuth').removeAttr('checked');
$('#btnProceed').attr('disabled', 'true');

$('#cbxAuth').click(function () {
  if(!$('#cbxAuth').is(':checked')) {
      $("#btnProceed").attr('disabled', 'true');
  } else {
      $("#btnProceed").removeAttr('disabled');
  }
});
