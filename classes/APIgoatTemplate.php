<?php

include_once plugin_dir_path(dirname(__FILE__)) . 'includes/html_helper.php';

class APIgoatTemplate
{

    public function __construct()
    {
    }

    public function getTable(array $data, array $headers = null, array $classes = null)
    {
        $rows = '';
        $cols = '';
        $header = '';
        $th = '';

        foreach ($data as $row) {
            if (is_array($row)) {
                $header = '';
                foreach ($row as $name => $field) {
                    if ($headers == null || in_array($name, $headers)) {
                        $cols .= td($field);
                    }
                }
                $rows .= tr($cols);
                $cols = '';
            } else {
                $rows .= tr(td($row));
            }
        }

        foreach ($headers as $name => $header) {
            $th .= th($header);
        }


        return table(
            thead($th) . tbody($rows),
            "class='" . $classes['table'] . "'"
        );
    }
}
