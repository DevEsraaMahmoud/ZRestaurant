<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $fillable = [
        'chef_name_en',
        'chef_name_ar',
        'position_name_en',
        'position_name_ar',
        'chef_image',
        'chef_facebook_profile',
        'chef_twitter_profile',
        'chef_instagram_profile',
    ];
}
