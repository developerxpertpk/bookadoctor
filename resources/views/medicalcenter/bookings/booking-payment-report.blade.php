@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="booking-payment-detail">
                <div class="panel panel-default">
                    <div class="panel-heading custom-panel-heading"><span><b></b></span> Booking Payment Details</div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            <label for="from">From</label>
                            <input type="text" id="from_date1" name="from_date">
                            <label for="to">to</label>
                            <input type="text" id="to_date1" name="to_date">
                            <button type="button" id="button-export" name="to_date" class="pull-right edit_pro_btn">
                                Export
                            </button>

                            <script type="text/javascript">


                                $("#button-export").on("click",function(){

                                    $("#patient-booking-payment-report").table2excel({
                                        // exclude CSS class

                                        exclude: ".noExl",
                                        name: "Patient Booking Payment Report",
                                        filename: "patient-booking-payment-report", //do not include extension
                                        exclude_img: true,
                                        exclude_links: true,
                                        exclude_inputs: true,
                                        columns : [0,1,2,3,4,5,6],
                                    });
                                });


                                $( function() {

                                    $("#to_date1").datepicker({
                                        defaultDate: "+1w",
                                        changeMonth: true,
                                        numberOfMonths: 2,
                                        dateFormat: 'yy-mm-dd'
                                    });
                                    $("#from_date1")
                                        .datepicker({
                                            defaultDate: "+1w",
                                            changeMonth: true,
                                            numberOfMonths: 2,
                                            dateFormat: 'yy-mm-dd'
                                        }).bind("change",function(){
                                        var minValue = $(this).val();
                                        minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                                        minValue.setDate(minValue.getDate()+1);
                                        $("#to_date1").datepicker( "option", "minDate", minValue )
                                    });

                                });
                                $('#to_date1').on("change",function(){
                                    var from,to;
                                    from =$('#from_date1').val();
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

                                function dateSearch(from,to) {
                                    var table, tr, td, th1,td1,i;
                                    table = document.getElementById("patient-booking-payment-report");
                                    tr = table.getElementsByTagName("tr");
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[4];

                                        if (td) {
                                            if (td.innerHTML>=from && td.innerHTML<=to) {
                                                //  alert(td.innerHTML);
                                                tr[i].classList.remove("noExl");
                                                tr[i].style.display = "";
                                            } else {
                                                //alert('hello sory');
                                                tr[i].style.display = "none";
                                                tr[i].classList.add("noExl");
                                            }
                                        }
                                    }
                                }
                            </script>
                        </div>
                        <table class="table table-bordered" id="patient-booking-payment-report">
                            <tr class="tr-head">
                                <th>Sr/No.</th>
                                <th>Payment Id</th>
                                <th>Amount</th>
                                <th>Transaction Mode</th>
                                <th>Payment Date</th>
                                <th>Payment Time</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            <?php $i=1; ?>
                            @if(isset($bookings_payments))
                            @foreach($bookings_payments as $payment_deatil)
                                @foreach($payment_deatil as $payment)
                                    {{--<pre>--}}
                                    {{--{{$payment}}--}}
                                <tr class="tr-body">
                                    <td>{{$i++}}</td>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->transaction_mode}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->format('Y-m-d') }}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->format('H:i:s') }}</td>
                                    <td>
                                        @if($payment->status == 0)
                                           <label class="warning">Payment Refunded</label>
                                        @endif
                                        @if($payment->status == 1)
                                                <label class="success">Payment Complete</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('show.booking.detail',$payment->booking_id)}}">Show Booking</a></td>

                                </tr>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
        @endif
    </div>

@endsection
