<?php

namespace App\Http\Controllers;

use Attribute;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Search;
use App\Models\Appointment;
use App\Http\Requests\EventStoreRequest;

use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        //
        $events = Event::where('event_name', 'like', '%'.$search.'%')->get();		  
        return view('events.index', compact('events','search'));   
        //Show all available events
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();
        return view('events.create', compact('event'));
        //Create a new event
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        $validated = $request->validated();
        //Event Request Validation with rules from EventStoreRequest.php

        $user = Auth::user();
        $user_id = $user->id;
        $validated['user_id'] = $user_id;
        //Get the currently authenticated user's ID and add it to the validated request

        $event = new Event($validated);
        $event->save();
        //Create new event with validated request

        return back()->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $skills = Search::where('bind_id','=',$id)->where('state','=','1')->where('type','=','job')->get();
        $skill_list=array();
        foreach($skills as $skill){
            array_push($skill_list,$skill->skill_id);
        }
        $skill_names=["1"=>"C","2"=>"C++","3"=>"PHP","4"=>"Python","5"=>"JavaScript","6"=>"Go","7"=>"Ruby","8"=>"Rust"];
        return view('events.show', compact('event','skill_list','skill_names'));
        //Show the details of selected event
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $user_id = $user->id; 
        $event = Event::findOrFail($id);
        if ($event->user_id != $user_id) {
            return redirect()->route('/events')->with('error', 'You are not authorized to edit this event.');
        }
        $skills = Search::where('bind_id','=',$id)->where('state','=','1')->where('type','=','job')->get();
        $skill_list=array();
        foreach($skills as $skill){
            array_push($skill_list,$skill->skill_id);
        }
        $skill_names=["1"=>"C","2"=>"C++","3"=>"PHP","4"=>"Python","5"=>"JavaScript","6"=>"Go","7"=>"Ruby","8"=>"Rust"];
        return view('events.edit', compact('event','skill_list','skill_names'));
        //Show the form for editing the selected event
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventStoreRequest $request)
    {
        //
        $validated = $request->validated();
        var_dump($validated);
        $event = Event::findOrFail($request->id);

        $event->update($validated);

        return redirect()->route('events.mine')->with('success', 'Event updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function mine()
    {   
        $user = Auth::user();
        $user_id = $user->id;
        $events = Event::where('user_id', '=', $user_id)->get();
        $app_list = array();
        foreach($events as $event){
            $app_info=Appointment::where('event_id','=',$event->id)->get();
            $cnt = count($app_info);
            if($cnt==0)
                $app_list[$event->id] = $cnt;
            else
                $app_list[$event->id] = $app_info[0]->id;
        }	 
        return view('events.mine', compact('events','app_list'));
        //Show all available events
    }
}
