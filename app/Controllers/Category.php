<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
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
    public function create_category() {
        $data['set_active'] = 'createCategory';
        if(!empty($_POST)){
            $validation = \Config\Services::validation();
            $rules = [
                'name' => 'required',
                'status' => 'required',
            ];
            $messages = [
                'name' => ['required'    =>  lang('User.nameError' , [], $this->locale)],
                'status' => ['required'    =>  lang('User.mobileError' , [], $this->locale)]
            ];
            if (!$this->validate($rules, $messages)) {
                session()->setFlashData('errors', $validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
            $categoryModel = new CategoryModel();
            $insert_data = array(
                'name'=>$_POST['name'],
                'status'=>$_POST['status']
            );
            $insert_complete = $categoryModel->insertData($insert_data);
            if(!$insert_complete){
                $dataReturn = "errors";
                $dataReturnMessage = array(lang('common.somethingWentWrong',[], $this->locale));
                session()->setFlashData('errors', array(lang('common.somethingWentWrong',[], $this->locale)));
                return redirect()->back()->withInput()->with('errors', array(lang('common.somethingWentWrong',[], $this->locale)));
            }else{
                $dataReturn = "success";
                $dataReturnMessage = lang('common.insertSuccessfully',[], $this->locale);
            }
            session()->setFlashData( $dataReturn, $dataReturnMessage);
            return redirect('createCategory');
        }

        return view('category/create',$data);
    }
    public function get_category(){        
        $data['set_active'] = 'manageCategory';
        $categoryModel = new CategoryModel();
        $data['categoryList'] = $categoryModel->findAll();

        return view('category/manage',$data);
    }
    public function change_customer_status(){        
        $data['set_active'] = 'manageCustomer';
        if ($this->request->getMethod() === 'POST') {        
            $categoryModel = new CategoryModel();
            $customer_id = $this->request->getPost('id');
            if ($categoryModel->update($customer_id, ['status' => $this->request->getPost('status')])) {
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
