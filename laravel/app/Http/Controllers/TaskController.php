<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function getTasks()
    {
        $data = Task::get();
        return $data;
    }
    public function getTask(Request $request)
    {
        $task = Task::where('task_id', $request['id'])->first();
        if (!$task) return response()->json(['errorMessage' => 'このデータは存在しません'], 404);
        return $task;
    }
    public function postTask(Request $request)
    {
        return Task::create([
            'task_name' => $request['name'],
            'task_detail' => $request['detail'],
        ]);
    }
    public function deleteTask(Request $request)
    {
        return Task::where('task_id', $request['id'])->delete();
    }
    public function putTask(Request $request)
    {
        return Task::where('task_id', $request['id'])->update([
            'task_name' => $request['name'],
            'task_detail' => $request['detail'],
        ]);
    }
}
