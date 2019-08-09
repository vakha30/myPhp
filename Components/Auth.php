<?php

class Auth {

    private $db;
    function __construct(QueryBuilder $db) {
        $this->db = $db;
    }

    function register($login, $password) {
        $data = [
            'login' => $login,
            'password' => $password
        ];
        $this->db->add("users", $data);
    }
    
    function login($login, $password) {
        $data = [
            'login' => $login,
            'password' => $password
        ];
        $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
        $statement = $this->db->pdo->prepare($sql);
        $statement->execute($data);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    function logout() {
        unset($_SESSION['user']);
    }

    function check() {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    function currentUser() {
        if ($this->check()) {
            return $_SESSION['user'];
        }
    }

    function ban($id) {
        $sql = "UPDATE users SET user_status = 'banned' WHERE id = :id";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    function unban($id) {
        $sql = "UPDATE users SET user_status = 'normal' WHERE id = :id";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    function issBanned($id) {
        $user = $this->db->getOne("users", $id);
        if ($user['user_status'] === "banned") {
            return true;
        }
        return false;
    }

    function issNormal($id) {
        $user = $this->db->getOne("users", $id);
        if ($user['user_status'] === "normal") {
            return true;
        }
        return false;
    }

    function remove($id) {
        $this->db->delete("users", $id);
    }

    function uploadAvatar($avatar, $id, ImageManager $img) {
        $image = $img->upload($avatar);
        $sql = "UPDATE users SET avatar = :image WHERE id = :id";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(':image', $image);
        $statement->bindParam(':id', $id);
        $_SESSION['user']['avatar'] = $image;
        $result = $statement->execute();
    }
}
