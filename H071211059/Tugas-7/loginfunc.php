<?php
require_once 'conn.php';
class LoginFunc extends Conn
{
    public function register($email, $username, $password)
    {
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $checkemail = "SELECT id from users where email = '$email'";
        $stmt = $this->conn->prepare($checkemail);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $query = "INSERT INTO users (username, email, `password`) values ('$username', '$email', '$password');";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

    public function login($uname, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$uname'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $hash = $user['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $user['id'];
                // header('Location: products.php');
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    public function isSession()
    {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
    }
}
?>