<?php

namespace App\Http\Controllers;

use App\Models\ChildrenIntrest;
use App\Models\Profile;
use App\Models\UserChild;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $token = $user->createToken('token-name');
        Session::put('token', $token->plainTextToken);
        return view('home', compact('user'));
    }
    public function webrole(){
        return view('webrole');
    }
    public function addWebRole(Request $request){
        $profile = new Profile;
        $profile->role_type = $request->role_type;
        $profile->user_id = Auth::id();
        $profile->save();
        return redirect('profile');
    }
    public function profile(){
        $user = Auth::user();
        return view('front.profile', ['user' => $user]);
    }

    public function addChildren(Request $request){
        $child = new UserChild;
        $child->gender = $request->gender;
        $child->dob = $request->dob;
        $child->user_id = Auth::id();
        if($child->save()){
            return response()->json(['message' => 'succrss', 'child' => $child->id]);
        }
    }

    public function addChildrenInterest(Request $request){
        foreach ($request->interest as $req){
            $child = new ChildrenIntrest;
            $child->child_id = $request->child;
            $child->interest = $req;
            $child->save();
        }
        return response()->json(['message' => 'succrss']);
    }
}
