@extends('layouts.master')
@section('content')
<div class="container-fluid p-0">
   <div class="row">
      <div class="col-12 text-center mt-1">
         <h4>Blog Yazılarım</h4> 
      </div>
      @foreach ($blogs as $blog)
       <div class="col-4 mt-1 p-3 text-center">
          <img class="rounded shadow-sm" src="{{$blog->image}}" width="80%" alt="" srcset="">
       </div>
       <div class="col-8 mt-2">
          <p class="pt-2"><strong>{{$blog->title}}</strong></p>
          <p style="height:200px">{{$blog->content}}</p>
           <div class="row">
            <div class="col-4">
                <a class="text-decoration-none"  href="#" title="Okunma Sayısı"><i class="bi bi-eye"></i> {{$blog->hit}}</a>
            </div>
            <div class="col-4">
              <a class="text-decoration-none" href="#" title="Beğeni Sayısı Sayısı"><i class="bi bi-hand-thumbs-up"></i> {{$blog->like}}</a>
          </div>
          <div class="col-4">
            <a class="text-decoration-none"  href="#" title="Beğenmeme Sayısı Sayısı"><i class="bi bi-hand-thumbs-down"></i> {{$blog->dislike}}</a>
        </div>
           </div>
       </div>
      @endforeach
   </div>
</div>
@endsection