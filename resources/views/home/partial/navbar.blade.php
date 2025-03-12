<!-- Start Navbar Area -->
<div class="navbar-area ">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="#" class="logo" style="background-color: #fff; padding:8px">
           <img  
            style="max-width: 100%; max-height:100%; object-fit:cover; 
            width:20px; height:20px "
            src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}"  alt="Logo">
        
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav navbar-custom">
        <div class="container-fluid">
            <nav class="container-max navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="#" style="background-color: #fff; padding-left:8px; padding-right:8px">
                    <img 
                    style="max-width: 100%; max-height:100%; object-fit:cover; 
                    width:70px;"
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
                       
                        <div class="side-item">
                            <div class="nav-add-btn">
                                @guest
                                    <a href="{{ route('home.login') }}" class="default-btn border-radius">
                                        Login/Register
                                    </a> 
                                @else
                                <div class="d-flex">
                                    <a href="{{ route('user.dashboard')}}" class="default-btn border-radius ">
                                        My Account
                                    </a>
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
                            <div class="nav-add-btn">
                                @guest
                                    <a href="{{ route('home.login') }}" class="default-btn border-radius">
                                        Login/Register
                                    </a> 
                                    
                                @else
                                    <a href="{{ route('user.dashboard')}}" class="default-btn border-radius">
                                        My Account
                                    </a>
                                @endguest
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
