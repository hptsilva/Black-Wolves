<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Screenshots extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['nome_arquivo', 'fk_id_agente'];
    protected $hidden = ['fk_id_agente'];
}
