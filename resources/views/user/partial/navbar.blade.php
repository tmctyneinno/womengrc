 <!-- Start header area -->
 <header class="header__section">
    <div class="main__header d-flex justify-content-between align-items-center">
        <div class="header__left d-flex align-items-center">
          
            <div class="offcanvas__header--menu__open ">
                <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                    <span class="visually-hidden">Offcanvas Menu Open</span>
                </a>
            </div>   
            <div class="search__box">
                <form class="search__box--form laptop__hidden" action="#">
                    <input class="search__box--input__field" placeholder="Search for ...." type="text">
                    <span class="search__box--icon"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.79171 8.74992C6.97783 8.74992 8.75004 6.97771 8.75004 4.79159C8.75004 2.60546 6.97783 0.833252 4.79171 0.833252C2.60558 0.833252 0.833374 2.60546 0.833374 4.79159C0.833374 6.97771 2.60558 8.74992 4.79171 8.74992Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.16671 9.16659L8.33337 8.33325" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </form>
                <button class="search__btn--field hidden__btn" type="submit"><svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_46_1375)">
                    <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.84769 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.84769 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.84769 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"></path>
                    <path d="M19.762 18.6124L15.1007 13.9511C14.7831 13.6335 14.2687 13.6335 13.9511 13.9511C13.6335 14.2684 13.6335 14.7834 13.9511 15.1007L18.6124 19.762C18.7711 19.9208 18.979 20.0002 19.1872 20.0002C19.395 20.0002 19.6031 19.9208 19.762 19.762C20.0796 19.4446 20.0796 18.9297 19.762 18.6124Z" fill="currentColor"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_46_1375">
                    <rect width="20" height="20" fill="currentColor"></rect>
                    </clipPath>
                    </defs>
                    </svg>
                </button>
            </div>
            <div class="main__logo logo-desktop-block">
                <a class="main__logo--link" href="#">
                    <img 
                        style="object-fit: contain; width: 3%; height: 3%;"
                        class="main__logo--img desktop light__logo" src="{{ asset( $contactUs->site_logo )}}" alt="logo-img">
                    <img 
                        style="object-fit: contain; width: 3%; height: 3%;"
                        class="main__logo--img desktop dark__logo" src="{{ asset( $contactUs->site_logo )}}" alt="logo-img">
                    <img 
                        style="object-fit: contain; width: 3%; height: 3%;"
                        class="main__logo--img mobile" src="{{ asset( $contactUs->site_logo )}}" alt="logo-img">
                </a>
            </div>
        </div>
        <div class="header__right d-flex align-items-center">
            <div class="main__menu d-none d-xl-block">
                <nav class="main__menu--navigation">
                    <ul class="main__menu--wrapper d-flex align-items-center">
                        <li class="main__menu--items">
                            <a class="main__menu--link" >
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.8333 4.66667H11.6667V3.5C11.6667 2.5335 10.8662 1.75 9.91667 1.75H2.33333C1.38383 1.75 0.583333 2.5335 0.583333 3.5V10.5C0.583333 11.4665 1.38383 12.25 2.33333 12.25H12.8333C13.7828 12.25 14.5833 11.4665 14.5833 10.5V6.41667C14.5833 5.45 13.7828 4.66667 12.8333 4.66667ZM2.33333 2.91667H9.91667C10.3993 2.91667 10.8333 3.35067 10.8333 3.83333V4.66667H2.33333C1.85067 4.66667 1.41667 4.23267 1.41667 3.75C1.41667 3.26733 1.85067 2.91667 2.33333 2.91667ZM12.8333 10.5C12.8333 10.983 12.3993 11.4167 11.9167 11.4167H2.33333C1.85067 11.4167 1.41667 10.983 1.41667 10.5V6.41667H12.8333C13.316 6.41667 13.75 6.85067 13.75 7.33333V10.5ZM10.0833 8.16667C9.60067 8.16667 9.16667 8.60067 9.16667 9.08333C9.16667 9.566 9.60067 10 10.0833 10C10.566 10 11 9.566 11 9.08333C11 8.60067 10.566 8.16667 10.0833 8.16667Z" fill="#16A34A"/>
                                </svg> 
                                {{-- Wallet Balance: <span class="wallet-balance">{{ $wallet->currency}}{{ number_format($wallet->balance, 2) }}</span> --}}
                            </a>
                        </li>
                        
                        {{-- <li class="main__menu--items">
                            <a class="main__menu--link" href="{{ route('user.properties')}}">
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 0L0 4.125V11H3.72581V8.59381C3.72581 7.64165 4.51713 6.87506 5.5 6.87506C6.48287 6.87506 7.27419 7.64165 7.27419 8.59381V11H11V4.125L5.5 0Z" fill="#16A34A"/>
                                </svg>
                               Buy Properties
                            </a>
                        </li> --}}
                       
                    </ul>
                </nav>
            </div>
            <div class="header__nav-bar__wrapper d-flex align-items-center">
                <ul class="nav-bar__menu d-flex">
                    
                   
                    <li class="nav-bar__menu--items header__apps--menu position-relative">
                        <a class="nav-bar__menu--icon apps__menu--icon active" href="#">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0167 2.42505C7.25841 2.42505 5.01674 4.66672 5.01674 7.42505V9.83338C5.01674 10.3417 4.80007 11.1167 4.54174 11.55L3.58341 13.1417C2.99174 14.125 3.40007 15.2167 4.48341 15.5834C8.07507 16.7834 11.9501 16.7834 15.5417 15.5834C16.5501 15.2501 16.9917 14.0584 16.4417 13.1417L15.4834 11.55C15.2334 11.1167 15.0167 10.3417 15.0167 9.83338V7.42505C15.0167 4.67505 12.7667 2.42505 10.0167 2.42505Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round"/>
                                <path d="M11.5584 2.6667C11.3001 2.5917 11.0334 2.53337 10.7584 2.50003C9.95843 2.40003 9.19176 2.45837 8.4751 2.6667C8.71676 2.05003 9.31676 1.6167 10.0168 1.6167C10.7168 1.6167 11.3168 2.05003 11.5584 2.6667Z" stroke="currentColor" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5166 15.8833C12.5166 17.2583 11.3916 18.3833 10.0166 18.3833C9.33327 18.3833 8.69993 18.1 8.24993 17.65C7.79993 17.2 7.5166 16.5666 7.5166 15.8833" stroke="currentColor" stroke-miterlimit="10"/>
                            </svg> 
                            <span class="nav-bar__notification--badge" id="notificationCount">{{ $notificationCount }}</span>
                            <span class="visually-hidden">Notification</span>                                         
                        </a>
                        <script>
                            // Example JavaScript to update the counter dynamically
                            document.addEventListener('DOMContentLoaded', function() {
                                setInterval(function() {
                                    fetch('/api/notifications/count') // An API route to fetch unread notification count
                                        .then(response => response.json())
                                        .then(data => {
                                            document.getElementById('notificationCount').textContent = data.count; // Update counter
                                        });
                                }, 60000); // Update every 60 seconds
                            });

                        </script>
                       <div class="dropdown__related--apps">
                        <h3 class="dropdown__apps--title">Notification</h3>
                        <ul class="dropdown__apps--menu">
                            <div class="chat__inbox">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="chat">
                                        <div class="chat__inbox--content">
                                            <div class="chat__inbox--wrapper">
                                                <ul class="chat__inbox--menu">
                                                    @forelse ($notificationsBar as $notification)
                                                        <li class="chat__inbox--menu__list">
                                                            <a class="chat__inbox--menu__link active mark-as-read" href="{{ $notification->data['url'] ?? '#' }}" 
                                                              
                                                               {{-- data-property-mode="{{ $notification->data['property_mode'] }}"  --}}
                                                               >
                                                                <div class="chat__inbox--menu__wrapper d-flex justify-content-between">
                                                                    <div class="chat__inbox--author d-flex align-items-center">
                                                                        <div class="chat__inbox--author__content">
                                                                            <p class="chat__inbox--author--name">{{ $notification->data['message'] }}</p>
                         
                                                                        </div>
                                                                    </div>
                                                                    <span class="chat__inbox--date-time">{{ $notification->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                         
                                                       
                                                    @empty
                                                        <li class="chat__inbox--menu__list">
                                                            <p class="chat__inbox--author__desc">No Notifications</p>
                                                        </li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <div class="dropdown__apps__footer">
                            {{-- <a class="solid__btn dropdown__apps--view__all" href="{{ route('user.notifications.index') }}">View All Notifications</a> --}}
                        </div>
                    
                    </div>
                    
                    </li>
                    
                    
                    <li class="nav-bar__menu--items">
                        <a class="nav-bar__menu--icon" href="#" id="light__to--dark">
                            <svg class="light--mode__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.99992 15.4166C12.9915 15.4166 15.4166 12.9915 15.4166 9.99992C15.4166 7.00838 12.9915 4.58325 9.99992 4.58325C7.00838 4.58325 4.58325 7.00838 4.58325 9.99992C4.58325 12.9915 7.00838 15.4166 9.99992 15.4166Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.9501 15.9501L15.8417 15.8417M15.8417 4.15841L15.9501 4.05008L15.8417 4.15841ZM4.05008 15.9501L4.15841 15.8417L4.05008 15.9501ZM10.0001 1.73341V1.66675V1.73341ZM10.0001 18.3334V18.2667V18.3334ZM1.73341 10.0001H1.66675H1.73341ZM18.3334 10.0001H18.2667H18.3334ZM4.15841 4.15841L4.05008 4.05008L4.15841 4.15841Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg  class="dark--mode__icon"  xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="20" height="20" viewBox="0 0 512 512"><title>Moon</title><path d="M264 480A232 232 0 0132 248c0-94 54-178.28 137.61-214.67a16 16 0 0121.06 21.06C181.07 76.43 176 104.66 176 136c0 110.28 89.72 200 200 200 31.34 0 59.57-5.07 81.61-14.67a16 16 0 0121.06 21.06C442.28 426 358 480 264 480z"></path></svg>
                            <span class="visually-hidden">Dark Light</span> 
                        </a>
                    </li>
                </ul> 
                <div class="header__user--profile"> 
                    <a class="header__user--profile__link d-flex align-items-center" href="#">
                        <img class="header__user--profile__thumbnail" 
                        style="border-radius:50px; max-height: 100%; max-width:100%; width:30px; height:30px;  object-fit: cover;"
                        src="{{ Auth::user()->profile_picture ? asset('storage/'.$user->profile_picture) : asset('assets/admin/img/dashboard/avater.jpg') }}" 
                        alt="img">

                        <span class="header__user--profile__name">{{ Auth::user()->name}}</span>
                        <span class="header__user--profile__arrow"><svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.9994 4.97656L10.1244 0.851563L11.3027 2.0299L5.9994 7.33323L0.696067 2.0299L1.8744 0.851563L5.9994 4.97656Z" fill="currentColor" fill-opacity="0.5"/>
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown__user--profile">
                        <ul class="user__profile--menu">
                            
                            <li class="user__profile--menu__items">
                                <a class="user__profile--menu__link" href="{{ route('user.profile.edit')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="user-2" class="lucide lucide-user-2 inline-block size-4 ltr:mr-2 rtl:ml-2"><circle cx="12" cy="8" r="5"></circle><path d="M20 21a8 8 0 0 0-16 0"></path></svg> My Profile</a></li>

                            {{-- <li class="user__profile--menu__items"><a class="user__profile--menu__link position-relative" href="./chat.html"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="mail" class="lucide lucide-mail inline-block size-4 ltr:mr-2 rtl:ml-2"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg> Inbox <span class="profile__messages--count">12</span> </a></li> --}}

                        </ul>
                        <div class="dropdown__user--profile__footer">
                            <a class="user__profile--log-out__btn" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="log-out" class="lucide lucide-log-out inline-block size-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                                Log Out
                            </a>
                        </div>
                        
                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



<div class="offcanvas__header">
    <div class="offcanvas__inner">
        <div class="offcanvas__logo">
            <a class="offcanvas__logo_link" href="{{ route('user.dashboard')}}">
                <img  style="object-fit: contain; width: 10%; height: 10%;" class="light__logo" src="{{ asset( $contactUs->site_logo )}}" alt="Logo-img" width="158" height="36">
                <img  style="object-fit: contain; width: 10%; height: 10%;" class="dark__logo" src="{{ asset( $contactUs->site_logo )}}" alt="Logo-img" width="158" height="36">
            </a>
            <button class="offcanvas__close--btn" data-offcanvas>close</button>
        </div> 
        
        <nav class="offcanvas__menu">
            <ul class="offcanvas__menu_ul">
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="{{ route('user.dashboard')}}">Dashboard</a>
                   
                </li>
                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="{{ route('user.findMentor')}}">Find Mentor</a>
                </li>
                
                <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{ route('user.chat.index')}}">
                    Mentorship (Chat)</a>
                </li>
               
            </ul>
        </nav> 
        <div class="side__menu--footer mobile__menu--footer">
            <div class="side__menu--info">
                <div class="side__menu--info__list">
                    <h3 class="side__menu--info__title">Customer Care Phone</h3>
                    <p><a class="side__menu--info__text" href="tel:{{ $contactUs ? ($contactUs->first_phone) : '' }}">: {{ $contactUs ? ($contactUs->first_phone) : '' }}</a></p>
                </div>
                <div class="side__menu--info__list">
                    <h3 class="side__menu--info__title">Need Live Support?</h3>
                    <p><a class="side__menu--info__text" href="mailto:{{ $contactUs ? ($contactUs->first_email) : '' }}">{{ $contactUs ? ($contactUs->first_email) : '' }}</a></p>
                </div>
            </div>
            <div class="side__menu--share d-flex align-items-center">
                <h3 class="side__menu--share__title">Follow us :</h3>
                <ul class=" side__menu--share__wrapper d-flex align-items-center">
                    <li class="side__menu--share__list">
                        <a class="side__menu--share__icon" target="_blank" href="{{ $sociallink->facebook }}">
                            <svg width="10" height="17" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"></path>
                            </svg>
                            <span class="visually-hidden">Facebook</span>
                        </a>
                    </li>
                    <li class="side__menu--share__list">
                        <a class="side__menu--share__icon" target="_blank" href="{{ $sociallink->linkedin }}">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.635 13.634V8.966c0-1.804-.564-3.085-2.604-3.085-1.081 0-1.781.602-2.095 1.169-.133.202-.175.471-.175.741v5.843H5.519V4.618h3.118v1.392c.456-.714 1.272-1.64 3.264-1.64 2.131 0 3.131 1.298 3.131 4.262V13.634h-1.365zM2.011 3.364C1.014 3.364.313 2.694.313 1.845S1.012.327 2.011.327c.997 0 1.699.668 1.699 1.518s-.702 1.519-1.699 1.519zM.443 13.634h3.133V4.618H.443v9.016z" fill="currentColor"/>
                            </svg>
                            <span class="visually-hidden">LinkedIn</span>
                        </a>
                    </li>
                    <li class="side__menu--share__list">
                        <a class="side__menu--share__icon" target="_blank" href="{{ $sociallink->linkedin }}">
                            <svg width="16" height="16" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"></path>
                            </svg>  
                            <span class="visually-hidden">Instagram</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>