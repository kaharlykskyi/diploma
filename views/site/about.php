<?php include_once(ROOT."/views/layouts/header.php"); ?>
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="full-text">
                        <h1 class="text-center"><b>SPORT INFO</b></h1>
                        <hr>
                        <div class="mobiles-wrapper">
                            <div class="login-device">
                                <div class="login-device-img img-android">
                                </div>
                            </div>
                            <div class="login-device">
                                <div class="login-device-img img-wp">
                                </div>
                            </div>
                            <div class="center-device">
                                <div class="login-device-img img-ios">
                                </div>
                            </div>
                        </div>
                        <p><span class="main-text"><b>SPORT INFO</b></span> - это информационно-аналитический веб-сервис предосталяющий ежедневные качественные прогнозы на футбольные матчей ведущих Европейских лиг.
                        Система анализирует множество статистических факторов и предоставляет вероятность того или иного исхода футбольного матча в процентах.
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row info-text">
                    <p><span class="sub-text"><b>Математическая модель</b></span> -  математическая модель разработаная Л. В. Бехтер, Н. И. Клевец, метод  метода взвешенной суммы показателей.</p>
                    <p><span class="sub-text"><b>Рейтинг команд</b></span> - анализируя множество показателей каждой команды система расчитывает рейтинг команд.</p>
                    <p><span class="sub-text"><b>Показатели и статистика</b></span> - динамика, стабильность, место в турнирной таблице, и т.д.</p>
                    <p><span class="sub-text"><b>Новости футбола</b></span> - новости о команда, травмы, фактор домашнего стадиона.</p>
                    <p><span class="sub-text"><b>Автоматизация</b></span> - ежедневно система автоматически загружает и анализирует все доступные матчи.</p>
                    <p><span class="sub-text"><b>Динамика команд</b></span> - успех команды или неудача на основе текущего выступления и силе.</p>
                </div>
                <hr>
                <div class="text-center foot">Разработано:<a href="https://github.com/kaharlykskyi" target="_blank"> Кагарлыкский М.</a>, Гаркуша В. &copy; 2017 </div>
            </div>
            <div class="clearfix"></div>

        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="/template/assets/vendor/jquery/jquery.min.js"></script>
<script src="/template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/template/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="/template/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="/template/assets/scripts/klorofil-common.js"></script>
<script>
    $(window).on('load', function () {
        var $preloader = $('#page-preloader'),
            $spinner   = $preloader.find('.spinner');
        $spinner.fadeOut();
        $preloader.delay(350).fadeOut('slow');
    });
</script>
</body>

</html>
