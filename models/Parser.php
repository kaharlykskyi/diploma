<?php

class Parser
{
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
            $leagueName = $leagueTable->find('thead tr th')->html();
            $leagueName = trim($leagueName);
            $awayTeam = array();
            $matchDate = array();
            $homeTeam = array();
            $homeTeamLogo = array();
            $awayTeamLogo = array();
            foreach ($leagueTable->find('tbody tr') as $tr) {
                $tr = pq($tr);
                $matchDate[] = $tr->find('td.date')->text();
                $homeTeam[] = $tr->find('td:nth-child(2) a')->text();
                $homeTeamLogo[] = $tr->find('td:nth-child(3) a img')->attr('src');
                $awayTeamLogo[] = $tr->find('td:nth-child(5) a img')->attr('src');
                $awayTeam[] = $tr->find('td:nth-child(6) a')->text();
            }

            $data[] = array(
                'leagueName' => $leagueName,
                'homeTeam' => $homeTeam,
                'homeTeamLogo' => $homeTeamLogo,
                'awayTeamLogo' => $awayTeamLogo,
                'awayTeam' => $awayTeam,
            );
        }

        return $data;
    }

    private static function insert_data($leagueName, $matchInfo)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO matches(league_name, match_info, date) VALUES(:league_name, :match_info, :date)";
        $date = date("d.m.y");
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
        foreach ($data as $tables => $info) {
            $leagueName = array_shift($info);
            $matchInfo = serialize($info);
            $res = self::insert_data($leagueName, $matchInfo);
        }
        return $res;
    }


}