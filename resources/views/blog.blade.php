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
          <p class="pt-2"><strong><a class="text-info text-decoration-none" href="{{route('blogdetail',$blog->id)}}">{{Str::upper($blog->title)}}</a></strong></p>
          <p style="height:200px">{{Str::words($blog->content,100)}}</p>
           <div class="row">
            <div class="col-4 text-center">
                <a class="text-decoration-none"  href="#" title="Okunma Sayısı"><i class="bi bi-eye"></i> {{$blog->hit}}</a>
            </div>
            <div class="col-4 text-center">
               <a class="btn btn-sm text-decoration-none like-click" id="like-click" bid={{$blog->id}}  title="Beğeni Sayısı Sayısı"><i class="bi bi-hand-thumbs-up"></i><span id="likecount-{{$blog->id}}">{{$blog->like}}</span></a>
           </div>
           <div class="col-4 text-center">
             <a class="btn btn-sm text-decoration-none dislike-click" id="dislike-click" bid={{$blog->id}}  title="Beğenmeme Sayısı Sayısı"><i class="bi bi-hand-thumbs-down"></i> <span id="dislikecount-{{$blog->id}}">{{$blog->dislike}}</span></a>
         </div>
           </div>
       </div>
      @endforeach
      <div class="col-6 offset-3 text-center">
         {{ $blogs->links() }}
      </div>
   </div>
</div>
@endsection
@section('js')
 <script>
 $(function () {
     $('.like-click').click(function () {
         id = $(this)[0].getAttribute('bid');
         console.log(id);
         $.ajax({
           type: 'GET',
                 url: '{{route('likeBlog')}}',
                 data: {
                     id: id
                 },
                 success:function(data)
                 { 
                     
                     spanid="#likecount-"+id;
                     spanid2="#dislikecount-"+id;
                    $(spanid).html(data.like);
                    $(spanid2).html(data.dislike);
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
                   
                     spanid="#likecount-"+id;
                     spanid2="#dislikecount-"+id;
                    $(spanid).html(data.like);
                    $(spanid2).html(data.dislike);
                    }
   
            })
           
        });
       })
    </script>
@endsection