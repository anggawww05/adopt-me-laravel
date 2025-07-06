<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionHistory extends Model
{
    protected $table = 'adoption_historys';

    protected $fillable = [
        'name',
        'city',
        'post_code',
        'phone',
        'home_phone',
        'have_yard',
        'environment_situation',
        'house_type',
        'home_activity',
        'have_alergy',
        'family_members',
        'youngest_age',
        'kids_visited',
        'visited_age',
        'have_roommate',
        'have_other_pets',
        'describe_other_pets',
        'experience',
        'user_id',
        'pet_id', 
        'home_photo_1', // <-- Add this
        'home_photo_2', // <-- Add this
        'home_photo_3', // <-- Add this
        'home_photo_4', // <-- Add this
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
