<?php 
namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\Types\Void_;

class LoginController extends Controller
{

    protected $request;

    public function index()
    {
        return view("login_view");
    }

    public function login()
    {
        $users = new User();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    

        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        d($dataUser);

        if ($dataUser) {

            if (password_verify($password, $dataUser['password'])) {
                session()->set(

                    [
                        'username' => $dataUser['username'],
                        'id' => $dataUser['id'],
                        'nama' => $dataUser['nama'],
                        'loged_in' => true,
                        'hak_akses' => $dataUser['hak_akses'],
                    ]

                );
                return $this->response->redirect('/');

            } else {
                session()->setFlashdata('error','username password salah !');
                return $this->response->redirect('/login');
            }
            
        } else {
            session()->setFlashdata('error','username tidak ditemukan !');
            return $this->response->redirect('/login');
        }        

    }

    function logout() {
        session()->destroy();
        return $this->response->redirect('/login');
    }
        
    
}