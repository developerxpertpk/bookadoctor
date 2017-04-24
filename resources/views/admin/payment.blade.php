@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
<div class="row">
<div class="col-md-10 col-md-offset-1 form-group">
<label for="from">Medical Center</label>
<input type="text" id="MedicalCenter" name="MedicalCenter" placeholder="Search Medical Center Name..." onkeyup="medicSearch()" >
<label for="from">From</label>
<input type="text" id="from" name="from">
<label for="to">to</label>
<input type="text" id="to" name="to">
<button class="btn btn-primary">Export  <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="table table-hover" id="myTable">
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
  $(document).ready(function() {
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 2,
          dateFormat:'yy-mm-dd'
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2,
        dateFormat:'yy-mm-dd',
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
  $('#to').on("change",function(){
    var from,to;
    from =$('#from').val();
    if(from == "")
    {
      alert('Select From First');
    }
    else
    {
    to=$(this).val();
    dateSearch(from,to);   
  }
  });
   $("button").on("click",function(){
  $("#myTable").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "Filtered" //do not include extension
  });
});
});
  function medicSearch() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("MedicalCenter");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        tr[i].classList.remove("noExl");
      } else {
        tr[i].style.display = "none";
        tr[i].classList.add("noExl");
      }
    }       
  }
}
function dateSearch(from,to) {
  var table, tr, td, i;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      if (td.innerHTML>=from && td.innerHTML<=to) {
        //alert(td.innerHTML);
        tr[i].style.display = "";
        tr[i].classList.remove("noExl");
      } else {
        //alert(something);
        tr[i].style.display = "none";
        tr[i].classList.add("noExl");
      }
    }       
  }
}
</script> 
@endsection
