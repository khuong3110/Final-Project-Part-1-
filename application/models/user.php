<?php
class User extends Model{


    protected $first_name;
    protected $last_name;
    protected $email;
    protected $user_type;


    public function __construct()
    {
        parent::__construct();

            $uID = $_SESSION["uID"];
            $user = $this->getUserFromID($uID);
            $this->first_name = $user["first_name"];
            $this->last_name = $user["last_name"];
            $this->email = $user["last_name"];
            $this->user_type = $user["user_type"];

    }

    public function getUser($uID){

        $sql =  'SELECT uID, email, first_name, last_name, password, user_type FROM users WHERE uID = ?';

        // perform query
        $results = $this->db->getrow($sql, array($uID));

        $user = $results;
        return $user;
    }
    public function getUserFromID($uID){

        $sql =  'SELECT * FROM users WHERE uID = ?';

        // perform query
        $results = $this->db->getrow($sql, array($uID));

        $user = $results;
        return $user;
    }
    public function getUserFromEmail($email){

        $sql =  'SELECT * FROM users WHERE email = ?';

        // perform query
        $results = $this->db->getrow($sql, array($email));

        $user = $results;
        return $user;
    }
    public function getUserNameFromID($uID){

        $sql =  'SELECT first_name, last_name FROM users WHERE uID = ?';

        // perform query
        $results = $this->db->getrow($sql, array($uID));

        $name = $results['first_name'] . ' ' . $results['last_name'];
        return $name;
    }

    public function getUserName(){
        $name = $this->first_name . " " . $this->last_name;
        return $name;
    }
    public function getUserEmail(){
        return $this->email;
    }
    public function isAdmin(){
        if($this->user_type == 1){
            return true;
        }
        else{
            return false;
        }
    }
    public function getUserType(){
            return $this->user_type;

    }
    public function checkUser($email, $password){

        $sql =  'SELECT password FROM users WHERE email = ?';

        // perform query
        $results = $this->db->getrow($sql, array($email));


        //If the lookup was successful then check to verify that the password is correct
        if(password_verify($password, $results["password"])){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllUsers(){
        $sql =  'SELECT uID, email, first_name, last_name, password FROM users';
        $results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
            $users[] = $row;
        }

        return $users;
    }


    public function addUser($data){

        $sql='INSERT INTO users (email,password,first_name,last_name) VALUES (?,?,?,?)';
        $this->db->execute($sql,$data);
        $message = 'Post added.';
        return $message;

    }




}