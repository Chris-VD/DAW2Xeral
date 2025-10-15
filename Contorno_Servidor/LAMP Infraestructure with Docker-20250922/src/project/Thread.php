<?php 
    class Thread extends Post{
        // Constructor
        public function __construct(string $title, string $subject = "", string $picture, string $user = "Anonymous"){
            $this->setID();
            $this->title = $title;
            $this->subject = $subject;
            $this->picture = $picture;
            $this->user = $user;
        }
    }
?>