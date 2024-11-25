<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    use HasFactory;
    protected $primaryKey ='idlib';
    protected $fillable = ['idlib','nombre', 'autor', 'imagen', 'descripcion', 'ida', 'activo', 'ejemplares'];
}
