<?php include_once(ROOT."/views/layouts/header.php"); ?>
<div class="hidden">
    <p><b>Рейтинг: </b><br><?php
        foreach ($forecast as $team => $val) {
            echo $team.' '.$val['rating'].'<br>';
        }
        ?></p>
    <p class="rate"><b>Шанс: </b><br><?php
        $i = 0;
        $result = false;
        foreach ($forecast as $team => $val) {
            $i++;
            echo "<span id='team".$i."'>".$team.'</span> '."<span id='".$i."'>".$val['victory_chance'].'</span> %<br>';
            if ($team === $_GET['home']) {
                $homeVal = round($val['victory_chance'], 0);
            }
            if ($team === $_GET['away']) {
                $awayVal = round($val['victory_chance'], 0);
            }
            if (!empty($val['result'])) {
                $result = $val['result'];
            }
        }
        ?></p>
    <?php
        foreach ($info as $tables => $table) {
            for ($i = 0; $i < count($table['match_info']['homeTeam']); $i++) {
                if ($table['match_info']['homeTeam'][$i] == $_GET['home']){
                   $times = $table['match_info']['matchTime'][$i];
                   $data = explode(':', $times);
                   $hours = $data[0];
                   $mins = $data[1];
                   $date = date("Y-m-d").' '.$hours.':'.$mins.':00';
                   $time = Forecast::getRemainTime($date);
                }
            }
        }
    ?>
</div>
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-main">
                   <div class="container-fluid">
                        <div class="row">
                            <div class="game-block text-center">
                                <div class="info">
                                    <a href="/statistic"><?=$league;?></a>
                                    <h1 class="game-time">• <?=$_GET['home']?> - <?=$_GET['away']?>: <?php setlocale(LC_ALL, 'ru_RU.UTF-8'); echo str_replace("Май", "Мая" ,$date_match = strftime("%A %e %B %Y"))?></h1>
                                </div>
                                <div class="teams-wrapper">
                                    <div class="team">
                                        <span href="#" class="logo" style="background-image: url(<?=$logo['home']?>)"></span>
                                        <span class="team-name"><?=$_GET['home']?></span>
                                    </div>
                                    <div class="center-col">
                                        <div class="remain-time">
                                            <div class="remain-time-txt">до матча</div>
                                            <div class="time"><span><?=$time[0];?></span><div class="txt">час</div></div>
                                            <div class="divider">:</div>
                                            <div class="time"><span><?=$time[1];?></span><div class="txt">мин</div></div>
                                        </div>
                                    </div>
                                    <div class="team">
                                        <span href="#" class="logo" style="background-image: url(<?=$logo['away']?>)"></span>
                                        <span class="team-name"><?=$_GET['away']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                       <div class="container-fluid">
                           <div class="row">
                               <div class="custom-tabs-line tabs-line-bottom">
                                   <ul class="nav news match-forecast" role="tablist">
                                       <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Анализ</a></li>
                                       <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Таблица</a></li>
                                       <li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Новости</a></li>
                                   </ul>
                               </div>
                               <div class="tab-content news">
                                   <div class="tab-pane fade in active" id="tab-bottom-left1">
                                       <div class="container-fluid">
                                           <div class="row">
                                               <h4 class="text-center">Наиболее вероятный исход матча:
                                                   <span class="text-success">
                                                   <?=$result?>
                                               </span>
                                               </h4>
                                           </div>
                                           <br>
                                           <div class="row">
                                               <div class="progress">
                                                   <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$homeVal?>%">
                                                       Победа <?=$_GET['home']?> (<?=$homeVal?>%)
                                                   </div>
                                                   <div class="progress-bar progress-bar-default" role="progressbar" style="width:<?=$awayVal?>%">
                                                       Победа <?=$_GET['away']?> (<?=$awayVal?>%)
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <br>
                                       <div class="container-fluid">
                                           <div class="row">
                                               <div class="table-responsive">
                                                   <table class="table table-bordered table-hover">
                                                       <thead>
                                                       <tr>
                                                           <th>Команда</th>
                                                           <th class="text-center" title="Игр всего">И</th>
                                                           <th class="text-center" title="Игр выиграно">В</th>
                                                           <th class="text-center" title="Ничей">Н</th>
                                                           <th class="text-center" title="Игр проиграно">П</th>
                                                           <th class="text-center" title="Забито мячей">ЗМ</th>
                                                           <th class="text-center" title="Пропущено мячей">ПМ</th>
                                                           <th class="text-center" title="Всего очков">О</th>
                                                           <th class="text-center" title="Очков за последние 5 игр">Форма</th>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       <?php
                                                       foreach ($statistic as $team) {
                                                           echo "<tr>".
                                                               "<td class='logo'><img src='".$team['team_logo']."'>&nbsp;&nbsp;<span class='teams'>".$team['team']."</span></td>".
                                                               "<td class=\"text-center\">".$team['all_games']."</td>".
                                                               "<td class=\"text-center\">".$team['win_games']."</td>".
                                                               "<td class=\"text-center\">".$team['draw_games']."</td>".
                                                               "<td class=\"text-center\">".$team['lose_games']."</td>".
                                                               "<td class=\"text-center sgoals\">".$team['s_goals']."</td>".
                                                               "<td class=\"text-center mgoals\">".$team['m_goals']."</td>".
                                                               "<td class=\"text-center\">".$team['points']."</td>".
                                                               "<td class=\"text-center\">".$team['form_points']."</td></tr>";
                                                       }
                                                       ?>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                           <hr>

                                           <div class="container-fluid">
                                               <div class="row">
                                                   <div class="col-md-4">
                                                       <h3 class="text-center">Вероятность победы</h3>
                                                       <div id="morris1" style="height: 270px;"></div>
                                                   </div>
                                                   <div class="col-md-4">
                                                       <h3 class="text-center">Забито мячей</h3>
                                                       <div id="morris2" style="height: 270px;"></div>
                                                   </div>
                                                   <div class="col-md-4">
                                                       <h3 class="text-center">Пропущено мячей</h3>
                                                       <div id="morris3" style="height: 270px;"></div>
                                                   </div>
                                               </div>
                                           </div>

                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="tab-bottom-left2">
                                       <div class="container-fluid">
                                           <div class="row">
                                               <div class="table-responsive">
                                                   <table class="table table-bordered table-hover">
                                                       <thead>
                                                       <tr>
                                                           <th title="Место">#</th>
                                                           <th class="text-center">Команда</th>
                                                           <th class="text-center" title="Игр всего">И</th>
                                                           <th class="text-center" title="Игр выиграно">В</th>
                                                           <th class="text-center" title="Ничей">Н</th>
                                                           <th class="text-center" title="Игр проиграно">П</th>
                                                           <th class="text-center" title="Забито мячей">ЗМ</th>
                                                           <th class="text-center" title="Пропущено мячей">ПМ</th>
                                                           <th class="text-center" title="Всего очков">О</th>
                                                           <th class="text-center" title="Очков за последние 5 игр">Форма</th>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       <?php
                                                       foreach ($leagueTable as $team) {
                                                           echo "<tr>".
                                                               "<td>".$team['id']."</td>".
                                                               "<td class='logo'>&nbsp;&nbsp;<img src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
                                                               "<td class=\"text-center\">".$team['all_games']."</td>".
                                                               "<td class=\"text-center\">".$team['win_games']."</td>".
                                                               "<td class=\"text-center\">".$team['draw_games']."</td>".
                                                               "<td class=\"text-center\">".$team['lose_games']."</td>".
                                                               "<td class=\"text-center\">".$team['s_goals']."</td>".
                                                               "<td class=\"text-center\">".$team['m_goals']."</td>".
                                                               "<td class=\"text-center\">".$team['points']."</td>".
                                                               "<td class=\"text-center\">".$team['form_points']."</td></tr>";
                                                       }
                                                       ?>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="tab-bottom-left3">
                                       <?=$football_news?>
                                   </div>

                               </div>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="/template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/assets/scripts/klorofil-common.js"></script>


<script>
    $(window).on('load', function () {
        var $preloader = $('#page-preloader'),
            $spinner   = $preloader.find('.spinner');
        $spinner.fadeOut();
        $preloader.delay(350).fadeOut('slow');


        if ($('.time span').text() == '') {
              $('.remain-time').remove();
        }
        $('div.rn_full img').each(function () {
            var href = 'https://www.livesport.ru';
            href += $( this ).attr("src");
            $( this ).attr("src", href);
        });

        $('div.rn_lenta a').each(function () {
            var href = 'https://www.livesport.ru';
            href += $( this ).attr("href");
            $( this ).attr("href", href);
            $( this ).attr("target", "_blank");
        });

        $('div.rn_full a').each(function () {
            var href = 'https://www.livesport.ru';
            href += $( this ).attr("href");
            $( this ).attr("href", href);
            $( this ).attr("target", "_blank");
        });

        $('ul.news li:first').addClass('active');
        $('div.news div:first').addClass('in active');
        $('a.lista, a.list, a.list_r, div.pro30').addClass('hidden');

        if ($(window).width() < 640) {
            $('div.rn_full').addClass('hidden');
        }


        if ($(window).width() < 380) {
            $('div.rn_lenta a').addClass('small_font');
            $('div.panel-profile').addClass('fixedmr');
        } else {
            $('div.rn_lenta a').removeClass('small_font');
            $('div.panel-profile').removeClass('fixedmr');
        }
    });



    //Graph 1

    var homePer = $('p.rate span#1').text();
    var awayPer = $('p.rate span#2').text();
    var homeGoals = $('tr:nth-child(1) td.sgoals').text();
    var awayGoals = $('tr:nth-child(2) td.sgoals').text();
    var homemGoals = $('tr:nth-child(1) td.mgoals').text();
    var awaymGoals = $('tr:nth-child(2) td.mgoals').text();
    var home = $('tr:nth-child(1) span.teams').text();
    var away = $('tr:nth-child(2) span.teams').text();

    //MORRIS DONUT section #1
    Morris.Donut({
        element: 'morris1',
        data: [
            {label: home, value: homePer},
            {label: away, value: awayPer}
        ],
        resize: true,
        formatter: function (y, data) { return y + '%' }
    });
    //MORRIS DONUT section #2
    Morris.Donut({
        element: 'morris2',
        data: [
            {label: home, value: homeGoals},
            {label: away, value: awayGoals}
        ],
        resize: true
    });
    //MORRIS DONUT section #1
    Morris.Donut({
        element: 'morris3',
        data: [
            {label: home, value: homemGoals},
            {label: away, value: awaymGoals}
        ],
        resize: true
    });
</script>
</body>

</html>
