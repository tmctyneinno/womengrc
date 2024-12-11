<div class="deznav">
    <div class="deznav-scroll mm-active">
        <ul class="metismenu mm-show" id="menu">
            <li class="mm-active">
                <a class="has-arrow ai-icon" href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.users.index') }}" aria-expanded="false">
                <i class="flaticon-381-layer-1"></i>
                <span class="nav-text">Users</span>
                </a>
            </li>  
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.application.index') }}" aria-expanded="false">
                <i class="flaticon-381-layer-1"></i>
                <span class="nav-text">Application</span>
                </a>
            </li> 
            <li> 
                <a class="has-arrow ai-icon" href="{{ route('admin.recognition.index') }}" aria-expanded="false">
                <i class="flaticon-381-layer-1"></i>
                <span class="nav-text">Recognition</span>
                </a>
            </li> 
            
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.contactForm.index') }}"  aria-expanded="false">
                    <i class="flaticon-381-user-5"></i>
                    <span class="nav-text">Contact Form</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.blog.index') }}" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Blog</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.event.index') }}" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Event</span>
                </a>
            </li>
           
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-settings"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                   
                    <li>
                        <a  href="{{route('admin.about-us')}}" aria-expanded="false">About us</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.testimonials.index')}}" aria-expanded="false">Testimonials</a>
                    </li>
                    <li> 
                        <a  href="{{ route('admin.members') }}" aria-expanded="false">
                            Membership
                        </a>
                    </li>
                    <li>
                        <a  href="{{route('admin.livestream.index')}}" aria-expanded="false">Livestream</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.coreActivities.index')}}" aria-expanded="false">Core activities</a>
                    </li>
                   
                    <li>
                        <a  href="{{route('admin.faq.index')}}" aria-expanded="false">FAQs</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.menu.index')}}" aria-expanded="false"> Manage Menu</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.slider.index')}}" aria-expanded="false"> slider</a>
                    </li>
                    <li>
                        <a  href="{{ route('admin.settings.content') }}" aria-expanded="false">Contents</a>
                    </li>
                    <li>
                        <a  href="{{ route('admin.show.password') }}" aria-expanded="false">Reset Password</a>
                    </li>
                </ul>
            </li>
        </ul>
    
        <div class="copyright">
            <p><strong> </strong> ©  <span id="current-year"></span> All Rights Reserved</p>
            <p>by IFPN</p>
        </div>
    </div>
</div>
<script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>