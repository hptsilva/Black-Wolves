<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Screenshots extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['nome_arquivo'];
    protected $hidden = ['id', 'fk_id_agente', 'created_at', 'updated_at', 'titulo', 'thumbnail'];
}
