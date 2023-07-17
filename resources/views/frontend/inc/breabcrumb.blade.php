<ul class="breadcrumb bg-transparent py-0 px-1">
    <li class="breadcrumb-item opacity-50">
        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
    </li>
    @if(!isset($category_id))
        <li class="breadcrumb-item fw-700  text-dark">
            <a class="text-reset" href="{{ route('search') }}">"{{ translate('All Categories')}}"</a>
        </li>
    @else
        <li class="breadcrumb-item opacity-50">
            <a class="text-reset" href="{{ route('search') }}">{{ translate('All Categories')}}</a>
        </li>
    @endif

    {{-- @if(isset($category_id))
        <li class="text-dark fw-600 breadcrumb-item">
            <a class="text-reset" href="{{ route('products.category', \App\Models\Category::find($category_id)->slug) }}">"{{ \App\Models\Category::find($category_id)->getTranslation('name') }}"</a>
        </li>
    @endif --}}

    @php
        $cat = \App\Models\Category::find($category_id);
    @endphp
    @if(isset($cat))
        @if($cat->parentCategory != null)
            @if($cat->parentCategory->parentCategory != null)
                <li class="text-dark fw-600 breadcrumb-item opacity-50">
                    <a class="text-reset" href="{{ route('products.category', $cat->parentCategory->parentCategory->slug) }}">{{ $cat->parentCategory->parentCategory->getTranslation('name') }}</a>
                </li>
            @endif
            @if($cat->parentCategory != null)
                <li class="text-dark fw-600 breadcrumb-item opacity-50">
                    <a class="text-reset" href="{{ route('products.category', $cat->parentCategory->slug) }}">{{ $cat->parentCategory->getTranslation('name') }}</a>
                </li>
            @endif
        @else
        <li class="text-dark fw-600 breadcrumb-item opacity-50">
            <a class="text-reset" href="{{ route('products.category', $cat->slug) }}">{{ $cat->getTranslation('name') }}</a>
        </li>
        @endif
    @endif
</ul>
