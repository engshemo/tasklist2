<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function index()
    {
        $tasks =DB::table('tasks')->get();
        return view('Task.index')->with([
            'tasks'=>$tasks,
            ]);
    }
    public function show($id){

        $task = DB::table('tasks')->find($id);


     return view('tasks.show', compact('task'));
    }
    public function store(Request $request)
    {
        DB::table('tasks')->insert([

            'name' => $request-> name,
            'created_at' =>now(),
            'updated_at' =>now(),
        ]);
        return redirect()->back();

    }
    public function destroy($id){
        $task =DB::table('tasks')->where ('id','=',$id)->delete();
        return redirect()->back();

    }
    public function edit($id){
        $tt =DB::table('tasks')->find($id);

        $tasks =DB::table('tasks')->get();

        return view('Task.edit',compact('tasks','tt'));




    }
    public function update(Request $request,$id){


        $affected = DB::table('tasks')-> where('id', $id)->update(['name'=>$request->name,
            'created_at' => now(),
            'updated_at' => now(),]);
        return redirect('/');



    }


}
