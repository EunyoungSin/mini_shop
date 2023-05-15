<?php
namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo) {
        $sql =" select * from user_info where u_id = :id and u_pw = :pw ";
        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
        } finally {
            $this->closeConn();
        }
        return $result;
    }
    
    public function signupUser($arrUserInfo) {
        $sql =" insert into user_info (u_id, u_pw, u_email) values (u_id = :id and u_pw = :pw and u_email = :email) ";
        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
            ,":email" => $arrUserInfo["email"]
        ];
        try {
            // $conn->beginTransaction(); // Transaction 시작
            $stmt = $this->conn->prepare($sql); // statement object set
            $stmt->execute($prepare); // DB request
            $result_cnt = $stmt->rowCount(); // query 적용 recode 갯수
            // $conn->commit();
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
        } finally {
            $this->closeConn();
        }
        return $result;
    }
}

// 클로즈콘 하면 인서트 불가. 원래는 유저모델이 아니라 유저컨트롤러에서 인서트, 딜리트, 커밋 or 롤백 해야함.