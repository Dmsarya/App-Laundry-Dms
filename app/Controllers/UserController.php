<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;
class UserController extends Controller{
    protected $users;

    function __construct()
    {
        $this->users = new User();
    }
    public function index()
    {
        $data['user']=$this->users->FindAll();
        return view ('user_view', $data);
    }

    public function create()
    {
        
        return view ('fuser_view');
    }

    public function save()
    {
        
        $data= array(
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            // 'password'=>md5($this->request->getPost('password')),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT),
            // 'password'=>$this->request->getPost('password'),
            'hak_akses'=>$this->request->getPost('hak_akses'),
        );
        
        $this->users->insert($data);
        session()->setFlashdata("message","Data Berhasil Disimpan !");
        return $this->response->redirect('/user');
    }

    public function edit($id)
    {
        
        $data= array(
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            // 'password'=>md5($this->request->getPost('password')),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT),
            // 'password'=>$this->request->getPost('password'),
            'hak_akses'=>$this->request->getPost('hak_akses'),
        );
        
        $this->users->update($id,$data);
        session()->setFlashdata("message","Data Berhasil Diubah !");
        return $this->response->redirect('/user');
    }

    public function delete($id)
    {
        $this->users->delete($id);
        session()->setFlashdata("message","Data Berhasil Dihapus !");
        return $this->response->redirect('/user');
    }

}