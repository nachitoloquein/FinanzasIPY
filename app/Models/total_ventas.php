<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_ventas extends Model
{
    use HasFactory;
    protected $table = 'documento';
    public $timestamps = false;
    protected $primaryKey = 'idDocumento';
}
