<?php

class Statistic
{
    /**
     * Возвращает таблицу бомбардиров указанной лиги
     * @param $league_name
     * @return array
     */
    public static function getScorersTableByLeagueName($league_name)
    {
        $table_name = '';
        switch ($league_name) {
            case "Англия":
                $table_name = 'scorers_england';
                break;
            case "Испания":
                $table_name = 'scorers_spain';
                break;
            case "Италия":
                $table_name = 'scorers_italy';
                break;
            case "Германия":
                $table_name = 'scorers_germany';
                break;
            case "Украина":
                $table_name = 'scorers_ukraine';
                break;
        }

        $db = Db::getConnection();
        $sql = "SELECT * FROM $table_name LIMIT 20";
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $scorers_table = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $scorers_table[$i]['id'] = $row['id'];
            $scorers_table[$i]['playerLogo'] = $row['playerLogo'];
            $scorers_table[$i]['playerName'] = $row['playerName'];
            $scorers_table[$i]['playerTeam'] = $row['playerTeam'];
            $scorers_table[$i]['goals'] = $row['goals'];
            $scorers_table[$i]['penalties'] = $row['penalties'];
            $scorers_table[$i]['games'] = $row['games'];
            $i++;
        }
        return $scorers_table;
    }
}