<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;  
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\PrivateMessage;
use App\Models\Resource;
use App\Models\Certification;
use App\Models\Recognition;
use App\Models\Advisory;
use App\Models\MentorshipContent;
use App\Models\FacilitatorContent;
use App\Models\MembershipCriteria;
use App\Models\MembershipContent;
use App\Models\TermsConditions;
use App\Models\PrivacyPolicy;
use App\Models\ConsentNote;
use App\Models\Notification;
use App\Models\MenuItem;
use App\Models\Blog;  
use App\Models\Event;
use App\Models\VisionMission;
use App\Models\Testimonial;
use App\Models\Sociallink;
use App\Models\ContactForm;
use App\Models\Contact;
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
        

        if ($this->databaseExists()) {
            $contact = Contact::latest()->paginate(20);
            View::share('contacts', $contact);
            View::share('membershipCriteria', MembershipCriteria::first());
        }
        if ($this->databaseExists()) {
            if (Schema::hasTable('consent_notes')) {
                View::share('consentNote', ConsentNote::first());
            }
        }

        View::share('menuItems', MenuItem::with('dropdownItems.allChildren')->get());

        $randomMenuItems = MenuItem::with('dropdownItems')->get()->random(5);
        View::share('randomMenuItems', $randomMenuItems);

        View::share('testimonials', Testimonial::latest()->get());
        View::share('contactUs', ContactUs::first());
        View::share('sliders', Slider::all()->shuffle()); 
        View::share('resource', Resource::all()->shuffle());
        View::share('recognitions', Recognition::all()->shuffle());
        View::share('advisory', Advisory::all());
        View::share('aboutUs', About::first());
        View::share('sociallink', Sociallink::first());
        View::share('visionMission', VisionMission::first()); 
        View::share('faqs', Faq::latest()->paginate(5));
        View::share('blogs', Blog::latest()->paginate(20));
        View::share('recentBlog', Blog::inRandomOrder()->take(6)->get());

        View::share('events', Event::where('status', 'published')->latest()->paginate(20));
        View::share('upcomingEvents', Event::upcoming()->latest()->get());
        View::share('pastEvents', Event::past()->latest()->get());
        View::share('recentEvent', Event::latest()->take(6)->get());
        View::share('policies', PrivacyPolicy::first()); 
        View::share('termsCondition', TermsConditions::first());

        View::share('membershipContent', MembershipContent::first());
        View::share('mentorshipContent', MentorshipContent::first());
        View::share('facilitatorContent', FacilitatorContent::first());

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $notificationCount = $user->unreadNotifications->count();
                $view->with('notificationCount', $notificationCount);
            } else {
                $view->with('notificationCount', 0);
            }
        });

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
        
        if ($this->databaseExists()) {
            // $upcomingEvents = Event::upcoming()->limit(3)->get();
            // if ($upcomingEvents->isEmpty()) {
            //     $upcomingEvents = Event::latest()->limit(3)->get();
            // } 
            // View::share('upcomingEvents', $upcomingEvents);

            $trainingCertifications = Certification::latest()->get();
            // dd($trainingCertifications);
            // View::share('trainingCertifications', $trainingCertifications);
            $recentMessages = PrivateMessage::recentForUser(auth()->id())->limit(5)->get();
            View::share('recentMessages', $recentMessages);
 
            $userGroups = auth()->user()?->groups()->with('latestDiscussion')->get() ?? collect();
            View::share('userGroups', $userGroups);
        }
        

    }

    private function databaseExists(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
