<?php 
    class Task {
        public String $name;
        public String $desc;
        public DateTime $due;

        public function __construct(String $name, String $desc, DateTime $due=null) {
            $this->name = $name;
            $this->desc = $desc;
            if ($due !== null) {
                $this->due = $due;
            }
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

        public function __add(TaskArray $other): TaskArray {
            $result = new TaskArray();
            foreach ($this as $task) {
                $result->push(clone $task);
            }
            foreach ($other as $task) {
                $result->push(clone $task);
            }
            return $result;
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

        public function allTasks(): TaskArray{
            return $this->todo->__add($this->progress->__add($this->test->__add($this->done))) ;
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

            fwrite($file, base64_encode(serialize($this)));
            fclose($file);
        }

        static public function loadBoards(): BoardArray | bool {
            if (!file_exists(self::FILE_NAME)) {
                return new BoardArray();
            }

            $file = fopen(self::FILE_NAME, "r");

            if ($file === false) {
                throw new \Exception("Cannot open file " . self::FILE_NAME);
            }
            
            if (filesize(self::FILE_NAME) === 0) {
                return new BoardArray();
            }

            $data = unserialize(base64_decode(fread($file, filesize(self::FILE_NAME))));

            fclose($file);

            return $data;
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