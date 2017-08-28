<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    protected $table = 'supir';

    public function getStatus()
    {
        $status = ['1'=>'Aktif', '0'=>'Tidak Aktif'];
        return $status[$this->status];
    }
}
