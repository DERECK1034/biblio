<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamos extends Model
{
    use HasFactory;
    protected $primaryKey ='idp';
    protected $fillable = ['idp','idlib', 'idu', 'fecha_inicio', 'fecha_fin', 'numero'];
}
