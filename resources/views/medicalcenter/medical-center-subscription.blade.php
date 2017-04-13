{{-- @extends('layouts.app') --}}
@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="subscription-plans">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan Subscription</div>

                    <div class="panel-body">
                        <div class="plans">

                            @foreach($plan_info as $plan_key)
                              @if($plan_key->status=='Active')


                            <div class="col-md-4">
                            <div class="plan">
                                <h3 class="plan-title">{{$plan_key->name}}</h3>
                                <p class="plan-price">$ {{$plan_key->amount}} <span class="plan-unit">per {{$plan_key->name}}</span></p>
                                <ul class="plan-features">
                                    <li class="plan-feature">2 <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">5<span class="plan-feature-unit">Ipsum</span> <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">3 <span class="plan-feature-name">Lore ipsum</span></li>
                                </ul>
                                <form action="{{route('medical.center.payment')}}" method="POST">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="new_plan_id" value="{{$plan_key->id}}">
                                    <input type="hidden" name="plan_status" value="1">
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_flOGeTYD3hDVIRwgbXXqwBNo"
                                            data-amount="{{$plan_key->amount}}00"
                                            data-name="{{Auth::user()->is_Profile->first_name}} {{Auth::user()->is_Profile->last_name}}"
                                            data-description="Widget"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto">
                                    </script>
                                </form>

                            </div>
                            </div>

                                @endif
                            @endforeach


                        </div>








                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
