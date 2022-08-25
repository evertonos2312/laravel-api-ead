<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    protected $fillable = [
        'nome', 'categoria',
        'subcategoria', 'tipo', 'destaque',
        'especializacao', 'id_mp', 'usuario_modificado'
    ];
}
