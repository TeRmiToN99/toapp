<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!--AppStyle-->
    <link rel="stylesheet" href="/App/cpanel/templates/style.css">
    <!-- Bootstrap-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="admin-js.js"></script>
</head>
<body>
<header>
    <div class="container"></div>
</header>
<main>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
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
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/">
                <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO"">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Профиль</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Настройки</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Выйти</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-book fa-fw"></i> ТОВАРЫ<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> КАТЕГОРИИ БЛЮД</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ КАТ.</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> БЛЮДА</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ БЛЮДО</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  НОВОСТИ <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> ВСЕ НОВОСТИ</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ НОВОСТЬ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-plus"></i>  ПОЛЬЗОВАТЕЛИ<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> ВСЕ ПОЛЬЗОВАТЕЛИ</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ ПОЛЬЗОВАТЕЛЯ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="faq"><i class="fa fa-fw fa fa-question-circle"></i> FAQ</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-search"></i> Поиск</a>
                </li>
                <li>
                    <a href="support"><i class="fa fa-fw fa-paper-plane-o"></i> ТЕХ ПОДДЕРЖКА</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h2>Добро пожаловать <?=$userName;?>!</h2>
                </div>
                <div class="col-sm-12 col-md-12 well">
                    <?php include_once(__DIR__ . '/../templates/a_categories.php'); ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<footer>
    <div class="container"></div>
</footer>
<footer>
    <div class="container"></div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>