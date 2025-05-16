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
            'consent' => 'home.pages.consent',
            'privacy-policy' => 'home.pages.privacy-policy',
            'governance-board' => 'home.pages.governance-board',
            'criteria-for-membership' => 'home.pages.membership.criteria-for-membership',


            'programmes-and-examinations' => 'home.pages.certification.programmes-and-examinations',
            'exam-requirement' => 'home.pages.certification.exam-requirement',

            
            'legislative-recommendations' => 'home.pages.advocacyPolicy.legislative-recommendations',
            'government-ngo-partnerships' => 'home.pages.advocacyPolicy.government-ngo-partnerships',
            'position-papers-policy-briefs' => 'home.pages.advocacyPolicy.position-papers-policy-briefs',
            'advisory-board-members' => 'home.pages.advocacyPolicy.advisory-board-members',
            'policies-governance-framework' => 'home.pages.advocacyPolicy.policies-governance-framework',
            
            'mentorship-sponsorship-program' => 'home.pages.resource.initiatives.mentorship-sponsorship-program',
            'training-certification' => 'home.pages.resource.initiatives.training-certification',
            'annual-summit-conferences' => 'home.pages.resource.initiatives.annual-summit-conferences',
            'advocacy-policy-influence' => 'home.pages.resource.initiatives.advocacy-policy-influence',
            'scholarships-grants' => 'home.pages.resource.initiatives.scholarships-grants',
            

        ];
        
    
       
        
        if (array_key_exists($slug, $pages)) {
            return view($pages[$slug]);
        }
        
    
        return view('home.errors.404');
    }

   
   
  

}
