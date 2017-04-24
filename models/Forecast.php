<?php

class Forecast
{
    public static function getLeagueNameById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT league_name, match_info FROM matches WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $match_info = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $match_info[$i]['league_name'] = $row['league_name'];
            $match_info[$i]['match_info'] = unserialize($row['match_info']);
            $i++;
        }
        return $match_info;
    }

    public static function getStatTableByLeagueName($league_name, $home, $away)
    {
        $table_name = '';
        switch ($league_name) {
            case "Англия":
                $table_name = 'england';
                break;
            case "Испания":
                $table_name = 'spain';
                break;
            case "Италия":
                $table_name = 'italy';
                break;
            case "Франция":
                $table_name = 'france';
                break;
            case "Германия":
                $table_name = 'germany';
                break;
            case "Украина":
                $table_name = 'ukraine';
                break;
        }

        $db = Db::getConnection();
        $sql = "SELECT * FROM $table_name WHERE team = :home OR team = :away";
        $result = $db->prepare($sql);
        $result->bindParam(':home', $home, PDO::PARAM_STR);
        $result->bindParam(':away', $away, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $statistic = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $statistic[$i]['id'] = $row['id'];
            $statistic[$i]['team'] = $row['team'];
            $statistic[$i]['team_logo'] = $row['team_logo'];
            $statistic[$i]['all_games'] = $row['all_games'];
            $statistic[$i]['win_games'] = $row['win_games'];
            $statistic[$i]['draw_games'] = $row['draw_games'];
            $statistic[$i]['lose_games'] = $row['lose_games'];
            $statistic[$i]['s_goals'] = $row['s_goals'];
            $statistic[$i]['m_goals'] = $row['m_goals'];
            $statistic[$i]['points'] = $row['points'];
            $statistic[$i]['form_points'] = $row['form_points'];
            $i++;
        }
        return $statistic;
    }
}