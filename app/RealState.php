<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealState extends Model
{
    protected $table = 'real_state';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'price',
        'bathrooms',
        'badrooms',
        'garage',
        'property_area',
        'total_property_area',
        'slug',
    ];

    public function user()
    {
        //Faz mapeamento onde um usuario pode possuir mais de um movel e ESTE imóvel pertence a ele
        return $this->belongsTo(User::class);
    }
}