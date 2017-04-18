<!doctype html>
<html lang="en">
<head>
    <title>Sport info</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <style type="text/css">
        #page-preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: #FFF;
            z-index: 100500;
        }
        #page-preloader .spinner {
            width: 120px;
            height: 120px;
            position: absolute;
            left: 50%;
            top: 50%;
            background: url('/template/assets/img/ring.gif') no-repeat 50% 50%;
            margin: -60px 0 0 -60px;
        }

    </style>
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/template/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/template/assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="/template/assets/vendor/chartist/css/chartist-custom.css">
    <link rel="stylesheet" href="/template/assets/css/bootstrap-select.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">-->
    <!-- MAIN CSS -->
<!--    <link rel="stylesheet" href="https://stcdn1.luxnet.ua/football24/assets2/css/app.min.css?v2.0b352r4">-->
    <link rel="stylesheet" href="/template/assets/css/main.css">
    <!--NEWS CSS-->
    <link rel="stylesheet" href="/template/assets/css/flags.css">
    <link rel="stylesheet" href="/template/assets/css/news.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="/template/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/template/assets/img/favicon.png">
    <script src="/template/assets/vendor/jquery/jquery.min.js"></script>
    <script>
        $(window).on('load', function () {
            var $preloader = $('#page-preloader'),
                $spinner   = $preloader.find('.spinner');
            $spinner.fadeOut();
            $preloader.delay(250).fadeOut('slow');
        });
    </script>
</head>

<body>
<!-- PRELOADER -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="/"><img src="/template/assets/img/logo-dark.png" alt="Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <!-- <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" value="" class="form-control" placeholder="Поиск...">
                    <span class="input-group-btn"><button type="button" class="btn btn-primary">Найти</button></span>
                </div>
            </form> -->
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <?php if (User::isGuest()): ?>
                        <li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i><span> Войти</span></a></li>
                        <li><a href="/register"><i class="fa fa-lock" aria-hidden="true"></i><span> Регистрация</span></a></li>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=$small_avatar_url?>" class="img-circle" alt="Avatar"> <span><?php echo $user['name']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile/"><i class="lnr lnr-user"></i> <span>Профиль</span></a></li>
                            <li><a href="/profile/edit"><i class="lnr lnr-cog"></i> <span>Настройки</span></a></li>
                            <li><a href="/logout"><i class="fa fa-sign-in"></i> <span>Выйти</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="lnr lnr-alarm"></i>
                            <span class="badge bg-danger">5</span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                            <li><a href="#" class="more">See all notifications</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Basic Use</a></li>
                            <li><a href="#">Working With Data</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Troubleshooting</a></li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">

                    <li><a href="/" class="active"><i class="lnr lnr-home"></i><span>Главная</span></a></li>
                    <li>
                        <a href="#subEvents" data-toggle="collapse" class="collapsed"><i class="fa fa-futbol-o" aria-hidden="true"></i><span>События</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subEvents" class="collapse ">
                            <ul class="nav">
                                <li><a href="#" class="">Футбол</a></li>
                                <li><a href="#" class="">Теннис</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#subAnalysis" data-toggle="collapse" class="collapsed"><i class="fa fa-pie-chart" aria-hidden="true"></i><span>Аналитика</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subAnalysis" class="collapse ">
                            <ul class="nav">
                                <li><a href="#" class="">Футбол</a></li>
                                <li><a href="#" class="">Теннис</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php if (!User::isGuest()): ?>
                    <li>
                        <a href="#subCabinet" data-toggle="collapse" class="collapsed"><i class="fa fa-user-circle" aria-hidden="true"></i><span>Личный кабинет</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subCabinet" class="collapse ">
                            <ul class="nav">
                                <li><a href="/profile/" class="">Профиль</a></li>
                                <li><a href="/profile/edit" class="">Настройки</a></li>
                                <li><a href="#" class="">Выйти</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                    <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i><span>О сервисе</span></a></li>

                    <!-- <li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
                    <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
                    <li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
                    <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
                    <li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->