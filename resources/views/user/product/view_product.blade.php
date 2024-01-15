@extends('user.layout.app')
@section('title',ucfirst($slug).' | '.$setting->logo)
@section('css')
<meta name="meta tag" content="{!! $product->p_meta_tags !!}">
<meta name="meta description" content="{!! $product->p_meta_desc !!}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/product_responsive.css') }}">
@endsection
@section('content')
	<!-- Single Product -->

	<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-1 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset('storage/'.$product->thumbnail) }}">
                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
                    </li>
                    @if ($product->p_image != null)
                        @foreach (explode(',',$product->p_image) as $image)
                        <li data-image="{{ asset('storage/'.$image) }}">
                            <img src="{{ asset('storage/'.$image) }}" alt="">
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-4 order-lg-2 order-1">
                <div class="image_selected">
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-4 order-3">
                <div class="product_description">
                    <div class="product_category">
                        {{ $product->category->title }} -> {{ $product->subcategory->title }} @if($product->child_cat_id !=null) -> {{ $product->childcategory->title }}@endif
                    </div>
                    <div class="product_name">{{ $product->title }}</div>
                    <div class="product_category">Product Brand: {{ $product->brand->brand_name }}</div>
                    <div class="product_category">Product stock in: {{ $product->p_qty }} {{ $product->p_unit }}</div>

                    <div class="rating_r rating_r_4 product_rating">
                        <span class="fa fa-star checked text-warning"></span>
							<span class="fa fa-star checked text-warning"></span>
							<span class="fa fa-star text-warning"></span>
							<span class="fa fa-star "></span>
							<span class="fa fa-star "></span>
                    </div>
                    <div class="product_text">
                        <p>{{ $product->p_short_desc }}</p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="" id="addToCartForm" method="post">

                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="selling_price" value="{{ $product->p_discount_price }}">
                            <input type="hidden" name="stock" value="{{$product->p_qty}}">
                            <!-- Product Color -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Size">Size</label>
                                        <select name="size" id="size" class="form-control">
                                            <option value="">Select Size</option>
                                            @foreach (explode(',',$product->p_size) as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Color">Color</label>
                                        <select name="color" id="color" class="form-control" style="width: 100px">
                                            <option value="">Select Color</option>
                                            @foreach (explode(',',$product->p_color) as $color)
                                            <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix ml-2">
                                    <span>Quantity: </span>
                                    <input name="qty" id="qty" type="text" pattern="[0-9]*" value="1" min="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="product_price text-danger">
                                {{ $setting->default_currency }} {{ $product->p_discount_price }}
                            </div>
                            <div class="product_price ml-3">
                                <del>
                                    {{ $setting->default_currency }} {{ $product->p_price }}
                                </del>
                            </div>
                            <div class="button_container flex">
                                <div class="" role="" aria-label="Basic example">
                                    <button class="btn btn-sm btn-primary" style="cursor: pointer">Add To Cart</button>

                                    <a href="" class="btn btn-sm btn-warning ml-2" style="cursor: pointer">Add To Wishlist</a>


                                </div>
                                {{-- @if (session()->has('user_id') || session()->has('email'))
                                <div class="" role="" aria-label="Basic example">
                                    <button class="btn btn-sm btn-primary" style="cursor: pointer">Add To Cart</button>

                                    <a href="" class="btn btn-sm btn-warning ml-2" style="cursor: pointer">Add To Wishlist</a>


                                </div>
                                @else
                                <div class="">
                                    <a class="text-white btn btn-sm btn-danger">if you want to buy this Please login first</a>


                                </div>
                                @endif --}}

                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="row mt-5">
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Product Details of: {{ $product->p_title }}</h4>
                    </div>
                    <div class="card-body">
                        {!! $product->p_desc !!}
                    </div>


                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Ratings & Reviews of: {{ $product->p_title }}</h4>
                    </div>



                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                Average Review of  Product:<br>

                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="col-md-3">
                                {{-- all review show --}}
                                        Total Review Of This Product:<br>
                                        <div>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span> Total 5 </span>
                                            </div>

                                            <div>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star "></span>
                                                <span> Total 4 </span>
                                            </div>

                                            <div>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span> Total 3 </span>
                                            </div>

                                            <div>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span> Total 2 </span>
                                            </div>

                                            <div>
                                                <span class="fa fa-star text-warning"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span> Total 1 </span>
                                            </div>


                            </div>
                            <div class="col-lg-6">
                                <form action="" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="details">Write Your Review</label>
                                        <textarea type="text" class="form-control" name="review" required=""></textarea>
                                    </div>
                                    <input type="hidden" name="product_id" value="3">
                                    <div class="form-group ">
                                        <label for="review">Write Your Review</label>
                                        <select class="custom-select form-control-sm" name="rating" style="min-width: 120px;">
                                            <option disabled="" selected="">Select Your Review</option>
                                            <option value="1">1 star</option>
                                            <option value="2">2 star</option>
                                            <option value="3">3 star</option>
                                            <option value="5">4 star</option>
                                            <option value="5">5 star</option>
                                        </select>

                                    </div>

                                    <button type="submit" class="btn btn-sm btn-info" style="cursor: pointer"><span class="fa fa-star "></span> submit review</button>

                                {{-- <p>Please at first login to your account for submit a review.</p> --}}

                                </form>
                            </div>
                        </div>
                            <br>

                        {{-- all review of this product --}}
                        <strong>All review of Product name</strong> <hr>
                        <div class="row">
                                <div class="card col-lg-5 m-2">
                                <div class="card-header">
                                        Mehedi  ( 15-jun-23 )
                                </div>
                                <div class="card-body">
                                    <div>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
			</div>
		</div>

	 </div>
	</div>
</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">

						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
                            @if ($recent->count() > 0)
                                @foreach ($recent as $row)
                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image">
                                            <img src="{{ asset('storage/'.$row->thumbnail) }}" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">{{ $setting->default_currency }} {{ $row->p_discount_price }}<span>{{ $setting->default_currency }} {{ $row->p_price }}</span></div>
                                            <div class="viewed_name">
                                                <a href="{{ route('single.product',$row->p_slug) }}">{{ $row->p_title }}</a>
                                            </div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            @endif
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->
    @include('user.HomeComponent.brand')

@endsection
@section('script')
<script src="{{ asset('user/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('user/js/product_custom.js') }}"></script>
<script>
    $(document).ready(function(){
        $(document).on('submit','#addToCartForm',function(){
            event.preventDefault();
            @if (session()->exists('user_id'))
                let formData = new FormData(this);
                $.ajax({
                    url:'{{ route("cart.store") }}',
                    method:'POST',
                    data: formData,
                    contentType:false,
                    processData:false,
                    success: function(data){
                        if (data.error) {
                            toastr.error(data.error);
                        }else if(data.success){
                            toastr.success(data.success);
                        }

                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h5>'+value+'</h5>');
                        });
                    }
                });
            @else
            toastr.error('<h5>Please login for buy this..</h5>');
            @endif
        });
    });
</script>
@endsection
