@extends('layout.app')

@section('title', 'Home')

@section('content')
    <!-- Add Task -->
    <div class="bg-light p-3 mt-5">
      <div class="container">

        <h3>Create a task</h3>
        <hr/>
        <form method="post" action="{{ url('task/create') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-6 mb-3">
              <div class="form-group">
                <label for="title">Task</label>
                <input type="text" name="title" placeholder="Enter Task" class="form-control">
                @if ($errors->has('title'))
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="form-group">
                <label>Submit</label>
                <input type="submit" value="Submit" class="btn btn-danger w-100 py-1">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="4" name="description" placeholder="Enter Description" class="form-control"></textarea>
                @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>

    <!-- View Tasks -->
    <div class="bg-light p-3 mt-5">
      <div class="container">

        <h3>View all task</h3>
        <hr/>
        <table class="table table-bordered bg-white">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{$task['id']}}</td>
              <td>{{$task['title']}}</td>
              <td>{{$task['description']}}</td>
              <td>{{$task['status']}}</td>
              @if($task['status'] != 'Inactive')
                <td><a href="{{ url('task/delete/'.$task['id']) }}" class="text-danger">Done</a></td>
              @else
                <td class="text-muted" style="font-size: 0.75rem">Finished on: {{$task['deleted_at']}}</td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
@endsection
