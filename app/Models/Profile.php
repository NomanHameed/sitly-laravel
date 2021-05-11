<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['gender', 'image', 'dob', 'city', 'address', 'user_id',
        'permanent_address', 'pay_range', 'role_type', 'after_school', 'self_description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
