<?php
    function parseBoards() {
        if (($file = fopen(__DIR__."/data/boards.csv", "r")) === FALSE) {
            return NULL;
        }

        $ret = [];
        while (($line = fgetcsv($file)) !== FALSE) {
            $name = $line[0];
            $desc = $line[1];
            $cols = [];
            $cols["todo"] = $line[2];
            $cols["progress"] = $line[3];
            $cols["test"] = $line[4];
            $cols["done"] = $line[5];
            foreach ($cols as $col => $tasks) {
                $cols[$col] = [];
                foreach (explode(",", $tasks) as $task) {
                    if ($task !== "") {
                        $aux = explode("|", $task);
                        $cols[$col][$aux[0]] = $aux[1];
                    }
                }
            }
            $ret[$name] = ["desc" => $desc, "cols" => $cols];
        }

        return $ret;
    }

    function storeBoards($boards) {
        if (($file = fopen(__DIR__."/data/boards.csv", "w")) === FALSE) {
            return NULL;
        }

        foreach ($boards as $name => $attrs) { // TODO: Change the way of saving boards
            fputcsv($file, array_merge([$name], $attrs));
        }
    }

    function storeNewBoard($name, $description, $boards) {
        if ($boards === NULL || array_key_exists($name, $boards))
            return FALSE;
        
        $boards[$name] = [$description];

        storeBoards($boards);
        return TRUE;
    }

    function removeBoard($name, $boards) {
        if ($boards === NULL || !array_key_exists($name, $boards))
            return FALSE;

        unset($boards[$name]);

        storeBoards($boards);
        return TRUE;
    }

?>

