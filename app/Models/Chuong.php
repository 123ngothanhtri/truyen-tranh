<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuong extends Model
{
    use HasFactory;
    protected $table = 'chuong';
    protected $primaryKey = 'id_chuong';
    public $timestamps = false;
}
