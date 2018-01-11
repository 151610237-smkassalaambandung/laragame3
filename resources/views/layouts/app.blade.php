<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link href="/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel='stylesheet'>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Scripts -->

    <!--.panel-heading-custom {
          color: black;
          background: rgba(225,225,225,0.5);
          background: rgba(225,225,225,0.0);
          border-top-left-radius:15px ;  
          border-top-right-radius:15px ; 
         }
    .panel-custom {
          background: rgba(225,225,225,0.5);
          border-radius: 15px; 
         }
    .panel-title-custom {
          color: orange;
          font-family: 'Comfortaa';
         }
    table{
          
          background: rgb(255,255,255); 
         }
    .navbar-custom{
          color: white;
          background: rgba(8,8,8,0.5); 
          border-bottom-left-radius:20px ;  
          border-bottom-right-radius:20px ;
          
         } -->
    
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body style="background: url({{asset('51e4bc2a8663e1373944874552113521_1359025749.jpg')}}); 
             background-repeat: no-repeat;
             background-size: cover; 
             background-attachment: fixed;">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                     @if(Auth::guest())
                    <a class="navbar-brand" href="{{ url('/guest/home/') }}">
                        {{ config('app.name', 'Laravel') }}</a>
                    

                    @endif
                    @role('admin')
                    <a class="navbar-brand" href="{{ url('/admin/rumah/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @endrole
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                        @endif
                        @role('admin')
                            <li><a href="{{ route('kategoris.index') }}">Kategori</a></li>
                            <li><a href="{{ route('beritas.index') }}">Berita</a></li>
                        @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @include('layouts._flash')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/custom.js"></script>

    <!-- panggil ckeditor.js -->
    <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <!-- panggil adapter jquery ckeditor -->
    <script type="text/javascript" src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
    <!-- setup selector -->
    <script type="text/javascript">
        $('textarea.texteditor').ckeditor();
    </script>

    @yield('scripts')
</body>
</html>
