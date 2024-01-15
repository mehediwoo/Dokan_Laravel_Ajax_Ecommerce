@extends('user.layout.app')
@section('title','Cart | '.$setting->logo)
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/cart_responsive.css') }}">
@endsection
@section('content')

	<!-- Cart -->

	<div class="cart_section mt-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
                        <div id="cart_list">

                        </div>

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
        // get cart itam list
        function cart_list(){
            $.ajax({
                url:'{{ route("get.cart") }}',
                success:function(data){
                    $('#cart_list').html(data);
                    $(this).closest('div').fadeOut();
                }
            });
        }
        cart_list();
        //  remove cart iteam
        $(document).on('click','#removeCart',function(event){
            event.preventDefault();
            let cart_id = $(this).attr('remove_id');
            $.ajax({
                url:'{{ route("cart.remove") }}',
                data:{id:cart_id},
                success:function(data){
                    toastr.success('Iteam has been remove');
                    cart_list();
                }
            });
        });
        // cart quantity increase
        $(document).on('click','#plus',function(){
            event.preventDefault();
            let plus_id = $(this).attr('plus_id');
            $.ajax({
                url:'{{ route("cart.plus") }}',
                data:{id:plus_id},
                success: function(data){
                    if (data.success) {
                        toastr.success(data.success);
                        cart_list();
                    }
                },
            });
        });
        // cart quantity dicrease
        $(document).on('click','#minus',function(){
            event.preventDefault();
            let minus_id = $(this).attr('minus_id');
            $.ajax({
                url:'{{ route("cart.minus") }}',
                data:{id:minus_id},
                success: function(data){
                    if (data.info) {
                        toastr.info(data.info);
                        cart_list();
                    }else{
                        toastr.error(data.error);
                        cart_list();
                    }
                },
            });
        });
    });
</script>
@endsection
