<?php

namespace App\Utils;

class Formatters {
    public static function format_title( $title = NULL ) {
        $formatted = [ 'ultradashboard' ];
        if ( !empty( $title ) ) {
            $formatted[] = $title;
        }
        return $formatted;
    }
}