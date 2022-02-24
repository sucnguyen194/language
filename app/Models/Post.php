<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function translations(){
        return $this->hasMany(Translation::class);
    }

    public function translation(){
        return $this->hasOne(Translation::class)->whereLocale(session('locale'));
    }
}
