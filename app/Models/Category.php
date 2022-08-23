<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function resources()
    {
        return $this->belongsTo(Resources::class);
    }
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
