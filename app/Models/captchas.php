<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class captchas extends Model
{
    use HasFactory;
    protected $primaryKey ='idcap';
    protected $fillable = ['idcap','ruta', 'valor'];
}
