<?php

namespace App\Models;

use App\Models\Paese;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaggio extends Model
{
    use HasFactory;

    protected $table = 'viaggi';

    protected $fillable = [
        'posti_disponibili',
    ];

    public function paesi()
    {
        return $this->belongsToMany(Paese::class);
    }
}
