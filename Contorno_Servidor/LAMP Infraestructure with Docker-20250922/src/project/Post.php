<?php
    abstract class Post{
        protected int $id;
        protected string $title;
        protected string $subject;
        protected string $picture;
        protected string $user;

        public abstract function __construct(string $title, string $subject, string $picture, string $user);

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
            $max_id = include "./getLastId.php";
            $this->id = $max_id+1;
        }
        public function reSetId(int $id){
            $this->id = $id;
        }

        public function __tostring(){
            return "ID: ".$this->getId()." - Title: ".$this->title." - Subject: ".$this->subject." - Pic: ".$this->picture." - User: ".$this->user;
        }
    }
?>