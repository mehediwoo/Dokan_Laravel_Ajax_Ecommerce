@extends('user.layout.app')
@section('title', ucfirst($slug).' | '.$setting->logo)
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/shop_responsive.css') }}">
@endsection

@section('content')
<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('user/images/shop_background.jpg') }}"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{ ucfirst($slug) }}</h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                                @forelse ($all_cate as $all)
                                <li><a href="{{ route('category.product',$all->slug) }}">{{ $all->title }}</a></li>
                                @empty
`                               No Category exists!
                                @endforelse

                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            @if (!empty($brand) && $brand->count() > 0)
                                @foreach ($brand as $row)
                                <li class="brand"><a href="">{{ $row->brand_name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{ $category_product->count() }}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>

                        @if (!empty($category_product) && $category_product->count() > 0)
                        @foreach ($category_product as $row)
                        <!-- Product Item -->
                        <div class="product_item is_new">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('storage/'.$row->thumbnail) }}" alt=""></div>
                            <div class="product_content">
                                <div class="product_price">{{ $setting->default_currency }} {{ $row->p_discount_price }}</div>
                                <div class="product_name"><div><a href="{{ route('single.product',$row->p_slug) }}" tabindex="0">{{ $row->p_title }}</a></div></div>
                            </div>
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                <li class="product_mark product_discount">-25%</li>
                                <li class="product_mark product_new">new</li>
                            </ul>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        {{ $category_product->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@include('user.HomeComponent.Brand')

@endsection

@section('script')
<script src="{{ asset('user/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('user/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('user/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('user/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('user/js/shop_custom.js') }}"></script>
@endsection
