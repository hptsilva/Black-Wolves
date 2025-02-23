<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Builds extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = ['code', 'id', 'nome_build', 'classe', 'created_at', 'updated_at'];
}
