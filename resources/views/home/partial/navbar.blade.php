
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
        <a href="index.html" class="logo">
            <img src="assets/img/logo/logo1.png" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav navbar-custom">
        <div class="container-fluid">
            <nav class="container-max navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo/logo1.png" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                Home 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about')}}" class="nav-link">
                                About 
                                <i class="bx bx-plus"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('vision')}}" class="nav-link">
                                        Vision 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('purpose')}}" class="nav-link">
                                        Purpose
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mission')}}" class="nav-link">
                                        Mission
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('event')}}" class="nav-link">
                                Membership 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about')}}" class="nav-link">
                                Resource 
                                <i class="bx bx-plus"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('event')}}" class="nav-link">
                                        Event 
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('purpose')}}" class="nav-link">
                                        Mentorship
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mission')}}" class="nav-link">
                                        Community Forum
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog')}} " class="nav-link">
                                Blog 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact')}}" class="nav-link">
                                Recognition
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact')}}" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <div class="side-nav d-in-line align-items-center">
                        
                        <div class="side-item">
                            <div class="cart-btn">
                                <a href="{{ route('login')}}" style="color: #fff">
                                    Login/Register
                                </a>
                            </div>
                        </div>
                        <div class="side-item">
                            <div class="nav-add-btn">
                               <a href="listing-details.html" class="default-btn border-radius">
                                    Get Involved
                                    <i class='bx bx-plus'></i>
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
