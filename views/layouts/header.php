<!doctype html>
<html lang="en">
<head>
    <title><?=$menu?></title>
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
        @font-face{font-family:'fonta32050a8cd4afc3f7406bc824e209cc8';src:url('http://nomail.com.ua/files/eot/a32050a8cd4afc3f7406bc824e209cc8.eot?#iefix') format('embedded-opentype'),url('http://nomail.com.ua/files/woff/a32050a8cd4afc3f7406bc824e209cc8.woff') format('woff'),url('http://nomail.com.ua/files/woff2/a32050a8cd4afc3f7406bc824e209cc8.woff2') format('woff2');}@font-face{font-family:'ProximaNovaCond-Regular';src:local('ProximaNovaCond-Regular'),url('http://nomail.com.ua/files/woff/a32050a8cd4afc3f7406bc824e209cc8.woff') format('woff');}#proximanovacondensedregular{font-family:'ProximaNovaCond-Regular';}.fonta32050a8cd4afc3f7406bc824e209cc8{font-family:'fonta32050a8cd4afc3f7406bc824e209cc8';}

    </style>
    <!-- VENDOR CSS -->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
    <!--<link rel="stylesheet" href="/template/assets/css/flags.css">-->
    <link rel="stylesheet" href="/template/assets/css/news.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="icon" type="image/png" sizes="16x16" href="/template/assets/img/logo.ico">
    <script src="/template/assets/vendor/jquery/jquery.min.js"></script>
    <script>
        $(window).on('load', function () {
            var $preloader = $('#page-preloader'),
                $spinner   = $preloader.find('.spinner');
            $spinner.fadeOut();
            $preloader.delay(250).fadeOut('slow');
            var matches = 0;
            $('table#pr-table tbody tr ').each(function () {
                 matches++;
            });
            if (matches > 0) { $('.match').removeClass('hidden'); }
            $('.match').text('('+matches+')');
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
                            <span class="badge bg-success"><?php if ($notificationCounter > 3) {echo '2';} else echo '1';?></span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li><a href="/" class="notification-item"><span class="dot bg-success"></span>Все матчи<span class="hidden match"></span> на <?=date("d.m")?> проанализированы</a></li>
                            <?php
                                if ($notificationCounter > 3) echo "<li><a href='/profile/edit' class='notification-item'><span class='dot bg-warning'></span>".$user['name'].", заполните информацию о себе (".$notificationCounter." из 9)</a></li>";
                            ?>
                        </ul>
                    </li>
                    <?php endif; ?>
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

                    <li><a href="/" <?php if($menu == 'Sport info') echo "class='active'"; ?>><i class="lnr lnr-home"></i><span>Главная</span></a></li>
                    <li><a href="/statistic" <?php if($menu == 'Статистика') echo "class='active'"; ?>><i class="fa fa-futbol-o"></i><span>Статистика</span></a>
                    </li>
                    <?php if (!User::isGuest()): ?>
                    <li>
                        <a href="#subCabinet" data-toggle="collapse" class="<?php if($menu == 'Профиль' || $menu == 'Редактировать профиль') echo "active "; ?>collapsed"><i class="fa fa-user-circle" aria-hidden="true"></i><span>Личный кабинет</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subCabinet" class="collapse">
                            <ul class="nav">
                                <li><a href="/profile/" class="">Профиль</a></li>
                                <li><a href="/profile/edit" class="">Настройки</a></li>
                                <li><a href="/logout" class="">Выйти</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                    <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i><span>О сервисе</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->