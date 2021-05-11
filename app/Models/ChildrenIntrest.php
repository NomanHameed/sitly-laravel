<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenIntrest extends Model
{

    public function userChild()
    {
        return $this->belongsTo(UserChild::class);
    }
}
