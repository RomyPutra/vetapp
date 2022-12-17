<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Obat_model;
 
class Obat extends BaseController
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
        $model = new Obat_model();
        $data['obat'] = $model->getObat();
        log_message("info", "Obat List: ".print_r($data, TRUE));
        echo view('obat/index', $data);
    }
 
    public function create()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        return view('obat/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $data = array(
            'obatid' => $this->request->getPost('obatid'),
            'obatname' => $this->request->getPost('obatname'),
            'jenisobatid' => $this->request->getPost('jo'),
            'kandungan' => $this->request->getPost('kandungan'),
            'status' => $this->request->getPost('so'),
            'createdate' => date("Y-m-d H:i:s"),
            'createby' => session()->get('name'),
            'updateDate' => date("Y-m-d H:i:s"),
            'updateby' => session()->get('name'),
        );
        // log_message("info", "Obat Post: ".print_r($data, TRUE));
        if($validation->run($data, 'obat') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('obat/create'));
        } else {
            $model = new Obat_model();
            $simpan = $model->insertObat($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created obat successfully');
                return redirect()->to(base_url('obat')); 
            }
        }
    }
 
    public function edit($id)
    {  
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Obat_model();
        $data['obat'] = $model->getObat($id)->getRowArray();
        echo view('obat/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('ObatId');

        $validation =  \Config\Services::validation();

        $data = array(
            'obatid' => $this->request->getPost('obatid'),
            'obatname' => $this->request->getPost('obatname'),
            'jenisobatid' => $this->request->getPost('jo'),
            'kandungan' => $this->request->getPost('kandungan'),
            'status' => $this->request->getPost('so'),
            'updateDate' => date("Y-m-d H:i:s"),
            'updateby' => session()->get('name'),
        );
        
        if($validation->run($data, 'obat') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('obat/edit/'.$id));
        } else {
            $model = new Obat_model();
            $ubah = $model->updateObat($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated obat successfully');
                return redirect()->to(base_url('obat')); 
            }
        }
    }
 
    public function delete($id)
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('auth/login');
        }
        $model = new Obat_model();
        $hapus = $model->deleteObat($id);
        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted obat successfully');
            return redirect()->to(base_url('obat')); 
        }
    }
}