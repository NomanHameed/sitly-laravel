@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('webrole-save')}}" method="post">
            @csrf
            <button name="role_type" class="btn btn-primary" value="1">Parent</button>
            <button name="role_type" class="btn btn-primary" value="0">BabySitter</button>
        </form>
    </div>
@endsection
