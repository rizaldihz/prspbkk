<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Http\Request;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('dashboard/index');
    }

    public function regAction()
    {
    	$user = new Users();
    	$request = new Request();
        $user->id = $request->getPost('em');
    	$user->name = $request->getPost('em');
    	$user->pass = $request->getPost('pw');
    	$user->save();
        $this->view->pick('dashboard/index');
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