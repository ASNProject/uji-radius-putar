<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Radius extends Model
{
    use HasFactory;

    protected $table = 'radius';

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'mode',
        'calcMode',
        'radius',
        'result',
    ];
}
