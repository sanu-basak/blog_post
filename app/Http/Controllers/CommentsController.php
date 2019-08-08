<?php

namespace App\Http\Controllers;
use Storage;
use App\Comment;
use Illuminate\Http\Request;
use Auth;
class CommentsController extends Controller
{
    
    
    public function store(Request $request)
    {    
     //dd($request->all());
 
       //  dd(Auth::user());
        $comment= new Comment;
        $comment->create([
            'description' =>  $request->comment_body,
            'user_id'     =>  $request->user_id,
            'blog_id'     =>  $request->blog_id
        ]);

       

        return redirect()->back();
     }
    
}
