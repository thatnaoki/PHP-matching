<?php 

if (!class_exists('Database')) {
	require_once('Database.php');
}

class User {

    // public $obj = (object)[];
    public $userData = array();

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllUsersfromDB($sex) {
        $sql = "SELECT * FROM user_table WHERE sex != $sex";
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
        return $results;
    }

    public function getUsersByID($idsArray) {
        $results = array();
        foreach($idsArray as $id){
            $sql = "SELECT * FROM user_table WHERE id=$id";
            $stmt = $this->db->prepare($sql);
            $status = $stmt->execute();
            if($status==false) {
                $error = $stmt->errorInfo();
                exit("ErrorQuery:".$error[2]);
            } else {
                $result = $stmt->fetch();
                if ($result['id']) {
                    array_push($results, $result);
                }
            }
        }
        return $results;
    }

    public function saveUser($props) {
        $this->userData = $props;
        $profileImage = $this->getFileName($this->userData['profileImage']);
        var_dump($this->userData);
        $sql = "INSERT INTO user_table(email, pw, username, sex, age, livein, profileImage) VALUES (:email, :pw, :username, :sex, :age, :livein, :profileImage)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $this->userData['email']);
        $stmt->bindValue(':pw', $this->userData['password']);
        $stmt->bindValue(':username', $this->userData['username']);
        $stmt->bindValue(':sex', $this->userData['sex']);
        $stmt->bindValue(':age', $this->userData['age']);
        $stmt->bindValue(':livein', $this->userData['livein']);
        $stmt->bindValue(':profileImage', $profileImage);
        $res = $stmt->execute();
        if($res==false){
            $error = $stmt->errorInfo();
            exit("QueryError:".$error[2]);
        }
    }

    public function getFileName($uploadedFile){
        if (isset($uploadedFile ) && $uploadedFile["error"] == 0 ) {
          $file_name = $uploadedFile["name"];         //"1.jpg"ファイル名取得
          $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
          $file_dir_path = "upload/";  //画像ファイル保管先
          $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
          $file_name = $file_dir_path.$uniq_name; //ユニークファイル名とパス
          return $file_name;
        }
    }

    public function saveFileToStorage($uploadedFile){
        $file_name = $this->getFileName($uploadedFile); 
        $tmp_path  = $uploadedFile["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
        // FileUpload [--Start--]
        if ( is_uploaded_file( $tmp_path ) ) {
            if ( move_uploaded_file( $tmp_path, $file_name ) ) {
                chmod( $file_name, 0644 );
            } else {
                var_dump('failed to move the image to the dir!');
                exit;
            }
        }
    }
    

    // public function _login($lid, $lpw) {
    //     $db = new Database;
    //     $sql = "SELECT * FROM user_table WHERE email=:lid AND pw=:lpw";
    //     $stmt = $db->prepare($sql);
    //     $stmt->bindValue(':lid', $lid);
    //     $stmt->bindValue(':lpw', $lpw);
    //     $res = $stmt->execute();
    //     if($res==false){
    //         $error = $stmt->errorInfo();
    //         exit("QueryError:".$error[2]);
    //     }
    //     $val = $stmt->fetch();
    //     return $val;
    // }

}