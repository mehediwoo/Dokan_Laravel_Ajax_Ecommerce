<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page_menu_content">

                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">


                        <li class="page_menu_item">
                            <a href="#">Home</a>
                        </li>

                        <li class="page_menu_item">
                            <a href="#">Shop</a>
                        </li>

                        <li class="page_menu_item">
                            <a href="contact.html">contact</a>
                        </li>
                    </ul>

                    <div class="menu_contact">
                        <div class="menu_contact_item">
                            <div class="menu_contact_icon">
                                <img src="{{ asset('user/images/phone_white.png') }}" alt="">
                                @php
                                    $phone =  explode(',',$setting->phone);
                                    $phone = $phone['0'];
                                @endphp
                            </div>{{ $phone }}
                        </div>
                        <div class="menu_contact_item">
                            <div class="menu_contact_icon">
                                <img src="{{ asset('user/images/mail_white.png') }}" alt="">
                            </div>
                            @php
                                $email =  explode(',',$setting->email);
                                $email = $email['0'];
                            @endphp
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
