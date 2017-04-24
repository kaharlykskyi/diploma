<?php

class Forecast
{
    /**
     * Возвращает название и данные о лиге по ее id
     * @param $id
     * @return array
     */
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

    /**
     * Возвращает статистические данные для указанных команд в их лиге
     * @param $league_name
     * @param $home
     * @param $away
     * @return array
     */
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

    /**
     * Возвращает прогноз на матч
     * @param $statistic
     * @return array
     */
    public static function getForecast($statistic, $home, $away)
    {
        //фактор домашнеей арены
        $home_stadium_ft = 0;
        $home_stadium_st = 0;

        //массив весовых коеф.
        $weight = [6,8,7,7,7,6,6];

        //относительный показатель по параметру "место в тур. таблице" (дестимулятор)
        $tbp_ft = $weight[0] * (1 - ($statistic[0]['id'])/($statistic[0]['id'] + $statistic[1]['id']));
        $tbp_st = $weight[0] * (1 - ($statistic[1]['id'])/($statistic[0]['id'] + $statistic[1]['id']));

        //относительный показатель по параметру "всего набрано очков"
        $points_ft = $weight[1] * ($statistic[0]['points'])/($statistic[0]['points'] + $statistic[1]['points']);
        $points_st = $weight[1] * ($statistic[1]['points'])/($statistic[0]['points'] + $statistic[1]['points']);

        //относительный показатель по параметру "кол. забитых мячей"
        $sgoals_ft = $weight[2] * ($statistic[0]['s_goals'])/($statistic[0]['s_goals'] + $statistic[1]['s_goals']);
        $sgoals_st = $weight[2] * ($statistic[1]['s_goals'])/($statistic[0]['s_goals'] + $statistic[1]['s_goals']);

        //относительный показатель по параметру "кол. пропущеных мячей" (дестимулятор)
        $mgoals_ft = $weight[3] * (1 - ($statistic[0]['m_goals'])/($statistic[0]['m_goals'] + $statistic[1]['m_goals']));
        $mgoals_st = $weight[3] * (1 - ($statistic[1]['m_goals'])/($statistic[0]['m_goals'] + $statistic[1]['m_goals']));

        //относительный показатель по параметру "форма команды"
        $form_ft = $weight[4] * ($statistic[0]['form_points'])/($statistic[0]['form_points'] + $statistic[1]['form_points']);
        $form_st = $weight[4] * ($statistic[1]['form_points'])/($statistic[0]['form_points'] + $statistic[1]['form_points']);

        //относительный показатель по параметру "среднее кол. голов за игру"
        $avggoals_ft = $weight[5] * ($sgoals_ft / $statistic[0]['all_games'])/($sgoals_ft / $statistic[0]['all_games'] + $sgoals_st / $statistic[1]['all_games']);
        $avggoals_st = $weight[5] * ($sgoals_st / $statistic[1]['all_games'])/($sgoals_ft / $statistic[0]['all_games'] + $sgoals_st / $statistic[1]['all_games']);

        //относительный показатель по параметру "всего выиграно встреч"
        $wins_ft = $weight[6] * ($statistic[0]['win_games'])/($statistic[0]['win_games'] + $statistic[1]['win_games']);
        $wins_st = $weight[6] * ($statistic[1]['win_games'])/($statistic[0]['win_games'] + $statistic[1]['win_games']);

        if ($statistic[0]['team'] === $home) {
            if ($statistic[0]['team'] <= 5) {
                $home_stadium_ft = 5;
            }
            $home_stadium_ft = 3;
        }
        if ($statistic[1]['team'] === $home) {
            if ($statistic[1]['team'] <= 5) {
                $home_stadium_st = 5;
            }
            $home_stadium_st = 3;
        }

        $rating_ft = $tbp_ft + $points_ft + $sgoals_ft + $mgoals_ft + $form_ft + $avggoals_ft + $wins_ft + $home_stadium_ft;
        $rating_st = $tbp_st + $points_st + $sgoals_st + $mgoals_st + $form_st + $avggoals_st + $wins_st + $home_stadium_st;

        $victory_chance_ft = ($rating_ft / ($rating_ft + $rating_st)) * 100;
        $victory_chance_st = 100 - $victory_chance_ft;

        return $data = array(
            $statistic[0]['team'] => [
                'place' => round($tbp_ft, 2),
                'points' => round($points_ft, 2),
                's_goals' => round($sgoals_ft, 2),
                'm_goals' => round($mgoals_ft, 2),
                'form' => round($form_ft, 2),
                'avggoals' => round($avggoals_ft, 2),
                'wins' => round($wins_ft, 2),
                'home_arena' => $home_stadium_ft,
                'rating' => round($rating_ft, 2),
                'stadium' => $home_stadium_ft,
                'victory_chance' => round($victory_chance_ft, 2)
            ],
            $statistic[1]['team'] => [
                'place' => round($tbp_st, 2),
                'points' => round($points_st, 2),
                's_goals' => round($sgoals_st, 2),
                'm_goals' => round($mgoals_st, 2),
                'form' => round($form_st, 2),
                'avggoals' => round($avggoals_st, 2),
                'wins' => round($wins_st, 2),
                'home_arena' => $home_stadium_st,
                'rating' => round($rating_st, 2),
                'stadium' => $home_stadium_st,
                'victory_chance' => round($victory_chance_st, 2)
            ]
        );
    }
}