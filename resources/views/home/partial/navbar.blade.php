
 {{-- <div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="spinner"></div>
        </div>
    </div>
</div> --}}


<!-- Start Navbar Area -->
<div class="navbar-area ">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="#" class="logo" style="background-color: #fff; padding:8px">
            {{-- <img src="assets/img/logo/logo1.png" alt="Logo"> --}}
            <img  
            style="max-width: 100%; max-height:100%; object-fit:cover; width:60px; height:30px "
            src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}"  alt="Logo">
        
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav navbar-custom">
        <div class="container-fluid">
            <nav class="container-max navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="#" style="background-color: #fff; padding-left:8px; padding-right:8px">
                    {{-- <img src="assets/img/logo/logo1.png" alt="Logo"> --}}
                    
                    <img 
                    style="max-width: 100%; max-height:100%; object-fit:cover; width:300px; height:50px "
                    src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}"  alt="Logo">
 
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        @forelse ($menuItems as $item) 
                            <li class="nav-item">
                                <a href="{{ route('home.pages', $item->slug) }}" class="nav-link">
                                    {{ $item->name }}
                                    @if($item->dropdownItems->count())
                                        <i class="bx bx-plus"></i>
                                    @endif
                                </a>
                                @if($item->dropdownItems->count())
                                    <ul class="dropdown-menu">
                                        @foreach ($item->dropdownItems as $dropdown)
                                            <li class="nav-item">
                                                <a href="{{ route('home.pages', $dropdown->slug) }}" class="nav-link">
                                                    {{ $dropdown->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @empty
                            <p>No data found</p>
                        @endforelse
                    </ul>
                
                    <div class="side-nav d-in-line align-items-center">
                        {{-- <div class="side-item">
                            <div class="cart-btn">
                                <a href="{{ route('login')}}" style="color: #fff">
                                    Login/Register
                                </a>
                            </div>
                        </div> --}} 
                        <div class="side-item">
                            <div class="nav-add-btn">
                                <a href="{{ route('home.login')}}" class="default-btn border-radius">
                                    Login/Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            
            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center  align-items-center">
                        <div class="side-item">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-bags"></i>
                                    <span>0</span>
                                </a>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="search-box">
                                <i class="flaticon-loupe"></i>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="user-btn">
                                <a href="login-register.html">
                                    <i class="flaticon-contact"></i>
                                </a>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="nav-add-btn">
                                <a href="listing-details.html" class="default-btn border-radius">
                                    Add Listing 
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->