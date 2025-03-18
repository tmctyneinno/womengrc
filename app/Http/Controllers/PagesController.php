<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Project;
use App\Models\DropdownItem;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Service;
use App\Models\CoreActivities;
use App\Models\ContactForm;

 
class PagesController extends Controller
{
   
    public function index($slug)
    {
        $pages = [
            'home' => 'home.index',
            'about' => 'home.pages.about',
            'vision' => 'home.pages.vision',
            'mission' => 'home.pages.mission',
            'purpose' => 'home.pages.purpose',
            'event' => 'home.pages.event.index',
            'facilitators' => 'home.pages.facilitators.index',
            'mentorship' => 'home.pages.mentorship.index',
            'community-forum' => 'home.pages.communityForum.index',
            'blog' => 'home.pages.blog.index', 
            'recognition' => 'home.pages.recognition',
            'advisory-board' => 'home.pages.advisoryBoard',
            'contact' => 'home.pages.contact',
            'faqs' => 'home.pages.faq',
            'login' => 'auth.login',

 
            'careers' => 'home.pages.careers',
            'resource'=> 'home.pages.resource',
            'appointment' => 'home.pages.appointment',
            'testimonials' => 'home.pages.testimonials',
            'terms-condition' => 'home.pages.terms-condition',
            'privacy-policy' => 'home.pages.privacy-policy',
            'governance-board' => 'home.pages.governance-board',
            'membership' => 'home.pages.membership.index',
            'membership-overview' => 'home.pages.membership.membership-overview',
            'membership-subscription-fees' => 'home.pages.membership.membership-subscription-fees',
            'membership-tiers' => 'home.pages.membership.membership-tiers',
            'membership-login' => 'home.pages.membership.membership-login',
            'membership-signup' => 'home.pages.membership.membership-signup',
            'membership-application' => 'home.pages.membership.membership-application',

            'programmes-and-examinations' => 'home.pages.certification.programmes-and-examinations',
            'exam-requirement' => 'home.pages.certification.exam-requirement',

            'livestream' => 'home.pages.livestream',
            'partners-and-affiliates' => 'home.pages.partnersAffiliates',

            'membership-logout' => 'home.pages.membership.membership-login',

            'legislative-recommendations' => 'home.pages.advocacyPolicy.legislative-recommendations',
            'government-ngo-partnerships' => 'home.pages.advocacyPolicy.government-ngo-partnerships',
            'position-papers-policy-briefs' => 'home.pages.advocacyPolicy.position-papers-policy-briefs',
            'advisory-board-members' => 'home.pages.advocacyPolicy.advisory-board-members',
            'policies-governance-framework' => 'home.pages.advocacyPolicy.policies-governance-framework',

        ];
    
       
        
        if (array_key_exists($slug, $pages)) {
            return view($pages[$slug]);
        }
        
    
        return view('home.errors.404');
    }

    public function membershipLogin(){
        return view('home.pages.membership.membership-login'); 
    }
    
   
  

}
