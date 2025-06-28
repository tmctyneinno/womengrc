

<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        {{-- Consider linking the logo to the home page --}}
        <a href="{{ route('home') }}" class="logo" style="background-color: #fff; padding:8px">
           <img
            {{-- Consider moving styles to CSS --}}
            style="max-width: 100%; max-height:100%; object-fit:cover;
            width:20px; height:20px "
            src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}"  alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav navbar-custom">
        <div class="container-fluid">
            <nav class="container-max navbar navbar-expand-md navbar-light ">
                {{-- Consider linking the logo to the home page --}}
                <a class="navbar-brand" href="{{ route('home') }}" style="background-color: #fff; padding-left:8px; padding-right:8px">
                    <img
                    {{-- Consider moving styles to CSS --}}
                    style="max-width: 100%; max-height:100%; object-fit:cover;
                    width:70px;"
                    src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}"  alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        @forelse ($menuItems as $item)
                            @include('home.partial._nav_item', ['navItem' => $item])
                        @empty
                            <li class="nav-item"><span class="nav-link text-muted">No menu items found</span></li>
                        @endforelse
                    </ul> 
                    {{-- Right Side Navigation (Login/Register/Account) --}}
                    <div class="side-nav  "> {{-- Changed d-in-line to d-inline-flex for better alignment --}}

                        <div class="side-item">
                            <div class="nav-add-btn">
                                @guest
                                    <a href="{{ route('home.login') }}" class="default-btn border-radius text-left">
                                       Login/Register
                                    </a>
                                @else
                                <div class="d-flex "> 
                                    <a href="{{ route('user.dashboard')}}" class="default-btn border-radius me-1"> {{-- Added margin --}}
                                        My Account
                                    </a> 
                                    {{-- Logout Form --}}
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="default-btn border-radius">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                                @endguest
                            </div>
                        </div>

                    </div>
                </div>


            </nav>
        </div>
    </div>

    {{-- Responsive Side Navigation (Appears on smaller screens triggered by dot-menu) --}}
    <div class="side-nav-responsive">
        <div class="container">
            {{-- This button likely triggers the display of the .side-nav-inner below --}}
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    {{-- Content shown when the responsive side nav is open --}}
                    <div class="side-nav justify-content-center align-items-center">

                        <div class="side-item">
                            <div class="nav-add-btn">
                                @guest
                                    <a href="{{ route('home.login') }}" class="default-btn border-radius">
                                        Login/Register
                                    </a>
                                @else
                                    {{-- Consider adding logout here as well for consistency --}}
                                    <a href="{{ route('user.dashboard')}}" class="default-btn border-radius">
                                        My Account
                                    </a>
                                    {{-- Example Logout for responsive --}}
                                    {{-- <form action="{{ route('logout') }}" method="POST" class="mt-2">
                                        @csrf
                                        <button type="submit" class="default-btn border-radius">
                                            Logout
                                        </button>
                                    </form> --}}
                                @endguest
                            </div>
                            <br> {{-- Consider using margin/padding instead of <br> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- End Navbar Area -->
