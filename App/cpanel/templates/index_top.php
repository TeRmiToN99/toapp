<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if (!empty($title)){echo $title;} ?></title>

    <!--AppStyle-->
    <link rel="stylesheet" href="/App/cpanel/templates/style.css">
    <link rel="stylesheet" href="/App/cpanel/templates/viewbox.css">

    <script src="/App/Plugins/tinymce/tinymce.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/App/cpanel/templates/js/search.js"></script>
    <script>tinymce.init({
            selector:'textarea#description',
            branding: false,
            resize: 'both',
            height: 250,
            directionality : 'ru',
            skin: "charcoal",
            //theme: 'modern',
            //language: 'ru',
            plugins: 'print preview searchreplace autolink directionality visualblocks tabfocus code visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat',
            image_advtab: true,
            templates: [
                {
                    title: 'Шаблон тех карты блюда',
                    description: 'Шаблон техкарты для блюд горячих и холодных цехов',
                    url:'/App/Plugins/tinymce/templates/techcart_dish.html'
                },
                {
                    title: 'Шаблон тех карты пицца',
                    description: 'Шаблон техкарты для пицца',
                    url:'/App/Plugins/tinymce/templates/techcart_pizza.html'
                },
                {
                    title: 'Шаблон таблицы для подсказок пицца',
                    description: 'Шаблон таблицы для подсказок для вставки в текст категории пицца',
                    url:'/App/Plugins/tinymce/templates/table_tips_pizza.html'
                },{
                    title: 'Шаблон вставки корневого div',
                    description: 'Шаблон вставки корневого div для дальнейшего заполнения',
                    url:'/App/Plugins/tinymce/templates/div_tmp.html'
                },
                {
                    title: 'Шаблон таблицы для подсказок блюда',
                    description: 'Шаблон таблицы для подсказок для вставки в текст категории блюда',
                    url:'/App/Plugins/tinymce/templates/table_tips_dish.html'
                }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '/App/cpanel/templates/style.css'
            ]
        });</script>
    <!-- Bootstrap-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<script src="admin-js.js"></script>-->
</head>
<body>
<header>
    <div class="container"></div>
</header>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <main id="wrapper">
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
                <a class="navbar-brand" href="index.php">
                    <img src="/logo.jpg" alt="LOGO"">
                </a>
            </div>
            <!-- Top Menu Items -->
            <div>
                <ul class="nav navbar-left top-nav"">
                    <li><a href="/App/cpanel/form.php?action=Category"><i class="fa fa-plus-circle"></i> Категорию</a></li>
                    <li><a href="/App/cpanel/form.php?action=Product"><i class="fa fa-plus-circle"></i> Блюдо</a></li>
                    <li><a href="/App/cpanel/form.php?action=User"><i class="fa fa-plus-circle"></i> Пользователя</a></li>
                    <li><a href="/App/cpanel/form.php?action=Article"><i class="fa fa-plus-circle"></i> Новость</a></li>
                    <li><a href="/App/cpanel/form.php?action=Ingredient"><i class="fa fa-plus-circle"></i> Ингредиент</a></li>
                    <li><a href="/App/cpanel/form.php?action=Option"><i class="fa fa-plus-circle"></i> Модификатор</a></li>
                </ul>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=($_SESSION['login']);?>&nbsp;<b class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Профиль</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-cog"></i> Настройки</a></li>
                        <li><a href="<?='user.php?action=Logout'?>"><i class="fa fa-fw fa-power-off"></i> Выйти</a></li>
                    </ul>
                </li>
            </ul>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-book fa-fw"></i> ТОВАРЫ<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-1" class="collapse">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> КАТЕГОРИИ БЛЮД</a></li>
                            <li><a href="/App/cpanel/form.php?action=Category"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ КАТ.</a></li>
                            <li><a href="/App/cpanel/products.php"><i class="fa fa-angle-double-right"></i> БЛЮДА</a></li>
                            <li><a href="/App/cpanel/form.php?action=Product"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ БЛЮДО</a></li>
                            <li><a href="/App/cpanel/ingredients.php"><i class="fa fa-angle-double-right"></i> ИНГРЕДИЕНТЫ</a></li>
                            <li><a href="/App/cpanel/form.php?action=Ingredient"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ ИНГРЕДИЕНТ</a></li>
                            <li><a href="/App/cpanel/options.php"><i class="fa fa-angle-double-right"></i> МОДИФИКАТОРЫ</a></li>
                            <li><a href="/App/cpanel/form.php?action=Option"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ МОДИФИКАТОР</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  НОВОСТИ <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-2" class="collapse">
                            <li><a href="/App/cpanel/articles.php"><i class="fa fa-angle-double-right"></i> ВСЕ НОВОСТИ</a></li>
                            <li><a href="/App/cpanel/form.php?action=Article"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ НОВОСТЬ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-plus"></i>  ПОЛЬЗОВАТЕЛИ<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-3" class="collapse">
                            <li><a href="/App/cpanel/user.php"><i class="fa fa-angle-double-right"></i> ВСЕ ПОЛЬЗОВАТЕЛИ</a></li>
                            <li><a href="/App/cpanel/form.php?action=User"><i class="fa fa-angle-double-right"></i> ДОБАВИТЬ ПОЛЬЗОВАТЕЛЯ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="faq"><i class="fa fa-fw fa fa-question-circle"></i> FAQ</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-search"></i> ПОИСК</a>
                    </li>
                    <li>
                        <a href="support"><i class="fa fa-fw fa-paper-plane-o"></i> ТЕХ ПОДДЕРЖКА</a>
                    </li>
                </ul>
            </div>
            <!-- .navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main" >