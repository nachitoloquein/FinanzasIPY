<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_movimiento extends Model
{
    use HasFactory;
    protected $table ='tipo_movimiento';
    public $timestamps = false;
    protected $primaryKey = 'idTipo_Movimiento';
}
