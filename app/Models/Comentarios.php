<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = ['video_id', 'user_id', 'comentario'];
    protected $hidden = ['video_id', 'user_id', 'comentario'];
}
