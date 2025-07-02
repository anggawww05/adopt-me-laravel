<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    // This $fillable array should match your model and the new migration
    protected $fillable = [
        'species',
        'breed',
        'status',
        'rehome_reason',
        'waiting_time',
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