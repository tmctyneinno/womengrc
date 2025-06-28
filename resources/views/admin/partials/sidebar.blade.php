<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="mm-active">
                <a class="has-arrow ai-icon" href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li> 
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.users.index') }}" aria-expanded="false">
                    <i class="flaticon-381-user-7"></i>
                    <span class="nav-text">Users</span>
                
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}">All Users</a></li>

                </ul>
            </li>
            {{-- <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.application.index') }}" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Application</span>
                
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.application.index') }}">All Application</a></li>

                </ul>
            </li> --}}
        
            
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.contactForm.index') }}" aria-expanded="false">
                    <i class="flaticon-381-dislike"></i>
                    <span class="nav-text">Contact Form</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.contactForm.index') }}">All Contact Form</a></li>

                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.blog.index') }}" aria-expanded="false">
                    <i class="flaticon-381-newspaper"></i>
                    <span class="nav-text">Contents</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.advisory.index') }}">All Advisory Board</a></li>
                    <li><a href="{{ route('admin.blog.index') }}">All Blog</a></li>
                    <li><a href="{{ route('admin.event.index') }}">All Event</a></li>
                    <li><a href="{{ route('admin.resource.index') }}">All Resource</a></li>
                    <li><a href="{{ route('admin.recognition.index') }}">All Recognition</a></li>
                    <li><a href="{{ route('admin.certifications.index') }}">Certification</a></li>


                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.resource.index') }}" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.faq.index') }}"> FAQs</a></li>
                    <li><a href="{{ route('admin.about-us') }}">About us</a></li>
                    <li><a href="{{ route('admin.slider.index') }}"> Slider</a></li>
                    <li><a href="{{ route('admin.menu.index') }}"> Manage Menu</a></li>
                    <li><a href="{{ route('admin.settings.content') }}"> Contents</a></li>
                    <li><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                    <li><a href="{{ route('admin.membership.index') }}"> Membership & Mentorship content</a></li>
                    <li><a href="{{ route('admin.membership.plan.index') }}"> Membership Plan</a></li>
                    <li><a href="{{ route('admin.show.password') }}">Reset Password</a></li>

                </ul>
            </li>
            
           
            
        </ul>
    
        <div class="copyright">
            <p><strong> </strong> ©  <span id="current-year"></span> All Rights Reserved</p>
            <p>by Women in GRC</p>
        </div>
    </div>
</div>
<script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>