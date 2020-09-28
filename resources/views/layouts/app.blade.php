
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS System</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">



</head>

<body>

<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element" style=" margin-top: -25px;">
                    <span class="block m-t-xs">
                      <img style="height: 40px;width: " alt="image" src="{{ asset('assets/img/logo.png') }}" />
                    </span>
                </div>
                <a  href="#" aria-expanded="true">
                    <span class="block m-t-xs font-bold">
                        {{App::getLocale() == 'kh' ?Auth::user()->users->name_kh: Auth::user()->users->name_en}}
                    </span>
                </a>
            </li>


            <li class="active" style="margin-top: -35px !important;">
                <a href="{{ url ('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">{{__('menu.dashboard')}}</span></a>
            </li>
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-group"></i> <span class="nav-label">{{__('menu.customers')}}</span></a>--}}
{{--            </li>--}}
{{--           --}}
{{--            <li>--}}
{{--                <a href="metrics.html"><i class="fa fa-cubes"></i> <span class="nav-label">{{__('menu.suppliers')}}</span></a>--}}
{{--            </li>--}}
{{--             <li>--}}
{{--                <a href="mailbox.html"><i class="fa fa-bars"></i> <span class="nav-label">{{__('menu.stocks')}} </span><span class="fa arrow"></a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                   <li><a href="#">{{__('menu.stockproduct')}}</a></li>--}}
{{--                   <li><a href="#">{{__('menu.categories')}}</a></li>--}}
{{--                </ul>          --}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">{{__('menu.purchases')}}</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li><a href="form_basic.html">{{__('menu.purchaseslist')}}</a></li>--}}
{{--                   --}}
{{--                </ul>--}}
{{--            </li>          --}}
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">{{__('menu.products')}} </span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li><a href="lockscreen.html">{{__('menu.productscategories')}}</a></li>--}}
{{--                    <li><a href="lockscreen.html">{{__('menu.brandproducts')}}</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--           --}}
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">{{__('menu.accounts')}}</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li><a href="typography.html">{{__('menu.accountslist')}}</a></li>--}}
{{--                    <li><a href="icons.html">{{__('menu.transations')}}</a></li>--}}
{{--                   --}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">{{__('menu.finacailreport')}}</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li><a href="table_basic.html">{{__('menu.incomestatement')}}</a></li>--}}
{{--                    <li><a href="table_basic.html">{{__('menu.expensestatement')}}</a></li>--}}
{{--                    <li><a href="table_data_tables.html">{{__('menu.balancesheet')}}</a></li>--}}
{{--                    <li><a href="table_data_tables.html">{{__('menu.cashflowstatement')}}</a></li>--}}
{{--                    <li><a href="table_data_tables.html">{{__('menu.ownershipstatement')}}</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-paste"></i> <span class="nav-label">{{__('menu.report')}}</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li><a href="ecommerce_product.html">{{__('menu.dailyreport')}}</a></li>--}}
{{--                    <li><a href="ecommerce_product_detail.html">{{__('menu.summaryreport')}}</a></li>--}}
{{--                  --}}
{{--                </ul>--}}
{{--            </li>--}}
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">{{__('menu.users')}}</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                   <li><a href="{{ route('users.index') }}">{{__('menu.userslist')}}</a></li>
                   <li><a href="{{ route('roles.index') }}">{{__('menu.rolelist')}}</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">{{__('menu.setting')}}</span></a>
            </li>

        </ul>
    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <ul class="nav navbar-top-links navbar-right">
             <a href="{{ url('dashboard/kh') }}" id="khmer">
                  <img src="{{ asset('assets/img/khmer.png') }}" width="20;height20">
              </a>
              <a href="{{ url('dashboard/en') }}"><img src="{{ asset('assets/img/english.png') }}" width="20;height20"></a>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> {{__('home.logout')}}
                </a>
            </li>
        </ul>

    </nav>
</div>



<main class="py-4">

    @yield('content')

</main>




<div class="footer" >
    <div class="pull-right">
       Version <strong>1.0</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> POS System &copy; 2020-2021
    </div>
</div>

</div>
</div>



<!-- Mainly scripts -->
<script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('assets/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

