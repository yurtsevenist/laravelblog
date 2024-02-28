@extends('layouts.master')
@section('content')
<div class="container-fluid p-0">
   <div class="row mb-5">
      <div class="col-12 text-center mt-1">
         <h3>{{Str::upper($blog->title)}}</h3> 
         <hr>
         <p>Bu yazı {{$blog->created_at}} tarihinde {{$blog->author}} tarafından yazılmıştır.</p>
      </div>
      <div class="col-12 text-center p-3">
        <img src="{{$blog->image}}" class="img-fluid rounded" width="80%" height="50%" alt="Responsive image">
      </div>
      <div class="col-12 p-5">
        <p class="text-justify">{{$blog->content}}</p>
      </div>
   
        <div class="col-4 text-center">
            <a class="text-decoration-none"  href="#" title="Okunma Sayısı"><i class="bi bi-eye"></i> {{$blog->hit}}</a>
        </div>
        <div class="col-4 text-center">
          <a class="text-decoration-none" href="#" title="Beğeni Sayısı Sayısı"><i class="bi bi-hand-thumbs-up"></i> {{$blog->like}}</a>
      </div>
      <div class="col-4 text-center">
        <a class="text-decoration-none"  href="#" title="Beğenmeme Sayısı Sayısı"><i class="bi bi-hand-thumbs-down"></i> {{$blog->dislike}}</a>
    </div>
      
   </div>
</div>
@endsection