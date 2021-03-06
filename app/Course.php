<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_id', 'name'];
    
    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
