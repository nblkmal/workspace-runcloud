@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8 card-white">
            <h1>{{ $workspace->name }}</h1>
            About : {{ $workspace->description }}
        </div>
    </div>

    @if ($tasks->isEmpty())
        <div class="row justify-content-center my-2">
            <div class="col-md-8">
                <div class="alert alert-primary text-center" role="alert">
                    You dont have any task yet! <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#task">Create Task</button>
                </div>
            </div>
        </div>

    @else
        <div class="row justify-content-center my-2">
            <div class="col-md-8 card-white">
                <h3>List of tasks</h3>

                <h5><i class="ri-check-double-fill ri-md me-1"></i>Task Completed {{ $complete_tasks->count() }}/{{ $tasks->count() }}</h5>
                <table class="table">
                    <tbody>
                        @forelse ($complete_tasks as $task)
                            <tr>
                                <div class="alert alert-success" role="alert">
                                    {{ $task->name }}
                                    <div class="float-right">
                                        Completed {{ $task->task_complete->diffForHumans() }}

                                    </div>
                                </div>
                            </tr>
                        @empty
                            <tr>
                                <div class="alert alert-secondary" role="alert">
                                    {{ $complete_tasks->count() }}/{{ $tasks->count() }} task completed
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <h5><i class="ri-time-fill ri-md me-1"></i>Task Pending</h5>
                <table class="table">
                    <tbody>
                        @forelse ($incomplete_tasks as $task)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}.</td>
                                <td>{{ $task->name }}</td>
                                <td>Due {{ $task->task_due->calendar() }}</td>
                                <td class="text-center">
                                    <div class="alert alert-warning p-0 m-0 d-flex align-items-center justify-content-center" role="alert">
                                        <i class="ri-time-fill me-1"></i>{{ $task->task_due->longRelativeDiffForHumans() }}
                                    </div>
                                </td>
                                <td class="align-items-center justify-content-center">
                                    <a href="{{ route('task:update', $task) }}" style="text-decoration: none; color:green"><i class="ri-check-double-fill ri-xl"></i></a>
                                    <a href="{{ route('task:delete', $task) }}" style="text-decoration: none; color:crimson"><i class="ri-close-circle-fill ri-xl"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <div class="alert alert-secondary" role="alert">
                                    No pending task
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="alert alert-primary text-center" role="alert">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#task">Add Task</button>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade" id="task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('task:create', $workspace) }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
                            <label for="name">Task's name</label>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label for="due_date">Due Date</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="due_time">Due Time</label>
                                <input type="time" class="form-control" id="due_time" name="due_time" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row my-4 px-2">
                            <button class="btn btn-primary btn-block" type="submit">Add task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


