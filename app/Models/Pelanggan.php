<?php 
namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends Model{
    protected $table      = 'tb_pelanggan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['nama','alamat','no_hp'];
    
    
}