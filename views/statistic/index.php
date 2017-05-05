<?php include_once(ROOT."/views/layouts/header.php"); ?>
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="custom-tabs-line tabs-line-bottom statistic-tabs">
                                <ul class="nav news match-forecast" role="tablist">
                                    <li class="active"><a href="#england" role="tab" data-toggle="tab">Англия</a></li>
                                    <li><a href="#ukraine" role="tab" data-toggle="tab">Украина</a></li>
                                    <li><a href="#spain" role="tab" data-toggle="tab">Испания</a></li>
                                    <li><a href="#italy" role="tab" data-toggle="tab">Италия</a></li>
                                    <li><a href="#germany" role="tab" data-toggle="tab">Германия</a></li>
                                    <li><a href="#france" role="tab" data-toggle="tab">Франция</a></li>
                                    <li><a href="#turkey" role="tab" data-toggle="tab">Турция</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content news">
                        <div class="tab-pane fade in active" id="england">
                            <div class="profile-left main-page">
                                <div class="row">
                                    <h3 class='stat-text'><b>Турнирная таблица Англия</b></h3>
                                    <hr>
                                    <div class="stat-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
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
                                                foreach ($leagueTableEngland as $team) {
                                                    echo "<tr>".
                                                        "<td>".$team['id']."</td>".
                                                        "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page">
                                <div class="row">
                                    <h3 class="scorers"><b>Бомдардиры Англия</b></h3>
                                    <hr>
                                    <div class="scorers-table">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered players table-striped">
                                                <thead>
                                                <tr>
                                                    <th colspan='2' title="Игрок">Игрок</th>
                                                    <th class="text-center">Команда</th>
                                                    <th class="text-center" title="Голы">Г</th>
                                                    <th class="text-center" title="Пенальти">П</th>
                                                    <th class="text-center" title="Игры">И</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    foreach ($scorersTableEngland as $team) {
                                                        echo "<tr>".
                                                            "<td>".$team['id']."</td>".
                                                            "<td>&nbsp;&nbsp;<img class='player-ava' src='".$team['playerLogo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['playerName']."</td>".
                                                            "<td class=\"text-center\">".$team['playerTeam']."</td>".
                                                            "<td class=\"text-center\">".$team['goals']."</td>".
                                                            "<td class=\"text-center\">".$team['penalties']."</td>".
                                                            "<td class=\"text-center\">".$team['games']."</td></tr>";
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ukraine">
                            <div class="profile-left main-page">
                                <div class="row">
                                <h3 class='stat-text'><b>Турнирная таблица Украина</b></h3>
                                <hr>
                                <div class="stat-table">
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
                                            foreach ($leagueTableUkraine as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page">
                                <div class="row">
                                <h3 class='scorers'><b>Бомдардиры Украина</b></h3>
                                <hr>
                                <div class="scorers-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover players table-striped">
                                            <thead>
                                            <tr>
                                                <th colspan='2' title="Игрок">Игрок</th>
                                                <th class="text-center">Команда</th>
                                                <th class="text-center" title="Голы">Г</th>
                                                <th class="text-center" title="Пенальти">П</th>
                                                <th class="text-center" title="Игры">И</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($scorersTableUkraine as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='player-ava' src='".$team['playerLogo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['playerName']."</td>".
                                                    "<td class=\"text-center\">".$team['playerTeam']."</td>".
                                                    "<td class=\"text-center\">".$team['goals']."</td>".
                                                    "<td class=\"text-center\">".$team['penalties']."</td>".
                                                    "<td class=\"text-center\">".$team['games']."</td></tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="spain">
                            <div class="profile-left main-page">
                                <div class="row">
                                <h3 class='stat-text'><b>Турнирная таблица Испания</b></h3>
                                <hr>
                                <div class="stat-table">
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
                                            foreach ($leagueTableSpain as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page">
                                <div class="row">
                                <h3 class='scorers'><b>Бомдардиры Испания</b></h3>
                                <hr>
                                <div class="scorers-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered players table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th colspan='2' title="Игрок">Игрок</th>
                                                <th class="text-center">Команда</th>
                                                <th class="text-center" title="Голы">Г</th>
                                                <th class="text-center" title="Пенальти">П</th>
                                                <th class="text-center" title="Игры">И</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($scorersTableSpain as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='player-ava' src='".$team['playerLogo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['playerName']."</td>".
                                                    "<td class=\"text-center\">".$team['playerTeam']."</td>".
                                                    "<td class=\"text-center\">".$team['goals']."</td>".
                                                    "<td class=\"text-center\">".$team['penalties']."</td>".
                                                    "<td class=\"text-center\">".$team['games']."</td></tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="italy">
                            <div class="profile-left main-page">
                                <div class="row">
                                <h3 class='stat-text'><b>Турнирная таблица Италия</b></h3>
                                <hr>
                                <div class="stat-table">
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
                                            foreach ($leagueTableItaly as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page">
                                <div class="row">
                                <h3 class='scorers'><b>Бомдардиры Италия</b></h3>
                                <hr>
                                <div class="scorers-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover players table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th colspan='2' title="Игрок">Игрок</th>
                                                <th class="text-center">Команда</th>
                                                <th class="text-center" title="Голы">Г</th>
                                                <th class="text-center" title="Пенальти">П</th>
                                                <th class="text-center" title="Игры">И</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($scorersTableItaly as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='player-ava' src='".$team['playerLogo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['playerName']."</td>".
                                                    "<td class=\"text-center\">".$team['playerTeam']."</td>".
                                                    "<td class=\"text-center\">".$team['goals']."</td>".
                                                    "<td class=\"text-center\">".$team['penalties']."</td>".
                                                    "<td class=\"text-center\">".$team['games']."</td></tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="germany">
                            <div class="profile-left main-page">
                                <div class="row">
                                <h3 class='stat-text'><b>Турнирная таблица Германия</b></h3>
                                <hr>
                                <div class="stat-table">
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
                                            foreach ($leagueTableGermany as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page">
                                <div class="row">
                                <h3 class='scorers'><b>Бомдардиры Германия</b></h3>
                                <hr>
                                <div class="scorers-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover players table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th colspan='2' title="Игрок">Игрок</th>
                                                <th class="text-center">Команда</th>
                                                <th class="text-center" title="Голы">Г</th>
                                                <th class="text-center" title="Пенальти">П</th>
                                                <th class="text-center" title="Игры">И</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($scorersTableGermany as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='player-ava' src='".$team['playerLogo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['playerName']."</td>".
                                                    "<td class=\"text-center\">".$team['playerTeam']."</td>".
                                                    "<td class=\"text-center\">".$team['goals']."</td>".
                                                    "<td class=\"text-center\">".$team['penalties']."</td>".
                                                    "<td class=\"text-center\">".$team['games']."</td></tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="france">
                            <div class="profile-left main-page">
                                <div class="row">
                                <h3 class='stat-text'><b>Турнирная таблица Франция</b></h3>
                                <hr>
                                <div class="stat-table">
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
                                            foreach ($leagueTableFrance as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page"></div>
                        </div>
                        <div class="tab-pane fade" id="turkey">
                            <div class="profile-left main-page">
                                <div class="row">
                                <h3 class='stat-text'><b>Турнирная таблица Турция</b></h3>
                                <hr>
                                <div class="stat-table">
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
                                            foreach ($leagueTableTurkey as $team) {
                                                echo "<tr>".
                                                    "<td>".$team['id']."</td>".
                                                    "<td>&nbsp;&nbsp;<img class='team-logo' src='".$team['team_logo']."'>&nbsp;&nbsp;&nbsp;&nbsp;".$team['team']."</td>".
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
                            <div class="profile-right main-page">
                                <?php
                                    /*$hello = 'Hello!';
                                    for ($i = 0; $i <= strlen($hello); $i++)
                                    {
                                        echo substr($hello, $i, 1);
                                    }*/

                                ?>
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
