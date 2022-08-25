<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'nome' => $this->nome,
            'id_mp' => $this->id_mp,
            'status' => $this->status ? 'active' : 'inactive',
            'data' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
