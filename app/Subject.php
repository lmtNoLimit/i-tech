<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $fillable = [
    'id', 'subject_id' , 'name'
];
}
