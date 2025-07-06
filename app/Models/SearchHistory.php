<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $table = 'search_historys';

    protected $fillable = [
        'species',
        'location',
        'keyword',
        'estimated_minimum_age',
        'estimated_maximum_age',
        'age',
        'gender',
        'elements',
        'breed',
        'color',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
