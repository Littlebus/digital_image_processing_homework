<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="/assets/css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/assets/css/plugins/select2/select2.min.css" rel="stylesheet">

    <!-- c3 Charts -->
    <link href="/assets/css/plugins/c3/c3.min.css" rel="stylesheet">
    <link href="/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/assets/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div>
                            <a href="/">
                                <span class="clear"> <span class="block m-t-xs">
                                        <h2>鸟类数据库</h2>
                                    </span></span> </a>
                        </div>
                        <div class="logo-element">
                            鸟类查询数据库
                        </div>
                    </li>
                    <li id="MM1">
                        <a href="demology"><i class="fa fa-user"></i> <span class="nav-label">浏览</span><span class="fa arrow"></span></a>
                    </li>
                    <li id="MM2">
                        <a href="bodycheck"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">检索</span><span class="fa arrow"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary "><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                    </ul>
                </nav>
            </div>
            @yield('content')
        </div>
</body>

</html>