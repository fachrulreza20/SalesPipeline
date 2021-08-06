<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabahkol2 extends Model
{
    use HasFactory;

    protected $casts = [
        'os' => 'float'
    ];

    protected $table = 'tb_nasabahkol2';
    protected $guarded = [];    
}
