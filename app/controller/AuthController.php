<?php

namespace App\app\controller;

use App\Core\Response;
use App\Core\View;
use App\Core\Validation;

class AuthController extends View
{
    public function showRegister()
    {
        $this->show('authentication/register');
    }

    public function doRegister()
    {
        $user = "App\app\model\\" . ucfirst($_POST['role']);
        $this->model = new $user;

        $validation = new Validation();
        $validation->setData($_POST);
        $rules = $this->model->getRules();
        $validation->setRules($rules);

        $errors = $validation->validate();

        //validation
        if (!empty($errors)) {
            foreach ($errors as $error) {
                $this->addMessage('error', $error);
            }
            $this->show('authentication/register');
            exit;
        }

        $userExist = $this->userExist($_POST['username']);

        // check exists
        if ($userExist) {
            $this->addMessage('error', 'username already exists!');
            $this->show('authentication/register');
            exit;
        }

        //add user
        if (!$this->addUser($_POST['username'], $_POST['password'])) {
            $this->addMessage('error', 'Something went wrong? Please try again!');
            $this->show('authentication/register');
        }

        $newUser = $this->userData($_POST['username']);
        $this->setSession($newUser->id, $newUser->username, $newUser->password, $_POST['role']);
        (new Response)->setCookie(['id' => $newUser->id, 'username' => $newUser->username]);
        $this->addMessage('success', 'registered successfully!');
        header('Location:/dashboard');
    }

    public function userExist($username)
    {
        return $this->model->exist('username', $username);
    }

    public function addUser($username, $pass)
    {
        $password = md5($pass);
        return $this->model->save(compact('username', 'password'));
    }

    public function showLogin()
    {

    }

    public function doLogin()
    {

    }

    private function userData($username)
    {
        $newModel = (new $this->model);
        return $newModel->get('`username`', $username);
    }

    private function setSession($id, $username, $password, mixed $role)
    {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $role;
    }

    public function logout()
    {
        $this->unsetSession();
        (new Response)->unsetCookie('userdata');

        header('location: /login');
    }

    public function unsetSession()
    {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['role']);
    }
}