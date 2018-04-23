<?php

class LoginController extends Controller{


    protected $userObject;
    public $login_success;

    public function index(){
    }

    public function do_login(){
        $this->userObject = new User();

        $check = $this->userObject->checkUser($_POST["email"], $_POST["password"]);


        if($check){
            $user = $this->userObject->getUserFromEmail($_POST["email"]);
            $_SESSION["uID"] = $user["uID"];

            //If the user was trying to access a view, send them there
            if(isset($_SESSION['redirect'])){
                $view = $_SESSION['redirect'];
                unset($_SESSION['redirect']);

                $_SESSION['message'] = "User Logged in Successfully!";
                header("Location: ". BASE_URL . $view );
            }
            //Else send them to the homepage
            else{
                $_SESSION['message'] = "User Logged in Successfully!";
                header("Location: ". BASE_URL);
            }

        }
        else{
            $this->set("login_error","Invalid email or password");
        }


    }
    public function logout(){
        //unset session id
        unset($_SESSION["uID"]);
        //Pass Logout message to home page
        $_SESSION['message'] = "User Logged out Successfully!";
        //close session
        session_write_close();
        //send to homepage
        header("Location: " . BASE_URL);
    }



}