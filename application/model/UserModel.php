<?php
namespace application\model;

// 동적쿼리 : 여러 화면에서 해당 쿼리를 사용하겠다. 여러 화면에서 동작가능하도록 설계.

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true, $delFlg = true) {
        $sql =" select * from user_info where u_id = :id ";

        // PW 추가할 경우
        if($pwFlg) {
            $sql .= " and u_pw = BINARY :pw ";
        }

        // 삭제한 아이디 추가할 경우
        if($delFlg) {
            $sql .= " and del_flg = '0' ";
        }

        $prepare = [
            ":id" => $arrUserInfo["id"]
        ];

        // PW 추가할 경우
        if($pwFlg) {
            $prepare[":pw"] = $arrUserInfo["pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
        }
        // finally {
        //     $this->closeConn();
        // }
        return $result;
    }
    
    public function insertUser($arrUserInfo) {
        $sql = " INSERT INTO user_info(u_id, u_pw, u_name) VALUES(:u_id, :u_pw, :u_name) ";
        
        $prepare = [
            ":u_id" => $arrUserInfo["id"]
            , ":u_pw" => $arrUserInfo["pw"]
            // , ":u_pw" => base64_encode($arrUserInfo["pw"]) // 비밀번호 암호화. 양방향 암호화임.
            , ":u_name" => $arrUserInfo["name"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch (Exception $e) {
            // echo "UserModel->insertUser Error : ".$e->getMessage();
            // exit();
            return false;
        }
    }

    public function updateUser($arrUserInfo, $updateFlg = true) {
        $sql = " UPDATE user_info SET ";
        
        // 업데이트할 때
        if($updateFlg){
            $sql .= " u_pw = :u_pw, u_name = :u_name WHERE u_id = :u_id ";
        // 삭제할 때 
        }else{
            $sql .= " del_flg = '1' WHERE u_id = :u_id ";
        }

        $prepare = [
            ":u_id" => $arrUserInfo["id"]
        ];

        if($updateFlg){
            $prepare[":u_pw"] = $arrUserInfo["pw"];
            // , ":u_pw" => base64_encode($arrUserInfo["pw"]) // 비밀번호 암호화. 양방향 암호화임.
            $prepare[":u_name"] = $arrUserInfo["name"];
        }
        
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch (Exception $e) {
            // echo "UserModel->insertUser Error : ".$e->getMessage();
            // exit();
            return false;
        }
    }
    
}

// 클로즈콘 하면 인서트 불가. 원래는 유저모델이 아니라 유저컨트롤러에서 인서트, 딜리트, 커밋 or 롤백 해야함.
// public function signupUser($arrUserInfo) {
//     $sql =" insert into user_info (u_id, u_pw, u_email) values (:id, :pw, :email) ";
//     $prepare = [
//         ":id" => $arrUserInfo["id"]
//         ,":pw" => $arrUserInfo["pw"]
//         ,":email" => $arrUserInfo["email"]
//     ];
//     try {
//         $this->conn->beginTransaction(); // Transaction 시작
//         $stmt = $this->conn->prepare($sql); // statement object 설정
//         $stmt->execute($prepare); // DB 요청
//         $result_cnt = $stmt->rowCount(); // 적용된 레코드 수
//         $this->conn->commit(); // 커밋
//         return $result_cnt;
//     } catch (Exception $e) {
//         echo "UserModel->signupUser Error: " . $e->getMessage();
//         $this->conn->rollback(); // 롤백
//         return false;
//     } finally {
//         $this->closeConn();
//     }
// }