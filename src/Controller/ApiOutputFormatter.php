<?php

namespace App\Controller;

class ApiOutputFormatter {
    static public function message( string $message = 'error', array $data = [] ) {
        $data[ 'message' ] = $message;
        return $data;
    }

    static public function die() {
        die( `
        <h1>On aime la 8.6 !</h1>
        <img src = 'https://media.carrefour.fr/medias/9a0b53c14f5d3bb5a79939df4ba885d5/p_1500x1500/08714800038669-c1n1-s05.jpg' />
        ` );
    }
}