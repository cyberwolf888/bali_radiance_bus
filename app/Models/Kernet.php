<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kernet extends Model
{
    protected $table = 'kernet';

    public function getStatus()
    {
        $status = ['1'=>'Aktif', '0'=>'Tidak Aktif'];
        return $status[$this->status];
    }
}
