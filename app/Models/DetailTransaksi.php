<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model{
    protected $table      = 'tb_detail_transaksi';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_detail_transaksi';
    protected $allowedFields = ['id_transaksi','id_paket','jumlah'];
}