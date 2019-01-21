<?php 

if (!class_exists('Database')) {
	require_once('Database.php');
}

class Like {

    public $likeData = array();

    public function __construct() {
        $this->db = new Database;
        $this->matchedUsers = array();
    }

    public function createLike($toid, $myid) {
        $sql = "INSERT INTO like_table(toid, fromid) VALUES (:toid, :fromid)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':toid', $toid, PDO::PARAM_INT);
        $stmt->bindValue(':fromid', $myid, PDO::PARAM_INT);
        $res = $stmt->execute();
        if($res==false){
            $error = $stmt->errorInfo();
            exit("QueryError:".$error[2]);
        }
    }

    public function getAllUsersIDWhoLikedYou($myid) {
        $usersLikedYou = array();
        $sql = "SELECT * FROM like_table WHERE toid=$myid";
        $stmt = $this->db->prepare($sql);
        $status = $stmt->execute();
        $results = array();
        if($status==false) {
            $error = $stmt->errorInfo();
            exit("ErrorQuery:".$error[2]);
        } else {
        //１データのみ抽出の場合はwhileループで取り出さない
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            // 配列に入れる
            array_push($results, $result);
            }
        }        
        foreach($results as $result) {
            array_push($usersLikedYou, $result["fromid"]);
        }
        return $usersLikedYou;
    }

    public function getAllUsersIDWhoYouLiked($myid) {
        $usersYouLiked = array();
        $sql = "SELECT * FROM like_table WHERE fromid=$myid";
        $stmt = $this->db->prepare($sql);
        $status = $stmt->execute();
        $results = array();
        if($status==false) {
            $error = $stmt->errorInfo();
            exit("ErrorQuery:".$error[2]);
        } else {
        //１データのみ抽出の場合はwhileループで取り出さない
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            // 配列に入れる
            array_push($results, $result);
            }
        }        
        foreach($results as $result) {
            // var_dump($result);
            array_push($usersYouLiked, $result["toid"]);
        }
        return $usersYouLiked;
    }

    public function getAllUsersIDWhoYouMatched($myid) {
        $usersYouLiked = $this->getAllUsersIDWhoYouLiked($myid);
        $usersLikedYou = $this->getAllUsersIDWhoLikedYou($myid);
        // var_dump($usersYouLiked);
        // var_dump($usersLikedYou);
        foreach($usersYouLiked as $user) {
            if (in_array($user, $usersLikedYou)) {
                array_push($this->matchedUsers, $user);
            } 
        }
        // var_dump($this->matchedUsers);
        return $this->matchedUsers;
    }

}