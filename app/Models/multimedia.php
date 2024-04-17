<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multimedia extends Model
{
    use HasFactory;

    public $table = 'multimedias';

    protected $guarded = [];
}
