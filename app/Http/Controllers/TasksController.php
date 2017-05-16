<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {

        //$tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        //return $tasks;
        return view('tasks.index', compact('tasks'));

    }

    public function show(Task $task)//ime varijable mora biti isto kao u web routes wildcard
    {


        //dd($task);
        //return $task;
        return view('tasks.show', compact('task'));
        //return view('tasks/show', compact('tasks')); isto je kao i ono gore


    }

    // public function show($id)
    // {
    //     $task = Task::find($id); //use App\Task
    //     return view('tasks.show', compact('task'));
    // }
}
