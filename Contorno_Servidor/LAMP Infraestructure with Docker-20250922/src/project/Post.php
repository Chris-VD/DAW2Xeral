<?php
    abstract class Post{
        protected static $counter;
        protected int $id;
        protected string $title;
        protected string $subject;
        protected string $picture;
        protected string $user;

        public abstract function __construct(int $id, string $title, string $subject, string $picture, string $user);

        public function getId(){
            return $this->id;
        } 
        public function getTitle(){
            return $this->title;
        }
        public function getSubject(){
            return $this->subject;
        }
        public function getPicture(){
            return $this->picture;
        }
        public function getUser(){
            return $this->user;
        }

        public function setID(){
            $this->id = Post::$counter++;
        }
        public function setCounter(int $counter){
            Post::$counter = $counter; // ! Check every time the db calls for Posts
        }
    }
?>