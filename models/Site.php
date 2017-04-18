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
}