<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChild extends Model
{
    protected $table = 'user_childrens';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interest()
    {
        return $this->hasMany(ChildrenIntrest::class);
    }

}
