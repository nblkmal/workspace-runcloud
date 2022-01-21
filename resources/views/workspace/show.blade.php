@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card-white">
            <h1>{{ $workspace->name }}</h1>
        </div>
    </div>

    <div class="row justify-content-center my-2">
        <div class="col-md-8 card-white">
            <h3>List of tasks</h3>

            <h5>Task Completed</h5>
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
                                No completed task
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h5>Task Pending</h5>
            <table class="table">
                <tbody>
                    @foreach ($incomplete_tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $task->name }}</td>
                            <td>Due on {{ $task->task_due->format('d M Y') }} at {{ $task->task_due->format('H:i a') }}</td>
                            <td>{{ $task->task_due->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('tasks:update', $task) }}" class="btn btn-success">Complete</a>
                                {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-center my-2">
        <div class="col-md-8 card-white">
            <form action="{{ route('tasks:create', $workspace) }}" method="post">
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
                <div class="row my-4 px-5">
                    <button class="btn btn-primary btn-block" type="submit">Add task</button>
                </div>
            </form>
            
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control datetimepicker" name="Appointment_time"> 
        </div>
    </div> --}}
</div>
@endsection


