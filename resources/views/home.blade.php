@extends('layouts.app')

@section('content')
<div class="container">
    
    {{-- <div class="row justify-content-center">
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
    </div> --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="my-3">Welcome {{ auth()->user()->username }}!</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 row">
            
            <div class="col mx-2 card-white bg-secondary bg-opacity-10 text-center">
                <a href="{{ route('workspace:index') }}" style="text-decoration:none; color:black;">
                    <div class="rounded-circle">{{ $workspaces }}</div>
                    Total Workspaces
                </a>
                
            </div>
            <div class="col mx-2 card-white bg-warning bg-opacity-10 text-center">
                <a href="{{ route('task:index') }}" style="text-decoration:none; color:black;">
                    <div class="rounded-circle">{{ $incomplete_tasks }}</div>
                    Pending Tasks
                </a>
                
            </div>
            <div class="col mx-2 card-white bg-success bg-opacity-10 text-center">
                <div class="rounded-circle">{{ $complete_tasks }}</div>
                Completed Tasks
            </div>
        </div>
    </div>
</div>
@endsection
