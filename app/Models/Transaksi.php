<?php 
namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model{
    protected $table      = 'tb_transaksii';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pelanggan','tanggal_masuk','tanggal_ambil','id_user','status','deleted'];
}