<?php require "./Post.php";
require_once "./Thread.php";
require_once "./Reply.php";
    class Operations{
        private $conn;
        public function openConnection(){
            $this->conn = include "./MySQLConnect.php";
        }
        public function closeconnection(){
            $this->conn = null;
        }

        public function createThread(Thread $thread):bool{
            $sql = "insert into threads(id, title, picture, subj, pname) values (?, ?, ?, ?, ?)";
            $querry = $this->conn->prepare($sql);
            return $querry->execute([$thread->getId(), $thread->getTitle(), $thread->getPicture(), $thread->getSubject(), $thread->getUser()]);
        }
        public function createPost(Reply $post, int $threadId):bool{
            $sql = "insert into post(id, title, picture, subj, pname, thread) values (?, ?, ?, ?, ?, ?)";
            $querry = $this->conn->prepare($sql);
            return $querry->execute([$post->getId(), $post->getTitle(), $post->getPicture(), $post->getSubject(), $post->getUser(), $threadId]);
            // ! See if it works
        }
        public function deleteThread(int $threadId):bool{
            $sql = "delete from threads where id=?";
            $querry = $this->conn->prepare($sql);
            return $querry->execute([$threadId]);
        }
        public function deletePost(int $postId):bool{
            $sql = "delete from post where id=?";
            $querry = $this->conn->prepare($sql);
            return $querry->execute([$postId]);
        }
        public function getThread() :Thread{

        }
        public function getReply() :Reply{

        }
        public function getAllThreads() :array{

        }
        public function getAllReplies() :array{

        }
    }
?>