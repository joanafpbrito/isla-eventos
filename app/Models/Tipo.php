<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Atributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Evento;

#[Fillable(['nome', 'slug'])]
class Tipo extends Model
{
    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }
    protected function casts(): array
    {
        return [
            'nome' => 'string',
            'slug' => 'string',
        ];
    }
}
