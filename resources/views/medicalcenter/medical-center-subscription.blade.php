{{-- @extends('layouts.app') --}}
@extends('layouts.homeLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="subscription-plans">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan Subscription</div>

                    <div class="panel-body">
                        <div class="plans">
                            <div class="col-md-4">
                            <div class="plan">
                                <h3 class="plan-title">Monthly</h3>
                                <p class="plan-price">$19 <span class="plan-unit">per month</span></p>
                                <ul class="plan-features">
                                    <li class="plan-feature">2 <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">5<span class="plan-feature-unit">Ipsum</span> <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">3 <span class="plan-feature-name">Lore ipsum</span></li>
                                </ul>
                                <form action="{{route('medical.center.payment')}}" method="POST">
                                    {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_flOGeTYD3hDVIRwgbXXqwBNo"
                                            data-amount="1900"
                                            data-name="Pankaj Kumar"
                                            data-description="Widget"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto">
                                    </script>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="plan plan-highlight">
                                <p class="plan-recommended">Half Yearly</p>
                                <h3 class="plan-title">Team</h3>
                                <p class="plan-price">$49 <span class="plan-unit">per six months</span></p>
                                <ul class="plan-features">
                                    <li class="plan-feature">5 <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">20<span class="plan-feature-unit">Ipsum</span> <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">10 <span class="plan-feature-name">Lore ipsum</span></li>
                                </ul>
                                <form action="{{route('medical.center.payment')}}" method="POST">
                                    {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_flOGeTYD3hDVIRwgbXXqwBNo"
                                            data-amount="4900"
                                            data-name="Pankaj Kumar"
                                            data-description="Widget"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto">
                                    </script>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="plan">
                                <h3 class="plan-title">Yearly</h3>
                                <p class="plan-price">$99 <span class="plan-unit">per year</span></p>
                                <ul class="plan-features">
                                    <li class="plan-feature">20 <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">50<span class="plan-feature-unit">Ipsum</span> <span class="plan-feature-name">Lore ipsum</span></li>
                                    <li class="plan-feature">25 <span class="plan-feature-name">Lore ipsum</span></li>
                                </ul>
                                <form action="{{route('medical.center.payment')}}" method="POST">
                                    {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_flOGeTYD3hDVIRwgbXXqwBNo"
                                            data-amount="9900"
                                            data-name="Pankaj Kumar"
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
@endsection
