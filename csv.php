<?php
    function parseBoards() {
        if (($file = fopen(__DIR__."/data/boards.csv", "r")) === FALSE) {
            return NULL;
        }

        $aux = [];
        while (($line = fgetcsv($file)) !== FALSE) {
            $aux[$line[0]] = array_slice($line, 1);
        }

        return $aux;
    }

    function storeBoard(ArrayObject $board) {

    }

?>