<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Recognition;
use App\Models\TermsConditions;
use App\Models\PrivacyPolicy;
use App\Models\MenuItem;
use App\Models\Blog; 
use App\Models\Event;
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
        $randomMenuItems = MenuItem::with('dropdownItems')->get()->random(5);
        View::share('randomMenuItems', $randomMenuItems);

        View::share('testimonials', Testimonial::latest()->get());
        View::share('contactUs', ContactUs::first());
        View::share('sliders', Slider::all());
        View::share('recognitions', Recognition::all());
        View::share('aboutUs', About::first());
        View::share('sociallink', Sociallink::first());
        View::share('visionMission', VisionMission::first()); 
        View::share('faqs', Faq::latest()->paginate(5));
        View::share('blogs', Blog::latest()->paginate(20));
        View::share('recentBlog', Blog::inRandomOrder()->take(6)->get());

        View::share('events', Event::latest()->paginate(20)); 
        View::share('recentEvent', Event::inRandomOrder()->take(6)->get());
        View::share('policies', PrivacyPolicy::first()); 
        View::share('termsCondition', TermsConditions::first());
       


        
        
       


        
    }
}
