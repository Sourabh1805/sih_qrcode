<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeRack extends Model
{
  protected $primaryKey = 'Office_Rack_id';
  protected $fillable=[
    'Office_Rack_office_id',
    'Office_Rack_department_id',
    'Office_Rack_title'
  ];
}
