<?php

class Parser
{
    /**
     * Возвращает турнирную таблицу указанной лиги
     * @param $file
     * @return array
     */
    public static function get_stat_table($file)
    {
        require_once (ROOT.'/template/assets/libs/phpQuery.php');
        $doc = phpQuery::newDocument($file);
        $doc = $doc->find('.standings-table tbody');
        $data = array();

        foreach ($doc->find('tr') as $tr) {
            $tr = pq($tr);
            $place = $tr->find('td.place')->text();
            $teamLogo = $tr->find('td.logo img')->attr('src');
            $team = $tr->find('td.text-left a')->text();
            $allGames = trim($tr->find('td:nth-child(4)')->text());
            $winGames = trim($tr->find('td:nth-child(5)')->text());
            $drawGames = trim($tr->find('td:nth-child(6)')->text());
            $loseGames = trim($tr->find('td:nth-child(7)')->text());
            $sGoals = trim($tr->find('td:nth-child(8)')->text());
            $mGoals = trim($tr->find('td:nth-child(9)')->text());
            $points = trim($tr->find('td:nth-child(10)')->text());
            $formPoints = 0;
            foreach ($tr->find('td.form a span') as $form) {
                $form = pq($form);
                if ($form->hasClass('win')) {
                    $formPoints += 3;
                }
                if ($form->hasClass('draw')) {
                    $formPoints += 1;
                }
            }

            $data[] = array(
                'team' => $team,
                'place' => $place,
                'teamLogo' => $teamLogo,
                'allGames' => $allGames,
                'winGames' => $winGames,
                'drawGames' => $drawGames,
                'loseGames' => $loseGames,
                'sGoals' => $sGoals,
                'mGoals' => $mGoals,
                'points' => $points,
                'formPoints' => $formPoints
            );
        }
        return $data;
    }

    /**
     * Парсит список матчей на сегодня и возвращает массив с данными о матчах
     * @param $file
     * @return array
     */
    public static function get_today_match_data($file)
    {
        require_once (ROOT.'/template/assets/libs/phpQuery.php');
        $doc = phpQuery::newDocument($file);

        $data = array();
        foreach ($doc->find('.calendar-table') as $leagueTable) {
            $leagueTable = pq($leagueTable);
            $leagueTable->find('.tv-channel, .bet-td')->remove();
            $leagueTable->html();
            $leagueName = $leagueTable->find('thead tr th a')->text();
            $leagueName = trim($leagueName);
            $awayTeam = array();
            $matchTime = array();
            $homeTeam = array();
            $homeTeamLogo = array();
            $awayTeamLogo = array();
            foreach ($leagueTable->find('tbody tr') as $tr) {
                $tr = pq($tr);
                $matchDate[] = $tr->find('td.date')->text();
                $homeTeam[] = $tr->find('td:nth-child(2) a')->text();
                $homeTeamLogo[] = $tr->find('td:nth-child(3) a img')->attr('src');
                $matchTime[] = $tr->find('td:nth-child(4) a')->text();
                $awayTeamLogo[] = $tr->find('td:nth-child(5) a img')->attr('src');
                $awayTeam[] = $tr->find('td:nth-child(6) a')->text();
            }

            $data[] = array(
                'leagueName' => $leagueName,
                'homeTeam' => $homeTeam,
                'homeTeamLogo' => $homeTeamLogo,
                'matchTime' => $matchTime,
                'awayTeamLogo' => $awayTeamLogo,
                'awayTeam' => $awayTeam,
            );
        }

        return $data;
    }

    private static function insert_data($leagueName, $matchInfo)
    {
        $db = Db::getConnection();
        $date = date("d.m.y");
        $sql = "INSERT INTO matches(league_name, match_info, date) VALUES(:league_name, :match_info, :date)";
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $result = $db->prepare($sql);
        $result->bindParam(':league_name', $leagueName, PDO::PARAM_STR);
        $result->bindParam(':match_info', $matchInfo, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $res = $result->execute();
        if (!$res) {
            $res = $db->errorInfo();
        }
        return $res;
    }

    public static function insert_match_data($data)
    {
        $db = Db::getConnection();
        $date = date("d.m.y");
        $db->query("DELETE FROM matches WHERE date = '$date'");
        foreach ($data as $tables => $info) {
            $leagueName = array_shift($info);
            $matchInfo = serialize($info);
            $res = self::insert_data($leagueName, $matchInfo);
        }
        return $res;
    }

    /**
     * Метод удаляем существующую таблицу с статистиков лиги и создает новую таблицу
     * @param $league
     * @return bool
     */
    private static function drop_stat_table($league)
    {
        $db = Db::getConnection();
        $db->query("DROP TABLE IF EXISTS $league;");
        $db->query("CREATE TABLE $league (id INT(11) PRIMARY KEY, team VARCHAR(255), team_logo VARCHAR(255), all_games INT, win_games INT, draw_games INT, lose_games INT, s_goals INT, m_goals INT, points INT, form_points INT, date VARCHAR(55));");
        return true;
    }

    /**
     * Вставляет новую статистику выбранной лиги
     * @param $table
     * @param $league
     * @return bool
     */
    public static function insert_stat_table($table, $league)
    {
        self::drop_stat_table($league); //вызываем метод удаления старой таблицы и создание новой
        foreach ($table as $tables => $info) {
            $db = Db::getConnection();
            $date = date("d.m.y H:i:s");
            $sql = "INSERT INTO $league VALUES(:id, :team, :teamLogo, :allGames, :winGames, :drawGames, :loseGames, :sGoals, :mGoals, :points, :formPoints, :date)";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $info['place'], PDO::PARAM_INT);
            $result->bindParam(':team', $info['team'], PDO::PARAM_STR);
            $result->bindParam(':teamLogo', $info['teamLogo'], PDO::PARAM_STR);
            $result->bindParam(':allGames', $info['allGames'], PDO::PARAM_INT);
            $result->bindParam(':winGames', $info['winGames'], PDO::PARAM_INT);
            $result->bindParam(':drawGames', $info['drawGames'], PDO::PARAM_INT);
            $result->bindParam(':loseGames', $info['loseGames'], PDO::PARAM_INT);
            $result->bindParam(':sGoals', $info['sGoals'], PDO::PARAM_INT);
            $result->bindParam(':mGoals', $info['mGoals'], PDO::PARAM_INT);
            $result->bindParam(':points', $info['points'], PDO::PARAM_INT);
            $result->bindParam(':formPoints', $info['formPoints'], PDO::PARAM_INT);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->execute();
        }
        return true;
    }


}