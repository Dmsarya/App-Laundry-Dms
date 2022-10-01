<?php 
namespace App\Models;

use CodeIgniter\Model;

class Paket extends Model{
    protected $table      = 'tb_paket';
    protected $primaryKey = 'id';
    protected $useAutoincrement = true;
    protected $allowedFields = ['nama_paket','satuan','harga'];
    // Uncomment below if you want add primary key
} 