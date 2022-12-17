<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Riwayat_model;
 
class Riwayat extends BaseController
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
        $model = new Riwayat_modelt();
        $data['riwayat'] = $model->getRiwayat();
        echo view('riwayat/index', $data);
    }
 
    public function create()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        return view('riwayat/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'riwayatid' => $this->request->getPost(''),
            'pasienid' => $this->request->getPost(''),
            'diagnosa' => $this->request->getPost(''),
            'tindakan' => $this->request->getPost(''),
            'obat' => $this->request->getPost(''),
            'status' => $this->request->getPost(''),
            'createdate' => date("Y-m-d H:i:s"),
            'createby' => session()->get('name'),
            'updateDate' => date("Y-m-d H:i:s"),
            'updateby' => session()->get('name'),
        );

        if($validation->run($data, 'riwayat') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('riwayat/create'));
        } else {
            $model = new Riwayat_model();
            $simpan = $model->insertRiwayat($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created riwayat successfully');
                return redirect()->to(base_url('riwayat')); 
            }
        }
    }
 
    public function edit($id)
    {  
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Riwayat_model();
        $data['riwayat'] = $model->getRiwayat($id)->getRowArray();
        echo view('riwayat/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('RiwayatId');

        $validation =  \Config\Services::validation();

        $data = array(
            'riwayatid' => $this->request->getPost(''),
            'pasienid' => $this->request->getPost(''),
            'diagnosa' => $this->request->getPost(''),
            'tindakan' => $this->request->getPost(''),
            'obat' => $this->request->getPost(''),
            'status' => $this->request->getPost(''),
            'updateDate' => date("Y-m-d H:i:s"),
            'updateby' => session()->get('name'),
        );
        
        if($validation->run($data, 'riwayat') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('riwayat/edit/'.$id));
        } else {
            $model = new Riwayat_model();
            $ubah = $model->updateRiwayat($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated riwayat successfully');
                return redirect()->to(base_url('riwayat')); 
            }
        }
    }
 
    public function delete($id)
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Riwayat_model();
        $hapus = $model->deleteRiwayat($id);
        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted riwayat successfully');
            return redirect()->to(base_url('riwayat')); 
        }
    }
}