<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paese extends Model
{
    use HasFactory;

    protected $table = 'paesi';

    protected $fillable = [
        'nome',
    ];

    protected $primaryKey = 'id';
    public $incrementing = true;

    public function viaggi()
    {
        return $this->belongsToMany(Viaggio::class);
    }
}
