<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class User extends BaseController
{
    private $session;
    private $locale;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $session = session();
        $this->locale = $session->get('locale') ?? 'en'; // Default to English if the language is not set
        helper('language');
    }
    
    public function index(): string
    {
        $sessionData = $this->session->get();
        if(empty($sessionData['username'])){
            return view('login');    
        }
    }
    public function create_admin() {
        $data['set_active'] = 'createAdmin';
        if(!empty($_POST)){
            $validation = \Config\Services::validation();
            $rules = [
                'userName' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'mobile' => 'required',
                'businessname' => 'required',
                'businessemail' => 'required',
                'businessmobile' => 'required',
                'businessAddress' => 'required',
            ];
            $messages = [
                'userName' => ['required' => lang('User.userNameError' , [], $this->locale)],
                'password' => ['required'    =>  lang('User.passwordError' , [], $this->locale)],
                'name' => ['required'    =>  lang('User.nameError' , [], $this->locale)],
                'mobile' => ['required'    =>  lang('User.mobileError' , [], $this->locale)],
                'email' => ['required'    =>  lang('User.emailError' , [], $this->locale)],
                'businessname' => ['required'    =>  lang('User.businessnameError' , [], $this->locale)],
                'businessemail' => ['required'    =>  lang('User.businessemailError' , [], $this->locale)],
                'businessmobile' => ['required'    =>  lang('User.businessmobileError' , [], $this->locale)]
            ];
            if (!$this->validate($rules, $messages)) {
                session()->setFlashData('errors', $validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
            $customerModel = new CustomerModel();
            $insert_data = array(
                'fullname'=>$_POST['name'],
                'username'=>$_POST['userName'],
                'password'=>$_POST['password'],
                'email'=>$_POST['email'],
                'contact'=>$_POST['mobile']
            );
            $insert_complete = $customerModel->insertData($insert_data);
            if(!$insert_complete){
                $dataReturn = "errors";
                $dataReturnMessage = array(lang('common.somethingWentWrong',[], $this->locale));
                // session()->setFlashData('errors', array(lang('common.somethingWentWrong',[], $this->locale)));
                // return redirect()->back()->withInput()->with('errors', array(lang('common.somethingWentWrong',[], $this->locale)));
            }else{
                $dataReturn = "success";
                $dataReturnMessage = lang('common.insertSuccessfully',[], $this->locale);
            }
            session()->setFlashData( $dataReturn, $dataReturnMessage);
            return redirect('createAdmin');
        }

        return view('user/create_admin',$data);
    }
    public function get_customer(){        
        $data['set_active'] = 'manageCustomer';
        $customerModel = new CustomerModel();
        $data['customerList'] = $customerModel->findAll();

        return view('user/manage_customer',$data);
    }
    public function change_customer_status(){        
        $data['set_active'] = 'manageCustomer';
        if ($this->request->getMethod() === 'POST') {        
            $customerModel = new CustomerModel();
            $customer_id = $this->request->getPost('id');
            if ($customerModel->update($customer_id, ['status' => $this->request->getPost('status')])) {
                // Status updated successfully
                return $this->response->setStatusCode(200)->setJSON(['message' => 'Status updated successfully']);
            } else {
                // Failed to update status
                return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update status']);
            }
        } else {
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
    }
}
