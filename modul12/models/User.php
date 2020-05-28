<?php
include_once '../includes/functions.php';

class User{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function login(){
        try{
            $username = post('username');
            $password = md5(post('password'));

            $prep = $this->db->prepare('SELECT id, level FROM pengguna WHERE username = ? AND password = ?');
            $prep->execute([
                $username, $password
            ]);

            $fetch = $prep->fetch(PDO::FETCH_OBJ);
            if($prep->rowCount() > 0){
                $_SESSION['id_login'] = $fetch->id;
                $_SESSION['nama']   = $fetch->nama;
                $_SESSION['username'] = $fetch->username;
                $_SESSION['level'] = $fetch->level;

                redirect('index.php');
            }else{
                $_SESSION['error'] = 'Gagal login';
            }

        }catch(PDOException $e){

        }
    }
}