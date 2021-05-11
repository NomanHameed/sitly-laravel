@extends('layouts.app')

@section('content')
<div class="container">
    @if ($user->profile !== null)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    @elseif($user->profile === null)

        <div class="row">
            <div class="col-12  justify-content-center">
                <img src="{{ asset('img/welcome.png') }}" class="">
            </div>
            <div class="col-12">
                <a class="btn btn-primary" href="{{route('webrole')}}">Next ></a>
            </div>
        </div>
    @endif
</div>
@endsection
