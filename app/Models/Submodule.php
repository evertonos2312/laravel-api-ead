<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submodule extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    protected $fillable = [
        'nome', 'module_id', 'status',
        'id_mp', 'usuario_modificado'
    ];


}
