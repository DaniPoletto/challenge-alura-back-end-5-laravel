<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'cor',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class, 'categorias_id');
    }
}
