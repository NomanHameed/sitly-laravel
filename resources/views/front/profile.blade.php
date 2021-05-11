@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="form" action="{{route('profile')}}" method="post">
            @csrf
            <h1>Personal Info</h1>
            <fieldset>
                @if($user->profile->role_type == 1)
                <legend>I am a:</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input required" type="radio" id="male" value="1" name="gender">
                    <label class="form-check-label" for="male">PAPA</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input required" type="radio" name="gender" id="female" value="0">
                    <label class="form-check-label" for="female">MAMA</label>
                </div>
                @elseif($user->profile->role_type == 0)
                    <legend>You Gender and Date of Birth:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input required" type="radio" id="male" value="1" name="gender">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input required" type="radio" name="gender" id="female" value="0">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for="dob">Date of Birth</label>
                        <input data-toggle="datepicker" class="required" id="dob" name="dob">
                    </div>
                @endif
            </fieldset>
            <h1>Details</h1>
            <fieldset>
                <legend>Where Do You Live?</legend>
                <div class="row">
                    <div class="col-12 form-group">
                        <input id="address" name="address" type="text" class="required form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <input id="permanant_address" name="permanant_address" type="text" class="required form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <input id="city" name="city" type="text" class="required form-control" />
                    </div>
                </div>
            </fieldset>
            <h1>Introduce Yourself</h1>
            <fieldset>
                @if($user->profile->role_type == 1)
                <legend>Add Your Child</legend>
                    <div class="form-check">
                        <input class="form-check-input child_gender" type="radio" name="child_gender" id="0" value="0">
                        <label class="form-check-label" for="0">Girl</label>
                    </div>
                    <div class="form-check">
                        <input type="hidden" name="token" id="token" value="{{ Session::get('token') }}">
                        <input class="form-check-input child_gender" type="radio" name="child_gender" id="1" value="1">
                        <label class="form-check-label" for="1">Boy</label>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for="dob">Date of Birth</label>
                        <input data-toggle="datepicker" class="required" id="dob" name="child_dob">
                    </div>

                    <a id="addChild" class="btn btn-primary">Add</a>
                @elseif($user->profile->role_type == 0)
                    <legend>Your Work Experience</legend>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="0" value="0">
                        <label class="form-check-label" for="0">no experience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="1" value="1">
                        <label class="form-check-label" for="1">1 year of experience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="2" value="2">
                        <label class="form-check-label" for="2">2 year of experience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="3" value="3">
                        <label class="form-check-label" for="3">3 year of experience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="4" value="4">
                        <label class="form-check-label" for="4">4 year of experience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="5" value="5">
                        <label class="form-check-label" for="5">5 year of experience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="experience" id="6" value="6">
                        <label class="form-check-label" for="6">More then 5 year of experience</label>
                    </div>
                @endif
            </fieldset>
            <h1>child intrests</h1>
            <fieldset>
                @if($user->profile->role_type == 1)
                <legend>Select your child intrests</legend>
                <input type="hidden" name="child_id" id="child_id">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interest" value="option 1" id="1">
                    <label class="form-check-label" for="1">
                        option 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interest" value="option 2" id="2">
                    <label class="form-check-label" for="2">
                        option 2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interest" value="option 3" id="3">
                    <label class="form-check-label" for="3">
                        option 3
                    </label>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button id="child-intrest" class="btn btn-primary">Add Child</button>
                    </div>
                </div>

                @elseif($user->profile->role_type == 0)
                @endif

                    @if($user->profile->role_type == 1)
                        <legend>Select your child intrests</legend>
                        <input type="hidden" name="child_id" id="child_id">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="interest" value="option 1" id="1">
                            <label class="form-check-label" for="1">
                                option 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="interest" value="option 2" id="2">
                            <label class="form-check-label" for="2">
                                option 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="interest" value="option 3" id="3">
                            <label class="form-check-label" for="3">
                                option 3
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button id="child-intrest" class="btn btn-primary">Add Child</button>
                            </div>
                        </div>

                    @elseif($user->profile->role_type == 0)
                    @endif
            </fieldset>
            <fieldset>
                @if($user->profile->role_type == 1)
                    <legend>When?</legend>


                @elseif($user->profile->role_type == 0)
                @endif
            </fieldset>
        </form>
    </div>
@endsection
