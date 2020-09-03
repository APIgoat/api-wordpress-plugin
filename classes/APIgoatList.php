<?php

class APIgoatList
{

    static function init($atts, $content = null)
    {
        $APIgoatFetchAPI = new APIgoatFetchAPI();
        $Behaviors = $APIgoatFetchAPI->fetchBehaviors();
        /*if (isset($Behaviors['debug'])) {
            echo "<br>" . preprint($Behaviors['debug']) . "<br>";
        }

        if (isset($Behaviors['messages'])) {
            echo "<br>" . preprint($Behaviors['messages']) . "<br>";
        }*/
        if ($Behaviors['data']) {
            $table = APIgoatDoc::getDocs($Behaviors['data'], ['Code' => 'Parameters']);

            return $content . div($table, '', "class='site-main'");
        } else {
            return $content . "<br>Error" . preprint($Behaviors);
        }
    }
}
