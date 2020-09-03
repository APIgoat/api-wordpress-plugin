<?php

class APIgoatDoc extends APIgoatTemplate
{

    static function getDocs(array $data, array $headers)
    {
        $content = '';
        $menu = '';

        //preprint($data);

        foreach ($data as $row) {

            $menu .= li(href($row['name'], '#' . $row['title']), "class='page_item current_page_item'");
            $content .= div(
                anchor($row['title']) . h3($row['name'])
                    . h2($row['title'], "class='entry-title'")
                    . p($row['type'] . " " . $row['value'])
                    . ((!empty($row['example'])) ? pre(htmlentities($row['example'])) : '')
                    . p(trim($row['text']))
            );
        }

        foreach ($headers as $name => $header) {
            $menu = h3($header) . $menu;
        }


        return div(
            div(
                ul($menu, "class='doc-nav-list'"),
                '',
                "class='wedocs-sidebar wedocs-hide-mobile'"
            ) . div(
                $content,
                '',
                "class='wedocs-single-content'"
            ),
            '',
            "class='wedocs-single-wrap'"
        );
    }
}
