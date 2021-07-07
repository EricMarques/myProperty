<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function realStates()
    {  
        //Faz mapeamento informando que uma categoria está associada a um imóvel
        return $this->belongsToMany(RealState::class, 'real_state_categories');
    }
}
