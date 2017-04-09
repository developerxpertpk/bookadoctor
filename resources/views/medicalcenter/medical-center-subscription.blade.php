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
                                <h3 class="plan-title">{{$plan_key->plan_type}}</h3>
                                <p class="plan-price">{{$plan_key->plan_cost}} <span class="plan-unit">per {{$plan_key->plan_type}}</span></p>
                                <ul class="plan-features">
                                    <li class="plan-feature">2 <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">5<span class="plan-feature-unit">Ipsum</span> <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">3 <span class="plan-feature-name">Lore ipsum</span></li>
                                </ul>
                                <buton class="edit_pro_btn" type="submit">pay Now</buton>

                            </div>
                            </div>

                                @endif
                            @endforeach


                        </div>


                        <div class="modal fade" id="payment" data-easein="tada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Payment Mode</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('medical.center.payment')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="plan_type" value="Monthly">
                                            <input type="hidden" name="plan_amount" value="19">
                                            <input type="hidden" name="plan_status" value="1">
                                            <script
                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                    data-key="pk_test_flOGeTYD3hDVIRwgbXXqwBNo"
                                                    data-amount="1900"
                                                    data-name="{{Auth::user()->is_MedicalCenter->first_name}} {{Auth::user()->is_MedicalCenter->last_name}}"
                                                    data-description="Widget"
                                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                    data-locale="auto">
                                            </script>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
