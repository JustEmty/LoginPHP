<?php
class AuthController{
    private $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->get_pdo();
    }

    public function sign_in($username, $password){
        $result = $this->get_user_info_array($username);
        
        if(count($result) > 0){
            unset($_SESSION['error-username']);

            if(password_verify($password, $result[0]["password"])){
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $result[0]["password"];
                header("location: ../Homepage/index.php");
                return;
            }else{
                $_SESSION['error-pass'] = "Username or password incorrect";
                header("location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
                return;
            }
        }else{
            $_SESSION['error-username'] = "Username or password incorrect";
            return;
        }
    }

    public function sign_up($username, $password){
        $result = $this->get_user_info_array($username);

        if(empty($result)){
            unset($_SESSION['exist-username']);
            $hashing_password = password_hash($password, PASSWORD_DEFAULT);
    
            $insert_user_info = $this->pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (:username, :password)");
            $insert_user_info->bindParam(":username", $username);
            $insert_user_info->bindParam(":password", $hashing_password);
            $insert_user_info->execute();
    
            $_SESSION["username"] = $username;
            $_SESSION["password_hash"] = $hashing_password;
            header('location: ../Homepage/index.php');
            return;
        }else{
            $_SESSION['exist-username'] = "Username already existed";
            header('location: ' . htmlspecialchars($_SERVER["PHP_SELF"]));
        }
    }

    private function get_user_info_array($username){
        $select_all_username = $this->pdo->prepare("SELECT * FROM `users` WHERE username = :username");
        $select_all_username->bindParam(":username", $username);
        $select_all_username->execute();
        $result = $select_all_username->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
?>