<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function tasks() {
        $user_id = auth()->user()->id;
        $tasks    = Task::where('user_id',$user_id)->get();
        $now = Carbon::now();

        return view('app.index',compact('tasks','now'));

    }
    public function taskManager(Request $request) {
        $user_id = auth()->user()->id;
        $users    = User::where('id', '<>' , $user_id)->get();
        $tasks    = Task::where('assign_user_id',$user_id)->get();
         $now = Carbon::now();
        if($request->isMethod('POST')){
            
            $data  = $request->all();
           
             $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);
            $task     = Task::where('id',$data['id'])->first();
            $messages = 'تغییر کاربر با موفقیت انجام شد.';
            $task->update([
                'assign_user_id'=> $data['user_id']
            ]);
         return redirect(route('taskManager'))->with('success',  $messages );
        }

        return view('app.manager',compact('tasks','users','now'));

    }
    public function add(Request $request) {
        
        $user_id       = auth()->user()->id;
     
        if($request->isMethod('POST')){
            
             $request->validate([
                'title'          => 'required|string|min:3|max:191',
                'date'           => 'required|date',
                'assign_user_id' => 'required|exists:users,id',
            ]);
             
            $data          = $request->all();
            
            $task                 = new Task();
            $task->user_id        = $user_id;
            $task->assign_user_id = $data['assign_user_id'];
            $task->title          = $data['title'];
            $task->exp_date           = $data['date'];
            $task->save();
            
            
            $messages  = 'تسک با موفقیت ایجاد شد.';
            
            return redirect(route('tasks'))->with('success',  $messages );
        }
        
        $users    = User::where('id', '<>' , $user_id)->get();
        return view('app.add',compact('users','user_id'));

    }
    public function changeStatus($id){
        $task     = Task::where('id',$id)->first();
        $messages = 'تغییر وضعیت با موفقیت انجام شد.';
        
        if($task->status == 0){
               
            $task->update([
                'status'=>1
            ]);
           
        }else{
            $task->update([
                'status'=>0
            ]);
           
        }
        return redirect(route('taskManager'))->with('success',  $messages );
        
       
    }
    


}
