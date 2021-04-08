<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends BaseController
{
    public function index(){
        return view('pages.myblogs',$this->data);
    }

    public function createBlog(Request $request){

        $user_id=$request->input('userId');
        $title=$request->input('createHeader');
        $text=$request->input('createText');
        $image=$request->file('createImage');
        $extension=$request->file('createImage')->extension();
        $imgName=date("Y-m-d") . "-" . Str::random(10) .".".$extension;
        $image->move(public_path('assets/images'),$imgName);

        Blog::create([
                "user_id"=>$user_id,
                "heading"=>$title,
                "text"=>$text,
                "img"=>$imgName,
                "approved"=>false
        ]);

        return Redirect::back();
        
    }


    public function showBlog($id){

        $this->data['singleBlog']=Blog::where('id',$id)->get();

        return view('pages.showBlog',$this->data);
    }

    public function getApprovedBlogs(Request $request){
        $id=$request->input('id');
        return Blog::where('user_id',$id)->where('approved',1)->get();
       
    }
    public function getNotApprovedBlogs(Request $request){
        $id=$request->input('id');
        return Blog::where('user_id',$id)->where('approved',0)->get();
       
    }

    public function deleteBlog(Request $request){
        $id=$request->input('id');
        Blog::where('id',$id)->delete();
        return "Blog deleted";
    }

    public function showEditBlog($id){
      $this->data['editBlog']=Blog::where('id',$id)->get();
        return view('pages.editBlog',$this->data);
    }

    public function updateBlog(Request $request, $id){

        $heading=$request->input('uTitle');
        $text=$request->input('uText');
        $image=$request->file('uImage');

        if($image!=null){

            $extension=$request->file('uImage')->extension();

            $newImageName=date("Y-m-d") . "-" . Str::random(10) .".".$extension;

            $image->move(public_path('assets/images'),$newImageName);

            Blog::where('id',$id)->update([
                "heading"=>$heading,
                "text"=>$text,
                "img"=>$newImageName
            ]);

            return redirect('/myblogs');

        }

        else{
            Blog::where('id',$id)->update([
                "heading"=>$heading,
                "text"=>$text
            ]);
            return redirect('/myblogs');
        }

    }

    public function getBlogs(){
        return Blog::with('user')->get();
    }
    
}
