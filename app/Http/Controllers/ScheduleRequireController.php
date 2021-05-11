<?php

namespace App\Http\Controllers;

use App\Models\ScheduleRequire;
use Illuminate\Http\Request;

class ScheduleRequireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = $request->all();
        $ScheduleRequire = ScheduleRequire::create($i);
        return redirect('contactgroup/create')->with('message', 'Data Enter Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ScheduleRequire $scheduleRequire
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleRequire $scheduleRequire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ScheduleRequire $scheduleRequire
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleRequire $scheduleRequire)
    {
        $UpScheduleRequire = ScheduleRequire::findOrFail($id);
        return view('update_contact_group', compact('UpScheduleRequire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ScheduleRequire $scheduleRequire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleRequire $scheduleRequire)
    {
        $project = ScheduleRequire::find($id);
        if ($project) {
            $project->user_id = $request->user_id;
            $project->schedule_id = $request->schedule_id;
            $project->save();
            return redirect('contactgroup/create')->with('upmsg', 'Data Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ScheduleRequire $scheduleRequire
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleRequire $scheduleRequire)
    {
        $DlScheduleRequire = ScheduleRequire::find($id);
        $DlScheduleRequire->delete();
        return redirect()->back()->with('dmsg', 'Data Delete Successfully');
    }
}
