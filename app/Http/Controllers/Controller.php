<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function blog()
    {
        $blogs=Blog::orderBy('created_at','DESC')->paginate(10);
        return view('blog',compact('blogs')); 
    }
    public function blogdetail(Request $request,$id)
    {
        $ip = $request->getClientIp();//bu id li blog yazısını açan kullanıcının ip adresini aldık
        $ara=Comment::whereIp($ip)->whereBlog_id($id)->first();
        $blog=Blog::whereId($id)->first();       
        if(!$ara)
        {
            $kayit=new Comment;
            $kayit->ip=$ip;
            $kayit->blog_id=$id;
            $kayit->viewed=1;
            $kayit->save();
            $blog->hit+=1;
            $blog->save();
        }     
        return view('blogdetail',compact('blog')); 
    }
    public function likeBlog(Request $request)
    {
        $ip = $request->getClientIp();
        $ara=Comment::whereIp($ip)->whereBlog_id($request->id)->first();
        $blog=Blog::whereId($request->id)->first();       
        if(!$ara)
        {
            $kayit=new Comment;
            $kayit->ip=$ip;
            $kayit->blog_id=$request->id;
            $kayit->liked=1;
            $kayit->disliked=0;
            $kayit->save();
            $blog->like+=1;
            $blog->save();
        }
        else
        {
            if($ara->liked==0)
            {
                $ara->liked=1;                
                $ara->save();
                if($ara->disliked==1)
                {
                    $ara->disliked=0;
                    $blog->dislike-=1;
                }
                $ara->save();
                $blog->like+=1;                
                $blog->save();
            }

        }  
        return response()->json($blog);   
    }
    public function dislikeBlog(Request $request)
    {
        $ip = $request->getClientIp();
        $ara=Comment::whereIp($ip)->whereBlog_id($request->id)->first();
        $blog=Blog::whereId($request->id)->first();       
        if(!$ara)
        {
            $kayit=new Comment;
            $kayit->ip=$ip;
            $kayit->blog_id=$request->id;
            $kayit->disliked=1;
            $kayit->liked=0;
            $kayit->save();
           
            $blog->dislike+=1;
            $blog->save();
        }
        else
        {
            if($ara->disliked==0)
            {
                $ara->disliked=1;             
                if($ara->liked==1)
                {
                    $blog->like-=1;
                    $ara->liked=0;
                }
                $ara->save();
                $blog->dislike+=1;                
                $blog->save();
            }

        }  
        return response()->json($blog); 
    }
}
