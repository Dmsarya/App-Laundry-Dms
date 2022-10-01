<?php 
namespace App\Models;

use CodeIgniter\Model;

class User extends Model{
    protected $table      = 'tb_user';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $useAutoincrement = true;
    protected $allowedFields = ['nama','username','password','hak_akses'];
}