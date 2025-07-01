<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'species',
        'steril_status',
        'problematic_status',
        'name',
        'age',
        'breed',
        'size',
        'gender',
        'color',
        'complete_vaksinated',
        'trained_status',
        'good_with_animals',
        'good_with_kids',
        'pure_breed',
        'special_needs',
        'address',
        'city',
        'post_code',
        'description',
        'picture1',
        'picture2',
        'picture3',
        'picture4',
        'document1',
        'document2',
        'document3',
        'document4',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
