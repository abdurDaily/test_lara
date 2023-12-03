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



    // test post
    public function testPost(Request $request){
        if($request->isMethod('post')){
           $data =  $request->all();


           $request->validate([
            'email' => 'required'
           ]);

           $userPost = new User();
           $userPost->name = $data['name'];
           $userPost->email = $data['email'];
           $userPost->password = $data['password'];
           $userPost->save();

           $success = "new user inserted!";
           return response()->json(['success'=>$success],201);
        }
    }


    public function testPostMulti(Request $request){
        if($request->isMethod('post')){
           $data = $request->all();


           foreach($data['users'] as $multi){
                $userPost = new User();
                $userPost->name = $multi['name'];
                $userPost->email = $multi['email'];
                $userPost->password = bcrypt($multi['password']);
                $userPost->save();
           }

           $success = "new user inserted!";
           return response()->json(['success'=>$success],201);
        }
    }



}
