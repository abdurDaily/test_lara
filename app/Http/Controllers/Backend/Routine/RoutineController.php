<?php

namespace App\Http\Controllers\Backend\Routine;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RoutineController extends Controller
{
    //ROUTINE UPLOAD 
    public function routine(){
        return view('Admin.Routine.insert');
    }


    //ROUTINE UPLOAD insert 
    public function routineInsert(Request $request){

        // dd($request->all()); 
        $request->validate([
            'routine' => 'required|mimes:pdf',
        ]);

        $data = new Routine();

        if ($request->hasFile('routine')) {
            $filePath = $request->routine->storeAs('routine', $request->routine->getClientOriginalName(),'public');
            $data->routine_image =  env('APP_URL'). 'storage/' .$filePath;
        } 

        $data->save();
        return back();

    }




    // routineList
    public function routineList(){
        $allRecord = Routine::all();
        return view('Admin.Routine.listRoutine',compact('allRecord'));
    }


    //routineDelete
    public function routineDelete($id){
       Routine::find($id)->delete();
       return back();
    }
}
