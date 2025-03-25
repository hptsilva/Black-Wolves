<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Builds extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = ['id', 'code', 'nome_build', 'fk_id_agente', 'classe', 'created_at', 'updated_at'];
}
