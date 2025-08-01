<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['learner_id', 'teacher_id', 'skill_id', 'scheduled_at', 'status'];

    public function learner()
    {
        return $this->belongsTo(User::class, 'learner_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
