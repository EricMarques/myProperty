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
        'slug',
        'bedrooms',
        'bathrooms',
        'garage',
        'property_area',
        'total_property_area',
    ];

    public function user()
    {
        //Faz mapeamento onde um usuario pode possuir mais de um movel e ESTE imóvel pertence a ele
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        //Faz mapeamento onde uma categoria pode estar associada a mais de um imóvel
        return $this->belongsToMany(Category::class, 'real_state_categories');
    }
}