<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
       
        return view('admin.event.index');
    }

    public function create(){
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/event/'), $imageName);
        }
        
        Event::create(array_merge($validated, ['image' => 'assets/images/event/'.$imageName]));
    
        return redirect()->route('admin.event.create')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail(decrypt($id));
        return view('admin.event.edit', compact('event'));
    } 

    public function update(Request $request, $id)
    { 
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required', 
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:32768', 
        ]);
    
        $event = Event::findOrFail($id);   
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/event/'), $imageName);
             
            $event->update(['image' =>  'assets/images/event/' . $imageName]);
        } 
       
        $event->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return redirect()->route('admin.event.index')->with('success', 'Event updated successfully.');
    }
    

    public function destroy($id)
    {
        $event= Event::findOrFail(decrypt($id));
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully.');
    }

    public function show($slug)
    {
        $eventItem = Event::where('slug', $slug)->first();

        if (!$eventItem) {
            return view('home.errors.404'); 
        }

        $relatedEvent = Event::where('id', '!=', $eventItem->id)
                                     ->inRandomOrder()
                                     ->take(6) 
                                     ->get();

        return view('home.pages.event.event-details', compact('eventItem', 'relatedEvent'));
    }

    public function details($slug){
        $eventItem = Event::where('slug', $slug)->first();
    
        if (!$eventItem) {
            return view('home.errors.404'); 
        }

        $relatedEvent = Event::where('slug', '!=', $slug)
                                ->latest()
                                ->get();
    
        return view('home.pages.event.event-details', compact('eventItem', 'relatedEvent'));
    }
}
 