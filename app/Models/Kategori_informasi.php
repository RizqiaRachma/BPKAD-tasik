<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_informasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori',
    ];
}
