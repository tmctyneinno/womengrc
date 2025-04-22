<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilitatorEvent;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('facilitator.pages.event.create', ); 
    } 

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_description' => 'required|string',
            'event_type' => 'required|string',
            'event_date_time' => 'required|date',
            'event_location' => 'required|string|max:255',
        ]);

        $event = new FacilitatorEvent();
        $event->event_name = $validatedData['event_name'];
        $event->event_description = $validatedData['event_description'];
        $event->event_type = $validatedData['event_type'];
        $event->event_date_time = $validatedData['event_date_time'];
        $event->event_location = $validatedData['event_location'];
        $event->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Event created successfully!');
    }
}
