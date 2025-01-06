<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskForStaffController extends Controller
{
    
    public function list_task() {

        if (Auth::user()->roles->contains('name', 'staff')) {
            $task = Task::where('user_id', Auth::user()->id) ->where('status','pending')-> orderBy('created_at', 'desc') -> get();
            
            return view('tasks_for_staff.list', [
                'tasks' => $task
            ]);
        }

        
    }

    public function task_done($id){
        $task = Task::find($id);

        $task -> status = 'completed';
        $task -> save();
        return redirect()->back()->with('success', 'Task is completed');
    }

    public function staffView($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks_for_staff.staff_view', compact('task'));
    }

    public function uploadFile(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('tasks', 'public');
            $task->file_path = $filePath;
            $task->save();
        }

        return redirect()->route('staff.view', $id)
            ->with('success', 'File uploaded successfully.');
    }




}
