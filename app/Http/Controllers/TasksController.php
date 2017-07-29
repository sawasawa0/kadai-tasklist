<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
        $tasks = Task::all();
        return view('tasks.index' , [
            'tasks' => $tasks,
            ]);
        */
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('id')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        return view('tasks.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[ 
            'status' => 'required|max:10',// 追加 
            'content' => 'required|max:255',
        ]);
    
        $request->user()->tasks()->create([
        'status' => $request->status,
        'content' => $request->content,
        ]);   
    
    
    
    /**        
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
     */    
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $task = task::find($id);
       if (\Auth::user()->id === $task -> user_id){

           return view('tasks.show',[ 
               'task' => $task, 
            ]);
       }
        else{
            return view('errors.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if (\Auth::user()->id === $task -> user_id){
            return view('tasks.edit' , [
                'task' => $task, 
            ]);
        }
        else{
             return view('errors.403');
        }
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 
            'status' => 'required|max:10',// 追加 
            'content' => 'required|max:255',
        ]);

        $task = Task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (\Auth::user()->id === $task -> user_id){
            $task-> delete();
        }
        else{
            return view('errors.403');
        }
        
        return redirect('/');
    }
}
