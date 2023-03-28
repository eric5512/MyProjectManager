<?php 
    class Task {
        public String $name;
        public String $desc;

        public function __construct(String $name, String $desc) {
            $this->name = $name;
            $this->desc = $desc;
        }
    }

    class Tasks extends \ArrayObject {
        public function offsetSet($key, $val) {
            if ($val instanceof Task) {
                return parent::offsetSet($key, $val);
            }
            throw new \InvalidArgumentException('Value must be a Task');
        }
    }
    

    class Board {
        const FILE_NAME = "./data.ser";
        public String $name;
        public String $desc;
        public Tasks $todo;
        public Tasks $progress;
        public Tasks $test;
        public Tasks $done;

        public function __construct(String $name, String $desc = "") {
            $this->name = $name;
            $this->desc = $desc;
            $this->todo = new Tasks();
            $this->progress = new Tasks();
            $this->test = new Tasks();
            $this->done = new Tasks();

        }

        static public function storeBoards(array $boards) {
            $file = fopen(self::FILE_NAME, "w");

            if ($file === false) {
                throw new \Exception("Cannot open file " . self::FILE_NAME);
            }

            $acc = "";
            
            foreach ($boards as $board) {
                if ($board instanceof Board) {
                    $acc += serialize($board) + "\n";
                } else {
                    throw new \InvalidArgumentException('Value must be a Board');
                }
            }

            fwrite($file, $acc);
            fclose($file);
        }

        static public function loadBoards() {
            $file = fopen(self::FILE_NAME, "r");

            if ($file === false) {
                throw new \Exception("Cannot open file " . self::FILE_NAME);
            }
            
            $data = explode("", fread($file, filesize(self::FILE_NAME)));
            $boards = [];

            foreach ($data as $board) {
                if ($board !== "") {
                    array_push($boards, unserialize($board));
                }
            }

            fclose($file);
        }

    }
    
?>