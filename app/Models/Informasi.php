<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_file',
        'tipe',
        'file',
        'tgl_file',
    ];
}
