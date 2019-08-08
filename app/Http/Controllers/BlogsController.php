<?php

namespace App\Http\Controllers;
use Storage;
use App\Blog;
use Illuminate\Http\Request;
use Auth;


class BlogsController extends Controller
{
    //
     public function index(){
         $blogs = Blog::all();
         //dd('ss');
         return view('blogs.index',['blogs'=> $blogs]);
     }

     public function show($id){
    
        $blog=Blog::with('comment')->find($id);
      //  dd($blog->toArray());
        return view('blogs.show',['blog'=>$blog]);
     }

     public function edit($id){
        
         $blog = Blog::find($id);
         //$chacha = 'Mama';
        // dd('ss');
         return view('blogs.edit',['blog'=>$blog]);
     }

     public function update(Request $request){
      
         $blog=Blog::find($request->id);
         $blog->title= $request->title;
         $blog->content = $request->content;

         $blog->update();
         return redirect()->route('blog_path',['blog'=>$blog]);
       
     }
      
     public function destroy(Request $request){
         
         $id = $request->blog_id;
        $blog= Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs_path');
     }

     public function create(){
       // dd('ss');
          return view('blogs.create');
     }

     public function store(Request $request){
       
        $blog= new Blog;
        
        $path=Storage::putFile('public',$request->file('images'));

        $url=Storage::url($path);
       // dd($url);
        $blog->image = $url;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::user()->id;
        $blog->save();
        return redirect()->route('blogs_path');
     }
}
