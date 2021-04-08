<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data['navigation']=DB::table('navigations')->get();
    }
}
