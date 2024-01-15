<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item">
                    <div class="top_bar_icon">
                        <img src="{{ asset('user/images/phone.png') }}" alt="">
                    </div>
                    @php
                        $phone =  explode(',',$setting->phone);
                        $phone = $phone['0'];
                    @endphp
                    {{ $phone }}
                </div>
                <div class="top_bar_contact_item">
                    <div class="top_bar_icon">
                        <img src="{{ asset('user/images/mail.png') }}" alt="">
                    </div>
                    @php
                        $email =  explode(',',$setting->email);
                        $email = $email['0'];
                    @endphp

                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </div>

                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            @if (session()->has('name') && session()->has('email'))
                            <li>
                                <a href="#">Welcome: {{ session()->get('name') }}</a>
                                <ul>
                                    <li><a href="">Profile</a></li>
                                    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="#">
                                    <div class="user_icon">
                                        <img src="{{ asset('user/images/user.svg') }}" alt="">
                                    </div>
                                    Register
                                </a>
                                <ul>
                                    <div class="card" style="width: 17rem;">
                                        <h5 class="card-header bg-primary text-white">Please register for a customer</h5>
                                        <div class="card-body">

                                            <form action="" id="registerForm" method="post">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Your Name..." >
                                                </div>

                                                <div class="form-group">
                                                    <label>Username <span class="text-danger">*</span></label>
                                                    <input type="text" name="user_name" class="form-control" placeholder="Your User Name...">
                                                </div>

                                                <div class="form-group">
                                                    <label>E-Mail <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" placeholder="Your User Name..." >
                                                </div>

                                                <div class="form-group">
                                                    <label>Password <span class="text-danger">*</span></label>
                                                    <input type="password" name="password" class="form-control" placeholder="Your Password..." >
                                                </div>

                                                <div class="form-group">
                                                    <label>Re-Type Password <span class="text-danger">*</span></label>
                                                    <input type="password" name="re_type_password" class="form-control" placeholder="Your Re-Type Password...">
                                                </div>

                                                <button class="btn btn-outline-primary form-control" style="cursor: pointer">Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Sign in<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <div class="card" style="width: 13rem;">
                                        <h5 class="card-header bg-primary text-white">Sign in to your account</h5>
                                        <div class="card-body">

                                            <form action="" id="loginForm" method="POST">
                                                <div class="form-group">
                                                    <label>Email or Username</label>
                                                    <input type="text" name="email_username" class="form-control" placeholder="Type E-mail or Username" required>
                                                    @error('email_username')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Type Password">
                                                    @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>


                                                <button class="btn btn-outline-primary form-control" style="cursor:pointer">Sign In</button>
                                            </form>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
