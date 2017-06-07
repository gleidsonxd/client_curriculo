<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    

    <!-- Custom CSS -->
    {{-- <link href="css/sb-admin.css" rel="stylesheet"> --}}
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
    

    <!-- Custom Fonts -->
    {{-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> --}}
    <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="\main">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{ session('logado')==1 ?" ".session('email') : ' Visitante'}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                         <?php @$id = session('id');?>
                        @if(session('logado')==1)
                        <li>
                            @if(session('type')=='usuario')
                            <a href="\profile/{{$id}}"><i class="fa fa-fw fa-user"></i>Profile</a>
                            @else
                            <a href="\account/{{$id}}"><i class="fa fa-fw fa-user"></i>Account</a>
                            @endif
                        </li>
                        <li>
                            @if(session('type')=='usuario')
                            <a href="#"><i class="fa fa-fw fa-envelope"></i>Curriculo</a>
                            @endif
                        </li>
                        <li>
                            @if(session('type')=='usuario')
                            <a href="\editar_pass/{{$id}}"><i class="fa fa-fw fa-gear"></i>Change Password</a>
                            @else
                            <a href="\editar_gpass/{{$id}}"><i class="fa fa-fw fa-gear"></i>Change Password</a>
                            @endif
                        </li>
                        <li class="divider"></li>
                        <li>
                            @if(session('type')=='gestor')
                            <a href="\gestorlogout"><i class="fa fa-fw fa-sign-out"></i>Log Out</a>
                            @else
                            <a href="\logout"><i class="fa fa-fw fa-sign-out"></i>Log Out</a>
                            @endif
                        </li>
                        @else
                        <li>
                            <a href="\logout"><i class="fa fa-fw fa-sign-in"></i>Login</a>
                        </li>
                        @endif

                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @if(session('type')=='gestor')
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Oportunidades</a>
                    </li>
                    <li>
                        <a href="\usuarios"><i class="fa fa-fw fa-bar-chart-o"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Gestores <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="\gestorForm">Cadastar Gestor</a>
                            </li>
                            <li>
                                <a href="\gestors">Listar Gestor</a>
                            </li>
                        </ul>
                    </li>
                    @else
                     <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Oportunidades</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                
                        @yield('content')
                 
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }} "></script>
    

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }} "></script>
    

</body>

</html>
