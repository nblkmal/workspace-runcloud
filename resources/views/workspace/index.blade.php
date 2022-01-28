@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Your workspaces</h1>
        </div>
    </div>

    @if ($spaces->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-8 card-white">
                <h3>You dont have any workspace. Create one now!</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 card-white" type="button" >
                <div class="alert alert-primary text-center" role="alert">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#workspace">Create a workspace</button>
                </div>
                
            </div>
        </div>
    @else
        
        <div class="row justify-content-center my-2">
            <div class="col-md-8 row card-white" style="padding-top: 10px !important; padding-bottom: 10px !important;">
                <div class="col-md-1">No.</div>
                <div class="col">Name</div>
                <div class="col">Description</div>
                <div class="col text-center">Task Completed</div>
                <div class="col-md-1"></div>
            </div>
        </div>
        @foreach ($spaces as $work)
            <div class="row justify-content-center">
                <div class="col-md-8 row card-white">
                    <div class="col-md-1">{{ $loop->iteration }}.</div>
                    <div class="col">
                        <a href="{{ route('workspace:show', $work) }}" style="text-decoration: none;">{{ $work->name }}</a>
                    </div>
                    <div class="col">{{ $work->description }}</div>
                    <div class="col text-center">
                        @if ($work->tasks->isEmpty())
                            No task!
                        @else
                            {{ $work->tasks()->complete()->count() }}/{{ $work->tasks()->count() }}
                        @endif
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('workspace:show', $work) }}" style="text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="More"><i class="ri-more-2-fill"></i></a>
                        <a href="{{ route('workspace:delete', $work) }}" style="text-decoration: none; color:crimson;" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ri-delete-bin-6-fill"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        

        <div class="row justify-content-center">
            {{-- <div class="col-md-8" type="button"> --}}
                <div class="col-md-8 alert alert-primary text-center" role="alert">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#workspace">Create new workspace</button>
                </div>
            {{-- </div> --}}
        </div>
    @endif
    
    <div class="modal fade" id="workspace" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('workspace:create') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create new workspace</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Workspace Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Workspace Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
