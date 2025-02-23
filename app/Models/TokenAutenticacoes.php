<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TokenAutenticacoes extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['id','token_uuid', 'usuario', 'usado'];
    protected $hidden = ['id','token_uuid'];
}
