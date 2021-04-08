<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(){
        $this->data['blogs']=Blog::with('user')->where('approved',1)->get();
        return view('pages.home',$this->data);
    }
}
