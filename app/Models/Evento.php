<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Atributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tipo;

#[Fillable(['titulo', 'tipo_id', 'data', 'local', 'descricao', 'vagas', 'inscritos'])]
class Evento extends Model
{
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }

    protected function casts(): array
    {
        return ['data' => 'date'];
    }
}
