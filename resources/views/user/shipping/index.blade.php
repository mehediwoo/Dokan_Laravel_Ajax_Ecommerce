@extends('user.layout.app')
@section('title','Shipping Information '.$setting->logo)
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cart_responsive.css') }}">
@endsection
@section('content')
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Information</div>
                    <form action="" id="shippingForm" class="mt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" placeholder="Type your name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" placeholder="Type your mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="home_phone">Home Phone</label>
                                        <input type="text" name="home_phone" placeholder="Type your home phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="division">Division</label>
                                        <input type="text" name="division" placeholder="Type your division" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" placeholder="Type your city name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address">Address</label>
                                    <textarea name="address" cols="5" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="savebtn" class="btn btn-primary mt-1">Save</button>

                            <button id="loader" class="btn btn-primary d-none mt-1" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
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
        $(document).on('submit','#shippingForm',function(){
            event.preventDefault();
            let formData = new FormData(this);
            $('#savebtn').addClass('d-none');
            $('#loader').removeClass('d-none');
            $.ajax({
                url:'{{ route("shipping.store") }}',
                method:'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data){
                    if (data.success) {
                        toastr.success(data.success);
                    }
                    $('#savebtn').removeClass('d-none');
                    $('#loader').addClass('d-none');
                },
                error:function(error){
                    let err= error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error(value);
                    });
                    $('#savebtn').removeClass('d-none');
                    $('#loader').addClass('d-none');
                }
            });
        });
    });
</script>
@endsection
