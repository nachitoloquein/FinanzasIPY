<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table ='Producto';
    public $timestamps = false;
    protected $primaryKey = 'idProducto';
    
}
