<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Converter extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'type',
        'score',
        'reward',
    ];
}
