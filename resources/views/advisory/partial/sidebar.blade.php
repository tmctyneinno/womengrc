<div class="dashboard__sidebar">
    <div class="main__logo logo-desktop-none">
        <h1 class="main__logo--title">
            <a class="main__logo--link" href="{{ route('advisory.dashboard') }}">
                <img class="main__logo--img desktop light__logo" 
                style="max-height: 100%; max-width:100%; width:100px; height:30px;  object-fit: contain;" 
                src="{{ asset( $contactUs->site_logo )}}" 
                alt="logo-img">
                <img class="main__logo--img desktop dark__logo" 
                style="max-height: 100%; max-width:100%; width:100px; height:30px;  object-fit: contain;" 
                src="{{ asset( $contactUs->site_logo )}}" alt="logo-img"  >
                <img class="main__logo--img mobile" 
                style="max-height: 100%; max-width:100%; width:100px; height:30px;  object-fit: contain;" 
                src="{{ asset( $contactUs->site_logo )}}" alt="logo-img"  >
            </a>
        </h1>
    </div>
    <div class="dashboard__sidebar--inner">
        <ul class="sidebar__menu" id="accordionExample">
            <li class="sidebar__menu--items">
                <a class="sidebar__menu--link active" href="{{ route('user.dashboard')}}">
                    <svg class="sidebar__menu--icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.300049 1.40005C0.300049 1.10831 0.415941 0.828521 0.622231 0.622231C0.828521 0.415941 1.10831 0.300049 1.40005 0.300049H14.6C14.8918 0.300049 15.1716 0.415941 15.3779 0.622231C15.5842 0.828521 15.7 1.10831 15.7 1.40005V3.60005C15.7 3.89179 15.5842 4.17158 15.3779 4.37787C15.1716 4.58416 14.8918 4.70005 14.6 4.70005H1.40005C1.10831 4.70005 0.828521 4.58416 0.622231 4.37787C0.415941 4.17158 0.300049 3.89179 0.300049 3.60005V1.40005ZM0.300049 8.00005C0.300049 7.70831 0.415941 7.42852 0.622231 7.22223C0.828521 7.01594 1.10831 6.90005 1.40005 6.90005H8.00005C8.29179 6.90005 8.57158 7.01594 8.77787 7.22223C8.98416 7.42852 9.10005 7.70831 9.10005 8.00005V14.6C9.10005 14.8918 8.98416 15.1716 8.77787 15.3779C8.57158 15.5842 8.29179 15.7 8.00005 15.7H1.40005C1.10831 15.7 0.828521 15.5842 0.622231 15.3779C0.415941 15.1716 0.300049 14.8918 0.300049 14.6V8.00005ZM12.4 6.90005C12.1083 6.90005 11.8285 7.01594 11.6222 7.22223C11.4159 7.42852 11.3 7.70831 11.3 8.00005V14.6C11.3 14.8918 11.4159 15.1716 11.6222 15.3779C11.8285 15.5842 12.1083 15.7 12.4 15.7H14.6C14.8918 15.7 15.1716 15.5842 15.3779 15.3779C15.5842 15.1716 15.7 14.8918 15.7 14.6V8.00005C15.7 7.70831 15.5842 7.42852 15.3779 7.22223C15.1716 7.01594 14.8918 6.90005 14.6 6.90005H12.4Z" fill="currentColor"/>
                    </svg>
                    <span class="sidebar__menu--text"> Dashboard</span>
                </a>
            </li>
            <li class="sidebar__menu--items">
                <a class="sidebar__menu--link" href="{{ route('advisory.profile.edit')}}">
                    <svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 21V19C15 17.3431 13.6569 16 12 16H6C4.34315 16 3 17.3431 3 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 3C17.6569 3 19 4.34315 19 6C19 7.65685 17.6569 9 16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 21V20C20 18.8954 19.1046 18 18 18H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="sidebar__menu--text">Profile  </span>
                </a>
            </li>
            <!-- Admin Dashboard Link (only shown to admins) -->
            @auth
                @if(auth()->user()->is_admin)
                    <li class="sidebar__menu--items">
                        <a class="sidebar__menu--link" target="_blank" href="{{ route('admin.index') }}">
                            <svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 3H3V10H10V3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 3H14V10H21V3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 14H14V21H21V14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 14H3V21H10V14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="sidebar__menu--text">Admin Dashboard</span>
                        </a>
                    </li>
                @endif
            @endauth
            
            
            <li class="sidebar__menu--items">
                <a class="sidebar__menu--link logout color-accent-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg class="sidebar__menu--icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41663 6.29995C7.67496 3.29995 9.21663 2.07495 12.5916 2.07495H12.7C16.425 2.07495 17.9166 3.56662 17.9166 7.29162V12.725C17.9166 16.45 16.425 17.9416 12.7 17.9416H12.5916C9.24163 17.9416 7.69996 16.7333 7.42496 13.7833" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.5001 10H3.01672" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.87504 7.20825L2.08337 9.99992L4.87504 12.7916" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <span class="sidebar__menu--text"> Logout</span>  
                </a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            
           
        </ul>
    </div>
</div>