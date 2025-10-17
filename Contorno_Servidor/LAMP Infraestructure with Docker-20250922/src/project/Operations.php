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
        public function createPost(Reply $post):bool{
            $sql = "insert into post(id, picture, subj, pname, thread) values (?, ?, ?, ?, ?)";
            $querry = $this->conn->prepare($sql);
            return $querry->execute([$post->getId(), $post->getPicture(), $post->getSubject(), $post->getUser(), $post->getThread()]);
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
        public function getThread(int $id) :Thread{
            $sql = "select * from threads where id=?";
            $querry = $this->conn->prepare($sql);
            $querry->execute([$id]);
            $rawThread = $querry->fetch();
            $thread = new Thread($rawThread["title"], $rawThread["picture"], $rawThread["subj"], $rawThread["pname"]);
            // ! Falta comprobación
            return $thread;
        }
        public function getReply(int $id) :Reply{
            $sql = "select * from post where id=?";
            $querry = $this->conn->prepare($sql);
            $querry->execute([$id]);
            $rawThread = $querry->fetch();
            $thread = new Reply;
            $thread->construct($rawThread["thread"],"", $rawThread["picture"], $rawThread["subj"], $rawThread["pname"]);
            // ! Falta comprobación
            return $thread;
        }
        public function getAllThreads() :array{
            $sql = "select * from threads";
            $querry = $this->conn->prepare($sql);
            $querry->execute();
            $threadList = [];
            while ($row = $querry->fetch()) {
                $thread = $this->getThread($row["id"]);
                $thread->reSetId($row["id"]);
                $threadList[] = $thread;
            }
            return $threadList;
        }
        public function getAllReplies(int $threadId) :array{
            if ($this->getThread($threadId) === null) throw new Exception("Thread not found");
            // ! Cambiar espo para que getThread tamen lanze excepcions ou algo
            $sql = "select * from post where thread=?";
            $querry = $this->conn->prepare($sql);
            $querry->execute([$threadId]);
            $replyList = [];
            while ($row = $querry->fetch()) {
                $reply = $this->getReply($row["id"]);
                $reply->reSetId($row["id"]);
                $replyList[] = $reply;
            }
            return $replyList;
        }
    }
?>