<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Curso extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo', 'nome', 'categoria',
        'subcategoria', 'tipo', 'destaque',
        'especializacao', 'id_mp'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (String) Str::uuid();
            $cursoModel = new Curso();
            $tipo = $model->tipo ?: 'zoom';
            $ultimoCod =  $cursoModel->maxCodigo();
            if(is_null($ultimoCod)){
                $ultimoCod = 1;
            } else {
                if($ultimoCod->codigo){
                    $ultimoCod = $ultimoCod->codigo += 1;
                } else {
                    $ultimoCod = 1;
                }
            }
            $model-> tipo = $tipo;
            $model->codigo = $ultimoCod;
        });
    }

    private function maxCodigo()
    {
        return Curso::select('codigo')->orderByDesc('codigo')->first();
    }

}
