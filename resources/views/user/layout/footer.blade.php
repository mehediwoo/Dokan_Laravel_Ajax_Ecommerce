<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="{{ route('home') }}">{{ $setting->logo }}</a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    @php
                        $phone = explode(',',$setting->phone);
                        $phone = $phone[0];
                    @endphp
                    <div class="footer_phone">{{ $phone }}</div>
                    <div class="footer_contact_text">
                        <p>{!! $setting->address !!}</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            @if ($social->facebook !=null)
                            <li>
                                <a href="{{ $social->facebook }}" target='_blank'><i class="fab fa-facebook-f"></i></a>
                            </li>
                            @endif
                            @if ($social->twitter != null)
                            <li>
                                <a href="{{ $social->twitter }}" target='_blank'><i class="fab fa-twitter"></i></a>
                            </li>
                            @endif
                            @if ($social->instagram != null)
                            <li>
                                <a href="{{ $social->instagram }}" target='_blank'><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            @endif
                            @if ($social->tiktok != null)
                            <li>
                                <a href="{{ $social->tiktok }}" target='_blank'><i class="fa-brands fa-tiktok"></i></a>
                            </li>
                            @endif
                            @if ($social->linkedin != null)
                            <li>
                                <a href="{{ $social->linkedin }}" target='_blank'><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                            @endif
                            @if ($social->youtube != null)
                            <li>
                                <a href="{{ $social->youtube }}" target='_blank'><i class="fa-brands fa-youtube"></i></a>
                            </li>
                            @endif
                            @if ($social->google != null)
                            <li>
                                <a href="{{ $social->google }}" target='_blank'><i class="fa-brands fa-google"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <ul class="footer_list">
                        @if (!empty($rand_cate) && $rand_cate->count()>0)
                            @foreach ($rand_cate as $iteam)
                            <li><a href="#">{{ $iteam->title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>



            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> {!! $setting->copyright !!}
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="{{ asset('user/images/logos_1.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('user/images/logos_2.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('user/images/logos_3.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('user/images/logos_4.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
