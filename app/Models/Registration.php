<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'nama_organisasi',
        'email_organisasi',
    ];
}
