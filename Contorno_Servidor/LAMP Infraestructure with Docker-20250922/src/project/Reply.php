<?php
    class Reply extends Post{
        private int $thread;
        // Constructor
        public function construct(int $thread, string $subject="", string $picture = "", string $user = "Anonymous"){
            $this->thread = $thread;
            $this->__construct("", $subject, $picture, $user);
        }
        public function __construct(string $title = "", string $subject="", string $picture = "", string $user = "Anonymous"){
            $this->setID();
            $this->title = $title;
            $this->subject = $subject;
            $this->picture = $picture;
            $this->user = $user;
        }
        public function getThread() : int{
            return $this->thread;
        }
        public function __tostring(){
            return parent::__tostring()." - Thread: ".$this->getThread();
        }
    }
?>