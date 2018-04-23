<?php

class MembersController extends Controller{


    public $userObject;

    public function index(){
        $this->set('currentAction','all');
        $this->set('title', 'Member List');
        $this->userObject = new User();
        $members = $this->userObject->getAllUsers();
        $this->set('members', $members);
    }

    public function profile($uID){
        $this->set('currentAction','profile');
        $this->set('title', 'Member Information');
        $this->userObject = new User();
        $member = $this->userObject->getUser($uID);
        $this->set('first_name', $member['first_name']);
        $this->set('last_name', $member['last_name']);
        $this->set('email', $member['email']);


    }




}