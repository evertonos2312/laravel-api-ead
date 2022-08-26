<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    protected $fillable = [
        'nome', 'status',
        'course_id', 'imagem', 'link',
        'inicio', 'termino', 'max_cancelamento',
        'id_mp', 'usuario_modificado'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function supports()
    {
        return $this->hasMany(Support::class);
    }

}
