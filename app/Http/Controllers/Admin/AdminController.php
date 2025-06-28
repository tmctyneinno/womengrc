<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Transaction;
use App\Models\DropdownItem;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\User;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Advisory;
use App\Models\Event;
use App\Models\Recognition;
use App\Http\Traits\AdminTrait;
use App\Models\MentorshipContent;
use App\Models\FacilitatorContent;
use App\Models\MembershipContent;
 
class AdminController extends Controller
{ 
    use AdminTrait; 
    public function __construct()
    { 
        $this->middleware('auth.admin');
    }
 
    public function index()
    {  
        $data = [ 
            'guests' => User::where('role', 'guests')->count(),
            'advisory' => User::where('role', 'advisory_member')->count(),
            'facilitator' => User::where('role', 'facilitator')->count(),
            'users' => User::count(),
            'recognitions' => Recognition::count(), 
            'events' => Event::count(), 
            'blogs' => Blog::count(),
            'contactForm' => Contact::count(), 
            'advisory_boards' => Advisory::count(), 
            'faqs' => Faq::count(),
            'membershipContent' => MembershipContent::count(), 
            'mentorshipContent' => MentorshipContent::count(), 
            'facilitatorContent' => FacilitatorContent::count(), 
        ]; 
        return view('admin.index', $data); 
    }

    public function transaction(){
        $data['data'] = Transaction::latest()->get();
        return view('admin.transaction.index', $data);
    }

  

}
