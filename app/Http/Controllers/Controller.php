<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function blog()
    {
        $blogs=Blog::orderBy('created_at','DESC')->paginate(10);
        return view('blog',compact('blogs')); 
    }
    public function blogdetail($id)
    {
        $blog=Blog::whereId($id)->first();
        return view('blogdetail',compact('blog')); 
    }
}
