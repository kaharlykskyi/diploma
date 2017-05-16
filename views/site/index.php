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
                                       <h3 class="slider-teams1">Бавария - Гамбург</h3>
                                       <p class="slider-league1">Германия, 34 тур</p>
                                   </div>
                               </div>
                               <div class="item">
                                   <img src="/template/assets/img/slider/stad4.jpeg" alt="...">
                                   <div class="carousel-caption">
                                       <h3 class="slider-teams2">Челси - Арсенал</h3>
                                       <p class="slider-league2">Англия, 33 тур</p>
                                   </div>
                               </div>
                               <div class="item">
                                   <img src="/template/assets/img/slider/stad1.jpg" alt="...">
                                   <div class="carousel-caption">
                                       <h3 class="slider-teams3">Динамо - Шахтер</h3>
                                       <p class="slider-league3">Украина, 28 тур</p>
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
                       <!--<h3 class="heading matches-heading">Все прогнозы</h3>-->
                       <div class="table-responsive">
                       <?php
                       if (empty($info)) echo "<div class='alert alert-warning'><h5>К сожалению проанализированых матчей на сегодня нет :(</h5></div>";
                       foreach ($info as $tables => $table): ?>
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
                                                <td class="pr-team text-right"><a href="/forecast/info?league=<?=$table['id']?>&home=<?=$table['match_info']['homeTeam'][$i]?>&away=<?=$table['match_info']['awayTeam'][$i]?>"><?=$table['match_info']['homeTeam'][$i]?></a></td>
                                                <td class="logo"><img src="<?=$table['match_info']['homeTeamLogo'][$i]?>" alt="<?=$table['match_info']['homeTeam'][$i]?>"></td>
                                                <td class="pr-middle text-center analyse"><a href="/forecast/info?league=<?=$table['id']?>&home=<?=$table['match_info']['homeTeam'][$i]?>&away=<?=$table['match_info']['awayTeam'][$i]?>">Прогноз</a></td>
                                                <td class="logo"><img src="<?=$table['match_info']['awayTeamLogo'][$i]?>" alt="<?=$table['match_info']['awayTeam'][$i]?>"></td>
                                                <td class="pr-team text-left"><a href="/forecast/info?league=<?=$table['id']?>&home=<?=$table['match_info']['homeTeam'][$i]?>&away=<?=$table['match_info']['awayTeam'][$i]?>"><?=$table['match_info']['awayTeam'][$i]?></a></td>
                                            </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                       <?php endforeach; ?>
                       </div>
                       <div class="clearfix"></div>
                   </div>
                    <div class="profile-right main-page">
                        <h3 class="heading matches-heading">Live матч-центр</h3>
                        <div class="table-responsive">
                            <?=$matchTable?>
                        </div>
                        <div class="clearfix"></div>
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

        $('.slider-league1').text($('#pr-table:nth-child(1) thead tr th').text());
        $('.slider-league2').text($('#pr-table:nth-child(2) thead tr th').text());
        $('.slider-league3').text($('#pr-table:nth-child(4) thead tr th').text());
        $('.slider-teams1').text($('#pr-table:nth-child(1) tbody tr:nth-child(1) td:nth-child(1)').text() + ' - ' + $('#pr-table:nth-child(1) tbody tr:nth-child(1) td:nth-child(5)').text());
        $('.slider-teams2').text($('#pr-table:nth-child(2) tbody tr:nth-child(1) td:nth-child(1)').text() + ' - ' + $('#pr-table:nth-child(2) tbody tr:nth-child(1) td:nth-child(5)').text());
        $('.slider-teams3').text($('#pr-table:nth-child(4) tbody tr:nth-child(1) td:nth-child(1)').text() + ' - ' + $('#pr-table:nth-child(4) tbody tr:nth-child(1) td:nth-child(5)').text());

    });

    $('table.calendar-table').each(function () {
        $( this ).addClass("table table-hover table-condensed");
        $( this ).find('.tv-channel').remove();
        $( this ).find('td.score a , td.team a, td.logo a, td.time a').attr('href','/');
        $( this ).find('td.bet-td a').remove();
        $( this ).find('td.time, td.score').addClass('text-center pr-middle');

        if ($( this ).is('thead tr th a')) {
            var league = $( this ).find('thead tr th a').text();
        } else {
            league = $( this ).find('thead tr th').text();
        }

        $( this ).find('thead tr th a').remove(":empty");
        $( this ).find('thead tr th').text(league);
    });

</script>
</body>

</html>
