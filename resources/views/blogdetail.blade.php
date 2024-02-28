@extends('layouts.master')
@section('content')
<div class="container-fluid p-0">
   <div class="row mb-5">
      <div class="col-12 text-center mt-1">
         <h3>{{Str::upper($blog->title)}}</h3> 
         <hr>
         <p>Bu yazı {{Carbon\Carbon::parse($blog->created_at)->diffForHumans()}} {{$blog->author}} tarafından yazılmıştır ve {{$blog->hit}} kez okunmuştur.</p>
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
          <a class="btn btn-sm text-decoration-none like-click" id="like-click" bid={{$blog->id}}  title="Beğeni Sayısı Sayısı"><i class="bi bi-hand-thumbs-up"></i><span id="likecount">{{$blog->like}}</span></a>
      </div>
      <div class="col-4 text-center">
        <a class="btn btn-sm text-decoration-none dislike-click" id="dislike-click" bid={{$blog->id}}  title="Beğenmeme Sayısı Sayısı"><i class="bi bi-hand-thumbs-down"></i> <span id="dislikecount">{{$blog->dislike}}</span></a>
    </div>
      
   </div>
</div>
@endsection
@section('js')
 <script>
 $(function () {
     $('.like-click').click(function () {
         id = $(this)[0].getAttribute('bid');
         console.log("like tıklandı");
         $.ajax({
           type: 'GET',
                 url: '{{route('likeBlog')}}',
                 data: {
                     id: id
                 },
                 success:function(data)
                 {
                    $("#likecount").html(data.like);
                    $("#dislikecount").html(data.dislike);
                 }

         })
        
     });
    })
 </script>
 <script>
    $(function () {
        $('.dislike-click').click(function () {
            id = $(this)[0].getAttribute('bid');
            console.log("dislike tıklandı");
            $.ajax({
              type: 'GET',
                    url: '{{route('dislikeBlog')}}',
                    data: {
                        id: id
                    },
                    success:function(data)
                    {
                        $("#likecount").html(data.like);
                       $("#dislikecount").html(data.dislike);
                    }
   
            })
           
        });
       })
    </script>
@endsection