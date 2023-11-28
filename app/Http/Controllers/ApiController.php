<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function apiTest($id=null){
      if(!$id){
          $users = User::get();
          return response()->json(['users' => $users],200);
      }else{
          $users = User::find($id);
          return response()->json(['users' => $users],200);
      }
    }


    // POST METHODE 
    public function insertData(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            // dd($data);
            // return $data;

            $request->validate([
                'name' => 'required',
            ]);

            $testData = new User();
            $testData->name = $data['name'];
            $testData->email = $data['email'];
            $testData->password = bcrypt($data['password']);
            $testData->save();
            $message = "all are ok!";
            return response()->json(['message' => $message],201);
        }
    }
}
