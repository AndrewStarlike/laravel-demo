<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Viruses Library @yield('title')</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        
        @yield('css')

        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('index') }}">Viruses Library</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                        <li>
                            <a href="{{ url('logout') }}" class="btn btn-default" role="button">Logout</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('login') }}" class="btn btn-default" role="button">Login</a>
                        </li>
                        <li>
                            <a href="{{ url('register') }}" class="btn btn-default" role="button">Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">
            
            <!-- Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('header')</h1>
                </div>
            </div>
            <!-- /.row -->
            
            <!-- Errors -->
            @if(Session::has('error'))
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-warning">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->any())
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Content -->
                @yield('content')
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="{{ URL::asset('js/jquery.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        
        @yield('javascripts')

    </body>

</html>