<?php

namespace App\Http\Controllers;

use App\Models\ChildrenIntrest;
use Illuminate\Http\Request;

class ChildrenIntrestController extends Controller
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
        $ChildrenIntrest = ChildrenIntrest::create($i);
        return redirect('contactgroup/create')->with('message', 'Data Enter Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ChildrenIntrest $childrenIntrest
     * @return \Illuminate\Http\Response
     */
    public function show(ChildrenIntrest $childrenIntrest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ChildrenIntrest $childrenIntrest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UpChildrenIntrest = ChildrenIntrest::findOrFail($id);
        return view('update_contact_group', compact('UpChildrenIntrest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildrenIntrest $childrenIntrest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = ChildrenIntrest::find($id);
        if ($project) {
            $project->child_id = $request->child_id;
            $project->interest = $request->interest;
            $project->save();
            return redirect('contactgroup/create')->with('upmsg', 'Data Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ChildrenIntrest $childrenIntrest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DlScheduleRequire = ChildrenIntrest::find($id);
        $DlScheduleRequire->delete();
        return redirect()->back()->with('dmsg', 'Data Delete Successfully');
    }
}
