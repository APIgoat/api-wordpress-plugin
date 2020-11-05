<?php

class APIgoatDoc extends APIgoatTemplate
{

    static function getDocs(array $data, array $headers)
    {
        $content = '';
        $menu = '';

        //preprint($data);

        foreach ($data as $row) {

            $menu .= li(href($row['name'], '#' . $row['title']), "class='page_item wd-state-closed'");
            $content .= div(
                anchor($row['title'])
                    . h2($row['title'], "class='entry-title'")
                    . h3($row['name'])
                    . span($row['type'] . " " . $row['value'])
                    . p(trim($row['text']))
                    . ((!empty($row['example'])) ? div(span("Example:") . pre(htmlentities($row['example']))) : ''),
                "",
                "class='doc-item'"
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
