<?php

namespace App\Actions;

class Util {
    static function formatCommaToJson ($string) {
        $list = explode(',', $string);

        return json_encode($list);
    }

    public static function formatJsonToComma ($json) {
        $lista = json_decode($json);
        $retorno = "";
        foreach ($lista as $string) {
            $retorno .= $string . ",";
        }

        return substr($retorno, 0, -1);
    }
}