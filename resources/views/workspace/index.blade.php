@extends('layouts.app')

@section('content')
<div class="container">
    @if ($spaces->isEmpty())
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
        <div class="row justify-content-center">
            <div class="col-md-8 card-white">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Tasks Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spaces as $work)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $work->name }}</td>
                                    <td>{{ $work->description }}</td>
                                    <td>
                                        @if ($work->tasks->isEmpty())
                                            No task!
                                        @else
                                            {{ $work->tasks()->complete()->count() }}/{{ $work->tasks()->count() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('workspace:show', $work) }}" style="text-decoration: none;"><i class="ri-more-2-fill"></i></a>
                                        <a href="{{ route('workspace:delete', $work) }}" style="text-decoration: none;"><i class="ri-delete-bin-6-fill"></i></a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 card-grey" type="button" data-bs-toggle="modal" data-bs-target="#workspace">
                Create new workspace
            </div>
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
