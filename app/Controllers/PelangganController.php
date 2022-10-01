<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pelanggan;
class PelangganController extends Controller{
    protected $pelanggans;

    function __construct()
    {
        $this->pelanggans = new Pelanggan();
    }
    public function index()
    {
        $data['pelanggan']=$this->pelanggans->FindAll();
        return view ('pelanggan_view', $data);
    }

    public function create()
    {
        
        return view ('fpelanggan_view');
    }

    public function save()
    {
        
        $data= array(
            'nama'=>$this->request->getPost('nama'),
            'alamat'=>$this->request->getPost('alamat'),
            'no_hp'=>$this->request->getPost('no_hp'),
        );
        
        $this->pelanggans->insert($data);
        session()->setFlashdata("message","Data Berhasil Disimpan !");
        return $this->response->redirect('/pelanggan');
    }

    public function edit($id)
    {
        
        $data= array(
            'nama'=>$this->request->getPost('nama'),
            'alamat'=>$this->request->getPost('alamat'),
            'no_hp'=>$this->request->getPost('no_hp'),
        );
        
        $this->pelanggans->update($id,$data);
        session()->setFlashdata("message","Data Berhasil Diubah !");
        return $this->response->redirect('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelanggans->delete($id);
        session()->setFlashdata("message","Data Berhasil Dihapus !");
        return $this->response->redirect('/pelanggan');
    }
}    

