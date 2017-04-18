@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
<div class="row">
<div class="col-md-10 col-md-offset-1 form-group">
<label for="from">Medical Center</label>
<input type="text" id="MedicalCenter" name="MedicalCenter" >
<label for="from">From</label>
<input type="text" id="from" name="from">
<label for="to">to</label>
<input type="text" id="to" name="to">
</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="table table-hover">
  <caption>table title and/or explanatory text</caption>
  <thead>
    <tr>
      <th>id</th>
      <th>Patient Name</th>
      <th>Doctors Name</th>
      <th>Medical Center Name</th>
      <th>Amount</th>
      <th>Payment Mode</th>
      <th>Booking Date</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
</div>  
</div>
</div>
<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
    $.ajax({
            url: '/admin/payments/data',
            dataType: 'json',
            method:'GET',
            success: function (data) {
              //alert(data[0]['amount']);
                // console.log(data[0]);
                manageRow(data);
              }
            });
    function manageRow(data) {
  var rows = '';
  $.each( data, function( key, value ) {
      rows = rows + '<tr>';
      rows = rows + '<td>'+value.id+'</td>';
      rows = rows + '<td>'+value.patient_name+'</td>';
      rows = rows + '<td>'+value.doctor_name+'</td>';
      rows = rows + '<td>'+value.medicalcenter_name+'</td>';
      rows = rows + '<td>'+value.amount+'</td>';
      rows = rows + '<td>'+value.transaction_mode+'</td>';
      rows = rows + '<td>'+value.created_at+'</td>';
      rows = rows + '</tr>';
  });
  $("tbody").html(rows);
}
});
  </script> 
@endsection
