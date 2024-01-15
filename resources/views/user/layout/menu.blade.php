<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <ul class="cat_menu">
                            @if (!empty($category) && $category->count() > 0)
                                @foreach ($category as $category)

                                <li class="hassubs">
                                    <a href="{{ route('category.product',$category->slug) }}">
                                        <p class="{{ $category->icon }} logo_icon"></p>

                                        {{  $category->title }}
                                        <i class="fas fa-chevron-right icon"></i>
                                    </a>

                                    <ul>
                                        @if (!empty($category->subcategory) && $category->subcategory->count() > 0)
                                        @foreach ($category->subcategory as $sub_category)
                                        <li class="hassubs">
                                            <a href="{{ route('sub.category.product',$sub_category->slug) }}">
                                                {{ $sub_category->title }}
                                                @if ($sub_category->childcategory->count() > 0)
                                                <i class="fas fa-chevron-right"></i>
                                                @endif
                                            <a>
                                            <ul>
                                                @foreach ($sub_category->childcategory as $child_category)
                                                <li>
                                                    <a href="{{ route('child.category.product',$child_category->slug) }}">
                                                        {{ $child_category->title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
                                </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            <li>
                                <a href="#">Shop</a>
                            </li>

                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
