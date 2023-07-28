<?php

namespace App\Http\Controllers;
use App\Http\Requests\AppointmentStoreRequest;
use Illuminate\Http\Request;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index($id)
    {
        //
        $appointment = Appointment::findOrFail($id);
        return view('appointment.index', compact('appointment','id'));
    }

    public function create($event_id)
    {
        //
        return view('appointment.create', compact('event_id'));
    }

    public function store(AppointmentStoreRequest $request){
        $validated = $request->validated();
        $a = new Appointment($validated);
        $a->save();
        return back()->with('success', 'Appointment created successfully.');
    }

}
