<?php

class Site
{
    /**
     * Возвращает div с прогнозами
     * @param $file
     * @return phpQueryObject
     */
    public static function getMatchTable($file)
    {
        require_once (ROOT.'/template/assets/libs/phpQuery.php');
        $doc = phpQuery::newDocument($file);
        $doc = pq($doc);
        $matchTable = $doc->find(".calendar-table");
        return $matchTable;
    }

    /**
     * Возвращает div с новостями
     * @param $file
     * @return phpQueryObject
     */
    public static function getNews($file)
    {
        require_once (ROOT.'/template/assets/libs/phpQuery.php');
        $doc = phpQuery::newDocument($file);
        $news = $doc->find('div.col-left1');
        $news = @iconv('Windows-1251', 'UTF-8//TRANSLIT//IGNORE', $news);
        return $news;
    }

    /**
     * Возвращает массив данных о матчах нужных лиг (за сегодня) с БД
     * @return array
     */
    public static function get_match_info()
    {
        $db = Db::getConnection();
        $date = date("d.m.y");
        $sql = "SELECT id, league_name, match_info FROM sport_db.matches WHERE (league_name LIKE 'Франция%' ".
            "OR league_name LIKE 'Германия%' ".
            "OR league_name LIKE 'Украина%' ".
            "OR league_name LIKE 'Англия%' ".
            "OR league_name LIKE 'Испания%' ".
            "OR league_name LIKE 'Италия%')".
            "AND date = :date;";
        $result = $db->prepare($sql);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $match_info = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $match_info[$i]['id'] = $row['id'];
            $match_info[$i]['league_name'] = $row['league_name'];
            $match_info[$i]['match_info'] = unserialize($row['match_info']);
            $i++;
        }
        return $match_info;
    }

}