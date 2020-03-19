<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficePost extends Model
{
  protected $primaryKey = 'Office_Posts_id';
  protected $fillable =[
      'Office_Posts_title',
      'Office_Posts_description',
      'Office_Posts_status'
    ];

}
