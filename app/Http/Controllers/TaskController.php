<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

  // Index Function
  public function index() {
    $tasks = new Task();
    $tasks = $tasks->withTrashed()->orderBy('status', 'asc')->get();
    return view('task', compact('tasks'));
  }

  // Creates a new task
  public function create(Request $request) {
    $this->validate($request, [
      'title' => 'required|max:60',
      'description' => 'required|max:160'
    ]);
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->save();
    return redirect('/');
  }

  // Delete a task
  public function delete($id) {
    $task = new Task();
    $task->where('id', $id)->update(['status' => 2]);
    $task->destroy($id);
    return redirect('/');
  }

}
