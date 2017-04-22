<?php include_once(ROOT."/views/layouts/header.php"); ?>
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-main">
                   <div class="profile-left main-page">
                       <h3 class="heading matches-heading">Лучшие прогнозы на сегодня</h3>
                       <!-- Карусель -->
                       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           <!-- Indicators -->
                           <ol class="carousel-indicators">
                               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           </ol>

                           <!-- Wrapper for slides -->
                           <div class="carousel-inner">
                               <div class="item active">
                                   <img src="/template/assets/img/slider/stad2.jpg" alt="...">
                                   <div class="carousel-caption">
                                       <h3>Бавария - Гамбург</h3>
                                       <p>Германия, 34 тур</p>
                                   </div>
                               </div>
                               <div class="item">
                                   <img src="/template/assets/img/slider/stad4.jpeg" alt="...">
                                   <div class="carousel-caption">
                                       <h3>Челси - Арсенал</h3>
                                       <p>Англия, 33 тур</p>
                                   </div>
                               </div>
                               <div class="item">
                                   <img src="/template/assets/img/slider/stad1.jpg" alt="...">
                                   <div class="carousel-caption">
                                       <h3>Динамо - Шахтер</h3>
                                       <p>Украина, 28 тур</p>
                                   </div>
                               </div>
                           </div>

                           <!-- Controls -->
                           <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                               <span class="glyphicon glyphicon-chevron-left"></span>
                           </a>
                           <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                           </a>
                       </div> <!-- Carousel -->
                       <h3 class="heading matches-heading">Все прогнозы</h3>
                   <?php foreach ($info as $tables => $table): ?>
                        <table id="pr-table" class="calendar-table table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="5"><?=$table['league_name']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i = 0; $i < count($table['match_info']['homeTeam']); $i++): ?>
                                        <tr>
                                            <td class="pr-team text-right"><a href="/match/info?league=<?=$table['id']?>&home=<?=$table['match_info']['homeTeam'][$i]?>&away=<?=$table['match_info']['awayTeam'][$i]?>"><?=$table['match_info']['homeTeam'][$i]?></a></td>
                                            <td class="logo"><img src="<?=$table['match_info']['homeTeamLogo'][$i]?>" alt="<?=$table['match_info']['homeTeam'][$i]?>"></td>
                                            <td class="pr-middle text-center analyse"><a href="/match/info?league=<?=$table['id']?>&home=<?=$table['match_info']['homeTeam'][$i]?>&away=<?=$table['match_info']['awayTeam'][$i]?>">Прогноз</a></td>
                                            <td class="logo"><img src="<?=$table['match_info']['awayTeamLogo'][$i]?>" alt="<?=$table['match_info']['awayTeam'][$i]?>"></td>
                                            <td class="pr-team text-left"><a href="/match/info?league=<?=$table['id']?>&home=<?=$table['match_info']['homeTeam'][$i]?>&away=<?=$table['match_info']['awayTeam'][$i]?>"><?=$table['match_info']['awayTeam'][$i]?></a></td>
                                        </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                   <?php endforeach; ?>
                   </div>
                    <div class="profile-right main-page">
                        <h3 class="heading matches-heading">Live матч-центр </h3>
                        <div class="table-responsive">
                            <?=$matchTable?>
                        </div>
                    </div>
                </div>
            </div>
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

    $('table.calendar-table').each(function () {
        $( this ).addClass("table table-hover table-condensed");
        $( this ).find('.tv-channel').remove();
        $( this ).find('td.score a , td.team a, td.logo a').attr('href','/');
        $( this ).find('td.bet-td a').remove();
        //$( this ).find('tbody td:last-child').after("<td class='analyse'><a href='/'>Анализ</a></td>");
    });


/*    $(function() {
        var data, options;

        // headline charts
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 300,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);


        // visits trend charts
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);


        // visits chart
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [6384, 6342, 5437, 2764, 3958, 5068, 7654]
            ]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);


        // real-time pie chart
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function(percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000; // in milliseconds

        setInterval(function() {
            var randomVal;
            randomVal = getRandomInt(0, 100);

            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });*/
</script>
</body>

</html>
