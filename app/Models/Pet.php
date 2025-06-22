<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'species',
        'breed',
        'status',
        'rehome_reason',
        'waiting_time',
        'piture',
        'name',
        'age',
        'behavior',
        'gender',
        'address',
        'color',
        'vaccination_status',
        'trained_status',
        'good_with_animals',
        'good_with_kids',
        'steril_status',
        'special_needs',
        'problematic_status',
        'city',
        'post_code',
        'description',
        'document',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
