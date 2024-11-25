<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_usuarios extends Model
{
    use HasFactory;
    protected $primaryKey ='idtu';
    protected $fillable = ['idtu','nombre'];
}
