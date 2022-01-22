@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Pending Tasks</h1>
        </div>
    </div>

    @if ($tasks->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-8 card-white">
                <h3>You dont have any workspace. Create one now!</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 card-white" type="button" data-bs-toggle="modal" data-bs-target="#workspace">
                Create a workspace
            </div>
        </div>
    @else
        
        @foreach ($tasks as $task)
            <div class="row justify-content-center">
                <div class="col-md-8 row card-white">
                    <div class="col-md-1">{{ $loop->iteration }}.</div>
                    <div class="col">{{ $task->name }}</div>
                    <div class="col">
                        <a href="{{ route('workspace:show', $task->workspace) }}" class="btn btn-primary">Go to</a>
                    </div>
                </div>
            </div>
        @endforeach
        
    @endif
</div>
@endsection
