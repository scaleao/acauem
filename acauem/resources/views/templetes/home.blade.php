<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('titulo')</title>
        <!-- Bootstrap core CSS -->
        <!--<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="{{ asset('homeCss/bootstrap.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <!--<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
        <link href="{{ asset('homeCss/fontawesome.css') }}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <!--<link href="../css/clean-blog.min.css" rel="stylesheet">-->
        <link href="{{ asset('homeCss/clean-blog.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- HEADER ----------------------------->
        @include('templetes.layout.homeLayout.headerHome')
        <!-- HEADER ----------------------------->

        <!-- Main Content ----------------------->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    @yield('conteudo')

                    <hr>
                    <!-- Pager -->
                    <div class="clearfix">
                        <a class="btn btn-primary float-right" href="{{route('index.publication')}}">Publicações &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content ----------------------->
        <hr>

        <!-- FOOTER ----------------------------->
        @include('templetes.layout.homeLayout.footerHome')
        <!-- FOOTER ----------------------------->

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('homeJs/jquery.min.js')}} "></script>
        <script src="{{ asset('homeJs/bootstrap.bundle.min.js' )}}"></script>
        <scrip src="{{asset('homeJs/clean-blog.js')}}"></script>
    </body>
</html>
