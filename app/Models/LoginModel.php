<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function cekLogin($username,$password)
    {
        return $this->db->table('datapedagang')
        ->where(array('usernamePedagang',))
        ->get()->getResultArray();
    }
}