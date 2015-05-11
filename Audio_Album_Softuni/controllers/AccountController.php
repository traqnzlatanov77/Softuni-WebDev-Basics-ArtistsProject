<?php

class AccountController extends BaseController {

    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {

        if( $this->isPost ) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if( $username == null || strlen( $username ) < 3) {
                $this->addErrorMessage("Register failed");
            }
            else {
                $isRegistered = $this->db->register($username, $password, $email);
                if( $isRegistered ) {
                    $_SESSION['username'] = $username;

                    $this->addInfoMessage('Successful registration');
                    $this->redirect('playlists');
                }
                else {
                    $this->addErrorMessage("Register failed");
                }
            }
        }
    }

    public function login() {
        if( $this->isPost ) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);

            if($username && $isLoggedIn) {
                if( $isLoggedIn) {
                    $_SESSION['username'] = $username;

                    $this->addInfoMessage('Successful login');
                    $this->redirect('playlists');
                }
                else{
                    $this->addErrorMessage('Login failed!');
                    $this->redirect('account', 'login');
                }
            }
            else {
                $this->addErrorMessage('Login failed');
            }
        }
    }

    public function logout() {

        $this->authorize();

        unset($_SESSION['username']);
        $this->addInfoMessage('Logout');
        $this->redirect('');
    }
}