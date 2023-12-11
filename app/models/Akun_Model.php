<?php

class Akun_Model {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password)
    {

        $user = 'SELECT * FROM akun WHERE username = :username';
        $this->db->query($user);

        $this->db->bind(':username', $username);

        $result = $this->db->single();
        if (!password_verify($password,$result['password'])){
            return null;
        }    
        return $result;
    }
}