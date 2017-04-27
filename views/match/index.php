<?php include_once(ROOT."/views/layouts/header.php"); ?>
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-main">
                   <div class="container full-width">
                       <h2>Тестовая инфа</h2>
                       <hr>
                       <p class="home"><b>Домашняя команда: </b><span><?=$_GET['home']?></span></p>
                       <p class="away"><b>Гостевая команда: </b><span><?=$_GET['away']?></span></p>
                       <p><b>Лига: </b><?=$league;?></p>
                       <p><b>Рейтинг: </b><br><?php
                           foreach ($forecast as $team => $val) {
                               echo $team.' '.$val['rating'].'<br>';
                           }
                           ?></p>
                       <p class="rate"><b>Шанс: </b><br><?php
                           $i = 0;
                           foreach ($forecast as $team => $val) {
                               $i++;
                               echo "<span id='team".$i."'>".$team.'</span> '."<span id='".$i."'>".$val['victory_chance'].'</span> %<br>';
                           }
                           ?></p>
                       <div class="table-responsive">
                           <table class="table table-bordered">
                               <thead>
                               <tr>
                                   <th>№</th>
                                   <th>Команда</th>
                                   <th>И</th>
                                   <th>В</th>
                                   <th>Н</th>
                                   <th>П</th>
                                   <th>ЗМ</th>
                                   <th>ПМ</th>
                                   <th>О</th>
                                   <th>Форма</th>
                               </tr>
                               </thead>
                               <tbody>
                               <?php
                               foreach ($statistic as $team) {
                                    echo "<tr><td>".$team['id']."</td>".
                                        "<td class='teams'><img src='".$team['team_logo']."'>".'  '.$team['team']."</td>".
                                        "<td>".$team['all_games']."</td>".
                                        "<td>".$team['win_games']."</td>".
                                        "<td>".$team['draw_games']."</td>".
                                        "<td>".$team['lose_games']."</td>".
                                        "<td>".$team['s_goals']."</td>".
                                        "<td>".$team['m_goals']."</td>".
                                        "<td>".$team['points']."</td>".
                                        "<td>".$team['form_points']."</td></tr>";
                               }
                               ?>
                               </tbody>
                           </table>
                       </div>
                       <div class="container">
                           <div class="row">
                               <div class="col-md-4">
                                   <h3>Вероятность победы</h3>
                                   <div id="morris1" style="height: 250px;"></div>
                               </div>
                               <div class="col-md-4">
                                   <h3>Забито мячей</h3>
                                   <div id="morris2" style="height: 250px;"></div>
                               </div>
                               <div class="col-md-4">
                                   <h3>Пропущено мячей</h3>
                                   <div id="morris3" style="height: 250px;"></div>
                               </div>
                           </div>
                       </div>


                       <!--<p>Дебаг: </p>
                        <pre>
                            <?php /*//print_r($forecast) */?>
                        </pre>-->

<!--                       <img class="img-responsive" src="/template/assets/img/match_bg.jpg" alt="logo" height="300">-->
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

<script>
    $(window).on('load', function () {
        var $preloader = $('#page-preloader'),
            $spinner   = $preloader.find('.spinner');
        $spinner.fadeOut();
        $preloader.delay(350).fadeOut('slow');
    });

    //Graph 1

    //var home = $('p.rate span#team1').text();
    //var away = $('p.rate span#team2').text();
    var homePer = $('p.rate span#1').text();
    var awayPer = $('p.rate span#2').text();
    var homeGoals = $('tr:nth-child(1) td:eq(6)').text();
    var awayGoals = $('tr:nth-child(2) td:eq(6)').text();
    var homemGoals = $('tr:nth-child(1) td:eq(7)').text();
    var awaymGoals = $('tr:nth-child(2) td:eq(7)').text();
    var home = $('tr:nth-child(1) td.teams').text();
    var away = $('tr:nth-child(2) td.teams').text();

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
