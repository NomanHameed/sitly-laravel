<?php

namespace App\Http\Controllers;

use App\Models\ScheduleType;
use Illuminate\Http\Request;

class ScheduleTypeController extends Controller
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
        $ScheduleType = ScheduleType::create($i);
        return redirect('contactgroup/create')->with('message', 'Data Enter Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ScheduleType $scheduleType
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleType $scheduleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ScheduleType $scheduleType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UpScheduleType = ScheduleType::findOrFail($id);
        return view('update_contact_group', compact('UpScheduleType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ScheduleType $scheduleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = ScheduleType::find($id);
        if ($project) {
            $project->name = $request->name;
            $project->status = $request->status;
            $project->save();
            return redirect('contactgroup/create')->with('upmsg', 'Data Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ScheduleType $scheduleType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DlScheduleType = ScheduleType::find($id);
        $DlScheduleType->delete();
        return redirect()->back()->with('dmsg', 'Data Delete Successfully');
    }
}
