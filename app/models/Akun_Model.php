<?php

class Akun_Model {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password)
    {
        $query = 'SELECT * FROM akun WHERE username = :username AND password = :password';
        $this->db->query($query);

        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        $result = $this->db->single();

        return $result;
    }
}
