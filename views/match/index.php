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
                           <div class="col-md-4">
                               <h3>Вероятность победы</h3>
                               <div class="ct-chart"></div>
                           </div>
                           <div class="col-md-4">
                               <h3>Забито мячей</h3>
                               <div class="ct-chart-sec"></div>
                           </div>
                           <div class="col-md-4">
                               <h3>Пропущено мячей</h3>
                               <div class="ct-chart-th"></div>
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

    //Graph 1

    var home = $('p.rate span#team1').text();
    var away = $('p.rate span#team2').text();
    var homePer = $('p.rate span#1').text();
    var awayPer = $('p.rate span#2').text();

    if (homePer > awayPer) {
        $('span#1').addClass('text-success');
    } else {
        $('span#2').addClass('text-success');
    }
    //home += ' ('+homePer+'%)';
    //away += ' ('+awayPer+'%)';
    var chart = new Chartist.Pie('.ct-chart', {
        labels: [home, away],
        series: [homePer, awayPer]
    }, {
        donut: true,
        showLabel: true,
        donutWidth: 60
    });

    chart.on('draw', function(data) {
        if(data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();

            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            // Create animation definition while also assigning an ID to the animation for later sync usage
            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1500,
                    from: -pathLength + 'px',
                    to:  '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                    fill: 'freeze'
                }
            };

            // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
            if(data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            // We can't use guided mode as the animations need to rely on setting begin manually
            // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
            data.element.animate(animationDefinition, false);
        }
    });

    // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
    /*chart.on('created', function() {
        if(window.__anim21278907124) {
            clearTimeout(window.__anim21278907124);
            window.__anim21278907124 = null;
        }
        window.__anim21278907124 = setTimeout(chart.update.bind(chart), 30000);
    });*/

    //Graph 2
    var homeGoals = $('tr:nth-child(1) td:eq(8)').text();
    var awayGoals = $('tr:nth-child(2) td:eq(8)').text();
    home = $('tr:nth-child(1) td.teams').text();
    away = $('tr:nth-child(2) td.teams').text();
    var data = {
        labels: [home, away],
        series: [homeGoals, awayGoals]
    };

    options = {
        donut: true,
        donutWidth: 60,
        donutSolid: true,
        showLabel: true
    };

    new Chartist.Pie('.ct-chart-sec', data, options);

    //Graph 3
     homeGoals = $('tr:nth-child(1) td:eq(9)').text();
     awayGoals = $('tr:nth-child(2) td:eq(9)').text();
     console.log(homeGoals+' '+awayGoals);
     data = {
        labels: [home, away],
        series: [homeGoals, awayGoals]
    };

     options = {
         donut: true,
         donutWidth: 60,
         donutSolid: true,
         showLabel: true
    };

     /*responsiveOptions = [
        ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
                return value;
            }
        }],
        ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
        }]
    ];*/

    new Chartist.Pie('.ct-chart-th', data, options);

</script>
</body>

</html>
