<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabahnpf extends Model
{
    use HasFactory;

    protected $casts = [
        'os' => 'float'
    ];

    protected $table = 'tb_nasabahnpf';
    protected $guarded = [];    
}
