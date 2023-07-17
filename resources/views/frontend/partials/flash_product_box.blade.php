
<div class="aiz-card-box h-auto bg-white py-3 hov-scale-img">
    <div class="position-relative img-fit overflow-hidden" style="height: 163px;">
        @php
            $product_url = route('product', $product->slug);
            if($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
        @endphp
        <!-- Image -->
        <a href="{{ $product_url }}" class="d-block h-100">
            <img class="lazyload mx-auto img-fit has-transition"
                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                alt="{{  $product->getTranslation('name')  }}" title="{{  $product->getTranslation('name')  }}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
        </a>
        <!-- Discount percentage tag -->
        @if(discount_in_percentage($product) > 0)
            <span class="absolute-top-right "
            style="
            background: url('public/assets/img/offers-bg.webp') no-repeat scroll 0 0/100% 100%;
            border-radius: 0;
            color: #fff;
            font-family: helveticacondensedbold;
            font-size: 15px;
            line-height: 15px;
            height: 50px;
            padding: 10px;
            position: absolute;
            right: 2px;
            text-align: center;
            text-transform: capitalize;
            top: 0;
            width: 50px;">-{{discount_in_percentage($product)}}% <br>Off</span>
        @endif
    </div>

    <div class=" text-left">
        <div class="fs-14 d-flex justify-content-center mt-3">
            @if($product->auction_product == 0)
                <!-- Previous price -->
                @if(home_base_price($product) != home_discounted_base_price($product))
                    <div class="disc-amount has-transition">
                        <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                    </div>
                @endif
                <!-- price -->
                <div class="">
                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
