@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('http://galapagosluxurycharters.com/') }}">GLC | Galapagos Luxury Charters</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>-->
                        <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group 
                        </li>-->
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li {{ (Request::is('*admin/charters/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('admin/charters/') }}"><i class="fa fa-anchor fa-fw"></i> Charters</a>
                        </li>
                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-files-o fa-fw"></i> Pedidos</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-slack fa-fw"></i> Contabilidad<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*admin/contabilidad/apa/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/contabilidad/apa/') }}">APA</a>
                                </li>
                                <li {{ (Request::is('*admin/contabilidad/facturas/dashboard_facturas') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/contabilidad/facturas/dashboard_facturas') }}">Facturas GLC</a>
                                </li>
                                <li {{ (Request::is('*admin/contabilidad/comisiones/dashboard_comisiones') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/contabilidad/comisiones/dashboard_comisiones') }}">Comisiones GLC</a>
                                </li>
                                <li {{ (Request::is('*admin/contabilidad/comisiones/dashboard_comisiones') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/contabilidad/comisiones/dashboard_comisiones') }}">Generar órdenes de pago</a>
                                </li>
                                <li {{ (Request::is('*admin/contabilidad/comisiones/dashboard_comisiones') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/contabilidad/comisiones/dashboard_comisiones') }}">Registrar pagos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Tablas Maestras <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}"> Usuarios</a>
                                </li>
                                <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}"> Perfiles</a>
                                </li>
                                <li>
                                    <a href="#">Servicios <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Operadores de embarcación</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Venta de boletos</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Hoteles</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Aeropuertos</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Transfers</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> City tour</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Internet & Telefonía satelital</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Actividades <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Proveedores</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}"> Staff</a>
                                </li>
                                <li>
                                    <a href="#">Logística <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Transporte de Carga</a>
                                        </li>
                                        <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('') }}"> Prov. de alimentos & bebidas</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}"> Intermediarios</a>
                                </li>
                                <li {{ (Request::is('*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}"> Sitios de visita</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop
