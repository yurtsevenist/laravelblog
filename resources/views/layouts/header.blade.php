<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('tema')}}/css/styles.css" rel="stylesheet" />
      
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('tema')}}/assets/img/profile.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}#about">Hakkımda</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}#experience">Deneyimlerim</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}#education">Eğitim</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}#skills">Yeteneklerim</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}#interests">Hobilerim</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}#awards">Ödüllerim</a></li>
                    <li class="nav-item"><a class="nav-link @if(Request::segment(1)=='blog' or Request::segment(1)=='blogdetail' ) active @endif" href="{{url('blog')}}">Blog</a></li>
                </ul>
            </div>
        </nav>