@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="plan-subscription-detail">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscription Detail</div>

                    <div class="panel-body">
                        <div class="col-md-4 col-md-offset-4">
                        <div class="plan" style="background: #fff0ff;">
                            <h3 class="plan-title">{{$plan_detail->name}}</h3>
                            <p class="plan-price">$ {{$plan_detail->amount}} <span class="plan-unit">per {{$plan_detail->name}}</span></p>
                            <ul class="plan-features">
                                <li class="plan-feature">Valid From : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $plan_dta->created_at)->format('Y-m-d') }}</li>
                                <li class="plan-feature">2 <span class="plan-feature-name">Lore ipsum</span></li>
                                <li class="plan-feature">5<span class="plan-feature-unit">Ipsum</span> <span class="plan-feature-name">Lore ipsum</span></li>
                                <li class="plan-feature">3 <span class="plan-feature-name">Lore ipsum</span></li>
                            </ul>


                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection