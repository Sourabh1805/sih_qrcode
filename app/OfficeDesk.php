<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeDesk extends Model
{
  protected $primaryKey = 'Office_Desk_id';
  protected $fillable =['Office_Desk_office_id','Office_Desk_department_id','Office_Desk_title','Office_Desk_time_requried','Office_Desk_status'];
}
