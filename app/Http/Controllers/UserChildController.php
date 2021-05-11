<?php

namespace App\Http\Controllers;

use App\Models\UserChild;
use Illuminate\Http\Request;

class UserChildController extends Controller
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
        $UserChild = UserChild::create($i);
        return redirect('contactgroup/create')->with('message', 'Data Enter Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserChild $userChild
     * @return \Illuminate\Http\Response
     */
    public function show(UserChild $userChild)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserChild $userChild
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UpChild = UserChild::findOrFail($id);
        return view('update_contact_group', compact('UpChild'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserChild $userChild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Profile::find($id);
        if ($project) {
            $project->gender = $request->gender;
            $project->dob = $request->dob;
            $project->special_need = $request->special_need;
            $project->special_need_description = $request->special_need_description;
            $project->user_id = $request->user_id;
            $project->save();
            return redirect('contactgroup/create')->with('upmsg', 'Data Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserChild $userChild
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DlChild = Profile::find($id);
        $DlChild->delete();
        return redirect()->back()->with('dmsg', 'Data Delete Successfully');
    }
}
