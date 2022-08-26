<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use HasFactory, UuidTrait, SoftDeletes;

    protected $fillable = ['status', 'description'];

    public $statusOptions = [
        'P' => 'Pendente, aguardando professor',
        'A' => 'Pendente, aguardando aluno',
        'C' => 'Finalizado'
    ];

    public function lessons()
    {
        return $this->belongsTo(Lesson::class);
    }


}
