@php
    $total = 0;
@endphp
@if (!empty($cart) && $cart->count() > 0)
    @foreach ($cart as $cart)
        <div class="cart_items">
            <ul class="cart_list">
                <li class="cart_item clearfix">
                    <div class="cart_item_image">
                        <img src="{{ asset('storage/'.$cart->product->thumbnail) }}" alt="{{ $cart->product->thumbnail }}">
                    </div>
                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                        <div class="cart_item_name cart_info_col">
                            <div class="cart_item_title">Name</div>
                                <div class="cart_item_text">
                                    {{ substr($cart->product->p_title,0,15) }}
                                </div>
                        </div>
                        <div class="cart_item_color cart_info_col">
                            <div class="cart_item_title">Color</div>
                                <div class="cart_item_text">
                                    <span style="background-color:{{$cart->color}};"></span>
                                    {{ $cart->color }}
                                </div>
                        </div>
                        @if ($cart->size != null)
                            <div class="cart_item_color cart_info_col">
                                <div class="cart_item_title">Size</div>
                                <div class="cart_item_text">{{ $cart->size }}</div>
                            </div>
                        @endif

                        <div class="cart_item_quantity cart_info_col mb-3">
                            <div class="cart_item_title">Quantity</div>
                                <div class="" style="margin-top: 38px">
                                    ({{ $cart->quantity }})
                                    <a href="" id="minus" minus_id="{{ $cart->id }}" class=" badge badge-sm badge-danger">-</a>

                                    <a href="" id="plus" plus_id="{{ $cart->id }}" class=" badge badge-sm badge-success">+</a>
                                </div>
                        </div>

                        <div class="cart_item_price cart_info_col">
                            <div class="cart_item_title">Price</div>
                            <div class="cart_item_text">
                                {{ $setting->default_currency }} {{ $cart->price }}
                            </div>
                        </div>
                        <div class="cart_item_total cart_info_col">
                            <div class="cart_item_title">Total</div>
                                <div class="cart_item_text">
                                    {{ $setting->default_currency }} {{$cart->total_price }}
                                </div>
                        </div>

                        <div class="cart_item_total cart_info_col">
                            <div class="cart_item_title">Remove</div>
                                <div class="cart_item_text">
                                    <a href="" remove_id="{{ $cart->id }}" id="removeCart" class="badge badge-sm badge-danger">
                                        X
                                    </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        @php
            $total = $total + $cart->total_price;
        @endphp
    @endforeach

    <!-- Order Total -->
	<div class="order_total">
		<div class="order_total_content text-md-right">
			<div class="order_total_title">Order Total:</div>
			    <div class="order_total_amount">
                    {{ $setting->default_currency }} {{ $total }}
                </div>
		</div>
	</div>
	<div class="cart_buttons">
		<a href="{{ route('shipping') }}" class="btn btn-sm btn-primary">Process to checkout<a>
	</div>
@else
    <p class="text-danger mt-3 text-center">Your cart is empty</p>
@endif
