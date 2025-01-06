<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TaskController extends Controller
{


    public function __construct()
    {
        // Middleware'larni aniqlash
        $this->middleware('permission:view tasks|view users')->only('index');
        $this->middleware('permission:edit tasks')->only('edit');
        $this->middleware('permission:create tasks')->only('create');
        $this->middleware('permission:delete tasks')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Task::where('status','pending')->get();

        return view('tasks.list', [
            'tasks'=>$tasks
        ]);
    }

    public function getTasksIsDone()
    {
        $tasks = Task::where('status','!=','pending')->orderBy('created_at', 'desc')->get();
        return view('tasks.done_list', [
            'tasks'=>$tasks
        ]);

    }

    public function done($id){
        $task = Task::find($id);
        $task->status = 'done';
        $task->save();
        return redirect()->route('tasks.done');

    }

    public function cancel($id)
    {
        $task = Task::find($id);
        $task->status = 'pending';
        $task->save();
        return redirect()->route('tasks.index');
    }


    public function viewTask($id)
    {
        $task = Task::find($id);
        return view('tasks.view_task',
        [
            'task'=>$task
        ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('staff')->get();
        return view('tasks.create',[
            'staffs'=>$users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id', // Tanlangan foydalanuvchi bo'lishi kerak
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx|max:2048', // Faylni tekshirish
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('tasks', 'public');
        }

        if ($validator -> passes()){

            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->deadline = $request->deadline;
            $task->user_id = $request->user_id;
            $task->manager_id = auth()->id(); 
            $task->file_path = $filePath;
            $task->status = 'pending';
            $task->save();
            return redirect()->route('tasks.index')->with('success','Task create successfully');

        } else {
            return redirect() -> route('tasks.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $users = User::role('staff')->get();


        return view('tasks.edit',[
            'task'=>$task,
            'staffs'=>$users
        ]);
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('tasks.edit', $id)->withInput()->withErrors($validator);
        }
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('tasks', 'public');
            $task->file_path = $filePath; // Fayl yo'lini saqlash
        }
    
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = $request->user_id;
        $task->status = 'pending'; // Boshlang'ich status
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }
    
 
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if ($task){
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task delete successfully');
        }
        return redirect()->route('tasks.index')->with('error', 'Does not found');

    }

    
}
