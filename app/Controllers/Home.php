<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    
    public function index(): string
    {
        $sessionData = $this->session->get();
        if(empty($sessionData['userdata'])){
            return view('login');    
        }
        $data['set_active'] = 'dashboard';
        return view('dashboard',$data);
    }
    public function login() {
        $validation = \Config\Services::validation();
        $rules = [
            'username' => 'required',
            'password'    => 'required',
        ];
        $messages = [
            'username' => [
                'required' => lang('Login.userNameError')
            ],
            'password' => [
                'required'    =>  lang('Login.passwordError')
            ]
        ];
        if (!$this->validate($rules, $messages)) {
            session()->setFlashData('errors', $validation->getErrors());

            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $post = $_POST;
        $userModel = new UserModel(); 
        $users = $userModel->where('username',$post['username'])
                    ->where('password',md5($post['password']))
                    ->where('status',1)
                    ->findAll(); 
        if(!empty($users)){
            $session = session();
            $userData = [
                'username' =>  $post['username'],
                'is_admin' => $users[0]['is_admin']
            ];    
            $session->set('userdata', $userData);
        }else{
            $error = array(lang("Login.invalidCrediential"));
            session()->setFlashData('errors', $error);
        }
        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function change_language($lang)
    {
        $session = session();
        $session->set('locale', $lang);
        return redirect()->back();
    }
}
