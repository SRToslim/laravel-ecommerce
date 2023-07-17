@include('frontend.inc.terms')
@php
    $col_values = ((get_setting('vendor_system_activation') == 1) || addon_is_activated('delivery_boy'));
@endphp
<section class="py-3" style="border-color: #3d3d46 !important; background-color: #212129 !important; color:aliceblue !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <div class="text-center text-sm-left mt-4">
                    <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">
                        {{ get_setting('widget_one',null,App::getLocale()) }}
                    </h4>
                    <ul class="list-unstyled">
                        @if ( get_setting('widget_one_labels',null,App::getLocale()) !=  null )
                            @foreach (json_decode( get_setting('widget_one_labels',null,App::getLocale()), true) as $key => $value)
                            <li class="mb-2">
                                <a href="{{ json_decode( get_setting('widget_one_links'), true)[$key] }}" class="fs-13 text-soft-light animate-underline-white">
                                    {{ $value }}
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <!-- Seller & Delivery Boy -->
                @if ((get_setting('vendor_system_activation') == 1) || addon_is_activated('delivery_boy'))
                    <div class="text-center text-sm-left mt-4">
                        <!-- Seller -->
                        @if (get_setting('vendor_system_activation') == 1)
                            <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">{{ translate('Seller Zone') }}</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <p class="fs-13 text-soft-light mb-0">
                                        {{ translate('Become A Seller') }}
                                        <a href="{{ route('shops.create') }}" class="fs-13 fw-700 text-warning ml-2">{{ translate('Apply Now') }}</a>
                                    </p>
                                </li>
                                @guest
                                    <li class="mb-2">
                                        <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('seller.login') }}">
                                            {{ translate('Login to Seller Panel') }}
                                        </a>
                                    </li>
                                @endguest
                                @if(get_setting('seller_app_link'))
                                    <li class="mb-2">
                                        <a class="fs-13 text-soft-light animate-underline-white" target="_blank" href="{{ get_setting('seller_app_link')}}">
                                            {{ translate('Download Seller App') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif

                        <!-- Delivery Boy -->
                        @if (addon_is_activated('delivery_boy'))
                            <h4 class="fs-14 text-secondary text-uppercase fw-700 mt-4 mb-3">{{ translate('Delivery Boy') }}</h4>
                            <ul class="list-unstyled">
                                @guest
                                    <li class="mb-2">
                                        <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('deliveryboy.login') }}">
                                            {{ translate('Login to Delivery Boy Panel') }}
                                        </a>
                                    </li>
                                @endguest

                                @if(get_setting('delivery_boy_app_link'))
                                    <li class="mb-2">
                                        <a class="fs-13 text-soft-light animate-underline-white" target="_blank" href="{{ get_setting('delivery_boy_app_link')}}">
                                            {{ translate('Download Delivery Boy App') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-lg-2">
                <div class="text-center text-sm-left mt-4">
                    <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">{{ translate('My Account') }}</h4>
                    <ul class="list-unstyled">
                        @if (Auth::check())
                            <li class="mb-2">
                                <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('logout') }}">
                                    {{ translate('Logout') }}
                                </a>
                            </li>
                        @else
                            <li class="mb-2">
                                <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('user.login') }}">
                                    {{ translate('Login') }}
                                </a>
                            </li>
                        @endif
                        <li class="mb-2">
                            <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('purchase_history.index') }}">
                                {{ translate('Order History') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('wishlists.index') }}">
                                {{ translate('My Wishlist') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('orders.track') }}">
                                {{ translate('Track Order') }}
                            </a>
                        </li>
                        @if (addon_is_activated('affiliate_system'))
                            <li class="mb-2">
                                <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('affiliate.apply') }}">
                                    {{ translate('Be an affiliate partner')}}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            {{-- <div class="col-lg-2 text-center text-sm-left mt-4">
                <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">{{ translate('Contacts') }}</h4>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <p  class="fs-13 text-secondary mb-1">{{ translate('Address') }}</p>
                        <p  class="fs-13 text-soft-light">{{ get_setting('contact_address',null,App::getLocale()) }}</p>
                    </li>
                    <li class="mb-2">
                        <p  class="fs-13 text-secondary mb-1">{{ translate('Phone') }}</p>
                        <p  class="fs-13 text-soft-light">{{ get_setting('contact_phone') }}</p>
                    </li>
                    <li class="mb-2">
                        <p  class="fs-13 text-secondary mb-1">{{ translate('Email') }}</p>
                        <p  class="">
                            <a href="mailto:{{ get_setting('contact_email') }}" class="fs-13 text-soft-light hov-text-primary">{{ get_setting('contact_email')  }}</a>
                        </p>
                    </li>
                </ul>
            </div> --}}
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-md-6 col-sm-3">
                <div class="row">
                    <div class="col-lg-6">
                        @if((get_setting('play_store_link') != null) || (get_setting('app_store_link') != null))
                            <h5 class="fs-14 fw-700 text-secondary text-uppercase mt-3">{{ translate('Mobile Apps') }}</h5>
                            <div class="d-flex mt-3">
                                <div class="">
                                    <a href="{{ get_setting('play_store_link') }}" target="_blank" class="mr-2 mb-2 overflow-hidden hov-scale-img">
                                        <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/play.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                                    </a>
                                </div>
                                <div class="">
                                    <a href="{{ get_setting('app_store_link') }}" target="_blank" class="overflow-hidden hov-scale-img">
                                        <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/app.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3 mb-4 text-lg-center">
                            <a href="{{ route('home') }}" class="d-block">
                                @if(get_setting('footer_logo') != null)
                                    <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}" height="72">
                                @else
                                    <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="72">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Payment Method Images -->
                        <div class="text-center text-lg-left">
                            <ul class="list-inline mb-0">
                                @if ( get_setting('payment_method_images') !=  null )
                                    @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                        <li class="list-inline-item mr-3">
                                            <img src="{{ uploaded_asset($value) }}" height="20" class="mw-100 h-auto" style="max-height: 20px">
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- Social -->
                    <div class="col-lg-6">
                        @if ( get_setting('show_social_links') )
                            <ul class="list-inline social colored">
                                <span class="fs-14 fw-400 text-secondary text-uppercase mt-3 mt-lg-0">{{ translate('Follow Us') }}</span> &nbsp;
                                @if (!empty(get_setting('facebook_link')))
                                    <li class="list-inline-item mr-3">
                                        <a href="{{ get_setting('facebook_link') }}" target="_blank"
                                            class="facebook"><i class="lab la-facebook-f"></i></a>
                                    </li>
                                @endif
                                @if (!empty(get_setting('twitter_link')))
                                    <li class="list-inline-item mr-3">
                                        <a href="{{ get_setting('twitter_link') }}" target="_blank"
                                            class="twitter"><i class="lab la-twitter"></i></a>
                                    </li>
                                @endif
                                @if (!empty(get_setting('instagram_link')))
                                    <li class="list-inline-item mr-3">
                                        <a href="{{ get_setting('instagram_link') }}" target="_blank"
                                            class="instagram"><i class="lab la-instagram"></i></a>
                                    </li>
                                @endif
                                @if (!empty(get_setting('youtube_link')))
                                    <li class="list-inline-item mr-3">
                                        <a href="{{ get_setting('youtube_link') }}" target="_blank"
                                            class="youtube"><i class="lab la-youtube"></i></a>
                                    </li>
                                @endif
                                @if (!empty(get_setting('linkedin_link')))
                                    <li class="list-inline-item">
                                        <a href="{{ get_setting('linkedin_link') }}" target="_blank"
                                            class="linkedin"><i class="lab la-linkedin-in"></i></a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        <ul class="list-unstyled list-inline">
                            <li class="mb-2 list-inline">
                                <span  class="fs-13 text-secondary mb-1">{{ translate('Email') }}</span>
                                <a href="mailto:{{ get_setting('contact_email') }}" class="fs-13 text-soft-light hov-text-primary">{{ get_setting('contact_email')  }}</a>
                            </li>
                            <li class="mb-2 list-inline">
                                <span  class="fs-13 text-secondary mb-1">{{ translate('Phone') }}</span>
                                <a href="tel:{{ get_setting('contact_phone') }}" class="fs-13 text-soft-light hov-text-primary">{{ get_setting('contact_phone') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-none d-lg-block"></div>
                <h5 class="fs-14 fw-700 text-soft-light mt-1 mb-3">{{ translate('Subscribe to our newsletter for regular updates about Offers, Coupons & more') }}</h5>
                <div class="mb-3">
                    <form method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="row gutters-10">
                            <div class="col-8">
                                <input type="email" class="form-control border-secondary rounded-0 text-white w-100 bg-transparent" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary rounded-0 w-100">{{ translate('Subscribe') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-soft-light">
    <div class="container">
        <div class="row align-items-center py-3">
            <!-- Copyright -->
            <div class="col-lg-6 order-1 order-lg-0">
                <div class="text-center text-lg-left fs-14" current-verison="{{get_setting("current_version")}}">
                    &copy; 2019 - <?php echo date("Y"); ?> {!! get_setting('frontend_copyright_text', null, App::getLocale()) !!}
                </div>
            </div>

            <!-- Payment Method Images -->
            {{-- <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="text-center text-lg-right">
                    <ul class="list-inline mb-0">
                        @if ( get_setting('payment_method_images') !=  null )
                            @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                <li class="list-inline-item mr-3">
                                    <img src="{{ uploaded_asset($value) }}" height="20" class="mw-100 h-auto" style="max-height: 20px">
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
</footer>
