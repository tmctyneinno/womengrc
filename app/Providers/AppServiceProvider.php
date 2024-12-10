<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\MenuItem;
use App\Models\VisionMission;
use App\Models\Testimonial;
use App\Models\Sociallink;
use App\Models\ContactUs;
use App\Models\About;
use App\Models\Slider;
use App\Models\Faq;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('menuItems', MenuItem::with('dropdownItems')->get());
        View::share('testimonials', Testimonial::latest()->get());
        View::share('contactUs', ContactUs::first());
        View::share('sliders', Slider::all());
        View::share('aboutUs', About::first());
        View::share('sociallink', Sociallink::first());
        View::share('visionMission', VisionMission::first()); 
        View::share('faqs', Faq::latest()->get());
        
        
       


        
    }
}
