<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetailTransaksi;
use App\Models\Paket;
use App\Models\Pelanggan;

use App\Models\Transaksi;
class TransaksiController extends BaseController
{
    protected $pelanggans,$transaksi, $detail,$session, $pakets, $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pakets = new Paket();
        $this->pelanggans = new Pelanggan();
        $this->transaksi = new Transaksi();
        $this->detail = new DetailTransaksi();
        $this->session = session();
    }
//===================================================================================================
    public function index()
    {
        $data['pelanggan'] = $this->pelanggans->findAll();
        $data['paket'] = $this->pakets->findAll();

        if (session('cart')!=null)
        {
            $data['trans']= array_values(session('cart'));
        }
        else
        {
            $data['trans']=null;
        }
        return view('transaksi_view',$data);
    }
//===================================================================================================
    public function cek($id)
    {
        $cart = array_values(session('cart'));
        for ($i=0; $i < count(session('cart')); $i++) {
            if ($cart[$i]['id']==$id)
            {
                return $i;
            }
            # code...
        }
        return -1;
    }
//===================================================================================================
    public function addCart()
    {
        $id = $this->request->getPost('paket');
        $jumlah = $this->request->getPost('jumlah');
        if($jumlah==0)
        {
            session()->setFlashdata("sukses","Gagal Memasukkan ke Keranjang/ n Jumlah Tidak Boleh 0");
            return $this->response->redirect('/transaksi');
        }
        $paket = $this->pakets->find($id);
        if ($paket != null) {
            
            // Paket
            $isi = array (
                'id' => $id, # id = tb_paket
                'nama_paket' => $paket['nama_paket'],
                'harga' => $paket['harga'],
                'jumlah' => $jumlah,

            );

            if ($this->session->has('cart'))
            {
                $index = $this->cek($id);
                $cart = array_values(session('cart'));
                if ($index==-1)
                {
                    array_push($cart,$isi);
                }else

                {
                    $cart[$index]['jumlah']+=$jumlah;
                }
                $this->session->set('cart',$cart);
            }
            else

            {
                $this->session->set('cart',array($isi));
            }
            session()->setFlashdata("sukses","Data Berhasil Masuk Keranjang");
            return $this->response->redirect('/transaksi');
        }    
        else
        {
            session()->setFlashdata("sukses","GAGAL INPUT Keranjang");
            return $this->response->redirect('/transaksi');
        }
    }
//===================================================================================================    
    public function removeCart($id)
    {
        $cart = array_values(session('cart'));
        $index = $this->cek($id);

        unset($cart[$index]);
        $this->session->set('cart',$cart);
        session()->setFlashdata("sukses","Data Berhasil di Hapus dari Keranjang");
        return $this->response->redirect('/transaksi');
    }  
//===================================================================================================
    public function simpan()
    {
        if (session('cart') != null) {
            // simpan

            if($this->session->get('id')  != null) { // id = tb_user
                //simpan

                // Transaksi
                $dTrans = array(
                    'id_pelanggan' => $this->request->getPost('pelanggan'),
                    'tanggal_masuk' => date('Y-m-d H:i:s'),
                    'tanggal_ambil' => $this->request->getPost('tanggal_ambil'),
                    'id_user' => $this->session->get('id') # id = tb_user
                );

                $id = $this->transaksi->insert($dTrans);
                $cart = array_values(session('cart'));
                foreach ($cart as $value) {
                    # code...

                    // DetailTransaksi
                    $dDetail = array(
                        'id_transaksi' => $id,
                        'id_paket' => $value['id'], # id = tb_paket
                        'jumlah' => $value['jumlah']
                    );

                    $this->detail->insert($dDetail);
                }

                $this->session->remove('cart');
                session()->setFlashdata("sukses","Transaksi Berhasil Disimpan");
                return $this->response->redirect('/transaksi');
            }

            else 
            {
                session()->setFlashdata("sukses","Anda Harus Login Terlebih Dahulu Untuk Proses Simpan");
                return $this->response->redirect('/transaksi');
            }   
        }

        else
        {
            session()->setFlashdata("sukses","Keranjang Masih Kosong Tidak Bisa Di Simpan");
            return $this->response->redirect('/transaksi');
        }
    }
//===================================================================================================
    public function laporan()
    {
        $query = $this->db->query("select a.*,b.nama from tb_transaksii a, tb_pelanggan b where a.id_pelanggan=b.id and a.deleted=0");
        $result = $query->getResultArray();
        $data['trans'] = $result;
        return view('laporan_view', $data);
    }    
//===================================================================================================
    public function ambil($id)
    {
        $data = array('status' => 1);
        $this->transaksi->update($id, $data);
        session()->setFlashdata("message","Paket Sudah Diambil !");
        return $this->response->redirect('/laporan');
    }      
//===================================================================================================
    public function detail($id)
    {
        $query = $this->db->query("select a.*,b.* from tb_detail_transaksi a, tb_paket b where a.id_paket=b.id and a.id_transaksi=$id");
        $result = $query->getResultArray();
        $no = 1;
        $data = '<tr class="text-center">
        <th>No</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                </tr>';
        
                foreach ($result as $value) {
                    #code...
                    $data = $data . '<tr><td>' . $no . '</td><td>' . $value ['nama_paket'] . '</td><td>' . $value ['harga'] . '</td><td>' . 
                            $value ['jumlah'] . '</td><td>' . $value ['jumlah'] * $value ['harga'] . '</td></tr>';
                            $no++;
                }

                echo $data;
    }
//===================================================================================================
    public function filter() 
    {
        $status = $this->request->getPost('status');
        if($status == "" || $status == null) 
        {
            $query = $this->db->query("select a.*,b.* from tb_transaksii a, tb_pelanggan b where a.id_pelanggan=b.id");
        }

        else
        {
            $query = $this->db->query("select a.*,b.* from tb_transaksii a, tb_pelanggan b where a.id_pelanggan=b.id and a.status='$status'");
        }

        $result = $query->getResultArray();
        $data['trans'] = $result;
        return view('laporan_view', $data);
    }
//===================================================================================================
    public function hapus($id)
    {
        $data = array('deleted' => '1');
        $this->transaksi->update($id, $data);
        session()->setFlashdata("sukses","Data Berhasil Dihapus !");
        return $this->response->redirect('/laporan');
    }
//===================================================================================================


}