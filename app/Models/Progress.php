<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progress extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'progresses';
    protected $guarded = [];

    protected $attributes = [
        'id' => false,
    ];
}
