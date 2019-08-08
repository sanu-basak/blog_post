<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    
    public function store(Request $request)
    {    
        dd($request->all());

        $reply= new \App\Reply;

        $reply->create([
            'description' =>  $request->comment_body,
            'user_id'     =>  $request->user_id,
            'comment_id'     =>  $request->blog_id
        ]);
  
        //return redirect()->route('blogs_path');

        return response()->json([],200);

     }
}
