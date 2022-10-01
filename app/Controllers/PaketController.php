<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Paket;
class PaketController extends Controller{
    protected $pakets;

    function __construct()
    {
        $this->pakets = new Paket();
    }
    public function index()
    {
        $data['paket']=$this->pakets->FindAll();
        return view ('paket_view', $data);
    }

    public function create()
    {
        
        return view ('fpaket_view');
    }

    public function save()
    {
        
        $data= array(
            'nama_paket'=>$this->request->getPost('nama_paket'),
            'satuan'=>$this->request->getPost('satuan'),
            'harga'=>$this->request->getPost('harga'),
        );
        
        $this->pakets->insert($data);
        session()->setFlashdata("message","Data Berhasil Disimpan !");
        return $this->response->redirect('/paket');
    }

    public function edit($id)
    {
        
        $data= array(
            'nama_paket'=>$this->request->getPost('nama_paket'),
            'satuan'=>$this->request->getPost('satuan'),
            'harga'=>$this->request->getPost('harga'),
        );
        
        $this->pakets->update($id,$data);
        session()->setFlashdata("message","Data Berhasil Diubah !");
        return $this->response->redirect('/paket');
    }

    public function delete($id)
    {
        $this->pakets->delete($id);
        session()->setFlashdata("message","Data Berhasil Dihapus !");
        return $this->response->redirect('/paket');
    }
}