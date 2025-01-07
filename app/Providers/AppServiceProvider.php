<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use App\Models\Recognition;
use App\Models\MentorshipContent;
use App\Models\FacilitatorContent;
use App\Models\MembershipContent;
use App\Models\TermsConditions;
use App\Models\PrivacyPolicy;
use App\Models\Notification;
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

        View::share('membershipContent', MembershipContent::first());
        View::share('mentorshipContent', MentorshipContent::first());
        View::share('facilitatorContent', FacilitatorContent::first());

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $notificationCount = $user->unreadNotifications->count();
                
                // $unreadCount = auth()->check() ? auth()->user()->unreadNotifications->count() : 0;
           
                // dd($unreadCount);
                $view->with('notificationCount', $notificationCount);
            } else {
                $view->with('notificationCount', 0);
            }
        });

        // View::composer('*', function ($view) {
        //     if (Auth::check()) {
        //         $user = Auth::user();
        //         $userId = (string) $user->id; 
        //         $recipientId = $user->recipient_id;

                
         
        //         // $sender = $user->notifications()->whereJsonContains('data->recipient_id', $recipientId)->first();
                
        //         // $sender_id = $sender ? $sender->data['sender_id'] : null;
        
        //         // $notifications = $user->notifications()
        //         //     ->where('notifiable_id', $sender_id)  
        //         //     ->orWhereJsonContains('data->recipient_id', $recipientId) 
        //         //     ->take(4) 
        //         //     ->get();
        
        //         $view->with('notificationsBar', $notifications);
        //     } else {
        //         $view->with('notificationsBar', 0);
        //     }
        // });

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                // dd($user->id);
                $notifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', \App\Models\User::class)
                ->get();
                // dd($notifications);

                $view->with('notificationsBar', $notifications);
            }
        });
       


        
        
       


        
    }
}
