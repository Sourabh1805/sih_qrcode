<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeEntity extends Model
{
  protected $primaryKey = 'Office_Entity_id';

    protected $fillable =['Office_Entity_type',
    'Office_Entity_mobile_number',
    'Office_Entity_password','Office_Entity_email_id',
    'Office_Entity_name','Office_Entity_office_id','Office_Entity_department_id',
    'Office_Entity_office_post_id',
    'Office_Entity_desk_id',
    'Office_Entity_gender','Office_Entity_address',
    'Office_Entity_city','Office_Entity_pincode','Office_Entity_status'];
  }
