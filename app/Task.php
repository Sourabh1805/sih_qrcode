<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $primaryKey = 'Task_id';
  protected $fillable =['Task_office_id','Task_department_id','Task_title','Task_description','Task_no_of_desk','Task_desk_list','Task_time_requried'];
}
