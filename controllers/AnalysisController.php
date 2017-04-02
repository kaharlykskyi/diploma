<?php

class AnalysisController
{
    public function actionView($sport, $event)
    {
        echo "Sport: $sport <br>";
        echo "Event number: $event";
        return true;
    }
}