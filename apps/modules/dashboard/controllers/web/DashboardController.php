<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Http\Request;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $users = Users::find();

        $this->view->users = $users;

        $this->view->pick('dashboard/index');
    }

    public function registerAction()
    {
        $this->view->pick('dashboard/register');
    }

    public function storeAction()
    {
        $user = new Users();
    	$request = new Request();
        $user->username = $request->getPost('username');
        $user->email = $request->getPost('email');
    	$user->password = $request->getPost('password');
    	$user->save();
        $this->response->redirect('/');
    }

    public function loginAction()
    {
        $request = new Request();
        $username = $request->getPost('em');
        $user = Users::findFirst("email='$username'");
        $pass = $request->getPost('pw');
        // var_dump($pass);die();
        if($user)
        {
            if($user->pass == $pass){
                $this->session->set('auth',['username' => $user->username]);
            }
            else{
                $error = "Password anda salah";
                $this->view->error = $error;
            }
        }
        else{
            $error = "Email tidak ditemukan";
            $this->view->error = $error;
        }
        $this->view->pick('dashboard/index');
    }

}