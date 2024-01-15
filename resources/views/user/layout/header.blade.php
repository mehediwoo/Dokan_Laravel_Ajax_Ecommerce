@php

    // Wishlist Iteam
    // $wishlist_iteam = App\Models\wishlist::where('user_id',session()->get('user_id'))->get();
    // Cart iteam showing
    $cart = App\Models\cart::where('user_id',session()->get('user_id'))->get();
@endphp
<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo">
                        <a href="{{ route('home') }}">{{ $setting->logo }}</a>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="#" class="header_search_form clearfix">
                                <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            @if (!empty($category) && $category->count() > 0)
                                            @foreach ($category as $row)
                                            <li>
                                                <a class="clc" href="#">
                                                    <i class="{{ $row->icon }} mr-2"></i>{{ $row->title }}
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('user/images/search.png') }}" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon"><img src="{{ asset('user/images/heart.png') }}" alt=""></div>
                        <div class="wishlist_content">
                            <div class="wishlist_text"><a href="#">Wishlist</a></div>
                            <div class="wishlist_count">115</div>
                        </div>
                    </div>

                    <!-- Cart -->
                    @php
                        $total = 0;
                        foreach ($cart as $price) {
                            $total = $total + $price->total_price;
                        }

                    @endphp
                    <div class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon">
                                <img src="{{ asset('user/images/cart.png') }}" alt="">
                                <div class="cart_count"><span>{{ $cart->count() }}</span></div>
                            </div>
                            <div class="cart_content">
                                <div class="cart_text"><a href="{{ route('cart') }}">Cart</a></div>
                                <div class="cart_price">{{ $setting->default_currency }} {{ $total }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
