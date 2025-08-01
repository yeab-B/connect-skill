<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
     protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
