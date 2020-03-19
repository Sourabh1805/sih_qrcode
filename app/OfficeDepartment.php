<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeDepartment extends Model
{
  protected $primaryKey = 'Office_Department_id';
  protected $fillable =['Office_Department_title','Office_Department_description','Office_Department_initial','Office_Department_status'];

}
