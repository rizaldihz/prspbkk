<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;

class DashboardController extends Controller
{

    public function beforeExecuteRoute(Dispatcher $dis)
    {
        // var_dump();die();
        if(!$this->session->has('auth') && $dis->getactionName()!='index') $this->response->redirect('/');
    }

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
        $users = Users::find();
        $this->view->users = $users;
        // var_dump($pass);die();
        if($user)
        {
            if($user->password == $pass){
                $this->session->set('auth',['username' => $user->username]);
                $this->response->redirect('/');
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

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/');
    }

}