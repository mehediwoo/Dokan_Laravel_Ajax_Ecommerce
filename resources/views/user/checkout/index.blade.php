@extends('user.layout.app')
@section('title','Checkout '.$setting->logo)
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cart_responsive.css') }}">
@endsection
@section('content')

	<!-- Checkout page -->
    <div class="container mt-4">
        <h3 class="text-center text-underline">Checkout</h3>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        Shipping Information
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><strong>Name:</strong> {{ $shipping_info->name }}</li>
                            {{-- <li><strong>Email:</strong> {{ $shipping_info->user->email }}</li> --}}
                            <li><strong>Phone:</strong> {{ $shipping_info->cell_phone }}</li>
                            <li><strong>Home:</strong> {{ $shipping_info->home_phone }}</li>
                            <li><strong>Division:</strong> {{ $shipping_info->division }}</li>
                            <li><strong>City:</strong> {{ $shipping_info->city }}</li>
                            <li><strong>Address:</strong> <br> {{ $shipping_info->address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        Product
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>image</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @if (!@empty($cart))
                                    @foreach ($cart as $row)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/'.$row->product->thumbnail) }}" alt="" style="height: 50px;width:50px">
                                        </td>
                                        <td>{{ substr($row->product->p_title,0,10) }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td>{{ $row->total_price }}</td>
                                    </tr>
                                    @php
                                        $total = $total + $row->total_price;
                                    @endphp
                                    @endforeach
                                @else
                                <tr>
                                    <p class="text-danger">Your checkout is empty</p>
                                </tr>
                                @endif

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Grand Total: </td>
                                    <td>
                                        <h6>{{ $setting->default_currency }} {{ $total }}</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                       Payment
                    </div>
                    <div class="card-body">
                        <form action="" id="paymentMethod" method="post">
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="payment_method" value="bkash">
                                <label class="form-check-label mr-2">
                                  Bkash
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="payment_method" value="nagad">
                                <label class="form-check-label mr-2">
                                  Nagad
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="payment_method" value="rocket">
                                <label class="form-check-label mr-2">
                                  Rocket
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="payment_method" value="upay">
                                <label class="form-check-label mr-2">
                                  Upay
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="payment_method" value="cash on delivery">
                                <label class="form-check-label mr-2">
                                  Cash on delivery
                                </label>
                            </div>
                            <button type="submit" id="orderNow" style="color:black" class="btn btn-primary form-control mt-3">Order Now</button>

                            <button id="loader" class="btn btn-primary d-none mt-3 form-control text-white" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script src="{{ asset('user/js/cart_custom.js') }}"></script>
<script>
    $(document).ready(function(){
        $(document).on('submit','#paymentMethod',function(event){
            event.preventDefault();
            $('#orderNow').addClass('d-none');
            $('#loader').removeClass('d-none');
            let formData = new FormData(this);
            $.ajax({
                url:'{{ route("confirm.order") }}',
                method:"POST",
                data:formData,
                contentType:false,
                processData:false,
                success:function(data){
                    if (data.error) {
                        toastr.error(data.error);
                    }else if(data.success){
                        toastr.success(data.success);
                    }
                    $('#orderNow').removeClass('d-none');
                    $('#loader').addClass('d-none');
                },
                error:function(error){
                    var err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error(value);
                    })
                    $('#orderNow').removeClass('d-none');
                    $('#loader').addClass('d-none');
                }
            });
        });
    });
</script>
@endsection
