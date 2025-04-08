<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'parent_id',
        'image',
        'cover',
        'type',
        'day',
        'expire',
    ];

    public function getCreatedAtAttribute($value)
    {
        return verta($value)->format(' H:i | %d / %B / %Y');
    }
    public function children()
    {
        return $this->hasMany(Story::class , 'parent_id' , 'id');
    }
}
