<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function index(){
        return view('pages.admin',$this->data);
    }
    public function deleteUser(Request $request){
        $id=$request->input("id");
        User::where('id',$id)->delete();
        Blog::where('user_id',$id)->delete();
        return "User deleted";
    }
    public function deleteBlog(Request $request){
        $id=$request->input("id");
        Blog::where('id',$id)->delete();

        return "Blog deleted";
    }
    public function changeBlogStatus(Request $request){
        $id=$request->input("id");
       $blog=Blog::where('id',$id)->get();
        if($blog[0]->approved == 0){
            Blog::where('id',$id)->update([
                "approved"=>1
            ]);
        }else{
            Blog::where('id',$id)->update([
                "approved"=>0
            ]);
        }
        return "Status changed";
    }
}
