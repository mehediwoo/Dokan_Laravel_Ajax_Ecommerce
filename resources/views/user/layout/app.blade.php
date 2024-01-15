<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- css file -->
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('user/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/styles/responsive.css') }}">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/fontawesome/css/all.min.css') }}" />
<!--Toast message css file-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
@yield('css')

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		@include('user.layout.topMenu')

		<!-- Header Main -->

		@include('user.layout.header')

		<!-- Main Navigation -->

        @include('user.layout.menu')

		<!-- Mobile Menu -->

		@include('user.layout.mobileMenu')

	</header>

    <!-- Main Content-->
    @yield('content')



	<!-- Newsletter -->
    @include('user.assets.newslatter')

	<!-- Footer & Copyright -->
    @include('user.layout.footer')
</div>

    <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('user/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('user/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('user/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('user/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('user/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('user/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('user/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('user/plugins/easing/easing.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('admin/assets/plugin/toastr/toastr.min.js') }}"></script>
    <!-- AJAX CSRF Token -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @php
        $location = url()->full();
    @endphp
    @yield('script')

    <script>
        $(document).ready(function(){
            // Customer Registration
            $(document).on('submit','#registerForm',function(event){
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: '{{ route("customer.register") }}',
                    method: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if (data==true) {
                            toastr.success('<h5>Registration Successfully</h5>');
                            $('#registerForm').trigger('reset');
                        }else{
                            toastr.error('<h5>Something went wrong!</h5>');
                        }
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                        toastr.error('<h5>'+value+'</h5>');
                        });
                    }
                });
            });
            // Customer login
            $(document).on('submit','#loginForm',function(event){
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: '{{ route("customer.login") }}',
                    method: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if (data==true) {
                            toastr.success('<h5>Login Successfully</h5>');
                            $('#loginForm').trigger('reset');
                            window.location.href='{{ $location }}';
                        }else{
                            toastr.error('<h5>Incorrect information!</h5>');
                        }
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                        toastr.error('<h5>'+value+'</h5>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
            @if(session()->has('success'))
            toastr.success(" {{ session()->get('success') }} ");
            @elseif (session()->has('warning'))
            toastr.warning(" {{ session()->get('warning') }} ");
            @elseif(session()->has('error'))
            toastr.error(" {{ session()->get('error') }} ");

            @endif
    </script>
</body>

</html>
