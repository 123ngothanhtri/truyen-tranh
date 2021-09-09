<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    protected $table='truyen';
    protected $primaryKey = 'id_truyen';
    public $timestamps = false;
}
