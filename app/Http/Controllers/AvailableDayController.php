<?php

namespace App\Http\Controllers;

use App\Models\AvailableDay;
use Illuminate\Http\Request;

class AvailableDayController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = $request->all();
        $AvailableDay = AvailableDay::create($i);
        return redirect('contactgroup/create')->with('message', 'Data Enter Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AvailableDay  $availableDay
     * @return \Illuminate\Http\Response
     */
    public function show(AvailableDay $availableDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AvailableDay  $availableDay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UpAvailableDay = AvailableDay::findOrFail($id);
        return view('update_contact_group', compact('UpAvailableDay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AvailableDay  $availableDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = AvailableDay::find($id);
        if ($project) {
            $project->user_id = $request->user_id;
            $project->days = $request->days;
            $project->chores = $request->chores;
            $project->save();
            return redirect('contactgroup/create')->with('upmsg', 'Data Successfully Updated');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AvailableDay  $availableDay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DlAvailableDay = AvailableDay::find($id);
        $DlAvailableDay->delete();
        return redirect()->back()->with('dmsg', 'Data Delete Successfully');
    }
}
