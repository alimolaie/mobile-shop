<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'rate',
        'body',
        'good',
        'status',
        'bad',
        'user_id',
        'user_name',
        'product_id',
    ];

    public function getCreatedAtAttribute($value)
    {
        return verta($value)->format(' %d / %B / %Y');
    }

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
