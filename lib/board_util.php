<?php 
    class Task {
        public String $name;
        public String $desc;

        public function __construct(String $name, String $desc) {
            $this->name = $name;
            $this->desc = $desc;
        }
    }

    class TaskArray extends \ArrayObject {
        public function offsetSet($key, $val): void {
            if ($val instanceof Task) {
                parent::offsetSet($key, $val);
            } else {
                throw new \InvalidArgumentException('Value must be a Task. Found ' . get_class($val));
            }
        }

        public function push(Task $task): TaskArray {
            $this[$task->name] = $task;

            return $this;
        }

        public function remove(String $name): TaskArray {
            if ($this->offsetExists($name)) {
                unset($this[$name]);
            }

            return $this;
        }
    }
    

    class Board {
        public String $name;
        public String $desc;
        public TaskArray $todo;
        public TaskArray $progress;
        public TaskArray $test;
        public TaskArray $done;

        public function __construct(String $name, String $desc = "") {
            $this->name = $name;
            $this->desc = $desc;
            $this->todo = new TaskArray();
            $this->progress = new TaskArray();
            $this->test = new TaskArray();
            $this->done = new TaskArray();

        }

        public function findTaskCol(string $name): ?string {
            if ($this->todo->offsetExists($name)) {
                return "todo";
            } elseif ($this->progress->offsetExists($name)) {
                return "progress";
            } elseif ($this->test->offsetExists($name)) {
                return "test";
            } elseif ($this->done->offsetExists($name)) {
                return "done";
            } else {
                return null;
            }
        }

    }
    
    class BoardArray extends \ArrayObject {
        const FILE_NAME = __DIR__."/../data/data.ser";
        public function offsetSet($key, $val): void {
            if ($val instanceof Board) {
                parent::offsetSet($key, $val);
            } else {
                throw new \InvalidArgumentException('Value must be a Board. Found ' . get_class($val));
            }
        }

        public function push(Board $board): BoardArray {
            $this[$board->name] = $board;

            return $this;
        }
        
        public function storeBoards() {
            $file = fopen(self::FILE_NAME, "w");

            if ($file === false) {
                throw new \Exception("Cannot open file " . self::FILE_NAME);
            }

            fwrite($file, serialize($this));
            fclose($file);
        }

        static public function loadBoards(): BoardArray {
            $file = fopen(self::FILE_NAME, "r");

            if ($file === false) {
                throw new \Exception("Cannot open file " . self::FILE_NAME);
            }
            
            if (filesize(self::FILE_NAME) === 0) {
                return new BoardArray();
            }

            $data = unserialize(fread($file, filesize(self::FILE_NAME)));

            fclose($file);

            return $data;
        }

        static public function storeNewBoard(Board $board) {
            $boards = self::loadBoards();

            $boards->push($board);
            
            $boards->storeBoards();
        }

        static public function removeBoard(String $name) {
            $boards = self::loadBoards();

            if ($boards->offsetExists($name)) {
                unset($boards[$name]);
            }

            $boards->storeBoards();
        }
    }
    
?>