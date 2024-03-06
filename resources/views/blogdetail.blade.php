@extends('layouts.master')
@section('content')
<div class="container-fluid">
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
   
     <div class="col-12">
      <hr>
        <div class="row">
          <div class="col-10">
            <p class="text-left">Yorumlar</p>
          </div>
          <div class="col-2 text-right">
             <a title="Yorum yapmak için tıklayınız" class="btn btn-sm comment-click" id="comment-click" ><i class="bi bi-chat-dots"></i>&nbsp; Yorum Yap</a>
          </div>
          <div class="col-md-8 offset-md-2 col-12" id="commentform">
            <form action="{{route('commentPost')}}" method="POST">
              @csrf
              <input type="hidden" name="blog_id" value="{{$blog->id}}">
              <div class="form-group mb-2">
                <label for="name">Adınız Soyadınız</label>
                <input type="text" class="form-control" name="name"   placeholder="Adınızı Soyadınızı giriniz" required>                
              </div>
              <div class="form-group mb-2">
                <label for="comment">Yorumunuz</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>                
              </div>
           
              <button  type="submit" class="btn btn-primary">Gönder</button>
              <a type="button" class="btn btn-danger text-white commentclose" id="commentclose">Kapat</a>
            </form> 
          </div>
           @foreach ($comments as $com )
           <div class="col-12 card">           
            <div class="card-body">
     
              <h6 class="card-subtitle mb-2 text-muted">{{$com->name}}</h6>
              <p class="card-text">{{$com->commented}}</p>
          
            </div>
        
        </div>
        <hr>
           @endforeach
        </div>
     </div>
      
   </div>
</div>

@endsection
@section('js')
<script>
  $(document).ready(function(){
      $("#commentform").hide();
      $('#comment-click').click(function(){           
           $("#commentform").show();
       });
       $('#commentclose').click(function(){           
           $("#commentform").hide();
       });
  });
  </script>
  
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