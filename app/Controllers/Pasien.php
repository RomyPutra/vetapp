<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pasien_model;
 
class Pasien extends BaseController
{

    public function __construct()
    {
		$this->cek_login();
	}

    public function index()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Pasien_modelt();
        $data['pasien'] = $model->getPasien();
        echo view('pasien/index', $data);
    }
 
    public function create()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        return view('pasien/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'pasienid' => $this->request->getPost(''),
            'pasienname' => $this->request->getPost(''),
            'gender' => $this->request->getPost(''),
            'age' => $this->request->getPost(''),
            'status' => $this->request->getPost(''),
            'createdate' => date("Y-m-d H:i:s"),
            'createby' => session()->get('name'),
            'updateDate' => date("Y-m-d H:i:s"),
            'updateby' => session()->get('name'),
        );

        if($validation->run($data, 'pasien') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pasien/create'));
        } else {
            $model = new Pasien_model();
            $simpan = $model->insertPasien($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created pasien successfully');
                return redirect()->to(base_url('pasien')); 
            }
        }
    }
 
    public function edit($id)
    {  
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Pasien_model();
        $data['pasien'] = $model->getPasien($id)->getRowArray();
        echo view('pasien/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('PasienId');

        $validation =  \Config\Services::validation();

        $data = array(
            'pasienid' => $this->request->getPost(''),
            'pasienname' => $this->request->getPost(''),
            'gender' => $this->request->getPost(''),
            'age' => $this->request->getPost(''),
            'status' => $this->request->getPost(''),
            'updateDate' => date("Y-m-d H:i:s"),
            'updateby' => session()->get('name'),
        );
        
        if($validation->run($data, 'pasien') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pasien/edit/'.$id));
        } else {
            $model = new Pasien_model();
            $ubah = $model->updatePasien($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated pasien successfully');
                return redirect()->to(base_url('pasien')); 
            }
        }
    }
 
    public function delete($id)
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Pasien_model();
        $hapus = $model->deletePasien($id);
        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted pasien successfully');
            return redirect()->to(base_url('pasien')); 
        }
    }
}